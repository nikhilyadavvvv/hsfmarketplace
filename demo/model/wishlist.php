<?php
require 'db.php';
if(empty($_SESSION['user_id'])){
    echo "You are not logged in ";
    exit();
}
$user_id = $_SESSION['user_id'];
$product_id = $email = mysqli_real_escape_string($mysqli,$_GET['product_id']);
$sql = "SELECT *  FROM `wishlist` WHERE `user_id` = '".$user_id."' AND `product_id` = '".$product_id."'";
$result = mysqli_query($mysqli, $sql);
$count = mysqli_num_rows($result);
if ($count==0) {
    $insertSql = "INSERT INTO `wishlist` (`user_id`, `product_id`) VALUES ('$user_id', '$product_id')";
    //$insertResult = mysqli_query($mysqli, $insertSql);

    if (mysqli_query($mysqli,$insertSql)) {
        echo "Product added to wishlist";
    } else {
        echo mysqli_error($mysqli);
    }


}
else{
    echo "Product already in wishlist";
}
$mysqli->close();
?>