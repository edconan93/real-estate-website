-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 21, 2011 at 02:57 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `QLDO`
--

-- --------------------------------------------------------

--
-- Table structure for table `canhangiaodich`
--

CREATE TABLE IF NOT EXISTS `canhangiaodich` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hoten` text COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` bit(1) NOT NULL,
  `sdt1` text COLLATE utf8_unicode_ci NOT NULL,
  `sdt2` text COLLATE utf8_unicode_ci NOT NULL,
  `loaikh` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `canhangiaodich`
--


-- --------------------------------------------------------

--
-- Table structure for table `hinhanh`
--

CREATE TABLE IF NOT EXISTS `hinhanh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` text COLLATE utf8_unicode_ci NOT NULL,
  `idthongtinnhadat` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `hinhanh`
--


-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE IF NOT EXISTS `khachhang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `khachhang` int(11) NOT NULL,
  `giamuatu` float NOT NULL,
  `giamuaden` float NOT NULL,
  `donvi` int(11) NOT NULL,
  `ngay` date NOT NULL,
  `tieuchi` text COLLATE utf8_unicode_ci NOT NULL,
  `khanangmua` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `khachhang`
--


-- --------------------------------------------------------

--
-- Table structure for table `khanangban`
--

CREATE TABLE IF NOT EXISTS `khanangban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `khanangban`
--

INSERT INTO `khanangban` (`id`, `ten`) VALUES
(1, 'THẤP'),
(2, 'TRUNG BÌNH'),
(3, 'CAO'),
(4, 'ĐÃ BÁN 1'),
(5, 'ĐÃ BÁN 2');

-- --------------------------------------------------------

--
-- Table structure for table `khanangmua`
--

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

CREATE TABLE IF NOT EXISTS `nhadatgioithieu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idkhachhang` int(11) NOT NULL,
  `idthongtinnhadat` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nhadatgioithieu`
--


-- --------------------------------------------------------

--
-- Table structure for table `phuong`
--

CREATE TABLE IF NOT EXISTS `phuong` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` text COLLATE utf8_unicode_ci NOT NULL,
  `idquan` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `phuong`
--


-- --------------------------------------------------------

--
-- Table structure for table `quan`
--

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `thongtinnhadat`
--

