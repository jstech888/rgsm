<?php
	$inds = 1;
	foreach( $classBloger AS $bloger )
	{
		if( $inds === 6 )
			break;
		
		$lastItem = ( $inds == count($bloger) || $inds === count( $classBloger ) )?"border-bottom":"";
?>
<div class="row table-layout ad-item blog-item <?php echo $lastItem;?>">
	<div class="col-xs-2 rk">
		<?php if( $inds === 1) { ?>
		<img src="/assets/catelog/Crown.png" class="responsive icon_crown"/>
		<?php } ?>
		<!-- <img src="/assets/catelog/icon_number<?php echo $inds;?>.png" class="responsive"/>  -->
		<span class="heart"><?php echo $inds;?></span>
	</div>
	<div class="col-xs-4" style="padding:5px 0px;" >
		<div class="thumbnail">
			<a class="ad-image" href="/blog/moderators/<?php echo $bloger["id"];?>">
				<img src="<?php echo $bloger["picture"]["url"];?>" class="responsive product-image"/>
			</a>
		</div>
	</div>
	<div class="col-xs-6 info-block p15">
		<a class="ad-title" href="/blog/moderators/<?php echo $bloger["id"];?>"><?php echo $bloger["name"];?></a>
		<div class="ad-blog-title"><?php echo $bloger["bvalue"][$Lang]["title"];?></div>
		<?php
			$rawScore = $bloger["btouch"] / $TotalRaty;
			$score = round( $rawScore * 5, 2 );
		?>
		<div class="ad-raty" data-score="<?php echo $score;?>" style="margin-bottom: 8px;"></div>
	</div>
	<div class="clearfix"></div>
</div>
<?php
		$inds++;
	}
?>