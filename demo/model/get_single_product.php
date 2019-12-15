<?php
include 'db.php';
$id = $_GET['id'];
$sql = "SELECT *  FROM `table_product` WHERE `id` = ".$id." AND `status` = 'approved'";
$result = mysqli_query($mysqli,$sql);
$product = array();
if(count($result)){
    while($row = $result -> fetch_assoc()){
        $product['id'] = $row['id'];
        $product['name'] = $row['name'];
        $product['image'] = $row['image'];
        $product['thumbnail'] = $row['thumbnail'];
        $product['cost'] = $row['cost'];
        $product['category_id'] = $row['category_id'];
        $product['stock'] = $row['stock'];
        $product['description'] = $row['description'];
    }
}
?>