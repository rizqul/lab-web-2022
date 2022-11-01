<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

$create_db = "CREATE DATABASE IF NOT EXISTS xystore";

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);

if (!$conn) die("Connection failed: " . mysqli_connect_error());

// if (mysqli_query($conn, $create_db)) {
//     echo 'database created';
// } else {
//     echo 'error creating database' . mysqli_error($conn);
// }

$create_table = "CREATE TABLE IF NOT EXISTS products (
                    id INT NOT NULL,
                    title VARCHAR(255) NOT NULL,
                    price INT UNSIGNED NOT NULL,
                    `desc` TEXT,
                    qty INT UNSIGNED NOT NULL,
                    series VARCHAR(255) NOT NULL,
                    imgsource VARCHAR(255) NOT NULL,
                    PRIMARY KEY (id)
                )";

define('DB_NAME', 'xystore');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// if (mysqli_query($conn, $create_table)) {
//     echo "table created";
// } else {
//     echo 'error creating table' . mysqli_error($conn);
// }
