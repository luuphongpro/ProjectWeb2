-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2024 at 03:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web2`
--
CREATE DATABASE IF NOT EXISTS `web2` DEFAULT CHARACTER SET utf8 COLLATE utf8_vietnamese_ci;
USE `web2`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `TenND` varchar(10) DEFAULT NULL,
  `SĐT` varchar(10) NOT NULL,
  `MaQuyen` varchar(10) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `CreTime` datetime NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`TenND`, `SĐT`, `MaQuyen`, `Status`, `CreTime`, `Password`) VALUES
('Admin', '0123456789', 'ADMIN', 'Đang hoạt động', '2024-03-30 08:36:38', 'Admin@');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` varchar(10) NOT NULL,
  `categoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `categoryName`) VALUES
('003', 'FryChicken'),
('004', 'Drink'),
('001', 'Hamburger'),
('002', 'Pizza');

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MaHoadon` varchar(10) NOT NULL,
  `MaSP` varchar(10) NOT NULL,
  `SoLuong` int(100) NOT NULL,
  `DonGia` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chitietkhuyenmai`
--

CREATE TABLE `chitietkhuyenmai` (
  `MaSP` varchar(10) NOT NULL,
  `MaKM` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chitietphieunhap`
--

CREATE TABLE `chitietphieunhap` (
  `MaNK` varchar(10) NOT NULL,
  `MaSP` varchar(10) NOT NULL,
  `SoLuong` int(10) NOT NULL,
  `DonGia` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chitietquyen`
--

CREATE TABLE `chitietquyen` (
  `MaChucnang` varchar(10) NOT NULL,
  `MaQuyen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `chitietquyen`
--

INSERT INTO `chitietquyen` (`MaChucnang`, `MaQuyen`) VALUES
('CN01', 'ADMIN'),
('CN02', 'ADMIN'),
('CN03', 'ADMIN'),
('CN04', 'ADMIN'),
('CN05', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `chucnang`
--

CREATE TABLE `chucnang` (
  `MaChucnang` varchar(10) NOT NULL,
  `TenChucnang` varchar(50) NOT NULL,
  `Active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `chucnang`
--

INSERT INTO `chucnang` (`MaChucnang`, `TenChucnang`, `Active`) VALUES
('CN01', 'Quản lý mã giảm giá', 1),
('CN02', 'Quản lý sản phẩm', 1),
('CN03', 'Quản lý tài khoản', 1),
('CN04', 'Quản lý phân quyền', 1),
('CN05', 'Báo cáo thống kê', 1);

-- --------------------------------------------------------

--
-- Table structure for table `danhgiasanpham`
--

CREATE TABLE `danhgiasanpham` (
  `MaND` varchar(10) NOT NULL,
  `MaSP` varchar(10) NOT NULL,
  `NDDanhGIa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giaohang`
--

CREATE TABLE `giaohang` (
  `MaHoadon` varchar(10) NOT NULL,
  `Diachi` varchar(70) NOT NULL,
  `TTGiao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
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
-- Table structure for table `khuyenmai`
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
-- Table structure for table `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MaNCC` varchar(10) NOT NULL,
  `TenNCC` varchar(50) NOT NULL,
  `DiaCHi` varchar(70) NOT NULL,
  `SDT` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phieunhap`
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
-- Table structure for table `product`
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
-- Dumping data for table `product`
--

INSERT INTO `product` (`MaSP`, `TenSP`, `SoLuongSP`, `GiaSP`, `TTSP`, `IMG`, `categoryId`) VALUES
('B01', 'Hamburger Cá hồi vỏ than tre', 100, 50000, 'Hamburger Cá hồi vỏ than tre kết hợp cá hồi tươi với vỏ than tre giòn. Vị đậm đà của cá hồi hòa quyện với hương thơm tự nhiên của than tre, tạo nên trải nghiệm ẩm thực độc đáo. Nguyên liệu tự nhiên, k', 'b1_cahoigionvothantre.jpg', '001'),
('B02', 'Hamburger Bò nướng Whopper', 100, 65000, 'Hamburger Bò nướng Whopper: Khoai tây lát, 100% thịt bò nướng tươi, cà chua, hành tây, dưa leo, sốt mayonnaise và ketchup, bánh mì mềm giòn. Một trải nghiệm hương vị tuyệt vời, bổ dưỡng và đầy đủ dinh', 'b2_bonuongwhopper.jpg', '001'),
('B03', 'Hamburger Cá giòn', 100, 45000, 'Hamburger Cá giòn: Miếng cá tươi, phủ lớp vỏ giòn, rau xanh tươi, sốt đặc biệt, bánh mì mềm. Kết hợp hương vị cá tươi và giòn của lớp vỏ, tạo ra một trải nghiệm ẩm thực độc đáo, bổ dưỡng và thú vị.', 'b3_cagion.jpg', '001'),
('B04', 'Hamburger Bò nướng hành chiên', 100, 70000, 'Hamburger Bò nướng hành chiên: 100% thịt bò nướng tươi, hành chiên giòn, rau xanh, cà chua, sốt mayonnaise và ketchup, bánh mì mềm. Hương vị cân bằng, phong phú và hấp dẫn.', 'b4_bonuonghanhchien.jpg', '001'),
('B05', 'Hamburger Gà giòn cay', 100, 55000, '\r\nHamburger Gà giòn cay: Miếng gà tươi giòn, phủ lớp sốt cay đặc biệt, rau xanh tươi, cà chua, sốt mayonnaise, bánh mì mềm giòn. Kết hợp hương vị cay nồng và giòn rụm, tạo nên trải nghiệm thú vị và ng', 'b5_gagioncay.jpg', '001'),
('B06', 'Hamburger Gà nướng', 100, 55000, 'Hamburger Gà nướng: Miếng gà nướng tươi, rau xanh, cà chua, sốt mayonnaise và ketchup, bánh mì mềm giòn. Hương vị đậm đà của gà nướng kết hợp với các thành phần tươi ngon, tạo nên một trải nghiệm ẩm t', 'b6_ganuong.jpg', '001'),
('B07', 'Hamburger Bò tắm phô mai', 100, 75000, 'Hamburger Bò tắm phô mai: 100% thịt bò, phô mai tan chảy, rau xanh, cà chua, sốt mayonnaise và ketchup, bánh mì mềm giòn. Hương vị đặc trưng và thơm ngon, một lựa chọn ngon miệng và bổ dưỡng.', 'b7_botamphomai.jpg', '001'),
('B08', 'Hamburger Bò phô mai & thịt xông khói', 100, 75000, 'Hamburger Bò phô mai & thịt xông khói: 100% thịt bò, phô mai tan chảy, lớp thịt xông khói, rau xanh, cà chua, sốt BBQ, bánh mì mềm giòn. Hương vị đậm đà, cân bằng giữa phô mai béo và thịt xông khói đặ', 'b8_bophomaithitxongkhoi.jpg', '001'),
('B09', 'Hamburger Bò nướng phô mai', 100, 69000, 'Hamburger Bò nướng phô mai: 100% thịt bò nướng tươi, phô mai tan chảy, rau xanh, cà chua, sốt mayonnaise và ketchup, bánh mì mềm giòn. Hương vị đậm đà, cùng sự kết hợp độc đáo của phô mai thơm béo và ', 'b9_bonuongphomaijpg.jpg', '001'),
('B10', 'Hamburger Gà phô mai sốt BBQ', 100, 60000, 'Hamburger Gà phô mai sốt BBQ: Miếng gà tươi, phủ lớp phô mai tan chảy, sốt BBQ đặc biệt, rau xanh, cà chua, bánh mì mềm giòn. Hương vị độc đáo, cay nồng của sốt BBQ kết hợp với phô mai thơm ngon, tạo ', 'b10_gaphomaisitbbq.jpg', '001'),
('B11', 'Hamburger Whopper phô mai & thịt xông khói', 100, 89000, 'Hamburger Whopper phô mai & thịt xông khói: Thịt bò xông khói, phô mai tan chảy, rau xanh, cà chua, sốt mayonnaise và ketchup, bánh mì mềm giòn. Hương vị đậm đà, hấp dẫn và cân bằng giữa phô mai béo v', 'b11_whopperphomaithitxongkhoi.jpg', '001'),
('B12', 'Hamburger Double whopper', 100, 80000, 'Hamburger Double Whopper: Hai lớp thịt bò tươi, phủ lớp phô mai tan chảy, rau xanh, cà chua, sốt mayonnaise và ketchup, bánh mì mềm giòn. Hương vị mạnh mẽ, ngon miệng và bổ dưỡng.', 'b12_doublewhopper.jpg', '001'),
('B13', 'Hamburger 2 miếng bò nướng phô mai', 100, 75000, 'Hamburger 2 miếng bò nướng phô mai: Hai miếng thịt bò nướng tươi, phủ lớp phô mai tan chảy, rau xanh, cà chua, sốt mayonnaise và ketchup, bánh mì mềm giòn. Hương vị ngon lành, bổ dưỡng và đậm đà.', 'b13_2miengbonuongphomai.jpg', '001'),
('B14', 'Hamburger 2 miếng bò phô mai & thịt xông khói', 100, 100000, 'Hamburger 2 miếng bò phô mai & thịt xông khói: Hai lớp thịt bò xông khói, phủ phô mai tan chảy, rau xanh, cà chua, sốt mayonnaise và ketchup, bánh mì mềm giòn. Hương vị đặc trưng, hấp dẫn và béo ngậy.', 'b14_2miengbophomaithitxongkhoi.jpg', '001'),
('C01', '1 Miếng gà BBQ', 100, 3000, 'Gà BBQ: Miếng gà tươi, nướng chín mềm, phủ sốt BBQ đặc biệt, thơm ngon và cay nồng, dùng kèm khoai tây chiên hoặc salad tươi. Một món ăn ngon miệng và bổ dưỡng.', 'c1_1mienggabbq.jpg', '003'),
('C02', '1 Miếng gà giòn - Crispy', 100, 35000, 'Gà giòn - Crispy: Miếng gà tươi, chiên giòn, bề mặt vàng óng, bên trong mềm thơm, dùng kèm sốt tùy chọn và salad tươi. Một lựa chọn ngon miệng và hấp dẫn.', 'c2_1mienggagioncrispy.jpg', '003'),
('C03', '1 Miếng gà giòn cay - Flaming', 100, 30000, '\r\nGà giòn cay - Flaming: Miếng gà tươi, chiên giòn, phủ lớp sốt cay đặc biệt, tạo nên hương vị nồng nàn và cay nồng đặc trưng. Một lựa chọn thú vị và đậm đà.', 'c3_1mienggaflamingioncay.jpg', '003'),
('C04', 'Mix-wing-2', 100, 40000, '\r\nMix-wing-2: Một đĩa đặc biệt với nhiều loại cánh gà chiên hoặc nướng, bao gồm cả cánh gà giòn, cánh gà cay, cánh gà tỏi, và các loại sốt tùy chọn. Một sự kết hợp đa dạng và thú vị cho bữa tiệc hoặc ', 'c4_mixwing2pcs.jpg', '003'),
('C05', 'Mix-wing-6', 100, 100000, 'Một đĩa đặc biệt với nhiều loại cánh gà chiên hoặc nướng, bao gồm cả cánh gà giòn, cánh gà cay, cánh gà tỏi, và các loại sốt tùy chọn. Một sự kết hợp đa dạng và thú vị cho bữa tiệc hoặc thưởng thức cá', 'c5_mixwing6pcs.jpg', '003'),
('C06', 'Mix-wing-4', 100, 70000, 'Một đĩa đặc biệt với nhiều loại cánh gà chiên hoặc nướng, bao gồm cả cánh gà giòn, cánh gà cay, cánh gà tỏi, và các loại sốt tùy chọn. Một sự kết hợp đa dạng và thú vị cho bữa tiệc hoặc thưởng thức cá', 'c6_mixwing4pcs.jpg', '003'),
('C07', 'Combo 3 cánh gà BBQ & khoai tây chiên & 1 đồ uống', 100, 79000, 'Combo 3 cánh gà BBQ & khoai tây chiên & 1 đồ uống bao gồm ba cánh gà được nướng với sốt BBQ đặc biệt, kèm theo khoai tây chiên giòn và một đồ uống tùy chọn, như nước ngọt hoặc nước ép trái cây. Một sự', 'c7_cb3canhgabbq_khoaitaychien_1douong.jpg', '003'),
('C08', 'Combo 3 miếng gà ráng giòn cay & 1 khoai ty & 1 nước', 100, 89000, 'Combo 3 miếng gà ráng giòn cay & 1 khoai tây & 1 nước bao gồm ba miếng gà ráng chiên giòn với hương vị cay nồng đặc trưng, kèm theo một phần khoai tây chiên giòn và một đồ uống lựa chọn, như nước ngọt', 'c8_cb3mienggarangioncay_1khoaitaychien_1nuoc.jpg', '003'),
('C09', 'Combo 2 cánh gà BB & 1 khoai tây & 1 đồ uống', 100, 69000, 'Combo 2 cánh gà BBQ & 1 khoai tây & 1 đồ uống bao gồm hai cánh gà được nướng với sốt BBQ đặc biệt, kèm theo một phần khoai tây và một đồ uống lựa chọn, như nước ngọt, nước ép hoặc nước lọc. Một bữa ăn', 'c9_cb2canhgabbq_1khoaitaychien_1douong.jpg', '003'),
('C10', 'Combo 2 gà giòn không cay & 1 khoai tây chiên & 1 nước\r\n', 100, 69000, 'Combo 2 gà giòn không cay & 1 khoai tây chiên & 1 nước bao gồm hai miếng gà giòn không cay, kèm theo một phần khoai tây chiên giòn và một đồ uống lựa chọn, như nước ngọt, nước ép hoặc nước lọc. Một sự', 'c10_cb2gagionkhongcay_1khoaitaychien_1douong.jpg', '003'),
('C11', 'Combo 2 miếng gà giòn cay & 1 khoai tây chiên & 1 nước', 100, 69000, 'Combo 2 miếng gà giòn cay & 1 khoai tây chiên & 1 nước bao gồm hai miếng gà giòn cay, kèm theo một phần khoai tây chiên và một đồ uống lựa chọn, như nước ngọt, nước ép hoặc nước lọc. Một sự kết hợp ng', 'c11_2mienggagioncay_1khoaitaychien_1nuoc.jpg', '003'),
('C12', 'Combo 1 gà giòn không cay & 1 khoai tây & 1 đồ uống', 100, 49000, 'Combo 1 gà giòn không cay & 1 khoai tây & 1 đồ uống bao gồm một miếng gà giòn không cay, kèm theo một phần khoai tây chiên và một đồ uống lựa chọn, như nước ngọt, nước ép hoặc nước lọc. Một sự kết hợp', 'c12_cbgagionkhongcay_1khoaitaychien_1douong.jpg', '003'),
('P01', 'Pizza phô mai truyền thống - cheese mania', 100, 56000, 'Pizza Phô mai truyền thống - Cheese Mania là một phiên bản đặc biệt với lớp phủ phô mai truyền thống sẽ làm say đắm bất kỳ ai yêu thích phô mai. Đây là một món pizza với lớp nền mỏng và giòn, phủ đầy ', 'p1_phomaitruyenthong_cheesemania.jpg', '002'),
('P02', 'Pizza dăm bông dứa kiểu Hawaii', 100, 65000, 'Pizza Dăm bông dứa kiểu Hawaii là một biến thể độc đáo của pizza truyền thống, với lớp nền bánh mỏng và giòn, được phủ đầy phô mai, thịt giăm bông và dứa tươi. Sự kết hợp giữa vị ngọt của dứa và thịt ', 'p2_dambong_dua_kieuhawaii.jpg', '002'),
('P03', 'Pizza gà xốt tương kiểu nhật Teriyaki', 100, 75000, 'Pizza Gà xốt tương kiểu Nhật Teriyaki: Lớp nền bánh mỏng, phủ đầy gà thái nhỏ được nướng chín mềm, và phủ lớp xốt tương Teriyaki đậm đà. Sự kết hợp giữa vị ngọt và thơm của xốt Teriyaki cùng với vị bé', 'p3-Ga-Xot-Tuong-Kieu-Nhat-Teriyaki-Chicken.jpg', '002'),
('P04', 'Pizza xúc xích Ý - Pepperoni feast', 100, 50000, 'Pizza Xúc xích Ý - Pepperoni Feast: Bánh pizza mỏng và giòn được phủ đầy xúc xích Ý thơm ngon và phô mai tan chảy. Một biến thể thú vị với hương vị đậm đà của xúc xích và sự ngon miệng của phô mai, là', 'p4_Pepperoni-feast-Pizza-Xuc-Xich-Y.jpg', '002'),
('P05', 'Pizza 5 loại thịt thượng hạng', 100, 120000, 'Pizza 5 loại thịt thượng hạng: Lớp nền bánh pizza mỏng và giòn, phủ đầy nhiều loại thịt thượng hạng như thịt bò, thịt lợn, xúc xích Ý, thịt gà, và thịt hấp. Một sự kết hợp ngon miệng và đa dạng hương ', 'p5_Meat-lover-Pizza-5-Loai-Thit-Thuong-Hang.jpg', '002'),
('P06', 'Pizza Rau củ thập cẩm - Veggie mania', 100, 50000, 'Pizza Rau củ thập cẩm - Veggie Mania: Lớp nền bánh pizza mỏng và giòn, phủ đầy với một loạt các loại rau củ thập cẩm như cà chua, cà rốt, ớt, nấm, hành tây, bắp cải, và rau mùi. Một sự kết hợp phong p', 'p6_Veggie-mania-Pizza-Rau-Cu-Thap-Cam.jpg', '002'),
('P07', 'Pizza Thập cẩm thượng hạng - Extravaganza', 100, 150000, 'Pizza Thập cẩm thượng hạng - Extravaganza: Lớp nền bánh pizza mỏng và giòn, phủ đầy với một loạt các loại thực phẩm cao cấp như thịt bò, thịt lợn, xúc xích, gà, hành tây, ớt chuông, nấm, cà chua, và c', 'p7_Pizza-Thap-Cam-Thuong-Hang-Extravaganza.jpg', '002'),
('P08', 'Pizza Ngập vị phô mai hảo hạng - cheese madness', 100, 79000, 'Pizza Ngập vị phô mai hảo hạng: Lớp nền bánh pizza mỏng và giòn, phủ đầy với nhiều loại phô mai cao cấp như mozzarella, cheddar, parmesan, và gouda. Một biến thể đặc biệt, hấp dẫn với vị béo ngậy của ', 'p8_ngapviphomaihaohang_cheesymadness.jpg', '002'),
('P09', 'Pizza Gà phô mai & thịt heo xông khói - cheese chicken bacon', 100, 99000, 'Pizza Gà phô mai & thịt heo xông khói: Lớp nền bánh pizza mỏng và giòn, phủ đầy với lớp gà thái nhỏ, thịt heo xông khói và phô mai tan chảy. Một kết hợp hài hòa giữa hương vị béo ngậy của phô mai và v', 'p9_Pizza-Ga-Pho-Mai-Thit-Heo-Xong-Khoi-Cheesy-Chicken-Bacon.jpg', '002'),
('P10', 'Pizza Xúc xích phô mai - sausage kid maina', 100, 79000, 'Pizza Xúc xích phô mai: Lớp nền bánh pizza mỏng và giòn, phủ đầy với lớp xúc xích thơm ngon và phô mai tan chảy. Một sự kết hợp hấp dẫn giữa vị đậm đà của xúc xích và hương vị béo ngậy của phô mai, tạ', 'p10_xucxichphomai_sausagekidmania.jpg', '002'),
('P11', 'Pizza Hải sản sốt cà chua - Seafood delight', 100, 145000, 'Pizza Hải sản sốt cà chua: Bánh pizza mỏng giòn, phủ hải sản tươi như tôm, mực, cá hồi, và nghêu, kèm sốt cà chua thơm ngon. Sự kết hợp hoàn hảo giữa hải sản và vị cà chua đậm đà, ngon miệng và bổ dưỡ', 'p11_Pizza-Hai-San-Xot-Ca-Chua-Seafood-Delight.jpg', '002'),
('P12', 'Pizza Hải sản nhiệt đới sốt tiêu ', 100, 149000, 'Pizza Hải sản nhiệt đới sốt tiêu: Bánh pizza mỏng giòn, phủ hải sản như tôm, mực, cá hồi, với lớp sốt tiêu thơm ngon. Sự kết hợp độc đáo của hải sản và vị tiêu đặc trưng, tạo nên hương vị đậm đà và tư', 'p12_Pizzaminsea-Hai-San-Nhiet-Doi-Xot-Tieu.jpg', '002'),
('P13', 'Pizza Hải sản sốt Mayonnaise', 100, 199000, 'Pizza Hải sản sốt Mayonnaise: Bánh pizza mỏng giòn, phủ đầy hải sản như tôm, mực, cá hồi, kèm theo lớp sốt Mayonnaise thơm ngon. Sự kết hợp độc đáo giữa hải sản tươi ngon và vị béo của sốt Mayonnaise,', 'p13_Pizza-Hai-San-Xot-Mayonnaise-Ocean-Mania.jpg', '002'),
('P14', 'Pizza Bò & Tôm nướng kiểu Mỹ', 100, 249000, 'Pizza Bò & Tôm nướng kiểu Mỹ: Bánh pizza mỏng giòn, phủ đầy với thịt bò nướng và tôm tươi, kèm theo các loại gia vị kiểu Mỹ như sốt barbecue hoặc buffalo. Sự kết hợp hài hòa giữa thịt bò và tôm, tạo n', 'p14Surf-turf-Pizza-Bo-Tom-Nuong-Kieu-My-1.jpg', '002'),
('D01', '1 chai Coca-cola 390ml', 100, 20000, 'Một chai Coca-Cola 390ml - Độc đáo, sảng khoái, một lựa chọn tuyệt vời để thưởng thức.', 'd1_chaicoca-cola-390ml.jpg', '004'),
('D02', '1 Chai Fanta 390ml', 100, 20000, 'Một chai Fanta 390ml - Tươi mát, hương vị trái cây độc đáo, sảng khoái và ngon miệng.', 'd2_fanta-390.jpg', '004'),
('D03', '1 Chai Sprite 390ml', 100, 2000, 'Một chai Sprite 390ml - Sảng khoái, lên men tự nhiên, vị chanh tươi mát, thích hợp để giải khát.', 'd3_Sprite-390.jpg', '004'),
('D04', '1 Chai coca-cola Zero', 100, 30000, 'Một chai Coca-Cola Zero - Hương vị đặc trưng của Coca-Cola mà không có đường, tạo cảm giác sảng khoái và ngon miệng.', 'd4_cocacola-coke-zero.jpg', '004'),
('D05', '1 Chai Coca-cola 1.5L', 100, 35000, 'Một chai Coca-Cola 1.5L - Đựng đầy hương vị đặc trưng của Coca-Cola, là lựa chọn tuyệt vời cho mọi dịp và giải khát.', 'd5_coke-1.5.jpg', '004'),
('D06', '1 Chai Coca-cola không đường', 100, 25000, 'Một chai Coca-Cola không đường - Hương vị đặc trưng của Coca-Cola nhưng không có đường, một lựa chọn thấp calo và ngon miệng.', 'd6_zerosugar-coke-1.5-new-new.png', '004'),
('D07', '1 Chai Sprite 1.5L', 100, 35000, 'Một chai Sprite 1.5L - Hương vị sảng khoái của Sprite, làm từ lựa chọn tự nhiên, tạo ra trải nghiệm giải khát tuyệt vời.', 'd7_Sprite-1.5L.jpg', '004'),
('D08', '1 Chai Fanta 1.5L', 100, 35000, 'Một chai Fanta 1.5L - Hương vị trái cây tươi mát của Fanta, độc đáo và sảng khoái, làm nguội từ các nguyên liệu tự nhiên.', 'd8_fanta-1.5.jpg', '004'),
('D09', '1 Trà đào hạt chia ', 100, 35000, 'Trà đào hạt chia thường là một loại thức uống lành mạnh được làm từ trà đào kết hợp với hạt chia.', 'd9_tra-dao-hat-chia.jpg', '004'),
('D10', '1 Chai Fuzetea+ Chanh dây hạt chia', 100, 25000, 'Một chai Fuzetea+ Chanh dây hạt chia: Một thức uống trà chanh dây sảng khoái kết hợp với hạt chia, cung cấp hương vị độc đáo và đầy dinh dưỡng.', 'd10_Fuzetea+-Chanh-Day-hatchia-350ml-new-new.png', '004'),
('D11', '1 Chai Daisani', 100, 20000, '', 'd11_daisani.jpg', '004'),
('D12', '1 Chai Dasani 1.5L', 100, 35000, '', 'd12_dasani-1l5-new.png', '004');

-- --------------------------------------------------------

--
-- Table structure for table `quyen`
--

CREATE TABLE `quyen` (
  `TenQuyen` varchar(50) NOT NULL,
  `MaQuyen` varchar(10) NOT NULL,
  `SĐT` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `quyen`
--

INSERT INTO `quyen` (`TenQuyen`, `MaQuyen`, `SĐT`) VALUES
('Admin', 'ADMIN', '0123456789'),
('Quanli', 'QLI', '0123456788');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `categoryND` varchar(20) NOT NULL,
  `SĐT` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
