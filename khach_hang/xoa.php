<?php
    $ma_kh = $_GET['ma_kh'];
    $connection = new PDO("mysql:host=127.0.0.1;dbname=ass;charset=utf8","root","");
    $query = "delete from khach_hang where ma_kh=$ma_kh";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    header('location: danh_sach.php');
?>