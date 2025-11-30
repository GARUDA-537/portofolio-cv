# 📄 DOKUMENTASI PROYEK WEB PORTOFOLIO CV
## Moch. Farel Islami Akbar

---

## 📌 RINGKASAN PROYEK

**Nama Proyek:** Web Portofolio CV Profesional  
**Pengembang:** Moch. Farel Islami Akbar  
**Periode Pengembangan:** November 2025  
**Status:** Selesai & Siap Produksi  
**URL Demo:** http://127.0.0.1:8000 (Local Development)

---

## 🎯 TUJUAN PROYEK

Membangun website portofolio CV yang profesional, responsif, dan interaktif untuk:
1. Menampilkan keahlian teknis di bidang Jaringan Komputer dan Pengembangan Web
2. Mempresentasikan proyek-proyek yang telah dikerjakan
3. Menyediakan platform untuk calon rekruter menghubungi saya
4. Mendukung dua bahasa (Indonesia & Inggris) untuk jangkauan internasional

---

## 🛠️ TEKNOLOGI YANG DIGUNAKAN

### Backend
- **Laravel 11** - PHP Framework modern untuk struktur MVC
- **PHP 8.2+** - Server-side scripting language
- **MySQL** - Relational Database Management System
- **Eloquent ORM** - Database abstraction layer

### Frontend
- **HTML5** - Struktur semantik modern
- **CSS3** - Styling dengan Flexbox & Grid
- **Vanilla JavaScript** - Interaktivitas tanpa framework
- **Blade Template Engine** - Laravel's templating system

### External Libraries & Services
- **Devicon** - Logo teknologi profesional (HTML5, CSS3, React, Laravel, dll)
- **Gmail SMTP** - Email delivery service
- **Google Fonts** - Times New Roman (font formal)

### Development Tools
- **Laragon** - Local development environment
- **Git** - Version control system
- **Composer** - PHP dependency manager
- **NPM** - Node package manager

---

## 📊 STRUKTUR DATABASE

### 1. Tabel `profiles`
Menyimpan informasi profil pribadi.

**Kolom:**
- `id` (Primary Key)
- `name` - Nama lengkap
- `title` - Gelar/Posisi
- `bio` - Biografi singkat
- `education` - Riwayat pendidikan
- `phone` - Nomor telepon/WhatsApp
- `email` - Alamat email
- `address` - Alamat lengkap
- `tagline` - Tagline profesional
- `created_at`, `updated_at`

### 2. Tabel `skills`
Menyimpan daftar keahlian teknis.

**Kolom:**
- `id` (Primary Key)
- `name` - Nama keahlian
- `category` - Kategori (Jaringan, Frontend, Backend)
- `level` - Tingkat keahlian (0-100)
- `icon` - Kode ikon Devicon atau emoji
- `created_at`, `updated_at`

### 3. Tabel `projects`
Menyimpan portofolio proyek.

**Kolom:**
- `id` (Primary Key)
- `title` - Judul proyek
- `description` - Deskripsi lengkap (support HTML)
- `technology` - Teknologi yang digunakan (comma-separated)
- `image_path` - Path gambar proyek
- `url` - Link demo/repository (nullable)
- `created_at`, `updated_at`

### 4. Tabel `education`
Menyimpan riwayat pendidikan.

**Kolom:**
- `id` (Primary Key)
- `school` - Nama sekolah/institusi
- `major` - Jurusan
- `degree` - Tingkat pendidikan
- `start_year` - Tahun mulai
- `end_year` - Tahun selesai (nullable untuk "Sekarang")
- `created_at`, `updated_at`

---

## 🎨 FITUR-FITUR UTAMA

### 1. **Halaman Beranda (Home)**
- Hero section dengan nama, gelar, dan tagline
- Kartu spesialisasi (Jaringan, Web Development, Security)
- Ringkasan pendidikan
- Call-to-action untuk kontak
- **Animasi:** Fade-in-up, pulse effects

### 2. **Halaman Tentang Saya (About)**
- Foto profil placeholder dengan emoji
- Biografi lengkap
- Grid informasi (Pendidikan, Fokus, Status, Spesialisasi)
- 6 Kartu nilai & prinsip kerja
- Tujuan karir jangka pendek & panjang
- **Animasi:** Hover effects, card transitions

### 3. **Halaman Keahlian (Skills)**
- Filter kategori interaktif (Semua, Jaringan, Frontend, Backend)
- Progress bar animasi untuk setiap skill
- Logo teknologi asli menggunakan Devicon:
  - HTML5, CSS3, JavaScript
  - React JS, Vite
  - PHP, Laravel, Node JS, MySQL
- Komitmen pengembangan
- Target pembelajaran masa depan
- **Animasi:** Progress bar fill, filter transitions

### 4. **Halaman Proyek (Projects)**
- Grid kartu proyek dengan gambar
- Tag teknologi untuk setiap proyek
- Modal popup untuk detail lengkap
- Proyek unggulan: **Simulasi Jaringan Kompleks Multi-Departemen**
  - Gambar topologi jaringan asli
  - Deskripsi teknis lengkap (RIP, OSPF, VLAN, ACL, NAT)
  - Hasil pengujian
- Metodologi pengerjaan (4 tahap)
- Pembelajaran dari proyek
- **Animasi:** Card hover, modal fade-in

### 5. **Halaman Pendidikan (Education)**
- Timeline responsif dengan desain modern
- Riwayat pendidikan: SMK Negeri 2 Surabaya - TKJ
- Pencapaian akademis (3 kartu)
- **Animasi:** Timeline dots, card hover

### 6. **Halaman Kontak (Contact)**
- Informasi kontak lengkap:
  - Lokasi: Pesapen Barat No 11-A
  - Email: moch.farelislamiakbar.31@gmail.com (clickable, buka Gmail)
  - WhatsApp: 087812018882 (dengan QR Code)
- Formulir kontak fungsional:
  - Validasi input
  - Pengiriman email via Gmail SMTP
  - Pesan sukses/error
  - Reply-To header untuk balasan langsung
- Tombol unduh CV (placeholder)
- **Animasi:** Form validation, button hover

### 7. **Sistem Terjemahan Bilingual** ⭐
- Toggle bahasa Indonesia/Inggris
- 100+ teks diterjemahkan
- Terjemahan formal dan profesional
- Penyimpanan preferensi di localStorage
- Semua halaman support bilingual
- **Teknologi:** Vanilla JavaScript dengan data-i18n attributes

### 8. **Desain Responsif**
- Mobile-first approach
- Breakpoint: 768px
- Grid layout adaptif
- Hamburger menu untuk mobile
- Touch-friendly buttons

### 9. **Email System**
- SMTP Gmail integration
- Template email HTML profesional
- Reply-To header untuk balasan mudah
- Error handling
- Success/failure notifications

---

## 🎨 DESAIN & UX

### Color Palette
- **Primary Gradient:** #667eea → #764ba2 (Blue-Purple)
- **Background:** #f5f7fa (Light Gray)
- **Text:** #2c3e50 (Dark Gray)
- **Accent:** #25D366 (WhatsApp Green)

### Typography
- **Font Family:** Times New Roman, Times, serif
- **Heading:** Bold, 2-3.5rem
- **Body:** Regular, 1-1.2rem
- **Small:** 0.8-0.9rem

### Visual Effects
- **Glassmorphism** pada container
- **Gradient backgrounds** pada hero sections
- **Box shadows** untuk depth
- **Smooth transitions** (0.3s ease)
- **Hover animations** (translateY, scale)

---

## 📁 STRUKTUR FILE PROYEK

```
portofolio-cv/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── PortfolioController.php    # Controller utama
│   ├── Mail/
│   │   └── ContactMail.php                # Email handler
│   └── Models/
│       ├── Profile.php
│       ├── Skill.php
│       ├── Project.php
│       └── Education.php
├── database/
│   ├── migrations/
│   │   ├── *_create_profiles_table.php
│   │   ├── *_create_skills_table.php
│   │   ├── *_create_projects_table.php
│   │   └── *_create_education_table.php
│   └── seeders/
│       └── DatabaseSeeder.php             # Data awal
├── public/
│   ├── images/
│   │   ├── network-simulation.png         # Topologi jaringan
│   │   └── wa-qr.jpg                      # QR Code WhatsApp
│   └── js/
│       └── translations.js                # Sistem terjemahan
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php              # Layout utama
│       ├── emails/
│       │   └── contact.blade.php          # Template email
│       ├── home.blade.php
│       ├── about.blade.php
│       ├── skills.blade.php
│       ├── projects.blade.php
│       ├── education.blade.php
│       └── contact.blade.php
├── routes/
│   └── web.php                            # Routing
└── .env                                   # Konfigurasi environment
```

---

## 🚀 CARA INSTALASI & DEPLOYMENT

### Prerequisites
- PHP 8.2 atau lebih tinggi
- Composer
- MySQL/MariaDB
- Web server (Apache/Nginx)

### Langkah Instalasi

1. **Clone Repository**
```bash
git clone [repository-url]
cd portofolio-cv
```

2. **Install Dependencies**
```bash
composer install
npm install
```

3. **Konfigurasi Environment**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Setup Database**
Edit `.env`:
```env
DB_DATABASE=portofolio_cv
DB_USERNAME=root
DB_PASSWORD=
```

5. **Migrasi & Seeding**
```bash
php artisan migrate:fresh --seed
```

6. **Konfigurasi Email (Opsional)**
Edit `.env`:
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
```

7. **Jalankan Server**
```bash
php artisan serve
```

8. **Akses Website**
```
http://127.0.0.1:8000
```

---

## 📈 PENCAPAIAN TEKNIS

### 1. **Full-Stack Development**
- ✅ Backend: Laravel MVC architecture
- ✅ Frontend: Responsive HTML/CSS/JS
- ✅ Database: MySQL dengan Eloquent ORM
- ✅ Email: SMTP integration

### 2. **Advanced Features**
- ✅ Bilingual system (ID/EN)
- ✅ Dynamic content dari database
- ✅ Form validation & submission
- ✅ Email notification system
- ✅ Modal popup system
- ✅ Filter & search functionality

### 3. **UI/UX Excellence**
- ✅ Modern gradient design
- ✅ Smooth animations
- ✅ Mobile responsive
- ✅ Accessibility considerations
- ✅ Professional typography

### 4. **Code Quality**
- ✅ MVC pattern
- ✅ DRY principle
- ✅ Reusable components
- ✅ Clean code structure
- ✅ Commented code

---

## 🎓 PEMBELAJARAN & SKILL YANG DIKUASAI

Melalui proyek ini, saya telah menguasai:

### Backend Development
- Laravel framework (routing, controllers, models, migrations)
- Database design & normalization
- Eloquent ORM & Query Builder
- Email system integration
- Environment configuration

### Frontend Development
- Responsive web design
- CSS Grid & Flexbox
- JavaScript DOM manipulation
- Event handling
- LocalStorage API
- Internationalization (i18n)

### DevOps & Tools
- Git version control
- Composer dependency management
- Database seeding & migration
- Local development environment (Laragon)

### Soft Skills
- Project planning & documentation
- Problem solving
- Attention to detail
- Time management
- Self-learning ability

---

## 🔒 KEAMANAN

### Implementasi Keamanan
1. **CSRF Protection** - Laravel built-in
2. **Input Validation** - Server-side & client-side
3. **SQL Injection Prevention** - Eloquent ORM
4. **XSS Protection** - Blade escaping
5. **Email Spoofing Prevention** - Reply-To header
6. **Environment Variables** - Sensitive data di .env

---

## 📊 STATISTIK PROYEK

- **Total Halaman:** 6 halaman utama
- **Total Tabel Database:** 4 tabel
- **Total Baris Kode:** ~3,000+ lines
- **Total Fitur:** 15+ fitur utama
- **Bahasa Support:** 2 (Indonesia & Inggris)
- **Teks Terjemahan:** 100+ teks
- **Responsiveness:** 100% mobile-friendly
- **Browser Support:** Chrome, Firefox, Safari, Edge

---

## 🌟 FITUR UNGGULAN

1. **Sistem Terjemahan Real-time** - Toggle ID/EN tanpa reload
2. **Email Integration** - Formulir kontak yang benar-benar berfungsi
3. **WhatsApp QR Code** - Scan untuk chat langsung
4. **Gmail Direct Link** - Klik email untuk buka Gmail compose
5. **Project Modal** - Detail proyek dalam popup interaktif
6. **Devicon Integration** - Logo teknologi profesional
7. **Animated Progress Bars** - Visualisasi skill level
8. **Timeline Design** - Riwayat pendidikan yang menarik

---

## 📝 CATATAN PENGEMBANGAN

### Tantangan yang Dihadapi
1. **Email Spoofing Limitation** - Solved dengan Reply-To header
2. **Bilingual Implementation** - Solved dengan JavaScript i18n system
3. **Responsive Design** - Solved dengan mobile-first approach
4. **Image Optimization** - Solved dengan proper sizing & format

### Future Improvements
1. Admin panel untuk update konten
2. Blog section untuk artikel teknis
3. Dark mode toggle
4. PDF CV generator
5. Visitor analytics
6. Contact form database storage
7. Multi-language support (tambah bahasa lain)

---

## 👨‍💻 INFORMASI PENGEMBANG

**Nama:** Moch. Farel Islami Akbar  
**Pendidikan:** SMK Negeri 2 Surabaya - Teknik Komputer dan Jaringan  
**Email:** moch.farelislamiakbar.31@gmail.com  
**WhatsApp:** 087812018882  
**Lokasi:** Pesapen Barat No 11-A, Surabaya

---

## 📄 LISENSI

© 2025 Moch. Farel Islami Akbar. All Rights Reserved.

Proyek ini dibuat untuk keperluan portofolio pribadi dan pembelajaran.

---

## 🙏 ACKNOWLEDGMENTS

- Laravel Framework - https://laravel.com
- Devicon - https://devicon.dev
- Google Fonts - https://fonts.google.com
- Gmail SMTP Service

---

**Terakhir Diperbarui:** 25 November 2025  
**Versi Dokumentasi:** 1.0  
**Status:** Production Ready ✅
