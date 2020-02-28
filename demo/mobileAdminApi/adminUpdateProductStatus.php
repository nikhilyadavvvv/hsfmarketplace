<?php
include 'db.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$productId = mysqli_real_escape_string($mysqli, $data->id);

$status = mysqli_real_escape_string($mysqli, $data->status);


$sql = "UPDATE `table_product` SET `status` = '" . $status . "' WHERE `id` = '" . $productId . "'";


$result = mysqli_query($mysqli,$sql);


?>