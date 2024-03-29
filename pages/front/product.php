<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "username"; // Thay username bằng tên người dùng của bạn
$password = "password"; // Thay password bằng mật khẩu của bạn
$dbname = "Web2";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Truy vấn để lấy thông tin sản phẩm
$sql = "SELECT * FROM product";
$result = $conn->query($sql);

// Hiển thị sản phẩm nếu có
if ($result->num_rows > 0) {
    echo '<section class="food_section layout_padding-bottom">
            <div class="container">
              <div class="heading_container heading_center">
                <h2>
                  Our Menu
                </h2>
              </div>

              <ul class="filters_menu">
                <li class="active" data-filter="*">All</li>
                <li data-filter=".burger">Burger</li>
                <li data-filter=".pizza">Pizza</li>
                <li data-filter=".pasta">Pasta</li>
                <li data-filter=".fries">Fries</li>
              </ul>

              <div class="row">';
    
    // Duyệt qua mỗi dòng dữ liệu
    while($row = $result->fetch_assoc()) {
        echo "<div class='col-sm-6 col-lg-4'>";
            echo "<div class='filters-content'>";
                // echo "<div class='row grid'>";
                    echo "<div class='box'>";
                        echo "<div class='detail-box'>";
                            echo "<div class='img-box'>";
                                echo "<img src='./img/" . $row['IMG'] . "' alt='" . $row['TenSP'] . "' style='width: 100%; height: 100%;'>";
                            echo "</div>";
                            echo "<h2>" . $row['TenSP'] . "</h2>";
                            echo "<div class='options'>";
                                echo "<p>Giá: " . number_format($row['GiaSP']) . " VNĐ</p>";
                                echo "<a href=''><i class='fa-solid fa-cart-shopping' style='color:#ffff'></i></a>";
                            echo "</div>";
                            echo "<p>Số lượng còn lại: " . $row['SoLuongSP'] . "</p>";
                        // Các thông tin khác về sản phẩm có thể được thêm vào ở đây
                        echo "</div>";
                    echo "</div>";
                // echo "</div>";
            echo "</div>";
        echo "</div>";
    }


    echo '</div></div></section>';
} else {
    echo "Không có sản phẩm nào.";
}

// Đóng kết nối
$conn->close();
?>