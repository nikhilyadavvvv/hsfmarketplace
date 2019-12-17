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

    $_SESSION['user_image'] = $image;

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

$firstname = mysqli_real_escape_string($mysqli, $_POST['firstname']);
$lastname = mysqli_real_escape_string($mysqli, $_POST['lastname']);
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$phone = mysqli_real_escape_string($mysqli, $_POST['phone']);
$state = mysqli_real_escape_string($mysqli, $_POST['state']);
$city = mysqli_real_escape_string($mysqli, $_POST['city']);
$zip = mysqli_real_escape_string($mysqli, $_POST['zip']);
$country = mysqli_real_escape_string($mysqli, $_POST['country']);

$sql = "update user SET firstname = '$firstname', lastname = '$lastname', email = '$email', phone ='$phone', state = '$state', city = '$city', zip = '$zip', country = '$country', image = '$image' where user_id = $user_id";
if (mysqli_query($mysqli,$sql)) {
    
    $_SESSION['user_name'] = $firstname;
    $_SESSION['success_message'] = 'Profile information updated successfully.';
    header("Location: ../profile.php"); 
    exit();
} else {
    echo mysqli_error($mysqli);
}

?>