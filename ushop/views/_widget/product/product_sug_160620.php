
<style>
#title{
	padding: 15px 0px;
}
#price{
	padding: 5px 30px;
}
</style>

<div class="rec-products-title">
	<span>你可能還會喜歡</span>
</div>
<div class="rec-products">

	<div class="rec-pros">
                  <?php
                  
foreach ( $addiProducts as $product )
                  {
                    
                    if ( $product [ "Shelves" ] === false )
                    {
                      continue;
                    }
                    
                    $checkStockAryValue = 0;
                    $formatType = "F";
                    if ( is_array( $product [ "stock" ] ) )
                    {
                      foreach ( $product [ "stock" ] as $k => $row )
                      {
                        if ( $row [ "value" ] > 0 )
                        {
                          $checkStockAryValue = 1;
                          $formatType = $row [ "formatType" ];
                        }
                      }
                    } else
                    {
                      $checkStockAryValue = intval( $product [ "stock" ] );
                    }
                    
                    ?>

                  <div class="item product-item">
			<div class="ajax_block_product product_block">
				<div class="product-container default clearfix" itemscope
					itemtype="http://schema.org/Product">
					<div class="left-block">
						<a class="product-link" href="<?php echo $product[ "href" ]; ?>">
							<div class="">
								<div class="image">
									<img class="img-responsive"
										src="<?php echo $product[ "src" ]; ?>">
									<div class="op">
										<a
											class="btn btn-default btn-more-info btn-add-to-watch-list btn-follow-it coll"
											data-pid="1"> <i class="fa fa-heart" aria-hidden="true"></i>
											收藏
										</a>

                                <?php if ( $checkStockAryValue  > 0  ) { ?>
                            <a
											class="btn btn-default btn-add-to-cart buy" data-pid="1"
											data-formattype="<?php echo $formatType;?>" data-qty="1"><i
											class="fa fa-cart-plus" aria-hidden="true"></i> 直接購買</a>
                            <?php }?>
                              </div>
								</div>
								<div class="title" id="title">
									<a class="product-link"
										href="<?php echo $product[ "href" ]; ?>"><?php echo $product[ "name" ]; ?></a>
								</div>




								<div class="price" id="price">
                          <?php
                    if ( intval( $product [ "price" ] ) > 0 && intval( $product [ "price" ] ) > 0 )
                    {
                      ?>

                                        <div class="new">
                            $<?php echo $product["cPrice"];?>
                          </div>
									<div class="old">
                            $<?php echo $product["price"];?>
                          </div>
									<!-- <span class="spe-mark">(<?php echo $objLang["product"]["memberPrice"];?>)</span> -->

                                    <?php
                    } else
                    {
                      ?>
                                        <div class="new">
                            <?php echo $product["cPrice"];?>
                          </div>
                                    <?php
                    }
                    ?>
                        </div>





							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
<?php
                  }
                  ?>

                </div>
</div>