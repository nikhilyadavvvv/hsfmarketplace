
<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}

    $seller  = $_SESSION['user_id']; //uncomment finally
    //$seller  = 202; //delete when final
    $filename  = $_FILES['uploadedfile']['tmp_name'];

    if (filesize($filename) <= 2097152){
        $_SESSION['error_message'] = 'Product images to large to upload. MAX-2MB';
        header("Location: ../add_products.php"); 
        exit();
    }

    $handle    = fopen($filename, "r");
    $data      = fread($handle, filesize($filename));
    $POST_DATA = array(
      'image' => base64_encode($data)
  );
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://api.imgbb.com/1/upload?key=145ffb74f542dd121e504d6e5d699236');
    curl_setopt($curl, CURLOPT_TIMEOUT, 30);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $POST_DATA);
    $response = curl_exec($curl);
    curl_close ($curl);
    $response = json_decode($response,true);
    //print("<pre>".print_r($response,true)."</pre>");
    $image = $response['data']['url'];
    $thumbnail = $response['data']['display_url'];

    $name = $_POST['name'];
    $cost = $_POST['cost'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];


    $category_id = $_POST['category'];
    $category = "";
    $sku = "";
    $quantity_sold = 0;
    $status = "unapproved";
    require 'db.php';
    $sql = "SELECT *  FROM `product_category` WHERE `category_id` = $category_id";
    $result = mysqli_query($mysqli,$sql);

    if($result){
        while($row = $result -> fetch_assoc()){
         $category = $row["category_name"];
         $sku = $row["sku"];
     }
 }

 $sql = "INSERT INTO `table_product` (`id`, `sku`, `name`, `cost`, `category`, `category_id`, `image`, `thumbnail`, `description`, `stock`, `seller`,`rating`,`quantity_sold`,`status`) VALUES 
 (NULL, '$sku', '$name', '$cost', '$category', '$category_id', '$image', '$thumbnail', '$description', '$stock', '$seller', '0', '0', '$status')";
/* mysqli_query($mysqli,$sql);
echo 'product inserted';*/

if (mysqli_query($mysqli,$sql)) {
    //$_SESSION['error_message'] = $errors;
    $_SESSION['success_message'] = 'Product added successfully.';
    header("Location: ../my_products.php"); 
    exit();
} else {
    echo mysqli_error($mysqli);
}
?>