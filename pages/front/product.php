<?php
    include_once 'filter.php';
    include './module/controller.php';
    $sanpham=new sanpham;
    $perPage = 9;
    $leng = $sanpham->gettongsanpham();
    $pageTotal = ceil($leng / $perPage);

    // Xác định trang hiện tại
    if(isset($_GET['trang'])){
        $page = $_GET['trang'];
    } else {
        $page = 1;
    }
    $begin = ($page - 1) * $perPage;
    $result=$sanpham->dssanphamphantrang($begin,$perPage);



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
    
    echo '<ul class="pagination justify-content-center mt-5 phantrang">
    <li class="page-item '.($page==1 ? "disabled" : "").'"><a class="page-link" href="index.php?trang='.($page-1).'">Previous</a></li>';
    for ($i = 1; $i <= $pageTotal; $i++) {
        echo '<li class="page-item"><a class="page-link '.($page==$i ? "active" : "").'" href="index.php?trang='.$i.'">' . $i . '</a></li>';
    }
    echo '<li class="page-item '.($page== $pageTotal? "disabled" : "").'"><a class="page-link" href="index.php?trang= '.($page+1).'">Next</a></li></ul>';
    echo '</div></div></section>';

?>
