<?php
require 'db.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$uid = mysqli_real_escape_string($mysqli, $data->uid);

	//$user_id = $_SESSION['user_id'];
	$user_id = $uid;
	$sql = "SELECT a.*, b.* FROM basket as a join table_product as b on a.product_id = b.id  where a.user_id = $user_id";
	$result = mysqli_query($mysqli,$sql);
$json_array = array();
if($result){
    while($row = $result -> fetch_assoc()){
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

    $json_array = json_encode($json_array);
    header('Content-Type: application/json');
    print_r($json_array);
}
