<style>
  /* blocks in side column */
  .column .block_content {
    background-color: white;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    margin-top: 0;
    padding-left: 10px;
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

            <div class="block_content">
              <ul class="list-block tree dynamized" style="display: block;">

                <?php /*<li><span class="glyphicon glyphicon-chevron-right grower CLOSE" aria-hidden="true"></span> <a><?php echo $functionBar['brand'];?></a>
                  <ul style="display:none;">
                    <?php
                    if ( isset( $BrandList [ 0 ] [ "value" ] ) )
                    {
                      foreach ( $BrandList [ 0 ] [ "value" ] as $bkey => $bvalue )
                      {
                        echo "<li>";
                        echo "<a href=\"/product/tags/" . $bvalue [ "brand" ] . "\">" . $bvalue [ "title" ] . "</a>";
                        echo "</li>";
                      }
                    }
                    ?>
                  </ul>
                </li>*/?>

                <?php
                foreach ( $listChild as $catChild )
                {
                  echo "<li>";
                  echo "<span id=\"catelog_".$catChild["PID"]."\" class=\"glyphicon glyphicon-chevron-right grower CLOSE\" aria-hidden=\"true\"></span>";
                  echo "<a href=\"/product/catelog/" . $catChild [ "detailKey" ] . "\">" . $catChild [ "name" ] . "</a>";
                  if ( count( $catChild [ "child" ] ) > 0 )
                  {
                    echo "<ul style='display:none;'>";
                    foreach ( $catChild [ "child" ] as $item )
                    {
                      $thisClass = ($item['detailKey']==$selfData["detailKey"])? "active":"";
                      ?>
                      <li class="<?php echo $thisClass;?>"><a href="/product/catelog/<?php echo $item["detailKey"];?>" title="<?php echo $item["name"];?>"><?php echo $item["name"];?></a></li>
                    <?php
                    }
                  }
                  echo "</ul>";
                  echo "</li>";
                }
                ?>


            </div>
          </div>
          <!-- /Block categories module -->


 		<script>
    $( function( )
    {
      $( ".grower, #catelog_<?php echo $selfData["parentId"];?>" ).click( function( )
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

      $( "#catelog_<?php echo $selfData["parentId"];?>" ).click();

    } );
    </script>
