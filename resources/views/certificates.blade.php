@extends('layouts.app')

@section('title', 'Sertifikasi - Moch. Farel Islami Akbar')

@section('extra-styles')
<style>
    .certificates-intro {
        text-align: center;
        margin-bottom: 3rem;
    }

    .category-filter {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-bottom: 3rem;
        flex-wrap: wrap;
    }

    .category-btn {
        padding: 0.6rem 1.5rem;
        background: white;
        border: 2px solid #667eea;
        color: #667eea;
        border-radius: 25px;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.3s ease;
        font-size: 1rem;
    }

    .category-btn:hover {
        background: rgba(102, 126, 234, 0.1);
        transform: translateY(-2px);
    }

    .category-btn.active {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
    }

    .certificates-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 2rem;
    }

    .certificate-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        border: 2px solid transparent;
        display: flex;
        flex-direction: column;
    }

    .certificate-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 30px rgba(102, 126, 234, 0.3);
        border-color: #667eea;
    }

    .certificate-image {
        width: 100%;
        height: 250px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4rem;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .certificate-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .certificate-badge {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: white;
        color: #667eea;
        padding: 0.4rem 1rem;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    }

    .certificate-content {
        padding: 1.5rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .certificate-title {
        font-size: 1.3rem;
        color: #2c3e50;
        margin-bottom: 0.5rem;
        font-weight: 700;
    }

    .certificate-issuer {
        color: #667eea;
        font-weight: 600;
        margin-bottom: 0.5rem;
        font-size: 1rem;
    }

    .certificate-date {
        color: #999;
        font-size: 0.9rem;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .certificate-description {
        color: #666;
        line-height: 1.6;
        margin-bottom: 1rem;
        flex-grow: 1;
    }

    .certificate-footer {
        display: flex;
        gap: 1rem;
        margin-top: auto;
        padding-top: 1rem;
        border-top: 1px solid #f0f0f0;
    }

    .credential-id {
        font-size: 0.85rem;
        color: #999;
        font-family: monospace;
        background: #f5f5f5;
        padding: 0.3rem 0.6rem;
        border-radius: 5px;
    }

    .verify-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        text-decoration: none;
        border-radius: 20px;
        font-size: 0.9rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .verify-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
    }

    .expired-badge {
        background: #ff6b6b;
        color: white;
    }

    .no-certificates {
        text-align: center;
        padding: 3rem;
        color: #999;
        font-size: 1.1rem;
    }

    @media (max-width: 768px) {
        .certificates-grid {
            grid-template-columns: 1fr;
        }

        .certificate-image {
            height: 200px;
            font-size: 3rem;
        }
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="certificates-intro">
        <h1>🏆 Sertifikasi Saya</h1>
        <p style="font-size: 1.1rem; color: #666; max-width: 800px; margin: 1rem auto;">
            Berikut adalah sertifikat-sertifikat yang telah saya peroleh sebagai bukti 
            kompetensi dan dedikasi saya dalam mengembangkan keahlian di bidang teknologi informasi.
        </p>
    </div>

    <div class="category-filter">
        <button class="category-btn active" onclick="filterCertificates('all')">
            📋 Semua Sertifikat
        </button>
        <button class="category-btn" onclick="filterCertificates('Jaringan')">
            🌐 Jaringan
        </button>
        <button class="category-btn" onclick="filterCertificates('Web Development')">
            💻 Web Development
        </button>
        <button class="category-btn" onclick="filterCertificates('Keamanan')">
            🔒 Keamanan
        </button>
        <button class="category-btn" onclick="filterCertificates('Umum')">
            🎓 Umum
        </button>
    </div>

    <div class="certificates-grid" id="certificatesGrid">
        @forelse($certificates as $certificate)
        <div class="certificate-card" data-category="{{ $certificate->category }}">
            <div class="certificate-image">
                @if($certificate->image_path)
                    <img src="{{ asset($certificate->image_path) }}" alt="{{ $certificate->title }}">
                @else
                    🎓
                @endif
                <span class="certificate-badge {{ $certificate->isExpired() ? 'expired-badge' : '' }}">
                    {{ $certificate->category }}
                </span>
            </div>
            
            <div class="certificate-content">
                <h3 class="certificate-title">{{ $certificate->title }}</h3>
                <div class="certificate-issuer">{{ $certificate->issuer }}</div>
                
                <div class="certificate-date">
                    📅 {{ $certificate->formatted_issue_date }}
                    @if($certificate->expiry_date)
                        - {{ $certificate->expiry_date->format('F Y') }}
                        @if($certificate->isExpired())
                            <span style="color: #ff6b6b; font-weight: 600;">(Kadaluarsa)</span>
                        @endif
                    @else
                        <span style="color: #4CAF50; font-weight: 600;">(Selamanya)</span>
                    @endif
                </div>
                
                @if($certificate->description)
                <p class="certificate-description">{{ $certificate->description }}</p>
                @endif
                
                <div class="certificate-footer">
                    @if($certificate->credential_id)
                    <div style="flex-grow: 1;">
                        <div style="font-size: 0.8rem; color: #999; margin-bottom: 0.3rem;">ID Kredensial:</div>
                        <div class="credential-id">{{ $certificate->credential_id }}</div>
                    </div>
                    @endif
                    
                    @if($certificate->url)
                    <a href="{{ $certificate->url }}" target="_blank" class="verify-btn">
                        🔍 Verifikasi
                    </a>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="no-certificates">
            <p>Belum ada sertifikat yang ditambahkan.</p>
        </div>
        @endforelse
    </div>
</div>

<div class="container" style="background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);">
    <h2>📈 Komitmen Pembelajaran Berkelanjutan</h2>
    <p style="font-size: 1.1rem; line-height: 1.8;">
        Saya percaya bahwa pembelajaran adalah proses yang tidak pernah berhenti. 
        Setiap sertifikat yang saya peroleh merupakan bukti dari dedikasi saya untuk 
        terus meningkatkan kompetensi dan mengikuti perkembangan teknologi terkini. 
        Saya berkomitmen untuk terus menambah pengetahuan dan keterampilan melalui 
        pelatihan, kursus, dan sertifikasi profesional di masa mendatang.
    </p>
</div>

<script>
    function filterCertificates(category) {
        const cards = document.querySelectorAll('.certificate-card');
        const buttons = document.querySelectorAll('.category-btn');
        
        // Update active button
        buttons.forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');
        
        // Filter cards
        cards.forEach(card => {
            if (category === 'all' || card.dataset.category === category) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }
</script>
@endsection
