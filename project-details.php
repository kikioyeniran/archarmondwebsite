<?php require_once("admin/includes/connection.php"); ?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Archamond Concept</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div class="header-top_area d-none d-lg-block">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 ">
                            <div class="social_media_links">
                                <a href="#">
                                    <i class="fa fa-linkedin"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6">
                            <div class="short_contact_list">
                                <ul>
                                    <li><a href="#"> <i class="fa fa-envelope"></i> info@docmed.com</a></li>
                                    <li><a href="#"> <i class="fa fa-phone"></i> 1601-609 6780</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area details_nav_bg">
                <div class="container">
                    <div class="header_bottom_border white_border">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                    <a href="index.html">
                                        <img src="img/logo.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a class="active" href="index.php">Home</a></li>
                                            <li><a href="about.php">About</a></li>
                                            <li><a href="services.php">Services</a></li>
                                            <li><a href="blog.php">Blog</a></li>
                                            <li><a href="projects.php">Projects</a></li>
                                            <li><a href="contact.php">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <?php

    if (isset($_GET['proj'])) {
        $id = $_GET['proj'];
        $query2 = "SELECT * FROM projects WHERE id={$id} LIMIT 1";
        $result = $mysqli->query($query2) or die($mysqli->error);
        $row = $result->fetch_assoc();
    ?>

        <div class="portfolio_details_area">
            <div class="container">
                <div class="row">
                    <!-- <div class="col-xl-8 offset-xl-2">
                    <div class="portfolio_details_content text-center mb-50">
                        <span>Branding</span>
                        <h3>Gives you the best Financial  <br>
                            solution for business</h3>
                            <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.</p>
                    </div>
                </div> -->
                    <div class="col-xl-12">
                        <div class="portfolio_details_thumb">
                            <img src="admin/images/<?php echo $row['picture']; ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="portfolio_details_content mt-50 mb-50 text-center">
                            <h4><?php echo $row['name']; ?></h4>
                            <p><?php echo $row['description']; ?><p>
                                    <div class="live_view_btn mt-50">
                                        <a href="#" class="boxed-btn3-green-2"><?php echo $row['client']; ?> by Archamond Concept</a>
                                    </div>
                        </div>
                    </div>
                    <!-- <div class="col-xl-12">
                    <div class="portfolio_details_thumb">
                        <img src="img/gallery/details_img_2.png" alt="">
                    </div>
                </div> -->
                </div>
            </div>
        </div>

    <?php
                                                                                include("includes/footer.php");
                                                                            } else {
                                                                                redirect_to("blog.php");
                                                                            }
    ?>