    <link rel="stylesheet" type="text/css" href="/libs/cloud-zoom/cloudzoom.css">
    <script type="text/javascript" src="/libs/cloud-zoom/cloudzoom.js"></script>

    <link rel="stylesheet" type="text/css" href="/libs/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css">
    <script type="text/javascript" src="/libs/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>

<link rel="stylesheet" type="text/css" href="/libs/devrama.slider/devrama-slider.css" />
<script type="text/javascript" src="/libs/devrama.slider/jquery.devrama.slider.js"></script>

<link rel="stylesheet" type="text/css" href="/libs/raty/jquery.raty.css" />
<script type="text/javascript" src="/libs/raty/jquery.raty.js"></script>
<script>
$(function(){
  touchProduct();
});
</script>

    <div id="columns" class="container self detail">
      <div class="row mt25">
        <div class="col-md-12">
          <!-- 麵包屑 -->
          <ol class="breadcrumb">
            <li>
              <a href="/">首頁</a>
            </li>
            <?php 
            $isAct = "";
            $inds = 1;
            $href = "";
            foreach( $parentProduct AS $c ) {   
              $isAct = ( $inds == count($parentProduct) ) ? 'class="active"' : "";
              $inds % 2 > 0 ? $href = "/product/catelog/".$c["detailKey"] : "";
              $inds == count($parentProduct) ? $href = "/product/detail/".$c["detailKey"] : "";
            ?>
            <li <?php echo $isAct;?>><a href="<?php echo $href;?>"><?php echo $c["name"];?></a></li>
            <?php 
              $inds++;
            } ?>
          </ol>
          <div class="clearfix"></div>
          <!-- /麵包屑 -->
        </div>



        <div class="col-md-12">
          <!-- 商品 主要區塊 -->
          <div class="col-sm-12">
            <div class="main title" style="display:none;"></div>
            <div class="section mt15">
              <div class="row">
              <?php if( $product != false ) { ?>
                <div class="col-md-5">
                  <?php include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."product" . DIRECTORY_SEPARATOR ."product_zoom_slider.php"); ?>
                </div>
                <div class="col-md-7">
                  <?php include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."product" . DIRECTORY_SEPARATOR ."product_info.php"); ?>
                </div>
              <?php } else { ?>
                <center><H1><?php echo $objLang["product"]['noItem']; ?></H1></center>
              <?php } ?>
              </div>
              
              
              
          <?php include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."product" . DIRECTORY_SEPARATOR ."product_addi_list.php"); ?>
              
              
              
              <?php if( $product != false ) { ?>
              <div class="row productcontent">
                <div class="col-md-12">
                  <?php include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."product" . DIRECTORY_SEPARATOR ."product_muti_desc.php"); ?>





<?php include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."product" . DIRECTORY_SEPARATOR ."product_sug.php"); ?>


<?php //include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."product" . DIRECTORY_SEPARATOR ."promotion_products.php"); ?>
















                </div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>


