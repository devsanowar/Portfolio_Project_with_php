<?php 
require_once('../config/db.php');
$id = $_SESSION['login_id'];
$select_profile_image_query = "SELECT profile_photo FROM `pro_users` WHERE id=$id";
$query_run = mysqli_query($db_con, $select_profile_image_query);
$select_profile_fetch_assoc = mysqli_fetch_assoc($query_run)['profile_photo'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Title -->
    <title>Neptune - Responsive Admin Dashboard Template</title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="assets/plugins/pace/pace.css" rel="stylesheet">
    <link href="assets/plugins/highlight/styles/github-gist.css" rel="stylesheet">
    <link href="assets/plugins/summernote/summernote-lite.min.css" rel="stylesheet">
    <link href="assets/plugins/datatables/datatables.min.css" rel="stylesheet">
    
    <!-- Theme Styles -->
    <link href="assets/css/main.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/neptune.png" />

</head>
<body>
    <div class="app align-content-stretch d-flex flex-wrap">
        <div class="app-sidebar">
            <div class="logo">
                <a href="http://localhost/project/" target="_blank" class="logo-icon"><span class="logo-text">Neptune</span></a>
                <div class="sidebar-user-switcher user-activity-online">
                    <a href="#">
                        <img src="assets/images/profile_photo/<?= $select_profile_fetch_assoc;?>">
                        <span class="activity-indicator"></span>
                        <span class="user-info-text"><?php if(isset($_SESSION['login_name'])) : echo $_SESSION['login_name']; endif ?><br><span class="user-state-info"><?php if(isset($_SESSION['login_email'])) : echo $_SESSION['login_email']; endif?></span></span>
                    </a>
                </div>
            </div>
            <div class="app-menu">
                <ul class="accordion-menu">
                    <li class="sidebar-title">
                        Apps
                    </li>
                    <li class="active-page">
                        <a href="dashboard.php" class="active"><i class="material-icons-two-tone">dashboard</i>Dashboard</a>
                    </li>

                    <li>
                        <a href=""><i class="material-icons-two-tone">design_services</i>Logo<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="add_logo.php">Add Logo</a>
                            </li>
                            <li>
                                <a href="manage_logo.php">Manage Logo</a>
                            </li>
                        </ul>
                    </li>
                    

                    <li>
                        <a href="manage_banner.php"><i class="material-icons-two-tone">ad_units</i>Banner</a>
                    </li>

                    <li>
                        <a href=""><i class="material-icons-two-tone">face_4</i>About<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="add_about.php">Add About</a>
                            </li>
                            <li>
                                <a href="manage_about.php">Manage About</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href=""><i class="material-icons-two-tone">design_services</i>Services<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="add_service.php">Add Service</a>
                            </li>
                            <li>
                                <a href="manage_service.php">Manage Services</a>
                            </li>
                        </ul>
                    </li>

                    

                    <li>
                        <a href=""><i class="material-icons-two-tone">factory</i>Fact<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="add_fact.php">Add Fact</a>
                            </li>
                            <li>
                                <a href="manage_fact.php">Manage Fact</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href=""><i class="material-icons-two-tone"> menu </i>Portfolio<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="add_portfolio.php">Add Portfolio</a>
                            </li>
                            <li>
                                <a href="manage_portfolio.php">Manage Portfolio</a>
                            </li>
                            <li>
                                <a href="add_portfolio_category.php">Add Category</a>
                            </li>
                            <li>
                                <a href="manage_portfolio_category.php">Manage Category</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href=""><i class="material-icons-two-tone">reviews</i>Testimonials<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="add_testimonial.php">Add Testimonial</a>
                            </li>
                            <li>
                                <a href="manage_testimonial.php">Manage Testimonial</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href=""><i class="material-icons-two-tone">flag_circle</i>Brands<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="add_brand.php">Add Brand</a>
                            </li>
                            <li>
                                <a href="manage_brand.php">Manage Brand</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href=""><i class="material-icons-two-tone">contact_support</i>Contact Info<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="add_contact_info.php">Add Contact info</a>
                            </li>
                            <li>
                                <a href="manage_contact_info.php">Manage Contact info</a>
                            </li>
                        </ul>
                    </li>

                    <li class="active-page">
                        <a href="all_message.php" class="active"><i class="material-icons-two-tone">chat</i>All Message</a>
                    </li>
                    <li>
                        <a href="copyright_text.php"><i class="material-icons-two-tone">copyright</i>Footer Copyright text</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="app-container">
            <div class="search">
                <form>
                    <input class="form-control" type="text" placeholder="Type here..." aria-label="Search">
                </form>
                <a href="#" class="toggle-search"><i class="material-icons">close</i></a>
            </div>
            <div class="app-header">
                <nav class="navbar navbar-light navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="navbar-nav" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link hide-sidebar-toggle-button" href="#"><i class="material-icons">first_page</i></a>
                                </li>
                            </ul>
            
                        </div>
                        <div class="d-flex">
                            <ul class="navbar-nav">
                                <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link nav-notifications-toggle" id="notificationsDropDown" style="width: 50px; height:50px;border-radius:50%;" href="#" data-bs-toggle="dropdown">
                                        <i class="material-icons-outlined">logout</i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end notifications-dropdown" aria-labelledby="notificationsDropDown">
                                        <h6 class="dropdown-header">Notifications</h6>
                                        <div class="notifications-dropdown-list">
                                            <a href="profile_settings.php">
                                                <div class="notifications-dropdown-item">
                                                    <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge bg-info text-white">
                                                            <i class="material-icons-outlined">account_circle</i>
                                                        </span>
                                                    </div>
                                                    <div class="notifications-dropdown-item-text">
                                                        <p class="bold-notifications-text" style="margin-top: 6px;font-size: 18px;">Profile Settings</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="view_profile.php">
                                                <div class="notifications-dropdown-item">
                                                    <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge bg-info text-white">
                                                            <i class="material-icons-outlined">account_circle</i>
                                                        </span>
                                                    </div>
                                                    <div class="notifications-dropdown-item-text">
                                                        <p class="bold-notifications-text" style="margin-top: 6px;font-size: 18px;">View Profile</p>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="logout.php">
                                                <div class="notifications-dropdown-item">
                                                    <div class="notifications-dropdown-item-image">
                                                        <span class="notifications-badge bg-danger text-white">
                                                            <i class="material-icons-outlined">logout</i>
                                                        </span>
                                                    </div>
                                                    <div class="notifications-dropdown-item-text">
                                                        <p class="bold-notifications-text" style="margin-top: 6px;font-size: 18px;">logout</p> 
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="app-content">
                <div class="content-wrapper">
                    <div class="container">
                        <div class="row">