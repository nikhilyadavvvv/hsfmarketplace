<?php
require 'db.php';
$email = mysqli_real_escape_string($mysqli,$_POST['email']);
$password = mysqli_real_escape_string($mysqli,$_POST['password']);

$json = file_get_contents('php://input');
if($json){
    $data = json_decode($json);
    var_dump($data);
}

$password = md5($password);
$flag = 0;
echo $sql = "SELECT *  FROM `user` WHERE `email` = '".$email."' AND `password` = '".$password."'";
$result = mysqli_query($mysqli, $sql);
$count = mysqli_num_rows($result);
if ($count==1) {
    while ($row = $result->fetch_assoc()) {
        echo 'valid credentials';
        $_SESSION['user_id'] = $row["user_id"];
        $_SESSION['user_image'] = $row["image"];
        $_SESSION['user_name'] = $row["firstname"];

        if ($row["is_buyer"] == 'y') {
            $_SESSION['is_buyer'] = true;
            $_SESSION['is_seller'] = false;
        } else {
            $_SESSION['is_buyer'] = false;
            $_SESSION['is_seller'] = true;
        }
        include('wishlist_sync.php');
        if (isset($_SESSION['last_url_visit']) && $_SESSION['last_url_visit'] && isset($_SESSION['last_url'])) {
            $url = $_SESSION['last_url']; 
            unset($_SESSION['last_url']);
            unset($_SESSION['last_url_visit']);
            header("Location: ../".$url); 
            exit();
        }else{
            header("Location: ../index.php");
            exit();
        }
    }
} else {
    $_SESSION['error_message'] = 'Invalid credentials.';
    header("Location: ../login.php"); 
    exit();
}
$mysqli->close();
?>