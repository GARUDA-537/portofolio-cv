# 📧 Dokumentasi Fitur Email & Kontak - Portfolio Farel

## ✅ Fitur yang Sudah Diimplementasikan

### 1. **Penerimaan Email Otomatis**
- Website menerima pesan dari form kontak
- Pesan disimpan ke database dalam tabel `contacts`
- Email dikirim langsung ke inbox Anda (`moch.farelislamiakbar.31@gmail.com`)
- Pengirim pesan akan dilihat di field **From** dan **Reply-To**

### 2. **Auto-Reply ke Pengirim**
Pengirim pesan akan secara otomatis menerima email balasan yang berisi:
- ✅ Konfirmasi bahwa pesan mereka telah diterima
- Ringkasan pesan (subjek, email, lampiran jika ada)
- Informasi cara menghubungi Anda lebih cepat
- Perkiraan waktu respon (24 jam)

### 3. **Upload File/Lampiran**
- Pengguna dapat mengunggah file dengan format:
  - **Dokumen**: PDF, DOC, DOCX, XLS, XLSX, TXT
  - **Gambar**: JPG, JPEG, PNG
  - **Arsip**: ZIP
- **Batas ukuran**: Maksimal 10 MB per file
- Interface drag-and-drop yang user-friendly
- Validasi file real-time di frontend dan backend

### 4. **Penyimpanan Pesan**
Setiap pesan disimpan dengan informasi:
- Nama pengirim
- Email pengirim
- Subjek pesan
- Isi pesan lengkap
- File lampiran (jika ada)
- Status baca (is_read)
- Status balasan (replied)
- Timestamp penerimaan dan balasan

### 5. **Reply-To Otomatis**
Ketika Anda menerima email:
- Klik tombol "Reply" untuk langsung membalas ke email pengirim
- Email dari pengirim sudah terkonfigurasi di field Reply-To
- Tidak perlu copy-paste email pengirim secara manual

## 🔧 Cara Menggunakan

### Untuk Pengguna (Pengunjung Website)
1. Buka halaman `/kontak`
2. Isi formulir:
   - Nama lengkap
   - Email
   - Subjek pesan
   - Isi pesan
   - (Opsional) Upload file lampiran
3. Klik tombol "📤 Kirim Pesan"
4. Tunggu notifikasi sukses
5. Cek email Anda untuk auto-reply konfirmasi

### Untuk Anda (Pemilik Website)
1. Email masuk ke: `moch.farelislamiakbar.31@gmail.com`
2. Email sudah memiliki:
   - Informasi pengirim lengkap
   - Tombol "Reply" langsung untuk balasan
   - Link "Balas Email" untuk membuka email client
3. Balas pesan melalui email biasa
4. Database secara otomatis mencatat bahwa Anda sudah membalas

## 📊 Database Structure

Tabel `contacts` memiliki kolom:
```
- id: Integer (Primary Key)
- name: String - Nama pengirim
- email: String - Email pengirim
- subject: String - Subjek pesan
- message: LongText - Isi pesan
- attachment_path: String nullable - Path file di storage
- attachment_original_name: String nullable - Nama asli file
- is_read: Boolean - Sudah dibaca atau belum
- replied: Boolean - Sudah dibalas atau belum
- replied_at: Timestamp nullable - Kapan dibalas
- created_at: Timestamp - Waktu pesan diterima
- updated_at: Timestamp - Waktu update terakhir
```

## 🛡️ Keamanan

✅ **Validasi Form**
- Email harus format valid
- Nama dan subjek tidak boleh kosong
- Pesan minimal harus ada konten
- File divalidasi by MIME type dan ukuran

✅ **Penyimpanan File**
- File disimpan di folder `storage/app/public/contact-attachments/`
- Filename di-rename dengan timestamp untuk menghindari konflik
- Akses file melalui route terenkripsi

✅ **Database**
- Input di-escape otomatis oleh Laravel
- Proteksi CSRF dengan @csrf token
- Query builder mencegah SQL injection

## 🚀 Testing Fitur

### Test Mengirim Pesan
1. Buka: `http://localhost/kontak`
2. Isi form dengan data:
   ```
   Nama: Test User
   Email: test@example.com
   Subjek: Testing Fitur Email
   Pesan: Ini adalah test pesan
   ```
3. Klik "Kirim Pesan"
4. Cek:
   - ✅ Email masuk ke `moch.farelislamiakbar.31@gmail.com`
   - ✅ Email balasan masuk ke `test@example.com`
   - ✅ Data tersimpan di database

### Test dengan Lampiran
1. Ulangi langkah Test Mengirim Pesan
2. Tambahkan upload file (PDF/Gambar/Excel)
3. Cek:
   - ✅ File tersimpan di `storage/app/public/contact-attachments/`
   - ✅ Informasi file ada di email
   - ✅ Database mencatat nama file asli

### Test Reply
1. Buka email yang diterima pengirim (auto-reply)
2. Klik tombol "Balas Email"
3. Tulis balasan Anda
4. Kirim
5. Email balasan Anda akan tersimpan otomatis

## 📁 File-File yang Dibuat/Diubah

### File Baru:
- ✅ `database/migrations/2024_11_30_000000_create_contacts_table.php` - Migration
- ✅ `app/Models/Contact.php` - Model
- ✅ `app/Mail/ContactAutoReplyMail.php` - Mailable untuk auto-reply
- ✅ `resources/views/emails/contact-auto-reply.blade.php` - Template auto-reply

### File yang Diubah:
- ✅ `resources/views/contact.blade.php` - Form dengan upload file
- ✅ `app/Mail/ContactMail.php` - Support file attachment
- ✅ `app/Http/Controllers/PortfolioController.php` - Logic lengkap
- ✅ `resources/views/emails/contact.blade.php` - Email template
- ✅ `routes/web.php` - Route download attachment

## ⚙️ Konfigurasi Environment

Pastikan `.env` sudah tersetting:
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=moch.farelislamiakbar.31@gmail.com
MAIL_PASSWORD=lbzcsxvcfuapqnof
MAIL_FROM_ADDRESS=moch.farelislamiakbar.31@gmail.com
MAIL_FROM_NAME="Portofolio Farel"
MAIL_ENCRYPTION=tls
```

✅ **Sudah dikonfigurasi dan siap!**

## 🐛 Troubleshooting

### Email tidak terkirim
- Cek `.env` SMTP settings
- Cek internet connection
- Lihat log di `storage/logs/`

### File tidak bisa diupload
- Cek folder `storage/app/public/contact-attachments/` write permission
- Cek ukuran file (max 10MB)
- Cek format file (hanya PDF, DOC, DOCX, JPG, PNG, XLS, XLSX, TXT, ZIP)

### Database error
- Jalankan: `php artisan migrate` untuk create table

## 📞 Support

Jika ada masalah atau pertanyaan, hubungi:
- 📧 Email: moch.farelislamiakbar.31@gmail.com
- 💬 WhatsApp: Tersedia di halaman kontak
- 📱 LinkedIn: Link ada di halaman kontak

---

**Terakhir diupdate**: November 30, 2024
**Status**: ✅ Production Ready
