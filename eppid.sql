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

-- Dumping structure for table eppid.admin_auth
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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid.admin_auth: 3 rows
/*!40000 ALTER TABLE `admin_auth` DISABLE KEYS */;
INSERT INTO `admin_auth` (`id`, `nama`, `nip`, `jabatan`, `email`, `password`, `foto_profil`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Oka', '12345678', 'Petugas Informasi', 'onsdee86@gmail.com', '$2y$10$8/5QQKelnL/Q8TAtCx2fdO49oFonP8yg/ikb2dULmeduB6nMGBT/a', 'no-profil.jpg', NULL, NULL, NULL),
	(12, 'I Wayan Dirga, SH', '123', 'PPID Kepaniteraan', 'pnbli@gmail.com', '$2y$10$loPDw9.4qvPBPG03QkPXFe/EQ43HZ5TQFXns765TS/u3mzezvhS9.', 'no-profil.jpg', '2022-03-06 10:11:23', '2022-03-06 10:11:23', NULL),
	(13, 'Sopiah, SH', '123', 'PPID Kesekretariatan', 'pnbli2@gmail.com', '$2y$10$iMzDAzUaQyt7UJqSieCgQORw2YHxNQjYI1mgb4PaswhEN1st.jnhm', 'no-profil.jpg', '2022-03-06 10:11:56', '2022-03-06 10:11:56', NULL);
/*!40000 ALTER TABLE `admin_auth` ENABLE KEYS */;

-- Dumping structure for table eppid.jenis_informasi
CREATE TABLE IF NOT EXISTS `jenis_informasi` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `jenis_informasi` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid.jenis_informasi: 5 rows
/*!40000 ALTER TABLE `jenis_informasi` DISABLE KEYS */;
INSERT INTO `jenis_informasi` (`id`, `jenis_informasi`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Perkara dan Putusan', NULL, NULL, NULL),
	(2, 'Kepegawaian', NULL, NULL, NULL),
	(3, 'Pengawasan', NULL, NULL, NULL),
	(4, 'Anggaran dan Aset', NULL, NULL, NULL),
	(5, 'Lainnya', NULL, NULL, NULL);
/*!40000 ALTER TABLE `jenis_informasi` ENABLE KEYS */;

-- Dumping structure for table eppid.jenis_keberatan
CREATE TABLE IF NOT EXISTS `jenis_keberatan` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `jenis_keberatan` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid.jenis_keberatan: 7 rows
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

-- Dumping structure for table eppid.jumlah_permohonan
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

-- Dumping data for table eppid.jumlah_permohonan: 0 rows
/*!40000 ALTER TABLE `jumlah_permohonan` DISABLE KEYS */;
/*!40000 ALTER TABLE `jumlah_permohonan` ENABLE KEYS */;

-- Dumping structure for table eppid.keberatan
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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid.keberatan: 2 rows
/*!40000 ALTER TABLE `keberatan` DISABLE KEYS */;
INSERT INTO `keberatan` (`id`, `permohonan_id`, `tanggal_keberatan`, `jenis_keberatan_id`, `isi_keberatan`, `email`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(13, 15, '2022-03-07', 1, 'Harusnya bisa', 'okawinza@gmail.com', 'Sudah ditindaklanjuti', '2022-03-06 10:53:33', '2022-03-06 10:53:33', NULL),
	(14, 17, '2022-03-07', 1, 'Kenapa?', 'okawinza@gmail.com', 'Sudah ditindaklanjuti', '2022-03-06 11:15:19', '2022-03-06 11:15:19', NULL);
/*!40000 ALTER TABLE `keberatan` ENABLE KEYS */;

-- Dumping structure for table eppid.laporan_layanan
CREATE TABLE IF NOT EXISTS `laporan_layanan` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `tahun` varchar(250) DEFAULT NULL,
  `laporan` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid.laporan_layanan: 2 rows
/*!40000 ALTER TABLE `laporan_layanan` DISABLE KEYS */;
INSERT INTO `laporan_layanan` (`id`, `tahun`, `laporan`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(3, '2021', 'laporan-1645543330.pdf', '2022-02-22 09:22:10', '2022-02-22 09:22:10', NULL),
	(4, '2020', 'laporan-1645543354.pdf', '2022-02-22 09:22:34', '2022-02-22 09:22:34', NULL);
/*!40000 ALTER TABLE `laporan_layanan` ENABLE KEYS */;

-- Dumping structure for table eppid.layanan_elektronik
CREATE TABLE IF NOT EXISTS `layanan_elektronik` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(250) DEFAULT NULL,
  `link` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid.layanan_elektronik: 1 rows
/*!40000 ALTER TABLE `layanan_elektronik` DISABLE KEYS */;
INSERT INTO `layanan_elektronik` (`id`, `alias`, `link`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Ecourt PN Bangli', 'https://ecourt.mahkamahagung.go.id/index.php/', '2022-02-22 18:04:11', '2022-02-22 18:04:11', NULL);
/*!40000 ALTER TABLE `layanan_elektronik` ENABLE KEYS */;

-- Dumping structure for table eppid.level1
CREATE TABLE IF NOT EXISTS `level1` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `level1` varchar(20) DEFAULT NULL,
  `nama` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid.level1: 3 rows
/*!40000 ALTER TABLE `level1` DISABLE KEYS */;
INSERT INTO `level1` (`id`, `level1`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(4, 'A', 'Informasi yang Wajib Diumumkan Secara Berkala oleh Pengadilan', NULL, '2022-01-11 06:27:45', NULL),
	(5, 'B', 'Informasi Wajib Diumumkan Secara Berkala oleh Mahkamah Agung', NULL, NULL, NULL),
	(6, 'C', 'Informasi yang Wajib Tersedia setiap Saat dan Dapat Diakses oleh Publik', NULL, NULL, NULL);
/*!40000 ALTER TABLE `level1` ENABLE KEYS */;

-- Dumping structure for table eppid.level2
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

-- Dumping data for table eppid.level2: 11 rows
/*!40000 ALTER TABLE `level2` DISABLE KEYS */;
INSERT INTO `level2` (`id`, `level1`, `level2`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'A', '1', 'Informasi Profil dan Pelayanan Dasar Pengadilan', NULL, '2022-01-10 09:59:48', NULL),
	(2, 'A', '2', 'Informasi berkaitan dengan hak masyarakat', NULL, NULL, NULL),
	(3, 'A', '3', 'Informasi Program Kerja, Kegiatan, Keuangan dan Kinerja Pengadilan', NULL, NULL, NULL),
	(4, 'A', '4', 'Informasi Laporan Akses Informasi', NULL, NULL, NULL),
	(5, 'A', '5', 'Informasi Lain', NULL, NULL, NULL),
	(6, 'B', '1', 'Informasi Serta Merta', NULL, NULL, NULL),
	(7, 'C', '1', 'Umum', NULL, NULL, NULL),
	(8, 'C', '2', 'Informasi tentang perkara dan persidangan', NULL, NULL, NULL),
	(9, 'C', '3', 'Informasi tentang Pengawasan dan Pendispilinan', NULL, NULL, NULL),
	(10, 'C', '4', ' Informasi tentang Peraturan, Kebijakan dan Hasil Penelitian', NULL, NULL, NULL),
	(11, 'C', '5', ' Informasi tentang Organisasi, Administrasi, Kepegawaian dan Keuangan', NULL, NULL, NULL);
/*!40000 ALTER TABLE `level2` ENABLE KEYS */;

-- Dumping structure for table eppid.level3
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
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid.level3: 27 rows
/*!40000 ALTER TABLE `level3` DISABLE KEYS */;
INSERT INTO `level3` (`id`, `level1`, `level2`, `level3`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'A', '1', '1', 'Profil Pengadilan tes', NULL, '2022-01-10 10:03:16', NULL),
	(2, 'A', '1', '2', 'Prosedur beracara', NULL, NULL, NULL),
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
	(16, 'A', '5', '1', 'Informasi lain', NULL, NULL, NULL),
	(17, 'B', '1', '1', 'Informasi Serta Merta', NULL, NULL, NULL),
	(18, 'C', '1', '1', 'Umum', NULL, NULL, NULL),
	(19, 'C', '2', '1', 'Informasi putusan', NULL, NULL, NULL),
	(20, 'C', '2', '2', 'Laporan penggunaan biaya perkara', NULL, NULL, NULL),
	(21, 'C', '2', '3', 'Statistik perkara', NULL, NULL, NULL),
	(22, 'C', '3', '1', 'Informasi pengawasan dan pendisiplinan', NULL, NULL, NULL),
	(23, 'C', '4', '1', 'Informasi tentang peraturan dan kebijakan', NULL, NULL, NULL),
	(24, 'C', '5', '1', 'Pedoman pengelolaan   organisasi,   administrasi,   personel   dan   keuangan Pengadilan', NULL, NULL, NULL),
	(25, 'C', '5', '2', 'Standar dan maklumat pelayanan', NULL, NULL, NULL),
	(26, 'C', '5', '3', 'Anggaran serta laporan keuangannya', NULL, NULL, NULL),
	(27, 'C', '5', '4', 'Informasi lainnya', NULL, NULL, NULL);
/*!40000 ALTER TABLE `level3` ENABLE KEYS */;

-- Dumping structure for table eppid.link_informasi
CREATE TABLE IF NOT EXISTS `link_informasi` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `level1` varchar(10) DEFAULT NULL,
  `level2` varchar(10) DEFAULT NULL,
  `level3` varchar(10) DEFAULT NULL,
  `level4` varchar(10) DEFAULT NULL,
  `uraian` text,
  `link` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid.link_informasi: 50 rows
/*!40000 ALTER TABLE `link_informasi` DISABLE KEYS */;
INSERT INTO `link_informasi` (`id`, `level1`, `level2`, `level3`, `level4`, `uraian`, `link`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'A', '1', '1', '1', 'Fungsi dan tugas Pengadilan Negeri Bangli tes', 'https://pn-bangli.go.id/index.php/tentang-pengadilan/tugas-pokok-dan-fungsi', NULL, '2022-01-06 07:06:22', NULL),
	(2, 'A', '1', '1', '2', 'Yuridiksi Pengadilan Negeri Bangli', 'https://pn-bangli.go.id/index.php/tentang-pengadilan/profil-pengadilan/peta-yuridiksi', NULL, '2022-01-03 07:28:32', NULL),
	(3, 'A', '1', '1', '3', 'Alamat, telepon, faksimili, dan situs resmi Pengadilan Negeri Bangli tes', 'https://pn-bangli.go.id/index.php/hubungi-kami/alamat-pengadilan', NULL, '2022-01-03 18:39:29', NULL),
	(4, 'A', '1', '1', '4', 'Profil Ketua dan Wakil Ketua Pengadilan Negeri Bangli', 'https://pn-bangli.go.id/index.php/tentang-pengadilan/profil-hakim-dan-pegawai/profil-ketua-dan-wakil-ketua', NULL, NULL, NULL),
	(5, 'A', '1', '1', '5', 'Profil Hakim Pengadilan Negeri Bangli', 'https://pn-bangli.go.id/index.php/tentang-pengadilan/profil-hakim-dan-pegawai/profil-hakim', NULL, NULL, NULL),
	(6, 'A', '1', '1', '6', 'Profil Pejabat Fungsional Pengadilan Negeri Bangli', 'https://pn-bangli.go.id/index.php/tentang-pengadilan/profil-hakim-dan-pegawai/profil-pejabat-fungsional', NULL, NULL, NULL),
	(7, 'A', '1', '1', '7', 'Profil Pejabat Struktural Pengadilan Negeri Bangli', 'https://pn-bangli.go.id/index.php/tentang-pengadilan/profil-hakim-dan-pegawai/profil-pejabat-struktural', NULL, NULL, NULL),
	(8, 'A', '1', '1', '8', 'Laporan Harta Kekayaan Negara (LHKPN) Pengadilan Negeri Bangli', 'https://pn-bangli.go.id/index.php/layanan-publik/transparansi/lhkpn', NULL, NULL, NULL),
	(9, 'A', '1', '1', '9', 'Laporan Harta Kekayaan Negara (LHKPN) Pengadilan Negeri Bangli', 'https://pn-bangli.go.id/index.php/layanan-publik/transparansi/lhkasn', NULL, NULL, NULL),
	(10, 'A', '1', '2', '1', 'Prosedur   beracara   perkara pidana Pengadilan Negeri Bangli', 'https://pn-bangli.go.id/index.php/tentang-pengadilan/kepaniteraan/kepaniteraan-pidana/alur-persidangan-pidana', NULL, NULL, NULL),
	(11, 'A', '1', '2', '2', 'Prosedur   beracara   perkara perdata Pengadilan Negeri Bangli', 'https://pn-bangli.go.id/index.php/tentang-pengadilan/kepaniteraan/kepaniteraan-perdata/alur-persidangan-perkara-perdata', NULL, NULL, NULL),
	(12, 'A', '1', '3', '1', 'Biaya  yang  berhubungan  dengan  proses  penyelesaian  perkara Pengadilan Negeri Bangli', 'https://pn-bangli.go.id/index.php/tentang-pengadilan/kepaniteraan/kepaniteraan-perdata/alur-persidangan-perkara-perdata', NULL, NULL, NULL),
	(13, 'A', '1', '3', '2', 'Biaya  biaya   hak-hak   kepaniteraan   Pengadilan Negeri Bangli', 'https://drive.google.com/file/d/1z42Z13T9utBUCijDubcSMopdBIneckY9/view', NULL, NULL, NULL),
	(14, 'A', '1', '4', '0', 'Agenda sidang pada Pengadilan Tingkat Pertama', 'http://sipp.pn-bangli.go.id/list_jadwal_sidang', NULL, NULL, NULL),
	(15, 'A', '2', '1', '1', 'Hak-hak dalam proses persidangan', 'https://pn-bangli.go.id/index.php/layanan-publik/hak-hak-masyarakat/hak-dalam-proses-persidangan', NULL, NULL, NULL),
	(16, 'A', '2', '1', '2', 'Hak-hak para pihak', 'https://pn-bangli.go.id/index.php/layanan-publik/hak-hak-masyarakat/hak-para-pihak', NULL, NULL, NULL),
	(17, 'A', '2', '1', '3', 'Hak tersangka dan terdakwa', 'https://pn-bangli.go.id/index.php/layanan-publik/hak-hak-masyarakat/hak-hak-tersangka-dan-terdakwa', NULL, NULL, NULL),
	(18, 'A', '2', '2', '0', 'Tatacara pengaduan dugaan pelanggaran yang dilakukan Hakim dan Pegawai Pengadilan Negeri Bangli', 'https://pn-bangli.go.id/index.php/layanan-publik/prosedur-pengaduan', NULL, NULL, NULL),
	(19, 'A', '2', '3', '0', 'Hak-hak pelapor dugaan pelanggaran Hakim dan Pegawai Pengadilan Negeri Bangli', 'https://pn-bangli.go.id/index.php/layanan-publik/hak-hak-masyarakat/hak-pelapor-dan-terlapor', NULL, NULL, NULL),
	(20, 'A', '2', '4', '0', 'Tata  cara  memperoleh  pelayanan informasi, serta tata  cara  mengajukan  keberatan terhadap  pelayanan  informasi,  nama  dan  nomor  kontak pihak-pihak  yang bertanggungjawab   atas   pelayanan informasi dan   penanganan   keberatan terhadap pelayanan informasi, serta biaya perolehan informasi', 'https://pn-bangli.go.id/index.php/layanan-publik/prosedur-permohonan-informasi', NULL, NULL, NULL),
	(21, 'A', '2', '5', '0', 'Hak-hak pemohon informasi dalam pelayanan informasi', 'https://pn-bangli.go.id/index.php/layanan-publik/prosedur-permohonan-informasi', NULL, NULL, NULL),
	(22, 'A', '3', '1', '0', ' Sistem Akuntabilitas Kinerja Instansi Pemerintahan Pengadilan Negeri Bangli', 'https://pn-bangli.go.id/index.php/layanan-publik/transparansi/sakip', NULL, NULL, NULL),
	(23, 'A', '3', '2', '0', 'Laporan Realisasi Anggaran Pengadilan Negeri Bangli', 'https://pn-bangli.go.id/index.php/layanan-publik/transparansi/laporan-realisasi-anggaran', NULL, NULL, NULL),
	(24, 'A', '3', '3', '0', 'Daftar Aset dan Inventaris', 'https://pn-bangli.go.id/index.php/layanan-publik/transparansi/data-aset-inventaris', NULL, NULL, NULL),
	(25, 'A', '3', '4', '0', 'Pengumuman Pengadaan Barang dan Jasa Pengadilan Negeri Bangli', 'https://pn-bangli.go.id/index.php/layanan-publik/pengumuman/umum', NULL, NULL, NULL),
	(26, 'A', '4', '1', '0', 'Laporan Akses Informasi', '', NULL, NULL, NULL),
	(27, 'A', '5', '1', '0', 'Informasi tentang prosedur peringatan dini dan prosedur keadaan darurat', 'https://pn-bangli.go.id/index.php/layanan-publik/prosedur-peringatan-dini-prosedur-evakuasi-keadaan-darurat', NULL, NULL, NULL),
	(28, 'A', '6', '1', '0', 'Informasi penerimaan pegawai', 'https://pn-bangli.go.id/index.php/layanan-publik/pengumuman/penerimaan-pegawai', NULL, NULL, NULL),
	(29, 'B', '1', '1', '0', 'Informasi serta merta', 'https://pn-bangli.go.id/index.php/berita/berita-terkini', NULL, NULL, NULL),
	(30, 'C', '1', '1', '0', 'Informasi yang wajib diumumkan secara berkala', 'berkala', NULL, '2022-03-06 17:39:03', NULL),
	(31, 'C', '2', '1', '1', 'Informasi putusan Pengadilan Negeri Bangli', 'https://putusan3.mahkamahagung.go.id/pengadilan/profil/pengadilan/pn-bangli.html', NULL, NULL, NULL),
	(32, 'C', '2', '2', '0', 'Informasi penggunaan biaya perkara', '', NULL, NULL, NULL),
	(33, 'C', '3', '1', '0', 'Informasi tentang Pengawasan dan Pendisiplinan', 'https://bawas.mahkamahagung.go.id/', NULL, NULL, NULL),
	(34, 'C', '4', '1', '0', 'Informasi tentang Peraturan, Kebijakan dan Hasil Penelitian', 'https://jdih.mahkamahagung.go.id/', NULL, NULL, NULL),
	(35, 'C', '5', '1', '1', 'Pedoman pengelolaan organisasi', 'https://perpustakaan.mahkamahagung.go.id/read/ebook/79', NULL, NULL, NULL),
	(36, 'C', '5', '1', '2', 'Pedoman pengelolaan administrasi', 'https://perpustakaan.mahkamahagung.go.id/read/ebook/138', NULL, NULL, NULL),
	(37, 'C', '5', '2', '1', 'Standar Pelayanan', 'https://drive.google.com/file/d/1z42Z13T9utBUCijDubcSMopdBIneckY9/view', NULL, NULL, NULL),
	(38, 'C', '5', '2', '2', 'Maklumat pelayanan', 'https://pn-bangli.go.id/index.php/tentang-pengadilan/ptsp/maklumat-pelayanan', NULL, NULL, NULL),
	(39, 'C', '5', '3', '1', 'DIPA dan RKAKL Pengadilan Negeri Bangli', 'https://pn-bangli.go.id/index.php/layanan-publik/transparansi/dipa', NULL, NULL, NULL),
	(40, 'C', '5', '3', '2', 'Laporan Realisasi Anggaran Pengadilan Negeri Bangli', 'https://pn-bangli.go.id/index.php/layanan-publik/transparansi/laporan-realisasi-anggaran', NULL, NULL, NULL),
	(41, 'C', '5', '4', '0', 'Infromasi lainnya', 'https://pn-bangli.go.id/index.php/berita/berita-terkini', NULL, NULL, NULL),
	(56, 'A', '1', '1', '10', 'frendy', 'frendy', '2022-04-08 03:13:51', '2022-04-08 03:13:51', NULL),
	(42, 'A', '1', '1', '10', 'fdsa', 'fdsaf', '2022-01-10 11:24:10', '2022-01-10 11:24:10', NULL),
	(43, 'B', '1', '1', '1', 'fdaf', 'fdafda', '2022-01-10 11:26:57', '2022-01-10 11:26:57', NULL),
	(44, 'B', '1', '1', '1', 'fdas', 'fdsaf', '2022-01-10 11:26:57', '2022-01-10 11:26:57', NULL),
	(45, 'B', '1', '1', '2', 'yyy', 'yyy', '2022-01-10 11:37:30', '2022-01-10 11:37:30', NULL),
	(46, 'B', '1', '1', '2', 'bbb', 'bbb', '2022-01-10 11:37:30', '2022-01-10 11:37:30', NULL),
	(47, 'B', '1', '1', '3', 'uu', 'uuu', '2022-01-10 11:44:08', '2022-01-10 11:44:08', NULL),
	(48, 'B', '1', '1', '4', 'uuu', 'ttt', '2022-01-10 11:50:55', '2022-01-10 11:50:55', NULL),
	(49, 'B', '1', '1', '5', 'uuu', 'yyy', '2022-01-10 11:50:55', '2022-01-10 11:50:55', NULL);
/*!40000 ALTER TABLE `link_informasi` ENABLE KEYS */;

-- Dumping structure for table eppid.link_terkait
CREATE TABLE IF NOT EXISTS `link_terkait` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `alias` varchar(250) DEFAULT NULL,
  `link` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid.link_terkait: 1 rows
/*!40000 ALTER TABLE `link_terkait` DISABLE KEYS */;
INSERT INTO `link_terkait` (`id`, `alias`, `link`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(10, 'Pengadilan Negeri Bangli', 'https://pn-bangli.go.id/', '2022-02-22 17:15:18', '2022-02-22 17:15:18', NULL);
/*!40000 ALTER TABLE `link_terkait` ENABLE KEYS */;

-- Dumping structure for table eppid.migrations
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

-- Dumping data for table eppid.migrations: 24 rows
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

-- Dumping structure for table eppid.peraturan
CREATE TABLE IF NOT EXISTS `peraturan` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `nomor_peraturan` varchar(250) DEFAULT NULL,
  `tentang` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid.peraturan: 4 rows
/*!40000 ALTER TABLE `peraturan` DISABLE KEYS */;
INSERT INTO `peraturan` (`id`, `nomor_peraturan`, `tentang`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Undang-undang Nomor 14 Tahun 2008-2011 555', 'Keterbukaan Informasi Publik', '2022-02-03 08:04:45', '2022-02-03 08:04:45', NULL),
	(2, 'Undang-undang Nomor 5 Tahun 2009', 'Pelayanan Publik', '2022-02-03 08:04:45', '2022-02-03 08:04:45', NULL),
	(3, 'Undang-undang Nomor 14 Tahun 2008', 'Keterbukaan Informasi Publik', '2022-02-03 08:05:21', '2022-02-03 08:05:21', NULL),
	(4, 'Undang-undang Nomor 5 Tahun 2009', 'Pelayanan Publik', '2022-02-03 08:05:21', '2022-02-03 08:05:21', NULL);
/*!40000 ALTER TABLE `peraturan` ENABLE KEYS */;

-- Dumping structure for table eppid.permohonan
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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid.permohonan: 4 rows
/*!40000 ALTER TABLE `permohonan` DISABLE KEYS */;
INSERT INTO `permohonan` (`id`, `id_jenis_informasi`, `nomor_register`, `tanggal_permohonan`, `isi_permohonan`, `file_permohonan`, `email`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(14, 1, '1/2022', '2022-03-06', 'Apa perbedaan banding dan kasasi?', NULL, 'okawinza@gmail.com', 'Sudah ditindaklanjuti', '2022-03-06 08:25:10', '2022-03-06 08:25:10', NULL),
	(15, 3, '2/2022', '2022-03-07', 'Apa hasil pemeriksaan si A?', NULL, 'okawinza@gmail.com', 'Pengajuan keberatan', '2022-03-06 10:50:42', '2022-03-06 10:53:33', NULL),
	(16, 1, '3/2022', '2022-03-07', 'Perkara A kapan putus?', NULL, 'okawinza@gmail.com', 'Sudah ditindaklanjuti', '2022-03-06 10:57:12', '2022-03-06 10:57:12', NULL),
	(17, 3, '4/2022', '2022-03-07', 'Apakah hasil dia?', NULL, 'okawinza@gmail.com', 'Pengajuan keberatan', '2022-03-06 11:13:33', '2022-03-06 11:15:19', NULL);
/*!40000 ALTER TABLE `permohonan` ENABLE KEYS */;

-- Dumping structure for table eppid.prasyarat_others
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

-- Dumping data for table eppid.prasyarat_others: 1 rows
/*!40000 ALTER TABLE `prasyarat_others` DISABLE KEYS */;
INSERT INTO `prasyarat_others` (`id`, `prasyarat`, `hubungi_kami`, `faq`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '<h4 style="margin-left:0px;text-align:center;">Prasyarat</h4><p style="margin-left:auto;"><br data-cke-filler="true"></p><h2 style="margin-left:0px;">PRASYARAT PENGGUNA</h2><p><strong>1. Umum</strong></p><p>Dengan mengakses situs ini, Anda setuju untuk terikat dengan Syarat dan Ketentuan Penggunaan, semua hukum dan peraturan, dan setuju bahwa Anda bertanggung jawab untuk mematuhi hukum dan peraturan yang berlaku. Bacalah dengan seksama Syarat dan Ketentuan Penggunaan di bawah sebelum mengakses situs ini, sehingga Anda dapat menggunakan situs situs ini dengan baik. Bila Anda tidak menyetujui prasyarat penggunaan, sebaiknya Anda tidak meneruskan ke langkah berikutnya.</p><p><strong>2. Permohonan Informasi dan Keberatan</strong></p><p>Dengan membuat akun pada situs ini, Anda dianggap telah menandatangani dokumen sebagaimana dalam Lampiran VII dan Lampiran IX SK KMA Nomor : 1-144/KMA/SK/I/2011 serta dengan dipublikasikannya jawaban dan tanggapan atas keberatan, Anda telah dianggap menanandtangani dokumen tanda terima informasi dan keberatan.</p><p><strong>3. Modifikasi Syarat dan Ketentuan</strong><br>Pengadilan Negeri Bangli (PN Bangli) dapat merevisi Syarat dan Ketentuan Penggunaan untuk situs ini setiap saat tanpa pemberitahuan. Oleh sebab itu diharapkan Anda mengikuti perkembangannya secara periodik.</p><p><strong>4. Hukum</strong><br>Setiap klaim yang berkaitan dengan situs PN Bangli ini terikat oleh hukum di Negara Republik Indonesia tanpa terkecuali.</p><p><strong>5. Revisi dan Kesalahan</strong></p><p>Materi yang muncul di situs PN Bangli dapat memiliki kesalahan teknis, kesalahan ketik, atau fotografi. PN Bangli dapat membuat perubahan materi yang terkandung di situs setiap saat tanpa adanya pemberitahuan. PN Bangli tidak membuat komitmen apapun untuk memperbaharui materi.</p><p><strong>6. Jaminan Sajian</strong><br>Situs ini dibangun untuk kenyamanan pengunjung Internet Kami. Untuk itu Kami berusaha menyajikan seluruh informasi (teks, grafis dan seluruh atribut yang ada) dengan sebaik-baiknya. Seluruh hasitus dalam situs ini dirancang menggunakan format 1024 x 768 piksel dan gunakanlah browser Internet Explorer (versi 5.00 ke atas) untuk mendapatkan hasil yang optimal layanan. Namun Kami tidak dapat menjamin bahwa informasi yang kami sajikan dapat memenuhi keinginan seluruh pengguna situs ini.</p><p><strong>7. Copyright</strong><br>Isi keseluruhan (teks, grafis dan seluruh atribut yang ada) pada situs ini adalah karya cipta dan properti PN Bangli yang dilindungi hukum. Segala bentuk penggunaan material yang bersifat komersial harus seizin Kemenkeu. Segala tindakan yang dengan sengaja mengakibatkan rusaknya data, program, informasi dan hal-hal yang berkaitan dengan itu, dianggap sebagai perbuatan melanggar hukum.</p><p><strong>8. Virus</strong><br>Dampak dari perkembangan teknologi informasi adalah timbulnya virus komputer baru di Internet, maka Kami memperingatkan Anda tentang bahaya yang ditimbulkan oleh virus tersebut terhadap sistem Anda. Merupakan tanggung jawab Anda untuk mendeteksi semua materi yang di-download unduh dari Internet. Kami tidak bertanggung jawab terhadap segala bahaya atau kerusakan yang ditimbulkan oleh virus tersebut.</p><p><strong>9. Keamanan Transmisi</strong><br>Penggunaan Internet dan e-mail tidaklah bersifat rahasia karena terdapat kemungkinan informasi yang dikirimkan kepada Kami terbaca atau digunakan oleh pihak lain. Untuk melindungi rahasia Anda, sebaiknya e-mail yang dikirimkan tidak berisi informasi yang sensitif seperti nilai rekening, laporan keuangan, dsb.</p><p><strong>10. Link ke Situs Lain</strong><br>Situs ini menyediakan beberapa link untuk memudahkan Anda melihat informasi yang berhubungan dengan situs-situs lain. Kami tidak melakukan pemeliharaan dan kontrol terhadap para organisasi pemilik situs atau para organisasi penyedia informasi tersebut. Oleh karena itu informasi yang tersaji tersebut berada di luar tanggung jawab kami.</p><p><strong>11. E-mail</strong><br>E-mail merupakan alat komunikasi yang penting bagi pengunjung situs Kami. Kami menggunakan e-mail semata-mata untuk tujuan korespondensi dan komunikasi dengan Anda. Kami menggunakan alamat e-mail Anda untuk mengirimkan informasi tentang produk maupun pelayanan yang mungkin menarik bagi Anda. Apabila Anda tidak ingin melakukan kontak dengan kami, silahkan kirimkan ketidakinginan Anda pada Kami.</p><p><strong>12. Terminasi Akses</strong><br>Kami berhak untuk menghentikan akses terhadap situs ini dengan memproteksi password terhadap penyalahgunaan situs ini.</p><p><strong>13. Umpan Balik</strong><br>Untuk menghindari segala kesalahpahaman, Kami menghargai segala masukan yang diberikan ataupun yang Anda kirimkan kepada Kami, baik ide, saran, usulan, dsb; akan menjadi milik Kami tanpa diberikan kompensasi dan tidak ada klaim untuk hal tersebut.</p>', '<h4 style="margin-left:0px;text-align:center;">Hubungi Kami</h4><p style="margin-left:auto;"><br data-cke-filler="true"></p><p style="text-align:center;"><strong>&nbsp;PPID PENGADILAN NEGERI BANGLI</strong></p><p style="text-align:center;"><strong>&nbsp;Meja Informasi&nbsp;</strong><br><strong>&nbsp;Pengadilan Negeri Bangli</strong><br><strong>&nbsp;Jl. Brigjen Ngurah Rai No.61, Bangli, Bali</strong><br><strong>&nbsp;T. (0366) 91030</strong><br><strong>&nbsp;F. (0366) 91120</strong><br><strong>&nbsp; e-mail:&nbsp;</strong><a href="mailto:ppid.kemenkeu@kemenkeu.go.id"><strong>info@pn-bangli.go.id</strong></a><strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</strong><br><strong>&nbsp;<u>https://pn-bangli.go.id</u></strong></p>', '<h4 style="margin-left:0px;text-align:center;">FAQ</h4><p style="margin-left:auto;"><br data-cke-filler="true"></p><ol><li><strong>Siapa yang dapat mengajukan permohonan informasi publik?</strong><br>Setiap warga negara Indonesia dan/atau badan hukum Indonesia sebagaimana diatur dalam Undang-Undang Republik Indonesia Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik.</li><li><strong>Apakah persyaratan mengajukan permohonan informasi publik dan keberatan?</strong><br>Menginputkan NIK yang sah dan berlaku.</li><li><strong>Bagaimana cara mendaftar sebagai pengguna layanan informasi publik PN Bangli?</strong><ol style="list-style-type:lower-alpha;"><li>Melakukan registrasi terlebih dahulu pada aplikasi web e-PPID PN Bangli melalui tombol login kemudian klik daftar</li><li>Melengkapi kolom yang telah disediakan.</li></ol></li><li><strong>Bagaimana cara mengajukan permohonan informasi publik?</strong><ol style="list-style-type:lower-alpha;"><li>Permohonan informasi dapat diajukan melalui aplikasi web e-PPID KPN Bangli melalui menu&nbsp;Permohonan, sub-menu&nbsp;Permohonan Informasi;</li><li>Melengkapi kolom yang telah disediakan dan melampirkan dokumen pendukung apabila ada;</li><li>Apabila data permohonan informasi sudah lengkap,&nbsp;pengguna&nbsp;akan menerima&nbsp;email&nbsp;konfirmasi dari PPID, bahwa permohonan informasi sudah&nbsp;diterima dan sedang diproses.</li></ol></li><li><strong>Bagaimana mekanisme pemberian tanggapan PPID atas permohonan informasi publik?</strong><br>Tanggapan atas permohonan informasi publik akan langsung dijawab melalui aplikasi dan Anda telah dianggap menandatangani surat penerimaan informasi.</li><li><strong>Berapa lama pemberian tanggapan PPID atas permohonan informasi publik?</strong><br>Tanggapan dari PPID berupa Pemberitahuan Tertulis akan disampaikan paling lambat 6 (enam) hari kerja sejak permohonan informasi telah memenuhi persyaratan dan dapat diperpanjang 7 (tujuh) hari kerja berikutnya.</li><li><strong>Bagaimana cara pengajuan keberatan atas informasi publik PN Bangli?</strong><ol style="list-style-type:lower-alpha;"><li>Keberatan dapat diajukan melalui aplikasi web e-PPID PN Bangli melalui tombol aksi keberatan dalam daftar permohonan informasi</li><li>Melengkapi kolom yang telah disediakan;</li><li>Melampirkan dokumen pendukung apabila ada.</li></ol></li><li><strong>Berapa biaya untuk memperoleh informasi publik?</strong><br>PPID PN Bangli tidak mengenakan biaya terhadap perolehan informasi.</li><li><strong>Waktu layanan informasi:</strong><br>Layanan informasi publik dilaksanakan pada setiap hari kerja Senin s.d. Jumat dari pukul 08.00 WIB – 16.30 WITA.</li></ol>', '2022-02-22 16:10:40', '2022-02-22 16:10:40', NULL);
/*!40000 ALTER TABLE `prasyarat_others` ENABLE KEYS */;

-- Dumping structure for table eppid.profil_ppid
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

-- Dumping data for table eppid.profil_ppid: 2 rows
/*!40000 ALTER TABLE `profil_ppid` DISABLE KEYS */;
INSERT INTO `profil_ppid` (`id`, `profil`, `tupoksi`, `struktur`, `visimisi`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(4, '<h3 style="margin-left:0px;text-align:center;"><strong>PROFIL SINGKAT PPID</strong></h3><h3 style="margin-left:0px;text-align:center;"><strong>MAHKAMAH AGUNG RI XXX</strong></h3><p style="margin-left:0px;text-align:justify;">Mahkamah Agung berkomitmen untuk memberikan layanan kepada masyarakat guna memenuhi kebutuhan informasi publik. Hal ini ditunjukkan dengan adanya unit yang memiliki fungsi layanan informasi, yaitu Subbagian Data dan Layanan Informasi pada Bagian Perpustakaan dan Layanan Informasi Biro Hukum dan Hubungan Masyarakat sejak tahun 2006 dengan terbitnya <a href="https://eppid.mahkamahagung.go.id/files/shares/MA_SEK_07_SK_III_2006_opt.pdf"><span style="color:rgb(0,0,255);"><u>SK SEKMA nomor MA/SEK/07/SK/III/2006</u></span></a>.</p><p style="margin-left:0px;text-align:justify;">Setelah itu, terbitlah <a href="https://eppid.mahkamahagung.go.id/files/shares/144-KMA-SK-VIII-2007.pdf"><span style="color:rgb(0,0,255);"><u>SK KMA nomor 144/KMA/SK/VIII/2007</u></span></a> tentang Keterbukaan Informasi di Pengadilan sebagai pedoman pelayanan informasi di Mahkamah Agung dan pengadilan. Di tahun 2007 ini, belum dikenal istilah PPID (Pejabat Pengelola Informasi dan Dokumentasi) dan Atasan PPID melainkan Petugas Informasi dan Dokumentasi dan Penanggung Jawab. Di dalam <a href="https://eppid.mahkamahagung.go.id/files/shares/144-KMA-SK-VIII-2007.pdf">SK KMA 144 tahun 2007</a> ini dijelaskan mengenai informasi yang harus diumumkan pengadilan, tata cara pengumumannya, informasi yang dapat diakses publik, dan tata cara mendapatkan informasi tersebut, biaya, prosedur keberatan, dan pemanfaatan informasi.</p><p>Kemudian, terbitlah <a href="https://eppid.mahkamahagung.go.id/files/shares/UU%2014%20Tahun%202008%20tentang%20Keterbukaan%20Informasi%20Publik.pdf"><span style="color:rgb(0,0,255);"><u>Undang-Undang Nomor 14 Tahun 2008</u></span></a> tentang Keterbukaan Informasi Publik (UU KIP) yang disahkan pada bulan April 2008 dan kemudian mulai berlaku pada bulan April 2010. UU tersebut menggunakan istilah-istilah yang sedikit berbeda dengan yang digunakan pada <a href="https://eppid.mahkamahagung.go.id/files/shares/144-KMA-SK-VIII-2007.pdf">SK KMA 144 tahun 2007</a>, sehingga Mahkamah Agung menindaklanjuti dengan menerbitkan <a href="https://eppid.mahkamahagung.go.id/files/shares/SK_KMA_1-144+(TERBARU+2011).pdf"><span style="color:rgb(0,0,255);"><u>SK KMA nomor 1-144/KMA/SK/I/2011</u></span></a> tentang Pedoman Pelayanan Informasi di Pengadilan.</p><p style="margin-left:0px;text-align:justify;"><a href="https://eppid.mahkamahagung.go.id/files/shares/SK_KMA_1-144+(TERBARU+2011).pdf"><span style="color:rgb(0,0,255);"><u>SK KMA 1-144 tahun 2011</u></span></a> menambahkan beberapa detil yang belum diatur pada <a href="https://eppid.mahkamahagung.go.id/files/shares/144-KMA-SK-VIII-2007.pdf">SK KMA 144 tahun 2007</a>, di antaranya informasi yang dikecualikan, prosedur pengaburan informasi yang disertai dengan contoh, dan formulir-formulir terkait pelayanan informasi. Selain itu, pelaksana pelayanan informasi menjadi empat, yaitu atasan PPID, PPID, penanggung jawab informasi, dan petugas informasi.</p><p style="margin-left:0px;text-align:justify;">Pada tahun 2021, Mahkamah Agung mengembangkan sistem informasi layanan <i>online</i> pemohon informasi pada situs web <a href="https://eppid.mahkamahagung.go.id/adminkitasemua/eppid.mahkamahagung.go.id"><span style="color:rgb(0,0,255);">eppid.mahkamahagung.go.id</span></a> yang terkoneksi dengan jaringan internet serta aplikasi <i>back office</i> Sistem Informasi EPPID (SI EPPID) bagi administrator PPID yang juga terkoneksi dengan jaringan intranet. Dengan fasilitas tersebut, pemohon informasi dapat mengajukan permohonan informasi atau keberatan dengan cepat, tanpa perlu menyampaikan surat ataupun datang ke ruang layanan informasi. Situs tersebut juga dilengkapi dengan informasi mengenai pengelolaan keterbukaan informasi publik di lingkungan Mahkamah Agung.</p><p><br data-cke-filler="true"></p>', '<p>Masyarakat sudah tahu</p>', '<h3 style="margin-left:0px;text-align:center;">STRUKTUR ORGANISASI PPID</h3><p style="margin-left:0px;text-align:center;"><br data-cke-filler="true"></p><figure class="image ck-widget image_resized" contenteditable="false" style="width:56.44%;"><img src="http://localhost:8080/eppid/public/img/ckeditor/1642486825_95dbb0ff080c94408e3c.png"><div class="ck ck-reset_all ck-widget__type-around"><div class="ck ck-widget__type-around__button ck-widget__type-around__button_before" title="Insert paragraph before block"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 8"><path d="M9.055.263v3.972h-6.77M1 4.216l2-2.038m-2 2 2 2.038"></path></svg></div><div class="ck ck-widget__type-around__button ck-widget__type-around__button_after" title="Insert paragraph after block"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 8"><path d="M9.055.263v3.972h-6.77M1 4.216l2-2.038m-2 2 2 2.038"></path></svg></div><div class="ck ck-widget__type-around__fake-caret"></div></div></figure><p><br data-cke-filler="true"></p><p style="margin-left:0px;text-align:justify;">Mahkamah Agung berkomitmen untuk memberikan layanan kepada masyarakat guna memenuhi kebutuhan informasi publik. Hal ini ditunjukkan dengan adanya unit yang memiliki fungsi layanan informasi, yaitu Subbagian Data dan Layanan Informasi pada Bagian Perpustakaan dan Layanan Informasi Biro Hukum dan Hubungan Masyarakat sejak tahun 2006 dengan terbitnya <a href="https://eppid.mahkamahagung.go.id/files/shares/MA_SEK_07_SK_III_2006_opt.pdf"><span style="color:rgb(0,0,255);"><u>SK SEKMA nomor MA/SEK/07/SK/III/2006</u></span></a>.</p><p style="margin-left:0px;text-align:justify;">Setelah itu, terbitlah <a href="https://eppid.mahkamahagung.go.id/files/shares/144-KMA-SK-VIII-2007.pdf"><span style="color:rgb(0,0,255);"><u>SK KMA nomor 144/KMA/SK/VIII/2007</u></span></a> tentang Keterbukaan Informasi di Pengadilan sebagai pedoman pelayanan informasi di Mahkamah Agung dan pengadilan. Di tahun 2007 ini, belum dikenal istilah PPID (Pejabat Pengelola Informasi dan Dokumentasi) dan Atasan PPID melainkan Petugas Informasi dan Dokumentasi dan Penanggung Jawab. Di dalam <a href="https://eppid.mahkamahagung.go.id/files/shares/144-KMA-SK-VIII-2007.pdf">SK KMA 144 tahun 2007</a> ini dijelaskan mengenai informasi yang harus diumumkan pengadilan, tata cara pengumumannya, informasi yang dapat diakses publik, dan tata cara mendapatkan informasi tersebut, biaya, prosedur keberatan, dan pemanfaatan informasi.</p><p>Kemudian, terbitlah <a href="https://eppid.mahkamahagung.go.id/files/shares/UU%2014%20Tahun%202008%20tentang%20Keterbukaan%20Informasi%20Publik.pdf"><span style="color:rgb(0,0,255);"><u>Undang-Undang Nomor 14 Tahun 2008</u></span></a> tentang Keterbukaan Informasi Publik (UU KIP) yang disahkan pada bulan April 2008 dan kemudian mulai berlaku pada bulan April 2010. UU tersebut menggunakan istilah-istilah yang sedikit berbeda dengan yang digunakan pada <a href="https://eppid.mahkamahagung.go.id/files/shares/144-KMA-SK-VIII-2007.pdf">SK KMA 144 tahun 2007</a>, sehingga Mahkamah Agung menindaklanjuti dengan menerbitkan <a href="https://eppid.mahkamahagung.go.id/files/shares/SK_KMA_1-144+(TERBARU+2011).pdf"><span style="color:rgb(0,0,255);"><u>SK KMA nomor 1-144/KMA/SK/I/2011</u></span></a> tentang Pedoman Pelayanan Informasi di Pengadilan.</p><p style="margin-left:0px;text-align:justify;"><a href="https://eppid.mahkamahagung.go.id/files/shares/SK_KMA_1-144+(TERBARU+2011).pdf"><span style="color:rgb(0,0,255);"><u>SK KMA 1-144 tahun 2011</u></span></a> menambahkan beberapa detil yang belum diatur pada <a href="https://eppid.mahkamahagung.go.id/files/shares/144-KMA-SK-VIII-2007.pdf">SK KMA 144 tahun 2007</a>, di antaranya informasi yang dikecualikan, prosedur pengaburan informasi yang disertai dengan contoh, dan formulir-formulir terkait pelayanan informasi. Selain itu, pelaksana pelayanan informasi menjadi empat, yaitu atasan PPID, PPID, penanggung jawab informasi, dan petugas informasi.</p><p style="margin-left:0px;text-align:justify;">Pada tahun 2021, Mahkamah Agung mengembangkan sistem informasi layanan <i>online</i> pemohon informasi pada situs web <a href="https://eppid.mahkamahagung.go.id/adminkitasemua/eppid.mahkamahagung.go.id"><span style="color:rgb(0,0,255);">eppid.mahkamahagung.go.id</span></a> yang terkoneksi dengan jaringan internet serta aplikasi <i>back office</i> Sistem Informasi EPPID (SI EPPID) bagi administrator PPID yang juga terkoneksi dengan jaringan intranet. Dengan fasilitas tersebut, pemohon informasi dapat mengajukan permohonan informasi atau keberatan dengan cepat, tanpa perlu menyampaikan surat ataupun datang ke ruang layanan informasi. Situs tersebut juga dilengkapi dengan informasi mengenai pengelolaan keterbukaan informasi publik di lingkungan Mahkamah Agung.</p><p><br data-cke-filler="true"></p><p>image widget</p>', '<h3 style="margin-left:0px;text-align:center;"><strong>VISI DAN MISI PPID</strong></h3><h4 style="margin-left:0px;"><strong>Visi:</strong></h4><p style="margin-left:0px;">Terwujudnya keterbukaan informasi publik secara modern menuju peradilan yang agung</p><h4 style="margin-left:0px;"><strong>Misi:</strong></h4><ol style="list-style-type:lower-roman;"><li>Menyediakan informasi publik yang akurat dan dapat dipertanggungjawabkan</li><li>Memberikan layanan informasi publik yang cepat, tepat, dan sederhana</li><li>Memastikan pengelolaan layanan informasi publik didukung oleh sumber daya manusia yang profesional dan berintegritas</li><li>Memanfaatkan teknologi informasi dan komunikasi yang mutakhir untuk mendukung pengelolaan keterbukaan informasi publik</li></ol>', '2022-01-13 02:56:32', '2022-04-08 03:19:28', NULL),
	(5, '<h3 style="margin-left:0px;text-align:center;"><strong>PROFIL SINGKAT PPID</strong></h3><h3 style="margin-left:0px;text-align:center;"><strong>MAHKAMAH AGUNG RI</strong></h3><p style="margin-left:0px;text-align:justify;">Mahkamah Agung berkomitmen untuk memberikan layanan kepada masyarakat guna memenuhi kebutuhan informasi publik. Hal ini ditunjukkan dengan adanya unit yang memiliki fungsi layanan informasi, yaitu Subbagian Data dan Layanan Informasi pada Bagian Perpustakaan dan Layanan Informasi Biro Hukum dan Hubungan Masyarakat sejak tahun 2006 dengan terbitnya <a href="https://eppid.mahkamahagung.go.id/files/shares/MA_SEK_07_SK_III_2006_opt.pdf"><span style="color:rgb(0,0,255);"><u>SK SEKMA nomor MA/SEK/07/SK/III/2006</u></span></a>.</p><p style="margin-left:0px;text-align:justify;">Setelah itu, terbitlah <a href="https://eppid.mahkamahagung.go.id/files/shares/144-KMA-SK-VIII-2007.pdf"><span style="color:rgb(0,0,255);"><u>SK KMA nomor 144/KMA/SK/VIII/2007</u></span></a> tentang Keterbukaan Informasi di Pengadilan sebagai pedoman pelayanan informasi di Mahkamah Agung dan pengadilan. Di tahun 2007 ini, belum dikenal istilah PPID (Pejabat Pengelola Informasi dan Dokumentasi) dan Atasan PPID melainkan Petugas Informasi dan Dokumentasi dan Penanggung Jawab. Di dalam <a href="https://eppid.mahkamahagung.go.id/files/shares/144-KMA-SK-VIII-2007.pdf">SK KMA 144 tahun 2007</a> ini dijelaskan mengenai informasi yang harus diumumkan pengadilan, tata cara pengumumannya, informasi yang dapat diakses publik, dan tata cara mendapatkan informasi tersebut, biaya, prosedur keberatan, dan pemanfaatan informasi.</p><p>Kemudian, terbitlah <a href="https://eppid.mahkamahagung.go.id/files/shares/UU%2014%20Tahun%202008%20tentang%20Keterbukaan%20Informasi%20Publik.pdf"><span style="color:rgb(0,0,255);"><u>Undang-Undang Nomor 14 Tahun 2008</u></span></a> tentang Keterbukaan Informasi Publik (UU KIP) yang disahkan pada bulan April 2008 dan kemudian mulai berlaku pada bulan April 2010. UU tersebut menggunakan istilah-istilah yang sedikit berbeda dengan yang digunakan pada <a href="https://eppid.mahkamahagung.go.id/files/shares/144-KMA-SK-VIII-2007.pdf">SK KMA 144 tahun 2007</a>, sehingga Mahkamah Agung menindaklanjuti dengan menerbitkan <a href="https://eppid.mahkamahagung.go.id/files/shares/SK_KMA_1-144+(TERBARU+2011).pdf"><span style="color:rgb(0,0,255);"><u>SK KMA nomor 1-144/KMA/SK/I/2011</u></span></a> tentang Pedoman Pelayanan Informasi di Pengadilan.</p><p style="margin-left:0px;text-align:justify;"><a href="https://eppid.mahkamahagung.go.id/files/shares/SK_KMA_1-144+(TERBARU+2011).pdf"><span style="color:rgb(0,0,255);"><u>SK KMA 1-144 tahun 2011</u></span></a> menambahkan beberapa detil yang belum diatur pada <a href="https://eppid.mahkamahagung.go.id/files/shares/144-KMA-SK-VIII-2007.pdf">SK KMA 144 tahun 2007</a>, di antaranya informasi yang dikecualikan, prosedur pengaburan informasi yang disertai dengan contoh, dan formulir-formulir terkait pelayanan informasi. Selain itu, pelaksana pelayanan informasi menjadi empat, yaitu atasan PPID, PPID, penanggung jawab informasi, dan petugas informasi.</p><p style="margin-left:0px;text-align:justify;">Pada tahun 2021, Mahkamah Agung mengembangkan sistem informasi layanan <i>online</i> pemohon informasi pada situs web <a href="https://eppid.mahkamahagung.go.id/adminkitasemua/eppid.mahkamahagung.go.id"><span style="color:rgb(0,0,255);">eppid.mahkamahagung.go.id</span></a> yang terkoneksi dengan jaringan internet serta aplikasi <i>back office</i> Sistem Informasi EPPID (SI EPPID) bagi administrator PPID yang juga terkoneksi dengan jaringan intranet. Dengan fasilitas tersebut, pemohon informasi dapat mengajukan permohonan informasi atau keberatan dengan cepat, tanpa perlu menyampaikan surat ataupun datang ke ruang layanan informasi. Situs tersebut juga dilengkapi dengan informasi mengenai pengelolaan keterbukaan informasi publik di lingkungan Mahkamah Agung.</p><p><br data-cke-filler="true"></p>', '<p>Masyarakat belum tahu</p>', '<h3 style="margin-left:0px;text-align:center;"><strong>STRUKTUR ORGANISASI PPID</strong></h3><p style="margin-left:0px;">Sesuai SK KMA nomor 1-144/KMA/SK/I/2011 ditetapkan:</p><ol style="list-style-type:upper-alpha;"><li>Pelaksana pada Pengadilan Tingkat Pertama dan Banding<ol><li>Pada Peradilan Umum dan Tata Usaha Negara, pelaksana pelayanan informasi dilakukan oleh pejabat sebagai berikut:<ol style="list-style-type:lower-alpha;"><li>Atasan PPID dijabat oleh Pimpinan Pengadilan;</li><li>PPID dijabat oleh Panitera/Sekretaris;</li><li>Petugas Informasi dijabat oleh Panitera Muda Hukum atau pegawai lain yang ditunjuk Ketua Pengadilan; dan</li><li>Penanggungjawab Informasi dijabat oleh Pimpinan unit kerja setingkat eselon IV.</li></ol></li><li>Pada Peradilan Agama dan Militer, pelaksana pelayanan informasi dilakukan oleh Pejabat sebagai berikut:<ol style="list-style-type:lower-alpha;"><li>Atasan PPID dijabat oleh Pimpinan Pengadilan;</li><li>PPID dijabat oleh:<ol style="list-style-type:lower-roman;"><li>Panitera atau Kepala Panitera, mengenai informasi yang berkaitan dengan perkara; dan</li><li>Sekretaris atau Kepala Tata Usaha Dalam, mengenai informasi yang berkaitan dengan pengelolaan organisasi;</li></ol></li><li>Petugas informasi dijabat oleh Panitera Muda Hukum atau pegawai lain yang ditunjuk Ketua Pengadilan; dan</li><li>Penanggungjawab Informasi dijabat oleh Pimpinan unit kerja setingkat eselon IV.</li></ol></li></ol></li><li>Pelaksana pada Mahkamah Agung<ol><li>Atasan PPID dijabat oleh:<ol style="list-style-type:lower-alpha;"><li>Panitera, mengenai informasi yang berkaitan dengan perkara; dan</li><li>Sekretaris, mengenai informasi yang berkaitan dengan organisasi.</li></ol></li><li>PPID di lingkungan Mahkamah Agung dijabat oleh Kepala Biro Hukum dan Hubungan Masyarakat.</li><li>PPID di masing-masing satuan kerja Mahkamah Agung adalah:<ol style="list-style-type:lower-alpha;"><li>Direktur Jenderal Badan Peradilan Umum;</li><li>Direktur Jenderal Badan Peradilan Agama;</li><li>Direktur Jenderal Badan Peradilan Militer dan Tata Usaha Negara;</li><li>Kepala Badan Urusan Administrasi;</li><li>Kepala Badan Penelitian dan Pengembangan Hukum dan Peradilan; dan</li><li>Kepala Badan Pengawasan.</li></ol></li><li>Petugas Informasi di lingkungan Mahkamah Agung dan Badan Urusan Administrasi adalah Kepala Subbagian Data &amp; Pelayanan Informasi.</li><li>Petugas Informasi di masing-masing Direktorat Jenderal Badan Peradilan dan Badan Pengawasan adalah Kepala Subbagian Dokumentasi dan Informasi.</li><li>Petugas Informasi di Badan Penelitian, Pengembangan, Pendidikan dan Pelatihan Hukum dan Peradilan adalah Kepala Subbagian Tata Usaha.</li><li>Penanggungjawab Informasi di lingkungan Mahkamah Agung dan satuan kerja Mahkamah Agung dijabat oleh Pimpinan unit kerja setingkat eselon IV.</li></ol></li></ol>', '<h3 style="margin-left:0px;text-align:center;"><strong>VISI DAN MISI PPID</strong></h3><h4 style="margin-left:0px;"><strong>Visi:</strong></h4><p style="margin-left:0px;">Terwujudnya keterbukaan informasi publik secara modern menuju peradilan yang agung</p><h4 style="margin-left:0px;"><strong>Misi:</strong></h4><ol style="list-style-type:lower-roman;"><li>Menyediakan informasi publik yang akurat dan dapat dipertanggungjawabkan</li><li>Memberikan layanan informasi publik yang cepat, tepat, dan sederhana</li><li>Memastikan pengelolaan layanan informasi publik didukung oleh sumber daya manusia yang profesional dan berintegritas</li><li>Memanfaatkan teknologi informasi dan komunikasi yang mutakhir untuk mendukung pengelolaan keterbukaan informasi publik</li></ol>', '2022-01-13 02:56:34', '2022-01-13 02:56:34', NULL);
/*!40000 ALTER TABLE `profil_ppid` ENABLE KEYS */;

-- Dumping structure for table eppid.profil_satker
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

-- Dumping data for table eppid.profil_satker: 1 rows
/*!40000 ALTER TABLE `profil_satker` DISABLE KEYS */;
INSERT INTO `profil_satker` (`id`, `nama`, `nama_pendek`, `alamat`, `nomor_telepon`, `nomor_whatsapp`, `telegram`, `nomor_fax`, `email`, `link_satker`, `link_youtube`, `link_facebook`, `link_instagram`, `link_twitter`, `link_video_dashboard`, `logo`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(3, 'PENGADILAN NEGERI BANGLI', 'PN BANGLI', 'Jl. Mayor Sugianyar No. 61, Bangli, Bali', '(0366) 91030', '087712604621', '-', '(0366) 5555', 'onsdee86@gmail.com', 'xxxxx', 'xxxx', 'ttttt', 'https://www.instagram.com/pnbangli/', '', '0Akcjvjgaw4', 'logo-pn.jpg', NULL, '2022-04-08 03:16:39', NULL);
/*!40000 ALTER TABLE `profil_satker` ENABLE KEYS */;

-- Dumping structure for table eppid.proses_keberatan
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid.proses_keberatan: 2 rows
/*!40000 ALTER TABLE `proses_keberatan` DISABLE KEYS */;
INSERT INTO `proses_keberatan` (`id`, `keberatan_id`, `status`, `tanggapan`, `lampiran_tanggapan`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(7, 14, 'Menolak', 'Karena Rahasia                        ', NULL, NULL, NULL, NULL),
	(6, 13, 'Menolak', ' Tidak bisa publikasi                       ', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `proses_keberatan` ENABLE KEYS */;

-- Dumping structure for table eppid.proses_permohonan
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
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid.proses_permohonan: 4 rows
/*!40000 ALTER TABLE `proses_permohonan` DISABLE KEYS */;
INSERT INTO `proses_permohonan` (`id`, `permohonan_id`, `proses`, `status_jawaban`, `jenis_penolakan`, `jawaban`, `lampiran_jawaban`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(28, 14, 'Y', 'Sepenuhnya', NULL, 'Banding adalah dan kasasi                        ', NULL, NULL, NULL, NULL),
	(29, 15, 'T', NULL, 'Rahasia', 'Informasi yang anda minta bersifat rahasia                        ', NULL, NULL, NULL, NULL),
	(30, 16, 'Y', 'Sebagian', NULL, ' Tanggal 7 Maret 2022                       ', NULL, NULL, NULL, NULL),
	(31, 17, 'T', NULL, 'Rahasia', 'Permohonan anda bersifat rahasia                        ', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `proses_permohonan` ENABLE KEYS */;

-- Dumping structure for table eppid.standar_layanan
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

-- Dumping data for table eppid.standar_layanan: 1 rows
/*!40000 ALTER TABLE `standar_layanan` DISABLE KEYS */;
INSERT INTO `standar_layanan` (`id`, `maklumat`, `prosedur`, `keberatan`, `sengketa`, `jalur`, `biaya`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(3, 'maklumat-1645483989.jpg', 'prosedur-1645484004.jpg', 'keberatan-1645482739.png', 'sengketa-1645482739.jpg', 'jalur-1645482739.png', 'biaya-1645482739.jpg', '2022-02-21 16:32:19', '2022-02-21 16:53:24', NULL);
/*!40000 ALTER TABLE `standar_layanan` ENABLE KEYS */;

-- Dumping structure for table eppid.statistik_permohonan
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

-- Dumping data for table eppid.statistik_permohonan: 2 rows
/*!40000 ALTER TABLE `statistik_permohonan` DISABLE KEYS */;
INSERT INTO `statistik_permohonan` (`id`, `tahun`, `statistik`, `rekapitulasi`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(5, '2021', 'statistik-1645537666.png', 'rekapitulasi-1645537666.jpg', '2022-02-22 07:47:46', '2022-02-22 07:47:46', NULL),
	(6, '2020', 'statistik-1645537892.png', 'rekapitulasi-1645537892.png', '2022-02-22 07:51:32', '2022-02-22 07:51:32', NULL);
/*!40000 ALTER TABLE `statistik_permohonan` ENABLE KEYS */;

-- Dumping structure for table eppid.user_profil
CREATE TABLE IF NOT EXISTS `user_profil` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `nik` varchar(50) DEFAULT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `nomor_telepon` varchar(250) DEFAULT NULL,
  `alamat` text,
  `pekerjaan` varchar(250) DEFAULT NULL,
  `institusi` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `foto_profil` varchar(250) NOT NULL DEFAULT 'no-profil.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid.user_profil: 2 rows
/*!40000 ALTER TABLE `user_profil` DISABLE KEYS */;
INSERT INTO `user_profil` (`id`, `nik`, `nama`, `email`, `nomor_telepon`, `alamat`, `pekerjaan`, `institusi`, `password`, `foto_profil`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '510', 'Oka Wiadnyana', 'okawinza@gmail.com', '08199999', 'negara', 'Wiraswasta', 'PN', '$2y$10$.Tgk.hvf5a9ig2xy7msM0.AK1frXuw1/VOq2Yxe0jhEmOHiN/SHty', 'no-profil.jpg', NULL, NULL, NULL),
	(2, '510', 'Oka Wiadnyana', 'admin1@gmail.com', '08199999', 'vdsfsadf', 'Wiraswasta', 'PN', '$2y$10$02twI0gdPGdmpw8h.lJPZevq4pBbZkn2.I0n4o5Vq7xEOuTW.jQze', 'no-profil.jpg', NULL, NULL, NULL);
/*!40000 ALTER TABLE `user_profil` ENABLE KEYS */;

-- Dumping structure for table eppid.video_informasi
CREATE TABLE IF NOT EXISTS `video_informasi` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `uraian` varchar(255) DEFAULT NULL,
  `embed_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- Dumping data for table eppid.video_informasi: 21 rows
/*!40000 ALTER TABLE `video_informasi` DISABLE KEYS */;
INSERT INTO `video_informasi` (`id`, `uraian`, `embed_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Video pengenalan Whatsapp Bot Pengadilan Negeri Bangli', 'P8epy8qO0mg', NULL, NULL, NULL),
	(2, 'Sosialisasi Layanan untuk Penyandang Disabilitas', 'Xx4_LrSRwVA', NULL, NULL, NULL),
	(3, 'Video Profile Zona Integritas Pengadilan Negeri Bangli', 'H4emotQALhg', NULL, NULL, NULL),
	(4, 'Testimoni Aplikasi SITI NAIK GALA (PN BANGLI)', 'SnCyTZ4Ac2c', NULL, NULL, NULL),
	(16, 'Video pengenalan Whatsapp Bot Pengadilan Negeri Bangli', 'P8epy8qO0mg', NULL, NULL, NULL),
	(17, 'Sosialisasi Layanan untuk Penyandang Disabilitas', 'Xx4_LrSRwVA', NULL, NULL, NULL),
	(18, 'Video Profile Zona Integritas Pengadilan Negeri Bangli', 'H4emotQALhg&t=5s', NULL, NULL, NULL),
	(19, 'Testimoni Aplikasi SITI NAIK GALA (PN BANGLI)', 'SnCyTZ4Ac2c', NULL, NULL, NULL),
	(20, 'Video pengenalan Whatsapp Bot Pengadilan Negeri Bangli tes', 'P8epy8qO0mg', NULL, NULL, NULL),
	(27, 'Video pengenalan Whatsapp Bot Pengadilan Negeri Bangli', 'P8epy8qO0mg', NULL, NULL, NULL),
	(28, 'Sosialisasi Layanan untuk Penyandang Disabilitas', 'Xx4_LrSRwVA', NULL, NULL, NULL),
	(29, 'Video Profile Zona Integritas Pengadilan Negeri Bangli', 'H4emotQALhg&t=5s', NULL, NULL, NULL),
	(30, 'Testimoni Aplikasi SITI NAIK GALA (PN BANGLI)', 'SnCyTZ4Ac2c', NULL, NULL, NULL),
	(31, 'Video pengenalan Whatsapp Bot Pengadilan Negeri Bangli', 'P8epy8qO0mg', NULL, NULL, NULL),
	(32, 'Sosialisasi Layanan untuk Penyandang Disabilitas', 'Xx4_LrSRwVA', NULL, NULL, NULL),
	(33, 'Video Profile Zona Integritas Pengadilan Negeri Bangli', 'H4emotQALhg&t=5s', NULL, NULL, NULL),
	(34, 'Testimoni Aplikasi SITI NAIK GALA (PN BANGLI)', 'SnCyTZ4Ac2c', NULL, NULL, NULL),
	(35, 'Video pengenalan Whatsapp Bot Pengadilan Negeri Bangli', 'P8epy8qO0mg', NULL, NULL, NULL),
	(36, 'Sosialisasi Layanan untuk Penyandang Disabilitas', 'Xx4_LrSRwVA', NULL, NULL, NULL),
	(37, 'Video Profile Zona Integritas Pengadilan Negeri Bangli', 'H4emotQALhg&t=5s', NULL, NULL, NULL),
	(38, 'Testimoni Aplikasi SITI NAIK GALA (PN BANGLI)', 'SnCyTZ4Ac2c', NULL, NULL, NULL);
/*!40000 ALTER TABLE `video_informasi` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
