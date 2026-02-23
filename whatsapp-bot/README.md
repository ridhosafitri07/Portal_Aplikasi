# WhatsApp Bot - Forgot Password OTP Service

Layanan WhatsApp bot untuk mengirim OTP reset password secara otomatis.

## 📋 Persyaratan

- Node.js v14+ 
- npm
- WhatsApp (aplikasi di smartphone)

## 🚀 Setup & Instalasi

### 1. Install Dependencies

```bash
cd whatsapp-bot
npm install
```

### 2. Konfigurasi Environment

Edit file `.env`:

```env
PORT=3000
PORTAL_API=http://localhost/portal_aplikasi
NODE_ENV=development
```

### 3. Jalankan Bot

```bash
npm start
```

**Output yang diharapkan:**

```
🚀 WhatsApp OTP Server berjalan di http://localhost:3000
📤 Endpoint: POST /send-otp
📊 Status: GET /status

╔════════════════════════════════════════╗
║    SCAN QR CODE DENGAN WHATSAPP BARU   ║
╚════════════════════════════════════════╝

█████████░ ← QR Code akan ditampilkan di sini

Setelah scan, tunggu bot ready...
```

### 4. Login WhatsApp

1. **Buka WhatsApp** di smartphone yang belum terhubung dengan WhatsApp Web
2. **Scan QR Code** yang ditampilkan di terminal dengan WhatsApp: 
   - Ketuk **⋮** (tiga titik) → **Perangkat yang tertaut**
   - Ketuk **Tautkan perangkat**
   - Arahkan kamera ke QR Code
3. **Tunggu bot siap**: Ketika bertuliskan "✅ WhatsApp Bot READY!", bot sudah aktif

> ⚠️ **PENTING**: Gunakan WhatsApp baru/nomor baru untuk bot ini. Jangan gunakan WhatsApp utama Anda.

## 📡 API Endpoints

### GET `/status`
Cek status bot

```bash
curl http://localhost:3000/status
```

**Response:**
```json
{
  "botReady": true,
  "status": "Ready",
  "message": "Bot siap mengirim OTP"
}
```

### POST `/send-otp`
Kirim OTP ke nomor WhatsApp

```bash
curl -X POST http://localhost:3000/send-otp \
  -H "Content-Type: application/json" \
  -d '{
    "phoneNumber": "08123456789",
    "otpCode": "123456"
  }'
```

**Response:**
```json
{
  "success": true,
  "message": "OTP berhasil dikirim"
}
```

## 🔧 Troubleshooting

### Bot tidak menampilkan QR Code
- Pastikan terminal support rendering karakter
- Coba jalankan di terminal lain (CMD, PowerShell, bash)

### QR Code tidak ter-scan
- Pastikan cahaya cukup
- Gunakan WhatsApp versi terbaru
- Coba ulangi: tekan `Ctrl+C` dan jalankan `npm start` lagi

### Bot tidak ready setelah scan
- Tunggu 30 detik setelah scan
- Pastikan internet stabil
- Cek apakah WhatsApp menunjukkan "WhatsApp Web" di koneksi

### Pesan tidak terkirim
- Cek status bot: `curl http://localhost:3000/status`
- Format nomor HP harus benar (08xxx atau +6281xxx)
- Pastikan bot ready sebelum testing

## 📝 Catatan

- Bot menggunakan `whatsapp-web.js` - library non-official
- Session disimpan di folder `.wwebjs_auth/`
- OTP backend menghubungi endpoint ini via `curl`

## 🛑 Hentikan Bot

Tekan `Ctrl+C` di terminal tempat bot berjalan.

---

**Dibuat untuk Portal Aplikasi - Forgot Password Feature**
