-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 21, 2011 at 05:16 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qldo`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietgiaodichmua`
--

DROP TABLE IF EXISTS `chitietgiaodichmua`;
CREATE TABLE IF NOT EXISTS `chitietgiaodichmua` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `khachhang` int(11) NOT NULL,
  `giamuatu` float NOT NULL,
  `giamuaden` float NOT NULL,
  `donvi` int(11) NOT NULL,
  `ngay` date NOT NULL,
  `tieuchi` text COLLATE utf8_unicode_ci NOT NULL,
  `khanangmua` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_chitietgiaodich_khachhang` (`khachhang`),
  KEY `fk` (`khachhang`),
  KEY `fk_chitietgiaodich_khanangmua` (`khanangmua`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `chitietgiaodichmua`
--


-- --------------------------------------------------------

--
-- Table structure for table `hinhanh`
--

DROP TABLE IF EXISTS `hinhanh`;
CREATE TABLE IF NOT EXISTS `hinhanh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path1` text COLLATE utf8_unicode_ci,
  `path2` text COLLATE utf8_unicode_ci,
  `path3` text COLLATE utf8_unicode_ci,
  `path4` text COLLATE utf8_unicode_ci,
  `path5` text COLLATE utf8_unicode_ci,
  `path6` text COLLATE utf8_unicode_ci,
  `path7` text COLLATE utf8_unicode_ci,
  `path8` text COLLATE utf8_unicode_ci,
  `path9` text COLLATE utf8_unicode_ci,
  `path10` text COLLATE utf8_unicode_ci,
  `idthongtinnhadat` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_hinhanh_thongtinnhadat` (`idthongtinnhadat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `hinhanh`
--


-- --------------------------------------------------------

--
-- Table structure for table `khachhanggiaodich`
--

DROP TABLE IF EXISTS `khachhanggiaodich`;
CREATE TABLE IF NOT EXISTS `khachhanggiaodich` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hoten` text COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` bit(1) NOT NULL,
  `sdt1` text COLLATE utf8_unicode_ci NOT NULL,
  `sdt2` text COLLATE utf8_unicode_ci NOT NULL,
  `loaikh` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_khachhanggiaodinh_loaikh` (`loaikh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `khachhanggiaodich`
--


-- --------------------------------------------------------

--
-- Table structure for table `khanangban`
--

DROP TABLE IF EXISTS `khanangban`;
CREATE TABLE IF NOT EXISTS `khanangban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `khanangban`
--

INSERT INTO `khanangban` (`id`, `ten`, `status`) VALUES
(1, 'THẤP', NULL),
(2, 'TRUNG BÌNH', NULL),
(3, 'CAO', NULL),
(4, 'ĐÃ BÁN 1', NULL),
(5, 'ĐÃ BÁN 2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `khanangmua`
--

DROP TABLE IF EXISTS `khanangmua`;
CREATE TABLE IF NOT EXISTS `khanangmua` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `khanangmua`
--

INSERT INTO `khanangmua` (`id`, `ten`) VALUES
(1, 'CAO'),
(2, 'TRUNG BÌNH'),
(3, 'THẤP'),
(4, 'ĐÃ MUA1'),
(5, 'ĐÃ MUA2');

-- --------------------------------------------------------

--
-- Table structure for table `loaikh`
--

DROP TABLE IF EXISTS `loaikh`;
CREATE TABLE IF NOT EXISTS `loaikh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `loaikh`
--

INSERT INTO `loaikh` (`id`, `ten`) VALUES
(1, 'Người mua'),
(2, 'Chủ nhân căn hộ');

-- --------------------------------------------------------

--
-- Table structure for table `nhadatgioithieu`
--

DROP TABLE IF EXISTS `nhadatgioithieu`;
CREATE TABLE IF NOT EXISTS `nhadatgioithieu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idgiaodichmua` int(11) NOT NULL,
  `idthongtinnhadat` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_nhadatgiothieu_thongtinnhadat` (`idthongtinnhadat`),
  KEY `fk_nhadatgioithieu_chitietgiaodinhmua` (`idgiaodichmua`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nhadatgioithieu`
--


-- --------------------------------------------------------

--
-- Table structure for table `phuong`
--

DROP TABLE IF EXISTS `phuong`;
CREATE TABLE IF NOT EXISTS `phuong` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` text COLLATE utf8_unicode_ci NOT NULL,
  `idquan` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_phuong_quan` (`idquan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `phuong`
--


-- --------------------------------------------------------

--
-- Table structure for table `quan`
--

DROP TABLE IF EXISTS `quan`;
CREATE TABLE IF NOT EXISTS `quan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `quan`
--


-- --------------------------------------------------------

--
-- Table structure for table `thongtinnhadat`
--

DROP TABLE IF EXISTS `thongtinnhadat`;
CREATE TABLE IF NOT EXISTS `thongtinnhadat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chusohuu` int(11) NOT NULL,
  `phuong` int(11) NOT NULL,
  `ngay` date NOT NULL,
  `duong` text COLLATE utf8_unicode_ci NOT NULL,
  `rong` float NOT NULL,
  `dai` float NOT NULL,
  `dientich` float NOT NULL,
  `giaban` float NOT NULL,
  `donvi` int(11) NOT NULL,
  `khanangban` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_thongtinnhadat_phuong` (`phuong`),
  KEY `fk_thongtinnhadat_khanangban` (`khanangban`),
  KEY `fk_thongtinhnhadat_khachhang` (`chusohuu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `thongtinnhadat`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietgiaodichmua`
--
ALTER TABLE `chitietgiaodichmua`
  ADD CONSTRAINT `fk_chitietgiaodich_khachhang` FOREIGN KEY (`khachhang`) REFERENCES `khachhanggiaodich` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chitietgiaodich_khanangmua` FOREIGN KEY (`khanangmua`) REFERENCES `khanangmua` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `fk_hinhanh_thongtinnhadat` FOREIGN KEY (`idthongtinnhadat`) REFERENCES `thongtinnhadat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `khachhanggiaodich`
--
ALTER TABLE `khachhanggiaodich`
  ADD CONSTRAINT `fk_khachhanggiaodinh_loaikh` FOREIGN KEY (`loaikh`) REFERENCES `loaikh` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `nhadatgioithieu`
--
ALTER TABLE `nhadatgioithieu`
  ADD CONSTRAINT `fk_nhadatgioithieu_chitietgiaodinhmua` FOREIGN KEY (`idgiaodichmua`) REFERENCES `chitietgiaodichmua` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nhadatgiothieu_thongtinnhadat` FOREIGN KEY (`idthongtinnhadat`) REFERENCES `thongtinnhadat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `phuong`
--
ALTER TABLE `phuong`
  ADD CONSTRAINT `fk_phuong_quan` FOREIGN KEY (`idquan`) REFERENCES `quan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `thongtinnhadat`
--
ALTER TABLE `thongtinnhadat`
  ADD CONSTRAINT `fk_thongtinhnhadat_khachhang` FOREIGN KEY (`chusohuu`) REFERENCES `khachhanggiaodich` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_thongtinnhadat_khanangban` FOREIGN KEY (`khanangban`) REFERENCES `khanangban` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_thongtinnhadat_phuong` FOREIGN KEY (`phuong`) REFERENCES `phuong` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
