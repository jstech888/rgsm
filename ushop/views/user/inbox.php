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
</style>
<div class="container">
	<div class="col-xs-12 text-center">
		<center><H2><?php echo $objLang["inbox"]["title"];?></H2></center>
		<table class="table table-striped table-bordered table-hover" id="Table_Content_List">
			<thead>
				<tr>
					<th class="text-center"><?php echo $objLang["inbox"]["picture"];?></th>
					<th class="text-center"><?php echo $objLang["inbox"]["responsor"];?></th>
					<th class="text-center"><?php echo $objLang["inbox"]["operate"];?></th>
				</tr>
			</thead>
			<tbody>
			<?php 
			foreach( $msgData AS $k => &$msgBlock )
			{
				$withId = ( $userInfo[$k]["from"] == $self["id"] ) ? $userInfo[$k]["to"] : $userInfo[$k]["from"];
				$name  = ( $userInfo[$k]["from"] == $self["id"] ) ? $userInfo[$k]["to_name"] : $userInfo[$k]["from_name"];
				$image = ( $userInfo[$k]["from"] == $self["id"] ) ? $userInfo[$k]["to_picture"] : $userInfo[$k]["from_picture"];
			
			?>
				<tr>
					<td>
						<img class="inbox-pic img-thumbnail" src="<?php echo $image["url"];?>" />
					</td>
					<td>
						<?php echo $name;?>
					</td>
					<td>
						<a class="btn btn-info" href="/user/inbox/detail?withId=<?php echo $withId;?>"><?php echo $objLang["inbox"]["reply"];?></a>
						<a class="btn btn-success" onclick="hideMessage('<?php echo $withId;?>');"><?php echo $objLang["inbox"]["remove"];?></a>
					</td>
				</tr>
			<?php 
			} 
			?>
			</tbody>
		</table>
	</div>
</div>
<script>
function hideMessage( withId )
{
	if( confirm(objLang.inbox.removeAlertMsg) )
	{
		$.ajax({
			url: "/user/inbox/hideMessage",
			async:true,
			cache:false,
			method:"POST",
			data:{ withId : withId },
			success:function(data, status, xhr){
				//console.log(data,status,xhr);
				PM.show({ title: objLang.inbox.removeSuccess, text: "", type: "info"});
				location.reload();
			},
			error:function(xhr, stauts, err){
				//console.log(xhr, stauts, err);
				PM.erro({title: objLang.inbox.removeFailed});
			}
		});			
	}
}
</script>