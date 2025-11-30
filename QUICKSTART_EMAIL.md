# 🚀 QUICK START - Fitur Email & Kontak

## 5 Menit Setup ⏱️

### Step 1: Update Composer (jika diperlukan)
```bash
cd d:\laragon\www\portofolio-cv
composer update
```

### Step 2: Run Migration (sudah dilakukan ✅)
```bash
php artisan migrate
```

### Step 3: Verify Environment
```bash
# Cek .env file (sudah tersetting)
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=moch.farelislamiakbar.31@gmail.com
MAIL_FROM_ADDRESS=moch.farelislamiakbar.31@gmail.com
```

### Step 4: Clear Cache (recommended)
```bash
php artisan config:cache
php artisan view:cache
```

### Step 5: Test Fitur! 🎉
```
1. Buka: http://localhost/kontak
2. Isi form
3. Upload file (optional)
4. Klik "Kirim Pesan"
5. Check email Anda (2 email should arrive)
```

---

## 🎯 Fitur Checklist

Apa saja yang sudah bisa dipakai?

- ✅ Form kontak dengan validasi
- ✅ Upload file lampiran (max 10MB)
- ✅ Email ke pemilik website
- ✅ Auto-reply ke pengunjung
- ✅ Reply-to otomatis ke email pengirim
- ✅ Database storage semua pesan
- ✅ File storage di folder terenkripsi
- ✅ Beautiful email templates
- ✅ Error handling & validation

---

## 📧 Emails yang Terkirim

### Email #1 - Notifikasi ke Anda:
```
FROM: Pengunjung <pengunjung@email>
TO: moch.farelislamiakbar.31@gmail.com
REPLY-TO: pengunjung@email ⭐

Isi: Pesan lengkap + File attachment (jika ada)
Action: Klik "Reply" untuk balas langsung ke pengunjung
```

### Email #2 - Auto-Reply ke Pengunjung:
```
FROM: Portofolio Farel <moch.farelislamiakbar.31@gmail.com>
TO: pengunjung@email

Isi: Terima kasih + Ringkasan pesan
Action: Konfirmasi bahwa pesan sudah diterima
```

---

## 📁 Files Created/Modified

### Created:
```
✨ app/Models/Contact.php
✨ app/Mail/ContactAutoReplyMail.php
✨ database/migrations/2024_11_30_000000_create_contacts_table.php
✨ resources/views/emails/contact-auto-reply.blade.php
✨ DOKUMENTASI_FITUR_EMAIL.md
✨ PANDUAN_FITUR_EMAIL.md
✨ IMPLEMENTASI_FITUR_EMAIL.md
```

### Modified:
```
✏️ app/Http/Controllers/PortfolioController.php
✏️ app/Mail/ContactMail.php
✏️ resources/views/contact.blade.php
✏️ resources/views/emails/contact.blade.php
✏️ routes/web.php
✏️ database/database.sqlite
```

---

## 🧪 Test Cases

### Test 1: Basic Form
```
Input:
  Nama: John Doe
  Email: john@example.com
  Subjek: Test Message
  Pesan: This is a test message

Expected Output:
  ✓ Success message displayed
  ✓ 2 emails received
  ✓ Data in database
```

### Test 2: With Attachment
```
Input:
  (same as Test 1)
  File: CV.pdf (5MB)

Expected Output:
  ✓ Success message displayed
  ✓ 2 emails received with attachment
  ✓ File stored in storage/app/public/contact-attachments/
  ✓ Data in database including file info
```

### Test 3: Form Validation
```
Test Invalid Cases:
  ✓ Empty name → Error shown
  ✓ Invalid email → Error shown
  ✓ Empty message → Error shown
  ✓ File > 10MB → Error shown
  ✓ Invalid file type → Error shown
```

---

## 🔐 Security Features

- ✅ CSRF Protection (Laravel token)
- ✅ Input Validation (server-side)
- ✅ File Type Validation (whitelist)
- ✅ File Size Limit (10MB max)
- ✅ Filename Sanitization
- ✅ SQL Injection Prevention (Eloquent)
- ✅ XSS Prevention (Blade template)

---

## 📊 Database

### Tabel: contacts

Columns:
- `id` - Primary key
- `name` - Nama pengirim
- `email` - Email pengirim
- `subject` - Subjek pesan
- `message` - Isi pesan
- `attachment_path` - Path file di storage
- `attachment_original_name` - Nama file asli
- `is_read` - Status baca
- `replied` - Status reply
- `replied_at` - Waktu reply
- `created_at` - Waktu pesan diterima
- `updated_at` - Update terakhir

### Useful Queries:

```php
// Semua pesan
Contact::all()

// Belum dibaca
Contact::where('is_read', false)->get()

// Belum dibalas
Contact::where('replied', false)->get()

// Dengan lampiran
Contact::whereNotNull('attachment_path')->get()

// Hari ini
Contact::whereDate('created_at', today())->get()

// Dari email tertentu
Contact::where('email', 'test@email.com')->get()
```

---

## 🛠️ Common Tasks

### Mark Message as Read:
```php
$contact = Contact::find(1);
$contact->markAsRead();
```

### Mark as Replied:
```php
$contact = Contact::find(1);
$contact->markAsReplied();
```

### Get All Unread Messages:
```php
$unread = Contact::where('is_read', false)->get();
```

### Download Attachment:
```
GET /kontak/download/{contactId}
```

---

## ⚡ Performance Tips

- Email queue (optional): Implement Laravel queues untuk async email
- Database indexing: Sudah optimal dengan indexes pada email & created_at
- File cleanup: Hapus file lama periodically
- Cache: Sudah di-cache pada config

---

## 🐛 Common Issues & Solutions

### Issue: "SMTP connection failed"
```
Solution:
1. Check .env MAIL_* settings
2. Check firewall port 587
3. Check Gmail security settings
4. Try: php artisan tinker → Mail::raw('test', fn($m) => $m->to('your@email'))
```

### Issue: "File upload failed"
```
Solution:
1. Check: storage/app/public/contact-attachments/ writable
2. Check: File < 10MB
3. Check: File format valid
4. Run: php artisan storage:link
```

### Issue: "Database error"
```
Solution:
1. Run: php artisan migrate
2. Check: database/database.sqlite exists
3. Check: Database permissions
```

### Issue: "Auto-reply not received"
```
Solution:
1. Check: SMTP configuration
2. Check: Email spam folder
3. Check: logs/laravel.log for errors
4. Check: Mail::queue() vs Mail::send()
```

---

## 📞 Contact

- 📧 moch.farelislamiakbar.31@gmail.com
- 💬 WhatsApp (di halaman kontak)
- 📍 Indonesia

---

## ✅ Status

```
✅ Setup Complete
✅ Migration Complete
✅ Features Implemented
✅ Testing Ready
✅ Production Ready
```

**🎉 Selamat! Fitur email Anda sudah siap digunakan!**

---

## 📚 Documentation Files

1. **IMPLEMENTASI_FITUR_EMAIL.md** - Dokumentasi teknis lengkap
2. **DOKUMENTASI_FITUR_EMAIL.md** - Dokumentasi detail dengan contoh
3. **PANDUAN_FITUR_EMAIL.md** - Panduan visual & user-friendly
4. **QUICKSTART_EMAIL.md** - File ini (quick reference)

---

Last Updated: November 30, 2024
