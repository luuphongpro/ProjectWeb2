var ChucNangs = []
var chucnang=new Chucnang();
;(function LoadChucNang() {
    var valueAccount = JSON.parse(sessionStorage.getItem("UseLogin"))
    if (valueAccount && valueAccount.flag) {
        var xhr = new XHR();
        return xhr.connect(undefined, "./module/quyen.php?chitiet&id=" + valueAccount.quyen)
            .then((data) => {
                ChucNangs=JSON.parse(data);
                console.log(ChucNangs)
                chucnang.Menu(ChucNangs);
                InitMenu()
            })
    }
})()
function InitMenu() {
    $(".js_thongkedt").on("click", function () {
        $(".nav-link.active").removeClass("active")
        $(this).find("> a").addClass("active")
        $(".content-wrapper").load("./pages/admin/thongkebh.php", function () {
            RenderThongKe()
            RenderSelector()
        })
    })
    $(".js_qltk").on("click", function (e) {
        // $("#right-content").load("./pages/admin/qlsanpham.php",function(){
        // })
        $(".nav-link.active").removeClass("active")
        $(this).find("> a").addClass("active")
        $(".content-wrapper").load("./pages/admin/qlmember.php", function () {
            RenderTableAccount()
            $(".js_search_tk").on("input", function (e) {
                SearchTaiKhoan(e)
            })
            
        })
    });
    $(".js_qlquyen").click(function (e) {
        e.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết
        $(".nav-link.active").removeClass("active");
        $(this).find("> a").addClass("active");
        $(".content-wrapper").load("./pages/admin/qlquyen.php", function () {
            initQuanlyQuyen()
        });
    });
    $(".js_qlsp").click(function (e) {
        // $("#right-content").load("./pages/admin/qlsanpham.php",function(){
        // })
        $(".nav-link.active").removeClass("active")
        $(this).find("> a").addClass("active")
        $(".content-wrapper").load("./module/sanpham.php", function () {
            chucnang.QLSanPham(ChucNangs);
        })
    });
    $(".js_qldh").click(function (e) {
        $(".nav-link.active").removeClass("active")
        $(this).find("> a").addClass("active")
        $(".content-wrapper").load("./module/qldonhang.php", function () {
        })
    });
}
