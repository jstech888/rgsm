<style>
#col-xs-10{
	padding-left: 0px;
}
#col-xs-8{
	padding-left: 0px;
}
@media screen and (max-width: 612px) {
	#aaa{
		padding-top: 10px;
		float: none;
	}
	#bbb{
		padding-top: 10px;
		margin-right: 20px;
		float: none;
	}
	#ccc{
		text-align: center;
	}
}
@media screen and (min-width: 768px) and (max-width: 991px){
	#col-xs-10{
		padding-left: 20px;
	}
	.selector1 {
		width: 250px;
		display: inline-block;
		margin-bottom: 0px;
		padding-left: 6px;
		margin-top: 10px;
	}
}
.a.product-link{
	color: #000;
	font-size: 18px;
	font-weight: 700;
}
.a.product-link:hover{
	#e91e63;
}
</style> 
<div class="content_sortPagiBar clearfix" id="ccc">
  <div class="sortPagiBar clearfix">
		<ul class="display hidden-xs layout-style">
		<?php 
			$gridSel = $layout == "grid" ? 'class="selected"' : "";
			$listSel = $layout == "list" ? 'class="selected"' : "";
		?>
			<li id="grid" <?php echo $gridSel;?>><a rel="nofollow" href="#" title="grid"></a></li>
			<li id="list" <?php echo $listSel;?>><a rel="nofollow" href="#" title="list"></a></li>
		</ul>
		<div class="form-group selector1 pull-right" id="aaa">
           <label for="selectSort" class="col-xs-2 control-label">排序</label>
           <div class="col-xs-10" id="col-xs-10">
			<?php
				$ASel = $pSort == "timeDesc" ? "selected" : "";
				$BSel = $pSort == "priceAsc" ? "selected" : "";
				$CSel = $pSort == "priceDesc" ? "selected" : "";
				$DSel = $pSort == "qtyDesc" ? "selected" : "";
			?>
				<select id="selectSort" class="selectProductSort form-control">
					<option value="timeDesc" 	<?php echo $ASel;?>>上架時間：近至遠</option>
					<option value="priceAsc" 	<?php echo $BSel;?>>價格：低至高</option>
					<option value="priceDesc" 	<?php echo $CSel;?>>價格：高至低</option>
					<option value="qtyDesc" 	<?php echo $DSel;?>>存貨：多至少</option>
				</select>
           </div>
			 <div class="clearfix"></div>
      </div>
		<div class="form-group selector1 pull-right" id="bbb">
           <label for="selectLimit" class="col-xs-3 control-label">每頁顯示</label>
           <div class="col-xs-8" id="col-xs-8">
			<?php
				$ASel = $limit == 12 ? "selected" : "";			
				$ASel = $limit == 20 ? "selected" : "";
				$BSel = $limit == 30 ? "selected" : "";
				$CSel = $limit == 40 ? "selected" : "";
			?>
				<select id="selectLimit" class="selectProductSort form-control" style="width: 100%;">			
					<option value="12" <?php echo $ASel;?>>12</option>
					<option value="20" <?php echo $ASel;?>>20</option>
					<option value="30" <?php echo $BSel;?>>30</option>
					<option value="40" <?php echo $CSel;?>>40</option>
				</select>
           </div>
			 <div class="clearfix"></div>
      </div>
		<!-- /nbr product/page -->
	</div>
</div>
<script>
var keyword = '<?php echo isset($keyword)?$keyword:"";?>';
var sort_ly = '<?php echo $layout;?>';
var sort_l = <?php echo $limit;?>;
var sort_s = '<?php echo $pSort;?>';
var sort_p = <?php echo $page;?>;
$(function(){
	//$(".layout-style > li > a").click(function(){
	//	sort_ly = $(this).attr("title");
	//	reloadProductPage();
	//});
	$("#selectSort").change(function(){
		sort_s = $(this).val();
		reloadProductPage();
	});
	$("#selectLimit").change(function(){
		sort_l = $(this).val();
		reloadProductPage();
	});
});
function reloadProductPage()
{
	var webParam = {
		<?php echo isset($keyword)? "keyword : keyword ,": "" ;  ?>
		ly : sort_ly,
		l : sort_l,
		s : sort_s,
		p : sort_p
	};
	keyword == "none"?"":webParam.keyword = keyword;
	location.href = location.protocol + '//' + location.host + location.pathname + "?" + $.param(webParam);
}
</script>