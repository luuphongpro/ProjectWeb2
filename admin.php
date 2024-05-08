<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./fonts/themify-icons-font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./CSS/bootstrap.css">
    <link rel="stylesheet" href="./CSS/admin.css">
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./CSS/cssDangky.css">
    <title>Document</title>
</head>
<body>
    <div id="rapper-admin">
        <div id="header">
            <div class="container-item"><i class="ti-layout-grid2-alt"></i> Administrator</div>
            <div class="container-item" onclick="cook()"><i class="ti-share-alt"></i> Vào trang web</div>
            <div class="container-item right-item">Xin chào: admin <i class="ti-angle-down"></i></div>
        </div>
        <div id="content">
            <div class="left-content">
                <div class="container active" id="changchu">
                    <i class="ti-home"></i>
                    Trang chủ Admin
                </div>

                <div class="container">
                    <div class="item-container" id="qlsanpham">
                        Quản lý sản phẩm <i class="ti-angle-down"></i>
                    </div>
                    <ul class="menudrop-qlsanpham">
                        <!-- <li class="item-menu"><i class="ti-plus"></i> Thêm sản phẩm</li>
                        <li class="item-menu"><i class="ti-plus"></i> Sửa sản phẩm</li>
                        <li class="item-menu"><i class="ti-plus"></i> Xóa sản phẩm</li> -->
                    </ul>

                </div>

                <div class="container">
                    <div class="item-container" id="donhang">
                        Quản lý Bán Hàng <i class="ti-angle-down"></i>
                    </div>
                    <ul class="menudrop-donhang">
                        <li class="item-menu"><i class="ti-plus"></i> Đơn hàng</li>
                        <li class="item-menu"><i class="ti-plus"></i> Xem thống kê bán hàng</li>
                    </ul>
                </div>
                <div class="container">
                    <div class="item-container" id="thongke">
                        Thống kê doanh thu<i class="ti-angle-down"></i>
                    </div>
                    <ul class="menudrop-">
                        <!-- Thích thì thêm item cho dropmenu bằng cách đặt tên class rồi qua admin.css thêm thuộc tính-->
                    </ul>
                </div>
                <div class="container">
                    <div class="item-container" id="qlquyen">
                        Quản lý quyền <i class="ti-angle-down"></i>
                    </div>
                    <ul class="menudrop-">
                        <!-- Thích thì thêm item cho dropmenu bằng cách đặt tên class rồi qua admin.css thêm thuộc tính-->
                    </ul>
                </div>
                <div class="container">
                    <div class="item-container" id="taikhoan">
                        Quản lý tài khoản <i class="ti-angle-down"></i>
                    </div>
                    <ul class="menudrop-qltk">
                        <li class="item-menu"><i class="ti-plus"></i> Thêm tài khoản</li>
                        <li class="item-menu"><i class="ti-plus"></i> Sửa tài khoản</li>
                        <li class="item-menu"><i class="ti-plus"></i> Xóa tài khoản</li>
                    </ul> 
                </div>
            <div class="container">
                    <div class="item-container" id="dstaikhoan">
                        Danh sách tài khoản<i class="ti-angle-down"></i>
                    </div>
                    
                </div>
                </div>
            <div id="right-content">
                <!-- Cần làm ở đây -->
                <!-- Có thể dùng model có top-menu bên dưới -->
                <!-- <div class="model-tk model-right">
                    <div class="top-menu">
                    <ul class="list-group list-group-horizontal menu-container">
                        <li class="list-group-item model-item">Thêm tài khoản</li>
                        <li class="list-group-item model-item">Sửa tài khoản</li>
                        <li class="list-group-item model-item">Xóa tài khoản</li>
                    </ul>
                    </div>
                    <div class="model-content">
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <?php
        include './pages/front/footer.php';
    ?>
    <script src="./JS/vadidation.js"></script>
    <script src="./JS/jquery-3.4.1.min.js"></script>
    <script src="./JS/admin.js"></script>
    <script src="./JS/qlsanpham.js"></script>
    <script src="./JS/member.js"></script>
    <script src="./JS/phanquyen.js"></script>
    <script src="https://kit.fontawesome.com/2d8d1ff741.js" crossorigin="anonymous"></script>
    <script src="JS/qltaikhoan.js"></script>
</body>
</html>