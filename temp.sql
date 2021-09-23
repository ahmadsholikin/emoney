/*
 Navicat Premium Data Transfer

 Source Server         : LOCAL
 Source Server Type    : MySQL
 Source Server Version : 100414
 Source Host           : localhost:3306
 Source Schema         : temp

 Target Server Type    : MySQL
 Target Server Version : 100414
 File Encoding         : 65001

 Date: 23/09/2021 05:58:51
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
INSERT INTO `app_info` VALUES ('1', 'TEMP', 'sipgan.magelangkab.go.id/pdm', 'Pemkab Magelang', '08985000788', 'nci.ahmad@gmail.com', '', '', '-', 'A.0.2', 'logo.png', 'be-majestic', 'majestic', 'dev');

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
) ENGINE = InnoDB AUTO_INCREMENT = 60 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of app_menu
-- ----------------------------
INSERT INTO `app_menu` VALUES (1, 'Beranda', 'Beranda', 'beranda', 'beranda', 'grid', 0, 'App', 1, '0', 0, '1', '', '', NULL, NULL, NULL);
INSERT INTO `app_menu` VALUES (2, 'Pengaturan', 'Pengaturan App', '#', '#', 'settings', NULL, 'App', 1, '1', 4, '1', 'app_menu', 'menu_id', NULL, NULL, NULL);
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
) ENGINE = InnoDB AUTO_INCREMENT = 99 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

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
INSERT INTO `app_users` VALUES ('nci.ahmad@gmail.com', '@hmad', 'Ahmad Sholikin', '$2y$10$qebTpuoimrIWwHtaGLn5oO9H6yq.4hHU5U6rPZmnositYwjRKKBBu', '08985000788', 1, 'foto/1631169674_95d60cd0a7a3887825e2.jpg', '1', '0000-00-00 00:00:00', '2021-09-09 13:49:58', NULL);

-- ----------------------------
-- Table structure for berita
-- ----------------------------
DROP TABLE IF EXISTS `berita`;
CREATE TABLE `berita`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cover` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of berita
-- ----------------------------
INSERT INTO `berita` VALUES (2, 'Penjadwalan PDM', '<p><br></p>', 'gambar/1628391396_27193f73fad96551d233.jpg', 'penjadwalan-pdm', '2021-08-08 09:56:36', '2021-08-08 09:56:36', NULL);
INSERT INTO `berita` VALUES (3, 'Target Pendataan PDM', '<p>-</p>', 'gambar/1628391486_1332b27945c19ac922f5.jpg', 'target-pendataan-pdm', '2021-08-08 09:58:06', '2021-08-08 09:58:06', NULL);
INSERT INTO `berita` VALUES (4, 'Update Data Mandiri Satu Kali', '<p>-</p>', 'gambar/1628392512_22faca5e823b037cb49c.jpg', 'update-data-mandiri-satu-kali', '2021-08-08 10:15:12', '2021-08-08 10:15:12', NULL);
INSERT INTO `berita` VALUES (5, 'Jadwal Pelaksanaan', '<p>-</p>', 'gambar/1628392711_a6a190195f060a3575fb.png', 'jadwal-pelaksanaan', '2021-08-08 10:18:31', '2021-08-08 10:18:31', NULL);
INSERT INTO `berita` VALUES (6, 'Dokumen Pengganti PDM', '<p>-</p>', 'gambar/1628392829_ae7ebf1e0df9731922b8.jpg', 'dokumen-pengganti-pdm', '2021-08-08 10:20:29', '2021-08-08 10:20:29', NULL);

-- ----------------------------
-- Table structure for faq
-- ----------------------------
DROP TABLE IF EXISTS `faq`;
CREATE TABLE `faq`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pertanyaan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jawaban` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
