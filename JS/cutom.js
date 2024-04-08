$(document).ready(() =>{
    $('.filters_menu li').click(function () {
        $('.filters_menu li').removeClass('active');
        $(this).addClass('active');
        var data = $(this).attr('data-filter');
        $grid.isotope({
            filter: data
        })
})
var $grid = $(".grid").isotope({
itemSelector: ".all",
percentPosition: false,
masonry: {
    columnWidth: ".all"
}
})
});
$(".client_owl-carousel").owlCarousel({
    loop: true,
    margin: 0,
    dots: false,
    nav: true,
    navText: [],
    autoplay: true,
    autoplayHoverPause: true,
    navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ],
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2
        },
        1000: {
            items: 2
        }
    }
});
$(document).ready(() =>{
    const UserLogin=JSON.parse(localStorage.getItem('UseLogin'));
    if(UserLogin?.flag){
        console.log('dn thanh cong');
        $('.ten-dn').html(`<p>${UserLogin.name}</p>`);
        $('.user-dn').addClass('status')
    }
    else{
        // $('.user_link').click(() =>{
        //     window.location.href='index.php?chon&id=dk'
        //     $.ajax({
        //         url: 'index.php?chon&id=dk', // Đường dẫn đến tệp HTML hoặc URL trên máy chủ
        //         method: 'GET', // Phương thức GET
        //         dataType: 'html', // Loại dữ liệu mong đợi trả về
        //         success: function(response) {
        //             // Nếu yêu cầu AJAX thành công, thêm nội dung HTML vào phần tử có id 'content'
        //             console.log(response);
        //             $('body').html(response);
        //         },
        //         error: function(xhr, status, error) {
        //             // Nếu có lỗi xảy ra trong quá trình yêu cầu AJAX
        //             console.error(status, error); // Xuất lỗi ra console
        //         }
        //     });
        // })
        $('.ten-dn').html(`<p>Đăng nhập</p>`);
        console.log('dn that bai');
        $('.user-dn').removeClass('status')
    }
    $(".user-logout").click(() =>{
        UserLogin.flag=false;
        localStorage.setItem('UseLogin',JSON.stringify(UserLogin));
    })
    // document.querySelector(".filter").onSubmit=function(e){
    //     console.log("cmmm")
    //     e.preventDefault()
    // }
    Validator({
        form: ".filter",
        rules: [],
        onSubmit: function(value){
            console.log(value)
            $(".container-product").load("./module/timkiem.php?timkiem&minPrice="
            +value.minPrice+"&maxPrice="+value.maxPrice+"&txtTimkiem="+value.txtTimkiem+"&category="+value.category)
        }
    })
})