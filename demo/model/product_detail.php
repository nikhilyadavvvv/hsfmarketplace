<?php
include 'db.php';
$id = $_GET['id'];
//$sql = "SELECT * FROM table_product join user on table_product.seller=user.user_id WHERE table_product.id = ".$id;
$sql = "SELECT * FROM table_product WHERE table_product.id = ".$id." and status = 'approved'";
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
        //$data['seller'] = $row['firstname'].' '.$row['lastname'];
        $data['seller'] = $row['seller'];
       $json_array[] = $data;
    }
    $json_array = json_encode($json_array);
    header('Content-Type: application/json');
    print_r($json_array);
}
?>