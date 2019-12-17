<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include('include/header_style.php') ?>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
</head>

<?php require('model/profile.php') ?>

<body onload="loadCart()">
    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">

            <?php include('include/search.php') ?>

            <?php include('include/cart.php') ?>

        </div>

        <div class="container">
            <div class="row" style="margin: 20px">
                <div class="col">
                    <div class="w3-card-4" style="width:100%">
                        <img src="devs\da.jpg" alt="Alps" style="width:100%">
                        <div class="w3-container w3-center">
                            <p>Dan Jalba: Team Lead and Tester</p>
                        </div>
                    </div>
                </div>
                <!-- end clo 1 -->
                <div class="col">
                    <div class="w3-card-4" style="width:100%">
                        <img src="devs\as.jpeg" alt="Alps" style="width:100%">
                        <div class="w3-container w3-center">
                            <p>Asmita Upreti: Backend Developer and Tester</p>
                        </div>
                    </div>
                </div>
                <!-- end col 2 -->
            </div>
            <!-- end row 1 -->

            <div class="row" style="margin: 20px">
                <div class="col">
                    <div class="w3-card-4" style="width:100%">
                        <img src="devs\us.jpg" alt="Alps" style="width:100%">
                        <div class="w3-container w3-center">
                            <p>Usman Aslam: Frontend Developer and Tester</p>
                        </div>
                    </div>
                </div>
                <!-- end clo 1 -->
                <div class="col">
                    <div class="w3-card-4" style="width:100%">
                        <img src="devs\ku.jpg" alt="Alps" style="width:100%">
                        <div class="w3-container w3-center">
                            <p>Kumkum Rajput: Database Administrator and Tester</p>
                        </div>
                    </div>
                </div>
                <!-- end col 2 -->
            </div>
            <!-- end row 1 -->

            <div class="row" style="margin: 20px">
                <div class="col">
                    <div class="w3-card-4" style="width:100%">
                        <img src="devs\ko.jpg" alt="Alps" style="width:100%">
                        <div class="w3-container w3-center">
                            <p>Jobayer Hossen Mojumder: Lead Frontend Engineer and Git-Master</p>
                        </div>
                    </div>
                </div>
                <!-- end clo 1 -->
                <div class="col">
                    <div class="w3-card-4" style="width:100%">
                        <img src="devs\ni.jpg" alt="Alps" style="width:100%">
                        <div class="w3-container w3-center">
                            <p>Nikhil Yadav: Lead Backend Developer</p>
                        </div>
                    </div>
                </div>
                <!-- end col 2 -->
            </div>
            <!-- end row 1 -->
        </div>
<!-- end description container -->


        <?php include('include/footer.php') ?>
        <!-- End Footer Style -->
    </div>

    <?php include('include/footer_js.php') ?>

</body>

</html>