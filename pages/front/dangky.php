<div class="modal">
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
                        <label for="user-login">Số điện thoại/Email</label>
                        <input type="text" placeholder="Nhập số điện thoại hoặc email" id="user-login" name="user_login">
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
                        <!-- <a href="index.php?chon=home"></a> -->
                    </div>
                </div>
            </form>
            <!-- REGISTER -->
            <form action="" onsubmit="return checkForm()" autocomplete="off" id="form-2">
                <div class="modal_content-register">
                    <div class="modal_content-input-box form-group">
                        <label for="user1-register">Số điện thoại</label>
                        <input type="number" placeholder="Nhập số điện thoại" id="user1-register"
                            class="hide-number-spinner" name="user1-register">
                        <span class="form-message"></span>
                    </div>
                    <div class="modal_content-input-box form-group">
                        <label for="user2-register">Email</label>
                        <input type="text" placeholder="Nhập email" id="user2-register" name="user2-register">
                        <span class="form-message"></span>
                    </div>
                    <div class="modal_content-input-box form-group">
                        <label for="password-register">Mật khẩu</label>
                        <input type="password" placeholder="Nhập mật khẩu" id="password-register" name="password-register">
                        <span class="form-message"></span>
                    </div>
                    <div class="modal_content-input-box form-group">
                        <label for="username-register">Tên đăng ký</label>
                        <input type="text" placeholder="Nhập tên đăng ký" id="username-register" name="username-register">
                        <span class="form-message"></span>
                    </div>
                      <div class="modal_content-btn-box">
                          <button type="submit" class="btn-form btn-default" id="btn-register"><span>Đăng ký</span></button>
                          <button type="reset" class="btn-form btn-close">Bỏ qua</button>
                          <!-- <span><a href="index.php?chon=home"></a></span> -->
                      </div>
                      <div class="modal_content-register-rule">
                          <p>
                             Bằng việc đăng ký, bạn đã đồng ý với Vạn Ngữ Book về
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
    const $=document.querySelector.bind(document);
    const inputLogin=document.querySelector("#Login");
    const inputRegister=document.querySelector("#Register");
    const modalLogin=document.querySelector(".modal_content-login");
    const modalRegister=document.querySelector(".modal_content-register");
    // const closeElement=document.querySelector('.btn-close');
    const fcloseElemts=document.querySelectorAll('.btn-close');
    const modalElement=$('.modal');
    modalElement.style.display='flex';
    inputLogin.onclick=function(){
        // document.querySelector(".modal").style.display="flex"
        inputRegister.classList.add("modal_content-header-item-default");
        inputLogin.classList.remove("modal_content-header-item-default");
        modalLogin.style.display="block"
        modalRegister.style.display="none"
    }
    inputRegister.onclick=function(){
        // document.querySelector(".modal").style.display="flex"
        inputLogin.classList.add("modal_content-header-item-default");
        inputRegister.classList.remove("modal_content-header-item-default");
        modalRegister.style.display="block"
        modalLogin.style.display="none"
    }
    fcloseElemts.forEach((element) =>{
        element.onclick=() =>{
            // modalElement.style.display='none';
            window.location.href='index.php?chon=home';
        }
    })
    Validator({
        form:'#form-1',
        rules:[
        Validator.isRequired('#password-login'),
        Validator.isRequired('#user-login'),
        Validator.isMinLength('#password-login',6),
        ],
        errorElement:'.form-message',
        onSubmit: (value) =>{
            modalElement.style.display='none';
            xhr=new XMLHttpRequest();
            var data = {
                user_login: 'phuhuynh.010104@gmail.com',
                password_login: '123456'
            };
            xhr.open('POST','http://localhost/ProjectWeb2/module/xldangky.php?'+'user_login=123&password_login=456',true);
            // window.location.href='index.php?chon=dangky&user_login='+data.user_login+"&password_login="+data.password_login;
            xhr.send();
            xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 300) {
                // Xử lý phản hồi từ server ở đây
                console.log(xhr.responseText);
            } else {
                // Xử lý lỗi
                console.error('Lỗi gửi dữ liệu:', xhr.statusText);
            }
        };
        }
    })
    // Validator({
    //     form:'#form-2',
    //     rules:[
    //     Validator.isRequired('#user1-register'),
    //     Validator.isRequired('#user2-register'),
    //     Validator.isEmail('#user2-register'),
    //     Validator.isRequired('#password-register'),
    //     Validator.isRequired('#username-register'),
    //     Validator.isMinLength('#password-register',6),
    //     ],
    //     errorElement:'.form-message',
    //     onSubmit: (value) =>{
    //         console.log(value);
    //     }
    // })
</script>
