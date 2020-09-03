<style>
                    <!--
                    .tab-block .nav-tabs > li > a {
                    font-size: 18px;
                    position: relative;
                    z-index: 9;
                    padding: 9px 16px;
                    margin-right: 5px;
                    font-weight: normal;
                    color: #777777;
                    border:none;
                    border-bottom: none;
                    background: #EDEDED;
                    }
                    /* tab states */
                    .tab-block .nav-tabs > li > a:hover {
                    color:#fff;
                    background-color: #000;
                    border:none;
                    border-bottom: none;
                    }
                    .tab-block .nav-tabs > li.active > a,
                    .tab-block .nav-tabs > li.active > a:hover,
                    .tab-block .nav-tabs > li.active > a:focus {
                    cursor: default;
                    position: relative;
                    z-index: 12;
                    color:#fff;
                    background-color: #000;
                    border:none;
                    border-bottom: none;
                    }
                    .tab-block .tabs-border.nav-tabs > li.active > a {
                    margin-top: -1px;
                    border:none;
                    border-bottom: none;
                    color:#fff;
                    background-color: #000;
                    border-bottom: none;
                    }
                    .tab-block .tab-content {
                    overflow: auto;
                    position: relative;
                    z-index: 1;
                    min-height: 125px;
                    padding: 16px 12px;
                    border:none;
                    border: 1px solid #DDD;
                    background-color: #FFF;
                    }
                    -->
					.row.productcontent .col-md-12 div#detail-tabs .panel.panel-default div#tab8_1-collapse .panel-body.js-tabcollapse-panel-body p img{
						width:100%;
						height:auto;
					}
					.tab-block .tab-content {
                    overflow: auto;
                    position: relative;
                    z-index: 1;
                    min-height: 125px;
                    padding: 16px 12px;
                    border:none;
                    border: 1px solid #fff;
                    background-color: #FFF;
                    }
					
                  </style>

                  <!--標籤選單切換-->
                  <div id="detail-tabs" class="tab-block mb25 mt25">
                    <ul class="nav nav-tabs detail-tabs tabs-border">
                    <?php
                      $isACT = 'class="active"';
                      $cnt = 1;
                      if ( isset($product["value"]->section) ) {
                      foreach( $product["value"]->section AS $section )
                      {
                        if( !empty($section->title) || !empty($section->section) ) {
                    ?>
                          <li <?php echo $isACT;?>>
                              <a href="#tab8_<?php echo $cnt;?>" data-toggle="tab"><?php echo $section->title;?></a>
                          </li>
                    <?php
                        $cnt++;
                        $isACT = "";
                        }
                      }
                      }
                    ?>
                    </ul>
                    <?php if ( isset($product["value"]->section) ) {?>
                    <div class="tab-content">
                    <?php
                      $isACT = 'active';
                      $cnt = 1;
                      foreach( $product["value"]->section AS $section )
                      {
                        if( !empty($section->title) || !empty($section->section) ) {
                    ?>
                          <div id="tab8_<?php echo $cnt;?>" class="tab-pane <?php echo $isACT;?>"><?php echo $section->content;?></div>
                    <?php
                        $cnt++;
                        $isACT = "";
                        }
                      }
                    ?>
                    </div>
                    <?php }?>
                  </div>

                  <!--看此商品的人也看了-->

                  <!--<div class="rec-products">
                    <div class="rec-products-title">
                      <span>看此商品的人也看了</span>
                    </div>
                    <div class="rec-pros">
                      <a href="this_product">
                      <div class="rec-big">
                        <div class="main-image"><img src="images/demo/detail/cloth1.jpg">
                        </div>
                        <div class="title">
                          三件再折120！合身版-卡夫風格刷毛上衣
                        </div>
                        <div class="price">
                          <span class="member-price"><span class="num">$1380</span> (會員價)</span><span class="disc">33% 折扣</span>
                        </div>

                        <div class="touch-history">
                          <div class="touch-raty mt10 mb10 display-inline-block" data-score="0"></div>
                          <span class="counts">(0)</span>
                        </div>
                      </div> </a>

                      <a href="this_product">
                      <div class="rec-big">
                        <div class="main-image"><img src="images/demo/detail/cloth2.jpg">
                        </div>
                        <div class="title">
                          人氣單品~嚴選針織短版上衣
                        </div>
                        <div class="price">
                          <span class="member-price"><span class="num">$1080</span> (會員價)</span><span class="disc">30% 折扣</span>
                        </div>

                        <div class="touch-history">
                          <div class="touch-raty mt10 mb10 display-inline-block" data-score="3"></div>
                          <span class="counts">(1)</span>
                        </div>
                      </div> </a>

                      <a href="this_product">
                      <div class="rec-big">
                        <div class="main-image"><img src="images/demo/detail/cloth3.jpg">
                        </div>
                        <div class="title">
                          繽紛亮色特殊織紋針織上衣
                        </div>
                        <div class="price">
                          <span class="member-price"><span class="num">$1580</span> (會員價)</span><span class="disc">45% 折扣</span>
                        </div>

                        <div class="touch-history">
                          <div class="touch-raty mt10 mb10 display-inline-block" data-score="4"></div>
                          <span class="counts">(4)</span>
                        </div>
                      </div> </a>

                      <a href="this_product">
                      <div class="rec-big">
                        <div class="main-image"><img src="images/demo/detail/cloth4.jpg">
                        </div>
                        <div class="title">
                          注目休閒~連帽抽繩長版上衣3色
                        </div>
                        <div class="price">
                          <span class="member-price"><span class="num">$1780</span> (會員價)</span><span class="disc">20% 折扣</span>
                        </div>

                        <div class="touch-history">
                          <div class="touch-raty mt10 mb10 display-inline-block" data-score="4.5"></div>
                          <span class="counts">(7)</span>
                        </div>
                      </div> </a>

                      <a href="this_product">
                      <div class="rec-big">
                        <div class="main-image"><img src="images/demo/detail/cloth5.jpg">
                        </div>
                        <div class="title">
                          三件再折120！合身版-卡夫風格刷毛上衣
                        </div>
                        <div class="price">
                          <span class="member-price"><span class="num">$1300</span> (會員價)</span><span class="disc">33% 折扣</span>
                        </div>

                        <div class="touch-history">
                          <div class="touch-raty mt10 mb10 display-inline-block" data-score="0"></div>
                          <span class="counts">(0)</span>
                        </div>
                      </div> </a>

                      <a href="this_product">
                      <div class="rec-big">
                        <div class="main-image"><img src="images/demo/detail/cloth6.jpg">
                        </div>
                        <div class="title">
                          三件再折120！合身版-卡夫風格刷毛上衣
                        </div>
                        <div class="price">
                          <span class="member-price"><span class="num">$2300</span> (會員價)</span><span class="disc">33% 折扣</span>
                        </div>

                        <div class="touch-history">
                          <div class="touch-raty mt10 mb10 display-inline-block" data-score="0"></div>
                          <span class="counts">(0)</span>
                        </div>
                      </div> </a>

                      <a href="this_product">
                      <div class="rec-big">
                        <div class="main-image"><img src="images/demo/detail/cloth7.jpg">
                        </div>
                        <div class="title">
                          三件再折120！合身版-卡夫風格刷毛上衣
                        </div>
                        <div class="price">
                          <span class="member-price"><span class="num">$300</span> (會員價)</span><span class="disc">33% 折扣</span>
                        </div>

                        <div class="touch-history">
                          <div class="touch-raty mt10 mb10 display-inline-block" data-score="0"></div>
                          <span class="counts">(0)</span>
                        </div>
                      </div> </a>

                      <a href="this_product">
                      <div class="rec-big">
                        <div class="main-image"><img src="images/demo/detail/cloth1.jpg">
                        </div>
                        <div class="title">
                          三件再折120！合身版-卡夫風格刷毛上衣
                        </div>
                        <div class="price">
                          <span class="member-price"><span class="num">$6000</span> (會員價)</span><span class="disc">33% 折扣</span>
                        </div>

                        <div class="touch-history">
                          <div class="touch-raty mt10 mb10 display-inline-block" data-score="0"></div>
                          <span class="counts">(0)</span>
                        </div>
                      </div> </a>
                    </div>
                  </div>-->