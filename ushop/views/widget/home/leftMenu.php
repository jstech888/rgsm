<div class="left-menu">
	<div id="categories_block_left" class="block">
		<div class="block_content">
        <!-- 主題促銷館 選單 -->
        <?php if($halls) { ?>
        <ul class="list-block tree promos dynamized topic-prom-block"
				style="display: block;">
				<div class="topic-prom">主題促銷館</div>

        <?php foreach($halls as $id => $hall ){  ?>
        <li><img src="/libs/images/icon/icon<?php echo $id % 5; ?>.jpg"><a href="/product/hall/<?php echo $id?>"><?php echo $hall['name']; ?></a></li>

        <?php } ?>
      </ul>
      <?php } ?>
              <ul class="list-block tree dynamized" style="display: block;">

				
        <?php /*
        <li><span class="glyphicon glyphicon-chevron-right grower OPEN"
					aria-hidden="true"></span> <a><?php echo $functionBar['brand'];?></a>
					<ul>
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
                  </ul></li>
                <?php */
                foreach ( $listChild as $catChild )
                {
                  echo "<li>";
                  echo "<span class=\"glyphicon glyphicon-chevron-right grower OPEN\" aria-hidden=\"true\"></span>";
                  echo "<a href=\"/product/catelog/" . $catChild [ "detailKey" ] . "\">" . $catChild [ "name" ] . "</a>";
                  if ( count( $catChild [ "child" ] ) > 0 )
                  {
                    echo "<ul>";
                    foreach ( $catChild [ "child" ] as $item )
                    {
                      ?>
                      <li class=""><a
					href="/product/catelog/<?php echo $item["detailKey"];?>"
					title="<?php echo $item["name"];?>"><?php echo $item["name"];?></a></li>
                    <?php
                    }
                  }
                  echo "</ul>";
                  echo "</li>";
                }
                ?>

              </ul>
		        </div>
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
            <div class="facebook-page mobile_none">
        			<div class="fb-page" data-href="<?php echo $fbURL;?>" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
        				<div class="fb-xfbml-parse-ignore">
        					<blockquote cite="<?php echo $fbURL;?>">
        						<a href="<?php echo $fbURL;?>">Facebook</a>
        					</blockquote>
        				</div>
        			</div>
		        </div>

	</div>
	<!-- /Block categories module -->

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
</div>