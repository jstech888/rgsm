<?php
	$login_lang_path = LANGPATH . "widget" . DIRECTORY_SEPARATOR . "login" . DIRECTORY_SEPARATOR;
	$temp_login_lang_path = LANGPATH . "widget" . DIRECTORY_SEPARATOR . "login" . DIRECTORY_SEPARATOR . $Lang . ".json";		
	$login_lang_path=(!file_exists($temp_login_lang_path))?LANGPATH . "widget" . DIRECTORY_SEPARATOR . "login" . DIRECTORY_SEPARATOR . DEFAULTLANG . ".json":$temp_login_lang_path;		
	$obj_login_lang = json_decode( file_get_contents($login_lang_path),true );
?>
	<style>
	.user-form {
		margin-top:25px;
	}
	.form-group {
		margin-top:15px;
		margin-bottom:15px;
	}
	
	.form-group .label{
		text-align:right;
		margin-top: 7px;
	}
	
	.form-group .column{
		text-align: right;
	}
	</style>
<div id="wpo-form" class="container">
	<div class="container">
		<div class="well well-lg user-form">
			<div class="row">
				<form method="post" action='/user/' name="login_form">
					<div class="form-group">
						<div class="col-sm-4 col-xs-12 label">	
							<label class="loginformLabel"><?php echo $obj_login_lang['username_Label'];?></label>
						</div>
						<div class="col-sm-6 col-xs-12">		
							<input type="text" class="loginformValue form-control" name="username" id="username" placeholder="<?php echo $obj_login_lang['username_placeholder'];?>">
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="form-group">
						<div class="col-sm-4 col-xs-12 label">	
							<label class="loginformLabel"><?php echo $obj_login_lang['password_Label'];?></label>		
						</div>
						<div class="col-sm-6 col-xs-12">		
							<input type="password" class="loginformValue form-control" name="password" id="password" placeholder="<?php echo $obj_login_lang['password_placeholder'];?>">  
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="form-group">
						<div class="col-sm-6 col-xs-12" style="text-align: left;">		
							<small><a href="#"><?php echo $obj_login_lang['forget_password'];?></a></small>
						</div>
						<div class="col-sm-6 col-xs-12 column">		
							<button type="submit" class="btn "><?php echo $obj_login_lang['sign_in'];?></button> 
						</div>
					</div>
				</form>
			</div>
			<!-- //MAIN CONTENT -->
		</div>
	</div>
</div>