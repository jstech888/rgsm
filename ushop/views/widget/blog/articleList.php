<style>
/* .col-xs-2 { */
/*     width: 12.666667%; */
/* } */
/* .col-xs-6 { */
/*     width: 54%; */
/* } */
</style>
			<?php
				$inds = 1;
				foreach( $hotStory AS $story )
				{
					if( $inds === 6 )
						break;
					
					$lastItem = ( $inds == count($story) || $inds === 5 )?"border-bottom":"";
			?>
			<div class="row table-layout ad-item <?php echo $lastItem;?>">
				<div class="col-xs-2 rk">
					<?php if( $inds === 1) { ?>
					<img src="/assets/catelog/Crown.png" class="responsive icon_crown"/>
					<?php } ?>
					<!--  <img src="/assets/catelog/icon_number<?php echo $inds;?>.png" class="responsive"/> -->
					
					<span class="heart"><?php echo $inds;?></span>
				</div>
				<div class="col-xs-4" style="padding:0;" >
					<div class="thumbnail">
						<a class="ad-image" href="/blog/detail/<?php echo $story["id"];?>">
							<img src="<?php echo $story["value"]["url"];?>" class="responsive product-image">
						</a>
					</div>
				</div>
				<div class="col-xs-6 info-block p15">
					<a class="ad-title" href="/blog/detail/<?php echo $story["id"];?>"><?php echo $story["blog-title"];?></a>
					<?php $arrContent = explode("\n",$story["blog-content"]); ?>
					<div class="story-desc"><?php echo $arrContent[0];?></div>
					<?php
						$rawScore = $story["atouch"] / $TotalRaty;
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