<?php
include 'koneksi.php';

$Id = $_GET['Id'];

$query = "DELETE FROM donasi WHERE id=$Id";
$result = mysqli_query($conn, $query);
if ($result) {
    header('Location:data_donasi.php');
}