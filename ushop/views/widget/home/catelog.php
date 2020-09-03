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
              .topic-prom {
    margin-top:40px;
}
            }

			
      </style>

    <div id="categories_block_left" class="block">
      <h2 class="title_block"><?php echo $functionBar['productlist'];?></h2>
      <div class="block_content" style="padding-right: 10px;">
        <ul class="list-block tree dynamized" style="display: block;">
          <?php 
        	/*foreach($listChild AS &$child) 
        	{  
					if( $child["status"] == 0 ) 
					{
						if( count($child["child"]) == 0 ) 
						{ 
						?>
							<li><a href="/product/catelog/<?php echo $child["detailKey"];?>" title="<?php echo $child["name"];?>"><?php echo $child["name"];?></a></li>
						<?php 
						} 
						else 
						{ 
						?>
						<li>
							<span class="grower CLOSE"></span>
							<a href="/product/catelog/<?php echo $child["detailKey"];?>" title="<?php echo $child["name"];?>"><?php echo $child["name"];?></a>
							<ul style="display: none;">
								<?php foreach( $child["child"] AS $item ) { ?>
									<?php if( $item["status"] == 0 ) { ?>
								<li class=""><a href="/product/catelog/<?php echo $item["detailKey"];?>" title="<?php echo $item["name"];?>"><?php echo $item["name"];?></a></li>
									<?php } else { ?>
								<li class=""><a href="/product/detail/<?php echo $item["detailKey"];?>" title="<?php echo $item["name"];?>"><?php echo $item["name"];?></a></li>
									<?php } ?>
								<?php } ?>
							</ul>
						</li>
						<?php 
						}
					}
					else 
					{ 
					?>
						<li><a href="/product/detail/<?php echo $child["detailKey"];?>" title="<?php echo $child["name"];?>"><?php echo $child["name"];?></a></li>
					<?php 
					} 
				} */
				?>
        <?php 
        foreach($listChild AS &$child) 
        {  
          if( $child["status"] == 0 && $child["detailKey"] == $mainkey ) 
          {
            if( count($child["child"]) > 0 ) 
            {
              foreach( $child["child"] AS $item ) 
              { 
            ?>
                <li class=""><a href="/product/catelog/<?php echo $item["detailKey"];?>" title="<?php echo $item["name"];?>"><?php echo $item["name"];?></a></li>
            <?php
              }
            }
          }
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
