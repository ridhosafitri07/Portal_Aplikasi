const express = require('express');
const cors = require('cors');
const path = require('path');
const qrcode = require('qrcode-terminal');
const fs = require('fs');
const { Client, LocalAuth } = require('whatsapp-web.js');
require('dotenv').config();

const app = express();
app.use(cors());
app.use(express.json());
app.use(express.static(path.join(__dirname, '../frontend')));

// WhatsApp Client 
const SESSION_PATH = './.wwebjs_auth/session-otp-bot';
const sessionExists = fs.existsSync(SESSION_PATH);

const waClient = new Client({
  authStrategy: new LocalAuth({ clientId: 'otp-bot', dataPath: './.wwebjs_auth' }),
  puppeteer: { args: ['--no-sandbox'] }
});

let waReady = false;
let qrShownOnce = false;  // Track if QR sudah ditampilkan
let isFirstInit = true;   // Track apakah ini initialization pertama kali

// Notify on startup if session exists
if (sessionExists) {
  console.log('📞 Session sudah ada, skipping QR code...\n');
  isFirstInit = false;
}

waClient.on('qr', (qr) => {
  if (!qrShownOnce) {  
    console.log('\n📱 QR Code baru! Scan dengan WhatsApp Admin:\n');
    qrcode.generate(qr, { small: true });
    qrShownOnce = true;
  }
});

waClient.on('authenticated', () => {
  console.log('🔐 WhatsApp berhasil diautentikasi.');
});

waClient.on('ready', () => {
  waReady = true;
  
  if (isFirstInit) {
    console.log('\n🔄 Menyingkronkan WhatsApp...');
    setTimeout(() => {
      console.log('✅ WhatsApp Bot READY — Siap kirim OTP!\n');
      isFirstInit = false;
    }, 1500);
  } else {
    console.log('✅ WhatsApp Bot RECONNECTED — Siap kirim OTP!\n');
  }
});

waClient.on('disconnected', () => {
  waReady = false;
  qrShownOnce = false;  
  console.log('\n⚠️  WhatsApp Bot disconnected. Mencoba reconnect...\n');
});

waClient.initialize();

// Export waClient & waReady ke routes
app.locals.waClient = waClient;
app.locals.getWaReady = () => waReady;

// Routes 
const authRoutes = require('./routes/auth');
app.use('/api/auth', authRoutes);

// Serve frontend pages
app.get('/', (req, res) => res.sendFile(path.join(__dirname, '../frontend/index.html')));

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
  console.log(`\n🌐 Server jalan di http://localhost:${PORT}`);
  console.log('⏳ Menunggu WhatsApp QR Code...\n');
});