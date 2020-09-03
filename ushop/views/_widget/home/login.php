	<?php
		$login_lang_path = LANGPATH . "widget" . DIRECTORY_SEPARATOR . "login" . DIRECTORY_SEPARATOR;
		$temp_login_lang_path = LANGPATH . "widget" . DIRECTORY_SEPARATOR . "login" . DIRECTORY_SEPARATOR . $Lang . ".json";		
		$login_lang_path=(!file_exists($temp_login_lang_path))?LANGPATH . "widget" . DIRECTORY_SEPARATOR . "login" . DIRECTORY_SEPARATOR . DEFAULTLANG . ".json":$temp_login_lang_path;		
		$obj_login_lang = json_decode( file_get_contents($login_lang_path),true );
	?>
	<!-- Login Modal -->
	<style>
	@media screen and (max-width: 700px ) { 
		.modal {
			width:200px;
		}
		.col-xs-hidden {
			display:none;
		}
		.loginformLabel {
			margin-top: 10px;
			text-align: center;
		}
	}
	@media screen and (min-width: 700px) and (max-width: 1200px) { 
		.modal {
			width:600px;
		}
			
		.loginformLabel {
			text-align: right;
		}
	}
	@media screen and (min-width: 1200px) { 
		.modal {
			width:800px;
		}
		.loginformLabel {
			text-align: right;
		}
	}
	
	.modal {
		position: fixed;
		top: 10%;
		left: 50%;
		z-index: 1050;
		background-color: #ffffff;
		border: 1px solid #999;
		border: 1px solid rgba(0, 0, 0, 0.3);
		-webkit-border-radius: 6px;
		-moz-border-radius: 6px;
		border-radius: 6px;
		-webkit-box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);
		-moz-box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);
		box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);
		-webkit-background-clip: padding-box;
		-moz-background-clip: padding-box;
		background-clip: padding-box;
		outline: none;
		overflow-x:hidden !important;
		overflow-y:hidden !important;		
	}
	
	#loginModal .modal-header {
		text-align: center;
	}
	
	.loginformValue {
		width: 100%;
		text-align: center;
	}
	</style>
	<script>
		$(function(){
			initLoginModal();
		});
		
		
		function initLoginModal()
		{
		
			$( window ).resize(function() {
				$("#loginModal").css('margin-left','-'+($("#loginModal").actual('outerWidth')/2)+'px');
				$("#loginModal").height($("#loginModal .modal-header").actual('outerHeight') + $("#loginModal .modal-body").actual('outerHeight') + $("#loginModal .modal-footer").actual('outerHeight') + 20);
			});
		
			$('#loginModal').on('show.bs.modal', function() {		
				$("#loginModal").css('margin-left','-'+($("#loginModal").actual('outerWidth')/2)+'px');
				$("#loginModal").height($("#loginModal .modal-header").actual('outerHeight') + $("#loginModal .modal-body").actual('outerHeight') + $("#loginModal .modal-footer").actual('outerHeight') + 20);
			});
			
			$('#loginModal').on('shown.bs.modal', function() {		
				$("#loginModal .modal-backdrop").remove();
				setTimeout(function(){
					$('.modal-backdrop').unbind("click");
					$('.modal-backdrop').bind("click",function(){							
						$('[data-dismiss="modal"]').trigger('click');				
						$('[data-dismiss="modal"]').trigger('click');						
					});
				},200);
			});
		}
		
	</script>
    <div class="modal " id="loginModal">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner">
			<img src="<?php echo base_url("uploads/2015/0216/logo_celena.png");?>" alt="<?php echo $obj_login_lang['header_img_alt'];?>">
		</div>
		<div class="clearfix"></div>
      </div>
      <div class="modal-body">
        <form method="post" action='' name="login_form">
			<div class="row">
				<div class="col-sm-4 col-xs-12">		
					<p class="loginformLabel"><?php echo $obj_login_lang['username_Label'];?></p>
				</div>
				<div class="col-sm-6 col-xs-12">					   
					<input type="text" class="loginformValue" name="username" id="username" placeholder="<?php echo $obj_login_lang['username_placeholder'];?>">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 col-xs-12">		
					<p class="loginformLabel"><?php echo $obj_login_lang['password_Label'];?></p>						
				</div>
				<div class="col-sm-6 col-xs-12">					   
					<input type="password" class="loginformValue" name="password" id="password" placeholder="<?php echo $obj_login_lang['password_placeholder'];?>">  
				</div>
			</div>      
        </form>
      </div>
      <div class="modal-footer">
			<div class="col-sm-6 col-xs-hidden" style="text-align: left;">		
				<big><a href="/user/foregot"><?php echo $obj_login_lang['forget_password'];?></a></big>
			</div>
			<div class="col-sm-6 col-xs-12" style="text-align: right;">		
				<button type="submit" class="btn"><?php echo $obj_login_lang['sign_in'];?></button> 
			</div>
      </div>
    </div>
	<!-- /Login Modal -->
