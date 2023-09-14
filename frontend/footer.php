<?php 
require_once('config/db.php');
?>

</main>
        <!-- main-area-end -->
        <?php 
        $view_copyright_text = "SELECT * FROM pro_copyright";
        $copyright_query_run = mysqli_query($db_con, $view_copyright_text);
        $copyright_fetch_assoc = mysqli_fetch_assoc($copyright_query_run);
        ?>
        <!-- footer -->
        <footer>
            <div class="copyright-wrap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="copyright-text text-center">
                                <p><?= $copyright_fetch_assoc['copyright_text']?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-end -->





		<!-- JS here -->
        <script src="frontend/assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="frontend/assets/js/popper.min.js"></script>
        <script src="frontend/assets/js/bootstrap.min.js"></script>
        <script src="frontend/assets/js/isotope.pkgd.min.js"></script>
        <script src="frontend/assets/js/one-page-nav-min.js"></script>
        <script src="frontend/assets/js/slick.min.js"></script>
        <script src="frontend/assets/js/ajax-form.js"></script>
        <script src="frontend/assets/js/wow.min.js"></script>
        <script src="frontend/assets/js/aos.js"></script>
        <script src="frontend/assets/js/jquery.waypoints.min.js"></script>
        <script src="frontend/assets/js/jquery.counterup.min.js"></script>
        <script src="frontend/assets/js/jquery.scrollUp.min.js"></script>
        <script src="frontend/assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="frontend/assets/js/jquery.magnific-popup.min.js"></script>
        <script src="frontend/assets/js/plugins.js"></script>
        <script src="frontend/assets/js/main.js"></script>
    </body>

</html>