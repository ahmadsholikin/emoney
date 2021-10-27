/*
 Navicat Premium Data Transfer

 Source Server         : LOCAL
 Source Server Type    : MySQL
 Source Server Version : 100414
 Source Host           : localhost:3306
 Source Schema         : emoney

 Target Server Type    : MySQL
 Target Server Version : 100414
 File Encoding         : 65001

 Date: 28/10/2021 06:41:39
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for app_group
-- ----------------------------
DROP TABLE IF EXISTS `app_group`;
CREATE TABLE `app_group`  (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `deskripsi` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`group_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of app_group
-- ----------------------------
INSERT INTO `app_group` VALUES (1, 'Administrator', 'Hak Akses utk Administrator', NULL, '2020-06-29 21:33:35', NULL);
INSERT INTO `app_group` VALUES (4, 'User', 'Hak akses untuk pengguna sistem', '2021-04-15 09:00:00', '2021-04-15 09:31:22', NULL);

-- ----------------------------
-- Table structure for app_info
-- ----------------------------
DROP TABLE IF EXISTS `app_info`;
CREATE TABLE `app_info`  (
  `id` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `site` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pengembang` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kontak` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tentang` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `alamat` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `versi` char(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `logo` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'logo_sample.png',
  `theme` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'batik',
  `login` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'login_v1',
  `mode` enum('dev','rilis') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'dev',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `FK_app_info`(`theme`) USING BTREE,
  INDEX `FK_app_info_logim`(`login`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of app_info
-- ----------------------------
INSERT INTO `app_info` VALUES ('1', 'E Billing Dashboard Layanan Sistem', 'helpdesk-bkkpd.magelangkab.go.id/ebilling', 'Pemkab Magelang', '08985000788', 'nci.ahmad@gmail.com', '', '`', '-', 'A.0.2', 'logo/1632367166_9aa5ba6c3bab49c73173.png', 'be-majestic', 'majestic', 'dev');

-- ----------------------------
-- Table structure for app_menu
-- ----------------------------
DROP TABLE IF EXISTS `app_menu`;
CREATE TABLE `app_menu`  (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_nama` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `deskripsi` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `link` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '#',
  `prefik` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ikon` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'mdi mdi-home',
  `induk_id` tinyint(4) NULL DEFAULT NULL,
  `root_nama` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hirarki` tinyint(4) NULL DEFAULT NULL,
  `sub` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `urutan` tinyint(4) NULL DEFAULT 1,
  `aktif` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1',
  `nama_tabel` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `primary_key` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`menu_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 77 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of app_menu
-- ----------------------------
INSERT INTO `app_menu` VALUES (1, 'Beranda', 'Beranda', 'beranda', 'beranda', 'grid', 0, 'App', 1, '0', 0, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (2, 'Pengaturan', 'Pengaturan App', '#', '#', 'settings', NULL, 'App', 1, '1', 6, '1', 'app_menu', 'menu_id', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (3, 'Menu Navigasi', 'Pengelolaan Navigasi Menu Sistem dan Konfigurasinya', 'menu', 'menu', '-', 2, 'Pengaturan', 2, '0', 3, '1', 'app_menu', 'menu_id', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (4, 'Grup Pengguna', 'Pengelolaan dan Pemetaan Grup Pengguna Sistem', 'groups', 'groups', '-', 2, 'Pengaturan', 2, '0', 4, '1', 'app_grup', 'grup_id', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (5, 'Role Hak Akses', 'Pengelolaan Hak Akses Halaman dan Fungsional Aksinya', 'role', 'role', '-', 2, 'Pengaturan', 2, '0', 5, '1', 'app_role', 'id', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (6, 'Akun Pengguna', 'Pengelolaan Data Akun Pengguna Sistem', 'users', 'users', '-', 2, 'Pengaturan', 2, '0', 6, '1', 'app_users', 'user_id', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (7, 'Info Site', 'Konfigurasi Detail Tentang Sistem', 'site', 'site', '-', 2, 'Pengaturan', 2, '0', 7, '1', 'app_info', 'id', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (45, 'Creator', 'Site Creator', '#', 'creator', 'coffee', 0, 'App', 1, '1', 3, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (46, 'Table Model', 'Generator Table Database Menjadi Model', 'table-model', 'table-model', 'airplay', 45, 'Creator', 2, '0', 8, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (56, 'Form Generator', 'Generator untuk kode HTML Form Blangko', 'form-generator', 'form-generator', 'mdi mdi-home', 45, 'Creator', 2, '0', 9, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (57, 'Profile', 'Pengaturan Profile Akun', 'profile', 'profile', 'git-branch', 2, 'Pengaturan', 2, '0', 8, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (58, 'CRUD Generator', 'Pembuatan Kode CRUD', 'crud-generator', 'crud-generator', 'circle', 45, 'Creator', 2, '1', 10, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (59, 'Table Generator', 'Pembuatan Table HTML', 'table-generator', 'table-generator', 'book-open', 45, 'Creator', 2, '1', 11, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (60, 'Sinkron', 'Integrasi data kepegawaian', '#', '#', 'git-pull-request', 0, 'Backend', 1, '1', 4, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (61, 'Kenaikan Gaji Berkala', 'Sinkron data kenaikan gaji berkala', 'kenaikan-gaji-berkala', 'kenaikan-gaji-berkala', 'mdi mdi-home', 60, 'Sinkron', 2, '0', 12, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (62, 'Nominatif', '-', '#', '#', 'database', 0, 'Backend', 1, '1', 5, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (63, 'Penggajian', 'Daftar Nominatif Penggajian', 'penggajian', 'penggajian', 'mdi mdi-home', 62, 'Nominatif', 2, '0', 13, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (64, 'Kenaikan Pangkat', 'Sinkron data kenaikan pangkat', 'kenaikan-pangkat', 'kenaikan-pangkat', 'mdi mdi-home', 60, 'Sinkron', 2, '0', 13, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (65, 'Validasi Data Keluarga', 'Sinkron dan validasi data keluarga', 'validasi-data-keluarga', 'validasi-data-keluarga', 'mdi mdi-home', 60, 'Sinkron', 2, '0', 14, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (66, 'Unit Kerja', 'Sinkron data unit kerja', 'unit-kerja', 'unit-kerja', 'mdi mdi-home', 60, 'Sinkron', 2, '0', 15, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (67, 'Import Data Penerima', 'Eksekusi pengambilan data penerima dari SIPGAN', 'import-data-penerima', 'import-data-penerima', 'mdi mdi-home', 62, 'Nominatif', 2, '0', 14, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (68, 'Data TPP', '-', '#', '#', 'folder', 0, 'Backend', 1, '1', 6, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (69, 'Nominal Kelas Jabatan', 'Pengelolaan Data Nominal Kelas Jabatan', 'nominal-kelas-jabatan', 'nominal-kelas-jabatan', 'mdi mdi-home', 68, 'Data TPP', 2, '0', 16, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (70, 'Nominatif Penerima', 'Daftar Nominatif Penerima TPP', 'nominatif-penerima', 'nominatif-penerima', 'mdi mdi-home', 68, 'Data TPP', 2, '0', 17, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (71, 'Proses Pengajuan TPP', 'Informasi Proses Pengajuan TPP', 'proses-pengajuan-tpp', 'proses-pengajuan-tpp', 'mdi mdi-home', 68, 'Data TPP', 2, '0', 18, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (72, 'Laporan', '-', '#', '#', 'file-text', 0, 'Backend', 1, '1', 7, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (73, 'Laporan Belanja Pegawai', 'Laporan Belanja Pegawai', 'laporan-belanja-pegawai', 'laporan-belanja-pegawai', 'mdi mdi-home', 72, 'Laporan', 2, '0', 19, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (74, 'Laporan Penerimaan TPP', 'Laporan Penerimaan TPP', 'laporan-penerimaan-tpp', 'laporan-penerimaan-tpp', 'mdi mdi-home', 72, 'Laporan', 2, '0', 20, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (75, 'Laporan BPJS', 'Laporan BPJS', 'laporan-bpjs', 'laporan-bpjs', 'mdi mdi-home', 72, 'Laporan', 2, '0', 21, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (76, 'Take Home Pay', 'Informasi Take Home Pay Pegawai', 'take-home-pay', 'take-home-pay', 'mdi mdi-home', 72, 'Laporan', 2, '0', 22, '1', '', '', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for app_role
-- ----------------------------
DROP TABLE IF EXISTS `app_role`;
CREATE TABLE `app_role`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NULL DEFAULT NULL,
  `menu_id` int(11) NULL DEFAULT NULL,
  `akses_lihat` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '0',
  `akses_tambah` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '0',
  `akses_ubah` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '0',
  `akses_hapus` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '0',
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 116 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of app_role
-- ----------------------------
INSERT INTO `app_role` VALUES (2, 1, 2, '1', '1', '1', '1', '2020-06-18 10:10:00', NULL, NULL);
INSERT INTO `app_role` VALUES (3, 1, 3, '1', '1', '1', '1', '2020-06-18 10:10:00', NULL, NULL);
INSERT INTO `app_role` VALUES (4, 1, 4, '1', '1', '1', '1', '2020-06-18 10:10:00', NULL, NULL);
INSERT INTO `app_role` VALUES (5, 1, 5, '1', '1', '1', '1', '2020-06-18 10:10:00', NULL, NULL);
INSERT INTO `app_role` VALUES (6, 1, 6, '1', '1', '1', '1', '2020-06-18 10:10:00', NULL, NULL);
INSERT INTO `app_role` VALUES (7, 1, 7, '1', '1', '1', '1', '2020-06-18 10:10:00', NULL, NULL);
INSERT INTO `app_role` VALUES (23, 1, 1, '1', '1', '1', '1', '2020-06-18 10:10:00', NULL, NULL);
INSERT INTO `app_role` VALUES (59, 4, 1, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (93, 1, 45, '1', '0', '0', '0', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (94, 1, 46, '1', '0', '0', '0', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (95, 1, 56, '1', '0', '0', '0', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (96, 1, 57, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (97, 1, 58, '1', '0', '0', '0', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (98, 1, 59, '1', '0', '0', '0', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (99, 1, 60, '1', '0', '0', '0', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (100, 1, 61, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (101, 1, 62, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (102, 1, 63, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (103, 1, 64, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (104, 1, 65, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (105, 1, 66, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (106, 1, 67, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (107, 1, 71, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (108, 1, 70, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (109, 1, 69, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (110, 1, 68, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (111, 1, 76, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (112, 1, 75, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (113, 1, 74, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (114, 1, 73, '1', '1', '1', '1', NULL, NULL, NULL);
INSERT INTO `app_role` VALUES (115, 1, 72, '1', '1', '1', '1', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for app_users
-- ----------------------------
DROP TABLE IF EXISTS `app_users`;
CREATE TABLE `app_users`  (
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kontak` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `is_active` enum('1','0') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of app_users
-- ----------------------------
INSERT INTO `app_users` VALUES ('inka@magelangkab.go.id', '', 'inka', '$2y$10$CCUpyjX1nhHWvm1SRIjn6OA1Is4HDNeISytIXZal2oRPbo8hWmuXG', NULL, 1, NULL, '1', '2021-10-13 19:56:50', '2021-10-13 19:56:50', NULL);
INSERT INTO `app_users` VALUES ('nci.ahmad@gmail.com', '@hmad', 'Ahmad Sholikin', '$2y$10$qebTpuoimrIWwHtaGLn5oO9H6yq.4hHU5U6rPZmnositYwjRKKBBu', '08985000788', 1, 'foto/1631169674_95d60cd0a7a3887825e2.jpg', '1', '2021-09-09 13:49:58', '2021-09-09 13:49:58', NULL);

-- ----------------------------
-- Table structure for hist_kgb
-- ----------------------------
DROP TABLE IF EXISTS `hist_kgb`;
CREATE TABLE `hist_kgb`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `periode` date NULL DEFAULT NULL,
  `nip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pangkat` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `unit_kerja` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gaji` double UNSIGNED NULL DEFAULT NULL,
  `masker` tinyint(4) NULL DEFAULT NULL,
  `tmt` date NULL DEFAULT NULL,
  `pejabat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_sk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_sk` date NULL DEFAULT NULL,
  `flag_update` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '0',
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 178 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hist_kgb
-- ----------------------------
INSERT INTO `hist_kgb` VALUES (6, '2021-10-01', '197412041993111001', 'JONI INDARTO', 'Kepala Dinas Peternakan dan Perikanan', '4C', 'Dinas Peternakan dan Perikanan', 4798300, 24, '2021-10-01', 'BUPATI MAGELANG', '822.4/6617/22/2021', '2021-09-30', '1', '2021-09-27 13:21:50', '2021-09-27 13:21:53', NULL);
INSERT INTO `hist_kgb` VALUES (7, '2021-10-01', '197901311998031002', 'MOCH FAUZI YANUAR MAULUDI', 'Sekretaris Kecamatan Ngluwar', '4A', 'Kecamatan Ngluwar', 4151100, 20, '2021-10-01', 'KEPALA BKPPD', '822.4/6662/22/2021', '2021-09-28', '1', '2021-09-28 09:16:41', '2021-09-28 09:37:14', NULL);
INSERT INTO `hist_kgb` VALUES (8, '2021-10-01', '197610281996021002', 'R ANDIE WIBOWO', 'Kepala Sub Bagian Program dan Keuangan', '4A', 'Kecamatan Srumbung', 4281800, 22, '2021-10-01', 'KEPALA BKPPD', '822.4/6671/22/2021', '2021-09-28', '1', '2021-09-28 09:16:41', '2021-09-28 09:37:14', NULL);
INSERT INTO `hist_kgb` VALUES (9, '2021-10-01', '197211041993112002', 'ITA KUSMAWATI', 'Kepala Subbagian Umum dan Kepegawaian', '3D', 'Dinas Pariwisata, Kepemudaan, dan Olahraga', 4237500, 24, '2021-10-01', 'KEPALA BKPPD', '822.3/6648/22/2021', '2021-09-28', '1', '2021-09-28 09:16:41', '2021-09-28 09:37:14', NULL);
INSERT INTO `hist_kgb` VALUES (10, '2021-10-01', '197110031993021001', 'ARIF BUDI PRASETYA', 'Kepala Bidang Koperasi', '4A', 'Dinas Perdagangan, Koperasi, Usaha Kecil dan Menengah', 4416700, 24, '2021-10-01', 'KEPALA BKPPD', '822.4/6624/22/2021', '2021-09-28', '1', '2021-09-28 09:16:41', '2021-09-28 09:37:14', NULL);
INSERT INTO `hist_kgb` VALUES (11, '2021-10-01', '196802271992102001', 'SRI WULAN AMBARWATI', 'Kepala Bidang Aset', '4A', 'Badan Pendapatan, Pengelolaan Keuangan, dan Aset Daerah', 4416700, 24, '2021-10-01', 'KEPALA BKPPD', '822.4/6690/22/2021', '2021-09-28', '1', '2021-09-28 09:16:41', '2021-09-28 09:37:14', NULL);
INSERT INTO `hist_kgb` VALUES (12, '2021-10-01', '197811061998021001', 'LABBAIKA NUGROHO', 'Kepala Dinas Pemberdayaan Masyarakat dan Desa', '4B', 'Dinas Pemberdayaan Masyarakat dan Desa', 4326700, 20, '2021-10-01', 'SEKRETARIS DAERAH', '822.4/6655/22/2021', '2021-09-28', '1', '2021-09-28 09:16:41', '2021-09-28 09:37:14', NULL);
INSERT INTO `hist_kgb` VALUES (13, '2021-10-01', '198005011999121001', 'BUDI DARYANTO', 'Kepala Bagian Kesejahteraan Rakyat', '4A', 'Bagian Kesejahteraan Rakyat Sekretariat Daerah', 4024400, 18, '2021-10-01', 'KEPALA BKPPD', '822.4/6629/22/2021', '2021-09-28', '1', '2021-09-28 09:16:41', '2021-09-28 09:37:14', NULL);
INSERT INTO `hist_kgb` VALUES (14, '2021-10-01', '198302222001122002', 'KHOIRUL WAHIDAH', 'Kepala Seksi Tata Pemerintahan', '4A', 'Kecamatan Bandongan', 3901500, 16, '2021-10-01', 'KEPALA BKPPD', '822.4/6653/22/2021', '2021-09-28', '1', '2021-09-28 09:16:41', '2021-09-28 09:37:14', NULL);
INSERT INTO `hist_kgb` VALUES (15, '2021-10-01', '198209112001121004', 'BAMBANG HERMANTO', 'Kepala Bagian Pemerintahan', '4A', 'Bagian Pemerintahan Sekretariat Daerah', 3901500, 16, '2021-10-01', 'KEPALA BKPPD', '822.4/6626/22/2021', '2021-09-28', '1', '2021-09-28 09:16:41', '2021-09-28 09:37:14', NULL);
INSERT INTO `hist_kgb` VALUES (16, '2021-10-01', '198502132003122002', 'HERLINA NURROHMAH', 'Kepala Bidang Destinasi dan Industri Pariwisata', '3D', 'Dinas Pariwisata, Kepemudaan, dan Olahraga', 3628900, 14, '2021-10-01', 'KEPALA BKPPD', '822.3/6644/22/2021', '2021-09-28', '1', '2021-09-28 09:16:41', '2021-09-28 09:37:15', NULL);
INSERT INTO `hist_kgb` VALUES (17, '2021-10-01', '198401102003121001', 'KATON DWI HANDITO', 'Kepala Bidang Pemerintahan dan Kelembagaan Desa', '3D', 'Dinas Pemberdayaan Masyarakat dan Desa', 3628900, 14, '2021-10-01', 'KEPALA BKPPD', '822.3/6652/22/2021', '2021-09-28', '1', '2021-09-28 09:16:41', '2021-09-28 09:37:15', NULL);
INSERT INTO `hist_kgb` VALUES (18, '2021-10-01', '197208292006041011', 'ADI PRIYONO', 'Pengelola Pendaftaran, Pendataan Pajak, dan Retribusi', '2D', 'Badan Pendapatan, Pengelolaan Keuangan, dan Aset Daerah', 3271400, 23, '2021-10-01', 'KEPALA BKPPD', '822.2/6618/22/2021', '2021-09-28', '1', '2021-09-28 09:16:41', '2021-09-28 09:37:15', NULL);
INSERT INTO `hist_kgb` VALUES (19, '2021-10-01', '197105232006041007', 'JOKO ISDIARTO', 'Penagih Retribusi', '2D', 'Badan Pendapatan, Pengelolaan Keuangan, dan Aset Daerah', 3271400, 23, '2021-10-01', 'KEPALA BKPPD', '822.2/6649/22/2021', '2021-09-28', '1', '2021-09-28 09:16:41', '2021-09-28 09:37:15', NULL);
INSERT INTO `hist_kgb` VALUES (20, '2021-10-01', '196810012007011015', 'KADERI', 'Pengelola Kesejahteraan Sosial', '2D', 'Kecamatan Muntilan', 3590300, 29, '2021-10-01', 'KEPALA BKPPD', '822.2/6651/22/2021', '2021-09-28', '1', '2021-09-28 09:16:41', '2021-09-28 09:37:15', NULL);
INSERT INTO `hist_kgb` VALUES (21, '2021-10-01', '196601072006042005', 'EFI HERIYANA HESTINDRIETNI', 'Kepala Seksi Pemberdayaan Masyarakat', '3D', 'Kecamatan Borobudur', 4650600, 30, '2021-10-01', 'KEPALA BKPPD', '822.3/6633/22/2021', '2021-09-28', '1', '2021-09-28 09:16:41', '2021-09-28 09:37:15', NULL);
INSERT INTO `hist_kgb` VALUES (22, '2021-10-01', '196604201986101003', 'BUSRONIAH', 'Kepala SD', '4A', 'SDN Baleagung Kecamatan Grabag', 4847300, 30, '2021-10-01', 'KEPALA BKPPD', '822.4/6630/22/2021', '2021-09-28', '1', '2021-09-28 09:16:41', '2021-09-28 09:37:15', NULL);
INSERT INTO `hist_kgb` VALUES (23, '2021-10-01', '197206012003121010', 'SUGIYANTO', 'Guru Kelas SD', '3B', 'SDN Ngepanrejo Kecamatan Bandongan', 3900500, 24, '2021-10-01', 'KEPALA BKPPD', '822.3/6693/22/2021', '2021-09-28', '1', '2021-09-28 09:16:41', '2021-09-28 09:37:15', NULL);
INSERT INTO `hist_kgb` VALUES (24, '2021-10-01', '196804022003122002', 'FATIMAH SRI MURWANI', 'Guru Penjas dan Orkes SD', '3C', 'SDN Sudimoro 2 Kecamatan Srumbung', 4461800, 30, '2021-10-01', 'KEPALA BKPPD', '822.3/6638/22/2021', '2021-09-28', '1', '2021-09-28 09:16:41', '2021-09-28 09:37:15', NULL);
INSERT INTO `hist_kgb` VALUES (25, '2021-10-01', '196308181986101003', 'SUPARYO', 'Kepala SD', '4A', 'SDN Deyangan 2 Kecamatan Mertoyudan', 4847300, 30, '2021-10-01', 'KEPALA BKPPD', '822.4/6696/22/2021', '2021-09-28', '1', '2021-09-28 09:16:41', '2021-09-28 09:37:15', NULL);
INSERT INTO `hist_kgb` VALUES (26, '2021-10-01', '196306291986102001', 'GIYARSIH', 'Guru Kelas SD', '4A', 'SDN Gulon 2 Kecamatan Salam', 4847300, 30, '2021-10-01', 'KEPALA BKPPD', '822.4/6639/22/2021', '2021-09-28', '1', '2021-09-28 09:16:41', '2021-09-28 09:37:15', NULL);
INSERT INTO `hist_kgb` VALUES (27, '2021-10-01', '196404031988102001', 'SITI WASIYATUN', 'Kepala SD', '4A', 'SDN Kalinegoro 3 Kecamatan Mertoyudan', 4699300, 28, '2021-10-01', 'KEPALA BKPPD', '822.4/6681/22/2021', '2021-09-28', '1', '2021-09-28 09:16:41', '2021-09-28 09:37:15', NULL);
INSERT INTO `hist_kgb` VALUES (28, '2021-10-01', '196509151988102003', 'SITI ROCHAYATI', 'Guru Kelas SD', '3D', 'SDN Soroyudan Kecamatan Mertoyudan', 4508600, 28, '2021-10-01', 'KEPALA BKPPD', '822.3/6678/22/2021', '2021-09-28', '1', '2021-09-28 09:16:42', '2021-09-28 09:37:15', NULL);
INSERT INTO `hist_kgb` VALUES (29, '2021-10-01', '196304211988102002', 'SUMARYATI', 'Guru Kelas SD', '4A', 'SDN Gunungpring 3 Kecamatan Muntilan', 4699300, 28, '2021-10-01', 'KEPALA BKPPD', '822.4/6695/22/2021', '2021-09-28', '1', '2021-09-28 09:16:42', '2021-09-28 09:37:15', NULL);
INSERT INTO `hist_kgb` VALUES (30, '2021-10-01', '196709302005011004', 'BAMBANG WIDYANTO', 'Guru Kelas SD', '3C', 'SDN Pandean 1 Kecamatan Ngablak', 4193500, 26, '2021-10-01', 'KEPALA BKPPD', '822.3/6627/22/2021', '2021-09-28', '1', '2021-09-28 09:16:42', '2021-09-28 09:37:15', NULL);
INSERT INTO `hist_kgb` VALUES (31, '2021-10-01', '196609061988102001', 'UMI LATIFAH', 'Guru Kelas SD', '4A', 'SDN Salaman 4 Kecamatan Salaman', 4699300, 28, '2021-10-01', 'KEPALA BKPPD', '822.4/6707/22/2021', '2021-09-28', '1', '2021-09-28 09:16:42', '2021-09-28 09:37:15', NULL);
INSERT INTO `hist_kgb` VALUES (32, '2021-10-01', '196504051988102001', 'ENDANG SUMARTININGSIH', 'Guru Kelas SD', '4A', 'SDN Kalisalak Kecamatan Salaman', 4699300, 28, '2021-10-01', 'KEPALA BKPPD', '822.4/6634/22/2021', '2021-09-28', '1', '2021-09-28 09:16:42', '2021-09-28 09:37:15', NULL);
INSERT INTO `hist_kgb` VALUES (33, '2021-10-01', '196606031986102006', 'SRI DARYATI', 'Kepala SD', '4A', 'SDN Kleteran 3 Kecamatan Grabag', 4847300, 30, '2021-10-01', 'KEPALA BKPPD', '822.4/6684/22/2021', '2021-09-28', '1', '2021-09-28 09:16:42', '2021-09-28 09:37:16', NULL);
INSERT INTO `hist_kgb` VALUES (34, '2021-10-01', '196712222006042008', 'HARTATIK', 'Guru Kelas SD', '3B', 'SDN Karangkajen Kecamatan Secang', 4150100, 28, '2021-10-01', 'KEPALA BKPPD', '822.3/6641/22/2021', '2021-09-28', '1', '2021-09-28 09:16:42', '2021-09-28 09:37:16', NULL);
INSERT INTO `hist_kgb` VALUES (35, '2021-10-01', '197503242010011007', 'TRI HARSONO', 'Pengelola Sistem Informasi Administrasi Kependudukan', '2C', 'Kecamatan Grabag', 2949900, 19, '2021-10-01', 'KEPALA BKPPD', '822.2/6703/22/2021', '2021-09-28', '1', '2021-09-28 09:16:42', '2021-09-28 09:37:16', NULL);
INSERT INTO `hist_kgb` VALUES (36, '2021-10-01', '197207162006042014', 'SUBANDIYAH', 'Guru Kelas SD', '3B', 'SDN Tampingan 2 Kecamatan Tegalrejo', 3340300, 14, '2021-10-01', 'KEPALA BKPPD', '822.3/6691/22/2021', '2021-09-28', '1', '2021-09-28 09:16:42', '2021-09-28 09:37:16', NULL);
INSERT INTO `hist_kgb` VALUES (37, '2021-10-01', '196402191988102002', 'SITI ISROIYAH', 'Guru Kelas SD', '3D', 'SDN Tempurejo 1 Kecamatan Tempuran', 4508600, 28, '2021-10-01', 'KEPALA BKPPD', '822.3/6676/22/2021', '2021-09-28', '1', '2021-09-28 09:16:42', '2021-09-28 09:37:16', NULL);
INSERT INTO `hist_kgb` VALUES (38, '2021-10-01', '196612061988102003', 'SUSIATI', 'Kepala SD', '4A', 'SDN Sidomulyo 2 Kecamatan Salaman', 4699300, 28, '2021-10-01', 'KEPALA BKPPD', '822.4/6699/22/2021', '2021-09-28', '1', '2021-09-28 09:16:42', '2021-09-28 09:37:16', NULL);
INSERT INTO `hist_kgb` VALUES (39, '2021-10-01', '198109012006042018', 'PARWANTI', 'Pranata Laboratorium Kesehatan', '3C', 'Laboratorium Kesehatan Masyarakat', 3591200, 16, '2021-10-01', 'KEPALA BKPPD', '822.3/6667/22/2021', '2021-09-28', '1', '2021-09-28 09:16:42', '2021-09-28 09:37:16', NULL);
INSERT INTO `hist_kgb` VALUES (40, '2021-10-01', '197204092006042015', 'MINTONINGSIH', 'Bidan Desa Kebonagung', '3B', 'PUSKESMAS Bandongan', 3781400, 22, '2021-10-01', 'KEPALA BKPPD', '822.3/6660/22/2021', '2021-09-28', '1', '2021-09-28 09:16:42', '2021-09-28 09:37:16', NULL);
INSERT INTO `hist_kgb` VALUES (41, '2021-10-01', '197510072006042013', 'SOLIKHATUN MUTMAINAH', 'Bidan Desa Candirejo', '3C', 'PUSKESMAS Borobudur', 3821000, 20, '2021-10-01', 'KEPALA BKPPD', '822.3/6683/22/2021', '2021-09-28', '1', '2021-09-28 09:16:42', '2021-09-28 09:37:16', NULL);
INSERT INTO `hist_kgb` VALUES (42, '2021-10-01', '197902232007012005', 'ARI SULISTIYANI', 'Bidan', '3B', 'PUSKESMAS Borobudur', 3554000, 18, '2021-10-01', 'KEPALA BKPPD', '822.3/6623/22/2021', '2021-09-28', '1', '2021-09-28 09:16:42', '2021-09-28 09:37:16', NULL);
INSERT INTO `hist_kgb` VALUES (43, '2021-10-01', '197409012003122008', 'T SEPTINA ROHIMAWATI', 'Bidan Desa Tempak', '3B', 'PUSKESMAS Candimulyo', 3781400, 22, '2021-10-01', 'KEPALA BKPPD', '822.3/6701/22/2021', '2021-09-28', '1', '2021-09-28 09:16:42', '2021-09-28 09:37:16', NULL);
INSERT INTO `hist_kgb` VALUES (44, '2021-10-01', '197901152007012004', 'YANI PURNAMAWATI', 'Bidan Desa Sidomulyo', '3B', 'PUSKESMAS Candimulyo', 3554000, 18, '2021-10-01', 'KEPALA BKPPD', '822.3/6712/22/2021', '2021-09-28', '1', '2021-09-28 09:16:42', '2021-09-28 09:37:16', NULL);
INSERT INTO `hist_kgb` VALUES (45, '2021-10-01', '197504072006042019', 'NINIK SUHARYANI', 'Bidan Desa Sengi', '3B', 'PUSKESMAS Dukun', 3781400, 22, '2021-10-01', 'KEPALA BKPPD', '822.3/6666/22/2021', '2021-09-28', '1', '2021-09-28 09:16:42', '2021-09-28 09:37:16', NULL);
INSERT INTO `hist_kgb` VALUES (46, '2021-10-01', '197404142006042019', 'INIK LISTIYANI DEWI', 'Bidan Desa Pesidi', '3A', 'PUSKESMAS Grabag 2', 3627900, 22, '2021-10-01', 'KEPALA BKPPD', '822.3/6647/22/2021', '2021-09-28', '1', '2021-09-28 09:16:42', '2021-09-28 09:37:16', NULL);
INSERT INTO `hist_kgb` VALUES (47, '2021-10-01', '197703182007012006', 'SIDEM RAHAYU', 'Bidan Desa Ketawang', '3B', 'PUSKESMAS Grabag 2', 3554000, 18, '2021-10-01', 'KEPALA BKPPD', '822.3/6674/22/2021', '2021-09-28', '1', '2021-09-28 09:16:42', '2021-09-28 09:37:16', NULL);
INSERT INTO `hist_kgb` VALUES (48, '2021-10-01', '197806192007012012', 'SUTINEM', 'Bidan Desa Sukorejo', '3B', 'PUSKESMAS Kajoran 1', 3554000, 18, '2021-10-01', 'KEPALA BKPPD', '822.3/6700/22/2021', '2021-09-28', '1', '2021-09-28 09:16:42', '2021-09-28 09:37:16', NULL);
INSERT INTO `hist_kgb` VALUES (49, '2021-10-01', '197305102005012008', 'ANTONIA TRI SUMARYATI', 'Bidan Desa Temanggung', '3A', 'PUSKESMAS Kaliangkrik', 3517200, 20, '2021-10-01', 'KEPALA BKPPD', '822.3/6622/22/2021', '2021-09-28', '1', '2021-09-28 09:16:42', '2021-09-28 09:37:16', NULL);
INSERT INTO `hist_kgb` VALUES (50, '2021-10-01', '197202172006042007', 'SRI NOOR HIDAYATI', 'Bidan Desa Selomoyo', '3A', 'PUSKESMAS Kaliangkrik', 3627900, 22, '2021-10-01', 'KEPALA BKPPD', '822.3/6686/22/2021', '2021-09-28', '1', '2021-09-28 09:16:42', '2021-09-28 09:37:16', NULL);
INSERT INTO `hist_kgb` VALUES (51, '2021-10-01', '197907182007012010', 'DWI ELIA WINARNI', 'Bidan Desa Balerejo', '3B', 'PUSKESMAS Kaliangkrik', 3554000, 18, '2021-10-01', 'KEPALA BKPPD', '822.3/6632/22/2021', '2021-09-28', '1', '2021-09-28 09:16:43', '2021-09-28 09:37:16', NULL);
INSERT INTO `hist_kgb` VALUES (52, '2021-10-01', '197708162007012009', 'GUNARIYATI', 'Bidan Desa Beseran', '3B', 'PUSKESMAS Kaliangkrik', 3554000, 18, '2021-10-01', 'KEPALA BKPPD', '822.3/6640/22/2021', '2021-09-28', '1', '2021-09-28 09:16:43', '2021-09-28 09:37:16', NULL);
INSERT INTO `hist_kgb` VALUES (53, '2021-10-01', '197508162003122009', 'CH SRI SUSILOWATI', 'Bidan Desa Treko', '3B', 'PUSKESMAS Mungkid', 3781400, 22, '2021-10-01', 'KEPALA BKPPD', '822.3/6631/22/2021', '2021-09-28', '1', '2021-09-28 09:16:43', '2021-09-28 09:37:16', NULL);
INSERT INTO `hist_kgb` VALUES (54, '2021-10-01', '197611162006042014', 'PUJI ASTUTI', 'Bidan Desa Bumirejo', '3C', 'PUSKESMAS Mungkid', 3704300, 18, '2021-10-01', 'KEPALA BKPPD', '822.3/6669/22/2021', '2021-09-28', '1', '2021-09-28 09:16:43', '2021-09-28 09:37:16', NULL);
INSERT INTO `hist_kgb` VALUES (55, '2021-10-01', '197812072007012008', 'RAHMAWATI', 'Bidan Desa Bojong', '3B', 'PUSKESMAS Mungkid', 3554000, 18, '2021-10-01', 'KEPALA BKPPD', '822.3/6673/22/2021', '2021-09-28', '1', '2021-09-28 09:16:43', '2021-09-28 09:37:16', NULL);
INSERT INTO `hist_kgb` VALUES (56, '2021-10-01', '197306042003122006', 'INDAH NURKHOTIBAK', 'Bidan Desa Gondowangi', '3A', 'PUSKESMAS Sawangan 2', 3627900, 22, '2021-10-01', 'KEPALA BKPPD', '822.3/6646/22/2021', '2021-09-28', '1', '2021-09-28 09:16:43', '2021-09-28 09:37:16', NULL);
INSERT INTO `hist_kgb` VALUES (57, '2021-10-01', '197012192006042005', 'WORO RENONINGRUM', 'Bidan Desa Jogonayan', '3A', 'PUSKESMAS Ngablak', 3627900, 22, '2021-10-01', 'KEPALA BKPPD', '822.3/6711/22/2021', '2021-09-28', '1', '2021-09-28 09:16:43', '2021-09-28 09:37:16', NULL);
INSERT INTO `hist_kgb` VALUES (58, '2021-10-01', '197407232006042013', 'YULI ENDAH TRIANA PRAPTININGTYAS', 'Bidan', '3B', 'PUSKESMAS Grabag 1', 3554000, 18, '2021-10-01', 'KEPALA BKPPD', '822.3/6713/22/2021', '2021-09-28', '1', '2021-09-28 09:16:43', '2021-09-28 09:37:17', NULL);
INSERT INTO `hist_kgb` VALUES (59, '2021-10-01', '197907292007012008', 'ANTIK', 'Bidan Desa Somokaton', '3B', 'PUSKESMAS Ngluwar', 3554000, 18, '2021-10-01', 'KEPALA BKPPD', '822.3/6621/22/2021', '2021-09-28', '1', '2021-09-28 09:16:43', '2021-09-28 09:37:17', NULL);
INSERT INTO `hist_kgb` VALUES (60, '2021-10-01', '197505052005012015', 'HARYANI', 'Bidan Desa Kaponan', '3B', 'PUSKESMAS Pakis', 3781400, 22, '2021-10-01', 'KEPALA BKPPD', '822.3/6642/22/2021', '2021-09-28', '1', '2021-09-28 09:16:43', '2021-09-28 09:37:17', NULL);
INSERT INTO `hist_kgb` VALUES (61, '2021-10-01', '197406282006042009', 'SITI KASANAH', 'Bidan Desa Petung', '3A', 'PUSKESMAS Pakis', 3627900, 22, '2021-10-01', 'KEPALA BKPPD', '822.3/6677/22/2021', '2021-09-28', '1', '2021-09-28 09:16:43', '2021-09-28 09:37:17', NULL);
INSERT INTO `hist_kgb` VALUES (62, '2021-10-01', '197311162006042012', 'PUJI ASTUTI TRIWINARNI', 'Bidan Desa Kebonrejo', '3B', 'PUSKESMAS Salaman 1', 3781400, 22, '2021-10-01', 'KEPALA BKPPD', '822.3/6668/22/2021', '2021-09-28', '1', '2021-09-28 09:16:43', '2021-09-28 09:37:17', NULL);
INSERT INTO `hist_kgb` VALUES (63, '2021-10-01', '197509172006042011', 'WIJI PANGESTI', 'Bidan Desa Menoreh', '3A', 'PUSKESMAS Salaman 1', 3627900, 22, '2021-10-01', 'KEPALA BKPPD', '822.3/6709/22/2021', '2021-09-28', '1', '2021-09-28 09:16:43', '2021-09-28 09:37:17', NULL);
INSERT INTO `hist_kgb` VALUES (64, '2021-10-01', '197504052006042018', 'SITI AISYAH', 'Bidan Desa Sawangargo', '3A', 'PUSKESMAS Salaman 2', 3517200, 20, '2021-10-01', 'KEPALA BKPPD', '822.3/6675/22/2021', '2021-09-28', '1', '2021-09-28 09:16:43', '2021-09-28 09:37:17', NULL);
INSERT INTO `hist_kgb` VALUES (65, '2021-10-01', '197905062006042019', 'SRI RETNONINGSIH', 'Bidan Desa Candiretno', '3C', 'PUSKESMAS Secang 2', 3704300, 18, '2021-10-01', 'KEPALA BKPPD', '822.3/6687/22/2021', '2021-09-28', '1', '2021-09-28 09:16:43', '2021-09-28 09:37:17', NULL);
INSERT INTO `hist_kgb` VALUES (66, '2021-10-01', '197605302006042024', 'ENIK WAHYU WIDAYATI', 'Bidan Desa Somoketro', '3A', 'PUSKESMAS Salam', 3517200, 20, '2021-10-01', 'KEPALA BKPPD', '822.3/6635/22/2021', '2021-09-28', '1', '2021-09-28 09:16:43', '2021-09-28 10:16:27', NULL);
INSERT INTO `hist_kgb` VALUES (67, '2021-10-01', '197502152006042013', 'LILIS SUSANTI', 'Bidan Desa Kebonagung', '3A', 'PUSKESMAS Tegalrejo', 3627900, 22, '2021-10-01', 'KEPALA BKPPD', '822.3/6657/22/2021', '2021-09-28', '1', '2021-09-28 09:16:43', '2021-09-28 10:16:27', NULL);
INSERT INTO `hist_kgb` VALUES (68, '2021-10-01', '197808232007012005', 'KRISTINA ISTI PURNAMI', 'Bidan Desa Dawung', '3A', 'PUSKESMAS Tegalrejo', 3409800, 18, '2021-10-01', 'KEPALA BKPPD', '822.3/6654/22/2021', '2021-09-28', '1', '2021-09-28 09:16:43', '2021-09-28 10:16:27', NULL);
INSERT INTO `hist_kgb` VALUES (69, '2021-10-01', '197311042006042008', 'TRI WAHYUNI', 'Bidan Desa Tugurejo', '3A', 'PUSKESMAS Tempuran', 3627900, 22, '2021-10-01', 'KEPALA BKPPD', '822.3/6704/22/2021', '2021-09-28', '1', '2021-09-28 09:16:43', '2021-09-28 10:16:27', NULL);
INSERT INTO `hist_kgb` VALUES (70, '2021-10-01', '197708182007012020', 'ERNAYANTI', 'Bidan Desa Jogomulyo', '3A', 'PUSKESMAS Tempuran', 3517200, 20, '2021-10-01', 'KEPALA BKPPD', '822.3/6636/22/2021', '2021-09-28', '1', '2021-09-28 09:16:43', '2021-09-28 10:16:27', NULL);
INSERT INTO `hist_kgb` VALUES (71, '2021-10-01', '197110131994031002', 'SUROTO', 'Kepala Seksi Rehabilitasi Sosial', '3D', 'Dinas Sosial, Pengendalian Penduduk dan Keluarga Berencana, Pemberdayaan Perempuan dan Perlindungan Anak', 4237500, 24, '2021-10-01', 'KEPALA BKPPD', '822.3/6698/22/2021', '2021-09-28', '1', '2021-09-28 09:16:43', '2021-09-28 10:16:27', NULL);
INSERT INTO `hist_kgb` VALUES (72, '2021-10-01', '196904201992102001', 'SITI SHOLIHAH', 'Kepala UPTD Pemeliharaan Jalan dan Irigasi Wilayah Grabag', '4A', 'Dinas Pekerjaan Umum dan Penataan Ruang', 4416700, 24, '2021-10-01', 'KEPALA BKPPD', '822.4/6679/22/2021', '2021-09-28', '1', '2021-09-28 09:16:43', '2021-09-28 10:16:27', NULL);
INSERT INTO `hist_kgb` VALUES (73, '2021-10-01', '197003211997031003', 'BAMBANG YUSRO', 'Teknisi Air', '2D', 'Dinas Pekerjaan Umum dan Penataan Ruang', 3480700, 27, '2021-10-01', 'KEPALA BKPPD', '822.2/6628/22/2021', '2021-09-28', '1', '2021-09-28 09:16:43', '2021-09-28 10:16:27', NULL);
INSERT INTO `hist_kgb` VALUES (74, '2021-10-01', '197003202007011018', 'MUSLIMIN', 'Teknisi Keciptakaryaan', '2D', 'Dinas Pekerjaan Umum dan Penataan Ruang', 3703400, 31, '2021-10-01', 'KEPALA BKPPD', '822.2/6665/22/2021', '2021-09-28', '1', '2021-09-28 09:16:43', '2021-09-28 10:16:27', NULL);
INSERT INTO `hist_kgb` VALUES (75, '2021-10-01', '197704202008011007', 'MISBAH KHULMUNIR', 'Pemelihara Jalan', '2D', 'Dinas Pekerjaan Umum dan Penataan Ruang', 3271400, 23, '2021-10-01', 'KEPALA BKPPD', '822.2/6661/22/2021', '2021-09-28', '1', '2021-09-28 09:16:43', '2021-09-28 10:16:27', NULL);
INSERT INTO `hist_kgb` VALUES (76, '2021-10-01', '197307061993021001', 'PUJO IHTIARTA', 'Camat Ngablak', '4A', 'Kecamatan Ngablak', 4416700, 24, '2021-10-01', 'KEPALA BKPPD', '822.4/6670/22/2021', '2021-09-28', '1', '2021-09-28 09:16:44', '2021-09-28 10:16:28', NULL);
INSERT INTO `hist_kgb` VALUES (77, '2021-10-01', '196508061990102001', 'AMBAR LISTYAWATI', 'Pengelola Keamanan dan Ketertiban', '3B', 'Kecamatan Dukun', 4023300, 26, '2021-10-01', 'KEPALA BKPPD', '822.3/6620/22/2021', '2021-09-28', '1', '2021-09-28 09:16:44', '2021-09-28 10:16:28', NULL);
INSERT INTO `hist_kgb` VALUES (78, '2021-10-01', '197607151996021002', 'SRI HARTONO', 'Kepala Seksi Ketenteraman dan Ketertiban Umum', '3D', 'Kecamatan Kajoran', 4108100, 22, '2021-10-01', 'KEPALA BKPPD', '822.3/6685/22/2021', '2021-09-28', '1', '2021-09-28 09:16:44', '2021-09-28 10:16:28', NULL);
INSERT INTO `hist_kgb` VALUES (79, '2021-10-01', '196710211988102001', 'JUMINEM', 'Guru Kelas SD', '4A', 'SDN Soka 2 Kecamatan Srumbung', 4699300, 28, '2021-10-01', 'KEPALA BKPPD', '822.4/6650/22/2021', '2021-09-28', '1', '2021-09-28 09:16:44', '2021-09-28 10:16:28', NULL);
INSERT INTO `hist_kgb` VALUES (80, '2021-10-01', '196611031990102001', 'SUPIYAH', 'Guru Kelas SD', '3C', 'SDN Geneng 2 Kecamatan Candimulyo', 4193500, 26, '2021-10-01', 'KEPALA BKPPD', '822.3/6697/22/2021', '2021-09-28', '1', '2021-09-28 09:16:44', '2021-09-28 10:16:28', NULL);
INSERT INTO `hist_kgb` VALUES (81, '2021-10-01', '197002141997022003', 'TRI ARI HARDAWATI', 'Guru Bahasa Indonesia SMP', '4A', 'SMPN 1 WINDUSARI', 4416700, 24, '2021-10-01', 'KEPALA BKPPD', '822.4/6702/22/2021', '2021-09-28', '1', '2021-09-28 09:16:44', '2021-09-28 10:16:28', NULL);
INSERT INTO `hist_kgb` VALUES (82, '2021-10-01', '196405022000121002', 'TRIYANA', 'Guru IPS Terpadu SMP', '4A', 'SMPN 3 SALAMAN', 4555800, 26, '2021-10-01', 'KEPALA BKPPD', '822.4/6706/22/2021', '2021-09-28', '1', '2021-09-28 09:16:44', '2021-09-28 10:16:28', NULL);
INSERT INTO `hist_kgb` VALUES (83, '2021-10-01', '198305132006042008', 'LATIFATUL HIDAYATI', 'Guru Kelas SD', '3B', 'SDN Borobudur 1 Kecamatan Borobudur', 3340300, 14, '2021-10-01', 'KEPALA BKPPD', '822.3/6656/22/2021', '2021-09-28', '1', '2021-09-28 09:16:44', '2021-09-28 10:16:28', NULL);
INSERT INTO `hist_kgb` VALUES (84, '2021-10-01', '197704132007012014', 'WIWIK WIDYASTUTI', 'Bidan Desa Mejing', '3B', 'PUSKESMAS Candimulyo', 3665900, 20, '2021-10-01', 'KEPALA BKPPD', '822.3/6710/22/2021', '2021-09-28', '1', '2021-09-28 09:16:44', '2021-09-28 10:16:28', NULL);
INSERT INTO `hist_kgb` VALUES (85, '2021-10-01', '197905212007012006', 'MAY CHERLY RIYANTI', 'Bidan Desa Banyusari', '3A', 'PUSKESMAS Grabag 1', 3409800, 18, '2021-10-01', 'KEPALA BKPPD', '822.3/6659/22/2021', '2021-09-28', '1', '2021-09-28 09:16:44', '2021-09-28 10:16:28', NULL);
INSERT INTO `hist_kgb` VALUES (86, '2021-10-01', '197806302007012008', 'MARNI', 'Bidan Desa Karangkajen', '3A', 'PUSKESMAS Secang 1', 3409800, 18, '2021-10-01', 'KEPALA BKPPD', '822.3/6658/22/2021', '2021-09-28', '1', '2021-09-28 09:16:44', '2021-09-28 10:16:28', NULL);
INSERT INTO `hist_kgb` VALUES (87, '2021-10-01', '197107202009061001', 'SLAMET ASRORI', 'Pengadministrasi Umum', '2C', 'Kecamatan Grabag', 2949900, 19, '2021-10-01', 'KEPALA BKPPD', '822.2/6682/22/2021', '2021-09-28', '1', '2021-09-28 09:16:44', '2021-09-28 10:16:28', NULL);
INSERT INTO `hist_kgb` VALUES (88, '2021-10-01', '199010252012061001', 'RAHMAT PAMBUDI', 'Sekretaris Kecamatan Pakis', '3C', 'Kecamatan Pakis', 3172300, 8, '2021-10-01', 'KEPALA BKPPD', '822.3/6672/22/2021', '2021-09-28', '1', '2021-09-28 09:16:44', '2021-09-28 10:16:28', NULL);
INSERT INTO `hist_kgb` VALUES (89, '2021-10-01', '199207222012062001', 'IKA AJENG SILIH BARUNI', 'Sekretaris Kecamatan Salam', '3C', 'Kecamatan Salam', 3172300, 8, '2021-10-01', 'KEPALA BKPPD', '822.3/6645/22/2021', '2021-09-28', '1', '2021-09-28 09:16:44', '2021-09-28 10:16:28', NULL);
INSERT INTO `hist_kgb` VALUES (90, '2021-10-01', '197308252014062001', 'SITI SUHARMINAH', 'Guru Kelas SD', '2B', 'SDN Ngadiharjo 1 Kecamatan Borobudur', 2743800, 17, '2021-10-01', 'KEPALA BKPPD', '822.2/6680/22/2021', '2021-09-28', '1', '2021-09-28 09:16:44', '2021-09-28 10:16:28', NULL);
INSERT INTO `hist_kgb` VALUES (91, '2021-10-01', '197610152014061001', 'AHMAD FAUZAN', 'Petugas Keamanan', '2B', 'SDN Sukorejo Kecamatan Tegalrejo', 2830200, 19, '2021-10-01', 'KEPALA BKPPD', '822.2/6619/22/2021', '2021-09-28', '1', '2021-09-28 09:16:44', '2021-09-28 10:16:28', NULL);
INSERT INTO `hist_kgb` VALUES (92, '2021-10-01', '196609142014061001', 'MUH SHOWIR', 'Guru Bahasa Indonesia SMP', '3A', 'SMPN 4 Satu Atap Sawangan', 3627900, 22, '2021-10-01', 'KEPALA BKPPD', '822.3/6663/22/2021', '2021-09-28', '1', '2021-09-28 09:16:44', '2021-09-28 10:16:28', NULL);
INSERT INTO `hist_kgb` VALUES (93, '2021-10-01', '197507052014062002', 'YULI RACHMAWATI', 'Guru Kelas SD', '3A', 'SDN Sukorejo Kecamatan Tegalrejo', 3305700, 16, '2021-10-01', 'KEPALA BKPPD', '822.3/6714/22/2021', '2021-09-28', '1', '2021-09-28 09:16:44', '2021-09-28 10:16:28', NULL);
INSERT INTO `hist_kgb` VALUES (94, '2021-10-01', '197107142014062002', 'YULIAH', 'Guru Kelas SD', '3B', 'SDN Kebonsari Kecamatan Borobudur', 3238300, 12, '2021-10-01', 'KEPALA BKPPD', '822.3/6715/22/2021', '2021-09-28', '1', '2021-09-28 09:16:44', '2021-09-28 10:16:28', NULL);
INSERT INTO `hist_kgb` VALUES (95, '2021-10-01', '198204262014062009', 'WASILAH KARUNIA', 'Pustakawan', '3A', 'SMPN 2 CANDIMULYO', 3305700, 16, '2021-10-01', 'KEPALA BKPPD', '822.3/6708/22/2021', '2021-09-28', '1', '2021-09-28 09:16:45', '2021-09-28 10:16:28', NULL);
INSERT INTO `hist_kgb` VALUES (96, '2021-10-01', '197308272014062002', 'EUIS ROSMALINA', 'Guru Kelas SD', '3B', 'SDN Srumbung 2 Kecamatan Srumbung', 3238300, 12, '2021-10-01', 'KEPALA BKPPD', '822.3/6637/22/2021', '2021-09-28', '1', '2021-09-28 09:16:45', '2021-09-28 10:16:28', NULL);
INSERT INTO `hist_kgb` VALUES (97, '2021-10-01', '197603292014061003', 'ARIN WIJI SUSANTO', 'Guru Kelas SD', '3A', 'SDN Ngabean Kecamatan Secang', 3204700, 14, '2021-10-01', 'KEPALA BKPPD', '822.3/6625/22/2021', '2021-09-28', '1', '2021-09-28 09:16:45', '2021-09-28 10:16:28', NULL);
INSERT INTO `hist_kgb` VALUES (98, '2021-10-01', '197703252014061002', 'MUH SOLEH', 'Petugas Keamanan', '2A', 'SDN Soroyudan Kecamatan Tegalrejo', 2632400, 17, '2021-10-01', 'KEPALA BKPPD', '822.2/6664/22/2021', '2021-09-28', '1', '2021-09-28 09:16:45', '2021-09-28 10:16:28', NULL);
INSERT INTO `hist_kgb` VALUES (99, '2021-10-01', '198306172014061003', 'SUHARMOKO', 'Guru Pendidikan Agama Islam SD', '3B', 'SDN Sumberarum 1 Kecamatan Tempuran', 3340300, 14, '2021-10-01', 'KEPALA BKPPD', '822.3/6694/22/2021', '2021-09-28', '1', '2021-09-28 09:16:45', '2021-09-28 10:16:29', NULL);
INSERT INTO `hist_kgb` VALUES (100, '2021-10-01', '196807152014062001', 'SRI PURWANI', 'Guru Kelas SD', '3A', 'SDN Ketunggeng 1 Kecamatan Dukun', 3517200, 20, '2021-10-01', 'KEPALA BKPPD', '822.3/6688/22/2021', '2021-09-28', '1', '2021-09-28 09:16:45', '2021-09-28 10:16:29', NULL);
INSERT INTO `hist_kgb` VALUES (101, '2021-10-01', '198203082014062006', 'SRI WIDARYATI', 'Guru Kelas SD', '3A', 'SDN Pucanganom 1 Kecamatan Srumbung', 3106900, 12, '2021-10-01', 'KEPALA BKPPD', '822.3/6689/22/2021', '2021-09-28', '1', '2021-09-28 09:16:45', '2021-09-28 10:16:29', NULL);
INSERT INTO `hist_kgb` VALUES (102, '2021-10-01', '197703102014062003', 'SUDARYANTI', 'Guru Kelas SD', '3B', 'SDN Kemiren Kecamatan Srumbung', 3238300, 12, '2021-10-01', 'KEPALA BKPPD', '822.3/6692/22/2021', '2021-09-28', '1', '2021-09-28 09:16:45', '2021-09-28 10:16:29', NULL);
INSERT INTO `hist_kgb` VALUES (103, '2021-10-01', '198310122014062002', 'TRI WIDIYASTUTI', 'Guru Kelas SD', '2B', 'SDN Tempursari Kecamatan Candimulyo', 2830200, 19, '2021-10-01', 'KEPALA BKPPD', '822.2/6705/22/2021', '2021-09-28', '1', '2021-09-28 09:16:45', '2021-09-28 10:16:29', NULL);
INSERT INTO `hist_kgb` VALUES (104, '2021-10-01', '196610011988032019', 'HASTUTI', 'Pengadministrasi Keuangan', '3D', 'Dinas Peternakan dan Perikanan', 4650600, 30, '2021-10-01', 'KEPALA BKPPD', '822.3/6643/22/2021', '2021-09-28', '1', '2021-09-28 09:16:45', '2021-09-28 10:16:29', NULL);
INSERT INTO `hist_kgb` VALUES (105, '2021-11-01', '196901231993111001', 'DWI SUSETYO', 'Kepala Seksi Surveilans dan Imunisasi', '4A', 'Dinas Kesehatan', 4699300, 28, '2021-11-01', 'KEPALA BKPPD', '822.4/6730/22/2021', '2021-09-28', '1', '2021-09-28 10:16:46', '2021-09-28 10:16:54', NULL);
INSERT INTO `hist_kgb` VALUES (106, '2021-11-01', '196712051988112001', 'APRI WAHYUNINGSIH', 'Bidan', '3D', 'Rumah Sakit Umum Daerah Muntilan', 4508600, 28, '2021-11-01', 'KEPALA BKPPD', '822.3/6719/22/2021', '2021-09-28', '1', '2021-09-28 10:16:46', '2021-09-28 10:16:54', NULL);
INSERT INTO `hist_kgb` VALUES (107, '2021-11-01', '197601232006042011', 'ENDAH KURNIA SARI', 'Bidan', '2D', 'PUSKESMAS Mungkid', 2980800, 17, '2021-11-01', 'KEPALA BKPPD', '822.2/6733/22/2021', '2021-09-28', '1', '2021-09-28 10:16:46', '2021-09-28 10:16:54', NULL);
INSERT INTO `hist_kgb` VALUES (108, '2021-11-01', '196504151992112001', 'ROJIYAH', 'Guru Kelas SD', '3C', 'SDN Keningar 1 Kecamatan Dukun', 4065500, 24, '2021-11-01', 'KEPALA BKPPD', '822.3/6761/22/2021', '2021-09-28', '1', '2021-09-28 10:16:47', '2021-09-28 10:16:54', NULL);
INSERT INTO `hist_kgb` VALUES (109, '2021-11-01', '196401071992111001', 'SLAMET', 'Guru Kelas SD', '3B', 'SDN Mangunrejo Kecamatan Kajoran', 3900500, 24, '2021-11-01', 'KEPALA BKPPD', '822.3/6770/22/2021', '2021-09-28', '1', '2021-09-28 10:16:47', '2021-09-28 10:16:54', NULL);
INSERT INTO `hist_kgb` VALUES (110, '2021-11-01', '196207091992112001', 'TRI ANDRIYANI', 'Guru Kelas SD', '3D', 'SDN Sutopati 2 Kecamatan Kajoran', 4237500, 24, '2021-11-01', 'KEPALA BKPPD', '822.3/6782/22/2021', '2021-09-28', '1', '2021-09-28 10:16:47', '2021-09-28 10:16:54', NULL);
INSERT INTO `hist_kgb` VALUES (111, '2021-11-01', '196408051992112001', 'ISMIYATI', 'Kepala SD', '3D', 'SDN Sukomulyo Kecamatan Kajoran', 4237500, 24, '2021-11-01', 'KEPALA BKPPD', '822.3/6742/22/2021', '2021-09-28', '1', '2021-09-28 10:16:47', '2021-09-28 10:16:54', NULL);
INSERT INTO `hist_kgb` VALUES (112, '2021-11-01', '196610051992111002', 'ILHAM WINARTO', 'Guru Kelas SD', '3B', 'SDN Giriwarno Kecamatan Kaliangkrik', 3900500, 24, '2021-11-01', 'KEPALA BKPPD', '822.3/6739/22/2021', '2021-09-28', '1', '2021-09-28 10:16:47', '2021-09-28 10:16:54', NULL);
INSERT INTO `hist_kgb` VALUES (113, '2021-11-01', '196608291992112001', 'M MUSTAFRIHAH', 'Guru Kelas SD', '3D', 'SDN Ngawonggo 1 Kecamatan Kaliangkrik', 4237500, 24, '2021-11-01', 'KEPALA BKPPD', '822.3/6748/22/2021', '2021-09-28', '1', '2021-09-28 10:16:47', '2021-09-28 10:16:54', NULL);
INSERT INTO `hist_kgb` VALUES (114, '2021-11-01', '196209031992111001', 'SALIM', 'Guru Kelas SD', '3D', 'SDN Karanganyar Kecamatan Borobudur', 4237500, 24, '2021-11-01', 'KEPALA BKPPD', '822.3/6764/22/2021', '2021-09-28', '1', '2021-09-28 10:16:47', '2021-09-28 10:16:54', NULL);
INSERT INTO `hist_kgb` VALUES (115, '2021-11-01', '196302121986112001', 'SUMARNINGSIH', 'Guru Kelas SD', '3D', 'SDN Tanjunganom Kecamatan Mertoyudan', 4650600, 30, '2021-11-01', 'KEPALA BKPPD', '822.3/6763/22/2021', '2021-09-28', '1', '2021-09-28 10:16:47', '2021-09-28 10:16:54', NULL);
INSERT INTO `hist_kgb` VALUES (116, '2021-11-01', '196508251988112001', 'MUNGAYANAH', 'Kepala SD', '3D', 'SDN Mungkid 1 Kecamatan Mungkid', 4508600, 28, '2021-11-01', 'KEPALA BKPPD', '822.3/6755/22/2021', '2021-09-28', '1', '2021-09-28 10:16:47', '2021-09-28 10:16:54', NULL);
INSERT INTO `hist_kgb` VALUES (117, '2021-11-01', '196208031992112001', 'SIMYATI', 'Kepala SD', '3D', 'SDN Paremono 1 Kecamatan Mungkid', 4237500, 24, '2021-11-01', 'KEPALA BKPPD', '822.3/6767/22/2021', '2021-09-28', '1', '2021-09-28 10:16:47', '2021-09-28 10:16:54', NULL);
INSERT INTO `hist_kgb` VALUES (118, '2021-11-01', '196509101992111001', 'BAMBANG SUTADI', 'Kepala SD', '3C', 'SDN Jogonayan Kecamatan Ngablak', 4065500, 24, '2021-11-01', 'KEPALA BKPPD', '822.3/6723/22/2021', '2021-09-28', '1', '2021-09-28 10:16:47', '2021-09-28 10:16:54', NULL);
INSERT INTO `hist_kgb` VALUES (119, '2021-11-01', '196405011992112001', 'WASIYAH', 'Guru Kelas SD', '3B', 'SDN Sudimoro 2 Kecamatan Srumbung', 3900500, 24, '2021-11-01', 'KEPALA BKPPD', '822.3/6786/22/2021', '2021-09-28', '1', '2021-09-28 10:16:47', '2021-09-28 10:16:54', NULL);
INSERT INTO `hist_kgb` VALUES (120, '2021-11-01', '196711011992112001', 'DIAH NOVEMIARSIH', 'Guru Kelas SD', '3D', 'SDN Mendut Kecamatan Mungkid', 4237500, 24, '2021-11-01', 'KEPALA BKPPD', '822.3/6728/22/2021', '2021-09-28', '1', '2021-09-28 10:16:47', '2021-09-28 10:16:54', NULL);
INSERT INTO `hist_kgb` VALUES (121, '2021-11-01', '196604021992111001', 'NURYADHI', 'Guru Kelas SD', '3C', 'SDN Muneng 1 Kecamatan Pakis', 4065500, 24, '2021-11-01', 'KEPALA BKPPD', '822.3/6759/22/2021', '2021-09-28', '1', '2021-09-28 10:16:47', '2021-09-28 10:16:54', NULL);
INSERT INTO `hist_kgb` VALUES (122, '2021-11-01', '196210121988112001', 'ENDANG SITI BAROKAH', 'Guru Pendidikan Agama Islam SD', '3D', 'SDN Salaman 1 Kecamatan Salaman', 4650600, 30, '2021-11-01', 'KEPALA BKPPD', '822.3/6734/22/2021', '2021-09-28', '1', '2021-09-28 10:16:47', '2021-09-28 10:16:54', NULL);
INSERT INTO `hist_kgb` VALUES (123, '2021-11-01', '196512221992112001', 'LUSIA SRI BUDIYATI', 'Guru Kelas SD', '3C', 'SDN Jamus 2 Kecamatan Ngluwar', 4065500, 24, '2021-11-01', 'KEPALA BKPPD', '822.3/6747/22/2021', '2021-09-28', '1', '2021-09-28 10:16:47', '2021-09-28 10:16:54', NULL);
INSERT INTO `hist_kgb` VALUES (124, '2021-11-01', '196408151992111002', 'MUH YUNUS', 'Kepala SD', '3D', 'SDN Jerukagung 2 Kecamatan Srumbung', 4237500, 24, '2021-11-01', 'KEPALA BKPPD', '822.3/6741/22/2021', '2021-09-28', '1', '2021-09-28 10:16:47', '2021-09-28 10:16:54', NULL);
INSERT INTO `hist_kgb` VALUES (125, '2021-11-01', '196712121992112002', 'ISNI MASTUTI', 'Kepala SD', '3D', 'SDN Donomulyo Kecamatan Secang', 4237500, 24, '2021-11-01', 'KEPALA BKPPD', '822.3/6743/22/2021', '2021-09-28', '1', '2021-09-28 10:16:47', '2021-09-28 10:16:55', NULL);
INSERT INTO `hist_kgb` VALUES (126, '2021-11-01', '196311301992112001', 'HARTINI', 'Guru Kelas SD', '3D', 'SDN Purwosari Kecamatan Secang', 4237500, 24, '2021-11-01', 'KEPALA BKPPD', '822.3/6738/22/2021', '2021-09-28', '1', '2021-09-28 10:16:47', '2021-09-28 10:16:55', NULL);
INSERT INTO `hist_kgb` VALUES (127, '2021-11-01', '196307101992112001', 'SRI TENTREM', 'Guru Kelas SD', '3D', 'SDN Srumbung 1 Kecamatan Srumbung', 4237500, 24, '2021-11-01', 'KEPALA BKPPD', '822.3/6762/22/2021', '2021-09-28', '1', '2021-09-28 10:16:47', '2021-09-28 10:16:55', NULL);
INSERT INTO `hist_kgb` VALUES (128, '2021-11-01', '196708282006042007', 'ATIK ROYANI', 'Guru Kelas SD', '3B', 'SDN Kebonlegi Kecamatan Kaliangkrik', 4150100, 28, '2021-11-01', 'KEPALA BKPPD', '822.3/6722/22/2021', '2021-09-28', '1', '2021-09-28 10:16:47', '2021-09-28 10:16:55', NULL);
INSERT INTO `hist_kgb` VALUES (129, '2021-11-01', '196502121992112002', 'CHATARINA MARWATI', 'Guru Kelas SD', '3C', 'SDN Kembang Kuning 2 Kecamatan Windusari', 4065500, 24, '2021-11-01', 'KEPALA BKPPD', '822.3/6724/22/2021', '2021-09-28', '1', '2021-09-28 10:16:47', '2021-09-28 10:16:55', NULL);
INSERT INTO `hist_kgb` VALUES (130, '2021-11-01', '197601052006042018', 'SURAHMI JAYA NEGARA', 'Bidan', '3B', 'PUSKESMAS Bandongan', 3238300, 12, '2021-11-01', 'KEPALA BKPPD', '822.3/6779/22/2021', '2021-09-28', '1', '2021-09-28 10:16:47', '2021-09-28 10:16:55', NULL);
INSERT INTO `hist_kgb` VALUES (131, '2021-11-01', '197510232006042015', 'ENY SISWATY ALIAS SITI ROCHMAH', 'Bidan Desa Tempursari', '2D', 'PUSKESMAS Candimulyo', 2980800, 17, '2021-11-01', 'KEPALA BKPPD', '822.2/6735/22/2021', '2021-09-28', '1', '2021-09-28 10:16:47', '2021-09-28 10:16:55', NULL);
INSERT INTO `hist_kgb` VALUES (132, '2021-11-01', '197609302006042019', 'SRI HARYANTI', 'Bidan Desa Tampirkulon', '3B', 'PUSKESMAS Candimulyo', 3238300, 12, '2021-11-01', 'KEPALA BKPPD', '822.3/6773/22/2021', '2021-09-28', '1', '2021-09-28 10:16:47', '2021-09-28 10:16:55', NULL);
INSERT INTO `hist_kgb` VALUES (133, '2021-11-01', '197305012006042020', 'NI WAYAN WIDNYANI', 'Bidan', '3B', 'Rumah Sakit Daerah Merah Putih', 3238300, 12, '2021-11-01', 'KEPALA BKPPD', '822.3/6757/22/2021', '2021-09-28', '1', '2021-09-28 10:16:47', '2021-09-28 10:16:55', NULL);
INSERT INTO `hist_kgb` VALUES (134, '2021-11-01', '196912122007012028', 'MARIA GORETI ARUM ANITA', 'Bidan Desa Sumber', '3A', 'PUSKESMAS Dukun', 3106900, 12, '2021-11-01', 'KEPALA BKPPD', '822.3/6750/22/2021', '2021-09-28', '1', '2021-09-28 10:16:48', '2021-09-28 10:16:55', NULL);
INSERT INTO `hist_kgb` VALUES (135, '2021-11-01', '196707161988111001', 'SOBIKIN', 'Perawat', '3D', 'PUSKESMAS Grabag 2', 4508600, 28, '2021-11-01', 'KEPALA BKPPD', '822.3/6771/22/2021', '2021-09-28', '1', '2021-09-28 10:16:48', '2021-09-28 10:16:55', NULL);
INSERT INTO `hist_kgb` VALUES (136, '2021-11-01', '197212252006042011', 'CHRISTINA DWI RAHAYU', 'Bidan Desa Kartoharjo', '3A', 'PUSKESMAS Grabag 1', 3106900, 12, '2021-11-01', 'KEPALA BKPPD', '822.3/6726/22/2021', '2021-09-28', '1', '2021-09-28 10:16:48', '2021-09-28 10:16:55', NULL);
INSERT INTO `hist_kgb` VALUES (137, '2021-11-01', '197801152007012011', 'DEWI ARIYANTI', 'Bidan Desa Lebak', '3A', 'PUSKESMAS Grabag 2', 3106900, 12, '2021-11-01', 'KEPALA BKPPD', '822.3/6727/22/2021', '2021-09-28', '1', '2021-09-28 10:16:48', '2021-09-28 10:16:55', NULL);
INSERT INTO `hist_kgb` VALUES (138, '2021-11-01', '197103122006042014', 'YETTI PURWITOSARI', 'Bidan Desa Girirejo', '3A', 'PUSKESMAS Kaliangkrik', 3106900, 12, '2021-11-01', 'KEPALA BKPPD', '822.3/6787/22/2021', '2021-09-28', '1', '2021-09-28 10:16:48', '2021-09-28 10:16:55', NULL);
INSERT INTO `hist_kgb` VALUES (139, '2021-11-01', '196401311989112002', 'SITI SUNDARI', 'Dokter Gigi', '4C', 'PUSKESMAS Borobudur', 5431900, 32, '2021-11-01', 'BUPATI MAGELANG', '822.4/6769/22/2021', '2021-09-28', '1', '2021-09-28 10:16:48', '2021-09-28 10:16:55', NULL);
INSERT INTO `hist_kgb` VALUES (140, '2021-11-01', '196802261988112001', 'SRI REJEKI ERNAWATI', 'Sanitarian', '3C', 'PUSKESMAS Muntilan 1', 4325600, 28, '2021-11-01', 'KEPALA BKPPD', '822.3/6775/22/2021', '2021-09-28', '1', '2021-09-28 10:16:48', '2021-09-28 10:16:55', NULL);
INSERT INTO `hist_kgb` VALUES (141, '2021-11-01', '197605302006042025', 'CHOTIMAH', 'Bidan Desa Jambewangi', '3B', 'PUSKESMAS Pakis', 3238300, 12, '2021-11-01', 'KEPALA BKPPD', '822.3/6725/22/2021', '2021-09-28', '1', '2021-09-28 10:16:48', '2021-09-28 10:16:55', NULL);
INSERT INTO `hist_kgb` VALUES (142, '2021-11-01', '196802131988112001', 'SIH WIDAYATI', 'Perawat Gigi', '3D', 'PUSKESMAS Secang 1', 4508600, 28, '2021-11-01', 'KEPALA BKPPD', '822.3/6766/22/2021', '2021-09-28', '1', '2021-09-28 10:16:48', '2021-09-28 10:16:55', NULL);
INSERT INTO `hist_kgb` VALUES (143, '2021-11-01', '197904082005012010', 'APRIASTUTI DWI CANDRAWATI', 'Bidan Desa Tampingan', '3B', 'PUSKESMAS Tegalrejo', 3554000, 18, '2021-11-01', 'KEPALA BKPPD', '822.3/6720/22/2021', '2021-09-28', '1', '2021-09-28 10:16:48', '2021-09-28 10:16:55', NULL);
INSERT INTO `hist_kgb` VALUES (144, '2021-11-01', '197607162006042016', 'EMY YULIANTI', 'Bidan Desa Japan', '3A', 'PUSKESMAS Tegalrejo', 3106900, 12, '2021-11-01', 'KEPALA BKPPD', '822.3/6732/22/2021', '2021-09-28', '1', '2021-09-28 10:16:48', '2021-09-28 10:16:55', NULL);
INSERT INTO `hist_kgb` VALUES (145, '2021-11-01', '196406171988111001', 'SURONO', 'Pengelola Pemeliharaan Jaringan Irigasi', '3B', 'Dinas Pekerjaan Umum dan Penataan Ruang', 4150100, 28, '2021-11-01', 'KEPALA BKPPD', '822.3/6776/22/2021', '2021-09-28', '1', '2021-09-28 10:16:48', '2021-09-28 10:16:55', NULL);
INSERT INTO `hist_kgb` VALUES (146, '2021-11-01', '196606161988111001', 'SUNARTO', 'Teknisi Air', '3A', 'Dinas Pekerjaan Umum dan Penataan Ruang', 3627900, 22, '2021-11-01', 'KEPALA BKPPD', '822.3/6777/22/2021', '2021-09-28', '1', '2021-09-28 10:16:48', '2021-09-28 10:16:56', NULL);
INSERT INTO `hist_kgb` VALUES (147, '2021-11-01', '196601101991021001', 'SANTOSO', 'Kepala Seksi Air Minum dan Penyehatan Lingkungan', '3D', 'Dinas Pekerjaan Umum dan Penataan Ruang', 4370900, 26, '2021-11-01', 'KEPALA BKPPD', '822.3/6765/22/2021', '2021-09-28', '1', '2021-09-28 10:16:48', '2021-09-28 10:16:56', NULL);
INSERT INTO `hist_kgb` VALUES (148, '2021-11-01', '196810231993011003', 'SURATNA', 'Penyuluh Pertanian', '3D', 'Dinas Pertanian dan Pangan', 4370900, 26, '2021-11-01', 'KEPALA BKPPD', '822.3/6780/22/2021', '2021-09-28', '1', '2021-09-28 10:16:48', '2021-09-28 10:16:56', NULL);
INSERT INTO `hist_kgb` VALUES (149, '2021-11-01', '196605121992111001', 'LANJAR NARYADI', 'Petugas Keamanan', '2D', 'SDN Kembaran Kecamatan Candimulyo', 3374400, 25, '2021-11-01', 'KEPALA BKPPD', '822.2/6746/22/2021', '2021-09-28', '1', '2021-09-28 10:16:49', '2021-09-28 10:16:56', NULL);
INSERT INTO `hist_kgb` VALUES (150, '2021-11-01', '196403291992111002', 'MUH THOYIB', 'Kepala SD', '3C', 'SDN Surojoyo Kecamatan Candimulyo', 4065500, 24, '2021-11-01', 'KEPALA BKPPD', '822.3/6753/22/2021', '2021-09-28', '1', '2021-09-28 10:16:49', '2021-09-28 10:16:56', NULL);
INSERT INTO `hist_kgb` VALUES (151, '2021-11-01', '196210061992112001', 'ANASTASIA BUDI PARTINI', 'Guru Kelas SD', '3C', 'SDN Mertoyudan 3 Kecamatan Mertoyudan', 4065500, 24, '2021-11-01', 'KEPALA BKPPD', '822.3/6718/22/2021', '2021-09-28', '1', '2021-09-28 10:16:49', '2021-09-28 10:16:56', NULL);
INSERT INTO `hist_kgb` VALUES (152, '2021-11-01', '196307111995121002', 'SUPRIBADI', 'Guru BP/BK SMP', '4A', 'SMPN 2 SRUMBUNG', 4416700, 24, '2021-11-01', 'KEPALA BKPPD', '822.4/6778/22/2021', '2021-09-28', '1', '2021-09-28 10:16:49', '2021-09-28 10:16:56', NULL);
INSERT INTO `hist_kgb` VALUES (153, '2021-11-01', '196806192006042004', 'UFI AHDIYAH', 'Guru Kelas SD', '2C', 'SDN Ngadiharjo 1 Kecamatan Borobudur', 3665000, 33, '2021-11-01', 'KEPALA BKPPD', '822.2/6785/22/2021', '2021-09-28', '1', '2021-09-28 10:16:49', '2021-09-28 10:16:56', NULL);
INSERT INTO `hist_kgb` VALUES (154, '2021-11-01', '196801162006042002', 'THERESIA ENDANG KARTININGSIH', 'Guru Bahasa Indonesia SMP', '3D', 'SMPN 2 CANDIMULYO', 4108100, 22, '2021-11-01', 'KEPALA BKPPD', '822.3/6783/22/2021', '2021-09-28', '1', '2021-09-28 10:16:49', '2021-09-28 10:16:56', NULL);
INSERT INTO `hist_kgb` VALUES (155, '2021-11-01', '196406091989111003', 'HABIB FAKHRUDDIN', 'Guru BP/BK SMP', '4A', 'SMPN 3 MERTOYUDAN', 4847300, 30, '2021-11-01', 'KEPALA BKPPD', '822.4/6737/22/2021', '2021-09-28', '1', '2021-09-28 10:16:49', '2021-09-28 10:16:56', NULL);
INSERT INTO `hist_kgb` VALUES (156, '2021-11-01', '196404302007011013', 'JAMILAN KOMARODIN', 'Pengelola Penataan Sampah', '2D', 'Dinas Lingkungan Hidup', 3590300, 29, '2021-11-01', 'KEPALA BKPPD', '822.2/6744/22/2021', '2021-09-28', '1', '2021-09-28 10:16:49', '2021-09-28 10:16:56', NULL);
INSERT INTO `hist_kgb` VALUES (157, '2021-11-01', '196408122007011033', 'AGUS SUTANTO', 'Pengadministrasi Perencanaan dan Program', '2B', 'Kecamatan Tempuran', 2660000, 15, '2021-11-01', 'KEPALA BKPPD', '822.2/6717/22/2021', '2021-09-28', '1', '2021-09-28 10:16:49', '2021-09-28 10:16:56', NULL);
INSERT INTO `hist_kgb` VALUES (158, '2021-11-01', '196601242007011016', 'DWI GESTI ATMOKO', 'Pengelola Pemberdayaan Masyarakat dan Kelembagaan', '2D', 'Kecamatan Windusari', 3820000, 33, '2021-11-01', 'KEPALA BKPPD', '822.2/6729/22/2021', '2021-09-28', '1', '2021-09-28 10:16:49', '2021-09-28 10:16:56', NULL);
INSERT INTO `hist_kgb` VALUES (159, '2021-11-01', '196702232007011009', 'SUTRISNO', 'Pengadministrasi Umum', '2D', 'Kecamatan Salaman', 3074700, 19, '2021-11-01', 'KEPALA BKPPD', '822.2/6781/22/2021', '2021-09-28', '1', '2021-09-28 10:16:49', '2021-09-28 10:16:56', NULL);
INSERT INTO `hist_kgb` VALUES (160, '2021-11-01', '196704112007011028', 'MUH HASIM', 'Pengadministrasi Pemerintahan', '2D', 'Kecamatan Borobudur', 3074700, 19, '2021-11-01', 'KEPALA BKPPD', '822.2/6752/22/2021', '2021-09-28', '1', '2021-09-28 10:16:49', '2021-09-28 10:16:56', NULL);
INSERT INTO `hist_kgb` VALUES (161, '2021-11-01', '196706262007011033', 'MUHAMAD AGUS SUBKHAN', 'Pengadministrasi Kepegawaian', '2D', 'PUSKESMAS Salaman 1', 3074700, 19, '2021-11-01', 'KEPALA BKPPD', '822.2/6754/22/2021', '2021-09-28', '1', '2021-09-28 10:16:49', '2021-09-28 10:16:56', NULL);
INSERT INTO `hist_kgb` VALUES (162, '2021-11-01', '196908012002121009', 'AGUNG SUBROTO', 'Kepala Pusat Kesehatan Masyarakat Grabag 1', '4A', 'PUSKESMAS Grabag 1', 4281800, 22, '2021-11-01', 'KEPALA BKPPD', '822.4/6716/22/2021', '2021-09-28', '1', '2021-09-28 10:16:49', '2021-09-28 10:16:56', NULL);
INSERT INTO `hist_kgb` VALUES (163, '2021-11-01', '197005062009061002', 'TARNO', 'Pengolah Data Pelayanan', '3A', 'Kecamatan Grabag', 3517200, 20, '2021-11-01', 'KEPALA BKPPD', '822.3/6784/22/2021', '2021-09-28', '1', '2021-09-28 10:16:49', '2021-09-28 10:16:56', NULL);
INSERT INTO `hist_kgb` VALUES (164, '2021-11-01', '197205102009061001', 'MUGO SANTOSO', 'Pengadministrasi Umum', '2B', 'PUSKESMAS Pakis', 2660000, 15, '2021-11-01', 'KEPALA BKPPD', '822.2/6751/22/2021', '2021-09-28', '1', '2021-09-28 10:16:49', '2021-09-28 10:16:56', NULL);
INSERT INTO `hist_kgb` VALUES (165, '2021-11-01', '197006031992111001', 'OLOAN HARIANTO MANGARAJA MANULLANG', 'Pengelola Kepegawaian', '3D', 'Dinas Pendidikan dan Kebudayaan', 4237500, 24, '2021-11-01', 'KEPALA BKPPD', '822.3/6760/22/2021', '2021-09-28', '1', '2021-09-28 10:16:49', '2021-09-28 10:16:56', NULL);
INSERT INTO `hist_kgb` VALUES (166, '2021-11-01', '197604132010011005', 'ARIS YURI HETMANTO', 'Pengadministrasi Perencanaan dan Program', '2C', 'Kecamatan Bandongan', 2949900, 19, '2021-11-01', 'KEPALA BKPPD', '822.2/6721/22/2021', '2021-09-28', '1', '2021-09-28 10:16:49', '2021-09-28 10:16:56', NULL);
INSERT INTO `hist_kgb` VALUES (167, '2021-11-01', '196508151993112001', 'PAWIT TRI AGUSTININGSIH', 'Guru IPA SMP', '4A', 'SMP Ma`arif Borobudur', 4555800, 26, '2021-11-01', 'KEPALA BKPPD', '822.4/6756/22/2021', '2021-09-28', '1', '2021-09-28 10:16:49', '2021-09-28 10:16:56', NULL);
INSERT INTO `hist_kgb` VALUES (168, '2021-11-01', '198202092014061002', 'MAHFUT MUSTOFA', 'Pengadministrasi Sarana dan Prasarana', '2B', 'SMPN 1 NGLUWAR', 2830200, 19, '2021-11-01', 'KEPALA BKPPD', '822.2/6749/22/2021', '2021-09-28', '1', '2021-09-28 10:16:49', '2021-09-28 10:16:56', NULL);
INSERT INTO `hist_kgb` VALUES (169, '2021-11-01', '198307042014062007', 'IMA KURNIAWATI', 'Guru Kelas SD', '3B', 'SDN Bawang Kecamatan Tempuran', 3445500, 16, '2021-11-01', 'KEPALA BKPPD', '822.3/6740/22/2021', '2021-09-28', '1', '2021-09-28 10:16:49', '2021-09-28 10:16:56', NULL);
INSERT INTO `hist_kgb` VALUES (170, '2021-11-01', '197007062014061001', 'SODIKIN', 'Pramu Bakti', '2A', 'SMPN 3 SECANG', 2800800, 21, '2021-11-01', 'KEPALA BKPPD', '822.2/6772/22/2021', '2021-09-28', '1', '2021-09-28 10:16:49', '2021-09-28 10:16:57', NULL);
INSERT INTO `hist_kgb` VALUES (171, '2021-11-01', '196412152014061002', 'FAHRUR', 'Guru Kelas SD', '2B', 'SDN Losari Kecamatan Pakis', 3516300, 33, '2021-11-01', 'KEPALA BKPPD', '822.2/6736/22/2021', '2021-09-28', '1', '2021-09-28 10:16:49', '2021-09-28 10:16:57', NULL);
INSERT INTO `hist_kgb` VALUES (172, '2021-11-01', '197711012014062001', 'NUR ASRININGSIH PUJI LESTARI', 'Guru Kelas SD', '3A', 'SDN Paremono 1 Kecamatan Mungkid', 3305700, 16, '2021-11-01', 'KEPALA BKPPD', '822.3/6758/22/2021', '2021-09-28', '1', '2021-09-28 10:16:50', '2021-09-28 10:16:57', NULL);
INSERT INTO `hist_kgb` VALUES (173, '2021-11-01', '198009042014062002', 'SRI RAHAYU', 'Pengadministrasi Umum', '2B', 'SMPN 3 GRABAG', 2830200, 19, '2021-11-01', 'KEPALA BKPPD', '822.2/6774/22/2021', '2021-09-28', '1', '2021-09-28 10:16:50', '2021-09-28 10:16:57', NULL);
INSERT INTO `hist_kgb` VALUES (174, '2021-11-01', '197509112014062001', 'SITI NUR FADHILAH', 'Guru Bahasa Indonesia SMP', '3A', 'SMPN 4 Satu Atap Salaman', 3627900, 22, '2021-11-01', 'KEPALA BKPPD', '822.3/6768/22/2021', '2021-09-28', '1', '2021-09-28 10:16:50', '2021-09-28 10:16:57', NULL);
INSERT INTO `hist_kgb` VALUES (175, '2021-11-01', '198101122014062004', 'ZAHROH SHOFIYATI', 'Guru Kelas SD', '2B', 'SDN Kamongan Kecamatan Srumbung', 2743800, 17, '2021-11-01', 'KEPALA BKPPD', '822.2/6788/22/2021', '2021-09-28', '1', '2021-09-28 10:16:50', '2021-09-28 10:16:57', NULL);
INSERT INTO `hist_kgb` VALUES (176, '2021-11-01', '198010242014061002', 'JOKO TUNGGAL PRIYONO', 'Guru Kelas SD', '2B', 'SDN Mertoyudan 1 Kecamatan Mertoyudan', 2830200, 19, '2021-11-01', 'KEPALA BKPPD', '822.2/6745/22/2021', '2021-09-28', '1', '2021-09-28 10:16:50', '2021-09-28 10:16:57', NULL);
INSERT INTO `hist_kgb` VALUES (177, '2021-11-01', '199003052017062001', 'EMA SEKARWATI', 'Penyuluh Pertanian', '2B', 'Dinas Pertanian dan Pangan', 2500000, 11, '2021-11-01', 'KEPALA BKPPD', '822.2/6731/22/2021', '2021-09-28', '1', '2021-09-28 10:16:50', '2021-09-28 10:16:57', NULL);

-- ----------------------------
-- Table structure for nominal_kelas_jabatan
-- ----------------------------
DROP TABLE IF EXISTS `nominal_kelas_jabatan`;
CREATE TABLE `nominal_kelas_jabatan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `induk_kelas` tinyint(4) NOT NULL,
  `kelas` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nominal` double NOT NULL,
  `tahun_berlaku` year NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 108 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nominal_kelas_jabatan
-- ----------------------------
INSERT INTO `nominal_kelas_jabatan` VALUES (2, 14, 'Kelas 14 a', 8523000, 2021, 'Jabatan Pimpinan Tinggi pada Inspektorat', '2021-10-12 12:20:16', '2021-10-12 12:20:16', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (3, 14, 'Kelas 14 b', 8342000, 2021, 'Jabatan Pimpinan Tinggi pada Setda', '2021-10-12 13:53:58', '2021-10-12 13:53:58', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (4, 14, 'Kelas 14 c', 7979000, 2021, 'Jabatan Pimpinan Tinggi pada Dinkes, BPBD, Bappeda Litbangda, BPPKAD, BKPPD, Satpol PP PK, dan Disdukcapil', '2021-10-12 13:55:33', '2021-10-12 13:55:33', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (5, 14, 'Kelas 14 d', 7616000, 2021, 'Jabatan Pimpinan Tinggi pada DPMPTSP', '2021-10-12 13:56:17', '2021-10-12 13:56:17', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (6, 13, 'Kelas 13 a', 6687000, 2021, 'JPT Staf Ahli Bupati', '2021-10-13 20:14:10', '2021-10-13 20:23:48', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (8, 13, 'Kelas 13 b', 5960000, 2021, 'Jabatan Fungsional Ahli Utama Pengelola Pengadaan\r\nBarang dan Jasa', '2021-10-13 20:25:49', '2021-10-13 20:25:49', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (9, 14, 'Kelas 14 e 1', 7761000, 2021, 'Jabatan Pimpinan Tinggi pada Perangkat daerah 4 atau lebih Bidang/Bagian', '2021-10-13 21:18:35', '2021-10-13 21:36:58', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (10, 14, 'Kelas 14 e 2', 7507000, 2021, 'Jabatan Pimpinan Tinggi pada Perangkat daerah 3 Bidang/Bagian', '2021-10-13 21:19:40', '2021-10-13 21:38:00', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (11, 14, 'Kelas 14 e 3', 7254000, 2021, 'Jabatan Pimpinan Tinggi pada Perangkat daerah 2 Bidang/Bagian', '2021-10-13 21:20:30', '2021-10-13 21:37:45', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (12, 13, 'Kelas 13 c', 5815000, 2021, 'Jabatan Fungsional Ahli Utama pada Setda selain\r\nJabatan Fungsional Pengelola Pengadaan Barang dan\r\nJasa', '2021-10-13 21:21:47', '2021-10-13 21:21:47', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (13, 13, 'Kelas 13 d', 5669000, 2021, 'Jabatan Fungsional Ahli Utama pada Inspektorat', '2021-10-13 21:23:09', '2021-10-13 21:23:09', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (14, 13, 'Kelas 13 e', 5524000, 2021, 'Jabatan Fungsional Ahli Utama pada Dinkes, BPBD,\r\nBappeda Litbangda, BPPKAD, BKPPD, Satpol PP PK,\r\ndan Disdukcapil\r\n', '2021-10-13 21:24:07', '2021-10-13 21:24:07', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (15, 13, 'Kelas 13 f', 5233000, 2021, 'Jabatan Fungsional Ahli Utama pada DPMPTSP', '2021-10-13 21:24:41', '2021-10-13 21:24:41', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (16, 13, 'Kelas 13 g', 4942000, 2021, 'Jabatan Fungsional Ahli Utama pada perangkat\r\ndaerah lainnya', '2021-10-13 21:25:29', '2021-10-13 21:25:29', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (17, 12, 'Kelas 12 a', 5462000, 2021, 'Jabatan Administrator pada Bagian Pengadaan\r\nBarang dan Jasa Setda\r\n', '2021-10-13 21:26:17', '2021-10-13 21:26:17', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (18, 12, 'Kelas 12 b', 5346000, 2021, 'Jabatan Administrator pada Setda selain Bagian\r\nPengadaan Barang dan Jasa Setda', '2021-10-13 21:27:26', '2021-10-13 21:27:26', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (19, 12, 'Kelas 12 c', 5230000, 2021, 'Jabatan Administrator pada Inspektorat', '2021-10-13 21:28:03', '2021-10-13 21:28:03', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (20, 12, 'Kelas 12 d', 5113000, 2021, 'Jabatan Administrator pada Dinkes, BPBD, Bappeda\r\nLitbangda, BPPKAD, BKPPD, Satpol PP PK, dan\r\nDisdukcapil, Camat, dan Kepala Perangkat Daerah', '2021-10-13 21:28:57', '2021-10-13 21:28:57', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (21, 12, 'Kelas 12 e', 4881000, 2021, 'Jabatan Administrator pada DPMPTSP', '2021-10-13 21:29:45', '2021-10-13 21:29:45', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (22, 12, 'Kelas 12 f 1', 4974000, 2021, 'Jabatan Administrator Sekretaris pada perangkat\r\ndaerah 4 atau lebih Bidang/Bagian', '2021-10-13 21:33:23', '2021-10-13 21:33:23', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (23, 12, 'Kelas 12 f 2', 4811000, 2021, 'Jabatan Administrator Sekretaris pada perangkat\r\ndaerah 3 Bidang/Bagian', '2021-10-13 21:34:44', '2021-10-13 21:34:44', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (24, 12, 'Kelas 12 f 3', 4649000, 2021, 'Jabatan Administrator Sekretaris pada perangkat\r\ndaerah 2 Bidang/Bagian', '2021-10-13 21:35:39', '2021-10-13 21:35:39', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (25, 11, 'Kelas 11 a', 4044000, 2021, 'Jabatan Administrator pada Inspektorat', '2021-10-13 21:38:59', '2021-10-13 21:38:59', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (26, 11, 'Kelas 11 b', 3954000, 2021, 'Jabatan Administrator pada Dinkes, BPBD, Bappeda\r\nLitbangda, BPPKAD, BKPPD, Satpol PP PK, dan\r\nDisdukcapil\r\n', '2021-10-13 21:39:29', '2021-10-13 21:39:29', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (27, 11, 'Kelas 11 c', 3774000, 2021, 'Jabatan Administrator pada DPMPTSP', '2021-10-13 21:40:09', '2021-10-13 21:40:09', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (28, 11, 'Kelas 11 d', 3595000, 2021, 'Jabatan Administrator pada Perangkat Daerah\r\nlainnya', '2021-10-13 21:40:55', '2021-10-13 21:40:55', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (29, 11, 'Kelas 11 e', 3684000, 2021, 'Jabatan Fungsional Ahli Madya Pengelola Pengadaan\r\nBarang dan Jasa', '2021-10-13 21:41:22', '2021-10-13 21:41:22', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (30, 11, 'Kelas 11 f', 3595000, 2021, 'Jabatan Fungsional Ahli Madya pada Setda selain\r\nJabatan Fungsional Pengelola Pengadaan Barang dan\r\nJasa', '2021-10-13 21:41:57', '2021-10-13 21:41:57', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (31, 11, 'Kelas 11 g', 3505000, 2021, 'Jabatan Fungsional Ahli Madya pada Inspektorat', '2021-10-13 21:42:26', '2021-10-13 21:42:26', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (32, 11, 'Kelas 11 h', 3415000, 2021, 'Jabatan Fungsional Ahli Madya pada Dinkes, BPBD,\r\nBappeda Litbangda, BPPKAD, BKPPD, Satpol PP PK,\r\nDisdukcapil, dan Jabatan Fungsional Operator\r\nTransmisi Sandi\r\n', '2021-10-13 21:43:14', '2021-10-13 21:43:14', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (33, 11, 'Kelas 11 i', 3235000, 2021, 'Jabatan Fungsional Ahli Madya pada DPMPTSP', '2021-10-13 21:43:46', '2021-10-13 21:43:46', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (34, 11, 'Kelas 11 j', 3055000, 2021, 'Jabatan Fungsional Ahli Madya pada perangkat\r\ndaerah lainnya', '2021-10-13 21:44:50', '2021-10-13 21:44:50', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (35, 10, 'Kelas 10', 3127000, 2021, '', '2021-10-13 21:46:05', '2021-10-13 21:46:05', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (36, 9, 'Kelas 9 a', 3196000, 2021, 'Jabatan Pengawas pada Bagian Pengadaan Barang\r\ndan Jasa Setda', '2021-10-13 21:46:49', '2021-10-13 21:46:49', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (37, 9, 'Kelas 9 b', 3128000, 2021, 'Jabatan Pengawas pada Setda selain pada Bagian\r\nPengadaan Barang dan Jasa Setda', '2021-10-13 21:47:20', '2021-10-13 21:47:20', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (38, 9, 'Kelas 9 c', 3060000, 2021, 'Jabatan Pengawas pada Inspektorat', '2021-10-13 21:48:04', '2021-10-13 21:48:04', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (39, 9, 'Kelas 9 d', 2992000, 2021, 'Jabatan Pengawas pada Dinkes, BPBD, Bappeda\r\nLitbangda, BPPKAD, BKPPD, Satpol PP PK,\r\nDisdukcapil, Lurah, Kepala Seksi Layanan Persandian\r\ndan Telekomunikasi pada Diskominfo', '2021-10-13 21:48:39', '2021-10-13 21:48:39', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (40, 9, 'Kelas 9 e', 2856000, 2021, 'Jabatan Pengawas pada DPMPTSP', '2021-10-13 21:49:14', '2021-10-13 21:49:14', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (41, 9, 'Kelas 9 f', 2720000, 2021, 'Jabatan Pengawas pada Perangkat Daerah lainnya', '2021-10-13 21:49:52', '2021-10-13 21:49:52', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (42, 9, 'Kelas 9 g', 2788000, 2021, 'Jabatan Fungsional Pengelola Pengadaan Barang dan\r\nJasa Ahli Muda', '2021-10-13 21:50:44', '2021-10-13 21:50:44', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (43, 9, 'Kelas 9 h', 2720000, 2021, 'Jabatan Fungsional Ahli Muda pada Setda selain\r\nJabatan Fungsional Pengelola Pengadaan Barang dan\r\nJasa', '2021-10-13 21:51:09', '2021-10-13 21:51:09', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (44, 9, 'Kelas 9 i', 2652000, 2021, 'Jabatan Fungsional Ahli Muda pada Inspektorat', '2021-10-13 21:51:49', '2021-10-13 21:51:49', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (45, 9, 'Kelas 9 j', 2584000, 2021, 'Jabatan Fungsional Ahli Muda pada Dinkes, BPBD,\r\nBappeda Litbangda, BPPKAD, BKPPD, Satpol PP PK,\r\nDisdukcapil, dan Jabatan Fungsional Operator\r\nTransmisi Sandi', '2021-10-13 21:52:13', '2021-10-13 21:52:13', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (46, 9, 'Kelas 9 k', 2448000, 2021, 'Jabatan Fungsional Ahli Muda pada DPMPTSP', '2021-10-13 21:52:49', '2021-10-13 21:52:49', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (47, 9, 'Kelas 9 l', 2312000, 2021, 'Jabatan Fungsional Ahli Muda pada perangkat daerah\r\nlainnya', '2021-10-13 21:53:48', '2021-10-13 21:53:48', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (48, 8, 'Kelas 8 a', 2568000, 2021, 'Jabatan Pengawas pada Bagian Pengadaan Barang\r\ndan Jasa Setda', '2021-10-13 21:54:24', '2021-10-13 21:54:24', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (49, 8, 'Kelas 8 b', 2513000, 2021, 'Jabatan Pengawas pada Setda selain pada Bagian\r\nPengadaan Barang dan Jasa Setda', '2021-10-13 21:54:51', '2021-10-13 21:54:51', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (50, 8, 'Kelas 8 c', 2459000, 2021, 'Jabatan Pengawas pada Inspektorat', '2021-10-13 21:55:21', '2021-10-13 21:55:21', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (51, 8, 'Kelas 8 d', 2404000, 2021, 'Jabatan Pengawas pada Dinkes, BPBD, Bappeda\r\nLitbangda, BPPKAD, BKPPD, Satpol PP PK,\r\nDisdukcapil, dan Kepala Seksi Layanan Persandian\r\ndan Telekomunikasi pada Diskominfo', '2021-10-13 21:55:48', '2021-10-13 21:55:48', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (52, 8, 'Kelas 8 e', 2295000, 2021, 'Jabatan Pengawas pada DPMPTSP', '2021-10-13 21:56:16', '2021-10-13 21:56:16', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (53, 8, 'Kelas 8 f', 2186000, 2021, 'Jabatan Pengawas pada Perangkat Daerah lainnya', '2021-10-13 21:56:55', '2021-10-13 21:56:55', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (54, 8, 'Kelas 8 g', 2240000, 2021, 'Jabatan Fungsional Pengelola Pengadaan Barang dan\r\nJasa Ahli Pertama/Penyelia', '2021-10-13 21:57:20', '2021-10-13 21:57:20', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (55, 8, 'Kelas 8 h', 2186000, 2021, 'Jabatan Fungsional Ahli Pertama/Penyelia pada Setda\r\nselain Jabatan Fungsional Pengelola Pengadaan\r\nBarang dan Jasa', '2021-10-13 21:58:35', '2021-10-13 21:58:35', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (56, 8, 'Kelas 8 i', 2131000, 2021, 'Jabatan Fungsional Ahli Pertama/Penyelia pada\r\nInspektorat', '2021-10-13 21:58:59', '2021-10-13 21:58:59', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (57, 8, 'Kelas 8 j', 2076000, 2021, 'Jabatan Fungsional Ahli Pertama/Penyelia pada\r\nDinkes, BPBD, Bappeda Litbangda, BPPKAD, BKPPD,\r\nSatpol PP PK, Disdukcapil, dan Jabatan Fungsional\r\nOperator Transmisi Sandi\r\n', '2021-10-13 21:59:37', '2021-10-13 21:59:37', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (58, 8, 'Kelas 8 k', 1967000, 2021, 'Jabatan Fungsional Ahli Pertama/Penyelia pada\r\nDPMPTSP', '2021-10-13 22:00:09', '2021-10-13 22:00:09', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (59, 8, 'Kelas 8 l', 1858000, 2021, 'Jabatan Fungsional Pertama/Penyelia pada perangkat\r\ndaerah lainnya', '2021-10-13 22:00:33', '2021-10-13 22:00:33', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (60, 7, 'Kelas 7 a', 2037000, 2021, 'Jabatan Pelaksana pada Setda', '2021-10-13 22:01:00', '2021-10-13 22:01:00', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (61, 7, 'Kelas 7 b', 1993000, 2021, 'Jabatan Pelaksana pada Inspektorat', '2021-10-13 22:01:31', '2021-10-13 22:01:31', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (62, 7, 'Kelas 7 c', 1949000, 2021, 'Jabatan Pelaksana pada Dinkes, BPBD, Bappeda\r\nLitbangda, BPPKAD, BKPPD, Satpol PP PK, dan\r\nDisdukcapil', '2021-10-13 22:02:02', '2021-10-13 22:02:02', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (63, 7, 'Kelas 7 d', 1860000, 2021, 'Jabatan Pelaksana pada DPMPTSP', '2021-10-13 22:02:28', '2021-10-13 22:02:28', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (64, 7, 'Kelas 7 e', 1772000, 2021, 'Jabatan Pelaksana pada perangkat daerah lainnya', '2021-10-13 22:03:25', '2021-10-13 22:03:25', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (65, 7, 'Kelas 7 f', 1772000, 2021, 'Jabatan Fungsional Pelaksana Lanjutan/Mahir pada\r\nSetda', '2021-10-13 22:03:50', '2021-10-13 22:03:50', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (66, 7, 'Kelas 7 g', 1727000, 2021, 'Jabatan Fungsional Pelaksana Lanjutan/Mahir pada\r\nInspektorat', '2021-10-13 22:04:11', '2021-10-13 22:04:11', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (67, 7, 'Kelas 7 h', 1683000, 2021, 'Jabatan Fungsional Pelaksana Lanjutan/Mahir pada\r\nDinkes, BPBD, Bappeda Litbangda, BPPKAD, BKPPD,\r\nSatpol PP PK, Disdukcapil, dan Jabatan Fungsional\r\nOperator Transmisi Sandi', '2021-10-13 22:04:44', '2021-10-13 22:04:44', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (68, 7, 'Kelas 7 i', 1594000, 2021, 'Jabatan Fungsional Pelaksana Lanjutan/Mahir pada\r\nDPMPTSP', '2021-10-13 22:05:08', '2021-10-13 22:05:08', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (69, 7, 'Kelas 7 j', 1506000, 2021, 'Jabatan Fungsional Mahir/Pelaksana Lanjutan pada\r\nperangkat daerah lainnya ', '2021-10-13 22:05:33', '2021-10-13 22:05:33', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (70, 6, 'Kelas 6 a', 2212000, 2021, 'Jabatan Pelaksana Sekretaris (Bupati)', '2021-10-14 08:14:49', '2021-10-14 08:14:49', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (71, 6, 'Kelas 6 b', 1843000, 2021, 'Jabatan Pelaksana Sekretaris (Wakil Bupati)', '2021-10-14 08:15:12', '2021-10-14 08:15:12', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (72, 6, 'Kelas 6 c', 1696000, 2021, 'Jabatan Pelaksana pada Setda selain jabatan\r\nSekretaris (Bupati dan Wakil Bupati)', '2021-10-14 08:15:35', '2021-10-14 08:15:35', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (73, 5, 'Kelas 6 d', 1659000, 2021, 'Jabatan Pelaksana pada Inspektorat', '2021-10-14 08:16:03', '2021-10-14 08:16:03', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (74, 6, 'Kelas 6 e', 1622000, 2021, 'Jabatan Pelaksana pada Dinkes, BPBD, Bappeda\r\nLitbangda, BPPKAD, BKPPD, Satpol PP PK, dan\r\nDisdukcapil', '2021-10-14 08:16:32', '2021-10-14 08:16:32', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (75, 6, 'Kelas 6 f', 1548000, 2021, 'Jabatan Pelaksana pada DPMPTSP', '2021-10-14 08:16:54', '2021-10-14 08:16:54', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (76, 6, 'Kelas 6 g', 1475000, 2021, 'Jabatan Pelaksana pada Perangkat Daerah lainnya', '2021-10-14 08:17:24', '2021-10-14 08:17:24', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (77, 6, 'Kelas 6 h', 1475000, 2021, 'Jabatan Fungsional Terampil/Pelaksana pada Setda', '2021-10-14 08:17:52', '2021-10-14 08:17:52', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (78, 6, 'Kelas 6 i', 1438000, 2021, 'Jabatan Fungsional Terampil/Pelaksana pada\r\nInspektorat', '2021-10-14 08:18:26', '2021-10-14 08:18:26', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (79, 6, 'Kelas 6 j', 1401000, 2021, 'Jabatan Fungsional Terampil/Pelaksana pada Dinkes,\r\nBPBD, Bappeda Litbangda, BPPKAD, BKPPD, Satpol\r\nPP PK, Disdukcapil, dan Jabatan Fungsional Operator\r\nTransmisi Sandi\r\n', '2021-10-14 08:18:55', '2021-10-14 08:18:55', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (80, 6, 'Kelas 6 k', 1327000, 2021, 'Jabatan Fungsional Terampil/Pelaksana pada\r\nDPMPTSP', '2021-10-14 08:19:18', '2021-10-14 08:19:18', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (81, 6, 'Kelas 6 l', 1253000, 2021, 'Jabatan Fungsional Terampil/Pelaksana pada\r\nperangkat daerah lainnya', '2021-10-14 08:19:56', '2021-10-14 08:19:56', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (82, 5, 'Kelas 5 a', 3690000, 2021, 'Jabatan Ajudan Bupati', '2021-10-14 08:20:26', '2021-10-14 08:20:26', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (83, 5, 'Kelas 5 b', 3075000, 2021, 'Jabatan Ajudan Wakil Bupati', '2021-10-14 08:21:02', '2021-10-14 08:21:02', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (84, 5, 'Kelas 5 c', 1845000, 2021, 'Jabatan Pengemudi VIP (Bupati)', '2021-10-14 08:21:24', '2021-10-14 08:21:24', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (85, 5, 'Kelas 5 d', 1537000, 2021, 'Jabatan Pengemudi VIP (Wakil Bupati)', '2021-10-14 08:21:56', '2021-10-14 08:21:56', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (86, 5, 'Kelas 5 e', 1414000, 2021, 'Jabatan Pelaksana pada Setda selain jabatan Ajudan\r\n(Bupati dan Wakil Bupati) dan jabatan Pengemudi VIP\r\n(Bupati dan Wakil Bupati)', '2021-10-14 08:22:25', '2021-10-14 08:22:25', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (87, 5, 'Kelas 5 f', 1383000, 2021, 'Jabatan Pelaksana pada Inspektorat', '2021-10-14 08:23:04', '2021-10-14 08:23:04', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (88, 5, 'Kelas 5 g', 1353000, 2021, 'Jabatan Pelaksana pada Dinkes, BPBD, Bappeda\r\nLitbangda, BPPKAD, BKPPD, Satpol PP PK, dan\r\nDisdukcapil', '2021-10-14 08:23:28', '2021-10-14 08:23:28', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (89, 5, 'Kelas 5 h', 1291000, 2021, 'Jabatan Pelaksana pada DPMPTSP', '2021-10-14 08:23:54', '2021-10-14 08:23:54', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (90, 5, 'Kelas 5 i', 1230000, 2021, 'Jabatan Pelaksana pada Perangkat Daerah lainnya', '2021-10-14 08:24:50', '2021-10-14 08:24:50', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (91, 5, 'Kelas 5 j', 1230000, 2021, 'Jabatan Fungsional Pemula pada Setda', '2021-10-14 08:25:34', '2021-10-14 08:25:34', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (92, 5, 'Kelas 5 k', 1199000, 2021, 'Jabatan Fungsional Pemula pada Inspektorat', '2021-10-14 08:26:37', '2021-10-14 08:26:37', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (93, 5, 'Kelas 5 l', 1168000, 2021, 'Jabatan Fungsional Pemula pada Dinkes, BPBD,\r\nBappeda Litbangda, BPPKAD, BKPPD, Satpol PP PK,\r\nDisdukcapil, dan Jabatan Fungsional Operator\r\nTransmisi Sandi\r\n', '2021-10-14 08:27:03', '2021-10-14 08:27:03', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (94, 5, 'Kelas 5 m', 1107000, 2021, 'Jabatan Fungsional Pemula pada DPMPTSP', '2021-10-14 08:27:23', '2021-10-14 08:27:23', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (95, 5, 'Kelas 5 n', 1045000, 2021, 'Jabatan Fungsional Pemula pada perangkat daerah\r\nlainnya', '2021-10-14 08:27:43', '2021-10-14 08:27:43', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (96, 4, 'Kelas 4', 1026000, 2021, '', '2021-10-14 08:28:15', '2021-10-14 08:28:15', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (97, 3, 'Kelas 3 a', 1069000, 2021, 'Jabatan Pelaksana pada Setda', '2021-10-14 08:28:42', '2021-10-14 08:28:42', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (98, 3, 'Kelas 3 b', 1046000, 2021, 'Jabatan Pelaksana pada Inspektorat', '2021-10-14 08:29:01', '2021-10-14 08:29:01', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (99, 3, 'Kelas 3 c', 1023000, 2021, 'Jabatan Pelaksana pada Dinkes, BPBD, Bappeda\r\nLitbangda, BPPKAD, BKPPD, Satpol PP PK, dan\r\nDisdukcapil', '2021-10-14 08:29:21', '2021-10-14 08:29:21', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (100, 3, 'Kelas 3 d', 976000, 2021, 'Jabatan Pelaksana pada DPMPTSP', '2021-10-14 08:29:40', '2021-10-14 08:29:40', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (101, 3, 'Kelas 3 e', 930000, 2021, 'Jabatan Pelaksana pada Perangkat Daerah lainnya', '2021-10-14 08:29:59', '2021-10-14 08:29:59', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (102, 2, 'Kelas 2', 836000, 2021, '', '2021-10-14 08:30:31', '2021-10-14 08:30:31', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (103, 1, 'Kelas 1 a', 831000, 2021, 'Jabatan Pelaksana pada Setda', '2021-10-14 08:31:03', '2021-10-14 08:31:03', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (104, 1, 'Kelas 1 b', 813000, 2021, 'Jabatan Pelaksana pada Inspektorat', '2021-10-14 08:31:26', '2021-10-14 08:31:26', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (105, 1, 'Kelas 1 c', 795000, 2021, 'Jabatan Pelaksana pada Dinkes, BPBD, Bappeda Litbangda, BPPKAD, BKPPD, Satpol PP PK, dan Disdukcapil', '2021-10-14 08:33:31', '2021-10-14 08:33:31', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (106, 1, 'Kelas 1 d', 759000, 2021, 'Jabatan Pelaksana pada DPMPTSP', '2021-10-14 08:34:10', '2021-10-14 08:34:10', NULL);
INSERT INTO `nominal_kelas_jabatan` VALUES (107, 1, 'Kelas 1 e', 723000, 2021, 'Jabatan Pelaksana pada Perangkat Daerah lainnya', '2021-10-14 08:34:52', '2021-10-14 08:34:52', NULL);

-- ----------------------------
-- Table structure for pengajuan_gaji
-- ----------------------------
DROP TABLE IF EXISTS `pengajuan_gaji`;
CREATE TABLE `pengajuan_gaji`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `periode` date NULL DEFAULT NULL,
  `nip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `skpd` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `valid` enum('1','0') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '0',
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for tpp_nominatif_penerima
-- ----------------------------
DROP TABLE IF EXISTS `tpp_nominatif_penerima`;
CREATE TABLE `tpp_nominatif_penerima`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kelas` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nominal` double NOT NULL,
  `prosentase` double NOT NULL,
  `penerimaan` double NOT NULL,
  `jenis` enum('primer','sekunder') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tpp_nominatif_penerima
-- ----------------------------
INSERT INTO `tpp_nominatif_penerima` VALUES (4, '196504231992031006', 'Kelas 14 a', 8523000, 100, 8523000, 'primer', '2021-10-27 18:31:59', '2021-10-27 18:31:59', NULL);
INSERT INTO `tpp_nominatif_penerima` VALUES (5, '196504231992031006', 'Kelas 13 a', 6687000, 50, 3343500, 'sekunder', '2021-10-27 18:32:47', '2021-10-27 18:32:47', NULL);

-- ----------------------------
-- Table structure for unit_kerja
-- ----------------------------
DROP TABLE IF EXISTS `unit_kerja`;
CREATE TABLE `unit_kerja`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_simpeg` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of unit_kerja
-- ----------------------------
INSERT INTO `unit_kerja` VALUES (1, 'K001', 'Kode Satu', '2021-10-26 08:40:50', '2021-10-26 08:47:26', NULL);

SET FOREIGN_KEY_CHECKS = 1;
