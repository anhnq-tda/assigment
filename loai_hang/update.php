<?php
    $ma_loai = $_POST['ma_loai'];
    $ten_loai = $_POST['ten_loai'];

    $connection = new PDO("mysql:host=127.0.0.1;dbname=ass;charset=utf8","root","");
    $query = "update loai_hang set ten_loai='$ten_loai' where ma_loai=$ma_loai";
    $stmt = $connection->prepare($query);
    $stmt->execute();

    header('location: danh_sach.php');
?>