<!doctype html>
<html class="no-js" lang="en">
<head>
    <?php include('include/header_style.php')?>
    <?php require('model/get_category.php') ?>
    <script src="js/site/funcitons.js"></script>

</head>

<body onload="loadProducts(); loadCart()">
    <!-- Body main wrapper start -->
    <div class="wrapper">
        <?php include('include/menu.php')?>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <?php include('include/search.php')?>
            
            <?php include('include/cart.php')?>

        </div>

        <!-- Explore -->
        <div class="container">

            <div class="col-sm-12">
                <div class="row" style="margin-top: 20px;">
                    <div class="col-sm-2">
                        <div class="category_box">
                            <a href="product_search.php?s=&c=&f=" onclick="search_category('0')">All</a>
                        </div>
                    </div>
                    <?php while($row = $categories -> fetch_assoc()){ ?>
                        <div class="col-sm-2">
                            <div class="category_box">
                                <a class="" href="<?php echo "product_search.php?s=&c=".$row["category_id"]; ?>"><?php echo $row["category_name"]; ?></a>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
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