<?php
include 'db.php';
$id = $_GET['id'];
$sql = "SELECT * FROM `multi_images` WHERE `id` = '$id'";
$result = mysqli_query($mysqli,$sql);
if($result){
    while($row = $result -> fetch_assoc()){
        echo '<ul class="product__small__images" role="tablist">
        <li role="presentation" class="pot-small-img">
            <a href="#img-tab-2" role="tab" data-toggle="tab">
                <img src="'.$row["image1"].'" alt="small-image" id="product_img_small" style="width: 80px;">
            </a>
        </li>
    </ul>';
    echo '<ul class="product__small__images" role="tablist">
        <li role="presentation" class="pot-small-img">
            <a href="#img-tab-3" role="tab" data-toggle="tab">
                <img src="'.$row["image2"].'" alt="small-image" id="product_img_small" style="width: 80px;">
            </a>
        </li>
    </ul>';
    echo '<ul class="product__small__images" role="tablist">
        <li role="presentation" class="pot-small-img">
            <a href="#img-tab-4" role="tab" data-toggle="tab">
                <img src="'.$row["image3"].'" alt="small-image" id="product_img_small" style="width: 80px;">
            </a>
        </li>
    </ul>';
    }
}
?>