<?php

$servername = "localhost"; 
$username   = "root";
$password   = "";
$database   = "datamahasiswa";
$port       = "3308";

$koneksi = mysqli_connect($servername, $username, $password, $database, $port);

// if ($koneksi) {
//     echo "Koneksi berhasil";
// } else {
//     die("failed to connect!");
// }