<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berhasil - Step 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; display: flex; align-items: center; justify-content: center; }
        
        .container-success {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,.3);
            padding: 0;
            width: 100%;
            max-width: 480px;
            overflow: hidden;
            text-align: center;
        }

        .success-body {
            padding: 60px 30px 40px;
        }

        .success-icon {
            width: 100px;
            height: 100px;
            background: #e8f8f5;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            font-size: 3rem;
            color: #27ae60;
            animation: bounce 0.8s ease-in-out;
        }

        @keyframes bounce {
            0%, 100% { transform: scale(0.8); opacity: 0; }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); opacity: 1; }
        }

        .success-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1a2f5a;
            margin-bottom: 12px;
        }

        .success-message {
            font-size: 1rem;
            color: #666;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .success-details {
            background: #f5f5ff;
            border-left: 4px solid #667eea;
            border-radius: 12px;
            padding: 20px;
            margin: 30px 0;
            text-align: left;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 12px 0;
            font-size: 0.95rem;
            color: #555;
        }

        .detail-icon {
            width: 24px;
            height: 24px;
            background: #27ae60;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            flex-shrink: 0;
        }

        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 12px;
            padding: 16px 40px;
            color: white;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
            color: white;
            text-decoration: none;
        }

        .progress-bar-container {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin: 30px 0;
        }

        .step-indicator {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #e0e0e0;
            transition: background 0.3s;
        }

        .step-indicator.active {
            background: #27ae60;
        }

        .subtext {
            color: #999;
            font-size: 0.85rem;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container-success">
    <div class="success-body">
        <div class="success-icon">✓</div>

        <h1 class="success-title">Password Berhasil Direset!</h1>

        <p class="success-message">
            Selamat! Password Anda telah berhasil diperbarui dengan aman.
        </p>

        <div class="progress-bar-container">
            <div class="step-indicator active"></div>
            <div class="step-indicator active"></div>
            <div class="step-indicator active"></div>
            <div class="step-indicator active"></div>
        </div>

        <div class="success-details">
            <div class="detail-item">
                <span class="detail-icon">✓</span>
                <span>Username terverifikasi</span>
            </div>
            <div class="detail-item">
                <span class="detail-icon">✓</span>
                <span>OTP divalidasi dengan benar</span>
            </div>
            <div class="detail-item">
                <span class="detail-icon">✓</span>
                <span>Password baru tersimpan aman</span>
            </div>
            <div class="detail-item">
                <span class="detail-icon">✓</span>
                <span>Akun siap digunakan</span>
            </div>
        </div>

        <a href="<?= base_url('auth/login') ?>" class="btn-login">
            <i class="bi bi-box-arrow-in-right"></i> Kembali ke Login
        </a>

        <p class="subtext">
            Anda sekarang bisa login menggunakan password baru Anda.
        </p>
    </div>
</div>

</body>
</html>
