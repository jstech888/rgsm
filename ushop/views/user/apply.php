
<?php include(VIEWPATH . "widget" . DIRECTORY_SEPARATOR . "home" . DIRECTORY_SEPARATOR . "preloader.php"); ?>
<?php include(VIEWPATH . "widget" . DIRECTORY_SEPARATOR . "home" . DIRECTORY_SEPARATOR . "navbar.php"); ?>

<!-- Header -->
<header id="header" class="ex-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1> <?php echo $objLang["userapply"]['panelTitle'];?> </h1>
            </div>
            <!-- end of col -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of container -->
</header>
<!-- end of ex-header -->
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
            </div>
            <!-- end of col -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of container -->
</div>
<!-- end of ex-basic-1 -->
<!-- end of breadcrumbs -->

<!-- Content -->
<div class="ex-basic-2">
    <div class="container">
        <div class="row">

            <div class="col-md-3 col-sm-12">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action" data-toggle="collapse" href="#faq-1" role="tab" aria-controls="dploma-1">英文畢業證書 / 履歷表</a>
                    <a class="list-group-item list-group-item-action active" data-toggle="collapse" href="#faq-2" role="tab" aria-controls="dploma-2">個人履歷資料</a>
                    <a class="list-group-item list-group-item-action" data-toggle="collapse" href="#faq-3" role="tab" aria-controls="dploma-3">應徵狀態查詢</a>
                </div>
            </div> <!-- end of col -->

            <div class="col-md-9 col-sm-12">
                <!-- Standard Form -->
                <form id="StandardForm" data-toggle="validator" data-focus="false" data-disable="false" method="post" action="/user/add_resume" target="actFrame" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id" value="<?php echo $resume['id'] ? $resume['id']:'';?>" />
                    <div class="form-group">
                        <input type="text" class="form-control-input" id="fullname" name="fullname" required>
                        <label class="label-control" for="cname">姓名</label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control-input" id="nickname" name="nickname" value="<?php echo $resume['nickname'] ? $resume['nickname']:"";?>" required>
                        <label class="label-control" for="cname">暱稱</label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12" for="csex">性別</label>
                        <div class="col-sm-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="gender1" name="gender" value="1" <?php echo $resume['gender']==1 ? "checked":"";?> >
                                <label class="form-check-label">
                                    男
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="gender2" name="gender" value="2" <?php echo $resume['gender']==2 ? "checked":"";?> >
                                <label class="form-check-label">
                                    女
                                </label>
                            </div>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control-input Wdate" id="birthday" name="birthday" value="<?php echo $resume['birthday'] ? $resume['birthday']:"";?>" required/>
                        <label class="label-control" for="birthday">生日</label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control-input" id="mobile" name="mobile" value="<?php echo $resume['mobile'] ? $resume['mobile']:"";?>" required>
                        <label class="label-control" for="mobile">手機號碼</label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control-input" id="address" name="address" value="<?php echo $resume['address'] ? $resume['address']:"";?>" required></textarea>
                        <label class="label-control" for="address">地址</label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12" for="nationality">國籍</label>
                        <div class="col-sm-12">
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="nationality1" name="nationality" value="1"><label class="form-check-label">台灣</label></div>
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="nationality2" name="nationality" value="2"><label class="form-check-label">印尼</label></div>
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="nationality3" name="nationality" value="3"><label class="form-check-label">越南</div></label></div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12" for="hasIdCard">持有身分證</label>
                        <div class="col-sm-12">
                            <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" id="hasIdCard01" name="hasIdCard[]" value="1"><label class="form-check-label">本國身分證</label></div>
                            <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" id="hasIdCard02" name="hasIdCard[]" value="2"><label class="form-check-label">護照</label></div>
                            <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" id="hasIdCard03" name="hasIdCard[]" value="3"><label class="form-check-label">居留證</label></div>
                            <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" id="hasIdCard04" name="hasIdCard[]" value="4"><label class="form-check-label">其他國家身分證件</div></label></div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12" for="education">學歷</label>
                        <div class="col-sm-12">
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="education01" name="education" value="1"><label class="form-check-label">高中職以下</label></div>
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="education02" name="education" value="2"><label class="form-check-label">高中職</label></div>
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="education03" name="education" value="3"><label class="form-check-label">專科</label></div>
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="education04" name="education" value="4"><label class="form-check-label">四技</label></div>
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="education05" name="education" value="5"><label class="form-check-label">二技</label></div>
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="education06" name="education" value="6"><label class="form-check-label">高中職</label></div>
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="education07" name="education" value="7"><label class="form-check-label">大學</label></div>
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="education08" name="education" value="8"><label class="form-check-label">碩士</label></div>
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="education09" name="education" value="9"><label class="form-check-label">博士 </div></label></div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12" for="study_status">就學狀態</label>
                        <div class="col-sm-12">
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="study_status01" name="study_status" value="1"><label class="form-check-label">就學中</label></div>
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="study_status01" name="study_status" value="2"><label class="form-check-label">肄業</div></label></div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12" for="military_service_status">兵役狀態</label>
                        <div class="col-sm-12">
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="military_service_status01" name="military_service_status" value="1"><label class="form-check-label">役畢</label></div>
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="military_service_status02" name="military_service_status" value="2"><label class="form-check-label">服役中</div></label></div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12" for="disability_status">殘疾狀態</label>
                        <div class="col-sm-12">
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="disability_status01" name="disability_status" value="1"><label class="form-check-label">無</label></div>
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="disability_status02" name="disability_status" value="2"><label class="form-check-label">輕度殘障</label></div>
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="disability_status03" name="disability_status" value="3"><label class="form-check-label">中度殘障</div></label></div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12" for="pipeline">管道</label>
                        <div class="col-sm-12">
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="pipeline01" name="pipeline" value="1"><label class="form-check-label">人才庫</label></div>
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="pipeline02" name="pipeline" value="2"><label class="form-check-label">員工推薦</label></div>
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="pipeline03" name="pipeline" value="3"><label class="form-check-label">內部員工</label></div>
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="pipeline04" name="pipeline" value="4"><label class="form-check-label">Partner推薦</label></div>
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="pipeline05" name="pipeline" value="5"><label class="form-check-label">104人力銀行</label></div>
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="pipeline06" name="pipeline" value="6"><label class="form-check-label">1111人力銀行</label></div>
                            <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="pipeline07" name="pipeline" value="7"><label class="form-check-label">其他人力銀行</div></label></div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control-submit-button" onclick="return doSubmit();">下一步</button>
                    </div>
                    <div class="form-message">
                        <div id="cmsgSubmit" class="h3 text-center hidden"></div>
                    </div>
                </form>
                <!-- end of standard form -->
            </div>
            <!-- end of col -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of container -->
</div>
<!-- end of form-3 -->
<!-- end of content -->

<style>
    .Wdate {
        border: #445266 1px solid;
         width: 100%;
        background-color: #445266;
    }
</style>

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
<script src="/js/DatePicker/WdatePicker.js"></script>

<script>
    $(function () {

        $(document).on("click","#birthday" ,function(e){
            // var rowid = $(e.target).parents("tr").attr("rowid");
            WdatePicker({
                el: e.target,
                autoPickDate: true,
                dateFmt:"yyyy-MM-dd",
                lang:"zh-tw",
                // lang:"en"
                // dateFmt:"yyyy-MM-dd HH:mm:ss",
                // maxDate:"#F{$dp.$D('noticeendtime' + rowid + '')}"
            });
        });

        <?php if($resume['fullname']) { ?>
        $('#fullname').val("<?php echo $resume['fullname'];?>");
        $('#fullname').addClass('notEmpty');
        <?php } ?>

        <?php if($resume['nickname']) { ?>
        $('#nickname').val("<?php echo $resume['nickname'];?>");
        $('#nickname').addClass('notEmpty');
        <?php } ?>

        <?php if($resume['birthday']) { ?>
        $('#birthday').val("<?php echo $resume['birthday'];?>");
        $('#birthday').addClass('notEmpty');
        <?php } ?>

        <?php if($resume['mobile']) { ?>
        $('#mobile').val("<?php echo $resume['mobile'];?>");
        $('#mobile').addClass('notEmpty');
        <?php } ?>

        <?php if($resume['address']) { ?>
        $('#address').val("<?php echo $resume['address'];?>");
        $('#address').addClass('notEmpty');
        <?php } ?>

        <?php if($resume['nationality']) { ?>
        $('input[name=nationality][value=<?php echo $resume['nationality'];?>]').prop('checked', true);
        <?php } ?>

        <?php
            if($resume['hasIdCard']) {
                $hasIdCards = explode("!@#$", $resume['hasIdCard']);
                foreach ($hasIdCards as $hasIdCard) {
        ?>
                $('#hasIdCard<?php echo sprintf("%02d", $hasIdCard);?>').prop('checked', true);
        <?php
                }
            }
        ?>

        <?php if($resume['education']) { ?>
        $('input[name=education][value=<?php echo $resume['education'];?>]').prop('checked', true);
        <?php } ?>

        <?php if($resume['study_status']) { ?>
        $('input[name=study_status][value=<?php echo $resume['study_status'];?>]').prop('checked', true);
        <?php } ?>

        <?php if($resume['military_service_status']) { ?>
        $('input[name=military_service_status][value=<?php echo $resume['military_service_status'];?>]').prop('checked', true);
        <?php } ?>

        <?php if($resume['disability_status']) { ?>
        $('input[name=disability_status][value=<?php echo $resume['disability_status'];?>]').prop('checked', true);
        <?php } ?>

        <?php if($resume['pipeline']) { ?>
        $('input[name=pipeline][value=<?php echo $resume['pipeline'];?>]').prop('checked', true);
        <?php } ?>

    });

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

        $('#wait_content').show();
        $('#wait').show();

        $('#StandardForm').submit();
    }
</script>