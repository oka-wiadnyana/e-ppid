-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 09, 2025 at 06:55 PM
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

--
-- Dumping data for table `jenis_informasi`
--

INSERT INTO `jenis_informasi` (`id`, `jenis_informasi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Perkara dan Putusan', NULL, NULL, NULL),
(2, 'Kepegawaian', NULL, NULL, NULL),
(3, 'Pengawasan', NULL, NULL, NULL),
(4, 'Anggaran dan Aset', NULL, NULL, NULL),
(5, 'Lainnya', NULL, NULL, NULL);

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

--
-- Dumping data for table `jenis_keberatan`
--

INSERT INTO `jenis_keberatan` (`id`, `jenis_keberatan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Permohonan informasi ditolak', NULL, NULL, NULL),
(2, 'Informasi berkala tidak disediakan', NULL, NULL, NULL),
(3, 'Permintaan informasi tidak ditanggapi', NULL, NULL, NULL),
(4, 'Permintaan informasi tidak ditanggapi sebagaimana yang diminta', NULL, NULL, NULL),
(5, 'Permintaan informasi tidak dipenuhi', NULL, NULL, NULL),
(6, 'Biaya yang dikenakan tidak wajar', NULL, NULL, NULL),
(7, 'Informasi yang disampaikan melebihi jangka waktu yang ditentukan', NULL, NULL, NULL);

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

--
-- Dumping data for table `keberatan`
--

INSERT INTO `keberatan` (`id`, `permohonan_id`, `tanggal_keberatan`, `jenis_keberatan_id`, `isi_keberatan`, `email`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(17, 9, '2022-05-22', 7, 'keberatan', 'suharsana@gmail.com', 'Sudah ditindaklanjuti', '2022-05-21 10:51:43', '2022-05-21 10:51:43', NULL),
(18, 18, '2024-05-13', 5, 'informasi kurang', 'suharsana@gmail.com', 'Sudah ditindaklanjuti', '2024-05-12 15:42:28', '2024-05-12 15:42:28', NULL);

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

--
-- Dumping data for table `laporan_layanan`
--

INSERT INTO `laporan_layanan` (`id`, `tahun`, `laporan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, '2021', 'laporan-164554335.pdf', '2022-04-15 23:19:17', '2022-04-15 23:19:17', NULL);

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

--
-- Dumping data for table `layanan_elektronik`
--

INSERT INTO `layanan_elektronik` (`id`, `alias`, `link`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ecourt Pengadilan Tinggi Denpasar', 'https://ecourt.mahkamahagung.go.id/index.php/', '2022-02-22 11:04:11', '2022-02-22 11:04:11', NULL),
(3, 'Survei Pelayanan Elektronik', 'http://esurvey.badilum.mahkamahagung.go.id/index.php/pengadilan/099802', '2022-04-12 18:57:57', '2022-04-12 18:57:57', NULL),
(4, 'SIWAS Mahkamah Agung RI', 'https://siwas.mahkamahagung.go.id/', '2022-04-12 19:03:31', '2022-04-12 19:03:31', NULL);

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

--
-- Dumping data for table `level1`
--

INSERT INTO `level1` (`id`, `level1`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'A', 'Informasi yang Wajib Diumumkan Secara Berkala oleh Pengadilan', NULL, '2022-01-10 23:27:45', NULL),
(5, 'B', 'Informasi Serta Merta Pengadilan', NULL, '2022-05-20 09:41:12', NULL),
(6, 'C', 'Informasi yang Wajib Tersedia setiap Saat dan Dapat Diakses oleh Publik', NULL, NULL, NULL);

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

--
-- Dumping data for table `level2`
--

INSERT INTO `level2` (`id`, `level1`, `level2`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'A', '1', 'Informasi Profil dan Pelayanan Dasar Pengadilan', NULL, '2022-01-10 02:59:48', NULL),
(2, 'A', '2', 'Informasi berkaitan dengan hak masyarakat', NULL, NULL, NULL),
(3, 'A', '3', 'Informasi Program Kerja, Kegiatan, Keuangan dan Kinerja Pengadilan', NULL, NULL, NULL),
(4, 'A', '4', 'Informasi Laporan Akses Informasi', NULL, NULL, NULL),
(6, 'B', '1', 'Informasi Serta Merta', NULL, NULL, NULL),
(7, 'C', '1', 'Umum', NULL, NULL, NULL),
(8, 'C', '2', 'Informasi tentang perkara dan persidangan', NULL, NULL, NULL),
(9, 'C', '3', 'Informasi tentang Pengawasan dan Pendispilinan', NULL, NULL, NULL),
(10, 'C', '4', ' Informasi tentang Peraturan, Kebijakan dan Hasil Penelitian', NULL, NULL, NULL),
(11, 'C', '5', ' Informasi tentang Organisasi, Administrasi, Kepegawaian dan Keuangan', NULL, NULL, NULL);

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

--
-- Dumping data for table `level3`
--

INSERT INTO `level3` (`id`, `level1`, `level2`, `level3`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'A', '1', '1', 'Profil Pengadilan Tinggi Denpasar', NULL, '2022-05-02 04:05:36', NULL),
(3, 'A', '1', '3', 'Informasi biaya perkara dan informasi biaya kepaniteraan', NULL, NULL, NULL),
(4, 'A', '1', '4', 'Agenda sidang', NULL, NULL, NULL),
(5, 'A', '2', '1', 'Hak-hak para pihak', NULL, NULL, NULL),
(6, 'A', '2', '2', 'Tata cara pengaduan dugaan pelanggaran', NULL, NULL, NULL),
(7, 'A', '2', '3', 'Hak-hak pelapor', NULL, NULL, NULL),
(8, 'A', '2', '4', 'Tata cara memperoleh layanan informasi', NULL, NULL, NULL),
(9, 'A', '2', '5', 'Hak-hak para pemohon informasi', NULL, NULL, NULL),
(10, 'A', '2', '5', 'Biaya perolehan informasi', NULL, NULL, NULL),
(11, 'A', '3', '1', 'Sistem Akuntabilitas kinerja', NULL, NULL, NULL),
(12, 'A', '3', '2', 'Laporan Realisasi Anggaran', NULL, NULL, NULL),
(13, 'A', '3', '3', 'Daftar Aset', NULL, NULL, NULL),
(14, 'A', '3', '4', 'Pengumuman pengadaan barang dan jasa', NULL, NULL, NULL),
(15, 'A', '4', '1', 'Laporan akses informasi', NULL, NULL, NULL),
(17, 'B', '1', '1', 'Informasi Serta Merta', NULL, NULL, NULL),
(18, 'C', '1', '1', 'Umum', NULL, NULL, NULL),
(19, 'C', '2', '1', 'Informasi putusan', NULL, NULL, NULL),
(20, 'C', '2', '2', 'Laporan penggunaan biaya perkara', NULL, NULL, NULL),
(21, 'C', '2', '3', 'Statistik perkara', NULL, NULL, NULL),
(22, 'C', '3', '1', 'Informasi pengawasan dan pendisiplinan', NULL, NULL, NULL),
(23, 'C', '4', '1', 'Informasi tentang peraturan dan kebijakan', NULL, NULL, NULL),
(25, 'C', '5', '2', 'Standar dan maklumat pelayanan', NULL, NULL, NULL),
(26, 'C', '5', '3', 'Anggaran serta laporan keuangannya', NULL, NULL, NULL),
(30, 'A', '1', '2', 'Prosedur Alur Perkara', '2022-04-17 17:16:16', '2022-04-17 18:00:21', NULL);

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

--
-- Dumping data for table `link_informasi`
--

INSERT INTO `link_informasi` (`id`, `level1`, `level2`, `level3`, `level4`, `uraian`, `link`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'A', '1', '1', 1, 'Visi Misi Pengadilan Tinggi Denpasar', 'http://www.pt-denpasar.go.id/new/link/2014070120232627653b2b64ee3435JR.html', NULL, NULL, NULL),
(2, 'A', '1', '1', 2, 'Yuridiksi Pengadilan Tinggi Denpasar', 'http://www.pt-denpasar.go.id/new/other/wilayah_yuridiksi.html', NULL, NULL, NULL),
(3, 'A', '1', '1', 3, 'Alamat, telepon, faksimili, dan situs resmi Pengadilan Tinggi Denpasar', 'https://www.google.com/maps/place/Pengadilan+Tinggi+Denpasar/@-8.6695586,115.2262762,19z/data=!4m13!1m6!3m5!1s0x2dd240f2d7f01823:0xc3b7d3a532873847!2sPengadilan+Tinggi+Denpasar!8m2!3d-8.669919!4d115.227066!3m5!1s0x2dd240f2d7f01823:0xc3b7d3a532873847!8m2!3d-8.669919!4d115.227066!15sChpwZW5nYWRpbGFuIHRpbmdnaSBkZW5wYXNhcpIBEGRpc3RyaWN0X2p1c3RpY2U?hl=id', NULL, NULL, NULL),
(4, 'A', '1', '1', 4, 'Profil Ketua', 'http://www.pt-denpasar.go.id/new/other/ketua.html', NULL, NULL, NULL),
(5, 'A', '1', '1', 5, 'Profil Wakil Ketua ', 'http://www.pt-denpasar.go.id/new/other/wakilketua.html', NULL, NULL, NULL),
(6, 'A', '1', '1', 6, 'Profil Hakim', 'http://www.pt-denpasar.go.id/new/other/hakim.html', NULL, NULL, NULL),
(7, 'A', '1', '1', 7, 'Profil Kepaniteraan', 'http://www.pt-denpasar.go.id/new/other/pejabat_kepaniteraan.html', NULL, NULL, NULL),
(8, 'A', '1', '1', 8, 'Profil Kesekretariatan', 'http://www.pt-denpasar.go.id/new/other/pejabat_kesekretariatan.html', NULL, NULL, NULL),
(64, 'A', '1', '1', 10, 'Profil Panitera Pengganti', 'http://www.pt-denpasar.go.id/new/other/panitera_pengganti.html', NULL, NULL, NULL),
(9, 'A', '1', '1', 9, 'Profil Pelaksana', 'http://www.pt-denpasar.go.id/new/other/Staf_Pelaksana.html', NULL, NULL, NULL),
(65, 'A', '1', '1', 10, 'Profil Pejabat Fungsional', 'http://www.pt-denpasar.go.id/new/other/Pejabat_Fungsional.html', NULL, NULL, NULL),
(66, 'A', '2', '1', 1, 'Hak-Hak Pokok Dalam Proses Persidangan', 'http://www.pt-denpasar.go.id/new/link/202205220509127994487096289c5786845b.html', NULL, '2022-05-22 00:21:25', NULL),
(67, 'A', '2', '1', 2, 'Hak Pelapor dan Terlapor', 'http://www.pt-denpasar.go.id/new/link/202205220509411993253886289c59531296.html', NULL, '2022-05-22 00:21:56', NULL),
(68, 'A', '2', '1', 3, 'Hak Para Pihak Yang Berhubungan dengan Peradilan', 'http://www.pt-denpasar.go.id/new/link/202205220510242452221206289c5c0ab6ee.html', NULL, '2022-05-22 00:22:24', NULL),
(69, 'A', '2', '1', 4, 'Hak-hak Tersangka dan Terdakwa', 'http://www.pt-denpasar.go.id/new/link/2022052205112818696129786289c6006be10.html', NULL, '2022-05-22 00:22:46', NULL),
(70, 'A', '2', '1', 5, 'Hak Penasihat Hukum', 'http://www.pt-denpasar.go.id/new/link/202205220512108664492066289c62a974a2.html', NULL, '2022-05-22 00:23:06', NULL),
(71, 'A', '2', '1', 6, 'Hak Pihak Ketiga', 'http://www.pt-denpasar.go.id/new/link/2022052205131113306206316289c667d0822.html', NULL, '2022-05-22 00:23:42', NULL),
(72, 'A', '2', '1', 7, 'Hak Untuk Memperoleh Ganti Rugi dan Rehabilitasi Ganti Rugi', 'http://www.pt-denpasar.go.id/new/link/202205220513313427968346289c67bcf11a.html', NULL, '2022-05-22 00:24:44', NULL),
(14, 'A', '1', '4', 0, 'Agenda sidang pada Pengadilan Tinggi Denpasar', 'https://sipp-banding.mahkamahagung.go.id/slide_sidang_publik/TWhNZWswYUNldklxWFU1QXNreXA3MkdoN04wbXhoYnptK2FLbG5GWDlqRkZpdWFzSXp2RGM5WjE2Y1pYcGE1YlhReDgyclNoeFVScC9vS1Y0V2NEUWc9PQ==', NULL, '2022-05-21 17:03:09', NULL),
(18, 'A', '2', '2', 0, 'Tatacara pengaduan dugaan pelanggaran yang dilakukan Hakim dan Pegawai Pengadilan Tinggi Denpasar', 'http://www.pt-denpasar.go.id/new/link/20170614084034203155940da62bae18.html#tabs|Tabs_Group_name:tabLampiran', NULL, '2022-05-22 20:30:53', NULL),
(19, 'A', '2', '3', 0, 'Hak-hak pelapor dugaan pelanggaran Hakim dan Pegawai Pengadilan Tinggi Denpasar', 'http://www.pt-denpasar.go.id/new/link/20170614084034203155940da62bae18.html#tabs|Tabs_Group_name:tabLampiran', NULL, '2022-05-21 17:13:35', NULL),
(20, 'A', '2', '4', 0, 'Prosedur Permohonan Informasi', 'http://www.pt-denpasar.go.id/new/link/202205270442591741563319629056d3638b0.html', NULL, '2022-05-26 23:44:05', NULL),
(21, 'A', '2', '5', 0, 'Hak-hak pemohon informasi dalam pelayanan informasi', 'http://www.pt-denpasar.go.id/new/link/202205270442591741563319629056d3638b0.html', NULL, '2022-05-26 23:44:58', NULL),
(22, 'A', '3', '1', 0, ' Sistem Akuntabilitas Kinerja Instansi Pemerintahan Pengadilan Tinggi Denpasar', 'http://www.pt-denpasar.go.id/new/tag/T05-P04-88/', NULL, '2022-05-26 23:46:22', NULL),
(23, 'A', '3', '2', 0, 'Laporan Realisasi Anggaran Pengadilan Tinggi Denpasar', 'http://www.pt-denpasar.go.id/new/tag/T05-P04-21/', NULL, '2022-05-21 17:18:14', NULL),
(24, 'A', '3', '3', 0, 'Daftar Aset dan Inventaris', 'http://www.pt-denpasar.go.id/new/link/20170614094102132105940e88e9ab24.html', NULL, '2022-05-21 17:18:40', NULL),
(25, 'A', '3', '4', 0, 'Pengumuman Pengadaan Barang dan Jasa Pengadilan Tinggi Denpasar', 'http://www.pt-denpasar.go.id/new/tag/T02-P06-33', NULL, '2022-05-22 20:30:13', NULL),
(26, 'A', '4', '1', 0, 'Laporan Akses Informasi', 'http://epelita.pt-denpasar.go.id/userpage/v_statistik', NULL, '2022-05-21 17:22:02', NULL),
(59, 'A', '1', '3', 1, 'Biaya Perkara di Pengadilan Tinggi Denpasar', 'http://www.pt-denpasar.go.id/new/link/20170615045446256495941f6f61980e.html#tabs|Tabs_Group_name:tabLampiran', NULL, '2022-05-21 16:54:33', NULL),
(28, 'A', '6', '1', 0, 'Informasi penerimaan pegawai', 'http://www.pt-denpasar.go.id/new/tag/T03-P05-11', NULL, '2022-05-22 20:28:41', NULL),
(29, 'B', '1', '1', 0, 'Informasi serta merta', 'http://www.pt-denpasar.go.id/new/content/berita/', NULL, '2022-08-03 21:29:18', NULL),
(30, 'C', '1', '1', 0, 'Informasi yang wajib diumumkan secara berkala', 'http://epelita.pt-denpasar.go.id/userpage/listinformasi/berkala', NULL, '2022-05-21 17:24:03', NULL),
(31, 'C', '2', '1', 1, 'Informasi putusan Pengadilan Tinggi Denpasar', 'https://putusan3.mahkamahagung.go.id/pengadilan/profil/pengadilan/pt-denpasar.html', NULL, '2022-05-21 17:26:14', NULL),
(32, 'C', '2', '2', 0, 'Informasi biaya perkara', 'http://www.pt-denpasar.go.id/new/link/20170615045446256495941f6f61980e.html#tabs|Tabs_Group_name:tabLampiran', NULL, '2022-05-21 17:26:44', NULL),
(33, 'C', '3', '1', 0, 'Informasi tentang Pengawasan dan Pendisiplinan', 'https://bawas.mahkamahagung.go.id/', NULL, NULL, NULL),
(34, 'C', '4', '1', 0, 'Informasi tentang Peraturan, Kebijakan dan Hasil Penelitian', 'https://jdih.mahkamahagung.go.id/', NULL, NULL, NULL),
(37, 'C', '5', '2', 1, 'Standar Pelayanan', 'http://www.pt-denpasar.go.id/new/link/2020062308454412551457045ef15ec8413f8.html#tabs|Tabs_Group_name:tabLampiran', NULL, '2022-05-21 17:31:26', NULL),
(38, 'C', '5', '2', 2, 'Maklumat pelayanan', 'http://www.pt-denpasar.go.id/new/link/20211227032934129557871261c9331ea89f2.html#tabs|Tabs_Group_name:tabGaleri', NULL, '2022-05-21 17:32:19', NULL),
(39, 'C', '5', '3', 1, 'RKAKL Pengadilan Tinggi Denpasar', 'http://www.pt-denpasar.go.id/new/tag/T05-P04-18/', NULL, '2022-05-22 19:49:37', NULL),
(40, 'C', '5', '3', 2, 'Laporan Realisasi Anggaran Pengadilan Tinggi Denpasar', 'http://www.pt-denpasar.go.id/new/tag/T05-P04-21/', NULL, '2022-05-21 17:35:08', NULL),
(61, 'A', '1', '2', 1, 'Prosedur Pengajuan Perkara Perdata Banding', 'http://www.pt-denpasar.go.id/new/link/201706150308321655941de107b324JP.html#tabs|Tabs_Group_name:tabGaleri', NULL, '2022-05-21 16:56:02', NULL),
(75, 'A', '1', '1', 10, 'Profil Hakim AdHoc', 'http://www.pt-denpasar.go.id/new/other/hakim_adhoc_tipikor.html', NULL, NULL, NULL),
(91, 'A', '1', '2', 3, 'Prosedur Pengajuan Perkara Tipikor Banding', 'http://www.pt-denpasar.go.id/new/link/201706150314105455941df620c1a3hY.html#tabs|Tabs_Group_name:tabGaleri', '2022-05-23 18:58:24', '2022-05-23 18:58:24', NULL),
(85, 'C', '5', '3', 3, 'DIPA Pengadilan Tinggi Denpasar', 'http://www.pt-denpasar.go.id/new/tag/T05-P04-19/', '2022-05-22 19:51:32', '2022-05-22 19:51:32', NULL),
(90, 'A', '1', '2', 2, 'Prosedur Pengajuan Perkara Pidana Banding', 'http://www.pt-denpasar.go.id/new/link/20170615031206185685941dee6e600d.html#tabs|Tabs_Group_name:tabGaleri', '2022-05-23 18:57:54', '2022-05-23 18:57:54', NULL);

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

--
-- Dumping data for table `link_terkait`
--

INSERT INTO `link_terkait` (`id`, `alias`, `link`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'Pengadilan Tinggi Denpasar', 'http://www.pt-denpasar.go.id/new/', '2022-04-12 18:54:34', '2022-04-12 18:54:34', NULL),
(12, 'Direktorat Jendral Badan Peradilan Umum', 'https://badilum.mahkamahagung.go.id/', '2022-04-12 18:55:27', '2022-04-12 18:55:27', NULL),
(13, 'Mahkamah Agung Republik Indonesia', 'https://mahkamahagung.go.id', '2022-04-12 18:56:20', '2022-04-12 18:56:20', NULL);

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

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(19, '2021-12-15-122404', 'App\\Database\\Migrations\\Eppid', 'default', 'App', 1640640609, 1),
(20, '2021-12-15-132254', 'App\\Database\\Migrations\\JumlahPermohonan', 'default', 'App', 1640640609, 1),
(21, '2021-12-27-202951', 'App\\Database\\Migrations\\Profilsatker', 'default', 'App', 1640640609, 1),
(22, '2021-12-29-210708', 'App\\Database\\Migrations\\Videoinformasi', 'default', 'App', 1640813269, 2),
(23, '2022-01-06-131247', 'App\\Database\\Migrations\\Profilppid', 'default', 'App', 1641475865, 3),
(27, '2022-01-06-132502', 'App\\Database\\Migrations\\InformasiLevel1', 'default', 'App', 1641476000, 5),
(25, '2022-01-06-132726', 'App\\Database\\Migrations\\InformasiLevel2', 'default', 'App', 1641475866, 3),
(26, '2022-01-06-132928', 'App\\Database\\Migrations\\InformasiLevel3', 'default', 'App', 1641475927, 4),
(28, '2022-01-12-203404', 'App\\Database\\Migrations\\ProfilEppid', 'default', 'App', 1642019858, 6),
(30, '2022-01-17-044429', 'App\\Database\\Migrations\\User', 'default', 'App', 1642415614, 7),
(31, '2022-01-19-215802', 'App\\Database\\Migrations\\JenisInformasi', 'default', 'App', 1642629828, 8),
(37, '2022-01-23-133249', 'App\\Database\\Migrations\\PermohonanInformasi', 'default', 'App', 1643313587, 9),
(43, '2022-01-27-201445', 'App\\Database\\Migrations\\ProsesPermohonan', 'default', 'App', 1643549372, 10),
(44, '2022-01-31-124128', 'App\\Database\\Migrations\\JenisKeberatan', 'default', 'App', 1643633345, 11),
(46, '2022-01-31-125122', 'App\\Database\\Migrations\\Keberatan', 'default', 'App', 1643667852, 12),
(47, '2022-01-31-230712', 'App\\Database\\Migrations\\ProsesKeberatan', 'default', 'App', 1643670678, 13),
(48, '2022-02-01-235623', 'App\\Database\\Migrations\\Peraturan', 'default', 'App', 1643759895, 14),
(51, '2022-02-21-113721', 'App\\Database\\Migrations\\StandarLayanan', 'default', 'App', 1645477452, 15),
(53, '2022-02-22-083009', 'App\\Database\\Migrations\\StatistikPermohonan', 'default', 'App', 1645519093, 16),
(54, '2022-02-22-143430', 'App\\Database\\Migrations\\LaporanLayanan', 'default', 'App', 1645540602, 17),
(55, '2022-02-22-211405', 'App\\Database\\Migrations\\Prasyarat', 'default', 'App', 1645564633, 18),
(56, '2022-02-22-222335', 'App\\Database\\Migrations\\LinkTerkait', 'default', 'App', 1645568773, 19),
(57, '2022-02-22-234849', 'App\\Database\\Migrations\\LayananElektronik', 'default', 'App', 1645573884, 20),
(58, '2022-02-23-003009', 'App\\Database\\Migrations\\Admin', 'default', 'App', 1645577214, 21);

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

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id`, `tanggal_laporan`, `id_pelapor`, `hal`, `tempat_kejadian`, `waktu`, `nama_terlapor`, `isi_pengaduan`, `file`) VALUES
(24, '2023-09-03', '16', 'Jauh', 'Uahah', '2023-09-15', '018181', 'Jajajaj', 'file-pengaduan-1693652238.jpg');

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

--
-- Dumping data for table `peraturan`
--

INSERT INTO `peraturan` (`id`, `nomor_peraturan`, `tentang`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 'Undang-undang Nomor 14 Tahun 2008', 'Keterbukaan Informasi Publik', '2022-04-26 20:17:54', '2022-04-26 20:17:54', NULL),
(11, 'PERMA No. 2 Tahun 2011', 'Tata Cara Penyelesaian Sengketa Informasi Publik di Pengadilan	', '2022-04-26 20:17:54', '2022-04-26 20:17:54', NULL),
(12, 'SK KMA Nomor 1-144/KMA/SK/I/2011', 'Pedoman Pelayanan Informasi di Pengadilan', '2022-04-26 20:17:54', '2022-04-26 20:17:54', NULL),
(9, 'Undang-Undang No. 25 Tahun 2009', 'Pelayanan Publik', '2022-04-11 21:32:26', '2022-04-11 21:32:26', NULL);

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

--
-- Dumping data for table `permohonan`
--

INSERT INTO `permohonan` (`id`, `id_jenis_informasi`, `nomor_register`, `tanggal_permohonan`, `isi_permohonan`, `file_permohonan`, `email`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(20, 1, 'INF-002-2024', '2024-08-22', 'Mohon informasi putusan perkara nomor 62/PID.SUS/2024/PT DPS', NULL, 'megimegayanii@gmail.com', 'Sudah ditindaklanjuti', '2024-08-21 04:20:24', '2024-08-21 04:20:24', NULL),
(9, 2, 'INF-016-2022', '2022-05-22', 'jumlah pegawai', NULL, 'suharsana@gmail.com', 'Pengajuan keberatan', '2022-05-21 10:49:51', '2022-05-21 10:51:43', NULL),
(18, 2, 'INF-001-2022', '2024-05-13', 'informasi data pegawai', NULL, 'suharsana@gmail.com', 'Pengajuan keberatan', '2024-05-12 15:35:34', '2024-05-12 15:42:28', NULL);

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

--
-- Dumping data for table `prasyarat_others`
--

INSERT INTO `prasyarat_others` (`id`, `prasyarat`, `hubungi_kami`, `faq`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '<h4 style=\"margin-left:0px;text-align:center;\">Prasyarat</h4><p style=\"margin-left:auto;\"><br data-cke-filler=\"true\"></p><h2 style=\"margin-left:0px;\">PRASYARAT PENGGUNA</h2><p><strong>1. Umum</strong></p><p>Dengan mengakses situs ini, Anda setuju untuk terikat dengan Syarat dan Ketentuan Penggunaan, semua hukum dan peraturan, dan setuju bahwa Anda bertanggung jawab untuk mematuhi hukum dan peraturan yang berlaku. Bacalah dengan seksama Syarat dan Ketentuan Penggunaan di bawah sebelum mengakses situs ini, sehingga Anda dapat menggunakan situs situs ini dengan baik. Bila Anda tidak menyetujui prasyarat penggunaan, sebaiknya Anda tidak meneruskan ke langkah berikutnya.</p><p><strong>2. Permohonan Informasi dan Keberatan</strong></p><p>Dengan membuat akun pada situs ini, Anda dianggap telah menandatangani dokumen sebagaimana dalam Lampiran VII dan Lampiran IX SK KMA Nomor : 1-144/KMA/SK/I/2011 serta dengan dipublikasikannya jawaban dan tanggapan atas keberatan, Anda telah dianggap menanandtangani dokumen tanda terima informasi dan keberatan.</p><p><strong>3. Modifikasi Syarat dan Ketentuan</strong><br>Pengadilan Tinggi Denpasar (PT Denpasar) dapat merevisi Syarat dan Ketentuan Penggunaan untuk situs ini setiap saat tanpa pemberitahuan. Oleh sebab itu diharapkan Anda mengikuti perkembangannya secara periodik.</p><p><strong>4. Hukum</strong><br>Setiap klaim yang berkaitan dengan situs PT Denpasar ini terikat oleh hukum di Negara Republik Indonesia tanpa terkecuali.</p><p><strong>5. Revisi dan Kesalahan</strong></p><p>Materi yang muncul di situs PT Denpasar dapat memiliki kesalahan teknis, kesalahan ketik, atau fotografi. PN Negara dapat membuat perubahan materi yang terkandung di situs setiap saat tanpa adanya pemberitahuan. PT Denpasar tidak membuat komitmen apapun untuk memperbaharui materi.</p><p><strong>6. Jaminan Sajian</strong><br>Situs ini dibangun untuk kenyamanan pengunjung Internet Kami. Untuk itu Kami berusaha menyajikan seluruh informasi (teks, grafis dan seluruh atribut yang ada) dengan sebaik-baiknya. Seluruh hasitus dalam situs ini dirancang menggunakan format 1024 x 768 piksel dan gunakanlah browser Internet Explorer (versi 5.00 ke atas) untuk mendapatkan hasil yang optimal layanan. Namun Kami tidak dapat menjamin bahwa informasi yang kami sajikan dapat memenuhi keinginan seluruh pengguna situs ini.</p><p><strong>7. Copyright</strong><br>Isi keseluruhan (teks, grafis dan seluruh atribut yang ada) pada situs ini adalah karya cipta dan properti PT Denpasar yang dilindungi hukum. Segala bentuk penggunaan material yang bersifat komersial harus seizin PT Denpasar. Segala tindakan yang dengan sengaja mengakibatkan rusaknya data, program, informasi dan hal-hal yang berkaitan dengan itu, dianggap sebagai perbuatan melanggar hukum.</p><p><strong>8. Virus</strong><br>Dampak dari perkembangan teknologi informasi adalah timbulnya virus komputer baru di Internet, maka Kami memperingatkan Anda tentang bahaya yang ditimbulkan oleh virus tersebut terhadap sistem Anda. Merupakan tanggung jawab Anda untuk mendeteksi semua materi yang di-download unduh dari Internet. Kami tidak bertanggung jawab terhadap segala bahaya atau kerusakan yang ditimbulkan oleh virus tersebut.</p><p><strong>9. Keamanan Transmisi</strong><br>Penggunaan Internet dan e-mail tidaklah bersifat rahasia karena terdapat kemungkinan informasi yang dikirimkan kepada Kami terbaca atau digunakan oleh pihak lain. Untuk melindungi rahasia Anda, sebaiknya e-mail yang dikirimkan tidak berisi informasi yang sensitif seperti nilai rekening, laporan keuangan, dsb.</p><p><strong>10. Link ke Situs Lain</strong><br>Situs ini menyediakan beberapa link untuk memudahkan Anda melihat informasi yang berhubungan dengan situs-situs lain. Kami tidak melakukan pemeliharaan dan kontrol terhadap para organisasi pemilik situs atau para organisasi penyedia informasi tersebut. Oleh karena itu informasi yang tersaji tersebut berada di luar tanggung jawab kami.</p><p><strong>11. E-mail</strong><br>E-mail merupakan alat komunikasi yang penting bagi pengunjung situs Kami. Kami menggunakan e-mail semata-mata untuk tujuan korespondensi dan komunikasi dengan Anda. Kami menggunakan alamat e-mail Anda untuk mengirimkan informasi tentang produk maupun pelayanan yang mungkin menarik bagi Anda. Apabila Anda tidak ingin melakukan kontak dengan kami, silahkan kirimkan ketidakinginan Anda pada Kami.</p><p><strong>12. Terminasi Akses</strong><br>Kami berhak untuk menghentikan akses terhadap situs ini dengan memproteksi password terhadap penyalahgunaan situs ini.</p><p><strong>13. Umpan Balik</strong><br>Untuk menghindari segala kesalahpahaman, Kami menghargai segala masukan yang diberikan ataupun yang Anda kirimkan kepada Kami, baik ide, saran, usulan, dsb; akan menjadi milik Kami tanpa diberikan kompensasi dan tidak ada klaim untuk hal tersebut.</p>', '<h4 style=\"margin-left:0px;text-align:center;\">Hubungi Kami</h4><p style=\"margin-left:auto;\"><br data-cke-filler=\"true\"></p><p style=\"text-align:center;\"><strong>&nbsp;PPID PENGADILAN TINGGI DENPASAR</strong></p><p style=\"text-align:center;\"><strong>&nbsp;Meja Informasi&nbsp;</strong><br><strong>&nbsp;Pengadilan Tinggi Denpasar</strong><br><strong>&nbsp;Jl. Tantular Barat No.1, Denpasar, Bali</strong><br><strong>&nbsp;T. (0361) 222952</strong><br><strong>&nbsp;F. (0361) 225761</strong><br><strong>&nbsp; e-mail:&nbsp;</strong><a href=\"mailto:pn_negara@yahoo.co.id\"><strong>pt-denpasar@gmail.com</strong></a><br><a href=\"https://pn-negara.go.id\" class=\"ck-link_selected\"><strong>&nbsp;<u>https://pt-denpasar.go.id</u></strong></a></p>', '<h4 style=\"margin-left:0px;text-align:center;\">FAQ</h4><p style=\"margin-left:auto;\"><br data-cke-filler=\"true\"></p><ol><li><strong>Siapa yang dapat mengajukan permohonan informasi publik?</strong><br>Setiap warga negara Indonesia dan/atau badan hukum Indonesia sebagaimana diatur dalam Undang-Undang Republik Indonesia Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik.</li><li><strong>Apakah persyaratan mengajukan permohonan informasi publik dan keberatan?</strong><br>Menginputkan NIK yang sah dan berlaku.</li><li><strong>Bagaimana cara mendaftar sebagai pengguna layanan informasi publik PN Negara?</strong><ol style=\"list-style-type:lower-alpha;\"><li>Melakukan registrasi terlebih dahulu pada aplikasi web<a href=\"https://eppid.pn-negara.go.id/\"> <strong>epelita.pt-denpasar.go.id</strong> </a>melalui tombol login kemudian klik daftar</li><li>Melengkapi kolom yang telah disediakan.</li></ol></li><li><strong>Bagaimana cara mengajukan permohonan informasi publik?</strong><ol style=\"list-style-type:lower-alpha;\"><li>Permohonan informasi dapat diajukan melalui aplikasi web <a href=\"https://eppid.pn-negara.go.id/\"><strong>eppid.pn-negara.go.id</strong></a> melalui menu&nbsp;Permohonan, sub-menu&nbsp;Permohonan Informasi;</li><li>Melengkapi kolom yang telah disediakan dan melampirkan dokumen pendukung apabila ada;</li><li>Apabila data permohonan informasi sudah lengkap,&nbsp;pengguna&nbsp;akan menerima&nbsp;email&nbsp;konfirmasi dari PPID, bahwa permohonan informasi sudah&nbsp;diterima dan sedang diproses.</li></ol></li><li><strong>Bagaimana mekanisme pemberian tanggapan PPID atas permohonan informasi publik?</strong><br>Tanggapan atas permohonan informasi publik akan langsung dijawab melalui aplikasi dan Anda telah dianggap menandatangani surat penerimaan informasi.</li><li><strong>Berapa lama pemberian tanggapan PPID atas permohonan informasi publik?</strong><br>Tanggapan dari PPID berupa Pemberitahuan Tertulis akan disampaikan paling lambat 6 (enam) hari kerja sejak permohonan informasi telah memenuhi persyaratan dan dapat diperpanjang 7 (tujuh) hari kerja berikutnya.</li><li><strong>Bagaimana cara pengajuan keberatan atas informasi publik PN Negara?</strong><ol style=\"list-style-type:lower-alpha;\"><li>Keberatan dapat diajukan melalui aplikasi web<strong> </strong><a href=\"https://eppid.pn-negara.go.id/\"><strong>eppid.pn-negara.go.id</strong></a> melalui tombol aksi keberatan dalam daftar permohonan informasi</li><li>Melengkapi kolom yang telah disediakan;</li><li>Melampirkan dokumen pendukung apabila ada.</li></ol></li><li><strong>Berapa biaya untuk memperoleh informasi publik?</strong><br>PPID PN Negara tidak mengenakan biaya terhadap perolehan informasi.</li><li><strong>Waktu layanan informasi:</strong><br>Layanan informasi publik dilaksanakan pada setiap hari kerja Senin s.d. Kamis dari pukul 08.00 WIB â€“ 16.30 WITA dan hari kerja Jum\'at dari pukul 07.30 WIB s.d. 16.30 WITA.</li></ol>', '2022-02-22 09:10:40', '2022-05-02 03:10:07', NULL);

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

--
-- Dumping data for table `profil_ppid`
--

INSERT INTO `profil_ppid` (`id`, `profil`, `tupoksi`, `struktur`, `visimisi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, '<h3 style=\"margin-left:0px;text-align:center;\"><strong>PROFIL SINGKAT PPID</strong></h3><h3 style=\"margin-left:0px;text-align:center;\"><strong>PENGADILAN TINGGI DENPASAR</strong></h3><p style=\"margin-left:0px;text-align:justify;\">Pengadilan Tinggi Denpasar berkomitmen untuk memberikan layanan kepada masyarakat guna memenuhi kebutuhan informasi publik. Hal ini ditunjukkan dengan adanya unit yang memiliki meja layanan informasi yang menjadi satu dengan meja PTSP.</p><p style=\"margin-left:0px;text-align:justify;\">Setelah itu, terbitlah <a href=\"https://eppid.mahkamahagung.go.id/files/shares/144-KMA-SK-VIII-2007.pdf\"><span style=\"color:rgb(0,0,255);\"><u>SK KMA nomor 144/KMA/SK/VIII/2007</u></span></a> tentang Keterbukaan Informasi di Pengadilan sebagai pedoman pelayanan informasi di Mahkamah Agung dan pengadilan. Di tahun 2007 ini, belum dikenal istilah PPID (Pejabat Pengelola Informasi dan Dokumentasi) dan Atasan PPID melainkan Petugas Informasi dan Dokumentasi dan Penanggung Jawab. Di dalam <a href=\"https://eppid.mahkamahagung.go.id/files/shares/144-KMA-SK-VIII-2007.pdf\">SK KMA 144 tahun 2007</a> ini dijelaskan mengenai informasi yang harus diumumkan pengadilan, tata cara pengumumannya, informasi yang dapat diakses publik, dan tata cara mendapatkan informasi tersebut, biaya, prosedur keberatan, dan pemanfaatan informasi.</p><p>Kemudian, terbitlah <a href=\"https://eppid.mahkamahagung.go.id/files/shares/UU%2014%20Tahun%202008%20tentang%20Keterbukaan%20Informasi%20Publik.pdf\"><span style=\"color:rgb(0,0,255);\"><u>Undang-Undang Nomor 14 Tahun 2008</u></span></a> tentang Keterbukaan Informasi Publik (UU KIP) yang disahkan pada bulan April 2008 dan kemudian mulai berlaku pada bulan April 2010. UU tersebut menggunakan istilah-istilah yang sedikit berbeda dengan yang digunakan pada <a href=\"https://eppid.mahkamahagung.go.id/files/shares/144-KMA-SK-VIII-2007.pdf\">SK KMA 144 tahun 2007</a>, sehingga Mahkamah Agung menindaklanjuti dengan menerbitkan <a href=\"https://eppid.mahkamahagung.go.id/files/shares/SK_KMA_1-144+(TERBARU+2011).pdf\"><span style=\"color:rgb(0,0,255);\"><u>SK KMA nomor 1-144/KMA/SK/I/2011</u></span></a> tentang Pedoman Pelayanan Informasi di Pengadilan.</p><p style=\"margin-left:0px;text-align:justify;\"><a href=\"https://eppid.mahkamahagung.go.id/files/shares/SK_KMA_1-144+(TERBARU+2011).pdf\"><span style=\"color:rgb(0,0,255);\"><u>SK KMA 1-144 tahun 2011</u></span></a> menambahkan beberapa detil yang belum diatur pada <a href=\"https://eppid.mahkamahagung.go.id/files/shares/144-KMA-SK-VIII-2007.pdf\">SK KMA 144 tahun 2007</a>, di antaranya informasi yang dikecualikan, prosedur pengaburan informasi yang disertai dengan contoh, dan formulir-formulir terkait pelayanan informasi. Selain itu, pelaksana pelayanan informasi menjadi empat, yaitu atasan PPID, PPID, penanggung jawab informasi, dan petugas informasi.</p><p style=\"margin-left:0px;text-align:justify;\">Pada tahun 2022, Pengadilan Tinggi Denpasar mengembangkan sistem permohonan informasi secara elektronik pada situs web <a href=\"http://epelita.pt-denpasar.go.id\"><span style=\"color:rgb(0,0,255);\">epelita.pt-denpasar.go.id</span></a> yang terkoneksi dengan jaringan internet. Dengan fasilitas tersebut, pemohon informasi dapat mengajukan permohonan informasi atau keberatan dengan cepat, tanpa perlu menyampaikan surat ataupun datang ke meja layanan informasi. Situs tersebut juga dilengkapi dengan informasi mengenai pengelolaan keterbukaan informasi publik di Pengadilan &nbsp;Pengadilan Tinggi Denpasar</p><p><br data-cke-filler=\"true\"></p>', '<h3 style=\"text-align:center;\">TUGAS DAN FUNGSI PPID&nbsp;</h3><h3 style=\"text-align:center;\">PENGADILAN TINGGI DENPASAR</h3><p style=\"text-align:center;\"><br data-cke-filler=\"true\"></p><ol><li>Mengkoordinasikan penyimpanan dan pendokumentasian seluruh informasi yang berada di unit/satuan kerjanya.</li><li>Mengkoordinasikan pengumpulan seluruh informasi secara fisik dari setiap bagian yang meliputi:<ol style=\"list-style-type:lower-alpha;\"><li>Informasi yang wajib disediakan dan diumumkan secara berkala;</li><li>Informasi yang wajib tersedia setiap saat; dan</li><li>Informasi terbuka lainnya yang diminta Pemohon Informasi Publik.</li></ol></li><li>Mengkoordinasikan pendataan informasi yang dikuasai setiap unit/satuan kerja di bawahnya dalam rangka pembuatan dan pemutakhiran Daftar Informasi Publik sekurang-kurangnya 1 (satu) kali dalam sebulan.</li><li>Mengkoordinasikan pengumuman informasi yang wajib diumumkan secara berkala melalui media yang efektif.</li><li>Mengkoordinasikan pemberian informasi yang dapat diakses oleh publik dengan Petugas Informasi.</li><li>Melakukan pengujian tentang konsekuensi yang timbul sebagaimana diatur dalam Pasal 19 Undang-Undang Keterbukaan Informasi Publik sebelum menyatakan informasi publik tertentu dikecualikan.</li><li>Menyertakan alasan tertulis pengecualian informasi secara jelas dan tegas, dalam hal permohonan informasi ditolak.</li><li>Mengkoordinasikan penghitaman atau pengaburan informasi yang dikecualikan beserta alasannya kepada Petugas Informasi.</li><li>Mengembangkan kapasitas pejabat fungsional dan/atau petugas informasi dalam rangka peningkatan kualitas layanan informasi.</li><li>Mengkoordinasikan dan memastikan agar pengajuan keberatan diproses berdasarkan prosedur yang berlaku.</li><li>PPID bertanggung jawab kepada atasan PPID dalam melaksanakan tugas, tanggungjawab, dan wewenangnya.</li></ol>', '<h3 style=\"margin-left:0px;text-align:center;\"><strong>STRUKTUR ORGANISASI PPID</strong></h3><h3 style=\"margin-left:0px;text-align:center;\"><strong>PENGADILAN TINGGI DENPASAR</strong></h3><p style=\"margin-left:0px;text-align:center;\"><br data-cke-filler=\"true\"></p><figure class=\"image ck-widget image_resized ck-widget_with-resizer\" contenteditable=\"false\" style=\"width:50.4%;\"><img src=\"https://eppid.pn-negara.go.id/img/ckeditor/1650169280_6d4d3e02c3cb8ab1e83a.jpg\"><div class=\"ck ck-reset_all ck-widget__type-around\"><div class=\"ck ck-widget__type-around__button ck-widget__type-around__button_before\" title=\"Insert paragraph before block\"><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 10 8\"><path d=\"M9.055.263v3.972h-6.77M1 4.216l2-2.038m-2 2 2 2.038\"></path></svg></div><div class=\"ck ck-widget__type-around__button ck-widget__type-around__button_after\" title=\"Insert paragraph after block\"><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 10 8\"><path d=\"M9.055.263v3.972h-6.77M1 4.216l2-2.038m-2 2 2 2.038\"></path></svg></div><div class=\"ck ck-widget__type-around__fake-caret\"></div></div><div class=\"ck ck-reset_all ck-widget__resizer\" style=\"display: none;\"><div class=\"ck-widget__resizer__handle ck-widget__resizer__handle-top-left\"></div><div class=\"ck-widget__resizer__handle ck-widget__resizer__handle-top-right\"></div><div class=\"ck-widget__resizer__handle ck-widget__resizer__handle-bottom-right\"></div><div class=\"ck-widget__resizer__handle ck-widget__resizer__handle-bottom-left\"></div><div class=\"ck ck-size-view\" style=\"display: none;\"></div></div></figure><p style=\"margin-left:0px;\"><br data-cke-filler=\"true\"></p><p style=\"margin-left:0px;\">Sesuai SK KMA nomor 1-144/KMA/SK/I/2011 ditetapkan:</p><p>Struktur Organisasi PPID pada Pengadilan &nbsp;Pengadilan Tinggi Denpasarsebagai berikut:</p><ol style=\"list-style-type:lower-alpha;\"><li>Atasan PPID dijabat oleh Ketua &nbsp;Pengadilan Tinggi Denpasar;</li><li>PPID dijabat oleh Panitera dan Sekretaris;</li><li>Petugas Informasi dijabat oleh Petugas PTSP Hukum dan Petugas PTSP Umum; dan</li><li>Penanggungjawab Informasi dijabat oleh Panitera Muda dan Kepala Sub Bagian Pengadilan &nbsp;Pengadilan Tinggi Denpasar.</li></ol><p><br data-cke-filler=\"true\"></p>', '<h3 style=\"margin-left:0px;text-align:center;\"><strong>VISI DAN MISI PPID</strong></h3><h3 style=\"margin-left:0px;text-align:center;\"><strong>PENGADILAN TINGGI DENPASAR</strong></h3><h4 style=\"margin-left:0px;text-align:center;\"><br data-cke-filler=\"true\"></h4><h4 style=\"margin-left:0px;\"><strong>Visi:</strong></h4><p style=\"margin-left:0px;\">Terwujudnya keterbukaan informasi publik secara modern menuju &nbsp; Pengadilan Tinggi Denpasar yang Agung</p><h4 style=\"margin-left:0px;\"><strong>Misi:</strong></h4><ol style=\"list-style-type:lower-roman;\"><li>Menyediakan informasi publik yang akurat dan dapat dipertanggungjawabkan</li><li>Memberikan layanan informasi publik yang cepat, tepat, dan sederhana</li><li>Memastikan pengelolaan layanan informasi publik didukung oleh sumber daya manusia yang profesional dan berintegritas</li><li>Memanfaatkan teknologi informasi dan komunikasi yang mutakhir untuk mendukung pengelolaan keterbukaan informasi publik</li></ol>', '2022-01-12 19:56:32', '2022-05-21 18:14:04', NULL),
(5, '<h3 style=\"margin-left:0px;text-align:center;\"><strong>PROFIL SINGKAT PPID</strong></h3><h3 style=\"margin-left:0px;text-align:center;\"><strong>MAHKAMAH AGUNG RI</strong></h3><p style=\"margin-left:0px;text-align:justify;\">Mahkamah Agung berkomitmen untuk memberikan layanan kepada masyarakat guna memenuhi kebutuhan informasi publik. Hal ini ditunjukkan dengan adanya unit yang memiliki fungsi layanan informasi, yaitu Subbagian Data dan Layanan Informasi pada Bagian Perpustakaan dan Layanan Informasi Biro Hukum dan Hubungan Masyarakat sejak tahun 2006 dengan terbitnya <a href=\"https://eppid.mahkamahagung.go.id/files/shares/MA_SEK_07_SK_III_2006_opt.pdf\"><span style=\"color:rgb(0,0,255);\"><u>SK SEKMA nomor MA/SEK/07/SK/III/2006</u></span></a>.</p><p style=\"margin-left:0px;text-align:justify;\">Setelah itu, terbitlah <a href=\"https://eppid.mahkamahagung.go.id/files/shares/144-KMA-SK-VIII-2007.pdf\"><span style=\"color:rgb(0,0,255);\"><u>SK KMA nomor 144/KMA/SK/VIII/2007</u></span></a> tentang Keterbukaan Informasi di Pengadilan sebagai pedoman pelayanan informasi di Mahkamah Agung dan pengadilan. Di tahun 2007 ini, belum dikenal istilah PPID (Pejabat Pengelola Informasi dan Dokumentasi) dan Atasan PPID melainkan Petugas Informasi dan Dokumentasi dan Penanggung Jawab. Di dalam <a href=\"https://eppid.mahkamahagung.go.id/files/shares/144-KMA-SK-VIII-2007.pdf\">SK KMA 144 tahun 2007</a> ini dijelaskan mengenai informasi yang harus diumumkan pengadilan, tata cara pengumumannya, informasi yang dapat diakses publik, dan tata cara mendapatkan informasi tersebut, biaya, prosedur keberatan, dan pemanfaatan informasi.</p><p>Kemudian, terbitlah <a href=\"https://eppid.mahkamahagung.go.id/files/shares/UU%2014%20Tahun%202008%20tentang%20Keterbukaan%20Informasi%20Publik.pdf\"><span style=\"color:rgb(0,0,255);\"><u>Undang-Undang Nomor 14 Tahun 2008</u></span></a> tentang Keterbukaan Informasi Publik (UU KIP) yang disahkan pada bulan April 2008 dan kemudian mulai berlaku pada bulan April 2010. UU tersebut menggunakan istilah-istilah yang sedikit berbeda dengan yang digunakan pada <a href=\"https://eppid.mahkamahagung.go.id/files/shares/144-KMA-SK-VIII-2007.pdf\">SK KMA 144 tahun 2007</a>, sehingga Mahkamah Agung menindaklanjuti dengan menerbitkan <a href=\"https://eppid.mahkamahagung.go.id/files/shares/SK_KMA_1-144+(TERBARU+2011).pdf\"><span style=\"color:rgb(0,0,255);\"><u>SK KMA nomor 1-144/KMA/SK/I/2011</u></span></a> tentang Pedoman Pelayanan Informasi di Pengadilan.</p><p style=\"margin-left:0px;text-align:justify;\"><a href=\"https://eppid.mahkamahagung.go.id/files/shares/SK_KMA_1-144+(TERBARU+2011).pdf\"><span style=\"color:rgb(0,0,255);\"><u>SK KMA 1-144 tahun 2011</u></span></a> menambahkan beberapa detil yang belum diatur pada <a href=\"https://eppid.mahkamahagung.go.id/files/shares/144-KMA-SK-VIII-2007.pdf\">SK KMA 144 tahun 2007</a>, di antaranya informasi yang dikecualikan, prosedur pengaburan informasi yang disertai dengan contoh, dan formulir-formulir terkait pelayanan informasi. Selain itu, pelaksana pelayanan informasi menjadi empat, yaitu atasan PPID, PPID, penanggung jawab informasi, dan petugas informasi.</p><p style=\"margin-left:0px;text-align:justify;\">Pada tahun 2021, Mahkamah Agung mengembangkan sistem informasi layanan <i>online</i> pemohon informasi pada situs web <a href=\"https://eppid.mahkamahagung.go.id/adminkitasemua/eppid.mahkamahagung.go.id\"><span style=\"color:rgb(0,0,255);\">eppid.mahkamahagung.go.id</span></a> yang terkoneksi dengan jaringan internet serta aplikasi <i>back office</i> Sistem Informasi EPPID (SI EPPID) bagi administrator PPID yang juga terkoneksi dengan jaringan intranet. Dengan fasilitas tersebut, pemohon informasi dapat mengajukan permohonan informasi atau keberatan dengan cepat, tanpa perlu menyampaikan surat ataupun datang ke ruang layanan informasi. Situs tersebut juga dilengkapi dengan informasi mengenai pengelolaan keterbukaan informasi publik di lingkungan Mahkamah Agung.</p><p><br data-cke-filler=\"true\"></p>', '<p>Masyarakat belum tahu</p>', '<h3 style=\"margin-left:0px;text-align:center;\"><strong>STRUKTUR ORGANISASI PPID</strong></h3><p style=\"margin-left:0px;\">Sesuai SK KMA nomor 1-144/KMA/SK/I/2011 ditetapkan:</p><ol style=\"list-style-type:upper-alpha;\"><li>Pelaksana pada Pengadilan Tingkat Pertama dan Banding<ol><li>Pada Peradilan Umum dan Tata Usaha Negara, pelaksana pelayanan informasi dilakukan oleh pejabat sebagai berikut:<ol style=\"list-style-type:lower-alpha;\"><li>Atasan PPID dijabat oleh Pimpinan Pengadilan;</li><li>PPID dijabat oleh Panitera/Sekretaris;</li><li>Petugas Informasi dijabat oleh Panitera Muda Hukum atau pegawai lain yang ditunjuk Ketua Pengadilan; dan</li><li>Penanggungjawab Informasi dijabat oleh Pimpinan unit kerja setingkat eselon IV.</li></ol></li><li>Pada Peradilan Agama dan Militer, pelaksana pelayanan informasi dilakukan oleh Pejabat sebagai berikut:<ol style=\"list-style-type:lower-alpha;\"><li>Atasan PPID dijabat oleh Pimpinan Pengadilan;</li><li>PPID dijabat oleh:<ol style=\"list-style-type:lower-roman;\"><li>Panitera atau Kepala Panitera, mengenai informasi yang berkaitan dengan perkara; dan</li><li>Sekretaris atau Kepala Tata Usaha Dalam, mengenai informasi yang berkaitan dengan pengelolaan organisasi;</li></ol></li><li>Petugas informasi dijabat oleh Panitera Muda Hukum atau pegawai lain yang ditunjuk Ketua Pengadilan; dan</li><li>Penanggungjawab Informasi dijabat oleh Pimpinan unit kerja setingkat eselon IV.</li></ol></li></ol></li><li>Pelaksana pada Mahkamah Agung<ol><li>Atasan PPID dijabat oleh:<ol style=\"list-style-type:lower-alpha;\"><li>Panitera, mengenai informasi yang berkaitan dengan perkara; dan</li><li>Sekretaris, mengenai informasi yang berkaitan dengan organisasi.</li></ol></li><li>PPID di lingkungan Mahkamah Agung dijabat oleh Kepala Biro Hukum dan Hubungan Masyarakat.</li><li>PPID di masing-masing satuan kerja Mahkamah Agung adalah:<ol style=\"list-style-type:lower-alpha;\"><li>Direktur Jenderal Badan Peradilan Umum;</li><li>Direktur Jenderal Badan Peradilan Agama;</li><li>Direktur Jenderal Badan Peradilan Militer dan Tata Usaha Negara;</li><li>Kepala Badan Urusan Administrasi;</li><li>Kepala Badan Penelitian dan Pengembangan Hukum dan Peradilan; dan</li><li>Kepala Badan Pengawasan.</li></ol></li><li>Petugas Informasi di lingkungan Mahkamah Agung dan Badan Urusan Administrasi adalah Kepala Subbagian Data &amp; Pelayanan Informasi.</li><li>Petugas Informasi di masing-masing Direktorat Jenderal Badan Peradilan dan Badan Pengawasan adalah Kepala Subbagian Dokumentasi dan Informasi.</li><li>Petugas Informasi di Badan Penelitian, Pengembangan, Pendidikan dan Pelatihan Hukum dan Peradilan adalah Kepala Subbagian Tata Usaha.</li><li>Penanggungjawab Informasi di lingkungan Mahkamah Agung dan satuan kerja Mahkamah Agung dijabat oleh Pimpinan unit kerja setingkat eselon IV.</li></ol></li></ol>', '<h3 style=\"margin-left:0px;text-align:center;\"><strong>VISI DAN MISI PPID</strong></h3><h4 style=\"margin-left:0px;\"><strong>Visi:</strong></h4><p style=\"margin-left:0px;\">Terwujudnya keterbukaan informasi publik secara modern menuju peradilan yang agung</p><h4 style=\"margin-left:0px;\"><strong>Misi:</strong></h4><ol style=\"list-style-type:lower-roman;\"><li>Menyediakan informasi publik yang akurat dan dapat dipertanggungjawabkan</li><li>Memberikan layanan informasi publik yang cepat, tepat, dan sederhana</li><li>Memastikan pengelolaan layanan informasi publik didukung oleh sumber daya manusia yang profesional dan berintegritas</li><li>Memanfaatkan teknologi informasi dan komunikasi yang mutakhir untuk mendukung pengelolaan keterbukaan informasi publik</li></ol>', '2022-01-12 19:56:34', '2022-01-12 19:56:34', NULL);

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

--
-- Dumping data for table `profil_satker`
--

INSERT INTO `profil_satker` (`id`, `nama`, `nama_pendek`, `alamat`, `nomor_telepon`, `nomor_whatsapp`, `telegram`, `nomor_fax`, `email`, `link_satker`, `link_youtube`, `link_facebook`, `link_instagram`, `link_twitter`, `link_video_dashboard`, `logo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Pengadilan Tinggi Denpasar', 'PT DENPASAR', 'Jl. Tantular Barat No. 1, Denpasar, Bali', '(0365) 222952', '082266562619', '-', '(0361) 225761', 'pt-denpasar@gmail.com', 'http://www.pt-denpasar.go.id', 'https://www.youtube.com/channel/UCyD64kIY6a2Rcl2KE', 'https://web.facebook.com/pengadilantinggi.denpasar', 'https://www.instagram.com/pengadilantinggidenpasar', '', '0Akcjvjgaw4', 'logo-pn.jpg', NULL, '2022-05-23 11:48:00', NULL);

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

--
-- Dumping data for table `proses_keberatan`
--

INSERT INTO `proses_keberatan` (`id`, `keberatan_id`, `status`, `tanggapan`, `lampiran_tanggapan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 17, 'Menerima', 'diterima', NULL, NULL, NULL, NULL),
(11, 18, 'Menerima', 'diterima', NULL, NULL, NULL, NULL);

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

--
-- Dumping data for table `proses_pengaduan`
--

INSERT INTO `proses_pengaduan` (`id`, `id_pengaduan`, `proses`, `status`, `tanggapan`, `file_tanggapan`) VALUES
(24, 24, NULL, 'Proses verifikasi', NULL, NULL);

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

--
-- Dumping data for table `proses_permohonan`
--

INSERT INTO `proses_permohonan` (`id`, `permohonan_id`, `proses`, `status_jawaban`, `jenis_penolakan`, `jawaban`, `lampiran_jawaban`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 18, 'Y', 'Sepenuhnya', NULL, 'dipenuhi', NULL, NULL, NULL, NULL),
(6, 20, 'Y', 'Sepenuhnya', NULL, '                   Perkara tersebut sudah diputus oleh Majelis Hakim PT Denpasar pada tanggal 20 Agustus 2024, dengan amar putusan : \r\n1. Menerima permintaan banding dari Penuntut Umum ;\r\n2. Menguatkan putusan Pengadilan Negeri Negara Nomor 46/Pid.Sus/2024/PN Nga tanggal 9 Juli 2024 yang dimintakan banding tersebut;\r\n3. Menetapkan lamanya Terdakwa ditahan dikurangkan seluruhnya dari pidana yang dijatuhkan;\r\n4. Memerintahkan agar Terdakwa tetap berada dalam tahanan;\r\n5. Membebankan biaya perkara kepada Terdakwa dalam kedua tingkat peradilan yang dalam tingkat banding ditetapkan sejumlah Rp5.000,00 ( lima ribu rupiah )   \r\n\r\nUntuk salinan putusan lengkapnya dapat dimohonkan ke Pengadilan Negeri Tingkat Perkara dimana Perkara tersebut didaftarkan dalam perkara ini yaitu PN Negara', NULL, NULL, NULL, NULL);

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

--
-- Dumping data for table `standar_layanan`
--

INSERT INTO `standar_layanan` (`id`, `maklumat`, `prosedur`, `keberatan`, `sengketa`, `jalur`, `biaya`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'maklumat-1653194921.jpg', 'prosedur-1645484004.jpg', 'keberatan-1645482739.png', 'sengketa-1645482739.jpg', 'jalur-1653204035.jpg', 'biaya-1653204601.jpg', '2022-02-21 09:32:19', '2022-05-21 19:30:01', NULL);

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

--
-- Dumping data for table `statistik_permohonan`
--

INSERT INTO `statistik_permohonan` (`id`, `tahun`, `statistik`, `rekapitulasi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, '2021', 'statistik-1645537666.png', 'rekapitulasi-1645537666.jpg', '2022-02-22 00:47:46', '2022-02-22 00:47:46', NULL),
(6, '2020', 'statistik-1645537892.png', 'rekapitulasi-1645537892.png', '2022-02-22 00:51:32', '2022-02-22 00:51:32', NULL);

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

--
-- Dumping data for table `user_pengaduan`
--

INSERT INTO `user_pengaduan` (`id`, `nama`, `alamat`, `email`, `nomor_hp`, `ktp`, `password`, `foto_profil`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Onsdee', 'Negara', 'onsdee86@gmail.com', '0819999', 'ktp-1651454100.png', '$2y$10$5Aj0kgT6s12dSFjgGDOpp.BboQO.BJG5oXhfk7LB63hDruEMTSIi6', 'no-profil.jpg', NULL, NULL, NULL),
(8, 'Oka', 'Mendoyo', 'okawinza@gmail.com', '081777', 'ktp-1651450307.jpg', '$2y$10$3o8NjpJNW9lFXDP5ZUf76eL3wAn8PX/UGMsMRRvxHwJ6jLI3tWk2W', 'no-profil.jpg', NULL, NULL, NULL),
(12, 'angga', 'Jl.Tukad Badung No1', 'angga@gmail.com', '08199923222', 'ktp-1678686977.jpg', '$2y$10$DYgrxfW9HcFWW7pDSlmZKOtTTt0rhJALgxVCUsqFFodAM.JB9Jokm', 'no-profil.jpg', NULL, NULL, NULL),
(13, 'Nita', 'Tabanan', 'candranita37@yahoo.com', '082146285613', 'ktp-1679047102.jpeg', '$2y$10$2XcfaqDKq0javNM0W77bBeI0Vt3edY39pav9O2PXp0.0M6N8i.WhK', 'no-profil.jpg', NULL, NULL, NULL),
(11, 'agus', 'denpasar', 'suharsana@gmail.com', '0188181818', 'ktp-1653173849.pdf', '$2y$10$3arzpzPT2ua5AX/XELNL0.MQph5yH54PYwQN0q127pw.XpoYLifrq', 'no-profil.jpg', NULL, NULL, NULL),
(14, 'nita', 'Jl raya uluwatu', 'nonikpurniadewi@gmail.com', '082146285613', 'ktp-1684461465.jpg', '$2y$10$k6CQUPicCm3FNm4fu4szK.IsNoOBPqUw/rGUfSvE6obBixXbLFeMS', 'no-profil.jpg', NULL, NULL, NULL),
(15, 'Oke main', 'Jsjjsj', 'hackersid366@gmail.com', '9191919919', 'ktp-1693157866.png', '$2y$10$uQXaXsq2kILrskDVNcWqkerGHMJTmjDzLNgpuUgbi1pbLBP/8KEGC', 'no-profil.jpg', NULL, NULL, NULL),
(16, 'Super admin', 'Jauh', 'Admin@mailto.plus', '018181818', 'ktp-1693652152.jpg', '$2y$10$HK7eaf0vAELhCpXGVI60wOgGoxKT1UIXn3DyXZLinyRWdOlXlL4G6', 'no-profil.jpg', NULL, NULL, NULL),
(17, 'tes', 'tes', 'oka@gmail.com', '081', 'ktp-tes.pdf', '$2y$10$CZ3lebY39vNvjmurLqrVn.g4/GYNyIuV4rYTeNc1ZNEEun5SrKO4O', 'no-profil.jpg', NULL, NULL, NULL),
(18, 'megi', 'Jalan Jepun Pipil V No. A2', 'megimegayanii@gmail.com', '085792634915', 'ktp-megi.pdf', '$2y$10$tzyRlD6fsMz0uk1uqe4xzOgMl2m4tRv499KOW5kefZitYSVuyoDka', 'no-profil.jpg', NULL, NULL, NULL),
(19, 'siganns1337', 'siganns1337', 'cherlinemerline@gmail.com', '08195324324', 'ktp-siganns1337.png', '$2y$10$D1KpLF5O0i69fDWwqDLAGePNCLsnbQm12dt8X6mrFoVM7gG3Q/IRy', 'no-profil.jpg', NULL, NULL, NULL);

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

--
-- Dumping data for table `user_profil`
--

INSERT INTO `user_profil` (`id`, `nik`, `nama`, `email`, `nomor_telepon`, `alamat`, `ktp`, `pekerjaan`, `institusi`, `password`, `foto_profil`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, '1321321321321', 'agus', 'suharsana@gmail.com', '0818181818', 'denpasar', 'ktp-1658277371.pdf', '-', '-', '$2y$10$M240ihTgIJ/VZ6Lr.kGOeu6rF1/lsaMWTgZjVfEx.g6AmVQz6kUMC', 'no-profil.jpg', NULL, NULL, NULL),
(11, '3231323123232', 'sfdsfdf', 'kangpepes@protonmail.com', '08796856757', 'dfgergertg', 'ktp-1664047930.jpg', 'sdfsfsdf', 'dsfdsfds', '$2y$10$jFa/ZLD1DhuDboSOWI4u3eDudbV37hH4uwDy91fc9ATp6kWkEqZam', 'no-profil.jpg', NULL, NULL, NULL),
(12, '5171011103740007', 'angga', 'angga@gmail.com', '081899191919', 'Jl. Tukad Badung No 1', 'ktp-1678687309.jpg', 'Swasta', '', '$2y$10$UFB8IS.9zp7cH7GSoOGnL.hDu/uLSIWxHvdl/EodMlAsj8BvbpXPi', 'no-profil.jpg', NULL, NULL, NULL),
(13, '3213211212010002', 'Ahmad Surani', 'badm99201@gmail.com', '089659412234', 'Perum panorama indah', 'ktp-1679737798.jpg', 'dad', 'BPJS', '$2y$10$U0KNEhlqRMUGP32x/jHTVeknUJNZOUxdCZRBVMlV6FjO8SMH12tGG', 'no-profil.jpg', NULL, NULL, NULL),
(14, '93403483940193292', 'olala', 'olalatestaja@gmail.com', '087782800811', 'awda', 'ktp-1688285782.jpg', 'olala', 'olala', '$2y$10$HFTUnIdHEM9fOIP6kNjL8e1KAeNeHrpzfTzBAPCw0j3c5jDDD1tna', 'no-profil.jpg', NULL, NULL, NULL),
(15, '12345678', 'Test', 'hav@gmail.com', '0827172727', 'Jauh', 'ktp-1691426609.jpg', 'Jauh', 'Jauh', '$2y$10$SmlQA/QhNVxzybm3xn51iOCLvaBIKA3UVzFlS7CTVZH1kCk8d2Cx.', 'no-profil.jpg', NULL, NULL, NULL),
(16, '718181818187117', 'Test', 'test@mailto.plus', '019191919191', 'Jauh', 'ktp-1693652448.jpg', 'Hes', 'Jajaja', '$2y$10$Otr59tPvjp4tgmMHzNSyEOehpI9Ix5LWLc3Tw2cpFUv8/0gBTBUNe', 'no-profil.jpg', NULL, NULL, NULL),
(17, '837373777373737738484848488', 'adikadik', 'fluxi13337@gmail.com', '0892837737373', 'Adikadik', 'ktp-1694097374.jpg', 'Djjdjddxx', 'jsjsjsjsjjss', '$2y$10$Gf0tuFSFC29Z/3oXPo00lehrfcL7flSVkhZh39gpDQNQ2LajEm9e6', 'no-profil.jpg', NULL, NULL, NULL),
(18, '5171044512020003', 'awdawd', 'alf404hexs@gmail.com', '08963466345', 'adawda', 'ktp-1695751158.png', 'awdawd', 'awdawd', '$2y$10$wQJ6n5iMNiue5TwHs2kauO2ivoimN6DyQKqjWkiS5W3eewqQbXoqG', 'no-profil.jpg', NULL, NULL, NULL),
(19, '9857847382348432', 'andri', 'jakartagg@gmail.com', '08755757574', 'ddd', 'ktp-1703037386.jpg', 'nganggur', 'jak', '$2y$10$OBMhaXpJLuKf58mUGAy78O0vj.cLmE50/022HvAI.SKU3OT/RW/9u', 'no-profil.jpg', NULL, NULL, NULL),
(20, '5101022005860002', 'ni kadek ayu ekarini ', 'onsdee86@gmail.com', '0813-3732-0205', 'Btn munduk villa 1, blok c7, desa batuagung, kecamatan jembrana, kabupaten jembrana', 'ktp-1722480070.pdf', 'Karyawan Swasta', '', '$2y$10$qL/hDeaZZcqtT82k7qquQuHqWBM/z/vIdg8..LaTq9343DAqlmXk6', 'no-profil.jpg', NULL, NULL, NULL),
(21, '5101022005860002', 'ni kadek ayu ekarini ', 'okawinza@gmail.com', '0813-3732-0205', 'Btn munduk villa 1, blok c7, desa batuagung, kecamatan jembrana, kabupaten jembrana', 'ktp-5101022005860002.pdf', 'Karyawan Swasta', '', '$2y$10$9LzaWfFXGLReeQevI9V9qOeImJ14MyiTLUIN0Lh7PTWOFKIKSSuLK', 'no-profil.jpg', NULL, NULL, NULL),
(22, '5101026801920007', 'I Gede Suparsadha, S.H.', 'super@gmail.com', '0813-3732-0205', 'Btn munduk villa 1, blok c7, desa batuagung, kecamatan jembrana, kabupaten jembrana', 'ktp-5101026801920007.pdf', 'Karyawan Swasta', '', '$2y$10$YoUR6AEVQQ51WPBsYfQIo.YUag8QLaYbKk06fK0D2uXoobaibqMGa', 'no-profil.jpg', NULL, NULL, NULL),
(23, '5107055910000001', 'Megi Megayani', 'megimegayanii@gmail.com', '085792634915', 'Jalan Jepun Pipil V No. A2, Denpasar Timur', 'ktp-5107055910000001.pdf', 'ASN', '', '$2y$10$0cPdjnYx/3fhD0dzRO6z4.NDz9pxDKZByI.9Wuas/IQZ03gMP1bdq', 'no-profil.jpg', NULL, NULL, NULL),
(24, '5123456789011', 'dina', 'dinaamandaswarip@gmail.com', '081916442869', 'denpasar', 'ktp-5123456789011.pdf', 'advokat', 'peradi', '$2y$10$8JNN7KfU0gnMaTbYsVo2W.c5RM9Ny6Dug0a2ZsFTqcfKG10khOrGa', 'no-profil.jpg', NULL, NULL, NULL),
(25, '517102406060092001', 'dina', 'dinaamds@gmail.com', '081916442869', 'biaung', 'ktp-517102406060092001.pdf', 'PNS', 'PT Denpasar', '$2y$10$VeNUOY0kYJCNKY1lx/0.beVVo.wdxNkRw2.ficuhQ/7wIFDnRdSVS', 'no-profil.jpg', NULL, NULL, NULL),
(26, '4325234324', 'siganns999', 'siganns999@gmail.com', '0819532432', 'awd', 'ktp-4325234324.jpg', 'siganns999', 'siganns999', '$2y$10$qMF0WtNWBAxEVbwzowilS.fdPpyHz1OBSME.OIWihWaZKtZsy8mVO', 'no-profil.jpg', NULL, NULL, NULL);

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
-- Dumping data for table `video_informasi`
--

INSERT INTO `video_informasi` (`id`, `uraian`, `embed_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(43, 'PELAYANAN PRIMA PELAYANAN TERPADU SATU PINTU (PTSP) PENGADILAN TINGGI DENPASAR', '50F3g1CZxzs', '2022-05-21 10:37:04', '2022-05-21 10:37:04', NULL),
(44, 'VIDEO PROFILE PEMBANGUNAN ZI MENUJU WBBM PENGADILAN TINGGI DENPASAR TAHUN 2021', 'Pmzqwywd9Aw', '2022-05-21 10:37:35', '2022-05-21 10:37:35', NULL),
(45, 'Video Profile Pengadilan Tinggi Denpasar 2021', 'JsleUW85V8', '2022-05-21 10:38:06', '2022-05-21 10:38:06', NULL),
(46, 'Pelayanan Terpadu Satu Pintu Pengadilan Tinggi Denpasar 2021', '1hF0KZ6KokY', '2022-05-21 16:52:11', '2022-05-21 16:52:11', NULL),
(47, 'Yel Yel Zona Integritas Pengadilan Tinggi Denpasar ', 'oynK0TnQ4_c', '2022-05-21 16:52:45', '2022-05-21 16:52:45', NULL),
(48, 'Program Prioritas Pengadilan Tinggi Denpasar Tahun 2022', 'LxFg18IbKxc', '2022-05-22 20:29:39', '2022-05-22 20:29:39', NULL);

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
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jenis_keberatan`
--
ALTER TABLE `jenis_keberatan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jumlah_permohonan`
--
ALTER TABLE `jumlah_permohonan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keberatan`
--
ALTER TABLE `keberatan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `laporan_layanan`
--
ALTER TABLE `laporan_layanan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `layanan_elektronik`
--
ALTER TABLE `layanan_elektronik`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `level1`
--
ALTER TABLE `level1`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `level2`
--
ALTER TABLE `level2`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `level3`
--
ALTER TABLE `level3`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `link_informasi`
--
ALTER TABLE `link_informasi`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `link_terkait`
--
ALTER TABLE `link_terkait`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `peraturan`
--
ALTER TABLE `peraturan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permohonan`
--
ALTER TABLE `permohonan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `prasyarat_others`
--
ALTER TABLE `prasyarat_others`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profil_ppid`
--
ALTER TABLE `profil_ppid`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profil_satker`
--
ALTER TABLE `profil_satker`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `proses_keberatan`
--
ALTER TABLE `proses_keberatan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `proses_pengaduan`
--
ALTER TABLE `proses_pengaduan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `proses_permohonan`
--
ALTER TABLE `proses_permohonan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `standar_layanan`
--
ALTER TABLE `standar_layanan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `statistik_permohonan`
--
ALTER TABLE `statistik_permohonan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_pengaduan`
--
ALTER TABLE `user_pengaduan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_profil`
--
ALTER TABLE `user_profil`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `video_informasi`
--
ALTER TABLE `video_informasi`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
