<?php
    $ma_kh = $_POST['ma_kh'];
    $mat_khau = $_POST['mat_khau'];
    $ho_ten = $_POST['ho_ten'];
    $kich_hoat = $_POST['kich_hoat'];
    $hinh = $_FILES['hinh']['name'];
    if(array_key_exists('image_tmp', $_FILES)){
        $uploaddir = '../images/';
        $uploadfile = $uploaddir . basename($_FILES['image_tmp']['name']);
        if (move_uploaded_file($_FILES['image_tmp']['name'], $uploadfile)) {
            echo "File is valid, and was successfully uploaded.\n";
        } else {
            echo "Upload failed";
        }
    }
   
    $email = $_POST['email'];
    $vai_tro = $_POST['vai_tro'];
  
  

    $connection = new PDO("mysql:host=127.0.0.1;dbname=ass;charset=utf8","root","");
    if (!empty($hinh)) {
        $query = "update khach_hang set mat_khau='$mat_khau',ho_ten='$ho_ten',kich_hoat='$kich_hoat',hinh='$hinh',email='$email',vai_tro='$vai_tro' where ma_kh=$ma_kh";
    } else {
        $query = "update khach_hang set mat_khau='$mat_khau',ho_ten='$ho_ten',kich_hoat='$kich_hoat',email='$email',vai_tro='$vai_tro' where ma_kh=$ma_kh";
    }
    $stmt = $connection->prepare($query);
    $stmt->execute();

    header('location: danh_sach.php');
