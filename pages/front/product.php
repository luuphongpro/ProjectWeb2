<div class="searchBar">
    <form class="filter" method="get" action="product.php">
        <div class="item ten">
            <label>Tên</label>
            <input name="txtTimkiem" value="<?php if(isset($_GET['txtTimkiem'])){echo $_GET['txtTimkiem'];} ?>" type="text">
        </div>
        <div class="item submit">
            <input class="btnSearch" type="submit" name="timkiem">
        </div>
        <div class="item">
            <label>Danh mục</label>
            <select name="category">
                <option value="">---</option>
                <option value="B">Hamburger</option>
                <option value="C">Gà</option>
                <option value="P">Pizza</option>
                <option value="D">Nước</option>
            </select>
        </div>
        <div class="item">
            <label>Giá tối thiểu</label>
            <input name="minPrice" type="number" min = 0 value = "<?php if(isset($_GET['minPrice'])){echo $_GET['minPrice'];}?>">
        </div>
        <div class="item">
            <label>Giá tối đa</label>
            <input name="maxPrice" type="number" min = 0 value = "<?php if(isset($_GET['maxPrice'])){echo $_GET['maxPrice'];} ?>">
        </div>
    </form>
</div>
<?php
    $servername = "localhost";
    $username = "root"; // Thay username bằng tên người dùng của bạn
    $password = ""; // Thay password bằng mật khẩu của bạn
    $dbname = "web2";

    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password, $dbname);

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
    $result = mysqli_query($conn, $sql);



// Hiển thị sản phẩm nếu có
echo '<section class="food_section layout_padding-bottom" id="data-container">
        <div class="container">
        <div class="heading_container heading_center">
        <h2>
        Our Menu
        </h2>
        </div>

        <div class="row container-product">';
    if ($result->num_rows > 0) {
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
                                echo '<a onclick=AddToCart("'.$row['MaSP'].'")><i class="fa-solid fa-cart-shopping" style="color:#ffff"></i></a>';
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
            echo "<button class='addtocart' onclick=AddFromDetail('".$row['MaSP']."',event)>Thêm vào giỏ</button>";

            echo '<div class="footer_social" style="font-size: 30px; margin-bottom: 15px; Color: #626071;">
            <a href="">
            <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
            <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="">
            <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
            <a href="">
            <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
            <a href="">
            <i class="fa fa-pinterest" aria-hidden="true"></i>
            </a>
            </div>';

            echo "<div class='callphone'>";
            echo "<p>Gọi mua hàng:";
            echo "<a>1111.1111.111</a>";
            echo "<span>(10h-10h)</span>";
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
    } else {
        echo "Không có sản phẩm nào.";
    }
    
    echo '</div></div></section>';

    echo '<div style="display: flex; justify-content: center; align-items: center;">';
        echo '<ul class ="pageNumber">';
        for ($i = 1; $i <= $pageTotal; $i++) {
            echo '<li ><a  class=" button-active '. (($i == 1) ? ' activePT' : '') .' " data-page="'.$i.'" href="index.php?trang=' . $i . '">' . $i . '</a></li>';
        }
        echo '</ul>';
    echo '</div>';

    // Đóng kết nối
    $conn->close();
?>
<script src="JS/product_detail.js"></script>
    
<style>

    .pageNumber li :hover,
    .activePT{
        background-color: gray;
    }


    ul.pageNumber {
        display: flex;
        margin-bottom: 40px;
        list-style: none;

    }

    ul.pageNumber li {
        display: block;
        margin-left: 0px;
        background-color: black ;
        padding: 9px 0px;

    }

    ul.pageNumber li a {
        color : aqua;
        text-decoration: none;
        padding: 10px 17px;
    }
</style>


<script>

$(document).ready(function(){
    $('.pageNumber').on('click', '.button-active', function(e){
        e.preventDefault();
        $(this).closest('.pageNumber').find('.button-active').removeClass('activePT');
        $(this).addClass('activePT');
        var url = this.getAttribute('href'); // Lấy URL của trang mới
        loadPage(url);
        handlePage($(this).data('page')); // Gọi hàm để tải trang mới bằng AJAX
    });
    function handlePage(page){
        var dataContainer = document.getElementById('data-container');
        dataContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
});

    
// Hàm để tải nội dung của trang mới bằng AJAX
function loadPage(url) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 400) {
            var response = xhr.responseText;
            var parser = new DOMParser();
            var newDoc = parser.parseFromString(response, 'text/html');
            var newContent = newDoc.querySelector('.food_section');
            $('.food_section').html(newContent);
            bindDetailButtons(); // Gắn kết sự kiện click với nút chi tiết sản phẩm mới
        } else {
            console.error('Request failed with status', xhr.status);
        }
    };
    xhr.onerror = function() {
        console.error('Request failed');
    };
    xhr.send();
}

// Hàm để gắn kết sự kiện click với các nút chi tiết sản phẩm mới
function bindDetailButtons() {
    var detailButtons = document.querySelectorAll('.detail-button');
    detailButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            var productIndex = this.getAttribute('data-product-index');
            var overlay = document.querySelector('.overlay[data-product-index="' + productIndex + '"]');
            overlay.style.display = "flex"; // Hiển thị overlay
            var info = document.querySelector('.info[data-product-index="' + productIndex + '"]');
            info.style.display = "flex"; // Hiển thị overlay
        });
    });

}

bindDetailButtons(); 

</script>   
