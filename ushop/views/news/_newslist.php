    <style>
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

      /*.block .title_block a:hover, .block h4 a:hover {
       color: #fbc800;
       text-decoration: none;
       }*/

      .clearfix:before, .clearfix:after {
        content: " ";
        /* 1 */
        display: table;
        /* 2 */
      }

      .clearfix:after {
        clear: both;
      }

      #center_column {
        padding-right: 0;
        padding-left: 0;
      }

      .product_img_link {

      }
      .block-title.news {
        border: none;
        font-size: 22px;
        margin-top: 7px;
        /*padding-left: 0;*/        
      }
      .news-content {
        border-top: 3px solid #8850a3;
      }

    </style>
<?php /*
    <link rel="stylesheet" type="text/css" href="/libs/devrama.slider/devrama-slider.css" />
    <script type="text/javascript" src="/libs/devrama.slider/jquery.devrama.slider.js"></script>

    <link rel="stylesheet" type="text/css" href="/libs/raty/jquery.raty.css" />
    <script type="text/javascript" src="/libs/raty/jquery.raty.js"></script>

    <link rel="stylesheet" type="text/css" href="/libs/cloud-zoom/cloudzoom.css">
    <script type="text/javascript" src="/libs/cloud-zoom/cloudzoom.js"></script>

    <link rel="stylesheet" type="text/css" href="/libs/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css">
    <script type="text/javascript" src="/libs/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>

    <!-- Slick.js CSS -->
    <!--
    <link rel="stylesheet" type="text/css" href="/libs/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="/libs/slick/slick-theme.css">-->

    <!-- Slick JS -->
    <!--<script type="text/javascript" src="/libs/slick/slick.js"></script>-->

    <!-- <script type="text/javascript" src="/assets/jquery.countdown.min.js"></script> -->

    <script src="/libs/addr/json2.js"></script>
    <script src="/libs/addr/json2ext.js"></script>
    <script src="/libs/addr/jquery.twAddrHelper.js"></script>
    <script src="/libs/addr/jquery.twzipcode-1.6.7.js"></script>

    <link rel="stylesheet" type="text/css" href="/libs/devrama.slider/devrama-slider.css" />
    <script type="text/javascript" src="/libs/devrama.slider/jquery.devrama.slider.js"></script>

    <link rel="stylesheet" type="text/css" href="/libs/raty/jquery.raty.css" />
    <script type="text/javascript" src="/libs/raty/jquery.raty.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.0/masonry.pkgd.min.js"></script>
*/ ?>
    <style>
      .breadcrumb-block {
        position: relative;
        display: block;
        margin-left: 0;
        margin-right: 0;
      }
      .caption > H3 {
        margin-top: 5px;
        margin-bottom: 5px;
        height: auto;
        cursor: pointer;
        font-weight: normal;
        font-size: 18px;
      }
      .caption > H3:hover {
        color: #601586;
      }
      .water-flow {
        position: relative;
        display: block;
      }
      @media (max-width: 1400px) {
        .breadcrumb-block {
          width: 950px;
          margin: 0 auto;
          padding: 0 11px;
        }
        .water-flow {
          margin-left: auto;
          margin-right: auto;
        }
      }
      @media (max-width: 992px) {
        .breadcrumb-block {
          width: 705px;
          margin: 0 auto;
          padding: 0 11px;
        }
      }
      @media (max-width: 768px) {
        .breadcrumb-block {
          width: 305px;
          position: relative;
          max-width: 100%;
          margin: 0 auto;
          padding: 0;
        }
      }
      .control-bar {
        padding: 10px 15px;
        /*background: #cbcbcb;*/
        text-align: right;
        margin: 5px 0;
      }
      /*
       .item-story {
       width: 300px;
       margin: 10px;
       float: left;
       border: 1px solid #C6C6C6;
       }
       */
      h3.story-title {
        font-size: 20px;
        line-height: 26px;
        margin: 10px 0;
      }
      span.pnl-title {
        font-size: 20px;
        color: #5b1c80;
      }
      .pnl-heading {
        border-bottom: 1px solid #e91e63;
        margin-bottom: 5px;
        padding: 5px 0;
      }
      .pnl-body.text-center {
        padding: 15px 0;
      }
      .right.post-time {
        margin: 10px;
        text-align: right;
      }
      .story-image {
        max-width: 100%;
      }
    </style>

    <div id="columns" class="container self news makeupstories">
      <div class="row mt25">
        <div class="col-md-12">
          <!-- 麵包屑 -->
          <ol class="breadcrumb">
            <li><a href="/"><?php echo $objLang['shoppingcart']["home"];?></a></li>
            <li><a href="/news"><?php echo "最新消息";//$functionBar["HotNews"];?></a></li>
            <li class="active"><a href="/news/index/<?php echo $currentClass["key"];?>"><?php /*<img src="<?php echo $currentClass["icon"][$Lang]["url"];?>" class="breadcrumb-icon">*/?><?php echo $currentClass["value"][$Lang]["title"];?></a></li>
          </ol>
          <div class="clearfix"></div>
          <!-- /麵包屑 -->
        </div>

        <div class="col-md-12">

          <!-- 商品 主要區塊 -->
          <div class="">

            <div class="row mt25">
              <div class="col-md-3 col-md-pull-9 column">

                <div id="categories_block_left" class="block">
                  <h2 class="title_block"><?php echo "最新消息";//$objLang["bloger"]["NewsList"];?></h2>
                  <div class="block_content">
                    <ul class="list-block tree dynamized" style="display: block;padding-left:11px;padding-right:3px;">
                    <?php 
                      foreach($allClass AS &$class) {
                        if($class["value"][$Lang]["title"]!=''){
                    ?>
                          <li>
                            <a href="/news/index/<?php echo $class["key"];?>" title="<?php echo $class["value"][$Lang]["title"];?>"><?php echo $class["value"][$Lang]["title"];?></a>
                          </li>
                    <?php 
                        }
                      } 
                    ?>                    
                    </ul>
                  </div>                  
                </div>
                <!-- /Block categories module -->

              </div>
              <div class="col-md-9 col-md-push-3">
                <div class="row">
                  <div class="block-title news col-sm-5 ml0">
                    <?php if($s_year!='') echo $s_year."年&nbsp;&nbsp;&nbsp;&nbsp;"; ?><?php echo $currentClass["value"][$Lang]["title"];?> 
                  </div>

                  <div class="col-sm-7 control-bar form-inline mb15">
                    <div class="form-group">
                      <!-- <label for="news-search"><i class="fa fa-search"></i></label> -->
                      <input type="text" class="form-control" id="news-search" placeholder="搜尋最新消息" onkeyup="saveTemp(this);">
                    </div>
                    <div class="form-group">
                      <div class="seleyear">
                        <select class="form-control" onchange="changeYear(this)">
                          <option value="">ALL</option>
                          <option value="2016" <?php echo $s_year=="2016"? "selected":"";?> >2016</option>
                        </select>
                      </div>
                    </div>
                    <a class="btn btn-success" onclick="keywordSearch();">Search</a>
                  </div>
                </div>

                
                <div class="text-left news-content">
                  <div class="artical-block list-artical row" style=" width: 100%;">

                  <?php 
                    
                    $ind = 1;
                    foreach( $listStory AS $story ) { ?> 
                      
                      <div class="item-story item-story-<?php echo $ind;?> col-md-6">
                        <div class="border-box">
                          <div class="middleMaxnaill">
                            <a href="/news/detail/<?php echo $story["id"];?>"><img src="<?php echo $story["value"]["url"];?>" class="img-responsive responsive" style="max-widht:524px;"></a>
                          </div>
                          <div class="caption">
                            <a href="/news/detail/<?php echo $story["id"];?>"><H3 class="story-title"><?php echo $story["blog-title"];?></H3></a>
                            <span class="story-desc"><?php echo mb_substr(strip_tags($story["blog-content"]),0,180);?></span>
                            <div class="panel-time"><?php echo $objLang["bloger"]["postby"];?><?php echo $story["markDate"];?></div>
                          </div>
                        </div>
                      </div>
                  
                  <?php } ?>

                  </div>
                </div>

                <!-- 產品分頁 -->
                <style>
                  /*.bottom-pagination-content {
                   position: relative;
                   display: block;
                   }

                   .pagination {
                   margin: 0 auto;
                   }

                   #paginationdiv {
                   padding: 10px 6px 8px;
                   }

                   .top-pagination-content ul.pagination li, .bottom-pagination-content ul.pagination li {
                   display: inline-block;
                   float: left;
                   margin: 1px 2px 0;
                   padding: 3px 7px;
                   border: 1px solid #BDBDBD;
                   }

                   .top-pagination-content ul.pagination li > a, .top-pagination-content ul.pagination li > span, .bottom-pagination-content ul.pagination li > a, .bottom-pagination-content ul.pagination li > span {
                   margin: 0 1px 0 0px;
                   padding: 0;
                   display: block;
                   color: #999999;
                   background: none;
                   border: none;
                   }

                   .top-pagination-content ul.pagination li > a > span.tool, .bottom-pagination-content ul.pagination li > a > span.tool {
                   color: #000;
                   }

                   .top-pagination-content ul.pagination li.active > a > span, .bottom-pagination-content ul.pagination li.active > a > span {
                   color: #fff;
                   }

                   .top-pagination-content ul.pagination li.active, .bottom-pagination-content ul.pagination li.active {
                   border: 1px solid #0C0C0C;
                   background-color: #0C0C0C;
                   }

                   .top-pagination-content ul.pagination li > a.disable, .bottom-pagination-content ul.pagination li > a.disable {
                   cursor: no-drop;
                   }

                   .product-count {

                   }

                   .pagination > li > a:hover, .pagination > li > span:hover, .pagination > li > a:focus, .pagination > li > span:focus {
                   color: #000;
                   background-color: #eeeeee;
                   border-color: #777;
                   }*/
                </style>

                <?php include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."news" . DIRECTORY_SEPARATOR ."pagination.php"); ?>

                <?php /*<div class="content_sortPagiBar text-center" id="paginationdiv">
                  <div class="bottom-pagination-content row clearfix">

                    <!-- Pagination -->
                    <div id="pagination_bottom" class="pagination clearfix">
                      <ul class="pagination">
                        <li>
                          <a aria-label="Previous" class="disable"> <span aria-hidden="true" class="tool">&laquo;</span> </a>
                        </li>
                        <li class="active">
                          <a><span>1</span></a>
                        </li>
                        <li>
                          <a><span>2</span></a>
                        </li>
                        <li>
                          <a><span>3</span></a>
                        </li>
                        <li>
                          <a><span>4</span></a>
                        </li>
                        <li>
                          <a aria-label="Next" class="disable"> <span aria-hidden="true" class="tool">&raquo;</span> </a>
                        </li>
                      </ul>
                    </div>
                    <div class="product-count">
                      目前於第1頁，共13頁

                    </div>
                    <!-- /Pagination -->
                  </div>
                </div>
                <!-- /產品分頁 -->
                */?>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

    <script>
      window.onload = function( )
      {
        $( '.water-flow' ).masonry(
        {
          itemSelector: '.item-story',
          columnWidth: 320
        } );
      };

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

      function changeYear( self )
      {
        location.href = "?s_year=" + $( self ).val( );
      }

      var keyword = "";
      function saveTemp( self )
      {
        keyword = $( self ).val( );
      }

      function keywordSearch( )
      {
        location.href = "?q=" + keyword;
      }
    </script>

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
      $(function(){
        init_thumbnail( );
      });

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

    <?php /*<script type="text/javascript">
      $( function( )
      {
        $( "#footer .block_content.ul" ).each( function( )
        {
          $( this ).find( "ul" ).addClass( "toggle-footer" );
          $( this ).find( "ul > li" ).addClass( "item" );
        } );

        $( "#back-top" ).hide( );
        $( "#back-top" ).click( function( )
        {
          jQuery( "html,body" ).animate(
          {
            scrollTop: 0
          }, 1000 );
        } );
        $( window ).scroll( function( )
        {
          if ( $( this ).scrollTop( ) > 100 )
          {
            $( '#back-top' ).fadeIn( "fast" );
          }
          else
          {
            $( '#back-top' ).stop( ).fadeOut( "fast" );
          }
        } );
        $( ".article-desc, .story-desc" ).each( function( )
        {
          var temp = $( this ).find( ".pull-left.author-section" ).clone( );
          var readMore = $( this ).find( ".readMore" ).clone( );
          $( this ).find( ".pull-left.author-section" ).remove( );
          $( this ).find( ".readMore" ).remove( );
          $( this ).text( $( this ).text( ) );
          $( temp ).appendTo( $( this ) );
          $( readMore ).appendTo( $( this ) );
        } );
      } );
    </script>

    <script>
      ( function( i, s, o, g, r, a, m )
      {
        i[ 'GoogleAnalyticsObject' ] = r;
        i[ r ] = i[ r ] ||
        function( )
        {
          ( i[ r ].q = i[ r ].q || [ ] ).push( arguments );
        }, i[ r ].l = 1 * new Date( );
        a = s.createElement( o ), m = s.getElementsByTagName(o)[ 0 ];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore( a, m );
      } )( window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga' );

      ga( 'create', 'UA-72126719-1', 'auto' );
      ga( 'send', 'pageview' );

    </script>*/?>