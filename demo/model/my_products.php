<?php
include 'db.php';
$seller  = $_SESSION['user_id'];
$sql = "SELECT * FROM `table_product` where `seller` = $seller";
$result = mysqli_query($mysqli,$sql);

?>