<?php
include 'db.php';
$category = $_GET['category'];
$s = $_GET['s'];

if ($category == 0) {
    $sql = "SELECT *  FROM `table_product` WHERE `name` LIKE '%$s%' ORDER BY `id` DESC";
}else{
    $sql = "SELECT *  FROM `table_product` WHERE `name` LIKE '%$s%' and `category_id` = '$category' ORDER BY `id` DESC";
}


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
?>
