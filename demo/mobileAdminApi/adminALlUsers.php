<?php
include 'db.php';
$sql = "SELECT * FROM `user`";

$result = mysqli_query($mysqli,$sql);
$json_array = array();
if($result){
    while($row = $result -> fetch_assoc()){
        $data =  array();
        $data['id'] = $row['user_id'];
        $data['name'] = $row['firstname'] . $row['lastname'] ;
        $data['status'] = $row['status'];

        if($row['is_seller'] == 'y'){
            $data['user'] = "seller";
        }
        else{
            $data['user'] = "buyer";
        }
        
       $json_array[] = $data;
    }
    $json_array = json_encode($json_array);
    header('Content-Type: application/json');
    print_r($json_array);
}
?>