<?php

    require 'db.php';
    if(empty($_SESSION['user_id'])){
    echo "You are not logged in ";
    exit();
    }
    $user_id = $_SESSION['user_id'];
    $sql = "INSERT INTO purchased_product (`product_id`,`user_id`)
    SELECT `product_id`,`user_id`
    FROM `basket`
    WHERE `user_id`='$user_id'";
    $result = mysqli_query($mysqli, $sql);
    $sql = "DELETE FROM `basket` WHERE `basket`.`user_id` = '$user_id'";
    $result = mysqli_query($mysqli, $sql);
    echo "All Products checked out";

    $mysqli->close();
?>