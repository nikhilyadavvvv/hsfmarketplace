<?php
include 'db.php';
$sql = "SELECT * FROM `table_product` WHERE STATUS = 'pending'";

$result = mysqli_query($mysqli,$sql);
$json_array = array();
if($result){
    while($row = $result -> fetch_assoc()){
        $data =  array();
        $data['Id'] = $row['id'];
        $data['Name'] = $row['name'];
        $data['Cost'] = $row['cost'];
        $data['Category'] = $row['category'];
        $data['Stock'] = $row['stock'];
        $data['Description'] = $row['description'];
        $data['Rating'] = $row['rating'];
        $data['QuantitySold'] = $row['quantity_sold'];
        $data['Status'] = $row['status'];

        $image_id = $row['id'];

        $sql1 = "SELECT * FROM `multi_images` WHERE `id` = '$image_id'";
        $result1 = mysqli_query($mysqli,$sql1);
         $j_array = array();

         if($result1){
            while($row1 = $result1 -> fetch_assoc()){
                $data1 =  array();
                $data1['Id'] = $row1['id'];
                $data1['Image'] = $row1['image1'];
                $j_array[] = $data1;
                $data1['Id'] = $row1['id'];
                $data1['Image'] = $row1['image2'];
                $j_array[] = $data1;
                $data1['Id'] = $row1['id'];
                $data1['Image'] = $row1['image3'];
                $j_array[] = $data1;
            }

       
    }
    $data['imageCollection'] = $j_array;
    $json_array[] = $data;

}

    $json_array = json_encode($json_array);
    header('Content-Type: application/json');
    print_r($json_array);
}
?>