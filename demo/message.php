<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include('include/header_style.php') ?>
</head>

<body onload="loadCart()">
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

                            <?php include('include/flash_messages.php') ?>

                            <div class="page-title">
                                <h1>Message</h1>
                            </div><!-- /.page-title -->

                            <div class="background-white mb10">

                                <div class="messaging">
                                    <div class="inbox_msg">
                                        <div class="inbox_people">
                                            <div class="inbox_chat">
                                                <div class="chat_list active_chat">
                                                    <div class="chat_people">
                                                        <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                                        <div class="chat_ib">
                                                            <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                                            <p>Test, which is a new approach to have all solutions 
                                                            astrology under one roof.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat_list">
                                                    <div class="chat_people">
                                                        <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                                        <div class="chat_ib">
                                                            <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                                            <p>Test, which is a new approach to have all solutions 
                                                            astrology under one roof.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat_list">
                                                    <div class="chat_people">
                                                        <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                                        <div class="chat_ib">
                                                            <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                                            <p>Test, which is a new approach to have all solutions 
                                                            astrology under one roof.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat_list">
                                                    <div class="chat_people">
                                                        <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                                        <div class="chat_ib">
                                                            <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                                            <p>Test, which is a new approach to have all solutions 
                                                            astrology under one roof.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat_list">
                                                    <div class="chat_people">
                                                        <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                                        <div class="chat_ib">
                                                            <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                                            <p>Test, which is a new approach to have all solutions 
                                                            astrology under one roof.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat_list">
                                                    <div class="chat_people">
                                                        <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                                        <div class="chat_ib">
                                                            <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                                            <p>Test, which is a new approach to have all solutions 
                                                            astrology under one roof.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat_list">
                                                    <div class="chat_people">
                                                        <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                                        <div class="chat_ib">
                                                            <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                                                            <p>Test, which is a new approach to have all solutions 
                                                            astrology under one roof.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mesgs">
                                            <div class="msg_history">
                                                <div class="incoming_msg">
                                                    <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                                    <div class="received_msg">
                                                        <div class="received_withd_msg">
                                                            <p>Test which is a new approach to have all
                                                            solutions</p>
                                                            <span class="time_date"> 11:01 AM    |    June 9</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="outgoing_msg">
                                                        <div class="sent_msg">
                                                            <p>Test which is a new approach to have all
                                                            solutions</p>
                                                            <span class="time_date"> 11:01 AM    |    June 9</span> </div>
                                                        </div>
                                                        
                                                        <div class="incoming_msg">
                                                            <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                                            <div class="received_msg">
                                                                <div class="received_withd_msg">
                                                                    <p>We work directly with our designers and suppliers,
                                                                        and sell direct to you, which means quality, exclusive
                                                                    products, at a price anyone can afford.</p>
                                                                    <span class="time_date"> 11:01 AM    |    Today</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="type_msg">
                                                            <div class="input_msg_write">
                                                                <input type="text" class="write_msg" placeholder="Type a message" />
                                                                <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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