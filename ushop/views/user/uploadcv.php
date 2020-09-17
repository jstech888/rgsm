
<?php include(VIEWPATH . "widget" . DIRECTORY_SEPARATOR . "home" . DIRECTORY_SEPARATOR . "preloader.php"); ?>
<?php include(VIEWPATH . "widget" . DIRECTORY_SEPARATOR . "home" . DIRECTORY_SEPARATOR . "navbar.php"); ?>

<!-- Header -->
<header id="header" class="ex-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>英文畢業證書 / 履歷表</h1>
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
                    <li class="list-inline-item">英文畢業證書 / 履歷表</li>
                </ul>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of ex-basic-1 -->
<!-- end of breadcrumbs -->


<!-- Content -->
<div class="ex-basic-2">
    <div class="container">
        <div class="row">

            <div class="col-md-3 col-sm-12">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action" href="/user/apply" role="tab" aria-controls="dploma-1">個人履歷資料</a>
                    <a class="list-group-item list-group-item-action active" href="javascript:void(0);" role="tab" aria-controls="dploma-2">英文畢業證書 / 履歷表</a>                    
                    <a class="list-group-item list-group-item-action " href="" role="tab" aria-controls="dploma-3">應徵狀態查詢</a>
                    <a class="list-group-item list-group-item-action" href="/user/logout" role="tab" aria-controls="dploma-4">登出</a>
                </div>
            </div>
            <!-- end of col -->

            <div class="col-md-9 col-sm-12">
                <!-- Standard Form -->
                <form id="StandardForm" data-toggle="validator" data-disable="false" data-focus="false" method="post" action="/user/add_cv" target="actFrame" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id" value="<?php echo $resumeid;?>" />
                    <input type="hidden" id="act" name="act" value="" />
                    <div class="form-group">
                        <label class="col-sm-12" for="cdiploma"><span class="text-danger">*</span>上傳英文畢業證書</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control-input" id="uploadfile01" name="uploadfile01" <?php echo $uploadfiles->file01 ? "":"required";?> />
                            <input type="hidden" id="uploadfile01_ori" name="uploadfile01_ori" value="<?php echo $uploadfiles->file01;?>"/>
                            <?php if($uploadfiles->file01) { ?>
                                目前檔案: <?php echo $uploadfiles->file01 ;?> <a href="<?php echo $resume["path"];?>/<?php echo $uploadfiles->file01 ;?>" target="_blank"> [檢視] </a>
                            <?php } ?>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12" for="ccover"><span class="text-danger">*</span>上傳履歷表</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control-input" id="uploadfile02" name="uploadfile02" <?php echo $uploadfiles->file02 ? "":"required";?> />
                            <input type="hidden" id="uploadfile02_ori" name="uploadfile02_ori" value="<?php echo $uploadfiles->file02;?>"/>
                            <?php if($uploadfiles->file02) { ?>
                                目前檔案: <?php echo $uploadfiles->file02 ;?> <a href="<?php echo $resume["path"];?>/<?php echo $uploadfiles->file02 ;?>" target="_blank"> [檢視] </a>
                            <?php } ?>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12" for="ccover"><span class="text-danger">*</span>證照</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control-input" id="uploadfile03" name="uploadfile03" <?php echo $uploadfiles->file03 ? "":"required";?> />
                            <input type="hidden" id="uploadfile03_ori" name="uploadfile03_ori" value="<?php echo $uploadfiles->file03;?>"/>
                            <?php if($uploadfiles->file03) { ?>
                                目前檔案: <?php echo $uploadfiles->file03 ;?> <a href="<?php echo $resume["path"];?>/<?php echo $uploadfiles->file03 ;?>" target="_blank"> [檢視] </a>
                            <?php } ?>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12" for="ccover"><span class="text-danger"></span>證照2</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control-input" id="uploadfile04" name="uploadfile04" />
                            <input type="hidden" id="uploadfile04_ori" name="uploadfile04_ori" value="<?php echo $uploadfiles->file04;?>"/>
                            <?php if($uploadfiles->file04) { ?>
                                目前檔案: <?php echo $uploadfiles->file04 ;?> <a href="<?php echo $resume["path"];?>/<?php echo $uploadfiles->file04 ;?>" target="_blank"> [檢視] </a>
                            <?php } ?>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12" for="ccover"><span class="text-danger"></span>證照3</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control-input" id="uploadfile05" name="uploadfile05" />
                            <input type="hidden" id="uploadfile05_ori" name="uploadfile05_ori" value="<?php echo $uploadfiles->file05;?>"/>
                            <?php if($uploadfiles->file05) { ?>
                                目前檔案: <?php echo $uploadfiles->file05 ;?> <a href="<?php echo $resume["path"];?>/<?php echo $uploadfiles->file05 ;?>" target="_blank"> [檢視] </a>
                            <?php } ?>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="btn1" class="form-control-submit-button">Confirm Modification</button>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="btn2" class="form-control-purple-button">Send To RGSM</button>
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
    $(function(){

        $("#StandardForm").validator().on("submit", function(event) {

            if (event.isDefaultPrevented()) {
                // handle the invalid form...
                validator = 0;
            } else {
                // everything looks good!
                event.preventDefault();
            }
        });

        $('#btn1').on("click", function(event) {

            if(confirm('確定送出?')) {
                $('#act').val(1);
                $('#StandardForm').unbind('submit');
                $('#wait_content').show();
                $('#wait').show();
                $('#StandardForm').submit();
            }

        });

        $('#btn2').on("click", function(event) {

            if(confirm('確定送出?')) {
                $('#act').val(2);
                $('#StandardForm').unbind('submit');
                $('#wait_content').show();
                $('#wait').show();
                $('#StandardForm').submit();
            }

        });

    });
</script>