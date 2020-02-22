<?php
require 'db.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$i = 0;
$user_id = mysqli_real_escape_string($mysqli, $data->id);
$sql = "SELECT *  FROM `message` WHERE `receiver` = $user_id ORDER BY `message`.`message_id` DESC";
$result = mysqli_query($mysqli, $sql);
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $i++;
        $sender = $row['sender'];
        $content = $row['content'];
        $timestamp = $row['timestamp'];
        $product_id = $row['product_id'];
        $product_name = "";

        $sql2 = "SELECT *  FROM `user` WHERE `user_id` = $sender";
        $result2 = mysqli_query($mysqli, $sql2);
        while ($row2 = $result2->fetch_assoc()) {
            echo $sender_name = $row2["firstname"];
        }

        $sql3 = "SELECT *  FROM `table_product` WHERE `id` = $product_id";
        $result3 = mysqli_query($mysqli, $sql3);
        while ($row3 = $result3->fetch_assoc()) {
            $product_name = $row3["name"];
        }
        ?>

$json_array = array();
$data =  array();

if ($count == 1) {
   

    while ($row = $result->fetch_assoc()) {
        
        $data['id'] = $row['id'];
        $data['name'] = $row['user_name'];
        $data['password'] = $row['password'];
        
           
        } 
    }


    $json_array = json_encode($data);
    header('Content-Type: application/json');
    print_r($json_array);

?>

