<?php
$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
$host = 'http://' . $_SERVER['HTTP_HOST'] . $uri_parts[0]."?";
?>
<div class="content_sortPagiBar text-center" id="paginationdiv">
	<div class="bottom-pagination-content clearfix">   
	
		<!-- Pagination -->
		<div id="pagination_bottom" class="pagination clearfix">
				<ul class="pagination">
					<li>
					<?php
					$paginationKeyword = isset($keyword)?$keyword : "" ; 
					?>		
					<?php $prevDisable = ( $prevPage === false )?'class="disable"':""?>
					<?php $prevHref    = ( $prevPage === false )?"":'href="'.$host.http_build_query(array( "keyword"=> $paginationKeyword, "ly" => $layout, "l" => $limit, "s" => $pSort, "p" => $prevPage)).'"'?>
						<a <?php echo $prevHref;?> aria-label="Previous" <?php echo $prevDisable;?>>
							<span aria-hidden="true" class="tool">&laquo;</span>
						</a>
					</li>
					<?php for( $pi=1;$pi<=$maxPage;$pi++) { ?>
					<?php $isAct = $currentPage == $pi ? 'class="active"' : ""; ?>
					<?php $aHref = $currentPage == $pi ? '' : 'href="'.$host.http_build_query(array( "keyword"=> $paginationKeyword, "ly" => $layout, "l" => $limit, "s" => $pSort, "p" => $pi)).'"'; ?>
					<li <?php echo $isAct;?>>					
						<a <?php echo $aHref;?>><span><?php echo $pi;?></span></a>
					</li>
					<?php } ?>
					<li>
					<?php $nextDisable = ( $nextPage === false )?'class="disable"':""?>
					<?php $nextHref    = ( $nextPage === false )?"":'href="'.$host.http_build_query(array( "keyword"=> $paginationKeyword, "ly" => $layout, "l" => $limit, "s" => $pSort, "p" => $nextPage)).'"'?>
						<a <?php echo $nextHref;?> aria-label="Next" <?php echo $nextDisable;?>>
							<span aria-hidden="true" class="tool">&raquo;</span>
						</a>
					</li>
				</ul>
		</div>
		<div class="product-count">目前於第 <?php echo $currentPage;?> 頁，共 <?php echo $maxPage;?> 頁</div>
		<!-- /Pagination -->
	</div>
</div>