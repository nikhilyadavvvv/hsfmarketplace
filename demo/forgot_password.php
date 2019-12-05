<!doctype html>
<html class="no-js" lang="en">
<head>
    <?php include('include/header_style.php')?>
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
                                  <span class="breadcrumb-item active">Forgot Password</span>
                              </nav>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- End Bradcaump area -->
      <!-- Start Contact Area -->
      <section class="htc__contact__area ptb--100 bg__white">
        <div class="container">
            <div class="row">
                <div class=" col-xs-12">
                    <div class="container">
                        <div class="col-sm-12">
                            <div class="contact-title text-center">
                                <h2 class="title__line--6">Forgot Password</h2>
                            </div>
                        </div>

                        <div class="col-md-6 col-md-offset-3 panel-style">
                          <div class="panel panel-default">

                           <div class="panel-body">
                               <form action="#" method="post">
                                  <div class="alert alert-danger">
                                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                     <strong>Info</strong><br> Enter your valid email before procced to password reset.
                                 </div>
                                 <div class="form-group">
                                     <label for="email">Email</label>
                                     <input type="email" name="email" id="email" class="form-control"  required="required">
                                 </div>
                                 <div class="form-group">
                                     <button type="submit" class="btn fr__btn btn-block">
                                         <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
                                     Submit</button>
                                 </div>
                             </form>	
                         </div>
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