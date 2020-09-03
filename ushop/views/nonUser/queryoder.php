
<style>
	#queryoder-container {
		padding-top: 20px;
	}
	.panel-title {
		font-size: 22px;
		text-align: center;
	}
</style>
<div class="container" id="queryoder-container">

	<div class="panel panel-info panel-border top">
		<div class="panel-heading">
			<div class="panel-title"><?php echo $objLang["queryoder"]['form_title'];?></div>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" role="form" id="form-queryoder" action="<?php echo base_url("/message");?>" method="GET">
				<div class="form-group">
					<label class="col-lg-3 control-label"><?php echo $objLang["queryoder"]['form_field_label_0'];?></label>
					<div class="col-lg-6">
						<input class="form-control" name="transId" value="" />
						<span class="help-block mt5"><i class="fa fa-bell"></i><?php echo $objLang["queryoder"]['form_field_helper_0'];?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label"><?php echo $objLang["queryoder"]['form_field_label_1'];?></label>
					<div class="col-lg-6">
						<input class="form-control" name="phone" value="" />
						<span class="help-block mt5"><i class="fa fa-bell"></i><?php echo $objLang["queryoder"]['form_field_helper_1'];?></span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-9">
						<input type="submit" class="btn btn-info pull-right" value="<?php echo $objLang["queryoder"]['form_submit_btn'];?>"/>
						<div class="clearfix"></div>
 					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
$(function() {
	$("#form-queryoder").submit(function(e) {
		var self = this;
		e.preventDefault();		
		
		if($.trim($('input[name="transId"]').val()) == "")
		{
			$('[name="transId"]').parent().addClass("has-error");
			setTimeout(function(){
				$('[name="transId"]').parent().removeClass("has-error");
			},3000);
		}
		if($.trim($('input[name="phone"]').val()) == "")
		{
			$('[name="phone"]').parent().addClass("has-error");
			setTimeout(function(){
				$('[name="phone"]').parent().removeClass("has-error");
			},3000);
		}
		else
		{
			self.submit();
		}
		return false; //is superfluous, but I put it here as a fallback
	});
});
</script>