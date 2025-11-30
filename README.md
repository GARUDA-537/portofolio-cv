# 🌐 Web Portofolio CV - Moch. Farel Islami Akbar

[![Laravel](https://img.shields.io/badge/Laravel-11-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-blue.svg)](https://php.net)
[![License](https://img.shields.io/badge/License-Personal-green.svg)](LICENSE)

> Website portofolio profesional dengan fitur bilingual (Indonesia/English), formulir kontak terintegrasi email, dan desain responsif modern.

![Preview](public/images/network-simulation.png)

## ✨ Fitur Utama

- 🌍 **Bilingual Support** - Toggle Indonesia/English real-time
- 📧 **Email Integration** - Formulir kontak dengan Gmail SMTP
- 📱 **Fully Responsive** - Mobile-first design
- 🎨 **Modern UI/UX** - Gradient design dengan animasi smooth
- 💼 **Portfolio Showcase** - Proyek dengan modal detail
- 📊 **Skills Visualization** - Progress bar animasi
- 📞 **WhatsApp Integration** - QR Code & direct link
- 🔗 **Gmail Direct Link** - Klik email untuk compose

## 🛠️ Tech Stack

**Backend:**
- Laravel 11
- PHP 8.2+
- MySQL
- Eloquent ORM

**Frontend:**
- HTML5 & CSS3
- Vanilla JavaScript
- Blade Template Engine
- Devicon (Tech logos)

**Services:**
- Gmail SMTP
- Google Fonts

## 📦 Instalasi

### Prerequisites
```bash
PHP >= 8.2
Composer
MySQL/MariaDB
```

### Setup

1. **Clone repository**
```bash
git clone https://github.com/yourusername/portofolio-cv.git
cd portofolio-cv
```

2. **Install dependencies**
```bash
composer install
```

3. **Environment setup**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Database configuration**
Edit `.env`:
```env
DB_DATABASE=portofolio_cv
DB_USERNAME=root
DB_PASSWORD=
```

5. **Migrate & seed**
```bash
php artisan migrate:fresh --seed
```

6. **Email configuration (Optional)**
Edit `.env`:
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
```

7. **Run server**
```bash
php artisan serve
```

8. **Visit**
```
http://127.0.0.1:8000
```

## 📂 Struktur Proyek

```
portofolio-cv/
├── app/
│   ├── Http/Controllers/
│   │   └── PortfolioController.php
│   ├── Mail/
│   │   └── ContactMail.php
│   └── Models/
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
│   ├── images/
│   └── js/
│       └── translations.js
├── resources/
│   └── views/
│       ├── layouts/
│       ├── emails/
│       └── [pages].blade.php
└── routes/
    └── web.php
```

## 🎯 Halaman

1. **Home** - Hero section & spesialisasi
2. **About** - Profil lengkap & nilai kerja
3. **Skills** - Keahlian dengan progress bar
4. **Projects** - Portfolio proyek
5. **Education** - Timeline pendidikan
6. **Contact** - Formulir & info kontak

## 🌟 Highlights

### Bilingual System
```javascript
// Toggle bahasa dengan 1 klik
changeLanguage('en'); // English
changeLanguage('id'); // Indonesia
```

### Email Integration
```php
// Formulir kontak yang benar-benar berfungsi
Mail::to('your-email@gmail.com')
    ->send(new ContactMail($data));
```

### Responsive Design
```css
/* Mobile-first approach */
@media (max-width: 768px) {
    /* Mobile styles */
}
```

## 📊 Database Schema

### profiles
- name, title, bio, education
- phone, email, address, tagline

### skills
- name, category, level, icon

### projects
- title, description, technology
- image_path, url

### education
- school, major, degree
- start_year, end_year

## 🎨 Design

**Color Palette:**
- Primary: `#667eea` → `#764ba2`
- Background: `#f5f7fa`
- Text: `#2c3e50`

**Typography:**
- Font: Times New Roman
- Heading: Bold, 2-3.5rem
- Body: Regular, 1-1.2rem

## 📈 Features Checklist

- [x] Responsive design
- [x] Bilingual support (ID/EN)
- [x] Email integration
- [x] WhatsApp QR Code
- [x] Gmail direct link
- [x] Project modal
- [x] Skill filtering
- [x] Form validation
- [x] Smooth animations
- [x] SEO optimized
- [ ] Admin panel (future)
- [ ] Dark mode (future)
- [ ] PDF CV generator (future)

## 🔒 Security

- ✅ CSRF Protection
- ✅ Input Validation
- ✅ SQL Injection Prevention
- ✅ XSS Protection
- ✅ Environment Variables

## 📝 Dokumentasi Lengkap

Lihat [DOKUMENTASI_PROYEK.md](DOKUMENTASI_PROYEK.md) untuk dokumentasi detail.

## 👨‍💻 Author

**Moch. Farel Islami Akbar**
- Email: moch.farelislamiakbar.31@gmail.com
- WhatsApp: 087812018882
- Pendidikan: SMK Negeri 2 Surabaya - TKJ

## 📄 License

© 2025 Moch. Farel Islami Akbar. All Rights Reserved.

Personal portfolio project for educational purposes.

## 🙏 Acknowledgments

- [Laravel](https://laravel.com)
- [Devicon](https://devicon.dev)
- [Google Fonts](https://fonts.google.com)

---

⭐ **Star this repo if you find it helpful!**
