/*
 Navicat Premium Data Transfer

 Source Server         : project
 Source Server Type    : MySQL
 Source Server Version : 100420 (10.4.20-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : maut_zeruci

 Target Server Type    : MySQL
 Target Server Version : 100420 (10.4.20-MariaDB)
 File Encoding         : 65001

 Date: 21/01/2023 11:28:51
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
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of alternatif
-- ----------------------------
INSERT INTO `alternatif` VALUES (5, 'Guru 1', '152141243', 'guru2@gmail.com', 'alamat guru 1', '08287832987', 'L', 'default.png', '2023-01-21 01:47:34', '2023-01-21 01:47:36');
INSERT INTO `alternatif` VALUES (6, 'Guru 2', '328682373', 'guru3@gmail.com', 'alamat guru 1', '08287832987', 'L', 'default.png', '2023-01-21 01:47:34', '2023-01-21 01:47:36');
INSERT INTO `alternatif` VALUES (7, 'Guru 3', '328682374', 'guru4@gmail.com', 'alamat guru 1', '08287832987', 'L', 'default.png', '2023-01-21 01:47:34', '2023-01-21 01:47:36');
INSERT INTO `alternatif` VALUES (8, 'Guru 4', '328682375', 'guru5@gmail.com', 'alamat guru 1', '08287832987', 'L', 'default.png', '2023-01-21 01:47:34', '2023-01-21 01:47:36');
INSERT INTO `alternatif` VALUES (11, 'Guru 5', '3286823761', 'guru6@gmail.com', 'alamat guru 1', '08287832987', 'L', 'default.png', '2023-01-21 01:47:34', '2023-01-21 01:47:36');
INSERT INTO `alternatif` VALUES (12, 'Guru 6', '328682377', 'guru7@gmail.com', 'alamat guru 1', '08287832987', 'L', 'default.png', '2023-01-21 01:47:34', '2023-01-21 01:47:36');
INSERT INTO `alternatif` VALUES (13, 'Guru 7', '328682378', 'guru8@gmail.com', 'alamat guru 1', '08287832987', 'L', 'default.png', '2023-01-21 01:47:34', '2023-01-21 01:47:36');
INSERT INTO `alternatif` VALUES (14, 'Guru 8', '328682379', 'guru9@gmail.com', 'alamat guru 1', '08287832987', 'L', 'default.png', '2023-01-21 01:47:34', '2023-01-21 01:47:36');
INSERT INTO `alternatif` VALUES (15, 'Guru 9', '3286823710', 'guru10@gmail.com', 'alamat guru 1', '08287832987', 'L', 'default.png', '2023-01-21 01:47:34', '2023-01-21 01:47:36');
INSERT INTO `alternatif` VALUES (16, 'Guru 10', '893279372', 'guru1@gmail.com', 'alamat guru 1', '08287832987', 'L', 'default.png', '2023-01-21 01:47:34', '2023-01-21 01:47:36');

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `hasil_alternatif_id_foreign`(`alternatif_id` ASC) USING BTREE,
  CONSTRAINT `hasil_alternatif_id_foreign` FOREIGN KEY (`alternatif_id`) REFERENCES `alternatif` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hasil
-- ----------------------------
INSERT INTO `hasil` VALUES (1, 13, 0.83, 1, '2023-01-21 11:02:58', '2023-01-21 11:02:58');
INSERT INTO `hasil` VALUES (2, 16, 0.81, 2, '2023-01-21 11:02:58', '2023-01-21 11:02:58');
INSERT INTO `hasil` VALUES (3, 7, 0.72, 3, '2023-01-21 11:02:58', '2023-01-21 11:02:58');
INSERT INTO `hasil` VALUES (4, 11, 0.71, 4, '2023-01-21 11:02:58', '2023-01-21 11:02:58');
INSERT INTO `hasil` VALUES (5, 12, 0.68, 5, '2023-01-21 11:02:58', '2023-01-21 11:02:58');
INSERT INTO `hasil` VALUES (6, 5, 0.55, 6, '2023-01-21 11:02:58', '2023-01-21 11:02:58');
INSERT INTO `hasil` VALUES (7, 15, 0.55, 7, '2023-01-21 11:02:58', '2023-01-21 11:02:58');
INSERT INTO `hasil` VALUES (8, 14, 0.47, 8, '2023-01-21 11:02:58', '2023-01-21 11:02:58');
INSERT INTO `hasil` VALUES (9, 6, 0.39, 9, '2023-01-21 11:02:58', '2023-01-21 11:02:58');
INSERT INTO `hasil` VALUES (10, 8, 0.14, 10, '2023-01-21 11:02:58', '2023-01-21 11:02:58');

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
) ENGINE = InnoDB AUTO_INCREMENT = 81 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hasil_detail
-- ----------------------------
INSERT INTO `hasil_detail` VALUES (1, 1, 12, 92.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (2, 1, 13, 91.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (3, 1, 14, 87.50, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (4, 1, 15, 97.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (5, 1, 16, 97.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (6, 1, 17, 97.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (7, 1, 18, 97.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (8, 1, 19, 97.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (9, 2, 12, 90.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (10, 2, 13, 96.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (11, 2, 14, 97.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (12, 2, 15, 97.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (13, 2, 16, 97.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (14, 2, 17, 99.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (15, 2, 18, 90.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (16, 2, 19, 90.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (17, 3, 12, 90.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (18, 3, 13, 92.50, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (19, 3, 14, 92.50, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (20, 3, 15, 99.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (21, 3, 16, 99.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (22, 3, 17, 99.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (23, 3, 18, 87.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (24, 3, 19, 81.50, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (25, 4, 12, 90.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (26, 4, 13, 92.50, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (27, 4, 14, 87.50, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (28, 4, 15, 87.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (29, 4, 16, 90.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (30, 4, 17, 95.67, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (31, 4, 18, 98.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (32, 4, 19, 98.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (33, 5, 12, 98.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (34, 5, 13, 98.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (35, 5, 14, 93.50, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (36, 5, 15, 87.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (37, 5, 16, 92.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (38, 5, 17, 92.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (39, 5, 18, 92.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (40, 5, 19, 92.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (41, 6, 12, 90.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (42, 6, 13, 92.50, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (43, 6, 14, 87.50, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (44, 6, 15, 87.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (45, 6, 16, 90.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (46, 6, 17, 92.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (47, 6, 18, 90.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (48, 6, 19, 90.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (49, 7, 12, 90.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (50, 7, 13, 92.50, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (51, 7, 14, 87.50, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (52, 7, 15, 87.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (53, 7, 16, 90.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (54, 7, 17, 92.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (55, 7, 18, 90.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (56, 7, 19, 90.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (57, 8, 12, 97.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (58, 8, 13, 93.50, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (59, 8, 14, 87.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (60, 8, 15, 87.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (61, 8, 16, 87.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (62, 8, 17, 87.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (63, 8, 18, 87.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (64, 8, 19, 88.50, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (65, 9, 12, 87.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (66, 9, 13, 87.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (67, 9, 14, 87.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (68, 9, 15, 87.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (69, 9, 16, 75.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (70, 9, 17, 87.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (71, 9, 18, 90.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (72, 9, 19, 90.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (73, 10, 12, 76.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (74, 10, 13, 76.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (75, 10, 14, 76.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (76, 10, 15, 76.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (77, 10, 16, 76.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (78, 10, 17, 82.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (79, 10, 18, 94.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (80, 10, 19, 94.00, NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of konfigurasi
-- ----------------------------
INSERT INTO `konfigurasi` VALUES (1, 'Sistem Pakar CF & BC', 'default.png', '082277562382', 'Untuk menentukan diagnosa presentase kecanduan bermain gadet', 'hadidta@gmail.com', 'Sistem pakar menggunakan metode Certainty Factory & Backward Chaining', 'Bima Ega @ Fullstack Developer', '2023-01-17 19:41:39', '2023-01-17 19:41:39');

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
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kriteria
-- ----------------------------
INSERT INTO `kriteria` VALUES (12, 'K001', 'Kuantitas Kerja', 'Jumlah kerja yang dilakukan dalam suatu periode waktu yang ditentukan', 10.00, '2023-01-17 22:39:33', '2023-01-17 22:39:35');
INSERT INTO `kriteria` VALUES (13, 'K002', 'Kualitas Kerja', 'Kualitas kerja berdasarkan syarat-syarat kesesuaian dan kesiapannya', 10.00, '2023-01-17 22:40:33', '2023-01-17 22:40:38');
INSERT INTO `kriteria` VALUES (14, 'K003', 'Pengetahuan', 'Luasnya pengetahuan mengenai pekerjaan dan ketrampilannya', 10.00, '2023-01-17 22:41:09', '2023-01-17 22:41:11');
INSERT INTO `kriteria` VALUES (15, 'K004', 'Kreativitas', 'Keaslian gagasan-gasan yang dimunculkan dan tindakan-tindakan untuk menyelesaikan persoalan- persoalan yang timbul', 20.00, '2023-01-17 22:41:39', '2023-01-17 22:41:44');
INSERT INTO `kriteria` VALUES (16, 'K005', 'Kerja Sama', 'Kesetiaan untuk bekerjasama dengan orang lain', 10.00, '2023-01-17 22:42:15', '2023-01-17 22:42:18');
INSERT INTO `kriteria` VALUES (17, 'K006', 'Keandalan', 'Kesadaran dan kepercayaan dalam hal kehadirandan penyelesaian kerja', 20.00, '2023-01-17 22:43:02', '2023-01-17 22:43:04');
INSERT INTO `kriteria` VALUES (18, 'K007', 'Inisiatif', 'Semangat untuk melaksanakan tugas- tugas baru dan dalam memperbesar tanggung jawabnya', 10.00, '2023-01-17 22:43:33', '2023-01-17 22:43:35');
INSERT INTO `kriteria` VALUES (19, 'K008', 'Kualitas Personal', 'Menyangkut kepribadian, kepemimpinan, keramahtamahan, dan integritas pribadi', 10.00, '2023-01-17 22:44:03', '2023-01-17 22:44:05');

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
) ENGINE = InnoDB AUTO_INCREMENT = 136 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kriteria_subkriteria
-- ----------------------------
INSERT INTO `kriteria_subkriteria` VALUES (4, 12, 7, 5, 90.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (5, 13, 9, 5, 95.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (6, 13, 10, 5, 90.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (7, 14, 11, 5, 86.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (8, 14, 16, 5, 89.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (9, 15, 17, 5, 87.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (10, 16, 18, 5, 90.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (11, 17, 20, 5, 91.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (12, 17, 22, 5, 95.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (13, 17, 23, 5, 90.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (14, 18, 25, 5, 90.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (15, 19, 27, 5, 90.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (16, 19, 28, 5, 90.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (19, 12, 7, 6, 87.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (20, 13, 9, 6, 87.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (21, 13, 10, 6, 87.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (22, 14, 11, 6, 87.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (23, 14, 16, 6, 87.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (24, 15, 17, 6, 87.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (25, 16, 18, 6, 75.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (26, 17, 20, 6, 87.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (27, 17, 22, 6, 87.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (28, 17, 23, 6, 87.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (29, 18, 25, 6, 90.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (30, 19, 27, 6, 90.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (31, 19, 28, 6, 90.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (32, 12, 7, 7, 90.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (33, 13, 9, 7, 95.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (34, 13, 10, 7, 90.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (35, 14, 11, 7, 86.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (36, 14, 16, 7, 99.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (37, 15, 17, 7, 99.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (38, 16, 18, 7, 99.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (39, 17, 20, 7, 99.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (40, 17, 22, 7, 99.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (41, 17, 23, 7, 99.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (42, 18, 25, 7, 87.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (43, 19, 27, 7, 87.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (44, 19, 28, 7, 76.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (45, 12, 7, 8, 76.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (46, 13, 9, 8, 76.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (47, 13, 10, 8, 76.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (48, 14, 11, 8, 76.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (49, 14, 16, 8, 76.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (50, 15, 17, 8, 76.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (51, 16, 18, 8, 76.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (52, 17, 20, 8, 76.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (53, 17, 22, 8, 76.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (54, 17, 23, 8, 94.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (55, 18, 25, 8, 94.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (56, 19, 27, 8, 94.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (57, 19, 28, 8, 94.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (58, 12, 7, 11, 90.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (59, 13, 9, 11, 95.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (60, 13, 10, 11, 90.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (61, 14, 11, 11, 86.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (62, 14, 16, 11, 89.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (63, 15, 17, 11, 87.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (64, 16, 18, 11, 90.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (65, 17, 20, 11, 91.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (66, 17, 22, 11, 98.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (67, 17, 23, 11, 98.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (68, 18, 25, 11, 98.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (69, 19, 27, 11, 98.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (70, 19, 28, 11, 98.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (71, 12, 7, 12, 98.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (72, 13, 9, 12, 98.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (73, 13, 10, 12, 98.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (74, 14, 11, 12, 98.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (75, 14, 16, 12, 89.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (76, 15, 17, 12, 87.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (77, 16, 18, 12, 92.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (78, 17, 20, 12, 92.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (79, 17, 22, 12, 92.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (80, 17, 23, 12, 92.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (81, 18, 25, 12, 92.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (82, 19, 27, 12, 92.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (83, 19, 28, 12, 92.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (84, 12, 7, 13, 92.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (85, 13, 9, 13, 92.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (86, 13, 10, 13, 90.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (87, 14, 11, 13, 86.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (88, 14, 16, 13, 89.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (89, 15, 17, 13, 97.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (90, 16, 18, 13, 97.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (91, 17, 20, 13, 97.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (92, 17, 22, 13, 97.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (93, 17, 23, 13, 97.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (94, 18, 25, 13, 97.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (95, 19, 27, 13, 97.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (96, 19, 28, 13, 97.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (97, 12, 7, 14, 97.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (98, 13, 9, 14, 97.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (99, 13, 10, 14, 90.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (100, 14, 11, 14, 87.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (101, 14, 16, 14, 87.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (102, 15, 17, 14, 87.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (103, 16, 18, 14, 87.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (104, 17, 20, 14, 87.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (105, 17, 22, 14, 87.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (106, 17, 23, 14, 87.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (107, 18, 25, 14, 87.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (108, 19, 27, 14, 87.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (109, 19, 28, 14, 90.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (110, 12, 7, 15, 90.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (111, 13, 9, 15, 95.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (112, 13, 10, 15, 90.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (113, 14, 11, 15, 86.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (114, 14, 16, 15, 89.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (115, 15, 17, 15, 87.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (116, 16, 18, 15, 90.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (117, 17, 20, 15, 91.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (118, 17, 22, 15, 95.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (119, 17, 23, 15, 90.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (120, 18, 25, 15, 90.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (121, 19, 27, 15, 90.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (122, 19, 28, 15, 90.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (123, 12, 7, 16, 90.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (124, 13, 9, 16, 95.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (125, 13, 10, 16, 97.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (126, 14, 11, 16, 97.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (127, 14, 16, 16, 97.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (128, 15, 17, 16, 97.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (129, 16, 18, 16, 97.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (130, 17, 20, 16, 99.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (131, 17, 22, 16, 99.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (132, 17, 23, 16, 99.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (133, 18, 25, 16, 90.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (134, 19, 27, 16, 90.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');
INSERT INTO `kriteria_subkriteria` VALUES (135, 19, 28, 16, 90.00, '2023-01-21 02:11:03', '2023-01-21 02:11:03');

-- ----------------------------
-- Table structure for management_menu
-- ----------------------------
DROP TABLE IF EXISTS `management_menu`;
CREATE TABLE `management_menu`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `no_management_menu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_management_menu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_management_menu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_management_menu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `membawahi_menu_management_menu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `is_node_management_menu` tinyint(1) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of management_menu
-- ----------------------------
INSERT INTO `management_menu` VALUES (1, '8', 'Data master', 'hard-drive', '#', '2,3,7,8,14,15', 1, '2022-11-28 11:05:35', '2022-12-02 10:26:55');
INSERT INTO `management_menu` VALUES (2, '9', 'User', 'far fa-circle', '/admin/users', NULL, NULL, '2022-11-28 11:43:41', '2022-11-28 17:02:48');
INSERT INTO `management_menu` VALUES (3, '10', 'Role', 'far fa-circle', '/admin/roles', NULL, NULL, '2022-11-28 11:46:15', '2022-12-02 10:26:31');
INSERT INTO `management_menu` VALUES (4, '7', 'Konfigurasi', 'settings', '/admin/konfigurasi', NULL, NULL, '2022-11-28 11:50:25', '2022-12-02 10:26:12');
INSERT INTO `management_menu` VALUES (6, '2', 'My Profile', 'user', '/admin/profile', NULL, NULL, '2022-11-28 16:05:32', '2022-11-28 17:00:33');
INSERT INTO `management_menu` VALUES (7, '11', 'Gejala', 'far fa-circle', '/admin/gejala', NULL, NULL, '2022-11-28 16:06:32', '2022-11-28 17:03:03');
INSERT INTO `management_menu` VALUES (8, '12', 'Penyakit', 'far fa-circle', '/admin/penyakit', NULL, NULL, '2022-11-28 16:08:03', '2022-11-28 17:03:21');
INSERT INTO `management_menu` VALUES (9, '5', 'Rule cenderung', 'edit', '/admin/rule', NULL, NULL, '2022-11-28 16:09:12', '2022-11-28 17:04:15');
INSERT INTO `management_menu` VALUES (10, '6', 'Role Access', 'user-check', '/admin/access', NULL, NULL, '2022-11-28 16:11:12', '2022-11-28 17:04:32');
INSERT INTO `management_menu` VALUES (11, '4', 'Hasil', 'book', '/admin/hasil', NULL, NULL, '2022-11-28 16:11:39', '2022-11-28 17:02:08');
INSERT INTO `management_menu` VALUES (12, '1', 'Dashboard', 'home', '/admin/home', NULL, 0, '2022-11-28 16:18:33', '2022-11-30 17:24:09');
INSERT INTO `management_menu` VALUES (14, '13', 'Menu', 'far fa-circle', '/admin/menu', NULL, NULL, '2022-11-30 17:19:19', '2022-11-30 17:25:28');
INSERT INTO `management_menu` VALUES (15, '14', 'CF User', 'far fa-circle', '/admin/bobotUser', NULL, NULL, '2022-11-30 17:19:58', '2022-11-30 17:25:18');
INSERT INTO `management_menu` VALUES (16, '3', 'Diagnosa', 'book-open', '/admin/diagnosa', NULL, NULL, '2022-12-02 10:24:44', '2022-12-02 10:25:48');
INSERT INTO `management_menu` VALUES (18, '15', 'Logout', 'log-out', '/logout', NULL, NULL, '2022-12-04 09:07:39', '2022-12-04 09:07:39');

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
) ENGINE = InnoDB AUTO_INCREMENT = 87 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of management_menu_roles
-- ----------------------------
INSERT INTO `management_menu_roles` VALUES (50, 3, 1, NULL, 127, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `management_menu_roles` VALUES (51, 7, 1, NULL, 127, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `management_menu_roles` VALUES (52, 8, 1, NULL, 127, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `management_menu_roles` VALUES (53, 9, 1, NULL, 127, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `management_menu_roles` VALUES (54, 10, 1, NULL, 127, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `management_menu_roles` VALUES (55, 11, 1, NULL, 127, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `management_menu_roles` VALUES (56, 12, 1, NULL, 127, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `management_menu_roles` VALUES (57, 14, 1, NULL, 127, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `management_menu_roles` VALUES (58, 15, 1, NULL, 127, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `management_menu_roles` VALUES (59, 1, 1, NULL, 127, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `management_menu_roles` VALUES (60, 2, 1, NULL, 127, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `management_menu_roles` VALUES (61, 4, 1, NULL, 127, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `management_menu_roles` VALUES (62, 6, 1, NULL, 127, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `management_menu_roles` VALUES (63, 18, 1, NULL, 127, NULL, NULL, NULL);
INSERT INTO `management_menu_roles` VALUES (64, 1, 4, NULL, NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `management_menu_roles` VALUES (65, 2, 4, NULL, NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `management_menu_roles` VALUES (66, 3, 4, NULL, NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `management_menu_roles` VALUES (67, 4, 4, NULL, NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `management_menu_roles` VALUES (68, 7, 4, NULL, NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `management_menu_roles` VALUES (69, 8, 4, NULL, NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `management_menu_roles` VALUES (70, 14, 4, NULL, NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `management_menu_roles` VALUES (71, 15, 4, NULL, NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `management_menu_roles` VALUES (72, 6, 4, NULL, NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `management_menu_roles` VALUES (73, 11, 4, NULL, NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `management_menu_roles` VALUES (74, 12, 4, NULL, NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `management_menu_roles` VALUES (75, 18, 4, NULL, 127, NULL, NULL, NULL);
INSERT INTO `management_menu_roles` VALUES (76, 6, 2, NULL, 127, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `management_menu_roles` VALUES (77, 11, 2, NULL, 127, NULL, NULL, '0000-00-00 00:00:00');
INSERT INTO `management_menu_roles` VALUES (78, 12, 2, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `management_menu_roles` VALUES (79, 16, 2, NULL, 127, NULL, '0000-00-00 00:00:00', NULL);
INSERT INTO `management_menu_roles` VALUES (80, 18, 2, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `management_menu_roles` VALUES (81, 2, 3, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `management_menu_roles` VALUES (82, 3, 3, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `management_menu_roles` VALUES (83, 7, 3, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `management_menu_roles` VALUES (84, 8, 3, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `management_menu_roles` VALUES (85, 14, 3, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `management_menu_roles` VALUES (86, 15, 3, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of profile
-- ----------------------------

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
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES (1, 1, 1, '2022-11-28 09:21:37', '2022-12-04 11:24:17');
INSERT INTO `role_user` VALUES (2, 2, 2, '2022-11-28 09:22:12', '2022-12-04 13:36:20');
INSERT INTO `role_user` VALUES (3, 3, 3, '2022-11-28 09:31:54', '2022-11-28 09:31:54');
INSERT INTO `role_user` VALUES (5, 2, 8, '2022-12-09 08:39:41', '2022-12-09 08:39:41');
INSERT INTO `role_user` VALUES (6, 2, 9, '2022-12-09 08:42:34', '2022-12-09 08:42:34');
INSERT INTO `role_user` VALUES (7, 2, 10, '2022-12-09 08:43:48', '2022-12-09 08:43:48');

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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'Admin', '2022-11-28 09:20:52', '2022-11-28 09:20:52');
INSERT INTO `roles` VALUES (2, 'Users', '2022-11-28 09:20:57', '2022-11-28 09:20:57');
INSERT INTO `roles` VALUES (3, 'Owner', '2022-11-28 09:21:01', '2022-11-28 09:21:01');
INSERT INTO `roles` VALUES (4, 'Developer', '2022-11-28 09:21:06', '2022-11-28 09:21:06');

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
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `sub_kriteria_kode_sub_kriteria_unique`(`kode_sub_kriteria` ASC) USING BTREE,
  INDEX `sub_kriteria_kriteria_id_foreign`(`kriteria_id` ASC) USING BTREE,
  CONSTRAINT `sub_kriteria_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sub_kriteria
-- ----------------------------
INSERT INTO `sub_kriteria` VALUES (7, 'S001', 'Tanggung jawab yang tinggi serta tepat waktu dalam mengajar\r\n', 12, '2023-01-21 01:52:47', '2023-01-21 01:52:47');
INSERT INTO `sub_kriteria` VALUES (9, 'S002', 'Kesiapan terhadap kegiatan belajar mengajar\r\n', 13, '2023-01-21 01:52:47', '2023-01-21 01:52:47');
INSERT INTO `sub_kriteria` VALUES (10, 'S003', 'Kesesuaian materi pembelajaran dengan kurikulum\r\n', 13, '2023-01-21 01:52:47', '2023-01-21 01:52:47');
INSERT INTO `sub_kriteria` VALUES (11, 'S004', 'Pengetahuan mengenai tugas\r\n', 14, '2023-01-21 01:52:47', '2023-01-21 01:52:47');
INSERT INTO `sub_kriteria` VALUES (16, 'S005', 'Kemauan untuk terus belajar\r\n', 14, '2023-01-21 01:52:47', '2023-01-21 01:52:47');
INSERT INTO `sub_kriteria` VALUES (17, 'S006', 'Pengembangan materi pembelajaran\r\n', 15, '2023-01-21 01:52:47', '2023-01-21 01:52:47');
INSERT INTO `sub_kriteria` VALUES (18, 'S007', 'Komunikatif sesama guru, tenaga pengajar\r\n', 16, '2023-01-21 01:52:47', '2023-01-21 01:52:47');
INSERT INTO `sub_kriteria` VALUES (20, 'S008', 'Kepercayaan dan kesungguhan dalam penyelesaian tugas', 17, '2023-01-21 01:52:47', '2023-01-21 01:52:47');
INSERT INTO `sub_kriteria` VALUES (22, 'S009', 'Ketepatan waktu dalam menyelesaikan tugas sebagai guru', 17, '2023-01-21 01:52:47', '2023-01-21 01:52:47');
INSERT INTO `sub_kriteria` VALUES (23, 'S010', 'Kehadiran', 17, '2023-01-21 01:52:47', '2023-01-21 01:52:47');
INSERT INTO `sub_kriteria` VALUES (25, 'S011', 'Meningkatkan pengembangan potensi peserta didik\r\n', 18, '2023-01-21 01:52:47', '2023-01-21 01:52:47');
INSERT INTO `sub_kriteria` VALUES (27, 'S012', 'Keteladanan\r\n', 19, '2023-01-21 01:52:47', '2023-01-21 01:52:47');
INSERT INTO `sub_kriteria` VALUES (28, 'S013', 'Menguasai karakteristik peserta didik\r\n', 19, '2023-01-21 01:52:47', '2023-01-21 01:52:47');

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
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin123', NULL, '$2y$10$jWZ1pryNPtqDu2OfquoUL.t4Klr7LpkTzP2bxhSpUSnEv9ojN/M7e', NULL, NULL, NULL, 'EIgZwUIeLwFQvqtXNhTPkCkD2a9nI7QdnGTLIOYGUrG9ySvj2VqeDvSMhm8A', '2022-11-28 09:21:37', '2022-12-03 23:55:04');
INSERT INTO `users` VALUES (2, 'users123', NULL, '$2y$10$nQY9ZR3WCXfcvajfdAUHbuvn77fZww8u34UWM7ZkAbjJxXCfx5XQe', NULL, NULL, NULL, '4RVaFEIcmvqcJx26Ti6lzxFXG2CXkPj4tyhmNR3v9ZqIniguGgJhREGFdyVe', '2022-11-28 09:22:12', '2022-12-04 13:36:20');
INSERT INTO `users` VALUES (3, 'owner123', NULL, '$2y$10$Huyx5UDwHgTT2mVWgcej/e6IXqrEeeekTD/8sTJuhe.fqTJn0PxIS', NULL, NULL, NULL, NULL, '2022-11-28 09:31:54', '2022-11-28 09:31:54');
INSERT INTO `users` VALUES (8, 'userlogin', NULL, '$2y$10$n93KlR78iYwGnUlLBYSa2ODlMAR3DHQbvO.H43hV/Ia/9grocTYfi', NULL, NULL, NULL, NULL, '2022-12-09 08:39:41', '2022-12-09 08:39:41');
INSERT INTO `users` VALUES (9, 'userlogintesting', NULL, '$2y$10$ZKlUhdU2C3dj1yO.KzJVGe0FwbniQl6BHEaMeNnxU7UAwkAb/kZp.', NULL, NULL, NULL, NULL, '2022-12-09 08:42:34', '2022-12-09 08:42:34');
INSERT INTO `users` VALUES (10, 'testingagain', NULL, '$2y$10$DCIGqXzPzkFvGqI6yTHkhOIRDP7PbQnvwhi1h4XCg5EEdRNECS/ku', NULL, NULL, NULL, NULL, '2022-12-09 08:43:48', '2022-12-09 08:43:48');

SET FOREIGN_KEY_CHECKS = 1;
