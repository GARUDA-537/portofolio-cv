# 🚀 Panduan Deploy Portfolio CV ke Vercel

## ✅ Status: Repository Siap!

**Repository GitHub:** https://github.com/GARUDA-537/portofolio-cv

Semua file konfigurasi Vercel sudah di-push ke repository!

---

## 📋 Langkah-langkah Deploy ke Vercel

### **Step 1: Buka Vercel Dashboard**

1. Buka **[vercel.com](https://vercel.com)**
2. Login dengan akun GitHub Anda
3. Klik tombol **"Add New..."** → **"Project"**

### **Step 2: Import Repository**

1. Cari repository **"portofolio-cv"** di list
2. Klik **"Import"**
3. Vercel akan otomatis detect sebagai project PHP

### **Step 3: Configure Project**

**Framework Preset:** Other  
**Root Directory:** `./` (default)  
**Build Command:** `bash build.sh`  
**Output Directory:** (kosongkan)

### **Step 4: Tambahkan Environment Variables**

Klik **"Environment Variables"** dan tambahkan:

```
APP_NAME=Portfolio CV
APP_ENV=production
APP_KEY=base64:vj6/XjU4ZvxVPzSAAgCvTy/8Xx1td+QBKpC8q3SHrNQ=
APP_DEBUG=false
APP_URL=https://portofolio-cv.vercel.app
DB_CONNECTION=sqlite
SESSION_DRIVER=cookie
CACHE_DRIVER=array
QUEUE_CONNECTION=sync
LOG_CHANNEL=stderr
LOG_LEVEL=error
VIEW_COMPILED_PATH=/tmp
CACHE_PREFIX=
```

**PENTING:** Ganti `APP_URL` dengan URL Vercel Anda setelah deployment!

### **Step 5: Deploy!**

1. Klik **"Deploy"**
2. Tunggu proses build selesai (sekitar 2-5 menit)
3. Setelah selesai, klik **"Visit"** untuk melihat website Anda!

---

## 🔧 Konfigurasi Email (Opsional)

Jika Anda ingin fitur contact form berfungsi, tambahkan environment variables:

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

**Untuk Gmail:**
1. Buka Google Account → Security
2. Enable "2-Step Verification"
3. Generate "App Password"
4. Gunakan App Password sebagai `MAIL_PASSWORD`

---

## ⚠️ Keterbatasan Vercel untuk Laravel

### **Database SQLite Tidak Persistent**
- Data akan hilang setiap kali re-deploy
- **Solusi:** Gunakan database eksternal

### **Rekomendasi Database Gratis:**

#### **1. PlanetScale (MySQL - Recommended)**
```
DB_CONNECTION=mysql
DB_HOST=your-host.psdb.cloud
DB_PORT=3306
DB_DATABASE=your-database
DB_USERNAME=your-username
DB_PASSWORD=your-password
MYSQL_ATTR_SSL_CA=/etc/ssl/certs/ca-certificates.crt
```

**Setup:**
1. Buka [planetscale.com](https://planetscale.com)
2. Create database
3. Copy connection string
4. Tambahkan ke Vercel environment variables

#### **2. Supabase (PostgreSQL)**
```
DB_CONNECTION=pgsql
DB_HOST=db.xxx.supabase.co
DB_PORT=5432
DB_DATABASE=postgres
DB_USERNAME=postgres
DB_PASSWORD=your-password
```

**Setup:**
1. Buka [supabase.com](https://supabase.com)
2. Create project
3. Copy database credentials
4. Tambahkan ke Vercel environment variables

---

## 🔄 Update Setelah Deploy

### **Setelah Deployment Pertama:**

1. Copy URL Vercel Anda (misal: `https://portofolio-cv-xyz.vercel.app`)
2. Update environment variable `APP_URL` di Vercel Dashboard
3. Redeploy (Vercel → Deployments → ... → Redeploy)

### **Untuk Update Code:**

```bash
# Di local
git add .
git commit -m "Update: deskripsi perubahan"
git push origin main
```

Vercel akan otomatis deploy setiap kali ada push ke GitHub!

---

## 🐛 Troubleshooting

### **Error: 500 Internal Server Error**
1. Buka Vercel Dashboard → Project → Deployments
2. Klik deployment terakhir → "View Function Logs"
3. Cek error message
4. Pastikan semua environment variables sudah benar

### **Error: Database Connection Failed**
- Pastikan `DB_CONNECTION=sqlite` atau
- Setup database eksternal (PlanetScale/Supabase)

### **Error: CSS/JS Tidak Load**
1. Jalankan di local: `npm run build`
2. Commit dan push ke GitHub
3. Vercel akan rebuild assets

### **Error: Session Tidak Berfungsi**
- Pastikan `SESSION_DRIVER=cookie` di environment variables

---

## 🎯 Alternatif Hosting (Lebih Mudah)

Jika Vercel terlalu ribet, coba:

### **Railway (Recommended untuk Laravel)**
- ✅ Database persistent
- ✅ Setup 1 klik
- ✅ Free $5/bulan
- 🔗 [railway.app](https://railway.app)

### **Heroku**
- ✅ Classic choice
- ✅ Banyak tutorial
- 🔗 [heroku.com](https://heroku.com)

---

## 📞 Butuh Bantuan?

Jika ada error atau pertanyaan, screenshot error message dan tanyakan!

**Good luck! 🚀**
