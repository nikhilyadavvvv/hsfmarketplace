<?php

    require 'db.php';
    if(empty($_SESSION['user_id'])){
    echo "You are not logged in ";
    exit();
    }
    $user_id = $_SESSION['user_id'];
    $product_id =$_GET['product_id'];

    echo $sql = "DELETE FROM `basket` WHERE `basket`.`user_id` = '$user_id' AND `basket`.`product_id` = '$product_id' ";
    $result = mysqli_query($mysqli, $sql);
    $mysqli->close();
?>