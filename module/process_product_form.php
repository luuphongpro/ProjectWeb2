<?php
    include './controller.php';
    $sanpham = new sanpham;


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

        $result = $sanpham->themsanpham($data);

        if ($result) {
            echo "Thêm sản phẩm thành công!";
        } else {
            echo "Thêm sản phẩm thất bại!";
        }
    }

    if(isset($_GET['btn_Search'])){
        echo "đã vào nhưng sao không chạy";

        if(empty($_GET["tensp"])){
            $tensp = "";
        }else{
            $tensp = $_GET["tensp"];
        }
        if(empty($_GET["theloai"])){
            $theloai = "";
        }else{
            $theloai = $_GET["theloai"];
        }

        include './controller.php';
        $plsanpham = new sanpham;

        $result = $plsanpham->locsanpham($tensp,$theloai);
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
                            <form id = "searchForm" method = "get" action = "./process_add_form.php">
                                <div id = "nameSP">
                                    <label for ="tensp"><b>Tên sản phẩm: </b></label>
                                    <input type= "text" id="tensp" name = "tensp" >
                                </div>
                                <div id = "categorySP">
                                    <label for ="theloaisp"><b>Thể loại: </b></label>
                                    <select id="theloaisp" name = "theloai">
                                        <option value="001">Hamburger</option>
                                        <option value="002">Chicken</option>
                                        <option value="003">Pizza</option>
                                        <option value="004">Drink</option>
                                    </select>
                                </div>
                                <div>
                                    <input type="submit" id="sbm_search" name="btn_Search" value = "Tìm kiếm">
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
    }

    if(isset($_GET['deleteMaSP'])){
        echo "đã vào";
        $masp = $_GET['deleteMaSP'];

        include "./controller.php";

        $sanpham = new sanpham;

        $result = $sanpham->xoasanpham($masp);
        if ($result) {
            echo "Xóa sản phẩm thành công!";
        } else {
            echo "Xóa sản phẩm thất bại!";
        }
    }

    if(isset($_GET["btn_fix"])){
        echo "đã vào";  
        $masp = $_GET["fix_masp"];
        $tensp = $_GET["fix_tensp"];
        $soluong = $_GET["fix_soluong"];
        $img = $_GET["fix_img"];
        $cost = $_GET["fix_cost"];
        $theloai = $_GET["fix_theloai"];
        $ttsp = $_GET["fix_ttsp"];

        $data = array(
            "masp" => $masp,
            "tensp" => $tensp,
            "soluong" => $soluong,
            "img" => $img,
            "cost" => $cost,
            "theloai" => $theloai,
            "ttsp" => $ttsp
        );
        $result = $sanpham->suasanpham($data);
        if ($result) {
            echo "Thêm sản phẩm thành công!";
        } else {
            echo "Thêm sản phẩm thất bại!";
        }
    }
    
?>;
