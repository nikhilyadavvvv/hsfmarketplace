<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
}

if(empty($_SESSION['user_id'])){
    echo "You are not logged in ";
    exit();
}
$user_id = $_SESSION['user_id'];

include 'db.php';
$sql = "SELECT *  FROM `basket` WHERE `user_id` = '$user_id'";
$result = mysqli_query($mysqli,$sql);
$json_array = array();
if($result){
    while($row = $result -> fetch_assoc()){
        $productId =  $row['product_id'];
        $productSql = "SELECT *  FROM `table_product` WHERE `id` = '$productId'";
        $productResult = mysqli_query($mysqli,$productSql);
        

        if($productResult){
            while($row = $productResult -> fetch_assoc()){
                $data =  array();
                $data['id'] = $row['id'];
                $data['name'] = $row['name'];
                $data['image'] = $row['image'];
                $data['cost'] = $row['cost'];
                $data['category'] = $row['category'] ;
                $data['description'] = $row['description'];
                $data['stock'] = $row['stock'];
                $json_array[] = $data;
                
            }
        }
    }
    $json_array = json_encode($json_array);
    header('Content-Type: application/json');
    print_r($json_array);
}
?>