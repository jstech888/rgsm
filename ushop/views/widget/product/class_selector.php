
    <div class="sidebar-inner">
         <aside id="woocommerce_product_categories-2" class="widget clearfix woocommerce widget_product_categories sidebar-element">
			<div class="box-heading"><span><?php echo $obj_ProductInfo_lang['hot'];?></span></div>
			<select name="product_cat" class="dropdown_product_cat">
				<option value="" selected="selected">請選擇分類</option>
			<?php 
				echo $hotCatelogstr;
			?>
			</select>
		</aside>	                    
	</div>
<style>
.blockUI.blockMsg h1 {
	color:#FFF !important;
}
</style>
<script>
$(function(){
	var segs = $(location).attr('href').split("/").splice(0, 5);
	segs.shift();
	segs.shift();
	segs.shift();
	console.log(segs);
	$(".dropdown_product_cat option").each(function(){
		var tag = $(this).val();
		console.log(tag.indexOf(segs[0]),tag.indexOf(segs[1]));
		if( tag.indexOf(decodeURIComponent(segs[0])) > 0 || tag.indexOf(decodeURIComponent(segs[1])) > 0)
		{
			$(this).attr("selected",true);
			$(this).prop("selected",true);
		}
	});
	
	var gotoRoot = '<?php echo base_url();?>';
	$(".dropdown_product_cat").bind("change",function(){
		
		$.blockUI({ css: { 
            border: 'none', 
            padding: '15px', 
            backgroundColor: '#000', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#FFFFF' 
        } });
		
		var url = gotoRoot + $(this).val();
		location.href = url;
	});
});
</script>
	