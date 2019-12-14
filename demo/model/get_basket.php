<?php
require 'db.php';
$user_id = $_SESSION['user_id'];
$sql = "SELECT a.id as basket_id, a.*, b.* FROM basket as a join table_product as b on a.product_id = b.id  where a.user_id = $user_id";
$result = mysqli_query($mysqli,$sql);
$sum = 0;
if($result){
    while($row = $result -> fetch_assoc()){
        
        $sum += $row['cost'];


        echo '<div class="shp__single__product">
        <div class="shp__pro__thumb">
        <a href="#">
        <img src="'.$row['thumbnail'].'" alt="product images">
        </a>
        </div>
        <div class="shp__pro__details">
        <h2><a href="product_detail.php?id='.$row['id'].'">'.$row['name'].'</a></h2>
        <span class="shp__price">€'.$row['cost'].'</span>
        </div>
        <div class="remove__btn">
        <button" onclick="deleteFromCart('.$row['id'].')" title="Remove this item"><i class="zmdi zmdi-close"></i></button>
        </div>
        </div>';
    }
}

echo '<ul class="shoping__total">
<li class="subtotal">Subtotal:</li>
<li class="total__price">$'.$sum.'</li>
</ul>
<ul class="shopping__btn">
<!-- <li><a href="cart.html">View Cart</a></li> -->
<li class="shp__checkout"><a onclick="checkout()">Checkout</a></li>
</ul>';
?>

