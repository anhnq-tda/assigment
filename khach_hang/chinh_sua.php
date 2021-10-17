<?php
include "../layouts/header.php";

$connection = new PDO("mysql:host=127.0.0.1;dbname=ass;charset=utf8", "root", "");
/*
      PDO: PHP Data Object là 1 class cung cấp các phương thức để truy xuất DB
  */
$query = "select * from khach_hang";
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
      <img class="animation__shake" src="../../public/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
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
                <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
                <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
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
              <?php
              $ma_kh = $_GET['ma_kh'];
              $connection = new PDO("mysql:host=127.0.0.1;dbname=ass;charset=utf8", "root", "");
              $query = "select * from khach_hang where ma_kh=$ma_kh";
              $stmt = $connection->prepare($query);
              $stmt->execute();
              $khach_hang = $stmt->fetch();
              ?>

              <h1>Thêm mới khách hàng </h1>
              <form action="update.php" method="post" enctype="multipart/form-data">
                <input type="text" name="ma_kh" id="" value="<?php echo $ma_kh ?>" hidden>
                <div>
                  <label>UserName</label>
                </div>
                <input type="text" name="ho_ten" id="" placeholder="Nhập họ tên" value="<?php echo $khach_hang['ho_ten']; ?>">
                <div>
                  <label>Mật khẩu</label>
                </div>
                <input type="password" name="mat_khau" id="" placeholder="Nhập mật khẩu" value="<?php echo $khach_hang['mat_khau']; ?>">
                <div>
                  <label>Hình ảnh</label>
                  <div>
                    <img src="../images/<?php echo $khach_hang['hinh'] ?>" alt="" style="width: 150px; height: 150px">
                  </div>
                </div>
                <input type="file" name="image_tmp" id="" value="<?php $khach_hang['hinh'];?>">
                <div>
                  <label>Email</label>
                </div>
                <input type="text" name="email" id="" placeholder="Nhập Email" value="<?php echo $khach_hang['email']; ?>">
                <div>
                  <label>Trạng thái</label>
                </div>
                <input type="number" min="0" max="1" name="kich_hoat" id="" placeholder="Nhập" value="<?php echo $khach_hang['kich_hoat']; ?>">
                <div>
                  <label>Vai trò</label>
                </div>

                <div style="padding-top: 10px; margin-left:10%">
                  <input type="submit" name="btn-update" id="" value="Cập nhật">
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
    <!-- <?php include "../layouts/footer.php" ?> -->
</body>