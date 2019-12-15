<?php
//require 'db.php';
function product_exist($product_id){
	$user_id = $_SESSION['user_id'];
	$sql = "SELECT *  FROM `wishlist` WHERE `user_id` = '".$user_id."' AND `product_id` = '".$product_id."'";
	$result = mysqli_query($mysqli, $sql);
	$count = mysqli_num_rows($result);
	if ($count) {
		return 1;
	}else{
		return 0;
	}
}


if (isset($_SESSION['wishlist'])) {
	$user_id = $_SESSION['user_id'];
	$data = $_SESSION['wishlist'];
	if (count($data)) {
		foreach ($data as $row) {
			$product_id = $row['id'];
			$exist = product_exist($product_id);

			if (!$exist) {
				$insertSql = "INSERT INTO `wishlist` (`user_id`, `product_id`) VALUES ('$user_id', '$product_id')";

				if (mysqli_query($mysqli,$insertSql)) {
					//echo "Product added to wishlist";
				} else {
					echo mysqli_error($mysqli);
					exit();
				}
			}

		}
	}
	unset($_SESSION['wishlist']);
}

?>