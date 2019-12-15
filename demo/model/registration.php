<?php
require 'db.php';

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



$allowed = [
    'informatik.hs-fulda.de',
    'verw.hs-fulda.de',
];




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

if (!empty($errors)) {
    $_SESSION['error_message'] = $errors;
    header("Location: ../register.php"); 
    exit();
}
//checking datbase if same email id exists for a user
$check_email_query = "SELECT * FROM user where email ='$email' LIMIT 1 ";

$result = mysqli_query($mysqli, $check_email_query);
$emailId = mysqli_fetch_assoc($result);


//check if email address is valid
if (!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)) {
    $msg = 'The email you have entered is invalid, please try again.';
    echo $msg;
    array_push($errors, $msg);
    $_SESSION['error_message'] = $errors;
    header("Location: ../register.php"); 
    exit();
} else {
    if ($emailId) {
        if ($emailId['email'] === $email) {
            array_push($errors, "Email already registered");
        } else {
            $msg = 'Your account has been made, <br /> please verify it by verification code sent to your email.';
            array_push($errors, $msg);
            $_SESSION['error_message'] = $errors;
            header("Location: ../register.php"); 
            exit();
            // once the verification code is checked out, the initial_email will saved into email column in database
        }
    }
}



//Register the user if no error
if (count($errors) == 0) {
    $password = md5($password);
    $verification_code = rand(111, 999);
    
    //checking is the user is seller or a buyer
    if ($usertype == '0') {
        $is_buyer = "y";
        $is_seller = "n";
    } else {
        $is_buyer = "n";
        $is_seller = "y";
    }
    
    // inserting values into user table
    if (filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        // Separate string by @ characters (there should be only one)
        $parts = explode('@', $email);
    
        // Remove and return the last part, which should be the domain
        $domain = array_pop($parts);
    
        // Check if the domain is in our list
        if ( ! in_array($domain, $allowed))
        {
            $msg = "only use the email provided by the university";
        }
        else{
            $insert_user_query = "INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `password`, `initial_email`, `city`, `state`, `zip`, `email`, `verification_code`, `phone`, `country`, `is_buyer`, `is_seller`, `status`, `image`, `rewards`) VALUES (NULL, '$firstname', '$lastname', '$password', '', '$city', '$state', '$zip', '$email', '0', '$phone', '$country', '$is_buyer', '$is_seller', '0', 'https://via.placeholder.com/500x500?text=No_Image', '0')";
            mysqli_query($mysqli, $insert_user_query);
            $msg = "Thanks for signing up!
    Your account has been created, Login to continue shopping";
        }
    }




    
    
    
    //Email verification
    $to      = $email; // Send email to our user
    $subject = 'Signup | Verification'; // Give the email a subject
    
    $message = '

    Thanks for signing up!
    Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

    ------------------------
    Username: '.$email.'
    Please click this link to activate your account:
    http://hs-marketplace.herokuapp.com/demo/verify.php?email='.$email.'&verification_code='.$verification_code.'
    ------------------------
    
    
    
'; // Our message above including the link

    $headers = 'From:noreply@hsfmarketplace.com' . "\r\n"; // Set from headers
    mail($to, $subject, $message, $headers); // Send our email
    
    
    /*$msg = "Thanks for signing up!
    Your account has been created, you can login with the following credentials after you have activated your account. Please check your email.";*/
    
    array_push($errors, $msg);
    $_SESSION['error_message'] = $errors;
    header("Location: ../register.php"); 
    exit();
    
}
