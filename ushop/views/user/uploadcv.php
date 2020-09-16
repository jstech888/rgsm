
<?php include(VIEWPATH . "widget" . DIRECTORY_SEPARATOR . "home" . DIRECTORY_SEPARATOR . "preloader.php"); ?>
<?php include(VIEWPATH . "widget" . DIRECTORY_SEPARATOR . "home" . DIRECTORY_SEPARATOR . "navbar.php"); ?>

<!-- Header -->
<header id="header" class="ex-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Diploma / CV</h1>
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
                    <li class="list-inline-item">Diploma / CV</li>
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
                <!-- Standard Form -->
                <form id="StandardForm" data-toggle="validator" data-disable="false" data-focus="false" method="post" action="/user/add_cv" target="actFrame" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id" value="<?php echo $resumeid;?>" />
                    <div class="form-group">
                        <label class="col-sm-12" for="cdiploma"><span class="text-danger">*</span>Diploma Document(English Version)</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control-input" id="uploadfile01" name="uploadfile01" required/>
                            <input type="hidden" id="uploadfile01_ori" name="uploadfile01_ori" value="<?php echo $uploadfiles->file01;?>"/>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12" for="ccover"><span class="text-danger">*</span>Cover Letter(2 Pages is enough for read.)</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control-input" id="uploadfile02" name="uploadfile02" required/>
                            <input type="hidden" id="uploadfile02_ori" name="uploadfile02_ori" value="<?php echo $uploadfiles->file02;?>"/>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control-submit-button" onclick="doSubmit();">Confirm Modification</button>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control-submit-button">Send To RKM</button>
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

<script>
    function doSubmit()
    {
        /*
        if($('#name').val()=='')
        {
            alert('請輸入姓名！');
            $('#name').focus();
            return false;
        }
        else if($('#position1').val()=='')
        {
            alert('請選擇職務1！');
            $('#position1').focus();
            return false;
        }
        else if($('#familypart').val()=='')
        {
            alert('請選擇小家別！');
            $('#familypart').focus();
            return false;
        }
        else if($('#gender').val()=='')
        {
            alert('請選擇性別！');
            $('#gender').focus();
            return false;
        }
        else if($('#blood').val()=='')
        {
            alert('請輸入血型！');
            $('#blood').focus();
            return false;
        }
        else if($('#birthday').val()=='')
        {
            alert('請輸入生日！');
            $('#birthday').focus();
            return false;
        }
        else if($('#pid').val()=='')
        {
            alert('請輸入身分證字號！');
            $('#pid').focus();
            return false;
        }
        else if($('#mobile').val()=='')
        {
            alert('請輸入手機！');
            $('#mobile').focus();
            return false;
        }
        else if($('#address').val()=='')
        {
            alert('請輸入戶籍地址！');
            $('#address').focus();
            return false;
        }
        else if($('#professionid').val()=='')
        {
            alert('請輸入專業證號！');
            $('#professionid').focus();
            return false;
        }
        else
        { */
        if(confirm('確定送出?')) {
            $('#wait_content').show();
            $('#wait').show();

            $('#StandardForm').submit();
        }
    }
</script>