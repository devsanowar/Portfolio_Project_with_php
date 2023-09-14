<?php 
require_once('frontend/header.php');
require_once('config/db.php');
?>

            <!-- banner-area -->
            <section id="home" class="banner-area banner-bg fix">
                <div class="container">
                    <div class="row align-items-center">
                    <?php 
                        $select_banner_image_query = "SELECT * FROM pro_banners";
                        $select_banner_query_run = mysqli_query($db_con, $select_banner_image_query);
                    ?>
                    <?php foreach($select_banner_query_run as $banner_item) : ?>
                        <div class="col-xl-7 col-lg-6">
                            
                            <div class="banner-content">
                                <h6 class="wow fadeInUp" data-wow-delay="0.2s"><?php echo strtok($banner_item['banner_title'], " "); ?></h6>
                                <h2 class="wow fadeInUp" data-wow-delay="0.4s"><?php echo substr(strstr($banner_item['banner_title']," "), 1);?></h2>
                                <p class="wow fadeInUp" data-wow-delay="0.6s"><?php echo $banner_item['banner_description']?></p>
                                <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                                    <ul>
                                        <li><a href="<?php echo $banner_item['facebook_url']?>"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="<?php echo $banner_item['twitter_url']?>"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="<?php echo $banner_item['instagram_url']?>"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="<?php echo $banner_item['linkedin_url']?>"><i class="fa-brands fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                                <a href="<?php echo $banner_item['portfolio_url']?>" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                        
                            <div class="banner-img text-right">
                                <img src="<?php echo 'backend/assets/images/banner_photo/'.$banner_item['banner_image'];?>" alt="">
                            </div>
                           
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
                <div class="banner-shape"><img src="frontend/assets/img/shape/dot_circle.png" class="rotateme" alt="img"></div>
            </section>
            <!-- banner-area-end -->
            <?php 
                $view_about = "SELECT * FROM pro_abouts WHERE about_status = 'active'";
                $view_about_query_run = mysqli_query($db_con,$view_about);
                $after_fetch_assoc = mysqli_fetch_assoc($view_about_query_run);
            ?>
            <!-- about-area-->
            <section id="about" class="about-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="about-img">
                                <img src="backend/assets/images/about_photo/<?= $after_fetch_assoc['about_image']?>" title="me-01" alt="me-01">
                            </div>
                        </div>
                        <div class="col-lg-6 pr-90">
                            <div class="section-title mb-25">
                                <span>Introduction</span>
                                <h2>About Me</h2>
                            </div>
                            <div class="about-content">
                                <p><?= $after_fetch_assoc['about_description']?></p>
                                <h3>Education:</h3>
                            </div>
                            <!-- Education Item -->
                            <div class="education">
                                <div class="year"><?= $after_fetch_assoc['honors_passing_year']?></div>
                                <div class="line"></div>
                                <div class="location">
                                    <span><?= $after_fetch_assoc['honors_certificate_name']?></span>
                                    <div class="progressWrapper">
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: 65%;" aria-valuenow="<?= $after_fetch_assoc['honors_grade']?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Education Item -->
                            <!-- Education Item -->
                            <div class="education">
                                <div class="year"><?= $after_fetch_assoc['hsc_passing_year']?></div>
                                <div class="line"></div>
                                <div class="location">
                                    <span><?= $after_fetch_assoc['hsc_certificate_name']?></span>
                                    <div class="progressWrapper">
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: 75%;" aria-valuenow="<?= $after_fetch_assoc['hsc_grade']?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Education Item -->
                            <!-- Education Item -->
                            <div class="education">
                                <div class="year"><?= $after_fetch_assoc['ssc_passing_year']?></div>
                                <div class="line"></div>
                                <div class="location">
                                    <span><?= $after_fetch_assoc['ssc_certificate_name']?></span>
                                    <div class="progressWrapper">
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: 85%;" aria-valuenow="<?= $after_fetch_assoc['ssc_grade']?>" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Education Item -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- about-area-end -->

            <!-- Services-area -->
            <section id="service" class="services-area pt-120 pb-50">
				<div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>WHAT WE DO</span>
                                <h2>Services and Solutions</h2>
                            </div>
                        </div>
                    </div>
                    <?php 
                        $service_select_query="SELECT * FROM pro_services WHERE service_status='active' ";
                        $service_query_run=mysqli_query($db_con, $service_select_query);
                    ?>
                    
					<div class="row">
                        <?php foreach($service_query_run as $service_item) :?>
						<div class="col-lg-4 col-md-6">
							<div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
                                <i class="<?= $service_item['service_icon']?>"></i>
								<h3><?= $service_item['service_title']?></h3>
								<p>
                                <?= $service_item['service_description']?>
								</p>
							</div>
						</div>
                        <?php endforeach;?>
					</div>
				</div>
			</section>
            <!-- Services-area-end -->

            <?php 
            
            $view_all_portfolio = "SELECT pro_portfolio_categories.category_name,pro_portfolios.portfolio_title,pro_portfolios.id,pro_portfolios.portfolio_image FROM pro_portfolio_categories INNER JOIN pro_portfolios ON pro_portfolio_categories.id=pro_portfolios.category_id WHERE portfolio_status = 'active'";
            $vew_portfolio_query_run = mysqli_query($db_con, $view_all_portfolio);
            
            ?>

            <!-- Portfolios-area -->
            <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>Portfolio Showcase</span>
                                <h2>My Recent Best Works</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach($vew_portfolio_query_run as $portfolio_items) : ?>
                        <div class="col-lg-4 col-md-6 pitem">
                            <div class="speaker-box">
								<div class="speaker-thumb">
									<img src="backend/assets/images/portfolio_photo/<?= $portfolio_items['portfolio_image']; ?>" alt="img">
								</div>
								<div class="speaker-overlay">
									<span><?= $portfolio_items['category_name']?></span>
									<h4><a href="portfolio-single.php?id=<?= $portfolio_items['id']?>"><?= $portfolio_items['portfolio_title']?></a></h4>
									<a href="portfolio-single.php?id=<?= $portfolio_items['id']?>" class="arrow-btn">More information <span></span></a>
								</div>
							</div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </section>
            
            <!-- services-area-end -->

            <?php 
                $view_all_facts_query = "SELECT * FROM pro_facts WHERE fact_status='active'";
                $view_facts_query_run = mysqli_query($db_con, $view_all_facts_query);
            ?>


            <!-- fact-area -->
            <section class="fact-area">
                <div class="container">
                    <div class="fact-wrap">
                        <div class="row justify-content-between">
                        <?php foreach ($view_facts_query_run as $fact_item) : ?>
                            <div class="col-xl-2 col-lg-3 col-sm-6">
                                <div class="fact-box text-center mb-50">
                                    <div class="fact-icon">
                                        <i class="<?=$fact_item['fact_icon'];?>"></i>
                                    </div>
                                    <div class="fact-content">
                                        <h2><span class="count"><?=$fact_item['fact_value'];?></span></h2>
                                        <span><?=$fact_item['fact_title'];?></span>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- fact-area-end -->

            <!-- testimonial-area -->
            <section class="testimonial-area primary-bg pt-115 pb-115">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>testimonial</span>
                                <h2>happy customer quotes</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-9 col-lg-10">
                            <div class="testimonial-active">
                            <?php 
                                $select_all_testimonials = "SELECT * FROM pro_testimonials WHERE testimonial_status = 'active'";
                                $testimonial_query_run = mysqli_query($db_con, $select_all_testimonials);
                            ?>
                            <?php foreach($testimonial_query_run as $testimonial_item) : ?>
                                <div class="single-testimonial text-center">
                                    <div class="testi-avatar">
                                        <img src="backend/assets/images/testimonial_photo/<?= $testimonial_item['client_photo'];?>" style="border-radius:50%;" alt="img" width="80">
                                    </div>
                                    <div class="testi-content">
                                        <h4><span>“</span> <?= $testimonial_item['testimonial_quote'];?> <span>”</span></h4>
                                        <div class="testi-avatar-info">
                                            <h5><?= $testimonial_item['client_name'];?></h5>
                                            <span><?= $testimonial_item['designation'];?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- testimonial-area-end -->
            <?php 
                $select_brand = "SELECT * FROM pro_brands WHERE brand_status = 'active'";
                $brand_query_run = mysqli_query($db_con, $select_brand);
            ?>
            <!-- brand-area -->
            <div class="barnd-area pt-100 pb-100">
                <div class="container">
                    <div class="row brand-active">
                    <?php foreach($brand_query_run as $brand_items) : ?>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="backend/assets/images/brand_photo/<?= $brand_items['brand_image'];?>" alt="img">
                            </div>
                        </div>
                    <?php endforeach;?>
                    </div>
                </div>
            </div>
            <!-- brand-area-end -->
            <?php 
                $view_contact_info = "SELECT * FROM pro_contact_infos WHERE contact_status = 'active'";
                $contact_info_query_run = mysqli_query($db_con, $view_contact_info);
                $contact_info_fetch_assoc = mysqli_fetch_assoc($contact_info_query_run);
            ?>       
            <!-- contact-area -->
            <section id="contact" class="contact-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="section-title mb-20">
                                <span>information</span>
                                <h2>Contact Information</h2>
                            </div>
                            <div class="contact-content">
                                <p><?= $contact_info_fetch_assoc['contact_info']?></p>
                                <h5>OFFICE IN <span><?= $contact_info_fetch_assoc['office_location']?></span></h5>
                                <div class="contact-list">
                                    <ul>
                                        <li><i class="fas fa-map-marker"></i><span>Address :</span><?= $contact_info_fetch_assoc['address']?></li>
                                        <li><i class="fas fa-headphones"></i><span>Phone :</span><?= $contact_info_fetch_assoc['phone']?></li>
                                        <li><i class="fas fa-globe-asia"></i><span>e-mail :</span><?= $contact_info_fetch_assoc['email']?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-form">
                                <form action="add_message_post.php" method="POST">
                                    <input type="text" placeholder="your name *" name="your_name">

                                    <?php if (isset($_SESSION['name_error'])) : ?>
                                        <h5 class="text-danger"><?=$_SESSION['name_error'];?></h5>
                                    <?php endif; unset($_SESSION['name_error']);?>

                                    <input type="email" placeholder="your email *" name="your_email">

                                    <?php if (isset($_SESSION['email_error'])) : ?>
                                        <h5 class="text-danger"><?=$_SESSION['email_error'];?></h5>
                                    <?php endif; unset($_SESSION['email_error']);?>

                                    <textarea name="message" id="message" placeholder="your message *"></textarea>
                                    
                                    <?php if (isset($_SESSION['message_error'])) : ?>
                                        <h5 class="text-danger"><?=$_SESSION['message_error'];?></h5>
                                    <?php endif; unset($_SESSION['message_error']);?>    
                                    
                                    <button class="btn">SEND</button>
                                </form>
                            </div>
                            <?php if (isset($_SESSION['contact_success_msg'])) : ?>
                                <h5 class="text-white" style="margin-top: 20px;border: 2px solid #729E7C;padding: 10px;"><?=$_SESSION['contact_success_msg'];?></h5>
                            <?php endif; unset($_SESSION['contact_success_msg']);?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

<?php 
require_once('frontend/footer.php');
?>
