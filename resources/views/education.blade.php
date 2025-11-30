@extends('layouts.app')

@section('title', 'Pendidikan - Moch. Farel Islami Akbar')

@section('extra-styles')
<style>
    .education-intro {
        text-align: center;
        margin-bottom: 4rem;
    }

    .timeline {
        position: relative;
        max-width: 800px;
        margin: 0 auto;
        padding: 2rem 0;
    }

    .timeline::after {
        content: '';
        position: absolute;
        width: 4px;
        background: linear-gradient(180deg, #667eea 0%, #764ba2 100%);
        top: 0;
        bottom: 0;
        left: 50%;
        margin-left: -2px;
        border-radius: 2px;
    }

    .timeline-item {
        padding: 10px 40px;
        position: relative;
        background-color: inherit;
        width: 50%;
        box-sizing: border-box;
        animation: fadeInUp 0.8s ease-out;
    }

    .timeline-item::after {
        content: '';
        position: absolute;
        width: 20px;
        height: 20px;
        right: -10px;
        background-color: white;
        border: 4px solid #667eea;
        top: 25px;
        border-radius: 50%;
        z-index: 1;
        transition: all 0.3s ease;
    }

    .timeline-item:hover::after {
        background-color: #667eea;
        transform: scale(1.2);
    }

    .left {
        left: 0;
    }

    .right {
        left: 50%;
    }

    .left::before {
        content: " ";
        height: 0;
        position: absolute;
        top: 22px;
        width: 0;
        z-index: 1;
        right: 30px;
        border: medium solid white;
        border-width: 10px 0 10px 10px;
        border-color: transparent transparent transparent white;
    }

    .right::before {
        content: " ";
        height: 0;
        position: absolute;
        top: 22px;
        width: 0;
        z-index: 1;
        left: 30px;
        border: medium solid white;
        border-width: 10px 10px 10px 0;
        border-color: transparent white transparent transparent;
    }

    .right::after {
        left: -10px;
    }

    .content {
        padding: 2rem;
        background-color: white;
        position: relative;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }

    .content:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(102, 126, 234, 0.2);
    }

    .year-badge {
        display: inline-block;
        padding: 0.4rem 1.2rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 20px;
        font-weight: bold;
        margin-bottom: 1rem;
        font-size: 0.9rem;
    }

    .school-name {
        font-size: 1.5rem;
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }

    .major {
        color: #667eea;
        font-weight: 600;
        margin-bottom: 1rem;
        font-size: 1.1rem;
    }

    .description {
        color: #666;
        line-height: 1.6;
    }

    @media (max-width: 768px) {
        .timeline::after {
            left: 31px;
        }

        .timeline-item {
            width: 100%;
            padding-left: 70px;
            padding-right: 25px;
        }

        .timeline-item::before {
            left: 60px;
            border: medium solid white;
            border-width: 10px 10px 10px 0;
            border-color: transparent white transparent transparent;
        }

        .left::after, .right::after {
            left: 21px;
        }

        .right {
            left: 0%;
        }
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="education-intro">
        <h1>🎓 Riwayat Pendidikan</h1>
        <p style="font-size: 1.1rem; color: #666; max-width: 700px; margin: 1rem auto;">
            Perjalanan akademis saya dalam menuntut ilmu dan mengembangkan keahlian 
            di bidang teknologi informasi.
        </p>
    </div>

    <div class="timeline">
        @forelse($education as $index => $edu)
        <div class="timeline-item {{ $index % 2 == 0 ? 'left' : 'right' }}">
            <div class="content">
                <span class="year-badge">{{ $edu->start_year }} - {{ $edu->end_year ?? 'Sekarang' }}</span>
                <h2 class="school-name">{{ $edu->school }}</h2>
                <div class="major">{{ $edu->major }}</div>
                @if($edu->degree)
                <p class="description">
                    <strong>Tingkat:</strong> {{ $edu->degree }}<br>
                    Fokus pada pembelajaran infrastruktur jaringan, konfigurasi perangkat keras, 
                    dan pengembangan perangkat lunak dasar.
                </p>
                @endif
            </div>
        </div>
        @empty
        <div class="container" style="text-align: center;">
            <p style="font-size: 1.2rem; color: #666;">
                Belum ada data pendidikan. Silakan jalankan seeder database.
            </p>
        </div>
        @endforelse
    </div>
</div>

<div class="container" style="background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%); margin-top: 3rem;">
    <h2>🏆 Pencapaian Akademis</h2>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; margin-top: 2rem;">
        <div style="background: white; padding: 1.5rem; border-radius: 10px; border-left: 4px solid #667eea;">
            <h3 style="color: #2c3e50; font-size: 1.2rem; margin-bottom: 0.5rem;">Praktikum Jaringan</h3>
            <p style="color: #666;">Berhasil merancang topologi jaringan kompleks dengan nilai sangat memuaskan.</p>
        </div>
        
        <div style="background: white; padding: 1.5rem; border-radius: 10px; border-left: 4px solid #667eea;">
            <h3 style="color: #2c3e50; font-size: 1.2rem; margin-bottom: 0.5rem;">Proyek Web</h3>
            <p style="color: #666;">Mengembangkan aplikasi web fungsional sebagai tugas akhir semester.</p>
        </div>
        
        <div style="background: white; padding: 1.5rem; border-radius: 10px; border-left: 4px solid #667eea;">
            <h3 style="color: #2c3e50; font-size: 1.2rem; margin-bottom: 0.5rem;">Keaktifan</h3>
            <p style="color: #666;">Aktif dalam kegiatan ekstrakurikuler berbasis teknologi dan komputer.</p>
        </div>
    </div>
</div>
@endsection
