<?php 
session_start();
if ($_SESSION['status_login'] != true) {
    header('location: login.php');
    exit();
}

// Koneksi ke database
include "koneksi.php";

// Ambil data semua transaksi
$query = "
    SELECT 
        tt.id_transaksi, 
        tp.nama AS nama_pelanggan, 
        tp2.nama_produk, 
        tt.tgl_transaksi, 
        SUM(tdt.subtotal) AS total 
    FROM 
        toko_transaksi tt
    JOIN 
        toko_pelanggan tp ON tt.id_pelanggan = tp.id_pelanggan 
    JOIN 
        toko_detail_transaksi tdt ON tt.id_transaksi = tdt.id_transaksi 
    JOIN 
        toko_produk tp2 ON tdt.id_produk = tp2.id_produk 
    GROUP BY 
        tt.id_transaksi
    ORDER BY 
        tt.tgl_transaksi DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include "header_petugas.php"; ?>
    <div class="container mt-5">
        <h2>Riwayat Transaksi</h2>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>NO</th>
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
                    <td><?= $row['tgl_transaksi'] ?></td>
                    <td><?= number_format($row['total'], 0, ',', '.') ?></td> <!-- Format total harga -->
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
