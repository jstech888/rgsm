<style>
/*.breadcrumb {
                 padding-left: 25px;
                 }*/
.product-info-price {
	margin-bottom: 15px;
	font-size: 16px;
}

.summary {
	text-align: center;
}

.summary h1 {
	
}

.summary .description {
	text-align: left;
}

.product-extra {
	margin: 0 auto;
	float: initial;
}

.quick-checkout .control-label {
	text-align: right;
	font-size: 15px;
}

.btn-checkout-method {
	background-color: #fff
}

.btn-checkout-method:hover {
	border-color: #DDD;
}

.btn-checkout-method.active {
	background-color: #000;
	border-color: #DDD;
	color: #fff;
}

.quantity-label {
	line-height: 38px;
}

.country-switch>div {
	display: inline-block;
	margin-right: 5px;
}
/*
                 .input-group.bootstrap-touchspin {
                 width: 150px;
                 }*/
.input-group.bootstrap-touchspin>input {
	text-align: right;
}
/*.product-info {
                 margin-left: 15px;
                 }*/
HR {
	margin: 25px 0;
}

.btn-add-to-cart>.fa.fa-shopping-cart {
	background: #6d000f;
	color: #fff;
	width: 24px;
	height: 16px;
	font-size: 16px;
	position: relative;
	margin-top: -3px;
	margin-left: -7px;
	padding-top: 0;
	padding-left: 3px;
}

.product-title {
	font-size: 22px;
}

.qty-block {
	width: 180px;
}

.stock {
	display: block;
	font-size: 18px;
	color: #000;
}

.stock-stauts {
	color: red;
}

.ad-price>.dPrice {
	font-size: 18px;
	font-weight: normal;
	color: #d82272;
	font-family: 'Microsoft JhengHei';
	background-color: #868686;
	padding: 5px 15px;
	color: white;
}

.quick-checkout .control-label {
	padding-left: 0px;
	margin-left: 0px;
	margin-right: 0px;
	padding-right: 0px;
	width: auto;
	text-align: left;
}

.btn-add-to-cart {
	
}

.formatType-select.detail-block {
	padding: 3px;
	height: initial;
	height: auto;
	width: auto;
	max-width: 100%;
}
/*
				
                 .input-group .form-control {
                 height: 41px;
                 }
                 */
#col-md-4 {
	padding-left: 0px;
}

@media screen and (max-width: 991px) {
	#col-md-4 {
		padding-left: 15px;
	}
}
</style>

<div class="product-info">
	<h1 class="product-title">
		<!--<span class="label label-limited">限時促銷</span> -->
                    <?php
                    
echo $product [ 'name' ];
                   
                    ?>
					</h1>
	<div class="product-id">
                  <?php echo $objLang["product"]["itemNo"];?>: <?php echo $product['itemNo']; ?>

                </div>
	<div class="product-brand">
		品牌: <?php echo $product[ "brand" ]; ?>
	</div>



                    <div class="description-title"><?php echo isset($product["value"]->title)?$product["value"]->title:"";?></div>
	<div class="description-content"><?php echo isset($product['value']->description) ? $product['value']->description : ""; ?></div>
	<div class="description-main">

		<!-- 
                    <?php if( $self == false ) { ?>
                      <div class="mt15" style="display: block;font-size: 15px;text-decoration:none;">
                        <?php echo $objLang["product"]["price"];?>： <span class="nPrice" style="text-decoration:none;" ><?php echo $product["price"];?></span>
                      </div>
                      <?php } else { ?> 
                      <div class="mt15" style="display: block;font-size: 15px;">
                        <?php echo $objLang["product"]["price"];?>： <span class="nPrice member-price"><?php echo $product["price"];?></span>
                      </div>
                      <?php } ?>
                      -->




		<div class="old-price">
                    <?php echo $objLang["product"]["price"];?> $<?php echo $product["price"];?>元
                  </div>
		<div class="new-price">
                    <?php echo $objLang["product"]["mermber_price"];?> <span
				class="price">$<?php echo $product["cPrice"];?></span>元
		</div>
                  <?php
                  $discountRate = 0;
                  if ( isset( $product [ "price" ] ) && isset( $product [ "cPrice" ] ) )
                  {
                    if ( intval( $product [ "price" ] ) > 0 && intval( $product [ "cPrice" ] ) > 0 )
                    {
                      $discountRate = round( ( ( intval( $product [ "price" ] ) - intval( $product [ "cPrice" ] ) ) / intval( $product [ "price" ] ) ), 2 ) * 100;
                    }
                  }
                  ?>
                      </div>

	<!-- 
                      <div class="mt15" style="display: block;font-size: 15px;">
                        <?php echo $objLang["product"]["mermber_price"];?>： <span class="disc"><span class="dPrice"><?php echo $product["cPrice"];?></span> <?php echo ($discountRate > 0)? "<span class=\"dPer\">".$discountRate."%</span> ".$objLang["product"]["discountUnit"]:""  ?></span>
                      </div>
                      -->
                      
                      <?php 
// check 庫存
                      $checkStockAryValue = 0; // 0: 售完 ； 1:有數量
                      if ( is_array( $product [ "stock" ] ) )
                      {
                        foreach ( $product [ "stock" ] as $k => $row )
                        {
                          if ( $row [ "value" ] > 0 )
                          {
                            $checkStockAryValue = 1;
                          }
                        }
                      } else
                      {
                        if ( $product [ "stock" ] > 0 )
                        {
                          $checkStockAryValue = 1;
                        }
                      }
                      ?>
                      <?php
                      $discountRate = 0;
                      if ( isset( $product [ "price" ] ) && isset( $product [ "cPrice" ] ) )
                      {
                        if ( intval( $product [ "price" ] ) > 0 && intval( $product [ "cPrice" ] ) > 0 )
                        {
                          $discountRate = round( ( ( intval( $product [ "price" ] ) - intval( $product [ "cPrice" ] ) ) / intval( $product [ "price" ] ) ), 2 ) * 100;
                        }
                      }
                      ?>
                      


                
                
                    

                      
                      



                    <div class="buy">
		<form>
			<div class="row">
                          
                            <?php
                            
if ( is_array( $product [ "stock" ] ) )
                            {
                              $stockTitleStr = "";
                              $tmpStockTotalCnt = count( $product [ "stock" ] [ 0 ] [ "formatTypeTitle" ] );
                              $tmpStockCnt = 0;
                              foreach ( $product [ "stock" ] [ 0 ] [ "formatTypeTitle" ] as $key => $value )
                              {
                                $stockTitleStr .= $value [ "title" ];
                                $tmpStockCnt ++;
                                ( $tmpStockTotalCnt > $tmpStockCnt ) ? $stockTitleStr .= " - " : "";
                              }
                              ?>
                              <div class="form-group col-md-12">
					<label><?php echo $stockTitleStr; ?>： </label> <select
						class="formatType-select form-control"
						data-pid="<?php echo $product["PID"];?>">
						<option value=""><?php echo $objLang["product"]["selectWording"];?></option>
                                <?php foreach( $product["stock"] AS $row ) { ?>
                                  <option
							value="<?php echo $row["formatType"];?>"> <?php echo $row["formatType"];?></option>
                                <?php } ?>
                              </select>
				</div>
                            <?php }?>
                          
                        </div>
			<div class="row">
                          <?php
                          if ( $checkStockAryValue > 0 )
                          {
                            ?>
                          <div class="form-group col-md-12">
					<div class="quantity">
						<div class="name">
                            <?php echo $objLang["product"]["qty"];?>:
                          </div>
						<div class="total">
							<input type="number" class="quantity btn-selectQty-to-add"
								value="1" step="1" min="1" max="20"
								data-pid="<?php echo $product["PID"];?>">
						</div>



					</div>

				</div>
                          <?php
                          }
                          ?>
                          <div
					class="price-tools form-group col-md-10 buttons">
					<div class="row">
                              <?php
                              // 直接購買
                              if ( $checkStockAryValue > 0 )
                              {
                                ?>
                                <div class="col-md-4">
							<a class="btn btn-default btn-more-info btn-add-to-cart btn-buy-direct"
								data-pid="<?php echo $product["PID"];?>"
								data-formattype="<?php echo is_array( $product["stock"] )?"":"F"?>"
								data-qty="1"><?php echo $objLang["product"]["directBuy"];?></a>
						</div>
                              <?php
                              }
                              ?>
                              <div class="col-md-4" id="col-md-4">
                                <?php
                                
								if ( $checkStockAryValue > 0 )
                                {
                                  ?>
                                  <a
								class="btn btn-default btn-more-info btn-add-to-cart"
								style="background: #e9057b; border: 1px solid #e9057b;"
								data-pid="<?php echo $product["PID"];?>"
								data-formattype="<?php echo is_array( $product["stock"] )?"":"F"?>"
								data-qty="1"> <i class="fa fa-cart-plus" aria-hidden="true"></i><span>&nbsp;</span><?php echo $objLang["product"]["addToCart"];?></a>
                                <?php
                                } else
                                {
                                  ?>
                                  <a
								class="btn btn-default btn-more-info disabled"> <span
								class="glyphicon glyphicon-gift" aria-hidden="true"></span><span>&nbsp;</span><?php echo $objLang["product"]["sellOut"];?></a>
                                <?php
                                }
                                ?>
                              </div>
						<div class="col-md-4" id="col-md-4">
                                <?php
                                
								if($checkStockAryValue > 0 && $self !== false )
                                {
                                  ?>
                                	<a class="btn btn-default btn-more-info btn-add-to-watch-list btn-follow-it" data-pid="<?php echo $product["PID"];?>"> <i class="fa fa-heart" aria-hidden="true"></i><span>&nbsp;</span><?php echo $objLang["product"]["followIt"];?></a>
                                <?php
                                }
                                ?>
                              </div>
					</div>
				</div>
			</div>
		</form>
	</div>



	<!-- 促銷優惠 -->
	<div class="info">

		<div id="productPromTabs" class="tab-block mb25 mt25">
			<ul class="nav nav-tabs detail-tabs tabs-border">
				<li class="prom active"><a href="#productProm1" data-toggle="tab"><span
						class="ind"></span><?php echo "促銷優惠"; ?></a></li>
				<li class="shipping"><a href="#productProm2" data-toggle="tab"><span
						class="ind"></span><?php echo "滿額免運"; ?></a></li>
			</ul>
			<div class="tab-content">
				<div id="productProm1" class="tab-pane active">
					<?php
						echo $allHall_description;
						if($prodHall['description']!='') {
							echo $prodHall['description'];
						}
					?>					
					<?php /*<div class="productProm">
						<p>
							<span class="im">** 全館折扣 :</span> 8折, 促銷商品不再另享全館折扣與折價券之優惠~ <br> <span
								class="im">** 紅利積點 : ★寵! 會員加贈1000點★</span>單筆消費金額每滿NT30元即可
							自動累積一點, 累積滿NT3,000元(含)以上，按積點比例予以扣除 <br>  <span class="im">**
								滿兩件優惠 :</span> 任兩件出貨, 滿2件大優惠, 一罐399元, <br> 活動時間: 2016/04/01
							10:00 ~ 2016/05/31 23:59 <br>
						</p>
					</div>*/?>
				</div>
				<div id="productProm2" class="tab-pane">
					<div class="productProm">
						<ul class="freeShipping">
							<li><img src="/libs/images/demo/7-Eleven.png"> 滿額免運</li>
							<li><img src="/libs/images/demo/FamilyMart.jpg"> 滿額免運</li>
						</ul>
						<div class="shipping">
							<i class="fa fa-truck" aria-hidden="true"></i> 宅配,
							每筆50元,滿399(含以上)免運費
						</div>

					</div>
				</div>
			</div>
		</div>

	</div>




</div>