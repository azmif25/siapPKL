-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2021 at 10:13 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_p_magang`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `rolename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `rolename`) VALUES
(1, 'EndUser'),
(2, 'SuperAdmin'),
(3, 'Pimpinan'),
(5, 'PembimbingLapangan'),
(6, 'Tertolak');

-- --------------------------------------------------------

--
-- Table structure for table `t_absensi_magang`
--

CREATE TABLE `t_absensi_magang` (
  `id_absensi` int(11) NOT NULL,
  `id_user` int(25) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time DEFAULT current_timestamp(),
  `status_absensi` enum('Masuk','Pulang') NOT NULL,
  `status` enum('Izin','Hadir') NOT NULL,
  `keterangan_absensi` text DEFAULT NULL,
  `kegiatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_absensi_magang`
--

INSERT INTO `t_absensi_magang` (`id_absensi`, `id_user`, `tanggal`, `jam`, `status_absensi`, `status`, `keterangan_absensi`, `kegiatan`) VALUES
(106, 1248730856, '2021-08-28', '10:33:51', 'Masuk', 'Hadir', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_bagian`
--

CREATE TABLE `t_bagian` (
  `id_bagian` int(11) NOT NULL,
  `nama_bagian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_bagian`
--

INSERT INTO `t_bagian` (`id_bagian`, `nama_bagian`) VALUES
(1, 'Sekretariat'),
(2, 'Bidang Statistik Dan Pengelolaan Informasi Publik'),
(3, 'Bidang Teknologi Informasi dan Komunikasi'),
(4, 'Bidang Layanan E-Goverment'),
(5, 'Bidang Pengelolaan Komunikasi Publik'),
(6, 'UMUM');

-- --------------------------------------------------------

--
-- Table structure for table `t_pegawai`
--

CREATE TABLE `t_pegawai` (
  `id_user` int(25) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `foto_pegawai` text DEFAULT NULL,
  `id_bagian` int(1) NOT NULL,
  `no_hp_pegawai` varchar(13) NOT NULL,
  `alamat_pegawai` text NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pegawai`
--

INSERT INTO `t_pegawai` (`id_user`, `nik`, `nip`, `nama_pegawai`, `foto_pegawai`, `id_bagian`, `no_hp_pegawai`, `alamat_pegawai`, `jk`) VALUES
(1322183259, '111999298179', '22100201820090219', 'Muhammad Admin', NULL, 1, '089921317887', 'Jalan A.Yani No.10', 'Laki-Laki'),
(1145423673, '6312', '11231', 'Pembimbing Lapangan', NULL, 5, '0812313213', 'Jalan Kayutangi', 'Laki-Laki'),
(1040321705, '637109101119780020', '1111021009310002920', 'Pimpinan', NULL, 6, '082231238841', 'Jalan Sultan Adam', 'Laki-Laki');

-- --------------------------------------------------------

--
-- Table structure for table `t_peserta_magang`
--

CREATE TABLE `t_peserta_magang` (
  `id_user` int(25) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `nomor_induk` varchar(30) NOT NULL,
  `nama_peserta` varchar(50) NOT NULL,
  `foto_peserta` text DEFAULT NULL,
  `surat_permohonan` text DEFAULT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat_peserta` text NOT NULL,
  `jurusan` text NOT NULL,
  `asal_peserta` text NOT NULL,
  `alamat_asal` text NOT NULL,
  `telp_ortu` varchar(15) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` text NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `status_penerimaan` enum('Diterima','Menunggu','Ditolak') DEFAULT NULL,
  `id_bagian` int(11) DEFAULT NULL,
  `sertifikat` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_peserta_magang`
--

INSERT INTO `t_peserta_magang` (`id_user`, `nik`, `nomor_induk`, `nama_peserta`, `foto_peserta`, `surat_permohonan`, `no_hp`, `alamat_peserta`, `jurusan`, `asal_peserta`, `alamat_asal`, `telp_ortu`, `jk`, `tanggal_lahir`, `tempat_lahir`, `status`, `tanggal_masuk`, `tanggal_keluar`, `status_penerimaan`, `id_bagian`, `sertifikat`, `updated_at`, `created_at`) VALUES
(1248730856, '6312', 'E020318088', 'Muhammad Alfiyannor', '1630121656924-IMG_3373.JPG', '1630111996530-sketch1589694404783.png', '087791236647', 'Jalan A. Yani Km. 14', 'Teknik Tenun Syariah', 'Universitas In The Sky', 'Anywhere', '081277328231', 'Laki-Laki', '2001-01-03', 'Gambut', 'aktif', '2019-10-01', '2031-11-23', 'Diterima', 5, '1630299652650-IMG_3599.JPG', '2021-08-29 21:00:52', '2021-08-27 16:53:16'),
(1808494669, '6371031506000020', 'E020318077', 'Ardillah Setiawan', '1630305567524-IMG_3344.JPG', '1630305240536-IMG_3718.JPG', '081277485461', 'Jalan Jalan Ke Kotabaru,\r\nCakep!!', 'Teknik Budidaya Asrama Perempuan', 'Universitas Suka Suka', 'Di Anywhere', '082288663772', 'Laki-Laki', '2000-06-15', 'Kuala Kapuad', 'aktif', '2018-01-01', '2050-11-26', 'Diterima', 4, '1630305716007-1532361588535.jpg', '2021-08-29 22:52:06', '2021-08-29 22:34:00'),
(1382554669, '6371032609000020', 'E020318085', 'Muhammad Rivaldi Setiawan', NULL, '1630310396224-iu.princess.spain_Bn_IrGuA5LH_3.jpg', '082266663521', 'Jalan Birmingham', 'Teknik Pertambangan Duit', 'Universitas Suka Suka', 'Jalan 10', '081299323134', 'Laki-Laki', '2000-09-26', 'Banjarmasin', 'tidak aktif', '2020-12-01', '2080-12-23', 'Ditolak', NULL, NULL, '2021-08-30 00:10:07', '2021-08-29 23:59:56'),
(1188860021, '6371042510990010', 'E020318079', 'Azmi Fadillah', '1630030078448-IMG_20210621_000353.jpg', 'DSC_0055.JPG', '08565478609', 'Jalan Kuin Utara Rt.06/01 Gang H. Pasi No.73', 'Manajemen Informatika', 'Politeknik Negeri Banjarmasin', 'Jalan Brigjend H. Hasan Basri Komp.ULM', '081251023185', 'Laki-Laki', '1999-10-20', 'Banjarmasin', 'tidak aktif', '2021-03-01', '2021-04-24', NULL, NULL, NULL, '2021-08-30 07:40:51', '2021-08-26 04:15:59');

-- --------------------------------------------------------

--
-- Table structure for table `t_upload_file`
--

CREATE TABLE `t_upload_file` (
  `id_upload` int(11) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(25) NOT NULL,
  `roles_id` int(10) UNSIGNED DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `roles_id`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1040321705, 3, 'ppn1', 'pimpinan@gmail.com', '$2y$10$wptEYH2vT7xyXRBkh9XT3.4OI4D7Y4g8K8icTBhkd9c1gYKLADE/G', 'jX9etkYCQrvQJrOwL8tLZnHOFWLPtr9ZgSdIiTO57IhCI2ExGiffGsnTycFo', '2021-08-27 17:47:24', '2021-08-27 17:47:24'),
(1145423673, 5, 'pl', 'pl@gmail.com', '$2y$10$9akc6F7Yc4M5VtwjGfYHruJVBU71TNP0N7tkq4X/9OhMIGYCUw3Fm', 'fV1kCwy8STeGMNAm4gu1737Z24k5jE9hqVmmcfUhYL0s0EOva1gZY5QwaQ2K', '2021-08-26 19:08:29', '2021-08-26 19:08:29'),
(1188860021, 6, 'u1', 'akungabut25baru@gmail.com', '$2y$10$yPGMoKvUX2s9L3o/WCiYXemk3nqxTTccTqItl7L1OfFuyfGWZdlI.', 'GYna1dYZ7Wxr3lPhsWyS79bDlhJwHyNlh0MJf9YZHGz5HqqBS29AuYJ3DGDe', '2021-08-26 04:15:59', '2021-08-29 23:43:47'),
(1248730856, 1, 'al12', 'alfihyannor@gmail.com', '$2y$10$Ile4DFJT0Ex3LZ0li1T7Euz.UtRHEn/ZMCY4Z8NPa8rsCmsI5KdX6', 'EmRpWreVEUfihINInLAfL6dvq9cw2GvFb1XYf7ybsX8vy096UqfMseb7OLhK', '2021-08-27 16:53:16', '2021-08-27 16:53:16'),
(1322183259, 2, 'admin', 'ayamjago@gmail.com', '$2y$10$TeJXwFjmTln9j5gk7dXOyuxkgSRF/deZKpegYXnP6AsfP0PRCdYVC', 'AU3vYFIlVbY73a3xJU62xqmKonvKEWIc9wkPVTyxN0N2XsBeOm0z0NpzFUsr', '2021-08-26 04:10:13', '2021-08-26 04:10:13'),
(1382554669, 1, 'aldi', 'zimi9000@gmail.com', '$2y$10$0SnxwXSF3A4Y76tMaVb2cOBKTSePWVxhSlhZtRBkPja3hmDqYoW/W', 'N8kYnCnoXvZ336gJv05MvO3J069CMBuW3wGTl142MEDbvsNKytw2iq3DVto1', '2021-08-29 23:59:56', '2021-08-29 23:59:56'),
(1808494669, 1, 'ardi', 'ardillah666Illuminate@gmail.com', '$2y$10$uNGWWy3FOGIRs8DnWNKh5.RMSYOAXlJWS7Luz8JLoBRuPVsskeO26', 'aDdOMkuBWIdJ0dtqZbCsR3YIPJS883ymxlzH6Wgv8iyyPfM62BX1rWxVphXg', '2021-08-29 22:34:00', '2021-08-29 22:34:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_absensi_magang`
--
ALTER TABLE `t_absensi_magang`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `nik` (`id_user`);

--
-- Indexes for table `t_bagian`
--
ALTER TABLE `t_bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `t_pegawai`
--
ALTER TABLE `t_pegawai`
  ADD PRIMARY KEY (`nik`),
  ADD UNIQUE KEY `id_user_2` (`id_user`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD KEY `id_bagian` (`id_bagian`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `t_peserta_magang`
--
ALTER TABLE `t_peserta_magang`
  ADD PRIMARY KEY (`nik`),
  ADD UNIQUE KEY `id_user_2` (`id_user`),
  ADD UNIQUE KEY `nomor_induk` (`nomor_induk`),
  ADD KEY `id_dinas` (`id_bagian`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `t_upload_file`
--
ALTER TABLE `t_upload_file`
  ADD PRIMARY KEY (`id_upload`),
  ADD KEY `nik` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_roles_id_foreign` (`roles_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_absensi_magang`
--
ALTER TABLE `t_absensi_magang`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `t_bagian`
--
ALTER TABLE `t_bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t_upload_file`
--
ALTER TABLE `t_upload_file`
  MODIFY `id_upload` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_absensi_magang`
--
ALTER TABLE `t_absensi_magang`
  ADD CONSTRAINT `t_absensi_magang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `t_pegawai`
--
ALTER TABLE `t_pegawai`
  ADD CONSTRAINT `t_pegawai_ibfk_2` FOREIGN KEY (`id_bagian`) REFERENCES `t_bagian` (`id_bagian`),
  ADD CONSTRAINT `t_pegawai_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `t_peserta_magang`
--
ALTER TABLE `t_peserta_magang`
  ADD CONSTRAINT `t_peserta_magang_ibfk_2` FOREIGN KEY (`id_bagian`) REFERENCES `t_bagian` (`id_bagian`),
  ADD CONSTRAINT `t_peserta_magang_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `t_upload_file`
--
ALTER TABLE `t_upload_file`
  ADD CONSTRAINT `t_upload_file_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
