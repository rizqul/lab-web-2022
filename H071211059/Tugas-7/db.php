<?php

function createDbTable()
{
    $host = 'localhost';
    $user = 'root';
    $pw = '';

    try
    {
        $conn = new PDO("mysql:host=$host", $user, $pw);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE IF NOT EXISTS xy_crud";
        $conn->exec($sql);
        $sql = "use xy_crud";
        $conn->exec($sql);
        $sql = "CREATE TABLE IF NOT EXISTS `xy_crud`.`products` (
        `id` INT NOT NULL AUTO_INCREMENT ,
        `product_code` VARCHAR(255) NOT NULL ,
        `title` VARCHAR(255) NOT NULL ,
        `price` FLOAT NOT NULL ,
        `qty` INT NOT NULL ,
        `series` VARCHAR(255) NOT NULL ,
        `product_desc` LONGTEXT,
        `imgsrc` LONGTEXT ,
        PRIMARY KEY (`id`), UNIQUE `product_code` (`product_code`)
        ) ENGINE = InnoDB;";
        $conn->exec($sql);
        $sql = "CREATE TABLE IF NOT EXISTS `users` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `trn_date` datetime NOT NULL,
        `name` varchar(50) NOT NULL,
        `username` varchar(50) NOT NULL,
        `email` varchar(50) NOT NULL,
        `password` varchar(50) NOT NULL,
        PRIMARY KEY (`id`)
        );";
        $conn->exec($sql);
    } catch (PDOException $e) {
        echo "Error" . $e->getMessage();
    }
}