<?php
include 'db.php';
$user_id  = $_SESSION['user_id'];
//$sql = "SELECT `table_product`.`id`, `table_product`.`name`, `table_product`.`cost`,`gift`.`sender_id` FROM `table_product`, `gift` WHERE `gift`.`product_id` = `table_product`.`id` AND `gift`.`reciever_id` = $user_id GROUP BY `gift`.`product_id`";
$sql = "SELECT `table_product`.`id`, `table_product`.`name`, `table_product`.`cost`,`gift`.`sender_id`,`user`.`email` FROM `table_product`, `gift`,`user` WHERE `gift`.`product_id` = `table_product`.`id` AND `user`.`user_id` = `gift`.`sender_id` AND `gift`.`reciever_id` = ".$user_id;
$result = mysqli_query($mysqli,$sql);
?>  