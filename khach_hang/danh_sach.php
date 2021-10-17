<?php 
  include "../layouts/header.php";

  $connection = new PDO("mysql:host=127.0.0.1;dbname=ass;charset=utf8","root","");
  /*
      PDO: PHP Data Object là 1 class cung cấp các phương thức để truy xuất DB
  */ 
  $query = "SELECT * FROM khach_hang order by ma_kh desc";
  $stmt = $connection->prepare($query);
  /*
      -> dùng để truy cập vào phương thức
      prepare(): phương thức chuẩn bị 1 câu lệnh SQL
  */ 
  $stmt->execute(); 
  $khach_hang = $stmt->fetchAll();

?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../public/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <form method='post' action="">
          <button type="submit" class="btn btn-default" value="Logout" name="logout">Đăng xuất</button>
      </form>
    </ul>
  </nav>
  <!-- /.navbar -->

  <?php include "../layouts/sidebar.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Danh sách khách hàng</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                  <div style="padding-top: 15px;">
                    <a href="./them_moi.php"><button type="button" class="btn btn-success">Thêm mới</button></a>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Họ tên</th>
                      <th>Kích hoạt</th>
                      <th>Hình</th>
                      <th>Email</th>
                      <th>Vai trò</th>
                      <th>Hành Động</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $index = 0; ?>
                    <?php foreach($khach_hang as $item):?>
                <tr>
                    <td><?php echo $item['ho_ten']?></td>
                    <td><?php echo $item['kich_hoat']?></td>
                    <td><img src="../images/<?php echo $item['hinh']?>" alt="" style="width: 150px; height: 150px"></td>
                    <td><?php echo $item['email']?></td>
                    <td><?php echo  $item['vai_tro'] == 0 ? 'User' : 'Admin' ?></td>
                    <td>
                    <a href="chinh_sua.php?ma_kh=<?php echo $item['ma_kh'];?>"><button class="btn btn-primary">Sửa</button></a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                      Xoá
                    </button>
                  </td>
                </tr>
            <?php endforeach?>
        </tbody>
                  </tbody>
                </table>
                <!-- Modal confirm delete -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="modal_delete" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modal_delete"></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <span>Bạn chắc chắn muốn xoá không?</span>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Quay Lại</button>
                          <a href="./xoa.php?ma_kh=<?php echo $item['ma_kh'];?>"><button class="btn btn-danger">Xoá</button></a>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- end Modal -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- <?php include "../layouts/footer.php" ?> -->
</body>