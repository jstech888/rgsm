
<style>
  .right-clear {
    padding-right: 5px;
  }

  .block .title_block {
    font: 700 14px/22px "Open Sans", sans-serif;
    color: #1d1f1f;
    padding: 0px 11px 15px 0;
    text-transform: uppercase;
    margin: 0 0 2px 0;
  }

  .block .title_block a, .block h4 a {
    color: #1d1f1f;
    font: 700 14px/22px "Open Sans", sans-serif;
    color: #1d1f1f;
    padding: 0px 11px 15px 0;
    text-transform: uppercase;
    margin: 0 0 2px 0;
  }

  /*.block .title_block a:hover, .block h4 a:hover {
   color: #fbc800;
   text-decoration: none;
   }*/

  .clearfix:before, .clearfix:after {
    content: " ";
    /* 1 */
    display: table;
    /* 2 */
  }

  .clearfix:after {
    clear: both;
  }

  #center_column {
    padding-right: 0;
    padding-left: 0;
  }

  .product_img_link {

  }
  .orders .order .products td.total{
      text-align:   right;
  }
  @media (min-width: 992px) {
    .col-md-1 {
      width: 10%;
    }
  }
  td.total.subtotal-price {
    padding-right: 20px;
    font-size: 17px;
  }
  .orders .order .total-price{
    padding: 0px 30px 20px 30px;
  }
  .btn-invoice-type:hover, .btn-invoice-type.active, .btn-invoice-type:active {
    background: #7814a2;
    border-color: #a91fe3;
    box-shadow: none;
    text-shadow: none;
    color: #FFF;
  }
</style>

<link rel="stylesheet" type="text/css" href="/libs/devrama.slider/devrama-slider.css" />
<script type="text/javascript" src="/libs/devrama.slider/jquery.devrama.slider.js"></script>

<link rel="stylesheet" type="text/css" href="/libs/raty/jquery.raty.css" />
<script type="text/javascript" src="/libs/raty/jquery.raty.js"></script>

<link rel="stylesheet" type="text/css" href="/libs/cloud-zoom/cloudzoom.css">
<script type="text/javascript" src="/libs/cloud-zoom/cloudzoom.js"></script>

<link rel="stylesheet" type="text/css" href="/libs/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css">
<script type="text/javascript" src="/libs/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>

<!-- Slick.js CSS -->
<!--
<link rel="stylesheet" type="text/css" href="/libs/slick/slick.css">
<link rel="stylesheet" type="text/css" href="/libs/slick/slick-theme.css">-->

<!-- Slick JS -->
<!--<script type="text/javascript" src="/libs/slick/slick.js"></script>-->

<!-- <script type="text/javascript" src="/assets/jquery.countdown.min.js"></script> -->

<script src="/libs/addr/json2.js"></script>
<script src="/libs/addr/json2ext.js"></script>
<script src="/libs/addr/jquery.twAddrHelper.js"></script>
<script src="/libs/addr/jquery.twzipcode-1.7.8.min.js"></script>

<link rel="stylesheet" type="text/css" href="/libs/devrama.slider/devrama-slider.css" />
<script type="text/javascript" src="/libs/devrama.slider/jquery.devrama.slider.js"></script>

<link rel="stylesheet" type="text/css" href="/libs/raty/jquery.raty.css" />
<script type="text/javascript" src="/libs/raty/jquery.raty.js"></script>



    <div id="columns" class="container self detail">
      <div class="row mt25">

        <div class="col-md-12 orders">

          <!-- 商品 主要區塊 -->
          <div class="col-sm-12">

            <div class="main title"><?php echo $objLang["shoppingcart"]['title'];?></div>

            <div class="steps">
              <div id="steps_1" class="step active">
                <span class="stp">STEP</span>
                <span class="title"><span class="n">01</span> <?php echo $objLang["shoppingcart"]['shoppingcartTitle']; //確認購物明細與折扣?></span>
              </div>
              <div id="steps_2" class="step">
                <span class="stp">STEP</span>
                <span class="title"><span class="n">02</span> 選擇付款方式</span>
              </div>
              <div id="steps_3" class="step">
                <span class="stp">STEP</span>
                <span class="title"><span class="n">03</span> 填寫配送資訊</span>
              </div>
              <div id="steps_4" class="step">
                <span class="stp">STEP</span>
                <span class="title"><span class="n">04</span> 購物完成</span>
              </div>
            </div>

            <div class="order">
              <div class="mainbuy-title">
                主商品
              </div>
              <div class="mainbuy products table-responsive">
                <table class="table table-hover table-striped shoppincart-table">
                  <thead>
                    <tr>
                      <th>商品照片</th>
                      <th><?php echo $objLang["shoppingcart"]['productdTitle'];?></th>
                      <th><?php echo $objLang["product"]['price'];?></th>
                      <th><?php echo $objLang["product"]['mermber_price'];?></th>
                      <th><?php echo $objLang["shoppingcart"]['productFormatType'];?></th>
                      <th><?php echo $objLang["shoppingcart"]['productQuantity'];?></th>
                      <th><?php echo $objLang["shoppingcart"]['productTotal'];?></th>
                    </tr>
                  </thead>
                  <tbody class="page-tbody">
                    <tr class="page-total">
                      <td colspan="6" class="total subtotal-price"><?php echo $objLang["shoppingcart"]['subtotal'];?>: </td><td><span class="shoppingcart-subtotal">0</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="total-price"></div>
              
              <div class="disc step1">
                <?php //if( $ShoppingPointRate > 0 ) { ?>
                <div class="points">
                  <div class="title">
                    使用購物金：
                  </div>
                  <div class="value">
                    <div class="rule">
                      <?php echo $objLang["shoppingcart"]['pointTitle'].":";?><span style="color:red">
                      <?php 
                          if( $ShoppingPointRate > 0 ) { 
                            echo str_replace("_shoppingPoint_",$ShoppingPointRate, $objLang["shoppingcart"]['pointDesc1']);
                          }
                      ?>
                      <?php echo $objLang["shoppingcart"]['pointDesc2']; /*購物金使用規則 單筆購物每300元，可兌換1購物金！  每1購物金，可折抵下次訂單1元！*/?></span>
                    </div>
                    <div class="lb-title" <?php echo ($ShoppingPointMaxRate!=0 && $ShoppingPointMaxRate!='')? 'style="width:255px;" ':'';?>>
                      <?php echo $objLang["shoppingcart"]['shoppingmoenyTitle'];?>
                      <?php echo ($ShoppingPointMaxRate!=0 && $ShoppingPointMaxRate!='')? "<span style='color:red'>(折抵上限: 購物金額".$ShoppingPointMaxRate."%)</span>":"";?>
                    </div>
                    <?php
                      $ShoppingPointMax = ($ShoppingPointMaxRate!=0 && $ShoppingPointMaxRate!='')? $ShoppingPointMaxRate*$ucart['total']/100 : $shoppingPoint;
                      $ShoppingPointMax = $ShoppingPointMax > $self['point'] ? $self['point'] : $ShoppingPointMax;
                    ?>
                    <div class="lb-value" <?php echo ($ShoppingPointMaxRate!=0 && $ShoppingPointMaxRate!='')? 'style="width:initial;" ':'';?>>
                      <div class="input-group">
                        <input type="number" value="0"  min="0" max="<?php echo $ShoppingPointMax;?>" class="form-control" id="aaa" name="input-shopping-point" width="100">
                        <span class="input-group-btn">
                          <button class="btn btn-secondary" type="button" onclick="checkoutFlow.go(3);">
                            <?php echo $objLang["shoppingcart"]["pointValidate"];/*使用*/?>
                          </button> </span>
                      </div>

                      <div class="useinfo">
                        <i class="fa fa-bell"></i> <?php echo $objLang["shoppingcart"]["pointDescription"]; /*需按下 使用 才會於本次消費中扣除！*/?>
                      </div>

                      <script type="text/javascript">
                      <!--            
                        var maxPoint = <?php echo $shoppingPoint?>;
                        var maxPoint2 = <?php echo $ShoppingPointMax?>;
                        $(function(){
                          if( maxPoint  == 0 )
                          {
                            $("input[name='input-shopping-point']").attr("disabled", true);
                            //$('<span class="help-block">'+objLang.shoppingcart.emptyPoint+'</span>').insertAfter($("input[name='input-shopping-point']"));
                          } 
                          else
                          {
                            $("input[name='input-shopping-point']").TouchSpin({ min: 0, max: maxPoint2, step: 1, decimals: 0, boostat: 5, maxboostedstep: 10});
                          }
                          
                        });
                        //-->
                      </script>

                    </div>
                  </div>
                </div>
                <?php //} ?><!-- 購物金 >0 才顯示 END --> 

                <div class="coupons step1">
                  <div class="title">
                    使用優惠券：
                  </div>
                  <div class="value">
                    <div class="lb-title"><?php echo $objLang["shoppingcart"]["couponCode"];?></div>
                    <div class="lb-value">
                      <div class="input-group">
                        <input id="input-coupon" type="text" class="form-control">
                        <span class="input-group-btn">
                          <button class="btn btn-secondary" type="button" onclick="validateCoupon();"><?php echo $objLang["shoppingcart"]["couponValidate"];?></button> 
                        </span>
                      </div>

                      <div class="useinfo">
                        <i class="fa fa-bell"></i> <?php echo $objLang["shoppingcart"]["couponDescription"];//需檢核通過才會視同使用於本次消費！?>
                      </div>
                    </div>
                  </div>

                  <script type="text/javascript">
                  <!--          
                  function validateCoupon()
                  {
                    $.ajax({
                       url: "/checkout/coupon",
                       type:"POST",
                       dataType:'json',
                       data:{
                        ticketNumber : $("#input-coupon").val()
                       },
                       success: function(data,status,xhr){
                        var type = data.code == 1 ? "info" : "danger";
                        PM.show({title:objLang.shoppingcart.couponTitle, text: data.message, type: type});
                        if( data.code == 1 )
                        {
                          coupon.ticketNumber = $("#input-coupon").val();
                          coupon.amount = data.result;
                          //$(".shoppingcart-trip-3").text("(-)"+data.result);

                          //checkoutFlow.go(4); 
                        }
                        else
                        {
                          coupon.ticketNumber = "";
                          coupon.amount = 0 ;
                        }
                        checkoutFlow.go(4); 
                       },
                       error:function(xhr, ajaxOptions, thrownError){ 
                        PM.erro({title:objLang.shoppingcart.couponTitle, text:objLang.shoppingcart.validateError});
                       }
                    });
                  }
                  //-->
                  </script>
                </div>
              </div>


              <div class="disc step2" style="display:none;">
                <div class="points">
                  <div class="title">
                    選擇付款方式：
                  </div>
                  <div class="value">
                    <div class="form-group">
                      <div class="lb-title">
                        點選結帳方式
                      </div>
                      <div class="lb-value">
                        <div class="btn btn-default btn-checkout-method btn-xs active" data-method="PayOnArrival"><?php echo $objLang['shoppingcart']["PayOnArrival"];?></div>
                        <div class="btn btn-default btn-checkout-method btn-xs" data-method="BankRemittances"><?php echo $objLang['shoppingcart']["BankRemittances"];?></div>
                        <?php /*<div class="btn btn-default btn-checkout-method btn-xs" data-method="CreditCard">線上刷卡</div>
                        <div class="btn btn-default btn-checkout-method btn-xs" data-method="WebATM">WebATM</div>
                        <div class="btn btn-default btn-checkout-method btn-xs" data-method="ConvenienceStorePayBarcode">24H付款(超商、郵局條碼付款、虛擬帳戶)</div>
                        <div class="btn btn-default btn-checkout-method btn-xs" data-method="ConvenienceStorePayCode">超商取貨付款</div>*/ ?>
                        <div class="btn btn-default btn-checkout-method btn-xs" data-method="Allpay"><?php echo $objLang['shoppingcart']["Allpay"];?></div>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row BankRemittancesInfo-block" style="display:none;">
                      <div class="col-xs-12 col-sm-12 shop-account-info-content">
                        <div class="table-responsive">
                          <table class="table table-hover table-bordered shop-account-info">
                            <thead>
                              <tr>
                                <th>銀行名稱</th>
                                <th>帳戶名稱</th>
                                <th>帳戶編號</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><?php echo $BankRemittancesInfo['BankNameValue'];?></td>
                                <td><?php echo $BankRemittancesInfo['BankACValue'];?></td>
                                <td><?php echo $BankRemittancesInfo['BankACNoValue'];?></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="title">
                    選擇發票類型：
                  </div>
                  <div class="value">
                    <div class="form-group">
                      <div class="lb-title">
                        點選發票類型
                      </div>
                      <div class="lb-value">
                        <div class="btn btn-default btn-invoice-type btn-xs active" data-method="InvoiceTypeOne"><?php echo $objLang['shoppingcart']["InvoiceTypeOne"];?></div>
                        <div class="btn btn-default btn-invoice-type btn-xs" data-method="InvoiceTypeTwo"><?php echo $objLang['shoppingcart']["InvoiceTypeTwo"];?></div>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row" id="InvoiceTypeTwo-block" style="display:none;">
                      <div class="col-xs-12 col-sm-12 shop-account-info-content">
                        <div class="form-group">
                          <div class="lb-title">
                            請填寫抬頭
                          </div>
                          <div class="lb-value">
                            <input type="text" class="form-control" name="invoice-title" id="invoice-title" style="" maxlength="8" placeholder="請填寫抬頭" value="" required="">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="lb-title">
                            請填統一編號
                          </div>
                          <div class="lb-value">
                            <input type="text" class="form-control" name="invoice-num" id="invoice-num" style="" maxlength="8" placeholder="請填寫統一編號" value="" required="">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

              <div class="points step3" style="display:none;">
                <div class="title blk">
                  <?php echo $objLang["shoppingcart"]['reciverTitle'];?>：
                </div>

                <div class="value blk">
                  <div class="form-group">
                    <label class="col-md-1 control-label" id="yyy"><?php echo $objLang['shoppingcart']["reciverName"];?></label>
                    <div class="col-md-9">
                      <input type="text" name="reciverName" class="input-text text form-control" required />
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="form-group">
                    <label class="col-md-1 control-label" style="line-height: 40px;" id="zzz"><?php echo $objLang['shoppingcart']["shipAddress"];?></label>
                    <div class="col-md-9">
                      <div class="address-box">
                        <div id="dvAddress">
                          <input type="hidden" class="cCountry"   value="TW" />
                          <div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" id="same">
                                同會員地址請打勾</label>
                            </div>

                            <div class="country-switch text-left">

                              <label class="radio-inline">
                                <input type="radio" name="region" id="region0"  value="0" checked>
                                <?php echo $objLang['shoppingcart']["Taiwan"];?> </label>
                              <!--<label class="radio-inline">
                                <input type="radio" name="region" id="region1" value="1"><?php //echo $objLang['shoppingcart']["China"];?></label>
                              </label>-->
                              <label class="radio-inline">
                                <input type="radio" name="region" id="region2" value="2">
                                <?php echo $objLang['shoppingcart']["Foreign"];?> </label>

                            </div>
                            <div class="countrysel" id="twzipcode">

                              <div data-role="county"   class="autoZip display-inline-block"></div>
                              <div data-role="district"   class="autoZip display-inline-block"></div>
                              <div data-role="zipcode"  class="zipcodedata display-inline-block"></div>

                            </div>

                            <input type="text" id="address" class="cZip cAddress form-control mt15 mb15" required />
                          </div>
                          <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                        <script type="text/javascript">
                          var addr =
                          {
                            "taiwan": "0",
                            "county": "<?php echo $self['county'];?>",
                            "district": "<?php echo $self['district'];?>",
                            "address": "<?php echo $self['address'];?>"
                          };
                          var setAddress = false;
                          $( function( )
                          {
                            $( '.country-switch input[type="radio"]' ).each( function( )
                            {
                              $( this ).on( "click", function( )
                              {
                                var val = $( '.country-switch input[type="radio"]:checked' ).val( );
                                ( val == 0 ) ? $( ".cCountry" ).val( "TW" ) : $( ".cCountry" ).val( "OT" );
                                ( val == 0 ) ? $( ".autoZip" ).fadeIn( ) : $( ".autoZip" ).fadeOut( );
                                ( val == 0 ) ? $( ".zipcodedata" ).fadeIn( ) : $( ".zipcodedata" ).fadeOut( );
                                $( ".cAddress " ).val( "" );

                                //console.log( val ) ;
                                init_transDetail(); //計算運費

                              } );
                            } );

                            $( '#twzipcode' ).twzipcode( );
                            // setAddressInput($("#dvAddress"));

                            $( "[name=\"county\"]" ).bind( "change", function( )
                            {
                              $( ".cAddress " ).val( $( this ).val( ) + $( "[name=\"district\"]" ).val( ) );

                              init_transDetail(); //計算運費 台灣外島

                            } );
                            $( "[name=\"district\"]" ).bind( "change", function( )
                            {
                              $( ".cAddress " ).val( $( "[name=\"county\"]" ).val( ) + $( this ).val( ) );

                              init_transDetail(); //計算運費 台灣外島

                            } );
                            $( ".autoZip" ).find( "input" ).bind( "change", function( )
                            {
                              $( ".cZip" ).val( $( this ).val( ) );
                            } );

                          } );
                        </script>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="sendnote form-group">
                    <label class="col-md-1 control-label">配送備註</label>
                    <div class="col-md-9">
                      <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>

              <div class="total-box">
                <div class="list">
                  <div class="name">
                    <?php 
                      $productQuantity = $ucart['count'] ;
                      $productsAmountTitle = $objLang['shoppingcart']['productsAmountTitle'] ;
                      $productsAmountTitle = str_replace("_prodQty_", $productQuantity, $productsAmountTitle);
                      echo $productsAmountTitle ;
                      // (共1件主商品及1件加價商品) 購物金額總計
                    ?>                    
                  </div>
                  <div id="trans-old-total" class="val"><?php echo $ucart['total'];?></div>
                </div>
                <?php 
                  /*
                  if($DateLimitCheckoutDiscount["inTerm"] === true) {
                    if ( floatval($cart["total"]) >= floatval($DateLimitCheckoutDiscount["LimitAmount"]) )
                    {
                ?>
                <div class="list" >
                  <div class="name"><?php echo $objLang['shoppingcart']['dateLimitDiscountName'];?>(<?php echo round(( floatval( 1 - $DateLimitCheckoutDiscount["Rate"] ) ) * 100);?>%)</div>
                  <div id="DateLimitCheckoutDiscount-text" class="val">
                  <?php
                    $discount = $cart["total"] * round(( floatval( 1 - $DateLimitCheckoutDiscount["Rate"] ) ),2);
                    echo "(-)".$discount;
                  ?>
                  </div>
                </div>
                <?php 
                  }
                }*/
                ?>
                <div class="list">
                  <div class="name"><?php echo $objLang['shoppingcart']['couponTitle'];/*優惠券折抵*/?></div>
                  <div id="tran-coupon" class="val">(-)0</div>
                </div>
                
                <?php //if( $ShoppingPointRate > 0 ) { ?>
                <div class="list">
                  <div class="name">
                    <?php echo $objLang['shoppingcart']['TradeIn'];/*購物金*/?>
                  </div>
                  <div id="point-TradeIn" class="val">(-)0</div>
                </div>
                <?php //} ?>

                <div class="list step3" style="display:none;">
                  <div class="name"><?php echo $objLang['shoppingcart']['Fare'];?></div>
                  <div class="val" id="trans-fare">0</div>
                </div>
                <div class="list step3" style="display:none;">
                  <div class="name"><?php echo $objLang['shoppingcart']['Fee'];//手續費?></div>
                  <div class="val" id="trans-fee">0</div>
                </div>

                <div class="list all">
                  <div class="name">
                    <div class="n1"><?php echo $Currency;?> <?php echo "應付金額";//$objLang['shoppingcart']['total'];?></div>
                    <div class="n2">(不含運費及手續費)</div>
                  </div>
                  <div id="trans-total" class="val"></div>
                </div>
              </div>

              <div class="data2 step1">
                <div class="nt1">
                  <p>
                    <span style="color:#b00202;">提醒您:</span>
                    <br>
                    ※ 請確認您商品的尺寸規格, 數量, 價格, 使用購物金額及是否使用優惠卷，確定後將無法進行任何更改哦!!
                    <br>
                    ※ 若您尚有其他商品需加購，請點選【繼續加購】，如果沒有要再加購商品，請點選【下一步】。
                    <br>
                    ※ 商品加入購物車但未結帳前，並無保留商品庫存功能，商品庫存分配將以結帳順序為依據。
                    <br>
                  </p>
                  <p>
                    <span style="color:#b00202;">注意事項:</span>
                    <br>
                    ※<span style="color:#b00202;">購物金折抵和實際折扣金額將於確認訂單時顯示。</span>
                    <br>
                    ※欲使用優惠折扣碼, 請先<span style="color:#b00202;">登入會員</span>; 若您尚未成為會員, 請先<span style="color:#b00202;">加入會員</span>。
                    <br>
                    ※<span style="color:#b00202;">加價購商品不能以回饋金折抵。</span>
                    <br>
                    ※如訂購商品無法順利出貨或缺貨，我們將以e-mail通知並直接取消該商品，訂單內如還有其他商品也將繼續為您安排出貨作業。(海外訂單不適用)
                    <br>
                    ※一旦訂單完成結帳，恕無法修改任何訂單資料，免運或滿額等所有優惠亦無法合併計算。
                    <br>
                    ※如退貨後訂單未達加價購門檻，且加價購又未附回者，將視為訂單缺件或毀損，恕無法辦理退貨!請務必一起退回!
                    <br>
                  </p>
                </div>
              </div>

              <div class="next step1">
                <a class="btn btn-default btn-more-info btn-prev" href="/">繼續購物</a>
                <a class="btn btn-default btn-more-info btn-prev" style="background: #e9057b; border: 1px solid #e9057b;" onclick="goStep(2);"> 下一步</a>
              </div>
              <div class="next step2" style="display: none;">
                <a class="btn btn-default btn-more-info btn-prev" href="/">繼續購物</a>
                <a class="btn btn-default btn-more-info btn-prev" style="background: #e9057b; border: 1px solid #e9057b;" onclick="goStep(3);"> 下一步</a>
              </div>
              <div class="next step3" style="display: none;">
                <a class="btn btn-default btn-more-info btn-prev" href="/">繼續購物</a>
                <a class="btn btn-default btn-more-info btn-prev" style="background: #e9057b; border: 1px solid #e9057b;" onclick="checkout();"> 結帳</a>
              </div>

            </div>

          </div>

        </div>

      </div>

    </div>
<script type="text/javascript">
function goStep(step){
  if(step==2){
    nowStep = 2;
    init_transDetail();
    $('#steps_1').removeClass("active");
    $('#steps_2').addClass("active");
    $('#steps_3').removeClass("active");
    setTimeout(function() {
      $('.step1').fadeOut();
      $('.step2').fadeIn();
      $('.step3').fadeOut();
    }, 200);
  }
  else if(step==3){
    if(chkInvoiceType()){
      nowStep = 3;
      $('#steps_1').removeClass("active");
      $('#steps_2').removeClass("active");
      $('#steps_3').addClass("active");
      // getFeeFare();
      setTimeout(function() {
        $('.step1').fadeOut();
        $('.step2').fadeOut();
        $('.step3').fadeIn();
        init_transDetail();
      }, 200);    
    }
  }
}
function getFeeFare(){
  // 避免 shoppingcart 還沒 init 時候 拿 php 傳來的值 , 但如可修改購物車的數量時 要double check
  var shoppincart_total = ( shoppincart.core.total == undefined )? <?php echo $ucart["total"] ?> : shoppincart.core.total ; 
  var shoppincart_twTotal = ( shoppincart.core.twTotal == undefined )? <?php echo $ucart["twTotal"] ?> : shoppincart.core.twTotal ; 

  //限時滿額折扣
  var discountAmount = 0 ;
  // if ( DateLimitCheckoutDiscount.inTerm === true ) {
  //   if ( parseFloat(shoppincart_total) >= parseFloat(DateLimitCheckoutDiscount.LimitAmount) ){
  //     discountAmount = Math.round( parseFloat(shoppincart_total) * ( 1 - parseFloat(DateLimitCheckoutDiscount.Rate) ) ) ; 
  //   }
  //   else{
  //     DateLimitCheckoutDiscount.inTerm = false ;  
  //   }
  // }

  // 手續費 / 運費
  objFeeFare = readFeeFare();

  ( ( shoppincart_twTotal - checkoutData.shoppingPoint ) > FreeFare )?objFeeFare.fare = 0:''; 
  $("#trans-fare").text(objFeeFare.fare);
  $("#trans-fee").text(objFeeFare.fee);
}

</script>
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
<script>
var DateLimitCheckoutDiscount = <?php echo json_encode($DateLimitCheckoutDiscount);?>;
var Currency = '<?php echo $Currency;?>';
var setAddress = false;
var isLogin = <?php echo ($self === false)?'false':'true';?>;
var isUseShoppingPoint = true;
<?php /*var isUseShoppingPoint = <?php echo ($ShoppingPointRate > 0 )?'true':'false';?>;*/?>
var nonUserInfo = {"fullname":"","phone":"","mail":""};
var methods = <?php echo json_encode($methods);?>;
var FreeFare = '<?php echo $FreeFare;?>';
var ExchangeRate = <?php echo json_encode($ExchangeRate);?>;
var reciverSlot = <?php echo json_encode($reciverSlot);?>;
var checkoutData = {
  cashFlow : "",
  cashFlowData : {},
  shipFlow : "CompleteAddress",
  shipFlowData : {
    reciverName : '',
    region    : '',
    zip     : '',
    address   : '',
    city    : '',
    district  : ''
  },
  invoiceData : {
    type : '',
    title: '',
    number: ''
  },
  shoppingPoint : 0
};
var nowStep = 1;
var cango = true;
var allEffectHall = <?php echo json_encode($allEffectHall);?>;

var shoppincart = {
  core : false,
  init : function() {
    $.ajax({
       url: "/shoppingcart/show",
       type:"GET",
       dataType:'json',
       success: function(data,status,xhr){
         var ucart = data;
         shoppincart.core = data;
         $("table.shoppincart-table tr.cart_item").remove();
         $(".shoppingcart-trip-1 > .shoppingcart-total").text(ucart.total);
         $(".shoppingcart-trip-1 > .shoppingcart-total").formatCurrency({ colorize:false, region: region, roundToDecimalPlace: roundToDecimalPlace });
         // $("table.shoppincart-table tr.page-total span.shoppingcart-total").text(ucart.total);
         // $("table.shoppincart-table tr.page-total span.shoppingcart-total").formatCurrency({ colorize:false, region: region, roundToDecimalPlace: roundToDecimalPlace });
         if( ucart.count == 0 )
         {
            $('<tr colspan="7" class="empty"><td colspan="7"><center><H1>'+objLang.shoppingcart.emptyDescription+'</H1></center></td></tr>').insertBefore("table.shoppincart-table tr.page-total");
         }
         else 
         {    
            /*for( var k in ucart.cart )
            {
              var CartItem = shoppincart.createCartItem(ucart.cart[k],k);
              $(CartItem).insertBefore("table.shoppincart-table tr.page-total");
              $('tr#cart-'+k+' td.product-quantity input[name="quantity"]').TouchSpin({ min: 1,　max: ucart.cart[k].stock　});
              
            }
            $('td.product-quantity input[name="quantity"]').on("change",function(){
              $(this).parent().parent().parent().find(".btn-update-qty").show();
              console.log($(this).val());
            });*/



            var tmpTotal = ucart.total ;
            var total_main_prodcut = ucart.total_main_prodcut;
            // var tmpTotal = ucart.total ;
            if ( DateLimitCheckoutDiscount.inTerm === true ) {
              if ( parseFloat(ucart.total) >= parseFloat(DateLimitCheckoutDiscount.LimitAmount) ){
                tmpTotal = Math.round(parseFloat(ucart.total)*parseFloat(DateLimitCheckoutDiscount.Rate)) ; 
              }
              else{
                DateLimitCheckoutDiscount.inTerm = false ; 
              }
            }

            $("table.shoppincart-table tr.page-total span.shoppingcart-subtotal").text(total_main_prodcut);
            $("table.shoppincart-table tr.page-total span.shoppingcart-total").text(tmpTotal);
            $("table.shoppincart-table tr.page-total span.shoppingcart-total").formatCurrency({ colorize:false, region: region, roundToDecimalPlace: roundToDecimalPlace });

            $(".shoppingcart-trip-1 > .shoppingcart-total").text(tmpTotal);
            $(".shoppingcart-trip-1 > .shoppingcart-total").formatCurrency({ colorize:false, region: region, roundToDecimalPlace: roundToDecimalPlace });

            for( var k in ucart.cart )
            {
              if ( ucart.cart[k].PID !== undefined ) {
                var CartItem = shoppincart.createCartItem(ucart.cart[k],k);

                if(ucart.cart[k].hall !== undefined){
                  var hall_id = ucart.cart[k].hall;
                  if($("table.shoppincart-table tr.page-total-hall-"+hall_id).html()===undefined){
                    var hall_head = '<div class="mainbuy-title hall'+hall_id+'">'+allEffectHall[hall_id].name+'   <span style="color:red">('+allEffectHall[hall_id].hall_desc+')</div>';
                        hall_head +=  '<div class="mainbuy products table-responsive">';
                        hall_head +=  '<table class="table table-hover table-striped shoppincart-table">';
                        hall_head +=  '<thead>';
                        hall_head +=  '<tr><th>商品照片</th>';
                        hall_head +=  '<th><?php echo $objLang["shoppingcart"]['productdTitle'];?></th>';
                        hall_head +=  '<th><?php echo $objLang["product"]['price'];?></th>';
                        hall_head +=  '<th><?php echo $objLang["product"]['mermber_price'];?></th>';
                        hall_head +=  '<th><?php echo $objLang["shoppingcart"]['productFormatType'];?></th>';
                        hall_head +=  '<th><?php echo $objLang["shoppingcart"]['productQuantity'];?></th>';
                        hall_head +=  '<th><?php echo $objLang["shoppingcart"]['productTotal'];?></th></tr>';
                        hall_head +=  '</thead>';
                        hall_head +=  '<tbody><tr class="page-total-hall-'+hall_id+'">';
                        hall_head +=  '<td colspan="6" class="total subtotal-price"><?php echo $objLang["shoppingcart"]['subtotal'];?>: </td><td><span class="shoppingcart-subtotal-hall-'+hall_id+'">0</span></td>';
                        hall_head +=  '</tr></tbody></table>';
                        hall_head +=  '</div>';
                      $(hall_head).insertBefore("div.total-price");
                  }
                  
                  $(CartItem).insertBefore("table.shoppincart-table tr.page-total-hall-"+hall_id);
                }
                else{
                  $(CartItem).insertBefore("table.shoppincart-table tr.page-total");
                }                
                // $('tr#cart-'+k+' td.product-quantity input[name="quantity"]').TouchSpin({ min: 1,　max: ucart.cart[k].stock　});
              }
            }

            // for( var hallid in ucart.calProduct )
            for( var hallid in ucart.total_promotion )
            {
              $(".shoppingcart-subtotal-hall-"+hallid).text(ucart.total_promotion[hallid]);
              if(hallid!=0){
                var hall_discount_price = '<tr class="cart_item"><td colspan="6" class="total" style="color:red; text-align: right;">'+allEffectHall[hall_id].name+'優惠價：</td><td>'+ucart.calProduct[hallid]+'</td></tr>';
                $(hall_discount_price).insertAfter(".page-total-hall-"+hall_id);
              }
            }

            $('td.product-quantity input[name="quantity"]').on("change",function(){
              $(this).parent().parent().parent().find(".btn-update-qty").show();
              //console.log($(this).val());
            });

            if ( DateLimitCheckoutDiscount.inTerm === true ) {
              if ( parseFloat(ucart.total_main_prodcut) >= parseFloat(DateLimitCheckoutDiscount.LimitAmount) ){
                $("<tr class=\"cart_item\"><td colspan=\"6\" class=\"total\" style=\"color:red; text-align: right;\"><?php echo $objLang['shoppingcart']['dateLimitDiscountName'];?>("+(Math.round((1-parseFloat(DateLimitCheckoutDiscount.Rate))*100))+"%)優惠價：</td><td>"+Math.round(ucart.total_main_prodcut-ucart.total_main_prodcut_discount)+"</td></tr>").insertAfter($("table.shoppincart-table tr.page-total")) ;
                // $("<tr class=\"cart_item\"><td colspan=\"8\" class=\"total\" style=\"color:red; text-align: right;\"><?php echo $objLang['shoppingcart']['dateLimitDiscountName'];?>："+(Math.round((1-parseFloat(DateLimitCheckoutDiscount.Rate))*100))+"%</td></tr>").insertBefore($("table.shoppincart-table tr.page-total")) ;
              }
            }
          }
        },
        error:function(xhr, ajaxOptions, thrownError){ 
          PM.erro({
            title:objLang.shoppingcart.addCartFailureTitle,
            text:objLang.shoppingcart.addCartFailureContent
          });
        }
    });
  },
  createCartItem : function(cartSrc,k) {
    var cartFormatType = "" ;
    if (cartSrc.formatType == "F") {
      cartFormatType = "--" ;
    }
    else{
      cartFormatType = cartSrc.formatType ;
    }
    var newCartSrc = '<tr id="cart-'+k+'" class="cart_item">' + 
      '<td class="product-thumbnail">' +
        '<a href="'+cartSrc.href+'">' +
          '<img src="'+cartSrc.src+'" width="120px" class="responsive" alt="'+cartSrc.alt+'">' +
        '</a>' +
      '</td>' +
      '<td class="product-name"><a href="'+cartSrc.href+'">'+cartSrc.name+'</a></td>' +
      '<td class="product-price">'+cartSrc.showPrice+'</td>' +
      '<td class="product-price">'+cartSrc.showPrice+'</td>' +
      '<td class="product-formatType">'+cartFormatType+'</td>' +
      '<td class="product-formatType">'+cartSrc.qty+'</td>' +
      '<td class="product-subtotal">' +
        '<span class="amount">'+(cartSrc.qty * cartSrc.showPrice)+'</span>' +       
      '</td>' +
    '</tr>';
    return newCartSrc;
  },
  updateCartItem : function( PID, formatType ) {
    var qty = $('#product-qty-input-'+PID).val();
    $.ajax({
       url: "/shoppingcart/update",
       type:"POST",
       dataType:'json',
       data:{ 'PID' : PID, 'qty' : qty, 'formatType' : formatType },
       success: function(data,status,xhr){
         PM.show({
          type: "info",
          title:objLang.shoppingcart.delCartSuccessTitle,
          text:objLang.shoppingcart.delCartSuccessContent
         });    
        shoppincart.init();
        cart.init();
       },
       error:function(xhr, ajaxOptions, thrownError){ 
        PM.erro({
          title:objLang.shoppingcart.addCartFailureTitle,
          text:objLang.shoppingcart.addCartFailureContent
        });   
        shoppincart.init();       
        cart.init();
       }
    });
  },
  delCartItem : function(PID, formatType) {
    $.ajax({
       url: "/shoppingcart/delete",
       type:"POST",
       dataType:'json',
       data:{ 'PID' : PID, "formatType" : formatType },
       success: function(data,status,xhr){
         PM.show({
          type: "info",
          title:objLang.shoppingcart.delCartSuccessTitle,
          text:objLang.shoppingcart.delCartSuccessContent
         });    
        shoppincart.init();
        cart.init();
       },
       error:function(xhr, ajaxOptions, thrownError){ 
        PM.erro({
          title:objLang.shoppingcart.addCartFailureTitle,
          text:objLang.shoppingcart.addCartFailureContent
        });   
        shoppincart.init();       
        cart.init();
       }
    });
  },
  clear : function(PID, formatType) {
    $.ajax({
       url: "/shoppingcart/clear",
       type:"POST",
       dataType:'json',
       data:{ 'PID' : PID, "formatType" : formatType },
       success: function(data,status,xhr){
         PM.show({
          type: "info",
          title:objLang.shoppingcart.delCartSuccessTitle,
          text:objLang.shoppingcart.delCartSuccessContent
         });    
        shoppincart.init();
        cart.init();
       },
       error:function(xhr, ajaxOptions, thrownError){ 
        PM.erro({
          title:objLang.shoppingcart.addCartFailureTitle,
          text:objLang.shoppingcart.addCartFailureContent
        });   
        shoppincart.init();       
        cart.init();
       }
    });
  }
};

var checkoutFlowVaildate = {
  1 : true,
  2 : <?php echo isset($this->self)?"false":"true";?>,
  3 : false,
  4 : false,
  5 : false
};

var checkoutFlow = {
  canGo : true,
  init : function() {
    $('#accordion').on('hidden.bs.collapse', function (e) {
      var targetHandle = $("a.main-accordion[href='#"+$(e.target).attr("id")+"']");
      targetHandle.find("i.fa").removeClass("fa-caret-down");
      targetHandle.find("i.fa").addClass("fa-caret-right");
    });
    $('#accordion').on('shown.bs.collapse', function (e) {
      var targetHandle = $("a.main-accordion[href='#"+$(e.target).attr("id")+"']");
      targetHandle.find("i.fa").removeClass("fa-caret-right");
      targetHandle.find("i.fa").addClass("fa-caret-down");
    });
    $('#accordion').on('hide.bs.collapse', function (e) {     
      return checkoutFlow.canGo;
    });
    $('#accordion').on('show.bs.collapse', function (e) {
      return checkoutFlow.canGo;
    });
  },
  go : function(id) {   
    var cfvKey = (id == 'done')?6:id;
    checkoutFlowVaildate[cfvKey-1] = true;
    var err = false;
    switch(id)
    {
      case 3:
        if( isLogin == false )
        {
          this.validate("fullname");
          this.validate("phone");
          this.validate("mail");
          ( typeof($('#input-basicInfo-isAgress:checked').val()) == "undefined" )?checkoutFlow.canGo = false:"";        
          ( checkoutFlow.canGo == false ) ? alert(objLang.shoppingcart.alertNonAgree) : $("#accordion div.shoppingcart-trip-2").text(objLang.shoppingcart.basicInfoFillOut);
          checkoutFlow.go(4);
        }
        else
        {
          init_transDetail();
        }
        break;
      case 4:
        init_transDetail();
        break;
      case 5:
        var method = $(".btn-checkout-method.active").text();
        var dataMethod = $(".btn-checkout-method.active").attr("data-method");
        
        if( dataMethod == "BankRemittances" )
        {
          if($('[name="input-remittances-account"]').val().match(/^([_A-z0-9]){4,4}$/g))
          {
            $('[name="input-remittances-account"]').removeClass("error");
          }
          else
          {
            $('[name="input-remittances-account"]').addClass("error");
            err = true;
          } 
        }       
        $("#accordion .shoppingcart-trip-4").text(method);
        init_transDetail();
        break;
      case 'done':
        $("#accordion .shoppingcart-trip-5").text( $(".cAddress").val() );  
        
        if( $.trim($(".cAddress").val()) == "" || $.trim($('input[name="reciverName"]').val()) == "" )
        {
          $.trim($(".cAddress").val()) == "" ?$(".cAddress").addClass("error"):"";
          $.trim($('input[name="reciverName"]').val()) == "" ?$('input[name="reciverName"]').addClass("error"):"";
          err = true;
        }
        init_transDetail();
        break;
    }
    
    if( err === true )
    {
      alert(objLang.shoppingcart.fillOutAlert);
      setTimeout(function(){
        $("input.error, select.error").removeClass("error");
      },1000);
      return;
    }

    if( isLogin == true  && isUseShoppingPoint == false && id ==2 ) id = id + 1 ;  //for 購物金== 0 時候不使用 ( id=2 購物車 )要顯示下下一個
    
    $("a.main-accordion > i.fa-caret-down").parent().trigger("click");
    setTimeout(function(){
      $(".shoppingcart-trip-"+id).parent().find("a.main-accordion").trigger("click");       
      setTimeout(function(){ checkoutFlow.canGo = true; },1000);
    },500);
  },
  validate : function(key) {
    var item = $('input[name="input-basicInfo-'+key+'"]').val();
    nonUserInfo[key] = item;
    if($.trim(item) == "")
    {
      $('[name="input-basicInfo-'+key+'"]').parent().addClass("has-error");
      checkoutFlow.canGo = false;
      setTimeout(function(){
        $('[name="input-basicInfo-'+key+'"]').parent().removeClass("has-error");
      },3000);
    }
  }
};

var coupon = {
  ticketNumber : false,
  amount: 0
};
var objFeeFare = false;
function init_transDetail()
{ 
  // 避免 shoppingcart 還沒 init 時候 拿 php 傳來的值 , 但如可修改購物車的數量時 要double check
  var shoppincart_total = ( shoppincart.core.total == undefined )? <?php echo $ucart["total"] ?> : shoppincart.core.total ; 
  var shoppincart_twTotal = ( shoppincart.core.twTotal == undefined )? <?php echo $ucart["twTotal"] ?> : shoppincart.core.twTotal ; 

  //限時滿額折扣
  var discountAmount = 0 ;
  // if ( DateLimitCheckoutDiscount.inTerm === true ) {
  //   if ( parseFloat(shoppincart_total) >= parseFloat(DateLimitCheckoutDiscount.LimitAmount) ){
  //     discountAmount = Math.round( parseFloat(shoppincart_total) * ( 1 - parseFloat(DateLimitCheckoutDiscount.Rate) ) ) ; 
  //   }
  //   else{
  //     DateLimitCheckoutDiscount.inTerm = false ;  
  //   }
  // }

  if(nowStep==3){
    // 手續費 / 運費
    objFeeFare = readFeeFare();

    ( ( shoppincart_twTotal - checkoutData.shoppingPoint ) > FreeFare )?objFeeFare.fare = 0:''; 
    $("#trans-fare").text(objFeeFare.fare);
    $("#trans-fee").text(objFeeFare.fee);
  }
  
  //購物金折抵
  var ERSP = 0;
  var unERSP = 0;
  if( isLogin === true && isUseShoppingPoint === true )
  {
    ERSP  = $('input[name="input-shopping-point"]').val();
    unERSP  = $('input[name="input-shopping-point"]').val();
    
    if( ExchangeRate[Currency] != "TWD" ) 
    {
      ERSP = ( ERSP / parseFloat(ExchangeRate[Currency].rate) );
      ERSP = formatFloat(ERSP,2)
    }
  }
// alert('ERSP1='+ERSP);
  if( isLogin == false )
  {
    $("#accordion .shoppingcart-trip-2").text( $('[name="input-basicInfo-fullname"]').val() );
  }
  else
  {
    $("#accordion .shoppingcart-trip-2").text( "-("+ERSP+")" );
  }

  if(ERSP>shoppincart_total){
    ERSP = shoppincart_total;
    unERSP = shoppincart_total;
    $('input[name="input-shopping-point"]').val(unERSP);
  }

// alert('ERSP2='+ERSP);
  $("#point-TradeIn").text("(-)" + ERSP);
  checkoutData.shoppingPoint = unERSP;
  
  //優惠券折抵 
  $("#tran-coupon").text("(-)" + coupon.amount);

// alert("shoppincart_total="+shoppincart_total+", discountAmount="+discountAmount+", checkoutData.shoppingPoint="+checkoutData.shoppingPoint+", coupon.amount="+coupon.amount+", objFeeFare.fare="+objFeeFare.fare+", objFeeFare.fee="+objFeeFare.fee );
  if(nowStep==3){
    $("#trans-total").text( parseFloat(shoppincart_total) - parseFloat(discountAmount) - parseFloat(checkoutData.shoppingPoint) - parseFloat(coupon.amount) + parseFloat(objFeeFare.fare) + parseFloat(objFeeFare.fee) );
  }
  else{
    $("#trans-total").text( parseFloat(shoppincart_total) - parseFloat(discountAmount) - parseFloat(checkoutData.shoppingPoint) - parseFloat(coupon.amount));  
  }
  $("#trans-total").formatCurrency({ colorize:false, region: region, roundToDecimalPlace: roundToDecimalPlace });
}

function readFeeFare()
{
  var dataMethod = $(".btn-checkout-method.active").attr("data-method");
  var sRegion = "inIsland";
  if( $('input[name="region"]:checked').val() == 0 )
  {
    var outsea =  [ "澎湖縣","金門縣","連江縣","南海諸島","綠島鄉","蘭嶼鄉" ];
    var city  = $("select[name=\"county\"]").val();
    var dist  = $("select[name=\"district\"]").val();
    ( $.inArray(city,outsea) >= 0 ) ? sRegion = "outIsland" : "";
    ( $.inArray(dist,outsea) >= 0 ) ? sRegion = "outIsland" : ""; 
  }
  else
  {
    ( $('input[name="region"]:checked').val() == 1 )?sRegion="china":"";
    ( $('input[name="region"]:checked').val() == 2 )?sRegion="foreign":"";
  }
  var ObjVar = methods[dataMethod][sRegion];
  
  if( ExchangeRate[Currency] != "TWD" && objFeeFare === false) 
  {
    ObjVar.fee  = ( parseFloat(ObjVar.fee)  / parseFloat(ExchangeRate[Currency].rate) );
    ObjVar.fare = ( parseFloat(ObjVar.fare) / parseFloat(ExchangeRate[Currency].rate) );
    ObjVar.fee  = formatFloat(ObjVar.fee,2);
    ObjVar.fare = formatFloat(ObjVar.fare,2);
  }
  return  ObjVar;
}

function checkoutFrmValidate(key) {
    var item = $('input[name="input-basicInfo-'+key+'"]').val();
    nonUserInfo[key] = item;
    if($.trim(item) == "")
    {
      $('[name="input-basicInfo-'+key+'"]').parent().addClass("has-error");
      checkoutFlow.canGo = false;
      setTimeout(function(){
        $('[name="input-basicInfo-'+key+'"]').parent().removeClass("has-error");
      },3000);
    }
}

function chkInvoiceType(){
  var invoiceTypeText = $(".btn-invoice-type.active").text();
  var invoiceTypeValue = $(".btn-invoice-type.active").attr("data-method");
  var invoiceNum = $('#invoice-num').val();

  if(invoiceTypeValue=="InvoiceTypeTwo"){
    if($('#invoice-title').val()==''){
      alert('請輸入抬頭名稱');
      $('#invoice-title').focus();
      return false;
    }

    if($('#invoice-num').val()==''){
      alert('請輸入統一編號');
      $('#invoice-num').focus();
      return false;
    }
    else if(invoiceNum.length!=8){
      alert('統一編號輸入錯誤');
      $('#invoice-num').focus();
      return false;
    }

    return true;
  }

  return true;
}

function checkout()
{
  if( isLogin == false )  // 未登入時 寄件人資料
  {
    checkoutFlow.canGo = true ;
    checkoutFrmValidate("fullname");
    checkoutFrmValidate("phone");
    checkoutFrmValidate("mail");
    if ( checkoutFlow.canGo == false ) 
    {
      alert(objLang.shoppingcart.fillOutAlert) ;
      $('#input-basicInfo-isAgress').focus();
      return false ;
    }
    ( typeof($('#input-basicInfo-isAgress:checked').val()) == "undefined" )?checkoutFlow.canGo = false:"";        
    if ( checkoutFlow.canGo == false ){
      alert(objLang.shoppingcart.alertNonAgree);  
      $('#input-basicInfo-isAgress').focus();
      return false ;
    }
  }
  //收件人資料
  if( $.trim($(".cAddress").val()) == "" || $.trim($('input[name="reciverName"]').val()) == "" )
  {
    if ( $.trim($(".cAddress").val()) == "")
    {
      $(".cAddress").addClass("error") ;
      setTimeout(function(){
        $(".cAddress").removeClass("error");
      },3000);
    } 
    if ( $.trim($('input[name="reciverName"]').val()) == "" )
    {
      $('input[name="reciverName"]').addClass("error");
      setTimeout(function(){
        $('input[name="reciverName"]').removeClass("error");
      },3000);
    }
    alert(objLang.shoppingcart.fillOutAlert) ;
    $('input[name="reciverName"]').focus();
    return false;
  }

  checkoutData.cashFlow  = $(".btn-checkout-method.active").attr("data-method");
// alert('input[name="input-remittances-account"].val='+$("input[name=\"input-remittances-account\"]").val());
  (checkoutData.cashFlow == "BankRemittances")? checkoutData.cashFlowData = { 'BankRemittancesAccount':'' }:"";
  // (checkoutData.cashFlow == "BankRemittances")? checkoutData.cashFlowData = { 'BankRemittancesAccount':$("input[name=\"input-remittances-account\"]").val() }:"";
// alert('checkoutData.cashFlow='+checkoutData.cashFlow);  return;
  
  checkoutData.shipFlowData.reciverName = $('input[name="reciverName"]').val();
  checkoutData.shipFlowData.region    = $('input[name="region"]').val();
  checkoutData.shipFlowData.zip       = $('input[name="zipcode"]').val();
  checkoutData.shipFlowData.address     = $('.cAddress').val();
  checkoutData.shipFlowData.city      = $('select[name="county"]').val();
  checkoutData.shipFlowData.district    = $('select[name="district"]').val();
   
  ( isLogin == false )?checkoutData.nonUserInfo = nonUserInfo:'';
  
  checkoutData.coupon = coupon.ticketNumber;

  checkoutData.invoiceData.type = $(".btn-invoice-type.active").attr("data-method");
  if($(".btn-invoice-type.active").attr("data-method")=="InvoiceTypeTwo"){
    checkoutData.invoiceData.title = $("#invoice-title").val();
    checkoutData.invoiceData.number = $("#invoice-num").val();
  }
  else{
    checkoutData.invoiceData.title = '';
    checkoutData.invoiceData.number = ''; 
  }
// console.log(checkoutData);

  $.ajax({
     url: "/checkout/order",
     type:"POST",
     dataType:'json',
     data:checkoutData,
     success: function(data,status,xhr){
      // console.log(data,status,xhr);
      shoppincart.clear();
      location.href = data.url;
      // alert('結帳完畢，測試庫存不足bug中...');
     },
     error:function(xhr, ajaxOptions, thrownError){ 
      console.log(xhr, ajaxOptions, thrownError);
      PM.erro({
        title:objLang.shoppingcart.orderfailed,
        text:objLang.shoppingcart.orderfailed
      });   
     }
  });

}

function init_deliveryAddress()
{
  var crtA = reciverSlot.value ;
  $("input[name=\"reciverName\"]").val(crtA.reciverName);
  /*$('input[name="region"][value="'+crtA.region+'"]').get(0).click();
  $('select[name="county"] > option[value="'+crtA.city+'"]').prop("selected",true).change();
  $('select[name="county"] > option[value="'+crtA.city+'"]').attr("selected",true).change();
  $('select[name="district"] > option[value="'+crtA.district+'"]').prop("selected",true).change();
  $('select[name="district"] > option[value="'+crtA.district+'"]').attr("selected",true).change();
  $('input[name="zipcode"]').val(crtA.zip);
  $('input.cAddress').val(crtA.address);
  if( crtA.reciverName !="" && crtA.region !="" && crtA.city !="" && crtA.district !="" && crtA.zip !="" && crtA.address !="" ){
    $("#accordion .shoppingcart-trip-5").text( $(".cAddress").val() );  
      
    if( $.trim($(".cAddress").val()) == "" || $.trim($('input[name="reciverName"]').val()) == "" )
    {
      $.trim($(".cAddress").val()) == "" ?$(".cAddress").addClass("error"):"";
      $.trim($('input[name="reciverName"]').val()) == "" ?$('input[name="reciverName"]').addClass("error"):"";
      err = true;
    }
    else{
      checkoutFlowVaildate[5] = true;
    }
    init_transDetail();
  } */
}

var BuyDirect = <?php echo ($BuyDirect === false)?"false":json_encode($BuyDirect);?>;
function buyDirect_init()
{
  if( BuyDirect !== false )
  {
    $(".btn-checkout-method[data-method=\""+BuyDirect.cashFlow+"\"]").get(0).click();
    $('input[name="input-remittances-account"]').val(BuyDirect.cashData);
    $('input[name="reciverName"]').val('<?php echo $self["nickname"];?>');
    $('input[name="region"][value="'+BuyDirect.region+'"]').get(0).click();
    $('select[name="county"] > option[value="'+BuyDirect.county+'"]').prop("selected",true).change();
    $('select[name="county"] > option[value="'+BuyDirect.county+'"]').attr("selected",true).change();
    $('select[name="district"] > option[value="'+BuyDirect.district+'"]').prop("selected",true).change();
    $('select[name="district"] > option[value="'+BuyDirect.district+'"]').attr("selected",true).change();
    $('input[name="zipcode"]').val(BuyDirect.zipcode);
    $('input.cAddress').val(BuyDirect.address);
  }
}

$(function(){

  shoppincart.init();
  checkoutFlow.init();  
  
  $('select[name="county"]').addClass("form-control");
  $('select[name="district"]').addClass("form-control");
  $('input[name="zipcode"]').addClass("form-control");
  $(".btn-checkout-method").each(function(){
    $(this).click(function(){
      $(".btn-checkout-method").removeClass("active");
      $(this).addClass("active");
      $(this).attr("data-method") == "BankRemittances" ? $(".BankRemittancesInfo-block").show() : $(".BankRemittancesInfo-block").hide();
      init_transDetail();
    });
  });
  ( isLogin == false ) ? $(".BankRemittancesInfo-block").show() : "";

  $(".btn-invoice-type").each(function(){
    $(this).click(function(){
      $(".btn-invoice-type").removeClass("active");
      $(this).addClass("active");
      $(this).attr("data-method") == "InvoiceTypeTwo" ? $("#InvoiceTypeTwo-block").show() : $("#InvoiceTypeTwo-block").hide();
    });
  });

});

window.onload = function() {
  var CTRegion = "inIsland";
  Currency == "TWD" ? CTRegion = "inIsland" : '';
  Currency == "CNY" ? CTRegion = "china" : '';
  ( Currency != "TWD" &&  Currency != "CNY" ) ? CTRegion = "foreign" : '';
  
  var firstActive = false;
  $('.btn-checkout-method').removeClass("active");
  for( var m in methods )
  {
    if( methods[m][CTRegion].status == 0 )
    {
      $('.btn-checkout-method[data-method="'+m+'"]').hide();
    }
    else
    {
      $('.btn-checkout-method[data-method="'+m+'"]').show();
      if( firstActive === false )
      {
        $('.btn-checkout-method[data-method="'+m+'"]').trigger("click");
        firstActive = true;
      }
    }
  }
  init_deliveryAddress(); 
  //buyDirect_init();
  <?php 
    echo ($langCode == "en" )? "$('input[name=\"region\"][value=\"2\"]').get(0).click()":"";
  ?>
}
</script>