<div id="" class="blog-ads">
            <div class="col-md-12 col-sm-12 col-xs-12 ">
              <div class="block" id="producttab1364718975">
                <h4 class="title_block"><span>美妝部落</span></h4>
                <div class="block_content">

                  <div id="product_tab_content">
                    <div class="product_tab_content tab-content">
                      <div class="" id="">
                        <div class="row">
                          <div style="display:none;" id="producttab1364718975-category-1" class="owl-carousel product_list grid">
                          <?php
                          foreach( $hotStory AS $story ) 
                          {
                            if ( isset($story["value"]["url"]) )
                            {
                            ?>
                            <div class="item">
                              <div class="ajax_block_product product_block">
                                <div class="product-container default clearfix" itemscope itemtype="http://schema.org/Product">
                                  <div class="left-block">
                                    <div class="product-image-container navTabs-block">
                                      <a class="product_img_link" href="/blog/detail/<?php echo $story["id"];?>" title="" itemprop="url"> 
                                        <img class=" img-responsive2" style="overflow: hidden;height: 180px;" src="<?php echo $story["value"]["url"] ;?>" alt="sample" title="" itemprop="image"> 
                                      </a>
                                    </div>
                                  </div>

                                </div>
                                <!-- .product-container> -->
                              </div>
                            </div>
                            <?php
                            }
                          }
                          ?>
                          </div>
                        </div>
                        <script>
                          $( document ).ready( function( )
                          {
							  $( "#producttab1364718975-category-1" ).show();
                            var owl = $( "#producttab1364718975-category-1" ), status = $( "#owlStatus" );
                            if ( $( 'html' ).hasClass( 'rtl' ) )
                              rtl = 'rtl';
                            else
                              rtl = 'ltr';
                            owl.owlCarousel(
                            {
                              direction: rtl,
                              items: 4,
                              itemsDesktopSmall: [ 1024, 3 ],
                              itemsTablet: [ 768, 2 ],
                              navigation: true,
                              afterAction: afterAction
                            } );

                            function updateResult( pos, value )
                            {
                              status.find( pos ).find( ".result" ).text( value );
                            }

                            function afterAction( )
                            {
                              updateResult( ".owlItems", this.owl.owlItems.length );
                              updateResult( ".currentItem", this.owl.currentItem );
                              updateResult( ".prevItem", this.prevItem );
                              updateResult( ".visibleItems", this.owl.visibleItems );
                              updateResult( ".dragDirection", this.owl.dragDirection );
                            }

                          } );
                        </script>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>