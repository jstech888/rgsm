<style>
.wpml-lang-dropdown {
	font-size:14px;
}
.btn-switcher {
	font-size:14px;
}
</style>
<!-- Language Selector -->
<div class="select-wrapper language btn-group pull-right enabled">
	<a href="#" class="btn btn-link btn-switcher dropdown-toggle" data-toggle="dropdown">
		<img src="<?php echo $selector_lang[$Lang]['src'];?>" alt="<?php echo $selector_lang[$Lang]['display'];?>">
		<span>&nbsp;&nbsp;</span><?php echo $selector_lang[$Lang]['display'];?><span>&nbsp;</span><span class="caret"></span>
	</a>
	<ul class="wpml-lang-dropdown dropdown-menu list">
	
	<?php 
		foreach( $selector_lang AS $key => $obj_lang )
		{
			if( $key != $Lang ) {
	?>								
		<li><a href="<?php echo $obj_lang['href'];?>">
			<img src="<?php echo $obj_lang['src'];?>" alt="<?php echo $obj_lang['display'];?>">
			<span>&nbsp;&nbsp;</span><?php echo $obj_lang['display'];?>
		</a></li>
	<?php
			}
		}
	?>
	</ul>
</div>
<script>
	$(function(){
		$('.dropdown-toggle').dropdown();
	});
</script>
<!-- /Language Selector -->