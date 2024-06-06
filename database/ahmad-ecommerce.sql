-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 06, 2024 at 02:37 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahmad-ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

DROP TABLE IF EXISTS `carousel`;
CREATE TABLE IF NOT EXISTS `carousel` (
  `id_carousel` int NOT NULL AUTO_INCREMENT,
  `foto` varchar(50) NOT NULL,
  `id_produk` int NOT NULL,
  PRIMARY KEY (`id_carousel`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id_carousel`, `foto`, `id_produk`) VALUES
(18, '20240529032510.jpg', 19),
(17, '20240529032444.jpg', 19),
(16, '20240529032421.jpg', 18),
(15, '20240529032413.jpg', 17),
(14, '20240529032406.jpg', 16),
(13, '20240529032345.jpg', 17),
(12, '20240529032337.jpg', 18),
(11, '20240529032328.jpg', 16),
(19, '20240530011209.jpg', 21),
(20, '20240530011216.jpg', 21),
(26, '20240530013310.jpg', 24),
(25, '20240530013303.jpg', 24),
(27, '20240530014718.jpg', 25),
(28, '20240530014726.jpg', 25),
(29, '20240604045414.jpg', 26),
(30, '20240604045421.jpg', 26);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

DROP TABLE IF EXISTS `detail_pembelian`;
CREATE TABLE IF NOT EXISTS `detail_pembelian` (
  `id_detail` int NOT NULL AUTO_INCREMENT,
  `kode_pembelian` int NOT NULL,
  `sub_total` decimal(10,0) NOT NULL,
  `jumlah` int NOT NULL,
  `id_produk` int NOT NULL,
  `size` varchar(10) NOT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_detail`, `kode_pembelian`, `sub_total`, `jumlah`, `id_produk`, `size`) VALUES
(33, 2406064, '120000', 2, 25, 'XL'),
(32, 2406063, '120000', 2, 24, 'XL'),
(30, 2406042, '1000000', 20, 26, 'XL'),
(29, 2406041, '600000', 10, 21, 'XL'),
(28, 2405302, '120000', 2, 24, 'M'),
(27, 2405291, '825000', 11, 17, 'XL');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(30) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Acid Design'),
(3, 'personal'),
(4, 'Garage T-shirt'),
(5, 'sport');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

DROP TABLE IF EXISTS `keranjang`;
CREATE TABLE IF NOT EXISTS `keranjang` (
  `id_keranjang` int NOT NULL AUTO_INCREMENT,
  `id_produk` int NOT NULL,
  `id_pelanggan` int NOT NULL,
  `jumlah` int NOT NULL,
  `size` varchar(10) NOT NULL,
  PRIMARY KEY (`id_keranjang`)
) ENGINE=MyISAM AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_produk`, `id_pelanggan`, `jumlah`, `size`) VALUES
(98, 19, 4, 2, 'XL');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `whatsapp` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `username`, `password`, `alamat`, `whatsapp`) VALUES
(3, 'epep', 'ffmax', '6ebfdb463a1fee36cacb4dc5430ee736', 'mojobanana', '0992 9223 2020'),
(4, 'denis', 'detol', '74b0c65c19c81533fa81b6984eacedc6', 'bedoyo, pereng , mojogedang , karanganyar', '0992 9223 2020'),
(6, 'ahmad', 'hydtry', '61243c7b9a4022cb3f8dc3106767ed12', 'default', 'default'),
(7, 'ahmad', 'ahmad', '61243c7b9a4022cb3f8dc3106767ed12', 'Jayakarta', 'default'),
(9, 'huda', 'huda354', 'b7732241b52f372d7fd7b13ba953bb5d', 'default', 'default');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE IF NOT EXISTS `pembelian` (
  `id_pembelian` int NOT NULL AUTO_INCREMENT,
  `kode_pembelian` int NOT NULL,
  `total_harga` decimal(10,0) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pelanggan` int NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pembelian`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `kode_pembelian`, `total_harga`, `tanggal`, `id_pelanggan`, `status`) VALUES
(27, 2406064, '120000', '2024-06-06', 9, ''),
(26, 2406063, '181000', '2024-06-06', 9, ''),
(25, 2406042, '1000000', '2024-06-04', 7, 'Pembungkusan'),
(24, 2406041, '600000', '2024-06-04', 7, 'Pembungkusan'),
(23, 2405302, '120000', '2024-05-30', 4, 'Terima'),
(22, 2405291, '825000', '2024-05-29', 3, 'Terima');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

DROP TABLE IF EXISTS `produk`;
CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(30) NOT NULL,
  `id_kategori` int NOT NULL,
  `harga` int NOT NULL,
  `stok` int NOT NULL,
  `kode_produk` int NOT NULL,
  `foto` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `id_kategori`, `harga`, `stok`, `kode_produk`, `foto`, `deskripsi`) VALUES
(16, 'Saturn design', 2, 75000, 77, 2147483647, '20240423083336.jpg', '<p><strong>satrun design&nbsp;</strong>adalah design yang terinspirasi dari planet saturn, dan lagu dari&nbsp;<strong>sza&nbsp;</strong>yaitu saturn</p>'),
(17, 'White Personal', 3, 75000, 9978, 2147483647, '20240423084447.jpg', '<p>ini adalah baju yang bisa di request sesuai dengan client inginkan</p>'),
(18, 'Eiffel Tower', 2, 75000, 8974, 2147483647, '20240425063604.jpg', '<p><strong>eiffel design </strong>adalah design yang terinspirasi dari menara eiffel yang ada di prancis</p>'),
(19, 'DWISASESA', 3, 61000, 32, 2147483647, '20240521042611.jpg', '<p><strong>redesign&nbsp;</strong>dari dwisasesa</p>'),
(21, 'Sparko T-shirt', 5, 60000, 10, 2147483647, '20240530011200.jpg', '<p><strong>Sparko T-shirt</strong> adalah kaos yang cocok untuk pecinta olahraga</p>'),
(24, 'To be Rich', 2, 60000, 32, 2147483647, '20240530013255.jpg', '<p><strong>To be Rich the vibes</strong></p>'),
(25, 'The Designers', 3, 60000, 18, 2147483647, '20240530014708.jpg', '<p><strong>The Designers T-shirt</strong></p>'),
(26, 'Polosan Kelassz', 3, 50000, 30, 2147483647, '20240604045406.jpg', '<p><strong>terinspirasi dari gila polos</strong></p>');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `id_profile` int NOT NULL AUTO_INCREMENT,
  `nama_toko` varchar(30) NOT NULL,
  `bidang` varchar(30) NOT NULL,
  `detail_toko` text NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `instagram` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(20) NOT NULL,
  `wa` varchar(20) NOT NULL,
  PRIMARY KEY (`id_profile`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id_profile`, `nama_toko`, `bidang`, `detail_toko`, `alamat`, `instagram`, `email`, `wa`) VALUES
(1, 'Daa', 'T-shirt ', '<p><strong>Daa T-shirt</strong> adalah sebuah marketplace yang bergerak di bidang T-shirt, dengan berbagai model yang menarik</p>', 'bedoyo, pereng , mojogedang , karanganyar', 'https://www.instagram.com/hyd.try', 'nmhuda7@gmail.com', '0821-2492-5044');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `password`) VALUES
(3, 'username', 'nama', '14c4b06b824ec593239362517f538b29'),
(6, 'admin', 'Ahmad Khoirul Huda', '21232f297a57a5a743894a0e4a801fc3'),
(7, 'khoirul', 'khoirul', '50f5781d91407e87075074a48f5f079b');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
