<!doctype html>
<html class="no-js" lang="en">
<head>
    <?php include('include/header_style.php')?>
    <script src="js/site/product_detail.js"></script>
</head>

<body onload="loadProducts(); loadCart();">

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
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <a class="breadcrumb-item" href="product-grid.html">Products</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Jeans shirt</span>
                              </nav>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- End Bradcaump area -->
      <!-- Start Product Details Area -->
      <section class="htc__product__details bg__white ptb--100">
        <!-- Start Product Details Top -->
        <div class="htc__product__details__top">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                        <div class="htc__product__details__tab__content">
                            <!-- Start Product Big Images -->
                            <div class="product__big__images">
                                <div class="portfolio-full-image tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                        <img src="" alt="full-image" id="product_img_big">
                                    </div>
                                </div>
                            </div>
                            <!-- End Product Big Images -->
                            <!-- Start Small images -->
                            <ul class="product__small__images" role="tablist">
                                <li role="presentation" class="pot-small-img active">
                                    <a href="#img-tab-1" role="tab" data-toggle="tab">
                                        <img src="" alt="small-image" id="product_img_small" style="width: 80px;">
                                    </a>
                                </li>
                            </ul>
                            <!-- End Small images -->
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                        <div class="ht__product__dtl">
                            <h2 id="product_name"></h2>
                            <ul  class="pro__prize">
                                <li>Price: <span id="product_price"></span></li>
                            </ul>
                            <ul  class="pro__prize">
                                <li>Seller: <span id="product_seller"></span></li>
                            </ul>
                            <p class="pro__info" id="product_info"></p>
                            <div class="ht__pro__desc">
                                <div class="sin__desc">
                                    <p><span>Availability:</span> <span id="product_stock"></span> In Stock</p>
                                </div>
                            </div>

                            <div class="sin__desc align--left">
                                <p><span>Quantity: </span></p>
                                <input type="number" name="" class="quantity__input">
                            </div>

                            <div class="sin__desc product__share__link">
                                <ul class="pro__share">
                                    <li><a onclick="addToCart(this.value)" id="addToCart" target="_blank"><i class="fa fa-cart-plus icons"></i> Add to Cart</a></li>

                                    <li><a href="#" data-toggle="modal" data-target="#messageModal"><i class="fa fa-envelope-square icons"></i> Message </a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <!-- End Product Details Top -->
    </section>
    <!-- End Product Details Area -->
    <!-- Start Product Description -->
    <section class="htc__produc__decription bg__white">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <!-- Start List And Grid View -->
                    <ul class="pro__details__tab" role="tablist">
                        <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">description</a></li>
                    </ul>
                    <!-- End List And Grid View -->
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="ht__pro__details__content">
                        <!-- Start Single Content -->
                        <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                            <div class="pro__tab__content__inner" id="product_description">
                            </div>
                        </div>
                        <!-- End Single Content -->

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

<div id="messageModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Message to Seller</h4>
    </div>
    <form action="model/message.php" method="POST">
    
    <div class="modal-body" style="padding: 5px;">
    <input type="text" name="from" value="" >
    <input type="text" name="to" value="" id="toSeller">
        <textarea class="form-group margin-0" placeholder="Type your message here..."></textarea>
    </div>
    <div class="modal-footer" style="padding: 5px;">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Send Message</button>
    </div>
    </form>
</div>

</div>
</div>  

</body>

</html>