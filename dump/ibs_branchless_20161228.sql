/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : ibs_branchless

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2016-12-28 08:22:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for master_kredit
-- ----------------------------
DROP TABLE IF EXISTS `master_kredit`;
CREATE TABLE `master_kredit` (
  `mk_id` int(11) NOT NULL AUTO_INCREMENT,
  `mk_no_rekening` int(11) DEFAULT NULL,
  `mk_produk` varchar(100) DEFAULT NULL,
  `mk_group1` varchar(255) DEFAULT NULL,
  `mk_kode_group_2` varchar(255) DEFAULT NULL,
  `mk_kode_group_3` varchar(255) DEFAULT NULL,
  `mk_type` varchar(255) DEFAULT NULL,
  `mk_jangka_waktu` varchar(100) DEFAULT NULL,
  `mk_jumlah_angsuran` varchar(10) DEFAULT NULL,
  `mk_tanggal_tempo` date DEFAULT NULL,
  `mk_tanggal_tagih` varchar(10) DEFAULT NULL,
  `mk_periode` varchar(100) DEFAULT NULL,
  `mk_suku_bunga` varchar(100) DEFAULT NULL,
  `mk_jumlah_pinjam` int(11) DEFAULT NULL,
  `mk_adm_lain` varchar(255) DEFAULT NULL,
  `mk_nasabah` varchar(255) DEFAULT NULL,
  `mk_no_alternatif` varchar(255) DEFAULT NULL,
  `mk_kode_integrasi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`mk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_kredit
-- ----------------------------
INSERT INTO `master_kredit` VALUES ('1', '1', '3', '3', '4', '4', '5', '1', '12', '0000-00-00', '1', '2', '1', '3', '23', '2', '1', '2');
INSERT INTO `master_kredit` VALUES ('3', '121312', '21312', '1212', '313a', 'dsdfs', 'fdsfdsf', 'sdfsf', '12', '1900-12-22', '1', 'dsfsf', 'fsf', '0', 'fdfds', '212131', '13121', '2121');
INSERT INTO `master_kredit` VALUES ('4', '121312', '21312', '1212', '313a', 'dsdfs', 'fdsfdsf', 'sdfsf', '12', '0000-00-00', '1', 'dsfsf', 'fsf', '0', 'fdfds', '212131', '13121', '2121');

-- ----------------------------
-- Table structure for master_nasabah
-- ----------------------------
DROP TABLE IF EXISTS `master_nasabah`;
CREATE TABLE `master_nasabah` (
  `mn_id` int(11) NOT NULL AUTO_INCREMENT,
  `mn_id_nasabah` int(11) DEFAULT NULL,
  `mn_nama_nasabah` varchar(225) DEFAULT NULL,
  `mn_nama_ibu_kandung` varchar(225) DEFAULT NULL,
  `mn_alamat_nasabah` text,
  `mn_jenis_identitas` varchar(100) DEFAULT NULL,
  `mn_no_alternatif` int(11) DEFAULT NULL,
  `mn_nama_alias` varchar(100) DEFAULT NULL,
  `mn_jekel` varchar(10) DEFAULT NULL,
  `mn_tempat_lahir` varchar(100) DEFAULT NULL,
  `mn_tanggal_lahir` date DEFAULT NULL,
  `mn_no_rekening` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`mn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_nasabah
-- ----------------------------
INSERT INTO `master_nasabah` VALUES ('2', '0', 'fdfdfd', '', '', 'sim', '0', '', 'L', '', '2010-12-31', null);
INSERT INTO `master_nasabah` VALUES ('3', '0', 'fdfdf', '', '', 'sim', '0', '', 'L', '', '1900-12-06', null);
INSERT INTO `master_nasabah` VALUES ('4', '0', 's', '', 'fdfdsf', 'sim', '0', '', 'L', '', '0000-00-00', null);
INSERT INTO `master_nasabah` VALUES ('5', '0', 's', 'res', 'Jl. Dempo 7 nO.81', 'sim', '0', '', 'L', '', '0000-00-00', null);
INSERT INTO `master_nasabah` VALUES ('6', '2', '1', '', '', 'sim', '0', '', 'L', '', '0000-00-00', null);
INSERT INTO `master_nasabah` VALUES ('7', '3', '2', '', '', 'sim', '0', '', 'L', '', '0000-00-00', null);
INSERT INTO `master_nasabah` VALUES ('8', '0', 'sasa', 'sasa', 'sasasasa', 'ktp', '0', 'asasasasas', 'L', 'asasa', '2016-11-28', '0901010');
INSERT INTO `master_nasabah` VALUES ('9', '12345', 'Adrian Bumi Putra', 'Laura ', 'Jl.Dempo 7 No.81 Rt.03 Rw.10', 'ktp', '2147483647', 'Mr. Comedian', 'L', 'Jakarta', '2016-12-31', '0901010');

-- ----------------------------
-- Table structure for master_tabungan
-- ----------------------------
DROP TABLE IF EXISTS `master_tabungan`;
CREATE TABLE `master_tabungan` (
  `mt_id` int(11) NOT NULL AUTO_INCREMENT,
  `mt_id_nasabah` int(11) DEFAULT NULL,
  `mt_integrasi` varchar(255) DEFAULT NULL,
  `mt_produk` varchar(255) DEFAULT NULL,
  `mt_pemilik` varchar(255) DEFAULT NULL,
  `mt_group1` varchar(255) DEFAULT NULL,
  `mt_group2` varchar(255) DEFAULT NULL,
  `mt_group3` varchar(255) DEFAULT NULL,
  `mt_saldo_minimum` varchar(255) DEFAULT NULL,
  `mt_setoran_minimum` varchar(255) DEFAULT NULL,
  `mt_no_rekening` int(11) DEFAULT NULL,
  PRIMARY KEY (`mt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_tabungan
-- ----------------------------
INSERT INTO `master_tabungan` VALUES ('5', '121', '2', '2', '121', '4', '5', '6', 'Rp. 50000', 'Rp. 25000', '123');
INSERT INTO `master_tabungan` VALUES ('6', '2', '1', 'Nasi Goreng', '2', '4', '5', '6', 'Rp. 50000', 'Rp. 100000', '123');
INSERT INTO `master_tabungan` VALUES ('7', '3', '1', '2', '3', '4', '5', '6', 'Rp. 25000', 'Rp. 25000', '123');
INSERT INTO `master_tabungan` VALUES ('8', '2', '1', '2', '3', '4', '5', '6', 'Rp. 25000', 'Rp. 25000', '123');
INSERT INTO `master_tabungan` VALUES ('9', '4', '1', '2', '4', '4', '5', '6', 'Rp. 25000', 'Rp. 25000', '123');
INSERT INTO `master_tabungan` VALUES ('10', '1092109201', 'lkskdslkds', 'Supermie', 'Ahong', '121', '1213', '1312121', 'Rp. 25000', 'Rp. 25000', '787878');

-- ----------------------------
-- Table structure for tr_setor_tunai
-- ----------------------------
DROP TABLE IF EXISTS `tr_setor_tunai`;
CREATE TABLE `tr_setor_tunai` (
  `st_id` int(11) NOT NULL AUTO_INCREMENT,
  `st_no_rekening` int(20) NOT NULL,
  `st_jumlah_setor` decimal(18,2) NOT NULL DEFAULT '0.00',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`st_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tr_setor_tunai
-- ----------------------------
INSERT INTO `tr_setor_tunai` VALUES ('1', '1001001', '1000.00', '2016-12-23 11:35:19', '1');
INSERT INTO `tr_setor_tunai` VALUES ('2', '1', '100000.00', '2016-12-23 11:50:42', '1');
INSERT INTO `tr_setor_tunai` VALUES ('3', '1001001', '500000.00', '2016-12-23 11:50:53', '1');
INSERT INTO `tr_setor_tunai` VALUES ('4', '1001001', '500000.00', '2016-12-23 11:51:01', '1');
INSERT INTO `tr_setor_tunai` VALUES ('5', '1', '50000.00', '2016-12-23 11:52:09', '1');
INSERT INTO `tr_setor_tunai` VALUES ('6', '1001001', '20000.00', '2016-12-23 11:54:52', '1');
INSERT INTO `tr_setor_tunai` VALUES ('7', '1001001', '500000.00', '2016-12-23 12:14:47', '1');
INSERT INTO `tr_setor_tunai` VALUES ('8', '1', '2500.00', '2016-12-24 11:05:12', '1');
INSERT INTO `tr_setor_tunai` VALUES ('9', '0', '3213131.00', '2016-12-24 11:05:25', '1');

-- ----------------------------
-- Table structure for tr_tarik_tunai
-- ----------------------------
DROP TABLE IF EXISTS `tr_tarik_tunai`;
CREATE TABLE `tr_tarik_tunai` (
  `tt_id` int(11) NOT NULL,
  `tt_no_rekening` varchar(20) NOT NULL,
  `tt_jumlah_tarik` decimal(18,2) NOT NULL DEFAULT '0.00',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tr_tarik_tunai
-- ----------------------------
INSERT INTO `tr_tarik_tunai` VALUES ('1', '001001001', '21000.00', '2016-12-23 11:57:18', '1');
INSERT INTO `tr_tarik_tunai` VALUES ('0', '1', '12.00', '2016-12-24 12:37:59', '1');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_email` varchar(100) DEFAULT NULL,
  `usr_name` varchar(100) NOT NULL,
  `usr_password` varchar(256) NOT NULL,
  `usr_fullname` varchar(256) NOT NULL,
  `usr_avatar_path` varchar(256) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `usr_remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`usr_id`),
  UNIQUE KEY `usr_name` (`usr_name`),
  UNIQUE KEY `usr_email` (`usr_email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'candrasetiadiwahyu@gmail.com', 'candra', '9f1964f992659f9fcafdf07bed0e47fd', 'candra setiadi wahyu', null, '2016-12-13 00:00:00', null, '2016-12-26 00:36:38', null, 'active', '17a80ef17b1fc522a692dd3ec3224fec');
INSERT INTO `users` VALUES ('3', 'safril@kct.co.id', 'safril22', '81dc9bdb52d04dc20036dbd8313ed055', '', null, '0000-00-00 00:00:00', null, null, null, 'active', null);
