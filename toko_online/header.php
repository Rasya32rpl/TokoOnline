<?php
// Cek apakah sesi sudah dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Memulai sesi jika belum dimulai
}

// Cek status login
if ($_SESSION['status_login'] != true) {
    header('location: login.php');
    exit();
}

// Fungsi untuk menentukan apakah halaman aktif
function isActivePage($pageName) {
    return strpos($_SERVER['PHP_SELF'], $pageName) !== false ? 'active-link' : '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Gaya untuk Navbar */
        .navbar {
            background-color: #007bff; /* Warna utama navbar */
        }

        .navbar-brand, .nav-link {
            color: white !important; /* Warna teks default pada navbar */
            transition: color 0.3s ease;
        }

        .navbar-brand:hover, .nav-link:hover {
            color: #ffc107 !important; /* Warna teks saat di-hover */
        }

        /* Warna khusus untuk halaman aktif */
        .active-link {
            color: #ffc107 !important; /* Warna khusus untuk link halaman aktif */
        }

        .navbar-toggler {
            border-color: white; /* Warna garis menu saat layar kecil */
        }

        /* Gaya untuk Navbar pada layar kecil */
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba%28255, 255, 255, 1%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="#">Toko Online</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?= isActivePage('home.php') ?>" href="home.php">Home</a>
                    </li>
                    <!-- Menu daftar produk -->
                    <li class="nav-item">
                        <a class="nav-link <?= isActivePage('daftar_produk_pelanggan.php') ?>" href="daftar_produk_pelanggan.php">Daftar Produk</a>
                    </li>
                    <!-- Menu riwayat transaksi -->
                    <li class="nav-item">
                        <a class="nav-link <?= isActivePage('riwayat_transaksi.php') ?>" href="riwayat_transaksi.php">Riwayat Transaksi</a>
                    </li>
                    <!-- Menu keranjang -->
                    <li class="nav-item">
                        <a class="nav-link <?= isActivePage('keranjang.php') ?>" href="keranjang.php">Keranjang</a>
                    </li>
                    <!-- Menu logout -->
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
