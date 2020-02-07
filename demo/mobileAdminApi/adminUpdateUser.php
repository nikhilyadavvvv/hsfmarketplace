<?php
include 'db.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$userId = mysqli_real_escape_string($mysqli, $data->id);

$status = mysqli_real_escape_string($mysqli, $data->status);


$sql = "UPDATE `user` SET `status` = $status WHERE `user`.`user_id` = $userId";

$result = mysqli_query($mysqli,$sql);

}
?>