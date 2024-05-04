$(".js_qltk").click(function(e){ 
    // $("#right-content").load("./pages/admin/qlsanpham.php",function(){
    // })
    $(".nav-link.active").removeClass("active")
    $(this).find("> a").addClass("active")
    $(".content-wrapper").load("./module/member.php",function(){
    })
});