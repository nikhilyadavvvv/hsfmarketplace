<?php
include 'db.php';
$id = $_GET['id'];
$image_small = '';
$image_big = '';

$sql = "SELECT *  FROM `table_product` WHERE `id` = ".$id;
$result = mysqli_query($mysqli,$sql);
$product = array();
if(count($result)){
    while($row = $result -> fetch_assoc()){
        $image_big .= '<div role="tabpanel" class="tab-pane  fade in active" id="img-tab-1-0">
		<img src="'.$row["image"].'" alt="full-image">
		</div>';

		$image_small .='<li role="presentation" class="pot-small-img active">
		<a href="#img-tab-1-0" role="tab" data-toggle="tab">
		<img src="'.$row["thumbnail"].'" alt="small-image">
		</a>
		</li>';

    }
}


$sql = "SELECT * FROM `multi_images` WHERE `id` = '$id'";
$result = mysqli_query($mysqli,$sql);
if($result){
	while($row = $result -> fetch_assoc()){
		$image_big .= '<div role="tabpanel" class="tab-pane  fade in active" id="img-tab-1-1">
		<img src="'.$row["image1"].'" alt="full-image">
		</div>';
		$image_big .= '<div role="tabpanel" class="tab-pane" id="img-tab-1-2">
		<img src="'.$row["image2"].'" alt="full-image">
		</div>';
		$image_big .= '<div role="tabpanel" class="tab-pane" id="img-tab-1-3">
		<img src="'.$row["image3"].'" alt="full-image">
		</div>';


		$image_small .='<li role="presentation" class="pot-small-img active">
		<a href="#img-tab-1-1" role="tab" data-toggle="tab">
		<img src="'.$row["image1"].'" alt="small-image">
		</a>
		</li>';

		$image_small .='<li role="presentation" class="pot-small-img">
		<a href="#img-tab-1-2" role="tab" data-toggle="tab">
		<img src="'.$row["image2"].'" alt="small-image">
		</a>
		</li>';

		$image_small .='<li role="presentation" class="pot-small-img">
		<a href="#img-tab-1-3" role="tab" data-toggle="tab">
		<img src="'.$row["image3"].'" alt="small-image">
		</a>
		</li>';

	}
}

?>