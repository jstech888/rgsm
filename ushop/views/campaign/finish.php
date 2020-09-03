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
											<td>
											<p><span style="font-size:36px;"><strong>『蘭吉兒抽獎卷』活動之相關注意事項:</strong></span></p>
											<span style="font-size:20px">●由於霹靂電視版木偶－素還真為手工訂製，預計將於2017年7月後寄出贈品，實際寄出時間會另行通知中獎人。<br>
											●得獎會員之寄送資料，將會以您在會員中心填入之個人資料為主。<br>
											●得獎會員請在10月31日以前至妝美麗購物網「會員中心」中確認寄送地址、電話及姓名，若未在規定期限內提供寄送地址或未確認地址正確性，導致無法成功投遞將視同放棄。<br>
											●抽中之贈品將不得要求折現、或要求以任何形式退換或補償。<br>
											●超啟有限公司保有活動變更及取消權利。</span></td>
										</tr>
									</tbody>
								</table>
								<div class="clearfix"></div>
								<br>
								<br>
							</div>		
							<div class="panel-footer">
								<div class="text-center">
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
感謝您參加並恭喜中獎，您的獎項預定xx天內
寄出………等說明頁!*/ ?>
