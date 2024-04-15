




<?php
    include './controller.php';
    $sanpham = new sanpham;
    $result = $sanpham->dssanpham();

    if($result->num_rows > 0){

        echo '  
            <section id="quanlisp">
                <div class="overlay">
                        <div class="info"">
                            <button type="button" class="close" onClick="closeAddProductInfo()">x</button>
                            <h2 style="font-family: \'Roboto Mono\', monospace; margin-left : 340px">Thêm Mới Sản Phẩm</h2>
                            <div>
                                <form id = "add_detail_Product" method = "get" action ="./process_add_form.php" onsubmit = "return validateForm()">
                                    <div>
                                        <label for ="masp_detail"><b>Mã sản phẩm: </b></label><br>
                                        <input id = "masp_detail" name = "masp_detail" type ="text">
                                        <div id = "err_masp" style ="display : none ; color : red" >Mã sản phẩm không được bỏ trống</div>
                                    </div>
                                    <div>
                                        <label for ="tensp_detail"><b>Tên sản phẩm: </b></label><br>
                                        <input id ="tensp_detail" name = "tensp_detail" type ="text">
                                        <div id ="err_tensp" style ="display : none ; color : red ; white-space: nowrap;" >Tên sản phẩm không được bỏ trống</div>

                                    </div>
                                    <div>
                                        <label for = "img_detail"><b>Ảnh: </b></label><br>
                                        <input id="img_detail" name = "img_detail" type="file" accept="image/*" onchange ="displayImage(this)">
                                    </div>
                                    <div>
                                        <label for ="soluong_detail"><b>Số lượng: </b></label><br>
                                        <input id = "soluong_detail" name = "soluong_detail" type ="text">
                                        <div id ="err_soluong" style ="display : none ; color : red; white-space: nowrap;">Không được bỏ trống và nội dung phải là số !!!</div>
                                    </div>
                                    <div>
                                        <label for ="cost_detail"><b>Giá tiền: </b></label><br>
                                        <input id ="cost_detail" name = "cost_detail" type ="text">
                                        <div id = "err_giatien" style ="display : none ; color : red ; white-space: nowrap;">Không được bỏ trống và nội dung phải là số !!!</div>
                                    </div>
                                    <div>
                                        <label><b>Thể loại: </b></label><br>
                                        <select id = "theloai_detail" name = "theloai_detail">
                                            <option value = 001 >Hamburger</option>
                                            <option value = 002 selected>Chicken</option>
                                            <option value = 003>Pizza</option>
                                            <option value = 004>Drink</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label for= "ttsp_detail"><b>Thông tin chi tiết: </b></label><br>
                                        <textarea id ="ttsp_detail" name = "ttsp_detail" rows="4" cols="50">
                                        </textarea>
                                        <div id="err_ttsp" style ="display : none ; color : red">Nội dung không được bỏ trống</div>
                                    </div>
                                    <div class = "display_img">
                                        <label><b>Hình ảnh vừa chọn: </b></label><br>
                                        <input id ="display_image" name = "masp_detail" type ="image" value ="" style="max-width: 140px; max-height: 140px;">
                                    </div>
                                    <input type="submit" value = "Thêm sản phẩm" name = "btn_add">
                                </form>
                            </div>
                            


                        </div>
                    </div>
                </div>

                <div style = "display : flex ; justify-content: space-between">
                    <div id = "addProduct">
                        <div>
                            <label for ="addIcon"><b>Thêm sản phẩm</b></label>
                        </div>
                        <div>
                            <a id = "addIcon" class = "add_product_detail" ><i class="fa-solid fa-plus"></i> </a>
                        </div>
                    </div>


                    <div id ="searchBar">
                        <form id = "searchForm">
                            <div id = "nameSP">
                                <label for ="tensp"><b>Tên sản phẩm: </b></label>
                                <input type= "text" id="tensp" >
                            </div>
                            <div id = "categorySP">
                                <label for ="theloaisp"><b>Thể loại: </b></label>
                                <select id="theloaisp">
                                    <option value="001">Hamburger</option>
                                    <option value="002">Chicken</option>
                                    <option value="003">Pizza</option>
                                    <option value="004">Drink</option>
                                </select>
                            </div>
                            <div>
                                <input type="submit" id="sbm_search" value = "Tìm kiếm">
                            </div>
                        </form>
                    </div>
                </div>

                <div>
                    <table class="table table-bordered" style="text-align: center">
                        <thead>
                            <tr>
                                <th scope="col">Mã Sản Phẩm</th>
                                <th scope="col">Tên Sản Phẩm</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Số Lượng</th>
                                <th scope="col">Giá Tiền</th>
                                <th scope="col">Thể Loại</th>
                                <th scope="col">Tùy Chỉnh</th>
                            </tr>
                        </thead>
                        <tbody>
        ';
        while($row = $result->fetch_assoc()){
            $productIndex = 0;
            echo '
                <tr>
                    <th scope="row">'.$row['MaSP'].'</th>
                    <td>'.$row['TenSP'].'</td>
                    <td><img class= "img" src="./img/'.$row['IMG'].'" alt="Ảnh sản phẩm"></td>
                    <td>'.$row['SoLuongSP'].'</td>
                    <td>'.$row['GiaSP'].'</td>
                    <td>'.$row['categoryId'].'</td>
                    <td class = "custom-icons" >
                        <a product_index = '.$productIndex.' href=""><i class="fa-solid fa-plus"></i> </a>
                        <a product_index = '.$productIndex.' href=""><i class="fa-solid fa-wrench"></i> </a>
                        <a product_index = '.$productIndex.' href=""><i class="fa-solid fa-trash"></i> </a>  
                    </td>
                </tr> ';
        }

        echo '       </tbody>
                    </table>
                </div>
            </section>
        ';
    }
?>


<style>
    
</style>
<link rel="stylesheet" href="./CSS/product_manager.css">
<script src="./JS/add_product_detail.js"></script>
<script>
    function displayImage(input) {
        // Kiểm tra xem có tệp nào đã được chọn hay không
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                // Hiển thị hình ảnh trong phần tử <input type="image">
                document.getElementById('display_image').src = e.target.result;
            };

            // Đọc dữ liệu của tệp ảnh đã chọn
            reader.readAsDataURL(input.files[0]);
        }
    }
    function validateForm() {
        var masp = document.getElementById("masp_detail").value;
        var tensp = document.getElementById("tensp_detail").value;
        var soluong = document.getElementById("soluong_detail").value;
        var cost = document.getElementById("cost_detail").value;
        var ttsp = document.getElementById("ttsp_detail").value;
        var err_masp = document.getElementById("err_masp");
        var err_tensp = document.getElementById("err_tensp");
        var err_soluong = document.getElementById("err_soluong");
        var err_giatien = document.getElementById("err_giatien");
        var err_ttsp = document.getElementById("err_ttsp");

        err_masp.style.display = "none";
        err_tensp.style.display = "none";
        err_soluong.style.display = "none";
        err_giatien.style.display = "none";
        err_ttsp.style.display = "none";

        // Biến kiểm tra lỗi
        var hasError = false;

        // Kiểm tra giá tiền
        if (!/^\d+(,\d{3})*(\.\d+)?$/.test(cost)) {
            err_giatien.style.display = "block";
            hasError = true;
        }

        // Kiểm tra số lượng
        if (!/^\d+$/.test(soluong)) {
            err_soluong.style.display = "block";
            hasError = true;
        }

        // Kiểm tra các trường khác không được bỏ trống
        if (masp.trim() === '') {
            err_masp.style.display = "block";
            hasError = true;
        }
        if (tensp.trim() === '') {
            err_tensp.style.display = "block";
            hasError = true;
        }
        if (soluong.trim() === '') {
            err_soluong.style.display = "block";
            hasError = true;
        }
        if (cost.trim() === '') {
            err_giatien.style.display = "block";
            hasError = true;
        }

        if (ttsp.trim() === ''){
            err_ttsp.style.display = "block";
            hasError = true;
        }
        // Nếu có lỗi, trả về false và hiển thị tất cả thông báo lỗi
        if (hasError) {
            return false;
        }

        // Nếu mọi thứ hợp lệ, cho phép gửi form
        return true;
    }
    // Thêm sự kiện khi tất cả các input được focus
    document.getElementById("masp_detail").onfocus = function() {
        document.getElementById("err_masp").style.display = "none";
    };
    document.getElementById("tensp_detail").onfocus = function() {
        document.getElementById("err_tensp").style.display = "none";
    };
    document.getElementById("soluong_detail").onfocus = function() {
        document.getElementById("err_soluong").style.display = "none";
    };
    document.getElementById("cost_detail").onfocus = function() {
        document.getElementById("err_giatien").style.display = "none";
    };
    document.getElementById("ttsp_detail").onfocus = function() {
        document.getElementById("err_ttsp").style.display = "none";
    };


</script>