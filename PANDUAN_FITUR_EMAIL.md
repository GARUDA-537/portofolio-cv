# 🎯 Panduan Singkat Fitur Email & Kontak

## Apa Yang Bisa Dilakukan Sekarang?

### 1️⃣ Pengguna Mengirim Pesan + File
```
┌─────────────────────────────────┐
│   Form Kontak Website           │
├─────────────────────────────────┤
│ ✏️  Nama: [Visitor Name]        │
│ ✏️  Email: [visitor@mail.com]   │
│ ✏️  Subjek: [Pertanyaan/Info]   │
│ ✏️  Pesan: [Isi pesan...]       │
│ 📎  File: [CV.pdf] [Drag & Drop]│
│ ⬜ Kirim Pesan 📤              │
└─────────────────────────────────┘
```

**Fitur Upload File:**
- Klik atau drag-drop file
- Format: PDF, DOC, DOCX, JPG, PNG, XLS, XLSX, TXT, ZIP
- Max size: 10MB
- Real-time preview

---

### 2️⃣ Email Masuk ke Inbox Anda

```
📧 FROM: Visitor Name <visitor@mail.com>
📧 TO: Moch. Farel Islami Akbar
📧 SUBJECT: Pesan Baru: [Visitor Subject]
📧 REPLY-TO: visitor@mail.com ⭐ AUTO!

┌─────────────────────────────────┐
│ Dari: Visitor Name              │
│ Email: visitor@mail.com         │
│ Subjek: Pertanyaan Kontak       │
│ Lampiran: CV.pdf 📎            │
│                                 │
│ Pesan:                          │
│ "Halo, saya tertarik..."       │
│                                 │
│ [Balas Email] ✉️               │
└─────────────────────────────────┘

⭐ Klik "Reply" = langsung balas ke pengirim!
⭐ Email pengirim sudah otomatis di field TO!
```

---

### 3️⃣ Auto-Reply ke Pengirim

Pengirim secara otomatis menerima:

```
📧 FROM: Portofolio Farel <moch.farelislamiakbar.31@gmail.com>
📧 TO: visitor@mail.com
📧 SUBJECT: Terima kasih! Pesan Anda telah diterima

┌─────────────────────────────────┐
│ ✅ TERIMA KASIH!               │
│                                 │
│ Halo Visitor Name,              │
│                                 │
│ Pesan Anda telah diterima!     │
│ Saya akan membalasnya dalam    │
│ 24 jam.                         │
│                                 │
│ Ringkasan:                      │
│ - Subjek: Pertanyaan Kontak    │
│ - Email: visitor@mail.com      │
│ - Lampiran: CV.pdf 📎         │
│                                 │
│ Hubungi saya via:              │
│ - WhatsApp 💬                 │
│ - LinkedIn 💼                 │
│ - Email ✉️                    │
└─────────────────────────────────┘
```

---

### 4️⃣ Data Tersimpan di Database

```
Tabel: contacts
┌──────┬─────────┬──────────────────┬──────────┬────────┬──────────┐
│ ID   │ Name    │ Email            │ Subject  │ File   │ Replied  │
├──────┼─────────┼──────────────────┼──────────┼────────┼──────────┤
│ 1    │ John    │ john@mail.com    │ Q&A      │ cv.pdf │ ✓ Yes    │
│ 2    │ Jane    │ jane@mail.com    │ Hire Me  │ NULL   │ ✗ No     │
│ 3    │ Bob     │ bob@mail.com     │ Feedback │ img.jpg│ ⏳ Pending│
└──────┴─────────┴──────────────────┴──────────┴────────┴──────────┘
```

---

## 🔄 Alur Email Lengkap

```
1. PENGUNJUNG WEBSITE
   │
   ├─→ Isi form kontak
   ├─→ Upload file (opsional)
   └─→ Klik "Kirim Pesan"
       │
       ↓
2. SISTEM LARAVEL
   │
   ├─→ Validasi form
   ├─→ Simpan file ke storage/
   ├─→ Simpan data ke database
   │
   ├─→ Kirim Email #1 ke Anda
   │   ├─ From: Pengunjung
   │   ├─ To: moch.farelislamiakbar.31@gmail.com
   │   └─ Reply-To: Pengunjung ⭐
   │
   └─→ Kirim Email #2 (Auto-Reply) ke Pengunjung
       ├─ From: Portofolio Farel
       ├─ To: Pengunjung
       └─ Subject: Terima kasih...
       │
       ↓
3. ANDA MENERIMA EMAIL
   │
   ├─→ Baca pesan lengkap
   ├─→ Lihat lampiran (jika ada)
   └─→ Klik "Reply"
       │
       ↓
4. BALAS EMAIL PENGUNJUNG
   │
   ├─→ Tulis balasan
   ├─→ Kirim
   └─→ Database otomatis mencatat "Sudah Dibalas"
       │
       ↓
5. PENGUNJUNG MENERIMA BALASAN ANDA ✅
```

---

## 🛡️ Keamanan Fitur

✅ **Form Validation**
- Email harus format valid
- File size max 10MB
- File type whitelist

✅ **File Storage**
- Disimpan di folder terlindungi
- Filename di-rename dengan timestamp
- Akses via route terenkripsi

✅ **Database**
- CSRF protection
- SQL injection prevention
- Input sanitization otomatis

---

## 🚀 Testing Cepat

### Local Testing:
```bash
1. Buka: http://localhost/kontak
2. Isi form (gunakan email test Anda)
3. Upload file (contoh: PDF)
4. Klik "Kirim"
5. Cek email Anda (inbox + spam folder)
```

### Hasil yang Diharapkan:
- ✅ Pesan sukses di website
- ✅ 2 email masuk ke inbox
  - Email #1: Notifikasi ke Anda
  - Email #2: Auto-reply ke pengunjung
- ✅ File tersimpan
- ✅ Data di database

---

## 💡 Tips Penggunaan

### Untuk Membalas Pesan:
1. **Langsung di Email** (Recommended)
   - Buka email yang masuk
   - Klik "Reply"
   - Email pengirim sudah otomatis di field TO
   - Tulis balasan dan kirim

2. **Via Link**
   - Di email yang diterima ada link "Balas Email"
   - Klik link untuk membuka email client
   - Balasan akan ke email pengunjung otomatis

### Mengelola File Lampiran:
- Lihat di: `storage/app/public/contact-attachments/`
- Download dari: Email yang Anda terima
- Backup file penting secara berkala

---

## 📊 Statistik & Monitoring

### Tracking Email:
```
Total Pesan: COUNT(*) FROM contacts
Sudah Dibaca: SELECT * FROM contacts WHERE is_read = 1
Sudah Dibalas: SELECT * FROM contacts WHERE replied = 1
Menunggu Balasan: SELECT * FROM contacts WHERE replied = 0
Dengan Lampiran: SELECT * FROM contacts WHERE attachment_path IS NOT NULL
```

---

## ❓ FAQ

**Q: Berapa lama auto-reply terkirim?**
A: Instantly (kurang dari 1 detik setelah pesan masuk)

**Q: File saya tidak bisa diupload?**
A: Cek format file dan ukuran (max 10MB, format: PDF, DOC, DOCX, JPG, PNG, XLS, XLSX, TXT, ZIP)

**Q: Apakah email terenkripsi?**
A: Ya, menggunakan SMTP dengan TLS encryption

**Q: Bisa berapa file sekali upload?**
A: Saat ini 1 file per pesan. Untuk multiple files, user bisa zip dulu.

**Q: Data pesan disimpan berapa lama?**
A: Selamanya, di database. Anda bisa delete manual dari admin panel.

---

**Selamat! Fitur email & kontak Anda sudah siap production! 🎉**
