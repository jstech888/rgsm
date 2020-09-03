<style>
a.product-link {
    color: #000;
    font-size: 18px;
    font-weight: 700;
}
</style>
 			<div class="news-reports">
            <div class="news">
              <div class="block vel-wrap">
                <div class="block blog products-carousel">
                  <h4 class='title_block'><span><?php echo $NewsTitle;?></span></h4>
                  <div class="sdsblog-box-content">
                    <div class="row">
                      <div class="owl-carousel" id="sdsblog">
                      <?php foreach( $itemListNews AS $item ) { ?>
                      
        							<div class="item">
        								<?php foreach( $item AS $post ) { ?>
        								<div class="sds_blog_post">
        									<div class="blog_post_ct clearfix">   
        										<div class="news_module_image_holder">
        											 <a href="/news/detail/<?php echo $post["id"];?>"><img alt="<?php echo isset($post["blog-extra"]["alt"])?$post["blog-extra"]["alt"]:"";?>" class="feat_img_small" src="<?php echo $post['blog-extra']["url"];?>"></a>
        										</div>
        										<h4 class="sds_post_title"><a href="/news/detail/<?php echo $post["id"];?>"><?php echo $post["blog-title"];?></a></h4>
        										<div class="sds_post-info">
        											<span class="sds_creat_date"><?php echo $functionBar["postby"];?><?php echo $post["markDate"];?></span>
        										</div>
        										<div class="sds_desc"><?php echo strip_tags($post["blog-content"]);?></div>
        										<a href="/news/detail/<?php echo $post["id"];?>"  class="r_more btn btn-default"><span><?php echo $functionBar["readMore"];?></span></a>
        									</div>
        								</div>
        								<?php } ?>							
        							</div>
        						<?php } ?>

                      </div>
                    </div>
                  </div>
                  <script>
                    $( document ).ready( function( )
                    {
                      var owl = $( "#sdsblog" ), status = $( "#owlStatus" );

                      if ( $( 'html' ).hasClass( 'rtl' ) )
                        rtl = 'rtl';
                      else
                        rtl = 'ltr';
                      owl.owlCarousel(
                      {
                        direction: rtl,
                        items: 1,
                        itemsDesktop: [ 1400, 1 ],
                        itemsDesktopSmall: [ 1100, 1 ],
                        itemsTablet: [ 997, 1 ],
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

                      /*
                       All owl object information listed below:

                       base.owl = {
                       "userOptions" : base.userOptions,
                       "baseElement" : base.$elem,
                       "userItems"   : base.$userItems,
                       "owlItems"    : base.$owlItems,
                       "currentItem" : base.currentItem,
                       "prevItem"    : base.prevItem,
                       "visibleItems": base.visibleItems,
                       "isTouch"     : base.browser.isTouch,
                       "browser"     : base.browser,
                       "dragDirection": base.dragDirection
                       }
                       */

                    } );
                  </script>
                </div>
              </div>
            </div>

            <div class="reports">
              <div class="block vel-wrap">
                <h4 class="title_block"><span><?php echo isset($SingleVideo[0]["value"]["title"])?$SingleVideo[0]["value"]["title"]:"";?></span><span class="more"><a href="/videos/">更多影片</a></span></h4>
                <div class="block_content">
                  <div class="video-container">
                    <!-- <iframe src="https://www.youtube.com/embed/rZ42-XHQZRo" width="100%" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe> -->
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-4by3">
                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo isset($SingleVideo[0]["value"]["url"])?$SingleVideo[0]["value"]["url"]:"";?>" frameborder="0" allowfullscreen></iframe>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>