<?php
    $ma_sl = $_POST['ma_sl'];
    $ten_sl = $_POST['ten_sl'];
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

    $connection = new PDO("mysql:host=127.0.0.1;dbname=ass;charset=utf8","root","");
    if (!empty($hinh)) {
        $query = "update slider set ten_sl='$ten_sl',hinh='$hinh' where ma_sl=$ma_sl";
    } else {
        $query = "update slider set ten_sl='$ten_sl' where ma_sl=$ma_sl";

    }
    $stmt = $connection->prepare($query);
    $stmt->execute();

    header('location: danh_sach.php');
