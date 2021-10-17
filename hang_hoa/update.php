<?php
    $ma_hh = $_POST['ma_hh'];
    $ten_hh = $_POST['ten_hh'];
    $ma_loai = $_POST['ma_loai'];
    $don_gia = $_POST['don_gia'];
    $hinh = $_FILES["image_tmp"]["name"];
    if(array_key_exists('image_tmp', $_FILES)){
        $uploaddir = '../images/';
        $uploadfile = $uploaddir . basename($_FILES['image_tmp']['name']);
        if (move_uploaded_file($_FILES['image_tmp']['name'], $uploadfile)) {
            echo "File is valid, and was successfully uploaded.\n";
        } else {
            echo "Upload failed";
        }
    }
   
    $ngay_nhap = $_POST['ngay_nhap'];
    $mo_ta = $_POST['mo_ta'];
    $trang_thai = $_POST['trang_thai'];
    $luot_xem = $_POST['luot_xem'];

    $connection = new PDO("mysql:host=127.0.0.1;dbname=ass;charset=utf8","root","");
    if (!empty($hinh)) {
        $query = "update hang_hoa set ten_hh='$ten_hh',don_gia='$don_gia',hinh='$hinh',ngay_nhap='$ngay_nhap',mo_ta='$mo_ta',trang_thai='$trang_thai',luot_xem='$luot_xem',ma_loai='$ma_loai' where ma_hh=$ma_hh";
    } else {
        $query = "update hang_hoa set ten_hh='$ten_hh',don_gia='$don_gia',ngay_nhap='$ngay_nhap',mo_ta='$mo_ta',trang_thai='$trang_thai',luot_xem='$luot_xem',ma_loai='$ma_loai' where ma_hh=$ma_hh";
    }
    $stmt = $connection->prepare($query);
    $stmt->execute();

    header('location: danh_sach.php');
