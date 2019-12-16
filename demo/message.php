<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include('include/header_style.php');
    error_reporting(0);
    ?>
     <script src="js/site/message.js"></script>
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
                                    <a class="breadcrumb-item" href="index.php">Home</a>
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
                    <!-- message table -->
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">S.N.</th>
                                    <th class="product-name">SENDER</th>
                                    <th class="product-quantity">PRODUCT</th>
                                    <th class="product-price">MESSAGE</th>
                                    <th class="product-subtotal">TIME</th>
                                    <th class="product-remove">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- MESSAGE -->
                                <?php
                                require 'model/db.php';
                                $i = 0;
                                $user_id = $_SESSION['user_id'];
                                $sql = "SELECT *  FROM `message` WHERE `receiver` = $user_id ORDER BY `message`.`message_id` DESC";
                                $result = mysqli_query($mysqli, $sql);
                                if ($result) {
                                    while ($row = $result->fetch_assoc()) {
                                        $i++;
                                        $sender = $row['sender'];
                                        $content = $row['content'];
                                        $timestamp = $row['timestamp'];
                                        $product_id = $row['product_id'];
                                        $product_name = "";

                                        $sql2 = "SELECT *  FROM `user` WHERE `user_id` = $sender";
                                        $result2 = mysqli_query($mysqli, $sql2);
                                        while ($row2 = $result2->fetch_assoc()) {
                                            echo $sender_name = $row2["firstname"];
                                        }

                                        $sql3 = "SELECT *  FROM `table_product` WHERE `id` = $product_id";
                                        $result3 = mysqli_query($mysqli, $sql3);
                                        while ($row3 = $result3->fetch_assoc()) {
                                            $product_name = $row3["name"];
                                        }
                                        ?>
                                        <tr>
                                            <td class="product-name"><?php echo $i; ?></td>
                                            <td class="product-name"><?php echo $sender_name; ?></td>
                                            <td class="product-name"><a href="product_detail.php?id=<?php echo $product_id; ?>"><?php echo $product_name; ?></a></td>
                                            <td class="product-name"><?php echo $content; ?></td>
                                            <td class="product-name"><?php echo $timestamp; ?></td>

                                            <td class="product-remove">
                                                <a href="#" data-toggle="modal" data-target="#messageModal" onclick="setSender(<?php echo $sender;?>); setProduct(<?php echo $product_id;?>);">
                                                    <i class="icon-pencil icons"></i>
                                                </a>
                                                <a href="#"  onclick="deleteMessage(<?php echo $sender;?>)">
                                                    <i class="icon-trash icons"></i>
                                                </a>
                                            </td>
                                        </tr>

                                <?php

                                    }
                                }
                                ?>
                                <!-- END MESSAGE -->
                            </tbody>
                        </table>
                    </div>
                    <!-- end message table -->
                </div>
            </div>
        </section>
        <!-- End Product Description -->
        <?php include('include/footer.php') ?>

        <div id="messageModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Reply</h4>
                    </div>
                    <form action="model/message.php" method="POST">

                        <div class="modal-body" style="padding: 5px;">
                            <input name="to" type="hidden" name="to" value="" id="toSender" ** />**
                            <input name="product_id" type="hidden" name="to" value="" id="sendProductId" ** />**
                            <textarea id="content" class="form-group margin-0" placeholder="Type your message here..."></textarea>
                        </div>
                        <div class="modal-footer" style="padding: 5px;">
                            <button type="submit" onclick="sendMessage()" class="btn btn-primary" data-dismiss="modal">Send Message</button>
                        </div>
                    </form>
                </div>

                <!-- End Footer Style -->
            </div>

            <?php include('include/footer_js.php') ?>

</body>

</html>