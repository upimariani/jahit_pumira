-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2022 at 02:17 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jahit_pumira`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatting`
--

CREATE TABLE `chatting` (
  `id_chatting` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pelanggan_send` text NOT NULL,
  `admin_send` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `custom`
--

CREATE TABLE `custom` (
  `id_custom` int(11) NOT NULL,
  `id_transaksi` varchar(20) NOT NULL,
  `nama_bahan` varchar(20) NOT NULL,
  `pjng_baju` varchar(10) NOT NULL,
  `pjng_lengan` varchar(10) NOT NULL,
  `bahu` varchar(10) NOT NULL,
  `pundak` varchar(10) NOT NULL,
  `gambar_model` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custom`
--

INSERT INTO `custom` (`id_custom`, `id_transaksi`, `nama_bahan`, `pjng_baju`, `pjng_lengan`, `bahu`, `pundak`, `gambar_model`) VALUES
(1, '20220413RGAHNKJC', 'UPI MARIAN', '12', '67', '23', '67', 'js2.jpg'),
(2, '20220425YP1S4QMJ', 'Rayon', '122', '23', '12', '10', 'IMG-20210722-WA0001.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `alamat_customer` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `alamat_customer`, `no_hp`, `username`, `password`, `create_time`) VALUES
(1, 'Sherly Yudistira', 'WInduherang, Kuningan', '085156727368', 'sherly', 'sherly12345', '2022-04-07 06:50:49'),
(2, 'coba', 'ddsds', '0582569874569', 'qwqw', 'fdfd', '2022-04-09 01:29:22'),
(3, 'Zara', 'Kuningan Jawa barat', '085156727368', 'zara', 'zara12345', '2022-04-25 06:19:44');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` varchar(20) NOT NULL,
  `id_size` int(11) NOT NULL,
  `qty` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `id_size`, `qty`) VALUES
(1, '1', 1, '3'),
(2, '1', 2, '2'),
(3, '20220408O091BGC3', 1, '4'),
(4, '20220408O091BGC3', 6, '1'),
(5, '20220408SYEZJ2Z5', 1, '1'),
(6, '20220408S574QOMA', 1, '2'),
(7, '2022040862NQF93R', 1, '2'),
(8, '20220414QUXIGVH8', 15, '1'),
(9, '20220414QUXIGVH8', 17, '1'),
(10, '20220414WKHUDIFY', 15, '1'),
(11, '20220414WKHUDIFY', 12, '1'),
(12, '20220425W1WDFVKE', 6, '2');

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

CREATE TABLE `diskon` (
  `id_diskon` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_diskon` varchar(50) NOT NULL,
  `besar_diskon` int(11) NOT NULL,
  `tgl_selesai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diskon`
--

INSERT INTO `diskon` (`id_diskon`, `id_produk`, `nama_diskon`, `besar_diskon`, `tgl_selesai`) VALUES
(1, 1, 'rizki', 15, '2022-05-19'),
(2, 2, '0', 0, '0'),
(9, 12, '0', 0, '0'),
(10, 13, '0', 0, '0'),
(11, 14, '0', 0, '0'),
(12, 15, 'coba', 20, '2022-05-19'),
(13, 16, '0', 0, '0'),
(14, 17, '0', 0, '0'),
(15, 18, '0', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Celana'),
(3, 'Baju');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(125) NOT NULL,
  `berat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `deskripsi`, `gambar`, `berat`) VALUES
(1, 3, 'Gamis Series Khadijah', '<p>Terbuat dari Bahan <strong>Kattun </strong>Premium</p>', 'dress2.jpg', 700),
(2, 3, 'Kemeja Series', '<p>Kemeja Katun <strong>Premiun Edition</strong></p>\r\n<p><em><strong>Let\'s add to cart!</strong></em></p>', 'img1.jpg', 500),
(12, 3, 'Basic Casual', '<p>Bahan dijamin adem,<em>let\'s add to cart!</em></p>', 'coton.jpg', 150),
(13, 3, 'Saturday Wear', '<p>Rok balita bahan katun <em><strong>premium high quality</strong></em></p>', 'kjkj4.png', 200),
(14, 3, 'Hip Hop Streetwear Harajuku T Shirt Girl', '<p>2021 Hip Hop <em><strong>Streetwear Harajuku T Shirt Girl Japanese Kanji Print Tshirt Men Summer Short Sleeve Cotton Loose oversized</strong></em> T-Shirt - Blue _ L (1)</p>', '2021_Hip_Hop_Streetwear_Harajuku_T_Shirt_Girl_Japanese_Kanji1.jpg', 100),
(15, 3, 'Kaos Polos Corak Hitam Pink', '<p>Bahan katun Premium Kualitas Tinggi</p>', '50698faf-b96e-4d76-a585-b1ce3ebd901c.jpg', 100),
(16, 3, 'Kaos Putih Biru', '<p>Bahan Katun<strong> Premium Limited</strong> edition</p>', 'Camiseta_de_manga_corta_de_color_combinado___SHEIN….jpg', 100),
(17, 3, 'Kaos Hitam Naga', '<p>Camisetas de manga corta 100% algod&oacute;n con estampado fotogr&aacute;fico de paisaje cuadrado para hombre</p>', 'Camisetas_de_manga_corta.jpg', 100),
(18, 3, 'Red Street', '<p>Red Street Premium Original</p>', 'Monero___XMR_OSB_T-Shirt_Premium_-_Red___3XL.png', 100);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id_size` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `size` varchar(50) NOT NULL,
  `stok` varchar(15) NOT NULL,
  `harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id_size`, `id_produk`, `size`, `stok`, `harga`) VALUES
(1, 1, 'S', '7', '95000'),
(2, 1, 'L', '5', '100000'),
(3, 1, 'XL', '16', '150000'),
(4, 2, 'L', '5', '100000'),
(5, 2, 'XL', '20', '150000'),
(6, 12, 'S', '9', '75000'),
(7, 12, 'L', '5', '80000'),
(8, 12, 'XL', '11', '89000'),
(9, 13, 'L', '5', '210000'),
(10, 13, 'XL', '4', '300000'),
(11, 14, 'L', '20', '50000'),
(12, 14, 'XL', '9', '60000'),
(13, 15, 'L', '11', '50000'),
(14, 15, 'XL', '5', '65000'),
(15, 16, 'L', '19', '80000'),
(16, 16, 'XL', '6', '85000'),
(17, 17, 'L', '10', '70000'),
(18, 18, 'XL', '15', '75000');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(20) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `tgl_transaksi` varchar(11) NOT NULL,
  `alamat` text NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `ekspedisi` varchar(50) NOT NULL,
  `estimasi` varchar(50) NOT NULL,
  `ongkir` varchar(15) NOT NULL,
  `status_order` int(11) NOT NULL,
  `status_pesan` int(11) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_bayar` varchar(50) DEFAULT NULL,
  `bukti_pembayaran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_customer`, `tgl_transaksi`, `alamat`, `provinsi`, `kota`, `ekspedisi`, `estimasi`, `ongkir`, `status_order`, `status_pesan`, `update_at`, `total_bayar`, `bukti_pembayaran`) VALUES
('1', 2, '2022-04-12', 'kuningan', 'Jawa Barat', 'Cirebon', 'jne', '1-2 hari', '8000', 4, 2, '2022-04-07 06:51:57', '20000', 'sdsd'),
('2022040862NQF93R', 3, '2022-04-08', 'LINK.KRAMAT JAYA RT/RW 007/003', 'Kalimantan Timur', 'Berau', 'tiki', 'ECO', '108000', 4, 2, '2022-04-08 12:48:20', '269500', 'link.jpg'),
('20220408O091BGC3', 2, '2022-04-08', 'LINK.KRAMAT JAYA RT/RW 007/003', 'Jawa Barat', 'Kuningan', 'jne', 'OKE', '156000', 1, 2, '2022-04-08 07:20:15', '554000', 'baca.jpg'),
('20220408S574QOMA', 1, '2022-04-08', 'LINK.KRAMAT JAYA RT/RW 007/003', 'Jawa Tengah', 'Kediri', 'jne', 'OKE', '126000', 1, 2, '2022-04-08 12:19:19', '287500', 'link1.jpg'),
('20220408SYEZJ2Z5', 1, '2022-04-08', 'ssd', 'Jawa Tengah', 'Purwakerto', 'jne', 'OKE', '63000', 1, 2, '2022-04-08 12:18:30', '143750', 'bca.jpg'),
('20220413RGAHNKJC', 1, '2022-04-13', 'ghgjkj', 'Jawa Barat', 'Subang', 'tiki', '4 Hari', '10000', 0, 1, '2022-04-13 09:09:54', '210000', ''),
('20220414QUXIGVH8', 1, '2022-04-14', 'LINK.KRAMAT JAYA RT/RW 007/003', 'Kalimantan Barat', 'Sanggau', 'jne', 'OKE', '52000', 0, 2, '2022-04-14 03:02:24', '202000', ''),
('20220414WKHUDIFY', 1, '2022-04-14', 'LINK.KRAMAT JAYA RT/RW 007/003', 'Kalimantan Utara', 'Malinau', 'jne', 'OKE', '73000', 0, 2, '2022-04-14 03:03:31', '213000', ''),
('20220425W1WDFVKE', 3, '2022-04-25', 'progo 5', 'DI Yogyakarta', 'Kulon Progo', 'jne', 'OKE', '19000', 4, 2, '2022-04-25 06:25:06', '169000', '20170910027UpiMariani.jpg'),
('20220425YP1S4QMJ', 3, '2022-04-25', 'Kuningan Jawa Barat', 'Kalimantan Timur', 'Paser', 'jne', '5-7 Hari', '57000', 4, 1, '2022-04-25 06:42:46', '125000', '20170910027UpiMariani1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `alamat_user` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat_user`, `no_hp`, `username`, `password`, `level_user`) VALUES
(4, 'asas', 'xcxcx', '085698745236', 'pemilik', 'pemilik', 2),
(5, 'UPI MARIANI', 'ass edit', '08563214569', 'admin', 'admin2', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chatting`
--
ALTER TABLE `chatting`
  ADD PRIMARY KEY (`id_chatting`);

--
-- Indexes for table `custom`
--
ALTER TABLE `custom`
  ADD PRIMARY KEY (`id_custom`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id_size`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chatting`
--
ALTER TABLE `chatting`
  MODIFY `id_chatting` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom`
--
ALTER TABLE `custom`
  MODIFY `id_custom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
