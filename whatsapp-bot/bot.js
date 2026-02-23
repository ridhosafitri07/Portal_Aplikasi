const { Client, LocalAuth } = require('whatsapp-web.js');
const qrcode = require('qrcode-terminal');
const axios = require('axios');
require('dotenv').config();

const PORTAL_API = process.env.PORTAL_API || 'http://localhost/portal_aplikasi';

// Status bot
let botReady = false;

const client = new Client({
    authStrategy: new LocalAuth(),
    puppeteer: {
        headless: true,
        args: ['--no-sandbox']
    }
});

// ─── QR Code untuk login WA ───────────────────────────
client.on('qr', (qr) => {
    console.log('\n╔════════════════════════════════════════╗');
    console.log('║    SCAN QR CODE DENGAN WHATSAPP BARU   ║');
    console.log('╚════════════════════════════════════════╝\n');
    qrcode.generate(qr, { small: true });
    console.log('\nSetelah scan, tunggu bot ready...\n');
});

// ─── Bot siap ─────────────────────────────────────────
client.on('ready', () => {
    botReady = true;
    console.log('✅ WhatsApp Bot READY! Siap mengirim OTP.\n');
});

// ─── Terima pesan (untuk log/testing) ─────────────────
client.on('message', msg => {
    console.log(`📨 Pesan dari ${msg.from}: ${msg.body}`);
});

// ─── Disconnect ────────────────────────────────────────
client.on('disconnected', (reason) => {
    botReady = false;
    console.log('⚠️  Bot disconnect:', reason);
});

// ─── Function: Kirim OTP ke WA ────────────────────────
async function sendOTPToWhatsApp(phoneNumber, otpCode) {
    try {
        if (!botReady) {
            throw new Error('WhatsApp Bot belum ready. Silakan scan QR code terlebih dahulu.');
        }

        // Format nomor WA (tambah country code jika belum ada)
        let formattedNumber = phoneNumber.replace(/\D/g, '');
        if (!formattedNumber.startsWith('62')) {
            if (formattedNumber.startsWith('0')) {
                formattedNumber = '62' + formattedNumber.slice(1);
            } else {
                formattedNumber = '62' + formattedNumber;
            }
        }

        const chatId = formattedNumber + '@c.us';

        // Template pesan
        const message = `🔐 *Kode Reset Password Anda*\n\nKode OTP: *${otpCode}*\n\nKode berlaku selama 5 menit.\nJangan bagikan kode ini kepada siapapun!\n\n⏰ Jangan lupa verifikasi sebelum kode kadaluarsa.`;

        // Kirim pesan
        await client.sendMessage(chatId, message);

        console.log(`✅ OTP terkirim ke ${phoneNumber} (${chatId})`);
        return { success: true, message: 'OTP berhasil dikirim' };

    } catch (error) {
        console.error('❌ Error kirim OTP:', error.message);
        return { success: false, error: error.message };
    }
}

// ─── API Endpoint untuk trigger OTP ────────────────────
const express = require('express');
const app = express();
app.use(express.json());

// CORS Middleware
app.use((req, res, next) => {
    res.header('Access-Control-Allow-Origin', '*');
    res.header('Access-Control-Allow-Headers', 'Origin, X-Requested-With, Content-Type, Accept');
    res.header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS');
    if (req.method === 'OPTIONS') {
        return res.sendStatus(200);
    }
    next();
});

app.post('/send-otp', async (req, res) => {
    try {
        console.log('📨 Request /send-otp:', JSON.stringify(req.body));
        const { phoneNumber, otpCode, userId } = req.body;

        if (!phoneNumber || !otpCode) {
            console.warn('⚠️ Missing required fields');
            return res.status(400).json({ 
                success: false, 
                error: 'Phone number dan OTP code harus diisi' 
            });
        }

        const result = await sendOTPToWhatsApp(phoneNumber, otpCode);
        console.log('✅ Response:', result);
        res.status(result.success ? 200 : 500).json(result);

    } catch (error) {
        console.error('❌ Error in /send-otp:', error.message);
        res.status(500).json({ 
            success: false, 
            error: error.message 
        });
    }
});

// Status endpoint
app.get('/status', (req, res) => {
    console.log('📊 Status check - botReady:', botReady);
    res.status(200).json({
        botReady: botReady,
        status: botReady ? 'Ready' : 'Not Ready',
        message: botReady ? 'Bot siap mengirim OTP' : 'Silakan scan QR code',
        timestamp: new Date().toISOString()
    });
});

// ─── Initialize Client ────────────────────────────────
client.initialize();

// ─── Start Server ─────────────────────────────────────
const PORT = process.env.PORT || 3000;
const HOST = '0.0.0.0';

app.listen(PORT, HOST, () => {
    console.log(`\n🚀 WhatsApp OTP Server berjalan di http://localhost:${PORT}`);
    console.log(`📤 Endpoint: POST /send-otp`);
    console.log(`📊 Status: GET /status`);
    console.log(`🌐 Listening on ${HOST}:${PORT}\n`);
});

// Error handler untuk uncaught exceptions
process.on('unhandledRejection', (reason, promise) => {
    console.error('❌ Unhandled Rejection at:', promise, 'reason:', reason);
});
