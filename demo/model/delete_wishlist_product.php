<?php
require 'db.php';

$product_id =$_GET['product_id'];

if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){

	if (isset($_SESSION['wishlist'])) {
		$data = $_SESSION['wishlist'];

		$key = array_search($product_id, array_column($data, 'id'));

		unset($_SESSION['wishlist']);
		unset($data[$key]);

		$data = array_values($data);

		/*print_r($data);
		exit();*/

		$_SESSION['wishlist'] = $data;
		echo "Product removed successfully.";
	}else{
		$data=[];
	}

}else{

	$user_id = $_SESSION['user_id'];

	$sql = "DELETE FROM `wishlist` WHERE `wishlist`.`user_id` = '$user_id' AND `wishlist`.`product_id` = '$product_id' ";
	if (mysqli_query($mysqli,$sql)) {
    //$_SESSION['error_message'] = $errors;
		$_SESSION['success_message'] = 'Product removed successfully.';
		echo "Product removed successfully.";
	} else {
		echo mysqli_error($mysqli);
	}

}
?>