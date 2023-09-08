-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Sep 2023 pada 04.12
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ruq_indoland`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aufa_contact`
--

CREATE TABLE `aufa_contact` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `title` varchar(25) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aufa_photo`
--

CREATE TABLE `aufa_photo` (
  `id` int(11) NOT NULL,
  `title` varchar(25) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `descPhoto` text NOT NULL,
  `namalu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `aufa_users`
--

CREATE TABLE `aufa_users` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `photoProfile` varchar(50) NOT NULL,
  `biodata` text NOT NULL,
  `level` enum('admin','member','') NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `aufa_users`
--

INSERT INTO `aufa_users` (`id`, `name`, `username`, `password`, `photoProfile`, `biodata`, `level`) VALUES
(1, 'Aufa', 'Aufa', 'aufa123', 'muka ridwan.jpg', '   Anjay aku admin ', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aufa_contact`
--
ALTER TABLE `aufa_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aufa_photo`
--
ALTER TABLE `aufa_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aufa_users`
--
ALTER TABLE `aufa_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aufa_contact`
--
ALTER TABLE `aufa_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `aufa_photo`
--
ALTER TABLE `aufa_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `aufa_users`
--
ALTER TABLE `aufa_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
