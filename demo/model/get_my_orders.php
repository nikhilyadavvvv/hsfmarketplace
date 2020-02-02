<?php
include 'db.php';
$user_id  = $_SESSION['user_id'];
$sql = "SELECT `table_product`.`id`, `table_product`.`name`, `table_product`.`cost` FROM `table_product`, `purchased_product` WHERE `purchased_product`.`product_id` = `table_product`.`id` AND `purchased_product`.`user_id` = $user_id GROUP BY `purchased_product`.`product_id`";
$result = mysqli_query($mysqli,$sql);
?>