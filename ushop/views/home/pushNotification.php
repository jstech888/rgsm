<style>
.control-label {
    line-height: 42px;
    height: 42px;
    text-align: right;
    padding-right: 0;
    margin-bottom: 0;
}
</style>
    <div class="container">

		<div class="panel panel-info panel-border top mt25" style="width: 350px;max-width: 100%;margin: 0 auto;">
			<div class="panel-heading text-center">
				<span class="panel-title">推播測試介面</span>
			</div>
			<div class="panel-body">
				<div class="text-center">
					<div class="row">
						<div class="form-group">
							<label for="userId" class="col-xs-3 control-label">推播對像</label>
							<div class="col-xs-8">
								<select class="form-control" name="userId" id="userId">
									<option value="0">請選擇</option>
									<?php foreach( $userList AS $user ) { ?>
									<option value="<?php echo $user["id"];?>"><?php echo $user["name"];?></option>
									<?php } ?>									
								</select>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="form-group">
							<label for="message" class="col-xs-3 control-label">內文</label>
							<div class="col-xs-8">
								<input type="text" class="form-control" name="message" id="message" required="">
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<div class="text-center">
					<a class="btn btn-info" onclick="sendMessage();">送出訊息</a>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>

    </div> <!-- /container -->
<script>
function sendMessage()
{
	$.ajax({
		url: "/home/pushNotification",
		async:true,
		cache:false,
		method:"POST",
		data:{
			userId : $("#userId").val(),
			message : $("#message").val()
		},
		success:function(data, status, xhr){
			console.log(data, status, xhr);
			location.href = "/message?status=info&title=推播測試&content=推播訊息已排入寄送行程&auto=3000";
		},
		error:function(xhr, stauts, err){
			console.log(xhr, stauts, err);
		}
	});
}
</script>