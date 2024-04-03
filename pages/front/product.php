<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root"; // Thay username bằng tên người dùng của bạn
$password = ""; // Thay password bằng mật khẩu của bạn
$dbname = "web2";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Truy vấn để lấy tổng số sản phẩm
$perPage = 9;

$sqltotal = "SELECT * FROM product";
$tongsotrang = $conn->query($sqltotal);
$leng = $tongsotrang->num_rows;
$pageTotal = ceil($leng / $perPage);

// Xác định trang hiện tại
if(isset($_GET['trang'])){
    $page = $_GET['trang'];
} else {
    $page = 1;
}
$begin = ($page - 1) * $perPage;

// Truy vấn để lấy thông tin sản phẩm
$sql = "SELECT * FROM product ORDER BY MaSP DESC LIMIT $begin , $perPage ";
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
                <li data-filter=".pasta">Combo</li>
                <li data-filter=".fries">Fries</li>
              </ul>

              <div class="row">';
    
    // Duyệt qua mỗi dòng dữ liệu
    while($row = $result->fetch_assoc()) {
        echo "<div class='col-sm-6 col-lg-4'>";
            echo "<div class='filters-content'>";
                echo "<div class='box'>";
                    echo "<div class='detail-box'>";
                        echo "<div class='img-box'>";
                            echo "<img src='./img/" . $row['IMG'] . "' alt='" . $row['TenSP'] . "' style='width: 100%; height: 100%;'>";
                        echo "</div>";
                        echo "<h2 style='margin-bottom: 20px; margin-top: 20px;'>" . $row['TenSP'] . "</h2>";
                        echo "<div class='options'>";
                            echo "<p>Giá: " . number_format($row['GiaSP']) . " VNĐ</p>";
                            echo "<a href=''><i class='fa-solid fa-cart-shopping' style='color:#ffff'></i></a>";
                            echo "</div>";
                        echo "<p>Số lượng còn lại: " . $row['SoLuongSP'] . "</p>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        echo "</div>";
    }

    echo '</div></div></section>';

    echo '<div style="display: flex; justify-content: center; align-items: center;">';
    echo '<ul class ="pageNumber">';
    echo '<li>Trang: </li>';
    for ($i = 1; $i <= $pageTotal; $i++) {
        echo '<li><a href="index.php?trang=' . $i . '">' . $i . '</a></li>';
    }
    echo '</ul>';
    echo '</div>';

} else {
    echo "Không có sản phẩm nào.";
}

// Đóng kết nối
$conn->close();
?>

<style>
    ul.pageNumber {
        display: flex;
        margin: 50px;
        list-style: none;
    }

    ul.pageNumber li {
        display: block;
        color: #000;
        margin-left: 10px;
    }

    ul.pageNumber li a {
        text-decoration: none;
        background-color: burlywood;
        padding: 5px 12px;
        margin: 20px;
    }
</style>

<script>
    function loadPageScript() {
        var pageLinks = document.querySelectorAll('.pageNumber a');
        pageLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault(); // Ngăn chặn hành động mặc định của liên kết
                var url = this.getAttribute('href'); // Lấy URL của trang mới
                loadPage(url); // Gọi hàm để tải trang mới bằng AJAX
            });
        });
    }

    document.addEventListener("DOMContentLoaded", loadPageScript);


        // Hàm để tải trang mới bằng AJAX
    function loadPage(url) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 400) {
                var response = xhr.responseText;
                var parser = new DOMParser();
                var newDoc = parser.parseFromString(response, 'text/html');
                var newContent = newDoc.querySelector('.food_section');
                var pagination = newDoc.querySelector('.pageNumber');
                document.querySelector('.food_section').innerHTML = newContent.innerHTML; // Cập nhật nội dung của phần sản phẩm
                document.querySelector('.pageNumber').innerHTML = pagination.innerHTML; // Cập nhật phân trang
                loadPageScript(); // Gọi lại hàm để gắn kết sự kiện click với các liên kết trang mới
            } else {
                console.error('Request failed with status', xhr.status);
            }
        };
        xhr.onerror = function() {
            console.error('Request failed');
        };
        xhr.send();
    }


 </script>   
