-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2016 at 01:56 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ibs_branchless`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_kredit`
--

CREATE TABLE `master_kredit` (
  `mk_id` int(11) NOT NULL,
  `mk_no_rekening` varchar(11) DEFAULT NULL,
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
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_nasabah`
--

CREATE TABLE `master_nasabah` (
  `mn_id` int(11) NOT NULL,
  `mn_id_nasabah` int(11) DEFAULT NULL,
  `mn_no_rekening` varchar(20) NOT NULL,
  `mn_nama_nasabah` varchar(225) DEFAULT NULL,
  `mn_nama_ibu_kandung` varchar(225) DEFAULT NULL,
  `mn_alamat_nasabah` text,
  `mn_jenis_identitas` varchar(100) DEFAULT NULL,
  `mn_no_alternatif` int(11) DEFAULT NULL,
  `mn_nama_alias` varchar(100) DEFAULT NULL,
  `mn_jekel` varchar(10) DEFAULT NULL,
  `mn_tempat_lahir` varchar(100) DEFAULT NULL,
  `mn_tanggal_lahir` date DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_nasabah`
--

INSERT INTO `master_nasabah` (`mn_id`, `mn_id_nasabah`, `mn_no_rekening`, `mn_nama_nasabah`, `mn_nama_ibu_kandung`, `mn_alamat_nasabah`, `mn_jenis_identitas`, `mn_no_alternatif`, `mn_nama_alias`, `mn_jekel`, `mn_tempat_lahir`, `mn_tanggal_lahir`, `created_at`, `created_by`) VALUES
(1, 1, '001001001', 'Ronaldo', '3', 'Jkarta Selatan', 'sim', 5, '6', 'L', '7', '0000-00-00', '2016-12-19 13:01:07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_tabungan`
--

CREATE TABLE `master_tabungan` (
  `mt_id` int(11) NOT NULL,
  `mt_id_nasabah` int(11) DEFAULT NULL,
  `mt_integrasi` varchar(255) DEFAULT NULL,
  `mt_produk` varchar(255) DEFAULT NULL,
  `mt_pemilik` varchar(255) DEFAULT NULL,
  `mt_group1` varchar(255) DEFAULT NULL,
  `mt_group2` varchar(255) DEFAULT NULL,
  `mt_group3` varchar(255) DEFAULT NULL,
  `mt_saldo_minimum` varchar(255) DEFAULT NULL,
  `mt_setoran_minimum` varchar(255) DEFAULT NULL,
  `mt_no_rekening` varchar(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_tabungan`
--

INSERT INTO `master_tabungan` (`mt_id`, `mt_id_nasabah`, `mt_integrasi`, `mt_produk`, `mt_pemilik`, `mt_group1`, `mt_group2`, `mt_group3`, `mt_saldo_minimum`, `mt_setoran_minimum`, `mt_no_rekening`, `created_at`, `created_by`) VALUES
(1, 2, '3', '4', '5', '6', '7', '8', 'Rp. 25000', 'Rp. 25000', '001001001', '0000-00-00 00:00:00', 0),
(2, 2, '3', '4', '5', '6', '7', '8', 'Rp. 25000', 'Rp. 25000', '1', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tr_setor_tunai`
--

CREATE TABLE `tr_setor_tunai` (
  `st_id` int(11) NOT NULL,
  `st_no_rekening` int(20) NOT NULL,
  `st_jumlah_setor` decimal(18,2) NOT NULL DEFAULT '0.00',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tr_tarik_tunai`
--

CREATE TABLE `tr_tarik_tunai` (
  `tt_id` int(11) NOT NULL,
  `tt_no_rekening` varchar(20) NOT NULL,
  `tt_jumlah_tarik` decimal(18,2) NOT NULL DEFAULT '0.00',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usr_id` int(11) NOT NULL,
  `usr_email` varchar(100) DEFAULT NULL,
  `usr_name` varchar(100) NOT NULL,
  `usr_password` varchar(256) NOT NULL,
  `usr_fullname` varchar(256) NOT NULL,
  `usr_avatar_path` varchar(256) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usr_id`, `usr_email`, `usr_name`, `usr_password`, `usr_fullname`, `usr_avatar_path`, `created_at`, `updated_at`, `last_login`, `last_logout`, `status`) VALUES
(1, 'candrasetiadiwahyu@gmail.com', 'candra', '9f1964f992659f9fcafdf07bed0e47fd', 'candra setiadi wahyu', NULL, '2016-12-13 00:00:00', NULL, '2016-12-19 13:37:09', NULL, 'active'),
(3, 'safril@kct.co.id', 'safril22', '81dc9bdb52d04dc20036dbd8313ed055', '', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_kredit`
--
ALTER TABLE `master_kredit`
  ADD PRIMARY KEY (`mk_id`);

--
-- Indexes for table `master_nasabah`
--
ALTER TABLE `master_nasabah`
  ADD PRIMARY KEY (`mn_id`),
  ADD UNIQUE KEY `mn_no_rekening` (`mn_no_rekening`);

--
-- Indexes for table `master_tabungan`
--
ALTER TABLE `master_tabungan`
  ADD PRIMARY KEY (`mt_id`);

--
-- Indexes for table `tr_setor_tunai`
--
ALTER TABLE `tr_setor_tunai`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `tr_tarik_tunai`
--
ALTER TABLE `tr_tarik_tunai`
  ADD PRIMARY KEY (`tt_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usr_id`),
  ADD UNIQUE KEY `usr_name` (`usr_name`),
  ADD UNIQUE KEY `usr_email` (`usr_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_kredit`
--
ALTER TABLE `master_kredit`
  MODIFY `mk_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_nasabah`
--
ALTER TABLE `master_nasabah`
  MODIFY `mn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `master_tabungan`
--
ALTER TABLE `master_tabungan`
  MODIFY `mt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tr_setor_tunai`
--
ALTER TABLE `tr_setor_tunai`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tr_tarik_tunai`
--
ALTER TABLE `tr_tarik_tunai`
  MODIFY `tt_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
