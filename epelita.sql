-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table eppid2.admin_auth
CREATE TABLE IF NOT EXISTS `admin_auth` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) DEFAULT NULL,
  `nip` varchar(250) DEFAULT NULL,
  `jabatan` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `foto_profil` varchar(250) NOT NULL DEFAULT 'no-profil.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid2.admin_auth: 4 rows
/*!40000 ALTER TABLE `admin_auth` DISABLE KEYS */;
INSERT INTO `admin_auth` (`id`, `nama`, `nip`, `jabatan`, `email`, `password`, `foto_profil`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(18, 'I Ketut Suharsana', '1978000', 'Penanggung Jawab Informasi', 'mejasatuperdata@gmail.com', '$2y$10$77DdY4ssiARSDhdraL5nMub4U12itZ0rDXCZQLDUDJQyhEc4ZKpNK', 'no-profil.jpg', '2022-05-02 07:20:12', '2022-05-02 07:20:12', NULL),
	(16, 'Mochamad Hatta', '196500000', 'Atasan PPID/KPT/WKPT', 'okawinza@gmail.com', '$2y$10$VaTYi8dOevH9kOoMzTlqROPJdbEop4dlRcXDFeELKZIy/jCUYpk3y', 'no-profil.jpg', '2022-05-02 07:16:58', '2022-05-02 07:16:58', NULL),
	(17, 'I Gede Kartika', '1988', 'Penanggung Jawab Informasi', 'ayucwinza@gmail.com', '$2y$10$5gXI2auACnhGNTQAu2YD8.qwvnVjQ1MFgAV7hjoXjU/mh0mrCrxFW', 'no-profil.jpg', '2022-05-02 07:18:19', '2022-05-02 07:18:19', NULL),
	(15, 'Oka', '12345678', 'admin', 'onsdee86@gmail.com', '$2y$10$GUQfuCILJhw3y8MQmr89FeUKVbVIIVF.l5ntMPQd6S44May/uu9W6', 'no-profil.jpg', NULL, NULL, NULL);
/*!40000 ALTER TABLE `admin_auth` ENABLE KEYS */;

-- Dumping structure for table eppid2.jenis_informasi
CREATE TABLE IF NOT EXISTS `jenis_informasi` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `jenis_informasi` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid2.jenis_informasi: 5 rows
/*!40000 ALTER TABLE `jenis_informasi` DISABLE KEYS */;
INSERT INTO `jenis_informasi` (`id`, `jenis_informasi`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Perkara dan Putusan', NULL, NULL, NULL),
	(2, 'Kepegawaian', NULL, NULL, NULL),
	(3, 'Pengawasan', NULL, NULL, NULL),
	(4, 'Anggaran dan Aset', NULL, NULL, NULL),
	(5, 'Lainnya', NULL, NULL, NULL);
/*!40000 ALTER TABLE `jenis_informasi` ENABLE KEYS */;

-- Dumping structure for table eppid2.jenis_keberatan
CREATE TABLE IF NOT EXISTS `jenis_keberatan` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `jenis_keberatan` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid2.jenis_keberatan: 7 rows
/*!40000 ALTER TABLE `jenis_keberatan` DISABLE KEYS */;
INSERT INTO `jenis_keberatan` (`id`, `jenis_keberatan`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Permohonan informasi ditolak', NULL, NULL, NULL),
	(2, 'Informasi berkala tidak disediakan', NULL, NULL, NULL),
	(3, 'Permintaan informasi tidak ditanggapi', NULL, NULL, NULL),
	(4, 'Permintaan informasi tidak ditanggapi sebagaimana yang diminta', NULL, NULL, NULL),
	(5, 'Permintaan informasi tidak dipenuhi', NULL, NULL, NULL),
	(6, 'Biaya yang dikenakan tidak wajar', NULL, NULL, NULL),
	(7, 'Informasi yang disampaikan melebihi jangka waktu yang ditentukan', NULL, NULL, NULL);
/*!40000 ALTER TABLE `jenis_keberatan` ENABLE KEYS */;

-- Dumping structure for table eppid2.jumlah_permohonan
CREATE TABLE IF NOT EXISTS `jumlah_permohonan` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `bulan` varchar(100) DEFAULT NULL,
  `tahun` varchar(100) DEFAULT NULL,
  `sepenuhnya` int(10) DEFAULT NULL,
  `sebagian` int(10) DEFAULT NULL,
  `ditolak` int(10) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table eppid2.jumlah_permohonan: 0 rows
/*!40000 ALTER TABLE `jumlah_permohonan` DISABLE KEYS */;
/*!40000 ALTER TABLE `jumlah_permohonan` ENABLE KEYS */;

-- Dumping structure for table eppid2.keberatan
CREATE TABLE IF NOT EXISTS `keberatan` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `permohonan_id` int(5) unsigned NOT NULL,
  `tanggal_keberatan` date DEFAULT NULL,
  `jenis_keberatan_id` int(5) unsigned NOT NULL,
  `isi_keberatan` text,
  `email` varchar(250) DEFAULT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'Proses verifikasi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid2.keberatan: 0 rows
/*!40000 ALTER TABLE `keberatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `keberatan` ENABLE KEYS */;

-- Dumping structure for table eppid2.laporan_layanan
CREATE TABLE IF NOT EXISTS `laporan_layanan` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `tahun` varchar(250) DEFAULT NULL,
  `laporan` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid2.laporan_layanan: 2 rows
/*!40000 ALTER TABLE `laporan_layanan` DISABLE KEYS */;
INSERT INTO `laporan_layanan` (`id`, `tahun`, `laporan`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(6, '2021', 'laporan-164554335.pdf', '2022-04-16 06:19:17', '2022-04-16 06:19:17', NULL),
	(5, '2022', 'laporan-1645543330.pdf', '2022-04-16 06:17:22', '2022-04-16 06:17:22', NULL);
/*!40000 ALTER TABLE `laporan_layanan` ENABLE KEYS */;

-- Dumping structure for table eppid2.layanan_elektronik
CREATE TABLE IF NOT EXISTS `layanan_elektronik` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(250) DEFAULT NULL,
  `link` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid2.layanan_elektronik: 3 rows
/*!40000 ALTER TABLE `layanan_elektronik` DISABLE KEYS */;
INSERT INTO `layanan_elektronik` (`id`, `alias`, `link`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Ecourt PN Negara', 'https://ecourt.mahkamahagung.go.id/index.php/', '2022-02-22 18:04:11', '2022-02-22 18:04:11', NULL),
	(3, 'Survei Pelayanan Elektronik', 'http://esurvey.badilum.mahkamahagung.go.id/index.php/pengadilan/099802', '2022-04-13 01:57:57', '2022-04-13 01:57:57', NULL),
	(4, 'SIWAS Mahkamah Agung RI', 'https://siwas.mahkamahagung.go.id/', '2022-04-13 02:03:31', '2022-04-13 02:03:31', NULL);
/*!40000 ALTER TABLE `layanan_elektronik` ENABLE KEYS */;

-- Dumping structure for table eppid2.level1
CREATE TABLE IF NOT EXISTS `level1` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `level1` varchar(20) DEFAULT NULL,
  `nama` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid2.level1: 3 rows
/*!40000 ALTER TABLE `level1` DISABLE KEYS */;
INSERT INTO `level1` (`id`, `level1`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(4, 'A', 'Informasi yang Wajib Diumumkan Secara Berkala oleh Pengadilan', NULL, '2022-01-11 06:27:45', NULL),
	(5, 'B', 'Informasi Wajib Diumumkan Secara Berkala oleh Mahkamah Agung', NULL, NULL, NULL),
	(6, 'C', 'Informasi yang Wajib Tersedia setiap Saat dan Dapat Diakses oleh Publik', NULL, NULL, NULL);
/*!40000 ALTER TABLE `level1` ENABLE KEYS */;

-- Dumping structure for table eppid2.level2
CREATE TABLE IF NOT EXISTS `level2` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `level1` varchar(20) DEFAULT NULL,
  `level2` varchar(20) DEFAULT NULL,
  `nama` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid2.level2: 10 rows
/*!40000 ALTER TABLE `level2` DISABLE KEYS */;
INSERT INTO `level2` (`id`, `level1`, `level2`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'A', '1', 'Informasi Profil dan Pelayanan Dasar Pengadilan', NULL, '2022-01-10 09:59:48', NULL),
	(2, 'A', '2', 'Informasi berkaitan dengan hak masyarakat', NULL, NULL, NULL),
	(3, 'A', '3', 'Informasi Program Kerja, Kegiatan, Keuangan dan Kinerja Pengadilan', NULL, NULL, NULL),
	(4, 'A', '4', 'Informasi Laporan Akses Informasi', NULL, NULL, NULL),
	(6, 'B', '1', 'Informasi Serta Merta', NULL, NULL, NULL),
	(7, 'C', '1', 'Umum', NULL, NULL, NULL),
	(8, 'C', '2', 'Informasi tentang perkara dan persidangan', NULL, NULL, NULL),
	(9, 'C', '3', 'Informasi tentang Pengawasan dan Pendispilinan', NULL, NULL, NULL),
	(10, 'C', '4', ' Informasi tentang Peraturan, Kebijakan dan Hasil Penelitian', NULL, NULL, NULL),
	(11, 'C', '5', ' Informasi tentang Organisasi, Administrasi, Kepegawaian dan Keuangan', NULL, NULL, NULL);
/*!40000 ALTER TABLE `level2` ENABLE KEYS */;

-- Dumping structure for table eppid2.level3
CREATE TABLE IF NOT EXISTS `level3` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `level1` varchar(20) DEFAULT NULL,
  `level2` varchar(20) DEFAULT NULL,
  `level3` varchar(20) DEFAULT NULL,
  `nama` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid2.level3: 24 rows
/*!40000 ALTER TABLE `level3` DISABLE KEYS */;
INSERT INTO `level3` (`id`, `level1`, `level2`, `level3`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'A', '1', '1', 'Profil Pengadilan Tinggi Denpasar', NULL, '2022-05-02 11:05:36', NULL),
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
	(30, 'A', '1', '2', 'Prosedur Alur Perkara', '2022-04-18 00:16:16', '2022-04-18 01:00:21', NULL);
/*!40000 ALTER TABLE `level3` ENABLE KEYS */;

-- Dumping structure for table eppid2.link_informasi
CREATE TABLE IF NOT EXISTS `link_informasi` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `level1` varchar(10) DEFAULT NULL,
  `level2` varchar(10) DEFAULT NULL,
  `level3` varchar(10) DEFAULT NULL,
  `level4` int(11) DEFAULT NULL,
  `uraian` text,
  `link` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid2.link_informasi: 42 rows
/*!40000 ALTER TABLE `link_informasi` DISABLE KEYS */;
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
	(66, 'A', '2', '1', 1, 'Hak-Hak Pokok Dalam Proses Persidangan', '#', NULL, NULL, NULL),
	(67, 'A', '2', '1', 2, 'Hak Pelapor dan Terlapor', 'https://www.pn-negara.go.id/page/read/221', NULL, NULL, NULL),
	(68, 'A', '2', '1', 3, 'Hak Para Pihak Yang Berhubungan dengan Peradilan', 'https://www.pn-negara.go.id/page/read/222', NULL, NULL, NULL),
	(69, 'A', '2', '1', 4, 'Hak-hak Tersangka dan Terdakwa', 'https://www.pn-negara.go.id/page/read/223', NULL, NULL, NULL),
	(70, 'A', '2', '1', 5, 'Hak Penasihat Hukum', 'pn-negara.go.id/page/read/224', NULL, NULL, NULL),
	(71, 'A', '2', '1', 6, 'Hak Pihak Ketiga', 'https://www.pn-negara.go.id/page/read/225', NULL, NULL, NULL),
	(72, 'A', '2', '1', 7, 'Hak Untuk Memperoleh Ganti Rugi dan Rehabilitasi Ganti Rugi', 'https://www.pn-negara.go.id/page/read/226', NULL, NULL, NULL),
	(14, 'A', '1', '4', 0, 'Agenda sidang pada Pengadilan Negeri Negara', 'https://sipp.pn-negara.go.id/list_jadwal_sidang', NULL, NULL, NULL),
	(18, 'A', '2', '2', 0, 'Tatacara pengaduan dugaan pelanggaran yang dilakukan Hakim dan Pegawai Pengadilan Negeri Negara', 'https://www.pn-negara.go.id/page/read/163', NULL, NULL, NULL),
	(19, 'A', '2', '3', 0, 'Hak-hak pelapor dugaan pelanggaran Hakim dan Pegawai Pengadilan Negeri Negara', 'https://www.pn-negara.go.id/page/read/163', NULL, NULL, NULL),
	(20, 'A', '2', '4', 0, 'Prosedur Permohonan Informasi', 'https://www.pn-negara.go.id/page/read/49', NULL, NULL, NULL),
	(21, 'A', '2', '5', 0, 'Hak-hak pemohon informasi dalam pelayanan informasi', 'https://pn-bangli.go.id/index.php/layanan-publik/prosedur-permohonan-informasi', NULL, NULL, NULL),
	(22, 'A', '3', '1', 0, ' Sistem Akuntabilitas Kinerja Instansi Pemerintahan Pengadilan Negeri Negara', 'https://www.pn-negara.go.id/page/read/42', NULL, NULL, NULL),
	(23, 'A', '3', '2', 0, 'Laporan Realisasi Anggaran Pengadilan Negeri Negara', 'https://pn-bangli.go.id/index.php/layanan-publik/transparansi/laporan-realisasi-anggaran', NULL, NULL, NULL),
	(24, 'A', '3', '3', 0, 'Daftar Aset dan Inventaris', 'https://www.pn-negara.go.id/page/read/151', NULL, NULL, NULL),
	(25, 'A', '3', '4', 0, 'Pengumuman Pengadaan Barang dan Jasa Pengadilan Negeri Negara', 'https://www.pn-negara.go.id/page/read/158', NULL, NULL, NULL),
	(26, 'A', '4', '1', 0, 'Laporan Akses Informasi', 'https://eppid.pn-negara.go.id/userpage/v_statistik', NULL, NULL, NULL),
	(59, 'A', '1', '3', 1, 'Biaya Perkara di Pengadilan Negeri Negara', 'https://www.pn-negara.go.id/page/read/93', NULL, NULL, NULL),
	(28, 'A', '6', '1', 0, 'Informasi penerimaan pegawai', 'https://www.pn-negara.go.id/page/read/160', NULL, NULL, NULL),
	(29, 'B', '1', '1', 0, 'Informasi serta merta', 'https://pn-negara.go.id/berita', NULL, NULL, NULL),
	(30, 'C', '1', '1', 0, 'Informasi yang wajib diumumkan secara berkala', 'https://eppid.pn-negara.go.id/userpage/listinformasi/berkala', NULL, NULL, NULL),
	(31, 'C', '2', '1', 1, 'Informasi putusan Pengadilan Negeri Negara', 'https://putusan3.mahkamahagung.go.id/pengadilan/profil/pengadilan/pn-negara.html', NULL, NULL, NULL),
	(32, 'C', '2', '2', 0, 'Informasi biaya perkara', 'https://www.pn-negara.go.id/page/read/93', NULL, NULL, NULL),
	(33, 'C', '3', '1', 0, 'Informasi tentang Pengawasan dan Pendisiplinan', 'https://bawas.mahkamahagung.go.id/', NULL, NULL, NULL),
	(34, 'C', '4', '1', 0, 'Informasi tentang Peraturan, Kebijakan dan Hasil Penelitian', 'https://jdih.mahkamahagung.go.id/', NULL, NULL, NULL),
	(37, 'C', '5', '2', 1, 'Standar Pelayanan', 'https://www.pn-negara.go.id/page/read/119', NULL, NULL, NULL),
	(38, 'C', '5', '2', 2, 'Maklumat pelayanan', 'https://pn-negara.go.id/page/read/111', NULL, NULL, NULL),
	(39, 'C', '5', '3', 1, 'DIPA dan RKAKL Pengadilan Negeri Negara', 'https://www.pn-negara.go.id/page/read/39', NULL, NULL, NULL),
	(40, 'C', '5', '3', 2, 'Laporan Realisasi Anggaran Pengadilan Negeri Negara', 'https://www.pn-negara.go.id/page/read/40', NULL, NULL, NULL),
	(61, 'A', '1', '2', 1, 'Prosedur Pengajuan Perkara', 'https://www.pn-negara.go.id/page/read/167', NULL, NULL, NULL),
	(75, 'A', '1', '1', 10, 'Profil Hakim AdHoc', 'http://www.pt-denpasar.go.id/new/other/hakim_adhoc_tipikor.html', NULL, NULL, NULL);
/*!40000 ALTER TABLE `link_informasi` ENABLE KEYS */;

-- Dumping structure for table eppid2.link_terkait
CREATE TABLE IF NOT EXISTS `link_terkait` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(250) DEFAULT NULL,
  `link` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid2.link_terkait: 3 rows
/*!40000 ALTER TABLE `link_terkait` DISABLE KEYS */;
INSERT INTO `link_terkait` (`id`, `alias`, `link`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(11, 'Pengadilan Tinggi Denpasar', 'http://www.pt-denpasar.go.id/new/', '2022-04-13 01:54:34', '2022-04-13 01:54:34', NULL),
	(12, 'Direktorat Jendral Badan Peradilan Umum', 'https://badilum.mahkamahagung.go.id/', '2022-04-13 01:55:27', '2022-04-13 01:55:27', NULL),
	(13, 'Mahkamah Agung Republik Indonesia', 'https://mahkamahagung.go.id', '2022-04-13 01:56:20', '2022-04-13 01:56:20', NULL);
/*!40000 ALTER TABLE `link_terkait` ENABLE KEYS */;

-- Dumping structure for table eppid2.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid2.migrations: 24 rows
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table eppid2.pengaduan
CREATE TABLE IF NOT EXISTS `pengaduan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tanggal_laporan` date DEFAULT NULL,
  `id_pelapor` varchar(255) DEFAULT NULL,
  `hal` text,
  `tempat_kejadian` text,
  `waktu` date DEFAULT NULL,
  `nama_terlapor` text,
  `isi_pengaduan` text,
  `file` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table eppid2.pengaduan: 15 rows
/*!40000 ALTER TABLE `pengaduan` DISABLE KEYS */;
INSERT INTO `pengaduan` (`id`, `tanggal_laporan`, `id_pelapor`, `hal`, `tempat_kejadian`, `waktu`, `nama_terlapor`, `isi_pengaduan`, `file`) VALUES
	(1, '2022-05-01', '1', 'Kode wti', 'negara', '2022-05-01', 'Dirga', 'Kekuasaan', 'file-pengaduan-1651339401.jpg'),
	(3, '2022-05-02', '1', 'Suap', 'PN Negara', '2022-05-02', 'Puja', 'Yang bersangkuan telah menerima suap dari seseorang', NULL),
	(4, '2022-05-02', '8', 'Gratifikasi', 'PN Negara', '2022-05-01', 'Suppersadha I Gede', 'Yang bersangkutan telah menerima gratifikasi dari seseorang yang bernama Puja Adnyana', 'file-pengaduan-1651399484.jpg'),
	(5, '2022-05-03', '9', 'Suap dan gratifikasi', 'Negara', '2022-05-02', 'Pegawai PN', 'Bahwa menerima suap dan gratifikasi', NULL),
	(6, '2022-05-03', '1', 'Apa kaden', 'Negara', '2022-05-02', 'Puja', 'Apa kaden aduannya', NULL),
	(7, '2022-05-03', '1', 'Kolap', 'Negafa', '2022-05-02', 'Siapa', 'Siapa saja', NULL),
	(8, '2022-05-03', '1', 'Komisi', 'Negara', '2022-05-02', 'Puja', 'Siapa', NULL),
	(9, '2022-05-03', '1', 'Suap', 'Negara', '2022-05-02', 'Puja', 'Puja', NULL),
	(10, '2022-05-03', '1', 'Suap', 'Negara', '2022-05-02', 'Oka', 'Suap', NULL),
	(11, '2022-05-03', '1', 'Nerca', 'Negara', '2022-05-02', 'Puja', 'Puja adalah', NULL),
	(12, '2022-05-03', '1', 'Kompas', 'Negara', '2022-05-02', 'Puja', 'Pujaku', NULL),
	(13, '2022-05-03', '1', 'Klop', 'Negara', '2022-05-02', 'Puja', 'Puja adnyana', NULL),
	(14, '2022-05-03', '1', 'Puja', 'Negara', '2022-05-02', 'Puja', 'Puja Adnyana', NULL),
	(15, '2022-05-03', '1', 'Suap', 'Negara', '2022-05-02', 'Puja', 'Puja Adnyana', NULL),
	(16, '2022-05-03', '1', 'Ok', 'Ok', '2022-05-02', '123', '123', NULL);
/*!40000 ALTER TABLE `pengaduan` ENABLE KEYS */;

-- Dumping structure for table eppid2.peraturan
CREATE TABLE IF NOT EXISTS `peraturan` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `nomor_peraturan` varchar(250) DEFAULT NULL,
  `tentang` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid2.peraturan: 4 rows
/*!40000 ALTER TABLE `peraturan` DISABLE KEYS */;
INSERT INTO `peraturan` (`id`, `nomor_peraturan`, `tentang`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(10, 'Undang-undang Nomor 14 Tahun 2008', 'Keterbukaan Informasi Publik', '2022-04-27 03:17:54', '2022-04-27 03:17:54', NULL),
	(11, 'PERMA No. 2 Tahun 2011', 'Tata Cara Penyelesaian Sengketa Informasi Publik di Pengadilan	', '2022-04-27 03:17:54', '2022-04-27 03:17:54', NULL),
	(12, 'SK KMA Nomor 1-144/KMA/SK/I/2011', 'Pedoman Pelayanan Informasi di Pengadilan', '2022-04-27 03:17:54', '2022-04-27 03:17:54', NULL),
	(9, 'Undang-Undang No. 25 Tahun 2009', 'Pelayanan Publik', '2022-04-12 04:32:26', '2022-04-12 04:32:26', NULL);
/*!40000 ALTER TABLE `peraturan` ENABLE KEYS */;

-- Dumping structure for table eppid2.permohonan
CREATE TABLE IF NOT EXISTS `permohonan` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `id_jenis_informasi` int(5) unsigned NOT NULL,
  `nomor_register` varchar(100) DEFAULT NULL,
  `tanggal_permohonan` date DEFAULT NULL,
  `isi_permohonan` text,
  `file_permohonan` varchar(500) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'Proses verifikasi',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid2.permohonan: 12 rows
/*!40000 ALTER TABLE `permohonan` DISABLE KEYS */;
INSERT INTO `permohonan` (`id`, `id_jenis_informasi`, `nomor_register`, `tanggal_permohonan`, `isi_permohonan`, `file_permohonan`, `email`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(21, 1, '1/2022', '2022-05-02', 'Nomor', 'file-permohonan-1651457182.jpg', 'ayucwinza@gmail.com', 'Proses verifikasi', '2022-05-01 21:06:23', '2022-05-01 21:06:23', NULL),
	(22, 1, '2/2022', '2022-05-02', 'Bereapat utusan perkara nomor 53', NULL, 'okawinza@gmail.com', 'Proses verifikasi', '2022-05-02 07:24:26', '2022-05-02 07:24:26', NULL),
	(23, 2, '3/2022', '2022-05-02', '123', NULL, 'okawinza@gmail.com', 'Proses verifikasi', '2022-05-02 09:01:51', '2022-05-02 09:01:51', NULL),
	(24, 2, '4/2022', '2022-05-02', '1234', NULL, 'ayucwinza@gmail.com', 'Sudah ditindaklanjuti', '2022-05-02 09:05:36', '2022-05-02 09:05:36', NULL),
	(25, 1, '5/2022', '2022-05-02', '123123', NULL, 'ayucwinza@gmail.com', 'Proses verifikasi', '2022-05-02 09:14:12', '2022-05-02 09:14:12', NULL),
	(26, 1, '6/2022', '2022-05-02', '123', NULL, 'ayucwinza@gmail.com', 'Proses verifikasi', '2022-05-02 09:15:41', '2022-05-02 09:15:41', NULL),
	(27, 1, '7/2022', '2022-05-02', '123', NULL, 'ayucwinza@gmail.com', 'Proses verifikasi', '2022-05-02 09:17:26', '2022-05-02 09:17:26', NULL),
	(28, 1, '8/2022', '2022-05-02', '123', NULL, 'ayucwinza@gmail.com', 'Proses verifikasi', '2022-05-02 09:20:03', '2022-05-02 09:20:03', NULL),
	(29, 1, '9/2022', '2022-05-02', '123', NULL, 'ayucwinza@gmail.com', 'Proses verifikasi', '2022-05-02 09:23:34', '2022-05-02 09:23:34', NULL),
	(30, 1, '10/2022', '2022-05-02', '123', NULL, 'ayucwinza@gmail.com', 'Proses verifikasi', '2022-05-02 09:26:27', '2022-05-02 09:26:27', NULL),
	(31, 1, '10/2022', '2022-05-02', '123', NULL, 'ayucwinza@gmail.com', 'Proses verifikasi', '2022-05-02 09:28:45', '2022-05-02 09:28:45', NULL),
	(32, 2, '10/2022', '2022-05-02', '123', NULL, 'ayucwinza@gmail.com', 'Proses verifikasi', '2022-05-02 09:32:08', '2022-05-02 09:32:08', NULL);
/*!40000 ALTER TABLE `permohonan` ENABLE KEYS */;

-- Dumping structure for table eppid2.prasyarat_others
CREATE TABLE IF NOT EXISTS `prasyarat_others` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `prasyarat` text,
  `hubungi_kami` text,
  `faq` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid2.prasyarat_others: 1 rows
/*!40000 ALTER TABLE `prasyarat_others` DISABLE KEYS */;
INSERT INTO `prasyarat_others` (`id`, `prasyarat`, `hubungi_kami`, `faq`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '<h4 style="margin-left:0px;text-align:center;">Prasyarat</h4><p style="margin-left:auto;"><br data-cke-filler="true"></p><h2 style="margin-left:0px;">PRASYARAT PENGGUNA</h2><p><strong>1. Umum</strong></p><p>Dengan mengakses situs ini, Anda setuju untuk terikat dengan Syarat dan Ketentuan Penggunaan, semua hukum dan peraturan, dan setuju bahwa Anda bertanggung jawab untuk mematuhi hukum dan peraturan yang berlaku. Bacalah dengan seksama Syarat dan Ketentuan Penggunaan di bawah sebelum mengakses situs ini, sehingga Anda dapat menggunakan situs situs ini dengan baik. Bila Anda tidak menyetujui prasyarat penggunaan, sebaiknya Anda tidak meneruskan ke langkah berikutnya.</p><p><strong>2. Permohonan Informasi dan Keberatan</strong></p><p>Dengan membuat akun pada situs ini, Anda dianggap telah menandatangani dokumen sebagaimana dalam Lampiran VII dan Lampiran IX SK KMA Nomor : 1-144/KMA/SK/I/2011 serta dengan dipublikasikannya jawaban dan tanggapan atas keberatan, Anda telah dianggap menanandtangani dokumen tanda terima informasi dan keberatan.</p><p><strong>3. Modifikasi Syarat dan Ketentuan</strong><br>Pengadilan Tinggi Denpasar (PT Denpasar) dapat merevisi Syarat dan Ketentuan Penggunaan untuk situs ini setiap saat tanpa pemberitahuan. Oleh sebab itu diharapkan Anda mengikuti perkembangannya secara periodik.</p><p><strong>4. Hukum</strong><br>Setiap klaim yang berkaitan dengan situs PT Denpasar ini terikat oleh hukum di Negara Republik Indonesia tanpa terkecuali.</p><p><strong>5. Revisi dan Kesalahan</strong></p><p>Materi yang muncul di situs PT Denpasar dapat memiliki kesalahan teknis, kesalahan ketik, atau fotografi. PN Negara dapat membuat perubahan materi yang terkandung di situs setiap saat tanpa adanya pemberitahuan. PT Denpasar tidak membuat komitmen apapun untuk memperbaharui materi.</p><p><strong>6. Jaminan Sajian</strong><br>Situs ini dibangun untuk kenyamanan pengunjung Internet Kami. Untuk itu Kami berusaha menyajikan seluruh informasi (teks, grafis dan seluruh atribut yang ada) dengan sebaik-baiknya. Seluruh hasitus dalam situs ini dirancang menggunakan format 1024 x 768 piksel dan gunakanlah browser Internet Explorer (versi 5.00 ke atas) untuk mendapatkan hasil yang optimal layanan. Namun Kami tidak dapat menjamin bahwa informasi yang kami sajikan dapat memenuhi keinginan seluruh pengguna situs ini.</p><p><strong>7. Copyright</strong><br>Isi keseluruhan (teks, grafis dan seluruh atribut yang ada) pada situs ini adalah karya cipta dan properti PT Denpasar yang dilindungi hukum. Segala bentuk penggunaan material yang bersifat komersial harus seizin PT Denpasar. Segala tindakan yang dengan sengaja mengakibatkan rusaknya data, program, informasi dan hal-hal yang berkaitan dengan itu, dianggap sebagai perbuatan melanggar hukum.</p><p><strong>8. Virus</strong><br>Dampak dari perkembangan teknologi informasi adalah timbulnya virus komputer baru di Internet, maka Kami memperingatkan Anda tentang bahaya yang ditimbulkan oleh virus tersebut terhadap sistem Anda. Merupakan tanggung jawab Anda untuk mendeteksi semua materi yang di-download unduh dari Internet. Kami tidak bertanggung jawab terhadap segala bahaya atau kerusakan yang ditimbulkan oleh virus tersebut.</p><p><strong>9. Keamanan Transmisi</strong><br>Penggunaan Internet dan e-mail tidaklah bersifat rahasia karena terdapat kemungkinan informasi yang dikirimkan kepada Kami terbaca atau digunakan oleh pihak lain. Untuk melindungi rahasia Anda, sebaiknya e-mail yang dikirimkan tidak berisi informasi yang sensitif seperti nilai rekening, laporan keuangan, dsb.</p><p><strong>10. Link ke Situs Lain</strong><br>Situs ini menyediakan beberapa link untuk memudahkan Anda melihat informasi yang berhubungan dengan situs-situs lain. Kami tidak melakukan pemeliharaan dan kontrol terhadap para organisasi pemilik situs atau para organisasi penyedia informasi tersebut. Oleh karena itu informasi yang tersaji tersebut berada di luar tanggung jawab kami.</p><p><strong>11. E-mail</strong><br>E-mail merupakan alat komunikasi yang penting bagi pengunjung situs Kami. Kami menggunakan e-mail semata-mata untuk tujuan korespondensi dan komunikasi dengan Anda. Kami menggunakan alamat e-mail Anda untuk mengirimkan informasi tentang produk maupun pelayanan yang mungkin menarik bagi Anda. Apabila Anda tidak ingin melakukan kontak dengan kami, silahkan kirimkan ketidakinginan Anda pada Kami.</p><p><strong>12. Terminasi Akses</strong><br>Kami berhak untuk menghentikan akses terhadap situs ini dengan memproteksi password terhadap penyalahgunaan situs ini.</p><p><strong>13. Umpan Balik</strong><br>Untuk menghindari segala kesalahpahaman, Kami menghargai segala masukan yang diberikan ataupun yang Anda kirimkan kepada Kami, baik ide, saran, usulan, dsb; akan menjadi milik Kami tanpa diberikan kompensasi dan tidak ada klaim untuk hal tersebut.</p>', '<h4 style="margin-left:0px;text-align:center;">Hubungi Kami</h4><p style="margin-left:auto;"><br data-cke-filler="true"></p><p style="text-align:center;"><strong>&nbsp;PPID PENGADILAN TINGGI DENPASAR</strong></p><p style="text-align:center;"><strong>&nbsp;Meja Informasi&nbsp;</strong><br><strong>&nbsp;Pengadilan Tinggi Denpasar</strong><br><strong>&nbsp;Jl. Tantular Barat No.1, Denpasar, Bali</strong><br><strong>&nbsp;T. (0361) 222952</strong><br><strong>&nbsp;F. (0361) 225761</strong><br><strong>&nbsp; e-mail:&nbsp;</strong><a href="mailto:pn_negara@yahoo.co.id"><strong>pt-denpasar@gmail.com</strong></a><br><a href="https://pn-negara.go.id" class="ck-link_selected"><strong>&nbsp;<u>https://pt-denpasar.go.id</u></strong></a></p>', '<h4 style="margin-left:0px;text-align:center;">FAQ</h4><p style="margin-left:auto;"><br data-cke-filler="true"></p><ol><li><strong>Siapa yang dapat mengajukan permohonan informasi publik?</strong><br>Setiap warga negara Indonesia dan/atau badan hukum Indonesia sebagaimana diatur dalam Undang-Undang Republik Indonesia Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik.</li><li><strong>Apakah persyaratan mengajukan permohonan informasi publik dan keberatan?</strong><br>Menginputkan NIK yang sah dan berlaku.</li><li><strong>Bagaimana cara mendaftar sebagai pengguna layanan informasi publik PN Negara?</strong><ol style="list-style-type:lower-alpha;"><li>Melakukan registrasi terlebih dahulu pada aplikasi web<a href="https://eppid.pn-negara.go.id/"> <strong>epelita.pt-denpasar.go.id</strong> </a>melalui tombol login kemudian klik daftar</li><li>Melengkapi kolom yang telah disediakan.</li></ol></li><li><strong>Bagaimana cara mengajukan permohonan informasi publik?</strong><ol style="list-style-type:lower-alpha;"><li>Permohonan informasi dapat diajukan melalui aplikasi web <a href="https://eppid.pn-negara.go.id/"><strong>eppid.pn-negara.go.id</strong></a> melalui menu&nbsp;Permohonan, sub-menu&nbsp;Permohonan Informasi;</li><li>Melengkapi kolom yang telah disediakan dan melampirkan dokumen pendukung apabila ada;</li><li>Apabila data permohonan informasi sudah lengkap,&nbsp;pengguna&nbsp;akan menerima&nbsp;email&nbsp;konfirmasi dari PPID, bahwa permohonan informasi sudah&nbsp;diterima dan sedang diproses.</li></ol></li><li><strong>Bagaimana mekanisme pemberian tanggapan PPID atas permohonan informasi publik?</strong><br>Tanggapan atas permohonan informasi publik akan langsung dijawab melalui aplikasi dan Anda telah dianggap menandatangani surat penerimaan informasi.</li><li><strong>Berapa lama pemberian tanggapan PPID atas permohonan informasi publik?</strong><br>Tanggapan dari PPID berupa Pemberitahuan Tertulis akan disampaikan paling lambat 6 (enam) hari kerja sejak permohonan informasi telah memenuhi persyaratan dan dapat diperpanjang 7 (tujuh) hari kerja berikutnya.</li><li><strong>Bagaimana cara pengajuan keberatan atas informasi publik PN Negara?</strong><ol style="list-style-type:lower-alpha;"><li>Keberatan dapat diajukan melalui aplikasi web<strong> </strong><a href="https://eppid.pn-negara.go.id/"><strong>eppid.pn-negara.go.id</strong></a> melalui tombol aksi keberatan dalam daftar permohonan informasi</li><li>Melengkapi kolom yang telah disediakan;</li><li>Melampirkan dokumen pendukung apabila ada.</li></ol></li><li><strong>Berapa biaya untuk memperoleh informasi publik?</strong><br>PPID PN Negara tidak mengenakan biaya terhadap perolehan informasi.</li><li><strong>Waktu layanan informasi:</strong><br>Layanan informasi publik dilaksanakan pada setiap hari kerja Senin s.d. Kamis dari pukul 08.00 WIB â€“ 16.30 WITA dan hari kerja Jum\'at dari pukul 07.30 WIB s.d. 16.30 WITA.</li></ol>', '2022-02-22 16:10:40', '2022-05-02 10:10:07', NULL);
/*!40000 ALTER TABLE `prasyarat_others` ENABLE KEYS */;

-- Dumping structure for table eppid2.profil_ppid
CREATE TABLE IF NOT EXISTS `profil_ppid` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `profil` text,
  `tupoksi` text,
  `struktur` text,
  `visimisi` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid2.profil_ppid: 2 rows
/*!40000 ALTER TABLE `profil_ppid` DISABLE KEYS */;
INSERT INTO `profil_ppid` (`id`, `profil`, `tupoksi`, `struktur`, `visimisi`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(4, '<h3 style="margin-left:0px;text-align:center;"><strong>PROFIL SINGKAT PPID</strong></h3><h3 style="margin-left:0px;text-align:center;"><strong>PENGADILAN NEGERI NEGARA</strong></h3><p style="margin-left:0px;text-align:justify;">Pengadilan Negeri Negara berkomitmen untuk memberikan layanan kepada masyarakat guna memenuhi kebutuhan informasi publik. Hal ini ditunjukkan dengan adanya unit yang memiliki meja layanan informasi yang menjadi satu dengan meja PTSP.</p><p style="margin-left:0px;text-align:justify;">Setelah itu, terbitlah <a href="https://eppid.mahkamahagung.go.id/files/shares/144-KMA-SK-VIII-2007.pdf"><span style="color:rgb(0,0,255);"><u>SK KMA nomor 144/KMA/SK/VIII/2007</u></span></a> tentang Keterbukaan Informasi di Pengadilan sebagai pedoman pelayanan informasi di Mahkamah Agung dan pengadilan. Di tahun 2007 ini, belum dikenal istilah PPID (Pejabat Pengelola Informasi dan Dokumentasi) dan Atasan PPID melainkan Petugas Informasi dan Dokumentasi dan Penanggung Jawab. Di dalam <a href="https://eppid.mahkamahagung.go.id/files/shares/144-KMA-SK-VIII-2007.pdf">SK KMA 144 tahun 2007</a> ini dijelaskan mengenai informasi yang harus diumumkan pengadilan, tata cara pengumumannya, informasi yang dapat diakses publik, dan tata cara mendapatkan informasi tersebut, biaya, prosedur keberatan, dan pemanfaatan informasi.</p><p>Kemudian, terbitlah <a href="https://eppid.mahkamahagung.go.id/files/shares/UU%2014%20Tahun%202008%20tentang%20Keterbukaan%20Informasi%20Publik.pdf"><span style="color:rgb(0,0,255);"><u>Undang-Undang Nomor 14 Tahun 2008</u></span></a> tentang Keterbukaan Informasi Publik (UU KIP) yang disahkan pada bulan April 2008 dan kemudian mulai berlaku pada bulan April 2010. UU tersebut menggunakan istilah-istilah yang sedikit berbeda dengan yang digunakan pada <a href="https://eppid.mahkamahagung.go.id/files/shares/144-KMA-SK-VIII-2007.pdf">SK KMA 144 tahun 2007</a>, sehingga Mahkamah Agung menindaklanjuti dengan menerbitkan <a href="https://eppid.mahkamahagung.go.id/files/shares/SK_KMA_1-144+(TERBARU+2011).pdf"><span style="color:rgb(0,0,255);"><u>SK KMA nomor 1-144/KMA/SK/I/2011</u></span></a> tentang Pedoman Pelayanan Informasi di Pengadilan.</p><p style="margin-left:0px;text-align:justify;"><a href="https://eppid.mahkamahagung.go.id/files/shares/SK_KMA_1-144+(TERBARU+2011).pdf"><span style="color:rgb(0,0,255);"><u>SK KMA 1-144 tahun 2011</u></span></a> menambahkan beberapa detil yang belum diatur pada <a href="https://eppid.mahkamahagung.go.id/files/shares/144-KMA-SK-VIII-2007.pdf">SK KMA 144 tahun 2007</a>, di antaranya informasi yang dikecualikan, prosedur pengaburan informasi yang disertai dengan contoh, dan formulir-formulir terkait pelayanan informasi. Selain itu, pelaksana pelayanan informasi menjadi empat, yaitu atasan PPID, PPID, penanggung jawab informasi, dan petugas informasi.</p><p style="margin-left:0px;text-align:justify;">Pada tahun 2022, Pengadilan Negeri Negara mengembangkan sistem permohonan informasi secara elektronik pada situs web <a href="https://eppid.pn-negara.go.id"><span style="color:rgb(0,0,255);">eppid.pn-negara.go.id</span></a> yang terkoneksi dengan jaringan internet. Dengan fasilitas tersebut, pemohon informasi dapat mengajukan permohonan informasi atau keberatan dengan cepat, tanpa perlu menyampaikan surat ataupun datang ke meja layanan informasi. Situs tersebut juga dilengkapi dengan informasi mengenai pengelolaan keterbukaan informasi publik di Pengadilan Negeri Negara.</p><p><br data-cke-filler="true"></p>', '<h3 style="text-align:center;">TUGAS DAN FUNGSI PPID&nbsp;</h3><h3 style="text-align:center;">PENGADILAN NEGERI NEGARA</h3><p style="text-align:center;"><br data-cke-filler="true"></p><ol><li>Mengkoordinasikan penyimpanan dan pendokumentasian seluruh informasi yang berada di unit/satuan kerjanya.</li><li>Mengkoordinasikan pengumpulan seluruh informasi secara fisik dari setiap bagian yang meliputi:<ol style="list-style-type:lower-alpha;"><li>Informasi yang wajib disediakan dan diumumkan secara berkala;</li><li>Informasi yang wajib tersedia setiap saat; dan</li><li>Informasi terbuka lainnya yang diminta Pemohon Informasi Publik.</li></ol></li><li>Mengkoordinasikan pendataan informasi yang dikuasai setiap unit/satuan kerja di bawahnya dalam rangka pembuatan dan pemutakhiran Daftar Informasi Publik sekurang-kurangnya 1 (satu) kali dalam sebulan.</li><li>Mengkoordinasikan pengumuman informasi yang wajib diumumkan secara berkala melalui media yang efektif.</li><li>Mengkoordinasikan pemberian informasi yang dapat diakses oleh publik dengan Petugas Informasi.</li><li>Melakukan pengujian tentang konsekuensi yang timbul sebagaimana diatur dalam Pasal 19 Undang-Undang Keterbukaan Informasi Publik sebelum menyatakan informasi publik tertentu dikecualikan.</li><li>Menyertakan alasan tertulis pengecualian informasi secara jelas dan tegas, dalam hal permohonan informasi ditolak.</li><li>Mengkoordinasikan penghitaman atau pengaburan informasi yang dikecualikan beserta alasannya kepada Petugas Informasi.</li><li>Mengembangkan kapasitas pejabat fungsional dan/atau petugas informasi dalam rangka peningkatan kualitas layanan informasi.</li><li>Mengkoordinasikan dan memastikan agar pengajuan keberatan diproses berdasarkan prosedur yang berlaku.</li><li>PPID bertanggung jawab kepada atasan PPID dalam melaksanakan tugas, tanggungjawab, dan wewenangnya.</li></ol>', '<h3 style="margin-left:0px;text-align:center;"><strong>STRUKTUR ORGANISASI PPID</strong></h3><h3 style="margin-left:0px;text-align:center;"><strong>PENGADILAN NEGERI NEGARA</strong></h3><p style="margin-left:0px;text-align:center;"><br data-cke-filler="true"></p><figure class="image ck-widget ck-widget_with-resizer image_resized ck-widget_selected" contenteditable="false" style="width:50.4%;"><img src="https://eppid.pn-negara.go.id/img/ckeditor/1650169280_6d4d3e02c3cb8ab1e83a.jpg"><div class="ck ck-reset_all ck-widget__type-around"><div class="ck ck-widget__type-around__button ck-widget__type-around__button_before" title="Insert paragraph before block"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 8"><path d="M9.055.263v3.972h-6.77M1 4.216l2-2.038m-2 2 2 2.038"></path></svg></div><div class="ck ck-widget__type-around__button ck-widget__type-around__button_after" title="Insert paragraph after block"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 8"><path d="M9.055.263v3.972h-6.77M1 4.216l2-2.038m-2 2 2 2.038"></path></svg></div><div class="ck ck-widget__type-around__fake-caret"></div></div><div class="ck ck-reset_all ck-widget__resizer" style="height:429px;left:0px;top:0px;width:814px;"><div class="ck-widget__resizer__handle ck-widget__resizer__handle-top-left"></div><div class="ck-widget__resizer__handle ck-widget__resizer__handle-top-right"></div><div class="ck-widget__resizer__handle ck-widget__resizer__handle-bottom-right"></div><div class="ck-widget__resizer__handle ck-widget__resizer__handle-bottom-left"></div><div class="ck ck-size-view ck-orientation-bottom-left" style="display: none;">50.4%</div></div></figure><p style="margin-left:0px;"><br data-cke-filler="true"></p><p style="margin-left:0px;">Sesuai SK KMA nomor 1-144/KMA/SK/I/2011 ditetapkan:</p><p>Struktur Organisasi PPID pada Pengadilan Negeri Negara sebagai berikut:</p><ol style="list-style-type:lower-alpha;"><li>Atasan PPID dijabat oleh Ketua Pengadilan Negara;</li><li>PPID dijabat oleh Panitera dan Sekretaris;</li><li>Petugas Informasi dijabat oleh Petugas PTSP Hukum dan Petugas PTSP Umum; dan</li><li>Penanggungjawab Informasi dijabat oleh Panitera Muda dan Kepala Sub Bagian Pengadilan Negeri Negara.</li></ol><div class="ck-fake-selection-container" style="position: fixed; top: 0px; left: -9999px; width: 42px;">image widget</div>', '<h3 style="margin-left:0px;text-align:center;"><strong>VISI DAN MISI PPID</strong></h3><h3 style="margin-left:0px;text-align:center;"><strong>PENGADILAN NEGERI NEGARA</strong></h3><h4 style="margin-left:0px;text-align:center;"><br data-cke-filler="true"></h4><h4 style="margin-left:0px;"><strong>Visi:</strong></h4><p style="margin-left:0px;">Terwujudnya keterbukaan informasi publik secara modern menuju Pengadilan Negeri Negara yang agung</p><h4 style="margin-left:0px;"><strong>Misi:</strong></h4><ol style="list-style-type:lower-roman;"><li>Menyediakan informasi publik yang akurat dan dapat dipertanggungjawabkan</li><li>Memberikan layanan informasi publik yang cepat, tepat, dan sederhana</li><li>Memastikan pengelolaan layanan informasi publik didukung oleh sumber daya manusia yang profesional dan berintegritas</li><li>Memanfaatkan teknologi informasi dan komunikasi yang mutakhir untuk mendukung pengelolaan keterbukaan informasi publik</li></ol>', '2022-01-13 02:56:32', '2022-04-16 23:25:06', NULL),
	(5, '<h3 style="margin-left:0px;text-align:center;"><strong>PROFIL SINGKAT PPID</strong></h3><h3 style="margin-left:0px;text-align:center;"><strong>MAHKAMAH AGUNG RI</strong></h3><p style="margin-left:0px;text-align:justify;">Mahkamah Agung berkomitmen untuk memberikan layanan kepada masyarakat guna memenuhi kebutuhan informasi publik. Hal ini ditunjukkan dengan adanya unit yang memiliki fungsi layanan informasi, yaitu Subbagian Data dan Layanan Informasi pada Bagian Perpustakaan dan Layanan Informasi Biro Hukum dan Hubungan Masyarakat sejak tahun 2006 dengan terbitnya <a href="https://eppid.mahkamahagung.go.id/files/shares/MA_SEK_07_SK_III_2006_opt.pdf"><span style="color:rgb(0,0,255);"><u>SK SEKMA nomor MA/SEK/07/SK/III/2006</u></span></a>.</p><p style="margin-left:0px;text-align:justify;">Setelah itu, terbitlah <a href="https://eppid.mahkamahagung.go.id/files/shares/144-KMA-SK-VIII-2007.pdf"><span style="color:rgb(0,0,255);"><u>SK KMA nomor 144/KMA/SK/VIII/2007</u></span></a> tentang Keterbukaan Informasi di Pengadilan sebagai pedoman pelayanan informasi di Mahkamah Agung dan pengadilan. Di tahun 2007 ini, belum dikenal istilah PPID (Pejabat Pengelola Informasi dan Dokumentasi) dan Atasan PPID melainkan Petugas Informasi dan Dokumentasi dan Penanggung Jawab. Di dalam <a href="https://eppid.mahkamahagung.go.id/files/shares/144-KMA-SK-VIII-2007.pdf">SK KMA 144 tahun 2007</a> ini dijelaskan mengenai informasi yang harus diumumkan pengadilan, tata cara pengumumannya, informasi yang dapat diakses publik, dan tata cara mendapatkan informasi tersebut, biaya, prosedur keberatan, dan pemanfaatan informasi.</p><p>Kemudian, terbitlah <a href="https://eppid.mahkamahagung.go.id/files/shares/UU%2014%20Tahun%202008%20tentang%20Keterbukaan%20Informasi%20Publik.pdf"><span style="color:rgb(0,0,255);"><u>Undang-Undang Nomor 14 Tahun 2008</u></span></a> tentang Keterbukaan Informasi Publik (UU KIP) yang disahkan pada bulan April 2008 dan kemudian mulai berlaku pada bulan April 2010. UU tersebut menggunakan istilah-istilah yang sedikit berbeda dengan yang digunakan pada <a href="https://eppid.mahkamahagung.go.id/files/shares/144-KMA-SK-VIII-2007.pdf">SK KMA 144 tahun 2007</a>, sehingga Mahkamah Agung menindaklanjuti dengan menerbitkan <a href="https://eppid.mahkamahagung.go.id/files/shares/SK_KMA_1-144+(TERBARU+2011).pdf"><span style="color:rgb(0,0,255);"><u>SK KMA nomor 1-144/KMA/SK/I/2011</u></span></a> tentang Pedoman Pelayanan Informasi di Pengadilan.</p><p style="margin-left:0px;text-align:justify;"><a href="https://eppid.mahkamahagung.go.id/files/shares/SK_KMA_1-144+(TERBARU+2011).pdf"><span style="color:rgb(0,0,255);"><u>SK KMA 1-144 tahun 2011</u></span></a> menambahkan beberapa detil yang belum diatur pada <a href="https://eppid.mahkamahagung.go.id/files/shares/144-KMA-SK-VIII-2007.pdf">SK KMA 144 tahun 2007</a>, di antaranya informasi yang dikecualikan, prosedur pengaburan informasi yang disertai dengan contoh, dan formulir-formulir terkait pelayanan informasi. Selain itu, pelaksana pelayanan informasi menjadi empat, yaitu atasan PPID, PPID, penanggung jawab informasi, dan petugas informasi.</p><p style="margin-left:0px;text-align:justify;">Pada tahun 2021, Mahkamah Agung mengembangkan sistem informasi layanan <i>online</i> pemohon informasi pada situs web <a href="https://eppid.mahkamahagung.go.id/adminkitasemua/eppid.mahkamahagung.go.id"><span style="color:rgb(0,0,255);">eppid.mahkamahagung.go.id</span></a> yang terkoneksi dengan jaringan internet serta aplikasi <i>back office</i> Sistem Informasi EPPID (SI EPPID) bagi administrator PPID yang juga terkoneksi dengan jaringan intranet. Dengan fasilitas tersebut, pemohon informasi dapat mengajukan permohonan informasi atau keberatan dengan cepat, tanpa perlu menyampaikan surat ataupun datang ke ruang layanan informasi. Situs tersebut juga dilengkapi dengan informasi mengenai pengelolaan keterbukaan informasi publik di lingkungan Mahkamah Agung.</p><p><br data-cke-filler="true"></p>', '<p>Masyarakat belum tahu</p>', '<h3 style="margin-left:0px;text-align:center;"><strong>STRUKTUR ORGANISASI PPID</strong></h3><p style="margin-left:0px;">Sesuai SK KMA nomor 1-144/KMA/SK/I/2011 ditetapkan:</p><ol style="list-style-type:upper-alpha;"><li>Pelaksana pada Pengadilan Tingkat Pertama dan Banding<ol><li>Pada Peradilan Umum dan Tata Usaha Negara, pelaksana pelayanan informasi dilakukan oleh pejabat sebagai berikut:<ol style="list-style-type:lower-alpha;"><li>Atasan PPID dijabat oleh Pimpinan Pengadilan;</li><li>PPID dijabat oleh Panitera/Sekretaris;</li><li>Petugas Informasi dijabat oleh Panitera Muda Hukum atau pegawai lain yang ditunjuk Ketua Pengadilan; dan</li><li>Penanggungjawab Informasi dijabat oleh Pimpinan unit kerja setingkat eselon IV.</li></ol></li><li>Pada Peradilan Agama dan Militer, pelaksana pelayanan informasi dilakukan oleh Pejabat sebagai berikut:<ol style="list-style-type:lower-alpha;"><li>Atasan PPID dijabat oleh Pimpinan Pengadilan;</li><li>PPID dijabat oleh:<ol style="list-style-type:lower-roman;"><li>Panitera atau Kepala Panitera, mengenai informasi yang berkaitan dengan perkara; dan</li><li>Sekretaris atau Kepala Tata Usaha Dalam, mengenai informasi yang berkaitan dengan pengelolaan organisasi;</li></ol></li><li>Petugas informasi dijabat oleh Panitera Muda Hukum atau pegawai lain yang ditunjuk Ketua Pengadilan; dan</li><li>Penanggungjawab Informasi dijabat oleh Pimpinan unit kerja setingkat eselon IV.</li></ol></li></ol></li><li>Pelaksana pada Mahkamah Agung<ol><li>Atasan PPID dijabat oleh:<ol style="list-style-type:lower-alpha;"><li>Panitera, mengenai informasi yang berkaitan dengan perkara; dan</li><li>Sekretaris, mengenai informasi yang berkaitan dengan organisasi.</li></ol></li><li>PPID di lingkungan Mahkamah Agung dijabat oleh Kepala Biro Hukum dan Hubungan Masyarakat.</li><li>PPID di masing-masing satuan kerja Mahkamah Agung adalah:<ol style="list-style-type:lower-alpha;"><li>Direktur Jenderal Badan Peradilan Umum;</li><li>Direktur Jenderal Badan Peradilan Agama;</li><li>Direktur Jenderal Badan Peradilan Militer dan Tata Usaha Negara;</li><li>Kepala Badan Urusan Administrasi;</li><li>Kepala Badan Penelitian dan Pengembangan Hukum dan Peradilan; dan</li><li>Kepala Badan Pengawasan.</li></ol></li><li>Petugas Informasi di lingkungan Mahkamah Agung dan Badan Urusan Administrasi adalah Kepala Subbagian Data &amp; Pelayanan Informasi.</li><li>Petugas Informasi di masing-masing Direktorat Jenderal Badan Peradilan dan Badan Pengawasan adalah Kepala Subbagian Dokumentasi dan Informasi.</li><li>Petugas Informasi di Badan Penelitian, Pengembangan, Pendidikan dan Pelatihan Hukum dan Peradilan adalah Kepala Subbagian Tata Usaha.</li><li>Penanggungjawab Informasi di lingkungan Mahkamah Agung dan satuan kerja Mahkamah Agung dijabat oleh Pimpinan unit kerja setingkat eselon IV.</li></ol></li></ol>', '<h3 style="margin-left:0px;text-align:center;"><strong>VISI DAN MISI PPID</strong></h3><h4 style="margin-left:0px;"><strong>Visi:</strong></h4><p style="margin-left:0px;">Terwujudnya keterbukaan informasi publik secara modern menuju peradilan yang agung</p><h4 style="margin-left:0px;"><strong>Misi:</strong></h4><ol style="list-style-type:lower-roman;"><li>Menyediakan informasi publik yang akurat dan dapat dipertanggungjawabkan</li><li>Memberikan layanan informasi publik yang cepat, tepat, dan sederhana</li><li>Memastikan pengelolaan layanan informasi publik didukung oleh sumber daya manusia yang profesional dan berintegritas</li><li>Memanfaatkan teknologi informasi dan komunikasi yang mutakhir untuk mendukung pengelolaan keterbukaan informasi publik</li></ol>', '2022-01-13 02:56:34', '2022-01-13 02:56:34', NULL);
/*!40000 ALTER TABLE `profil_ppid` ENABLE KEYS */;

-- Dumping structure for table eppid2.profil_satker
CREATE TABLE IF NOT EXISTS `profil_satker` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
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
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid2.profil_satker: 1 rows
/*!40000 ALTER TABLE `profil_satker` DISABLE KEYS */;
INSERT INTO `profil_satker` (`id`, `nama`, `nama_pendek`, `alamat`, `nomor_telepon`, `nomor_whatsapp`, `telegram`, `nomor_fax`, `email`, `link_satker`, `link_youtube`, `link_facebook`, `link_instagram`, `link_twitter`, `link_video_dashboard`, `logo`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(3, 'PENGADILAN TINGGI DENPASAR', 'PT DENPASAR', 'Jl. Tantular Barat No. 1, Denpasar, Bali', '(0365) 222952', '081339075519', '-', '(0361) 225761', 'pt-denpasar@gmail.com', 'https://www.pt-denpasar.go.id', 'https://www.youtube.com/channel/UCyD64kIY6a2Rcl2KE', 'https://web.facebook.com/pengadilantinggi.denpasar', 'https://www.instagram.com/pengadilantinggidenpasar', '', '0Akcjvjgaw4', 'logo-pn.png', NULL, '2022-05-01 05:36:08', NULL);
/*!40000 ALTER TABLE `profil_satker` ENABLE KEYS */;

-- Dumping structure for table eppid2.proses_keberatan
CREATE TABLE IF NOT EXISTS `proses_keberatan` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `keberatan_id` int(5) unsigned NOT NULL,
  `status` varchar(250) DEFAULT NULL,
  `tanggapan` text,
  `lampiran_tanggapan` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid2.proses_keberatan: 0 rows
/*!40000 ALTER TABLE `proses_keberatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `proses_keberatan` ENABLE KEYS */;

-- Dumping structure for table eppid2.proses_pengaduan
CREATE TABLE IF NOT EXISTS `proses_pengaduan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pengaduan` int(10) unsigned DEFAULT NULL,
  `proses` varchar(50) DEFAULT NULL,
  `status` text,
  `tanggapan` text,
  `file_tanggapan` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table eppid2.proses_pengaduan: 16 rows
/*!40000 ALTER TABLE `proses_pengaduan` DISABLE KEYS */;
INSERT INTO `proses_pengaduan` (`id`, `id_pengaduan`, `proses`, `status`, `tanggapan`, `file_tanggapan`) VALUES
	(1, 1, 'Y', 'Ditanggapi', 'Sudah ditanggapi dengan seksama', NULL),
	(2, 3, 'Y', 'Ditanggapi', 'Sudah ditindaklanjuti                        ', NULL),
	(3, 4, 'Y', 'Ditanggapi', 'Sudah ditindaklnjuti ketua                                                ', 'File-tanggapan-1651416704.png'),
	(4, NULL, 'Y', 'Ditanggapi', 'Sudah ditindaklnjuti ketua                                                ', NULL),
	(5, 5, NULL, 'Proses verifikasi', NULL, NULL),
	(6, 6, NULL, 'Proses verifikasi', NULL, NULL),
	(7, 7, NULL, 'Proses verifikasi', NULL, NULL),
	(8, 8, NULL, 'Proses verifikasi', NULL, NULL),
	(9, 9, NULL, 'Proses verifikasi', NULL, NULL),
	(10, 10, NULL, 'Proses verifikasi', NULL, NULL),
	(11, 11, NULL, 'Proses verifikasi', NULL, NULL),
	(12, 12, NULL, 'Proses verifikasi', NULL, NULL),
	(13, 13, NULL, 'Proses verifikasi', NULL, NULL),
	(14, 14, NULL, 'Proses verifikasi', NULL, NULL),
	(15, 15, NULL, 'Proses verifikasi', NULL, NULL),
	(16, 16, NULL, 'Proses verifikasi', NULL, NULL);
/*!40000 ALTER TABLE `proses_pengaduan` ENABLE KEYS */;

-- Dumping structure for table eppid2.proses_permohonan
CREATE TABLE IF NOT EXISTS `proses_permohonan` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `permohonan_id` int(5) unsigned NOT NULL,
  `proses` varchar(250) DEFAULT NULL,
  `status_jawaban` varchar(250) DEFAULT NULL,
  `jenis_penolakan` varchar(250) DEFAULT NULL,
  `jawaban` text,
  `lampiran_jawaban` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `proses_permohonan_permohonan_id_foreign` (`permohonan_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid2.proses_permohonan: 1 rows
/*!40000 ALTER TABLE `proses_permohonan` DISABLE KEYS */;
INSERT INTO `proses_permohonan` (`id`, `permohonan_id`, `proses`, `status_jawaban`, `jenis_penolakan`, `jawaban`, `lampiran_jawaban`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(34, 24, 'Y', 'Sepenuhnya', NULL, 'Sudah dipenuhi', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `proses_permohonan` ENABLE KEYS */;

-- Dumping structure for table eppid2.standar_layanan
CREATE TABLE IF NOT EXISTS `standar_layanan` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `maklumat` varchar(250) DEFAULT NULL,
  `prosedur` varchar(250) DEFAULT NULL,
  `keberatan` varchar(250) DEFAULT NULL,
  `sengketa` varchar(250) DEFAULT NULL,
  `jalur` varchar(250) DEFAULT NULL,
  `biaya` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid2.standar_layanan: 1 rows
/*!40000 ALTER TABLE `standar_layanan` DISABLE KEYS */;
INSERT INTO `standar_layanan` (`id`, `maklumat`, `prosedur`, `keberatan`, `sengketa`, `jalur`, `biaya`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(3, 'maklumat-1651040087.png', 'prosedur-1645484004.jpg', 'keberatan-1645482739.png', 'sengketa-1645482739.jpg', 'jalur-1650519433.jpg', 'biaya-1651045328.jpg', '2022-02-21 16:32:19', '2022-04-27 02:42:08', NULL);
/*!40000 ALTER TABLE `standar_layanan` ENABLE KEYS */;

-- Dumping structure for table eppid2.statistik_permohonan
CREATE TABLE IF NOT EXISTS `statistik_permohonan` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `tahun` varchar(250) DEFAULT NULL,
  `statistik` varchar(250) DEFAULT NULL,
  `rekapitulasi` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid2.statistik_permohonan: 2 rows
/*!40000 ALTER TABLE `statistik_permohonan` DISABLE KEYS */;
INSERT INTO `statistik_permohonan` (`id`, `tahun`, `statistik`, `rekapitulasi`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(5, '2021', 'statistik-1645537666.png', 'rekapitulasi-1645537666.jpg', '2022-02-22 07:47:46', '2022-02-22 07:47:46', NULL),
	(6, '2020', 'statistik-1645537892.png', 'rekapitulasi-1645537892.png', '2022-02-22 07:51:32', '2022-02-22 07:51:32', NULL);
/*!40000 ALTER TABLE `statistik_permohonan` ENABLE KEYS */;

-- Dumping structure for table eppid2.user_pengaduan
CREATE TABLE IF NOT EXISTS `user_pengaduan` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) DEFAULT NULL,
  `alamat` text,
  `email` varchar(250) DEFAULT NULL,
  `nomor_hp` varchar(250) DEFAULT NULL,
  `ktp` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `foto_profil` varchar(250) NOT NULL DEFAULT 'no-profil.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Dumping data for table eppid2.user_pengaduan: 4 rows
/*!40000 ALTER TABLE `user_pengaduan` DISABLE KEYS */;
INSERT INTO `user_pengaduan` (`id`, `nama`, `alamat`, `email`, `nomor_hp`, `ktp`, `password`, `foto_profil`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Onsdee', 'Negara', 'onsdee86@gmail.com', '0819999', 'ktp-1651454100.png', '$2y$10$5Aj0kgT6s12dSFjgGDOpp.BboQO.BJG5oXhfk7LB63hDruEMTSIi6', 'no-profil.jpg', NULL, NULL, NULL),
	(8, 'Oka', 'Mendoyo', 'okawinza@gmail.com', '081777', 'ktp-1651450307.jpg', '$2y$10$3o8NjpJNW9lFXDP5ZUf76eL3wAn8PX/UGMsMRRvxHwJ6jLI3tWk2W', 'no-profil.jpg', NULL, NULL, NULL),
	(9, 'Vio', 'Mendoyo', 'ayucwinza@gmail.com', '08999', 'ktp-1651456298.jpeg', '$2y$10$NixhebZEEsC5v7nOAH4UWuzEBRvRmaUFmqAc9gh62TItxWbINCcUi', 'no-profil.jpg', NULL, NULL, NULL),
	(10, 'viododo', 'Mendoyo', 'viododo@gmail.com', '000', 'ktp-1651461215.jpeg', '$2y$10$5Aj0kgT6s12dSFjgGDOpp.BboQO.BJG5oXhfk7LB63hDruEMTSIi6', 'no-profil.jpg', NULL, NULL, NULL);
/*!40000 ALTER TABLE `user_pengaduan` ENABLE KEYS */;

-- Dumping structure for table eppid2.user_profil
CREATE TABLE IF NOT EXISTS `user_profil` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) DEFAULT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `nomor_telepon` varchar(250) DEFAULT NULL,
  `alamat` text,
  `ktp` varchar(250) DEFAULT NULL,
  `pekerjaan` varchar(250) DEFAULT NULL,
  `institusi` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `foto_profil` varchar(250) NOT NULL DEFAULT 'no-profil.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid2.user_profil: 6 rows
/*!40000 ALTER TABLE `user_profil` DISABLE KEYS */;
INSERT INTO `user_profil` (`id`, `nik`, `nama`, `email`, `nomor_telepon`, `alamat`, `ktp`, `pekerjaan`, `institusi`, `password`, `foto_profil`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '510', 'Oka Wiadnyana', 'okawinza@gmail.com', '08199999', 'negara', NULL, 'Wiraswasta', 'PN', '$2y$10$.Tgk.hvf5a9ig2xy7msM0.AK1frXuw1/VOq2Yxe0jhEmOHiN/SHty', 'no-profil.jpg', NULL, NULL, NULL),
	(2, '510', 'Oka Wiadnyana', 'admin1@gmail.com', '08199999', 'vdsfsadf', NULL, 'Wiraswasta', 'PN', '$2y$10$02twI0gdPGdmpw8h.lJPZevq4pBbZkn2.I0n4o5Vq7xEOuTW.jQze', 'no-profil.jpg', NULL, NULL, NULL),
	(4, '3603126511960002', 'budi', 'budi@gmail.com', '08212121', 'jl', NULL, 'asd', 'pn', '$2y$10$80SkTKoQbLd..huXaIF8n.cdro2CG35T3QgCWOvJ8i.5Aiujgabq2', 'no-profil.jpg', NULL, NULL, NULL),
	(5, '312312312', 'budi', 'budi111@gmail.com', '05454848', 'jl. banjar tengah', NULL, 'petani', 'ppid', '$2y$10$yMFCTRvShdSIDCfMDpfOZubmlzhK/bpB7zbNQZNnZZnqZ8B3QYok2', 'no-profil.jpg', NULL, NULL, NULL),
	(6, '1234', 'budi', 'budi86@gmail.com', '0812344', 'banjar tengah', NULL, 'karyawan', '', '$2y$10$o6lPmzUr1X36/SXMKq.4r.I34LSNgQqAQTIgFkxtqgJIGqY8JAyKK', 'no-profil.jpg', NULL, NULL, NULL),
	(8, '5120', 'Oka', 'ayucwinza@gmail.com', '081337320205', 'Negra', 'ktp-1651454100.png', 'PNS', '', '$2y$10$AUzttz6BvaRKm4F01I.K8OWXTB.6RpvrpdGa44JS7Ysx5eMBzz8Be', 'no-profil.jpg', NULL, NULL, NULL);
/*!40000 ALTER TABLE `user_profil` ENABLE KEYS */;

-- Dumping structure for table eppid2.video_informasi
CREATE TABLE IF NOT EXISTS `video_informasi` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `uraian` varchar(255) DEFAULT NULL,
  `embed_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid2.video_informasi: 8 rows
/*!40000 ALTER TABLE `video_informasi` DISABLE KEYS */;
INSERT INTO `video_informasi` (`id`, `uraian`, `embed_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'PELAYANAN TERPADU SATU PINTU PENGADILAN NEGERI NEGARA 2022', 'zsS-u9nUGro', NULL, '2022-04-13 01:45:29', NULL),
	(2, 'VIDEO PROFIL ZONA INTEGRITAS PENGADILAN NEGERI NEGARA 2021', '0_3nNODAy24', NULL, '2022-04-13 01:46:23', NULL),
	(3, 'Video AVI (Aplikasi Virtual Informasi) PN Negara', 'TJLAOCuDG9M', NULL, '2022-04-13 01:49:03', NULL),
	(16, 'Tutorial AVI PN Negara', 'dMwZ2MFH_mA', NULL, '2022-04-13 01:47:54', NULL),
	(30, 'PELAYANAN TERPADU SATU PINTU PENGADILAN NEGERI NEGARA 2021', 'V-LHf2gJGCA', NULL, '2022-04-13 01:50:17', NULL),
	(33, 'Sosialisasi dan Simulasi Pemadam Kebakaran Pengadilan Negeri Negara', 'rSCppZ0036s', NULL, '2022-04-13 01:51:07', NULL),
	(41, 'Antrian Pelayanan Terpadu Satu Pintu Pengadilan Negeri Negara', 'nX0sHxQEzjQ', '2022-04-13 01:51:50', '2022-04-13 01:51:50', NULL),
	(42, 'Simulasi Pengamanan Huru Hara di Pengadilan Negeri Negara', 'bwaFN_Jd_w8', '2022-04-13 01:53:38', '2022-04-13 01:53:38', NULL);
/*!40000 ALTER TABLE `video_informasi` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
