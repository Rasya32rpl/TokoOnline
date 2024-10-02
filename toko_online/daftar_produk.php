<?php 
session_start();
if($_SESSION['status_login'] != true){
    header('location: login_petugas.php');
    exit();
}

// Koneksi ke database
include "koneksi.php";

// Ambil data produk dari database
$query = "SELECT * FROM toko_produk";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #1e88e5;
            color: white;
        }
        .navbar-brand {
            font-weight: bold;
            color: white;
        }
        .container {
            margin-top: 20px;
        }
        .card {
            width: 18rem;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #2c3e50;
            border-color: #2c3e50;
        }
        .btn-primary:hover {
            background-color: #1a252f;
            border-color: #1a252f;
        }
        .btn-danger {
            background-color: #e74c3c;
        }
    </style>
</head>
<body>
<?php include "header_petugas.php"; ?>
    <!-- Navbar -->
    
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home_petugas.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tambah_produk.php">Tambah Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Daftar Produk -->
    <div class="container">
        <h3 class="mt-4">Daftar Produk</h3>
        <div class="row">
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <div class="col-md-3">
                    <div class="card">
                        <img src="foto_produk/<?= $row['foto_produk'] ?>" class="card-img-top" alt="<?= $row['nama_produk'] ?>" style="height: 300px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['nama_produk'] ?></h5>
                            <p class="card-text"><?= $row['deskripsi'] ?></p>
                            <p class="card-text"><strong>Rp<?= number_format($row['harga'], 0, ',', '.') ?></strong></p>
                            <a href="edit_produk.php?id=<?= $row['id_produk'] ?>" class="btn btn-primary">Edit</a>
                            <a href="hapus_produk.php?id_produk=<?= $row['id_produk'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
