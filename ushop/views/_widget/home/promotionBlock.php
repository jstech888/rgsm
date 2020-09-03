<?php 
$block0 = "" ;
$block0title = "" ;
$block1 = "" ;
$block1title = "" ;
$block2 = "" ;
$block2title = "" ;

if( array_key_exists("value",$promotionBlock) && is_array($promotionBlock["value"]) && count($promotionBlock["value"]) > 0 ) {
  foreach($promotionBlock["value"]["block"] AS $k=>$block) {
    if ($k == 0)
    {
      $block0title = $block["title"] ;
      $block0 = $block["productList"] ; 
    }
    elseif ($k==1) 
    {
      $block1title = $block["title"] ;
      $block1 = $block["productList"] ; 
    }
    elseif ($k==2) 
    {
      $block2title = $block["title"] ;
      $block2 = $block["productList"] ; 
    }
  }
}
?>


          <div id="hot-products" class="hot-products">
            <ul class="nav nav-tabs">
              <?php if( count($block0) > 0 ) { ?>
              <li class="active">
                <a data-toggle="tab" href="#hot"><?php echo $block0title ; ?></a>
              </li>
              <?php }?>
              <?php if( count($block1) > 0 ) { ?>
              <li>
                <a data-toggle="tab" href="#main"><?php echo $block1title ; ?></a>
              </li>
              <?php }?>
              <?php if( count($block2) > 0 ) { ?>
              <li>
                <a data-toggle="tab" href="#prom"><?php echo $block2title ; ?></a>
              </li>
              <?php }?>
            </ul>

            <div class="tab-content">

              <?php if( count($block0) > 0 ) { ?>
              <div id="hot" class="tab-pane fadein active">
                <div class="sdsblog-box-content">
                  <div id="products-hot" class="owl-carousel product_list grid products">
                  <?php foreach( $block0 AS $product ) 
                  { 
                    if( $product["Shelves"] === false ){ continue; }

                    $checkStockAryValue = 0 ;
                    $formatType = "F" ; 
                    if( is_array( $product["stock"] ) ) {
                      foreach( $product["stock"] AS $k => $row ) {
                        if( $row["value"] > 0 ) {
                          $checkStockAryValue = 1 ; 
                          $formatType = $row["formatType"] ;
                        }
                      }
                    }
                    else{
                      $checkStockAryValue = intval($product["stock"]);
                    }

                    ?> 
                    <div class="item">
                      <div class="ajax_block_product product_block">
                        <div class="product-container default clearfix" itemscope itemtype="http://schema.org/Product">
                          <div class="left-block">
                            <a class="product-link" href="/product/detail/<?php echo $product["detailKey"];?>">
                            <div class="product-item">
                              <div class="image">
                                <img class="img-responsive" src="<?php echo $product["src"];?>">
                                <div class="op">
                                  <?php if( $self !== false ) { ?>
                                    <a class="btn btn-default btn-more-info btn-add-to-watch-list btn-follow-it coll" data-pid="<?php echo $product["PID"];?>"> <i class="fa fa-heart" aria-hidden="true"></i> 收藏</a>
                                  <?php }?>
                                  <?php if ( $checkStockAryValue  > 0  ) { ?>
                                    <a class="btn btn-default btn-add-to-cart buy" data-pid="<?php echo $product["PID"];?>" data-formattype="<?php echo $formatType;?>" data-qty="1"><i class="fa fa-cart-plus" aria-hidden="true"></i> <?php echo $objLang["product"]["addToCart"];?></a>
                                  <?php }?>
                                </div>
                              </div>
                              <div class="title">
                                <a class="product-link" href="/product/detail/<?php echo $product["detailKey"];?>"><?php echo $product["name"];?></a>
                              </div>
                              <div class="price">
                                <div class="new">
                                  $<?php echo $product["cPrice"];?>
                                </div>
                                <div class="old">
                                  $<?php echo $product["price"];?>
                                </div>
                              </div>
                            </div> </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                  </div>
                </div>
              </div>
              <?php }?>

              <?php if( count($block1) > 0 ) { ?>
              <div id="main" class="tab-pane fade">
                <div class="sdsblog-box-content">
                  <div id="products-main" class="owl-carousel product_list grid products">
                  <?php foreach( $block1 AS $product ) 
                  { 
                    if( $product["Shelves"] === false ){ continue; }

                    $checkStockAryValue = 0 ;
                    $formatType = "F" ; 
                    if( is_array( $product["stock"] ) ) {
                      foreach( $product["stock"] AS $k => $row ) {
                        if( $row["value"] > 0 ) {
                          $checkStockAryValue = 1 ; 
                          $formatType = $row["formatType"] ;
                        }
                      }
                    }
                    else{
                      $checkStockAryValue = intval($product["stock"]);
                    }
                    ?> 
                    <div class="item">
                      <div class="ajax_block_product product_block">
                        <div class="product-container default clearfix" itemscope itemtype="http://schema.org/Product">
                          <div class="left-block">
                            <a class="product-link" href="/product/detail/<?php echo $product["detailKey"];?>">
                            <div class="product-item">
                              <div class="image">
                                <img class="img-responsive" src="<?php echo $product["src"];?>">
                                <div class="op">
                                  <?php if( $self !== false ) { ?>
                                    <a class="btn btn-default btn-more-info btn-add-to-watch-list btn-follow-it coll" data-pid="<?php echo $product["PID"];?>"> <i class="fa fa-heart" aria-hidden="true"></i> 收藏</a>
                                  <?php }?>
                                  <?php if ( $checkStockAryValue  > 0  ) { ?>
                                    <a class="btn btn-default btn-add-to-cart buy" data-pid="<?php echo $product["PID"];?>" data-formattype="<?php echo $formatType;?>" data-qty="1"><i class="fa fa-cart-plus" aria-hidden="true"></i> <?php echo $objLang["product"]["addToCart"];?></a>
                                  <?php }?>
                                </div>
                              </div>
                              <div class="title">
                                <a class="product-link" href="/product/detail/<?php echo $product["detailKey"];?>"><?php echo $product["name"];?></a>
                              </div>
                              <div class="price">
                                <div class="new">
                                  $<?php echo $product["price"];?>
                                </div>
                                <div class="old">
                                  $<?php echo $product["cPrice"];?>
                                </div>
                              </div>
                            </div> </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php
                  }
                  ?>
                  </div>
                </div>
              </div>
              <?php }?>

              <?php if( count($block2) > 0 ) { ?>
              <div id="prom" class="tab-pane fade">
                <div class="sdsblog-box-content">
                  <div id="products-prom" class="owl-carousel product_list grid products">
                    <?php foreach( $block2 AS $product ) 
                  { 
                    if( $product["Shelves"] === false ){ continue; }

                    $checkStockAryValue = 0 ;
                    $formatType = "F" ; 
                    if( is_array( $product["stock"] ) ) {
                      foreach( $product["stock"] AS $k => $row ) {
                        if( $row["value"] > 0 ) {
                          $checkStockAryValue = 1 ; 
                          $formatType = $row["formatType"] ;
                        }
                      }
                    }
                    else{
                      $checkStockAryValue = intval($product["stock"]);
                    }
                    ?> 
                    <div class="item">
                      <div class="ajax_block_product product_block">
                        <div class="product-container default clearfix" itemscope itemtype="http://schema.org/Product">
                          <div class="left-block">
                            <a class="product-link" href="/product/detail/<?php echo $product["detailKey"];?>">
                            <div class="product-item">
                              <div class="image">
                                <img class="img-responsive" src="<?php echo $product["src"];?>">
                                <div class="op">
                                  <?php if( $self !== false ) { ?>
                                    <a class="btn btn-default btn-more-info btn-add-to-watch-list btn-follow-it coll" data-pid="<?php echo $product["PID"];?>"> <i class="fa fa-heart" aria-hidden="true"></i> 收藏</a>
                                  <?php }?>
                                  <?php if ( $checkStockAryValue  > 0  ) { ?>
                                    <a class="btn btn-default btn-add-to-cart buy" data-pid="<?php echo $product["PID"];?>" data-formattype="<?php echo $formatType;?>" data-qty="1"><i class="fa fa-cart-plus" aria-hidden="true"></i> <?php echo $objLang["product"]["addToCart"];?></a>
                                  <?php }?>
                                </div>
                              </div>
                              <div class="title">
                                <a class="product-link" href="/product/detail/<?php echo $product["detailKey"];?>"><?php echo $product["name"];?></a>
                              </div>
                              <div class="price">
                                <div class="new">
                                  $<?php echo $product["price"];?>
                                </div>
                                <div class="old">
                                  $<?php echo $product["cPrice"];?>
                                </div>
                              </div>
                            </div> </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php
                  }
                  ?>
                  </div>
                </div>
              </div>
              <?php }?>
            </div>
          </div>

          <script>
            function updateResult( pos, value )
            {
              status.find( pos ).find( ".result" ).text( value );
            }

            function afterAction( )
            {
              updateResult( ".owlItems", this.owl.owlItems.length );
              updateResult( ".currentItem", this.owl.currentItem );
              updateResult( ".prevItem", this.prevItem );
              updateResult( ".visibleItems", this.owl.visibleItems );
              updateResult( ".dragDirection", this.owl.dragDirection );
            }


            $( document ).ready( function( )
            {
              // var owl = $( "#hot-products .products" ), status = $( "#owlStatus" );
              // var owl = $( "#products-hot .products" ), status = $( "#owlStatus" );
              // var owl = $( "#hot-products .products" ), status = $( "#owlStatus" );
              // var owl = $( "#products-hot, #products-main, #products-prom" ), status = $( "#owlStatus" );
              if ( $( 'html' ).hasClass( 'rtl' ) )
                rtl = 'rtl';
              else
                rtl = 'ltr';

              $( "#products-hot" ).owlCarousel(
              {
                direction: rtl,
                items: 3,
                itemsDesktopSmall: [ 1024, 3 ],
                itemsTablet: [ 1004, 2 ],
                navigation: true
              } );
              $( "#products-main" ).owlCarousel(
              {
                direction: rtl,
                items: 3,
                itemsDesktopSmall: [ 1024, 3 ],
                itemsTablet: [ 1004, 2 ],
                navigation: true
              } );
              $( "#products-prom" ).owlCarousel(
              {
                direction: rtl,
                items: 3,
                itemsDesktopSmall: [ 1024, 3 ],
                itemsTablet: [ 1004, 2 ],
                navigation: true
              } );

            } );
          </script>