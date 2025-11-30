# Deploy Laravel ke Vercel - Panduan

## 📝 Persiapan

### 1. Environment Variables di Vercel Dashboard

Setelah membuat project di Vercel, tambahkan environment variables berikut:

```
APP_NAME=Portfolio CV
APP_ENV=production
APP_KEY=base64:YOUR_APP_KEY_HERE
APP_DEBUG=false
APP_URL=https://your-domain.vercel.app

DB_CONNECTION=sqlite

SESSION_DRIVER=cookie
CACHE_DRIVER=array
QUEUE_CONNECTION=sync

LOG_CHANNEL=stderr
LOG_LEVEL=error

MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-email
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@domain.com
MAIL_FROM_NAME="${APP_NAME}"
```

### 2. Generate APP_KEY

Jalankan di local:
```bash
php artisan key:generate --show
```

Copy hasilnya (termasuk `base64:`) dan paste ke Vercel environment variable `APP_KEY`.

## 🚀 Cara Deploy

### Opsi 1: Deploy via Vercel Dashboard

1. Push code ke GitHub
2. Buka [Vercel Dashboard](https://vercel.com/dashboard)
3. Klik "Add New Project"
4. Import repository GitHub Anda
5. Vercel akan otomatis detect dan deploy

### Opsi 2: Deploy via Vercel CLI

```bash
# Install Vercel CLI
npm i -g vercel

# Login
vercel login

# Deploy
vercel
```

## ⚠️ Catatan Penting

### Database
- Vercel menggunakan **serverless functions** yang **stateless**
- SQLite tidak persistent di Vercel (file akan hilang setelah deployment)
- **Solusi:**
  - Gunakan database eksternal seperti:
    - **PlanetScale** (MySQL - Recommended)
    - **Supabase** (PostgreSQL)
    - **Railway** (MySQL/PostgreSQL)
    - **Neon** (PostgreSQL)

### File Storage
- File yang di-upload tidak akan persistent
- Gunakan cloud storage seperti:
  - **Cloudinary**
  - **AWS S3**
  - **DigitalOcean Spaces**

### Session
- Gunakan `cookie` driver untuk session (sudah dikonfigurasi)
- Atau gunakan database session dengan database eksternal

## 🔧 Troubleshooting

### Error: "No Output Directory named 'dist' found"
✅ **Sudah diperbaiki** dengan konfigurasi `vercel.json` yang baru

### Error: "500 Internal Server Error"
- Check logs di Vercel Dashboard → Project → Deployments → View Function Logs
- Pastikan semua environment variables sudah diset
- Pastikan `APP_KEY` sudah diset dengan benar

### Error: Database Connection
- Pastikan `DB_CONNECTION=sqlite` di environment variables
- Atau setup database eksternal

## 📚 Alternatif Hosting untuk Laravel

Jika Vercel terlalu rumit, pertimbangkan:

1. **Railway** - Mudah, support Laravel out of the box
2. **Heroku** - Classic choice untuk Laravel
3. **DigitalOcean App Platform** - Managed platform
4. **Laravel Forge + DigitalOcean** - Professional solution
5. **Cloudways** - Managed cloud hosting

## 🎯 Rekomendasi

Untuk aplikasi Laravel yang kompleks dengan database, saya **sangat merekomendasikan Railway** karena:
- ✅ Support Laravel native
- ✅ Database persistent (MySQL/PostgreSQL)
- ✅ File storage persistent
- ✅ Mudah setup
- ✅ Free tier tersedia

Apakah Anda ingin saya buatkan panduan deploy ke Railway sebagai gantinya?
