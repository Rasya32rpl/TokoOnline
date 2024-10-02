<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Pelanggan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        body {
            background-color: #ffffff; /* Background putih */
            color: #333333; /* Warna teks menjadi lebih gelap untuk kontras */
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        h3 {
            text-align: center;
            margin-bottom: 30px;
            color: #1976d2; 
            font-weight: bold;
            
        }
        table {
            background-color: #f0f0f0; /* Background tabel abu-abu terang */
            border-radius: 10px;
            overflow: hidden;
        }
        th {
            background-color: #1976d2; /* Warna header biru gelap */
            color: white;
            text-align: center;
            padding: 15px;
            border-bottom: 3px solid #dddddd;
        }
        td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #dddddd;
            color: #333333; /* Warna teks gelap */
        }
        tr:nth-child(even) {
            background-color: #90caf9; /* Warna biru muda untuk baris genap */
        }
        tr:nth-child(odd) {
            background-color: #64b5f6; /* Warna biru untuk baris ganjil */
        }
        tr:hover {
            background-color: #42a5f5; /* Warna hover biru cerah */
            color: white; /* Warna teks berubah saat di-hover agar kontras */
        }
        .btn-success {
            background-color: #43a047;
            border: none;
        }
        .btn-danger {
            background-color: #e53935;
            border: none;
        }
        .btn-primary {
            background-color: #1e88e5;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Daftar Pelanggan</h3>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>ALAMAT</th>
                    <th>NO TELEPON</th>
                    <th>USERNAME</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                include "koneksi.php";
                $qry_pelanggan = mysqli_query($conn, "SELECT * FROM toko_pelanggan");
                $no=0;
                while($data_pelanggan=mysqli_fetch_array($qry_pelanggan)){
                $no++; ?>
                <tr>
                    <td><?=$no?></td>
                    <td><?=$data_pelanggan['nama']?></td>
                    <td><?=$data_pelanggan['alamat']?></td>
                    <td><?=$data_pelanggan['telp']?></td>
                    <td><?=$data_pelanggan['username']?></td>
                    <td>
                    <a href="ubah_pelanggan.php?id_pelanggan=<?=$data_pelanggan['id_pelanggan']?>" class="btn btn-success btn-sm">Ubah</a> 
                    <a href="hapus_pelanggan.php?id_pelanggan=<?=$data_pelanggan['id_pelanggan']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
