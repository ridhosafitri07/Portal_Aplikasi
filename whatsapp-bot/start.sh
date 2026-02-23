#!/bin/bash
# WhatsApp Bot - Quick Start Script

echo "╔════════════════════════════════════════╗"
echo "║  FORGOT PASSWORD - WHATSAPP BOT SETUP  ║"
echo "╚════════════════════════════════════════╝"
echo ""

# Check if Node.js is installed
if ! command -v node &> /dev/null
then
    echo "❌ Node.js tidak terinstall. Silakan install dari https://nodejs.org/"
    exit 1
fi

echo "✅ Node.js terdeteksi: $(node -v)"
echo ""

# Navigate to whatsapp-bot directory
cd whatsapp-bot

echo "📦 Menginstall dependencies..."
npm install

if [ $? -ne 0 ]; then
    echo "❌ npm install gagal"
    exit 1
fi

echo ""
echo "╔════════════════════════════════════════╗"
echo "║  🚀 STARTING BOT - SCAN QR CODE SOON   ║"
echo "╚════════════════════════════════════════╝"
echo ""

npm start
