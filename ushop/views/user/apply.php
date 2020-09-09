<!-- Header -->
<header id="header" class="ex-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1><?php echo $objLang["userapply"]['panelTitle'];?></h1>
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
                    <li class="list-inline-item"><a class="underline" href="/"> <?php echo $objLang['function_bar']['home'];?> </a></li>
                    <li class="list-inline-item"><i class="fa fa-angle-double-right"></i></li>
                    <li class="list-inline-item"> <?php echo $objLang["userapply"]['panelTitle'];?> </li>
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
                <form id="StandardForm" data-toggle="validator" data-disable="false" data-focus="false" method="post" action="/user/add_resume" target="actFrame" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control-input" id="ctcid" name="ctcid" required>
                        <label class="label-control" for="ctcid">Your Tc Identification Number</label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control-input" id="cname" name="cname" required>
                        <label class="label-control" for="cname">Your name</label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control-input" id="cbirth" name="cbirth" required>
                        <label class="label-control" for="cbirth">Date of birth</label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control-input" id="cplace" name="cplace" required>
                        <label class="label-control" for="cplace">Place of birth</label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control-input" id="caddress" name="caddress" required></textarea>
                        <label class="label-control" for="caddress">Address</label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12" for="ccity">City</label>
                        <select class="form-control-select" id="ccity" name="ccity" required>
                            <option value="0">-- Choose City --</option>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12" for="cdistrict">District</label>
                        <select class="form-control-select" id="cdistrict" name="cdistrict" required>
                            <option value="0">-- Select City First --</option>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12" for="cnationality">What is Your Nationality</label>
                        <div class="col-sm-12">
                            <input type="radio" id="nation1" name="cnationality" value="1"> T.C.
                            <input type="radio" id="nation2" name="cnationality" value="2"> A.B.
                            <input type="radio" id="nation3" name="cnationality" value="3"> Other
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12" for="ccitizenship">Do you have citizenship</label>
                        <div class="col-sm-12">
                            <input type="radio" id="citizenship1" name="ccitizenship" value="1"> Yes
                            <input type="radio" id="citizenship2" name="ccitizenship" value="2"> No
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12" for="cgender">You gender</label>
                        <div class="col-sm-12">
                            <input type="radio" id="gender1" name="cgender" value="1"> Male
                            <input type="radio" id="gender2" name="cgender" value="2"> Female
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control-input" id="cmobile" name="cmobile" required>
                        <label class="label-control" for="cmobile">Your Mobile Number</label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control-input" id="cemail" name="cemail" required>
                        <label class="label-control" for="ceamil">E-Mail Address</label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12" for="education">Gradictopn Statis</label>
                        <div class="col-sm-12">
                            <input type="radio" id="education1" name="education" value="1"> Primary school
                            <input type="radio" id="education2" name="education" value="2"> Middle School
                            <input type="radio" id="education3" name="education" value="3"> High School
                            <input type="radio" id="education4" name="education" value="4"> Associate
                            <input type="radio" id="education5" name="education" value="5"> License
                            <input type="radio" id="education6" name="education" value="6"> Master
                            <input type="radio" id="education7" name="education" value="7"> Doctorate
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control-submit-button" onclick="doSubmit();">Next</button>
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