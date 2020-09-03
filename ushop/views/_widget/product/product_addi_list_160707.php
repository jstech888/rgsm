<?php if( count($addiProducts) > 0 ) { ?>
<style>
#total{
    width: 100%;
    text-align: right;
    line-height: 2;
    font-size: 20px;
    height: 50px;
    border-top: 1px solid #ccc;
    border-bottom: 1px solid #ccc;
}
#amt{
	float: left;
    width: 88%;
    font-size: 14px;
    margin-top: 5px;
    display: block;
}
#add{
	float: right;
    width: 150px;
    margin-top: 2px;
}
@media screen and (min-width: 991px) and (max-width: 1439px){
	#amt{
		float: left;
		width: 82%;
		font-size: 14px;
		margin-top: 5px;
		display: block;
	}
}
@media screen and (max-width: 991px){
	#amt{
		float: left;
		width: 75%;
		font-size: 14px;
		margin-top: 5px;
		display: block;
	}
}
@media screen and (max-width: 736px){
	#amt{
		float: left;
		width: 70%;
		font-size: 14px;
		margin-top: 5px;
		display: block;
	}
  #total {
 width: 100%;
    text-align: right;
    line-height: 2;
    margin-top: 40px;
    font-size: 20px;
    /* height: 90px; */
}
.form-control {
  margin-top: 10px;
}
.input-group-btn:first-child>.btn, .input-group-btn:first-child>.btn-group {
  margin-top: 10px;
}
.input-group-btn:last-child>.btn, .input-group-btn:last-child>.btn-group {
    margin-top: 10px;
}
.addi-products .addi-pros .product-item .price .new, .addi-products .addi-pros .product-item .price .add {
    width: 50%;
}

}
@media screen and (max-width: 637px){
	#amt{
		float: left;
		width: 64%;
		font-size: 14px;
		margin-top: 5px;
		display: block;
	}
  #total {
 width: 100%;
    text-align: right;
    line-height: 2;
    margin-top: 40px;
    font-size: 20px;
    /* height: 90px; */
}
.form-control {
  margin-top: 10px;
}
.input-group-btn:first-child>.btn, .input-group-btn:first-child>.btn-group {
  margin-top: 10px;
}
.input-group-btn:last-child>.btn, .input-group-btn:last-child>.btn-group {
    margin-top: 10px;
}
.addi-products .addi-pros .product-item .price .new, .addi-products .addi-pros .product-item .price .add {
    width: 50%;
}
}
@media screen and (max-width: 553px){
	#amt{
		float: left;
		width: 54%;
		font-size: 14px;
		margin-top: 5px;
		display: block;
	}
  #total {
 width: 100%;
    text-align: right;
    line-height: 2;
    margin-top: 40px;
    font-size: 20px;
    /* height: 90px; */
}
.form-control {
  margin-top: 10px;
}
.input-group-btn:first-child>.btn, .input-group-btn:first-child>.btn-group {
  margin-top: 10px;
}
.input-group-btn:last-child>.btn, .input-group-btn:last-child>.btn-group {
    margin-top: 10px;
}
.addi-products .addi-pros .product-item .price .new, .addi-products .addi-pros .product-item .price .add {
    width: 50%;
}
}
@media screen and (max-width: 466px){
	#amt{
		float: left;
		width: 100%;
		font-size: 14px;
		margin-top: 5px;
		display: block;
		text-align: center;
	}
	#add {
    float: none;
    width: 150px;
    margin-top: 5px;
    margin: auto;
	}
  #total {
 width: 100%;
    text-align: right;
    line-height: 2;
    margin-top: 40px;
    font-size: 20px;
    /* height: 90px; */
}
.form-control {
  margin-top: 10px;
}
.input-group-btn:first-child>.btn, .input-group-btn:first-child>.btn-group {
  margin-top: 10px;
}
.input-group-btn:last-child>.btn, .input-group-btn:last-child>.btn-group {
    margin-top: 10px;
}
.addi-products .addi-pros .product-item .price .new, .addi-products .addi-pros .product-item .price .add {
    width: 50%;
}
}
@media screen and (max-width: 466px){
#total {
    width: 100%;
    text-align: right;
    line-height: 2;
    margin-top: 40px;
    font-size: 20px;
    /* height: 90px; */
}
	.form-control {
  margin-top: 10px;
}
.input-group-btn:first-child>.btn, .input-group-btn:first-child>.btn-group {
  margin-top: 10px;
}
.input-group-btn:last-child>.btn, .input-group-btn:last-child>.btn-group {
    margin-top: 10px;
}
.addi-products .addi-pros .product-item .price .new, .addi-products .addi-pros .product-item .price .add {
    width: 50%;
}
}



.panel-group {
    margin-bottom: 35px;
}
.row.productcontent .col-md-12 div#detail-tabs .tab-content.hidden-sm.hidden-xs div#tab8_1 p{
	text-align: center;
}

.input-group-btn:last-child>.btn, .input-group-btn:last-child>.btn-group {
    z-index: 2;
    margin-left: -1px;
    /*background-color: #e0e0e0;
    border-color: #adadad;*/
    background-color: #fff;
/*     border-color: #000;   */
}
.input-group-btn:first-child>.btn, .input-group-btn:first-child>.btn-group {
    margin-right: -1px;
    background-color: #e0e0e0;
/*     border-color: #adadad; */
}
</style>
<div class="rec-products-title">
            <span>我想加購商品</span>
          </div>
          <div class="addi-products">

            <div class="addi-pros">
              <?php foreach ( $addiProducts as $inproduct ) { ?>
              <div class="item addi-pro product-item">
                <div class="ajax_block_product product_block">
                  <div class="product-container default clearfix" itemscope itemtype="http://schema.org/Product">
                    <div class="left-block">
                      <a class="product-link" href="<?php echo $inproduct[ "href" ]; ?>" target="_blank">
                      <div class="">
                        <div class="image">
                          <img class="img-responsive1" src="<?php echo $inproduct[ "src" ]; ?>">
                        </div>
                        <div class="title" style="font-size: 16px;font-weight: 700;padding: 15px 12px;">
                          <a class="product-link" href="<?php echo $inproduct[ "href" ]; ?>" target="_blank"> <?php echo $inproduct[ "name" ]; ?> </a>
                        </div>
                        <div class="price">
                          <div class="new" style="font-size: 18px;font-weight: 600;color: red;">
                            $<?php echo $inproduct[ "cPrice" ]; ?>

                          </div>
                          <div class="add">
                            <label>
                              <input type="checkbox" class="toadd btn-add-to-addlist" data-pid="<?php echo $inproduct[ "PID" ];?>" data-formattype="<?php echo is_array( $inproduct["stock"] )?"":"F"?>" data-qty="1">
                              加購 </label>
                          </div>
                        </div>
                        <div class="op">                          
                          <div class="spec">
                            <?php if ( is_array( $inproduct[ "stock" ] ) ) { ?>
                            <select class="form-control formatType-select2" id="formattype<?php echo $inproduct["PID"];?>" data-pid="<?php echo $inproduct["PID"];?>" >
                              <option value=""><?php echo $objLang["product"]["selectWording"];?></option>                              
                              <?php foreach ( $inproduct["stock"] as $spec ) { ?>
                              <option value="<?php echo $spec[ "id" ]; ?>"><?php echo $spec[ "formatType" ]; ?></option>
                              <?php } // foreach ?>
                            </select>
                              <script>
                                var formatTypeStock = [];
                              <?php foreach ( $inproduct["stock"] as $spec ) { ?>
                                formatTypeStock[<?php echo $spec["id"];?>] = <?php echo $spec["value"];?>;
                              <?php } ?>
                              </script>
                            <?php } // if ?>
                          </div>

                          <div class="total">
                            <?php if ( is_array( $inproduct[ "stock" ] ) ) { ?>
                              <input type="number" class="quantity btn-selectQty-to-add" value="0" step="1" min="1" max="1" data-pid="<?php echo $inproduct["PID"];?>">
                            <?php 
                              }
                              else{ 
                                if($inproduct["stock"]>20){
                                  $inproduct_stock = 20;
                                }                                    
                                else{
                                  $inproduct_stock = $inproduct["stock"];
                                }                                  
                            ?>
                              <input type="number" class="quantity btn-selectQty-to-add2" value="1" step="1" min="1" max="<?php echo $inproduct_stock;?>" data-pid="<?php echo $inproduct["PID"];?>">
                            <?php } ?>
                          </div>
                        </div>
                      </div> </a>
                    </div>
                  </div>
                </div>
              </div>

              <?php } // foreach ?>

            </div>

            <div class="total" id="total">
              <?php /*<div class="amt" id="amt">
                加購<span class="addi" style="color:#e9057b;font-size: 18px;font-weight: 900;">1</span>件，連同主商品<span class="main" style="color:#e9057b;font-size: 18px;font-weight: 900;">1</span>件
              </div>*/?>
              <div class="add" id="add">
                <a class="btn btn-default btn-more-info btn-ask-question btn-add-to-sp-cart"><i class="fa fa-cart-plus" aria-hidden="true" style="margin-right:5px;"></i>加入購物車</a>
              </div>
            </div>
          </div>
<?php } ?>