<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Step 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        
        .container-reset {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,.3);
            padding: 0;
            width: 100%;
            max-width: 480px;
            overflow: hidden;
        }

        .reset-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px 30px;
            text-align: center;
            color: white;
        }

        .reset-header h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .reset-header p {
            opacity: 0.9;
            font-size: 0.95rem;
        }

        .reset-body {
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

        .input-group-pw {
            position: relative;
        }

        .input-group-pw .form-control {
            padding-right: 45px;
        }

        .btn-toggle-pw {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #667eea;
            cursor: pointer;
            font-size: 1.2rem;
            padding: 0;
        }

        .btn-toggle-pw:hover {
            color: #764ba2;
        }

        .password-strength {
            margin-top: 8px;
            height: 4px;
            background: #e0e0e0;
            border-radius: 4px;
            overflow: hidden;
        }

        .strength-bar {
            height: 100%;
            transition: width 0.3s, background-color 0.3s;
            width: 0%;
        }

        .strength-bar.weak { width: 33%; background-color: #ff6b6b; }
        .strength-bar.fair { width: 66%; background-color: #fcc419; }
        .strength-bar.strong { width: 100%; background-color: #51cf66; }

        .match-indicator {
            font-size: 0.8rem;
            margin-top: 6px;
            color: #c92a2a;
        }

        .match-indicator.match {
            color: #27ae60;
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

        .requirements {
            background: #f5f5ff;
            border-radius: 12px;
            padding: 16px;
            margin: 20px 0;
            border-left: 4px solid #667eea;
        }

        .requirement-item {
            font-size: 0.85rem;
            color: #666;
            margin: 6px 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .requirement-icon {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            background: #e0e0e0;
            color: #999;
        }

        .requirement-icon.met {
            background: #51cf66;
            color: white;
        }
    </style>
</head>
<body>

<div class="container-reset">
    <!-- Header -->
    <div class="reset-header">
        <h1><i class="bi bi-lock-fill"></i></h1>
        <h1>Reset Password</h1>
        <p>Buat password baru yang aman. Step 3 dari 4</p>
    </div>

    <!-- Body -->
    <div class="reset-body">
        <div id="alertContainer"></div>

        <form id="formStep3">
            <div class="form-group">
                <label class="form-label">Password Baru</label>
                <div class="input-group-pw">
                    <input type="password" id="newPassword" name="new_password" class="form-control"
                           placeholder="Minimal 6 karakter"
                           required autocomplete="off">
                    <button type="button" class="btn-toggle-pw" onclick="togglePassword('newPassword', 'icon1')">
                        <i class="bi bi-eye-slash" id="icon1"></i>
                    </button>
                </div>
                <div class="password-strength">
                    <div class="strength-bar" id="strengthBar"></div>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Konfirmasi Password</label>
                <div class="input-group-pw">
                    <input type="password" id="confirmPassword" name="confirm_password" class="form-control"
                           placeholder="Ulangi password baru"
                           required autocomplete="off">
                    <button type="button" class="btn-toggle-pw" onclick="togglePassword('confirmPassword', 'icon2')">
                        <i class="bi bi-eye-slash" id="icon2"></i>
                    </button>
                </div>
                <div class="match-indicator" id="matchIndicator">
                    Password tidak cocok
                </div>
            </div>

            <div class="requirements">
                <div class="requirement-item">
                    <span class="requirement-icon" id="req1">✓</span>
                    <span>Minimal 6 karakter</span>
                </div>
                <div class="requirement-item">
                    <span class="requirement-icon" id="req2">✓</span>
                    <span>Mengandung huruf besar dan kecil</span>
                </div>
                <div class="requirement-item">
                    <span class="requirement-icon" id="req3">✓</span>
                    <span>Mengandung angka atau simbol</span>
                </div>
            </div>

            <input type="hidden" id="token" name="token" value="<?= esc($token) ?>">

            <button type="submit" class="btn-submit" id="btnSubmit" disabled>
                <span class="spinner" id="spinner"></span>
                <span id="btnText">Simpan Password Baru</span>
            </button>
        </form>

        <div class="text-center-small">
            Kembali ke <a href="<?= base_url('auth/login') ?>">login</a>
        </div>
    </div>
</div>

<script>
const newPwInput = document.getElementById('newPassword');
const confirmPwInput = document.getElementById('confirmPassword');
const matchIndicator = document.getElementById('matchIndicator');
const strengthBar = document.getElementById('strengthBar');
const btnSubmit = document.getElementById('btnSubmit');
const formStep3 = document.getElementById('formStep3');

// ─── Toggle Password Visibility ─────────────────────
function togglePassword(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);

    if (input.type === 'password') {
        input.type = 'text';
        icon.className = 'bi bi-eye';
    } else {
        input.type = 'password';
        icon.className = 'bi bi-eye-slash';
    }
}

// ─── Password Strength Checker ──────────────────────
function checkPasswordStrength(password) {
    let strength = 0;

    if (password.length >= 6) {
        strength += 1;
        document.getElementById('req1').classList.add('met');
    } else {
        document.getElementById('req1').classList.remove('met');
    }

    if (/[a-z]/.test(password) && /[A-Z]/.test(password)) {
        strength += 1;
        document.getElementById('req2').classList.add('met');
    } else {
        document.getElementById('req2').classList.remove('met');
    }

    if (/[0-9!@#$%^&*()_+=\-\[\]{};':"\\|,.<>?/]/.test(password)) {
        strength += 1;
        document.getElementById('req3').classList.add('met');
    } else {
        document.getElementById('req3').classList.remove('met');
    }

    updateStrengthBar(strength);
    return strength;
}

function updateStrengthBar(strength) {
    strengthBar.className = 'strength-bar';
    if (strength === 1) strengthBar.classList.add('weak');
    else if (strength === 2) strengthBar.classList.add('fair');
    else if (strength === 3) strengthBar.classList.add('strong');
}

// ─── Check Password Match ──────────────────────────
function checkPasswordMatch() {
    const newPw = newPwInput.value;
    const confirmPw = confirmPwInput.value;

    if (confirmPw === '') {
        matchIndicator.textContent = '';
        return false;
    }

    if (newPw === confirmPw) {
        matchIndicator.textContent = '✓ Password cocok';
        matchIndicator.classList.add('match');
        return true;
    } else {
        matchIndicator.textContent = '✗ Password tidak cocok';
        matchIndicator.classList.remove('match');
        return false;
    }
}

function updateSubmitButton() {
    const strength = newPwInput.value.length > 0 ? checkPasswordStrength(newPwInput.value) : 0;
    const match = checkPasswordMatch();
    btnSubmit.disabled = !(strength === 3 && match);
}

newPwInput.addEventListener('input', updateSubmitButton);
confirmPwInput.addEventListener('input', updateSubmitButton);

// ─── Form Submit ────────────────────────────────────
formStep3.addEventListener('submit', async (e) => {
    e.preventDefault();

    const newPassword = newPwInput.value;
    const confirmPassword = confirmPwInput.value;
    const token = document.getElementById('token').value;

    if (newPassword !== confirmPassword) {
        showAlert('❌ Password tidak cocok', 'danger');
        return;
    }

    if (newPassword.length < 6) {
        showAlert('❌ Password minimal 6 karakter', 'danger');
        return;
    }

    btnSubmit.disabled = true;
    document.getElementById('spinner').style.display = 'inline-block';
    document.getElementById('btnText').textContent = 'Menyimpan...';

    try {
        const response = await fetch('<?= base_url("forgot-password/reset") ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams({
                token: token,
                new_password: newPassword,
                confirm_password: confirmPassword,
            })
        });

        const result = await response.json();

        if (result.success) {
            showAlert('✅ Password berhasil direset!', 'success');
            
            setTimeout(() => {
                window.location.href = '<?= base_url("forgot-password/success") ?>?token=' + encodeURIComponent(token);
            }, 1500);
        } else {
            showAlert('❌ ' + (result.error || 'Terjadi kesalahan'), 'danger');
        }
    } catch (error) {
        showAlert('❌ Kesalahan jaringan: ' + error.message, 'danger');
    } finally {
        btnSubmit.disabled = false;
        document.getElementById('spinner').style.display = 'none';
        document.getElementById('btnText').textContent = 'Simpan Password Baru';
    }
});

function showAlert(message, type) {
    const alertContainer = document.getElementById('alertContainer');
    alertContainer.innerHTML = `<div class="alert alert-${type}" role="alert">${message}</div>`;
}

newPwInput.focus();
</script>

</body>
</html>
