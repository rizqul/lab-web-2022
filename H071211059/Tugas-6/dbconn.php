<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PW', '');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PW);
if (!$conn)
    die("Connection failed: " . mysqli_connect_error());

$create_db = "CREATE DATABASE IF NOT EXISTS xystore";

mysqli_query($conn, $create_db);

$create_table = "CREATE TABLE IF NOT EXISTS products (
                   id INT NOT NULL AUTO_INCREMENT,
                   title VARCHAR(255) NOT NULL,
                   price INT UNSIGNED NOT NULL,
                   qty INT UNSIGNED,
                   series VARCHAR(255) NOT NULL,
                   imgsrc LONGTEXT,
                   PRIMARY KEY (id) 
                )";


$conn = mysqli_connect(DB_HOST, DB_USER, DB_PW, 'xystore');
if (!$conn)
    die("Connection failed: " . mysqli_connect_error());

mysqli_query($conn, $create_table);
?>