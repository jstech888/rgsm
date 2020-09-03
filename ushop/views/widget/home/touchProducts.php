                  <div class="block_content ul hotproduct">
                    <ul>
                      <?php 
                      $touchProductscnt = 0 ;
                      foreach( $touchProducts AS $k => $product ) 
                      {
                        if( $product["Shelves"] === false ){ continue; }
                        $touchProductscnt++;
                        if($touchProductscnt===4) { break;}
                      ?> 

                        <li class="item" >
                          <img src="<?php echo $product["src"];?>" width="50px">
                          <a href="/product/detail/<?php echo $product["detailKey"];?>"><?php echo $product["name"];?>
                          <div class="price dPrice"><?php echo $product["cPrice"];?></div></a>
                        </li>
                      <?php
                      }
                      ?>
                    </ul>
                  </div>

