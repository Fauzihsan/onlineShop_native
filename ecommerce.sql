-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Bulan Mei 2021 pada 15.30
-- Versi server: 10.1.19-MariaDB
-- Versi PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `namaDepan` varchar(30) NOT NULL,
  `namaBelakang` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `namaDepan`, `namaBelakang`, `email`, `username`, `password`, `code`, `status`, `level`) VALUES
(109, 'Admin', 'Admin', 'admin@kaoscustomcianjur.id', 'admin', '$2y$10$m1p2eZgA8n2Ai0VNzPZzvu/UQfOHmDWthMlciKLUqQGSyUKSL/mlG', 0, 'verified', 0),
(110, 'Muhammad', 'Ihsan', 'muhammadihsan10.mifr@gmail.com', 'ihsanfa', '$2y$10$.MAbXN8kDc3XwEuVWoveseJUH7W2d55RYVRLyxrihUdpNdzb/48fe', 0, 'verified', 1),
(115, 'adit', 'ya', 'luckiers15@gmail.com', 'adit', '$2y$10$rsU7jJQKPbJlaF7QjxrBVeLmmbe8szyhHyCtCRSvTI1XilapyIA56', 812093, 'notverified', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `banner` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `banner`
--

INSERT INTO `banner` (`banner_id`, `banner`, `gambar`, `status`) VALUES
(20, 'Diskon Sale 25%', 'banner2.jpg', 'off'),
(21, 'Diskon Sale 70%', 'banner1.jpg', 'on'),
(22, 'Black Friday', 'banner3.jpg', 'on'),
(23, 'Banner Utama', 'banner4.jpg', 'on'),
(24, 'asdsafasd', 'banner2.jpg', 'on');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `mBarang` varchar(30) NOT NULL,
  `jBarang` varchar(30) NOT NULL,
  `stock` int(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `mBarang`, `jBarang`, `stock`, `harga`, `foto`, `deskripsi`) VALUES
(55, 'Kaos Polos Special Sagestone', 'Kaos Polos', 100, 80000, 'baju1607625690.jpg', '<p>BAJU POLOS SAGESTONE</p>\r\n\r\n<hr />\r\n<p>Kaos polos dengan Warna Sagestone yang jarang cocok untuk anda buat design sesuka hati sesuai dengan keinginan anda, sangat cocok juga untuk dijadikan pakaian bersama komunitas/organisasi/keluarga/teman teman anda.<br />\r\nDengan Bahan yang terjamin kualitasnya membuat anda akan nyaman saat menggunakannya.</p>\r\n\r\n<p>Jenis Bahan yang tersedia :<br />\r\n&ndash; Cotton Combed 30s<br />\r\n&ndash; Cotto Combed 24s<br />\r\n&ndash; dll</p>\r\n\r\n<p>Detail Ukuran :</p>\r\n\r\n<ul>\r\n	<li>Size S : 46cm x 66cm</li>\r\n	<li>Size M : 50cm x 70cm</li>\r\n	<li>Size L : 52cm x 72cm</li>\r\n	<li>Size XL : 56cm x 76 cm</li>\r\n	<li>Size XXL : 58cm x 78 cm</li>\r\n	<li>Size XXXL : 60cm x 80 cm</li>\r\n</ul>\r\n\r\n<p>Detail Produk :</p>\r\n\r\n<ul>\r\n	<li>Bahan Adem Tidak Gerah</li>\r\n	<li>Hand Feel Lembut</li>\r\n	<li>Leher Tidak Melar</li>\r\n	<li>Overdeck Jarum 3</li>\r\n	<li>Jahitan Leher Di Stik</li>\r\n	<li>Jahitan Rantai di pundak</li>\r\n</ul>\r\n'),
(57, 'Kaos Polos Hijau', 'Kaos Polos', 90, 60000, 'baju1607625782.jpg', '<p>BAJU POLOS HIJAU BOTOL</p>\r\n\r\n<hr />\r\n<p>Kaos polos dengan Warna Hijau Botol cocok untuk anda buat design sesuka hati sesuai dengan keinginan anda, sangat cocok juga untuk dijadikan pakaian bersama komunitas/organisasi/keluarga/teman teman anda.<br />\r\nDengan Bahan yang terjamin kualitasnya membuat anda akan nyaman saat menggunakannya.</p>\r\n\r\n<p>Jenis Bahan yang tersedia :<br />\r\n&ndash; Cotton Combed 30s<br />\r\n&ndash; Cotto Combed 24s<br />\r\n&ndash; dll</p>\r\n\r\n<p>Detail Ukuran :</p>\r\n\r\n<ul>\r\n	<li>Size S : 46cm x 66cm</li>\r\n	<li>Size M : 50cm x 70cm</li>\r\n	<li>Size L : 52cm x 72cm</li>\r\n	<li>Size XL : 56cm x 76 cm</li>\r\n	<li>Size XXL : 58cm x 78 cm</li>\r\n	<li>Size XXXL : 60cm x 80 cm</li>\r\n</ul>\r\n\r\n<p>Detail Produk :</p>\r\n\r\n<ul>\r\n	<li>Bahan Adem Tidak Gerah</li>\r\n	<li>Hand Feel Lembut</li>\r\n	<li>Leher Tidak Melar</li>\r\n	<li>Overdeck Jarum 3</li>\r\n	<li>Jahitan Leher Di Stik</li>\r\n	<li>Jahitan Rantai di pundak</li>\r\n</ul>\r\n'),
(58, 'Kaos Programming Java', 'Art', 2, 90000, 'baju1607625813.jpg', '<p>BAJU ANAK IT - PROGRAMMER JAVA</p>\r\n\r\n<hr />\r\n<p>Kaos Programmer&nbsp;dengan Desain Bahasa Pemrograman Java&nbsp;cocok untuk anda yang suka dengan dunia pemrograman<br />\r\nDengan Bahan yang terjamin kualitasnya membuat anda akan nyaman saat menggunakannya.</p>\r\n\r\n<p>Jenis Bahan yang tersedia :<br />\r\n&ndash; Cotton Combed 30s<br />\r\n&ndash; Cotto Combed 24s<br />\r\n&ndash; dll</p>\r\n\r\n<p>Detail Ukuran :</p>\r\n\r\n<ul>\r\n	<li>Size S : 46cm x 66cm</li>\r\n	<li>Size M : 50cm x 70cm</li>\r\n	<li>Size L : 52cm x 72cm</li>\r\n	<li>Size XL : 56cm x 76 cm</li>\r\n	<li>Size XXL : 58cm x 78 cm</li>\r\n	<li>Size XXXL : 60cm x 80 cm</li>\r\n</ul>\r\n\r\n<p>Detail Produk :</p>\r\n\r\n<ul>\r\n	<li>Bahan Adem Tidak Gerah</li>\r\n	<li>Hand Feel Lembut</li>\r\n	<li>Leher Tidak Melar</li>\r\n	<li>Overdeck Jarum 3</li>\r\n	<li>Jahitan Leher Di Stik</li>\r\n	<li>Jahitan Rantai di pundak</li>\r\n</ul>\r\n'),
(59, 'Kaos Polos Hitam', 'Kaos Polos', 100, 75000, 'baju1608258698.jpg', '<p>BAJU POLOS BLACK</p>\r\n\r\n<hr />\r\n<p>Kaos polos dengan Warna HITAM cocok untuk anda buat design sesuka hati sesuai dengan keinginan anda, sangat cocok juga untuk dijadikan pakaian bersama komunitas/organisasi/keluarga/teman teman anda.<br />\r\nDengan Bahan yang terjamin kualitasnya membuat anda akan nyaman saat menggunakannya.</p>\r\n\r\n<p>Jenis Bahan yang tersedia :<br />\r\n&ndash; Cotton Combed 30s<br />\r\n&ndash; Cotto Combed 24s<br />\r\n&ndash; dll</p>\r\n\r\n<p>Detail Ukuran :</p>\r\n\r\n<ul>\r\n	<li>Size S : 46cm x 66cm</li>\r\n	<li>Size M : 50cm x 70cm</li>\r\n	<li>Size L : 52cm x 72cm</li>\r\n	<li>Size XL : 56cm x 76 cm</li>\r\n	<li>Size XXL : 58cm x 78 cm</li>\r\n	<li>Size XXXL : 60cm x 80 cm</li>\r\n</ul>\r\n\r\n<p>Detail Produk :</p>\r\n\r\n<ul>\r\n	<li>Bahan Adem Tidak Gerah</li>\r\n	<li>Hand Feel Lembut</li>\r\n	<li>Leher Tidak Melar</li>\r\n	<li>Overdeck Jarum 3</li>\r\n	<li>Jahitan Leher Di Stik</li>\r\n	<li>Jahitan Rantai di pundak</li>\r\n</ul>\r\n'),
(60, 'Kaos Polos Pink', 'Kaos Polos', 97, 75000, 'baju1608863251.jpg', '<p>BAJU POLOS PINK</p>\r\n\r\n<hr />\r\n<p>Kaos polos dengan Warna PINK cocok untuk anda buat design sesuka hati sesuai dengan keinginan anda, sangat cocok juga untuk dijadikan pakaian bersama komunitas/organisasi/keluarga/teman teman anda.<br />\r\nDengan Bahan yang terjamin kualitasnya membuat anda akan nyaman saat menggunakannya.</p>\r\n\r\n<p>Jenis Bahan yang tersedia :<br />\r\n&ndash; Cotton Combed 30s<br />\r\n&ndash; Cotto Combed 24s<br />\r\n&ndash; dll</p>\r\n\r\n<p>Detail Ukuran :</p>\r\n\r\n<ul>\r\n	<li>Size S : 46cm x 66cm</li>\r\n	<li>Size M : 50cm x 70cm</li>\r\n	<li>Size L : 52cm x 72cm</li>\r\n	<li>Size XL : 56cm x 76 cm</li>\r\n	<li>Size XXL : 58cm x 78 cm</li>\r\n	<li>Size XXXL : 60cm x 80 cm</li>\r\n</ul>\r\n\r\n<p>Detail Produk :</p>\r\n\r\n<ul>\r\n	<li>Bahan Adem Tidak Gerah</li>\r\n	<li>Hand Feel Lembut</li>\r\n	<li>Leher Tidak Melar</li>\r\n	<li>Overdeck Jarum 3</li>\r\n	<li>Jahitan Leher Di Stik</li>\r\n	<li>Jahitan Rantai di pundak</li>\r\n</ul>\r\n'),
(61, 'Kaos Polos Army', 'Kaos Polos', 200, 55000, 'baju1608969240.jpg', '<p>BAJU POLOS ARMY</p>\r\n\r\n<hr />\r\n<p>Kaos polos dengan Warna ARMY cocok untuk anda buat design sesuka hati sesuai dengan keinginan anda, sangat cocok juga untuk dijadikan pakaian bersama komunitas/organisasi/keluarga/teman teman anda.<br />\r\nDengan Bahan yang terjamin kualitasnya membuat anda akan nyaman saat menggunakannya.</p>\r\n\r\n<p>Jenis Bahan yang tersedia :<br />\r\n&ndash; Cotton Combed 30s<br />\r\n&ndash; Cotto Combed 24s<br />\r\n&ndash; dll</p>\r\n\r\n<p>Detail Ukuran :</p>\r\n\r\n<ul>\r\n	<li>Size S : 46cm x 66cm</li>\r\n	<li>Size M : 50cm x 70cm</li>\r\n	<li>Size L : 52cm x 72cm</li>\r\n	<li>Size XL : 56cm x 76 cm</li>\r\n	<li>Size XXL : 58cm x 78 cm</li>\r\n	<li>Size XXXL : 60cm x 80 cm</li>\r\n</ul>\r\n\r\n<p>Detail Produk :</p>\r\n\r\n<ul>\r\n	<li>Bahan Adem Tidak Gerah</li>\r\n	<li>Hand Feel Lembut</li>\r\n	<li>Leher Tidak Melar</li>\r\n	<li>Overdeck Jarum 3</li>\r\n	<li>Jahitan Leher Di Stik</li>\r\n	<li>Jahitan Rantai di pundak</li>\r\n</ul>\r\n'),
(62, 'Kaos Polos Kelly', 'Kaos Polos', 23, 60000, 'baju1608970197.jpg', '<p>BAJU POLOS KELLY</p>\r\n\r\n<hr />\r\n<p>Kaos polos dengan Warna Kelly cocok untuk anda buat design sesuka hati sesuai dengan keinginan anda, sangat cocok juga untuk dijadikan pakaian bersama komunitas/organisasi/keluarga/teman teman anda.<br />\r\nDengan Bahan yang terjamin kualitasnya membuat anda akan nyaman saat menggunakannya.</p>\r\n\r\n<p>Jenis Bahan yang tersedia :<br />\r\n&ndash; Cotton Combed 30s<br />\r\n&ndash; Cotto Combed 24s<br />\r\n&ndash; dll</p>\r\n\r\n<p>Detail Ukuran :</p>\r\n\r\n<ul>\r\n	<li>Size S : 46cm x 66cm</li>\r\n	<li>Size M : 50cm x 70cm</li>\r\n	<li>Size L : 52cm x 72cm</li>\r\n	<li>Size XL : 56cm x 76 cm</li>\r\n	<li>Size XXL : 58cm x 78 cm</li>\r\n	<li>Size XXXL : 60cm x 80 cm</li>\r\n</ul>\r\n\r\n<p>Detail Produk :</p>\r\n\r\n<ul>\r\n	<li>Bahan Adem Tidak Gerah</li>\r\n	<li>Hand Feel Lembut</li>\r\n	<li>Leher Tidak Melar</li>\r\n	<li>Overdeck Jarum 3</li>\r\n	<li>Jahitan Leher Di Stik</li>\r\n	<li>Jahitan Rantai di pundak</li>\r\n</ul>\r\n'),
(63, 'Kaos CD Project Red', 'Art', 100, 80000, 'baju1610112646.jpg', '<p>BAJU GAMER CD PROJECT</p>\r\n\r\n<hr />\r\n<p>Kaos CD PROJECT dengan Warna maroon cocok untuk anda yang menyukai game game besutan CD PROJECT dan juga untuk kalian para Gamer<br />\r\nDengan Bahan yang terjamin kualitasnya membuat anda akan nyaman saat menggunakannya.</p>\r\n\r\n<p>Jenis Bahan yang tersedia :<br />\r\n&ndash; Cotton Combed 30s<br />\r\n&ndash; Cotto Combed 24s<br />\r\n&ndash; dll</p>\r\n\r\n<p>Detail Ukuran :</p>\r\n\r\n<ul>\r\n	<li>Size S : 46cm x 66cm</li>\r\n	<li>Size M : 50cm x 70cm</li>\r\n	<li>Size L : 52cm x 72cm</li>\r\n	<li>Size XL : 56cm x 76 cm</li>\r\n	<li>Size XXL : 58cm x 78 cm</li>\r\n	<li>Size XXXL : 60cm x 80 cm</li>\r\n</ul>\r\n\r\n<p>Detail Produk :</p>\r\n\r\n<ul>\r\n	<li>Bahan Adem Tidak Gerah</li>\r\n	<li>Hand Feel Lembut</li>\r\n	<li>Leher Tidak Melar</li>\r\n	<li>Overdeck Jarum 3</li>\r\n	<li>Jahitan Leher Di Stik</li>\r\n	<li>Jahitan Rantai di pundak</li>\r\n</ul>\r\n'),
(64, '3 Second - Hitam', '3Second', 50, 150000, 'baju1610116534.jpg', '<p>BAJU 3 Second Hitam</p>\r\n\r\n<hr />\r\n<p><br />\r\nDengan Bahan yang terjamin kualitasnya membuat anda akan nyaman saat menggunakannya.</p>\r\n\r\n<p>Jenis Bahan yang tersedia :<br />\r\n&ndash; Cotton Combed 30s<br />\r\n&ndash; Cotto Combed 24s<br />\r\n&ndash; dll</p>\r\n\r\n<p>Detail Ukuran :</p>\r\n\r\n<ul>\r\n	<li>Size S : 46cm x 66cm</li>\r\n	<li>Size M : 50cm x 70cm</li>\r\n	<li>Size L : 52cm x 72cm</li>\r\n	<li>Size XL : 56cm x 76 cm</li>\r\n	<li>Size XXL : 58cm x 78 cm</li>\r\n	<li>Size XXXL : 60cm x 80 cm</li>\r\n</ul>\r\n\r\n<p>Detail Produk :</p>\r\n\r\n<ul>\r\n	<li>Bahan Adem Tidak Gerah</li>\r\n	<li>Hand Feel Lembut</li>\r\n	<li>Leher Tidak Melar</li>\r\n	<li>Overdeck Jarum 3</li>\r\n	<li>Jahitan Leher Di Stik</li>\r\n	<li>Jahitan Rantai di pundak</li>\r\n</ul>\r\n'),
(65, '3 Second - Putih', '3Second', 50, 150000, 'baju1610116555.jpg', '<p>BAJU 3 Second Putih</p>\r\n\r\n<hr />\r\n<p><br />\r\nDengan Bahan yang terjamin kualitasnya membuat anda akan nyaman saat menggunakannya.</p>\r\n\r\n<p>Jenis Bahan yang tersedia :<br />\r\n&ndash; Cotton Combed 30s<br />\r\n&ndash; Cotto Combed 24s<br />\r\n&ndash; dll</p>\r\n\r\n<p>Detail Ukuran :</p>\r\n\r\n<ul>\r\n	<li>Size S : 46cm x 66cm</li>\r\n	<li>Size M : 50cm x 70cm</li>\r\n	<li>Size L : 52cm x 72cm</li>\r\n	<li>Size XL : 56cm x 76 cm</li>\r\n	<li>Size XXL : 58cm x 78 cm</li>\r\n	<li>Size XXXL : 60cm x 80 cm</li>\r\n</ul>\r\n\r\n<p>Detail Produk :</p>\r\n\r\n<ul>\r\n	<li>Bahan Adem Tidak Gerah</li>\r\n	<li>Hand Feel Lembut</li>\r\n	<li>Leher Tidak Melar</li>\r\n	<li>Overdeck Jarum 3</li>\r\n	<li>Jahitan Leher Di Stik</li>\r\n	<li>Jahitan Rantai di pundak</li>\r\n</ul>\r\n'),
(66, 'Greenlight - Gold', 'Greenlight', 70, 135000, 'baju1610116601.jpg', '<p>Baju Greenlight Gold</p>\r\n\r\n<hr />\r\n<p><br />\r\nDengan Bahan yang terjamin kualitasnya membuat anda akan nyaman saat menggunakannya.</p>\r\n\r\n<p>Jenis Bahan yang tersedia :<br />\r\n&ndash; Cotton Combed 30s<br />\r\n&ndash; Cotto Combed 24s<br />\r\n&ndash; dll</p>\r\n\r\n<p>Detail Ukuran :</p>\r\n\r\n<ul>\r\n	<li>Size S : 46cm x 66cm</li>\r\n	<li>Size M : 50cm x 70cm</li>\r\n	<li>Size L : 52cm x 72cm</li>\r\n	<li>Size XL : 56cm x 76 cm</li>\r\n	<li>Size XXL : 58cm x 78 cm</li>\r\n	<li>Size XXXL : 60cm x 80 cm</li>\r\n</ul>\r\n\r\n<p>Detail Produk :</p>\r\n\r\n<ul>\r\n	<li>Bahan Adem Tidak Gerah</li>\r\n	<li>Hand Feel Lembut</li>\r\n	<li>Leher Tidak Melar</li>\r\n	<li>Overdeck Jarum 3</li>\r\n	<li>Jahitan Leher Di Stik</li>\r\n	<li>Jahitan Rantai di pundak</li>\r\n</ul>\r\n'),
(67, 'Greenlight - Special Edition', 'Greenlight', 3, 140000, 'baju1610116675.jpg', '<p>BAJU Greenlight</p>\r\n\r\n<hr />\r\n<p><br />\r\nDengan Bahan yang terjamin kualitasnya membuat anda akan nyaman saat menggunakannya.</p>\r\n\r\n<p>Jenis Bahan yang tersedia :<br />\r\n&ndash; Cotton Combed 30s<br />\r\n&ndash; Cotto Combed 24s<br />\r\n&ndash; dll</p>\r\n\r\n<p>Detail Ukuran :</p>\r\n\r\n<ul>\r\n	<li>Size S : 46cm x 66cm</li>\r\n	<li>Size M : 50cm x 70cm</li>\r\n	<li>Size L : 52cm x 72cm</li>\r\n	<li>Size XL : 56cm x 76 cm</li>\r\n	<li>Size XXL : 58cm x 78 cm</li>\r\n	<li>Size XXXL : 60cm x 80 cm</li>\r\n</ul>\r\n\r\n<p>Detail Produk :</p>\r\n\r\n<ul>\r\n	<li>Bahan Adem Tidak Gerah</li>\r\n	<li>Hand Feel Lembut</li>\r\n	<li>Leher Tidak Melar</li>\r\n	<li>Overdeck Jarum 3</li>\r\n	<li>Jahitan Leher Di Stik</li>\r\n	<li>Jahitan Rantai di pundak</li>\r\n</ul>\r\n'),
(68, 'Eiger - Hitam', 'Eiger', 22, 170000, 'baju1610116698.jpg', '<p>BAJU EIGER HITAM</p>\r\n\r\n<hr />\r\n<p><br />\r\nDengan Bahan yang terjamin kualitasnya membuat anda akan nyaman saat menggunakannya.</p>\r\n\r\n<p>Jenis Bahan yang tersedia :<br />\r\n&ndash; Cotton Combed 30s<br />\r\n&ndash; Cotto Combed 24s<br />\r\n&ndash; dll</p>\r\n\r\n<p>Detail Ukuran :</p>\r\n\r\n<ul>\r\n	<li>Size S : 46cm x 66cm</li>\r\n	<li>Size M : 50cm x 70cm</li>\r\n	<li>Size L : 52cm x 72cm</li>\r\n	<li>Size XL : 56cm x 76 cm</li>\r\n	<li>Size XXL : 58cm x 78 cm</li>\r\n	<li>Size XXXL : 60cm x 80 cm</li>\r\n</ul>\r\n\r\n<p>Detail Produk :</p>\r\n\r\n<ul>\r\n	<li>Bahan Adem Tidak Gerah</li>\r\n	<li>Hand Feel Lembut</li>\r\n	<li>Leher Tidak Melar</li>\r\n	<li>Overdeck Jarum 3</li>\r\n	<li>Jahitan Leher Di Stik</li>\r\n	<li>Jahitan Rantai di pundak</li>\r\n</ul>\r\n'),
(69, 'Eiger - Putih', 'Eiger', 79, 170000, 'baju1610116721.jpg', '<p>BAJU EIGER PUTIH</p>\r\n\r\n<hr />\r\n<p>Kaos polos dengan Warna ARMY cocok untuk anda buat design sesuka hati sesuai dengan keinginan anda, sangat cocok juga untuk dijadikan pakaian bersama komunitas/organisasi/keluarga/teman teman anda.<br />\r\nDengan Bahan yang terjamin kualitasnya membuat anda akan nyaman saat menggunakannya.</p>\r\n\r\n<p>Jenis Bahan yang tersedia :<br />\r\n&ndash; Cotton Combed 30s<br />\r\n&ndash; Cotto Combed 24s<br />\r\n&ndash; dll</p>\r\n\r\n<p>Detail Ukuran :</p>\r\n\r\n<ul>\r\n	<li>Size S : 46cm x 66cm</li>\r\n	<li>Size M : 50cm x 70cm</li>\r\n	<li>Size L : 52cm x 72cm</li>\r\n	<li>Size XL : 56cm x 76 cm</li>\r\n	<li>Size XXL : 58cm x 78 cm</li>\r\n	<li>Size XXXL : 60cm x 80 cm</li>\r\n</ul>\r\n\r\n<p>Detail Produk :</p>\r\n\r\n<ul>\r\n	<li>Bahan Adem Tidak Gerah</li>\r\n	<li>Hand Feel Lembut</li>\r\n	<li>Leher Tidak Melar</li>\r\n	<li>Overdeck Jarum 3</li>\r\n	<li>Jahitan Leher Di Stik</li>\r\n	<li>Jahitan Rantai di pundak</li>\r\n</ul>\r\n'),
(71, 'Kaos Polos Maroon', 'Kaos Polos', 100, 50000, 'baju1610248186.jpg', '<p>blabslabaslkdaskdaskdoasdas</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `idBarang` int(11) NOT NULL,
  `namaBarang` varchar(50) NOT NULL,
  `hargaBarang` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `totalHarga` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `fotoBarang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id`, `idBarang`, `namaBarang`, `hargaBarang`, `qty`, `totalHarga`, `customer`, `fotoBarang`) VALUES
(8, 71, 'Kaos Polos Maroon', 50000, 1, 50000, 'cecep', 'baju1610248186.jpg'),
(9, 68, 'Eiger - Hitam', 170000, 1, 170000, 'cecep', 'baju1610116698.jpg'),
(10, 67, 'Greenlight - Special Edition', 140000, 1, 140000, 'cecep', 'baju1610116675.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id` int(11) NOT NULL,
  `namaKota` varchar(50) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id`, `namaKota`, `tarif`) VALUES
(1, 'Jakarta', 12000),
(2, 'Bandung', 10000),
(3, 'Cianjur', 6000),
(4, 'Surabaya', 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `account` varchar(50) NOT NULL,
  `id` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `tanggalPemesanan` date NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Menunggu Pembayaran'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`account`, `id`, `nama`, `nomor`, `alamat`, `kota`, `tanggalPemesanan`, `status`) VALUES
('ihsanfa', 1, 'Muhammad Ihsan Fauzi Rahman', '089658299085', 'bypass', 'Cianjur', '2021-01-29', 'Menunggu Pembayaran'),
('ihsanfa', 3, 'Muhammad Ihsan Fauzi Rahman', '089658299085', 'bypass', 'Cianjur', '2021-01-29', 'Menunggu Pembayaran'),
('ihsanfa', 7, 'Muhammad Ihsan Fauzi Rahman', '089658299085', 'KP Tanjakan Pala No.15 D RT/RW:05/04 Kel.Bojong Herang', 'Cianjur', '2021-01-10', 'Telah Diterima'),
('cecep', 9, 'Cecep', '08912312312', 'Cianjur Tanjakan Pala', 'Surabaya', '2021-01-10', 'Telah Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(11) NOT NULL,
  `nomorFaktur` int(11) NOT NULL,
  `idBarang` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `nomorFaktur`, `idBarang`, `qty`) VALUES
(69, 7, 67, 2),
(70, 7, 63, 1),
(71, 9, 60, 2),
(72, 9, 68, 1),
(73, 9, 71, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `praorders`
--

CREATE TABLE `praorders` (
  `id` int(11) NOT NULL,
  `account` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `praorders`
--
ALTER TABLE `praorders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT untuk tabel `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `praorders`
--
ALTER TABLE `praorders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
