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
        <section class="htc__category__area ptb--50">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">New Arrivals</h2>
                        </div>
                    </div>
                </div>
                <div class="htc__product__container">
                    <div class="row">
                        <div class="product__list clearfix mt--30" id="products_container">
                                                        
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Category Area -->

        <?php include('include/footer.php') ?>
        <!-- End Footer Style -->
    </div>

    <?php include('include/footer_js.php') ?>    

</body>

</html>