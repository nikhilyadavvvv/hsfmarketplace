<?php
require 'db.php';
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$password = mysqli_real_escape_string($mysqli, $_POST['password']);

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

