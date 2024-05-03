-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Bulan Mei 2024 pada 11.47
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
-- Database: `my_blog_rpl1_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog_tbl`
--

CREATE TABLE `blog_tbl` (
  `id_blog` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tgl` date NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `blog_tbl`
--

INSERT INTO `blog_tbl` (`id_blog`, `judul`, `isi`, `tgl`, `gambar`, `id_user`, `slug`) VALUES
(4, 'Coba Gambar', 'Ini adalah upload gambar untuk pertama kalinya', '2024-04-16', 'img_blog240422085001.jpg', 1, ''),
(6, 'Penggaris', 'postingan ini nama gambar tidak akan sama walaupun file gambar sama', '2024-04-16', 'img_blog240503112440.png', 1, ''),
(7, 'Coba Upload Lagi', 'asdasdasd', '2024-04-16', 'img_blog240416081820.jpg', 1, ''),
(16, 'Perbaiki Alert Pada Pesan Berhasil 2', 'postingan ini merupakan postingan yg dapat memberikan pesan berhasil', '2024-04-22', 'img_blog240422075824.jpg', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_tbl`
--

INSERT INTO `user_tbl` (`id_user`, `username`, `passwd`, `nama`, `foto`) VALUES
(1, 'admin1', 'abcd', 'Ferdy Herdianto', '---');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `blog_tbl`
--
ALTER TABLE `blog_tbl`
  ADD PRIMARY KEY (`id_blog`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `blog_tbl`
--
ALTER TABLE `blog_tbl`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `blog_tbl`
--
ALTER TABLE `blog_tbl`
  ADD CONSTRAINT `blog_tbl_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user_tbl` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
