Panduan Integrasi – Application Portal (CI4)
Struktur file yang diberikan
app/
├── Config/
│   ├── Filters.php       ← daftarkan AuthFilter
│   └── Routes.php        ← semua route (auth / user / admin)
├── Controllers/
│   ├── AuthController.php
│   ├── UserController.php
│   └── AdminController.php
├── Filters/
│   └── AuthFilter.php    ← guard login + role
├── Models/
│   ├── UserModel.php
│   └── AppsModel.php
└── Views/
    ├── login.php          ← taruh di app/Views/login.php
    ├── user/
    │   └── dashboard.php
    └── admin/
        └── dashboard.php
Langkah integrasi
1. Salin file
Salin semua file di atas ke folder CI4 kamu sesuai path masing-masing.
2. Gambar background login
Taruh gambar di:
public/images/bg-login.png
(sudah sesuai dengan tag <img src="/images/bg-login.png"> di view login)
3. Daftarkan filter di app/Config/Filters.php
File sudah disertakan. Pastikan 'auth' => AuthFilter::class ada di $aliases.
4. Sesuaikan nama tabel (jika perlu)

UserModel → tabel user
AppsModel → tabel apps_
Join ke tabel group dan accss_users

Sesuaikan dengan nama tabel aktual di database kamu.
5. Hash password
Pastikan password di database di-hash dengan password_hash($plain, PASSWORD_DEFAULT).
Untuk generate hash sementara (seeder / manual insert):
phpecho password_hash('passwordmu', PASSWORD_DEFAULT);
6. Session
Di app/Config/App.php pastikan:
phppublic $sessionDriver = 'CodeIgniter\Session\Handlers\FileHandler';

Alur login
POST /auth/login
  └─ verifikasi username + password_hash
       ├─ role = 'admin'  →  /admin/dashboard
       └─ role = 'user'   →  /user/dashboard
Filter route
Route prefixFilterKeterangan/auth–Publik/user/*authHarus login (role bebas)/admin/*auth:adminHarus login + role admin

Pengembangan selanjutnya (admin)
Route admin sudah disiapkan (ter-comment) di Routes.php:

Manajemen User (CRUD)
Manajemen Aplikasi
Manajemen Hak Akses (accss_users)

Tinggal aktifkan route dan buat controller-nya.