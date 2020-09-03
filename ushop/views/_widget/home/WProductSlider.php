<link rel="stylesheet" type="text/css" href="/libs/devrama.slider/devrama-slider.css" />
<script type="text/javascript" src="/libs/devrama.slider/jquery.devrama.slider.js"></script>

<link rel="stylesheet" type="text/css" href="/libs/raty/jquery.raty.css" />
<script type="text/javascript" src="/libs/raty/jquery.raty.js"></script>
<style>
.col-md-12 {
    padding-right: 0px;
    padding-left: 0px;
}
.slick-slide.slick-current.slick-active {
    width: 1400px;
}
</style>
<div class="col-md-12">
  <div class="scroll1">
  <?php
  foreach( $ProductSlider AS $k => &$slider )
  {
// var_dump($slider); exit;
  ?>
  	<div>
      <a href="<?php echo isset($slider["value"]["caption"]["title"])? $slider["value"]["caption"]["title"] :"#" ;?>" target="_blank"><img src="<?php echo $slider["value"]["image"]["url"];?>" alt=""></a>
    </div>
  <?php
  }
  ?>
  </div>
</div>