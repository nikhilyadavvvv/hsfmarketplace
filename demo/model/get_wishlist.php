<?php
require 'db.php';
$user_id = $_SESSION['user_id'];
$sql = "SELECT a.*, b.* FROM wishlist as a join table_product as b on a.product_id = b.id  where a.user_id = $user_id";
$result = mysqli_query($mysqli,$sql);

$data=[];

while($row = $result -> fetch_assoc()){ 
    array_push($data, $row);
}

/*print_r($data);

exit();*/
?>

