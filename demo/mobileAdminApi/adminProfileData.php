<?php
require 'db.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$userId = mysqli_real_escape_string($mysqli, $data->id);
$email = mysqli_real_escape_string($mysqli, $data->email);
$password = mysqli_real_escape_string($mysqli, $data->password);

$sql = "UPDATE `admin_accounts` SET `user_name` = '" . $email . "' AND `password` = '" . $password . "' WHERE `user_id` = '" . $userId."'";
$result = mysqli_query($mysqli, $sql);
var_dump($result);

$json_array = array();
if(result){
    $data = array();
    $data['message'] = "Success";
    $json_array[] = $data;
}
$json_array = json_encode($json_array);
    header('Content-Type: application/json');
    print_r($json_array);
?>

