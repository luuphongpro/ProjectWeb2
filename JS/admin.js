function cook() {
    window.location = "index.php";
}
// Kiểm tra disabled bởi vì cần làm chức năng quản lý chức năng cho nhóm quyền
function init(index){
    var name;
    //Đang phát triển với tham số truyền vào tương ứng với các quyền...
    name=[[],["Quản lý sản phẩm","Thống kê doanh thu"],["Quản lý Bán Hàng","Thống kê doanh thu"]]
    $(".container.disabled").removeClass("disabled");
    $(".container").each(function(){
        name[index].forEach((i)=>{
            if($(this).find(".item-container").text().trim()==i){
                console.log($(this).find(".item-container").text().trim())
                $(this).find(".item-container").addClass("disabled");
            }
        })
    })
}
init(2);
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
// $(".js_qltk").on("click",function(){
//     $(".content-wrapper").load("./pages/admin.")
// })
//Khi show chức năng, phải render vào #right-content trách bị trùng giao diện giữa mọi người

// $("#qlsanpham").click((e) =>{ 
//     $("#right-content").load("./pages/admin/qlsanpham.php",function(){
//     })
// });