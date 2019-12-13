<?php
include 'db.php';
$sql = "SELECT * FROM `product_category`";
$categories = mysqli_query($mysqli,$sql);
?>