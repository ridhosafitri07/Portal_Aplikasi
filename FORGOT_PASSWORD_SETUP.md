# 🔐 Forgot Password with WhatsApp OTP - Setup Guide

## 📚 Overview

Fitur reset password yang aman dengan OTP via WhatsApp. User melakukan 4 step untuk mengatur ulang password.

**Alur:**
1. **Step 1**: Masukkan username & no HP → OTP dikirim ke WA
2. **Step 2**: Validasi OTP (berlaku 5 menit)
3. **Step 3**: Buat password baru
4. **Step 4**: Success page

## 📁 File Structure

```
portal_aplikasi/
├── whatsapp-bot/                    ← Node.js WhatsApp Bot
│   ├── bot.js                       ← Main bot service
│   ├── package.json
│   ├── .env
│   ├── .gitignore
│   └── README.md
│
├── app/
│   ├── Controllers/
│   │   └── ForgotPasswordController.php
│   ├── Models/
│   │   └── PasswordResetModel.php
│   ├── Views/forgot_password/
│   │   ├── step1.php                ← Request OTP
│   │   ├── step2.php                ← Verify OTP
│   │   ├── step3.php                ← Reset Password
│   │   └── step4.php                ← Success
│   └── Database/Migrations/
│       └── 2026-02-20-000001_CreatePasswordResets.php
│
└── app/Config/
    └── Routes.php                   ← Updated dengan forgot-password routes
```

## 🚀 Installation Steps

### Step 1: Database Migration

```bash
cd d:\laragon\www\portal_aplikasi

# Jalankan migration untuk membuat table password_resets
php spark migrate
```

### Step 2: Setup WhatsApp Bot

```bash
cd whatsapp-bot

# Install dependencies
npm install

# Jalankan bot
npm start
```

**Tunggu hingga muncul:**

```
✅ WhatsApp Bot READY! Siap mengirim OTP.
```

### Step 3: Test Fitur

1. Buka browser: `http://localhost/portal_aplikasi/forgot-password`
2. Masukkan username & nomor HP
3. Cek WhatsApp untuk OTP
4. Ikuti flow hingga selesai

## 🔑 Konfigurasi

### Bot Configuration (`.env`)

```env
PORT=3000                               # Port bot
PORTAL_API=http://localhost/portal_aplikasi
NODE_ENV=development
```

### Controller Configuration

Pastikan di `ForgotPasswordController.php` line 140:
```php
// URL bot (sesuaikan jika berbeda)
'http://localhost:3000/send-otp'
```

## 📝 Database Schema

### Table: `password_resets`

```sql
CREATE TABLE password_resets (
  id INT PRIMARY KEY AUTO_INCREMENT,
  id_user INT UNSIGNED NOT NULL,
  otp_code VARCHAR(6) NOT NULL,
  token VARCHAR(255) UNIQUE,
  expired_at DATETIME NOT NULL,
  is_used TINYINT(1) DEFAULT 0,
  created_at DATETIME,
  updated_at DATETIME,
  FOREIGN KEY (id_user) REFERENCES user(id_user) ON DELETE CASCADE
);
```

## 🔄 API Flow

### 1. Send OTP
```
POST /forgot-password/api/send-otp
├─ username: string
├─ phone_number: string
└─ Response: { success, token, message }
```

### 2. Verify OTP
```
POST /forgot-password/verify
├─ token: string
├─ otp_code: string (6 digit)
└─ Response: { success, message, idUser }
```

### 3. Reset Password
```
POST /forgot-password/reset
├─ token: string
├─ new_password: string
├─ confirm_password: string
└─ Response: { success, message }
```

## 🤖 WhatsApp Bot Details

### Teknologi
- **Library**: whatsapp-web.js
- **Runtime**: Node.js
- **Auth Method**: QR Code
- **Session Storage**: `.wwebjs_auth/`

### Fitur Bot
- Pengiriman OTP via WhatsApp Text
- Format nomor HP otomatis (+62xxx)
- Timeout handling
- Status endpoint untuk monitoring

### Contoh Pesan OTP

```
🔐 Kode Reset Password Anda

Kode OTP: 123456

Kode berlaku selama 5 menit.
Jangan bagikan kode ini kepada siapapun!

⏰ Jangan lupa verifikasi sebelum kode kadaluarsa.
```

## ✨ UI Features

### Design Theme
- **Color**: Blue & White (Gradient: #667eea → #764ba2)
- **Font**: Poppins
- **Responsive**: Mobile-friendly

### Step 1: Request OTP
- Input username & no HP yang terdaftar
- Validasi format nomor
- Loading state dengan spinner
- Alert feedback

### Step 2: Verify OTP
- 6 input field untuk digit (paste-able)
- Timer countdown 5 menit
- Warning visual saat timeout
- Validasi real-time

### Step 3: Reset Password
- Password strength checker
- Show/hide password toggle
- Password match indicator
- Requirements checklist
- Validation feedback

### Step 4: Success
- Confirmation animation
- Detail checklist
- CTA button ke login

## 🔧 Troubleshooting

### Bot Issues
Lihat `/whatsapp-bot/README.md` untuk troubleshooting bot

### Controller Issues

**Error: WhatsApp bot tidak merespons**
```
Pastikan:
1. Bot sedang berjalan (npm start)
2. Bot status: GET /status return ready: true
3. Port 3000 tidak digunakan aplikasi lain
```

**Error: OTP tidak terkirim**
```
1. Cek log di terminal bot
2. Validasi format nomor HP
3. Pastikan WhatsApp tersambung
```

**Error: Token expired**
```
OTP hanya berlaku 5 menit
User harus request OTP baru
```

## 📊 Monitoring

### Check Bot Status
```bash
curl http://localhost:3000/status
```

### View Database Records
```sql
SELECT * FROM password_resets ORDER BY created_at DESC;
```

### Cleanup Expired OTP
```php
// Di controller, jalankan:
$resetModel = new PasswordResetModel();
$resetModel->cleanupExpired();
```

## 🔐 Security Notes

- OTP 6 digit random, unik per request
- Token 32-byte hex, tidak bisa diprediksi
- OTP berlaku hanya 5 menit
- Tidak bisa reuse token setelah dipakai
- Password di-hash dengan `PASSWORD_DEFAULT` (bcrypt)
- CSRF token protection aktif

## 🚀 Production Checklist

- [ ] Update `.env` dengan production values
- [ ] Setup SSL certificate
- [ ] Konfigurasi email fallback (jika WA tidak tersedia)
- [ ] Implementasi rate limiting
- [ ] Setup backup/recovery flow
- [ ] Test dengan berbagai format nomor HP
- [ ] Monitoring & logging production

## 📞 Support

Untuk bantuan lebih lanjut, lihat:
- `/whatsapp-bot/README.md` - Bot setup
- `app/Controllers/ForgotPasswordController.php` - Logika backend
- `app/Views/forgot_password/` - UI Implementation

---

**Version**: 1.0.0  
**Last Updated**: Feb 20, 2026
