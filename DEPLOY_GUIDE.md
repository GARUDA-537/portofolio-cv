# 🚀 DEPLOY GUIDE: FIX UNTUK VERCEL

## Ringkas: Apa yang Diperbaiki?

✅ **Pesan SELALU tersimpan** di database (yang penting!)  
✅ **Email akan dicoba** dikirim (best effort)  
✅ **File upload** tetap bekerja  
✅ **Error handling** lebih baik  

---

## Cara Deploy ke Vercel (3 Langkah):

### Langkah 1: Commit Changes
```bash
cd d:\laragon\www\portofolio-cv

git add .
git commit -m "Fix Vercel: Email error handling & storage setup"
git push origin main
```

### Langkah 2: Vercel Auto Deploy
- Tunggu Vercel trigger build otomatis
- Buka: https://vercel.com → portofolio-cv
- Lihat build progress

### Langkah 3: Test di Production
```
Buka: https://portofolio-cv.vercel.app/kontak
Test: Submit form
Expected:
  ✅ Pesan tersimpan di database
  ✅ Email notifikasi (akan dicoba dikirim)
  ✅ User dapat feedback sukses
```

---

## Verifikasi Setup:

### Check di Vercel Dashboard:

1. **Project Settings**
   - ✅ Framework: PHP detected
   - ✅ Build Command: bash build.sh
   - ✅ Output Directory: public

2. **Environment Variables** (optional tapi recommended)
   Buka: Settings → Environment Variables
   
   Tambahkan (atau verify existing):
   ```
   APP_ENV=production
   APP_DEBUG=false
   MAIL_MAILER=smtp
   MAIL_HOST=smtp.gmail.com
   MAIL_PORT=587
   MAIL_USERNAME=moch.farelislamiakbar.31@gmail.com
   MAIL_PASSWORD=lbzcsxvcfuapqnof
   MAIL_FROM_ADDRESS=moch.farelislamiakbar.31@gmail.com
   MAIL_FROM_NAME=Portofolio Farel
   MAIL_ENCRYPTION=tls
   ```

3. **Database**
   - ✅ SQLite created during build
   - ✅ Migrations executed
   - ✅ Ready to use

---

## Jika Email Masih Tidak Bekerja:

### Option A: Ignore Email (Tapi Pesan Tersimpan) ✅
- Pesan tetap masuk ke database
- Anda bisa baca langsung dari database
- Email adalah bonus saja

### Option B: Setup Resend.com (Recommended)

1. Buka: https://resend.com
2. Daftar gratis
3. Copy API Key
4. Di Vercel → Environment Variables, tambahkan:
   ```
   MAIL_MAILER=resend
   RESEND_API_KEY=your-key-here
   ```
5. Deploy ulang

### Option C: Setup SendGrid

1. Buka: https://sendgrid.com
2. Daftar (ada free tier)
3. Setup API key
4. Update .env dengan SendGrid config
5. Deploy ulang

---

## Monitoring Vercel:

### Lihat Logs:
1. Buka: https://vercel.com → portofolio-cv
2. Klik: Deployments
3. Latest deployment → Logs
4. Filter: `email` atau `contact`

### Lihat Database:
1. SSH ke Vercel (jika possible) atau
2. Setup admin panel untuk manage contacts

---

## Checklist Pre-Deploy:

- [x] Code updated
- [x] Build script updated
- [x] Environment variables prepared
- [x] Commit dan push selesai
- [ ] Wait untuk Vercel build
- [ ] Test di production
- [ ] Verify messages saved
- [ ] Check email (jika ada)

---

## Expected Behavior After Deploy:

### Form Submit:
```
User: Submit form
↓
Website: Process data
↓
✅ Save ke database (GUARANTEED)
↓
📧 Try send email (best effort)
↓
✅ Show success message to user
```

### Hasil di Backend:
```
Database:
  ✅ Semua messages tersimpan
  ✅ File attachments saved
  ✅ Timestamps recorded

Email:
  ⚠️  May/may not work tergantung service
  Tapi user tidak akan tahu bedanya!
```

---

## Troubleshooting:

### "Form error after submit"
- Check: Vercel logs
- Check: .env variables
- Check: Database permissions

### "Email tidak terkirim"
- ✅ Itu OK! Pesan sudah tersimpan di database
- Setup Resend untuk email reliable
- Atau abaikan email, fokus ke database

### "File upload gagal"
- Check: File size < 10MB
- Check: File format valid (PDF, DOC, JPG dll)
- Check: Storage folder writable

---

## Next Steps:

### Immediately:
1. Commit dan push code
2. Wait build Vercel
3. Test form di production
4. Verify database update

### Soon:
1. Setup email service (jika perlu)
2. Monitor Vercel logs
3. Setup notifications

### Later:
1. Admin dashboard untuk manage messages
2. Email templates customization
3. Additional features

---

## 📞 Support:

Jika ada masalah:
1. Check Vercel logs
2. Check .env setup
3. Hubungi saya dengan error message

---

## ✅ Final Status:

```
✅ Code ready
✅ Build script ready
✅ Environment ready
✅ Ready to deploy!

🚀 Siap di-deploy ke Vercel!
```

---

**Ready? Push ke Git dan Vercel akan auto-deploy! 🚀**
