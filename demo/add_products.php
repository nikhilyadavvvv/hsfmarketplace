
<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include('include/header_style.php') ?>
</head>

<?php require('model/get_category.php') ?>

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
                                <h1>Add Product</h1>
                            </div><!-- /.page-title -->
                            <?php include('include/flash_messages.php') ?>
                            <form action="model/create_product.php" method="post" enctype="multipart/form-data">
                                <div class="background-white p20 mb10">

                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label>Name</label>
                                            <input type="text" class="form-control" value="" name="name" required>
                                        </div><!-- /.form-group -->

                                        <div class="form-group col-sm-6">
                                            <label>Price</label>
                                            <input type="text" class="form-control" value="" name="cost" required>
                                        </div><!-- /.form-group -->

                                        <div class="form-group col-sm-6">
                                            <label>Category</label>
                                            <select class="form-control" name="category">
                                                <option value="">Select</option>
                                                <?php while($row = $categories -> fetch_assoc()){ ?>
                                                    <option value="<?php echo $row["category_id"]; ?>"><?php echo $row["category_name"]; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div><!-- /.form-group -->

                                        <div class="form-group col-sm-6">
                                            <label>Stock</label>
                                            <input type="number" class="form-control" value="" name="stock" required>
                                        </div><!-- /.form-group -->

                                        <div class="form-group col-sm-6">
                                            <label>Image</label>
                                            <input type="file" class="form-control" value="" name="uploadedfile" required>
                                        </div><!-- /.form-group -->

                                        <div class="form-group col-sm-6">
                                            <label>Image 2</label>
                                            <input type="file" class="form-control" value="" name="uploadedfile1" required>
                                        </div><!-- /.form-group -->

                                        <div class="form-group col-sm-6">
                                            <label>Image 3</label>
                                            <input type="file" class="form-control" value="" name="uploadedfile2" required>
                                        </div><!-- /.form-group -->

                                        <div class="form-group col-sm-6">
                                            <label>Image 4</label>
                                            <input type="file" class="form-control" value="" name="uploadedfile3" required>
                                        </div><!-- /.form-group -->

                                        <div class="form-group col-sm-6">
                                            <label>Description</label>
                                            <textarea class="form-control" name="description" required></textarea>
                                        </div><!-- /.form-group -->
                                    </div><!-- /.row -->
                                </div>


                                <div class="background-white p20 mb10">
                                    <button class="btn btn-primary btn-md pull-right" type="submit">Save</button>
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