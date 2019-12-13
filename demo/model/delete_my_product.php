<?php
require 'db.php';
$user_id = $_SESSION['user_id'];
$product_id =$_GET['id'];

$sql = "DELETE FROM `table_product` WHERE `seller` = '$user_id' AND `id` = '$product_id' ";


if (mysqli_query($mysqli,$sql)) {
    $mysqli->close();
    $_SESSION['success_message'] = 'Product Deleted successfully.';
    header("Location: ../my_products.php"); 
    exit();
} else {
    echo mysqli_error($mysqli);
}
?>