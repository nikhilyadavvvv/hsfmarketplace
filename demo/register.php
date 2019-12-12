<!doctype html>
<html class="no-js" lang="en">
<head>
    <?php include('include/header_style.php')?>
</head>

<body>

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <?php include('include/menu.php')?>

        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <?php include('include/search.php')?>
            
            <?php include('include/cart.php')?>

        </div>
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                    <a class="breadcrumb-item" href="index.php">Home</a>
                                    <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                    <a class="breadcrumb-item active" href="product-grid.html">Login</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->

        <section class="htc__contact__area ptb--30 bg__white">
            <div class="container">                
                <div class="row">
                    <div class="contact-form-wrap mt--10">
                        <div class="col-sm-12">
                            <div class="contact-title text-center">
                                <h2 class="title__line--6">Registration</h2>
                            </div>
                        </div>
                        <div class="col-md-offset-2 col-sm-8 ">

                            <?php if(isset($_SESSION['error_message'] ) && $_SESSION['error_message']!='') { ?>

                                <div class="row">
                                    <div class="alert alert-info col-sm-12">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>


                                        <?php
                                        foreach($_SESSION['error_message'] as $error) {
                                            echo $error, '<br>';
                                        }
                                        session_unset('error_message');
                                        ?>
                                    </div>
                                </div>

                                <?php 
                                session_unset('error_message');
                            } ?>

                            <form id="contact-form" action="model/registration.php" method="post">
                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <input type="text" name = "firstname" placeholder="Firstname*" required>
                                        <input type="text" name = "lastname" placeholder="Lastname*" required>
                                    </div>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <input type="text" name="email" placeholder="Email*" required>
                                        <input type="password" name="password" placeholder="Password*" required>
                                    </div>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <input type="text" name="city" placeholder="City" required>
                                        <input type="text" name="state" placeholder="State" required>
                                    </div>
                                </div>

                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <input type="text" name="zip" placeholder="ZIP" required>
                                        <input type="text" name="country" placeholder="Country" required>
                                    </div>
                                </div>

                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <input type="number" name="phone" placeholder="Phone" required>
                                        <select name="usertype" id="usertype"required>
                                            <option value="0" selected>I am a Buyer</option>
                                            <option value="1">I am a Seller</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="contact-btn">
                                    <button type="submit" name="submit" class="fv-btn">Registration</button><br>
                                    <div class="col-sm-12" style="padding: 10px 0px;">
                                        <a href="login.php">Already have an account? Sign in</a>
                                    </div>
                                </div>
                            </form>
                            <div class="form-output">
                                <p class="form-messege"></p>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </section>

        <!-- End Product Description -->
        <?php include('include/footer.php') ?>
        <!-- End Footer Style -->
    </div>

    <?php include('include/footer_js.php') ?>    

</body>

</html>
