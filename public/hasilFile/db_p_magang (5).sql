-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2021 at 10:24 AM
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
(3, 'Kepala Seksi');

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
(48, 1110057464, '2021-07-24', '10:58:47', 'Masuk', 'Hadir', NULL, NULL),
(49, 1110057464, '2021-08-09', '13:45:31', 'Masuk', 'Hadir', NULL, NULL),
(50, 1110057464, '2021-08-09', '13:45:39', 'Pulang', 'Hadir', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_bagian`
--

CREATE TABLE `t_bagian` (
  `id_dinas` int(11) NOT NULL,
  `nama_dinas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_bagian`
--

INSERT INTO `t_bagian` (`id_dinas`, `nama_dinas`) VALUES
(1, 'Sekretariat'),
(2, 'E-Goverment');

-- --------------------------------------------------------

--
-- Table structure for table `t_pegawai`
--

CREATE TABLE `t_pegawai` (
  `id_user` int(25) NOT NULL,
  `nik` char(20) NOT NULL,
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
(708847999, '6371092300123009', '222200909093123', 'Admin Super', '', 1, '088897885888', 'Jalan Sudirman', 'Laki-Laki'),
(769407793, '989899988', '8889998999', 'Kepala / Pimpinan', NULL, 2, '089945457878', 'ter', 'Laki-Laki');

-- --------------------------------------------------------

--
-- Table structure for table `t_peserta_magang`
--

CREATE TABLE `t_peserta_magang` (
  `id_user` int(25) NOT NULL,
  `nik` char(20) NOT NULL,
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
  `status_penerimaan` enum('Diterima') DEFAULT NULL,
  `id_bagian` int(11) DEFAULT NULL,
  `sertifikat` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_peserta_magang`
--

INSERT INTO `t_peserta_magang` (`id_user`, `nik`, `nomor_induk`, `nama_peserta`, `foto_peserta`, `surat_permohonan`, `no_hp`, `alamat_peserta`, `jurusan`, `asal_peserta`, `alamat_asal`, `telp_ortu`, `jk`, `tanggal_lahir`, `tempat_lahir`, `status`, `tanggal_masuk`, `tanggal_keluar`, `status_penerimaan`, `id_bagian`, `sertifikat`, `updated_at`, `created_at`) VALUES
(1021393214, '666', '666', 'Fadillah Azmi', NULL, NULL, '085656666', 'Jalan Kuin Utara no.73', 'Manajemen Informatika', 'Politeknik Negeri Banjarmasin', 'Jalan Brig H. Hasan Basri', '0812666', 'Laki-Laki', '1999-10-25', 'Banjarmasin', 'aktif', '2021-08-01', '2021-08-07', 'Diterima', 2, NULL, '2021-08-08 20:53:55', '2021-08-08 20:30:02'),
(1110057464, '6731012510990004', 'E020318079', 'Azmi Fadillah', '', '', '085654786069', 'Jalan Kuin Utara No.142B', 'Manajemen Informatika', 'Politeknik Negeri Banjarmasin', 'Didalam ULM', '081251028878', 'Laki-Laki', '1999-10-25', 'Banjarmasin', 'tidak aktif', '2021-07-01', '2021-07-31', NULL, 2, NULL, '2021-08-09 07:49:08', '2021-07-20 21:10:15');

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

--
-- Dumping data for table `t_upload_file`
--

INSERT INTO `t_upload_file` (`id_upload`, `nama_file`, `tanggal`, `id_user`) VALUES
(11, 'db_p_magang_new.sql', '2021-07-22', 1110057464);

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
(708847999, 2, 'admin', 'admin@admin.com', '$2y$10$Mz9in3QfKBRAA4KI9PLovOpGfcmDveCvDI.GgGgY7ZMoo5EbqGcyK', 'aT7ku2tU7YWKIwgXvcDQHakQXtagziLMEtlxmDHuL0pMwGmGjXv1SI1mdsEr', '2021-07-20 20:35:34', '2021-07-20 20:35:34'),
(769407793, 3, 'kasi', 'kasi@gmail.com', '$2y$10$rUocxQgbp.l58uvT77r3auheBr0q.J4qf447iLJKDnFrj7yj9579a', '2qfAsZWrnaiYIiycfk3KtpDcCYuwZH1FfdYivjHNH5Zg34cRrTfQWule6Zx7', '2021-08-06 06:26:34', '2021-08-06 20:40:20'),
(1021393214, 1, 'new1', 'azmifadillah25@gmail.com', '$2y$10$eyBiTwJXJmMuvxkR3W3TGuZySoXOi/JlTPTHUrtDWeevBJJH0ksve', NULL, '2021-08-08 20:30:02', '2021-08-08 20:30:02'),
(1110057464, 1, 'azmi88', 'akungabut25baru@gmail.com', '$2y$10$u7NtWfGVsOJM1EKSpNjFUeXM.SYKrQ45eCg7O0wfQu1JplSMiy8JO', '592VW3TmQ9Kqv7ej7LxAp7QyYUaPxNo42NpmqrL1onbmw4Su92aSbGjKVBML', '2021-07-20 21:10:15', '2021-07-20 21:10:15');

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
  ADD PRIMARY KEY (`id_dinas`);

--
-- Indexes for table `t_pegawai`
--
ALTER TABLE `t_pegawai`
  ADD PRIMARY KEY (`nik`,`nip`),
  ADD UNIQUE KEY `id_user_2` (`id_user`),
  ADD KEY `id_bagian` (`id_bagian`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `t_peserta_magang`
--
ALTER TABLE `t_peserta_magang`
  ADD PRIMARY KEY (`nik`,`nomor_induk`),
  ADD UNIQUE KEY `id_user_2` (`id_user`),
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_absensi_magang`
--
ALTER TABLE `t_absensi_magang`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `t_bagian`
--
ALTER TABLE `t_bagian`
  MODIFY `id_dinas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_upload_file`
--
ALTER TABLE `t_upload_file`
  MODIFY `id_upload` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  ADD CONSTRAINT `t_pegawai_ibfk_2` FOREIGN KEY (`id_bagian`) REFERENCES `t_bagian` (`id_dinas`),
  ADD CONSTRAINT `t_pegawai_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `t_peserta_magang`
--
ALTER TABLE `t_peserta_magang`
  ADD CONSTRAINT `t_peserta_magang_ibfk_2` FOREIGN KEY (`id_bagian`) REFERENCES `t_bagian` (`id_dinas`),
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
