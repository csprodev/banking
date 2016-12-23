/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : ibs_branchless

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2016-12-23 23:22:23
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_kredit
-- ----------------------------
INSERT INTO `master_kredit` VALUES ('1', '1', '3', '3', '4', '4', '5', '1', '12', '0000-00-00', '1', '2', '1', '3', '23', '2', '1', '2');
INSERT INTO `master_kredit` VALUES ('2', '0', '', '', '', '', '', '', '12', '0000-00-00', '1', '', '', '0', '', '', '', '');
