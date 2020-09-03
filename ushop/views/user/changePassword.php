
<style>
#wpo-form .label {
  color: #000;
  margin-top: 15px;
}
#col-xs-12{
	margin-top: 15px;
}
#column{
	margin-top: 20px;
}
	.user-form {
		margin-top:0px;
	}
	.form-group {
		/*margin-top:15px;*/
		margin-bottom:15px;
	}
	
	.form-group .label{
		text-align:right;
		margin-top: 7px;
	}
	
	.form-group .column{
/* 		text-align: right; */
	}
	.captcha-label {
		width: 180px;
		float: right;
	}
	.captcha-input {
		height: 65px;
		padding: 15px;
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
		font-size: 16px;
		font-weight: normal;
	}
	input {
		font-size: 16px;
		font-weight: normal;
	}
	@media (max-width: 768px) { 
		.form-group .label {
		  text-align: center;
		  margin-top: 7px;
		}
		.birthday-content.date{
		  text-align: center;
		}
	}
	.well.well-lg.well-default.user-form.change-password{
		width: 850px;
		margin: auto;
	}
	.btn-lg{
		padding: 5px 15px;
		font-size: 16px;
		line-height: 1.3333333;
		border-radius: 6px;
	}
		@media screen and (min-width: 769px) and (max-width: 991px){
			.well.well-lg.well-default.user-form.change-password {
				width: 100%;
				margin: auto;
			}
		}
		@media screen and (max-width: 767px){
			.well.well-lg.well-default.user-form.change-password {
				width: 100%;
				margin: auto;
			}
		}
</style>
<div id="wpo-form" class="container">
	<center><H2 style="font-size: 20px;"><?php echo $objLang["changePassword"]['title'];?></H2></center>
	<div class="well well-lg well-default user-form change-password">
		<div class="row">
			<div class="col-sm-12 col-xs-12">	
			<?php 
				if( isset($opt['status']) && $opt['status'] ===  true )
				{
			?>
				<div class="bs-callout bs-callout-warring alert alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4> Form Submit Error !</h4>
				<?php
					foreach( $opt['message'] AS $msg ) {
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
		<div class="row">
			<form method="post" action='<?php echo base_url("/user/changePassword");?>' name="login_form">
				<div class="form-group">
					<div class="col-sm-4 col-xs-12 label">	
						<label class="registerformLabel"><?php echo $objLang["changePassword"]['old_password_Label'];?></label>
					</div>
					<div class="col-sm-6 col-xs-12" id="col-xs-12">		
						<input type="password" class="registerformValue form-control" name="oldPassword" id="oldPassword" placeholder="<?php echo $objLang["changePassword"]['old_password_placeholder'];?>" value=""  required>
					</div>
				</div>
				<div class="clearfix"></div>
			
				<div class="form-group">
					<div class="col-sm-4 col-xs-12 label">	
						<label class="registerformLabel"><?php echo $objLang["changePassword"]['password_Label'];?></label>
					</div>
					<div class="col-sm-6 col-xs-12" id="col-xs-12">		
						<input type="password" class="registerformValue form-control" name="password" id="password" placeholder="<?php echo $objLang["changePassword"]['password_placeholder'];?>" autocomplete="off" required>  
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="form-group">
					<div class="col-sm-4 col-xs-12 label">	
						<label class="registerformLabel"><?php echo $objLang["changePassword"]['retypepassword_Label'];?></label>
					</div>
					<div class="col-sm-6 col-xs-12" id="col-xs-12">		
						<input type="password" class="registerformValue form-control" name="retypepassword" id="retypepassword" placeholder="<?php echo $objLang["changePassword"]['retypepassword_placeholder'];?>" required>  
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="form-group">
					<div class="col-sm-8 col-sm-offset-4 col-xs-12 column" id="column">		
						<button type="submit" class="btn btn-default btn-submit btn-lg"><?php echo $objLang["changePassword"]['modify'];?></button> 
					</div>
				</div>
			</form>
		</div>
		<!-- //MAIN CONTENT -->
	</div>
</div>