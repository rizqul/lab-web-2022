<?php

$servername = "localhost:3308";
$username = "root";
$password = "";

$conn = new MySQLi($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$createDB = "CREATE DATABASE mahasiswa";
if ($conn->query($createDB) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

mysqli_select_db($conn, "mahasiswa");

$createTable = "CREATE TABLE `data` (
    `NIM` varchar(50) NOT NULL PRIMARY KEY,
    `Nama` varchar(255) NOT NULL,
    `Alamat` varchar(255) NOT NULL,
    `Fakultas` varchar(255) NOT NULL
)";
if ($conn->query($createTable) === TRUE) {
    echo "Table data created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}