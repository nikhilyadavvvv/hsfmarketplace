<?php

    require 'db.php';
    if(empty($_SESSION['user_id'])){
    echo "You are not logged in ";
    exit();
    }
    $user_id = $_SESSION['user_id'];

    $sql = "DELETE FROM `basket` WHERE `basket`.`user_id` = '$user_id'";
    $result = mysqli_query($mysqli, $sql);
    echo "All Products checked out";

    $mysqli->close();
?>