@extends('layouts.app')

@section('title', 'Tentang Saya - Moch. Farel Islami Akbar')

@section('extra-styles')
<style>
    .about-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .about-header img {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid #667eea;
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
        margin-bottom: 1.5rem;
        transition: transform 0.3s ease;
    }

    .about-header img:hover {
        transform: scale(1.05) rotate(5deg);
    }

    .about-content {
        font-size: 1.1rem;
        line-height: 1.8;
        text-align: justify;
        margin-bottom: 2rem;
    }

    .about-content p {
        margin-bottom: 1.5rem;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin: 2rem 0;
    }

    .info-item {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
        padding: 1.5rem;
        border-radius: 10px;
        border-left: 4px solid #667eea;
        transition: all 0.3s ease;
    }

    .info-item:hover {
        transform: translateX(5px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.2);
    }

    .info-item strong {
        color: #667eea;
        font-size: 1.1rem;
        display: block;
        margin-bottom: 0.5rem;
    }

    .values-section {
        margin-top: 3rem;
    }

    .values-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .value-card {
        text-align: center;
        padding: 2rem 1rem;
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }

    .value-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
    }

    .value-icon {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }

    .value-card h3 {
        color: #667eea;
        margin-bottom: 0.5rem;
        font-size: 1.2rem;
    }

    .value-card p {
        color: #666;
        font-size: 0.95rem;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="about-header">
        <!-- Placeholder untuk foto profil -->
        <div style="width: 200px; height: 200px; margin: 0 auto 1.5rem; border-radius: 50%; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; font-size: 5rem; color: white; box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);">
            👨‍💻
        </div>
        <h1>{{ $profile->name ?? 'Moch. Farel Islami Akbar' }}</h1>
        <p style="font-size: 1.3rem; color: #667eea; font-weight: 600;">
            {{ $profile->title ?? 'Teknisi Komputer dan Jaringan' }}
        </p>
    </div>

    <div class="about-content">
        <h2>🎓 Tentang Saya</h2>
        <p>{{ $profile->bio ?? 'Saya adalah lulusan Teknik Komputer dan Jaringan dengan keahlian dalam merancang infrastruktur jaringan kompleks dan pengembangan aplikasi web.' }}</p>
        
        <div class="info-grid">
            @if($profile && $profile->education)
            <div class="info-item">
                <strong>📚 Pendidikan</strong>
                {{ $profile->education }}
            </div>
            @endif
            
            <div class="info-item">
                <strong>🎯 Fokus Keahlian</strong>
                <span>Jaringan Komputer & Pengembangan Web</span>
            </div>
            
            <div class="info-item">
                <strong>💼 Status</strong>
                <span>Mencari Peluang Magang & Pekerjaan</span>
            </div>
            
            <div class="info-item">
                <strong>🌟 Spesialisasi</strong>
                <span>VLAN, MikroTik, Full-Stack Development</span>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="values-section">
        <h2>💡 Nilai & Prinsip Kerja</h2>
        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon">🎯</div>
                <h3>Fokus pada Detail</h3>
                <p>Memperhatikan setiap aspek teknis untuk menghasilkan solusi yang berkualitas tinggi</p>
            </div>

            <div class="value-card">
                <div class="value-icon">📚</div>
                <h3>Pembelajaran Berkelanjutan</h3>
                <p>Selalu update dengan teknologi terbaru dan best practices di industri IT</p>
            </div>

            <div class="value-card">
                <div class="value-icon">🤝</div>
                <h3>Kolaborasi Tim</h3>
                <p>Bekerja sama dengan baik dalam tim untuk mencapai tujuan bersama</p>
            </div>

            <div class="value-card">
                <div class="value-icon">⚡</div>
                <h3>Efisiensi & Produktivitas</h3>
                <p>Menyelesaikan tugas dengan efisien tanpa mengorbankan kualitas hasil</p>
            </div>

            <div class="value-card">
                <div class="value-icon">🔒</div>
                <h3>Keamanan Prioritas</h3>
                <p>Selalu mempertimbangkan aspek keamanan dalam setiap implementasi</p>
            </div>

            <div class="value-card">
                <div class="value-icon">💻</div>
                <h3>Problem Solving</h3>
                <p>Kemampuan analitis yang kuat untuk menyelesaikan masalah teknis kompleks</p>
            </div>
        </div>
    </div>
</div>

<div class="container" style="background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);">
    <h2>🚀 Tujuan Karir</h2>
    <p style="font-size: 1.1rem; line-height: 1.8; text-align: justify;">
        Saya berkomitmen untuk mengembangkan karir di bidang teknologi informasi, 
        khususnya dalam infrastruktur jaringan dan pengembangan aplikasi web. 
        Tujuan jangka pendek saya adalah mendapatkan pengalaman praktis melalui 
        program magang atau pekerjaan entry-level di perusahaan yang dapat 
        memberikan kesempatan belajar dan berkembang. Dalam jangka panjang, 
        saya ingin menjadi ahli di bidang network engineering dan full-stack 
        development yang dapat memberikan kontribusi signifikan bagi organisasi 
        dan industri teknologi Indonesia.
    </p>
</div>
@endsection
