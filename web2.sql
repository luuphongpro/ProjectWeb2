-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 25, 2024 lúc 09:23 AM
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
  `TenND` varchar(10) DEFAULT NULL,
  `SĐT` varchar(10) NOT NULL,
  `MaQuyen` varchar(10) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `CreTime` datetime NOT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`TenND`, `SĐT`, `MaQuyen`, `Status`, `CreTime`, `Password`) VALUES
('Admin', '0123456789', 'ADMIN', 'Đang hoạt động', '2024-03-30 08:36:38', 'Admin@'),
('Vĩ', '0123456781', 'KH', 'Đang hoạt động', '2024-04-12 08:46:32', 'huynhgiavi'),
('vũ', '0123456782', 'KH', 'Đang hoạt động', '2024-04-12 08:50:25', 'huynhgiavi');

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
  `MaChiTietHD` varchar(10) NOT NULL,
  `MaSP` varchar(10) NOT NULL,
  `SoLuong` int(100) NOT NULL,
  `DonGia` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietkhuyenmai`
--

CREATE TABLE `chitietkhuyenmai` (
  `MaSP` varchar(10) NOT NULL,
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

--
-- Đang đổ dữ liệu cho bảng `chitietquyen`
--

INSERT INTO `chitietquyen` (`MaChucnang`, `MaQuyen`) VALUES
('CN01', 'ADMIN'),
('CN02', 'ADMIN'),
('CN03', 'ADMIN'),
('CN04', 'ADMIN'),
('CN05', 'ADMIN');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucnang`
--

CREATE TABLE `chucnang` (
  `MaChucnang` varchar(10) NOT NULL,
  `TenChucnang` varchar(50) NOT NULL,
  `Active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chucnang`
--

INSERT INTO `chucnang` (`MaChucnang`, `TenChucnang`, `Active`) VALUES
('CN01', 'Quản lý mã giảm giá', 1),
('CN02', 'Quản lý sản phẩm', 1),
('CN03', 'Quản lý tài khoản', 1),
('CN04', 'Quản lý phân quyền', 1),
('CN05', 'Báo cáo thống kê', 1);

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
  `TTSP` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `IMG` varchar(100) NOT NULL,
  `categoryId` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`MaSP`, `TenSP`, `SoLuongSP`, `GiaSP`, `TTSP`, `IMG`, `categoryId`) VALUES
('B01', 'Hamburger Cá hồi vỏ than tre', 100, 50000, 'Hamburger Cá hồi vỏ than tre là một món ăn sáng truyền thống có nguồn gốc từ vùng Bắc Âu, nơi cá hồi là một nguyên liệu phổ biến. Món này được làm bằng cách chế biến cá hồi tươi ngon thành các miếng thịt, sau đó nướng hoặc chiên và xếp trong bánh mì hamburger với các thành phần khác như rau sống, sốt và gia vị.', 'b1_cahoigionvothantre.jpg', '001'),
('B02', 'Hamburger Bò nướng Whopper', 100, 65000, 'Hamburger Bò nướng Whopper là một món ăn phổ biến của nhà hàng Burger King. Đây là một món hamburger lớn kích thước, được làm từ thịt bò tươi ngon và các thành phần đặc trưng khác. Whopper là một món ăn no nê và bổ dưỡng, thường có kích thước lớn so với các loại hamburger khác. Nó có hương vị đậm đà và cung cấp sự kết hợp hài hòa giữa thịt bò nướng, rau sống và sốt.', 'b2_bonuongwhopper.jpg', '001'),
('B03', 'Hamburger Cá giòn', 100, 45000, 'Hamburger Cá giòn là một loại món ăn ngon và phổ biến, thường được làm từ cá tươi và có lớp vỏ giòn. Hamburger Cá giòn thường có hương vị đặc trưng và kết hợp giữa cá tươi, lớp vỏ giòn và các thành phần khác. Món ăn này thường được thưởng thức trong trạng thái nóng, khi vỏ bánh cá còn giòn ngon và cá bên trong thịt mềm và thơm ngon.', 'b3_cagion.jpg', '001'),
('B04', 'Hamburger Bò nướng hành chiên', 100, 70000, 'Hamburger Bò nướng hành chiên là một phiên bản hamburger truyền thống được làm từ thịt bò nướng và hành chiên. Thịt bò được nướng trên lửa để tạo ra hương vị đặc trưng. Hành tây được chiên giòn và sử dụng để thêm hương vị và độ giòn cho món hamburger. Ngoài ra, nó có thể bao gồm các thành phần khác như bánh mì hamburger, rau sống và các loại sốt tùy theo sở thích cá nhân.', 'b4_bonuonghanhchien.jpg', '001'),
('B05', 'Hamburger Gà giòn cay', 100, 55000, 'Hamburger Gà giòn cay là một loại món ăn được làm từ gà chiên giòn và gia vị cay. Gà được chế biến thành miếng và chiên trong dầu nóng để có bề mặt giòn rụm. Gia vị cay được sử dụng để tạo ra hương vị cay nổi bật cho món hamburger.', 'b5_gagioncay.jpg', '001'),
('B06', 'Hamburger Gà nướng', 100, 55000, 'Hamburger Gà nướng là một loại hamburger được làm từ thịt gà nướng. Thịt gà được chế biến và nướng trên lửa hoặc trên một bếp nướng để tạo ra hương vị đặc trưng. Hamburger này thường được trang trí với các thành phần khác như bánh mì hamburger, rau sống và các loại sốt tuỳ theo sở thích cá nhân.', 'b6_ganuong.jpg', '001'),
('B07', 'Hamburger Bò tắm phô mai', 100, 75000, 'Hamburger Bò tắm phô mai là một món ăn ngon và phổ biến trong ẩm thực Việt Nam. Đây là một phiên bản độc đáo của hamburger truyền thống, được kết hợp với các thành phần đặc trưng của ẩm thực Việt Nam. Hamburger Bò tắm phô mai thường được thưởng thức nóng, và có thể kèm theo các loại nước sốt như ketchup hoặc mayonnaise. Đây là một món ăn ngon, độc đáo và rất phổ biến trong các nhà hàng và quán ăn tại Việt Nam.', 'b7_botamphomai.jpg', '001'),
('B08', 'Hamburger Bò phô mai & thịt xông khói', 100, 75000, 'Hamburger Bò phô mai và thịt xông khói là một biến thể của hamburger truyền thống, kết hợp giữa thịt bò, phô mai và thịt xông khói. Nguyên liệu bao gồm bánh mì hamburger, thịt bò, phô mai, thịt xông khói, rau sống và sốt. Quá trình làm bao gồm nướng thịt bò, nướng thịt xông khói, xếp thịt và phô mai lên bánh mì, sau đó thêm rau sống và sốt. Món ăn này mang đến hương vị đậm đà và hấp dẫn.', 'b8_bophomaithitxongkhoi.jpg', '001'),
('B09', 'Hamburger Bò nướng phô mai', 100, 69000, 'Hamburger Bò nướng phô mai là một món ăn phổ biến trên thế giới, kết hợp giữa bánh mì, thịt bò nướng và phô mai tan chảy. Đây là một phiên bản độc đáo và ngon miệng của hamburger truyền thống. Hamburger Bò nướng phô mai thường được thưởng thức nóng, khi phô mai còn tan chảy. Món ăn này mang đến hương vị thơm ngon, với sự kết hợp của thịt bò nướng thơm phức và phô mai sệt mịn.', 'b9_bonuongphomaijpg.jpg', '001'),
('B10', 'Hamburger Gà phô mai sốt BBQ', 100, 60000, 'Hamburger Gà phô mai sốt BBQ là một biến thể của hamburger truyền thống, nhưng thay vì sử dụng thịt bò, nó sử dụng thịt gà và sốt BBQ để tạo ra một hương vị độc đáo. Hamburger Gà phô mai sốt BBQ thường được thưởng thức nóng, khi phô mai còn tan chảy và thịt gà còn nóng hổi. Món ăn này mang đến hương vị thơm ngon và hấp dẫn, với sự kết hợp của thịt gà thơm ngon, phô mai sệt mịn và hương vị đặc trưng của sốt BBQ.', 'b10_gaphomaisitbbq.jpg', '001'),
('B11', 'Hamburger Whopper phô mai & thịt xông khói', 100, 89000, 'Hamburger Whopper phô mai & thịt xông khói là một phiên bản độc đáo của Whopper, một loại hamburger nổi tiếng từ chuỗi cửa hàng Burger King. Trong biến thể này, hamburger được làm từ các thành phần chính bao gồm thịt bò, phô mai và thịt xông khói. Hamburger Whopper phô mai & thịt xông khói thường được thưởng thức nóng, và bạn có thể kèm theo các loại nước sốt như ketchup, mayonnaise hoặc sốt BBQ. Món này mang đến hương vị đậm đà từ thịt bò, hòa quyện với sự ngọt ngào của phô mai và hương thơm của thịt xông khói.', 'b11_whopperphomaithitxongkhoi.jpg', '001'),
('B12', 'Hamburger Double whopper', 100, 80000, '\"Double Whopper\" là một phiên bản lớn hơn của \"Whopper\" - một món hamburger nổi tiếng của một chuỗi cửa hàng nhanh thức ăn. Double Whopper thường bao gồm hai lát thịt bò nướng, khoai tây lát, cà chua, hành tây, dưa leo, sốt mayonnaise và ketchup. Nó được phục vụ trong một chiếc bánh mì lớn hơn và có lượng nguyên liệu gấp đôi so với Whopper thông thường. Double Whopper thường được ưa chuộng bởi những người muốn thưởng thức một món hamburger lớn và no nê.', 'b12_doublewhopper.jpg', '001'),
('B13', 'Hamburger 2 miếng bò nướng phô mai', 100, 75000, 'Hamburger bò nướng phô mai là một món ăn phổ biến trên toàn thế giới. Nó bao gồm một miếng thịt bò xay nướng chín kết hợp với lát phô mai, được đặt trong một chiếc bánh mì hamburger. Món ăn này thường được trang trí bằng rau sống như cà chua, rau xà lách và hành tây, cùng với các loại sốt như sốt hamburger hoặc sốt mù tạt.\r\n\r\nHamburger bò nướng phô mai thường có hương vị thơm ngon, ngọt ngào từ thịt bò và hương vị béo ngậy từ phô mai tan chảy. Bánh mì hamburger thường được làm từ bột mỳ mềm mại và có độ giòn khi nướng. Khi ăn, các thành phần hòa quyện với nhau tạo nên một trải nghiệm ẩm thực thú vị. ', 'b13_2miengbonuongphomai.jpg', '001'),
('B14', 'Hamburger 2 miếng bò phô mai & thịt xông khói', 100, 100000, 'Hamburger Whopper phô mai và thịt xông khói là một phiên bản đặc biệt của hamburger Whopper, một món ăn nổi tiếng của chuỗi nhà hàng Burger King. Món này kết hợp giữa phô mai và thịt xông khói để tạo ra một trải nghiệm ẩm thực độc đáo và ngon miệng.\r\n\r\nWhopper là một loại hamburger lớn có thành phần chính gồm một miếng thịt bò nướng, bánh mì hamburger, rau sống như cà chua, rau xà lách, hành tây và các loại sốt như sốt mayonnaise và sốt ketchup. Tuy nhiên, trong phiên bản Whopper phô mai và thịt xông khói, phô mai và thịt xông khói được thêm vào để mang đến hương vị đặc biệt.\r\n\r\nPhô mai thường được đặt lên miếng thịt bò nướng để tan chảy và tạo nên một lớp mềm mịn và béo ngậy. Thịt xông khói có hương vị đặc trưng, thường có vị hơi mặn và cay nhẹ, khiến hamburger thêm phần thú vị và đa dạng hương vị. ', 'b14_2miengbophomaithitxongkhoi.jpg', '001'),
('C01', '1 Miếng gà BBQ', 100, 3000, 'Một miếng gà BBQ là một món ăn nổi tiếng và phổ biến, có nguồn gốc từ ẩm thực Mỹ. Nó bao gồm một miếng gà được nướng hoặc quay trên lửa than hoặc lò nướng, sau đó được chấm với nước sốt BBQ để mang đến hương vị đặc trưng và mùi thơm hấp dẫn.\r\n\r\nNguyên liệu chính của món gà BBQ là gà, có thể là đùi gà, cánh gà, ức gà hoặc các phần khác của gà. Miếng gà được ướp gia vị, thường bao gồm muối, hạt tiêu và các gia vị khác như tỏi băm nhuyễn, hành tây băm nhỏ hoặc paprika để tạo ra hương vị đa dạng. ', 'c1_1mienggabbq.jpg', '003'),
('C02', '1 Miếng gà giòn - Crispy', 100, 35000, 'Miếng gà giòn, hay còn được gọi là gà rán giòn, là một món ăn phổ biến trên toàn thế giới. Đây là một món gà được chiên hoặc rán để tạo ra bề mặt giòn tan và thịt gà mềm mại bên trong. Miếng gà giòn thường được chế biến bằng cách ngâm gà trong một hỗn hợp gia vị hoặc bột giòn, sau đó chiên hoặc rán cho đến khi màu vàng và giòn.\r\n\r\nMiếng gà giòn có thể được thưởng thức một mình, hoặc được kết hợp với các loại nước chấm như nước sốt cay, nước mắm me, hay nước sốt ngọt chua. Ngoài ra, miếng gà giòn cũng thường được dùng trong các món ăn khác như bánh mì sandwich gà, salad gà giòn, hay cơm gà giòn.', 'c2_1mienggagioncrispy.jpg', '003'),
('C03', '1 Miếng gà giòn cay - Flaming', 100, 30000, 'Miếng gà giòn cay, còn được gọi là gà giòn bốc cháy (flaming crispy chicken), là một biến thể của miếng gà giòn thông thường với một mức độ cay mạnh hơn. Điều đặc biệt về miếng gà giòn cay là nó thường được tẩm vào một hỗn hợp gia vị chứa các loại ớt cay, gia vị và nước sốt đặc biệt để tạo nên hương vị cay nóng đặc trưng. Miếng gà giòn cay thường có một hương vị cay nóng mạnh mẽ, đôi khi có thể gây cảm giác \"bốc cháy\" trong miệng. Gà giòn cay thường được thưởng thức kèm với các loại nước chấm như nước sốt cay, nước mắm me, hay nước sốt ngọt chua để tăng thêm hương vị.', 'c3_1mienggaflamingioncay.jpg', '003'),
('C04', 'Mix-wing-2', 100, 40000, '\"Mix-wing-2\" kết hợp 2 loại cánh gà có hương vị khác nhau như gà giòn (crispy), gà nướng (grilled), gà xốt (sauced), gà cay (spicy), gà mật ong (honey glazed)... Bạn có thể lựa chọn các loại cánh gà yêu thích của mình và tận hưởng sự đa dạng trong khẩu vị.', 'c4_mixwing2pcs.jpg', '003'),
('C05', 'Mix-wing-6', 100, 100000, '\"Mix-wing-6\" kết hợp 6 loại cánh gà có hương vị khác nhau như gà giòn (crispy), gà nướng (grilled), gà xốt (sauced), gà cay (spicy), gà mật ong (honey glazed)... Bạn có thể lựa chọn các loại cánh gà yêu thích của mình và tận hưởng sự đa dạng trong khẩu vị.', 'c5_mixwing6pcs.jpg', '003'),
('C06', 'Mix-wing-4', 100, 70000, '\"Mix-wing-4\" kết hợp 4 loại cánh gà có hương vị khác nhau như gà giòn (crispy), gà nướng (grilled), gà xốt (sauced), gà cay (spicy), gà mật ong (honey glazed)... Bạn có thể lựa chọn các loại cánh gà yêu thích của mình và tận hưởng sự đa dạng trong khẩu vị.', 'c6_mixwing4pcs.jpg', '003'),
('C07', 'Combo 3 cánh gà BBQ & khoai tây chiên & 1 đồ uống', 100, 79000, 'Trong combo này, bạn sẽ được cung cấp ba cánh gà BBQ, một phần khoai tây chiên và một đồ uống. Cánh gà BBQ thường được nướng với sốt BBQ, tạo ra một lớp vị ngọt, mặn và hơi cay. Khoai tây chiên làm từ khoai tây cắt lát mỏng và chiên giòn. Đồ uống có thể là nước ngọt, nước ép trái cây, nước đóng chai, nước soda...', 'c7_cb3canhgabbq_khoaitaychien_1douong.jpg', '003'),
('C08', 'Combo 3 miếng gà ráng giòn cay & 1 khoai ty & 1 nước', 100, 89000, 'Trong combo này, bạn sẽ được cung cấp ba miếng gà ráng giòn cay. Miếng gà này thường được chế biến bằng cách tẩm vào một hỗn hợp gia vị cay và sau đó chiên giòn. Nó có hương vị cay nóng mạnh mẽ và vỏ giòn tan. Khoai tây thường được cắt thành lát mỏng và chiên giòn để tạo nên một món ăn kèm thêm ngon lành. Nước ngọt có thể là nước soda, nước ép trái cây, nước đóng chai hoặc nước có ga.', 'c8_cb3mienggarangioncay_1khoaitaychien_1nuoc.jpg', '003'),
('C09', 'Combo 2 cánh gà BB & 1 khoai tây & 1 đồ uống', 100, 69000, 'Trong combo này, bạn sẽ được cung cấp hai cánh gà BBQ. Cánh gà BBQ thường được nướng với sốt BBQ, tạo ra một lớp vị ngọt, mặn và hơi cay. Khoai tây thường được cắt thành lát mỏng và chiên giòn. Đồ uống có thể là nước ngọt, nước ép trái cây, nước đóng chai hoặc nước có ga. ', 'c9_cb2canhgabbq_1khoaitaychien_1douong.jpg', '003'),
('C10', 'Combo 2 gà giòn không cay & 1 khoai tây chiên & 1 nước\r\n', 100, 69000, 'Trong combo này, bạn sẽ được cung cấp hai miếng gà giòn không cay. Gà giòn thường là một món ăn được chiên giòn với vỏ giòn và thịt mềm mại bên trong. Trái ngược với gà giòn cay, gà giòn không cay không có gia vị cay, mang đến một hương vị tự nhiên và tinh tế. Khoai tây thường được cắt thành lát mỏng và chiên giòn, tạo nên một món ăn kèm ngon lành.\r\nĐồ uống có thể là nước ngọt, nước ép trái cây, nước đóng chai hoặc nước có ga.  ', 'c10_cb2gagionkhongcay_1khoaitaychien_1douong.jpg', '003'),
('C11', 'Combo 2 miếng gà giòn cay & 1 khoai tây chiên & 1 nước', 100, 69000, 'Trong combo này, bạn sẽ được cung cấp hai miếng gà giòn cay. Miếng gà này thường được tẩm vào một hỗn hợp gia vị cay và sau đó chiên giòn. Hương vị cay nóng mạnh mẽ của gà giòn cay sẽ mang đến một trải nghiệm ẩm thực đậm đà và thú vị. Khoai tây chiên thường được cắt thành lát mỏng và chiên giòn, tạo nên một món ăn kèm ngon lành.\r\nĐồ uống có thể là nước ngọt, nước ép trái cây, nước đóng chai hoặc nước có ga.  ', 'c11_2mienggagioncay_1khoaitaychien_1nuoc.jpg', '003'),
('C12', 'Combo 1 gà giòn không cay & 1 khoai tây & 1 đồ uống', 100, 49000, 'Trong combo này, bạn sẽ được cung cấp một miếng gà giòn không cay. Gà giòn thường là một món ăn được chiên giòn với vỏ giòn và thịt mềm mại bên trong, không có gia vị cay. Điều này tạo ra một hương vị tự nhiên và tinh tế cho miếng gà. Khoai tây thường được cắt thành lát mỏng và chiên giòn, tạo nên một món ăn kèm ngon lành.\r\nĐồ uống có thể là nước ngọt, nước ép trái cây, nước đóng chai hoặc nước có ga.', 'c12_cbgagionkhongcay_1khoaitaychien_1douong.jpg', '003'),
('P01', 'Pizza phô mai truyền thống - cheese mania', 100, 56000, 'Chiếc pizza đặc trưng cổ điển cho bất cứ tín đồ pizza nào. \r\n\r\nTầng trên là lớp phô mai vàng óng thơm dẻo như mời gọi, tầng dưới là lớp sốt cà chua trung hòa với vị béo của phô mai Mozarella giúp chiếc pizza không bị ngấy.', 'p1_phomaitruyenthong_cheesemania.jpg', '002'),
('P02', 'Pizza dăm bông dứa kiểu Hawaii', 100, 65000, 'Pizza dăm bông dứa kiểu Hawaii là một loại pizza phổ biến có nguồn gốc từ Hawaii. Nó thường bao gồm bánh pizza được nướng giòn, sốt cà chua, phô mai mozzarella, dứa tươi và dăm bông (thịt xông khói). Kết hợp giữa hương vị ngọt của dứa, mặn của dăm bông và ngậy của phô mai tạo nên một hương vị độc đáo. Gia vị như hành, tiêu, oregano và tỏi cũng có thể được sử dụng để tăng thêm hương vị cho pizza này.', 'p2_dambong_dua_kieuhawaii.jpg', '002'),
('P03', 'Pizza gà xốt tương kiểu nhật Teriyaki', 100, 75000, 'Pizza gà xốt tương kiểu Nhật Teriyaki: Đây là một biến thể của pizza kết hợp hương vị đặc trưng của xốt tương Teriyaki Nhật Bản với thịt gà và bánh pizza. Thành phần chính bao gồm bánh pizza, xốt tương Teriyaki, thịt gà và có thể có các thành phần khác như phô mai, hành tây, ớt chuông, nấm...', 'p3-Ga-Xot-Tuong-Kieu-Nhat-Teriyaki-Chicken.jpg', '002'),
('P04', 'Pizza xúc xích Ý - Pepperoni feast', 100, 50000, 'Mô tả: Pizza xúc xích Ý là một loại pizza có nguồn gốc từ Ý. Nó thường có đường kính tròn và được làm từ bột mì, sốt cà chua, phô mai và xúc xích Ý.\r\nThành phần chính: Bột mì, sốt cà chua, xúc xích Ý (thường là xúc xích lợn), phô mai (thường là mozzarella), gia vị và các nguyên liệu khác tuỳ theo sở thích.\r\nPhong cách: Pizza xúc xích Ý có vẻ ngoài truyền thống với lớp sốt cà chua phủ lên bề mặt, phô mai tan chảy và các miếng xúc xích được đặt lên trên.\r\nHương vị: Món pizza này có hương vị thơm ngon, hấp dẫn và hơi cay từ xúc xích Ý. Phô mai tan chảy tạo thành lớp vỏ mỏng và giòn, cung cấp hương vị đậm đà.\r\n', 'p4_Pepperoni-feast-Pizza-Xuc-Xich-Y.jpg', '002'),
('P05', 'Pizza 5 loại thịt thượng hạng', 100, 120000, '\r\nMô tả: Pizza 5 loại thịt thượng hạng là một món pizza đặc biệt đậm đà và giàu protein. Nó được tạo thành từ một hỗn hợp các loại thịt thượng hạng được đặt lên trên bề mặt pizza.\r\n\r\nThành phần chính: Pizza 5 loại thịt thượng hạng thường có sự kết hợp của các loại thịt sau đây:\r\n\r\nThịt bò: Bò nạc, thăn, hoặc thịt xay.\r\nThịt heo: Xúc xích Ý, thịt ham, hoặc thịt xay.\r\nThịt gia cầm: Gà nạc, gà tây, hoặc thịt gà xay.\r\nThịt cừu: Cừu nạc hoặc cừu xay.\r\nThịt hải sản: Cá hồi, tôm, mực, hoặc các loại hải sản khác.\r\nPhong cách: Pizza 5 loại thịt thượng hạng có vẻ ngoài hấp dẫn với lớp sốt cà chua trên bề mặt, phủ phô mai và các miếng thịt thượng hạng được đặt lên trên.\r\n\r\nHương vị: Món pizza này mang đến một hương vị đậm đà, phong phú từ sự kết hợp của các loại thịt thượng hạng. Các loại thịt tươi ngon và giàu protein tạo ra một mùi thơm hấp dẫn và hương vị phong phú. Sự kết hợp giữa thịt bò, thịt heo, thịt gia cầm, thịt cừu và thịt hải sản cùng với sốt cà chua và phô mai tạo nên một món pizza hảo hạng với hương vị độc đáo.\r\n', 'p5_Meat-lover-Pizza-5-Loai-Thit-Thuong-Hang.jpg', '002'),
('P06', 'Pizza Rau củ thập cẩm - Veggie mania', 100, 50000, '\r\nMô tả: Pizza Rau củ thập cẩm là một loại pizza không chứa thịt và được tạo từ sự kết hợp của nhiều loại rau củ khác nhau. Nó thường có đường kính tròn và được làm từ bột mì, sốt cà chua và rất nhiều loại rau củ tươi ngon.\r\nThành phần chính: Bột mì, sốt cà chua, hỗn hợp rau củ như nấm, ớt, hành tây, cà chua, cà rốt, bắp cải, hoặc các loại rau củ khác, phô mai (thường là mozzarella), gia vị và các nguyên liệu khác tuỳ theo sở thích.\r\nPhong cách: Pizza Rau củ thập cẩm có lớp sốt cà chua trên bề mặt, phủ phô mai và các loại rau củ được đặt lên trên.\r\nHương vị: Món pizza này mang đến hương vị tươi ngon, giàu dinh dưỡng từ sự kết hợp của các loại rau củ. Các rau củ tươi mọng, cung cấp hương vị đa dạng\r\n', 'p6_Veggie-mania-Pizza-Rau-Cu-Thap-Cam.jpg', '002'),
('P07', 'Pizza Thập cẩm thượng hạng - Extravaganza', 100, 150000, '\r\nMô tả: Pizza Thập cẩm thượng hạng là một loại pizza đặc biệt và phong phú với sự kết hợp của nhiều thành phần ngon miệng. Nó thường có đường kính tròn và được làm từ bột mì, sốt cà chua và một loạt các nguyên liệu thượng hạng.\r\n\r\nThành phần chính: Extravaganza Pizza thường có sự kết hợp của các thành phần sau đây:\r\n\r\nThịt: Xúc xích Ý, thịt bò, thịt heo, thịt gà hoặc các loại thịt khác.\r\nRau củ: Ớt chuông, nấm, hành tây, cà chua, cà rốt, ớt, hoặc các loại rau củ khác.\r\nHải sản: Tôm, mực, cá hồi, hoặc các loại hải sản khác.\r\nPhụ gia: Các loại gia vị, phô mai (thường là mozzarella) và sốt cà chua.\r\nPhong cách: Extravaganza Pizza thường có lớp sốt cà chua trên bề mặt, phủ phô mai và các loại thành phần thượng hạng được đặt lên trên. Nó có thể có một sự kết hợp đa dạng của các loại thịt, rau củ và hải sản.\r\n\r\nHương vị: Món pizza này mang đến một hương vị đa dạng và đậm đà. Sự kết hợp của các thành phần thượng hạng như thịt, rau củ và hải sản tạo ra một món pizza phong phú về hương vị. Vị cay, ngọt và mặn từ các thành phần khác nhau kết hợp với phô mai tan chảy tạo nên một trải nghiệm ẩm thực thú vị.\r\n', 'p7_Pizza-Thap-Cam-Thuong-Hang-Extravaganza.jpg', '002'),
('P08', 'Pizza Ngập vị phô mai hảo hạng - cheese madness', 100, 79000, '\r\nMô tả: Cheese Madness Pizza là một món pizza tập trung vào sự thảo mãn từ hương vị đậm đà và ngọt ngào của phô mai. Nó có lớp sốt cà chua trên bề mặt và được phủ lớp phô mai đa dạng, tạo nên một món ăn ngon lành cho những người yêu thích phô mai.\r\n\r\nThành phần chính: Cheese Madness Pizza thường sử dụng nhiều loại phô mai khác nhau để tạo nên một hỗn hợp ngon miệng. Các loại phô mai phổ biến bao gồm mozzarella, cheddar, parmesan, feta, và gorgonzola. Mỗi loại phô mai đều mang đến hương vị và độ ngon riêng, tạo ra một trải nghiệm phô mai đa dạng và phong phú trên pizza.\r\n\r\nPhong cách: Cheese Madness Pizza thường có một lớp sốt cà chua trên bề mặt pizza, sau đó được phủ lớp phô mai đa dạng. Một số phiên bản có thể có thêm các thành phần bổ sung như hành tây, ớt chuông, nấm hoặc các loại thịt như xúc xích, thịt gà hoặc thịt bò để tạo thêm hương vị và đa dạng.\r\n\r\nHương vị: Với sự kết hợp của nhiều loại phô mai, Cheese Madness Pizza mang đến một hương vị đậm đà, béo ngon và ngọt ngào. Lớp phô mai tan chảy tạo ra sự mềm mịn và thơm ngon trên pizza. Sự kết hợp của các loại phô mai có thể tạo ra sự hài hòa giữa hương vị đậm đà, kem và một chút muối từ các loại phô mai khác nhau.\r\n', 'p8_ngapviphomaihaohang_cheesymadness.jpg', '002'),
('P09', 'Pizza Gà phô mai & thịt heo xông khói - cheese chicken bacon', 100, 99000, '\r\nMô tả: Cheese Chicken Bacon Pizza là một món pizza có đường kính tròn, được làm từ bột mì và có lớp sốt cà chua trên bề mặt. Nó được chế biến với sự kết hợp của gà, phô mai và thịt heo xông khói, tạo nên một món ăn ngon miệng và đa dạng.\r\n\r\nThành phần chính:\r\n\r\nGà: Gà được cắt thành miếng nhỏ hoặc thái thành sợi mỏng và được đặt lên bề mặt pizza. Gà mang đến hương vị thịt thơm ngon và chất dinh dưỡng.\r\nPhô mai: Loại phô mai thường được sử dụng là mozzarella, có thể được phủ lên trên bề mặt pizza hoặc được trải đều trên các thành phần khác.\r\nThịt heo xông khói: Thịt heo xông khói được thái thành lát mỏng hoặc sợi nhỏ và đặt lên bề mặt pizza. Thịt heo xông khói thêm hương vị mặn và đậm đà.\r\nPhong cách: Cheese Chicken Bacon Pizza thường có một lớp sốt cà chua truyền thống, sau đó được phủ lớp phô mai trên bề mặt. Gà và thịt heo xông khói được đặt lên cùng với các thành phần khác như hành tây, nấm, ớt chuông hoặc các gia vị khác. Một số phiên bản có thể có thêm sốt BBQ hoặc sốt kem.\r\n\r\nHương vị: Với sự kết hợp của gà thơm ngon, phô mai kem, và hương vị mặn từ thịt heo xông khói, Cheese Chicken Bacon Pizza mang đến một hương vị đa dạng và hấp dẫn. Gà tươi ngon, phô mai tan chảy và thịt heo xông khói mặn mà tạo nên sự cân bằng giữa các thành phần. Sự pha trộn của các gia vị và sốt cà chua cung cấp một hương vị thêm phần thú vị và đậm đà.\r\n', 'p9_Pizza-Ga-Pho-Mai-Thit-Heo-Xong-Khoi-Cheesy-Chicken-Bacon.jpg', '002'),
('P10', 'Pizza Xúc xích phô mai - sausage kid maina', 100, 79000, '\r\nMô tả: Pizza Xúc xích phô mai có hình dạng tròn với bột mì nướng giòn và lớp sốt cà chua trên mặt. Nó được chế biến với xúc xích và phô mai, tạo nên một món ăn ngon và hấp dẫn cho cả trẻ em và người lớn.\r\n\r\nThành phần chính:\r\n\r\nXúc xích: Xúc xích thường được cắt thành miếng hoặc đĩa mỏng và đặt lên bề mặt pizza. Xúc xích có hương vị thịt đậm đà và một chút gia vị, tạo nên một phần ngon miệng trên pizza.\r\nPhô mai: Phô mai thường được sử dụng là mozzarella, có thể được trải đều trên bề mặt pizza hoặc phủ lên xúc xích và các thành phần khác. Phô mai tan chảy tạo nên lớp kem và mềm mịn trên pizza.\r\nPhong cách: Pizza Xúc xích phô mai thường có lớp sốt cà chua truyền thống, sau đó được phủ lớp phô mai trên bề mặt. Xúc xích được đặt lên cùng với các thành phần khác như hành tây, ớt chuông, nấm hoặc các gia vị khác. Một số phiên bản có thể có thêm sốt BBQ hoặc sốt cà chua chua ngọt.\r\n\r\nHương vị: Với sự kết hợp của xúc xích thịt đậm đà và phô mai tan chảy, Pizza Xúc xích phô mai mang đến một hương vị thơm ngon và hấp dẫn. Xúc xích cung cấp hương vị mặn và gia vị, trong khi phô mai tạo ra sự béo ngậy và kem trên pizza. Sự phối hợp của các thành phần khác nhau tạo nên một món pizza đa dạng và ngon miệng.\r\n', 'p10_xucxichphomai_sausagekidmania.jpg', '002'),
('P11', 'Pizza Hải sản sốt cà chua - Seafood delight', 100, 145000, '\r\nMô tả: Seafood Delight Pizza có hình dạng tròn với bột mì nướng giòn và lớp sốt cà chua trên mặt. Nó được chế biến với sự kết hợp của các loại hải sản như tôm, mực, cá hoặc hàu, tạo nên một món ăn hấp dẫn cho những người yêu thích hải sản.\r\n\r\nThành phần chính:\r\n\r\nHải sản: Seafood Delight Pizza thường sử dụng các loại hải sản như tôm, mực, cá hoặc hàu. Các loại hải sản này có thể được chế biến và đặt lên bề mặt pizza. Hương vị tươi ngon và hấp dẫn của hải sản tạo nên một phần quan trọng trên pizza này.\r\nSốt cà chua: Sốt cà chua truyền thống thường được sử dụng để tạo nền tảng hương vị cho pizza. Nó có thể được pha trộn với các gia vị và thảo mục khác để tăng thêm hương vị và sự đa dạng.\r\nPhong cách: Seafood Delight Pizza thường có lớp sốt cà chua truyền thống, sau đó được phủ lên bề mặt pizza. Hải sản được chế biến và đặt lên cùng với sốt cà chua, và có thể có các thành phần bổ sung như hành tây, nấm, ớt chuông hoặc gia vị khác. Một số phiên bản có thể có thêm sốt ớt hoặc sốt kem để tạo thêm hương vị và động lực.\r\n\r\nHương vị: Với sự kết hợp của các loại hải sản tươi ngon và sốt cà chua, Seafood Delight Pizza mang đến một hương vị tươi mát và hấp dẫn của biển cả. Hải sản cung cấp hương vị đậm đà và nồng nàn, trong khi sốt cà chua tạo ra một hương vị chua ngọt và thơm ngon. Sự phối hợp của các thành phần khác nhau tạo ra một món pizza đa dạng và ngon miệng.\r\n', 'p11_Pizza-Hai-San-Xot-Ca-Chua-Seafood-Delight.jpg', '002'),
('P12', 'Pizza Hải sản nhiệt đới sốt tiêu ', 100, 149000, '\r\nMô tả: Tropical Seafood Pizza with Pepper Sauce có hình dạng tròn với bột mì nướng giòn và lớp sốt tiêu trên mặt. Nó được chế biến với sự kết hợp của các loại hải sản như tôm, mực, cá hoặc hàu, kết hợp với các thành phần nhiệt đới như dứa, dứa khô, hoặc ớt chuông, tạo nên một món ăn độc đáo và phong cách.\r\n\r\nThành phần chính:\r\n\r\nHải sản: Tropical Seafood Pizza thường sử dụng các loại hải sản như tôm, mực, cá hoặc hàu. Các loại hải sản này có thể được chế biến và đặt lên bề mặt pizza. Hương vị tươi ngon và hấp dẫn của hải sản tạo nên một phần quan trọng trên pizza này.\r\nCác thành phần nhiệt đới: Để tạo ra hương vị nhiệt đới, pizza này thường được kết hợp với các thành phần như dứa tươi, dứa khô, ớt chuông hoặc các loại rau sống tươi mát. Sự phối hợp này tạo nên một hương vị độc đáo và mang tính chất nhiệt đới cho pizza.\r\nSốt tiêu: Sốt tiêu thường được sử dụng để tạo nên lớp gia vị đặc trưng trên pizza này. Sốt tiêu có thể có hương vị cay nhẹ hoặc cay mạnh tùy theo sở thích cá nhân. Nó tạo ra một hương vị đặc biệt và hấp dẫn cho pizza hải sản nhiệt đới này.\r\n\r\nPhong cách: Tropical Seafood Pizza thường có lớp sốt tiêu truyền thống, sau đó được phủ lên bề mặt pizza. Hải sản và các thành phần nhiệt đới được chế biến và đặt lên cùng với sốt tiêu. Một số phiên bản có thể có thêm các gia vị khác như tỏi, hành tây hoặc các loại hương liệu để tăng cường hương vị và động lực.\r\n\r\nHương vị: Với sự kết hợp của các loại hải sản tươi ngon, các thành phần nhiệt đới và sốt tiêu, Tropical Seafood Pizza mang đến một hương vị nhiệt đới độc đáo và hấp dẫn. Hải sản cung cấp hương vị đậm đà và nồng nàn, trong khi các thành phần nhiệt đới tạo ra một hương vị tươi mát và tinh tế. Sốt tiêu mang đến một gia vị đặc trưng, tạo ra một sự kết hợp hài hòa và thú vị trên pizza.\r\n', 'p12_Pizzaminsea-Hai-San-Nhiet-Doi-Xot-Tieu.jpg', '002'),
('P13', 'Pizza Hải sản sốt Mayonnaise', 100, 199000, '\r\nMô tả: Seafood Pizza sốt Mayonnaise có hình dạng tròn với bột mì nướng giòn và lớp sốt Mayonnaise trên mặt. Nó được chế biến với sự kết hợp của các loại hải sản như tôm, mực, cá hoặc hàu, kết hợp với sốt Mayonnaise mịn màng và kem.\r\n\r\nThành phần chính:\r\n\r\nHải sản: Seafood Pizza thường sử dụng các loại hải sản như tôm, mực, cá hoặc hàu. Các loại hải sản này có thể được chế biến và đặt lên bề mặt pizza. Hương vị tươi ngon và hấp dẫn của hải sản tạo nên một phần quan trọng trên pizza này.\r\nSốt Mayonnaise: Sốt Mayonnaise là thành phần chính tạo nên hương vị đặc trưng cho loại pizza này. Sốt Mayonnaise có hương vị kem mịn và giàu độ mỡ, tạo ra một lớp mềm mịn và hương vị đặc biệt trên bề mặt pizza.\r\nPhong cách: Seafood Pizza sốt Mayonnaise thường có lớp sốt Mayonnaise truyền thống được phủ lên bề mặt pizza. Hải sản được chế biến và đặt lên cùng với sốt Mayonnaise, và có thể có các thành phần bổ sung khác như hành tây, nấm, ớt chuông hoặc gia vị khác. Một số phiên bản có thể có thêm các loại rau sống để tăng cường hương vị và động lực.\r\n\r\nHương vị: Với sự kết hợp của các loại hải sản tươi ngon và sốt Mayonnaise, Seafood Pizza sốt Mayonnaise mang đến một hương vị độc đáo và tinh tế. Hải sản cung cấp hương vị đậm đà và nồng nàn, trong khi sốt Mayonnaise tạo ra một hương vị kem mịn, giàu độ mỡ và đậm đà. Sự phối hợp của các thành phần khác nhau tạo ra một món pizza đa dạng và ngon miệng.\r\n', 'p13_Pizza-Hai-San-Xot-Mayonnaise-Ocean-Mania.jpg', '002'),
('P14', 'Pizza Bò & Tôm nướng kiểu Mỹ', 100, 249000, '\r\nMô tả: American-style Grilled Beef & Shrimp Pizza có hình dạng tròn với bột mì nướng giòn. Nó được chế biến với thịt bò nướng và tôm nướng, kết hợp với các thành phần khác như sốt cà chua, phô mai và các gia vị Mỹ.\r\n\r\nPhong cách: American-style Grilled Beef & Shrimp Pizza thường có lớp sốt cà chua truyền thống, sau đó được phủ lên bề mặt pizza. Thịt bò nướng và tôm nướng được chế biến và đặt lên cùng với các thành phần khác và phô mai, tạo nên một món pizza đa dạng và ngon miệng.\r\n\r\nHương vị: Với sự kết hợp của thịt bò nướng, tôm nướng, sốt cà chua, và phô mai, American-style Grilled Beef & Shrimp Pizza mang đến một hương vị đậm đà, thơm ngon và phong phú. Thịt bò nướng cung cấp hương vị thịt thơm ngon, trong khi tôm nướng mang đến hương vị tươi ngon của hải sản. Các thành phần khác và phô mai phối hợp tạo nên một hương vị ngon lành và hấp dẫn.\r\n', 'p14Surf-turf-Pizza-Bo-Tom-Nuong-Kieu-My-1.jpg', '002'),
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
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `TenQuyen` varchar(50) NOT NULL,
  `MaQuyen` varchar(10) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`TenQuyen`, `MaQuyen`, `SĐT`) VALUES
('Admin', 'ADMIN', '0123456789'),
('Quanli', 'QLI', '0123456788');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `categoryND` varchar(20) NOT NULL,
  `SĐT` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
