<?php
require 'db.php';
$user_id = $_SESSION['user_id'];
$sql = "SELECT * from notification  where receiver = $user_id";
$result = mysqli_query($mysqli,$sql);
if($result){
	
}
?>