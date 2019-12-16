<?php
require 'db.php';
if(empty($_SESSION['user_id'])){
    $_SESSION['error_message'] = 'You are not logged in.';
    $_SESSION['last_url'] = 'product_detail.php?id='.$_GET['product_id'];
    $_SESSION['last_url_visit'] = true;
    echo 0; 
    exit();

}
$user_id = $_SESSION['user_id'];
$product_id = $email = mysqli_real_escape_string($mysqli,$_GET['product_id']);
$sql = "SELECT *  FROM `basket` WHERE `user_id` = '".$user_id."' AND `product_id` = '".$product_id."'";
$result = mysqli_query($mysqli, $sql);
$count = mysqli_num_rows($result);
if ($count==0) {
    $insertSql = "INSERT INTO `basket` (`id`, `user_id`, `product_id`) VALUES (NULL, '$user_id', '$product_id')";
    $insertResult = mysqli_query($mysqli, $insertSql);
    echo "Product added to basket";
}
else{
    echo "Product already in basket";
}
$mysqli->close();
?>