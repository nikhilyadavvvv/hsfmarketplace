<?php

    session_start();
    if(empty($_SESSION['user_id'])){
    echo "You are not logged in ";
    exit();
    }
    $user_id = $_SESSION['user_id'];
    $product_id = $email = mysqli_real_escape_string($mysqli,$_POST['product_id']);



    require 'db.php';

    $sql = "SELECT *  FROM `user` WHERE `email` = '".$user_id."' AND `password` = '".$product_id."'";
    $result = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($result);
    if ($count==0) {
        $insertSql = "INSERT INTO `basket` (`id`, `user_id`, `product_id`) VALUES (NULL, '$user_id', '$product_id')";
        $insertResult = mysqli_query($mysqli, $insertSql);
        echo "Product added to basket"
   }
    $mysqli->close();
?>