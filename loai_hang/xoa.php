<?php
    $ma_loai = $_GET['ma_loai'];
    $connection = new PDO("mysql:host=127.0.0.1;dbname=ass;charset=utf8","root","");
    $query = "delete from loai_hang where ma_loai=$ma_loai";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    header('location: danh_sach.php');
?>