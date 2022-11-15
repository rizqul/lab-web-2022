-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Waktu pembuatan: 09 Nov 2022 pada 03.35
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `account`
--

CREATE TABLE `account` (
  `std_id` int(11) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data`
--

CREATE TABLE `data` (
  `NIM` varchar(50) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Alamat` varchar(255) NOT NULL,
  `Fakultas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`std_id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indeks untuk tabel `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`NIM`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `account`
--
ALTER TABLE `account`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
