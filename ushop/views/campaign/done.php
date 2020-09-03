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
								<span class="panel-title">感謝您的參與活動</span>
							</div>
							<div class="panel-body">
								<table align="center" border="0" cellpadding="5" cellspacing="5" style="width:1020px">
									<tbody>
										<tr>
											<td style="font-size:24px;color: red;">此序號已使用過</td>
										</tr>
									</tbody>
								</table>
								<div class="clearfix"></div>
								<br>
								<br>
							</div>		
							<div class="panel-footer">
								<div class="text-center">
									<button type="button" onclick="location.href='/campaign';" class="btn btn-default btn-lg pull-right" style="margin-left: 10px;" value="">重新輸入</button> 
								</div>

								<div class="text-center" style="margin-right:10px;">
									<button type="button" class="btn btn-default btn-submit btn-lg pull-right" onclick="location.href='/';">回首頁</button> 
								</div>

								<div class="clearfix"></div>
							</div>
						</form>
					</div>
				</div>
				
				<p>&nbsp;</p>

				<p>&nbsp;</p>
			</div>
		</div>
	</div>
</div>

<?php /*$this->load->view('campaign/tabs')?>
此序號已使用過*/ ?>