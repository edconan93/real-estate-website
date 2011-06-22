-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 22, 2011 at 02:46 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET FOREIGN_KEY_CHECKS=0;
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
-- Table structure for table `chitettaikhoan`
--

DROP TABLE IF EXISTS `chitettaikhoan`;
CREATE TABLE IF NOT EXISTS `chitettaikhoan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hoten` text COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` bit(1) NOT NULL,
  `sdt1` text COLLATE utf8_unicode_ci NOT NULL,
  `sdt2` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `chitettaikhoan`
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
-- Table structure for table `level`
--

DROP TABLE IF EXISTS `level`;
CREATE TABLE IF NOT EXISTS `level` (
  `idlevel` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `chitiet` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`idlevel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`idlevel`, `ten`, `chitiet`) VALUES
(1, 'Level1', 'Nhân viên cấp bậc 1'),
(2, 'Level2', 'Nhân viên cấp bậc 2'),
(3, 'Level3', 'Nhân viên cấp bậc 3'),
(4, 'VIP', 'Tài khoản VIP'),
(5, 'Normal', 'Tài khoản thường');

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
-- Table structure for table `nhanvien_quyenhan`
--

DROP TABLE IF EXISTS `nhanvien_quyenhan`;
CREATE TABLE IF NOT EXISTS `nhanvien_quyenhan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idtaikhoannhanvien` int(11) NOT NULL,
  `idquyenhan` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_nhanvien_quyenhan_nhanvien` (`idtaikhoannhanvien`),
  KEY `fk_nhanvien_quyenhan_quyenhan` (`idquyenhan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nhanvien_quyenhan`
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
-- Table structure for table `quyenhansudung`
--

DROP TABLE IF EXISTS `quyenhansudung`;
CREATE TABLE IF NOT EXISTS `quyenhansudung` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` text COLLATE utf8_unicode_ci NOT NULL,
  `chitiet` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `quyenhansudung`
--

INSERT INTO `quyenhansudung` (`id`, `ten`, `chitiet`) VALUES
(1, 'Được xuất sang exel', NULL),
(2, 'Được phép xóa thông tin', NULL),
(3, 'Chọn thay đổi khả năng mua', NULL),
(4, 'Chọn thay đổi khả năng bán', NULL),
(5, 'Tổng hợp thu chi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `ten`) VALUES
(1, 'Admin'),
(2, 'User mua'),
(3, 'User bán'),
(4, 'Nhân viên');

-- --------------------------------------------------------

--
-- Table structure for table `thongtinnhaban`
--

DROP TABLE IF EXISTS `thongtinnhaban`;
CREATE TABLE IF NOT EXISTS `thongtinnhaban` (
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
-- Dumping data for table `thongtinnhaban`
--


-- --------------------------------------------------------

--
-- Table structure for table `thongtinnhamua`
--

DROP TABLE IF EXISTS `thongtinnhamua`;
CREATE TABLE IF NOT EXISTS `thongtinnhamua` (
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
-- Dumping data for table `thongtinnhamua`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `chitettaikhoan` int(11) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_thanhvien_taikhoan` (`chitettaikhoan`),
  KEY `fk_taikhoan_role` (`role`),
  KEY `fk_taikhoan_level` (`level`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `fk_hinhanh_thongtinnhadat` FOREIGN KEY (`idthongtinnhadat`) REFERENCES `thongtinnhaban` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `nhadatgioithieu`
--
ALTER TABLE `nhadatgioithieu`
  ADD CONSTRAINT `fk_nhadatgioithieu_chitietgiaodinhmua` FOREIGN KEY (`idgiaodichmua`) REFERENCES `thongtinnhamua` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nhadatgiothieu_thongtinnhadat` FOREIGN KEY (`idthongtinnhadat`) REFERENCES `thongtinnhaban` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `nhanvien_quyenhan`
--
ALTER TABLE `nhanvien_quyenhan`
  ADD CONSTRAINT `fk_nhanvien_quyenhan_quyenhan` FOREIGN KEY (`idquyenhan`) REFERENCES `quyenhansudung` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nhanvien_quyenhan_nhanvien` FOREIGN KEY (`idtaikhoannhanvien`) REFERENCES `chitettaikhoan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `phuong`
--
ALTER TABLE `phuong`
  ADD CONSTRAINT `fk_phuong_quan` FOREIGN KEY (`idquan`) REFERENCES `quan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `thongtinnhaban`
--
ALTER TABLE `thongtinnhaban`
  ADD CONSTRAINT `fk_thongtinhnhadat_khachhang` FOREIGN KEY (`chusohuu`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_thongtinnhadat_khanangban` FOREIGN KEY (`khanangban`) REFERENCES `khanangban` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_thongtinnhadat_phuong` FOREIGN KEY (`phuong`) REFERENCES `phuong` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `thongtinnhamua`
--
ALTER TABLE `thongtinnhamua`
  ADD CONSTRAINT `fk_chitietgiaodich_khachhang` FOREIGN KEY (`khachhang`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_chitietgiaodich_khanangmua` FOREIGN KEY (`khanangmua`) REFERENCES `khanangmua` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_taikhoan_chitiet` FOREIGN KEY (`chitettaikhoan`) REFERENCES `chitettaikhoan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_taikhoan_role` FOREIGN KEY (`role`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_taikhoan_level` FOREIGN KEY (`level`) REFERENCES `level` (`idlevel`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;
