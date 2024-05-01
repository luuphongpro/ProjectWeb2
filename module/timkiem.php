<?php 
    include './connect.php';
    $conn = new connect;
    $conn->constructor();
    $perPage = 9;
    if(isset($_GET['trang'])){
        $page = $_GET['trang'];
    } else {
        $page = 1;
    }
    $begin = ($page - 1) * $perPage;
    $sqltotal = "SELECT * FROM product";
    $tongsotrang = $conn->excuteSQL($sqltotal);
    $leng = $tongsotrang->num_rows;
    $pageTotal = ceil($leng / $perPage);
    // Tạo kết nối

    if(isset($_GET['timkiem'])){
        $name = $_GET['txtTimkiem'];
        $category = $_GET['category'];
        
        if(empty($_GET['minPrice'])){
            $minPrice = 0;
        }else{
            $minPrice = $_GET['minPrice'];
        }

        if(empty($_GET['maxPrice'])){
            $maxPrice = 999999999;
        }else{
            $maxPrice = $_GET['maxPrice'];
        }

        $filterdata = "SELECT * FROM `product` WHERE `TenSP` LIKE '%$name%' && `MaSP` LIKE '%$category%' && GiaSP BETWEEN $minPrice AND $maxPrice LIMIT $begin , $perPage";
        $filterdata_run = $conn->excuteSQL($filterdata);
        if (mysqli_num_rows($filterdata_run) > 0){
            foreach($filterdata_run as $row) {
                $productIndex=0;
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
                                    echo "<a onclick=AddToCart('".$row['MaSP']."')><i class='fa-solid fa-cart-shopping' style='color:#ffff'></i></a>";
                                echo "</div>";
                                echo "<p>Số lượng còn lại: " . $row['SoLuongSP'] . "</p>";
                                echo "<button class='detail-button' data-product-index='" . $productIndex . "'>Chi tiết</button>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";

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
                echo "<button class='addtocart' onclick=onclick=AddFromDetail('".$row['MaSP']."',event)>Thêm vào giỏ</button>";

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

                $productIndex++;
                
            }
        }
        else {
            echo "Không tìm thấy kết quả";
        }
    }
?>