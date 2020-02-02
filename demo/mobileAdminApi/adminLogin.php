<?php
require 'db.php';

$foo = file_get_contents("php://input");
$content=json_decode($foo, true)

$email = mysqli_real_escape_string($mysqli, $content['email']);
$password = mysqli_real_escape_string($mysqli, $content['password']);

$sql = "SELECT *  FROM `admin_accounts` WHERE `user_name` = '" . $email . "' AND `password` = '" . $password . "'";
$result = mysqli_query($mysqli, $sql);
$count = mysqli_num_rows($result);

$json_array = array();


if ($count == 1) {
   

    while ($row = $result->fetch_assoc()) {
        $data =  array();
        $data['id'] = $row['id'];
        $data['name'] = $row['user_name'];
        $data['password'] = $row['password'];
        $json_array[] = $data;
           
        } 
    }

    $json_array = json_encode($json_array);
    header('Content-Type: application/json');
    print_r($json_array);

?>

