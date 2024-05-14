// function updateInfoUser(){
    var formUser = document.getElementById("form-user");
    formUser.addEventListener("submit",async function(e){
        e.preventDefault();
        const data = new FormData(e.target);

        const json = await fetch("./module/updateInfoUser.php",{
            method : "POST",
            body: data
        })

        const response = await json.json();

        if(response.message === "success"){

        }else{

        }

    })
// }

function loadDataToForm(){
    var sessionData = JSON.parse(sessionStorage.getItem('UseLogin'))
    var sdt = sessionData.SĐT;

    var xhr = new XHR();
    xhr.connect(undefined,"./module/profile.php?sodt&"+sdt)
    .then(function(data){
        console.log(data);
        formUser.innerHTML ="";
        var content = `
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="inputName" class="col-sm-4 col-form-label">Tên đăng nhập</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="loginname" placeholder="Last Name" value="Phú" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName2" class="col-sm-4 col-form-label">Phone</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="phone" placeholder="Phone number" value="0369698361" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputExperience" class="col-sm-4 col-form-label">Address</label>
                    <div class="col-sm-8">
                        <input type="text" name="address" id="" class="form-control" placeholder="Address" value="TP.Pleiku" required="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputSkills" class="col-sm-4 col-form-label">Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" name="password" placeholder="Password" value="$2y$10$ANl2/VZo4dsChncAlT5Ta.t82j/nvcZMXO5sgvcNS3g6L7RnW3H5O">
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
    })

}