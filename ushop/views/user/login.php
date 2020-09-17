
<?php include(VIEWPATH . "widget" . DIRECTORY_SEPARATOR . "home" . DIRECTORY_SEPARATOR . "preloader.php"); ?>
<?php include(VIEWPATH . "widget" . DIRECTORY_SEPARATOR . "home" . DIRECTORY_SEPARATOR . "navbar.php"); ?>

<!-- Header -->
<header id="header" class="ex-header-hidden">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</header> <!-- end of ex-header -->
<!-- end of header -->


<!-- Breadcrumbs -->
<div class="ex-basic-1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumbs list-unstyled list-inline">
                    <li class="list-inline-item"><a class="underline" href="index.html">Home</a></li>
                    <li class="list-inline-item"><i class="fa fa-angle-double-right"></i></li>
                    <li class="list-inline-item"> <?php echo $objLang["login"]['panelTitle'];?> </li>
                </ul>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of ex-basic-1 -->
<!-- end of breadcrumbs -->

<!-- Content -->
<div class="form-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center"><span class="purple-light">會員</span>登入</h2>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
        <div class="row">
            <div class="col-lg-12">

                <!-- Standard Form -->
                <form method="post" action="/user/login" id="StandardForm" data-toggle="validator" data-focus="false">

                    <?php if($_GET['redirectURL']!=''){	?>
                        <input type="hidden" name="redirectURL" id="redirectURL" value="<?php echo $_GET['redirectURL'];?>">
                    <?php } ?>

                    <div class="form-group">
                        <input type="text" class="form-control-input" name="username" id="username" required>
                        <label class="label-control" for="cusername">Email</label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control-input" name="password" id="password" required>
                        <label class="label-control" for="cpassword"><?php echo $objLang["login"]['password_Label'];?></label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control-submit-button"> <?php echo $objLang["login"]['sign_in'];?> </button>
                    </div>
                    <div class="form-group">
                        <button type="button" class="form-control-submit-button"> <?php echo $objLang["login"]['forget_password'];?> </button>
                    </div>
                    <div class="form-message">
                        <div id="cmsgSubmit" class="h3 text-center hidden"></div>
                    </div>

                </form>
                <!-- end of standard form -->

            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of form-3 -->
<!-- end of content -->


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
<script src="/js/util.js"></script>

<script>
    $(function() {

        <?php
        if(isset($opt['status']) && $opt['status'] == true)
        {
            $msgTotal = '';

            foreach ($opt ['message'] as $msg) {
                $msgTotal .= $msg;
            }

            $alertType  = $opt ['alertType'];
            $type       = $opt ['type'];
        ?>

        ezBSAlert({
            messageText: '<?php echo $msgTotal;?>',
            alertType: '<?php echo $alertType;?>',
            type: '<?php echo $type;?>'
        });

        <?php
        }
        ?>
    });

    <!-- 重發認證信使用-->
    function reActive(username){
        $('#login_form').attr('action','/user/reActive');
        $('#username').val(username);
        $('#login_form').submit();
    }
</script>