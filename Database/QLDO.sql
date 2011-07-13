-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 13, 2011 at 04:09 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET FOREIGN_KEY_CHECKS=0;
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
  `khanang` int(11) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `sonha` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
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
  KEY `fk_dichvu_donvidv` (`donvidv`),
  KEY `fk_dichvu_khanang` (`khanang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `dichvu`
--

INSERT INTO `dichvu` (`id`, `tieude`, `mota`, `chusohuu`, `phuong`, `quan`, `tinh`, `ngaydang`, `ngaycapnhat`, `duong`, `rong`, `dai`, `tang`, `sophongngu`, `sophongtam`, `giaban`, `donvitien`, `status`, `thoihantin`, `loainha`, `phaply`, `huongnha`, `khuyenmai`, `loaidv`, `donvidv`, `x`, `y`, `khanang`, `rank`, `sonha`) VALUES
(2, 'Bán căn hộ the everich Q11 gia rẻ vào ở ngay', 'qua ngon', 2, 4, 4, 2, '2010-02-03 00:00:00', NULL, 'truong chinh', 10, 25, 17, 3, 4, 32085000, 1, 2, 10, 2, 1, 1, 'Tặng nội thất vào ở ngay', 1, 2, NULL, NULL, NULL, NULL, '100/100'),
(3, 'Cần bán căn hộ Era Town Block B1 tầng 16, 67m2 giá 1,035 tỷ', NULL, 2, 4, 3, 2, '2010-02-04 00:00:00', NULL, 'lac long quan', 7, 9, 10, 3, 2, 123214, 1, 0, 12, 2, 1, 2, NULL, 1, 1, NULL, NULL, NULL, NULL, '100/100'),
(4, 'Bán căn hộ Khánh Hội 3', '<p>abc</p>', 2, 14, 9, 1, '2011-07-09 01:27:33', '0000-00-00 00:00:00', 'Nguyễn Trãi', 15, 5, 5, 5, 5, 100000000, 2, -1, 15, 1, 8, 8, 'Tặng nội thất vào ở ngay', 1, 1, '0', '0', 1, 0, '5'),
(7, 'Cần mua gấp 1 căn nhà', '<p>Mua gấp</p>', 2, 23, 25, 1, '2011-07-09 01:37:44', '0000-00-00 00:00:00', '', 0, 0, 0, 0, 0, 100000000000, 2, 1, 15, 1, 1, 1, '', 2, 1, '0', '0', 1, 0, ''),
(8, 'Cần bán nhà gấp 1 căn nhà ', '<p>Cần b&aacute;n nh&agrave; gấp 1 căn nh&agrave; </p>', 4, 15, 9, 1, '2011-07-10 09:48:02', '0000-00-00 00:00:00', 'Nguyễn Trãi', 15, 5, 0, 0, 0, 100000000000, 2, 0, 15, 1, 8, 5, 'không có', 1, 1, '0', '0', 1, 0, '32'),
(9, 'Cần cho  thuê nhà gấp', '<p>Cần cho&nbsp; thu&ecirc; nh&agrave; gấp</p>', 4, 17, 9, 1, '2011-07-10 10:40:36', '0000-00-00 00:00:00', 'Lê Văn Việt', 15, 5, 0, 0, 0, 100000000000, 2, 1, 15, 1, 1, 1, 'không có', 3, 1, '0', '0', 1, 0, '179/9'),
(10, 'Bán biệt thự The Garland, Q9. Giá bán 9,8tỷ', '<p>Cần b&aacute;n biệt thự The Garland do tập đo&agrave;n VinaCapital l&agrave;m chủ đầu tư.<br />\r\n<br />\r\nBiệt thự nằm trong khu quy hoạch đồng bộ, d&acirc;n tr&iacute; cao với vị tr&iacute; chiến lược giao thong thuận lợi:</p>\r\n<p>- C&aacute;ch trung t&acirc;m Quận 1 khoảng 7km.<br />\r\n-&nbsp; Kế cận trung t&acirc;m đ&ocirc; thị mới Thủ Thi&ecirc;m, Q.2.<br />\r\n- Nằm gần ng&atilde; tư đường Xa Lộ V&agrave;nh Đai Trong (lộ giới 67m) v&agrave; đường Li&ecirc;n Phường (lộ giới 30m).<br />\r\n- Gần đường cao tốc Vũng T&agrave;u &ndash; Long Th&agrave;nh (lộ giới 120m).<br />\r\n- Gần Khu C&ocirc;ng Nghệ Cao, Trường Đại Học Kinh Tế, v&agrave; c&aacute;c dự &aacute;n tương lai như khu TDTT Rạch Chiếc, s&acirc;n golf&hellip;<br />\r\nDiện t&iacute;ch khu&ocirc;n vi&ecirc;n rộng 293m2, diện t&iacute;ch x&acirc;y dựng 310m2, &nbsp;1 trệt + 2  lầu, với 3 mặt tiền đường, view nh&igrave;n s&ocirc;ng tho&aacute;ng m&aacute;t, trong l&agrave;nh. Kh&ocirc;ng  gian sống b&ecirc;n trong được thiết kế một c&aacute;ch khoa học, hợp l&yacute; tạo n&ecirc;n sự  linh họat, tiện &iacute;ch. Mặt trước của biệt thự được thiết h&igrave;nh khối ấn  tượng bằng c&aacute;c chất liệu hiện đại tạo vẻ sang trọng cho ng&ocirc;i nh&agrave; giữa  một kh&ocirc;ng gian thi&ecirc;n nhi&ecirc;n h&agrave;i h&ograve;a. Mặt sau của ng&ocirc;i nh&agrave; với lớp k&iacute;nh  phủ đầy v&agrave; cao mang &aacute;nh s&aacute;ng thi&ecirc;n nhi&ecirc;n tr&agrave;n ngập căn nh&agrave; .<br />\r\nHạ tầng kỹ thuật ho&agrave;n chỉnh v&agrave; hiện đại:<br />\r\n- Hệ thống giao th&ocirc;ng nội bộ trải b&ecirc; t&ocirc;ng nhựa.<br />\r\n- Hệ thống cấp điện, c&aacute;p viễn th&ocirc;ng, ADSL, truyền h&igrave;nh c&aacute;p.<br />\r\n- Hệ thống nước sinh hoạt: nước m&aacute;y th&agrave;nh phố.<br />\r\n- Hệ thống chiếu s&aacute;ng c&ocirc;ng cộng, c&ocirc;ng vi&ecirc;n c&acirc;y xanh.<br />\r\n- Hệ thống xử l&yacute; nước thải.<br />\r\nGi&aacute; b&aacute;n 9,8tỷ đ&atilde; bao gồm VAT v&agrave; tặng to&agrave;n bộ nội thất cao cấp, sang trọng, đầy đủ đến mức chỉ cần đem vali v&agrave;o l&agrave; ở ngay.<br />\r\nB&agrave;n giao to&agrave;n bộ biệt thự v&agrave;o Qu&yacute; 2/2011. Li&ecirc;n hệ Duy Tr&acirc;m 0904.516.045 để đi xem vị tr&iacute;.</p>', 2, 17, 9, 1, '2011-07-10 00:00:00', '0000-00-00 00:00:00', 'Nguyễn Xiền', 20, 10, 2, 5, 5, 9800000000, 2, 1, 15, 1, 8, 5, 'Khuyến mãi :Tặng toàn bộ nội thất cao cấp và sang trọng', 1, 1, '0', '0', 1, 1, '32'),
(11, 'Phố liên kế MT Bến Mễ Cốc, P.1, Q.8 ', '<p>B&aacute;n 2 căn nh&agrave; liền nhau (c&oacute; thể b&aacute;n từng căn một) thuộc khu nh&agrave; phố li&ecirc;n  kế MT Bến Mễ Cốc, P.15, Q.8. Đối diện ĐL Đ&ocirc;ng T&acirc;y. Cạnh dự &aacute;n KDC Rạch  L&agrave;o. DT mỗi căn 95m2 (5x19m). 1 trệt, 2 lầu. Nh&agrave; mới x&acirc;y năm 2011, giao  th&ocirc;. Đường nội bộ 6m. Tiện mở văn ph&ograve;ng, kinh doanh ... Gi&aacute; 2,8 tỷ/căn.  T&igrave;nh trạng hợp đồng, đ&atilde; thanh to&aacute;n 70%. Bao thủ tục sang t&ecirc;n giấy tờ.  LH:0989.353.828 A.Học</p>', 2, 27, 8, 1, '2011-07-10 00:00:00', '0000-00-00 00:00:00', 'Phạm Thế Hiển', 15, 10, 3, 0, 0, 2800000, 2, 1, 15, 2, 7, 5, '', 1, 1, '0', '0', 1, 1, '21'),
(12, 'Căn hộ Sông Đà Riverside', '<table class="propertydetailstable">\r\n    <tbody>\r\n        <tr class="alt">\r\n        </tr>\r\n        <tr class="alt">\r\n            <td colspan="4">\r\n            <div style="margin: 0in 0in 0pt; background: white"><span style="font-size: small;"><br />\r\n            </span></div>\r\n            <span style="font-size: small;">\r\n            <div style="margin: 0in 0in 0pt; background: none repeat scroll 0% 0% white;"><b><span style="color: rgb(1, 53, 103);">Căn hộ S&ocirc;ng Đ&agrave; Riverside, gi&aacute; gốc chủ đầu tư từ 13,9 triệu đồng/m2 &ndash; LH 0906 766 088</span></b></div>\r\n            </span>\r\n            <div style="margin: 0in 0in 10pt; background: white; vertical-align: top"><span style="font-size: small;"><b><span style="color: blue;">S&ocirc;ng Đ&agrave; Riverside</span></b><span style="color: rgb(52, 52, 52);">  c&oacute; vị tr&iacute; nằm tr&ecirc;n mặt tiền Quốc lộ 13 c&oacute; lộ giới 60m, c&aacute;ch trung t&acirc;m  quận 1, Tp.HCM khoảng 8km, gần chợ đầu mối Tam B&igrave;nh, trung t&acirc;m h&agrave;nh  ch&iacute;nh quận Thủ Đức, gần s&acirc;n golf 200ha v&agrave; bệnh viện quốc tế Việt Nam &ndash;  Singapore</span></span></div>\r\n            <div style="margin: 0in 0in 10pt; background: white; vertical-align: top"><span style="font-size: small;"><span style="color: rgb(52, 52, 52);">Dự &aacute;n </span><b><span style="color: blue;">S&ocirc;ng Đ&agrave; Riverside</span></b><span style="color: rgb(52, 52, 52);"> do CTCP Đầu tư ph&aacute;t triển S&ocirc;ng Đ&agrave; (SIC) l&agrave;m chủ đầu tư </span><span style="color: rgb(52, 52, 52);">v&agrave; đơn vị li&ecirc;n kết đầu tư l&agrave; C&ocirc;ng ty Cổ phần Quốc tế An Vui . </span><b><span style="color: blue;">S&ocirc;ng Đ&agrave; Riverside</span></b><span style="color: rgb(52, 52, 52);"> c&oacute; quy m&ocirc; 5 block chung cư cao 25 tầng nằm tr&ecirc;n khối đế thương mại dịch vụ; 2 tầng hầm (1 hầm ch&igrave;m + 1 hầm nổi).</span></span></div>\r\n            <div style="margin: 0in 0in 10pt; background: white; vertical-align: top"><span style="font-size: small;"><span style="color: rgb(52, 52, 52);">Diện t&iacute;ch khu đất  x&acirc;y dựng dự &aacute;n 28.168m2, mật độ x&acirc;y dựng kh&aacute; thấp 23,55%. Tổng diện t&iacute;ch  s&agrave;n 169.156m2, trong đ&oacute; s&agrave;n thương mại 7.926m2, s&agrave;n </span></span><span style="color: rgb(52,52,52); font-size: 16pt"><a href="http://thegioicanho.com/san-giao-dich/"><span style="font-size: small;">căn hộ </span></a><span style="font-size: small;">103.068m2. Tổng số </span><a href="http://thegioicanho.com/san-giao-dich/"><span style="font-size: small;">căn hộ </span></a></span><span style="font-size: small;"><span style="color: rgb(52, 52, 52);">của dự &aacute;n </span><b><span style="color: blue;">S&ocirc;ng Đ&agrave; Riverside</span></b><span style="color: rgb(52, 52, 52);"> 1.160 căn (c&oacute; 24 căn penthouse nằm tầng 25).</span></span></div>\r\n            <div style="margin: 0in 0in 10pt; background: white; vertical-align: top"><span style="font-size: small;"><span style="color: rgb(52, 52, 52);">Căn hộ </span><b><span style="color: blue;">S&ocirc;ng Đ&agrave; Riverside</span></b><span style="color: rgb(52, 52, 52);">  c&oacute; gi&aacute; thấp nhất từ 13,9 triệu đồng/m2 (chưa c&oacute; VAT), mức gi&aacute; cao nhất  l&agrave; 15,2 triệu đồng/m2 (chưa c&oacute; VAT). T&ugrave;y theo vị tr&iacute;&nbsp;mỗi loại </span></span><span style="color: rgb(52,52,52); font-size: 16pt"><a href="http://thegioicanho.com/san-giao-dich/"><span style="font-size: small;">căn hộ </span></a></span><span style="font-size: small;"><span style="color: rgb(52, 52, 52);">c&oacute; gi&aacute; kh&aacute;c nhau.</span></span></div>\r\n            <div style="text-align: justify; margin: 0in 0in 0pt"><span style="font-size: small;">Phương thức thanh to&aacute;n linh hoạt:</span></div>\r\n            <div style="text-align: justify; margin: 0in 0in 0pt"><span style="font-size: small;">Đợt 1: trong v&ograve;ng 07 ng&agrave;y kể từ ng&agrave;y giữ chỗ (bao gồm tiền giữ chỗ)&nbsp;15% . K&yacute; HĐ g&oacute;p vốn.</span></div>\r\n            <div style="text-align: justify; margin: 0in 0in 0pt"><span style="font-size: small;">Đợt 2: Xong phần hầm ch&igrave;m (th&aacute;ng 06/2011) , 10% , K&yacute; HĐ</span><span style="font-size: 16pt"><a href="http://thegioicanho.com/tim-mua/"><span style="font-size: small;"> mua </span></a></span><span style="font-size: small;">b&aacute;n</span></div>\r\n            <div style="text-align: justify; margin: 0in 0in 0pt"><span style="font-size: small;">Đợt 3: Xong th&ocirc; tầng 5 (th&aacute;ng 09/2011), 10%</span></div>\r\n            <div style="text-align: justify; margin: 0in 0in 0pt"><span style="font-size: small;">Đợt 4: Xong th&ocirc; tầng 10 (th&aacute;ng 12/2011), 10% </span></div>\r\n            <div style="text-align: justify; margin: 0in 0in 0pt"><span style="font-size: small;">Đợt 5: Xong th&ocirc; tầng 15 (th&aacute;ng 03/2012), TT 10%</span></div>\r\n            <div style="text-align: justify; margin: 0in 0in 0pt"><span style="font-size: small;">Đợt 6: Xong th&ocirc; tầng 20 (th&aacute;ng 06/2012), TT 10%</span></div>\r\n            <div style="text-align: justify; margin: 0in 0in 0pt"><span style="font-size: small;">Đợt 7: Xong th&ocirc; tầng 25 (th&aacute;ng 10/2012), TT 10%</span></div>\r\n            <div style="text-align: justify; margin: 0in 0in 0pt"><span style="font-size: small;">Đợt 8: Ho&agrave;n thiện xong từ tầng 12 đến tầng 25 (th&aacute;ng 06/2013); TT 10%</span></div>\r\n            <div style="text-align: justify; margin: 0in 0in 0pt"><span style="font-size: small;">Đợt 9: Nhận b&agrave;n giao </span><span style="font-size: 16pt"><a href="http://thegioicanho.com/san-giao-dich/"><span style="font-size: small;">căn hộ </span></a></span><span style="font-size: small;">(Qu&yacute; IV/2013); TT 10%+ 2% (ph&iacute; bảo tr&igrave;).</span></div>\r\n            <div style="text-align: justify; margin: 0in 0in 0pt"><span style="font-size: small;">Đợt 10: Nhận chủ quyền ; TT 5% ( sổ hồng)</span></div>\r\n            <div style="margin: 0in 0in 10pt; background: white; vertical-align: top"><span style="font-size: small;">&nbsp;</span></div>\r\n            <div style="text-align: justify; margin: 5pt 0in"><span style="font-size: small;"><i>Tìm hiểu th&ecirc;m th&ocirc;ng tin v&agrave; đặt</i></span><i><span style="font-size: 16pt"><a href="http://thegioicanho.com/tim-mua/"><span style="font-size: small;"> mua </span></a></span></i></div>\r\n            <span style="font-size: small;">\r\n            <div style="text-align: justify; margin: 5pt 0in;"><i>căn h&ocirc;̣ <b><span style="color: blue;">S&ocirc;ng Đ&agrave; Riverside</span></b>, vui l&ograve;ng li&ecirc;n hệ:</i></div>\r\n            </span><span style="font-size: smaller;">\r\n            <div style="text-align: justify; margin: 5pt 0in;">&nbsp;</div>\r\n            </span><span style="font-size: small;">                 </span>\r\n            <div style="text-align: justify; margin: 5pt 0in"><span style="font-size: small;"><b>Trần Thanh Nam</b> (bộ phận Kinh doanh dự &aacute;n)</span></div>\r\n            <div style="text-align: justify; margin: 5pt 0in"><span style="font-size: small;">Mobile:<b> 0906 766 088</b></span></div>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>', 2, 84, 2, 1, '2011-07-11 00:00:00', '0000-00-00 00:00:00', 'Bình Phú', 7, 10, 8, 2, 0, 13900000, 2, 0, 15, 2, 1, 9, '', 1, 1, '0', '0', 1, 1, '32'),
(13, 'Căn hộ Petroland mark Q2 giá gốc CĐT', '<p>Cần b&aacute;n <a href="http://thegioicanho.com/san-giao-dich/">căn hộ </a>cao cấp Petrovietnam landmark gi&aacute; gốc&nbsp; CĐT.</p>\r\n<p>Diện t&iacute;ch : 94-101-150 m2&nbsp; .Từ 2-3pn với gi&aacute; cả v&agrave; phương thức thanh to&aacute;n linh hoạt.</p>\r\n<p>Tiến độ : Đ&atilde; xong phần th&ocirc;</p>\r\n<p>Gi&aacute; : 20,3_23tr/m2&nbsp;</p>\r\n<p>Toạ lạc tr&ecirc;n trục đường đại lộ đ&ocirc;ng t&acirc;y trung t&acirc;m quận 2. Đ&acirc;y l&agrave; trục  giao th&ocirc;ng ch&iacute;nh v&agrave;o khu đ&ocirc; thị mới thủ thi&ecirc;m.Với nhiều tiện &iacute;ch l&acirc;n cận  huy tựu cộng đồng d&acirc;n cư m&ocirc;i trường sống hiện đại.</p>\r\n<p>LH : Hồng Phấn 0909.146.055 để được lựa chọn v&agrave; sở hữu <a href="http://thegioicanho.com/san-giao-dich/">căn hộ </a>với vị tr&iacute; đẹp &amp; gi&aacute; cả tốt nhất.</p>', 2, 84, 2, 1, '2011-07-11 00:00:00', '0000-00-00 00:00:00', 'Đỗ Xuân Hợp', 10, 10, 15, 2, 2, 2300000, 2, 1, 15, 2, 8, 1, '', 1, 1, '0', '0', 1, 1, '43');

-- --------------------------------------------------------

--
-- Table structure for table `dichvuvip`
--

DROP TABLE IF EXISTS `dichvuvip`;
CREATE TABLE IF NOT EXISTS `dichvuvip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iddichvu` int(11) DEFAULT NULL,
  `noidung` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngayguitin` date DEFAULT NULL,
  `ngaynangcap` date DEFAULT NULL,
  `thoihan` int(11) DEFAULT NULL COMMENT 'ngaydang: thoi diem tin vip duoc kich hoat\nthoihan: so ngay ton tai',
  `status` int(11) DEFAULT NULL COMMENT '0: disable\n1: avalable\n2: removed',
  PRIMARY KEY (`id`),
  KEY `fk_vip_dichvu` (`iddichvu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `dichvuvip`
--

INSERT INTO `dichvuvip` (`id`, `iddichvu`, `noidung`, `ngayguitin`, `ngaynangcap`, `thoihan`, `status`) VALUES
(1, 7, 'Cần mua nhà gấp', '2011-07-09', '0000-00-00', 2, 0),
(2, 7, 'Cần mua nhà gấp', '2011-07-09', '0000-00-00', 1, 0),
(3, 7, 'Thanh toán trực tiếp tại văn phòng', '2011-07-09', '0000-00-00', 90, 0),
(4, 7, 'Thanh toán trực tiếp tại văn phòng', '2011-07-09', '2011-07-09', 270, 0),
(5, 7, 'Thanh toán trực tiếp tại văn phòng', '2011-07-10', '2011-07-10', 90, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=54 ;

--
-- Dumping data for table `dichvu_tienich`
--

INSERT INTO `dichvu_tienich` (`id`, `idcanho`, `idtienich`) VALUES
(15, 4, 7),
(16, 4, 8),
(17, 7, 2),
(18, 7, 5),
(19, 7, 8),
(20, 8, 2),
(21, 8, 5),
(22, 8, 8),
(23, 9, 2),
(24, 9, 5),
(25, 9, 8),
(26, 10, 2),
(27, 10, 3),
(28, 10, 4),
(29, 10, 5),
(30, 10, 6),
(31, 10, 8),
(32, 11, 2),
(33, 11, 3),
(34, 11, 5),
(35, 11, 6),
(36, 11, 8),
(43, 13, 1),
(44, 13, 2),
(45, 13, 5),
(46, 13, 7),
(47, 13, 8),
(48, 12, 1),
(49, 12, 2),
(50, 12, 4),
(51, 12, 5),
(52, 12, 7),
(53, 12, 8);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Dumping data for table `hinhanh`
--

INSERT INTO `hinhanh` (`id`, `path`, `iddichvu`) VALUES
(6, 'images/upload/2/Picture_House/3344432.jpg', 4),
(7, 'images/upload/2/Picture_House/9715583.png', 4),
(8, 'images/upload/2/Picture_House/3390201.png', 4),
(9, 'images/upload/4/Picture_House/6367193.png', 8),
(10, 'images/upload/4/Picture_House/7790841.png', 8),
(11, 'images/upload/4/Picture_House/311894.jpg', 8),
(12, 'images/upload/4/Picture_House/5575873.png', 9),
(13, 'images/upload/4/Picture_House/443121.png', 9),
(14, 'images/upload/2/Picture_House/953553noibat4.jpg', 10),
(15, 'images/upload/2/Picture_House/845185noibat4_1.jpg', 10),
(16, 'images/upload/2/Picture_House/142457noibat4_2.jpg', 10),
(17, 'images/upload/2/Picture_House/466950noibat4_3.jpg', 10),
(18, 'images/upload/2/Picture_House/293549noibat3.jpg', 11),
(19, 'images/upload/2/Picture_House/951661noibat1_1.JPG', 11),
(20, 'images/upload/2/Picture_House/778748noibat4.jpg', 12),
(21, 'images/upload/2/Picture_House/291474noibat4_1.jpg', 12),
(22, 'images/upload/2/Picture_House/287964noibat4_2.jpg', 12),
(23, 'images/upload/2/Picture_House/827302noibat4_3.jpg', 12),
(24, 'images/upload/2/Picture_House/99427noibat4_4.jpg', 12),
(25, 'images/upload/2/Picture_House/557953noibat3.jpg', 13),
(26, 'images/upload/2/Picture_House/396729noibat3_1.jpg', 13),
(27, 'images/upload/2/Picture_House/495148noibat3_2.jpg', 13);

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
-- Table structure for table `khanang`
--

DROP TABLE IF EXISTS `khanang`;
CREATE TABLE IF NOT EXISTS `khanang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ten` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `khanang`
--

INSERT INTO `khanang` (`id`, `ten`) VALUES
(1, 'Thấp'),
(2, 'Cao'),
(3, 'Trung bình'),
(4, 'Đã mua 1'),
(5, 'Đã mua 2'),
(6, 'Đã bán 1'),
(7, 'Đã bán 2');

-- --------------------------------------------------------

--
-- Table structure for table `khenthuong`
--

DROP TABLE IF EXISTS `khenthuong`;
CREATE TABLE IF NOT EXISTS `khenthuong` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) DEFAULT NULL,
  `loai` int(11) DEFAULT NULL,
  `thuong` text,
  `nam` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_khenthuong_user` (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `khenthuong`
--

INSERT INTO `khenthuong` (`id`, `iduser`, `loai`, `thuong`, `nam`) VALUES
(1, 3, 1, 'tew', 2011);

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
(3, 'VIP', 'Tài khoản VIP'),
(4, 'Normal', 'Tài khoản thường'),
(5, 'Không có level', 'Không có level');

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

DROP TABLE IF EXISTS `lienhe`;
CREATE TABLE IF NOT EXISTS `lienhe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hoten` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdt` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `noidung` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `ngayguitin` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lienhe`
--

INSERT INTO `lienhe` (`id`, `hoten`, `sdt`, `email`, `diachi`, `noidung`, `ngayguitin`, `status`) VALUES
(1, 'Hồ Sơn Lâm', '0976 937 118', 'sieudangf2@yahoo.com', 'tp Hồ Chí Minh', '', '0000-00-00', 0),
(2, 'Nguyễn Thị Tuyết Phượng', '0976 937 118', 'phuong.nguyentuyet@yahoo.com', 'tp Hồ Chí Minh', '', '2011-07-10', 0);

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
(1, 'Biệt thự'),
(2, 'Căn hộ chung cư'),
(3, 'Căn hộ cao cấp'),
(4, 'Nhà phố'),
(5, 'Văn phòng cho thuê');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=85 ;

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
(22, 'CÁC XÃ PHƯỜNG KHÁC', 9),
(23, 'Không xác định', 25),
(24, 'Phường 1', 8),
(25, 'Phường 2', 8),
(26, 'Phường 3', 8),
(27, 'Phường 4', 8),
(28, 'Phường 5', 8),
(29, 'Phường 6', 8),
(30, 'Phường 7', 8),
(66, 'Phường 8', 8),
(67, 'Phường 9', 8),
(68, 'Phường 10', 8),
(69, 'Phường 11', 8),
(70, 'Phường 12', 8),
(71, 'Phường 13', 8),
(72, 'Phường 14', 8),
(73, 'Phường 15', 8),
(74, 'Phước Long A', 2),
(75, 'Phước Long B', 2),
(76, 'Cát Lái', 2),
(77, 'An Phú', 2),
(78, 'Bình Trưng Đông', 2),
(79, 'An Phú', 2),
(80, 'Tăng Nhơn Phú A', 2),
(81, 'Tăng Nhơn Phú B', 2),
(82, 'Bình Thọ', 2),
(83, 'Trường Thọ', 2),
(84, 'Phước Bình', 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

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
(24, 'Quận Thủ Đức', 1),
(25, 'Không xác định', 10);

-- --------------------------------------------------------

--
-- Table structure for table `quangcao`
--

DROP TABLE IF EXISTS `quangcao`;
CREATE TABLE IF NOT EXISTS `quangcao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chusohuu` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdt` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `ngaydang` date DEFAULT NULL,
  `sothang` int(11) DEFAULT NULL COMMENT 'thoi han la so thang quang cao ton tai',
  `hinhanh` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(300) NOT NULL,
  `status` tinyint(11) DEFAULT NULL COMMENT 'status: 1-available, 0-disable, -1-remove',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `quangcao`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `ten`) VALUES
(1, 'Admin'),
(2, 'Khách hàng'),
(3, 'Nhân viên'),
(4, 'Quản lý'),
(5, 'Kế toán');

-- --------------------------------------------------------

--
-- Table structure for table `thuchi`
--

DROP TABLE IF EXISTS `thuchi`;
CREATE TABLE IF NOT EXISTS `thuchi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sotien` float NOT NULL,
  `donvi` int(11) DEFAULT NULL,
  `congviec` text COLLATE utf8_unicode_ci,
  `ngay` date DEFAULT NULL,
  `nhanvien` int(11) DEFAULT NULL,
  `loai` bit(1) DEFAULT NULL COMMENT 'loai 0: thu\nloai 1: chi',
  PRIMARY KEY (`id`),
  KEY `fk_thuchi_user` (`nhanvien`),
  KEY `fk_thuchi_donvi` (`donvi`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `thuchi`
--

INSERT INTO `thuchi` (`id`, `sotien`, `donvi`, `congviec`, `ngay`, `nhanvien`, `loai`) VALUES
(2, 10000000, 2, 'Đăng quảng cáo', '2011-07-11', 11, b'0'),
(3, 5432, 2, 'rweqr', '2011-07-12', 3, b'1'),
(4, 5432, 2, 'rweqr', '2011-07-17', 3, b'1');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

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
(10, 'Vũng Tàu'),
(11, 'Không xác định');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `email`, `hoten`, `gioitinh`, `diachi`, `sdt1`, `sdt2`, `role`, `level`, `status`, `ngaycapnhat`, `ip`) VALUES
(1, 'e10adc3949ba59abbe56e057f20f883e', 'admin@yahoo.com', 'Administrator', b'1', '36/15 Bình Giã, P.13, Q.Tân Bình, Tp.HCM', '0934100286', '', 1, 0, 1, NULL, NULL),
(2, 'e10adc3949ba59abbe56e057f20f883e', 'phuc0903@gmail.com', 'TRẦN THỊ KIM DUNG', b'0', 'fsadf', '1224324232', '', 2, 3, 1, NULL, NULL),
(3, 'e10adc3949ba59abbe56e057f20f883e', 'thinh.nguyenduc2@gameloft.com', 'NGUYỄN ĐỨC THỊNH', b'1', '36/15 Bình Giã, P.13, Q.Tân Bình, Tp.HCM', '0934.100286', NULL, 3, 1, 1, '2011-07-14 15:32:46', NULL),
(4, 'e10adc3949ba59abbe56e057f20f883e', 'lam.hoson@gameloft.com', 'HỒ SƠN LÂM', b'1', '123 Hồng Đào Phố Thị, Hà Nội', '01234567672', '', 4, 0, 1, '2011-07-10 00:00:00', NULL),
(5, 'e10adc3949ba59abbe56e057f20f883e', 'phuong.dothithuy@yahoo.com', 'ĐỖ THỊ THỦY PHƯƠNG', b'0', '45/12/8 Phạm Ngọc Thạch, Q.1, Tp.HCM', '0908348399', NULL, 5, 0, 1, '2011-07-27 15:40:10', NULL),
(6, 'e10adc3949ba59abbe56e057f20f883e', 'ducthinh100286@yahoo.com', 'CAO THÁI SƠN', b'1', '45/12/8 Phạm Ngọc Thạch, Q.1, Tp.HCM', '0908348399', NULL, 3, 1, 1, '2011-07-27 15:40:10', NULL),
(7, 'e10adc3949ba59abbe56e057f20f883e', 'xinkute@yahoo.com', 'JOHN HONG', b'1', '45/12/8 Phạm Ngọc Thạch, Q.1, Tp.HCM', '0908348399', NULL, 3, 1, 1, '2011-07-27 15:40:10', NULL),
(8, 'e10adc3949ba59abbe56e057f20f883e', 'khunglongcon2011@yahoo.com', 'LINDA TRẦN', b'0', '45/12/8 Phạm Ngọc Thạch, Q.1, Tp.HCM', '0908348399', NULL, 2, 4, 1, '2011-07-27 15:40:10', NULL),
(9, 'e10adc3949ba59abbe56e057f20f883e', 'phamthimydiem@yahoo.com', 'MR. PHẠM VĂN HAI', b'1', '45/12/8 Phạm Ngọc Thạch, Q.1, Tp.HCM', '0908348399', NULL, 2, 3, 1, '2011-07-27 15:40:10', NULL),
(10, 'e10adc3949ba59abbe56e057f20f883e', '111Yhac_ii@yahoo.com', 'TRIỆU MẪN', b'0', '45/12/8 Phạm Ngọc Thạch, Q.1, Tp.HCM', '0908348399', NULL, 3, 2, 1, '2011-07-27 15:40:10', NULL),
(11, 'e10adc3949ba59abbe56e057f20f883e', 'tatataa.cye@yahoo.com', 'TRẦN THỊ THÚY PHƯƠNG', b'0', '45/12/8 Phạm Ngọc Thạch, Q.1, Tp.HCM', '0908348399', NULL, 3, 2, 1, '2011-07-27 15:40:10', NULL),
(12, 'e10adc3949ba59abbe56e057f20f883e', '45hh44_DD@yahoo.com', 'THÚY KIỀU', b'1', '45/12/8 Phạm Ngọc Thạch, Q.1, Tp.HCM', '0908348399', NULL, 2, 4, 1, '2011-07-27 15:40:10', NULL),
(13, 'e10adc3949ba59abbe56e057f20f883e', 'thuy.dongphuong@yahoo.com', 'NGUYỄN THÁI HỌC', b'0', '45/12/8 Phạm Ngọc Thạch, Q.1, Tp.HCM', '0908348399', NULL, 5, 0, 1, '2011-07-27 15:40:10', NULL),
(14, 'e10adc3949ba59abbe56e057f20f883e', 'nhahangdongkhanh@yahoo.com', 'TRẦN THỊ MỸ ÁI', b'0', '45/12/8 Phạm Ngọc Thạch, Q.1, Tp.HCM', '0908348399', NULL, 3, 1, 1, '2011-07-27 15:40:10', NULL),
(15, 'e10adc3949ba59abbe56e057f20f883e', '__DD_DD@yahoo.com', 'KARATIMO MISSIBLE', b'0', '45/12/8 Phạm Ngọc Thạch, Q.1, Tp.HCM', '0908348399', NULL, 4, 0, 1, '2011-07-27 15:40:10', NULL),
(18, 'e10adc3949ba59abbe56e057f20f883e', 'hoaphuonhtit@gmail.com', 'VŨ HÒA PHƯƠNG', b'0', '', '0976 937 118', '', 4, 5, 1, '2011-07-10 00:00:00', ''),
(19, 'e10adc3949ba59abbe56e057f20f883e', 'abc@yahoo.com', 'HỒ SƠN LÂM', b'1', 'Trường CHinh', '1234567890', '', 2, 4, 0, '2011-07-10 00:00:00', '192.168.1.22');

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
  ADD CONSTRAINT `fk_dichvu_khanang` FOREIGN KEY (`khanang`) REFERENCES `khanang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dichvu_loaicanho` FOREIGN KEY (`loainha`) REFERENCES `loainha` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dichvu_loaidv` FOREIGN KEY (`loaidv`) REFERENCES `loaidichvu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dichvu_phaply` FOREIGN KEY (`phaply`) REFERENCES `tinhtrangphaply` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dichvu_phuong` FOREIGN KEY (`phuong`) REFERENCES `phuong` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dichvu_quan` FOREIGN KEY (`quan`) REFERENCES `quan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dichvu_tinh` FOREIGN KEY (`tinh`) REFERENCES `tinh` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dichvu_user` FOREIGN KEY (`chusohuu`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `dichvuvip`
--
ALTER TABLE `dichvuvip`
  ADD CONSTRAINT `fk_vip_dichvu` FOREIGN KEY (`iddichvu`) REFERENCES `dichvu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `khenthuong`
--
ALTER TABLE `khenthuong`
  ADD CONSTRAINT `fk_khenthuong_user` FOREIGN KEY (`iduser`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `thuchi`
--
ALTER TABLE `thuchi`
  ADD CONSTRAINT `fk_thuchi_donvi` FOREIGN KEY (`donvi`) REFERENCES `donvitien` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_thuchi_user` FOREIGN KEY (`nhanvien`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;
