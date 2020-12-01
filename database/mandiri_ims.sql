/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50621
 Source Host           : localhost:3306
 Source Schema         : mandiri_ims

 Target Server Type    : MySQL
 Target Server Version : 50621
 File Encoding         : 65001

 Date: 01/12/2020 21:10:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for m_aset
-- ----------------------------
DROP TABLE IF EXISTS `m_aset`;
CREATE TABLE `m_aset`  (
  `aset_id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_aset` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_aset` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis_aset` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_aset` tinyint(1) NULL DEFAULT 1,
  `created_date` datetime(0) NULL DEFAULT NULL,
  `created_by` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `last_update_date` datetime(0) NULL DEFAULT NULL,
  `last_update_by` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_aset` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`aset_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_aset
-- ----------------------------
INSERT INTO `m_aset` VALUES (5, '14122121101', 'Aplikasi Setoran', '1', 1, '0000-00-00 00:00:00', '2020-11-30 16:06:06', '2020-12-01 20:59:35', '1', 93);
INSERT INTO `m_aset` VALUES (6, '14122121102', 'Formulir Penarikan', '1', 1, '0000-00-00 00:00:00', '2020-11-30 16:08:00', '2020-12-01 20:58:40', '1', 10);
INSERT INTO `m_aset` VALUES (9, '14122121103', 'Formulir Multi Pembayaran', '1', 1, '0000-00-00 00:00:00', '2020-12-01 14:51:43', '0000-00-00 00:00:00', '2020-12-01 14:53:01', 0);
INSERT INTO `m_aset` VALUES (10, '14122121104', 'Formulir Pembayaran Kartu Kredit', '1', 1, '0000-00-00 00:00:00', '2020-12-01 14:53:38', '2020-12-01 20:59:12', '1', 34);
INSERT INTO `m_aset` VALUES (11, '14122121105', 'Formulir Walk In Customer', '1', 1, '0000-00-00 00:00:00', '2020-12-01 14:55:09', '2020-12-01 21:09:54', '1', 166);

-- ----------------------------
-- Table structure for m_aset_hist
-- ----------------------------
DROP TABLE IF EXISTS `m_aset_hist`;
CREATE TABLE `m_aset_hist`  (
  `hist_id` int(11) NOT NULL AUTO_INCREMENT,
  `aset_id` int(11) NOT NULL,
  `kode_aset` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_aset` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis_aset` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_aset` tinyint(1) NULL DEFAULT 1,
  `created_date` datetime(0) NULL DEFAULT NULL,
  `created_by` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `last_update_date` datetime(0) NULL DEFAULT NULL,
  `last_update_by` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty_aset` int(11) NULL DEFAULT NULL,
  `action` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `changedate` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`hist_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 53 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_aset_hist
-- ----------------------------
INSERT INTO `m_aset_hist` VALUES (1, 3, '123as53231', 'Aset 1231', '3', 1, '0000-00-00 00:00:00', '2020-11-24 13:19:33', NULL, NULL, 0, 'update', '2020-11-24 19:20:44');
INSERT INTO `m_aset_hist` VALUES (2, 3, '123as53231', 'Aset 1231', '4', 1, '0000-00-00 00:00:00', '2020-11-24 13:19:33', '0000-00-00 00:00:00', '2020-11-24 13:20:44', 0, 'update', '2020-11-24 19:20:51');
INSERT INTO `m_aset_hist` VALUES (3, 3, '123as53231', 'Aset 1231', '2', 1, '0000-00-00 00:00:00', '2020-11-24 13:19:33', '0000-00-00 00:00:00', '2020-11-24 13:20:51', 0, 'update', '2020-11-24 19:20:55');
INSERT INTO `m_aset_hist` VALUES (4, 3, '123as53231', 'Aset 1231', '1', 1, '0000-00-00 00:00:00', '2020-11-24 13:19:33', '0000-00-00 00:00:00', '2020-11-24 13:20:55', 0, 'update', '2020-11-24 19:21:01');
INSERT INTO `m_aset_hist` VALUES (5, 3, '123as53231', 'Aset 1231', '', 1, '0000-00-00 00:00:00', '2020-11-24 13:19:33', '0000-00-00 00:00:00', '2020-11-24 13:21:01', 0, 'update', '2020-11-24 19:23:27');
INSERT INTO `m_aset_hist` VALUES (6, 3, '123as53231', 'Aset 1231', '', 1, '0000-00-00 00:00:00', '2020-11-24 13:19:33', '0000-00-00 00:00:00', '2020-11-24 13:23:27', 0, 'update', '2020-11-24 19:25:33');
INSERT INTO `m_aset_hist` VALUES (7, 1, '123456719', 'aset 1', '1', 1, '2020-11-15 19:10:51', 'admin', NULL, NULL, 0, 'update', '2020-11-24 19:35:15');
INSERT INTO `m_aset_hist` VALUES (8, 1, '123456719', 'aset 1', '1', 0, '2020-11-15 19:10:51', 'admin', '0000-00-00 00:00:00', '2020-11-24 13:35:15', 0, 'update', '2020-11-24 19:35:26');
INSERT INTO `m_aset_hist` VALUES (9, 2, '12542212', 'aset 2', '2', 1, '2020-11-15 19:11:36', 'admin', NULL, NULL, 0, 'update', '2020-11-24 19:57:59');
INSERT INTO `m_aset_hist` VALUES (10, 2, '12542212', 'aset 2', '2', 1, '2020-11-15 19:11:36', 'admin', '2020-11-24 19:57:59', '1', 100, 'update', '2020-11-24 20:22:57');
INSERT INTO `m_aset_hist` VALUES (11, 1, '442', 'aset 1231', '3', 1, '2020-11-15 19:10:51', 'admin', '0000-00-00 00:00:00', '2020-11-24 13:35:26', 0, 'update', '2020-11-24 21:57:35');
INSERT INTO `m_aset_hist` VALUES (12, 1, '442', 'aset 1231', '3', 1, '2020-11-15 19:10:51', 'admin', '2020-11-24 21:57:35', '1', 1, 'update', '2020-11-24 21:57:44');
INSERT INTO `m_aset_hist` VALUES (13, 1, '442', 'aset 1231', '3', 1, '2020-11-15 19:10:51', 'admin', '2020-11-24 21:57:44', '1', 2, 'update', '2020-11-24 21:58:35');
INSERT INTO `m_aset_hist` VALUES (14, 1, '442', 'aset 1231', '3', 1, '2020-11-15 19:10:51', 'admin', '2020-11-24 21:58:35', '1', 3, 'update', '2020-11-24 21:58:47');
INSERT INTO `m_aset_hist` VALUES (15, 1, '442', 'aset 1231', '3', 1, '2020-11-15 19:10:51', 'admin', '2020-11-24 21:58:47', '1', 15, 'update', '2020-11-24 21:59:32');
INSERT INTO `m_aset_hist` VALUES (16, 1, '442', 'aset 1231', '3', 1, '2020-11-15 19:10:51', 'admin', '2020-11-24 21:59:32', '1', 17, 'update', '2020-11-24 21:59:51');
INSERT INTO `m_aset_hist` VALUES (17, 1, '442', 'aset 1231', '3', 1, '2020-11-15 19:10:51', 'admin', '2020-11-24 21:59:51', '1', 15, 'update', '2020-11-24 22:03:23');
INSERT INTO `m_aset_hist` VALUES (18, 1, '442', 'aset 1231', '3', 1, '2020-11-15 19:10:51', 'admin', '2020-11-24 22:03:23', '1', -1, 'update', '2020-11-24 22:06:05');
INSERT INTO `m_aset_hist` VALUES (19, 1, '442', 'aset 1231', '3', 1, '2020-11-15 19:10:51', 'admin', '2020-11-24 22:06:05', '1', 14, 'update', '2020-11-29 14:32:20');
INSERT INTO `m_aset_hist` VALUES (20, 3, '123as53231', 'Aset 1231', '1', 1, '0000-00-00 00:00:00', '2020-11-24 13:19:33', '0000-00-00 00:00:00', '2020-11-24 13:25:33', 0, 'update', '2020-11-29 14:32:23');
INSERT INTO `m_aset_hist` VALUES (21, 4, '', '', '1', 1, '0000-00-00 00:00:00', '2020-11-24 13:26:42', NULL, NULL, 0, 'update', '2020-11-29 14:32:25');
INSERT INTO `m_aset_hist` VALUES (22, 3, '123as53231', 'Aset', '1', 1, '0000-00-00 00:00:00', '2020-11-24 13:19:33', '0000-00-00 00:00:00', '2020-11-24 13:25:33', 0, 'update', '2020-11-29 14:32:27');
INSERT INTO `m_aset_hist` VALUES (23, 4, '', '3', '1', 1, '0000-00-00 00:00:00', '2020-11-24 13:26:42', NULL, NULL, 0, 'update', '2020-11-29 14:32:34');
INSERT INTO `m_aset_hist` VALUES (24, 1, '442', 'Aset 1', '3', 1, '2020-11-15 19:10:51', 'admin', '2020-11-24 22:06:05', '1', 14, 'update', '2020-11-29 23:42:48');
INSERT INTO `m_aset_hist` VALUES (25, 1, '442', 'Aset 1', '1', 1, '2020-11-15 19:10:51', 'admin', '2020-11-24 22:06:05', '1', 14, 'update', '2020-11-30 21:31:02');
INSERT INTO `m_aset_hist` VALUES (26, 1, '442', 'Aset 1', '1', 1, '2020-11-15 19:10:51', 'admin', '2020-11-30 21:31:02', '1', 15, 'update', '2020-11-30 21:42:32');
INSERT INTO `m_aset_hist` VALUES (27, 2, '123', 'aset 2', '2', 1, '2020-11-15 19:11:36', 'admin', '2020-11-24 19:57:59', '1', 100, 'update', '2020-11-30 21:46:28');
INSERT INTO `m_aset_hist` VALUES (28, 1, '442', 'Aset 1', '1', 1, '2020-11-15 19:10:51', 'admin', '2020-11-30 21:42:32', '1', 16, 'update', '2020-11-30 21:48:32');
INSERT INTO `m_aset_hist` VALUES (29, 2, '123', 'aset 2', '2', 1, '2020-11-15 19:11:36', 'admin', '2020-11-30 21:46:28', '1', 101, 'update', '2020-11-30 21:48:35');
INSERT INTO `m_aset_hist` VALUES (30, 2, '123', 'aset 2', '2', 1, '2020-11-15 19:11:36', 'admin', '2020-11-30 21:46:28', '1', 0, 'update', '2020-11-30 21:48:53');
INSERT INTO `m_aset_hist` VALUES (31, 1, '442', 'Aset 1', '1', 1, '2020-11-15 19:10:51', 'admin', '2020-11-30 21:42:32', '1', 0, 'update', '2020-11-30 21:49:00');
INSERT INTO `m_aset_hist` VALUES (32, 3, '123as53231', 'Aset 3', '1', 1, '0000-00-00 00:00:00', '2020-11-24 13:19:33', '0000-00-00 00:00:00', '2020-11-24 13:25:33', 0, 'update', '2020-11-30 21:49:21');
INSERT INTO `m_aset_hist` VALUES (33, 1, '442', 'Aset 1', '1', 1, '2020-11-15 19:10:51', 'admin', '2020-11-30 21:49:00', '1', 105, 'update', '2020-12-01 15:56:54');
INSERT INTO `m_aset_hist` VALUES (34, 1, '442', 'Aset 1', '1', 1, '2020-11-15 19:10:51', 'admin', '2020-12-01 15:56:54', '1', 106, 'update', '2020-12-01 17:20:46');
INSERT INTO `m_aset_hist` VALUES (35, 8, '124156122330', 'coba1', '1', 1, '0000-00-00 00:00:00', '2020-12-01 12:11:40', NULL, NULL, 0, 'update', '2020-12-01 18:11:49');
INSERT INTO `m_aset_hist` VALUES (36, 9, '14122121103', 'Formulir Multi Pembayaran', '1', 1, '0000-00-00 00:00:00', '2020-12-01 14:51:43', NULL, NULL, 0, 'update', '2020-12-01 20:53:01');
INSERT INTO `m_aset_hist` VALUES (37, 1, '442', 'Aset 1', '1', 0, '2020-11-15 19:10:51', 'admin', '0000-00-00 00:00:00', '2020-12-01 11:20:46', 106, 'delete', '2020-12-01 20:57:03');
INSERT INTO `m_aset_hist` VALUES (38, 2, '123', 'aset 2', '2', 1, '2020-11-15 19:11:36', 'admin', '2020-11-30 21:48:53', '1', 100, 'delete', '2020-12-01 20:57:03');
INSERT INTO `m_aset_hist` VALUES (39, 3, '123as53231', 'Aset 3', '1', 1, '0000-00-00 00:00:00', '2020-11-24 13:19:33', '2020-11-30 21:49:21', '1', 4, 'delete', '2020-12-01 20:57:04');
INSERT INTO `m_aset_hist` VALUES (40, 4, '', 'Aset 4', '1', 1, '0000-00-00 00:00:00', '2020-11-24 13:26:42', NULL, NULL, 0, 'delete', '2020-12-01 20:57:04');
INSERT INTO `m_aset_hist` VALUES (41, 7, '123124', '1', '2', 1, '0000-00-00 00:00:00', '2020-11-30 16:20:54', NULL, NULL, 0, 'delete', '2020-12-01 20:57:09');
INSERT INTO `m_aset_hist` VALUES (42, 8, '124156122330', 'coba1', '1', 0, '0000-00-00 00:00:00', '2020-12-01 12:11:40', '0000-00-00 00:00:00', '2020-12-01 12:11:49', 0, 'delete', '2020-12-01 20:57:09');
INSERT INTO `m_aset_hist` VALUES (43, 5, '14122121101', 'Aplikasi Setoran', '1', 1, '0000-00-00 00:00:00', '2020-11-30 16:06:06', NULL, NULL, 0, 'update', '2020-12-01 20:57:52');
INSERT INTO `m_aset_hist` VALUES (44, 10, '14122121104', 'Formulir Pembayaran Kartu Kredit', '1', 1, '0000-00-00 00:00:00', '2020-12-01 14:53:38', NULL, NULL, 0, 'update', '2020-12-01 20:57:59');
INSERT INTO `m_aset_hist` VALUES (45, 11, '14122121105', 'Formulir Walk In Customer', '1', 1, '0000-00-00 00:00:00', '2020-12-01 14:55:09', NULL, NULL, 0, 'update', '2020-12-01 20:58:09');
INSERT INTO `m_aset_hist` VALUES (46, 10, '14122121104', 'Formulir Pembayaran Kartu Kredit', '1', 1, '0000-00-00 00:00:00', '2020-12-01 14:53:38', '2020-12-01 20:57:59', '1', 20, 'update', '2020-12-01 20:58:18');
INSERT INTO `m_aset_hist` VALUES (47, 6, '14122121102', 'Formulir Penarikan', '1', 1, '0000-00-00 00:00:00', '2020-11-30 16:08:00', NULL, NULL, 0, 'update', '2020-12-01 20:58:30');
INSERT INTO `m_aset_hist` VALUES (48, 6, '14122121102', 'Formulir Penarikan', '1', 1, '0000-00-00 00:00:00', '2020-11-30 16:08:00', '2020-12-01 20:58:30', '1', 9, 'update', '2020-12-01 20:58:40');
INSERT INTO `m_aset_hist` VALUES (49, 10, '14122121104', 'Formulir Pembayaran Kartu Kredit', '1', 1, '0000-00-00 00:00:00', '2020-12-01 14:53:38', '2020-12-01 20:58:18', '1', 36, 'update', '2020-12-01 20:59:12');
INSERT INTO `m_aset_hist` VALUES (50, 5, '14122121101', 'Aplikasi Setoran', '1', 1, '0000-00-00 00:00:00', '2020-11-30 16:06:06', '2020-12-01 20:57:52', '1', 105, 'update', '2020-12-01 20:59:27');
INSERT INTO `m_aset_hist` VALUES (51, 5, '14122121101', 'Aplikasi Setoran', '1', 1, '0000-00-00 00:00:00', '2020-11-30 16:06:06', '2020-12-01 20:59:27', '1', 95, 'update', '2020-12-01 20:59:35');
INSERT INTO `m_aset_hist` VALUES (52, 11, '14122121105', 'Formulir Walk In Customer', '1', 1, '0000-00-00 00:00:00', '2020-12-01 14:55:09', '2020-12-01 20:58:09', '1', 168, 'update', '2020-12-01 21:09:54');

-- ----------------------------
-- Table structure for m_jenis_aset
-- ----------------------------
DROP TABLE IF EXISTS `m_jenis_aset`;
CREATE TABLE `m_jenis_aset`  (
  `jenis_aset_id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_aset_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis_aset_status` smallint(1) NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT NULL,
  `created_by` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `last_updated_date` datetime(0) NULL DEFAULT NULL,
  `last_updated_by` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`jenis_aset_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of m_jenis_aset
-- ----------------------------
INSERT INTO `m_jenis_aset` VALUES (1, 'Formulir', 1, '2020-11-30 20:16:01', '1', NULL, NULL);
INSERT INTO `m_jenis_aset` VALUES (2, 'ATK', 1, '2020-11-30 20:16:01', '1', NULL, NULL);
INSERT INTO `m_jenis_aset` VALUES (3, 'Surat Berharga', 1, '2020-11-30 20:16:01', '1', NULL, NULL);

-- ----------------------------
-- Table structure for m_user
-- ----------------------------
DROP TABLE IF EXISTS `m_user`;
CREATE TABLE `m_user`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_pass` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pegawai_nama` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nip` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT NULL,
  `role` smallint(10) NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `last_update_date` datetime(0) NULL DEFAULT NULL,
  `last_updated_by` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_user
-- ----------------------------
INSERT INTO `m_user` VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '1223141', 1, 1, '2020-11-15 10:39:14', 'admin', NULL, NULL);
INSERT INTO `m_user` VALUES (16, 'admin2', '21232f297a57a5a743894a0e4a801fc3', 'admin2', '123411', 1, 0, '0000-00-00 00:00:00', '2020-11-24 10:18:34', '0000-00-00 00:00:00', '2020-11-24 11:37:26');
INSERT INTO `m_user` VALUES (17, 'admin3', '21232f297a57a5a743894a0e4a801fc3', 'admin3', '123124', 0, 0, '0000-00-00 00:00:00', '2020-11-24 11:23:04', '0000-00-00 00:00:00', '2020-11-24 11:44:36');
INSERT INTO `m_user` VALUES (18, 'andi', 'ce0e5bf55e4f71749eade7a8b95c4e46', 'andi', '123558', 1, 1, '0000-00-00 00:00:00', '2020-11-24 11:46:49', '0000-00-00 00:00:00', '2020-11-24 11:46:55');
INSERT INTO `m_user` VALUES (19, 'a', '0cc175b9c0f1b6a831c399e269772661', 'a', '1', 1, 0, '0000-00-00 00:00:00', '2020-11-24 11:50:51', NULL, NULL);
INSERT INTO `m_user` VALUES (20, '1', '202cb962ac59075b964b07152d234b70', '1231', '12414', 1, 0, '0000-00-00 00:00:00', '2020-11-24 11:50:59', NULL, NULL);
INSERT INTO `m_user` VALUES (21, '123124', 'b12251c1510bbc4d1010b9baf082f2d1', '124124', '124124', 1, 0, '0000-00-00 00:00:00', '2020-11-24 11:51:05', NULL, NULL);
INSERT INTO `m_user` VALUES (22, '12441', '8542516f8870173d7d1daba1daaaf0a1', '124124', '12412', 1, 0, '0000-00-00 00:00:00', '2020-11-24 11:51:14', NULL, NULL);
INSERT INTO `m_user` VALUES (23, '123123131', '220466675e31b9d20c051d5e57974150', '1231231', '111111', 1, 0, '0000-00-00 00:00:00', '2020-11-24 11:51:22', NULL, NULL);
INSERT INTO `m_user` VALUES (24, '111111', 'b0baee9d279d34fa1dfd71aadb908c3f', '1111', '1111', 1, 0, '0000-00-00 00:00:00', '2020-11-24 11:51:30', NULL, NULL);
INSERT INTO `m_user` VALUES (25, '12', 'c20ad4d76fe97759aa27a0c99bff6710', '12', '12', 1, 0, '0000-00-00 00:00:00', '2020-11-24 11:51:37', NULL, NULL);

-- ----------------------------
-- Table structure for t_aset_keluar
-- ----------------------------
DROP TABLE IF EXISTS `t_aset_keluar`;
CREATE TABLE `t_aset_keluar`  (
  `t_aset_keluar_id` int(11) NOT NULL AUTO_INCREMENT,
  `aset_id` int(11) NULL DEFAULT NULL,
  `aset_qty` float NULL DEFAULT NULL,
  `status` smallint(1) NULL DEFAULT 1,
  `created_date` datetime(0) NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `last_update_date` datetime(0) NULL DEFAULT NULL,
  `last_update_by` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`t_aset_keluar_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of t_aset_keluar
-- ----------------------------
INSERT INTO `t_aset_keluar` VALUES (1, 10, 2, 1, '2020-12-01 14:59:12', '1', NULL, NULL);
INSERT INTO `t_aset_keluar` VALUES (2, 5, 10, 1, '2020-12-01 14:59:27', '1', NULL, NULL);
INSERT INTO `t_aset_keluar` VALUES (3, 5, 2, 1, '2020-12-01 14:59:35', '1', NULL, NULL);
INSERT INTO `t_aset_keluar` VALUES (4, 11, 2, 1, '2020-12-01 15:09:52', '1', NULL, NULL);

-- ----------------------------
-- Table structure for t_aset_masuk
-- ----------------------------
DROP TABLE IF EXISTS `t_aset_masuk`;
CREATE TABLE `t_aset_masuk`  (
  `t_aset_masuk_id` int(11) NOT NULL AUTO_INCREMENT,
  `aset_id` int(11) NULL DEFAULT NULL,
  `aset_qty` float NULL DEFAULT NULL,
  `status` smallint(1) NULL DEFAULT 1,
  `created_date` datetime(0) NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `last_update_date` datetime(0) NULL DEFAULT NULL,
  `last_update_by` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`t_aset_masuk_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of t_aset_masuk
-- ----------------------------
INSERT INTO `t_aset_masuk` VALUES (1, 5, 105, 1, '2020-12-01 14:57:52', '1', NULL, NULL);
INSERT INTO `t_aset_masuk` VALUES (2, 10, 20, 1, '2020-12-01 14:57:59', '1', NULL, NULL);
INSERT INTO `t_aset_masuk` VALUES (3, 11, 168, 1, '2020-12-01 14:58:09', '1', NULL, NULL);
INSERT INTO `t_aset_masuk` VALUES (4, 10, 16, 1, '2020-12-01 14:58:18', '1', NULL, NULL);
INSERT INTO `t_aset_masuk` VALUES (5, 6, 9, 1, '2020-12-01 14:58:30', '1', NULL, NULL);
INSERT INTO `t_aset_masuk` VALUES (6, 6, 1, 1, '2020-12-01 14:58:40', '1', NULL, NULL);

-- ----------------------------
-- Table structure for t_report
-- ----------------------------
DROP TABLE IF EXISTS `t_report`;
CREATE TABLE `t_report`  (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `report_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`report_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of t_report
-- ----------------------------

-- ----------------------------
-- Triggers structure for table m_aset
-- ----------------------------
DROP TRIGGER IF EXISTS `before_aset_update`;
delimiter ;;
CREATE TRIGGER `before_aset_update` BEFORE UPDATE ON `m_aset` FOR EACH ROW INSERT INTO m_aset_hist
 SET action = 'update',
		 aset_id = OLD.aset_id,
     kode_aset=OLD. kode_aset,
		 nama_aset=OLD. nama_aset,
		 jenis_aset=OLD. jenis_aset,
		 status_aset=OLD. status_aset,
		 created_date=OLD. created_date,
		 created_by=OLD. created_by,
		 last_update_date=OLD. last_update_date,
		 last_update_by=OLD. last_update_by,
		 qty_aset=OLD. qty_aset,
     changedate = NOW()
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table m_aset
-- ----------------------------
DROP TRIGGER IF EXISTS `before_aset_delete`;
delimiter ;;
CREATE TRIGGER `before_aset_delete` BEFORE DELETE ON `m_aset` FOR EACH ROW INSERT INTO m_aset_hist
 SET action = 'delete',
		 aset_id = OLD.aset_id,
     kode_aset=OLD. kode_aset,
		 nama_aset=OLD. nama_aset,
		 jenis_aset=OLD. jenis_aset,
		 status_aset=OLD. status_aset,
		 created_date=OLD. created_date,
		 created_by=OLD. created_by,
		 last_update_date=OLD. last_update_date,
		 last_update_by=OLD. last_update_by,
		 qty_aset=OLD. qty_aset,
     changedate = NOW()
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
