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
    <li><a class="option-item list-donhang" href="index.php?profile&donhang"><i class="fa fa-book"></i> Lịch sử đơn</a></li>`
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
                listdonhang();
                loadDataToForm()
            }
        })
    }
})()


document.addEventListener("DOMContentLoaded", function() {
    listdonhang
});


async function listdonhang() {
    var sessionData = JSON.parse(sessionStorage.getItem('UseLogin'));
    var sdt = sessionData.SĐT;
    console.log(sdt);

    var json = await fetch("./module/xemdonhang.php", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ SĐT: sdt })
    });
    
    var response = await json.json();
    console.log(response.result);
    if(response.message === "success"){
        updateTable(response.result);
    }
    if(response.message ==="false") {
        var tablebody = document.querySelector('.table.list-donhang tbody');
        tablebody.innerHTML="";
        var row = document.createElement('tr');
        row.innerHTML=`
            <td colspan = 6><h2>Bạn chưa có đơn hàng nào, hãy đặt ngay !!!</h2></td>
        `;
        tablebody.appendChild(row);
    }
}



function updateTable(result){
    var index = 1;
    var tablebody = document.querySelector('.table.list-donhang tbody');
    tablebody.innerHTML = "";
    result.forEach(function(item){
        var row = document.createElement('tr');
        row.innerHTML=`
            <tr>
                <th scope="row">${index}</th>
                <td>${item.MaHoadon}</td>
                <td>${item.CreTime}</td>
                <td>${item.TongTien}</td>
                <td style="color: blue">${item.TrangThai}</td>
                <td>
                <a  onclick=showchitiethoadon(${item.MaHoadon}) class ="donhang-detail">
                    <i class="fa-solid fa-eye "></i>
                </a>
                </td>
            </tr>
        `;
        tablebody.appendChild(row);
    });
}


async function loadDataToForm() {
    const formUser = document.getElementById("form-user");
    var sessionData = JSON.parse(sessionStorage.getItem('UseLogin'));
    var sdt = sessionData.SĐT;
    console.log("Số điện thoại để load Form: " + sdt);

    const json = await fetch("./module/loadDataToForm.php", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ SĐT: sdt })
    });

   
    const response = await json.json();
    console.log(response.result);
    

    if(response.message==="success"){
        formUser.innerHTML = "";
        const result = response.result[0];
        var content = `
        <div class="row">   
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="inputName" class="col-sm-4 col-form-label">Tên đăng nhập</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="loginname"  placeholder="Last Name" value="${result.TenND}" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName2" class="col-sm-4 col-form-label">Phone</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="phone" readonly placeholder="Phone number" value="${result.SĐT}" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputExperience" class="col-sm-4 col-form-label">Address</label>
                    <div class="col-sm-8">
                        <input type="text" name="address" id="" class="form-control" placeholder="Address" value="${result.Address}" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputSkills" class="col-sm-4 col-form-label">Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" name="password" placeholder="Password" value="${result.Password}">
                    </div>
                </div>
            </div>
            
            <div class="form-group row">
                <div class="offset-sm-2 col-sm-8">
                    <input type="submit" class="btn btn-info" value="Submit">
                </div>
            </div>
        </div>
        `;
        formUser.innerHTML = content;
    }
   
}



const formUser = document.getElementById("form-user");
formUser.addEventListener("submit" , async function(e){
    e.preventDefault();
    var userConfirmation = confirm("Bạn có chắc thay đổi nội dung tài khoản không, quá trình này có thể sinh ra lỗi?");
    if(userConfirmation){
        const data = new FormData(e.target);
        console.log(data);
        for (const pair of data.entries()) {
            console.log(pair[0] + ': ' + pair[1]);
        }
        const json = await fetch("./module/updateInfoUser.php",{
            method : "POST",
            body : data
        })

        const response = await json.json();

        if(response.message == "success"){
            alert("đã cập nhật thông tin tài khoản thành công")
        }
    }
})




async function showchitiethoadon(mahoadon) {
    const mahd = mahoadon;
    console.log("đã vào overlay");
    var overlay = document.querySelector('.overlay-listdonhang');
    var info = document.querySelector('.overlay-info-listdonhang');
    var tbody = document.querySelector('.table.table-listchitiet tbody')
    tbody.innerHTML = "";
    overlay.style.display = "flex";
    info.style.display = "block";

    const json = await fetch("./module/showchitiethoadon.php", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ MAHD: mahd })
    });

    const response = await json.json();
    var index = 1;

    console.log(response);

    if (response.message == "success") {
        const result1 = response.result;
        result1.forEach(async function (child) {
            const masp = child.MaSP;
            console.log(masp);
            const soluong = child.SoLuong;
            console.log(soluong);
            const giatien = child.DonGia;
            console.log(giatien);

            const json2 = await fetch("./module/getdatasanpham.php", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ MASP: masp })
            })


            const response2 = await json2.json();

            if (response2.message == "success") {
                var result2 = response2.result[0];
                console.log(result2);

                var row = document.createElement("tr")
                row.innerHTML = `
                        <th class="text-center align-middle" scope="row">${index}</th>
                        <td class="text-center align-middle">${result2.TenSP}</td>
                        <td class="text-center align-middle">${soluong}</td>
                        <td class="text-center align-middle">${giatien}</td>
                        <td class="text-center align-middle">
                            <img src="./img/${result2.IMG}" alt="" style="max-width : 100px ; max-height :100px">
                        </td>
                `;
                index++;
                console.log(row);
                tbody.appendChild(row);
            }
        });
    }
}


var close_btn = document.querySelector('.close-btn')
close_btn.addEventListener("click",function(){
    var overlay = document.querySelector('.overlay-listdonhang');
    var info = document.querySelector('.overlay-info-listdonhang');
    overlay.style.display = "none";
    info.style.display = "none";
})
