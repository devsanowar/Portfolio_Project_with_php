<?php 
require_once('frontend/header.php');
require_once('config/db.php');

$id = $_GET['id'];
$view_portfolio_single_page = "SELECT * FROM pro_portfolios WHERE id = $id";
$portfolio_query_run = mysqli_query($db_con, $view_portfolio_single_page);
$portfolio_single_fetch_assoc = mysqli_fetch_assoc($portfolio_query_run);
?>

<!-- breadcrumb-area -->
<section class="breadcrumb-area breadcrumb-bg d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="breadcrumb-content text-center">
                    <h2>Portfolio Single POST</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb-area-end -->

<!-- portfolio-details-area -->
<section class="portfolio-details-area pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-10">
                <div class="single-blog-list">
                    <div class="blog-list-thumb mb-35">
                        <!-- <img src="" alt="img"> -->
                    </div>
                    <div class="blog-list-content blog-details-content portfolio-details-content">
                        <h2><?= $portfolio_single_fetch_assoc['portfolio_title']?></h2>
                        <p><?= $portfolio_single_fetch_assoc['portfolio_description']?></p>
                        <div class="blog-list-meta">
                            <ul>
                                <li class="blog-post-date">
                                    <h3>Share On</h3>
                                </li>
                                <li class="blog-post-share">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="avatar-post mt-70 mb-60">
                        <ul>
                            <li>
                                <div class="post-avatar-img">
                                    <img src="img/blog/post_avatar_img.png" alt="img">
                                </div>
                                <div class="post-avatar-content">
                                    <h5>Thomas Herlihy</h5>
                                    <p>Vehicula dolor amet consectetur adipiscing elit. Cras sollicitudin, tellus vitae
                                        condimem
                                        egestliberos dolor auctor
                                        tellus.</p>
                                    <div class="post-avatar-social mt-15">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- portfolio-details-area-end -->

<?php require_once('frontend/footer.php');?>