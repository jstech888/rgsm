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
								<span class="panel-title">中獎名單</span>
							</div>
							<div class="panel-body">
								<table align="center" border="1" cellpadding="1" cellspacing="1" style="width:100%">
									<tbody>
										<tr>
											<td>
												<table>
													<tr>
														<th>贈品名稱</th>
														<th>抽獎序號</th>
														<th>活動期間</th>
														<th>贈品收件人</th>
														<th>贈品送達地址</th>
														<th>收件人電話</th>
														<th>收件人email</th>
													</tr>
													<?php if(is_array($winners)):?>
													<?php foreach($winners as $winer):?>
													<tr>
														<td><?php echo $winer->title ?></td>
														<td><?php echo $winer->sn ?></td>
														<td>2016/09/30</td>
														<td><?php echo $winer->username ?></td>
														<td><?php echo $winer->addr ?></td>
														<td><?php echo $winer->phone ?></td>
														<td><?php echo $winer->email ?></td>
													</tr>
													<?php endforeach;?>
													<?php endif;?>
												</table>
											</td>
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
顯示中獎記錄
<table>
	<tr>
		<th>贈品名稱</th>
		<th>抽獎序號</th>
		<th>活動期間</th>
		<th>贈品收件人</th>
		<th>贈品送達地址</th>
		<th>收件人電話</th>
		<th>收件人email</th>
	</tr>
		<?php if(is_array($winners)):?>
		<?php foreach($winners as $winer):?>
			<tr>
		<td><?php echo $winer->title ?></td>
		<td><?php echo $winer->sn ?></td>
		<td>2016/09/30</td>
		<td><?php echo $winer->username ?></td>
		<td><?php echo $winer->addr ?></td>
		<td><?php echo $winer->phone ?></td>
		<td><?php echo $winer->email ?></td>
		</tr>
		<?php endforeach;?>
		<?php endif;?>
</table>*/ ?>