
<?php include(VIEWPATH . "widget" . DIRECTORY_SEPARATOR . "home" . DIRECTORY_SEPARATOR . "preloader.php"); ?>
<?php include(VIEWPATH . "widget" . DIRECTORY_SEPARATOR . "home" . DIRECTORY_SEPARATOR . "navbar.php"); ?>

<!-- Header -->
<header id="header" class="ex-header-hidden">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
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
                    <li class="list-inline-item"><a class="underline" href="index.php">首頁</a>
                    </li>
                    <li class="list-inline-item"><i class="fa fa-angle-double-right"></i>
                    </li>
                    <li class="list-inline-item">求職者申請帳號</li>
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
<div class="form-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center"><span class="purple-light">求職者</span>申請帳號</h2>
            </div>
            <!-- end of col -->
        </div>
        <!-- end of row -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Standard Form -->
                <form id="StandardForm" data-toggle="validator" data-focus="false" method="post" action="/user/register" name="login_form">
                    <input type="hidden" name="redirectURL" id="redirectURL" value="<?php echo isset($opt['old']['redirectURL'])?$opt['old']['redirectURL']:$redirectURL?>">
                    <div class="form-group">
                        <input type="text" class="form-control-input" name="mail" id="mail" required>
                        <label class="label-control" for="cusername">E-mail</label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control-input" name="password" id="password" autocomplete="off" required>
                        <label class="label-control" for="password"> <?php echo $objLang["register"]['password_Label'];?> </label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control-input" id="retypepassword" name="retypepassword" autocomplete="off" required>
                        <label class="label-control" for="retypepassword"> <?php echo $objLang["register"]['retypepassword_Label'];?> </label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control-input" id="captcha-form" name="captcha" maxlength="10" pattern="^([_A-z0-9]){3,10}$" required>
                        <label class="label-control" for="captcha"> <?php echo $objLang["register"]['captcha_Label'];?> </label>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group">
                        <div class="captcha-label">
                            <img id="captcha-image" class="responsive" src="<?php echo "/core/captcha.php?t=".time();?>" />
                            <div id="aaaaa">
                                <a class="reload" onclick="document.getElementById('captcha-image').src='/core/captcha.php?'+Math.random();
																	   document.getElementById('verification-code').focus();">
                                    <i class="fa fa-repeat" style="font-size: 20px;padding-right: 5px;"></i>
                                    <span style="color:#d64b96; cursor: pointer"> 更新驗證碼 </span>
                                </a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <button type="button" class="form-control-submit-button" onclick="return doSubmit();">加入</button>
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

<script>
    function doSubmit() {

        var theEmail = $('#mail').val();
        if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(theEmail))){
            alert("「電子信箱」欄位輸入格式不符");
            $('#mail').focus();
            return false;
        }
        else {

            $.ajax({
                url: "/user/checkEmailAvailable",
                type:"POST",
                dataType:'json',
                data:{ 'mail' : theEmail },
                success: function(data,status,xhr){
                    //console.log(data,status,xhr) ;
                    if (!data.resp) {
                        alert('<?php echo $objLang["register"]["fieldAlreadyUsed"];?>');
                        $('#mail').focus();
                        return false;
                    }
                },
                error:function(xhr, ajaxOptions, thrownError){
                    //console.log(xhr, ajaxOptions, thrownError) ;
                    /*PM.erro({
                        title:"",
                        text:""
                    });*/
                }
            });
        }

        var mypass = $('#password').val();
        var re = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/;
        var regex1 = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,30}$/;	    //至少有一個數字、至少有一個大寫或小寫英文字母、至少有一個特殊符號、字串長度在 8 ~ 30 個字母之間
        var regex2 = /^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,30}$/;	//至少有一個數字、至少有一個大寫或小寫英文字母、至少有一個特殊符號、字串長度在 6 ~ 30 個字母之間
        var regex3 = /^(?=.*d)(?=.*[a-zA-Z]).{6,30}$/;	            //至少有一個數字、至少有一個大寫或小寫英文字母、字串長度在 6 ~ 30 個字母之間
        // var newPWPass = mypass.match(/^([_A-z0-9]){8,20}$/g);
        var result = regex2.test(mypass);
        // var result2 = regex2.test(mypass);
console.log(result);
        if(result==false) {
            alert('密碼為數字與英文，且至少8碼以上！');
            $('#password').focus();

            return false;
        }

        var retypePass = $('#retypepassword').val();
        if(retypePass!= mypass) {
            alert('密碼與確認密碼不一致！');
            $('#retypepassword').focus();

            return false;
        }

        $('#StandardForm').submit();

    }

    function checkEmail(self) {
        // alert($(self).val());
        var theEmail = $(self).val();
        if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(theEmail))){
            alert("「電子信箱」欄位輸入格式不符");
            //PM.erro({
            //    title:'<?php //echo $objLang["register"]["panelTitle"];?>//',
            //    text:'「電子信箱」欄位輸入格式不符！'
            //});
            $('#mail').focus();
            return false;
        }
        else {

            $.ajax({
                url: "/user/checkEmailAvailable",
                type:"POST",
                dataType:'json',
                data:{ 'mail' : $(self).val() },
                success: function(data,status,xhr){
                    //console.log(data,status,xhr) ;
                    if (!data.resp) {
                        alert('<?php echo $objLang["register"]["fieldAlreadyUsed"];?>');
                        //PM.erro({
                        //    title:'<?php //echo $objLang["register"]["panelTitle"];?>//',
                        //    text:'<?php //echo $objLang["register"]["fieldAlreadyUsed"];?>//'
                        //});
                        $(self).focus();
                        return false;
                    }
                },
                error:function(xhr, ajaxOptions, thrownError){
                    //console.log(xhr, ajaxOptions, thrownError) ;
                    /*PM.erro({
                        title:"",
                        text:""
                    });*/
                }
            });

        }
    }

    function checkUserPWD(self){
        // alert($(self).val());
        var mypass = $(self).val();
        var re = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{6,}$/;
        //var newPWPass = mypass.match(/^([_A-z0-9]){8,20}$/g);
        if(!re.test(mypass)) {
            alert('密碼為數字與英文，且至少8碼以上！');
            //PM.error({
            //    title:'<?php //echo $objLang["register"]["panelTitle"];?>//',
            //    text:'<?php //echo $objLang["register"]["password_placeholder"];?>//'
            //});
            $(self).focus();
            return false;
        }
        //if (newPWPass == null) {
        //    PM.erro({
        //        title:'<?php //echo $objLang["register"]["panelTitle"];?>//',
		//	    text:'<?php //echo $objLang["register"]["password_placeholder"];?>//'
		//    });
		//    $(self).focus();
	    //}
    }

    function checkRetypePWD(self) {
        var retypePass = $(self).val();
        if(retypePass!=$('#password').val()) {
            alert('密碼與確認密碼不一致！');
            $(self).focus();
            return false;
        }
    }
</script>