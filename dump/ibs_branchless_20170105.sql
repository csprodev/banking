/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : ibs_branchless

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2017-01-05 07:39:56
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_kredit
-- ----------------------------

-- ----------------------------
-- Table structure for master_kredit_log
-- ----------------------------
DROP TABLE IF EXISTS `master_kredit_log`;
CREATE TABLE `master_kredit_log` (
  `mkl_id` int(11) NOT NULL AUTO_INCREMENT,
  `mkl_action` varchar(100) DEFAULT NULL,
  `mkl_date` datetime DEFAULT NULL,
  `mk_id` int(11) DEFAULT NULL,
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
  PRIMARY KEY (`mkl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_kredit_log
-- ----------------------------

-- ----------------------------
-- Table structure for master_nasabah
-- ----------------------------
DROP TABLE IF EXISTS `master_nasabah`;
CREATE TABLE `master_nasabah` (
  `mn_id` int(11) NOT NULL AUTO_INCREMENT,
  `mn_id_nasabah` varchar(100) DEFAULT NULL,
  `mn_nama_nasabah` varchar(225) DEFAULT NULL,
  `mn_nama_ibu_kandung` varchar(225) DEFAULT NULL,
  `mn_alamat_nasabah` text,
  `mn_jenis_identitas` varchar(100) DEFAULT NULL,
  `mn_no_alternatif` varchar(100) DEFAULT NULL,
  `mn_nama_alias` varchar(100) DEFAULT NULL,
  `mn_jekel` varchar(10) DEFAULT NULL,
  `mn_tempat_lahir` varchar(100) DEFAULT NULL,
  `mn_tanggal_lahir` date DEFAULT NULL,
  `mn_no_rekening` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`mn_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_nasabah
-- ----------------------------

-- ----------------------------
-- Table structure for master_nasabah_log
-- ----------------------------
DROP TABLE IF EXISTS `master_nasabah_log`;
CREATE TABLE `master_nasabah_log` (
  `mnl_id` int(11) NOT NULL AUTO_INCREMENT,
  `mnl_action` varchar(100) DEFAULT NULL,
  `mnl_date` date DEFAULT NULL,
  `mn_id` int(11) DEFAULT NULL,
  `mn_id_nasabah` varchar(100) DEFAULT NULL,
  `mn_nama_nasabah` varchar(225) DEFAULT NULL,
  `mn_nama_ibu_kandung` varchar(225) DEFAULT NULL,
  `mn_alamat_nasabah` text,
  `mn_jenis_identitas` varchar(100) DEFAULT NULL,
  `mn_no_alternatif` varchar(100) DEFAULT NULL,
  `mn_nama_alias` varchar(100) DEFAULT NULL,
  `mn_jekel` varchar(10) DEFAULT NULL,
  `mn_tempat_lahir` varchar(100) DEFAULT NULL,
  `mn_tanggal_lahir` date DEFAULT NULL,
  `mn_no_rekening` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`mnl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_nasabah_log
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_tabungan
-- ----------------------------

-- ----------------------------
-- Table structure for master_tabungan_log
-- ----------------------------
DROP TABLE IF EXISTS `master_tabungan_log`;
CREATE TABLE `master_tabungan_log` (
  `mtl_id` int(11) NOT NULL AUTO_INCREMENT,
  `mtl_action` varchar(255) DEFAULT NULL,
  `mtl_date` datetime DEFAULT NULL,
  `mtl_user` varchar(255) DEFAULT NULL,
  `mt_id` int(11) DEFAULT NULL,
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
  PRIMARY KEY (`mtl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of master_tabungan_log
-- ----------------------------

-- ----------------------------
-- Table structure for ref_kode_perkiraan
-- ----------------------------
DROP TABLE IF EXISTS `ref_kode_perkiraan`;
CREATE TABLE `ref_kode_perkiraan` (
  `rkp_id` int(11) NOT NULL AUTO_INCREMENT,
  `rkp_kode` varchar(255) DEFAULT NULL,
  `rkp_nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`rkp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ref_kode_perkiraan
-- ----------------------------
INSERT INTO `ref_kode_perkiraan` VALUES ('1', '123', 'kas umi');
INSERT INTO `ref_kode_perkiraan` VALUES ('2', '124', 'kas abi');
INSERT INTO `ref_kode_perkiraan` VALUES ('3', '125', 'kas maymunah');
INSERT INTO `ref_kode_perkiraan` VALUES ('4', '126', 'kas siti ');
INSERT INTO `ref_kode_perkiraan` VALUES ('5', '127', 'kas susi');
INSERT INTO `ref_kode_perkiraan` VALUES ('6', '128', 'kas kami');

-- ----------------------------
-- Table structure for transaksi_jurnal
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_jurnal`;
CREATE TABLE `transaksi_jurnal` (
  `tj_id` int(11) NOT NULL AUTO_INCREMENT,
  `tj_kode_perkiraan` varchar(255) DEFAULT NULL,
  `tj_nama_perkiraan` varchar(255) DEFAULT NULL,
  `tj_debet` decimal(10,0) DEFAULT NULL,
  `tj_kredit` decimal(10,0) DEFAULT NULL,
  `tj_tanggal_trans` datetime DEFAULT NULL,
  `tj_uraian` varchar(255) DEFAULT NULL,
  `tj_no_bukti` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`tj_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transaksi_jurnal
-- ----------------------------
INSERT INTO `transaksi_jurnal` VALUES ('4', 'test2', 'test2', '2500', '45000', '2016-12-31 16:46:46', 'test2', '00001');
INSERT INTO `transaksi_jurnal` VALUES ('5', '1234', '1234', '1212', '3121', '2016-12-31 17:10:46', 'test', '00001');
INSERT INTO `transaksi_jurnal` VALUES ('6', '125', 'trdt', '123', '234', '2017-01-02 11:28:40', 'tetete', '00001');

-- ----------------------------
-- Table structure for transaksi_jurnal_log
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_jurnal_log`;
CREATE TABLE `transaksi_jurnal_log` (
  `tjl_id` int(11) NOT NULL AUTO_INCREMENT,
  `tjl_action` varchar(100) DEFAULT NULL,
  `tjl_date` datetime DEFAULT NULL,
  `tj_id` int(11) DEFAULT NULL,
  `tj_kode_perkiraan` varchar(255) DEFAULT NULL,
  `tj_nama_perkiraan` varchar(255) DEFAULT NULL,
  `tj_debet` decimal(10,0) DEFAULT NULL,
  `tj_kredit` decimal(10,0) DEFAULT NULL,
  `tj_tanggal_trans` datetime DEFAULT NULL,
  `tj_uraian` varchar(255) DEFAULT NULL,
  `tj_no_bukti` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`tjl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of transaksi_jurnal_log
-- ----------------------------

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
-- Table structure for tr_setor_tunai_log
-- ----------------------------
DROP TABLE IF EXISTS `tr_setor_tunai_log`;
CREATE TABLE `tr_setor_tunai_log` (
  `stl_id` int(11) NOT NULL AUTO_INCREMENT,
  `stl_action` varchar(100) DEFAULT NULL,
  `stl_date` datetime DEFAULT NULL,
  `st_id` int(11) DEFAULT NULL,
  `st_no_rekening` int(20) NOT NULL,
  `st_jumlah_setor` decimal(18,2) NOT NULL DEFAULT '0.00',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`stl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tr_setor_tunai_log
-- ----------------------------

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
-- Table structure for tr_tarik_tunai_log
-- ----------------------------
DROP TABLE IF EXISTS `tr_tarik_tunai_log`;
CREATE TABLE `tr_tarik_tunai_log` (
  `ttl_id` int(11) NOT NULL AUTO_INCREMENT,
  `ttl_action` varchar(100) DEFAULT NULL,
  `ttl_date` datetime DEFAULT NULL,
  `tt_id` int(11) NOT NULL,
  `tt_no_rekening` varchar(20) NOT NULL,
  `tt_jumlah_tarik` decimal(18,2) NOT NULL DEFAULT '0.00',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`ttl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tr_tarik_tunai_log
-- ----------------------------

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
INSERT INTO `users` VALUES ('1', 'candrasetiadiwahyu@gmail.com', 'candra', '9f1964f992659f9fcafdf07bed0e47fd', 'candra setiadi wahyu', null, '2016-12-13 00:00:00', null, '2017-01-03 00:21:56', null, 'active', 'cc4b63c808f71d93b042acbb0a2ae90a');
DROP TRIGGER IF EXISTS `master_kredit_log`;
DELIMITER ;;
CREATE TRIGGER `master_kredit_log` BEFORE INSERT ON `master_kredit` FOR EACH ROW BEGIN
	INSERT INTO master_kredit_log SET
	mkl_action = 'INSERT',
	mkl_date = now(),
	mk_id = NEW.mk_id,
	mk_no_rekening = NEW.mk_no_rekening,
	mk_produk = NEW.mk_produk,
	mk_group1 = NEW.mk_group1,
	mk_kode_group_2 = NEW.mk_kode_group_2,
	mk_kode_group_3 = NEW.mk_kode_group_3,
	mk_type = NEW.mk_type,
	mk_jangka_waktu = NEW.mk_jangka_waktu,
	mk_jumlah_angsuran = NEW.mk_jumlah_angsuran,
	mk_tanggal_tempo = NEW.mk_tanggal_tempo,
	mk_tanggal_tagih = NEW.mk_tanggal_tagih,
	mk_periode = NEW.mk_periode,
	mk_suku_bunga = NEW.mk_suku_bunga,
	mk_jumlah_pinjam = NEW.mk_jumlah_pinjam,
	mk_adm_lain = NEW.mk_adm_lain,
	mk_nasabah = NEW.mk_nasabah,
	mk_no_alternatif = NEW.mk_no_alternatif,
	mk_kode_integrasi = NEW.mk_kode_integrasi;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `master_kredit_log_update`;
DELIMITER ;;
CREATE TRIGGER `master_kredit_log_update` BEFORE UPDATE ON `master_kredit` FOR EACH ROW BEGIN
	INSERT INTO master_kredit_log SET
	mkl_action = 'UPDATE',
	mkl_date = now(),
	mk_id = NEW.mk_id,
	mk_no_rekening = NEW.mk_no_rekening,
	mk_produk = NEW.mk_produk,
	mk_group1 = NEW.mk_group1,
	mk_kode_group_2 = NEW.mk_kode_group_2,
	mk_kode_group_3 = NEW.mk_kode_group_3,
	mk_type = NEW.mk_type,
	mk_jangka_waktu = NEW.mk_jangka_waktu,
	mk_jumlah_angsuran = NEW.mk_jumlah_angsuran,
	mk_tanggal_tempo = NEW.mk_tanggal_tempo,
	mk_tanggal_tagih = NEW.mk_tanggal_tagih,
	mk_periode = NEW.mk_periode,
	mk_suku_bunga = NEW.mk_suku_bunga,
	mk_jumlah_pinjam = NEW.mk_jumlah_pinjam,
	mk_adm_lain = NEW.mk_adm_lain,
	mk_nasabah = NEW.mk_nasabah,
	mk_no_alternatif = NEW.mk_no_alternatif,
	mk_kode_integrasi = NEW.mk_kode_integrasi;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `master_kredit_log_delete`;
DELIMITER ;;
CREATE TRIGGER `master_kredit_log_delete` BEFORE DELETE ON `master_kredit` FOR EACH ROW BEGIN
	INSERT INTO master_kredit_log SET
	mkl_action = 'DELETE',
	mkl_date = now(),
	mk_id = OLD.mk_id,
	mk_no_rekening = OLD.mk_no_rekening,
	mk_produk = OLD.mk_produk,
	mk_group1 = OLD.mk_group1,
	mk_kode_group_2 = OLD.mk_kode_group_2,
	mk_kode_group_3 = OLD.mk_kode_group_3,
	mk_type = OLD.mk_type,
	mk_jangka_waktu = OLD.mk_jangka_waktu,
	mk_jumlah_angsuran = OLD.mk_jumlah_angsuran,
	mk_tanggal_tempo = OLD.mk_tanggal_tempo,
	mk_tanggal_tagih = OLD.mk_tanggal_tagih,
	mk_periode = OLD.mk_periode,
	mk_suku_bunga = OLD.mk_suku_bunga,
	mk_jumlah_pinjam = OLD.mk_jumlah_pinjam,
	mk_adm_lain = OLD.mk_adm_lain,
	mk_nasabah = OLD.mk_nasabah,
	mk_no_alternatif = OLD.mk_no_alternatif,
	mk_kode_integrasi = OLD.mk_kode_integrasi;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `master_nasabah_log_insert`;
DELIMITER ;;
CREATE TRIGGER `master_nasabah_log_insert` BEFORE INSERT ON `master_nasabah` FOR EACH ROW BEGIN
	INSERT INTO master_nasabah_log SET
		mnl_action = 'INSERT',
		mnl_date = NOW(),
		mn_id = NEW.mn_id,
		mn_id_nasabah = NEW.mn_id_nasabah,
		mn_nama_nasabah = NEW.mn_nama_nasabah,
		mn_nama_ibu_kandung = NEW.mn_nama_ibu_kandung,
		mn_alamat_nasabah = NEW.mn_alamat_nasabah,
		mn_jenis_identitas = NEW.mn_jenis_identitas,
		mn_no_alternatif = NEW.mn_no_alternatif,
		mn_nama_alias = NEW.mn_nama_alias,
		mn_jekel = NEW.mn_jekel,
		mn_tempat_lahir = NEW.mn_tempat_lahir,
		mn_tanggal_lahir = NEW.mn_tanggal_lahir,
		mn_no_rekening = NEW.mn_no_rekening;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `master_nasabah_log_update`;
DELIMITER ;;
CREATE TRIGGER `master_nasabah_log_update` BEFORE UPDATE ON `master_nasabah` FOR EACH ROW BEGIN
	INSERT INTO master_nasabah_log SET
		mnl_action = 'UPDATE',
		mnl_date = NOW(),
		mn_id = NEW.mn_id,
		mn_id_nasabah = NEW.mn_id_nasabah,
		mn_nama_nasabah = NEW.mn_nama_nasabah,
		mn_nama_ibu_kandung = NEW.mn_nama_ibu_kandung,
		mn_alamat_nasabah = NEW.mn_alamat_nasabah,
		mn_jenis_identitas = NEW.mn_jenis_identitas,
		mn_no_alternatif = NEW.mn_no_alternatif,
		mn_nama_alias = NEW.mn_nama_alias,
		mn_jekel = NEW.mn_jekel,
		mn_tempat_lahir = NEW.mn_tempat_lahir,
		mn_tanggal_lahir = NEW.mn_tanggal_lahir,
		mn_no_rekening = NEW.mn_no_rekening;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `master_nasabah_log_delete`;
DELIMITER ;;
CREATE TRIGGER `master_nasabah_log_delete` BEFORE DELETE ON `master_nasabah` FOR EACH ROW BEGIN
  INSERT INTO master_nasabah_log SET
    mnl_action = 'DELETE',
    mnl_date = NOW(),
    mn_id = OLD.mn_id,
    mn_id_nasabah = OLD.mn_id_nasabah,
    mn_nama_nasabah = OLD.mn_nama_nasabah,
    mn_nama_ibu_kandung = OLD.mn_nama_ibu_kandung,
    mn_alamat_nasabah = OLD.mn_alamat_nasabah,
    mn_jenis_identitas = OLD.mn_jenis_identitas,
    mn_no_alternatif = OLD.mn_no_alternatif,
    mn_nama_alias = OLD.mn_nama_alias,
    mn_jekel = OLD.mn_jekel,
    mn_tempat_lahir = OLD.mn_tempat_lahir,
    mn_tanggal_lahir = OLD.mn_tanggal_lahir,
    mn_no_rekening = OLD.mn_no_rekening;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `master_tabungan_log_insert`;
DELIMITER ;;
CREATE TRIGGER `master_tabungan_log_insert` BEFORE INSERT ON `master_tabungan` FOR EACH ROW BEGIN
  INSERT INTO master_tabungan_log SET
    `mtl_action` = 'INSERT',
    `mtl_date` = NOW(),
    `mt_id` = NEW.mt_id,
    `mt_id_nasabah` = NEW.mt_id_nasabah,
    `mt_integrasi` = NEW.mt_integrasi,
    `mt_produk` = NEW.mt_produk,
    `mt_pemilik` = NEW.mt_pemilik,
    `mt_group1` = NEW.mt_group1,
    `mt_group2` = NEW.mt_group2,
    `mt_group3` = NEW.mt_group3,
    `mt_saldo_minimum` = NEW.mt_saldo_minimum,
    `mt_setoran_minimum` = NEW.mt_setoran_minimum,
    `mt_no_rekening` = NEW.mt_no_rekening;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `master_tabungan_log_update`;
DELIMITER ;;
CREATE TRIGGER `master_tabungan_log_update` BEFORE UPDATE ON `master_tabungan` FOR EACH ROW BEGIN
  INSERT INTO master_tabungan_log SET
    `mtl_action` = 'UPDATE',
    `mtl_date` = NOW(),
    `mt_id` = NEW.mt_id,
    `mt_id_nasabah` = NEW.mt_id_nasabah,
    `mt_integrasi` = NEW.mt_integrasi,
    `mt_produk` = NEW.mt_produk,
    `mt_pemilik` = NEW.mt_pemilik,
    `mt_group1` = NEW.mt_group1,
    `mt_group2` = NEW.mt_group2,
    `mt_group3` = NEW.mt_group3,
    `mt_saldo_minimum` = NEW.mt_saldo_minimum,
    `mt_setoran_minimum` = NEW.mt_setoran_minimum,
    `mt_no_rekening` = NEW.mt_no_rekening;
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `master_tabungan_log_delete`;
DELIMITER ;;
CREATE TRIGGER `master_tabungan_log_delete` BEFORE DELETE ON `master_tabungan` FOR EACH ROW BEGIN
  INSERT INTO master_tabungan_log SET
    `mtl_action` = 'DELETE',
    `mtl_date` = NOW(),
    `mt_id` = OLD.mt_id,
    `mt_id_nasabah` = OLD.mt_id_nasabah,
    `mt_integrasi` = OLD.mt_integrasi,
    `mt_produk` = OLD.mt_produk,
    `mt_pemilik` = OLD.mt_pemilik,
    `mt_group1` = OLD.mt_group1,
    `mt_group2` = OLD.mt_group2,
    `mt_group3` = OLD.mt_group3,
    `mt_saldo_minimum` = OLD.mt_saldo_minimum,
    `mt_setoran_minimum` = OLD.mt_setoran_minimum,
    `mt_no_rekening` = OLD.mt_no_rekening;
END
;;
DELIMITER ;
