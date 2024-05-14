

<?php
    $servername = "localhost";
    $username = "root"; // Thay username bằng tên người dùng của bạn
    $password = ""; // Thay password bằng mật khẩu của bạn
    $dbname = "web2";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $perPage = 6;
    $sqltotal = "SELECT * FROM product";
    $tongsotrang = $conn->query($sqltotal);
    $leng = $tongsotrang->num_rows;
    $pageTotal = ceil($leng / $perPage);

    if(isset($_GET['trang'])){
        $page = $_GET['trang'];
    } else {
        $page = 1;
    }
    $begin = ($page - 1) * $perPage;

    $sql = "SELECT * FROM product ORDER BY MaSP  LIMIT $begin , $perPage ";
    $result = mysqli_query($conn, $sql);

?>

<section id="quanlisp">

    <div id="noti">
        <h4 id="noti-title"></h4>
        <div id ="noti-desc"></div>
    </div>


    <div class="overlay">
        <div class="info">
            <button type="button" class="close" onClick="closeAddProductInfo()">x</button>
            <h2 style="font-family: \'Roboto Mono\', monospace; margin-left : 340px">Thêm Mới Sản Phẩm</h2>
            <div>
                <form id = "add_detail_Product" method = "post"  onsubmit = "return validateForm()">
                    <div>
                        <label for ="masp_detail"><b>Mã sản phẩm: </b></label><br>
                        <input style="color : red" id = "masp_detail" name = "masp_detail" type ="text" readonly value="Mã tăng tự động theo TL">
                        <p id = "err_masp" style ="display : none ; color : red" >Mã sản phẩm không được bỏ trống</p>
                    </div>
                    <div>
                        <label for ="tensp_detail"><b>Tên sản phẩm: </b></label><br>
                        <input id ="tensp_detail" name = "tensp_detail" type ="text">
                        <p id ="err_tensp" style ="display : none ; color : red ; white-space: nowrap;" >Tên sản phẩm không được bỏ trống</p>
                    </div>
                    <div>
                        <label for = "img_detail"><b>Ảnh: </b></label><br>
                        <input id="img_detail" name = "img_detail" type="file" accept="image/*" onchange ="displayImage(this)">
                    </div>
                    <div>
                        <label for ="soluong_detail"><b>Số lượng: </b></label><br>
                        <input id = "soluong_detail" name = "soluong_detail" type ="text">
                        <p id ="err_soluong" style ="display : none ; color : red; white-space: nowrap;">Không được bỏ trống và nội dung phải là số !!!</p>
                    </div>
                    <div>
                        <label for ="cost_detail"><b>Giá tiền: </b></label><br>
                        <input id ="cost_detail" name = "cost_detail" type ="text">
                        <p id = "err_giatien" style ="display : none ; color : red ; white-space: nowrap;">Không được bỏ trống và nội dung phải là số !!!</p>
                    </div>
                    <div>
                        <label><b>Thể loại: </b></label><br>
                        <select id = "theloai_detail" name = "theloai_detail">
                            <option value = 001 >Hamburger</option>
                            <option value = 002 selected>Pizza</option>
                            <option value = 003 >Chicken</option>
                            <option value = 004 >Drink</option>
                        </select>
                    </div>
                    <div>
                        <label for= "ttsp_detail"><b>Thông tin chi tiết: </b></label><br>
                        <textarea id ="ttsp_detail" name = "ttsp_detail" rows="4" cols="50">
                        </textarea>
                        <p id="err_ttsp" style ="display : none ; color : red">Nội dung không được bỏ trống</p>
                    </div>
                    <div class = "display_img">
                        <label><b>Hình ảnh vừa chọn: </b></label><br>
                        <input id ="display_image" name = "display_image" type ="image" value ="" style="max-width: 240px; max-height: 140px;">
                    </div>
                    <button type ="submit" class="btn-search">Thêm sản phẩm</button>
                </form>
            </div>
        </div>
    </div>

    <div style = "display : flex ; justify-content: space-between">
        <div Them="CN02">
        </div>
        <div id ="searchBar">
            <form id = "searchForm" method = "post" >
                <div id = "nameSP">
                    <label for ="tensp"><b>Tên sản phẩm: </b></label>
                    <input type= "text" id="tensp" name = "tensp" >
                </div>
                <div id = "categorySP">
                    <label for ="theloaisp"><b>Thể loại: </b></label>
                    <select id="theloaisp" name = "theloai">
                        <option value="001">Hamburger</option>
                        <option value="002">Pizza</option>
                        <option value="003">Chicken</option>
                        <option value="004">Drink</option>
                    </select>
                </div>
                <div>
                    <!-- <input type="submit" id="sbm_search" name="btn_Search" value = "Tìm kiếm"> -->
                    <button type="submit" id="sbm_search" name="btn_Search" >Tìm kiếm</button>
                </div>
            </form>
        </div>
    </div>

    <ul class="pageNumber">
        <?php
        for ($i = 1; $i <= $pageTotal; $i++) {
            echo '<li><a class="button-active' . (($i == 1) ? ' activePT' : '') . '" data-page="' . $i . '" href="./module/sanpham.php?trang='.$i.'">'.$i.'</a></li>';
        }
        ?>
    </ul>


    <table class="table table-bordered" style="text-align: center ; display: grid">
        <thead>
            <tr>
                <th scope="col">Mã Sản Phẩm</th>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Số Lượng</th>
                <th scope="col">Giá Tiền</th>
                <th scope="col">Tùy Chỉnh</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if($result->num_rows > 0){
                    $i=0;
                    while($row = $result->fetch_assoc()){
                        echo '
                            <tr  style="color: #222222; font-weight: bold;">
                                <th scope="row">'.$row['MaSP'].'</th>
                                <td>'.$row['TenSP'].'</td>
                                <td><img class= "img" src="./img/'.$row['IMG'].'" alt="Ảnh sản phẩm"></td>
                                <td>'.$row['SoLuongSP'].'</td>
                                <td>'.$row['GiaSP'].'</td>
                                <td style="display:none">'.$row['categoryId'].'</td>
                                <td style="display:none">'.$row['TTSP'].'</td>
                                <td class = "custom-icons">
                                    <div Sua="CN02">
                                        
                                    </div>
                                    <div Xoa="CN02">
                                            
                                    </div>
                                </td>
                            </tr> ';
                    }
                }
            ?>
        </tbody>
    </table>

    <div class="fix_overlay" >
        <div class="fix_info">
            <button type="button" class="close" onClick="closeFixProductInfo()">x</button>
            <h2 style="font-family: \'Roboto Mono\', monospace; display:flex ; justify-content: center;">Sửa Sản Phẩm</h2>
            <form id = "fix_detail_Product" method = "post" >
                <div class ="textcss">
                    <div>
                        <label for ="fix_masp"><b>Mã sản phẩm: </b></label><br>
                        <input id = "fix_masp" name = "fix_masp" type ="text" value="" readonly>
                    </div>
                    <div>
                        <label for ="fix_tensp"><b>Tên sản phẩm: </b></label><br>
                        <input id ="fix_tensp" name = "fix_tensp" type ="text" value="">
                        <p id ="err_fix_tensp" style ="display : none ; color : red ; white-space: nowrap;" >Tên sản phẩm không được bỏ trống</p>
                    </div>  
                    <div>
                        <label for = "fix_img"><b>Ảnh: </b></label><br>
                        <input id="fix_img" name = "fix_img" type="file" accept="image/*" onchange ="displayNewImage(this)" >
                    </div>
                    <div>
                        <label for ="fix_soluong"><b>Số lượng: </b></label><br>
                        <input id = "fix_soluong" name = "fix_soluong" type ="text" value="">
                        <p id ="err_fix_soluong" style ="display : none ; color : red; white-space: nowrap;">Không được bỏ trống và nội dung phải là số !!!</p>

                    </div>
                    <div>
                        <label for ="fix_cost"><b>Giá tiền: </b></label><br>
                        <input id ="fix_cost" name = "fix_cost" type ="text" value="">
                        <p id = "err_fix_giatien" style ="display : none ; color : red ; white-space: nowrap;">Không được bỏ trống và nội dung phải là số !!!</p>
                    </div>
                    <div>
                        <label><b>Thể loại: </b></label><br>
                        <select id="fix_theloai" name="fix_theloai">
                            <option value="001">Hamburger</option>
                            <option value="002">Pizza</option>
                            <option value="003">Chicken</option>
                            <option value="004">Drink</option>
                        </select>
                    </div>
                    <div>
                        <label for= "fix_ttsp"><b>Thông tin chi tiết: </b></label><br>
                        <textarea id ="fix_ttsp" name = "fix_ttsp" rows="10" cols="50" value=""></textarea>
                        <p id="err_fix_ttsp" style ="display : none ; color : red">Nội dung không được bỏ trống</p>
                    </div>
                    <div class="display_img">
                        <label><b>Hình ảnh cũ: </b></label><br>
                        <img id="display_old_image" alt="Hình ảnh cũ" src="" style="max-width: 240px; max-height: 140px;" name = "display_old_image">
                    </div>
                    <div class = "display_img">
                        <label><b>Hình ảnh mới: </b></label><br>
                        <input id ="display_new_image" name = "display_new_image" type ="image" value ="" style="max-width: 240px; max-height: 140px;">
                    </div>
                </div>
                <input id="btn_fix" class="btn_fix" type="submit" value = "Sửa sản phẩm" name="btn_fix">
            </form>
        </div>
    </div>
    

</section>

<link rel="stylesheet" href="./CSS/product_manager.css"/>

<script src="./JS/qlsanpham.js"></script>
<script>
</script>