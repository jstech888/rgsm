        <div class="col-md-12 col-scroll2">
          <div class="scroll2" data-slick='{"slidesToShow": 5, "slidesToScroll": 1}'>
          <?php 
          if ( !empty($adList['value']) && isset($adList['value']) )
          {
            foreach ($adList['value'] as $key => $Aobj) 
            {
              if ( isset( $Aobj['imgsrc'] ) ){
            ?>
                  <div>
                    <a href="<?php echo $Aobj['href'];?>"><img src="<?php echo $Aobj['imgsrc']; ?>"></a>
                  </div>
            <?php
              }
            }
          }
          ?>
          </div>
        </div>