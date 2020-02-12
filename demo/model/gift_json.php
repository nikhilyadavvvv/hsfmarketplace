<?php
require 'db.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$uid = mysqli_real_escape_string($mysqli, $data->uid);
$rid = mysqli_real_escape_string($mysqli, $data->rid);
$pid = mysqli_real_escape_string($mysqli, $data->pid);

//$user_id = $_SESSION['user_id'];
$user_id = $uid;
$sql = "INSERT INTO `GDSD_schema`.`gift` (`reciever_id`, `sender_id`, `product_id`) VALUES ('$rid', '$uid', '$pid')";
mysqli_query($mysqli, $sql);



$user_id = $rid;
$sql = "SELECT `product_id` FROM basket WHERE `user_id` = $user_id";
$result = mysqli_query($mysqli, $sql);
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $productId =  $row['product_id'];
        $productSql = "SELECT `stock`  FROM `table_product` WHERE `id` = '$productId'";
        $productResult = mysqli_query($mysqli, $productSql);
        if ($productResult) {
            while ($row2 = $productResult->fetch_assoc()) {
                $stock = $row2['stock'];
                $stock = $stock - 1;
                $sql = "UPDATE `table_product` SET `stock` = $stock WHERE `id` = $productId";
                mysqli_query($mysqli, $sql);
            }
        }
    }
}

$sql = "DELETE FROM `basket` WHERE `basket`.`user_id` = '$user_id' AND `basket`.`product_id` = '$pid'";
$result = mysqli_query($mysqli, $sql);
echo "All Products checked out";
$mysqli->close();
