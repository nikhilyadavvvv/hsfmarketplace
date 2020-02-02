<?php
require 'db.php';
$user_id = $_SESSION['user_id'];
$product_id =$_GET['id'];

$sql = "DELETE FROM `purchased_product` WHERE `user_id` = '$user_id' AND `product_id` = '$product_id' ";


if (mysqli_query($mysqli,$sql)) {
    $mysqli->close();
    $_SESSION['success_message'] = 'Order canceled successfully.';
   header("Location: ../my_orders.php"); 
    exit();
} else {
    echo mysqli_error($mysqli);
}
?>