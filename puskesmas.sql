-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Okt 2024 pada 12.56
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
-- Database: `puskesmas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `no_hp`, `alamat`) VALUES
(1, 'user', '08123456789', 'Test'),
(2, 'user', '08123456789', 'Test'),
(3, 'user', '08123456789', 'Test'),
(4, 'user', '08123456789', 'Test'),
(5, 'user', '08123456789', 'Test'),
(6, 'user', '08123456789', 'Test'),
(7, 'user', '08123456789', 'Test'),
(8, 'user', '08123456789', 'Test'),
(9, 'user', '08123456789', 'Test'),
(10, 'user', '08123456789', 'Test'),
(11, 'user', '08123456789', 'Test'),
(12, 'user', '08123456789', 'Test'),
(13, 'user', '08123456789', 'Test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_layanan`
--

CREATE TABLE `jenis_layanan` (
  `id_jenis_layanan` int(1) NOT NULL,
  `jenis_layanan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `jenis_layanan`
--

INSERT INTO `jenis_layanan` (`id_jenis_layanan`, `jenis_layanan`) VALUES
(1, 'Umum'),
(2, 'BPJS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(2) NOT NULL,
  `nama_layanan` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`) VALUES
(5, 'Pemeriksaan Umum'),
(6, 'Kesehatan Lansia'),
(7, 'Kesehatan Gigi dan Mulut'),
(8, 'Pelayanan KIA'),
(9, 'Pelayanan Laboratorium'),
(10, 'Pelayanan Kefarmasian'),
(11, 'Konsultasi Kesehatan dan Konseling'),
(12, 'Pelayanan Surat Keterangan Dokter'),
(13, 'Pelayanan Calon Pengantin'),
(14, 'Pelayanan TB Paru & Kusta'),
(15, 'Pelayanan Gigi'),
(16, 'Pelayanan PTM'),
(17, 'Pelayanan Imunisasi (senin - Rabu)'),
(18, 'Pelayanan Jiwa (Jum\'at)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `no_antrian` varchar(20) NOT NULL,
  `id_customer` int(10) NOT NULL,
  `id_jenis_layanan` int(1) NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  `jam_pendaftaran` time NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_layanan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `no_antrian`, `id_customer`, `id_jenis_layanan`, `tgl_pendaftaran`, `jam_pendaftaran`, `status`, `id_layanan`) VALUES
(213, '2024-10-18/6', 6, 1, '2024-10-18', '16:05:00', 'Pendaftaran', 15),
(214, '2024-10-18/7', 7, 2, '2024-10-18', '16:11:00', 'Pendaftaran', 16),
(215, '2024-10-18/8', 8, 2, '2024-10-18', '16:23:00', 'Pendaftaran', 13),
(216, '2024-10-18/9', 9, 0, '2024-10-18', '16:26:00', 'Pendaftaran', 15),
(218, '2024-10-18/10', 11, 1, '2024-10-18', '16:33:00', 'Pendaftaran', 5),
(219, '2024-10-18/11', 12, 1, '2024-10-18', '17:01:00', 'Telah Datang', 12),
(220, '2024-10-19/1', 13, 1, '2024-10-19', '17:01:00', 'Telah Datang', 12);

-- --------------------------------------------------------
--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(1) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `alamat`, `no_hp`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Lamongan', '089698833331', 1),
(3, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'Test', '08123456789', 2),
(6, 'paiz', '6af775e0ee9c3659d1b3fcc1f42c590a', 'paiz', 'Lmg', '08', 2),
(7, 'ari', 'fc292bd7df071858c2d0f955545673c1', 'ari', 'Surabaya', '081561791528', 2),
(8, 'ayu', '29c65f781a1068a41f735e1b092546de', 'ayu', 'Gresik', '089163819341', 2),
(9, 'bayu', 'a430e06de5ce438d499c2e4063d60fd6', 'bayu', 'Tuban', '085123891538', 2),
(10, 'joni@gmail.com', '1281d0ac7a74eb91550ff52a02862cda', 'joni', 'tanjung', '09829287229', 2),
(12, 'joni', '1281d0ac7a74eb91550ff52a02862cda', 'joni', 'tanjung', '09829287229', 2);

-- Struktur dari tabel `rekam_medis`
CREATE TABLE `rekam_medis` (
  `id_rekam_medis` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` int(10) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `no_hp` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `diagnosa` text NOT NULL,
  `pengobatan` text NOT NULL,
  `catatan` text,
  `tgl_rekam_medis` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_rekam_medis`),
  FOREIGN KEY (`id_customer`) REFERENCES `customer`(`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Contoh pengisian data untuk tabel `rekam_medis`
INSERT INTO `rekam_medis` (`id_customer`, `nama_pasien`, `no_hp`, `alamat`, `diagnosa`, `pengobatan`, `catatan`) VALUES
(1, 'Pasien A', '08123456789', 'Alamat A', 'Flu', 'Obat A', 'Catatan A'),
(2, 'Pasien B', '08123456789', 'Alamat B', 'Batuk', 'Obat B', 'Catatan B'),
(3, 'Pasien C', '08123456789', 'Alamat C', 'Sakit Kepala', 'Obat C', 'Catatan C');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `jenis_layanan`
--
ALTER TABLE `jenis_layanan`
  ADD PRIMARY KEY (`id_jenis_layanan`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `fk_layanan` (`id_layanan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT untuk tabel `jenis_layanan`
--
ALTER TABLE `jenis_layanan`
  MODIFY `id_jenis_layanan` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `fk_layanan` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`id_layanan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
