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
		font-size: 16px;
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

    <div id="columns" class="container index self">
      <div class="row">
        <!--大圖輪播-->
        <?php  
        include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."home" . DIRECTORY_SEPARATOR ."WHSlider.php");
        ?>
			</div>

      <?php  
        include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."home" . DIRECTORY_SEPARATOR ."leftMenu.php");
        ?>

        <div class="main-content">

        <!--格狀廣告-->
        <?php    
        include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."home" . DIRECTORY_SEPARATOR ."GridBlock.php");
        ?>

        <!--美妝部落-->
        <?php    
        include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."home" . DIRECTORY_SEPARATOR ."Blog.php");
        ?>

        <!--最新消息-->
        <?php    
        include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."home" . DIRECTORY_SEPARATOR ."News.php");
        ?>

        <!--最新消息-->
        <?php    
        include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."home" . DIRECTORY_SEPARATOR ."promotionBlock.php");
        ?>

        <!--最新消息-->
        <?php    
        include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."home" . DIRECTORY_SEPARATOR ."MemberRight.php");
        ?>

        <?php
          $fbURL = "";
          foreach ( $socialLink as $social )
          {
            if ( !empty( $social [ "href" ] ) )
            {
              $fbURL = strtolower( $social [ "name" ] ) == "facebook" ? $social [ "href" ] : "";
            }
          }
        ?>
        <div class="facebook-page mobile_show">
          <div class="fb-page" data-href="<?php echo $fbURL;?>" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
            <div class="fb-xfbml-parse-ignore">
              <blockquote cite="<?php echo $fbURL;?>">
                <a href="<?php echo $fbURL;?>">Facebook</a>
              </blockquote>
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
 