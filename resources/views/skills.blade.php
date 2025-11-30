@extends('layouts.app')

@section('title', 'Keahlian - Moch. Farel Islami Akbar')

@section('extra-styles')
<style>
    .skills-intro {
        text-align: center;
        margin-bottom: 3rem;
    }

    .skills-categories {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-bottom: 3rem;
        flex-wrap: wrap;
    }

    .category-btn {
        padding: 0.8rem 2rem;
        background: white;
        border: 2px solid #667eea;
        color: #667eea;
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 600;
        font-family: 'Times New Roman', Times, serif;
    }

    .category-btn:hover,
    .category-btn.active {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
    }

    .skills-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }

    .skill-card {
        background: white;
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .skill-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
        border-color: #667eea;
    }

    .skill-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .skill-icon {
        font-size: 2.5rem;
    }

    .skill-info h3 {
        color: #2c3e50;
        margin-bottom: 0.3rem;
        font-size: 1.3rem;
    }

    .skill-category {
        color: #667eea;
        font-size: 0.9rem;
        font-weight: 600;
    }

    .progress-bar-container {
        width: 100%;
        height: 10px;
        background: #e0e0e0;
        border-radius: 10px;
        overflow: hidden;
        margin-bottom: 0.5rem;
    }

    .progress-bar {
        height: 100%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 10px;
        transition: width 1s ease-out;
        animation: progressAnimation 1.5s ease-out;
    }

    @keyframes progressAnimation {
        from {
            width: 0%;
        }
    }

    .progress-text {
        text-align: right;
        color: #667eea;
        font-weight: 600;
        font-size: 0.9rem;
    }

    .skill-hidden {
        display: none;
    }

    @media (max-width: 768px) {
        .skills-grid {
            grid-template-columns: 1fr;
        }

        .category-btn {
            padding: 0.6rem 1.5rem;
            font-size: 0.9rem;
        }
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="skills-intro">
        <h1>💼 Keahlian Saya</h1>
        <p style="font-size: 1.1rem; color: #666; max-width: 700px; margin: 1rem auto;">
            Berikut adalah kumpulan keahlian teknis yang telah saya kuasai 
            melalui pendidikan dan pengalaman praktis di bidang Teknik Komputer dan Jaringan.
        </p>
    </div>

    <div class="skills-categories">
        <button class="category-btn active" onclick="filterSkills('all')">
            Semua Keahlian
        </button>
        <button class="category-btn" onclick="filterSkills('Jaringan')">
            🌐 Jaringan
        </button>
        <button class="category-btn" onclick="filterSkills('Frontend')">
            🎨 Frontend
        </button>
        <button class="category-btn" onclick="filterSkills('Backend')">
            💾 Backend
        </button>
        <button class="category-btn" onclick="filterSkills('Soft Skill')">
            💪 Soft Skill
        </button>
    </div>

    <div class="skills-grid" id="skillsGrid">
        @forelse($skills as $skill)
        <div class="skill-card" data-category="{{ $skill->category }}">
            <div class="skill-header">
                <div class="skill-icon">
                    @if(str_contains($skill->icon, 'devicon-'))
                        <i class="{{ $skill->icon }}"></i>
                    @else
                        {{ $skill->icon }}
                    @endif
                </div>
                <div class="skill-info">
                    <h3>{{ $skill->name }}</h3>
                    <span class="skill-category">{{ $skill->category }}</span>
                </div>
            </div>
            
            <div class="progress-bar-container">
                <div class="progress-bar" style="width: {{ $skill->level }}%"></div>
            </div>
            <div class="progress-text">{{ $skill->level }}%</div>
        </div>
        @empty
        <div class="container" style="text-align: center; grid-column: 1/-1;">
            <p style="font-size: 1.2rem; color: #666;">
                Belum ada data keahlian. Silakan jalankan seeder database.
            </p>
        </div>
        @endforelse
    </div>
</div>

<div class="container" style="background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);">
    <h2>📈 Komitmen Pengembangan</h2>
    <p style="font-size: 1.1rem; line-height: 1.8;">
        Saya berkomitmen untuk terus mengembangkan keahlian saya melalui pembelajaran 
        berkelanjutan, praktik langsung, dan mengikuti perkembangan teknologi terkini. 
        Setiap proyek dan tantangan baru adalah kesempatan untuk meningkatkan kemampuan 
        dan memperluas wawasan di bidang teknologi informasi.
    </p>
    
    <div style="margin-top: 2rem; padding: 1.5rem; background: white; border-radius: 10px; border-left: 4px solid #667eea;">
        <h3 style="color: #667eea; margin-bottom: 1rem;">🎯 Target Pembelajaran</h3>
        <ul style="line-height: 2; color: #666;">
            <li>📚 Sertifikasi jaringan (CCNA, MikroTik)</li>
            <li>💻 Framework modern (Laravel, Vue.js, React)</li>
            <li>☁️ Cloud Computing (AWS, Azure, GCP)</li>
            <li>🔒 Cyber Security & Ethical Hacking</li>
            <li>📱 Mobile App Development</li>
        </ul>
    </div>
</div>
@endsection

@section('extra-scripts')
<script>
    function filterSkills(category) {
        const skills = document.querySelectorAll('.skill-card');
        const buttons = document.querySelectorAll('.category-btn');
        
        // Update active button
        buttons.forEach(btn => btn.classList.remove('active'));
        event.target.classList.add('active');
        
        // Filter skills
        skills.forEach(skill => {
            if (category === 'all' || skill.dataset.category === category) {
                skill.style.display = 'block';
                setTimeout(() => {
                    skill.style.opacity = '1';
                    skill.style.transform = 'translateY(0)';
                }, 10);
            } else {
                skill.style.opacity = '0';
                skill.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    skill.style.display = 'none';
                }, 300);
            }
        });
    }

    // Add transition style
    document.querySelectorAll('.skill-card').forEach(card => {
        card.style.transition = 'all 0.3s ease';
    });

    // Animate progress bars on page load
    window.addEventListener('load', () => {
        const progressBars = document.querySelectorAll('.progress-bar');
        progressBars.forEach(bar => {
            const width = bar.style.width;
            bar.style.width = '0%';
            setTimeout(() => {
                bar.style.width = width;
            }, 100);
        });
    });
</script>
@endsection
