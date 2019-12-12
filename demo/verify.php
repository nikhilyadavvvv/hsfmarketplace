<!doctype html>
<html class="no-js" lang="en">
<head>
    <?php include('include/header_style.php')?>
    <script src="js/site/funcitons.js"></script>
</head>

<body onload="loadProducts()">
    <!-- Body main wrapper start -->
    <div class="wrapper">
        <?php include('include/menu.php')?>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <?php include('include/search.php')?>
            
            <?php include('include/cart.php')?>

        </div>
        
        <!-- start PHP code -->
        <?php
         
            mysql_connect("localhost", "tutorial", "password") or die(mysql_error()); // Connect to database server(localhost) with username and password.
            mysql_select_db("registrations") or die(mysql_error()); // Select registration database.
            
            $host = "database-1.cdatrlmmreql.us-east-1.rds.amazonaws.com";
            $user = "admin";
            $psw = "password";
            $databse = "GDSD_schema";
            $mysqli = mysqli_connect($host,$user,$psw,$databse);
            
            if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['verification_code']) && !empty($_GET['verification_code'])){
                // Verify data
                $email = mysql_escape_string($_GET['email']); // Set email variable
                $verification_code = mysql_escape_string($_GET['verification_code']); // Set verification_code variable
                
                $search = "SELECT initial_email, verification_code, status FROM user WHERE initial_email='".$email."' AND verification_code='".$verification_code."' AND status='0'";
                msqli_query($mysqli,$search);
                
                $match  = mysql_num_rows($search);
                
                // Display how many matches have been found -> remove this when done with testing ;)
                echo $match;
                echo "Remove above match message once tested successfully";
                
                if($match > 0){
                    // We have a match, activate the account(add initial_email to email && set status as 1 )
                    $update = "UPDATE user SET email = '$email', status='1' WHERE initial_email='".$email."' AND verification_code='".$verification_code."' AND status='0'";
                    msqli_query($mysqli,$update);
                    echo "Your account has been activated. You can login now !!";
                }else{
                    // No match -> invalid url or account has already been activated.
                    echo "The url is either invalid or you already have activated your account";
                }
                
            }else{
                // Invalid approach
                echo "Invalid approach, please use the link that has been send to your email";
            }
             
        ?>
        <!-- stop PHP Code -->

        <?php include('include/footer.php') ?>
        <!-- End Footer Style -->
    </div>

    <?php include('include/footer_js.php') ?>    

</body>

</html>
