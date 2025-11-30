<!DOCTYPE html>
<html>
<head>
    <title>Pesan Baru dari Portofolio</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #eee; border-radius: 10px;">
        <h2 style="color: #667eea; border-bottom: 2px solid #667eea; padding-bottom: 10px;">📬 Pesan Baru dari Website Portofolio</h2>
        
        <div style="background: #f0f4ff; padding: 15px; border-radius: 8px; margin: 20px 0; border-left: 4px solid #667eea;">
            <p style="margin: 0; font-size: 14px; color: #666;">💡 <strong>Tip:</strong> Klik tombol "Reply" / "Balas" untuk membalas langsung ke pengirim!</p>
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
        </table>

        <div style="margin-top: 20px; background: #f0f4ff; padding: 15px; border-radius: 5px; border-left: 4px solid #667eea;">
            <strong>Pesan:</strong><br>
            <p style="margin-top: 10px; white-space: pre-wrap;">{{ $data['message'] }}</p>
        </div>

        <p style="margin-top: 30px; font-size: 0.8rem; color: #888; text-align: center;">
            Email ini dikirim otomatis dari website portofolio Anda.
        </p>
    </div>
</body>
</html>
