<style>
.page-content {
  text-align: center;
}
.page-artical {
  padding: 0 15px;
  margin: 0 auto;
  display: inline-block;
  text-align: left;
  float: initial;
}
.page-artical p {
  line-height: 30px;
  font-size: 16px;
}
.page-block {
  margin: 0 auto;
  margin-top: 15px;
  float: none;
}
.page-title {
  padding: 0 15px;
  font-size: 26px;
  font-weight: 900;
}
.page-artical span {
    font-size: 17px !important;
}
</style>
<div class="container">
	<div class="row mt5">
		<?php if( !isset($infopage['image']['url']) || $infopage['image']['url'] == "/uploads/sample-icon.png" ) { ?>
			<div class="col-sm-10 col-md-10 page-block mb25">	
				<div class="page-title"><?php echo $infopage['title'];?></div>
				<div class="page-artical">
					<?php echo $infopage['content'];?>
				</div>
			</div>

			<?php if ( isset($mainKey) && $mainKey == "ContactUs"  ) {?>

				<style>
				.page-contactus {
				    padding: 5px 15px;
				    text-align: left;
				}
				.page-contactus .col-md-5, .page-contactus .col-md-6, .page-contactus .col-md-7, .page-contactus .col-md-12 {
				    margin: 10px 0;
					padding-left:0px;
				}
				.page-contactus textarea.form-control {
					border-radius: 0;
				  	background-color: #f5f5f5;
				  	height: 100px;
				}
				
				.page-contactus .form-control {
					border-radius: 0;
					background-color: #f5f5f5;
					height: 42px;
				}
				.page-contactus .btn-contactus {
				  	background: #86599c;
				    color: white;
				    padding: 12px 25px;
				    font-size: 16px;
				    border: none;
				    cursor: pointer;
				    border-radius: 0;
				} 
				.page-contactus .btn-contactus:hover {
				  	background-color: #4f156d;
				  	color: #FFF;
				}
				</style>
				<!-- 這一段新增的東西 要顯示在 聯絡我們頁面的底下 -->
				<div class="page-contactus col-sm-10 col-md-10 page-block mb25">
					<p class="col-md-12"><?php /*感謝您參觀超啟有限公司的網站，如果您有任何問題或意見可以與我們意見交流，我們將儘快為您答覆或改進。<br>如有立即回復之需求，亦可於週一~週五AM8:30~PM5:30來電客服*/?></p>	
					<form class="form-horizontal" id="contact-form" method="post">
					  <div class="col-md-5">
					    <input type="text" class="form-control" name="name" id="name" placeholder="姓名*" required >
					  </div>
					  <div class="col-md-7">
					    <input type="email" class="form-control" name="email" id="email" placeholder="電子信箱*" required>
					  </div>
					  <div class="col-md-5">
					    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="聯絡手機*" required>
					  </div>
					  <div class="col-md-7">
					    <input type="text" class="form-control" name="phone" id="phone" placeholder="聯絡電話" >
					  </div>
					  <div class="col-md-12">
					    <input type="text" class="form-control" name="address" id="address" placeholder="住址" >
					  </div>
					  <div class="col-md-12">
					    <input type="text" class="form-control" name="subject" id="subject" placeholder="訂單編號" value="<?php echo $transId;?>">
					  </div>
					  <div class="col-md-12">							    
					    <textarea class="form-control" rows="6" name="message" id="message" placeholder="訊息內容*" required><?php if($transId!='') echo "我想要取消訂單，訂單編號為 ".$transId;?></textarea>
					  </div>
					  <div class="col-md-12">
					  	<input class="btn btn-default btn-contactus" type="submit" value="送出訊息">
			  		</div>						  
				  </form>					
				</div>
				<!-- 到這裡 -->				
			<?php }?>

			<div class="clearfix"></div>	
		<?php } else { ?>
			<div class="col-sm-12">
				<img  style="width:100%;" class="img-responsive" src="<?php echo isset($infopage['image']['url'])?$infopage['image']['url']:"";?>">
			</div>
			<div class="clearfix"></div>
			<div class="col-sm-10 col-md-10 page-block mb25">	
				<div class="page-title"><?php echo $infopage['title'];?></div>
				<div class="page-artical">
					<?php echo $infopage['content'];?>
				</div>
			</div>
			<div class="clearfix"></div>	
		<?php } ?>
	</div>
</div>

<?php if ( isset($mainKey) && $mainKey == "ContactUs"  ) {?>
<script>
$( "#contact-form" ).submit(function( event ) {
    //e.preventDefault();
    var data = {
        name: $("#name").val(),
        email: $("#email").val(),
        mobile: $("#mobile").val(),
        phone: $("#phone").val(),
        address: $("#address").val(),
        subject: $("#subject").val(),
        message: $("#message").val()
    };

    $.ajax({
        type: "POST",
        url: "/contact/contactUs",
        data: data,
        success: function(msg) {
        	PM.show({
				type: "info",
				title:"<?php echo isset($functionBar["contactUs"])?$functionBar["contactUs"]:"聯絡我們";?>",
				text:"<?php echo isset($functionBar["contactUsSuccess"])?$functionBar["contactUsSuccess"]:"訊息已送出,我們將儘快為您答覆或改進。";?>"
			});	
          //console.log(msg);
            //$('#contact-form .input-success').delay(500).fadeIn(1000);
            //$('#contact-form .input-error').fadeOut(500);
        }
    });
    return false;
}); 
</script>
<?php }?>

<?php if ( isset($mainKey) && $mainKey == "activity"  ) {?>
	<div class="quick-view-box modal fade" id="please-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
		<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body quick-view-content">
						<div class="panel-body">

		<form class="form-horizontal" role="form" method="post" action="/user/login" name="login_form" id="login_form">
			<div class="panel panel-info panel-border top" id="panel-border">
				<div class="panel-heading text-center">
					<span class="panel-title">會員登入</span>
				</div>
				<div class="panel-body" style="padding: 35px 20px;">

					
						<div class="row">
							<div class="login-login col-sm-6">
								<div class="member-login title">會員登入</div>
								<div class="member-login subtitle">請先登入會員方可開始進行結帳									</div>
								<div class="form-box">
									<div class="form-group">
										<label for="username" class="col-xs-4 control-label">帳號</label>
										<div class="col-xs-8">
											<input type="text" class="form-control" name="username" id="username" placeholder="帳號 或 信箱" required="">
										</div>
									</div>
									<div class="form-group">
										<label for="password" class="col-xs-4 control-label">密碼</label>
										<div class="col-xs-8">
											<input type="password" class="form-control" name="password" id="password" placeholder="密碼" required="">
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12" id="col-xs-12">
											<div class="captcha-label">
												<img id="captcha-image" class="responsive" src="/core/captcha.php?t=1467708769">
												<div id="aaaaa">
													<a class="reload" onclick="
                      document.getElementById('captcha-image').src='/core/captcha.php?'+Math.random();
                      document.getElementById('verification-code').focus();"> <i class="fa fa-repeat" style="font-size: 20px;padding-right: 5px;"></i><span style="color:#d64b96;"> 更新驗證碼 </span></a>
											
													</div>
											</div>
											<div class="clearfix"></div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12 captcha-input">
											<input id="captcha-form" placeholder="字母請注意大小寫" type="text" name="captcha" class="form-control" maxlength="10" pattern="^([_A-z0-9]){3,10}$" required=""> 
												 <span class="help-block with-errors"></span>
										</div>
									</div>
								</div>

								<div class="login-footer">

									<button type="submit" class="btn btn-default btn-submit">登入</button>
									<a class="btn btn-default btn-forgotten" href="/user/forgot">忘記密碼?</a>
									<div class="clearfix"></div>
																		<div class="text-center" style="margin-top: 10px; margin-right:230px;">
										<fb:login-button scope="public_profile,email" onlogin="checkLoginState();" login_text="Facebook 登入										" class=" fb_iframe_widget" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=1476717775968478&amp;container_width=0&amp;locale=zh_TW&amp;login_text=Facebook%20%E7%99%BB%E5%85%A5&amp;scope=public_profile%2Cemail&amp;sdk=joey"><span style="vertical-align: bottom; width: 116px; height: 22px;"><iframe name="fc11406df95a4" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:login_button Facebook Social Plugin" src="https://www.facebook.com/v2.4/plugins/login_button.php?app_id=1476717775968478&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D42%23cb%3Df1e3577eaa99fc%26domain%3Dbeautywomantest2.mooo.com%26origin%3Dhttp%253A%252F%252Fbeautywomantest2.mooo.com%252Ff3228920b5b49f8%26relation%3Dparent.parent&amp;container_width=0&amp;locale=zh_TW&amp;login_text=Facebook%20%E7%99%BB%E5%85%A5&amp;scope=public_profile%2Cemail&amp;sdk=joey" class="" style="border: none; visibility: visible; width: 116px; height: 22px;"></iframe></span></fb:login-button>
									</div>
									<div class="clearfix"></div>
									

								</div>
							</div>
							<div class="login-register col-sm-6" id="col-sm-6">
								<div class="member-register title">新會員註冊</div>
								<div class="member-register subtitle">									
									完成會員註冊程序即可開始購物 (結帳)									</div>
								<div class="login-footer" id="login-footer">
									<a class="btn btn-default btn-member" id="btn-member" href="/user/register">點此加入會員</a>
								</div>
							</div>
						</div>				
					</div>
				</div>
			</form>
			<!-- //MAIN CONTENT -->
		</div>
			</div>
		</div>
	</div>
</div>
<?php }?>