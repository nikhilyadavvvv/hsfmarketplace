<?php
include 'db.php';
$sql = "SELECT COUNT(DISTINCT id ) AS 'total_product' FROM table_product UNION ALL select  COUNT(DISTINCT id ) as 'pending product' FROM table_product where status = 'pending' UNION ALL select  COUNT(DISTINCT id ) as 'approved product' FROM table_product where status = 'approved' UNION ALL select COUNT(DISTINCT user_id)'total user' FROM user UNION ALL select COUNT(DISTINCT user_id) FROM user WHERE STATUS = '0'UNION ALL select COUNT(DISTINCT user_id) FROM user WHERE STATUS = '1' ";
$result = mysqli_query($mysqli,$sql);

$json_array = array();
$id = 0;

$array = array("total product", "pending product", "approved product", "total user", "pending user"," approved user");

if($result){
    while($row = $result -> fetch_assoc()){
        $data =  array();
        $data['id'] = $id + 1;
        // $data['name'] = $array[$id];
        $data['name'] = $array[$id];
        $data['totalNumber'] = $row['total_product'];
        $id++;
       $json_array[] = $data;
    }
    $json_array = json_encode($json_array);
    header('Content-Type: application/json');
    print_r($json_array);
}
?>