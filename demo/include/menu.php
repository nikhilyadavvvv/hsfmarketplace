<!-- Start Header Style -->
<header id="htc__header" class="htc__header__area header--one">
    <div style="padding: 5px;">
        <h3 style="text-align: center;">HSF-Marketplace: WWW site for Buy/Sell for HS Fulda students, by Fulda2019_3</h3>
    </div>
    <!-- Start Mainmenu Area -->
    <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
        <div class="container">
            <div class="row">
                <div class="menumenu__container clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                        <div class="logo">
                            <a href="index.php"><img src="images/logo/4.png" alt="logo images"></a>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                        <nav class="main__menu__nav hidden-xs hidden-sm">
                            <ul class="main__menu">
                                <li class="drop"><a href="index.php">Home</a></li>
                                <li><a href="contact.php">contact</a></li>
                            </ul>
                        </nav>

                        <div class="mobile-menu clearfix visible-xs visible-sm">
                            <nav id="mobile_dropdown">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="contact.php">contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                        <div class="header__right">
                            <div class="header__search search search__open">
                                <a href="#"><i class="icon-magnifier icons"></i></a>
                            </div>

                            <?php if (!isset($_SESSION['user_id'])) { ?>
                                <div class="header__account">
                                    <a href="login.php">Login</i></a>
                                </div>
                                <div class="header__account">
                                    <a href="register.php">Register</i></a>
                                </div>
                            <?php } ?>

                            <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] !='') { ?>
                                <div class="header__account">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icons"></i><?php echo $_SESSION['user_name'] ?></a>

                                        <ul class="dropdown-menu">
                                            <li><a href="profile.php">My Profile</a></li>
                                            <li><a href="message.php">Messages</a></li>
                                            <li><a href="logout.php">Log Out</a></li>
                                        </ul>
                                    </div>
                                </div>

                            <?php } ?>

                            <div class="header__account">
                                <a class="cart__wishlist" href="wishlist.php"><i class="icon-heart icons"></i></a>
                            </div>

                            <div class="htc__shopping__cart">
                                <a class="cart__menu" href="#"><i class="icon-handbag icons"></i></a>
                                <!-- <a href="#"><span class="htc__qua">2</span></a> -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-area"></div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>
<!-- End Header Area -->



<div class="body__overlay"></div>