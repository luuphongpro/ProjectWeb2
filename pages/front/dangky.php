<div class="modal-login">
        <div class="modal_content">
            <ul class="modal_content-header">
                <li class="modal_content-header-item" id="Login">
                    <span>Đăng nhập</span>
                    <div class="modal_content-header-item-line"></div>
                </li>
                <li class="modal_content-header-item modal_content-header-item-default" id="Register">
                    <span>Đăng ký</span>
                    <div class="modal_content-header-item-line"></div>
                </li>
            </ul>
            <!-- LOGIN -->
            <form action="" autocomplete="off" id="form-1">
                <div class="modal_content-login">
                    <div class="modal_content-input-box form-group">
                        <label for="user-login">Số điện thoại</label>
                        <input type="text" placeholder="Nhập số điện thoại" id="user-login" name="user_login">
                        <span class="form-message"></span>
                    </div>
                    <div class="modal_content-input-box form-group">
                        <label for="password-login">Mật khẩu</label>
                        <input type="password" placeholder="Nhập mật khẩu" id="password-login" name="password_login">
                        <span class="form-message"></span>
                    </div>
                    <div class="modal_content-btn-box">
                        <button class="btn-form btn-login btn-default" id="btn-login"><span>Đăng nhập</span></button>
                        <button type="reset" class="btn-form btn-close"><span>Bỏ qua</span></button>
                        <span class="error-login">Số điện thoại hoặc Mật khẩu sai!</span>
                        <!-- <a href="index.php?chon=home"></a> -->
                    </div>
                </div>
            </form>
            <!-- REGISTER -->
            <form action="" onsubmit="return checkForm()" autocomplete="off" id="form-2">
                <div class="modal_content-register">
                    <div class="modal_content-input-box form-group">
                        <label for="user1-register">Số điện thoại</label>
                        <input placeholder="Nhập số điện thoại" id="user1-register"
                            class="hide-number-spinner" name="user1_register">
                        <span class="form-message"></span>
                    </div>
                    <!-- <div class="modal_content-input-box form-group">
                        <label for="user2-register">Email</label>
                        <input type="text" placeholder="Nhập email" id="user2-register" name="user2-register">
                        <span class="form-message"></span>
                    </div> -->
                    <div class="modal_content-input-box form-group">
                        <label for="password-register">Mật khẩu</label>
                        <input type="password" placeholder="Nhập mật khẩu" id="password-register" name="password_register">
                        <span class="form-message"></span>
                    </div>
                    <div class="modal_content-input-box form-group">
                        <label for="confirm-password">Nhập lại mật khẩu</label>
                        <input type="password" placeholder="Nhập mật khẩu" id="confirm_password">
                        <span class="form-message"></span>
                    </div>
                    <div class="modal_content-input-box form-group">
                        <label for="username-register">Tên đăng ký</label>
                        <input type="text" placeholder="Nhập tên đăng ký" id="username-register" name="username_register">
                        <span class="form-message"></span>
                    </div>
                      <div class="modal_content-btn-box">
                          <button type="submit" class="btn-login btn-form btn-default" id="btn-register"><span>Đăng ký</span></button>
                          <button type="reset" class="btn-form btn-close">Bỏ qua</button>
                          <span class="error-login">Tài khoản đã tồn tại</span>
                          <!-- <span><a href="index.php?chon=home"></a></span> -->
                      </div>
                      <div class="modal_content-register-rule">
                          <p>
                             Bằng việc đăng ký, bạn đã đồng ý với Cửa hàng về
                             <span>Điều khoản dịch vụ</span> &  
                             <span>Chính sách bảo mật</span>
                          </p>
                      </div>
                        <div class="div-error-regisrer"><span class="error-register"></span></div>    
                   </div>
            </form>
        </div>
</div>
<script src="js/vadidation.js"></script>
<script>
    const inputLogin=document.querySelector("#Login");
    const inputRegister=document.querySelector("#Register");
    const modalLogin=document.querySelector(".modal_content-login");
    const modalRegister=document.querySelector(".modal_content-register");
    const fcloseElemts=document.querySelectorAll('.btn-close');
    $(".user_link").click(function(event) {
        console.log(event.target)
        if(!$(event.target).hasClass("option-dn")){
        $(".modal-login").css("display", "flex");
        }
    });
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
    $(".btn-close").click(() =>{
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
        Validator.isNumber('#user-login'),
        Validator.isRequired('#password-login'),
        Validator.isRequired('#password-login'),
        Validator.isMinLength('#password-login',6),
        Validator.isMinLength('#user-login',10),
        ],
        errorElement:'.form-message',
        onSubmit: (value) =>{
            if(value){
                console.log(value)
                xhr=new XMLHttpRequest();
                xhr.open('POST','http://localhost/ProjectWeb2/module/xldangnhap.php');
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send('user_login='+value.user_login+'&password_login='+value.password_login);
                xhr.onload = function () {
                //Đợi và xử lý phản hồi của server
                if (xhr.status >= 200 && xhr.status < 300) {
                    var response=JSON.parse(xhr.responseText);
                    if(response.flag){
                        $(".modal-login").css("display","flex")
                        window.location.href='index.php?chon&id=home';
                        localStorage.setItem('UseLogin',JSON.stringify(response));
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
        Validator.isNumber('#user1-register'),
        Validator.isMinLength('#user1-register',10),
        Validator.isRequired('#password-register'),
        Validator.isMinLength('#password-register',6),
        Validator.isConfirmed('#confirm_password',function(){
            return $('#password-register').val();
            
        }),
        Validator.isRequired('#username-register'),
        ],
        errorElement:'.form-message',
        onSubmit: (value) =>{
            const data=JSON.stringify(value);
            xhr=new XMLHttpRequest();
            xhr.open('POST','http://localhost/ProjectWeb2/module/xldangky.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('jsonData='+data);
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
</script>
