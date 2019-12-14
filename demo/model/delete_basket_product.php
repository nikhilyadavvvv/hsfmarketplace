<?php

require 'db.php';
if(empty($_SESSION['user_id'])){
	echo "You are not logged in ";
	exit();
}
$user_id = $_SESSION['user_id'];
$product_id =$_GET['product_id'];

$sql = "DELETE FROM `basket` WHERE `basket`.`user_id` = '$user_id' AND `basket`.`product_id` = '$product_id' ";
if (mysqli_query($mysqli,$sql)) {
    //$_SESSION['error_message'] = $errors;
	$_SESSION['success_message'] = 'Product removed successfully.';
} else {
	echo mysqli_error($mysqli);
}
?>