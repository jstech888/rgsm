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

    <div class="footer-container clearfix">
      <footer id="footer">
        <div class="vel-footer-center clearfix">
          <div class="container">
            <div class="row">
              <div class="t">
                <?php echo (isset($footer[0]["value"][0]))?$footer[0]["value"][0]["content"]:"";?>
              </div>
              <br>
              <div class="m">
                <?php echo (isset($footer[0]["value"][1]))?$footer[0]["value"][1]["content"]:"";?>
              </div>
              <div class="b">
                <?php echo (isset($footer[0]["value"][2]))?$footer[0]["value"][2]["content"]:"";?>
              </div>

              <!--回到最上面的按鈕-->
              <span id="back-top"> <img src="/libs/images/btn_top.png"> </span>

            </div>
          </div>
        </div>
        <div class="vel-footer-bottom clearfix"></div>
      </footer>
    </div>
    <!-- #footer -->

    <script type="text/javascript">
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

    </script>

  </body>
</html>