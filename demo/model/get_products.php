<?php
include 'db.php';
$sql = "SELECT * FROM `table_product` WHERE `status` = 'approved'";
$result = mysqli_query($mysqli,$sql);
$json_array = array();
if($result){
    while($row = $result -> fetch_assoc()){
        $data =  array();
        $data['id'] = $row['id'];
        $data['name'] = $row['name'];
        $data['image'] = $row['image'];
        $data['cost'] = $row['cost'];
       $json_array[] = $data;
    }
    $json_array = json_encode($json_array);
    header('Content-Type: application/json');
    print_r($json_array);
}
?>