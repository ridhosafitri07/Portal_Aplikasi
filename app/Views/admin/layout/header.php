<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Portal Aplikasi' ?></title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* Sidebar fix di kiri */
        #sidebar {
            width: 250px;
            height: 100vh;
            background-color: #2c3e50;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            z-index: 1000;
        }

        /* Konten utama geser ke kanan */
        #content {
            margin-left: 250px !important;
            padding: 20px;
        }

        /* Warna teks menu sidebar */
        #sidebar a {
            color: #bdc3c7;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
            transition: 0.2s;
        }

        /* Hover menu sidebar */
        #sidebar a:hover {
            background-color: #3d5166;
            color: white;
        }

        /* Menu yang sedang aktif */
        #sidebar a.active {
            background-color: #1abc9c;
            color: white;
            border-left: 4px solid #16a085;
        }

        /* Judul portal di atas sidebar */
        .sidebar-brand {
            padding: 25px 20px;
            color: white;
            font-size: 20px;
            font-weight: bold;
            border-bottom: 1px solid #34495e;
            background-color: #2c3e50;
        }

        .user-info-section {
            padding: 20px;
            background-color: #34495e;
            border-bottom: 1px solid #3d5166;
        }

        .user-avatar {
            font-size: 2.5rem;
            color: #ecf0f1;
            line-height: 1;
        }

        .user-name {
            font-weight: 600;
            color: white;
            font-size: 0.9rem;
            margin-bottom: 2px;
            max-width: 140px;
        }

        .role-badge {
            font-size: 0.7rem;
            text-transform: uppercase;
            padding: 3px 8px;
            border-radius: 5px;
            background-color: rgba(26, 188, 156, 0.2) !important;
            color: #1abc9c !important;
            border: 1px solid rgba(26, 188, 156, 0.3);
        }

        .menu-label {
            padding: 20px 20px 10px 20px;
            color: #95a5a6;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-weight: bold;
        }

        .account-section {
            background-color: #243342;
            border-top: 1px solid #34495e;
            padding-bottom: 10px;
        }

        .logout-link:hover {
            background-color: #c0392b !important;
            color: white !important;
        }

        #sidebar i {
            margin-right: 10px;
            font-size: 1.1rem;
        }
    </style>
</head>
<body class="bg-light">
