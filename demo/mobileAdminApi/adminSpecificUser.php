<?php
require 'db.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

$userId = mysqli_real_escape_string($mysqli, $data->id);

$sql = "SELECT *  FROM `admin_accounts` WHERE `id` = '" . $userId."'";
$result = mysqli_query($mysqli, $sql);
$count = mysqli_num_rows($result);


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

