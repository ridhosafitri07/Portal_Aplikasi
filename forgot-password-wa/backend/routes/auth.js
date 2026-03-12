const express = require('express');
const router = express.Router();
const db = require('../db');
const bcrypt = require('bcryptjs');

// In-memory OTP store: { phone: { otp, expiry, username } }
const otpStore = {};

// Kirim OTP 
router.post('/request-otp', async (req, res) => {
  const { username, hp } = req.body;

  if (!username || !hp) {
    return res.status(400).json({ success: false, message: 'Username dan nomor HP wajib diisi.' });
  }

  const waClient = req.app.locals.waClient;
  const waReady = req.app.locals.getWaReady();

  if (!waReady) {
    return res.status(503).json({ success: false, message: 'WhatsApp Bot belum siap. Silakan coba beberapa saat lagi.' });
  }

  try {
    console.log(`🔍 Mencari user dengan username: ${username} dan no hp: ${hp}`);
    
    const [rows] = await db.query(
      'SELECT id_user, nama_user, hp_ FROM user WHERE username = ? AND hp_ = ?',
      [username, hp]
    );

    if (rows.length === 0) {
      console.log(`❌ User tidak ditemukan - username: ${username}, hp: ${hp}`);
      return res.status(404).json({ success: false, message: 'Username atau nomor HP tidak ditemukan.' });
    }

    const user = rows[0];
    console.log(`✅ User ditemukan: ${user.nama_user} (${user.hp_})`);


    const otp = Math.floor(100000 + Math.random() * 900000).toString();
    const expiry = Date.now() + 3 * 60 * 1000; //

    otpStore[hp] = { otp, expiry, username };

    let waNumber = hp.replace(/^0/, '62').replace(/\D/g, '');
    if (!waNumber.startsWith('62')) waNumber = '62' + waNumber;
    waNumber += '@c.us';

    const message = `🔐 Portal Aplikasi - Verifikasi Reset Password

Halo ${user.nama_user},

Gunakan kode OTP berikut untuk melanjutkan proses reset password:
🔑 ${otp}

Kode berlaku selama 3 menit.
Demi keamanan, jangan bagikan kode ini kepada siapa pun.

Jika Anda tidak melakukan permintaan ini, segera abaikan pesan ini atau hubungi admin.

Salam,
Tim Portal Aplikasi`;

    await waClient.sendMessage(waNumber, message);
    
    console.log(`📨 Memberikan kode OTP: ${otp} ke nomor: ${hp}`);

    return res.json({ success: true, message: 'OTP berhasil dikirim ke WhatsApp Anda.' });
  } catch (err) {
    console.error(`❌ Error saat request OTP:`, err.message);
    return res.status(500).json({ success: false, message: 'Terjadi kesalahan server.' });
  }
});

// Verifikasi OTP 
router.post('/verify-otp', (req, res) => {
  const { hp, otp } = req.body;

  console.log(`🔐 Memverifikasi OTP untuk no hp: ${hp}`);

  const record = otpStore[hp];
  if (!record) {
    console.log(`❌ Verifikasi gagal - OTP tidak ditemukan untuk hp: ${hp}`);
    return res.status(400).json({ success: false, message: 'OTP tidak ditemukan. Silakan minta ulang.' });
  }

  if (Date.now() > record.expiry) {
    delete otpStore[hp];
    console.log(`❌ Verifikasi gagal - OTP sudah expired untuk hp: ${hp}`);
    return res.status(400).json({ success: false, message: 'OTP sudah kadaluarsa. Silakan minta ulang.' });
  }

  if (record.otp !== otp) {
    console.log(`❌ Verifikasi gagal - OTP salah untuk hp: ${hp} (input: ${otp}, expected: ${record.otp})`);
    return res.status(400).json({ success: false, message: 'Kode OTP salah.' });
  }

  // OTP valid
  otpStore[hp].verified = true;
  console.log(`✅ OTP berhasil diverifikasi untuk hp: ${hp} (username: ${record.username})`);

  return res.json({ success: true, message: 'OTP valid.' });
});

// Reset Password
router.post('/reset-password', async (req, res) => {
  const { hp, password, confirmPassword } = req.body;

  if (password !== confirmPassword) {
    return res.status(400).json({ success: false, message: 'Password dan konfirmasi tidak cocok.' });
  }

  if (password.length < 6) {
    return res.status(400).json({ success: false, message: 'Password minimal 6 karakter.' });
  }

  const record = otpStore[hp];
  if (!record || !record.verified) {
    return res.status(403).json({ success: false, message: 'Sesi tidak valid. Ulangi proses dari awal.' });
  }

  try {
    const hashed = await bcrypt.hash(password, 10);
    console.log(`🔑 Mengganti password user: ${record.username}`);
    
    await db.query('UPDATE user SET password_hash = ? WHERE username = ?', [hashed, record.username]);

    delete otpStore[hp];
    
    console.log(`✅ Password berhasil diubah untuk user: ${record.username}`);

    return res.json({ success: true, message: 'Password berhasil diubah.' });
  } catch (err) {
    console.error(`❌ Error saat reset password:`, err.message);
    return res.status(500).json({ success: false, message: 'Gagal memperbarui password.' });
  }
});

module.exports = router;