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

// Cek apakah sesi pelanggan aktif
if (!isset($_SESSION['id_pelanggan'])) {
    // Jika sesi tidak ditemukan, arahkan pengguna kembali ke halaman login
    header('Location: login.php');
    exit();
}

// Koneksi ke database
include "koneksi.php";

// Ambil ID pelanggan dari sesi
$id_pelanggan = $_SESSION['id_pelanggan'];

// Ambil data transaksi hanya untuk pelanggan yang sedang login
$query = "SELECT 
                toko_transaksi.id_transaksi, 
                toko_pelanggan.nama AS nama_pelanggan, 
                toko_produk.nama_produk, 
                toko_transaksi.tgl_transaksi, 
                SUM(toko_detail_transaksi.subtotal) AS total 
          FROM 
                toko_transaksi 
          JOIN 
                toko_pelanggan ON toko_transaksi.id_pelanggan = toko_pelanggan.id_pelanggan 
          JOIN 
                toko_detail_transaksi ON toko_transaksi.id_transaksi = toko_detail_transaksi.id_transaksi 
          JOIN 
                toko_produk ON toko_detail_transaksi.id_produk = toko_produk.id_produk
          WHERE 
                toko_transaksi.id_pelanggan = '$id_pelanggan'
          GROUP BY 
                toko_transaksi.id_transaksi
          ORDER BY 
                toko_transaksi.tgl_transaksi DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .container {
            margin-top: 50px;
        }
        h3 {
            text-align: center;
            color: #007bff;
            margin-bottom: 30px;
        }
        .table {
            background-color: white;
            border-radius: 8px;
        }
        thead {
            background-color: #007bff;
            color: white;
        }
        tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }
        tbody tr:hover {
            background-color: #d1e7fd;
        }
        .card-header {
            background-color: #28a745;
            color: white;
        }
        .text-muted {
            color: #6c757d !important;
        }
        h4{
            color: darkblue !important;
        }
    </style>
</head>
<body>
<?php include "header.php"; ?>
    <div class="container">
        <h3>Riwayat Transaksi</h3>

        <div class="card">
            <div class="card-header">
                <h4>Transaksi Anda</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Nama Produk</th>
                            <th>Tanggal Transaksi</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 0;
                        while ($row = mysqli_fetch_assoc($result)):
                            $no++; ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $row['nama_pelanggan'] ?></td>
                            <td><?= $row['nama_produk'] ?></td>
                            <td><?= date('d M Y', strtotime($row['tgl_transaksi'])) ?></td>
                            <td>Rp <?= number_format($row['total'], 0, ',', '.') ?></td> <!-- Format total harga -->
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
