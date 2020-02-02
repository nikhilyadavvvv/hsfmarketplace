<?php

    require 'db.php';
    if(empty($_SESSION['user_id'])){
    echo "You are not logged in ";
    exit();
    }
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT `product_id` FROM basket WHERE `user_id` = $user_id";
    $result = mysqli_query($mysqli, $sql);
    if($result){
        while($row = $result -> fetch_assoc()){
            $productId =  $row['product_id'];
            $productSql = "SELECT `stock`  FROM `table_product` WHERE `id` = '$productId'";
            $productResult = mysqli_query($mysqli,$productSql);
            if($productResult){
                while($row2 = $productResult -> fetch_assoc()){
                    $stock = $row2['stock'];
                    $stock = $stock-1;
                    $sql = "UPDATE `table_product` SET `stock` = $stock WHERE `id` = $productId";
                    mysqli_query($mysqli,$sql);
                }
            }
        }
    }

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