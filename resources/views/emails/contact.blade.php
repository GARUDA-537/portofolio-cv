<!DOCTYPE html>
<html>
<head>
    <title>Pesan Baru dari Portofolio</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #eee; border-radius: 10px;">
        <h2 style="color: #667eea; border-bottom: 2px solid #667eea; padding-bottom: 10px;">📬 Pesan Baru dari Website Portofolio</h2>
        
        <div style="background: #f0f4ff; padding: 15px; border-radius: 8px; margin: 20px 0; border-left: 4px solid #667eea;">
            <p style="margin: 0; font-size: 14px; color: #666;">💡 <strong>Tip:</strong> Klik tombol "Reply" / "Balas" untuk membalas langsung ke pengirim atau gunakan tombol reply-to di bawah!</p>
        </div>
        
        <p>Halo Farel, Anda menerima pesan baru dari pengunjung website:</p>
        
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <tr>
                <td style="padding: 10px; background: #f9f9f9; font-weight: bold; width: 120px;">Dari:</td>
                <td style="padding: 10px; background: #fffbea;">
                    <strong style="color: #667eea; font-size: 16px;">{{ $data['name'] }}</strong><br>
                    <a href="mailto:{{ $data['email'] }}" style="color: #667eea; text-decoration: none;">{{ $data['email'] }}</a>
                </td>
            </tr>
            <tr>
                <td style="padding: 10px; background: #f9f9f9; font-weight: bold;">Subjek:</td>
                <td style="padding: 10px;">{{ $data['subject'] }}</td>
            </tr>
            @if(isset($data['attachment_path']))
            <tr>
                <td style="padding: 10px; background: #f9f9f9; font-weight: bold;">Lampiran:</td>
                <td style="padding: 10px;">
                    <strong style="color: #28a745;">📎 {{ $data['attachment_original_name'] }}</strong>
                </td>
            </tr>
            @endif
        </table>

        <div style="margin-top: 20px; background: #f0f4ff; padding: 15px; border-radius: 5px; border-left: 4px solid #667eea;">
            <strong>Pesan:</strong><br>
            <p style="margin-top: 10px; white-space: pre-wrap; word-wrap: break-word;">{{ $data['message'] }}</p>
        </div>

        <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #eee;">
            <p style="margin: 0; font-size: 0.9rem; color: #666;">
                <strong>Untuk membalas pengirim:</strong>
            </p>
            <p style="margin: 10px 0; font-size: 0.9rem; color: #666;">
                1. Klik tombol "Reply" di email ini, atau<br>
                2. Klik link di bawah untuk membuka email client Anda:
            </p>
            <p style="margin: 15px 0;">
                <a href="mailto:{{ $data['email'] }}?subject=Re: {{ urlencode($data['subject']) }}&body=Halo {{ $data['name'] }},%0A%0ASaya telah menerima pesan Anda tentang: {{ urlencode($data['subject']) }}%0A%0A%0A---" style="display: inline-block; padding: 12px 20px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; text-decoration: none; border-radius: 5px; font-weight: 600;">
                    ✉️ Balas Email
                </a>
            </p>
        </div>

        <p style="margin-top: 30px; font-size: 0.8rem; color: #888; text-align: center;">
            Email ini dikirim otomatis dari website portofolio Anda.<br>
            Pengirim akan menerima email konfirmasi otomatis bahwa pesan mereka telah diterima.
        </p>
    </div>
</body>
</html>
