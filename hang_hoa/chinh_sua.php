<?php 
  include "../layouts/header.php";

  $connection = new PDO("mysql:host=127.0.0.1;dbname=ass;charset=utf8","root","");
  /*
      PDO: PHP Data Object là 1 class cung cấp các phương thức để truy xuất DB
  */ 
  $query = "select * from hang_hoa";
  $stmt = $connection->prepare($query);
  /*
      -> dùng để truy cập vào phương thức
      prepare(): phương thức chuẩn bị 1 câu lệnh SQL
  */ 
  $stmt->execute(); 
  $hang_hoa = $stmt->fetchAll();

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
                $ma_hh = $_GET['ma_hh'];
                $connection = new PDO("mysql:host=127.0.0.1;dbname=ass;charset=utf8","root","");
                $query = "select * from hang_hoa where ma_hh=$ma_hh";
                $stmt = $connection->prepare($query);
                $stmt->execute();
                $hang = $stmt->fetch();
            ?>
            <?php
                $connection = new PDO("mysql:host=127.0.0.1;dbname=ass;charset=utf8", "root", "");
                $query = "select * from loai_hang";
                $stmt = $connection->prepare($query);
                $stmt->execute();
                $loai_hang = $stmt->fetchAll();
            ?>
            <h1>Cập nhật Hàng hóa</h1>
            <form action="update.php" method="post" enctype="multipart/form-data">
                <input type="text" name="ma_hh" id="" value="<?php echo $ma_hh?>" hidden >
                <div>
                    <label>Tên Hàng Hóa</label>
                </div>
                <input type="text" name="ten_hh" id="" placeholder="Tên Hàng hóa" class="form-control" value="<?php echo $hang['ten_hh'];?>">
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
                    <label>Đơn giá</label>
                </div>
                <input type="text" name="don_gia" id="" placeholder="Đơn giá" class="form-control" value="<?php echo $hang['don_gia'];?>">
                <div>
                    <label>Hình ảnh</label>
                </div>
                <div>
                    <img src="../images/<?php echo $hang['hinh']?>" alt=""  style="width: 150px; height: 150px">
                </div>
                <input type="file" name="image_tmp" id="" value="<?php $hang['hinh'];?>">
                <div>
                  <label>Ngày nhập</label>
                </div>
                <input type="date" name="ngay_nhap" 
                  placeholder="dd-mm-yyyy" value="<?php echo $hang['ngay_nhap'];?>"
                  min="1997-01-01" max="2030-12-31" class="form-control">
                <div>
                  <label>Mô tả</label>
                </div>
                <input type="text" name="mo_ta" id="" placeholder=" mô tả" class="form-control" value="<?php echo $hang['mo_ta'];?>">
                <div>
                  <label>Trạng thái</label>
                </div>
                <input type="text" name="trang_thai" id="" placeholder="trạng thái" class="form-control" value="<?php echo $hang['trang_thai'];?>">
                <div>
                  <label>Lượt xem</label>
                </div>
                <input type="text" name="luot_xem" id="" placeholder="" value="<?php echo $hang['luot_xem'];?>">
                <div style="padding: 15px; float: right;">
                    <button type="submit" name="btn-update" id="" value="" class="btn btn-primary">Cập nhật</button>
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