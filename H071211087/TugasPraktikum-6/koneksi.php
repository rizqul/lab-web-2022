<?php

//Koneksi Database
$server = "localhost";
$user = "root";
$password = "pengusaha30";
$database = "dbcrud_modal";

//Buat Koneksi
$koneksi = mysqli_connect($server, $user, $password, $database) or die(mysqli_error($koneksi));