<?php
require 'db.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$i = 0;
$user_id = mysqli_real_escape_string($mysqli, $data->id);
$sql = "SELECT *  FROM `message` WHERE `receiver` = $user_id ORDER BY `message`.`message_id` DESC";
$result = mysqli_query($mysqli, $sql);

$data =  array();

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $i++;
        $sender = $row['sender'];
        $content = $row['content'];
        $timestamp = $row['timestamp'];
        $product_id = $row['product_id'];

        $sql2 = "SELECT *  FROM `message` WHERE `product_id` = $product_id and `receiver` = $user_id and  `sender` = $sender  ORDER BY `message`.`message_id` DESC";
        $result2 = mysqli_query($mysqli, $sql2);
        while ($row2 = $result2->fetch_assoc()) {
            $data =  array();
            $data['sender'] =  $row2['sender'];
            
            $data['content'] = $row2['content'];
           $data['timestamp'] = $row2['timestamp'];
            $data['product_id'] = $row2['product_id'];
            $data['content'] = $row2['content'];
            $json_array[] = $data;
        }
    }

    $json_array = json_encode($json_array);
    header('Content-Type: application/json');
    print_r($json_array);
}
        
        ?>