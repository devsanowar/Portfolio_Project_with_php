<?php 
session_start();
require_once('config/db.php');
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Portfolio</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" type="image/x-icon" href="frontend/assets/img/favicon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
		<!-- CSS here -->
        <link rel="stylesheet" href="frontend/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="frontend/assets/css/animate.min.css">
        <link rel="stylesheet" href="frontend/assets/css/magnific-popup.css">
        <link rel="stylesheet" href="frontend/assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="frontend/assets/css/flaticon.css">
        <link rel="stylesheet" href="frontend/assets/css/slick.css">
        <link rel="stylesheet" href="frontend/assets/css/aos.css">
        <link rel="stylesheet" href="frontend/assets/css/default.css">
        <link rel="stylesheet" href="frontend/assets/css/style.css">
        <link rel="stylesheet" href="frontend/assets/css/responsive.css">
    </head>
    <body class="theme-bg">

        <!-- preloader -->
        <div id="preloader">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                </div>
            </div>
        </div>
        <!-- preloader-end -->
        <?php 
        $view_logo = "SELECT * FROM pro_logos";
        $view_logo_query_run = mysqli_query($db_con, $view_logo);
        $logo_fetch_assoc = mysqli_fetch_assoc($view_logo_query_run);
        
        ?>
        <!-- header-start -->
        <header>
            <div id="header-sticky" class="transparent-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-menu">
                                <nav class="navbar navbar-expand-lg">
                                    <a href="index.php" class="navbar-brand logo-sticky-none"><img src="backend/assets/images/logo/<?=$logo_fetch_assoc['logo_image'];?>" alt="Logo"></a>
                                    <a href="index.php" class="navbar-brand s-logo-none"><img src="backend/assets/images/logo/<?=$logo_fetch_assoc['logo_image'];?>" alt="Logo"></a>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarNav">
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarNav">
                                        <ul class="navbar-nav ml-auto">
                                            <li class="nav-item active"><a class="nav-link" href="index.php?section=#home">Home</a></li>
                                            <li class="nav-item"><a class="nav-link" href="index.php?section=#about">about</a></li>
                                            <li class="nav-item"><a class="nav-link" href="index.php?section=#service">service</a></li>
                                            <li class="nav-item"><a class="nav-link" href="index.php?section=#portfolio">portfolio</a></li>
                                            <li class="nav-item"><a class="nav-link" href="index.php?section=#contact">Contact</a></li>
                                        </ul>
                                    </div>
                                    <div class="header-btn">
                                        <a href="#" class="off-canvas-menu menu-tigger"><i class="flaticon-menu"></i></a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                $view_contact_info = "SELECT * FROM pro_contact_infos WHERE contact_status = 'active'";
                $contact_info_query_run = mysqli_query($db_con, $view_contact_info);
                $contact_info_fetch_assoc = mysqli_fetch_assoc($contact_info_query_run);
            ?>
            <!-- offcanvas-start -->
            <div class="extra-info">
                <div class="close-icon menu-close">
                    <button>
                        <i class="far fa-window-close"></i>
                    </button>
                </div>
                <div class="logo-side mb-30">
                    <a href="index-2.html">
                        <img src="backend/assets/images/logo/<?=$logo_fetch_assoc['logo_image'];?>" alt="" />
                    </a>
                </div>
                <div class="side-info mb-30">
                    <div class="contact-list mb-30">
                        <h4>Office Address</h4>
                        <p><?= $contact_info_fetch_assoc['address']?></p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Phone Number</h4>
                        <p><?= $contact_info_fetch_assoc['phone']?></p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Email Address</h4>
                        <p><?= $contact_info_fetch_assoc['email']?></p>
                    </div>
                </div>
                <?php 
                    $select_social_info = "SELECT * FROM pro_banners";
                    $select_social_info_query_run = mysqli_query($db_con, $select_social_info);
                    $social_info_fetch_assoc = mysqli_fetch_assoc($select_social_info_query_run);
                ?>
                <div class="social-icon-right mt-20">
                    <a href="<?php echo $social_info_fetch_assoc['facebook_url']?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="<?php echo $social_info_fetch_assoc['twitter_url']?>" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="<?php echo $social_info_fetch_assoc['instagram_url']?>" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    <a href="<?php echo $social_info_fetch_assoc['linkedin_url']?>" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </div>
            <div class="offcanvas-overly"></div>
            <!-- offcanvas-end -->
        </header>
        <!-- header-end -->

        <!-- main-area -->
        <main>