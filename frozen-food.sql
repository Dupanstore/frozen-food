-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Nov 2023 pada 12.53
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frozen-food`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `satuan` varchar(25) DEFAULT NULL,
  `harga` bigint(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `id_user`, `nama_barang`, `stock`, `satuan`, `harga`, `deskripsi`, `gambar`) VALUES
(1, NULL, 3, 'kopi kapal api', 50, 'sachet', 15000, 'kopi kapal api saset', 'kursi_kantor2.jpg'),
(2, NULL, 3, 'Jahe merah', 100, 'dus', 12000, 'jahe merah susu', 'kursi_plastik1.jpg'),
(3, NULL, 3, 'Aqua', 9, 'kg', 12000, 'aqua gelas', 'kursi_belajarq1.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `no_keluar` varchar(50) DEFAULT NULL,
  `tanggal_keluar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `id_barang`, `qty`, `status`, `no_keluar`, `tanggal_keluar`) VALUES
(1, 2, 3, 'keluar', '202310116020', '2023-10-11 17:41:36'),
(2, 1, 1, 'keluar', '202310112772', '2023-10-11 17:42:05'),
(3, 2, 1, 'keluar', '202310126355', '2023-10-12 01:37:26'),
(5, 1, 50, 'keluar', '202310171760', '2023-10-17 12:50:01'),
(6, 3, 1, 'keluar', '202310189231', '2023-10-18 02:22:43'),
(7, 3, 2, 'keluar', '20231018676', '2023-10-18 02:25:42'),
(8, 3, 1, 'keluar', '202310188338', '2023-10-18 02:25:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `satuan` varchar(25) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `no_pengiriman` varchar(50) DEFAULT NULL,
  `tanggal_kirim` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `id_barang`, `id_user`, `qty`, `satuan`, `status`, `no_pengiriman`, `tanggal_kirim`) VALUES
(1, 2, 4, 100, NULL, 4, '20231011ZBIAWQ5Y', '2023-10-11 17:37:50'),
(2, 1, 4, 1, NULL, 4, '20231011ZBIAWQ5Y', '2023-10-11 17:37:50'),
(3, 3, 4, 12, NULL, 4, '20231011S3Y9WIWI', '2023-10-11 19:18:13'),
(4, 2, 4, 1, NULL, 4, '20231011S3Y9WIWI', '2023-10-11 19:18:13'),
(5, 3, 4, 1, NULL, 0, '20231018BNNR64Q1', '2023-10-18 09:48:46'),
(6, 2, 4, 1, 'dus', 0, '20231018BJVKR0XM', '2023-10-18 09:50:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_minimal`
--

CREATE TABLE `barang_minimal` (
  `id_barang_minimal` int(11) NOT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `satuan` varchar(25) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `deskripsi` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang_minimal`
--

INSERT INTO `barang_minimal` (`id_barang_minimal`, `nama_barang`, `stok`, `satuan`, `harga`, `deskripsi`) VALUES
(1, 'kopi kapal api', 21, 'sachet', 120000, 'kopi saset'),
(2, 'Jahe merah', 10, 'dus', 15000, 'Jahe merah wedang'),
(3, 'aqua', 7, 'kg', 12000, 'aqua gelas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `no_pengiriman` varchar(50) DEFAULT NULL,
  `total_bayar` bigint(50) DEFAULT NULL,
  `pembayaran` bigint(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `no_rek` varchar(50) DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `status_bayar` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_user`, `no_pengiriman`, `total_bayar`, `pembayaran`, `nama`, `no_rek`, `tgl_bayar`, `status_bayar`) VALUES
(1, 2, '20231011ZBIAWQ5Y', 1620000, 120000, 'andri', '1298291829819', '2023-10-11', 'sudah bayar'),
(2, 2, '20231011S3Y9WIWI', 159000, 12000, 'jaka', '128278917291', '2023-10-11', 'sudah bayar'),
(3, 4, '20231018BNNR64Q1', 12000, NULL, '0', '0', '0000-00-00', 'belum bayar'),
(4, 4, '20231018BJVKR0XM', 15000, NULL, '0', '0', '0000-00-00', 'belum bayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `return`
--

CREATE TABLE `return` (
  `id_return` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `jml` int(11) DEFAULT NULL,
  `satuan_return` varchar(25) DEFAULT NULL,
  `alasan_return` text DEFAULT NULL,
  `status_return` int(11) DEFAULT NULL,
  `no_return` varchar(50) DEFAULT NULL,
  `tgl_return` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `return`
--

INSERT INTO `return` (`id_return`, `id_barang`, `nama_user`, `jml`, `satuan_return`, `alasan_return`, `status_return`, `no_return`, `tgl_return`) VALUES
(1, 3, 'supplier', 12, 'kg', 'rusak', 0, '202310126373', '2023-10-12'),
(2, 1, 'supplier', 12, 'dus', 'rusak', 0, '202310129942', '2023-10-12'),
(3, 2, 'supplier', 1, 'kg', 'robek', 0, '20231012964', '2023-10-12'),
(4, 2, 'supplier', 1, 'sachet', 'rusak', 0, '20231012473', '2023-10-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sr`
--

CREATE TABLE `sr` (
  `id_sr` int(11) NOT NULL,
  `id_return` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `no_sr` varchar(50) DEFAULT NULL,
  `jml` int(11) DEFAULT NULL,
  `tgl_sr` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sr`
--

INSERT INTO `sr` (`id_sr`, `id_return`, `id_barang`, `no_sr`, `jml`, `tgl_sr`) VALUES
(1, 2, 1, '202310129146', 12, '2023-10-12'),
(2, 1, 3, '202310129146', 12, '2023-10-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tgl_transaksi` datetime DEFAULT NULL,
  `no_transaksi` varchar(50) DEFAULT NULL,
  `id_barang_minimal` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tgl_transaksi`, `no_transaksi`, `id_barang_minimal`, `qty`, `harga`, `total_harga`) VALUES
(1, '2023-10-17 13:06:50', '202310179234', 3, 12, NULL, NULL),
(2, '2023-10-17 13:11:06', '202310171070', 3, 12, 2033000, 24396000),
(3, '2023-10-17 13:21:44', '202310176362', 1, 3, 250000, 250000),
(4, '2023-10-17 13:21:44', '202310176362', 3, 1, 250000, 250000),
(5, '2023-10-17 13:27:02', '202310176374', 3, 2, 1930400, 3860800),
(6, '2023-10-18 03:50:20', '202310187530', 3, 1, 1930400, 1930400),
(7, '2023-10-18 03:54:06', '202310187021', 3, 1, 400000, 400000),
(8, '2023-10-18 03:55:07', '202310187450', 3, 1, 400000, 400000),
(9, '2023-10-18 03:57:10', '202310186408', 3, 1, 250000, 250000),
(10, '2023-10-18 04:01:09', '202310185607', 3, 1, 250000, 250000),
(11, '2023-10-18 04:02:36', '20231018510', 3, 1, 230000, 230000),
(12, '2023-10-18 04:03:25', NULL, 3, NULL, NULL, NULL),
(13, '2023-10-18 04:04:04', NULL, 3, NULL, NULL, NULL),
(14, '2023-10-18 04:16:42', '202310182942', 3, 1, 1930400, 1930400),
(15, '2023-10-18 04:17:30', '20231018613', 3, 1, 1930400, 1930400),
(16, '2023-10-18 04:26:22', '202310183693', 3, 1, 12000, 12000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status_user` int(11) DEFAULT NULL,
  `level_user` int(11) DEFAULT NULL,
  `profil` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `status_user`, `level_user`, `profil`) VALUES
(2, 'karyawan', 'karyawan', '12341234', 1, 2, 'product-3.jpg'),
(3, 'supplier', 'supplier', '12341234', 1, 3, 'profile-photo.jpg'),
(4, 'Owner', 'pemilik', '12341234', 1, 4, 'frozen-food.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`);

--
-- Indeks untuk tabel `barang_minimal`
--
ALTER TABLE `barang_minimal`
  ADD PRIMARY KEY (`id_barang_minimal`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `return`
--
ALTER TABLE `return`
  ADD PRIMARY KEY (`id_return`);

--
-- Indeks untuk tabel `sr`
--
ALTER TABLE `sr`
  ADD PRIMARY KEY (`id_sr`);

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
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_barang_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `barang_minimal`
--
ALTER TABLE `barang_minimal`
  MODIFY `id_barang_minimal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `return`
--
ALTER TABLE `return`
  MODIFY `id_return` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sr`
--
ALTER TABLE `sr`
  MODIFY `id_sr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
