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

 Date: 24/11/2020 22:15:54
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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of m_aset
-- ----------------------------
INSERT INTO `m_aset` VALUES (1, '442', 'aset 1231', '3', 1, '2020-11-15 19:10:51', 'admin', '2020-11-24 22:06:05', '1', 14);
INSERT INTO `m_aset` VALUES (2, '123', 'aset 2', '2', 1, '2020-11-15 19:11:36', 'admin', '2020-11-24 19:57:59', '1', 100);
INSERT INTO `m_aset` VALUES (3, '123as53231', 'Aset 1231', '1', 1, '0000-00-00 00:00:00', '2020-11-24 13:19:33', '0000-00-00 00:00:00', '2020-11-24 13:25:33', 0);

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
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

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
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of t_aset_keluar
-- ----------------------------
INSERT INTO `t_aset_keluar` VALUES (1, 442, 2, 1, '2020-11-24 15:59:51', '1', NULL, NULL);
INSERT INTO `t_aset_keluar` VALUES (2, 442, 16, 1, '2020-11-24 16:03:23', '1', NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of t_aset_masuk
-- ----------------------------
INSERT INTO `t_aset_masuk` VALUES (1, 123, 100, 1, '2020-11-24 13:55:18', '1', NULL, NULL);
INSERT INTO `t_aset_masuk` VALUES (3, 12542212, 100, 1, '2020-11-24 13:57:59', '1', NULL, NULL);
INSERT INTO `t_aset_masuk` VALUES (5, 442, 1, 1, '2020-11-24 15:57:35', '1', NULL, NULL);
INSERT INTO `t_aset_masuk` VALUES (6, 442, 1, 1, '2020-11-24 15:57:44', '1', NULL, NULL);
INSERT INTO `t_aset_masuk` VALUES (7, 442, 1, 1, '2020-11-24 15:58:35', '1', NULL, NULL);
INSERT INTO `t_aset_masuk` VALUES (8, 442, 12, 1, '2020-11-24 15:58:47', '1', NULL, NULL);
INSERT INTO `t_aset_masuk` VALUES (9, 442, 2, 1, '2020-11-24 15:59:32', '1', NULL, NULL);
INSERT INTO `t_aset_masuk` VALUES (10, 442, 15, 1, '2020-11-24 16:06:05', '1', NULL, NULL);

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
