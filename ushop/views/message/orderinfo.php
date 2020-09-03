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

    </style>

    <div id="columns" class="container self detail">
      <div class="row mt25">

        <div class="col-md-12 orders">

          <!-- 商品 主要區塊 -->
          <div class="col-sm-12">

            <div class="main title">
              <?php echo $objLang["shoppingcart"]['title'];?>
            </div>

            <div class="steps">
              <div class="step">
                <span class="stp">STEP</span>
                <span class="title"><span class="n">01</span> <?php echo $objLang["shoppingcart"]['shoppingcartTitle']; //確認購物明細與折扣?></span>
              </div>
              <div class="step">
                <span class="stp">STEP</span>
                <span class="title"><span class="n">02</span> 選擇付款方式</span>
              </div>
              <div class="step">
                <span class="stp">STEP</span>
                <span class="title"><span class="n">03</span> 填寫配送資訊</span>
              </div>
              <div class="step active">
                <span class="stp">STEP</span>
                <span class="title"><span class="n">04</span> 購物完成</span>
              </div>
            </div>

            <div class="order">

              <div class="row block">
                <h3 style="text-align: center;color: #ad2b29;font-size: 20px;"><?php echo isset($objLang["orderlist"]['detaillabel1'])?$objLang["orderlist"]['detaillabel1']:"我們會將訂單通知信寄到您的信箱!";?></h3>
                <p style="text-align: center;font-size: 20px;font-size: 16px;">
                  <?php echo isset($objLang["orderlist"]['detaillabel2'])?$objLang["orderlist"]['detaillabel2']:"-以下是您這次的訂單明細-";?>
                </p>
                <div class="col-md-12 image-logo">
                	<img src="<?php echo $logo["url"];?>" class="img-responsive center-block mt10 mw100 col-hidden-xs" alt="<?php echo isset($logo["alt"])?$logo["alt"]:"";?>">
                </div>
              </div>

              <div class="row block">
                <div class="col-md-12 order-about">
                  <div class="order-status">
                    <div class="in title">
                      <?php echo $objLang["orderlist"]['orderStatus'];?>
                    </div>
                    <div class="in"><?php echo $list_order['status']['html'];?></div>
                  </div>
                  <div class="order-time">
                    <div class="in">
                      <?php echo $list_order['createTime'];?>
                    </div>
                    <div class="in">
                      <?php echo $list_order['unique_id'];?>
                    </div>
                  </div>

                </div>
              </div>

              <div class="row" id="invoice-info">
                <div class="col-md-12 text-right print-invoice">
                  <div class="invoice-buttons">
                    <a href="javascript:window.print()" class="btn btn-default btn-print mr10"><i class="fa fa-print pr5"></i> 列印</a>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                    	<span class="panel-title"> <i class="fa fa-user"></i> <?php echo $objLang["orderlist"]['BillTo'];?></span>
                    </div>
                    <div class="panel-body">
						<address>	
							<?php echo $objLang["orderlist"]['BillMail'];?><?php echo $list_order['dataUser']["mail"];?><br> 
							<?php echo $objLang["orderlist"]['BillName'];?><?php echo $list_order['dataUser']["nickname"];?><br> 
							<?php echo $objLang["orderlist"]['BillPhone'];?><?php echo $list_order['dataUser']["phone"];?>
              			</address>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <span class="panel-title" style="font-size: 18px;"> <img src="/libs/images/2.png" style="height: 23px;font-size: 18px;margin-right: 8px;float: left;width: 25px;"> <?php echo $objLang["orderlist"]['ShipTo'];?></span>
                    </div>
                    <div class="panel-body">
                      <address>

                        <?php echo $list_order['shipData']["reciverName"];?>
                        <br>
                        (<?php echo $list_order['shipData']["zip"];?>)<?php echo $list_order['shipData']["address"];?>
                      </address>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <span class="panel-title" style="font-size: 18px;"> <span class="glyphicon glyphicon-credit-card" style="top: 4px;"></span> <?php echo $objLang["orderlist"]['PayMethod'];?> </span>
                    </div>
                    <div class="panel-body">
                      	<address>
                            <?php echo $objLang["shoppingcart"][$list_order['cashFlow']]; ?>
                            <?php
                            if ( isset( $list_order [ 'cashData' ] [ "callback" ] [ "PaymentTypeName" ] ) && $list_order [ 'cashData' ] [ "callback" ] [ "PaymentTypeName" ] != "" )
                            {
                              echo " ( " . $list_order [ 'cashData' ] [ "callback" ] [ "PaymentTypeName" ] . " ) ";
                            }
                            if ( isset( $list_order [ 'cashData' ] [ "callback" ] [ "ExpireDate" ] ) && $list_order [ 'cashData' ] [ "callback" ] [ "ExpireDate" ] != "" )
                            {
                              echo "<br>" . $objLang [ "orderlist" ] [ 'ExpireDate' ] . ":" . $list_order [ 'cashData' ] [ "callback" ] [ "ExpireDate" ];
                            }
                            ?>

							<?php
							if ( $list_order [ 'cashFlow' ] == "BankRemittances" )
					        {
					          echo "<br> " . $objLang [ "shoppingcart" ] [ 'enterRemittancesAccount' ] . $list_order [ 'cashData' ] [ "BankRemittancesAccount" ];
					        }
					        ?>
                        </address>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row" style="margin-top: 10px; margin-bottom: 10px;">
                <img src="/libs/images/1.png" style="margin-left: 31px;height: 25px;font-size: 20px;float: left;width: 20px;">
                <p style="width: 137px;margin-left: 57px;font-size: 18px;margin-bottom: 0px;">
                  匯款資訊
                </p>
                <div class="col-md-12">
				<?php
				    if ( $BankRemittancesInfo != false )
				    {
				      include_once ( VIEWPATH . "widget" . DIRECTORY_SEPARATOR . "checkout" . DIRECTORY_SEPARATOR . "BankRemittancesInfo.php" );
				    }
			    ?>
				</div>
              </div>

              <div class="mainbuy products table-responsive" style="margin-top: 25px; margin-bottom: 15px;">
                <table class="table table-hover table-striped">
                  <thead>
                    <tr>								
                      <th>商品照片</th>
                      <th><?php echo $objLang["orderlist"]['listName'];?></th>
                      <th><?php echo $objLang["product"]['mermber_price'];?></th>
                      <th><?php echo $objLang["orderlist"]['listFormatType'];?></th>
                      <th><?php echo $objLang["orderlist"]['listQTY'];?></th>
                      <th><?php echo $objLang["orderlist"]['listSub'];?></th>                    
                    </tr>
                  </thead>
                  <tbody>
			<?php
			    $tmpcnt = 1;
			    foreach ( $list_order[ 'detail' ] as $row ) {
			      ?>
			      	<tr>
                      	<td class="photo"><img src="<?php echo $row['productPhoto'];?>"></td>
                      	<td class="product-description">
                      		<div class="content">
                        		<p><?php echo $row['dataDetail'][$Lang]["name"];?></p>
                      		</div>
                      	</td>
						<td class="price2"><?php echo $row['price'];?></td>
						<td class="spec"><?php echo ( $row['formatType'] == "F")? "--": $row['formatType'] ;?></td>
						<td class="qty"> <?php echo $row['qty'];?> </td>
						<td class="total"><?php echo $row['price'] * $row['qty'];?></td>
                    </tr>

			<?php
				$tmpcnt ++;
    		}
    		?>

                  </tbody>
                </table>
              </div>

              <div class="total-box">
                <div class="list">
                  <div class="name">
                    <?php /*(共1件主商品及1件加價商品)*/?> 購物金額(已折扣)總計
                  </div>
                  <div class="val">
                    <?php echo number_format(round($list_order['total']/ $list_order['rate'], 4));?>
                  </div>
                </div>
                <?php /*if( isset($list_order["promotionObj"]["value"]["inTerm"]) && $list_order["promotionObj"]["value"]["inTerm"] === true ) { ?>
                <div class="list">
                  <div class="name">
                    <?php echo $objLang["orderlist"]['dateLimitDiscountName'];?>
                  </div>
                  <div class="val">
                    (-)<?php echo $list_order["promotionObj"]["value"]["discountAmout"];?>
                  </div>
                </div>
                <?php } */?>
                <?php if (  $list_order['shoppingPoint'] > 0  || $ShoppingPointRate > 0 ) {?>
                <div class="list">
                  <div class="name">
                    <?php echo $objLang["orderlist"]['lastshoppingPoint'];?>
                  </div>
                  <div class="val">
                    (-)<?php echo ( $list_order['shoppingPoint'] == 0)?0:round($list_order['shoppingPoint']/ $list_order['rate'], 4);?></td>
                  </div>
                </div>
                <?php }?>
                
                <div class="list">
                  <div class="name">
                    <?php echo $objLang["orderlist"]['lastCoupon'];?>
                  </div>
                  <div class="val">
                    (-)<?php echo ( $list_order['coupon']['amount'] == 0)?0:round($list_order['coupon']['amount']/ $list_order['rate'], 4);?>
                  </div>
                </div>
                <div class="list">
                  <div class="name">
                    <?php echo $objLang["orderlist"]['lastFare'];?>
                  </div>
                  <div class="val">
                    <?php echo ( $list_order['transFare'] == 0)?0:round($list_order['transFare']/ $list_order['rate'], 4);?>
                  </div>
                </div>
                <div class="list">
                  <div class="name">
                    <?php echo $objLang["orderlist"]['lastFee'];?>
                  </div>
                  <div class="val">
                    <?php echo ( $list_order['transFee'] == 0)?0:round($list_order['transFee']/ $list_order['rate'], 4);?>
                  </div>
                </div>

                <div class="list all">
                  <div class="name">
                    <div class="n1">
                      <?php echo $objLang["orderlist"]['lastTotal'];?>
                    </div>

                  </div>
                  <div class="val">
                    <span style="display: inline-block;"><?php echo $list_order['iso_code'];?></span>
					<span class="dPrice" style="display: inline-block;"><?php echo round($list_order['clearTotal']/ $list_order['rate'], 4);?></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>