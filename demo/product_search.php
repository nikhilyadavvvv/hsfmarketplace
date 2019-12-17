<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include('include/header_style.php') ?>
</head>

<?php require('model/get_category.php') ?>

<body onload="loadProducts(''); loadCart();">
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
                                    <a class="breadcrumb-item" href="index.php">Home</a>
                                    <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                    <span class="breadcrumb-item active">Products</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Grid -->
        <section class="htc__product__grid bg__white ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-lg-push-3 col-md-9 col-md-push-3 col-sm-12 col-xs-12">
                        <div class="htc__product__rightidebar">

                            <div class="htc__grid__top">
                                <div class="htc__select__option">
                                    <select class="ht__select" onchange="search_category(<?php if(!empty($_GET['c'])){echo $_GET['c'];} else {echo '';} ?>)" id="filter">
                                        <option value="">Sort By</option>
                                        <option value="popularity">Popularity</option>
                                        <option value="rating">Average rating</option>
                                        <option value="newness">Newness</option>
                                        <option value="l2h">Price Low to High</option>
                                        <option value="h2l">Price High to Low</option>
                                    </select>
                                    <!-- <select class="ht__select">
                                    <option>Show by</option>
                                    <option>Sort by popularity</option>
                                    <option>Sort by average rating</option>
                                    <option>Sort by newness</option>
                                </select> -->
                                </div>
                            </div>

                            <!-- Start Product View -->
                            <div class="row">
                                <div class="shop__grid__view__wrap">
                                    <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                        <div id="products_container">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Product View -->
                        </div>
                    </div>
                    <div class="col-lg-3 col-lg-pull-9 col-md-3 col-md-pull-9 col-sm-12 col-xs-12 smt-40 xmt-40">
                        <div class="htc__product__leftsidebar">

                            <!-- Start Category Area -->
                            <div class="htc__category">
                                <h4 class="title__line--4">categories</h4>


                                <ul class="ht__cat__list">
                                    <li class="active"><a href="#products_container" onclick="search_category('0')">All</a></li>
                                    <?php while ($row = $categories->fetch_assoc()) {?>
                                        <li><a  onclick="search_category('<?php echo $row["category_id"];?>')">
                                        <?php echo $row["category_name"];?></a></li>
                                    <?php }?>
                                </ul>




                            </div>
                            <!-- End Category Area -->

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

    <script src="js/site/searched_product.js"></script>

</body>

</html>