/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100413
 Source Host           : localhost:3306
 Source Schema         : db_pendaftaran_toefl

 Target Server Type    : MySQL
 Target Server Version : 100413
 File Encoding         : 65001

 Date: 22/02/2023 14:55:44
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `idadmin` int NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `notelp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idadmin`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'Admin Toefl Pertama', 'admintoefl', 'jIxO1KWTyqXzlFM81Lytxl/Vsapfw4Dv7gPziU+B6gJdsMSef1RMTHjRc7M5qzfYnR94stkrOMPtZcz32Lmd0gBWC4Ac+BA4spX+Dn1lZIYPUAiB2daWpQ==', '089697412015', 'Madiun');

-- ----------------------------
-- Table structure for jadwal
-- ----------------------------
DROP TABLE IF EXISTS `jadwal`;
CREATE TABLE `jadwal`  (
  `idjadwal` int NOT NULL AUTO_INCREMENT,
  `idperiode` int NULL DEFAULT NULL,
  `idjenis` int NULL DEFAULT NULL,
  `nama_jadwal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggal_mulai_daftar` date NULL DEFAULT NULL,
  `tanggal_selesai_daftar` date NULL DEFAULT NULL,
  `tanggal_mulai_pelaksanaan` date NULL DEFAULT NULL,
  `tanggal_selesai_pelaksanaan` date NULL DEFAULT NULL,
  PRIMARY KEY (`idjadwal`) USING BTREE,
  INDEX `idperiode`(`idperiode`) USING BTREE,
  INDEX `idjenis`(`idjenis`) USING BTREE,
  CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`idperiode`) REFERENCES `periode` (`idperiode`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`idjenis`) REFERENCES `jenis` (`idjenis`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jadwal
-- ----------------------------
INSERT INTO `jadwal` VALUES (1, 1, 1, 'jadwal pertama', '2022-10-20', '2022-10-28', '2022-10-25', '2022-10-26');

-- ----------------------------
-- Table structure for jenis
-- ----------------------------
DROP TABLE IF EXISTS `jenis`;
CREATE TABLE `jenis`  (
  `idjenis` int NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `aktif` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idjenis`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jenis
-- ----------------------------
INSERT INTO `jenis` VALUES (1, 'Test Cobas', '1');

-- ----------------------------
-- Table structure for pendaftar
-- ----------------------------
DROP TABLE IF EXISTS `pendaftar`;
CREATE TABLE `pendaftar`  (
  `idpendaftar` int NOT NULL AUTO_INCREMENT,
  `nim` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_pendaftar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `institusi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_telp` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idpendaftar`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pendaftar
-- ----------------------------
INSERT INTO `pendaftar` VALUES (2, '123456789123456', 'Rangga Mukti', 'docs/img/img_siswa/1666692817_27e1431847cdfd4da983.png', 'PGRI MADIUN', '089697410215', 'rangga@gmail.com', 'jIxO1KWTyqXzlFM81Lytxl/Vsapfw4Dv7gPziU+B6gJdsMSef1RMTHjRc7M5qzfYnR94stkrOMPtZcz32Lmd0gBWC4Ac+BA4spX+Dn1lZIYPUAiB2daWpQ==');
INSERT INTO `pendaftar` VALUES (3, '321654987321654', 'mahasiswa ke dua', 'docs/img/img_siswa/1666193255_b0e6eca521da2a36fef5.jpg', 'PGRI MADIUN', '089654741215', 'mahasiswakedua@gmail.com', 'qaNu0/UOQfarLYoWO3tEt6JQxmmrecj6yaqjbNejZLJ+QA1MM3ctaxThdYFkgscLduOJEmuA6vtbWe6EK70oVx75icTw2bG/pO5hejr+bq/qBA07Y3oMxw==');

-- ----------------------------
-- Table structure for periode
-- ----------------------------
DROP TABLE IF EXISTS `periode`;
CREATE TABLE `periode`  (
  `idperiode` int NOT NULL AUTO_INCREMENT,
  `nama_periode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `aktif` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idperiode`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of periode
-- ----------------------------
INSERT INTO `periode` VALUES (1, 'periode pertama', '1');
INSERT INTO `periode` VALUES (3, 'coba ketiga', '1');

-- ----------------------------
-- Table structure for tes
-- ----------------------------
DROP TABLE IF EXISTS `tes`;
CREATE TABLE `tes`  (
  `idtes` int NOT NULL AUTO_INCREMENT,
  `idjadwal` int NULL DEFAULT NULL,
  `idpendaftar` int NULL DEFAULT NULL,
  `bukti_bayar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `valid` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sertifikat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idtes`) USING BTREE,
  INDEX `idjadwal`(`idjadwal`) USING BTREE,
  INDEX `idpendaftar`(`idpendaftar`) USING BTREE,
  CONSTRAINT `tes_ibfk_1` FOREIGN KEY (`idjadwal`) REFERENCES `jadwal` (`idjadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tes_ibfk_2` FOREIGN KEY (`idpendaftar`) REFERENCES `pendaftar` (`idpendaftar`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tes
-- ----------------------------
INSERT INTO `tes` VALUES (2, 1, 2, 'docs/img/img_bukti/1666879942_9108b4489f205a519229.jpg', NULL, NULL);
INSERT INTO `tes` VALUES (3, 1, 3, 'docs/img/img_bukti/1666364962_7cdb504c3ad6e25365ca.jpg', NULL, 'docs/img/img_sertifikat/1666362622_89ad761212f73e9ac29f.png');

SET FOREIGN_KEY_CHECKS = 1;
