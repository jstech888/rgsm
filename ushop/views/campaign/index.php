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
.test span{font-size:48px;}
#input-notescol-sm-5{
	margin-top: 5px;
	padding-left: 0px;
	color: #F00;
}
.form-box{
	width: 80%;
}
.panel-info.panel-border.top{
	border-color: #9775ac;
}
</style>
<script type="text/javascript">
$(function(){

	<?php if($error['sn']!=''){ ?>
		alert("<?php echo $error['sn'];?>");
		$('#sn').focus();
	<?php } ?>
	
	<?php if($error['recaptcha']!=''){ ?>
		alert("<?php echo $error['recaptcha'];?>");
		$('#recaptcha').focus();
	<?php } ?>

    $('#refresh_captcha').on('click',function(){
        $.ajax({url:'<?php echo site_url('campaign/refresh_captcha')?>',
            data:{_r:Math.random()},
            success:function(data){
            $('#recaptcha_image').html(data);
        }});
    });

});
</script>

<div class="container">
	<div class="row mt5">

	<div class="col-sm-10 col-md-10 page-block mb25">	
		<div class="page-title"></div>
		<div class="page-artical">
			<p style="text-align:center"><img alt="" height="1097" src="/ckfinder/userfiles/files/Banner/banner.jpg" width="1020"></p>
							
				<div class="box">
					<div class="panel panel-info panel-border top user-form">
						<form method="post" action="" name="login_form">
							<input type="hidden" name="_r" value="<?php echo rand()?>">
							<input type="hidden" name="step" value="">

							<div class="panel-heading text-center">
								<span class="panel-title">請輸入序號及認證碼</span>
							</div>
							<div class="panel-body">
								<div class="form-group">
									<label for="sn" class="col-sm-3 control-label text-right">抽獎序號 <sup style="color: red">*</sup></label>
									<div class="col-sm-7">
										<input type="text" class="registerformValue form-control" name="sn" id="sn" placeholder="請輸入抽獎序號" value="<?php $this->input->post('sn')?>" required="">									
										<div class="input-notes" id="input-notescol-sm-5">(&nbsp;輸入蘭吉兒盒內所贈抽獎券上10碼序號，請確實填寫，謝謝。)</div>
										<?php echo @$error['sn']?>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="form-group">
									<label for="recaptcha" class="col-sm-3 control-label text-right">驗證碼 <sup style="color: red">*</sup></label>
									<div class="col-sm-7">
										<input type="text" class="registerformValue form-control" name="recaptcha" id="recaptcha" placeholder="請輸入認證碼" value="" required="" style="margin-bottom:10px;">
										<span id="recaptcha_image"><?php echo $cap['image']?></span>&nbsp;&nbsp;<a href="javascript:;" id="refresh_captcha">[更新驗證碼]</a>
										<?php echo @$error['recaptcha']?>
									</div>
								</div>
								<br>
								<br>
								<div class="clearfix"></div>
								<div class="clearfix"></div>
								<div class="clearfix"></div>
							</div>		
							<div class="panel-footer">
								<div class="text-center">
									<button type="button" onclick="history.back();" class="btn btn-default btn-lg pull-right" style="margin-left: 10px;" value="">取消返回</button> 
								</div>

								<div class="text-center" style="margin-right:10px;">
									<button type="submit" name="do" class="btn btn-default btn-submit btn-lg pull-right" value="抽獎">進行抽獎</button> 
								</div>
								
								<div class="clearfix"></div>
							</div>
						</form>
					</div>
				</div>
			</form>


			<?php /*<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:1020px">
				<tbody>
					<tr>
						<td>												
							<div class="form-box">						
								<div class="form-group">
									<label for="sn" class="col-sm-3 control-label">請輸入抽獎序號 <sup style="color: red">*</sup></label>
									<div class="col-sm-9">
										<input type="text" class="registerformValue form-control" name="sn" id="sn" placeholder="請輸入抽獎序號" value="<?php $this->input->post('sn')?>" required="">									
										<div class="input-notes" id="input-notescol-sm-5">(&nbsp;輸入蘭吉兒盒內所贈抽獎券上10碼序號，請確實填寫，謝謝。)</div>
										<?php echo @$error['sn']?>
									</div>
								</div>
								<div class="form-group">
									<label for="recaptcha" class="col-sm-3 control-label">驗證碼 <sup style="color: red">*</sup></label>
									<div class="col-sm-9">
										<input type="text" class="registerformValue form-control" name="recaptcha" id="recaptcha" placeholder="請輸入認證碼" value="" required="">									
										<?php echo $cap['image']?>
										<?php echo @$error['recaptcha']?>
									</div>
								</div>
							</div>
							<br>
							<div class="text-center">
								<button type="submit" name="do" class="btn btn-default btn-submit">抽獎</button>
							</div>

						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
				</tbody>
			</table>*/?>
			
			<p><span style="font-size:22px">輸入蘭吉兒抽獎卷序號:<br>
						活動日期: <span style="color:#FF0000">即日起至2016/09/30 23:59止</span>(以系統時間為主)<br>
						活動對象:蘭吉兒霹靂面具面膜 3入盒裝盒內 (白蓮還真《逆齡卷》、名劍動天 《抗皺卷》 、玄解無極 《淨白卷》) ， 附贈送之『蘭吉兒抽獎券』活動序號皆可參加。每組序號限參加一次。</span></p>

						<p><span style="font-size:22px">活動方式: <span style="color:#000080">登入妝美麗購物網會員 → 進入活動頁http://activity.beautywoman88.com → 點選【活動序號登入】的按鈕→ 輸入盒內所贈抽獎券上10碼序號 → 祝您中大獎</span></span></p>

			<p>&nbsp;</p>

			<p>&nbsp;</p>

			<p>&nbsp;</p>
		</div>
	</div>


		<?php /*$this->load->view('campaign/tabs')?>
		<form action="" method="post" >
			<input type="hidden" name="_r" value="<?php echo rand()?>">
			<input type="hidden" name="step" value="">
			<label>序號</label>
			<input type="text" name="sn" value="<?php $this->input->post('sn')?>">
			<?php echo @$error['sn']?>
			<label>驗證碼</label>
			<input type="text" name="recaptcha" value="">
			<?php echo $cap['image']?>
			<?php echo @$error['recaptcha']?>
			<input type="submit" name="do" value="抽獎">
		</form>*/?>

	</div>
</div>