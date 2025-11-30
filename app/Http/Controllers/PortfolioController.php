<?php


namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Education;
use Illuminate\Http\Request;

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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        // Kirim email ke pemilik website (Anda)
        // Pastikan Anda sudah mengatur konfigurasi SMTP di .env
        try {
            \Illuminate\Support\Facades\Mail::to('moch.farelislamiakbar.31@gmail.com')->send(new \App\Mail\ContactMail($data));
            return back()->with('success', 'Pesan Anda berhasil dikirim! Saya akan segera membalasnya.');
        } catch (\Exception $e) {
            return back()->with('error', 'Maaf, terjadi kesalahan saat mengirim pesan. Silakan coba lagi nanti atau hubungi via WhatsApp.');
        }
    }
}
