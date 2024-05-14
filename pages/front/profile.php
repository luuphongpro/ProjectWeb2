
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
                        <div class="post" style=" text-align: center;">
                          
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
                        <table class="table list-donhang">
                          <thead class="thead-light">
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Mã đơn hàng</th>
                              <th scope="col">Thời gian đặt hàng</th>
                              <th scope="col">Tổng tiền</th>
                              <th scope="col">Tình trạng đơn hàng</th>
                              <th scope="col">Xem chi tiết</th>
                            </tr>
                          </thead>
                          <tbody>
                            <!-- <tr>
                              <th scope="row">1</th>
                              <td>005</td>
                              <td>2024</td>
                              <td>100.000đ</td>
                              <td style="color : blue;">Đã xong</td>
                              <td>
                                <a class ="donhang-detail">
                                  <i class="fa-solid fa-eye "></i>
                                </a>
                              </td>
                              
                            </tr> -->
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="settings" aria-expanded="false">


                      <form class="form-horizontal" method="post" id = "form-user">
                        
                      </form>
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

  <div class = "overlay-listdonhang">
    <div class = "overlay-info-listdonhang">
        <div class="close-btn">X</div>  
        <h2>Danh sách các món đã đặt trong đơn hàng</h2>
        <table class="table table-striped table-listchitiet">
          <thead>
            <tr>
              <th class="text-center" scope="col">#</th>
              <th class="text-center" scope="col">Tên sản phẩm</th>
              <th class="text-center" scope="col">số lượng</th>
              <th class="text-center" scope="col">Giá</th>
              <th class="text-center" scope="col">Ảnh</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
    </div>
  </div>

<!-- <script src="../JS/xemdonhang.js"></script> -->
<!-- <script src="../JS/xemdonhang.js"></script>
<script src="JS/jquery-3.4.1.min.js"></script> -->