 <style>
   /* 
      .right-clear {
        padding-right: 5px;
      }

      .block .title_block {
        font: 700 14px/22px "Open Sans", sans-serif;
        color: #1d1f1f;
        padding: 0px 11px 15px 0;
        text-transform: uppercase;
        margin: 0 0 2px 0;
      }

      .block .title_block a, .block h4 a {
        color: #1d1f1f;
        font: 700 14px/22px "Open Sans", sans-serif;
        color: #1d1f1f;
        padding: 0px 11px 15px 0;
        text-transform: uppercase;
        margin: 0 0 2px 0;
      }

      .block .title_block a:hover, .block h4 a:hover {
        color: #fbc800;
        text-decoration: none;
      }

      .clearfix:before, .clearfix:after {
        content: " ";
        display: table;
      }

      .clearfix:after {
        clear: both;
      }
 */
 .list-group-item {
    position: relative;
    display: block;
    padding: 10px 15px;
    margin-bottom: -1px;
    background-color: #fff;
    border: 1px solid #fff;
}
    </style>

  <link rel="stylesheet" type="text/css" href="/libs/devrama.slider/devrama-slider.css" />
  <script type="text/javascript" src="/libs/devrama.slider/jquery.devrama.slider.js"></script>

  <link rel="stylesheet" type="text/css" href="/libs/raty/jquery.raty.css" />
  <script type="text/javascript" src="/libs/raty/jquery.raty.js"></script>

  <div id="columns" class="container self">
    <div class="row mt25">
      <div class="col-md-12">
        <!-- 麵包屑 -->
        <ol class="breadcrumb">
          <li>
            <a href="/"><!--<span class="glyphicon glyphicon-home" aria-hidden="true"></span>-->首頁</a>
          </li>            
          <li class="active">
            <a href="/product/catelog/FemaleModernShoes"><?php echo $pageTitle ;?></a>
          </li>
        </ol>
        <div class="clearfix"></div>
        <!-- /麵包屑 -->
      </div>

      
      <div class="col-md-12">

        <!-- 商品 主要區塊 -->
        <div class="col-sm-12">

          <div class="main title">
            <?php echo $pageTitle ;?>
          </div>

          <div class="row">
            <!-- 最新商品 -->
            <div class="col-sm-12">
              <div id="featured-products_block_center" class="block products_block clearfix">
                <!-- 產品工具列 -->
                <?php include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."product" . DIRECTORY_SEPARATOR ."sortPagiBar.php"); ?>
                <!-- /產品工具列 -->
                <?php $isNull = true; ?>
                <?php if( count($listAllCatelogProduct) > 0 ) { ?>
                <div id="center_column" class="center_column ">
                  <ul class="product_list <?php echo $layout;?> row" style="opacity: 1;">
                  <?php foreach( $listAllCatelogProduct AS $product ) 
                    { 
                    if($product["status"] == 1 && intval( $product["price"]) >0 ) 
                    {
                      $isNull = false;
                      $productHover = $product["src"];
                      if( isset($product["value"]->image) && count($product["value"]->image) > 0 )
                      {
                        $productHover = $product["value"]->image[0]->url;
                      }               
                    ?>
                    <li class="ajax_block_product col-xs-12 col-sm-6 col-md-3 ">
                      <div class="product-container default clearfix" itemscope="" itemtype="http://schema.org/Product">
                        <div class="left-block">
                          <div class="product-image-container">
                            <div class="vel-image-more" data-idproduct="<?php echo $product["PID"];?>">
                              <?php if( $product["inSOff"] === true ){ echo '<div class="on_sale-tccG9-icon pos-center "></div>'; }?>
                              <a href="/product/detail/<?php echo $product["detailKey"];?>" data-fancybox-group="other-views" title="<?php echo $product["name"];?>">
                                <img class="img-responsive" src="<?php echo $productHover;?>" alt="<?php echo $product["alt"];?>" title="<?php echo $product["name"];?>" itemprop="image">
                              </a>
                            </div>
                            <a class="product_img_link" href="/product/detail/<?php echo $product["detailKey"];?>" title="<?php echo $product["name"];?>" itemprop="url">
                              <?php if( $product["inSOff"] === true ){ echo '<div class="on_sale-tccG9-icon pos-center "></div>'; }?>
                              <img class=" img-responsive" src="<?php echo $product["src"];?>" alt="<?php echo $product["alt"];?>" title="<?php echo $product["name"];?>" itemprop="image">
                            </a>
                          </div>
                        </div>
                        <div class="right-block">
                          <h5 itemprop="name"><a class="product-name" style="color: #000;font-size: 19px;font-weight: 700;" href="/product/detail/<?php echo $product["detailKey"];?>" title="<?php echo $product["name"];?>" itemprop="url"><?php echo $product["name"];?></a></h5>

                          <div class="content_price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
                            <?php
                            if ( intval($product["price"]) > 0 && intval($product["cPrice"]) > 0 )
                            {
                            ?>
                              <span class="old-price product-price nPrice" style="color: #a09f9f;font-size: 16px;"><?php echo $product["price"];?></span>
                                <span itemprop="price" class="price product-price dPrice" style="color: #ca0a0a;;font-size: 20px;"><?php echo $product["cPrice"];?></span>
                                <span class="spe-mark" style="font-size: 16px;">(<?php echo $objLang["product"]["memberPrice"];?>)</span>
                            <?php
                            }
                            else 
                            {
                            ?>
                                <span itemprop="price" class="price product-price dPrice"><?php echo $product["price"];?></span>
                            <?php
                            }
                            ?>
                          </div>
                          <p class="product-desc" itemprop="description"></p>
                          
                          <div class="description-content">
                      <?php echo isset($product['value']->description) ? strip_tags( $product['value']->description ) : ""; ?>
                      </div>
                          
                          <div class="functional-buttons clearfix"></div>
                        </div>
                      </div>
                      <!-- .product-container> -->
                    </li>
                    <?php
                    }
                  }
                  ?>
                  </ul>
                </div>
                <?php 
                } 
                if( $isNull === true ) 
                { 
                ?>
                  <div class="block_content"><div class="m15"><center><?php echo $objLang["product"]["CatalogEmpty"];?></center></div></div>
                <?php
                }
                ?>
                
                <?php include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."product" . DIRECTORY_SEPARATOR ."pagination.php"); ?>
                <!-- /產品分頁 -->
              </div>
            </div>
            <!-- /最新商品 -->
          </div>
        </div>

      </div>
    </div>
  </div>
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
  #footer {
    background: #3a0003;
  }

  #footer ul {
    list-style: none;
    padding: 0;
  }

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

  .vel-contactinfo li > a {
    position: relative;
  }

  .vel-contactinfo li:hover .icon {
    background-color: #0C0C0C;
  }


  @media (max-width: 1024px) {
    .banner-support {
      margin-top: 0;
    }
  }

  @media (max-width: 768px) {
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
</style>