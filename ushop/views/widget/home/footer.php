<!-- Footer -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="footer-col">
                    <?php echo (isset($footer[0]["value"][0]))?$footer[0]["value"][0]["content"]:"";?>
                </div>
            </div> <!-- end of col -->

            <?php //echo (isset($footer[0]["value"][1])) ? $footer[0]["value"][1]["content"]:"";?>
            <!--最新消息-->
            <?php include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."home" . DIRECTORY_SEPARATOR ."News.php");?>

            <div class="col-md-4">
                <div class="footer-col float-lg-right">
                    <h4>Social Media</h4>
                    <span class="fa-stack fa-lg">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x facebook"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x"></i>
                                </a>
                            </span>
                    <span class="fa-stack fa-lg">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x twitter"></i>
                                    <i class="fab fa-twitter fa-stack-1x"></i>
                                </a>
                            </span>
                    <span class="fa-stack fa-lg">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x google-plus"></i>
                                    <i class="fab fa-google-plus-g fa-stack-1x"></i>
                                </a>
                            </span>
                    <span class="fa-stack fa-lg">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x instagram"></i>
                                    <i class="fab fa-instagram fa-stack-1x"></i>
                                </a>
                            </span>
                    <span class="fa-stack fa-lg">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x linkedin"></i>
                                    <i class="fab fa-linkedin-in fa-stack-1x"></i>
                                </a>
                            </span>
                    <span class="fa-stack fa-lg">
                                <a href="#your-link">
                                    <i class="fas fa-circle fa-stack-2x dribbble"></i>
                                    <i class="fab fa-dribbble fa-stack-1x"></i>
                                </a>
                            </span>
                </div>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php echo (isset($footer[0]["value"][2])) ? $footer[0]["value"][2]["content"]:"";?>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright -->
</div> <!-- end of footer -->
<!-- end of footer -->

<!-- Scripts -->
<script src="/js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
<script src="/js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
<script src="/js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
<script src="/js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
<script src="/js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
<script src="/js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
<script src="/js/isotope.pkgd.min.js"></script> <!-- Isotope for filter -->
<script src="/js/jquery.countTo.js"></script> <!-- jQuery countTo for counting animation -->
<script src="/js/morphext.min.js"></script> <!-- Morphtext rotating text in the header-->
<script src="/js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
<script src="/js/scripts.js"></script> <!-- Custom scripts -->