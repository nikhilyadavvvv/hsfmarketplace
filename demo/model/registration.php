<?php
require 'db.php';
error_reporting(1);

session_start();

//initialising variables
$firstname = "";
$lastname = "";
$email = "";
$password = "";
$city = "";
$state = "";
$zip = "";
$country = "";
$phone = "";
$usertype = "";

$verification_code = "";

$is_buyer = "y";
$is_seller = "n";

$errors = array();

//registering user
$firstname = mysqli_real_escape_string($mysqli, $_POST['firstname']);
$lastname = mysqli_real_escape_string($mysqli, $_POST['lastname']);
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$password = mysqli_real_escape_string($mysqli, $_POST['password']);
$city = mysqli_real_escape_string($mysqli, $_POST['city']);
$state = mysqli_real_escape_string($mysqli, $_POST['state']);
$zip = mysqli_real_escape_string($mysqli, $_POST['zip']);
$country = mysqli_real_escape_string($mysqli, $_POST['country']);
$phone = mysqli_real_escape_string($mysqli, $_POST['phone']);
$usertype = mysqli_real_escape_string($mysqli, $_POST['usertype']);

//form Validation

if (empty($firstname)) {
    array_push($errors, "First name is required");
}
if (empty($lastname)) {
    array_push($errors, "last name is required");
}
if (empty($email)) {
    array_push($errors, "email is required");
}
if (empty($password)) {
    array_push($errors, "password is required");
}
if (empty($city)) {
    array_push($errors, "city is required");
}
if (empty($state)) {
    array_push($errors, "state is required");
}
if (empty($zip)) {
    array_push($errors, "zip is required");
}
if (empty($country)) {
    array_push($errors, "country is required");
}
if (empty($phone)) {
    array_push($errors, "phone is required");
}
if (empty($usertype)) {
    array_push($errors, "usertype is required");
}

//checking datbase if same email id exists for a user
$check_email_query = "SELECT * FROM user where email ='$email' LIMIT 1 ";

$result = mysqli_query($mysqli, $check_email_query);
$emailId = mysqli_fetch_assoc($result);


//check if email address is valid
if (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)) {
    $msg = 'The email you have entered is invalid, please try again.';
    array_push($errors, $msg);
} else {
    if ($emailId) {
        if ($emailId['email'] === $email) {
            array_push($errors, "Email already registered");
        } else {
            $msg = 'Your account has been made, <br /> please verify it by verification code sent to your email.';
            array_push($errors, $msg);
            // once the verification code is cheked out, the initial_email will saved into email column in database
        }
    }
}



//Register the user if no error
if (count($errors) == 0) {
    $password = md5($password);
    $verification_code = rand(111, 999);

    //checking is the user is seller or a buyer
    if ('$usertype' == 'I am a Buyer') {
        $is_buyer = "y";
        $is_seller = "n";
    } else {
        $is_buyer = "n";
        $is_seller = "y";
    }

    // inserting values into user table
    $insert_user_query = "INSERT INTO user (`firstname`, `lastname`, `password`, `initial_email`, `city`, `state`, `zip`, `verification_code`, `phone`, `country`, `is_buyer`, `is_seller`) VALUES('$firstname', '$lastname', '$password', '$email', '$city', '$state', '$zip', '$verification_code', '$phone', '$country', '$is_buyer', '$is_seller')";
    mysqli_query($mysqli, $insert_user_query);
}