/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100428 (10.4.28-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : maut_zer

 Target Server Type    : MySQL
 Target Server Version : 100428 (10.4.28-MariaDB)
 File Encoding         : 65001

 Date: 28/06/2024 12:38:09
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for alternatif
-- ----------------------------
DROP TABLE IF EXISTS `alternatif`;
CREATE TABLE `alternatif`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_alternatif` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip_alternatif` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_alternatif` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_alternatif` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp_alternatif` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin_alternatif` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_alternatif` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `alternatif_nip_alternatif_unique`(`nip_alternatif` ASC) USING BTREE,
  UNIQUE INDEX `alternatif_email_alternatif_unique`(`email_alternatif` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of alternatif
-- ----------------------------
INSERT INTO `alternatif` VALUES (5, 'Guru 1', '152141243', 'guru2@gmail.com', 'alamat guru 1 edit', '08287832987', 'L', 'vvu2boCFYMWdpgg5wtPSoHox9rvqk5EBxdTXOeio.png', '2023-01-21 01:47:34', '2024-06-27 05:09:48');
INSERT INTO `alternatif` VALUES (6, 'Guru 2', '328682373', 'guru3@gmail.com', 'alamat guru 1', '08287832987', 'L', 'X7weqPnUPDl4jUO5duADO4nCvGuKgbgwje6sVdO2.png', '2023-01-21 01:47:34', '2024-06-27 05:10:09');
INSERT INTO `alternatif` VALUES (7, 'Guru 3', '328682374', 'guru4@gmail.com', 'alamat guru 1', '08287832987', 'L', 'GSShs9ucfjm18UGDMYis8xaTVXrHkTB31DCtNsHL.png', '2023-01-21 01:47:34', '2024-06-27 05:10:23');
INSERT INTO `alternatif` VALUES (8, 'Guru 4', '328682375', 'guru5@gmail.com', 'alamat guru 1', '08287832987', 'L', 'ihgt8RdqFSNVWQ0TGj3wxyL5V2PCa8qCndDwd99Q.png', '2023-01-21 01:47:34', '2024-06-27 05:10:51');
INSERT INTO `alternatif` VALUES (11, 'Guru 5', '3286823761', 'guru6@gmail.com', 'alamat guru 1', '08287832987', 'L', 'gTnXRVhpTUfDcK4qzOxO1ARwPPW91uZKwOZmTj73.png', '2023-01-21 01:47:34', '2024-06-27 05:11:06');
INSERT INTO `alternatif` VALUES (12, 'Guru 6', '328682377', 'guru7@gmail.com', 'alamat guru 1', '08287832987', 'L', 'Oo7Zkc18Q0uDRsrpYMeRRn8qLkQQ1S2kMF5gLGlQ.png', '2023-01-21 01:47:34', '2024-06-27 05:11:24');
INSERT INTO `alternatif` VALUES (13, 'Guru 7', '328682378', 'guru8@gmail.com', 'alamat guru 1', '08287832987', 'L', 't3ooIprrv5yjEHF1tuGPak9tYXWRQdsdbttLDDGi.png', '2023-01-21 01:47:34', '2024-06-27 05:11:37');
INSERT INTO `alternatif` VALUES (14, 'Guru 8', '328682379', 'guru9@gmail.com', 'alamat guru 1', '08287832987', 'L', 'H94xO1qgJm5LsVCcrZmgwUcTmx2pixdqUvS0NSzu.png', '2023-01-21 01:47:34', '2024-06-27 05:11:54');
INSERT INTO `alternatif` VALUES (19, 'Guru test', '289373242379', 'gurutest15@gmail.com', 'alamat guru test', '092338749823789', 'L', 'zFm2yDSwV87YpQp9LnzOxYIZ8N1X2QykOCbJbIaj.png', '2023-03-15 06:30:55', '2024-06-27 05:12:07');
INSERT INTO `alternatif` VALUES (20, 'Siswa 124', '230974985237', 'siswa124@gmail.com', 'alamat siswa 124', '0923837908235', 'L', 'yY45RotdPcea1oWLYavShhulo8YCOfHzrbk6GiKF.png', '2023-03-15 21:55:11', '2024-06-27 05:12:19');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for hasil
-- ----------------------------
DROP TABLE IF EXISTS `hasil`;
CREATE TABLE `hasil`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `alternatif_id` int UNSIGNED NOT NULL,
  `total_hasil` double(8, 2) NOT NULL,
  `ranking_hasil` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `selesai_test_id` int UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `hasil_alternatif_id_foreign`(`alternatif_id` ASC) USING BTREE,
  INDEX `selesai_test_id`(`selesai_test_id` ASC) USING BTREE,
  CONSTRAINT `hasil_alternatif_id_foreign` FOREIGN KEY (`alternatif_id`) REFERENCES `alternatif` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`selesai_test_id`) REFERENCES `selesai_test` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 51 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of hasil
-- ----------------------------
INSERT INTO `hasil` VALUES (41, 12, 0.98, 1, '2024-06-28 11:19:07', '2024-06-28 11:19:07', 4);
INSERT INTO `hasil` VALUES (42, 11, 0.82, 2, '2024-06-28 11:19:07', '2024-06-28 11:19:07', 4);
INSERT INTO `hasil` VALUES (43, 5, 0.68, 3, '2024-06-28 11:19:07', '2024-06-28 11:19:07', 4);
INSERT INTO `hasil` VALUES (44, 7, 0.45, 4, '2024-06-28 11:19:07', '2024-06-28 11:19:07', 4);
INSERT INTO `hasil` VALUES (45, 14, 0.43, 5, '2024-06-28 11:19:07', '2024-06-28 11:19:07', 4);
INSERT INTO `hasil` VALUES (46, 13, 0.35, 6, '2024-06-28 11:19:07', '2024-06-28 11:19:07', 4);
INSERT INTO `hasil` VALUES (47, 8, 0.30, 7, '2024-06-28 11:19:07', '2024-06-28 11:19:07', 4);
INSERT INTO `hasil` VALUES (48, 19, 0.30, 8, '2024-06-28 11:19:07', '2024-06-28 11:19:07', 4);
INSERT INTO `hasil` VALUES (49, 6, 0.27, 9, '2024-06-28 11:19:07', '2024-06-28 11:19:07', 4);
INSERT INTO `hasil` VALUES (50, 20, 0.27, 10, '2024-06-28 11:19:07', '2024-06-28 11:19:07', 4);

-- ----------------------------
-- Table structure for hasil_detail
-- ----------------------------
DROP TABLE IF EXISTS `hasil_detail`;
CREATE TABLE `hasil_detail`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `hasil_id` int UNSIGNED NOT NULL,
  `kriteria_id` int UNSIGNED NOT NULL,
  `nilai_hasil_detail` double(8, 2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `hasil_detail_hasil_id_foreign`(`hasil_id` ASC) USING BTREE,
  INDEX `hasil_detail_kriteria_id_foreign`(`kriteria_id` ASC) USING BTREE,
  CONSTRAINT `hasil_detail_hasil_id_foreign` FOREIGN KEY (`hasil_id`) REFERENCES `hasil` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hasil_detail_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 371 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of hasil_detail
-- ----------------------------
INSERT INTO `hasil_detail` VALUES (321, 41, 25, 3.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (322, 41, 26, 3.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (323, 41, 27, 3.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (324, 41, 28, 3.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (325, 41, 29, 2.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (326, 42, 25, 3.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (327, 42, 26, 3.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (328, 42, 27, 2.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (329, 42, 28, 3.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (330, 42, 29, 2.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (331, 43, 25, 2.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (332, 43, 26, 3.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (333, 43, 27, 3.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (334, 43, 28, 2.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (335, 43, 29, 3.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (336, 44, 25, 1.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (337, 44, 26, 3.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (338, 44, 27, 3.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (339, 44, 28, 2.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (340, 44, 29, 3.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (341, 45, 25, 1.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (342, 45, 26, 3.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (343, 45, 27, 3.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (344, 45, 28, 2.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (345, 45, 29, 2.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (346, 46, 25, 1.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (347, 46, 26, 3.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (348, 46, 27, 2.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (349, 46, 28, 3.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (350, 46, 29, 1.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (351, 47, 25, 1.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (352, 47, 26, 3.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (353, 47, 27, 2.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (354, 47, 28, 2.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (355, 47, 29, 3.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (356, 48, 25, 1.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (357, 48, 26, 3.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (358, 48, 27, 2.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (359, 48, 28, 2.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (360, 48, 29, 3.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (361, 49, 25, 1.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (362, 49, 26, 2.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (363, 49, 27, 3.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (364, 49, 28, 3.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (365, 49, 29, 2.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (366, 50, 25, 1.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (367, 50, 26, 2.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (368, 50, 27, 3.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (369, 50, 28, 3.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (370, 50, 29, 2.00, NULL, NULL);

-- ----------------------------
-- Table structure for konfigurasi
-- ----------------------------
DROP TABLE IF EXISTS `konfigurasi`;
CREATE TABLE `konfigurasi`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_konfigurasi` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_konfigurasi` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp_konfigurasi` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_konfigurasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_konfigurasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_konfigurasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_konfigurasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `konfigurasi_email_konfigurasi_unique`(`email_konfigurasi` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of konfigurasi
-- ----------------------------
INSERT INTO `konfigurasi` VALUES (1, 'Sistem Pakar CF & BC', 'QcaYCrGYbcMMEMJiW7NCJlu7V70WbxWqSjXg1ftG.png', '082277562382', 'Untuk menentukan diagnosa presentase kecanduan bermain gadet', 'hadidta@gmail.com', 'Sistem pakar menggunakan metode Certainty Factory & Backward Chaining', 'Bima Ega @ Fullstack Developer', '2023-01-17 19:41:39', '2024-06-27 04:58:34');

-- ----------------------------
-- Table structure for kriteria
-- ----------------------------
DROP TABLE IF EXISTS `kriteria`;
CREATE TABLE `kriteria`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_kriteria` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kriteria` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `definisi_kriteria` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot_kriteria` double(8, 2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `kriteria_kode_kriteria_unique`(`kode_kriteria` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kriteria
-- ----------------------------
INSERT INTO `kriteria` VALUES (25, 'K001', 'STATUS PESERTA DIDIK', '-', 1.00, '2024-06-27 07:26:10', '2024-06-27 07:26:10');
INSERT INTO `kriteria` VALUES (26, 'K002', 'RATA-RATA PENDAPATAN', '-', 2.00, '2024-06-27 07:26:43', '2024-06-27 07:26:43');
INSERT INTO `kriteria` VALUES (27, 'K003', 'JUMLAH TANGGUNGAN', '-', 3.00, '2024-06-27 07:26:53', '2024-06-27 07:26:53');
INSERT INTO `kriteria` VALUES (28, 'K004', 'TANGGUNGAN YANG SEDANG DALAM PENDIDIKAN', '-', 4.00, '2024-06-27 07:27:01', '2024-06-27 07:27:01');
INSERT INTO `kriteria` VALUES (29, 'K005', 'RATA-RATA PENGELUARAN', '-', 5.00, '2024-06-27 07:27:08', '2024-06-27 07:27:08');

-- ----------------------------
-- Table structure for kriteria_subkriteria
-- ----------------------------
DROP TABLE IF EXISTS `kriteria_subkriteria`;
CREATE TABLE `kriteria_subkriteria`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `kriteria_id` int UNSIGNED NOT NULL,
  `sub_kriteria_id` int UNSIGNED NOT NULL,
  `alternatif_id` int UNSIGNED NOT NULL,
  `nilai_kriteria_subkriteria` double(8, 2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `kriteria_subkriteria_kriteria_id_foreign`(`kriteria_id` ASC) USING BTREE,
  INDEX `kriteria_subkriteria_sub_kriteria_id_foreign`(`sub_kriteria_id` ASC) USING BTREE,
  INDEX `kriteria_subkriteria_alternatif_id_foreign`(`alternatif_id` ASC) USING BTREE,
  CONSTRAINT `kriteria_subkriteria_alternatif_id_foreign` FOREIGN KEY (`alternatif_id`) REFERENCES `alternatif` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kriteria_subkriteria_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `kriteria_subkriteria_sub_kriteria_id_foreign` FOREIGN KEY (`sub_kriteria_id`) REFERENCES `sub_kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 285 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kriteria_subkriteria
-- ----------------------------
INSERT INTO `kriteria_subkriteria` VALUES (230, 25, 34, 6, 1.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (231, 26, 36, 6, 2.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (232, 27, 45, 6, 3.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (233, 28, 46, 6, 3.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (234, 29, 42, 6, 2.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (235, 25, 34, 7, 1.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (236, 26, 44, 7, 3.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (237, 27, 45, 7, 3.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (238, 28, 40, 7, 2.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (239, 29, 47, 7, 3.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (240, 25, 34, 8, 1.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (241, 26, 44, 8, 3.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (242, 27, 38, 8, 2.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (243, 28, 40, 8, 2.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (244, 29, 47, 8, 3.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (245, 25, 43, 11, 3.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (246, 26, 44, 11, 3.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (247, 27, 38, 11, 2.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (248, 28, 46, 11, 3.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (249, 29, 42, 11, 2.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (255, 25, 34, 13, 1.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (256, 26, 44, 13, 3.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (257, 27, 38, 13, 2.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (258, 28, 46, 13, 3.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (259, 29, 41, 13, 1.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (260, 25, 34, 14, 1.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (261, 26, 44, 14, 3.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (262, 27, 45, 14, 3.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (263, 28, 40, 14, 2.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (264, 29, 42, 14, 2.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (265, 25, 34, 19, 1.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (266, 26, 44, 19, 3.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (267, 27, 38, 19, 2.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (268, 28, 40, 19, 2.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (269, 29, 47, 19, 3.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (270, 25, 34, 20, 1.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (271, 26, 36, 20, 2.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (272, 27, 45, 20, 3.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (273, 28, 46, 20, 3.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (274, 29, 42, 20, 2.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (275, 25, 43, 12, 3.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (276, 26, 44, 12, 3.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (277, 27, 45, 12, 3.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (278, 28, 46, 12, 3.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (279, 29, 42, 12, 2.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (280, 25, 33, 5, 2.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (281, 26, 44, 5, 3.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (282, 27, 45, 5, 3.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (283, 28, 40, 5, 2.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (284, 29, 47, 5, 3.00, NULL, NULL);

-- ----------------------------
-- Table structure for management_menu
-- ----------------------------
DROP TABLE IF EXISTS `management_menu`;
CREATE TABLE `management_menu`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `no_management_menu` int NOT NULL,
  `nama_management_menu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_management_menu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_management_menu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `membawahi_menu_management_menu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_node_management_menu` tinyint(1) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of management_menu
-- ----------------------------
INSERT INTO `management_menu` VALUES (1, 8, 'Data master', 'hard-drive', '#', '2,3,14,20,21,22,23', 1, '2022-11-28 11:05:35', '2023-03-15 06:04:30');
INSERT INTO `management_menu` VALUES (2, 9, 'User', 'far fa-circle', '/admin/users', NULL, NULL, '2022-11-28 11:43:41', '2022-11-28 17:02:48');
INSERT INTO `management_menu` VALUES (3, 10, 'Role', 'far fa-circle', '/admin/roles', NULL, NULL, '2022-11-28 11:46:15', '2022-12-02 10:26:31');
INSERT INTO `management_menu` VALUES (4, 7, 'Konfigurasi', 'settings', '/admin/konfigurasi', NULL, NULL, '2022-11-28 11:50:25', '2022-12-02 10:26:12');
INSERT INTO `management_menu` VALUES (6, 2, 'My Profile', 'user', '/admin/profile', NULL, NULL, '2022-11-28 16:05:32', '2022-11-28 17:00:33');
INSERT INTO `management_menu` VALUES (9, 5, 'Penilaian', 'edit', '/admin/penilaian', NULL, NULL, '2022-11-28 16:09:12', '2023-03-15 06:11:11');
INSERT INTO `management_menu` VALUES (10, 6, 'Role Access', 'user-check', '/admin/access', NULL, NULL, '2022-11-28 16:11:12', '2022-11-28 17:04:32');
INSERT INTO `management_menu` VALUES (11, 4, 'Hasil', 'book', '/admin/hasil', NULL, NULL, '2022-11-28 16:11:39', '2022-11-28 17:02:08');
INSERT INTO `management_menu` VALUES (12, 1, 'Dashboard', 'home', '/admin/home', NULL, 0, '2022-11-28 16:18:33', '2022-11-30 17:24:09');
INSERT INTO `management_menu` VALUES (14, 13, 'Menu', 'far fa-circle', '/admin/menu', NULL, NULL, '2022-11-30 17:19:19', '2022-11-30 17:25:28');
INSERT INTO `management_menu` VALUES (18, 15, 'Logout', 'log-out', '/logout', NULL, NULL, '2022-12-04 09:07:39', '2022-12-04 09:07:39');
INSERT INTO `management_menu` VALUES (20, 14, 'Alternatif', 'far fa-circle', '/admin/alternatif', NULL, NULL, '2023-03-15 00:04:17', '2023-03-15 03:42:17');
INSERT INTO `management_menu` VALUES (21, 15, 'Sub Kriteria', 'far fa-circle', '/admin/subKriteria', NULL, NULL, '2023-03-15 00:04:37', '2023-03-15 00:04:37');
INSERT INTO `management_menu` VALUES (22, 16, 'Kriteria', 'far fa-circle', '/admin/kriteria', NULL, NULL, '2023-03-15 03:44:10', '2023-03-15 06:00:42');
INSERT INTO `management_menu` VALUES (23, 17, 'Nilai', 'far fa-circle', '/admin/nilai', NULL, NULL, '2023-03-15 06:00:58', '2023-03-15 06:00:58');
INSERT INTO `management_menu` VALUES (24, 6, 'Perhitungan', 'book', '/admin/perhitungan', NULL, NULL, '2023-03-15 19:06:10', '2023-03-15 19:06:10');

-- ----------------------------
-- Table structure for management_menu_roles
-- ----------------------------
DROP TABLE IF EXISTS `management_menu_roles`;
CREATE TABLE `management_menu_roles`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `management_menu_id` int UNSIGNED NOT NULL,
  `roles_id` int UNSIGNED NOT NULL,
  `is_create` tinyint(1) NULL DEFAULT NULL,
  `is_update` tinyint(1) NULL DEFAULT NULL,
  `is_delete` tinyint(1) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `management_menu_roles_management_menu_id_foreign`(`management_menu_id` ASC) USING BTREE,
  INDEX `management_menu_roles_roles_id_foreign`(`roles_id` ASC) USING BTREE,
  CONSTRAINT `management_menu_roles_management_menu_id_foreign` FOREIGN KEY (`management_menu_id`) REFERENCES `management_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `management_menu_roles_roles_id_foreign` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 186 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of management_menu_roles
-- ----------------------------
INSERT INTO `management_menu_roles` VALUES (76, 6, 2, NULL, 1, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `management_menu_roles` VALUES (77, 11, 2, NULL, 1, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `management_menu_roles` VALUES (78, 12, 2, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `management_menu_roles` VALUES (80, 18, 2, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `management_menu_roles` VALUES (170, 3, 1, 1, 1, 1, NULL, NULL);
INSERT INTO `management_menu_roles` VALUES (171, 9, 1, 1, 1, 1, NULL, NULL);
INSERT INTO `management_menu_roles` VALUES (172, 10, 1, 1, 1, 1, NULL, NULL);
INSERT INTO `management_menu_roles` VALUES (173, 11, 1, 1, 1, 1, NULL, NULL);
INSERT INTO `management_menu_roles` VALUES (174, 12, 1, 1, 1, 1, NULL, NULL);
INSERT INTO `management_menu_roles` VALUES (175, 14, 1, 1, 1, 1, NULL, NULL);
INSERT INTO `management_menu_roles` VALUES (176, 1, 1, 1, 1, 1, NULL, NULL);
INSERT INTO `management_menu_roles` VALUES (177, 2, 1, 1, 1, 1, NULL, NULL);
INSERT INTO `management_menu_roles` VALUES (178, 4, 1, 1, 1, 1, NULL, NULL);
INSERT INTO `management_menu_roles` VALUES (179, 6, 1, 1, 1, 1, NULL, NULL);
INSERT INTO `management_menu_roles` VALUES (180, 18, 1, 1, 1, 1, NULL, NULL);
INSERT INTO `management_menu_roles` VALUES (181, 20, 1, 1, 1, 1, NULL, NULL);
INSERT INTO `management_menu_roles` VALUES (182, 21, 1, 1, 1, 1, NULL, NULL);
INSERT INTO `management_menu_roles` VALUES (183, 22, 1, 1, 1, 1, NULL, NULL);
INSERT INTO `management_menu_roles` VALUES (184, 23, 1, 1, 1, 1, NULL, NULL);
INSERT INTO `management_menu_roles` VALUES (185, 24, 1, 1, 1, 1, NULL, '2023-03-15 19:07:51');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (6, '2022_11_26_231143_create_roles_table', 1);
INSERT INTO `migrations` VALUES (7, '2022_11_26_231333_create_management_menus_table', 1);
INSERT INTO `migrations` VALUES (8, '2022_11_26_231405_create_role_users_table', 1);
INSERT INTO `migrations` VALUES (9, '2022_11_26_231515_create_konfigurasis_table', 1);
INSERT INTO `migrations` VALUES (10, '2022_11_26_231630_create_profiles_table', 1);
INSERT INTO `migrations` VALUES (11, '2022_11_28_091312_create_management_menu_roles_table', 1);
INSERT INTO `migrations` VALUES (12, '2023_01_17_183948_create_kriterias_table', 1);
INSERT INTO `migrations` VALUES (13, '2023_01_17_184212_create_sub_kriterias_table', 1);
INSERT INTO `migrations` VALUES (14, '2023_01_17_184859_create_nilais_table', 1);
INSERT INTO `migrations` VALUES (15, '2023_01_17_185800_create_alternatifs_table', 1);
INSERT INTO `migrations` VALUES (16, '2023_01_17_185812_create_kriteria_subkriterias_table', 1);
INSERT INTO `migrations` VALUES (17, '2023_01_17_190334_create_hasils_table', 1);
INSERT INTO `migrations` VALUES (18, '2023_01_17_190543_create_hasil_details_table', 1);
INSERT INTO `migrations` VALUES (19, '2023_03_15_202546_create_selesai_tests_table', 1);
INSERT INTO `migrations` VALUES (20, '2024_06_27_071715_add_column_to_sub_kriteria', 2);

-- ----------------------------
-- Table structure for nilai
-- ----------------------------
DROP TABLE IF EXISTS `nilai`;
CREATE TABLE `nilai`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_nilai` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value_nilai` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of nilai
-- ----------------------------
INSERT INTO `nilai` VALUES (1, 'Kurang', 1, '2023-01-18 01:05:11', '2023-01-18 01:05:11');
INSERT INTO `nilai` VALUES (2, 'Cukup Baik', 2, '2023-01-18 01:05:26', '2023-01-18 01:05:26');
INSERT INTO `nilai` VALUES (3, 'Baik', 3, '2023-01-18 01:05:39', '2023-01-18 01:05:39');
INSERT INTO `nilai` VALUES (4, 'Sangat Baik', 4, '2023-01-18 01:05:50', '2023-01-18 01:05:50');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for profile
-- ----------------------------
DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `users_id` int UNSIGNED NOT NULL,
  `nama_profile` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_profile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_profile` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp_profile` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin_profile` enum('L','P') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_profile` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `profile_email_profile_unique`(`email_profile` ASC) USING BTREE,
  INDEX `profile_users_id_foreign`(`users_id` ASC) USING BTREE,
  CONSTRAINT `profile_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of profile
-- ----------------------------
INSERT INTO `profile` VALUES (5, 1, 'My Profile123', 'myprofile123@gmail.com', 'alamat admin', '08239577', 'L', 'abJLHfHVFstiszyXOAmLsufgkMFcS2CMCPrMPP9X.png', '2023-02-22 17:20:04', '2024-06-28 09:17:29');
INSERT INTO `profile` VALUES (7, 12, 'siswa123', 'siswa123@gmail.com', 'alamat siswa', '293648327897', 'L', 'f66Q8EEeglzoan2NNkwtXmK8a54MKQSDQSjuaYLq.png', '2023-03-14 20:51:52', '2024-06-27 05:16:33');
INSERT INTO `profile` VALUES (8, 13, 'siswa124', 'siswa124@gmail.com', 'alamat siswa 124', '902384798237', 'L', 'wE5PO2iE5QQmmNg2omCRofwE2NEWZXUoMChKf6hE.png', '2023-03-15 21:46:22', '2024-06-27 05:16:47');
INSERT INTO `profile` VALUES (9, 14, 'Siswa 125', 'siswa125@gmail.com', 'alamat siswa 125', '947982379879', 'L', 'qaQV1tCaHTb0Cu9pCBwMegyP1UGYbK5PbRyu1Tjo.png', '2023-03-15 21:47:35', '2024-06-27 05:17:02');

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `role_user_role_id_foreign`(`role_id` ASC) USING BTREE,
  INDEX `role_user_user_id_foreign`(`user_id` ASC) USING BTREE,
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES (1, 1, 1, '2022-11-28 09:21:37', '2024-06-28 09:17:29');
INSERT INTO `role_user` VALUES (9, 2, 12, '2023-03-14 20:51:52', '2024-06-27 05:16:33');
INSERT INTO `role_user` VALUES (10, 2, 13, '2023-03-15 21:46:22', '2024-06-27 05:16:47');
INSERT INTO `role_user` VALUES (11, 2, 14, '2023-03-15 21:47:35', '2024-06-27 05:17:02');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_roles` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'Admin', '2022-11-28 09:20:52', '2022-11-28 09:20:52');
INSERT INTO `roles` VALUES (2, 'Siswa', '2022-11-28 09:20:57', '2022-11-28 09:20:57');
INSERT INTO `roles` VALUES (6, 'Kepala Sekolah', '2023-03-14 23:18:58', '2023-03-15 21:48:44');

-- ----------------------------
-- Table structure for selesai_test
-- ----------------------------
DROP TABLE IF EXISTS `selesai_test`;
CREATE TABLE `selesai_test`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `tanggal_selesai_test` date NOT NULL,
  `judul_selesai_test` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan_selesai_test` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of selesai_test
-- ----------------------------
INSERT INTO `selesai_test` VALUES (4, '2024-06-28', 'Hasil Perhitungan Metode ROC dan MAUT', 'Keterangan Hasil Perhitungan Metode ROC dan MAUT', '2024-06-28 11:19:07', '2024-06-28 11:19:07');

-- ----------------------------
-- Table structure for sub_kriteria
-- ----------------------------
DROP TABLE IF EXISTS `sub_kriteria`;
CREATE TABLE `sub_kriteria`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `kode_sub_kriteria` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_sub_kriteria` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kriteria_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bobot_sub_kriteria` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `sub_kriteria_kode_sub_kriteria_unique`(`kode_sub_kriteria` ASC) USING BTREE,
  INDEX `sub_kriteria_kriteria_id_foreign`(`kriteria_id` ASC) USING BTREE,
  CONSTRAINT `sub_kriteria_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of sub_kriteria
-- ----------------------------
INSERT INTO `sub_kriteria` VALUES (33, 'S001', 'Negeri', 25, '2024-06-27 07:27:40', '2024-06-27 07:27:40', 2);
INSERT INTO `sub_kriteria` VALUES (34, 'S002', 'Swasta', 25, '2024-06-27 07:27:52', '2024-06-27 07:27:52', 1);
INSERT INTO `sub_kriteria` VALUES (35, 'S003', '0 - Rp. 1.500.000', 26, '2024-06-27 07:28:24', '2024-06-27 07:28:24', 1);
INSERT INTO `sub_kriteria` VALUES (36, 'S004', '1.500.000 - Rp. 3.000.000', 26, '2024-06-27 07:28:47', '2024-06-27 07:28:47', 2);
INSERT INTO `sub_kriteria` VALUES (37, 'S005', '1 orang', 27, '2024-06-27 07:29:04', '2024-06-27 07:29:04', 1);
INSERT INTO `sub_kriteria` VALUES (38, 'S006', '2 orang', 27, '2024-06-27 07:29:13', '2024-06-27 07:29:13', 2);
INSERT INTO `sub_kriteria` VALUES (39, 'S007', '1 Orang', 28, '2024-06-27 07:29:29', '2024-06-27 07:29:29', 1);
INSERT INTO `sub_kriteria` VALUES (40, 'S008', '2 Orang', 28, '2024-06-27 07:29:41', '2024-06-27 07:29:41', 2);
INSERT INTO `sub_kriteria` VALUES (41, 'S009', '500.000 / bulan', 29, '2024-06-27 07:29:57', '2024-06-27 07:29:57', 1);
INSERT INTO `sub_kriteria` VALUES (42, 'S010', '1.000.000 / bulan', 29, '2024-06-27 07:30:07', '2024-06-27 07:30:07', 2);
INSERT INTO `sub_kriteria` VALUES (43, 'S011', 'Internasional', 25, '2024-06-27 07:30:21', '2024-06-27 07:30:21', 3);
INSERT INTO `sub_kriteria` VALUES (44, 'S012', '3.000.000 - Rp. 4.000.000', 26, '2024-06-27 07:30:42', '2024-06-27 07:30:42', 3);
INSERT INTO `sub_kriteria` VALUES (45, 'S013', '3 Orang', 27, '2024-06-27 07:30:50', '2024-06-27 07:30:50', 3);
INSERT INTO `sub_kriteria` VALUES (46, 'S014', '3 Orang', 28, '2024-06-27 07:30:57', '2024-06-27 07:30:57', 3);
INSERT INTO `sub_kriteria` VALUES (47, 'S015', 'Rp. 2.000.000', 29, '2024-06-27 07:31:10', '2024-06-27 07:31:25', 3);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin123', NULL, '$2y$10$dj9tGGx78ez1CHXsu6/JSeHnDrzJL71Qgo2ysUVF7FZe.bkD8MEQu', NULL, NULL, NULL, 'i0zBXsQmTCgvQq0JqCjzc3Q27ebZy73mJeiHpuzKBWGNHlqcyo3A0odpbBZL', '2022-11-28 09:21:37', '2024-06-28 09:17:29');
INSERT INTO `users` VALUES (12, 'siswa123', NULL, '$2y$10$V6NGhtRRaDIqE8YSmo4Pbe/LxQp8eD..sRrI.OCcPR0fWKjS0ZXtO', NULL, NULL, NULL, NULL, '2023-03-14 20:51:52', '2023-03-14 23:35:10');
INSERT INTO `users` VALUES (13, 'siswa124', NULL, '$2y$10$I0DkjJjkkhgPJYAbvZspduFOad0Ib3HQDqKx7zL3LpwHbHDbnxCM6', NULL, NULL, NULL, NULL, '2023-03-15 21:46:21', '2023-03-15 21:46:21');
INSERT INTO `users` VALUES (14, 'siswa125', NULL, '$2y$10$gEB6zZg0l0CLs5/Z7gKyiO6QMwtyoAzDWSYuQzcZvwOpuGBleiZO6', NULL, NULL, NULL, NULL, '2023-03-15 21:47:35', '2023-03-15 21:47:35');

SET FOREIGN_KEY_CHECKS = 1;
