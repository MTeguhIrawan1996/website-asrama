-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jul 2019 pada 10.57
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coba_login`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya`
--

CREATE TABLE `biaya` (
  `id` int(11) NOT NULL,
  `denda` varchar(50) DEFAULT NULL,
  `_biaya` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `biaya`
--

INSERT INTO `biaya` (`id`, `denda`, `_biaya`) VALUES
(8, '50000', '300000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `kode_fasilitas` varchar(50) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `lokasi` varchar(50) DEFAULT NULL,
  `penyedia` varchar(50) DEFAULT NULL,
  `kondisi` enum('LP','TLP') DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`kode_fasilitas`, `nama`, `lokasi`, `penyedia`, `kondisi`, `tgl_masuk`) VALUES
('1010', 'Lemari Pakian Dua Pintu', 'Kamar Penghuni', 'Pemda Kapuas', 'LP', '2019-07-30'),
('1011', 'Lemari Pakian Dua Pintu', 'Aula', 'Pemda Kapuas', 'TLP', '2018-07-01'),
('111', 'Tempat Tidur Kayu Lengkap', 'Kamar Penghuni', 'Pemda Kapuas', 'TLP', '2019-07-05'),
('111099', 'Lembari Pakian DuaPintu', 'Aula', 'Pemda Kapuas', 'LP', '2019-06-30'),
('1313', 'Tempat Tidur Kayu Lengkap', 'Kamar Penghuni', 'Pemda Kapuas', 'LP', '2019-07-01'),
('1414', 'Pompa Air', 'Kamar Mandi', 'Pemda Kapuas', 'LP', '2019-07-01'),
('1909', '1 Set Shopa', 'Ruang Tamu', 'Pemda Kapuas', 'LP', '2019-07-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id` int(11) NOT NULL,
  `no_kamar` varchar(128) DEFAULT NULL,
  `kapasitas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id`, `no_kamar`, `kapasitas`) VALUES
(6, 'Lantai1.01', 0),
(7, 'Lantai1.02', 0),
(8, 'Lantai1.03', 0),
(9, 'Lantai1.04', 1),
(10, 'Lantai1.05', 2),
(11, 'Lantai1.06', 2),
(12, 'Lantai2.01', 2),
(13, 'Lantai2.02', 2),
(14, 'Lantai2.03', 2),
(15, 'Lantai2.04', 2),
(16, 'Lantai2.05', 2),
(17, 'Lantai2.06', 2),
(18, 'Lantai2.07', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kas`
--

CREATE TABLE `kas` (
  `kode` varchar(50) NOT NULL,
  `keterangan` varchar(150) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `jumlah` varchar(50) DEFAULT NULL,
  `jenis` enum('masuk','keluar') DEFAULT NULL,
  `keluar` varchar(50) DEFAULT NULL,
  `tgl_input_data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kas`
--

INSERT INTO `kas` (`kode`, `keterangan`, `tgl`, `jumlah`, `jenis`, `keluar`, `tgl_input_data`) VALUES
('K0407190001', 'Kelengkapan Asrama', '2019-07-04', NULL, 'keluar', '500000', '2019-07-04'),
('K3006190002', 'Biaya PDAM', '2019-06-30', NULL, 'keluar', '100000', '2019-06-30'),
('K3006190005', 'Biaya PDAM', '2019-06-30', NULL, 'keluar', '50000', '2019-06-30'),
('M0507190001', 'Biaya Retribusi', '2019-07-05', '350000', 'masuk', NULL, '2019-07-05'),
('M0907190001', 'Biaya Retribusi', '2019-07-09', '100000', 'masuk', NULL, '2019-07-09'),
('M2207190001', 'Dana Bantuan', '2019-07-22', '500000', 'masuk', NULL, '2019-07-22'),
('M3006190001', 'dana bantuan', '2019-06-20', '500000', 'masuk', NULL, '2019-06-30'),
('M3006190003', 'Biaya Retribusi', '2019-06-30', '300000', 'masuk', NULL, '2019-06-30'),
('M3006190004', 'Biaya Retribusi', '2019-06-30', '350000', 'masuk', NULL, '2019-06-30'),
('M3007190001', 'Biaya Retribusi', '2019-07-30', '300000', 'masuk', NULL, '2019-07-30'),
('M3007190002', 'Biaya Retribusi', '2019-07-30', '300000', 'masuk', NULL, '2019-07-30'),
('M3007190003', 'Biaya Retribusi', '2019-07-30', '300000', 'masuk', NULL, '2019-07-30'),
('M3007190004', 'Biaya Retribusi', '2019-07-30', '300000', 'masuk', NULL, '2019-07-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `kode_bayar` varchar(50) NOT NULL,
  `penghuni_kamar` int(11) DEFAULT NULL,
  `email_penghuni_kamar` varchar(150) DEFAULT NULL,
  `tgl_masuk` int(11) DEFAULT NULL,
  `tgl_jth_tmp` date DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `ket` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `tgl_input_data` date DEFAULT NULL,
  `denda` varchar(50) DEFAULT NULL,
  `total` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`kode_bayar`, `penghuni_kamar`, `email_penghuni_kamar`, `tgl_masuk`, `tgl_jth_tmp`, `tgl_bayar`, `ket`, `status`, `tgl_input_data`, `denda`, `total`) VALUES
('KP3007190002', 11, 'mansyur297@gmail.com', 1563781955, '2019-08-22', '2019-07-30', 'Biaya Retribusi', 1, '2019-07-30', '0', '300000'),
('KP3007190003', 11, 'mansyur297@gmail.com', 1563781955, '2019-09-22', NULL, NULL, 0, '2019-07-30', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penghuni_kamar`
--

CREATE TABLE `penghuni_kamar` (
  `id` int(11) NOT NULL,
  `penghuni` int(11) DEFAULT NULL,
  `name_penghuni` varchar(150) DEFAULT NULL,
  `email_penghuni` varchar(150) DEFAULT NULL,
  `kamar` int(11) DEFAULT NULL,
  `no_kamar_penghuni` varchar(50) DEFAULT NULL,
  `tgl_masuk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penghuni_kamar`
--

INSERT INTO `penghuni_kamar` (`id`, `penghuni`, `name_penghuni`, `email_penghuni`, `kamar`, `no_kamar_penghuni`, `tgl_masuk`) VALUES
(10, 84, 'Ade Saputra', 'adesptr193@gmail.com', 6, 'Lantai1.01', 1563781667),
(11, 85, 'Imam Mansyur', 'mansyur297@gmail.com', 6, 'Lantai1.01', 1563781955),
(12, 86, 'M.Teguh Irawan', 'teguhirawan1996@gmail.com', 7, 'Lantai1.02', 1564474334),
(13, 87, 'Hasbi Arrasyid', 'hasbiarraysid@gmail.com', 7, 'Lantai1.02', 1564474414),
(14, 88, 'HafisFadilah', 'HafizFadillah@gmail.com', 8, 'Lantai1.03', 1564474452),
(15, 89, 'Akhmad Nuari', 'akhmadnuari@gmail.com', 8, 'Lantai1.03', 1564474476),
(16, 90, 'Iqbal Ramadhan', 'iqbalramadhn@gmail.com', 9, 'Lantai1.04', 1564474529);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pindah_kamar`
--

CREATE TABLE `pindah_kamar` (
  `id` int(11) NOT NULL,
  `penghuni` int(11) DEFAULT NULL,
  `email_pindah` varchar(150) DEFAULT NULL,
  `kamar_sekarang` int(11) DEFAULT NULL,
  `no_kamar_sekarang` varchar(50) DEFAULT NULL,
  `kamar_baru` int(11) DEFAULT NULL,
  `no_kamar_baru` varchar(50) DEFAULT NULL,
  `tgl_pindah` int(11) DEFAULT NULL,
  `alasan` varchar(150) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `tempat_lahir` varchar(150) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `semester` varchar(50) DEFAULT NULL,
  `universitas` varchar(100) DEFAULT NULL,
  `masa_kontrak` date DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `tempat_lahir`, `tgl_lahir`, `semester`, `universitas`, `masa_kontrak`, `role_id`, `is_active`, `date_created`) VALUES
(8, 'Admin', 'asramakapuas14@gmail.com', 'default.jpg', '$2y$10$rGJhxaMjtEYBvVkg8gUg8O8eEn4Hr2vA87vUrCLb8dYiIqWnhPbES', NULL, NULL, NULL, NULL, NULL, 1, 1, 0),
(83, 'Kabag Keuset', 'kabagkeuset@gmail.com', 'default.jpg', '$2y$10$vNfvuGdoP4.lpC0LEJPCKuh7eBtJjY.RlyOQ/LDZlT2eizy43LLQK', NULL, NULL, NULL, NULL, NULL, 3, 1, NULL),
(84, 'Ade Saputra', 'adesptr193@gmail.com', 'default.jpg', '$2y$10$/7tLmaCOM15rm2T6YqcaR.JJEj1w8b4NR120JzOPuT.WdYe1zKfGS', 'Kuala Kapuas', '1995-08-11', '7', 'Uniska', '2020-07-22', 2, 1, 1563781667),
(85, 'Imam Mansyur', 'mansyur297@gmail.com', 'default.jpg', '$2y$10$wvQMBLEOnsMvZRK2W85PbezymTqKav3CGW0ngVztVK.XzurAsVHIm', 'Kuala Kapuas', '1996-07-18', '8', 'Uniska', '2020-07-22', 2, 1, 1563781955),
(86, 'M.Teguh Irawan', 'teguhirawan1996@gmail.com', 'aa2.jpg', '$2y$10$iGgATq1UuigMJeoh08DoY.rZhdQXeK8gVxJ0d540KBzy4Ojcb2SPe', 'Kuala Kapuas', '1996-06-14', '1', 'Uniska', '2020-07-30', 2, 1, 1564474334),
(87, 'Hasbi Arrasyid', 'hasbiarraysid@gmail.com', 'default.jpg', '$2y$10$o.EyRGct2159NvmHedHVM.QWtZ0NyiWCxMaq2JQSDC4bYHEQUkK7q', 'Kuala Kapuas', '1996-07-30', '3', 'Uniska', '2020-07-30', 2, 1, 1564474414),
(88, 'HafisFadilah', 'HafizFadillah@gmail.com', 'default.jpg', '$2y$10$W4rZadbNuD27MxWYEcULO.tuWdrfJzkGBoLqBK3Bkx1ebfVjIffsy', 'Kuala Kapuas', '1997-07-30', '4', 'Uniska', '2020-07-30', 2, 1, 1564474452),
(89, 'Akhmad Nuari', 'akhmadnuari@gmail.com', 'default.jpg', '$2y$10$wtshMv4K3nVl5AyU1XJu8.ExZFfAX.sLUieFmw3esZvWbk4PMTUsW', 'Kuala Kapuas', '1997-09-16', '7', 'Uniska', '2020-07-30', 2, 1, 1564474476),
(90, 'Iqbal Ramadhan', 'iqbalramadhn@gmail.com', 'default.jpg', '$2y$10$RkUB3.7GseU6ZmAEOquawOiym98KpCiYprE2/TxT0hS27X5HY8Pym', 'Kuala Kapuas', '1999-01-19', '7', 'Uniska', '2020-07-30', 2, 1, 1564474529),
(91, 'Saputra Adiatmana', 'Saputraadtmna@gmail.com', 'default.jpg', '$2y$10$EkRvrecG2lN8PK3LyEHCrOJL81N/fLhnjrBe6/6Zux0ypMetx0EpK', NULL, NULL, NULL, NULL, NULL, 2, 1, 1564474580),
(92, 'Bagus Ole', 'Bagusole11@gmail.com', 'default.jpg', '$2y$10$Bt84XRG9QHI6HUcKh44IW.RFPCEIMSibROzEzlVzV3ChnJ2OyN4SS', NULL, NULL, NULL, NULL, NULL, 2, 1, 1564474652),
(93, 'M.Aldiki Ramadhan', 'aldikirmdhn@gmail.com', 'default.jpg', '$2y$10$fjHxRkrPUGEjpDlfd2Zx8ua1b.eZPiCKtVXHx0P66IUX0Gco0Rk9O', NULL, NULL, NULL, NULL, NULL, 2, 1, 1564474697);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(2, 1, 1),
(3, 1, 2),
(5, 2, 2),
(8, 1, 5),
(10, 1, 6),
(14, 2, 7),
(15, 1, 8),
(16, 1, 9),
(17, 1, 10),
(18, 2, 11),
(19, 1, 12),
(20, 1, 13),
(21, 1, 14),
(22, 3, 14),
(23, 3, 15),
(24, 3, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(5, 'Kamar'),
(6, 'Penghuni'),
(7, 'PindahKamar'),
(8, 'PindahKamarAdmin'),
(9, 'Keuangan'),
(10, 'Pembayaran'),
(11, 'PembayaranUser'),
(12, 'BiayaDanDenda'),
(13, 'Fasilitas'),
(14, 'Laporan'),
(15, 'Kabag');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Kabag');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `token` varchar(128) DEFAULT NULL,
  `date_created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `biaya`
--
ALTER TABLE `biaya`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`kode_fasilitas`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`kode`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`kode_bayar`),
  ADD KEY `FK_pembayaran_penghuni_kamar` (`penghuni_kamar`);

--
-- Indeks untuk tabel `penghuni_kamar`
--
ALTER TABLE `penghuni_kamar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_penghuni_kamar_kamar` (`kamar`),
  ADD KEY `FK_penghuni_kamar_user` (`penghuni`);

--
-- Indeks untuk tabel `pindah_kamar`
--
ALTER TABLE `pindah_kamar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_pindah_kamar_penghuni_kamar` (`penghuni`),
  ADD KEY `FK_pindah_kamar_kamar` (`kamar_baru`),
  ADD KEY `FK_pindah_kamar_kamar_2` (`kamar_sekarang`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_user_role` (`role_id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_access_menu_user_role` (`role_id`),
  ADD KEY `FK_user_access_menu_user_menu` (`menu_id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `biaya`
--
ALTER TABLE `biaya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `penghuni_kamar`
--
ALTER TABLE `penghuni_kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pindah_kamar`
--
ALTER TABLE `pindah_kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `FK_pembayaran_penghuni_kamar` FOREIGN KEY (`penghuni_kamar`) REFERENCES `penghuni_kamar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penghuni_kamar`
--
ALTER TABLE `penghuni_kamar`
  ADD CONSTRAINT `FK_penghuni_kamar_kamar` FOREIGN KEY (`kamar`) REFERENCES `kamar` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_penghuni_kamar_user` FOREIGN KEY (`penghuni`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pindah_kamar`
--
ALTER TABLE `pindah_kamar`
  ADD CONSTRAINT `FK_pindah_kamar_kamar` FOREIGN KEY (`kamar_baru`) REFERENCES `kamar` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pindah_kamar_kamar_2` FOREIGN KEY (`kamar_sekarang`) REFERENCES `kamar` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pindah_kamar_penghuni_kamar` FOREIGN KEY (`penghuni`) REFERENCES `penghuni_kamar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_user_user_role` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `FK_user_access_menu_user_menu` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user_access_menu_user_role` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
