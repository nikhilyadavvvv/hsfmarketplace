<?php
include 'db.php';
$sql = "SELECT * FROM `product_category`";

$result = mysqli_query($mysqli,$sql);
$json_array = array();
if($result){
    while($row = $result -> fetch_assoc()){
        $data =  array();
        $data['id'] = $row['category_id'];
        $data['name'] = $row['category_name'];
       $json_array[] = $data;
    }
    $json_array = json_encode($json_array);
    header('Content-Type: application/json');
    print_r($json_array);
}
?>