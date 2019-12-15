<?php

require 'db.php';
if(empty($_SESSION['user_id'])){
echo "You are not logged in ";
exit();
}
$sender = $_POST["sender"];
$user_id = $_SESSION['user_id'];
$sql = "DELETE FROM `message` WHERE `message`.`sender` = '$sender'";
$result = mysqli_query($mysqli, $sql);
echo "Message deleted";

$mysqli->close();
?>