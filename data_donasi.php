<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Donasi</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
</head>
<body>
    <div class="container"
    <center><h1>Data Donasi</h1></center>
    <a href="tambah_donasi.php" class="btn btn-primary mb-2">Tambah Donasi</a>
    <table class="table table-dark">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Donatur</th>
                <th>Nominal</th>
                <th>Tanggal Diterima</th>
                <th>Metode Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php';
            $query = "SELECT * FROM donasi";
            $result = mysqli_query($conn, $query);

            $no = 0;
            while ($row = mysqli_fetch_array($result)) {
                $no++; ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $row['nama'] ?></td>
                <td>Rp. <?= $row['nominal'] ?></td>
                <td><?= $row['tanggal_diterima'] ?></td>
                <td><?= $row['metode'] ?></td>
                <td>
                    <a href="ubah_data.php?Id=<?= $row['Id'] ?>" class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="hapus_donasi.php?Id=<?= $row['Id'] ?>" class="btn btn-outline-danger" onclick="return confirm('Are yu sur?')"><i class="fa-solid fa-trash-arrow-up"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>