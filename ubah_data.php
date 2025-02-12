<?php
include 'koneksi.php';
$Id = $_GET['Id'];

$query = "SELECT * FROM donasi WHERE Id=$Id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Donasi</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
</head>
<body>
    <div class="container">
    <center><h1>Tambah Data Donasi</h1></center>

    <form action="" method="POST">
    <label for="tbNamaPengirim">Nama Pengirim</label>
    <input type="text" id="tbNamaPengirim" name="nama" class="form-control" value="<?= $row['nama'] ?>">
    <label for="tbNominal">Nominal</label>
    <input type="number" id="tbNominal" name="nominal" class="form-control" value="<?= $row['nominal'] ?>">
    <label>Metode Pembayaran</label>
    <div class="form-check">
        <label for="tbShopee" class="form-label">Shopeepay</label>
        <input type="radio" name="metode" id="tbShopee" class="form-check-input" value="Shopeepay" <?php if ($row['metode'] == 'Shopeepay') {
            echo 'checked';
        } ?> >
    </div>
    <div class="form-check">
        <label for="tbQris" class="form-label">Qris</label>
        <input type="radio" name="metode" id="tbQris" class="form=check-input" value="Qris" <?php if ($row['metode'] == 'Qris') {
            echo 'checked';
        } ?> >
    </div>
    <div class="form-check">
        <label for="tbGopay" class="form-label">Gopay</label>
        <input type="radio" name="metode" id="tbGopay" class="form=check-input" value="Gopay" <?php if ($row['metode'] == 'Gopay') {
            echo 'checked';
        } ?> >
    </div>
    <div class="form-check">
        <label for="tbTransfer" class="form-label">Transfer</label>
        <input type="radio" name="metode" id="tbTransfer" class="form=check-input" value="Transfer" <?php if ($row['metode'] == 'Transfer') {
            echo 'checked';
        } ?> >
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Simpan Data</button>
    <button type="reset" class="btn btn-secondary">Reset Form</button>
    </form>

    <script src="js/bootstrap.min.js"></script>
    </div>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $nominal = $_POST['nominal'];
    $metode = $_POST['metode'];

    $query = "UPDATE donasi SET nama='$nama', nominal='$nominal', metode='$metode' WHERE Id=$Id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        header("Location:data_donasi.php");
    }
}