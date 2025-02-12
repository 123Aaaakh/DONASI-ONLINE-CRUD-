<?php include 'koneksi.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Donasi</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-expand bg-dark sticky-top">
    <div class="container">
            <a href="index.php" class="navbar-brand text-white fw-bold">PEDULI LINDUNGI</a>
            <?php
            session_start();
            if ($_SESSION['is_login'] != true) { ?>
            <a href="login.php" class="btn btn-outline-primary">Loginkan</a>
            <?php } else { ?> 
                <div>
                    <a href="data_donasi.php" class="btn btn-outline-primary">Dashboard</a>
                    <a href="logout.php" class="btn btn-danger">Logout</a>
                </div>
            <?php } ?>
        </div>
    </nav>

    <div class="text-white text-center py-5" style="background: url('img/nighttime.webp'); background-size: cover; background-position: center;">
        <div class="container">
            <h1 class="fw-bold">Peduli Lindungi</h1>
            <p class="py-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

            <div class="row bg-dark border border-light py-2 mt-5">
                <div class="col-md-4">
                    <?php 
                    $query = "SELECT SUM(nominal) AS total_donasi FROM donasi";
                    $result = mysqli_query($conn, $query);
                    $total_donasi = mysqli_fetch_array($result);
                    ?>
                    <h3 class="fw-bold" >Rp. <?= $total_donasi['total_donasi'] ?></h3>
                    <p class="text-uppercase">Dana yang dikumpulkan</p>
                </div>
                <div class="col-md-4">
                    <?php 
                    $query = "SELECT COUNT(*) AS total_donatur FROM donasi";
                    $result = mysqli_query($conn, $query);
                    $total_donatur = mysqli_fetch_array($result);
                    ?>
                    <h3 class="fw-bold" ><?= $total_donatur['total_donatur'] ?></h3>
                    <p class="text-uppercase">Donatur</p>
                </div>
                <div class="col-md-4">
                    <?php 
                    $query = "SELECT tanggal_diterima FROM donasi ORDER BY tanggal_diterima DESC LIMIT 1";
                    $result = mysqli_query($conn, $query);
                    $tanggal_diterima = mysqli_fetch_array($result);
                    ?>
                    <h3 class="fw-bold" ><?= $tanggal_diterima['tanggal_diterima'] ?></h3>
                    <p class="text-uppercase">Tanggal Donasi</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
    <center><h1 class="fw-bold">Daftar Donatur yang Tergabung</h1></center>
    <table class="table table-dark">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Donatur</th>
                <th>Nominal</th>
                <th>Metode Pembayaran</th>
                <th>Tangga Diterima </th>
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
                <td><?= $row['metode'] ?></td>
                <td><?= $row['tanggal_diterima'] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>

    <div class="bg-dark text-white text-center py-5 mt-auto">
        <h3 class="fw-bold">Thanks for donating</h3>
    </div>

    <script src="js/bootstrap.min.js"></script>    
</body>
</html>