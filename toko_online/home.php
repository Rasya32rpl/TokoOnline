<style>
    h2{
        color: darkblue !important;
        font-family: arial;
    }
</style>
<?php 
include "header.php";
?>

<div class="container">
    <h2>Selamat Datang, <?=$_SESSION['nama']?>!</h2>
    <p class="lead">Silahkan berbelanja</p>

    <!-- Tampilan daftar produk secara grid -->
    <div class="row">
        <?php
        include "koneksi.php";
        $query = "SELECT * FROM toko_produk";
        $result = mysqli_query($conn, $query);
        
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="foto_produk/<?= $row['foto_produk'] ?>" class="card-img-top" alt="<?= $row['nama_produk'] ?>" style="max-height: 250px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['nama_produk'] ?></h5>
                        <p class="card-text"><?= $row['deskripsi'] ?></p>
                        <p class="card-text"><strong>Rp <?= number_format($row['harga'], 0, ',', '.') ?></strong></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="beli_produk.php?id_produk=<?= $row['id_produk'] ?>" class="btn btn-sm btn-outline-success">Beli</a>
                                <a href="tambah_keranjang.php?id=<?= $row['id_produk'] ?>" class="btn btn-sm btn-outline-primary">Tambah ke Keranjang</a>
                            </div>
                            <small class="text-muted">Tersedia</small>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php 
include "footer.php";
?>
