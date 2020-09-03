<div id="columns" class="container self list">
	<div class="row mt25">
		<div class="col-md-12">
			<!-- 麵包屑 -->
			<ol class="breadcrumb">
				<li><a href="/"><?php /*<span class="glyphicon glyphicon-home" aria-hidden="true"></span> */?>首頁</a></li>
        <li class="active"><a href="/product/hall/<?php echo $selfData["id"];?>"><?php echo $selfData["name"];?></a></li>
          <?php /*
            $isAct = "";
            $inds = 1;
            $href = "";
// var_dump($parentProduct); exit;            
            foreach ( $parentProduct as $c )
            {
              $isAct = ( $inds == count( $parentProduct ) ) ? 'class="active"' : "";
              $inds % 2 > 0 ? $href = "/product/catelog/" . $c [ "detailKey" ] : "";
              ?>
							<li <?php echo $isAct;?>><a href="<?php echo $href;?>"><?php echo $c["name"];?></a></li>
			 			<?php
              $inds ++;
            } */
          ?>
      </ol>
			<div class="clearfix"></div>
			<!-- /麵包屑 -->
		</div>


<?php
if ( isset( $catelogSrc ) && ( $catelogSrc != "" ) )
{
  ?>
          <div class="col-md-12">
			<div class="list-banner">
				<img src="<?php echo $catelogSrc;?>">
			</div>
		</div>
        <?php
}
?>



        <div class="col-md-3 column left-menu">

          <?php include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."home" . DIRECTORY_SEPARATOR ."hallCatelog.php"); ?>
          <!-- /Block categories module -->

		</div>
		<div class="col-md-9 main-content">

			<!-- 商品 主要區塊 -->
			<div class="row">
				<div class="col-md-12">
					<div class="main title"><?php echo $selfData["name"];?>
					<span class="prom-time">
						<?php echo $selfData["start_date"];?> ~ <?php echo $selfData["end_date"];?>
					</span>
					</div>
            <div class="prom-desc"><?php echo $selfData['desc']; ?></div>
            </div>

				<!-- 商品 -->
				<div class="col-md-12">
					<div id="featured-products_block_center"
						class="block products_block clearfix">
						<!-- 產品工具列 -->
					<?php include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."product" . DIRECTORY_SEPARATOR ."sortPagiBar.php"); ?>
					<!-- /產品工具列 -->

                <?php $isNull = true; ?>
				<?php if( count($listAllCatelogProduct) > 0 ) { ?>
				<div class="product-items">
							<!-- <div id="center_column" class="center_column col-md-12">
                    <ul class="product_list <?php echo $layout;?> row" style="opacity: 1;"> -->
                    	<?php
      
foreach ( $listAllCatelogProduct as $product )
      {
        if ( $product [ "status" ] == 1 && intval( $product [ "price" ] ) > 0 )
        {
          $isNull = false;
          $productHover = $product [ "src" ];
          if ( isset( $product [ "value" ]->image ) && count( $product [ "value" ]->image ) > 0 )
          {
            $productHover = $product [ "value" ]->image [ 0 ]->url;
          }
          
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
											<a class="product-link"
												href="/product/detail/<?php echo $product["detailKey"];?>">
												<div class="">
													<div class="image">
                          <?php if( $product["inSOff"] === true ){ echo '<div class="on_sale-tccG9-icon pos-center "></div>'; }?>
                          <img class="img-responsive"
															src="<?php echo $productHover;?>"
															alt="<?php echo $product["alt"];?>"
															alt="<?php echo $product["alt"];?>"
															title="<?php echo $product["name"];?>" itemprop="image">
														<div class="op">
															<a
																class="btn btn-default btn-more-info btn-add-to-watch-list btn-follow-it coll"
																data-pid="1"> <i class="fa fa-heart" aria-hidden="true"></i>
																收藏
															</a>

<?php if ( $checkStockAryValue  > 0  ) { ?>
                            <a
																class="btn btn-default btn-add-to-cart buy" data-pid="<?php echo $product["PID"];?>"
																data-formattype="<?php echo $formatType;?>" data-qty="1"><i
																class="fa fa-cart-plus" aria-hidden="true"></i> <?php echo $objLang["product"]["addToCart"];?></a>
                            <?php }?>
                          </div>
													</div>
													<div class="title">
														<a class="product-link"
															href="/product/detail/<?php echo $product["detailKey"];?>"
															title="<?php echo $product["name"];?>"><?php echo $product["name"];?></a>
													</div>
													<div class="price">
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
                            $<?php echo $product["cPrice"];?>
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
      }
      ?>
                    <!-- </ul>
                  </div> -->
						</div>
					</div>
					<!-- 產品分頁 -->

					<!-- 產品分頁 -->
					<?php include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."product" . DIRECTORY_SEPARATOR ."pagination.php"); ?>
					<!-- /產品分頁 -->
				</div>
                <?php
    }
    if ( $isNull === true )
    {
      ?>
					<div class="block_content">
					<div class="m15">
						<center><?php echo $objLang["product"]["CatalogEmpty"];?></center>
					</div>
				</div>
				<?php
    }
    ?>
              </div>
			<!-- /最新商品 -->
		</div>
	</div>
</div>
</div>
</div>
</div>

<link rel="stylesheet" type="text/css"
	href="/libs/devrama.slider/devrama-slider.css" />
<script type="text/javascript"
	src="/libs/devrama.slider/jquery.devrama.slider.js"></script>

<link rel="stylesheet" type="text/css" href="/libs/raty/jquery.raty.css" />
<script type="text/javascript" src="/libs/raty/jquery.raty.js"></script>

<script>
  $( function( )
  {
    $( '.touch-raty' ).raty(
    {
      readOnly: true,
      score: function( )
      {
        return $( this ).attr( 'data-score' );
      }
    } );
  } );
</script>
<script>
  $( function( )
  {
    init_thumbnail( );
  } );
  $( window ).load( init_thumbnail );
  $( window ).resize( init_thumbnail );
  function init_thumbnail( )
  {
    $( ".product_img_linksssss" ).each( function( )
    {
      var w = $( this ).outerWidth( );
      var h = w;
      //$(this).outerHeight();
      $( this ).css(
      {
        "width": w + "px",
        "height": w + "px"
      } );

      var img = $( this ).find( "img" ).eq( 0 );
      var imgW = img[ 0 ].naturalWidth;
      var imgH = img[ 0 ].naturalHeight;
      var imgRate = imgW / imgH;
      $( this ).css(
      {
        "overflow": "hidden"
      } );
      var frameRate = w / h;
      var imageRate = imgW / imgH;

      var gridLayout = $( this ).parent( ).parent( ).hasClass( "grid-artical" );
      if ( gridLayout === false )
      {
        if ( frameRate > imageRate )
        {
          var newImgH = imgH * ( w / imgW );
          var marginTop = ( parseInt( newImgH ) - parseInt( h ) ) / 2;
          $( this ).find( "img" ).css(
          {
            "width": w + "px",
            "height": newImgH + "px",
            "margin-top": "-" + marginTop + "px"
          } );
        }
        else
        {
          var newImgW = imgW * ( h / imgH );
          var marginLeft = ( parseInt( newImgW ) - parseInt( w ) ) / 2;
          $( this ).find( "img" ).css(
          {
            "width": newImgW + "px",
            "height": h + "px",
            "margin-left": "-" + marginLeft + "px"
          } );
        }
      }
    } );
  }
</script>
<style>
.icon-envelope:before {
	content: "\f0e0";
	position: absolute;
	left: 17px;
}

.icon-mobile-phone:before {
	content: "\f10b";
	position: absolute;
	left: 20px;
}

.icon-map-marker:before {
	content: "\f041";
	position: absolute;
	left: 20px;
}

.vel-contactinfo {
	background: url(../img/bg-map.png) no-repeat;
	background-position: left -47px;
}

.vel-contactinfo li .icon {
	-moz-border-radius: 50%;
	border-radius: 50%;
	color: #fff;
	display: inline-block;
	font-size: 14px;
	padding: 6px 0 6px 4px;
	margin-right: 10px;
	text-align: center;
	background-color: #252424;
	width: 25px;
	height: 25px;
	-moz-transition: all 0.5s ease;
	-webkit-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	transition: all 0.5s ease;
}

.rtl .vel-contactinfo li .icon {
	padding: 6px 4px 6px 0;
}

.rtl .vel-contactinfo li .icon {
	margin-left: 10px;
	margin-right: inherit;
}

.vel-contactinfo li>a {
	position: relative;
}

.vel-contactinfo li:hover .icon {
	background-color: #0C0C0C;
}

@media ( max-width : 1024px) {
	.banner-support {
		margin-top: 0;
	}
}

@media ( max-width : 768px) {
	.banner-support {
		margin-top: 0;
	}
	#vel-copyright .copyright {
		position: static;
		width: 100%;
		margin-top: 20px;
	}
	#vel-copyright .block {
		text-align: center;
	}
}
.prom-time {
  font-size: 16px;
  color: #333;
}
@media ( max-width: 480px) {
  .prom-time {
    display: block;
  }
}
.prom-desc {
  font-size: 18px;
  color: #e9057b;
  padding-bottom: 5px;
  padding-left:10px;
}
.topic-prom {
  padding: 10px 5px;
  padding-left: 10px;
  background: #f53d99;
  color: #FFFFFF;
}
</style>