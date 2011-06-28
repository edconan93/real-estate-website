-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 28, 2011 at 04:52 PM
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
-- Table structure for table `dichvu`
--

DROP TABLE IF EXISTS `dichvu`;
CREATE TABLE IF NOT EXISTS `dichvu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tieude` text COLLATE utf8_unicode_ci NOT NULL,
  `mota` text COLLATE utf8_unicode_ci,
  `chusohuu` int(11) DEFAULT NULL,
  `phuong` int(11) DEFAULT NULL,
  `quan` int(11) DEFAULT NULL,
  `tinh` int(11) DEFAULT NULL,
  `ngaydang` datetime DEFAULT NULL,
  `ngaycapnhat` datetime DEFAULT NULL,
  `duong` text COLLATE utf8_unicode_ci,
  `rong` float DEFAULT NULL,
  `dai` float DEFAULT NULL,
  `tang` int(11) DEFAULT NULL,
  `sophongngu` int(11) DEFAULT NULL,
  `sophongtam` int(11) DEFAULT NULL,
  `giaban` float DEFAULT NULL,
  `donvitien` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `thoihantin` int(11) DEFAULT NULL,
  `loainha` int(11) DEFAULT NULL,
  `phaply` int(11) DEFAULT NULL,
  `huongnha` int(11) DEFAULT NULL,
  `khuyenmai` text COLLATE utf8_unicode_ci,
  `loaidv` int(11) DEFAULT NULL,
  `donvidv` int(11) DEFAULT NULL,
  `x` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `y` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_thongtinnhadat_phuong` (`phuong`),
  KEY `fk_thongtinhnhadat_khachhang` (`chusohuu`),
  KEY `fk_thongtinnhaban_loainha` (`loainha`),
  KEY `fk_thongtinhnhaban_phaply` (`phaply`),
  KEY `FK_thongtinnhaban_huongnha` (`huongnha`),
  KEY `fk_thongtinnhaban_quan` (`quan`),
  KEY `fk_thongtinnhaban_tinh` (`tinh`),
  KEY `fk_dichvu_user` (`chusohuu`),
  KEY `fk_dichvu_loaidv` (`loaidv`),
  KEY `fk_dichvu` (`donvitien`),
  KEY `fk_dichvu_huong` (`huongnha`),
  KEY `fk_dichvu_loaicanho` (`loainha`),
  KEY `fk_dichvu_tinh` (`tinh`),
  KEY `fk_dichvu_quan` (`quan`),
  KEY `fk_dichvu_phuong` (`phuong`),
  KEY `fk_dichvu_phaply` (`phaply`),
  KEY `fk_dichvu_donvidv` (`donvidv`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `dichvu`
--

INSERT INTO `dichvu` (`id`, `tieude`, `mota`, `chusohuu`, `phuong`, `quan`, `tinh`, `ngaydang`, `ngaycapnhat`, `duong`, `rong`, `dai`, `tang`, `sophongngu`, `sophongtam`, `giaban`, `donvitien`, `status`, `thoihantin`, `loainha`, `phaply`, `huongnha`, `khuyenmai`, `loaidv`, `donvidv`, `x`, `y`) VALUES
(2, 'Bán căn hộ the everich Q11 gia rẻ vào ở ngay', 'qua ngon', 2, 4, 4, 2, '2010-02-03 00:00:00', NULL, 'truong chinh', 10, 25, 17, 3, 4, 32085000, 1, 1, 10, 2, 1, 1, 'Tặng nội thất vào ở ngay', 1, 2, NULL, NULL),
(3, 'Bán căn hộ the everich Q12 gia rẻ vào ở ngay', NULL, 2, 4, 3, 2, '2010-02-04 00:00:00', NULL, 'lac long quan', 7, 9, 10, 3, 2, 123214, 1, 1, 12, 2, 1, 2, NULL, 1, 1, NULL, NULL),
(4, 'Bán căn hộ the everich Q10 gia rẻ vào ở ngay', NULL, 2, 3, 3, 3, NULL, NULL, NULL, 3, 4, 3, 3, 2, 43214100, 1, 1, 2, 1, 1, 1, 'Tặng nội thất vào ở ngay', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dichvu_tienich`
--

DROP TABLE IF EXISTS `dichvu_tienich`;
CREATE TABLE IF NOT EXISTS `dichvu_tienich` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcanho` int(11) DEFAULT NULL,
  `idtienich` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_canhotienich_canho` (`idcanho`),
  KEY `fk_canhotienich_tienich` (`idtienich`),
  KEY `fk_vdtienich_tienich` (`idtienich`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `dichvu_tienich`
--


-- --------------------------------------------------------

--
-- Table structure for table `donvidichvu`
--

DROP TABLE IF EXISTS `donvidichvu`;
CREATE TABLE IF NOT EXISTS `donvidichvu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `donvidichvu`
--

INSERT INTO `donvidichvu` (`id`, `ten`) VALUES
(1, 'm²'),
(2, 'Tổng diện tích'),
(3, 'Tháng');

-- --------------------------------------------------------

--
-- Table structure for table `donvitien`
--

DROP TABLE IF EXISTS `donvitien`;
CREATE TABLE IF NOT EXISTS `donvitien` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tigia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `donvitien`
--

INSERT INTO `donvitien` (`id`, `ten`, `tigia`) VALUES
(1, 'USD', 22000),
(2, 'VND', 1),
(3, 'SJC', 38000000);

-- --------------------------------------------------------

--
-- Table structure for table `hinhanh`
--

DROP TABLE IF EXISTS `hinhanh`;
CREATE TABLE IF NOT EXISTS `hinhanh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` text COLLATE utf8_unicode_ci,
  `iddichvu` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_hinhanh_thongtinnhadat` (`iddichvu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `hinhanh`
--

INSERT INTO `hinhanh` (`id`, `path`, `iddichvu`) VALUES
(3, 'images/business/1.png', 2),
(4, 'images/business/2.jpg', 3),
(5, 'images/business/3.png', 4);

-- --------------------------------------------------------

--
-- Table structure for table `huongnha`
--

DROP TABLE IF EXISTS `huongnha`;
CREATE TABLE IF NOT EXISTS `huongnha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `huongnha`
--

INSERT INTO `huongnha` (`id`, `ten`) VALUES
(1, 'Đông'),
(2, 'Tây'),
(3, 'Nam'),
(4, 'Bắc'),
(5, 'Đông Bắc'),
(6, 'Đông Nam'),
(7, 'Tây Bắc'),
(8, 'Tây Nam'),
(9, 'Không xác định');

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
-- Table structure for table `loaidichvu`
--

DROP TABLE IF EXISTS `loaidichvu`;
CREATE TABLE IF NOT EXISTS `loaidichvu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `loaidichvu`
--

INSERT INTO `loaidichvu` (`id`, `ten`) VALUES
(1, 'Cần bán'),
(2, 'Cần mua'),
(3, 'Cho thuê'),
(4, 'Cần cho thuê');

-- --------------------------------------------------------

--
-- Table structure for table `loainha`
--

DROP TABLE IF EXISTS `loainha`;
CREATE TABLE IF NOT EXISTS `loainha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `loainha`
--

INSERT INTO `loainha` (`id`, `ten`) VALUES
(1, 'Biệt Thự'),
(2, 'Căn hộ chung cư'),
(3, 'Căn hộ cao cấp'),
(4, 'Nhà Phố'),
(5, 'Văn phòng cho thuê');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien_quyenhan`
--

DROP TABLE IF EXISTS `nhanvien_quyenhan`;
CREATE TABLE IF NOT EXISTS `nhanvien_quyenhan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `idquyenhan` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_nhanvien_quyenhan_quyenhan` (`idquyenhan`),
  KEY `fk_nhanvien_quyenhan_nhanvien` (`iduser`)
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `phuong`
--

INSERT INTO `phuong` (`id`, `ten`, `idquan`) VALUES
(1, 'BÌNH THỌ', 24),
(2, 'TRƯỜNG THỌ', 24),
(3, 'LINH CHIỂU', 24),
(4, ' LINH TRUNG', 24),
(5, 'LINH TÂY', 24),
(6, 'LINH XUÂN', 24),
(7, ' LINH ĐÔNG', 24),
(8, 'HIỆP BÌNH CHÁNH', 24),
(9, 'HIỆP BÌNH PHƯỚC', 24),
(10, 'TAM BÌNH', 24),
(11, 'TAM PHÚ', 24),
(12, ' BÌNH CHIỂU', 24),
(13, 'CÁC XÃ PHƯỜNG KHÁC', 24),
(14, 'HIỆP PHÚ', 9),
(15, 'TĂNG NHƠN PHÚ A', 9),
(16, 'TĂNG NHƠN PHÚ B', 9),
(17, 'LONG THẠNH MỸ', 9),
(18, 'PHƯỚC LONG A', 9),
(19, 'PHƯỚC LONG B', 9),
(20, 'TÂN PHÚ', 9),
(21, 'PHƯỚC BÌNH', 9),
(22, 'CÁC XÃ PHƯỜNG KHÁC', 9);

-- --------------------------------------------------------

--
-- Table structure for table `quan`
--

DROP TABLE IF EXISTS `quan`;
CREATE TABLE IF NOT EXISTS `quan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` text COLLATE utf8_unicode_ci NOT NULL,
  `idtinh` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_quan_tinh` (`idtinh`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `quan`
--

INSERT INTO `quan` (`id`, `ten`, `idtinh`) VALUES
(1, 'Quận 1', 1),
(2, 'Quận 2', 1),
(3, 'Quận 3', 1),
(4, 'Quận 4', 1),
(5, 'Quận 5', 1),
(6, 'Quận 6', 1),
(7, 'Quận 7', 1),
(8, 'Quận 8', 1),
(9, 'Quận 9', 1),
(10, 'Quận 10', 1),
(11, 'Quận 11', 1),
(12, 'Quận 12', 1),
(13, 'Huyện Bình Chánh', 1),
(14, 'Quận Bình Tân', 1),
(15, 'Quận Bình Thạnh', 1),
(16, 'Huyện Cần Giờ', 1),
(17, 'Huyện Củ Chi', 1),
(18, 'Quận Gò Vấp', 1),
(19, 'Huyện Hóc Môn', 1),
(20, 'Huyện Nhà Bè', 1),
(21, 'Quận Phú Nhuận', 1),
(22, 'Quận Tân Bình', 1),
(23, 'Quận Tân Phú', 1),
(24, 'Quận Thủ Đức', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `ten`) VALUES
(1, 'Admin'),
(2, 'User'),
(4, 'Nhân viên');

-- --------------------------------------------------------

--
-- Table structure for table `tienich`
--

DROP TABLE IF EXISTS `tienich`;
CREATE TABLE IF NOT EXISTS `tienich` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tienich`
--

INSERT INTO `tienich` (`id`, `ten`) VALUES
(1, 'Đầy đủ tiện nghi'),
(2, 'Chỗ đậu xe hơi'),
(3, 'Sân vườn'),
(4, 'Hồ bơi'),
(5, 'Gần công viên'),
(6, 'Khu dân trí cao'),
(7, 'Gần bệnh viện '),
(8, 'An ninh');

-- --------------------------------------------------------

--
-- Table structure for table `tinh`
--

DROP TABLE IF EXISTS `tinh`;
CREATE TABLE IF NOT EXISTS `tinh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tinh`
--

INSERT INTO `tinh` (`id`, `ten`) VALUES
(1, 'TP Hồ Chí Minh'),
(2, 'Hà Nội'),
(3, 'Bình Dương'),
(4, 'Bình Thuận'),
(5, 'Cần Thơ'),
(6, 'Đà Nẵng'),
(7, 'Đăk Lăk'),
(8, 'Đồng Nai'),
(9, 'Lâm Đồng'),
(10, 'Vũng Tàu');

-- --------------------------------------------------------

--
-- Table structure for table `tinhtrangphaply`
--

DROP TABLE IF EXISTS `tinhtrangphaply`;
CREATE TABLE IF NOT EXISTS `tinhtrangphaply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tinhtrangphaply`
--

INSERT INTO `tinhtrangphaply` (`id`, `ten`) VALUES
(1, 'Chủ quyền tư nhân'),
(2, 'Đang hợp thức hoá'),
(3, 'Giấy tay'),
(4, 'Giấy tờ hợp lệ'),
(5, 'Hợp đồng'),
(6, 'Không xác định'),
(7, 'Sổ đỏ'),
(8, 'Sổ hồng');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` bit(1) NOT NULL,
  `diachi` text COLLATE utf8_unicode_ci NOT NULL,
  `sdt1` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdt2` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `ngaycapnhat` datetime DEFAULT NULL,
  `ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_taikhoan_role` (`role`),
  KEY `fk_taikhoan_level` (`level`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `email`, `hoten`, `gioitinh`, `diachi`, `sdt1`, `sdt2`, `role`, `level`, `status`, `ngaycapnhat`, `ip`) VALUES
(2, 'e10adc3949ba59abbe56e057f20f883e', 'phuc@gmail.com', 'phuc0903@gmail.com', b'0', 'gterte', '143242353425', '', 4, 4, 0, NULL, NULL),
(3, 'e10adc3949ba59abbe56e057f20f883e', 'phuc0903@gmail.com', 'FASFREWRWERW', b'0', 'fsadf', '1224324232', '', 4, 4, 0, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dichvu`
--
ALTER TABLE `dichvu`
  ADD CONSTRAINT `fk_dichvu` FOREIGN KEY (`donvitien`) REFERENCES `donvitien` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dichvu_donvidv` FOREIGN KEY (`donvidv`) REFERENCES `donvidichvu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dichvu_huong` FOREIGN KEY (`huongnha`) REFERENCES `huongnha` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dichvu_loaicanho` FOREIGN KEY (`loainha`) REFERENCES `loainha` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dichvu_loaidv` FOREIGN KEY (`loaidv`) REFERENCES `loaidichvu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dichvu_phaply` FOREIGN KEY (`phaply`) REFERENCES `tinhtrangphaply` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dichvu_phuong` FOREIGN KEY (`phuong`) REFERENCES `phuong` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dichvu_quan` FOREIGN KEY (`quan`) REFERENCES `quan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dichvu_tinh` FOREIGN KEY (`tinh`) REFERENCES `tinh` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dichvu_user` FOREIGN KEY (`chusohuu`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dichvu_tienich`
--
ALTER TABLE `dichvu_tienich`
  ADD CONSTRAINT `fk_canhotienich_canho` FOREIGN KEY (`idcanho`) REFERENCES `dichvu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vdtienich_tienich` FOREIGN KEY (`idtienich`) REFERENCES `tienich` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `fk_hinhanh_thongtinnhadat` FOREIGN KEY (`iddichvu`) REFERENCES `dichvu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `nhanvien_quyenhan`
--
ALTER TABLE `nhanvien_quyenhan`
  ADD CONSTRAINT `fk_nhanvien_quyenhan_nhanvien` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_nhanvien_quyenhan_quyenhan` FOREIGN KEY (`idquyenhan`) REFERENCES `quyenhansudung` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `phuong`
--
ALTER TABLE `phuong`
  ADD CONSTRAINT `fk_phuong_quan` FOREIGN KEY (`idquan`) REFERENCES `quan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `quan`
--
ALTER TABLE `quan`
  ADD CONSTRAINT `fk_quan_tinh` FOREIGN KEY (`idtinh`) REFERENCES `tinh` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_taikhoan_level` FOREIGN KEY (`level`) REFERENCES `level` (`idlevel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_taikhoan_role` FOREIGN KEY (`role`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;
