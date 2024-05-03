function LoadThemTK(){
    $("#right-content").load("./pages/admin/themtk.php",function(){
        Validator({
            form: "#form-themtk",
            rules:[
                Validator.isRequired("#user1-register"),
                Validator.isRequired("#password-register"),
                Validator.isRequired("#confirm_password"),
                Validator.isRequired("#username-register"),
                Validator.isRequired("#address-register")
            ],
            errorElement: ".form-message",
            onSubmit: function(value){
                var data=JSON.stringify(value)
                var xhr=new XMLHttpRequest()
                xhr.open("POST","./module/taikhoan.php?them")
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send('dataJSON='+data)
                xhr.onload=function(){
                    console.log(xhr.responseText)
                }
            }
        })
    })
}
function LoadSuaTK(){
    $("#right-content").load("./pages/admin/timtk.php",function(){
        $("#user1-register").on("input",function(){
            $(".error-login").css("display","none");
        })
        $(".btn-closee").click(function(){
            $(".btn-login").addClass("btn-default")
        })
        Validator({
            form: "#form-timtk",
            rules:[
                Validator.isRequired("#user1-register"),
            ],
            errorElement: ".form-message",
            onSubmit: function(value){
                var data=JSON.stringify(value)
                var xhr=new XMLHttpRequest()
                xhr.open("POST","./module/taikhoan.php?tim")
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send('dataJSON='+data)
                xhr.onload=function(){
                    console.log(xhr.responseText)
                    var resText=JSON.parse(xhr.responseText)
                    if(resText.flag){
                        $("#right-content").load("./pages/admin/suatk.php",function(){

                        })
                    }
                }
            }
        })
    })
}