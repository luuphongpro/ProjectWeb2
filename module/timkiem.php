<?php
include 'controller.php';
// include '../pages/front/filter.php';
$sanpham = new sanpham;
$data=json_decode($_REQUEST['dataJSON']);
$perPage = 9;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$strURL= "./module/timkiem.php?timkiem=".$data->timkiem."&category=".$data->category."&minPrice=".$data->minPrice."&maxPrice=".$data->maxPrice;
// echo $strURL;
// Tạo kết nối
if (isset($_GET['timkiem'])) {
    $name = $_GET['timkiem'];
    $category = $_GET['category'];
    
    if (empty($_GET['minPrice'])) {
        $minPrice = 0;
    } else {
        $minPrice = $_GET['minPrice'];
    }

    if (empty($_GET['maxPrice'])) {
        $maxPrice = 999999999;
    } else {
        $maxPrice = $_GET['maxPrice'];
    }
    $begin = ($page - 1) * $perPage;
    $filterdata = $sanpham->timkiem($name, $category, $minPrice, $maxPrice, $begin, $perPage);
    $leng = $sanpham->gettongtmkiem($name, $category, $minPrice, $maxPrice);
    $pageTotal = ceil($leng / $perPage);
    if (mysqli_num_rows($filterdata) > 0) {

        foreach ($filterdata as $row) {
            $productIndex = 0;
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
            echo "<a onclick=AddToCart('" . $row['MaSP'] . "')><i class='fa-solid fa-cart-shopping' style='color:#ffff'></i></a>";
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
            echo "<p id='ttsp'>" . $row['TTSP'] . "</p>";
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
            echo "<button class='addtocart' onclick=onclick=AddFromDetail('" . $row['MaSP'] . "',event)>Thêm vào giỏ</button>";

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
    } else {
        echo "Không tìm thấy kết quả";
    }
    echo '</div></div></section>';

    echo '<ul class="pagination justify-content-center mt-5"><li class="page-item '.($page==1 ? "disabled" : "").'"><a class="page-link" href="'.$strURL . "&page=" . ($page-1).'">Previous</a></li>';
    for ($i = 1; $i <= $pageTotal; $i++) {
        $pageUrl = $strURL . "&page=" . $i;
        echo '<li class="page-item"><a class="page-link '.($page==$i ? "active" : "").'" href="' . $pageUrl . '">' . $i . '</a></li>';
    }
    echo '<li class="page-item '.($page== $pageTotal? "disabled" : "").'"><a class="page-link" href="'.$strURL . "&page=" . ($page+1).'">Next</a></li></ul>';
    echo '<div style="display: flex; justify-content: center; align-items: center;">';
}
?>
<script>
    $(document).ready(function(){
    $('.pagination').on('click', function(e){
        e.preventDefault();
        console.log(e.target);
        // $(this).closest('.pageNumber').find('.button-active').removeClass('activePT');
        var url = $(e.target).attr('href'); 
        $(e.target).addClass('active');
        if(url.split("=")[1]==1){
            $(".page-item").removeClass("disabled");
            $(".page-item").first().addClass("disabled");
        } else {
            
        }
        if(<?php echo $pageTotal; ?> == url.split("=")[1]==1) {
            $(".phantrang > .page-item").last().addClass("disabled");
        } else {
            $(".phantrang > .page-item").last().removeClass("disabled");
        }
        // Lấy URL của trang mới
        loadPage(url);
        handlePage($(this).data('page')); // Gọi hàm để tải trang mới bằng AJAX
    });
    function handlePage(page){
        var dataContainer = document.getElementById('data-container');
        dataContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    function loadPage(url) {
    var xhr=new XHR();
    console.log(url)
    return xhr.connect(undefined,url)
    .then((data)=>{
        $('.container-product').html(data);
    })
}
});
</script>