<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include('include/header_style.php') ?>
</head>

<?php require('model/profile.php') ?>

<body onload="">
    <!-- Body main wrapper start -->
    <div class="wrapper">

        <?php include('include/menu.php') ?>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">

            <?php include('include/search.php') ?>

            <?php include('include/cart.php') ?>

        </div>
        <!-- End Offset Wrapper -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                    <a class="breadcrumb-item" href="index.html">Home</a>
                                    <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                    <span class="breadcrumb-item active">Profile</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Grid -->
        
        <section class="htc__product__grid bg__white ptb--50">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-lg-3">
                        <div class="sidebar">
                            <div class="widget">
                                <div class="user-photo">
                                    <a href="#">
                                        <img src="<?php echo $_SESSION['user_image'];?>" alt="User Photo">
                                    </a>
                                </div><!-- /.user-photo -->
                            </div><!-- /.widget -->


                            <div class="widget">
                                <?php include('include/profile/sidebar.php') ?>
                            </div><!-- /.widget -->

                        </div><!-- /.sidebar -->
                    </div><!-- /.col-* -->

                    <div class="col-sm-8 col-lg-9">
                        <div class="content">
                            <div class="page-title">
                                <h1>Change Password</h1>
                            </div><!-- /.page-title -->
                            <form action="model/change_password.php" method="post">

                                <?php if(isset($_SESSION['error_message'] ) && $_SESSION['error_message']!='') { ?>

                                    <div class="row">
                                        <div class="alert alert-danger col-sm-7">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><?php echo $_SESSION['error_message'];?>
                                        </div>
                                    </div>

                                    <?php 
                                //session_unset('error_message');
                                    unset($_SESSION['error_message']);
                                } ?>


                                <div class="background-white p20 mb10">
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label>Email</label>
                                            <input type="email" class="form-control" value="<?php echo $data['email'] ?>" name="email" required>
                                        </div><!-- /.form-group -->
                                    </div>
                                    
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label>Current Password</label>
                                            <input type="password" class="form-control" value="" name="password" required>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label>New Password</label>
                                            <input type="password" class="form-control" value="" name="n_password" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label>Confirm New Password</label>
                                            <input type="password" class="form-control" value="" name="c_password" required>
                                        </div><!-- /.form-group -->
                                    </div><!-- /.row -->
                                </div>


                                <div class="background-white p20 mb10 col-sm-6">
                                    <button class="btn btn-primary btn-md pull-right" type="submit">Update</button>
                                </div>

                            </form>
                        </div><!-- /.content -->
                    </div><!-- /.col-* -->
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