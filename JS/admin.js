function cook() {
    window.location = "index.php";
}
// Kiểm tra disabled bởi vì cần làm chức năng quản lý chức năng cho nhóm quyền
function init(index) {
    var name = [
        [],
        ["Quản lý sản phẩm", "Thống kê doanh thu"],
        ["Quản lý Bán Hàng", "Thống kê doanh thu"],
        ["Danh sách tài khoản"],
        ["Quản lý tài khoản"]
    ];

    $(".container.disabled").removeClass("disabled");

    if (index >= 0 && index < name.length) {
        $(".container").each(function() {
            name[index].forEach((i) => {
                if ($(this).find(".item-container").text().trim() == i) {
                    $(this).find(".item-container").addClass("disabled");
                }
            });
        });
    } else {
        console.error("Index out of range");
    }
}

init(1);
init(2);
init(3);
// init(4);

// $("#qlsanpham").click(function(){
//     if(!$(this).hasClass("disabled")){
//         $(".menudrop-qlsanpham").toggle("active")
//     }
// })
$("#donhang").click(function(){
    if(!$(this).hasClass("disabled")){
        $(".menudrop-donhang").toggle("active")
    }
})
$("#taikhoan").click(function(){
    if(!$(this).hasClass("disabled")){
        $(".menudrop-qltk").toggle("active")
    }
})
$(".item-menu").on("click",function(e){
    switch(e.target.innerText.trim()){
        case "Thêm tài khoản":
            LoadThemTK()
            break;
        case "Sửa tài khoản": 
            LoadSuaTK()
            break;
        case "Xóa tài khoản": 
            LoadXoaTK()
            break;
    }
})


//Khi show chức năng, phải render vào #right-content trách bị trùng giao diện giữa mọi người

// $("#qlsanpham").click((e) =>{ 
//     $("#right-content").load("./pages/admin/qlsanpham.php",function(){
//     })
// });