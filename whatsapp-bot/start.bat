@echo off
REM WhatsApp Bot - Quick Start Script untuk Windows

cls
echo.
echo ╔════════════════════════════════════════╗
echo ║  FORGOT PASSWORD - WHATSAPP BOT SETUP  ║
echo ╚════════════════════════════════════════╝
echo.

REM Check if Node.js is installed
where node >nul 2>nul
if %ERRORLEVEL% NEQ 0 (
    echo ❌ Node.js tidak terinstall
    echo Silakan download dari: https://nodejs.org/
    pause
    exit /b 1
)

for /f "tokens=*" %%i in ('node -v') do set NODE_VERSION=%%i
echo ✅ Node.js terdeteksi: %NODE_VERSION%
echo.

REM Navigate to whatsapp-bot directory
cd /d "%~dp0"

echo 📦 Menginstall dependencies...
echo.
call npm install

if %ERRORLEVEL% NEQ 0 (
    echo.
    echo ❌ npm install gagal
    pause
    exit /b 1
)

echo.
echo ╔════════════════════════════════════════╗
echo ║  🚀 STARTING BOT - SCAN QR CODE SOON   ║
echo ╚════════════════════════════════════════╝
echo.
echo Tunggu hingga muncul QR Code, lalu:
echo 1. Buka WhatsApp di smartphone baru
echo 2. Ketuk ⋮ (tiga titik) 
echo 3. Pilih "Perangkat yang tertaut"
echo 4. Tap "Tautkan perangkat"
echo 5. Scan QR Code yang ditampilkan
echo.
pause

call npm start

pause
