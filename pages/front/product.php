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

            <div class="searchBar">
                <form class="filter">
                    <div class="item ten">
                        <label>Tên</label>
                        <input name="name" type="text">
                    </div>
                    <div class="item submit">
                        <button>Tìm kiếm</button>
                    </div>
                    <div class="item">
                        <label>Danh mục</label>
                        <select name="category">
                            <option value="">---</option>
                            <option value="Hamburger">Hamburger</option>
                            <option value="Gà">Gà</option>
                            <option value="Pizza">Pizza</option>
                            <option value="Nước">Nước</option>
                        </select>
                    </div>
                    <div class="item">
                        <label>Tối thiểu</label>
                        <input name="minPrice" type="number">
                    </div>
                    <div class="item">
                        <label>Tối đa</label>
                        <input name="maxPrice" type="number">
                    </div>
                </form>
            </div>

              <div class="row">';
     // Duyệt qua mỗi dòng dữ liệu
     $productIndex = 0;
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
                         echo "<button class='detail-button' data-product-index='" . $productIndex . "'>Chi tiết</button>";
                     echo "</div>";
                 echo "</div>";
             echo "</div>";
         echo "</div>";
 
         // echo "<div id='productInfo' class='productInfo  data-product-index='" . $productIndex . "'>";
         echo "<div class='overlay' data-product-index='" . $productIndex . "'>";
         echo "<div class='info' data-product-index='" . $productIndex . "'>";
         echo "<button type='button' class='close' onClick='closeProductInfo()'>+</button>";
 
         echo "<div class='left'>";
         echo '<h2 style="font-family: \'Roboto Mono\', monospace; margin-bottom: 25px; margin-left: 70px; margin-bottom:30px; ">Chi tiết sản phẩm</h2>';        
         echo "<div class='img-box'>";
         echo "<img id='imgbig' src='./img/" . $row['IMG'] . "' alt='" . $row['TenSP'] . "' >";
         echo "</div>";
         echo "<p id='ttsp'>" . $row['TTSP'] ."</p>";
         echo "</div>";
 
         echo "<div class='right'>";
         echo "<h2 style='margin-bottom: 20px; margin-top: 20px; font-size: 2.5rem;'>" . $row['TenSP'] . "</h2>";
         echo "<h4>Giá: " . number_format($row['GiaSP']) . " VNĐ</h4>";
         //
         echo "<div class='right-flex'>";
         echo "<h4>Số lượng</h4>";
 
         echo "<div>";
         echo "<button class='quantitydown' onClick='quantitydown()'>-</button><input type='text' id='quantity' value='1'><button class='quantityup' onClick='quantityup()'>+</button>";
         echo "</div>";
 
         echo "</div>";
         //
         echo "<input type='hidden' name='idp' id='idp' value='1'>";
         echo "<button class='addtocart' onclick=getquantity()>Thêm vào giỏ</button>";
 
         echo "<div id='share-buttons'>";
         echo "<a class='facebook' target='blank'><i class='fab fa-facebook'></i></a>";
         echo "<a class='twitter' target='blank'><i class='fab fa-twitter'></i></a>";                                
         echo "</div>";
 
         echo "<div class='callphone'>";
         echo "<p>Gọi mua hàng:";
         echo "<a>1111.1111.111</a>";
         echo "<span>(9h-16h)</span>";
         echo "</p>";
         echo "</div>";
 
         echo "<div class='r-note'><i class='fa-solid fa-truck-fast fa-lg'></i><p>Giao hàng tận nơi</p></div>";
         echo "<div class='r-note'><i class='fa-solid fa-hand-holding-dollar fa-lg'></i><p>Ưu đãi mỗi ngày</p></div>";
         echo "<div class='r-note'><i class='fa-regular fa-credit-card fa-lg'></i></i><p>Thanh toán COD,BANK,MOMO</p></div>";
 
         echo "</div>";
         echo "</div>";
         echo "</div>";
         // echo "</div>"; 
 
 
         $productIndex++;
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

<!-- <script>
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


 </script>    -->
