<!doctype html>
<html class="no-js" lang="en">
<head>
    <?php include('include/header_style.php')?>
</head>

<?php require('model/get_wishlist.php'); ?>

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
                                    <a class="breadcrumb-item active" href="#">Wishlist</a>
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
                <div class="row" style="min-height: 500px;">
                    <div class="contact-form-wrap mt--10">
                        <div class="col-sm-12">
                            <div class="contact-title text-center">
                                <h2 class="title__line--6">Wishlist</h2>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="wishlist-content">
                                <form action="#">
                                    <div class="wishlist-table table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="product-remove"><span class="nobr">Remove</span></th>
                                                    <th class="product-thumbnail">Image</th>
                                                    <th class="product-name"><span class="nobr">Product Name</span></th>
                                                    <th class="product-price"><span class="nobr"> Price </span></th>
                                                    <th class="product-stock-stauts"><span class="nobr"> Stock Status </span></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php if($data){
                                                    foreach($data as $row){ ?>

                                                        <tr>
                                                            <td class="product-remove"><a href="#" onclick="deleteFromWishlist('<?php echo $row['id'] ?>');">×</a></td>
                                                            <td class="product-thumbnail"><a href="product_detail.php?id=<?php echo $row['id'] ?>"><img src="<?php echo $row['image'] ?>'" alt="" /></a></td>
                                                            <td class="product-name"><a href="product_detail.php?id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></td>
                                                            <td class="product-price"><span class="amount">£<?php echo $row['cost'] ?></span></td>
                                                            <td class="product-stock-status"><span class="wishlist-in-stock"><?php echo $row['stock'] ?></span></td>
                                                        </tr>

                                                    <?php } } ?>
                                                </tbody>
                                            </table>
                                        </div>  
                                    </form>
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