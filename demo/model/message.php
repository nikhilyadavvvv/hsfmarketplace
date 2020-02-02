<?php
    require 'db.php';
    $from = $_SESSION["user_id"];
    if(empty($from)){
        echo "login to send message";
        exit();
    }
    $to = mysqli_real_escape_string($mysqli, $_POST["to"]);
    $content = mysqli_real_escape_string($mysqli, $_POST["content"]);
    $timestamp = date('Y-m-d H:i:s');
    $product_id = mysqli_real_escape_string($mysqli, $_POST["product_id"]);
    $sql = "INSERT INTO `message` (`message_id`, `sender`, `receiver`, `timestamp`, `product_id`, `content`) VALUES (NULL, '$from', '$to', '$timestamp', '$product_id', '$content')";
    mysqli_query($mysqli, $sql);
    echo "message sent";
?>