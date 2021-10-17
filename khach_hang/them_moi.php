<?php
include "../layouts/header.php";


if (isset($_POST['btn-add'])) {
  
  $mat_khau = $_POST['mat_khau'];
  $ho_ten = $_POST['ho_ten'];
  $kich_hoat = $_POST['kich_hoat'];
  $hinh = $_FILES['hinh']['name'];
  $uploaddir = '../images/';
  $uploadfile = $uploaddir . basename($_FILES['hinh']['name']);
  if (move_uploaded_file($_FILES['hinh']['tmp_name'], $uploadfile)) {
    echo "File is valid, and was successfully uploaded.\n";
  } else {
    echo "Upload failed";
  }

  $email = $_POST['email'];
  $vai_tro = $_POST['vai_tro'];

  $connection = new PDO("mysql:host=127.0.0.1;dbname=ass;charset=utf8", "root", "");
  $query = "INSERT INTO khach_hang (mat_khau, ho_ten, kich_hoat, hinh, email, vai_tro)
  VALUES ('$mat_khau','$ho_ten','$kich_hoat','$hinh','$email','$vai_tro')";
  $stmt = $connection->prepare($query);
  $stmt->execute();

  header('location:danh_sach.php');
}
?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="public/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
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
        <!-- logout -->
        <form method='post' action="">
          <button type="submit" class="btn btn-default" value="Logout" name="logout">Đăng xuất</button>
        </form>
        </li>
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
              <h1>Thêm mới khách hàng </h1>
              <form action="" method="post" enctype="multipart/form-data">
                  <div>
                    <label>Họ Và Tên</label>
                  </div>
                  <input type="text" name="ho_ten" id="" class="form-control" placeholder="Nhập họ tên">
                  <div>
                    <label>Mật khẩu</label>
                  </div>
                  <input type="password" name="mat_khau" id="" class="form-control" placeholder="Nhập mật khẩu">
                  <div>
                    <label>Hình ảnh</label>
                  </div>
                  <input type="file" name="hinh" id="">
                  <div>
                    <label>Email</label>
                  </div>
                  <input type="text" name="email" id="" class="form-control" placeholder="Nhập Email">
                  <div>
                    <label>Trạng thái</label>
                  </div>
                  <input type="number" min="0" max="1" class="form-control" name="kich_hoat" id="" placeholder="Nhập ">
                  <div>
                    <label>Vai trò</label>
                  </div>
                  <input type="text" name="vai_tro" id="" class="form-control" placeholder="Nhập Vai trò">

                  <div style="padding-top: 10px; float: right;">
                    <input type="submit" name="btn-add" id="" class="btn btn-success" value="Thêm mới">
                  </div>
              </form>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include "../layouts/footer.php" ?>
</body>