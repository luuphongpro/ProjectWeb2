$("#qlsanpham").click((e) =>{ 
    // $("#right-content").load("./pages/admin/qlsanpham.php",function(){
    // })
    $("#right-content").load("./module/sanpham.php",function(){
    })
});


document.querySelector('.add_product_detail').addEventListener('click', function() {
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


document.querySelectorAll('.fix_product_detail').forEach(function(button, productIndex) {
    button.addEventListener('click', function() {
        var fix_overlay = document.querySelectorAll('.fix_overlay');
        var fix_info = document.querySelectorAll('.fix_info');
        
        fix_overlay.forEach(function(fix_overlay, index) {
            if (index === productIndex) {
                fix_overlay.style.display = 'flex';
            } else {
                fix_overlay.style.display = 'none';
            }
        });
        
        fix_info.forEach(function(fix_info, index) {
            if (index === productIndex) {
                fix_info.style.display = 'block';
            } else {
                fix_info.style.display = 'none';
            }
        });
    });
});

function closeFixProductInfo() {
    var fix_overlay = document.querySelectorAll('.fix_overlay');
    var fix_info = document.querySelectorAll('.fix_info');

    fix_overlay.forEach(function(fix_overlay) {
        fix_overlay.style.display = 'none';
    });

    fix_info.forEach(function(fix_info) {
        fix_info.style.display = 'none';
    });
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