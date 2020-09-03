			<style>
            /* blocks in side column */
            .column .block_content {
              background-color: white;
              -webkit-border-radius: 3px;
              -moz-border-radius: 3px;
              border-radius: 3px;
              margin-top: 0;
              /*padding-left: 10px;*/
            }
            .column .block h4 a, .column .block .title_block a {
              color: #fff;
            }

            .column .block h4:before, .column .block .title_block:before {
              display: none;
            }

            .column .block .products-block li {
              padding: 10px 0;
            }

            .column .block .products-block .products-block-image {
              padding-left: 0;
            }

            .rtl .column .block .products-block .products-block-image {
              padding-right: 0;
              padding-left: inherit;
            }

            .column .block .products-block h5 {
              margin-top: 0;
            }

            .column .block .products-block .product-description {
              height: 38px;
              overflow: hidden;
            }

            .column .block .products-block .comments_note {
              margin-bottom: 10px;
            }

            .column .block .products-block .comments_note .nb-comments {
              font-size: 11px;
              float: right;
            }

            .rtl .column .block .products-block .comments_note .nb-comments {
              float: left;
            }

            .column .block .products-block .price-box {
              text-align: left;
              margin-bottom: 7px;
            }

            .rtl .column .block .products-block .price-box {
              text-align: right;
            }

            .column .block .products-block .price-box .price {
              float: none;
            }

            @media (max-width: 767px) {
              .block .list-block {
                margin-top: 0;
              }
            }
      </style>

    <div id="categories_block_left" class="block">
      <div class="block_content" style="padding-right: 10px;">

      <!-- 主題促銷館 選單 -->
      <ul class="list-block tree promos topic-prom-block dynamized" style="display: block;">
        <div class="topic-prom">主題促銷館</div>
        <?php foreach($halls as $id => $hall ){  

          $classname = ($id==$selfData['id'])? "class=\"active\"":"";
        ?>
        <li <?php echo $classname;?>><img src="/libs/images/icon/icon<?php echo $id % 5; ?>.jpg"><a href="/product/hall/<?php echo $id?>"><?php echo $hall['name']; ?></a></li>

        <?php } ?>
      </ul>

        <ul class="list-block tree dynamized" style="display: block;">
        <?php
        foreach($listChild AS $catChild)
        {
            echo "<li>";
            echo   "<span class=\"glyphicon glyphicon-chevron-right grower OPEN\" aria-hidden=\"true\"></span>";
            echo     "<a href=\"/product/catelog/".$catChild["detailKey"]."\">".$catChild["name"]."</a>" ;
            if( count($catChild["child"]) > 0 )
            {
                echo "<ul>";
                foreach( $catChild["child"] AS $item )
                {
        ?>
          <li class=""><a href="/product/catelog/<?php echo $item["detailKey"];?>" title="<?php echo $item["name"];?>"><?php echo $item["name"];?></a></li>
        <?php
                 }
            }
            echo   "</ul>" ;
            echo "</li>" ;
        }
        ?>

        </ul>
      </div>
    </div>
<script>
  $( function( )
  {
    $( ".grower" ).click( function( )
    {
      if ( $( this ).hasClass( "OPEN" ) === true )
      {
        $( this ).removeClass( "OPEN" );
        $( this ).addClass( "CLOSE" );
        $( this ).parent( ).find( "ul" ).fadeOut( );
      }
      else
      {
        $( this ).removeClass( "CLOSE" );
        $( this ).addClass( "OPEN" );
        $( this ).parent( ).find( "ul" ).fadeIn( );
      }
    } );
  } );
</script>
