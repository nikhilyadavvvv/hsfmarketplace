<?php
require 'db.php';

$product_id = $email = mysqli_real_escape_string($mysqli,$_GET['product_id']);
if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])){

    if (!isset($_SESSION['wishlist'])) {
        $data =  array();
    }else{
        $data = $_SESSION['wishlist'];
    }
    $_SESSION['wishlist'] = $data;


    // $key = array_search($product_id, array_column($data, 'id'));
    // if (!empty($key) && $key >= 0) {
    //     echo "Product already in wishlist.";
    //     exit();
    // }

    $sql = "SELECT * FROM table_product where id = ".$product_id;
    $result = mysqli_query($mysqli,$sql);
    $json_array = array();
    if($result){
        while($row = $result -> fetch_assoc()){
            $data['id'] = $row['id'];
            $data['name'] = $row['name'];
            $data['image'] = $row['image'];
            $data['cost'] = $row['cost'];
            $data['category'] = $row['category'] ;
            $data['description'] = $row['description'];
            $data['stock'] = $row['stock'];
        }
    }
    array_push($_SESSION['wishlist'], $data);

    //echo "<pre>";

    echo "Product added to wishlist";


}else{


    $user_id = $_SESSION['user_id'];
    $sql = "SELECT *  FROM `wishlist` WHERE `user_id` = '".$user_id."' AND `product_id` = '".$product_id."'";
    $result = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($result);
    if ($count==0) {
        $insertSql = "INSERT INTO `wishlist` (`user_id`, `product_id`) VALUES ('$user_id', '$product_id')";
    //$insertResult = mysqli_query($mysqli, $insertSql);

        if (mysqli_query($mysqli,$insertSql)) {
            echo "Product added to wishlist";
        } else {
            echo mysqli_error($mysqli);
        }


    }
    else{
        echo "Product already in wishlist";
    }
    $mysqli->close();
}
?>