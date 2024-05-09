$(".js_qldh").click(function(e){ 
    $(".nav-link.active").removeClass("active")
    $(this).find("> a").addClass("active")
    $(".content-wrapper").load("./module/qldonhang.php",function(){
    })
});
$("#qldonhang").click((e) =>{ 
    $("#right-content").load("./pages/admin/qldonhang.php",function(){
        
    })
});