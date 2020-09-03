
    <link rel="stylesheet" type="text/css" href="/libs/datepicker/css/bootstrap-datepicker3.min.css">

	<script src="/libs/datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="/libs/datepicker/locales/bootstrap-datepicker.zh-TW.min.js" charset="UTF-8"></script>
	<script>
	$(function(){
		$('.birthday-content.date').datepicker({
			format: "yyyy/mm/dd",
			language: "zh-TW",
			todayHighlight: true
		});
	});
	</script>
<style>
	.birthday-content input.form-control {
	  width: 100px;
	}
	.panel-title {
	  color: #000;
	  font-size: 18px;
	  text-align: center;
	}
	@media (max-width: 992px) { 
		.form-horizontal .form-group {
		    text-align: center;
		    font-size: 15px;
		    width: 51%;
			margin: auto;
			margin-top: 10px;
		}
		.form-control {
		  width: 185px;
		  margin: 0 auto;
		  float: left;
		}
		.form-horizontal .control-label {
			padding-top: 7px;
			margin-bottom: 0;
			text-align: left;
			float: left;
		}
		.birthday-content input.form-control {
			width: 147px;
		}
		.panel-footer > .pull-right {
		  float: none !important;
		  text-align:center;
		}
		.birthday-box {
		  display: inline-block;
		  width: initial;
		  position: relative;
		  float: left;
		  margin: 0 auto;
		  margin-left: 52px;
		}
		.input-group {
		  width: 120px;
		}
	}
@media screen and (max-width: 740px) {
	.birthday-box {
		display: inline-block;
		width: initial;
		position: relative;
		float: left;
		margin: 0 auto;
		margin-left: 0px;
	}
	.form-horizontal .form-group {
		text-align: center;
		font-size: 15px;
		width: 43%;
		margin: auto;
		margin-top: 10px;
	}
	.form-control {
		width: 100%;
		margin: 0 auto;
		float: left;
	}
	.input-group {
    width: 100%;
}
	.birthday-content input.form-control {
		width: 100%;
	}
} 
	#panel-forgot{
		width: 780px;
		max-width: 100%;
		margin: 0 auto;
		margin-top: 30px;
		margin-bottom: 20px;
		border-top-color: #9775ac;
	}
</style>
<div class="container"><div class="row"><div class="col-md-10 col-md-offset-1 forgot-password">
<div class="section p15">
    <form class="form-horizontal" role="form" method="post" action="/user/forgot" name="login_form">
		<div class="panel panel-info panel-border top panel-forgot" id="panel-forgot">
			<div class="panel-heading text-center">
				<span class="panel-title"><?php echo $objLang["forgotten"]['title'];?></span>
			</div>
			<div class="panel-body">
                <div class="form-group">
                    <label for="inputAccount" class="col-md-4 control-label"><?php echo $objLang["forgotten"]['account'];?></label>
                    <div class="col-md-7">
                        <input type="text" id="inputAccount" name="inputAccount" class="form-control" placeholder="">
                    </div>
                </div>
				<div class="form-group">
					<label for="inputBirthday" class="col-md-4 control-label"><?php echo $objLang["forgotten"]['birthday'];?></label>
					<div class="col-md-7">	
						<div class="birthday-box">
							<div class="input-group birthday-content date" id="datetimepicker2">
								<span class="input-group-addon cursor"><i class="fa fa-calendar"></i></span>
								<input type="text" class="registerformValue form-control" name="inputBirthday" id="inputBirthday">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<div class="pull-right">
					<button type="submit" class="btn btn-default btn-submit"><?php echo $objLang["forgotten"]['submit'];?></button>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
    </form>
</div></div></div>
</div>