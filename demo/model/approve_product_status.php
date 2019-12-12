<?php
    require "db.php";
    $seller = $_SESSION["user_id"];
    $id = mysqli_real_escape_string($mysqli, $_GET['id']);  
    $sql = "UPDATE `table_product` SET `status` = 'approved' WHERE `table_product`.`seller` = '$seller' AND `table_product`.`id` = '$id'";
    mysqli_query($mysqli, $sql);
?>