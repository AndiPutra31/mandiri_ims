/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 100125
 Source Host           : localhost:3306
 Source Schema         : mandiri_ims

 Target Server Type    : MySQL
 Target Server Version : 100125
 File Encoding         : 65001

 Date: 08/11/2020 19:55:13
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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

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
  `action` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `changedate` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`hist_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

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
     changedate = NOW()
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
