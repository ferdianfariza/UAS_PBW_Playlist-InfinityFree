-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jan 2025 pada 07.26
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_website`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id` int(10) NOT NULL,
  `judul` varchar(30) DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `artis` text DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `gambar`, `artis`, `username`) VALUES
(1, 'Timeless', 'play.jpg', 'Playboi Carti', 'admin'),
(2, 'Agora Hillss', 'trav.jpg', 'Doja Cat', 'admin'),
(9, 'Satu Bulan', '20241222215152.jpeg', 'Bernadya', 'admin'),
(10, 'My Eyes', '20241222215233.jpg', 'Travis Scott', 'admin'),
(11, 'Pink + White', '20241222215300.jfif', 'Frank Ocean', 'admin'),
(12, 'Wejangan Caca', '20241222215326.jpg', 'Hindia', 'admin'),
(13, 'Honey', '20241222215356.jfif', 'Boy Pablo', 'admin'),
(14, 'Kita Ke Sana', '20241222215432.jpg', 'Hindia', 'admin'),
(16, 'Sign', '20241222215703.png', 'FLOW', 'ferdian'),
(17, 'Niwaka Makezu', '20241222215934.png', 'NICO', 'ferdian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id`, `gambar`, `tanggal`) VALUES
(1, 'play.jpg', '2024-12-22 17:51:54'),
(2, 'hozier.png', '2024-12-22 22:28:29'),
(3, 'play.jpg', '2024-12-22 22:29:08'),
(4, 'sial.jpeg', '2024-12-22 22:29:08'),
(5, 'soy.jfif', '2024-12-22 22:29:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` char(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
('01', 'ferdian', '48920c071f6a5c97ae3739be64630697'),
('02', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
('03', 'arsenio', '48920c071f6a5c97ae3739be64630697');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
