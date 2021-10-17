<?php
include "../layouts/header.php";


if (isset($_POST['btn-add'])) {
  $ma_loai = $_POST['ma_loai'];
  $ten_hh = $_POST['ten_hh'];
  $don_gia = $_POST['don_gia'];
  $hinh = $_FILES['hinh']['name'];
  $uploaddir = '../images/';
  $uploadfile = $uploaddir . basename($_FILES['hinh']['name']);
  if (move_uploaded_file($_FILES['hinh']['tmp_name'], $uploadfile)) {
      echo "File is valid, and was successfully uploaded.\n";
  } else {
      echo "Upload failed";
  }

  $ngay_nhap = $_POST['ngay_nhap'];
  $mo_ta = $_POST['mo_ta'];
  $trang_thai = $_POST['trang_thai'];
  $luot_xem = $_POST['luot_xem'];
 


  $connection = new PDO("mysql:host=127.0.0.1;dbname=ass;charset=utf8", "root", "");
  $query = "insert into hang_hoa (ten_hh,don_gia,hinh,ngay_nhap,mo_ta,trang_thai,luot_xem,ma_loai) values('$ten_hh','$don_gia','$hinh','$ngay_nhap','$mo_ta','$trang_thai','$luot_xem','$ma_loai')";
  $stmt = $connection->prepare($query);
  $stmt->execute();

  header('location: danh_sach.php');
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
                $connection = new PDO("mysql:host=127.0.0.1;dbname=ass;charset=utf8", "root", "");
                $query = "select * from loai_hang";
                $stmt = $connection->prepare($query);
                $stmt->execute();
                $loai_hang = $stmt->fetchAll();
              ?>
              <h1>Thêm mới hàng hóa </h1>
              <form action="" method="post" enctype="multipart/form-data">
                <div>
                  <label>Loại hàng</label>
                </div>
                <select name="ma_loai" id="" class="form-control">
                  <?php
                  foreach ($loai_hang as $key => $value) : ?>
                    <option value="<?php echo $value['ma_loai'] ?>"><?php echo $value['ten_loai'] ?></option>
                  <?php endforeach ?>
                </select>
                <div>
                <label>Tên hàng hóa</label>
                </div>
                <input type="text" name="ten_hh" id="" class="form-control" placeholder="Nhập tên">
                <div>
                  <label>Đơn giá</label>
                </div>
                <input type="text" name="don_gia" id="" class="form-control" placeholder="Nhập giá">
                <div>
                  <label>Hình ảnh</label>
                </div>
                <input type="file" name="hinh" id="">
                <div>
                  <label>Ngày nhập</label>
                </div>
                <input type="date" name="ngay_nhap" 
                  placeholder="dd-mm-yyyy" value=""  class="form-control"
                  min="1997-01-01" max="2030-12-31">
                <div>
                  <label>Mô tả</label>
                </div>
                <input type="text" name="mo_ta" class="form-control" id="" placeholder="Nhập mô tả">
                <div>
                  <label>Trạng thái</label>
                </div>
                <input type="text" name="trang_thai" class="form-control" id="" placeholder="Nhập trạng thái">
                <div>
                  <label>Lượt xem</label>
                </div>
                <input type="text" name="luot_xem" class="form-control" id="" placeholder="">
                <div style="padding-top: 10px; float: right;">
                  <button type="submit" name="btn-add" id="" class="btn btn-success">Thêm mới</button>
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