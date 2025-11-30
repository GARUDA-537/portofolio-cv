@extends('layouts.app')

@section('title', 'Proyek - Moch. Farel Islami Akbar')

@section('extra-styles')
<style>
    .projects-intro {
        text-align: center;
        margin-bottom: 3rem;
    }

    .projects-grid {
        display: grid;
        gap: 3rem;
    }

    .project-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .project-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 30px rgba(102, 126, 234, 0.3);
        border-color: #667eea;
    }

    .project-image {
        width: 100%;
        height: 300px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 5rem;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .project-image::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        animation: rotate 20s linear infinite;
    }

    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }

    .project-content {
        padding: 2rem;
    }

    .project-title {
        font-size: 1.8rem;
        color: #2c3e50;
        margin-bottom: 1rem;
    }

    .project-tech {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-bottom: 1.5rem;
    }

    .tech-tag {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
        color: #667eea;
        padding: 0.4rem 1rem;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
        border: 1px solid #667eea;
    }

    .project-description {
        line-height: 1.8;
        color: #666;
        margin-bottom: 1.5rem;
        text-align: justify;
    }

    .project-meta {
        display: flex;
        gap: 2rem;
        padding-top: 1rem;
        border-top: 2px solid #f0f0f0;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #667eea;
        font-weight: 600;
    }

    .meta-icon {
        font-size: 1.2rem;
    }

    .project-number {
        position: absolute;
        top: 1rem;
        right: 1rem;
        width: 50px;
        height: 50px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        font-weight: bold;
        color: #667eea;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        z-index: 10;
    }

    @media (max-width: 768px) {
        .project-image {
            height: 200px;
            font-size: 3rem;
        }

        .project-title {
            font-size: 1.5rem;
        }

        .project-meta {
            flex-direction: column;
            gap: 1rem;
        }
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="projects-intro">
        <h1>🚀 Proyek Saya</h1>
        <p style="font-size: 1.1rem; color: #666; max-width: 800px; margin: 1rem auto;">
            Berikut adalah beberapa proyek yang telah saya kerjakan selama pendidikan 
            di bidang Teknik Komputer dan Jaringan. Setiap proyek memberikan pengalaman 
            berharga dan memperdalam pemahaman saya tentang teknologi.
        </p>
    </div>

    <div class="projects-grid">
        @forelse($projects as $index => $project)
        <div class="project-card">
            <div class="project-image" style="{{ $project->image_path ? 'background: url('.asset($project->image_path).') center/cover no-repeat;' : '' }}">
                @if(!$project->image_path)
                    <span class="project-number">{{ $index + 1 }}</span>
                    @if($project->title == 'Simulasi Jaringan Kompleks Multi-Departemen')
                        🌐
                    @else
                        💻
                    @endif
                @endif
            </div>
            
            <div class="project-content">
                <h2 class="project-title">{{ $project->title }}</h2>
                
                <div class="project-tech">
                    @foreach(explode(', ', $project->technology) as $tech)
                    <span class="tech-tag">{{ $tech }}</span>
                    @endforeach
                </div>
                
                <div class="project-description">
                    {!! Str::limit(strip_tags($project->description), 150) !!}
                </div>
                
                <div class="project-meta">
                    <div class="meta-item">
                        <span class="meta-icon">📅</span>
                        <span>{{ $project->created_at->format('Y') }}</span>
                    </div>
                    <div class="meta-item">
                        <button onclick="openModal('{{ $project->id }}')" class="btn-detail">
                            🔍 Lihat Detail
                        </button>
                    </div>
                    @if($project->url)
                    <div class="meta-item">
                        <span class="meta-icon">🔗</span>
                        <a href="{{ $project->url }}" target="_blank" style="color: #667eea; text-decoration: none;">
                            Demo
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Modal for Project {{ $project->id }} -->
        <div id="modal-{{ $project->id }}" class="modal">
            <div class="modal-content">
                <span class="close-modal" onclick="closeModal('{{ $project->id }}')">&times;</span>
                <h2 style="color: #667eea; margin-bottom: 1rem;">{{ $project->title }}</h2>
                @if($project->image_path)
                    <img src="{{ asset($project->image_path) }}" alt="{{ $project->title }}" style="width: 100%; max-height: 400px; object-fit: contain; margin-bottom: 1.5rem; border-radius: 10px; border: 1px solid #eee;">
                @endif
                <div class="modal-body" style="text-align: left; line-height: 1.8; color: #444;">
                    {!! $project->description !!}
                </div>
            </div>
        </div>
        @empty
        <div class="container" style="text-align: center;">
            <p style="font-size: 1.2rem; color: #666;">
                Belum ada data proyek. Silakan jalankan seeder database.
            </p>
        </div>
        @endforelse
    </div>
</div>

<!-- Modal Styles & Scripts -->
<style>
    .btn-detail {
        background: none;
        border: 2px solid #667eea;
        color: #667eea;
        padding: 0.3rem 0.8rem;
        border-radius: 20px;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.3s;
    }
    
    .btn-detail:hover {
        background: #667eea;
        color: white;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 2000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.8);
        backdrop-filter: blur(5px);
        animation: fadeIn 0.3s;
    }

    .modal-content {
        background-color: #fefefe;
        margin: 5% auto;
        padding: 2.5rem;
        border: 1px solid #888;
        width: 80%;
        max-width: 900px;
        border-radius: 15px;
        position: relative;
        animation: slideUp 0.4s;
    }

    .close-modal {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
        transition: color 0.3s;
    }

    .close-modal:hover,
    .close-modal:focus {
        color: #667eea;
        text-decoration: none;
    }

    /* List Styles inside Modal */
    .modal-body ul {
        list-style-type: disc;
        margin-left: 1.5rem;
        margin-bottom: 1rem;
    }
    
    .modal-body h4 {
        color: #2c3e50;
        margin-top: 1.5rem;
        margin-bottom: 0.5rem;
        font-size: 1.2rem;
        border-bottom: 2px solid #eee;
        padding-bottom: 0.3rem;
    }

    @keyframes fadeIn {
        from {opacity: 0}
        to {opacity: 1}
    }

    @keyframes slideUp {
        from {transform: translateY(50px); opacity: 0;}
        to {transform: translateY(0); opacity: 1;}
    }
</style>

<script>
    function openModal(id) {
        document.getElementById('modal-' + id).style.display = "block";
        document.body.style.overflow = "hidden"; // Prevent scrolling
    }

    function closeModal(id) {
        document.getElementById('modal-' + id).style.display = "none";
        document.body.style.overflow = "auto"; // Enable scrolling
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        if (event.target.classList.contains('modal')) {
            event.target.style.display = "none";
            document.body.style.overflow = "auto";
        }
    }
</script>


<div class="container" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
    <h2 style="color: white; border-bottom-color: white;">💡 Metodologi Pengerjaan</h2>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem; margin-top: 2rem;">
        <div style="text-align: center;">
            <div style="font-size: 3rem; margin-bottom: 1rem;">📋</div>
            <h3 style="margin-bottom: 0.5rem;">Perencanaan</h3>
            <p style="opacity: 0.9;">Analisis kebutuhan dan desain arsitektur</p>
        </div>
        
        <div style="text-align: center;">
            <div style="font-size: 3rem; margin-bottom: 1rem;">⚙️</div>
            <h3 style="margin-bottom: 0.5rem;">Implementasi</h3>
            <p style="opacity: 0.9;">Pengembangan dengan best practices</p>
        </div>
        
        <div style="text-align: center;">
            <div style="font-size: 3rem; margin-bottom: 1rem;">🧪</div>
            <h3 style="margin-bottom: 0.5rem;">Testing</h3>
            <p style="opacity: 0.9;">Pengujian menyeluruh dan debugging</p>
        </div>
        
        <div style="text-align: center;">
            <div style="font-size: 3rem; margin-bottom: 1rem;">📚</div>
            <h3 style="margin-bottom: 0.5rem;">Dokumentasi</h3>
            <p style="opacity: 0.9;">Dokumentasi teknis yang lengkap</p>
        </div>
    </div>
</div>

<div class="container">
    <h2>🎯 Pembelajaran dari Proyek</h2>
    <div style="line-height: 1.8; color: #666;">
        <p style="margin-bottom: 1rem;">
            Melalui proyek-proyek ini, saya telah memperoleh berbagai pengalaman berharga:
        </p>
        <ul style="margin-left: 2rem; line-height: 2;">
            <li>✅ Kemampuan merancang infrastruktur jaringan yang kompleks dan terstruktur</li>
            <li>✅ Pemahaman mendalam tentang VLAN, routing, dan konfigurasi perangkat jaringan</li>
            <li>✅ Pengalaman dalam pengembangan aplikasi web full-stack dengan database relasional</li>
            <li>✅ Keterampilan problem-solving dalam mengatasi tantangan teknis</li>
            <li>✅ Kemampuan mendokumentasikan proyek secara profesional</li>
            <li>✅ Pengalaman dalam mengelola waktu dan prioritas dalam pengerjaan proyek</li>
        </ul>
    </div>
</div>
@endsection
