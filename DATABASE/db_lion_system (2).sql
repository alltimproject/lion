-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 31, 2018 at 01:47 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lion_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_administrator`
--

CREATE TABLE `tb_administrator` (
  `email` varchar(25) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_administrator`
--

INSERT INTO `tb_administrator` (`email`, `firstname`, `lastname`, `password`, `level`) VALUES
('acclion@liongroup.com', 'Isyana', 'Sarasvati', '1673448ee7064c989d02579c534f6b66', 'accounting'),
('erfi@liongroup.com', 'erfi', 'erfi', '21232f297a57a5a743894a0e4a801fc3', 'petugas'),
('haviz@liongroup.com', 'haviz', 'maulana', '21232f297a57a5a743894a0e4a801fc3', 'petugas'),
('izmi@liongroup.com', 'izmi', 'atifah', '21232f297a57a5a743894a0e4a801fc3', 'petugas'),
('zera@liongroup.com', 'zera', 'wondal', '21232f297a57a5a743894a0e4a801fc3', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bank_account`
--

CREATE TABLE `tb_bank_account` (
  `kd_pembayaran` varchar(25) NOT NULL,
  `nama_bank` varchar(10) NOT NULL,
  `total_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bank_account`
--

INSERT INTO `tb_bank_account` (`kd_pembayaran`, `nama_bank`, `total_pembayaran`) VALUES
('BCA-BQNUA', '100000', 100000),
('BCA-IKIXO', '100000', 100000),
('BCA-ORYOD', '100000', 100000),
('BCA-WBWFA', '320000', 320000),
('BCA-YUHDO', '100000', 100000),
('BNI-RZLOA', '100000', 100000),
('BNI-SJBPG', '100000', 100000),
('BNI-WXNOF', '100000', 100000),
('MANDIRI-BKTEF', '100000', 100000),
('MANDIRI-CO', '320000', 320000),
('MANDIRI-NTTKS', '100000', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE `tb_booking` (
  `kd_booking` varchar(20) NOT NULL,
  `tgl_booking` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `adult` int(1) NOT NULL,
  `child` int(1) NOT NULL,
  `infant` int(1) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tipe_booking` varchar(20) NOT NULL,
  `gelar` varchar(6) NOT NULL,
  `nama_depan` varchar(20) NOT NULL,
  `nama_belakang` varchar(80) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_booking`
--

INSERT INTO `tb_booking` (`kd_booking`, `tgl_booking`, `adult`, `child`, `infant`, `status`, `tipe_booking`, `gelar`, `nama_depan`, `nama_belakang`, `alamat`, `no_tlp`, `email`) VALUES
('BOJOJO', '2018-07-10 17:00:00', 2, 0, 0, 'Confirmed', 'Multitrip', 'mr', 'Wahyu', 'BOBO', 'Jakarta', '081317726873', 'wahyualfarisi30@gmail.com'),
('BOMACD', '2018-07-30 22:01:57', 2, 0, 0, 'Confirmed', 'Multitrip', 'mr', 'Wahyu', 'Alfarisi', 'jakarta', '081317268731', 'wahyualfarisi30@gmail.com'),
('BOTJYH', '2018-07-28 18:24:49', 0, 0, 0, 'Confirmed', 'Multitrip', 'mr', 'Wahyu', 'BOBO', 'Jakarta', '081317726873', 'wahyualfarisi30@gmail.com'),
('BOWAHYU', '2018-07-28 17:27:37', 2, 0, 0, 'Confirmed', 'Multi Trip', 'mr', 'Isyana', 'Sarasvati', 'jakarta', '081317726873', 'wahyualfarisi30@gmail.com'),
('BOZERA', '2018-07-28 18:02:14', 2, 0, 0, 'Confirmed', 'Multitrip', 'mr', 'Wahyu', 'alfarisi', 'jakarta', '081317726873', 'wahyualfarisi30@gmail.com'),
('RF1VDD', '2018-07-28 17:49:55', 0, 0, 0, 'RFN', 'Multi Trip', 'mr', 'Isyana', 'Sarasvati', 'jakarta', '081317726873', 'wahyualfarisi30@gmail.com'),
('RF9QTS', '2018-07-28 18:15:24', 0, 0, 0, 'RFN', 'Multitrip', 'mr', 'Wahyu', 'alfarisi', 'jakarta', '081317726873', 'wahyualfarisi30@gmail.com'),
('RFJJZB', '2018-07-28 18:24:49', 0, 0, 0, 'RFN', 'Multitrip', 'mr', 'Wahyu', 'BOBO', 'Jakarta', '081317726873', 'wahyualfarisi30@gmail.com'),
('WAHYUA', '2018-07-28 17:47:14', 2, 0, 0, 'Confirmed', 'Multi Trip', 'Mr', 'Wahyu', 'Alfarisi', 'jl. jakarta', '081317726873', 'wahyualfarisi30@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail`
--

CREATE TABLE `tb_detail` (
  `kd_booking` varchar(20) NOT NULL,
  `no_penerbangan` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail`
--

INSERT INTO `tb_detail` (`kd_booking`, `no_penerbangan`) VALUES
('WAHYUA', 'JT009'),
('WAHYUA', 'JT009'),
('BOWAHYU', 'JT009'),
('RF1VDD', 'JT009'),
('BOZERA', 'JT009'),
('BOZERA', 'JT009'),
('RF9QTS', 'JT009'),
('RF9QTS', 'JT009'),
('BOJOJO', 'JT009'),
('BOJOJO', 'JT009'),
('BOTJYH', 'JT009'),
('RFJJZB', 'JT009'),
('BOMACD', 'JT009');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penerbangan`
--

CREATE TABLE `tb_penerbangan` (
  `no_penerbangan` varchar(10) NOT NULL,
  `kota_asal` varchar(30) NOT NULL,
  `kota_tujuan` varchar(30) NOT NULL,
  `tgl_keberangkatan` datetime NOT NULL,
  `tgl_tiba` datetime NOT NULL,
  `class` varchar(10) NOT NULL,
  `harga_tiket` int(11) NOT NULL,
  `provider` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penerbangan`
--

INSERT INTO `tb_penerbangan` (`no_penerbangan`, `kota_asal`, `kota_tujuan`, `tgl_keberangkatan`, `tgl_tiba`, `class`, `harga_tiket`, `provider`) VALUES
('JT001', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-08 01:00:00', '2018-08-08 03:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT002', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-26 02:00:00', '2018-08-26 04:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT003', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-08 03:00:00', '2018-08-08 05:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT004', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-08 04:00:00', '2018-08-08 06:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT005', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-08 05:00:00', '2018-08-08 07:00:00', 'Promo', 450000, 'Lion Air'),
('JT006', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT007', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT008', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT009', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT010', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Promo', 500000, 'Lion Air'),
('JT011', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT012', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT013', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT014', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT015', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Promo', 500000, 'Lion Air'),
('JT016', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT017', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT018', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT019', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT020', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Promo', 500000, 'Lion Air'),
('JT021', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT022', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT023', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT024', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT025', 'Jakarta (CGK)', 'Padang (PDG)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Promo', 500000, 'Lion Air'),
('JT026', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-08 00:00:00', '2018-08-08 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT027', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-08 00:00:00', '2018-08-08 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT028', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-08 00:00:00', '2018-08-08 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT029', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-08 00:00:00', '2018-08-08 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT030', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-08 00:00:00', '2018-08-08 00:00:00', 'Promo', 500000, 'Lion Air'),
('JT031', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-09 22:00:00', '2018-08-09 23:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT032', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT033', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT034', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT035', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Promo', 500000, 'Lion Air'),
('JT036', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT037', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT038', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT039', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT040', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Promo', 500000, 'Lion Air'),
('JT041', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT042', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT043', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT044', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT045', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Promo', 500000, 'Lion Air'),
('JT046', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT047', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Ekonomi', 800000, 'Lion Air'),
('JT048', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT049', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Bisnis', 1000000, 'Lion Air'),
('JT050', 'Padang (PDG)', 'Jakarta (CGK)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Promo', 500000, 'Lion Air'),
('JT051', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-08 00:00:00', '2018-08-08 00:00:00', 'Ekonomi', 700000, 'Lion Air'),
('JT052', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-08 00:00:00', '2018-08-08 00:00:00', 'Ekonomi', 800000, 'Batik Air'),
('JT053', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-08 00:00:00', '2018-08-08 00:00:00', 'Bisnis', 900000, 'Lion Air'),
('JT054', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-08 00:00:00', '2018-08-08 00:00:00', 'Bisnis', 1000000, 'Batik Air'),
('JT055', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-08 00:00:00', '2018-08-08 00:00:00', 'Promo', 450000, 'Lion Air'),
('JT056', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Ekonomi', 700000, 'Lion Air'),
('JT057', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Ekonomi', 800000, 'Batik Air'),
('JT058', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Bisnis', 900000, 'Lion Air'),
('JT059', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Bisnis', 1000000, 'Batik Air'),
('JT060', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Promo', 450000, 'Lion Air'),
('JT061', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Ekonomi', 700000, 'Lion Air'),
('JT062', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Ekonomi', 800000, 'Batik Air'),
('JT063', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Bisnis', 900000, 'Lion Air'),
('JT064', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Bisnis', 1000000, 'Batik Air'),
('JT065', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Promo', 450000, 'Lion Air'),
('JT066', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Ekonomi', 700000, 'Lion Air'),
('JT067', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Ekonomi', 800000, 'Batik Air'),
('JT068', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Bisnis', 900000, 'Lion Air'),
('JT069', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Bisnis', 1000000, 'Batik Air'),
('JT070', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Promo', 450000, 'Lion Air'),
('JT071', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Ekonomi', 700000, 'Lion Air'),
('JT072', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Ekonomi', 800000, 'Batik Air'),
('JT073', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Bisnis', 900000, 'Lion Air'),
('JT074', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Bisnis', 1000000, 'Batik Air'),
('JT075', 'Jakarta (CGK)', 'Bali (DPS)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Promo', 450000, 'Lion Air'),
('JT076', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-08 00:00:00', '2018-08-08 00:00:00', 'Ekonomi', 700000, 'Lion Air'),
('JT077', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-08 00:00:00', '2018-08-08 00:00:00', 'Ekonomi', 800000, 'Batik Air'),
('JT078', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-08 00:00:00', '2018-08-08 00:00:00', 'Bisnis', 900000, 'Lion Air'),
('JT079', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-08 00:00:00', '2018-08-08 00:00:00', 'Bisnis', 1000000, 'Batik Air'),
('JT080', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-08 00:00:00', '2018-08-08 00:00:00', 'Promo', 450000, 'Lion Air'),
('JT081', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Ekonomi', 700000, 'Lion Air'),
('JT082', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Ekonomi', 800000, 'Batik Air'),
('JT083', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Bisnis', 900000, 'Lion Air'),
('JT084', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Bisnis', 1000000, 'Batik Air'),
('JT085', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-09 00:00:00', '2018-08-09 00:00:00', 'Promo', 450000, 'Lion Air'),
('JT086', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Ekonomi', 700000, 'Lion Air'),
('JT087', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Ekonomi', 800000, 'Batik Air'),
('JT088', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Bisnis', 900000, 'Lion Air'),
('JT089', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Bisnis', 1000000, 'Batik Air'),
('JT090', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-10 00:00:00', '2018-08-10 00:00:00', 'Promo', 450000, 'Lion Air'),
('JT091', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Ekonomi', 700000, 'Lion Air'),
('JT092', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Ekonomi', 800000, 'Batik Air'),
('JT093', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Bisnis', 900000, 'Lion Air'),
('JT094', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Bisnis', 1000000, 'Batik Air'),
('JT095', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-11 00:00:00', '2018-08-11 00:00:00', 'Promo', 450000, 'Lion Air'),
('JT096', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Ekonomi', 700000, 'Lion Air'),
('JT097', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Ekonomi', 800000, 'Batik Air'),
('JT098', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Bisnis', 900000, 'Lion Air'),
('JT099', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Bisnis', 1000000, 'Batik Air'),
('JT100', 'Bali (DPS)', 'Jakarta (CGK)', '2018-08-12 00:00:00', '2018-08-12 00:00:00', 'Promo', 450000, 'Lion Air');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pessenger`
--

CREATE TABLE `tb_pessenger` (
  `id_tiket` int(11) NOT NULL,
  `no_tiket` varchar(50) NOT NULL,
  `nama_pessenger` varchar(100) NOT NULL,
  `tipe_pessenger` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kd_booking` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pessenger`
--

INSERT INTO `tb_pessenger` (`id_tiket`, `no_tiket`, `nama_pessenger`, `tipe_pessenger`, `tgl_lahir`, `kd_booking`) VALUES
(16, '111', 'Donny fahreza', 'adult', '2018-07-27', 'WAHYUA'),
(17, '222', 'Jojo', 'adult', '2018-07-28', 'WAHYUA'),
(20, '333', 'Zacky Ramadhan', 'adult', '2018-07-30', 'RF1VDD'),
(21, '444', 'Hilman Torik', 'adult', '2018-07-02', 'RF1VDD'),
(22, '333', 'Zacky Ramadhan', 'adult', '2018-07-30', 'BOWAHYU'),
(23, '444', 'Hilman Torik', 'adult', '2018-07-02', 'BOWAHYU'),
(24, '121', 'Wahyu Alfarisi', 'adult', '2018-07-22', 'RF9QTS'),
(25, '122', 'Zera yumayda', 'adult', '2018-07-24', 'BOZERA'),
(26, '999', 'Gugun', 'adult', '2018-07-31', 'BOTJYH'),
(27, '888', 'Gondrong', 'adult', '2018-07-16', 'BOJOJO'),
(28, '999', 'Gugun', 'adult', '2018-07-31', 'RFJJZB'),
(29, '81727262772', 'wahyu alfarisi', 'adult', '2018-07-31', 'BOMACD');

-- --------------------------------------------------------

--
-- Table structure for table `tb_refund`
--

CREATE TABLE `tb_refund` (
  `no_refund` varchar(10) NOT NULL,
  `tgl_refund` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_refund` int(11) NOT NULL,
  `kd_booking` varchar(10) NOT NULL,
  `refund_name` varchar(100) NOT NULL,
  `refund_alamat` varchar(300) NOT NULL,
  `refund_telepon` varchar(15) NOT NULL,
  `refund_email` varchar(50) NOT NULL,
  `refund_status` varchar(20) NOT NULL,
  `secure_code` varchar(255) NOT NULL,
  `nama_bank` varchar(10) NOT NULL,
  `cabang` varchar(50) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `nama_rekening` varchar(100) NOT NULL,
  `confirm_by` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_refund`
--

INSERT INTO `tb_refund` (`no_refund`, `tgl_refund`, `total_refund`, `kd_booking`, `refund_name`, `refund_alamat`, `refund_telepon`, `refund_email`, `refund_status`, `secure_code`, `nama_bank`, `cabang`, `no_rekening`, `nama_rekening`, `confirm_by`) VALUES
('RF1VDD', '2018-07-28 17:49:36', 1470000, 'BOWAHYU', 'Mr.  wahyu alfarisi', 'jakarta', '081317726873', 'wahyualfarisi30@gmail.com', 'Verify', 'e3bccfc03ba14ac2b2b31826cafe53b2', 'BCA', 'pondik gede', '777171761', 'wahyu alfarisi', 'zera@liongroup.com'),
('RF41G2', '2018-07-28 16:22:07', 3280000, 'WAHYUA', 'Mr.  Wahyu Alfarisi', 'jakarta', '081317726873', 'wahyualfarisi30@live.co', 'Verify', '2b19c43a0b8ddec1e018cda8956a352a', 'BCA', 'wahyualfarisi', '09090909', 'wahyu alfarisi', 'zera@liongroup.com'),
('RF9QTS', '2018-07-28 18:14:54', 1640000, 'BOZERA', 'Mr.  Wahyu Alfarisi', 'Jakarta', '081317726873', 'wahyualfarisi30@gmail.com', 'Verify', '1dbe402bd9c3229d37aaf0dde0005199', 'BCA', 'Pondok Gede', '68736383638', 'Wahyu alfarisi', 'erfi@lion.com'),
('RFJJZB', '2018-07-28 18:24:04', 735000, 'BOJOJO', 'Mr.  Jojo jiji', 'bekasi', '081317726873', 'wahyualfarisi30@gmail.com', 'Verify', '4ba8250102694592c734a0c28466ff00', 'BCA', 'Pondok Gede', '68729898891', 'Wahyu', 'erfi@lion.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_refund_detail`
--

CREATE TABLE `tb_refund_detail` (
  `no_refund` varchar(10) NOT NULL,
  `no_penerbangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_refund_detail`
--

INSERT INTO `tb_refund_detail` (`no_refund`, `no_penerbangan`) VALUES
('RF41G2', 'JT001'),
('RF41G2', 'JT002'),
('RF1VDD', 'JT003'),
('RF9QTS', 'JT001'),
('RF9QTS', 'JT002'),
('RFJJZB', 'JT001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_refund_pessenger`
--

CREATE TABLE `tb_refund_pessenger` (
  `no_refund` varchar(10) NOT NULL,
  `no_tiket` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_refund_pessenger`
--

INSERT INTO `tb_refund_pessenger` (`no_refund`, `no_tiket`) VALUES
('RF41G2', '111'),
('RF41G2', '222'),
('RF1VDD', '333'),
('RF1VDD', '444'),
('RF9QTS', '121'),
('RFJJZB', '999');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reschedul`
--

CREATE TABLE `tb_reschedul` (
  `no_reschedule` varchar(10) NOT NULL,
  `tgl_reschedul` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_reschedul` int(11) NOT NULL,
  `kd_booking` varchar(20) NOT NULL,
  `reschedul_name` varchar(100) NOT NULL,
  `reschedul_alamat` varchar(300) NOT NULL,
  `reschedul_telepon` varchar(15) NOT NULL,
  `reschedul_email` varchar(50) NOT NULL,
  `reschedul_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_reschedul`
--

INSERT INTO `tb_reschedul` (`no_reschedule`, `tgl_reschedul`, `total_reschedul`, `kd_booking`, `reschedul_name`, `reschedul_alamat`, `reschedul_telepon`, `reschedul_email`, `reschedul_status`) VALUES
('RSBFUY', '2018-07-30 23:45:07', 100000, 'BOMACD', 'Mr.  wahyu alfarisi', 'jakarta', '081317726873', 'wahyualfarisi39@gmail.com', 'Verify'),
('RSEFNF', '2018-07-30 23:40:41', 100000, 'BOMACD', 'Mr.  wahyu alfarisi', 'jakarta', '081317726873', 'wahyualfarisi30@gmail.com', 'Verify'),
('RSJJXA', '2018-07-30 23:29:36', 100000, 'BOMACD', 'Mr.  wahyu alfarisi', 'jakarta', '081317726873', 'wahyualfarisi30@gmail.com', 'Verify'),
('RSLGBF', '2018-07-30 22:35:22', 100000, 'BOMACD', 'Mr.  wahyu alfarisi', 'jakarta', '81317726873', 'wahyualfarisi30@gmail.com', 'Verify'),
('RSTAUY', '2018-07-30 23:26:11', 100000, 'BOMACD', 'Mr.  wahyu alfarisi', 'jakarta', '081317726873', 'wahyualfarisi30@gmail.com', 'Verify'),
('RSVZAW', '2018-07-30 23:34:44', 100000, 'BOMACD', 'Mr.  Wahyu Alfarisi', 'jakarta', '081317726873', 'wahyualfarisi30@gmail.com', 'Verify'),
('RSWBTD', '2018-07-30 22:20:25', 100000, 'BOMACD', 'Mr.  wahyu alfarisi', 'jkarta', '081317726873', 'wahyualfarisi30@gmail.com', 'Verify'),
('RSXBOZ', '2018-07-30 22:24:08', 100000, 'BOMACD', 'Mr.  wahyu alfarisi', 'jakarta', '08131726873', 'wahyualfarisi@gmail.com', 'Verify');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reschedul_detail`
--

CREATE TABLE `tb_reschedul_detail` (
  `no_reschedule` varchar(10) NOT NULL,
  `no_penerbangan` varchar(10) NOT NULL,
  `no_penerbangan_baru` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_reschedul_detail`
--

INSERT INTO `tb_reschedul_detail` (`no_reschedule`, `no_penerbangan`, `no_penerbangan_baru`) VALUES
('RSWBTD', 'JT004', 'JT008'),
('RSXBOZ', 'JT008', 'JT009'),
('RSLGBF', 'JT009', 'JT008'),
('RSTAUY', 'JT008', 'JT002'),
('RSJJXA', 'JT002', 'JT008'),
('RSVZAW', 'JT008', 'JT009'),
('RSEFNF', 'JT009', 'JT014'),
('RSBFUY', 'JT014', 'JT009');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reschedul_pessenger`
--

CREATE TABLE `tb_reschedul_pessenger` (
  `no_reschedule` varchar(10) NOT NULL,
  `no_tiket` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_reschedul_pessenger`
--

INSERT INTO `tb_reschedul_pessenger` (`no_reschedule`, `no_tiket`) VALUES
('RSWBTD', '8172726277'),
('RSXBOZ', '8172726277'),
('RSLGBF', '8172726277'),
('RSTAUY', '8172726277'),
('RSJJXA', '8172726277'),
('RSVZAW', '8172726277'),
('RSEFNF', '8172726277'),
('RSBFUY', '8172726277');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_administrator`
--
ALTER TABLE `tb_administrator`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `tb_bank_account`
--
ALTER TABLE `tb_bank_account`
  ADD PRIMARY KEY (`kd_pembayaran`);

--
-- Indexes for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`kd_booking`);

--
-- Indexes for table `tb_detail`
--
ALTER TABLE `tb_detail`
  ADD KEY `kd_booking` (`kd_booking`),
  ADD KEY `no_penerbangan` (`no_penerbangan`);

--
-- Indexes for table `tb_penerbangan`
--
ALTER TABLE `tb_penerbangan`
  ADD PRIMARY KEY (`no_penerbangan`);

--
-- Indexes for table `tb_pessenger`
--
ALTER TABLE `tb_pessenger`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `kd_booking` (`kd_booking`);

--
-- Indexes for table `tb_refund`
--
ALTER TABLE `tb_refund`
  ADD PRIMARY KEY (`no_refund`),
  ADD KEY `no_tiket` (`kd_booking`);

--
-- Indexes for table `tb_refund_detail`
--
ALTER TABLE `tb_refund_detail`
  ADD KEY `no_refund` (`no_refund`),
  ADD KEY `no_penerbangan` (`no_penerbangan`),
  ADD KEY `no_refund_2` (`no_refund`),
  ADD KEY `no_penerbangan_2` (`no_penerbangan`),
  ADD KEY `no_refund_3` (`no_refund`);

--
-- Indexes for table `tb_refund_pessenger`
--
ALTER TABLE `tb_refund_pessenger`
  ADD KEY `no_refund` (`no_refund`),
  ADD KEY `no_tiket` (`no_tiket`),
  ADD KEY `no_refund_2` (`no_refund`);

--
-- Indexes for table `tb_reschedul`
--
ALTER TABLE `tb_reschedul`
  ADD PRIMARY KEY (`no_reschedule`),
  ADD KEY `kd_booking` (`kd_booking`),
  ADD KEY `kd_booking_2` (`kd_booking`);

--
-- Indexes for table `tb_reschedul_detail`
--
ALTER TABLE `tb_reschedul_detail`
  ADD KEY `no_refund` (`no_reschedule`),
  ADD KEY `no_penerbangan` (`no_penerbangan`),
  ADD KEY `no_penerbangan_baru` (`no_penerbangan_baru`);

--
-- Indexes for table `tb_reschedul_pessenger`
--
ALTER TABLE `tb_reschedul_pessenger`
  ADD KEY `no_rescedul` (`no_reschedule`),
  ADD KEY `no_tiket` (`no_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pessenger`
--
ALTER TABLE `tb_pessenger`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail`
--
ALTER TABLE `tb_detail`
  ADD CONSTRAINT `tb_detail_ibfk_3` FOREIGN KEY (`kd_booking`) REFERENCES `tb_booking` (`kd_booking`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_ibfk_4` FOREIGN KEY (`no_penerbangan`) REFERENCES `tb_penerbangan` (`no_penerbangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pessenger`
--
ALTER TABLE `tb_pessenger`
  ADD CONSTRAINT `tb_pessenger_ibfk_1` FOREIGN KEY (`kd_booking`) REFERENCES `tb_booking` (`kd_booking`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_refund`
--
ALTER TABLE `tb_refund`
  ADD CONSTRAINT `tb_refund_ibfk_1` FOREIGN KEY (`kd_booking`) REFERENCES `tb_booking` (`kd_booking`);

--
-- Constraints for table `tb_refund_detail`
--
ALTER TABLE `tb_refund_detail`
  ADD CONSTRAINT `tb_refund_detail_ibfk_2` FOREIGN KEY (`no_penerbangan`) REFERENCES `tb_penerbangan` (`no_penerbangan`),
  ADD CONSTRAINT `tb_refund_detail_ibfk_3` FOREIGN KEY (`no_refund`) REFERENCES `tb_refund` (`no_refund`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_refund_pessenger`
--
ALTER TABLE `tb_refund_pessenger`
  ADD CONSTRAINT `tb_refund_pessenger_ibfk_3` FOREIGN KEY (`no_refund`) REFERENCES `tb_refund` (`no_refund`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_reschedul_detail`
--
ALTER TABLE `tb_reschedul_detail`
  ADD CONSTRAINT `tb_reschedul_detail_ibfk_2` FOREIGN KEY (`no_penerbangan`) REFERENCES `tb_penerbangan` (`no_penerbangan`),
  ADD CONSTRAINT `tb_reschedul_detail_ibfk_3` FOREIGN KEY (`no_penerbangan_baru`) REFERENCES `tb_penerbangan` (`no_penerbangan`),
  ADD CONSTRAINT `tb_reschedul_detail_ibfk_4` FOREIGN KEY (`no_reschedule`) REFERENCES `tb_reschedul` (`no_reschedule`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_reschedul_pessenger`
--
ALTER TABLE `tb_reschedul_pessenger`
  ADD CONSTRAINT `tb_reschedul_pessenger_ibfk_1` FOREIGN KEY (`no_reschedule`) REFERENCES `tb_reschedul` (`no_reschedule`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
