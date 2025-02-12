<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'crud_donasi';

try {
    $conn = mysqli_connect($hostname,$username, $password, $database); 
    //code...
} catch (Exception $e) {
    echo "<b> Koneksi gagal</b>" .$e;
    //throw $th;
}