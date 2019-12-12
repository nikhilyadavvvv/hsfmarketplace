<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include('include/header_style.php') ?>
</head>

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
                                        <div class="row">
                                          <div class="col-smx-2 imgUp">
                                            <div class="imagePreview"></div>
                                                <label class="btn btn-primary">
                                                Upload<input type="file" class="file" value="Upload Photo" style="width: 100%: 0px;overflow: hidden;">
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

                                    <a href="#" class="btn btn-primary btn-xs pull-right">Save</a>
                                </h3>

                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label>Name</label>
                                        <input type="text" class="form-control" value="John">
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-6">
                                        <label>Surname</label>
                                        <input type="text" class="form-control" value="Doe">
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-6">
                                        <label>E-mail</label>
                                        <input type="text" class="form-control" value="sample@example.com">
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-6">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" value="123-456-789">
                                    </div><!-- /.form-group -->
                                </div><!-- /.row -->
                            </div>

                            <div class="background-white p20 mb10">
                                <h3 class="page-title">
                                    Address

                                    <a href="#" class="btn btn-primary btn-xs pull-right">Save</a>
                                </h3>

                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label>State</label>
                                        <input type="text" class="form-control" value="New York">
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-6">
                                        <label>City</label>
                                        <input type="text" class="form-control" value="New York City">
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-6">
                                        <label>Street</label>
                                        <input type="text" class="form-control" value="Everton Eve">
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-3">
                                        <label>House Number</label>
                                        <input type="text" class="form-control" value="123">
                                    </div><!-- /.form-group -->

                                    <div class="form-group col-sm-3">
                                        <label>ZIP</label>
                                        <input type="text" class="form-control" value="12345">
                                    </div><!-- /.form-group -->
                                </div><!-- /.row -->
                            </div>

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