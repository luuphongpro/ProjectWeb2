$(".js_qltk").on("click",function(e){ 
    // $("#right-content").load("./pages/admin/qlsanpham.php",function(){
    // })
    $(".nav-link.active").removeClass("active")
    $(this).find("> a").addClass("active")
    $(".content-wrapper").load("./pages/admin/qlmember.php",function(){
        RenderTableAccount()
        $(".js_search_tk").on("input",function(e){
            SearchTaiKhoan(e)
        })
    })
});
$(".js_thongkedt").on("click",function(){
    $(".nav-link.active").removeClass("active")
    $(this).find("> a").addClass("active")
    $(".content-wrapper").load("./pages/admin/thongkebh.php",function(){
        RenderThongKe()
        RenderSelector()
    })
})