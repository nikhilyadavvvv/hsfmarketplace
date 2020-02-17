<?php
include 'db.php';

// If you want all category with count use Left outer join
$sql = "SELECT category_name,COUNT(p.category_id ) AS 'total_product' FROM product_category c Inner JOIN table_product p ON c.category_id = p.category_id GROUP BY category_name";

$result = mysqli_query($mysqli,$sql);

$json_array = array();
$id = 1;
if($result){
    while($row = $result -> fetch_assoc()){
        $data =  array();
        $data['id'] = $id;
        $data['categoryName'] = $row['category_name'];
        $data['totalProduct'] = $row['total_product'];
        $id++;
       $json_array[] = $data;
    }
    $json_array = json_encode($json_array);
    header('Content-Type: application/json');
    print_r($json_array);
}
?>