-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 22, 2024 lúc 01:47 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web2`
--
CREATE DATABASE IF NOT EXISTS `web2` DEFAULT CHARACTER SET utf8 COLLATE utf8_vietnamese_ci;
USE `web2`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `MaND` varchar(10) NOT NULL,
  `SĐT` int(10) NOT NULL,
  `MaQuyen` varchar(10) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `CreTime` datetime NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`MaND`, `SĐT`, `MaQuyen`, `Status`, `CreTime`, `Password`) VALUES
('Admin', 123456789, '001', 'Đang hoạt động', '2024-03-22 07:20:33', 'Admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `categoryId` varchar(10) NOT NULL,
  `categoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`categoryId`, `categoryName`) VALUES
('003', 'FryChicken'),
('004', 'Drink'),
('001', 'Hamburger'),
('002', 'Pizza');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MaHoadon` varchar(10) NOT NULL,
  `MaSP` varchar(10) NOT NULL,
  `SoLuong` int(100) NOT NULL,
  `DonGia` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietkhuyenmai`
--

CREATE TABLE `chitietkhuyenmai` (
  `MaS` varchar(10) NOT NULL,
  `MaKM` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietphieunhap`
--

CREATE TABLE `chitietphieunhap` (
  `MaNK` varchar(10) NOT NULL,
  `MaSP` varchar(10) NOT NULL,
  `SoLuong` int(10) NOT NULL,
  `DonGia` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietquyen`
--

CREATE TABLE `chitietquyen` (
  `MaChucnang` varchar(10) NOT NULL,
  `MaQuyen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucnang`
--

CREATE TABLE `chucnang` (
  `MaChucnang` varchar(10) NOT NULL,
  `TenChucnang` varchar(50) NOT NULL,
  `Active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgiasanpham`
--

CREATE TABLE `danhgiasanpham` (
  `MaND` varchar(10) NOT NULL,
  `MaSP` varchar(10) NOT NULL,
  `NDDanhGIa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaohang`
--

CREATE TABLE `giaohang` (
  `MaHoadon` varchar(10) NOT NULL,
  `Diachi` varchar(70) NOT NULL,
  `TTGiao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHoadon` varchar(10) NOT NULL,
  `TongTien` int(15) NOT NULL,
  `MaUser` varchar(10) NOT NULL,
  `CreTime` datetime NOT NULL,
  `TTHoaDon` varchar(20) NOT NULL,
  `TTThanhToan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `MaKM` varchar(10) NOT NULL,
  `MaSP` varchar(10) NOT NULL,
  `TLGiam` varchar(5) NOT NULL,
  `NgayKT` datetime NOT NULL,
  `NgayAD` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MaNCC` varchar(10) NOT NULL,
  `TenNCC` varchar(50) NOT NULL,
  `DiaCHi` varchar(70) NOT NULL,
  `SDT` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `MaNK` varchar(10) NOT NULL,
  `NgayNK` datetime NOT NULL,
  `MaUser` varchar(10) NOT NULL,
  `TongTien` int(10) NOT NULL,
  `MaNCC` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `MaSP` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `TenSP` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `SoLuongSP` int(100) NOT NULL,
  `GiaSP` int(10) NOT NULL,
  `TTSP` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `IMG` varchar(100) NOT NULL,
  `categoryId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`MaSP`, `TenSP`, `SoLuongSP`, `GiaSP`, `TTSP`, `IMG`, `categoryId`) VALUES
('B01', 'Hamburger Cá hồi vỏ than tre', 100, 50000, '', 'b1_cahoigionvothantre.jpg', '001'),
('B02', 'Hamburger Bò nướng Whopper', 100, 65000, '', 'b2_bonuongwhopper.jpg', '001'),
('B03', 'Hamburger Cá giòn', 100, 45000, '', 'b3_cagion.jpg', '001'),
('B04', 'Hamburger Bò nướng hành chiên', 100, 70000, '', 'b4_bonuonghanhchien.jpg', '001'),
('B05', 'Hamburger Gà giòn cay', 100, 55000, '', 'b5_gagioncay.jpg', '001'),
('B06', 'Hamburger Gà nướng', 100, 55000, '', 'b6_ganuong.jpg', '001'),
('B07', 'Hamburger Bò tắm phô mai', 100, 75000, '', 'b7_botamphomai.jpg', '001'),
('B08', 'Hamburger Bò phô mai & thịt xông khói', 100, 75000, '', 'b8_bophomaithitxongkhoi.jpg', '001'),
('B09', 'Hamburger Bò nướng phô mai', 100, 69000, '', 'b9_bonuongphomaijpg.jpg', '001'),
('B10', 'Hamburger Gà phô mai sốt BBQ', 100, 60000, '', 'b10_gaphomaisitbbq.jpg', '001'),
('B11', 'Hamburger Whopper phô mai & thịt xông khói', 100, 89000, '', 'b11_whopperphomaithitxongkhoi.jpg', '001'),
('B12', 'Hamburger Double whopper', 100, 80000, '', 'b12_doublewhopper.jpg', '001'),
('B13', 'Hamburger 2 miếng bò nướng phô mai', 100, 75000, '', 'b13_2miengbonuongphomai.jpg', '001'),
('B14', 'Hamburger 2 miếng bò phô mai & thịt xông khói', 100, 100000, '', 'b14_2miengbophomaithitxongkhoi.jpg', '001'),
('C01', '1 Miếng gà BBQ', 100, 3000, '', 'c1_1mienggabbq.jpg', '003'),
('C02', '1 Miếng gà giòn - Crispy', 100, 35000, '', 'c2_1mienggagioncrispy.jpg', '003'),
('C03', '1 Miếng gà giòn cay - Flaming', 100, 30000, '', 'c3_1mienggaflamingioncay.jpg', '003'),
('C04', 'Mix-wing-2', 100, 40000, '', 'c4_mixwing2pcs.jpg', '003'),
('C05', 'Mix-wing-6', 100, 100000, '', 'c5_mixwing6pcs.jpg', '003'),
('C06', 'Mix-wing-4', 100, 70000, '', 'c6_mixwing4pcs.jpg', '003'),
('C07', 'Combo 3 cánh gà BBQ & khoai tây chiên & 1 đồ uống', 100, 79000, '', 'c7_cb3canhgabbq_khoaitaychien_1douong.jpg', '003'),
('C08', 'Combo 3 miếng gà ráng giòn cay & 1 khoai ty & 1 nư', 100, 89000, '', 'c8_cb3mienggarangioncay_1khoaitaychien_1nuoc.jpg', '003'),
('C09', 'Combo 2 cánh gà BB & 1 khoai tây & 1 đồ uống', 100, 69000, '', 'c9_cb2canhgabbq_1khoaitaychien_1douong.jpg', '003'),
('C10', 'Combo 2 gà giòn không cay & 1 khoai tây chiên & 1 ', 100, 69000, '', 'c10_cb2gagionkhongcay_1khoaitaychien_1douong.jpg', '003'),
('C11', 'Combo 2 miếng gà giòn cay & 1 khoai tây chiên & 1 ', 100, 69000, '', 'c11_2mienggagioncay_1khoaitaychien_1nuoc.jpg', '003'),
('C12', 'Combo 1 gà giòn không cay & 1 khoai tây & 1đồ uống', 100, 49000, '', 'c12_cbgagionkhongcay_1khoaitaychien_1douong.jpg', '003'),
('P01', 'Pizza phô mai truyền thống - cheese mania', 100, 56000, '', 'p1_phomaitruyenthong_cheesemania.jpg', '002'),
('P02', 'Pizza dăm bông dứa kiểu Hawaii', 100, 65000, '', 'p2_dambong_dua_kieuhawaii.jpg', '002'),
('P03', 'Pizza gà xốt tương kiểu nhật Teriyaki', 100, 75000, '', 'p3-Ga-Xot-Tuong-Kieu-Nhat-Teriyaki-Chicken.jpg', '002'),
('P04', 'Pizza xúc xích Ý - Pepperoni feast', 100, 50000, '', 'p4_Pepperoni-feast-Pizza-Xuc-Xich-Y.jpg', '002'),
('P05', 'Pizza 5 loại thịt thượng hạng', 100, 120000, '', 'p5_Meat-lover-Pizza-5-Loai-Thit-Thuong-Hang.jpg', '002'),
('P06', 'Pizza Rau củ thập cẩm - Veggie mania', 100, 50000, '', 'p6_Veggie-mania-Pizza-Rau-Cu-Thap-Cam.jpg', '002'),
('P07', 'Pizza Thập cẩm thượng hạng - Extravaganza', 100, 150000, '', 'p7_Pizza-Thap-Cam-Thuong-Hang-Extravaganza.jpg', '002'),
('P08', 'Pizza Ngập vị phô mai hảo hạng - cheese madness', 100, 79000, '', 'p8_ngapviphomaihaohang_cheesymadness.jpg', '002'),
('P09', 'Pizza Gà phô mai & thịt heo xông khói - cheese chicken bacon', 100, 99000, '', 'p9_Pizza-Ga-Pho-Mai-Thit-Heo-Xong-Khoi-Cheesy-Chicken-Bacon.jpg', '002'),
('P10', 'Pizza Xúc xích phô mai - sausage kid maina', 100, 79000, '', 'p10_xucxichphomai_sausagekidmania.jpg', '002'),
('P11', 'Pizza Hải sản sốt cà chua - Seafood delight', 100, 145000, '', 'p11_Pizza-Hai-San-Xot-Ca-Chua-Seafood-Delight.jpg', '002'),
('P12', 'Pizza Hải sản nhiệt đới sốt tiêu ', 100, 149000, '', 'p12_Pizzaminsea-Hai-San-Nhiet-Doi-Xot-Tieu.jpg', '002'),
('P13', 'Pizza Hải sản sốt Mayonnaise', 100, 199000, '', 'p13_Pizza-Hai-San-Xot-Mayonnaise-Ocean-Mania.jpg', '002'),
('P14', 'Pizza Bò & Tôm nướng kiểu Mỹ', 100, 249000, '', 'p14Surf-turf-Pizza-Bo-Tom-Nuong-Kieu-My-1.jpg', '002'),
('D01', '1 chai Coca-cola 390ml', 100, 20000, '', 'd1_chaicoca-cola-390ml.jpg', '004'),
('D02', '1 Chai Fanta 390ml', 100, 20000, '', 'd2_fanta-390.jpg', '004'),
('D03', '1 Chai Sprite 390ml', 100, 2000, '', 'd3_Sprite-390.jpg', '004'),
('D04', '1 Chai coca-cola Zero', 100, 30000, '', 'd4_cocacola-coke-zero.jpg', '004'),
('D05', '1 Chai Coca-cola 1.5L', 100, 35000, '', 'd5_coke-1.5.jpg', '004'),
('D06', '1 Chai Coca-cola không đường', 100, 25000, '', 'd6_zerosugar-coke-1.5-new-new.png', '004'),
('D07', '1 Chai Sprite 1.5L', 100, 35000, '', 'd7_Sprite-1.5L.jpg', '004'),
('D08', '1 Chai Fanta 1.5L', 100, 35000, '', 'd8_fanta-1.5.jpg', '004'),
('D09', '1 Trà đào hạt chia ', 100, 35000, '', 'd9_tra-dao-hat-chia.jpg', '004'),
('D10', '1 Chai Fuzetea+ Chanh dây hạt chia', 100, 25000, '', 'd10_Fuzetea+-Chanh-Day-hatchia-350ml-new-new.png', '004'),
('D11', '1 Chai Daisani', 100, 20000, '', 'd11_daisani.jpg', '004'),
('D12', '1 Chai Dasani 1.5L', 100, 35000, '', 'd12_dasani-1l5-new.png', '004');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `MaTK` varchar(10) NOT NULL,
  `TenQuyen` varchar(50) NOT NULL,
  `MaQuyen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `MaND` varchar(10) NOT NULL,
  `categoryND` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
