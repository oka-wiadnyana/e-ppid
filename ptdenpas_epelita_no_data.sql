-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 10, 2025 at 05:20 AM
-- Server version: 10.6.19-MariaDB-log
-- PHP Version: 8.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ptdenpas_epelita`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_auth`
--

CREATE TABLE `admin_auth` (
  `id` int(5) UNSIGNED NOT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `nip` varchar(250) DEFAULT NULL,
  `jabatan` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `foto_profil` varchar(250) NOT NULL DEFAULT 'no-profil.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `admin_auth`
--

INSERT INTO `admin_auth` (`id`, `nama`, `nip`, `jabatan`, `email`, `password`, `foto_profil`, `created_at`, `updated_at`, `deleted_at`) VALUES
(23, 'Dr. YUSLAN, S.E.,S.H.,M.H.', '197212311992031009', 'PPID Kesekretariatan/Sekretaris', 'sekretaris@pt-denpasar.go.id', '$2y$10$SLtxThRH61RSLprstKNihuIEvvCUGAx/ICbq8Gs13UMpKS40X.sZe', 'no-profil.jpg', '2022-05-22 12:07:59', '2022-05-22 12:07:59', NULL),
(22, 'I GDE NGURAH ARYA WINAYA, S.H., M.H.', '196304241983111001', 'PPID Kepaniteraan/Panitera', 'info@pt-denpasar.go.id', '$2y$10$bg/FQLms.yIAJ6OC/UVQcuoNTHkVw7H3zdVEfAlZ7XoWPZh8WZaoa', 'no-profil.jpg', '2022-05-22 11:52:48', '2022-05-22 11:52:48', NULL),
(15, 'Oka', '12345678', 'admin', 'onsdee86@gmail.com', '$2y$10$GUQfuCILJhw3y8MQmr89FeUKVbVIIVF.l5ntMPQd6S44May/uu9W6', 'no-profil.jpg', NULL, NULL, NULL),
(24, 'I WAYAN PAGEH, S.H., M.H.', '196212311983031067', 'Panmud Hukum', 'pageh2793@gmail.com', '$2y$10$r/nV5j86/ZrhAcuetctEneChX5TOAfWnxXyMBQy9VqDHsXKM4NUTy', 'no-profil.jpg', '2022-05-22 12:13:34', '2022-05-22 12:13:34', NULL),
(26, 'H. Mochamad Hatta, S.H., M.H', '19590511 198403 1 004', 'Atasan PPID/KPT/WKPT', 'mochammad.hatta1119@gmail.com', '$2y$10$CYl5TB2.VXkFWxKDjxnWXeFtGtBakMBer2kM6KFOA2iT9lALycUxK', 'no-profil.jpg', '2022-05-23 15:15:28', '2022-05-23 15:15:28', NULL),
(25, 'Petugas Meja Informasi', '0010101', 'Petugas Meja Informasi', 'petugasmejainformasi@gmail.com', '$2y$10$VVHiDZRjA1BBQFA.j7EMT.HKTbZiEomC0R.UlQ.7YP.BSoIGvjICq', 'no-profil.jpg', '2022-05-22 12:15:18', '2022-05-22 12:15:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_informasi`
--

CREATE TABLE `jenis_informasi` (
  `id` int(5) UNSIGNED NOT NULL,
  `jenis_informasi` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_keberatan`
--

CREATE TABLE `jenis_keberatan` (
  `id` int(5) UNSIGNED NOT NULL,
  `jenis_keberatan` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jumlah_permohonan`
--

CREATE TABLE `jumlah_permohonan` (
  `id` int(5) UNSIGNED NOT NULL,
  `bulan` varchar(100) DEFAULT NULL,
  `tahun` varchar(100) DEFAULT NULL,
  `sepenuhnya` int(10) DEFAULT NULL,
  `sebagian` int(10) DEFAULT NULL,
  `ditolak` int(10) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keberatan`
--

CREATE TABLE `keberatan` (
  `id` int(5) UNSIGNED NOT NULL,
  `permohonan_id` int(5) UNSIGNED NOT NULL,
  `tanggal_keberatan` date DEFAULT NULL,
  `jenis_keberatan_id` int(5) UNSIGNED NOT NULL,
  `isi_keberatan` text DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'Proses verifikasi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_layanan`
--

CREATE TABLE `laporan_layanan` (
  `id` int(5) UNSIGNED NOT NULL,
  `tahun` varchar(250) DEFAULT NULL,
  `laporan` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `layanan_elektronik`
--

CREATE TABLE `layanan_elektronik` (
  `id` int(5) UNSIGNED NOT NULL,
  `alias` varchar(250) DEFAULT NULL,
  `link` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `level1`
--

CREATE TABLE `level1` (
  `id` int(5) UNSIGNED NOT NULL,
  `level1` varchar(20) DEFAULT NULL,
  `nama` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `level2`
--

CREATE TABLE `level2` (
  `id` int(5) UNSIGNED NOT NULL,
  `level1` varchar(20) DEFAULT NULL,
  `level2` varchar(20) DEFAULT NULL,
  `nama` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `level3`
--

CREATE TABLE `level3` (
  `id` int(5) UNSIGNED NOT NULL,
  `level1` varchar(20) DEFAULT NULL,
  `level2` varchar(20) DEFAULT NULL,
  `level3` varchar(20) DEFAULT NULL,
  `nama` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `link_informasi`
--

CREATE TABLE `link_informasi` (
  `id` int(5) UNSIGNED NOT NULL,
  `level1` varchar(10) DEFAULT NULL,
  `level2` varchar(10) DEFAULT NULL,
  `level3` varchar(10) DEFAULT NULL,
  `level4` int(11) DEFAULT NULL,
  `uraian` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `link_terkait`
--

CREATE TABLE `link_terkait` (
  `id` int(5) UNSIGNED NOT NULL,
  `alias` varchar(250) DEFAULT NULL,
  `link` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id` int(10) UNSIGNED NOT NULL,
  `tanggal_laporan` date DEFAULT NULL,
  `id_pelapor` varchar(255) DEFAULT NULL,
  `hal` text DEFAULT NULL,
  `tempat_kejadian` text DEFAULT NULL,
  `waktu` date DEFAULT NULL,
  `nama_terlapor` text DEFAULT NULL,
  `isi_pengaduan` text DEFAULT NULL,
  `file` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peraturan`
--

CREATE TABLE `peraturan` (
  `id` int(5) UNSIGNED NOT NULL,
  `nomor_peraturan` varchar(250) DEFAULT NULL,
  `tentang` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permohonan`
--

CREATE TABLE `permohonan` (
  `id` int(5) UNSIGNED NOT NULL,
  `id_jenis_informasi` int(5) UNSIGNED NOT NULL,
  `nomor_register` varchar(100) DEFAULT NULL,
  `tanggal_permohonan` date DEFAULT NULL,
  `isi_permohonan` text DEFAULT NULL,
  `file_permohonan` varchar(500) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'Proses verifikasi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prasyarat_others`
--

CREATE TABLE `prasyarat_others` (
  `id` int(5) UNSIGNED NOT NULL,
  `prasyarat` text DEFAULT NULL,
  `hubungi_kami` text DEFAULT NULL,
  `faq` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profil_ppid`
--

CREATE TABLE `profil_ppid` (
  `id` int(5) UNSIGNED NOT NULL,
  `profil` text DEFAULT NULL,
  `tupoksi` text DEFAULT NULL,
  `struktur` text DEFAULT NULL,
  `visimisi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profil_satker`
--

CREATE TABLE `profil_satker` (
  `id` int(5) UNSIGNED NOT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `nama_pendek` varchar(100) DEFAULT NULL,
  `alamat` varchar(500) DEFAULT NULL,
  `nomor_telepon` varchar(30) DEFAULT NULL,
  `nomor_whatsapp` varchar(30) DEFAULT NULL,
  `telegram` varchar(30) DEFAULT NULL,
  `nomor_fax` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `link_satker` varchar(100) DEFAULT NULL,
  `link_youtube` varchar(50) DEFAULT NULL,
  `link_facebook` varchar(50) DEFAULT NULL,
  `link_instagram` varchar(50) DEFAULT NULL,
  `link_twitter` varchar(50) DEFAULT NULL,
  `link_video_dashboard` varchar(500) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proses_keberatan`
--

CREATE TABLE `proses_keberatan` (
  `id` int(5) UNSIGNED NOT NULL,
  `keberatan_id` int(5) UNSIGNED NOT NULL,
  `status` varchar(250) DEFAULT NULL,
  `tanggapan` text DEFAULT NULL,
  `lampiran_tanggapan` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proses_pengaduan`
--

CREATE TABLE `proses_pengaduan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pengaduan` int(10) UNSIGNED DEFAULT NULL,
  `proses` varchar(50) DEFAULT NULL,
  `status` text DEFAULT NULL,
  `tanggapan` text DEFAULT NULL,
  `file_tanggapan` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proses_permohonan`
--

CREATE TABLE `proses_permohonan` (
  `id` int(5) UNSIGNED NOT NULL,
  `permohonan_id` int(5) UNSIGNED NOT NULL,
  `proses` varchar(250) DEFAULT NULL,
  `status_jawaban` varchar(250) DEFAULT NULL,
  `jenis_penolakan` varchar(250) DEFAULT NULL,
  `jawaban` text DEFAULT NULL,
  `lampiran_jawaban` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `standar_layanan`
--

CREATE TABLE `standar_layanan` (
  `id` int(5) UNSIGNED NOT NULL,
  `maklumat` varchar(250) DEFAULT NULL,
  `prosedur` varchar(250) DEFAULT NULL,
  `keberatan` varchar(250) DEFAULT NULL,
  `sengketa` varchar(250) DEFAULT NULL,
  `jalur` varchar(250) DEFAULT NULL,
  `biaya` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statistik_permohonan`
--

CREATE TABLE `statistik_permohonan` (
  `id` int(5) UNSIGNED NOT NULL,
  `tahun` varchar(250) DEFAULT NULL,
  `statistik` varchar(250) DEFAULT NULL,
  `rekapitulasi` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_pengaduan`
--

CREATE TABLE `user_pengaduan` (
  `id` int(5) UNSIGNED NOT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `nomor_hp` varchar(250) DEFAULT NULL,
  `ktp` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `foto_profil` varchar(250) NOT NULL DEFAULT 'no-profil.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `user_profil`
--

CREATE TABLE `user_profil` (
  `id` int(5) UNSIGNED NOT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `nomor_telepon` varchar(250) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `ktp` varchar(250) DEFAULT NULL,
  `pekerjaan` varchar(250) DEFAULT NULL,
  `institusi` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `foto_profil` varchar(250) NOT NULL DEFAULT 'no-profil.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `video_informasi`
--

CREATE TABLE `video_informasi` (
  `id` int(5) UNSIGNED NOT NULL,
  `uraian` varchar(255) DEFAULT NULL,
  `embed_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_auth`
--
ALTER TABLE `admin_auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_informasi`
--
ALTER TABLE `jenis_informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_keberatan`
--
ALTER TABLE `jenis_keberatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jumlah_permohonan`
--
ALTER TABLE `jumlah_permohonan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keberatan`
--
ALTER TABLE `keberatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_layanan`
--
ALTER TABLE `laporan_layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layanan_elektronik`
--
ALTER TABLE `layanan_elektronik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level1`
--
ALTER TABLE `level1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level2`
--
ALTER TABLE `level2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level3`
--
ALTER TABLE `level3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `link_informasi`
--
ALTER TABLE `link_informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `link_terkait`
--
ALTER TABLE `link_terkait`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peraturan`
--
ALTER TABLE `peraturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permohonan`
--
ALTER TABLE `permohonan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prasyarat_others`
--
ALTER TABLE `prasyarat_others`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil_ppid`
--
ALTER TABLE `profil_ppid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil_satker`
--
ALTER TABLE `profil_satker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proses_keberatan`
--
ALTER TABLE `proses_keberatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proses_pengaduan`
--
ALTER TABLE `proses_pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proses_permohonan`
--
ALTER TABLE `proses_permohonan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proses_permohonan_permohonan_id_foreign` (`permohonan_id`);

--
-- Indexes for table `standar_layanan`
--
ALTER TABLE `standar_layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistik_permohonan`
--
ALTER TABLE `statistik_permohonan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_pengaduan`
--
ALTER TABLE `user_pengaduan`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `user_profil`
--
ALTER TABLE `user_profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_informasi`
--
ALTER TABLE `video_informasi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_auth`
--
ALTER TABLE `admin_auth`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `jenis_informasi`
--
ALTER TABLE `jenis_informasi`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_keberatan`
--
ALTER TABLE `jenis_keberatan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jumlah_permohonan`
--
ALTER TABLE `jumlah_permohonan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keberatan`
--
ALTER TABLE `keberatan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan_layanan`
--
ALTER TABLE `laporan_layanan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `layanan_elektronik`
--
ALTER TABLE `layanan_elektronik`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level1`
--
ALTER TABLE `level1`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level2`
--
ALTER TABLE `level2`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level3`
--
ALTER TABLE `level3`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `link_informasi`
--
ALTER TABLE `link_informasi`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `link_terkait`
--
ALTER TABLE `link_terkait`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peraturan`
--
ALTER TABLE `peraturan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permohonan`
--
ALTER TABLE `permohonan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prasyarat_others`
--
ALTER TABLE `prasyarat_others`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profil_ppid`
--
ALTER TABLE `profil_ppid`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profil_satker`
--
ALTER TABLE `profil_satker`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proses_keberatan`
--
ALTER TABLE `proses_keberatan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proses_pengaduan`
--
ALTER TABLE `proses_pengaduan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proses_permohonan`
--
ALTER TABLE `proses_permohonan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `standar_layanan`
--
ALTER TABLE `standar_layanan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statistik_permohonan`
--
ALTER TABLE `statistik_permohonan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_pengaduan`
--
ALTER TABLE `user_pengaduan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_profil`
--
ALTER TABLE `user_profil`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `video_informasi`
--
ALTER TABLE `video_informasi`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
