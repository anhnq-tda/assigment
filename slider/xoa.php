<?php
    $ma_sl = $_GET['ma_sl'];
    $connection = new PDO("mysql:host=127.0.0.1;dbname=ass;charset=utf8","root","");
    $query = "delete from slider where ma_sl=$ma_sl";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    header('location: danh_sach.php');
?>