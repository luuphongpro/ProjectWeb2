<div class="container">
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">

            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">User Profile</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                                          <!-- <span><i class="fas fa-comments" style="width: 30px;"></i></span> -->
                      <img class="profile-user-img img-fluid img-circle" style="width: 30px; height: 30px; object-fit: cover;" src="./img/user.png" alt="User profile picture">
                    
                  </div>

                  <h3 class="profile-username text-center">Huỳnh Phú</h3>

                  <!-- <p class="text-muted text-center">Software Engineer</p> -->

                  <!-- <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email:</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone:</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Address</b> <a class="float-right">13,287</a>-->
                  
                  

                  <a href="index.php?chon&id=home" class="btn btn-danger btn-block" onclick="LogOut()"><b>Logout</b></a>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- About Me Box -->

              <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link" href="#pending" data-toggle="tab" aria-expanded="false">Order in pending</a></li>
                    <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab" aria-expanded="true">Order on delivering</a></li>
                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab" aria-expanded="false">My orders</a></li>
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab" aria-expanded="false">Profile</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="tab-pane" id="pending" aria-expanded="false">
                      <!-- Post -->
                                                                    <div class="post" style=" text-align: center; ">


                          <span>HAVE NO ORDER</span>



                        </div>
                                          </div>
                    <div class="tab-pane" id="activity" aria-expanded="false">
                      <!-- Post -->

                                                                    <div class="post" style=" text-align: center; ">


                          <span>HAVE NO ORDER</span>



                        </div>
                                          </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane active" id="timeline" aria-expanded="true">
                      <!-- Post -->

                                                                    <div class="post" style=" text-align: center; ">


                          <span>HAVE NO ORDER</span>



                        </div>
                                          </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="settings" aria-expanded="false">


                      <form class="form-horizontal" method="post">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label for="inputName" class="col-sm-4 col-form-label">First Name</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="firstname" placeholder="First Name" value="Huỳnh">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputName" class="col-sm-4 col-form-label">Last Name</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="Phú" required="">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputEmail" class="col-sm-4 col-form-label">Email</label>
                              <div class="col-sm-8">
                                <input type="email" class="form-control" name="email" placeholder="Email" value="phuhuynh.010104@gmail.com" required="">
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
                          <div class="col-md-6">
                            <div class="form-group row" style="flex-direction: column; align-items: center;">
                              <label for="inputSkills" class="col-sm-4 col-form-label">Avatar</label>
                              <div class="text-center">
                                                                  <!-- <span><i class="fas fa-comments" style="width: 30px;"></i></span> -->
                                  <img id="avatarPreview" class="profile-user-img img-fluid img-circle" style="width: 200px; height: 200px; object-fit: cover;" src="./img/user.png" alt="User profile picture">
                                
                              </div>
                              <div class="col-sm-8" style="flex-direction: column; align-items: center;">
                                <label for="fileInput" class="btn btn-info btn-large" style="display: block;margin-top: 10px;">
                                  Choose Image
                                </label>
                                <input type="file" id="fileInput" name="avatar" hidden="" onchange="previewImage(this)">
                              </div>
                            </div>
                          </div>

                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-8">
                              <input type="submit" class="btn btn-info" value="Submit">
                            </div>
                          </div>
                      
                    </div></form>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="">

                    </div>
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div></section>
      <!-- /.content -->
    </div>
  </div>