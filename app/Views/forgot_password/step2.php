<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi OTP - Step 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        
        .container-otp {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,.3);
            padding: 0;
            width: 100%;
            max-width: 480px;
            overflow: hidden;
        }

        .otp-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px 30px;
            text-align: center;
            color: white;
        }

        .otp-header h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .otp-header p {
            opacity: 0.9;
            font-size: 0.95rem;
        }

        .otp-body {
            padding: 40px 30px;
        }

        .otp-inputs {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin: 30px 0;
        }

        .otp-input {
            width: 50px;
            height: 60px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            text-align: center;
            font-size: 1.5rem;
            font-weight: 700;
            transition: border-color 0.3s;
            color: #333;
        }

        .otp-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .otp-input.filled {
            border-color: #667eea;
            background: #f5f5ff;
        }

        .timer {
            text-align: center;
            font-size: 1.1rem;
            color: #667eea;
            font-weight: 600;
            margin: 20px 0;
        }

        .timer.warning {
            color: #ff6b6b;
            animation: blink 1s infinite;
        }

        @keyframes blink {
            0%, 50% { opacity: 1; }
            51%, 100% { opacity: 0.5; }
        }

        .btn-submit {
            width: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 12px;
            padding: 14px;
            color: white;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            margin-top: 10px;
        }

        .btn-submit:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-submit:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .text-center-small {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
            color: #666;
        }

        .text-center-small a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
        }

        .text-center-small a:hover {
            text-decoration: underline;
        }

        .alert {
            border-radius: 12px;
            border: none;
            padding: 14px 16px;
            margin-bottom: 20px;
            font-size: 0.95rem;
        }

        .alert-danger {
            background: #fde8e8;
            color: #c92a2a;
        }

        .alert-success {
            background: #e8f8f5;
            color: #27ae60;
        }

        .alert-info {
            background: #e8f4f8;
            color: #1971c2;
        }

        .spinner {
            display: none;
            width: 18px;
            height: 18px;
            border: 3px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 0.8s linear infinite;
            margin-right: 8px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .info-text {
            text-align: center;
            color: #666;
            font-size: 0.9rem;
            margin: 15px 0;
        }
    </style>
</head>
<body>

<div class="container-otp">
    <!-- Header -->
    <div class="otp-header">
        <h1><i class="bi bi-shield-check"></i></h1>
        <h1>Verifikasi OTP</h1>
        <p>Masukkan kode OTP 6 digit yang dikirim ke WhatsApp. Step 2 dari 4</p>
    </div>

    <!-- Body -->
    <div class="otp-body">
        <div id="alertContainer"></div>

        <div class="info-text">
            Kode OTP berlaku selama <strong id="timerText">5:00</strong>
        </div>

        <form id="formStep2">
            <div class="otp-inputs">
                <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" placeholder="0">
                <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" placeholder="0">
                <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" placeholder="0">
                <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" placeholder="0">
                <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" placeholder="0">
                <input type="text" class="otp-input" maxlength="1" pattern="[0-9]" placeholder="0">
            </div>

            <input type="hidden" id="token" name="token" value="<?= esc($token) ?>">

            <button type="submit" class="btn-submit" id="btnSubmit" disabled>
                <span class="spinner" id="spinner"></span>
                <span id="btnText">Verifikasi OTP</span>
            </button>
        </form>

        <div class="text-center-small">
            Tidak menerima kode OTP? <a onclick="resendOTP()">Kirim ulang</a>
        </div>
    </div>
</div>

<script>
const otpInputs = document.querySelectorAll('.otp-input');
const formStep2 = document.getElementById('formStep2');
const btnSubmit = document.getElementById('btnSubmit');
const timerText = document.getElementById('timerText');
const token = document.getElementById('token').value;

let timeLeft = 300; // 5 menit
let timerInterval;

// ─── OTP Input Handler ───────────────────────────────
otpInputs.forEach((input, index) => {
    input.addEventListener('input', (e) => {
        if (e.target.value && /[0-9]/.test(e.target.value)) {
            e.target.classList.add('filled');
            if (index < otpInputs.length - 1) {
                otpInputs[index + 1].focus();
            }
            checkAllFilled();
        } else {
            e.target.value = '';
            e.target.classList.remove('filled');
            btnSubmit.disabled = true;
        }
    });

    input.addEventListener('keydown', (e) => {
        if (e.key === 'Backspace' && !input.value && index > 0) {
            otpInputs[index - 1].focus();
        }
    });

    input.addEventListener('paste', (e) => {
        e.preventDefault();
        const pastedData = (e.clipboardData || window.clipboardData).getData('text');
        if (/^\d+$/.test(pastedData) && pastedData.length === 6) {
            pastedData.split('').forEach((digit, i) => {
                if (otpInputs[i]) {
                    otpInputs[i].value = digit;
                    otpInputs[i].classList.add('filled');
                }
            });
            checkAllFilled();
        }
    });
});

function checkAllFilled() {
    const allFilled = Array.from(otpInputs).every(input => input.value.length === 1);
    btnSubmit.disabled = !allFilled;
}

// ─── Timer ──────────────────────────────────────────
function startTimer() {
    timerInterval = setInterval(() => {
        timeLeft--;
        updateTimerDisplay();

        if (timeLeft <= 0) {
            clearInterval(timerInterval);
            btnSubmit.disabled = true;
            btnSubmit.textContent = 'Kode Kadaluarsa';
            showAlert('❌ Kode OTP telah kadaluarsa. Silakan minta kode baru.', 'danger');
            otpInputs.forEach(input => input.disabled = true);
        } else if (timeLeft <= 60) {
            timerText.closest('.timer') ? timerText.parentElement.classList.add('warning') : null;
        }
    }, 1000);
}

function updateTimerDisplay() {
    const minutes = Math.floor(timeLeft / 60);
    const seconds = timeLeft % 60;
    timerText.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;
}

// ─── Form Submit ────────────────────────────────────
formStep2.addEventListener('submit', async (e) => {
    e.preventDefault();

    const otpCode = Array.from(otpInputs).map(input => input.value).join('');

    if (otpCode.length !== 6) {
        showAlert('❌ Masukkan 6 digit OTP', 'danger');
        return;
    }

    btnSubmit.disabled = true;
    btnSubmit.classList.add('loading');
    document.getElementById('spinner').style.display = 'inline-block';
    document.getElementById('btnText').textContent = 'Memverifikasi...';

    try {
        const response = await fetch('<?= base_url("forgot-password/verify") ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                token: token,
                otp_code: otpCode,
            })
        });

        const result = await response.json();

        if (result.success) {
            showAlert('✅ OTP berhasil diverifikasi!', 'success');
            
            setTimeout(() => {
                window.location.href = '<?= base_url("forgot-password/reset") ?>?token=' + encodeURIComponent(token);
            }, 1500);
        } else {
            showAlert('❌ ' + (result.error || 'OTP salah'), 'danger');
        }
    } catch (error) {
        showAlert('❌ Kesalahan jaringan: ' + error.message, 'danger');
    } finally {
        btnSubmit.disabled = false;
        btnSubmit.classList.remove('loading');
        document.getElementById('spinner').style.display = 'none';
        document.getElementById('btnText').textContent = 'Verifikasi OTP';
    }
});

function showAlert(message, type) {
    const alertContainer = document.getElementById('alertContainer');
    alertContainer.innerHTML = `<div class="alert alert-${type}" role="alert">${message}</div>`;
}

function resendOTP() {
    showAlert('ℹ️ Fitur kirim ulang akan ditambahkan segera', 'info');
}

// Start timer on page load
startTimer();
otpInputs[0].focus();
</script>

</body>
</html>
