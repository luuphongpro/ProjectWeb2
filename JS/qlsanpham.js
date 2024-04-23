$("#qlsanpham").click((e) =>{ 
    // $("#right-content").load("./pages/admin/qlsanpham.php",function(){
    // })
    $("#right-content").load("./module/sanpham.php",function(){
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

        // Lấy các thông tin cần thiết từ hàng sản phẩm
        var masp = productRow.querySelector('th').innerText;
        var tensp = productRow.querySelector('td:nth-child(2)').innerText;
        var imgSrc = productRow.querySelector('td:nth-child(3) img').src;
        var soluong = productRow.querySelector('td:nth-child(4)').innerText;
        var giatien = productRow.querySelector('td:nth-child(5)').innerText;
        var theloai = productRow.querySelector('td:nth-child(6)').innerText;
        console.log(theloai);
        var ttsp = productRow.querySelector('td:nth-child(7)').innerText;

        var relativePath = imgSrc.replace("http://localhost/DoAn/ProjectWeb2/", "");

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



function closeFixProductInfo() {
    var fix_overlay = document.querySelector('.fix_overlay');
    var fix_info = document.querySelector('.fix_info');
    fix_overlay.style.display = 'none';
    fix_info.style.display = 'none';
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


function validateFixForm() {
    var tensp = document.getElementById("fix_tensp").value;
    var soluong = document.getElementById("fix_soluong").value;
    var cost = document.getElementById("fix_cost").value;
    var ttsp = document.getElementById("fix_ttsp").value;
    var err_tensp = document.getElementById("err_fix_tensp");
    var err_soluong = document.getElementById("err_fix_soluong");
    var err_giatien = document.getElementById("err_fix_giatien");
    var err_ttsp = document.getElementById("err_fix_ttsp");

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