<style>
.panel-title {
	color: #000;
	font-size: 18px;
	text-align: center;
}

.user-form {
	margin-top: 25px;
}

.form-group {
	margin-top: 15px;
	margin-bottom: 15px;
}

.form-group .label {
	text-align: right;
	margin-top: 7px;
}

.form-group .column {
	text-align: right;
}

.captcha-label {
	width: 100%;
	float: none;
}

.captcha-input {
	margin-left: 30px;
}

div#aaaaa {
    /*float: left;*/
    padding-top: 32px;
    width:110%;
}
#captcha-image {
	height: auto;
    margin: 0;
    float: left;
    width: 180px;
    padding-top:10px;
}

.bs-callout {
	padding: 20px;
	margin: 20px 0;
	border: 1px solid #eee;
	border-left-width: 5px;
	border-radius: 3px;
}

.bs-callout-info {
	border-left-color: #1b809e;
}

.bs-callout-error {
	border-left-color: #1b809e;
}

.bs-callout-warring {
	border-left-color: #FF002A;
}

label {
	font-size: 18px;
	font-weight: normal;
	text-align: center;
}

input {
	font-size: 16px;
	font-weight: normal;
}

@media ( max-width : 768px) {
	.form-group .label {
		text-align: center;
		margin-top: 7px;
	}
}

#captcha-form {
	margin-left: -10px;
	display: inline-block;
}

.btn-reload {
	/* 	  margin-top: -5px; */
	/* 	  margin-left: -4px; */
	color: #0A41AF;
}

.btn-forgotten {
	background-color: #fff;
	background-image: none;
}

.btn-forgotten:hover {
	background-color: #f0f0f0;
}

@media ( max-width : 992px) {
	.captcha-label {
		float: none;
		text-align: center;
	}
	.captcha-input {
		text-align: center;
	}
	#captcha-form {
		width: 160px;
		margin-left: -20px;
	}
	.form-horizontal .form-group {
		text-align: center;
	}
	.form-control {
		margin: 0 auto;
		margin-left: 20px;
	}
	.panel-footer>.pull-right {
		float: none !important;
		text-align: center;
	}
}
.member-login.title{
	color: #9775ac;
    font-size: 20px;
    display: inline-block;
    margin-right: 10px;
    float: left;
	font-weight: bold;

}
.member-login.subtitle{
	display: inline-block;
    margin-top: 6px;
}
#col-xs-12{
	margin-left: 25px;
}
.login-footer {
    margin-left: 20px;
}
.member-register.subtitle{
	display: inline-block;
    margin-top: 6px;
	margin-left: 20px;
}
.member-register.title{
	color: #9775ac;
    font-size: 20px;
    display: inline-block;
    margin-right: 30px;
	margin-left: 20px;
	font-weight: 900;
}
#login-footer{
	margin-left: 20px;
    margin-top: 20px;
}
#panel-border{
	width: 780px;
	max-width: 100%;
	margin: 0 auto;
	margin-top: 30px;
    margin-bottom: 20px;
	border-top-color: #9775ac;
}
@media screen  and (min-width: 768px) and (max-width: 991px){
	.captcha-input {
		margin-left:0px;
		width: 85%;
	}
}
@media screen  and (max-width: 767px){
	.captcha-input {
     	margin-left: 0px; 
		width: 85%;
	}
	#col-sm-6{
		margin-top: 20px;
	}
}
@media screen  and (max-width: 320px){
	#captcha-image {
		height: auto;
		margin: 0;
		float: left;
		width: 50%;
	}
}
header.navbar.navbar-default.navbar-fixed-top.yamm.container.hidden-xs.hidden-sm .row.logo-row.desktop .pullRight .hight-light-block .form-group{
	    margin-top: 0px;
}
.login-login:after {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    height: 100%;
    border-right: 1px solid #cecece;
}
</style>
<div class="container">
	<div class="section p15">
		<div class="row">
			<div class="col-sm-12 col-xs-12">	
		<?php
  if ( isset( $opt [ 'status' ] ) && $opt [ 'status' ] == true )
  {
    ?>
			<div class="bs-callout bs-callout-warring alert alert-dismissible">
					<button type="button" class="close" data-dismiss="alert"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4>登入失敗 !</h4>
			<?php
    foreach ( $opt [ 'message' ] as $msg )
    {
      ?>
				<p><?php echo $msg;?></p>
			<?php
    }
    ?>
			</div>
		<?php
  }
  ?>
		</div>
		</div>
		<form class="form-horizontal" role="form" method="post"
			action="/user/login" name="login_form" id="login_form">
			<div class="panel panel-info panel-border top" id="panel-border">
				<div class="panel-heading text-center">
					<span class="panel-title"><?php echo $objLang["login"]['panelTitle'];?></span>
				</div>
				<div class="panel-body" style="padding: 35px 20px;">

					<form class="form-horizontal" role="form" method="post" action="/user/login" name="login_form" id="login_form">
						<?php if($_GET['redirectURL']!=''){	?>
							<input type="hidden" name="redirectURL" id="redirectURL" value="<?php echo $_GET['redirectURL'];?>">
						<?php } ?>
						<div class="row">
							<div class="login-login col-sm-6">
								<div class="member-login title"><?php echo $objLang["login"]['panelTitle'];?></div>
								<div class="member-login subtitle"><?php echo $objLang["login"]['checkLoginTitle'];?>
									</div>
								<div class="form-box">
									<div class="form-group">
										<label for="username" class="col-xs-4 control-label"><?php echo $objLang["login"]['username_Label'];?></label>
										<div class="col-xs-8">
											<input type="text" class="form-control" name="username" id="username" placeholder="<?php echo $objLang["login"]['username_placeholder'];?>" required>
										</div>
									</div>
									<div class="form-group">
										<label for="password" class="col-xs-4 control-label"><?php echo $objLang["login"]['password_Label'];?></label>
										<div class="col-xs-8">
											<input type="password" class="form-control" name="password"
												id="password"
												placeholder="<?php echo $objLang["login"]['password_placeholder'];?>"
												required>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12" id="col-xs-12">
											<div class="captcha-label">
												<img id="captcha-image" class="responsive"
													src="<?php echo "/core/captcha.php?t=".time();?>" />
												<div id="aaaaa">
													<a class="reload" onclick="document.getElementById('captcha-image').src='/core/captcha.php?'+Math.random(); document.getElementById('verification-code').focus();"> <i class="fa fa-repeat" style="font-size: 20px;padding-right: 5px;"></i><span style="color:#d64b96;"> 更新驗證碼 </span></a>
											</a>
													</div>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12 captcha-input">
											<input id="captcha-form" placeholder="<?php echo $objLang["login"]['captchaPlaceholder'];?>" type="text"
												name="captcha" class="form-control" maxlength="10"
												pattern="^([_A-z0-9]){3,10}$" required /> 
												 <span class="help-block with-errors"></span>
										</div>
									</div>
								</div>

								<div class="login-footer">

									<button type="submit" class="btn btn-default btn-submit"><?php echo $objLang["login"]['sign_in'];?></button>
									<a class="btn btn-default btn-forgotten" href="/user/forgot"><?php echo $objLang["login"]['forget_password'];?></a>
									<div class="clearfix"></div>
									<?php if ($isMemberCheckFacebook){?>
									<div class="text-center" style="margin-top: 10px; margin-right:230px;">
										<fb:login-button scope="public_profile,email"
											onlogin="checkLoginState();"><?php echo $objLang["login"]['facebookLoginTitle'];?>
										</fb:login-button>
									</div>
									<div class="clearfix"></div>
									<?php }?>


								</div>
							</div>
							<div class="login-register col-sm-6" id="col-sm-6">
								<div class="member-register title"><?php echo $objLang["login"]['registerTitle'];?></div>
								<div class="member-register subtitle">									
									<?php echo $objLang["login"]['checkRegisterTitle'];?>
									</div>
								<div class="login-footer" id="login-footer">
									<a class="btn btn-default btn-member" id="btn-member" href="/user/register"><?php echo $objLang["login"]['registerButtonTitle'];?></a>
								</div>
							</div>
						</div>
					</form>
				</div>

			</div>
			<!-- //MAIN CONTENT -->
		</form>
	</div>
</div>
<script><!-- 重發認證信使用-->
function reActive(username){
	$('#login_form').attr('action','/user/reActive');
	$('#username').val(username);
	$('#login_form').submit();

}
</script>

<script><!-- FB登入使用-->
 function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }


window.fbAsyncInit = function() {
  FB.init({
    appId      : '1218587754861554' ,
    // appId      : '1218587754861554' ,
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.4' // use version 2.2
  });
  // Load the SDK asynchronously
	(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }
};

  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    if (response.status === 'connected') {

      fbLoginAPI();
    } 

  }

  function revoke(){
		FB.api('/me/permissions', 'delete', function(response) {
      		console.log(JSON.stringify(response));
    	});
	}

function fbLoginAPI() {
    FB.api('/me' ,{ fields: 'name, gender , birthday ,email'  } ,function(responseFB) {
      	console.log("3:"+ JSON.stringify( responseFB ) );
     	console.log('Successful login for: ' + responseFB.name + ":" + responseFB.gender + ":" + responseFB.birthday + ":" + responseFB.email  );
     	var name = ( responseFB.name != "undefined" ) ? responseFB.name :"" ;
		var email = ( responseFB.email != "undefined" ) ? responseFB.email :"" ;
     	var birthday = ( responseFB.birthday != "undefined" ) ? responseFB.birthday :"" ;
     	var gender = "" ;
     	if ( responseFB.gender != "undefined" ) {
     		gender = (responseFB.gender == "male") ? "M" : "F" ;
     	}

     	$.ajax({
		 url: "/user/checkUserForFBLogin",
		 type:"POST",
		 dataType:'json',
		 data:{ 'nickname' : name ,
		 		'username' : name ,
		 	 	'mail' : email ,
		 	 	'birthday' : birthday, 
		 	 	'gender' : gender },
		 	success: function(data,status,xhr){
		 	//console.log(data,status,xhr) ;
		 	if(data.resp=="1") {  //user/profile
		 		location.href = data.url ; 
		 	}
		 	else if(data.resp=="2") {
		 		location.href = data.url ; 
		 	}
		 	else if(data.resp=="3") { //login error   3 => email 已經使用 於正常會員
				PM.erro({
					title:'Facebook 登入失敗',
					text:'帳號 或 Email 已經使用，請更換再試！'
				});
		 	}
		 	else{  // "0" => 一般錯誤
		 		PM.erro({
					title:'Facebook 登入失敗',
					text:'登入失敗'
				});
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


    });
}


</script>

