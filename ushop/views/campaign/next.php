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
#campform{
	margin: 0px;
}
</style>

<div class="container">
	<div class="row mt5">
		<div class="col-sm-10 col-md-10 page-block mb25">	
			<div class="page-title"></div>
			<div class="page-artical">
				<p style="text-align:center"><img alt="" src="/ckfinder/userfiles/files/Banner/banner.jpg"></p>
								
				<div class="box">
					<div class="panel panel-info panel-border top user-form">
						<form action="?" method="post" name="campform" id="campform">
							<input type="hidden" name="_r" value="<?php echo rand()?>">
							<input type="hidden" name="step" value="next">
							<input type="hidden" name="sn" value="<?php echo $this->input->post('sn')?>"?>
							<div class="panel-heading text-center">
								<span class="panel-title">請輸入序號及認證碼</span>
							</div>
							<div class="panel-body">
								<div class="form-group">
									<label for="username" class="col-sm-3 control-label text-right">贈品名稱 <sup style="color: red">*</sup></label>
									<div class="col-sm-7"><?php echo $gift->title?></div>
									<br/>
								</div>
								<div class="form-group">
									<label for="username" class="col-sm-3 control-label text-right">抽獎序號 <sup style="color: red">*</sup></label>
									<div class="col-sm-7"><?php echo $this->input->post('sn')?></div>
									<br/>
								</div>
								<div class="form-group">
									<label for="username" class="col-sm-3 control-label text-right">抽獎時間 <sup style="color: red">*</sup></label>
									<div class="col-sm-7"><?php echo date("Y-m-d H:i:s");?></div>
									<br/>
								</div>								
								<div class="form-group">
									<label for="username" class="col-sm-3 control-label text-right">贈品收件人 <sup style="color: red">*</sup></label>
									<div class="col-sm-7">
										<input type="text" class="registerformValue form-control" name="username" id="username" placeholder="請輸入贈品收件人姓名" value="<?php $this->input->post('username')?>" required="">
										<div class="input-notes" id="input-notescol-sm-5">(&nbsp;請輸入正確姓名以避免無法領取，謝謝。)</div>
										<?php echo @$error['username']?>
									</div>
									<div class="clearfix"></div>
								<div class="form-group">
									<label for="addr" class="col-sm-3 control-label text-right">贈品送達地址 <sup style="color: red">*</sup></label>
									<div class="col-sm-7">
										<input type="text" class="registerformValue form-control" name="addr" id="addr" placeholder="請輸入贈品送達地址" value="<?php $this->input->post('addr')?>" required="">									
										<div class="input-notes" id="input-notescol-sm-5">(&nbsp;輸入蘭吉兒盒內所贈抽獎券上10碼序號，請確實填寫，謝謝。)</div>
										<?php echo @$error['addr']?>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="form-group">	
									<label for="phone" class="col-sm-3 control-label text-right">收件人電話 <sup style="color: red">*</sup></label>
									<div class="col-sm-7">
										<input type="text" class="registerformValue form-control" name="phone" id="phone" placeholder="請輸入收件人電話" value="<?php $this->input->post('phone')?>" required="">					
										<div class="input-notes" id="input-notescol-sm-5">(&nbsp;輸入蘭吉兒盒內所贈抽獎券上10碼序號，請確實填寫，謝謝。)</div>
										<?php echo @$error['phone']?>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="form-group">
									<label for="email" class="col-sm-3 control-label text-right">收件人email <sup style="color: red">*</sup></label>
									<div class="col-sm-7">
										<input type="text" class="registerformValue form-control" name="email" id="email" placeholder="請輸入收件人email" value="<?php $this->input->post('phone')?>" required="">					
										<?php echo @$error['email']?>
									</div>
								</div>
								<div class="clearfix"></div>
								<br>
								<br>
							</div>		
							<div class="panel-footer">
								<div class="text-center">
									<button type="submit" name="do" class="btn btn-default btn-submit btn-lg pull-right" value="送出">送出資料</button> 
								</div>
								<div class="clearfix"></div>
							</div>
						</form>
					</div>
				</div>
				
				<p><span style="font-size:22px">輸入蘭吉兒抽獎卷序號:<br>
							活動日期: <span style="color:#FF0000">即日起至2016/09/30 23:59止</span>(以系統時間為主)<br>
							活動對象:蘭吉兒霹靂面具面膜 3入盒裝盒內 (白蓮還真《逆齡卷》、名劍動天 《抗皺卷》 、玄解無極 《淨白卷》) ， 附贈送之『蘭吉兒抽獎券』活動序號皆可參加。每組序號限參加一次。</span></p>

							<p><span style="font-size:22px">活動方式: <span style="color:#000080">登入妝美麗購物網會員 → 進入活動頁http://activity.beautywoman88.com → 點選【活動序號登入】的按鈕→ 輸入盒內所贈抽獎券上10碼序號 → 祝您中大獎</span></span></p>

				<p>&nbsp;</p>

				<p>&nbsp;</p>

				<p>&nbsp;</p>
			</div>
		</div>
	</div>
</div>


<?php /* $this->load->view('campaign/tabs')?>
<form action="?" method="post" >
	<input type="hidden" name="_r" value="<?php echo rand()?>">
	<input type="hidden" name="step" value="next">
	<input type="hidden" name="sn" value="<?php echo $this->input->post('sn')?>"?>
	<label>贈品名稱</label>
	<?php echo $gift->title?>
	<br/>
	<label>抽獎序號</label>
	<?php echo $this->input->post('sn')?>
	<br/>
	<label>活動期間</label>
	23424
	<br/>
	<label>贈品收件人</label>
	<input type="text" name="username">
	<?php echo @$error['username']?>
	<br/>
	
	<label>贈品送達地址</label>
	<input type="text" name="addr">
	<?php echo @$error['addr']?>
	<br/>
	
	<label>收件人電話</label>
	<input type="text" name="phone">
	<?php echo @$error['phone']?>
	<br/>
	
	<label>收件人email</label>
	<input type="text" name="email">
	<?php echo @$error['email']?>
	
	<input type="submit" name="do" value="送出">
</form>*/?>
