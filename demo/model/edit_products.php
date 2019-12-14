
<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}

    $seller  = $_SESSION['user_id']; //uncomment finally
    $product_id  = $_POST['product_id']; //uncomment finally
    //$seller  = 202; //delete when final
    $filename  = $_FILES['uploadedfile']['tmp_name'];
    
    if (!empty($filename)) {
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
        # code...
    }else{
        $image = $_POST['image'];
        $thumbnail = $_POST['thumbnail'];
        $sql = "SELECT *  FROM `table_product` WHERE `id` = ".$product_id;
        $result = mysqli_query($mysqli,$sql);
        if(count($result)){
            while($row = $result -> fetch_assoc()){                
                $image = $row['image'];
                $thumbnail = $row['thumbnail'];
            }
        }


    }
    


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

   $sql = "update `table_product` set `sku` = '$sku', `name` = '$name', `cost` = '$cost', `category` = '$category', `category_id` = '$category_id', `image` = '$image', `thumbnail` = '$thumbnail', `description` = '$description', `stock` = '$stock' WHERE `id` = '$product_id' and  `seller` = '$seller'";

   if (mysqli_query($mysqli,$sql)) {
    //$_SESSION['error_message'] = $errors;
    $_SESSION['success_message'] = 'Product updated successfully.';
    header("Location: ../my_products.php"); 
    exit();
} else {
    echo mysqli_error($mysqli);
}
?>