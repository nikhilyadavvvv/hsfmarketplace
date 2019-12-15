<?php
include 'db.php';
$id = $_GET['id'];
$sql = "SELECT * FROM `multi_images` WHERE `id` = '$id'";
$result = mysqli_query($mysqli,$sql);
$image_small = '';
$image_big = '';

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