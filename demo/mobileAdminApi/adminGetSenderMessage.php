<?php
require 'db.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$sender_id = mysqli_real_escape_string($mysqli, $data->senderId);
$product_id = mysqli_real_escape_string($mysqli, $data->productId);
$receiver_id = mysqli_real_escape_string($mysqli, $data->receiverId);

$sql = "SELECT *  FROM `message` WHERE `sender` =  '" . $sender_id . "' AND `product_id` = '" . $product_id . "' UNION SELECT *  FROM `message` WHERE `sender` =  '" . $receiver_id . "' AND `product_id` = '" . $product_id . "' And `receiver` =  '" . $sender_id . "' " ;
$result = mysqli_query($mysqli, $sql);

$json_array = array();
$data =  array();

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $data =  array();
        $data['Text'] = $row['content'];
        $data['User'] = $row['sender'];
        $json_array[] = $data;
    }

    $json_array = json_encode($json_array);
    header('Content-Type: application/json');
    print_r($json_array);
}
?>