<?php 
if( count($promotionProducts) > 0 ) 
{ 
?>
<div class="recommend">
  <div class="content container">
    <ul class="name">
      <?php echo $objLang["product"]["promotionProduct"];

var_dump($objLang['product']);

      ?>
      <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i>
    </ul>
    <div class="products">
      <?php 
        foreach( $promotionProducts AS $promoProduct ) 
        { 
          if ( $promoProduct["Shelves"] === true )
          {
          ?>
          <a class="product-link" href="/product/detail/<?php echo $promoProduct["detailKey"];?>">
          <div class="product-item">
            <div class="image">
              <img src="<?php echo $promoProduct["src"];?>">              
            </div>
            <div class="title">
              <?php echo $promoProduct["name"];?>
            </div>
          </div>
          </a>
        <?php
        }
      }
      ?>      
    </div>
  </div>
</div>
<?php
}
?>