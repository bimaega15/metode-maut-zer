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

 Date: 20/03/2023 23:18:47
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
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of alternatif
-- ----------------------------
INSERT INTO `alternatif` VALUES (5, 'Guru 1', '152141243', 'guru2@gmail.com', 'alamat guru 1', '08287832987', 'L', 'AimN0qrgglYbGDoJ9EFB90SXBSnPFvhVzZF3KFIz.jpg', '2023-01-21 01:47:34', '2023-03-15 04:26:40');
INSERT INTO `alternatif` VALUES (6, 'Guru 2', '328682373', 'guru3@gmail.com', 'alamat guru 1', '08287832987', 'L', 'Fnwi9I8rONJE69AwpQUeJBUQc6tgEPlOA0hsZ1BP.jpg', '2023-01-21 01:47:34', '2023-03-15 04:26:47');
INSERT INTO `alternatif` VALUES (7, 'Guru 3', '328682374', 'guru4@gmail.com', 'alamat guru 1', '08287832987', 'L', '8rzuZvnShLHRte0rv1BrSuKTWHJUmOHEgIGEBAdF.jpg', '2023-01-21 01:47:34', '2023-03-15 04:26:53');
INSERT INTO `alternatif` VALUES (8, 'Guru 4', '328682375', 'guru5@gmail.com', 'alamat guru 1', '08287832987', 'L', 'z8q7ZSdVhENfy1rzfcwmYrY0bRE1j3ZFylyGEvBE.jpg', '2023-01-21 01:47:34', '2023-03-15 04:26:59');
INSERT INTO `alternatif` VALUES (11, 'Guru 5', '3286823761', 'guru6@gmail.com', 'alamat guru 1', '08287832987', 'L', 'j0lgqPDIyh7VMLMenCTvE8UPv1GpplimiIqsFdyx.jpg', '2023-01-21 01:47:34', '2023-03-15 04:27:05');
INSERT INTO `alternatif` VALUES (12, 'Guru 6', '328682377', 'guru7@gmail.com', 'alamat guru 1', '08287832987', 'L', 'xEd9Haw9ALd0otlcGfz5tKmXIhQtQC54JlhjSfW3.jpg', '2023-01-21 01:47:34', '2023-03-15 04:24:30');
INSERT INTO `alternatif` VALUES (13, 'Guru 7', '328682378', 'guru8@gmail.com', 'alamat guru 1', '08287832987', 'L', 'pk40ciKOQkwQB3QtXo0sir2NCaWy5mgo16B01xKe.jpg', '2023-01-21 01:47:34', '2023-03-15 04:24:21');
INSERT INTO `alternatif` VALUES (14, 'Guru 8', '328682379', 'guru9@gmail.com', 'alamat guru 1', '08287832987', 'L', 'taJvJRSh3bxqPU9FY9YAvh1Rvn4SxBnGnNHflPQZ.jpg', '2023-01-21 01:47:34', '2023-03-15 04:24:15');
INSERT INTO `alternatif` VALUES (19, 'Guru test', '289373242379', 'gurutest15@gmail.com', 'alamat guru test', '092338749823789', 'L', 'RxFAo9FSMKjaBJobA0m1EcmMd3dkmkJTu0tJIHJe.jpg', '2023-03-15 06:30:55', '2023-03-15 06:30:55');
INSERT INTO `alternatif` VALUES (20, 'Siswa 124', '230974985237', 'siswa124@gmail.com', 'alamat siswa 124', '0923837908235', 'L', 'default.png', '2023-03-15 21:55:11', '2023-03-15 21:55:11');

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
  `selesai_test_id` int UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `hasil_alternatif_id_foreign`(`alternatif_id` ASC) USING BTREE,
  INDEX `selesai_test_id`(`selesai_test_id` ASC) USING BTREE,
  CONSTRAINT `hasil_alternatif_id_foreign` FOREIGN KEY (`alternatif_id`) REFERENCES `alternatif` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`selesai_test_id`) REFERENCES `selesai_test` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hasil
-- ----------------------------
INSERT INTO `hasil` VALUES (31, 13, 0.84, 1, '2023-03-16 00:36:28', '2023-03-16 00:36:28', 3);
INSERT INTO `hasil` VALUES (32, 19, 0.83, 2, '2023-03-16 00:36:28', '2023-03-16 00:36:28', 3);
INSERT INTO `hasil` VALUES (33, 7, 0.75, 3, '2023-03-16 00:36:28', '2023-03-16 00:36:28', 3);
INSERT INTO `hasil` VALUES (34, 11, 0.73, 4, '2023-03-16 00:36:28', '2023-03-16 00:36:28', 3);
INSERT INTO `hasil` VALUES (35, 12, 0.68, 5, '2023-03-16 00:36:28', '2023-03-16 00:36:28', 3);
INSERT INTO `hasil` VALUES (36, 5, 0.57, 6, '2023-03-16 00:36:28', '2023-03-16 00:36:28', 3);
INSERT INTO `hasil` VALUES (37, 14, 0.48, 7, '2023-03-16 00:36:28', '2023-03-16 00:36:28', 3);
INSERT INTO `hasil` VALUES (38, 6, 0.42, 8, '2023-03-16 00:36:28', '2023-03-16 00:36:28', 3);
INSERT INTO `hasil` VALUES (39, 20, 0.40, 9, '2023-03-16 00:36:28', '2023-03-16 00:36:28', 3);
INSERT INTO `hasil` VALUES (40, 8, 0.13, 10, '2023-03-16 00:36:28', '2023-03-16 00:36:28', 3);

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
) ENGINE = InnoDB AUTO_INCREMENT = 321 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hasil_detail
-- ----------------------------
INSERT INTO `hasil_detail` VALUES (241, 31, 12, 92.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (242, 31, 13, 91.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (243, 31, 14, 87.50, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (244, 31, 15, 97.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (245, 31, 16, 97.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (246, 31, 17, 97.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (247, 31, 18, 97.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (248, 31, 19, 97.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (249, 32, 12, 100.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (250, 32, 13, 95.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (251, 32, 14, 90.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (252, 32, 15, 100.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (253, 32, 16, 90.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (254, 32, 17, 93.33, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (255, 32, 18, 100.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (256, 32, 19, 92.50, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (257, 33, 12, 90.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (258, 33, 13, 92.50, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (259, 33, 14, 92.50, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (260, 33, 15, 99.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (261, 33, 16, 99.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (262, 33, 17, 99.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (263, 33, 18, 87.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (264, 33, 19, 81.50, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (265, 34, 12, 90.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (266, 34, 13, 92.50, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (267, 34, 14, 87.50, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (268, 34, 15, 87.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (269, 34, 16, 90.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (270, 34, 17, 95.67, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (271, 34, 18, 98.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (272, 34, 19, 98.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (273, 35, 12, 98.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (274, 35, 13, 98.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (275, 35, 14, 93.50, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (276, 35, 15, 87.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (277, 35, 16, 92.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (278, 35, 17, 92.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (279, 35, 18, 92.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (280, 35, 19, 92.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (281, 36, 12, 90.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (282, 36, 13, 92.50, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (283, 36, 14, 87.50, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (284, 36, 15, 87.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (285, 36, 16, 90.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (286, 36, 17, 92.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (287, 36, 18, 90.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (288, 36, 19, 90.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (289, 37, 12, 97.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (290, 37, 13, 93.50, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (291, 37, 14, 87.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (292, 37, 15, 87.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (293, 37, 16, 87.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (294, 37, 17, 87.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (295, 37, 18, 87.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (296, 37, 19, 88.50, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (297, 38, 12, 87.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (298, 38, 13, 87.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (299, 38, 14, 87.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (300, 38, 15, 87.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (301, 38, 16, 75.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (302, 38, 17, 87.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (303, 38, 18, 90.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (304, 38, 19, 90.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (305, 39, 12, 85.67, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (306, 39, 13, 88.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (307, 39, 14, 88.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (308, 39, 15, 89.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (309, 39, 16, 78.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (310, 39, 17, 85.33, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (311, 39, 18, 87.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (312, 39, 19, 88.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (313, 40, 12, 33.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (314, 40, 13, 76.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (315, 40, 14, 76.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (316, 40, 15, 76.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (317, 40, 16, 76.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (318, 40, 17, 82.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (319, 40, 18, 94.00, NULL, NULL);
INSERT INTO `hasil_detail` VALUES (320, 40, 19, 94.00, NULL, NULL);

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
INSERT INTO `konfigurasi` VALUES (1, 'Sistem Pakar CF & BC', '42e80B5SXItDSoyDhIE7vvOF32GIAzynyk2OR6kY.jpg', '082277562382', 'Untuk menentukan diagnosa presentase kecanduan bermain gadet', 'hadidta@gmail.com', 'Sistem pakar menggunakan metode Certainty Factory & Backward Chaining', 'Bima Ega @ Fullstack Developer', '2023-01-17 19:41:39', '2023-03-15 08:09:14');

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
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kriteria
-- ----------------------------
INSERT INTO `kriteria` VALUES (12, 'K001', 'Penghasilan Orang Tua', 'Untuk menilai penghasilan orang tua', 10.00, '2023-01-17 22:39:33', '2023-03-15 21:52:30');
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
) ENGINE = InnoDB AUTO_INCREMENT = 220 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
INSERT INTO `kriteria_subkriteria` VALUES (162, 12, 7, 19, 100.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (163, 13, 9, 19, 90.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (164, 13, 10, 19, 100.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (165, 14, 11, 19, 90.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (166, 14, 16, 19, 90.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (167, 15, 17, 19, 100.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (168, 16, 18, 19, 90.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (169, 17, 20, 19, 90.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (170, 17, 22, 19, 100.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (171, 17, 23, 19, 90.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (172, 18, 25, 19, 100.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (173, 19, 27, 19, 90.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (174, 19, 28, 19, 95.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (190, 12, 7, 20, 80.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (191, 12, 30, 20, 90.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (192, 12, 31, 20, 87.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (193, 13, 9, 20, 89.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (194, 13, 10, 20, 87.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (195, 14, 11, 20, 89.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (196, 14, 16, 20, 87.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (197, 15, 17, 20, 89.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (198, 16, 18, 20, 78.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (199, 17, 20, 20, 89.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (200, 17, 22, 20, 78.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (201, 17, 23, 20, 89.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (202, 18, 25, 20, 87.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (203, 19, 27, 20, 89.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (204, 19, 28, 20, 87.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (205, 12, 7, 8, 89.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (206, 12, 30, 8, 0.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (207, 12, 31, 8, 10.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (208, 13, 9, 8, 76.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (209, 13, 10, 8, 76.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (210, 14, 11, 8, 76.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (211, 14, 16, 8, 76.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (212, 15, 17, 8, 76.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (213, 16, 18, 8, 76.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (214, 17, 20, 8, 76.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (215, 17, 22, 8, 76.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (216, 17, 23, 8, 94.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (217, 18, 25, 8, 94.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (218, 19, 27, 8, 94.00, NULL, NULL);
INSERT INTO `kriteria_subkriteria` VALUES (219, 19, 28, 8, 94.00, NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of management_menu
-- ----------------------------
INSERT INTO `management_menu` VALUES (1, '8', 'Data master', 'hard-drive', '#', '2,3,14,20,21,22,23', 1, '2022-11-28 11:05:35', '2023-03-15 06:04:30');
INSERT INTO `management_menu` VALUES (2, '9', 'User', 'far fa-circle', '/admin/users', NULL, NULL, '2022-11-28 11:43:41', '2022-11-28 17:02:48');
INSERT INTO `management_menu` VALUES (3, '10', 'Role', 'far fa-circle', '/admin/roles', NULL, NULL, '2022-11-28 11:46:15', '2022-12-02 10:26:31');
INSERT INTO `management_menu` VALUES (4, '7', 'Konfigurasi', 'settings', '/admin/konfigurasi', NULL, NULL, '2022-11-28 11:50:25', '2022-12-02 10:26:12');
INSERT INTO `management_menu` VALUES (6, '2', 'My Profile', 'user', '/admin/profile', NULL, NULL, '2022-11-28 16:05:32', '2022-11-28 17:00:33');
INSERT INTO `management_menu` VALUES (9, '5', 'Penilaian', 'edit', '/admin/penilaian', NULL, NULL, '2022-11-28 16:09:12', '2023-03-15 06:11:11');
INSERT INTO `management_menu` VALUES (10, '6', 'Role Access', 'user-check', '/admin/access', NULL, NULL, '2022-11-28 16:11:12', '2022-11-28 17:04:32');
INSERT INTO `management_menu` VALUES (11, '4', 'Hasil', 'book', '/admin/hasil', NULL, NULL, '2022-11-28 16:11:39', '2022-11-28 17:02:08');
INSERT INTO `management_menu` VALUES (12, '1', 'Dashboard', 'home', '/admin/home', NULL, 0, '2022-11-28 16:18:33', '2022-11-30 17:24:09');
INSERT INTO `management_menu` VALUES (14, '13', 'Menu', 'far fa-circle', '/admin/menu', NULL, NULL, '2022-11-30 17:19:19', '2022-11-30 17:25:28');
INSERT INTO `management_menu` VALUES (18, '15', 'Logout', 'log-out', '/logout', NULL, NULL, '2022-12-04 09:07:39', '2022-12-04 09:07:39');
INSERT INTO `management_menu` VALUES (20, '14', 'Alternatif', 'far fa-circle', '/admin/alternatif', NULL, NULL, '2023-03-15 00:04:17', '2023-03-15 03:42:17');
INSERT INTO `management_menu` VALUES (21, '15', 'Sub Kriteria', 'far fa-circle', '/admin/subKriteria', NULL, NULL, '2023-03-15 00:04:37', '2023-03-15 00:04:37');
INSERT INTO `management_menu` VALUES (22, '16', 'Kriteria', 'far fa-circle', '/admin/kriteria', NULL, NULL, '2023-03-15 03:44:10', '2023-03-15 06:00:42');
INSERT INTO `management_menu` VALUES (23, '17', 'Nilai', 'far fa-circle', '/admin/nilai', NULL, NULL, '2023-03-15 06:00:58', '2023-03-15 06:00:58');
INSERT INTO `management_menu` VALUES (24, '6', 'Perhitungan', 'book', '/admin/perhitungan', NULL, NULL, '2023-03-15 19:06:10', '2023-03-15 19:06:10');

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
) ENGINE = InnoDB AUTO_INCREMENT = 186 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of profile
-- ----------------------------
INSERT INTO `profile` VALUES (5, 1, 'My Profile123', 'myprofile123@gmail.com', 'alamat admin', '08239577', 'L', 'UbBBXV0Qit5AyfdWyurC6sAEsDszG5ViVIx6prc8.jpg', '2023-02-22 17:20:04', '2023-03-15 21:46:57');
INSERT INTO `profile` VALUES (7, 12, 'siswa123', 'siswa123@gmail.com', 'alamat siswa', '293648327897', 'L', 'ivvW8dOUNhpKUpVNnNUsRB0DHCVTpfoRvtVymYJa.jpg', '2023-03-14 20:51:52', '2023-03-14 23:35:10');
INSERT INTO `profile` VALUES (8, 13, 'siswa124', 'siswa124@gmail.com', 'alamat siswa 124', '902384798237', 'L', 'default.png', '2023-03-15 21:46:22', '2023-03-15 21:46:22');
INSERT INTO `profile` VALUES (9, 14, 'Siswa 125', 'siswa125@gmail.com', 'alamat siswa 125', '947982379879', 'L', 'default.png', '2023-03-15 21:47:35', '2023-03-15 21:47:35');

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
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES (1, 1, 1, '2022-11-28 09:21:37', '2023-03-15 21:46:57');
INSERT INTO `role_user` VALUES (9, 2, 12, '2023-03-14 20:51:52', '2023-03-14 23:35:10');
INSERT INTO `role_user` VALUES (10, 2, 13, '2023-03-15 21:46:22', '2023-03-15 21:46:22');
INSERT INTO `role_user` VALUES (11, 2, 14, '2023-03-15 21:47:35', '2023-03-15 21:47:35');

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
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of selesai_test
-- ----------------------------
INSERT INTO `selesai_test` VALUES (3, '2023-03-31', 'testing hasil', 'Keterangan hasil perhitungan', '2023-03-16 00:36:28', '2023-03-16 00:36:28');

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
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
INSERT INTO `sub_kriteria` VALUES (30, 'S014', 'Rp > 1000000', 12, '2023-03-15 21:53:06', '2023-03-15 21:53:06');
INSERT INTO `sub_kriteria` VALUES (31, 'S015', 'Rp > 1500000', 12, '2023-03-15 21:53:55', '2023-03-15 21:53:55');

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
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'myprofile123', NULL, '$2y$10$uhMgQdjU87QGqivSwZoMO.y9LEv7Y2WUadjIwjVut4L2DqJYP.q4i', NULL, NULL, NULL, 'i0zBXsQmTCgvQq0JqCjzc3Q27ebZy73mJeiHpuzKBWGNHlqcyo3A0odpbBZL', '2022-11-28 09:21:37', '2023-03-14 23:34:35');
INSERT INTO `users` VALUES (12, 'siswa123', NULL, '$2y$10$V6NGhtRRaDIqE8YSmo4Pbe/LxQp8eD..sRrI.OCcPR0fWKjS0ZXtO', NULL, NULL, NULL, NULL, '2023-03-14 20:51:52', '2023-03-14 23:35:10');
INSERT INTO `users` VALUES (13, 'siswa124', NULL, '$2y$10$I0DkjJjkkhgPJYAbvZspduFOad0Ib3HQDqKx7zL3LpwHbHDbnxCM6', NULL, NULL, NULL, NULL, '2023-03-15 21:46:21', '2023-03-15 21:46:21');
INSERT INTO `users` VALUES (14, 'siswa125', NULL, '$2y$10$gEB6zZg0l0CLs5/Z7gKyiO6QMwtyoAzDWSYuQzcZvwOpuGBleiZO6', NULL, NULL, NULL, NULL, '2023-03-15 21:47:35', '2023-03-15 21:47:35');

SET FOREIGN_KEY_CHECKS = 1;
