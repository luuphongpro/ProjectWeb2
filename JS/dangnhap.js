var UserLogin=JSON.parse(sessionStorage.getItem('UseLogin')) || {};
var Cart=JSON.parse(localStorage.getItem('CartWeb2')) || {};
$('#Login').click(() =>{
    $(".modal-login").css("display","flex")
    $('#Register').addClass('modal_content-header-item-default');
    $('#Login').removeClass('modal_content-header-item-default');
    $('.modal_content-login').css("display","block");
    $(".modal_content-register").css("display","none");
})
$("#Register").click(function(){
    $(".modal-login").css("display","flex")
    $("#Login").addClass("modal_content-header-item-default")
    $('#Register').removeClass('modal_content-header-item-default');
    $(".modal_content-register").css("display","block");
    $('.modal_content-login').css("display","none");
})
$(".close_modal").click(() =>{
    $(".modal-login").css("display","none")
})
//Bỏ thông báo sai đăng nhập
$('input').on("input",() =>{
    $(".error-login").hide()
})
Validator({
    form:'#form-1',
    rules:[
    Validator.isRequired('#user-login'),
    Validator.isSDT('#user-login'),
    Validator.isRequired('#password-login'),
    Validator.isRequired('#password-login'),
    Validator.isMinLength('#password-login',6),
    ],
    errorElement:'.form-message',
    onSubmit: (value) =>{
        if(value){
            console.log(value)
            xhr=new XMLHttpRequest();
            xhr.open('POST','./module/xldangnhap.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('user_login='+value.user_login+'&password_login='+value.password_login);
            xhr.onload = function () {
            //Đợi và xử lý phản hồi của server
            if (xhr.status >= 200 && xhr.status < 300) {
                var response=JSON.parse(xhr.responseText);
                if(response.flag){
                    $(".modal-login").css("display","flex")
                    window.location.href='index.php?chon&id=home';
                    sessionStorage.setItem('UseLogin',JSON.stringify(response));
                }
                else {
                    $(".error-login").show()
                }  
            } 
            else {
                console.error('Lỗi gửi dữ liệu:', xhr.statusText);
            }
            }
        }
        else {
            console.log("loi cmmm")
        }
    }
})
Validator({
    form:'#form-2',
    rules:[
    Validator.isRequired('#user1-register'),
    Validator.isSDT('#user1-register'),
    Validator.isRequired('#password-register'),
    Validator.isMinLength('#password-register',6),
    Validator.isConfirmed('#confirm_password',function(){
        return $('#password-register').val();
        
    }),
    Validator.isRequired('#username-register'),
    Validator.isMaxLength('#username-register',10),
    ],
    errorElement:'.form-message',
    onSubmit: (value) =>{
        const data=JSON.stringify(value);
        xhr=new XMLHttpRequest();
        xhr.open('POST','./module/taikhoan.php?them');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('dataJSON='+data);
        xhr.onload = function () {
        //Đợi và xử lý phản hồi của server
        if (xhr.status >= 200 && xhr.status < 300) {
            if(xhr.responseText=='1'){
                $(".modal-login").css("display","none")
                alert("Tạo tài khoản thành công, vui lòng đăng nhập để tiếp tục.");
                $("#form-2").reset()
            }
            else {
                $(".error-login").show()
            }  
        } else {
            console.error('Lỗi gửi dữ liệu:', xhr.statusText);
        }
        };
    }
})
if(UserLogin?.flag){
    console.log('dn thanh cong');
    $('.ten-dn').html(`<p>${UserLogin.name}</p>`);
    $('.user-dn').addClass('status')
    $(".user_link").on("click",)
    CheckQuyen(UserLogin.quyen)
}
else{
    $(".user_link").on("click",function(event) {
        if(!$(event.target).hasClass("option-dn")){
        $(".modal-login").css("display", "flex");
        }
    });
    $('.ten-dn').html(`<p>Đăng nhập</p>`);
    console.log('dn that bai');
    $('.user-dn').removeClass('status')
}
$(".user-logout").on("click",() =>{
    LogOut()
})
function LogOut(){
    UserLogin.flag=false;
    sessionStorage.setItem('UseLogin',JSON.stringify(UserLogin));
}
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
function CheckQuyen(quyen){
    var html=`<li><a class="option-item" href="index.php?profile">
    <i class="fa fa-user"></i> Trang cá nhân</a></li>
    <li><a class="option-item list-donhang" onclick=listdonhang() href="index.php?profile&donhang"><i class="fa fa-book"></i> Lịch sử đơn</a></li>`
    if(quyen!="KH"){
        html+=`<li><a class="option-item" href="admin1.php"><i class="fa fa-book"></i> Vào trang Admin</a></li>`
    }
    html+=`<li><a class="user-logout option-item" href="index.php?chon&id=home"><i class="fa fa-sign-out"></i> Thoát</a></li>`
    $(".option-dn").html(html);
}
function AddToCart(masp,soluong=1){
    soluong=Number(soluong)
    if(UserLogin?.flag){
        $.get("./module/sanphams.php?tim&id="+masp,function(data){
            data=JSON.parse(data)
            var tmpSP={}
            tmpSP['MaSP']=data['MaSP']
            tmpSP['TenSP']=data['TenSP']
            tmpSP['soluong']=soluong;
            tmpSP['gia']=data['GiaSP'];
            if(Cart['arr']){
                var isExists=Cart['arr'].some((sanpham) => sanpham['MaSP']==tmpSP['MaSP'])
                if(isExists){
                    Cart['arr'].forEach((sanpham) =>{
                        if(sanpham['MaSP']==tmpSP['MaSP']){
                            sanpham['soluong']+=soluong;
                        }
                    })
                }
                else {
                    Cart['arr'].push(tmpSP)
                }
            }else {
                Cart['arr']=[]
                Cart['arr'].push(tmpSP)
            }
            localStorage.setItem("CartWeb2",JSON.stringify(Cart))
            alert("Sản phẩm đã được thêm thành công")
        })
    }
    else 
        alert("Cần đăng nhập để mua hàng")
}
function AddFromDetail(masp,event){
    AddToCart(masp,event.target.parentElement.querySelector("#quantity").value)
}
;(function(){
    var urlCurrent=window.location.href;
    if(urlCurrent.indexOf('profile&donhang')!=-1){
        $(".nav-item").each(function(){
            if($(this).children().text().trim()=='My orders'){
                $(this).children().removeClass("active")
                $(this).children().addClass("active")
                RenderDonhang()
            }
        })
    }
})()
function RenderDonhang(){
    
}