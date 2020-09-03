
<style> 
table {
  font-weight: normal;
  font-size: 16px;
}
.inbox-pic {
  width: 150px;
}
.btn {
  font-size: 16px;
}
.control-label {
  font-size: 18px;
  padding: 0;
  padding-top: 0 !important;
}
.admin-form .section-divider span {
  background: #fff;
}
section.module {
  border-bottom: 5px solid;	
  min-height: 500px;
  max-height: 500px;
  overflow-y: auto;
} 
 
section.module ol {
  padding-left: 0;
}
section.module .conversation {
  list-style: none !important;
  background: #e5e5e5 !important;
  margin: 0 !important;
  padding: 0 0 50px 0 !important;
}
section.module .messages {
  background: white;
  padding: 10px;
  border-radius: 2px;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
  max-width: 70%;
  margin-right: 0px;
}
section.module .discussion .avatar {
  width: 80px;
  position: relative;
}
section.module .top-bar {
  background: #666;
  color: white;
  padding: 0.5rem;
  position: relative;
  overflow: hidden;
}
section.module .top-bar H1 {
  margin-top: 10px;
  text-align: center;
}

section.module .top-bar > * {
  position: relative;
}
@keyframes pulse {
  from { opacity: 0; }
  to { opacity: 0.5; }
}
section.module .discussion li {
  display: flex;
  margin-top: 30px;
}
section.module .avatar {
  width: 40px;
}
section.module .avatar img {
  width: 100%;
  display: block;
}
section.module .self {
  justify-content: flex-end;
}
section.module .other .avatar:after {
  content: "";
  position: absolute;
  top: 0;
  right: 0;
  width: 0;
  height: 0;
  border: 5px solid white;
  border-left-color: transparent;
  border-bottom-color: transparent;
}
section.module .self .avatar::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 0;
  height: 0;
  border: 5px solid white;
  border-right-color: transparent;
  border-bottom-color: transparent;
}
section.module .self .avatar::after {
  box-shadow: 1px 1px 2px rgba(black, 0.2);
}
section.module time{
  font-size: 8px;
  color: #AFAFAF;
}
section.module .line-name {
  background: rgba(0, 0, 0, 0.6);
  text-align: center;
  color: #fff;
  position: absolute;
  width: 100%;
  top: 0;
}

section.module .self .line-name {
  margin-top: 60px;
}
section.module .other .line-name {
  margin-top: 60px;
}
</style>
   
<?php $name = ( $userInfo[$withId]["from"] == $self["id"] ) ? $userInfo[$withId]["to_name"] : $userInfo[$withId]["from_name"]; ?>

<div class="container">
  <div class="panel panel-info panel-border top mt25">
      <div class="panel-heading">
          <span class="panel-title"> <span class="glyphicon glyphicon-user"></span> <?php echo $name;?></span>
      </div>
      <div class="panel-body p20 admin-form theme-primary" id="invoice-item">
			<section id="chartroom" class="module col-md-12">
				  <ol class="discussion">
					<?php foreach( $msgData[$withId] AS &$Obj_msg ) {
							$who = ( $Obj_msg["from"] == $self["id"] ) ? "self" : "other";								
							if( $who == "self" ) { ?>
					<li class="<?php echo $who;?>">
					  <div class="messages">
						<p><?php echo $Obj_msg["content"];?></p>
						<time datetime="<?php echo $Obj_msg["datetime"];?>"><?php echo $Obj_msg["datetime"];?></time>
					  </div>
					  <div class="avatar">
						<img src="<?php echo $Obj_msg["from_picture"]["url"];?>">
						<div class="line-name"><?php echo $Obj_msg["from_name"];?></div>									
					  </div>
					</li>
					
					<?php 	} else { ?>
					<li class="<?php echo $who;?>">
					  <div class="avatar">
						<img src="<?php echo $Obj_msg["from_picture"]["url"];?>">
						<div class="line-name"><?php echo $Obj_msg["from_name"];?></div>		
					  </div>
					  <div class="messages">
						<p><?php echo $Obj_msg["content"];?></p>
						<time datetime="<?php echo $Obj_msg["datetime"];?>"><?php echo $Obj_msg["datetime"];?></time>
					  </div>
					</li>
					
					<?php	} ?>
					<?php } ?>
				  </ol>

			</section>
			<div class="form-group">
				<div class="col-md-12">
					<textarea id="ckeditor1" class="form-control mt15" rows="6"></textarea>
				</div>
			</div>						
		</div>		
      <div class="panel-footer">	
			<div class="pull-right btn-group">
				<a class="btn btn-info" onclick="sengMsg();"><?php echo $objLang["inbox"]["submit"];?></a>
				<a class="btn btn-default" href="/user/inbox"><?php echo $objLang["inbox"]["return"];?></a>
			</div>
			<div class="clearfix"></div>
		</div>			
  </div>
</div>
   
<script type="text/javascript">
    jQuery(document).ready(function() {
		var objDiv = document.getElementById("chartroom");
		objDiv.scrollTop = objDiv.scrollHeight;
    });
</script>
    
<script type="text/javascript">
	var withId = '<?php echo $withId;?>';
	
	$(function(){
		$('.date').datetimepicker({
			"format" : "YYYY/MM/DD",
			"pickTime": false
		});
	});
	var isSend = false;
	function sengMsg()
	{
		var message = $("#ckeditor1").val();//CKEDITOR.instances.ckeditor1.getData();
		if( $.trim(message) != "" && isSend === false )
		{
			isSend = true;
			//PM.show({ title: "留言板", text: '訊息處理中...', type: "warning"});
			var ajaxData = { "content" : message, "to" : withId };
			$.ajax({
				url: "/user/inbox/sendMsg",
				async:true,
				cache:false,
				method:"POST",
				data:ajaxData,
				success:function(data, status, xhr){
					PM.show({ title: objLang.inbox.submitTitle, text: objLang.inbox.submitSuccess, type: "info"});
					setTimeout(function(){location.reload()},1000);
				},
				error:function(xhr, stauts, err){
					PM.erro({title: objLang.inbox.submitTitle,text: objLang.inbox.submitFailed});
				}
			});
		}
	}
	
	</script>