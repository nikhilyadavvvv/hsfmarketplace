<?php require('model/my_products.php') ?>

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
                                <h1>My Products</h1>
                            </div><!-- /.page-title -->

                            <div class="background-white p20 mb10">

                                <div class="row">
                                    <div class="table-content table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="product-thumbnail">Image</th>
                                                    <th class="product-name">Name</th>
                                                    <th class="product-quantity">Category</th>
                                                    <th class="product-price">Price</th>
                                                    <th class="product-subtotal">Status</th>
                                                    <th class="product-remove">Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if($result){
                                                    while($row = $result -> fetch_assoc()){ ?>
                                                        <tr>
                                                            <td class="product-thumbnail"><a href="#"><img src="<?php echo $row['thumbnail']; ?>" alt="product img" /></a></td>
                                                            <td class="product-name"><a href="#"><?php echo $row['name']; ?></a>
                                                            </td>
                                                            
                                                            <td class="product-name"><a href="#"><?php echo $row['category']; ?></a></td>
                                                            
                                                            <td class="product-price"><span class="amount">£<?php echo $row['cost'] ?></span></td>

                                                            <td class="product-subtotal">
                                                                <?php if ( $row['category'] == 'approved') { ?>
                                                                    <span class="text-success">Approved</span>
                                                                <?php } else { ?>
                                                                    <span class="text-danger">Unapproved</span>
                                                                <?php } ?>

                                                            </td>
                                                            <td class="product-remove"><a href="#"><i class="icon-pencil icons"></i></a>
                                                                <a href="#"><i class="icon-trash icons"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php } } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- /.row -->
                                </div>
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