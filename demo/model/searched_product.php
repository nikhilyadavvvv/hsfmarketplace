<?php
include 'db.php';
error_reporting(0);
$s = $_GET['s'];
$f = $_GET['f'];
$c = $$_GET['c'];

//$sql = "SELECT *  FROM `table_product` WHERE `name` LIKE '%$s%'";
if(empty($_GET['f'])){
    $sql = "SELECT *  FROM `table_product` WHERE `name` LIKE '%$s%'";
} else if ($f=="popularity") {
    # code...
} else if ($f=="rating") {
    # code...
} else if ($f=="newness") {
   $sql = "SELECT *  FROM `table_product` WHERE `name` LIKE '%$s%' ORDER BY `id` DESC";
} else if ($f=="l2h") {
    $sql = "SELECT *  FROM `table_product` WHERE `name` LIKE '%$s%' ORDER BY `cost` ASC";
} else if ($f=="h2l") {
    $sql = "SELECT *  FROM `table_product` WHERE `name` LIKE '%$s%' ORDER BY `cost` DESC";
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
