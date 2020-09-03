
<style>
	.user-form {
		margin-top:25px;
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
		border-left-color: #b92c28;
	}
	.bs-callout-warring {
		border-left-color: #b92c28;
	}
</style>
	<div class="container">
		<?php 
			if(isset($BankRemittancesInfo) && $BankRemittancesInfo != false)
			{
				include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."checkout" . DIRECTORY_SEPARATOR ."BankRemittancesInfo.php");	
			}
		?>
	</div>
	
<div id="wpo-form" class="container">
		
		<?php 
			if(isset($err_status))
			{
		?>
		<div class="bs-callout bs-callout-<?php echo $err_status;?>" id="callout-type-b-i-elems">
		<?php
			} 
			else
			{
		?>
			<div class="bs-callout bs-callout-info" id="callout-type-b-i-elems">
		<?php
			}
		?>
			<?php if(isset($err_title)){ ?>
				<h4><?php echo $err_title;?></h4>
			<?php } ?>
			<?php if(isset($err_content)){ ?>
				<p><?php echo $err_content;?></p>
		<?php } ?>
			</div>
		</div>
</div>
<script>
var auto = <?php echo $err_auto;?>;
if(auto != -1){

    // Your application has indicated there's an error
    window.setTimeout(function(){

        // Move to a new location or you can do something else
        window.location.href = "<?php echo base_url($redirectURL);?>";

    }, auto);

}
</script>
