<?php
    if (isset($_GET['btn_add'])) {
        echo "đã vào";

        $masp = $_GET["masp_detail"];
        $tensp = $_GET["tensp_detail"];
        $soluong = $_GET["soluong_detail"];
        $img = $_GET["img_detail"];
        $cost = $_GET["cost_detail"];
        $theloai = $_GET["theloai_detail"];
        $ttsp = $_GET["ttsp_detail"];

        $data = array(
            "masp" => $masp,
            "tensp" => $tensp,
            "soluong" => $soluong,
            "img" => $img,
            "cost" => $cost,
            "theloai" => $theloai,
            "ttsp" => $ttsp
        );

        include './controller.php';

        // Tạo một phiên bản của lớp sanpham
        $sanpham = new sanpham;

        // Gọi phương thức để thêm một sản phẩm mới và truyền dữ liệu vào
        $result = $sanpham->themsanpham($data);

        // Kiểm tra xem truy vấn có thành công không
        if ($result) {
            echo "Thêm sản phẩm thành công!";
        } else {
            echo "Thêm sản phẩm thất bại!";
        }
    }
?>
