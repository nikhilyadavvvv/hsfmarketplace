<?php
require 'db.php';
$user_id  = $_SESSION['user_id'];

/*echo $user_id;
exit();*/


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
}else{
    $sql = "SELECT *  FROM `user` WHERE `user_id` = '".$user_id."'";
    $result = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($result);
    if ($count==1) {
        while ($row = $result->fetch_assoc()) {
            $image = $row["image"];
        }
    }
}

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$state = $_POST['state'];
$city = $_POST['city'];
$zip = $_POST['zip'];
$country = $_POST['country'];

$sql = "update user SET firstname = '$firstname', lastname = '$lastname', email = '$email', phone ='$phone', state = '$state', city = '$city', zip = '$zip', country = '$country', image = '$image' where user_id = $user_id";
if (mysqli_query($mysqli,$sql)) {
    //$_SESSION['error_message'] = $errors;
    header("Location: ../profile.php"); 
    exit();
} else {
    echo mysqli_error($mysqli);
}

?>