
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

</style>

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
  .story-caption, .image-block {
    padding: 10px;
  }
  .story-caption {
    text-align: left;
  }
</style>

    <div id="columns" class="container self news">
      <div class="row mt25">
        <div class="col-md-12">
          <!-- 麵包屑 -->
          <ol class="breadcrumb">
            <li><a href="/"><?php echo $objLang['shoppingcart']["home"];?></a></li>
            <li><a href="/news"><?php echo "最新消息";//$objLang['function_bar']["blog"];?></a></li>
            <li><a href="/news/index/<?php echo $article['classKey'];?>"><?php echo $article['classValue'][$Lang]["title"];?></a></li>
            <li><a href="/news/detail/<?php echo $id;?>"><?php echo $article["blog-title"];?></a></li>
          </ol>
          <div class="clearfix"></div>
          <!-- /麵包屑 -->          
        </div>

        <div class="col-md-12">

          <!-- 商品 主要區塊 -->
          <div class="">

            <div class="row story-block mt15">
              <div class="col-md-3 column">

                <div id="categories_block_left" class="block">
                  <h2 class="title_block"><?php echo "最新消息";//$objLang["bloger"]["NewsList"];?></h2>
                    <div class="block_content">
                      <ul class="list-block tree dynamized" style="display: block;padding-left:11px;padding-right:3px;">
                      <?php foreach($allClass AS &$class) { ?>
                        <li>
                          <a href="/news/index/<?php echo $class["key"];?>" title="<?php echo $class["value"][$Lang]["title"];?>"><?php echo $class["value"][$Lang]["title"];?></a>
                        </li>
                      <?php } ?>
                      </ul>
                    </div>
                </div>
                <!-- /Block categories module -->

              </div>

              <div class="col-md-9">
                <H1 style="font-size: 28px; margin-top: 5px;">2016年 最新消息</H1>
                <div class="pnl pnl-info pnl-blog">
                  <div class="pnl-heading">
                    <span class="pnl-title"><?php echo $article["blog-title"];?></span>
                    <span class="pnl-time"><?php echo $objLang["bloger"]["postby"];?><?php echo $article["raw-date"];?></span>
                  </div>                  

                  <div class="pnl-body text-center">
                    <div class="image-block"><img class="story-image" src="<?php echo $article['blog-extra']["url"];?>" alt="<?php echo $article["blog-title"];?>"></div>
                  </div>
                  <div class="pnl-body">
                    <div class="html-content"><?php echo $article['blog-content'];?></div>
                  </div>
                </div>
                <br><br><br>
                <div class="panel-story-footer mb25">
                  <div class="pull-left">
                    <!--
                    <div class="fb-like" style="width: 263px;" data-href="/blog/1" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
                    -->
                    <iframe src="//www.facebook.com/plugins/like.php?href=<?php echo base_url("/blog/detail/".$id);?>&amp;width=500&amp;height=35&amp;colorscheme=light&amp;layout=standard&amp;action=like&amp;show_faces=false&amp;share=true&amp;send=false" scrolling="no" frameborder="0" style="border: none; overflow: hidden; width: 500px; height: 35px; max-width: 100%;" allowtransparency="true"></iframe>
                  </div>
                  <div class="clearfix"></div>
                </div>
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