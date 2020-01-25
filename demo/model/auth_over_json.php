<?php
require 'db.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$verifier = mysqli_real_escape_string($mysqli, $data->verify);
echo "UP5";


$sql = "SELECT *  FROM `user` WHERE `verification_code` = '".$verifier."'";
$result = mysqli_query($mysqli, $sql);
$count = mysqli_num_rows($result);
if ($count==1) {
    while ($row = $result->fetch_assoc()) {
        echo 'valid credentials';
    }
} else {
    $_SESSION['error_message'] = 'Invalid credentials.';
    header("Location: ../login.php"); 
    exit();
}
$mysqli->close();
