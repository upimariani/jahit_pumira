-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2023 pada 05.51
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `chatting`
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
-- Struktur dari tabel `custom`
--

CREATE TABLE `custom` (
  `id_custom` int(11) NOT NULL,
  `id_kain` int(11) NOT NULL,
  `id_transaksi` varchar(20) NOT NULL,
  `pjng_baju` varchar(10) NOT NULL,
  `pjng_lengan` varchar(10) NOT NULL,
  `bahu` varchar(10) NOT NULL,
  `pundak` varchar(10) NOT NULL,
  `pinggang` varchar(5) NOT NULL,
  `gambar_model` varchar(125) NOT NULL,
  `qty_custom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `custom`
--

INSERT INTO `custom` (`id_custom`, `id_kain`, `id_transaksi`, `pjng_baju`, `pjng_lengan`, `bahu`, `pundak`, `pinggang`, `gambar_model`, `qty_custom`) VALUES
(1, 5, '20230704I5IJL2JR', '12', '23', '23', '67', '12', 'Screenshot_2022-06-10_1906492.png', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
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
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `alamat_customer`, `no_hp`, `username`, `password`, `create_time`) VALUES
(1, 'Sherly Yudistira', 'WInduherang, Kuningan', '085156727368', 'sherly', 'sherly12345', '2022-04-07 06:50:49'),
(2, 'coba', 'ddsds', '0582569874569', 'qwqw', 'fdfd', '2022-04-09 01:29:22'),
(3, 'Zara', 'Kuningan Jawa barat', '085156727368', 'zara', 'zara12345', '2022-04-25 06:19:44'),
(4, 'Dahlan', 'Ciawigebang', '0875698745633', 'dahlan', 'dahlan123', '2022-05-29 03:07:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` varchar(20) NOT NULL,
  `id_size` int(11) NOT NULL,
  `qty` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskon`
--

CREATE TABLE `diskon` (
  `id_diskon` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_diskon` varchar(50) NOT NULL,
  `besar_diskon` int(11) NOT NULL,
  `tgl_selesai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `diskon`
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
-- Struktur dari tabel `kain`
--

CREATE TABLE `kain` (
  `id_kain` int(11) NOT NULL,
  `nama_kain` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kain`
--

INSERT INTO `kain` (`id_kain`, `nama_kain`) VALUES
(3, 'Katun'),
(4, 'Linen'),
(5, 'Denim'),
(6, 'Organza'),
(7, 'Spandeks'),
(8, 'Sifon');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Celana'),
(3, 'Baju');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_return` int(11) NOT NULL,
  `id_transaksi` varchar(30) NOT NULL,
  `tgl_return` varchar(15) NOT NULL,
  `alasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`id_return`, `id_transaksi`, `tgl_return`, `alasan`) VALUES
(1, '20220529EVYBRXJU', '2022-06-17', 'salah warna');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
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
-- Dumping data untuk tabel `produk`
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
-- Struktur dari tabel `size`
--

CREATE TABLE `size` (
  `id_size` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `size` varchar(50) NOT NULL,
  `stok` varchar(15) NOT NULL,
  `harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `size`
--

INSERT INTO `size` (`id_size`, `id_produk`, `size`, `stok`, `harga`) VALUES
(1, 1, 'S', '7', '95000'),
(2, 1, 'L', '3', '100000'),
(3, 1, 'XL', '16', '150000'),
(4, 2, 'L', '8', '100000'),
(5, 2, 'XL', '20', '150000'),
(6, 12, 'S', '7', '75000'),
(7, 12, 'L', '3', '80000'),
(8, 12, 'XL', '11', '89000'),
(9, 13, 'L', '5', '210000'),
(10, 13, 'XL', '4', '300000'),
(11, 14, 'L', '18', '50000'),
(12, 14, 'XL', '9', '60000'),
(13, 15, 'L', '11', '50000'),
(14, 15, 'XL', '5', '65000'),
(15, 16, 'L', '18', '80000'),
(16, 16, 'XL', '4', '85000'),
(17, 17, 'L', '10', '70000'),
(18, 18, 'XL', '15', '75000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(20) NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `tgl_transaksi` varchar(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `ekspedisi` varchar(50) DEFAULT NULL,
  `estimasi` varchar(50) DEFAULT NULL,
  `ongkir` varchar(15) DEFAULT NULL,
  `status_order` int(11) DEFAULT NULL,
  `status_pesan` int(11) DEFAULT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_bayar` varchar(50) DEFAULT NULL,
  `bukti_pembayaran` text DEFAULT NULL,
  `type_transaksi` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_customer`, `tgl_transaksi`, `alamat`, `provinsi`, `kota`, `ekspedisi`, `estimasi`, `ongkir`, `status_order`, `status_pesan`, `update_at`, `total_bayar`, `bukti_pembayaran`, `type_transaksi`) VALUES
('20230704I5IJL2JR', 4, '2023-07-04', 'cvfgf', 'Kalimantan Timur', 'Kutai Timur', 'jne', '5-7 Hari', '84000', 0, 1, '2023-07-04 03:45:26', '300000', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat_user`, `no_hp`, `username`, `password`, `level_user`) VALUES
(4, 'asas', 'xcxcx', '085698745236', 'pemilik', 'pemilik', 2),
(5, 'UPI MARIANI', 'ass edit', '08563214569', 'admin', 'admin2', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `chatting`
--
ALTER TABLE `chatting`
  ADD PRIMARY KEY (`id_chatting`);

--
-- Indeks untuk tabel `custom`
--
ALTER TABLE `custom`
  ADD PRIMARY KEY (`id_custom`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indeks untuk tabel `kain`
--
ALTER TABLE `kain`
  ADD PRIMARY KEY (`id_kain`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_return`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id_size`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `chatting`
--
ALTER TABLE `chatting`
  MODIFY `id_chatting` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `custom`
--
ALTER TABLE `custom`
  MODIFY `id_custom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `kain`
--
ALTER TABLE `kain`
  MODIFY `id_kain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_return` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `size`
--
ALTER TABLE `size`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
