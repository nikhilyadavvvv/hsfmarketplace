<?php
    require "db.php";
    $seller = $_SESSION["user_id"];
    $id = mysqli_real_escape_string($mysqli, $_GET['id']); 
    $sql = "DELETE FROM `table_product` WHERE `table_product`.`seller` = '$seller' AND `table_product`.`id` = 12";
    mysqli_query($mysqli, $sql);
?>