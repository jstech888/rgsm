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
  border-bottom: 1px solid #c7c6c6;
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
<style type="text/css">
.breadcrumb-icon {
    width: 18px;
    height: 18px;
    position: relative;
    top: inherit;
    margin-left: 0px;
    margin-right: 3px;    
    /* position: absolute; */
    /* top: 3px; */
    /* margin-left: -21px; */
}  

</style>

    <div id="columns" class="container self news makeupstories">
      <div class="row mt25">
        <div class="col-md-12">
          <!-- 麵包屑 -->
          <div class="text-left">
            <ol class="breadcrumb">
              <li><a href="/"><?php echo $objLang['shoppingcart']["home"];?></a></li>
              <li><a href="/news"><?php echo "最新消息";//$functionBar["HotNews"];?></a></li>
              <li class="active"><a href="/news/index/<?php echo $currentClass["key"];?>"><img src="<?php echo $currentClass["icon"][$Lang]["url"];?>" class="breadcrumb-icon"><?php echo $currentClass["value"][$Lang]["title"];?></a></li>
            </ol>
            <div class="clearfix"></div>
          </div>
          <!-- /麵包屑 -->
          <!-- 麵包屑 -->
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
                    2016年 最新消息
                  </div>

                  <div class="col-sm-7 control-bar form-inline mb15">
                    <div class="form-group">
                      <!-- <label for="news-search"><i class="fa fa-search"></i></label> -->
                      <input type="text" class="form-control" id="news-search" placeholder="搜尋最新消息" onkeyup="saveTemp(this);">
                    </div>
                    <div class="form-group">
                      <div class="seleyear">
                        <select class="form-control" onchange="changeYear(this)">
                          <option value="n selected">ALL</option>
                          <option value="2016" selected="">2016</option>
                          <option value="2015">2015</option>
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
                            <a class="img-responsive responsive" style="max-widht:100%;" href="/news/detail/<?php echo $story["id"];?>"><img src="<?php echo $story["value"]["url"];?>></a>
                          </div>
                          <div class="caption">
                            <a href="/1"><H3 class="story-title"><?php echo $story["blog-title"];?></H3></a>
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
                
                </div>
                <!-- /產品分頁 -->
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
        location.href = "/news/index/care?y=" + $( self ).val( );
        // location.href = "/News?y=" + $( self ).val( );
      }

      var keyword = "";
      function saveTemp( self )
      {
        keyword = $( self ).val( );
      }

      function keywordSearch( )
      {
        location.href = "/news/index/care?q=" + keyword;
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