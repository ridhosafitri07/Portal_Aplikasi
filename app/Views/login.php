<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login – Application Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            background: #dde8f5;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-login {
            display: flex;
            width: 900px;
            max-width: 98vw;
            min-height: 480px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0,0,0,.15);
        }

        /* ── LEFT PANEL ── */
        .panel-left {
            flex: 0 0 46%;
            position: relative;
            background: linear-gradient(160deg, #cfe4f8 0%, #e8f3ff 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end;
            padding: 32px 24px 36px;
            overflow: hidden;
        }

        .panel-left .bg-img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: .92;
        }

        .panel-left .overlay-text {
            position: relative;
            z-index: 2;
            text-align: center;
        }

        .panel-left .overlay-text h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #1a5fb4;
            line-height: 1.15;
            letter-spacing: 1px;
        }

        .panel-left .overlay-text p {
            font-family: 'Poppins', cursive;
            font-size: .95rem;
            font-weight: 500;
            color: #2e7fe8;
            font-style: italic;
        }

        /* ── RIGHT PANEL ── */
        .panel-right {
            flex: 1;
            background: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 48px 52px;
        }

        .panel-right h2 {
            font-size: 2rem;
            font-weight: 700;
            color: #111;
            margin-bottom: 4px;
        }

        .panel-right .subtitle {
            font-size: .88rem;
            color: #888;
            margin-bottom: 32px;
        }

        .form-floating-custom {
            position: relative;
            margin-bottom: 18px;
        }

        .form-floating-custom .icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
            font-size: 1rem;
            z-index: 2;
        }

        .form-floating-custom input {
            width: 100%;
            background: #f2f4f8;
            border: none;
            border-radius: 10px;
            padding: 14px 44px 14px 42px;
            font-size: .9rem;
            color: #333;
            outline: none;
            transition: box-shadow .2s;
        }

        .form-floating-custom input:focus {
            box-shadow: 0 0 0 2.5px #4a9df8;
            background: #edf4ff;
        }

        .form-floating-custom .toggle-pw {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #bbb;
            font-size: 1rem;
            z-index: 2;
        }

        .forgot {
            font-size: .82rem;
            color: #555;
            text-decoration: none;
            display: block;
            margin-bottom: 24px;
        }

        .forgot:hover { color: #1a73e8; }

        .btn-login {
            width: 100%;
            padding: 14px;
            background: linear-gradient(90deg, #3d8ef0, #5cb8ff);
            border: none;
            border-radius: 10px;
            color: #fff;
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: .5px;
            cursor: pointer;
            transition: opacity .2s, transform .15s;
        }

        .btn-login:hover { opacity: .92; transform: translateY(-1px); }
        .btn-login:active { transform: translateY(0); }

        .alert-danger {
            border-radius: 10px;
            font-size: .85rem;
            margin-bottom: 18px;
        }

        @media (max-width: 700px) {
            .card-login { flex-direction: column; }
            .panel-left { min-height: 200px; flex: none; }
            .panel-right { padding: 36px 28px; }
        }
    </style>
</head>
<body>

<div class="card-login">
    <!-- LEFT -->
    <div class="panel-left">
        <img src="/images/bg-login.jpeg" alt="portal bg" class="bg-img"
             onerror="this.style.display='none'">
        <div class="overlay-text">
            <h1>WELCOME</h1>
            <p>To The Application Portal</p>
        </div>
    </div>

    <!-- RIGHT -->
    <div class="panel-right">
        <h2>Login</h2>
        <p class="subtitle">Hello, Welcome Back</p>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger py-2">
                <i class="bi bi-exclamation-circle me-1"></i>
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('/') ?>" method="POST">
            <?= csrf_field() ?>

            <div class="form-floating-custom">
                <i class="bi bi-envelope icon"></i>
                <input type="text" name="username" placeholder="Username "
                       value="<?= old('username') ?>" autocomplete="username" required>
            </div>

            <div class="form-floating-custom">
                <i class="bi bi-lock icon"></i>
                <input type="password" name="password" id="pwdField" placeholder="Password"
                       autocomplete="current-password" required>
                <span class="toggle-pw" onclick="togglePwd()">
                    <i class="bi bi-eye-slash" id="pwdIcon"></i>
                </span>
            </div>

            <a href="<?= base_url(); ?>" onclick="window.location.href='http://localhost:3000'; return false;" class="forgot">
                Forgot Password?
            </a>

            <button type="submit" class="btn-login">Login</button>
        </form>
    </div>
</div>

<script>
function togglePwd() {
    const f = document.getElementById('pwdField');
    const i = document.getElementById('pwdIcon');
    if (f.type === 'password') {
        f.type = 'text';
        i.className = 'bi bi-eye';
    } else {
        f.type = 'password';
        i.className = 'bi bi-eye-slash';
    }
}
</script>
</body>
</html>