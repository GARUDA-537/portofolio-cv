<?php


namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Education;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        return view('home', compact('profile'));
    }

    public function about()
    {
        $profile = Profile::first();
        return view('about', compact('profile'));
    }

    public function skills()
    {
        $skills = Skill::all();
        return view('skills', compact('skills'));
    }

    public function projects()
    {
        $projects = Project::all();
        return view('projects', compact('projects'));
    }

    public function education()
    {
        $education = Education::all();
        return view('education', compact('education'));
    }

    public function contact()
    {
        $profile = Profile::first();
        return view('contact', compact('profile'));
    }

    public function certificates()
    {
        $certificates = \App\Models\Certificate::orderBy('issue_date', 'desc')->get();
        return view('certificates', compact('certificates'));
    }

    public function sendMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'attachment' => 'nullable|file|max:10240|mimes:pdf,doc,docx,jpg,jpeg,png,xls,xlsx,txt,zip',
        ], [
            'attachment.max' => 'File tidak boleh lebih dari 10MB',
            'attachment.mimes' => 'Format file tidak didukung. Gunakan: PDF, DOC, DOCX, JPG, PNG, XLS, XLSX, TXT, ZIP',
        ]);

        try {
            $data = [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'attachment_path' => null,
                'attachment_original_name' => null,
            ];

            // Handle file upload
            if ($request->hasFile('attachment')) {
                $file = $request->file('attachment');
                $filename = time() . '_' . preg_replace('/[^A-Za-z0-9._-]/', '', $file->getClientOriginalName());
                $path = $file->storeAs('contact-attachments', $filename, 'public');
                
                $data['attachment_path'] = $path;
                $data['attachment_original_name'] = $file->getClientOriginalName();
            }

            // Simpan pesan ke database
            $contact = Contact::create($data);

            // Try to send email, but don't fail if email service down
            try {
                // Kirim email ke pemilik website (Anda) dengan reply-to otomatis ke pengirim
                \Illuminate\Support\Facades\Mail::to(config('mail.from.address'))
                    ->send(new \App\Mail\ContactMail($data));

                // Kirim auto-reply ke pengirim
                \Illuminate\Support\Facades\Mail::to($validated['email'])
                    ->send(new \App\Mail\ContactAutoReplyMail($data));

                return back()->with('success', 'Pesan Anda berhasil dikirim! Saya akan segera membalasnya. Cek email Anda untuk konfirmasi.');
            } catch (\Exception $emailError) {
                // Email gagal tapi pesan sudah tersimpan di database
                \Illuminate\Support\Facades\Log::warning('Email send failed but message saved', [
                    'contact_id' => $contact->id,
                    'error' => $emailError->getMessage()
                ]);
                
                return back()->with('success', 'Pesan Anda berhasil disimpan! (Email notifikasi sedang diproses)');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Maaf, terjadi kesalahan saat mengirim pesan: ' . $e->getMessage() . '. Silakan coba lagi nanti atau hubungi via WhatsApp.');
        }
    }

    /**
     * Download attachment
     */
    public function downloadAttachment($contactId)
    {
        $contact = Contact::findOrFail($contactId);

        if (!$contact->attachment_path || !Storage::disk('public')->exists($contact->attachment_path)) {
            abort(404, 'File tidak ditemukan');
        }

        return Storage::disk('public')->download(
            $contact->attachment_path,
            $contact->attachment_original_name
        );
    }
}
