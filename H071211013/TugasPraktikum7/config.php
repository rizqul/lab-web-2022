<?php
$host   = "localhost";
$user   = "root";
$pass   = "";
$db     = "magang";
$port   = 3307;

$koneksi    = mysqli_connect($host, $user, $pass, $db, $port);
if (!$koneksi) { 
    die("Can't make a connection to database");
} 
