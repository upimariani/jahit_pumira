-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Nov 2022 pada 03.03
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
-- Database: `agung_jaya`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `name_adm` varchar(125) NOT NULL,
  `address_adm` text NOT NULL,
  `no_phoneadm` varchar(15) NOT NULL,
  `useradm` varchar(50) NOT NULL,
  `passadm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `name_adm`, `address_adm`, `no_phoneadm`, `useradm`, `passadm`) VALUES
(3, 'Admin', 'Kuningan Jawa Barat', '0875698745633', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskon`
--

CREATE TABLE `diskon` (
  `id_disc` int(11) NOT NULL,
  `id_produk` varchar(7) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `name_disc` varchar(30) DEFAULT NULL,
  `disc` varchar(15) DEFAULT '0',
  `tgl_end` varchar(15) DEFAULT NULL,
  `tgl_start` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `diskon`
--

INSERT INTO `diskon` (`id_disc`, `id_produk`, `id_admin`, `name_disc`, `disc`, `tgl_end`, `tgl_start`) VALUES
(1, 'jibrO', 0, NULL, '0', NULL, NULL),
(2, 'ObPu7', 0, '0', '0', '0', '0'),
(3, 'duBaw', 0, 'Sale Of Day', '5', '2022-11-24', '2022-11-01'),
(4, 'gShp7', 0, NULL, '0', NULL, NULL),
(5, 'IJNOv', 0, NULL, '0', NULL, NULL),
(6, 'l1Az5', 0, NULL, '0', NULL, NULL),
(7, 'vBu1O', 0, NULL, '0', NULL, NULL),
(8, 'cry4N', 0, NULL, '0', NULL, NULL),
(9, 'uaXPU', 0, NULL, '0', NULL, NULL),
(10, 'gjLG4', 0, NULL, '0', NULL, NULL),
(11, 'VLpMj', 0, NULL, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_category`, `name_category`) VALUES
(1, 'Makanan'),
(2, 'Sembako');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` varchar(30) NOT NULL,
  `ongkir` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`, `ongkir`) VALUES
(2, 'Argapura', '20000'),
(3, 'Majalengka', '15000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_cart` int(11) NOT NULL,
  `id_produk` varchar(7) NOT NULL,
  `id_cust` int(11) NOT NULL,
  `qty_cart` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id_cart`, `id_produk`, `id_cust`, `qty_cart`) VALUES
(9, 'ObPu7', 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `my_order`
--

CREATE TABLE `my_order` (
  `id_order` varchar(30) NOT NULL,
  `id_cust` int(11) NOT NULL,
  `tgl_order` varchar(15) NOT NULL,
  `total_order` varchar(15) NOT NULL,
  `status_order` int(11) NOT NULL,
  `bukti_pembayaran` text NOT NULL,
  `type_order` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `my_order`
--

INSERT INTO `my_order` (`id_order`, `id_cust`, `tgl_order`, `total_order`, `status_order`, `bukti_pembayaran`, `type_order`) VALUES
('20220821EDFCN2SP', 1, '2022-08-21', '31000', 4, '31084499740-bukti_transfer1.jpg', 0),
('20220821GELOYWN2', 1, '2022-08-21', '113000', 0, '', 0),
('20220821LTKCZHWI', 2, '2022-08-21', '51000', 0, '', 0),
('20220822MDCTCLY4', 1, '2022-08-22', '31000', 4, '31084499740-bukti_transfer2.jpg', 0),
('20220914ATMNCQIM', 1, '2022-09-14', '113000', 4, 'Screenshot_2022-06-27_120645.png', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_cust` int(11) NOT NULL,
  `name_cust` varchar(125) NOT NULL,
  `address_cust` text NOT NULL,
  `no_phone` varchar(15) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `member` int(11) NOT NULL,
  `create_member` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_cust`, `name_cust`, `address_cust`, `no_phone`, `jk`, `username`, `password`, `member`, `create_member`) VALUES
(1, 'Zahra', 'Kuningan Jawa Barat', '08976788777', 'Perempuan', 'pelanggan', 'pelanggan', 0, '2022-08-20 13:29:21'),
(2, 'Zaenal', 'Kuningan', '08976788777', 'Laki - Laki', 'pelanggan1', 'pelanggan2', 0, '2022-08-21 10:04:16'),
(3, 'coba', 'LINK.KRAMAT JAYA RT/RW 007/003', '085156727368', 'Perempuan', 'admin', 'coba', 0, '2022-08-22 12:15:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `id_order` varchar(30) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `id_order`, `id_kecamatan`, `alamat`) VALUES
(1, '20220821EDFCN2SP', 2, 'Lingk. Harapan II Rt.02 Rw.05'),
(2, '20220821LTKCZHWI', 3, 'Lingk. Lingga Kamuning Rt.03 Rw. 03'),
(3, '20220821GELOYWN2', 2, 'LINK.KRAMAT JAYA RT/RW 007/003'),
(4, '20220822MDCTCLY4', 2, 'PAMIJAHAN '),
(5, '20220914ATMNCQIM', 2, 'Gunungkeling, Kuningan Jawa Barat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(7) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name_prod` varchar(125) NOT NULL,
  `ket_prod` text NOT NULL,
  `price_prod` varchar(15) NOT NULL,
  `stok_prod` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_category`, `name_prod`, `ket_prod`, `price_prod`, `stok_prod`, `gambar`) VALUES
('cry4N', 1, 'Malkist Kopyor', 'Bngks', '5000', 99, '311.jpg'),
('duBaw', 1, 'Swalow', 'Bngks', '5000', 95, '3.jpg'),
('gjLG4', 1, 'Friench Fries', 'Bngks', '6000', 30, '50.jpg'),
('gShp7', 1, 'Hello Panda', 'Bngks', '1000', 147, '19.jpg'),
('IJNOv', 1, 'Taro Net', 'Bngks', '4500', 100, '24.jpg'),
('jibrO', 1, 'Palmia Mentega', 'Bngks', '15000', 25, '2.jpg'),
('l1Az5', 1, 'Energen Vanila', 'Pak', '19000', 46, '22.jpg'),
('ObPu7', 1, 'Biskuit Regal', 'Bngks', '22000', 46, '20.jpg'),
('uaXPU', 1, 'Sosis Champ', 'Bngks', '15000', 100, '32.jpg'),
('vBu1O', 1, 'Pota Bee', 'Bngks', '2300', 100, '13.jpg'),
('VLpMj', 1, 'Kopi Freshko', 'Bngks', '1000', 100, '35.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_order`
--

CREATE TABLE `produk_order` (
  `id_prod_order` int(11) NOT NULL,
  `id_order` varchar(30) NOT NULL,
  `id_produk` varchar(7) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk_order`
--

INSERT INTO `produk_order` (`id_prod_order`, `id_order`, `id_produk`, `qty`) VALUES
(1, '20220821EDFCN2SP', 'duBaw', 2),
(2, '20220821EDFCN2SP', 'gShp7', 1),
(3, '20220821LTKCZHWI', 'duBaw', 2),
(4, '20220821LTKCZHWI', 'gShp7', 2),
(5, '20220821LTKCZHWI', 'l1Az5', 1),
(6, '20220821LTKCZHWI', 'cry4N', 1),
(7, '20220821GELOYWN2', 'duBaw', 2),
(8, '20220821GELOYWN2', 'gShp7', 2),
(9, '20220821GELOYWN2', 'l1Az5', 4),
(10, '20220821GELOYWN2', 'cry4N', 1),
(11, '20220822MDCTCLY4', 'duBaw', 2),
(12, '20220822MDCTCLY4', 'gShp7', 1),
(13, '20220914ATMNCQIM', 'ObPu7', 4),
(14, '20220914ATMNCQIM', 'duBaw', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_disc`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_category`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indeks untuk tabel `my_order`
--
ALTER TABLE `my_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_cust`);

--
-- Indeks untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `produk_order`
--
ALTER TABLE `produk_order`
  ADD PRIMARY KEY (`id_prod_order`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id_disc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_cust` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `produk_order`
--
ALTER TABLE `produk_order`
  MODIFY `id_prod_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
