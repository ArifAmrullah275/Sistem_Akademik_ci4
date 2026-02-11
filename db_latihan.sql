-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Feb 2026 pada 16.26
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
-- Database: `db_latihan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `id` int(3) NOT NULL,
  `nim` varchar(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`id`, `nim`, `nama`, `alamat`, `no_hp`) VALUES
(2, 'D1A240010', 'Fira Marlita', 'Cirebon', '083827914570'),
(4, 'D1A240040', 'MUHAMMAD ARIF AMRULLAH', 'Subang', '083827914570'),
(9, 'D1A240004', 'Adam Faturachman', 'Karawang', '085723369889'),
(10, 'D1A240013', 'Jajang Nurjaman', 'Bandung', '081330332791'),
(11, 'D1A240079', 'Syifa', 'Surabaya', '087979791919'),
(12, 'D1A240028', 'Arrafly Aziz Saputra', 'Pamanoekan', '089001110202'),
(13, 'D1A240035', 'Ardi Illahi Roby', 'Dawuan', '099911112324'),
(14, 'D1A240057', 'Andre Wibowo', 'Sukabumi', '083218901888'),
(15, 'D1A240046', 'Hildan Fauzirahman H', 'Cianjur', '089080796564'),
(16, 'D1A240066', 'Divi Agung Satria', 'Garut', '08889082099249'),
(17, 'D1A240078', 'Ramdan Prayitno', 'Pangandaran', '089012345687'),
(18, 'D1A240099', 'Husni Mubarok', 'Yogyakarta', '099856784567');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_matakuliah`
--

CREATE TABLE `tbl_matakuliah` (
  `id_mk` int(3) NOT NULL,
  `kode_mk` varchar(10) DEFAULT NULL,
  `nama_mk` varchar(50) DEFAULT NULL,
  `sks` varchar(2) DEFAULT NULL,
  `ruangan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_matakuliah`
--

INSERT INTO `tbl_matakuliah` (`id_mk`, `kode_mk`, `nama_mk`, `sks`, `ruangan`) VALUES
(1, 'D1A.240001', 'Pemrograman Berbbasis Web', '2', '10'),
(2, 'D1A.240003', 'Desain Web', '4', '9'),
(3, 'D1A.240006', 'Sistem Basis Data', '3', '11'),
(4, 'D1A.240009', 'Ilmu Kealaman Dasar', '2', '8'),
(6, 'UNI.121', 'Komputer 1', '2', 'Lab Kom 1'),
(7, 'UNI.230', 'Kepemimpinan dan Organisasi', '2', '23'),
(8, 'UNI.1123', 'Ilmu Sosial dan Budaya Dasar', '3', '11'),
(9, 'D1A.240111', 'Analisis dan Perancangan Sistem Informasi', '3', 'Lab 2'),
(10, 'D1A.240030', 'Jaringan Komputer', '3', 'Lab Kom 2'),
(11, 'D1A240032', 'Etika Profesi', '2', '9'),
(12, 'UNI.237', 'Agama ', '2', '8'),
(13, 'D1A.321', 'Internet of Things', '3', '15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `foto` varchar(255) DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nama_lengkap`, `created_at`, `foto`) VALUES
(2, 'admin', '$2y$10$CSAngWiaKbQum8pamHgn6OynaLiHmLFvcytKKS.EK5pmUWDGgwcV6', 'Muhammad Arif Amrullah', '2025-12-13 21:49:32', '1765665388_0ad22a0c59406bc90b68.jpg'),
(4, 'firamarlitaz', '$2y$10$JQUfkeZmSnkxvONpo.PfLeULquwwlU/bt/wa2wC2CkqYaZxvhSxYW', 'Fira Marlita Zayani', '2025-12-13 22:28:06', 'default.png'),
(5, 'arifarmuh', '$2y$10$81gofDXlNaw.jIi3wwAul.VN2FDJPS689BnW98OtKW5kkxay75mCK', 'Cyber Security People', '2026-01-29 20:54:53', 'default.png'),
(6, 'cybersecurity', '$2y$10$gT6eaDR54eWLUg4oW6iSM.CU0oDOtbZBWFBeMhCWYdCSwrTxdxmU6', 'Cyber Security People', '2026-01-29 20:56:26', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_matakuliah`
--
ALTER TABLE `tbl_matakuliah`
  ADD PRIMARY KEY (`id_mk`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_matakuliah`
--
ALTER TABLE `tbl_matakuliah`
  MODIFY `id_mk` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
