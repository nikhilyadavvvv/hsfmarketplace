
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
        <form action="model/edit_profile.php" method="post" enctype="multipart/form-data">
            <section class="htc__product__grid bg__white ptb--50">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 col-lg-3">
                            <div class="sidebar">
                                <div class="widget">
                                    <div class="user-photo">
                                        <div class="row">
                                          <div class="col-smx-2 imgUp">
                                            <div class="imagePreview"></div>
                                            <label class="btn btn-primary">
                                                Upload<input type="file" class="file" value="Upload Photo" style="width: 100%: 0px;overflow: hidden;" name="uploadedfile" id="image">
                                            </label>
                                        </div><!-- col-2 -->
                                    </div><!-- row -->
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
                                <h1>Edit Profile</h1>
                            </div><!-- /.page-title -->

                            <div class="background-white p20 mb10">
                                <h3 class="page-title">
                                    Contact Information
                                </h3>

                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label>Firstname</label>
                                        <input type="text" class="form-control" value="<?php echo $data['firstname'];?>" name="firstname" required>
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-6">
                                        <label>Lastname</label>
                                        <input type="text" class="form-control" value="<?php echo $data['lastname'];?>" name="lastname" required>
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-6">
                                        <label>E-mail</label>
                                        <input type="text" class="form-control" value="<?php echo $data['email'];?>" name="email" required>
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-6">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" value="<?php echo $data['phone'];?>" name="phone" required>
                                    </div><!-- /.form-group -->
                                </div><!-- /.row -->
                            </div>

                            <div class="background-white p20 mb10">
                                <h3 class="page-title">
                                    Address
                                </h3>

                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label>State</label>
                                        <input type="text" class="form-control" value="<?php echo $data['state'];?>" name="state" required>
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-6">
                                        <label>City</label>
                                        <input type="text" class="form-control" value="<?php echo $data['city'];?>" name="city" required>
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-6">
                                        <label>ZIP</label>
                                        <input type="text" class="form-control" value="<?php echo $data['zip'];?>" name="zip" required>
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-6">
                                        <label>Country</label>
                                        <input type="text" class="form-control" value="<?php echo $data['country'];?>" name="country" required>
                                    </div><!-- /.form-group -->

                                </div><!-- /.row -->
                            </div>

                            <div class="background-white p20 mb10">
                                <button class="btn btn-primary btn-md pull-right" type="submit">Save</button>
                            </div>

                        </div><!-- /.content -->
                    </div><!-- /.col-* -->
                </div>
            </div>
        </section>
    </form>
    <!-- End Product Description -->
    <?php include('include/footer.php') ?>
    <!-- End Footer Style -->
</div>

<?php include('include/footer_js.php') ?>

</body>

</html>