	<?php
		$register_lang_path = LANGPATH . "widget" . DIRECTORY_SEPARATOR . "register" . DIRECTORY_SEPARATOR;
		$temp_register_lang_path = LANGPATH . "widget" . DIRECTORY_SEPARATOR . "register" . DIRECTORY_SEPARATOR . $Lang . ".json";		
		$register_lang_path=(!file_exists($temp_register_lang_path))?LANGPATH . "widget" . DIRECTORY_SEPARATOR . "register" . DIRECTORY_SEPARATOR . DEFAULTLANG . ".json":$temp_register_lang_path;
		
		$obj_register_lang = json_decode( file_get_contents($register_lang_path),true );
	?>
	<!-- Register Modal -->
	<style>
	@media screen and (max-width: 700px ) { 
		.modal {
			width:200px;
		}
		.col-xs-hidden {
			display:none;
		}		
		.registerformLabel {
			text-align: center;
		}		
		.registerformValue {
			width: 100%;
			text-align: center;
			border-top:2px #666 solid;
		}
		.form-value {
			margin-bottom:15px;		
		}
	}
	@media screen and (min-width: 700px) and (max-width: 1200px) { 
		.modal {
			width:600px;
		}
		.registerformLabel {
			text-align: right;
		}
	}
	@media screen and (min-width: 1200px) { 
		.modal {
			width:800px;
		}
		.registerformLabel {
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
	#registerModal .modal-header {
		text-align: center;
	}
	
	.registerformValue {
		width: 100%;
		text-align: center;
	}
	
	input:-webkit-autofill {
		background-color: white !important;
	}
	</style>
	<script>
		$(function(){
			initregisterModal();
		});
		
		function initregisterModal()
		{
		
			$( window ).resize(function() {
				$("#registerModal").css('margin-left','-'+($("#registerModal").width()/2)+'px');
				$("#registerModal").height($("#registerModal .modal-header").actual('outerHeight') + $("#registerModal .modal-body").actual('outerHeight') + $("#registerModal .modal-footer").actual('outerHeight') + 20);
			});
			
			$('#registerModal').on('show.bs.modal', function() {		
				$("#registerModal").css('margin-left','-'+($("#registerModal").width()/2)+'px');
				$("#registerModal").height($("#registerModal .modal-header").actual('outerHeight') + $("#registerModal .modal-body").actual('outerHeight') + $("#registerModal .modal-footer").actual('outerHeight') + 20);
			});
			
			$('#registerModal').on('shown.bs.modal', function() {		
				$("#registerModal .modal-backdrop").remove();
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
    <div class="modal " id="registerModal">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner">
			<img src="<?php echo base_url('uploads/2015/0216/logo_celena.png');?>" alt="<?php echo $obj_register_lang['header_img_alt'];?>">
		</div>
		<div class="clearfix"></div>
      </div>
      <div class="modal-body">
        <form method="post" action='' name="register_form" >
			<div class="row form-value">
				<div class="col-sm-4 col-xs-12">		
					<p class="registerformLabel"><?php echo $obj_register_lang['nickname_Label'];?></p>
				</div>
				<div class="col-sm-6 col-xs-12">					   
					<input type="text" class="registerformValue" name="nickname" id="nickname" placeholder="<?php echo $obj_register_lang['nickname_placeholder'];?>">
				</div>
			</div>
			<div class="row form-value">
				<div class="col-sm-4 col-xs-12">		
					<p class="registerformLabel"><?php echo $obj_register_lang['username_Label'];?></p>
				</div>
				<div class="col-sm-6 col-xs-12">					   
					<input type="text" class="registerformValue" name="username" id="username" placeholder="<?php echo $obj_register_lang['username_placeholder'];?>">
				</div>
			</div>
			<div class="row form-value">
				<div class="col-sm-4 col-xs-12">		
					<p class="registerformLabel"><?php echo $obj_register_lang['mail_Label'];?></p>
				</div>
				<div class="col-sm-6 col-xs-12">					   
					<input type="text" class="registerformValue" name="mail" id="mail" placeholder="<?php echo $obj_register_lang['mail_placeholder'];?>">
				</div>
			</div>
			<div class="row form-value">
				<div class="col-sm-4 col-xs-12">		
					<p class="registerformLabel"><?php echo $obj_register_lang['password_Label'];?></p>						
				</div>
				<div class="col-sm-6 col-xs-12">					   
					<input type="password" class="registerformValue" name="password" id="password" placeholder="<?php echo $obj_register_lang['password_placeholder'];?>" autocomplete="off">  
				</div>
				<div class="col-sm-4 col-xs-12">		
					<p class="registerformLabel"><?php echo $obj_register_lang['retypepassword_Label'];?></p>						
				</div>
				<div class="col-sm-6 col-xs-12">					   
					<input type="password" class="registerformValue" name="retypepassword" id="retypepassword" placeholder="<?php echo $obj_register_lang['retypepassword_placeholder'];?>">  
				</div>
			</div>      
        </form>
      </div>
      <div class="modal-footer">
			<div class="col-sm-12 col-xs-12" style="text-align: right;">		
				<button type="submit" class="btn"><?php echo $obj_register_lang['register'];?></button> 
			</div>
      </div>
    </div>
	<!-- /Register Modal -->
