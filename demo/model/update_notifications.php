<?php
require 'db.php';
$id = $_POST['id'];

$sql = "update notification set `read` = '1' where `notification_id` = '$id'";
if (mysqli_query($mysqli,$sql)) {
	echo 'done';
} else {
	echo mysqli_error($mysqli);
}
?>