@extends('layouts.app')

@section('title', 'Kontak - Moch. Farel Islami Akbar')

@section('extra-styles')
<style>
    .contact-intro {
        text-align: center;
        margin-bottom: 3rem;
    }

    .contact-wrapper {
        display: grid;
        grid-template-columns: 1fr 1.5fr;
        gap: 3rem;
        align-items: start;
    }

    .contact-info-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 2.5rem;
        border-radius: 20px;
        color: white;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
    }

    .contact-info-item {
        margin-bottom: 2rem;
        display: flex;
        align-items: flex-start;
        gap: 1rem;
    }

    .contact-icon {
        font-size: 1.5rem;
        background: rgba(255, 255, 255, 0.2);
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        flex-shrink: 0;
    }

    .contact-details h3 {
        color: white;
        font-size: 1.2rem;
        margin-bottom: 0.3rem;
        border-bottom: none;
    }

    .contact-details p {
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.95rem;
    }

    .social-links {
        display: flex;
        gap: 1rem;
        margin-top: 3rem;
    }

    .social-btn {
        width: 45px;
        height: 45px;
        background: white;
        color: #667eea;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 1.2rem;
    }

    .social-btn:hover {
        transform: translateY(-5px);
        background: #f0f0f0;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }

    .contact-form {
        background: white;
        padding: 2.5rem;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        color: #2c3e50;
        font-weight: 600;
    }

    .form-control {
        width: 100%;
        padding: 0.8rem 1rem;
        border: 2px solid #e0e0e0;
        border-radius: 10px;
        font-family: inherit;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    textarea.form-control {
        resize: vertical;
        min-height: 150px;
    }

    .submit-btn {
        width: 100%;
        padding: 1rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }

    .wa-link {
        color: white;
        text-decoration: none;
        border-bottom: 1px dashed rgba(255,255,255,0.5);
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .wa-link:hover {
        color: #25D366;
        background: white;
        padding: 0 5px;
        border-radius: 4px;
        border-bottom: none;
    }

    @media (max-width: 768px) {
        .contact-wrapper {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="contact-intro">
        <h1>📬 Hubungi Saya</h1>
        <p style="font-size: 1.1rem; color: #666; max-width: 700px; margin: 1rem auto;">
            Tertarik untuk berkolaborasi atau memiliki pertanyaan? Jangan ragu untuk menghubungi saya.
            Saya selalu terbuka untuk diskusi mengenai peluang karir dan proyek menarik.
        </p>
    </div>

    <div class="contact-wrapper">
        <div class="contact-info-card">
            <div class="contact-info-item">
                <div class="contact-icon">📍</div>
                <div class="contact-details">
                    <h3>Lokasi</h3>
                    <p>{{ $profile->address ?? 'Indonesia' }}</p>
                </div>
            </div>

            <div class="contact-info-item">
                <div class="contact-icon">📧</div>
                <div class="contact-details">
                    <h3>Email</h3>
                    <a href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $profile->email ?? 'moch.farelislamiakbar.31@gmail.com' }}" target="_blank" style="color: white; text-decoration: none; border-bottom: 1px dashed rgba(255,255,255,0.5); transition: all 0.3s ease; font-weight: 500;" onmouseover="this.style.color='#ffd700'; this.style.background='white'; this.style.padding='0 5px'; this.style.borderRadius='4px'; this.style.borderBottom='none'" onmouseout="this.style.color='white'; this.style.background='none'; this.style.padding='0'; this.style.borderBottom='1px dashed rgba(255,255,255,0.5)'">
                        {{ $profile->email ?? 'moch.farelislamiakbar.31@gmail.com' }}
                    </a>
                    <p style="font-size: 0.8rem; margin-top: 0.5rem; opacity: 0.8;">Klik untuk buka Gmail</p>
                </div>
            </div>

            <div class="contact-info-item">
                <div class="contact-icon" style="background: #25D366;">
                    <!-- WhatsApp SVG Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="white"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                </div>
                <div class="contact-details">
                    <h3>WhatsApp</h3>
                    <a href="https://wa.me/qr/2LDX5BVSYAA7E1" target="_blank" class="wa-link">
                        {{ $profile->phone ?? '+62 8xx-xxxx-xxxx' }}
                    </a>
                    <div style="margin-top: 1rem;">
                        <img src="{{ asset('images/wa-qr.jpg') }}" alt="WhatsApp QR Code" style="width: 150px; border-radius: 10px; border: 4px solid white;">
                        <p style="font-size: 0.8rem; margin-top: 0.5rem; opacity: 0.8;">Scan untuk chat</p>
                    </div>
                </div>
            </div>

            <div class="social-links">
                <a href="#" class="social-btn" title="LinkedIn">in</a>
                <a href="#" class="social-btn" title="GitHub">gh</a>
                <a href="#" class="social-btn" title="Instagram">ig</a>
            </div>
        </div>

        <div class="contact-form">
            <h2 style="margin-bottom: 1.5rem;">Kirim Pesan</h2>
            
            @if(session('success'))
                <div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 10px; margin-bottom: 1.5rem; border: 1px solid #c3e6cb;">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 10px; margin-bottom: 1.5rem; border: 1px solid #f5c6cb;">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('contact.send') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" placeholder="Masukkan nama Anda" required value="{{ old('name') }}">
                </div>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="nama@email.com" required value="{{ old('email') }}">
                </div>

                <div class="form-group">
                    <label class="form-label">Subjek</label>
                    <input type="text" name="subject" class="form-control" placeholder="Tujuan pesan" required value="{{ old('subject') }}">
                </div>

                <div class="form-group">
                    <label class="form-label">Pesan</label>
                    <textarea name="message" class="form-control" placeholder="Tuliskan pesan Anda di sini..." required>{{ old('message') }}</textarea>
                </div>

                <button type="submit" class="submit-btn">Kirim Pesan</button>
            </form>
            
            <div style="margin-top: 1.5rem; padding: 1rem; background: #f0f4ff; border-radius: 10px; text-align: center; border-left: 4px solid #667eea;">
                <p style="margin: 0; font-size: 0.9rem; color: #666;">
                    💡 <strong>Atau</strong> klik alamat email di sebelah kiri untuk langsung buka Gmail
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container" style="text-align: center; margin-top: 3rem;">
    <h2>📄 Unduh CV</h2>
    <p style="color: #666; margin-bottom: 1.5rem;">
        Dapatkan versi lengkap CV saya dalam format PDF untuk informasi lebih detail.
    </p>
    <button class="btn" onclick="alert('Fitur unduh CV akan segera tersedia!')">
        <span style="margin-right: 0.5rem;">📥 Unduh CV (PDF)</span>
    </button>
</div>
@endsection
