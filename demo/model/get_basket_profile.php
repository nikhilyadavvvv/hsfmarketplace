<?php
include 'db.php';
$seller  = $_SESSION['user_id'];
$sql = "SELECT a.id as basket_id, a.*, b.* FROM basket as a join table_product as b on a.product_id = b.id  where a.user_id = $seller";
$result = mysqli_query($mysqli,$sql);
?>