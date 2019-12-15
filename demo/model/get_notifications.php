<?php
require 'db.php';
$user_id = $_SESSION['user_id'];
$sql = "SELECT * from `notification`  where `read` ='0' AND `receiver` = '$user_id'";
$result = mysqli_query($mysqli,$sql);
$json_array = array();
if($result){
    while($row = $result -> fetch_assoc()){
        $data =  array();
        $data['notification_id'] = $row['notification_id'];
        $data['message'] = $row['message'];
        $data['link'] = $row['link'];
        $json_array[] = $data;
    }

    $json_array = json_encode($json_array);
    print_r($json_array);
}else{
	echo false;
}
?>