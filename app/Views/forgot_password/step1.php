<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Step 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        
        .container-forgot {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,.3);
            padding: 0;
            width: 100%;
            max-width: 480px;
            overflow: hidden;
        }

        .forgot-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px 30px;
            text-align: center;
            color: white;
        }

        .forgot-header h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .forgot-header p {
            opacity: 0.9;
            font-size: 0.95rem;
        }

        .forgot-body {
            padding: 40px 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 600;
            color: #333;
            font-size: 0.9rem;
            margin-bottom: 8px;
            display: block;
        }

        .form-control {
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 0.95rem;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            outline: none;
        }

        .form-control::placeholder {
            color: #ccc;
        }

        .input-group-icon {
            position: relative;
        }

        .input-group-icon i {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #667eea;
            font-size: 1.2rem;
        }

        .input-group-icon .form-control {
            padding-right: 45px;
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

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-submit:active {
            transform: translateY(0);
        }

        .btn-submit.loading {
            opacity: 0.7;
            pointer-events: none;
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

        .loader {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .helper-text {
            font-size: 0.8rem;
            color: #999;
            margin-top: 6px;
        }
    </style>
</head>
<body>

<div class="container-forgot">
    <!-- Header -->
    <div class="forgot-header">
        <h1><i class="bi bi-key-fill"></i></h1>
        <h1>Lupa Password?</h1>
        <p>Kami akan membantu Anda mengatur ulang password. Step 1 dari 4</p>
    </div>

    <!-- Body -->
    <div class="forgot-body">
        <div id="alertContainer"></div>

        <form id="formStep1">
            <div class="form-group">
                <label class="form-label">Username</label>
                <div class="input-group-icon">
                    <input type="text" id="username" name="username" class="form-control"
                           placeholder="Masukkan username Anda"
                           required autocomplete="off">
                    <i class="bi bi-person-fill"></i>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Nomor HP (WhatsApp)</label>
                <div class="input-group-icon">
                    <input type="tel" id="phoneNumber" name="phone_number" class="form-control"
                           placeholder="Contoh: 08123456789 atau +6281234567"
                           required autocomplete="off">
                    <i class="bi bi-telephone-fill"></i>
                </div>
                <div class="helper-text">Masukkan nomor WhatsApp yang terdaftar. Format: 0812xxx atau +6281xxx</div>
            </div>

            <button type="submit" class="btn-submit" id="btnSubmit">
                <span class="spinner" id="spinner"></span>
                <span id="btnText">Kirim OTP</span>
            </button>
        </form>

        <div class="text-center-small">
            Sudah punya akun? <a href="<?= base_url('auth/login') ?>">Kembali ke login</a>
        </div>
    </div>
</div>

<script>
const formStep1 = document.getElementById('formStep1');
const btnSubmit = document.getElementById('btnSubmit');
const spinner = document.getElementById('spinner');
const btnText = document.getElementById('btnText');
const alertContainer = document.getElementById('alertContainer');

formStep1.addEventListener('submit', async (e) => {
    e.preventDefault();

    const username = document.getElementById('username').value.trim();
    const phoneNumber = document.getElementById('phoneNumber').value.trim();

    if (!username || !phoneNumber) {
        showAlert('Username dan nomor HP harus diisi!', 'danger');
        return;
    }

    // Loading state
    btnSubmit.disabled = true;
    btnSubmit.classList.add('loading');
    spinner.style.display = 'inline-block';
    btnText.textContent = 'Mengirim OTP...';

    try {
        const response = await fetch('<?= base_url("forgot-password/api/send-otp") ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                username: username,
                phone_number: phoneNumber,
            })
        });

        const result = await response.json();

        if (result.success) {
            showAlert('✅ OTP berhasil dikirim ke WhatsApp Anda!', 'success');
            
            // Redirect ke step 2 setelah 1.5 detik
            setTimeout(() => {
                window.location.href = '<?= base_url("forgot-password/verify") ?>?token=' + encodeURIComponent(result.token);
            }, 1500);
        } else {
            showAlert('❌ ' + (result.error || 'Terjadi kesalahan'), 'danger');
        }
    } catch (error) {
        showAlert('❌ Kesalahan jaringan: ' + error.message, 'danger');
    } finally {
        btnSubmit.disabled = false;
        btnSubmit.classList.remove('loading');
        spinner.style.display = 'none';
        btnText.textContent = 'Kirim OTP';
    }
});

function showAlert(message, type) {
    alertContainer.innerHTML = `<div class="alert alert-${type}" role="alert">${message}</div>`;
}
</script>

</body>
</html>
