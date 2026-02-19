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
            min-height: 100vh;
            background-color: #2c3e50;
            position: fixed;
            top: 0;
            left: 0;
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
        }

        /* Judul portal di atas sidebar */
        .sidebar-brand {
            padding: 20px;
            color: white;
            font-size: 18px;
            font-weight: bold;
            border-bottom: 1px solid #3d5166;
        }

        .menu-label {
            padding: 10px 20px;
            color: #7f8c8d;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
    </style>
</head>
<body class="bg-light">
