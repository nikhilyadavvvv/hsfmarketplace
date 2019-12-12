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
                                <h2 class="title__line--6">Log In</h2>
                            </div>
                        </div>
                        <div class="col-md-offset-4 col-sm-8 ">
                            <?php if(isset($_SESSION['error_message'] ) && $_SESSION['error_message']!='') { ?>

                                <div class="row">
                                    <div class="alert alert-danger col-sm-7">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><?php echo $_SESSION['error_message'];?>
                                    </div>
                                </div>

                                <?php 
                                session_unset('error_message');
                            } ?>
                            <form id="contact-form" action="model/auth.php" method="post">
                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <input type="email" name="email" placeholder="Your Email*">
                                    </div>
                                </div>
                                <div class="single-contact-form">
                                    <div class="contact-box name">
                                        <input type="password" name="password" placeholder="Your Password*">
                                    </div>
                                </div>
                                <div class="contact-btn">
                                    <button type="submit" class="fv-btn">log in</button><br>
                                    <div class="col-sm-12" style="padding: 10px 0px;">
                                        <a href="forgot_password.php">Forgot your Password?</a>
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