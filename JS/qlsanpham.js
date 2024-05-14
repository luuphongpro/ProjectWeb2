
$("#qlsanpham").click((e) =>{ 
    $("#right-content").load("./pages/admin/qlsanpham.php",function(){
        
    })
});
$(".add_product_detail").click(function (e) { 
    e.preventDefault();
    var overlay = document.querySelector('.overlay');
    var info = document.querySelector('.info');
    
    if (overlay.style.display === 'none' || info.style.display === 'none') {
        overlay.style.display = 'flex';
        info.style.display = 'block';
    } else {
        overlay.style.display = 'none';
        info.style.display = 'none';
    }
});



    function closeAddProductInfo() {
        var overlay = document.querySelector('.overlay');
        var info = document.querySelector('.info');
        overlay.style.display = 'none';
        info.style.display = 'none';
    }



    document.querySelectorAll('.fix_product_detail').forEach(function(element, index) {
        element.addEventListener('click', function() {
            console.log("Button clicked");
            // Lấy chỉ số sản phẩm từ thuộc tính product_index của nút Sửa được nhấn
            var productIndex = index;
            
            // Lấy thông tin của sản phẩm tương ứng với chỉ số này
            var productRow = document.querySelectorAll('#quanlisp table tbody tr')[productIndex];

            var masp = productRow.querySelector('th').innerText;
            console.log(masp);
            var tensp = productRow.querySelector('td:nth-child(2)').innerText;
            var imgSrc = productRow.querySelector('td:nth-child(3) img').src;
            var soluong = productRow.querySelector('td:nth-child(4)').innerText;
            var giatien = productRow.querySelector('td:nth-child(5)').innerText;
            var theloai = productRow.querySelector('td:nth-child(6)').innerText;
            var ttsp = productRow.querySelector('td:nth-child(7)').innerText;
            var relativePath = imgSrc.replace("http://localhost/ProjectWeb2/", "");

            document.getElementById('fix_masp').value = masp;
            document.getElementById('fix_tensp').value = tensp;
            document.getElementById('display_old_image').src = "./"+relativePath;
            document.getElementById('fix_soluong').value = soluong;
            document.getElementById('fix_cost').value = giatien;
            document.getElementById('fix_theloai').value = theloai;
            document.getElementById('fix_ttsp').innerText = ttsp;

            document.querySelector('.fix_overlay').style.display = 'flex';
            document.querySelector('.fix_info').style.display = 'block';
        });
    });



    function closeFixProductInfo() {
        var fix_overlay = document.querySelector('.fix_overlay');
        var fix_info = document.querySelector('.fix_info');
        fix_overlay.style.display = 'none';
        fix_info.style.display = 'none';
    }




    function validateForm() {
        var tensp = document.getElementById("tensp_detail").value;
        var soluong = document.getElementById("soluong_detail").value;
        var cost = document.getElementById("cost_detail").value;
        var ttsp = document.getElementById("ttsp_detail").value;

        var err_tensp = document.getElementById("err_tensp");
        var err_soluong = document.getElementById("err_soluong");
        var err_giatien = document.getElementById("err_giatien");
        var err_ttsp = document.getElementById("err_ttsp");

        
        var hasError = false;

        if (!/^\d+(,\d{3})*(\.\d+)?$/.test(cost)) {
            err_giatien.style.display = "block";
            hasError = true;
        }

        if (!/^\d+$/.test(soluong)) {
            err_soluong.style.display = "block";
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
        console.log(hasError);
        if (hasError) {
            return false;
        }

        return true;
    }

    var hasError = false;

    function validateFixForm() {
        var tensp = document.getElementById("fix_tensp").value;
        var soluong = document.getElementById("fix_soluong").value;
        var cost = document.getElementById("fix_cost").value;
        var ttsp = document.getElementById("fix_ttsp").value;

        var err_tensp = document.getElementById("err_fix_tensp");
        var err_soluong = document.getElementById("err_fix_soluong");
        var err_giatien = document.getElementById("err_fix_giatien");
        var err_ttsp = document.getElementById("err_fix_ttsp");

      

        if (!/^\d+(,\d{3})*(\.\d+)?$/.test(cost)) {
            err_giatien.style.display = "block";
            hasError = true;
        }

        if (!/^\d+$/.test(soluong)) {
            err_soluong.style.display = "block";
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
        if (hasError) {
            return false;
        }
        return true;
    }

    $(".close").click(function (e) { 
        e.preventDefault();
        document.getElementById("err_masp").style.display = "none";
        document.getElementById("err_tensp").style.display = "none";
        document.getElementById("err_soluong").style.display = "none";
        document.getElementById("err_giatien").style.display = "none";
        document.getElementById("err_ttsp").style.display = "none";
    });


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

    document.getElementById("fix_tensp").onfocus = function() {
        document.getElementById("err_fix_tensp").style.display = "none";
    };
    document.getElementById("fix_soluong").onfocus = function() {
        document.getElementById("err_fix_soluong").style.display = "none";
    };
    document.getElementById("fix_cost").onfocus = function() {
        document.getElementById("err_fix_giatien").style.display = "none";
    };
    document.getElementById("fix_ttsp").onfocus = function() {
        document.getElementById("err_fix_ttsp").style.display = "none";
    };


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
    function displayNewImage(input) {
        // Kiểm tra xem có tệp nào đã được chọn hay không
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                // Hiển thị hình ảnh trong phần tử <input type="image">
                document.getElementById('display_new_image').src = e.target.result;
            };

            // Đọc dữ liệu của tệp ảnh đã chọn
            reader.readAsDataURL(input.files[0]);
        }
    }



    var add_detail_Product = document.getElementById("add_detail_Product");
    var noti = document.getElementById('noti');

    function removeNoti(){
        noti.style.transform = 'translateX(110%)';
    }


    add_detail_Product.addEventListener("submit", async function (ev) {
        ev.preventDefault();
        var kq =  validateForm();
        if(!kq){
            return;
        }
        const data = new FormData(ev.target);
        const json = await fetch('./module/add_product.php', {
            method: 'POST',
            body: data
        })

        const response = await json.json();
        
        console.log(response);

        const title = document.getElementById('noti-title');
        const desc = document.getElementById('noti-desc');
        
        

        if(response.message == 'successAdd'){
            removeNoti()
            console.log(noti)
            noti.style.backgroundColor = 'green';
            title.innerHTML = 'Success'
            desc.innerHTML = 'ĐÃ thêm thành công'
        }else{
            removeNoti()
            noti.style.backgroundColor = 'red';
            title.innerHTML = 'Error'
            desc.innerHTML = 'Thêm thất bại'
        }

        noti.style.transform = 'translateX(0)';
        setTimeout(() => {
            removeNoti()
        }, 4000)
    })

    var fix_product_form = document.getElementById('fix_detail_Product');

    fix_product_form.addEventListener("submit", async function (ev) {
        ev.preventDefault();

        var kq = validateFixForm();
        if(!kq){
            return;
        }

        const data = new FormData(ev.target);
        const json = await fetch('./module/fix_product.php', {
            method: 'POST',
            body: data
        })

        const response = await json.json();
        
        console.log(response);

        const title = document.getElementById('noti-title');
        const desc = document.getElementById('noti-desc');
        
        

        if(response.message == 'successFix'){
            removeNoti()
            console.log(noti)
            noti.style.backgroundColor = 'green';
            title.innerHTML = 'Success'
            desc.innerHTML = 'ĐÃ sửa thành công'
        }else{
            removeNoti()
            noti.style.backgroundColor = 'red';
            title.innerHTML = 'Error'
            desc.innerHTML = 'Sửa thất bại'
        }

        noti.style.transform = 'translateX(0)';
        setTimeout(() => {
            removeNoti()
        }, 4000)
    })


    function deleyesp(e){
        var confirmation = confirm("Are you sure you want to delete this product?"); // Hỏi xác nhận
        if (!confirmation) return; // Nếu không xác nhận, không làm gì cả
        var xhr = new XHR();
        return xhr.connect(undefined,"./module/sanphams.php?xoasp&id="+masp)
        .then(function(data){
            var message = data
            const title = document.getElementById('noti-title');
            const desc = document.getElementById('noti-desc');
            if(message == "success"){
                $(".activePT").click()
                removeNoti();
                title.innerHTML = "SUCCESS"
                desc.innerHTML = "Xóa sản phẩm thành công"
                noti.style.backgroundColor = "green"
                noti.style.transform = "translateX(0)"
            }
            else {
                removeNoti();
                title.innerHTML = "FAILURE" // Sửa lỗi chính tả
                desc.innerHTML = "Xóa sản phẩm thất bại"
                noti.style.backgroundColor = "red"
                noti.style.transform = "translateX(0)"
            }
            setTimeout(function() {
                removeNoti();
            }, 3000);
        });
    }

    function bindEditDeleteListeners() {
        // Edit button
        document.querySelectorAll('.fix_product_detail').forEach(function(element, index) {
            element.addEventListener('click', function() {
                console.log("Button clicked");
                
                var productRow = document.querySelectorAll('#quanlisp table tbody tr')[index];

                var masp = productRow.querySelector('th').innerText;
                var tensp = productRow.querySelector('td:nth-child(2)').innerText;
                var imgSrc = productRow.querySelector('td:nth-child(3) img').src;
                var soluong = productRow.querySelector('td:nth-child(4)').innerText;
                var giatien = productRow.querySelector('td:nth-child(5)').innerText;
                var theloai = productRow.querySelector('td:nth-child(6)').innerText;
                var ttsp = productRow.querySelector('td:nth-child(7)').innerText;

                var relativePath = imgSrc.replace("http://localhost/ProjectWeb2/", "");

                document.getElementById('fix_masp').value = masp;
                document.getElementById('fix_tensp').value = tensp;
                document.getElementById('display_old_image').src = "./" + relativePath;
                document.getElementById('fix_soluong').value = soluong;
                document.getElementById('fix_cost').value = giatien;
                document.getElementById('fix_theloai').value = theloai;
                document.getElementById('fix_ttsp').innerText = ttsp;

                document.querySelector('.fix_overlay').style.display = 'flex';
                document.querySelector('.fix_info').style.display = 'block';
            });
        });
    }

   


    $(document).ready(function(){

        // $(document).on('submit', '.deleteForm', function(event) {
        //     event.preventDefault(); // Prevent default form submission
        //     var confirmation = confirm("Are you sure you want to delete this product?"); // Ask for confirmation
        //     if (confirmation) {
        //         this.submit(); // If confirmed, submit the form
        //     }
        // });


        $('.pageNumber').on('click', '.button-active', function(e){
            e.preventDefault();
            $(this).closest('.pageNumber').find('.button-active').removeClass('activePT');
            $(this).addClass('activePT');
            var url = this.getAttribute('href'); // Get the URL of the new page
            loadPage(url);
        });

    });


    function loadPage(url) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 400) {
                var response = xhr.responseText;
                var parser = new DOMParser();
                var newDoc = parser.parseFromString(response, 'text/html');
                var newTable = newDoc.querySelector('table.table.table-bordered');
                if (newTable) {
                    document.querySelector('#quanlisp table.table.table-bordered').innerHTML = newTable.innerHTML;
                } else {
                    console.error('Table not found in the response');
                }
            } else {
                console.error('Request failed with status', xhr.status);
            }
            bindEditDeleteListeners();
            // re_useDel();
        };
        xhr.onerror = function() {
            console.error('Request failed');
        };
        xhr.send();
    }



    searchForm.addEventListener("submit", async function(ev) {
        ev.preventDefault();

        var data = new FormData(ev.target);

        var json = await fetch("./module/search_product.php", {
            method: "POST",
            body: data
        });

        const title = document.getElementById('noti-title');
        const desc = document.getElementById('noti-desc');

        var response = await json.json();
        if (response.message === 'successSearch') {
            console.log(response.result);
            updateTable(response.result);
            const count = response.result.length;
            removeNoti()
            noti.style.backgroundColor = 'green';
            title.innerHTML = 'Success'
            desc.innerHTML = 'Đã tìm thấy ' + count + " sản phẩm";
            
        } else {
            removeNoti()
            noti.style.backgroundColor = 'red';
            title.innerHTML = 'Error'
            desc.innerHTML = 'Không tìm thấy sản phẩm'
        }
        bindEditDeleteListeners();
        // re_useDel();
        noti.style.transform = 'translateX(0)';
        setTimeout(() => {
            removeNoti()
        }, 3000)
    });
    
    function updateTable(result) {
        var tableBody = document.querySelector(".table tbody");
        tableBody.innerHTML = ""; // Xóa nội dung cũ của bảng
    
        // Duyệt qua mỗi đối tượng trong mảng result
        result.forEach(function(item) {
            // Tạo một hàng mới cho mỗi đối tượng
            var row = document.createElement("tr");
            row.style.fontWeight = "bold";
            row.innerHTML = `
                <th scope="row">${item.MaSP}</th>
                <td>${item.TenSP}</td>  
                <td><img class="img" src="./img/${item.IMG}" alt="Ảnh sản phẩm"></td>
                <td>${item.SoLuongSP}</td>
                <td>${item.GiaSP}</td>
                <td style="display:none">${item.categoryId}</td>
                <td style="display:none">${item.TTSP}</td>
                <td class="custom-icons">
                    <div Sua="CN02" masp="${item.TTSP}">
                        <a class="fix_product_detail"><i class="fa-solid fa-wrench"></i> </a>
                    </div>
                    <div>
                        <form class="deleteForm" action="./module/process_product_form.php" method="get">
                            <input type="hidden" name="deleteMaSP" id="deleteMaSP" value="${item.MaSP}">
                            <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                                <a><i class="fa-solid fa-trash"></i></a>
                            </button>
                        </form>
                    </div>
                </td>
            `;
            tableBody.appendChild(row);
        });
        
    }




    
    
    
    
    
