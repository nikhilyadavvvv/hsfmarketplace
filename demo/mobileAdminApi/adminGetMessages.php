<?php
require 'db.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$user_id = mysqli_real_escape_string($mysqli, $data->id);
$sql = "SELECT *  FROM `message` WHERE `receiver` =  '" . $user_id . "'";
$result = mysqli_query($mysqli, $sql);
$json_array = array();
$data =  array();

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $data =  array();
        $data['sender'] = $row['sender'];
        $data['content'] = $row['content'];
        $data['timestamp'] = $row['timestamp'];
        $data['productId'] = $row['product_id'];
        $json_array[] = $data;
    }

    $json_array = json_encode($json_array);
    header('Content-Type: application/json');
    print_r($json_array);
}
?>