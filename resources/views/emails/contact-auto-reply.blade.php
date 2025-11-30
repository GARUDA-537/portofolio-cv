<!DOCTYPE html>
<html>
<head>
    <title>Terima Kasih - Pesan Anda Telah Diterima</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #eee; border-radius: 10px;">
        <h2 style="color: #28a745; border-bottom: 2px solid #28a745; padding-bottom: 10px;">✅ Terima Kasih!</h2>
        
        <p style="font-size: 1.1rem; color: #333;">
            Halo <strong>{{ $data['name'] }}</strong>,
        </p>

        <div style="background: #d4edda; padding: 15px; border-radius: 8px; margin: 20px 0; border-left: 4px solid #28a745;">
            <p style="margin: 0; font-size: 0.95rem; color: #155724;">
                ✓ Pesan Anda telah berhasil diterima dan saya akan membacanya dengan seksama.
            </p>
        </div>

        <p style="color: #555; margin: 15px 0;">
            Terima kasih telah menghubungi saya melalui website portofolio saya. Saya menghargai waktu Anda dan akan merespons secepat mungkin, biasanya dalam waktu 24 jam.
        </p>

        <div style="background: #f0f4ff; padding: 15px; border-radius: 8px; margin: 20px 0; border-left: 4px solid #667eea;">
            <p style="margin: 0 0 10px; font-weight: 600; color: #667eea;">📋 Ringkasan Pesan Anda:</p>
            <table style="width: 100%; border-collapse: collapse; font-size: 0.95rem;">
                <tr>
                    <td style="padding: 8px; background: #f9f9f9; font-weight: bold; width: 100px;">Subjek:</td>
                    <td style="padding: 8px;">{{ $data['subject'] }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px; background: #f9f9f9; font-weight: bold;">Email:</td>
                    <td style="padding: 8px;">{{ $data['email'] }}</td>
                </tr>
                @if(isset($data['attachment_original_name']))
                <tr>
                    <td style="padding: 8px; background: #f9f9f9; font-weight: bold;">Lampiran:</td>
                    <td style="padding: 8px;">📎 {{ $data['attachment_original_name'] }}</td>
                </tr>
                @endif
            </table>
        </div>

        <p style="color: #555; margin: 15px 0;">
            Berikut adalah pilihan lain untuk menghubungi saya jika Anda ingin komunikasi lebih cepat:
        </p>

        <ul style="color: #555; margin: 15px 0; padding-left: 20px;">
            <li style="margin: 8px 0;">
                <strong>WhatsApp:</strong> Hubungi saya langsung untuk respons yang lebih cepat
            </li>
            <li style="margin: 8px 0;">
                <strong>LinkedIn:</strong> Kirimkan pesan melalui LinkedIn untuk diskusi profesional
            </li>
            <li style="margin: 8px 0;">
                <strong>Email:</strong> Saya akan membalas email Anda secepat mungkin
            </li>
        </ul>

        <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee; text-align: center;">
            <p style="margin: 0; font-size: 0.9rem; color: #888;">
                Salam,<br>
                <strong style="color: #667eea;">Moch. Farel Islami Akbar</strong><br>
                <span style="font-size: 0.85rem; color: #999;">Web Developer | Portfolio</span>
            </p>
        </div>

        <p style="margin-top: 30px; font-size: 0.75rem; color: #999; text-align: center; border-top: 1px solid #eee; padding-top: 15px;">
            Email ini dikirim otomatis. Jangan membalas email ini. Silakan gunakan tombol reply di email sebelumnya atau hubungi saya melalui formulir kontak.
        </p>
    </div>
</body>
</html>
