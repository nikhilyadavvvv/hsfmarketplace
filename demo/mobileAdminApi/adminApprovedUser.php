<?php
include 'db.php';
$sql = "SELECT * FROM `user` WHERE STATUS = '1'";

$result = mysqli_query($mysqli,$sql);
$json_array = array();
if($result){
    while($row = $result -> fetch_assoc()){
        $data =  array();
        $data['id'] = $row['user_id'];
        $data['name'] = $row['firstname'] . $row['lastname'] ;
        $data['status'] = $row['status'];
        $data['isSeller'] = $row['is_seller'];
       $json_array[] = $data;
    }
    $json_array = json_encode($json_array);
    header('Content-Type: application/json');
    print_r($json_array);
}
?>