@extends('layouts.app')

@section('title', 'Beranda - Portofolio CV Moch. Farel Islami Akbar')

@section('extra-styles')
<style>
    .hero-section {
        text-align: center;
        padding: 4rem 2rem;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
        border-radius: 20px;
        margin-bottom: 3rem;
    }

    .hero-title {
        font-size: 3.5rem;
        margin-bottom: 0.5rem;
        animation: fadeInUp 0.8s ease-out;
        color: #ffffff;
        -webkit-text-fill-color: #ffffff;
        background: none;
    }

    .hero-subtitle {
        font-size: 1.5rem;
        color: #e0e0e0;
        font-weight: 600;
        margin-bottom: 1rem;
        animation: fadeInUp 0.8s ease-out 0.2s both;
    }

    .hero-tagline {
        font-size: 1.2rem;
        color: #f0f0f0;
        margin-bottom: 2rem;
        animation: fadeInUp 0.8s ease-out 0.4s both;
    }

    .hero-buttons {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
        animation: fadeInUp 0.8s ease-out 0.6s both;
    }

    .btn-secondary {
        background: white;
        color: #667eea;
        border: 2px solid #667eea;
    }

    .btn-secondary:hover {
        background: #667eea;
        color: white;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    .feature-card {
        background: white;
        padding: 2rem;
        border-radius: 15px;
        text-align: center;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .feature-card:hover {
        border-color: #667eea;
        transform: translateY(-10px);
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
    }

    .feature-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
        display: inline-block;
        animation: pulse 2s infinite;
    }

    .feature-card h3 {
        color: #667eea;
        margin-bottom: 0.5rem;
    }

    .feature-card p {
        color: #666;
        line-height: 1.6;
    }

    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }

        .hero-subtitle {
            font-size: 1.2rem;
        }

        .hero-tagline {
            font-size: 1rem;
        }

        .features-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
<div class="hero-section">
    <h1 class="hero-title">{{ $profile->name ?? 'Moch. Farel Islami Akbar' }}</h1>
    <p class="hero-subtitle">{{ $profile->title ?? 'Teknisi Komputer dan Jaringan' }}</p>
    <p class="hero-tagline">{{ $profile->tagline ?? 'Spesialis Jaringan & Frontend Developer' }}</p>
    
    <div class="hero-buttons">
        <a href="{{ route('about') }}" class="btn">Tentang Saya</a>
        <a href="{{ route('projects') }}" class="btn btn-secondary">Lihat Proyek</a>
        <a href="{{ route('contact') }}" class="btn btn-secondary">Hubungi Saya</a>
    </div>
</div>

<div class="container">
    <h2>🎯 Spesialisasi Saya</h2>
    <div class="features-grid">
        <div class="feature-card">
            <div class="feature-icon">🌐</div>
            <h3>Jaringan Komputer</h3>
            <p>Keahlian dalam merancang dan mengonfigurasi jaringan kompleks dengan VLAN, routing statis, dan MikroTik untuk infrastruktur yang aman dan efisien.</p>
        </div>

        <div class="feature-card">
            <div class="feature-icon">💻</div>
            <h3>Pengembangan Web</h3>
            <p>Pengalaman dalam mengembangkan aplikasi web modern menggunakan PHP, MySQL, HTML, CSS, dan JavaScript dengan fokus pada user experience.</p>
        </div>

        <div class="feature-card">
            <div class="feature-icon">🔒</div>
            <h3>Keamanan Jaringan</h3>
            <p>Implementasi praktik terbaik dalam keamanan jaringan untuk melindungi data dan sistem dari ancaman cyber.</p>
        </div>
    </div>
</div>

<div class="container">
    <h2>📚 Pendidikan</h2>
    <p style="font-size: 1.1rem; line-height: 1.8;">
        <strong>{{ $profile->education ?? 'SMK Negeri 2 Surabaya - Teknik Komputer dan Jaringan' }}</strong><br>
        Saya sedang menempuh pendidikan di bidang Teknik Komputer dan Jaringan, 
        dimana saya mempelajari konsep-konsep fundamental dalam infrastruktur IT, 
        jaringan komputer, serta pengembangan aplikasi web.
    </p>
</div>

<div class="container" style="text-align: center; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
    <h2 style="color: white; border-bottom-color: white;">💼 Siap Bekerja Sama?</h2>
    <p style="font-size: 1.2rem; margin-bottom: 2rem;">
        Saya terbuka untuk peluang magang dan pekerjaan di bidang jaringan komputer dan pengembangan web.
    </p>
    <a href="{{ route('contact') }}" class="btn" style="background: white; color: #667eea;">
        Hubungi Saya Sekarang
    </a>
</div>
@endsection
