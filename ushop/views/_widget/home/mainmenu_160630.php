   <div class="">

      <div class="header top container-fluid hidden-xs hidden-sm menu-container">
        <div class="row">
          <div class="col-md-12">
            <div class="container">
              <div class="navbar-branding"></div>
              <div class="row">
                <div class="language col-md-12">
                <?php if ($isShowLangSelector)
                {
                   if ( count($selector_lang) == 1 ) 
                  {
                  ?>
                    <div class="btn-group btn-fMenu fMenu">
                      <p class="btn">
                        <img src="<?php echo $selector_lang[$Lang]['src'];?>" alt="<?php echo $selector_lang[$Lang]['display'];?>">
                        <span>&nbsp;&nbsp;</span><?php echo $selector_lang[$Lang]['display'];?><span>&nbsp;</span>
                      </p>
                    </div>
                  <?php
                  }
                  else
                  {
                  ?>
                    <div class="select-wrapper btn-group btn-fMenu fMenu first">
                      <a href="#" class="btn btn-link btn-switcher dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo $selector_lang[$Lang]['src'];?>" alt="<?php echo $selector_lang[$Lang]['display'];?>">
                        <span>&nbsp;&nbsp;</span><?php echo $selector_lang[$Lang]['display'];?><span>&nbsp;</span><span class="caret"></span>
                      </a>
                      <ul class="dropdown-menu list">
                      <?php 
                        foreach( $selector_lang AS $key => $obj_lang )
                        {
                          if( $key != $Lang && isset($obj_lang['src']) ) {
                      ?>                
                        <li><a href="<?php echo $obj_lang['href'];?>">
                          <img src="<?php echo $obj_lang['src'];?>" alt="<?php echo $obj_lang['display'];?>">
                          <span>&nbsp;&nbsp;</span><?php echo $obj_lang['display'];?>
                        </a></li>
                      <?php
                          }
                        }
                      ?>
                      </ul>
                    </div>
                <?php 
                  }
                }?>
                <?php 
                if ($isShowCurrencySelector)
                {
                  if ( count($selector_currencies) == 1 ) 
                  {
                    echo "<div class=\"btn-group btn-fMenu fMenu\"><p class=\"btn\">";
                      echo $selector_currencies_lang['title'];
                      echo $selector_currencies[$Currency]["display"];
                    echo "</p></div>";
                  }
                  else
                  {
                ?>
                  <div class="select-wrapper btn-group btn-fMenu fMenu">
                    <a href="#" class="btn btn-link btn-switcher dropdown-toggle" data-toggle="dropdown">
                      <?php 
                        echo $selector_currencies_lang['title'];
                        echo $selector_currencies[$Currency]["display"];
                      ?><span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu list">
                    <?php 
                      foreach( $selector_currencies AS $key => $obj_currency )
                      {
                        if( $key != $Currency ) {
                    ?>                
                      <li class="text-center"><a href="<?php echo $obj_currency['href'];?>">
                        <?php echo $obj_currency['display'];?>
                      </a></li>
                    <?php
                        }
                      }
                    ?>
                    </ul>
                  </div>
                <?php 
                  }
                }
                ?>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="header sec container hidden-xs hidden-sm menu-container">
        <div class="row">
          <div class="service col-md-12">
            <?php if( $self === false ) { ?>
              <div class="btn-group btn-fMenu fMenu">
                <a href="/user/login" class="btn btn-link"><?php echo $functionBar["searchPoint"];?></a>
              </div>
              <div class="btn-group btn-fMenu fMenu">
                <a href="/user/register" class="btn btn-link"><?php echo $functionBar["register"];?></a>
              </div>            
              <div class="btn-group btn-fMenu fMenu"> 
                <a href="/user/login" class="btn btn-link"><?php echo $functionBar["login"];?></a>
              </div>
            <?php
            }
            else
            {
              if( $ShoppingPointRate > 0 ){?>
                <div class="btn-group btn-fMenu fMenu"> 
                  <a href="#" class="btn btn-point"><?php echo $functionBar["shoppingPoint"];?> <span class="dPrice"><?php echo $self["point"];?></span></a>
                </div>
              <?php }?>
              <div class="btn-group btn-fMenu fMenu"> 
                <a href="#" class="btn btn-link btn-switcher dropdown-toggle" data-toggle="dropdown"><?php echo $functionBar["account"];?> &nbsp;<span class="caret"></span></a>
                <ul class="dropdown-menu pull-right list">
                  <li class="account-menu-list"><a href="/user/profile">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $functionBar['profile'];?>
                  </a></li>
                      <li class="account-menu-list"><a href="/user/changePassword">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> <?php echo $functionBar['changePassword'];?>
                      </a></li>
                      <li class="account-menu-list"><a href="/user/followlist">
                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> <?php echo $functionBar['FollowList'];?>
                      </a></li>
                      <li class="account-menu-list"><a href="/user/orderlist">
                        <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> <?php echo $functionBar['orderlist'];?>
                      </a></li>
                      <li class="account-menu-list"><a href="#please-login" data-toggle="modal">
                      	<span class="glyphicon glyphicon-headphones" aria-hidden="true"></span> <?php echo $functionBar['contact_service'];//"聯絡客服";?>
                      </a></li>
                      <li class="account-menu-list"><a href="/user/logout">
                        <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> <?php echo $functionBar['logout'];?>
                      </a></li>
                    </ul>
                  </div>

            <?php 
            }
            ?>
            <div class="btn-group btn-fMenu fMenu">
              <a href="#" class="btn btn-link"><?php echo $functionBar["subscript"];?></a>
            </div>
          </div>
        </div>
      </div>

      <header class="navbar navbar-default navbar-fixed-top yamm container hidden-xs hidden-sm" style="overflow: visible;">

        <div class="row mobile text-center">
          <div class="logo">
            <a href="/"><img class="img-responsive img-logo" src="<?php echo $logo["url"];?>" alt="<?php echo isset($logo["alt"])?$logo["alt"]:"" ;?>" /></a>
          </div>
        </div>
        <!-- hight-light-block AND Search Bar -->
        <div class="row logo-row desktop">

          <div class="logo">
            <a href="/"><img class="img-responsive img-logo" src="<?php echo $logo["url"];?>" alt="<?php echo isset($logo["alt"])?$logo["alt"]:"" ;?>" /></a>
          </div>

          <div class="pullRight">
            <div class="hight-light-block">
              <div class="form-group">
                <div class="input-group">
                  <input type="text" class="form-control" id="product-keyword-desktop">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button" onclick="enterSearch('desktop')" >
                      <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </button> </span>
                </div>
              </div>
            </div>

            <div class="functionBar-cart btn-group btn-fMenu fMenu last">
            
                        
          <?php
          if( isset($cart) )
          {
          ?>
            <a href="#" data-toggle="dropdown" class="dropdown-toggle shopping-cart-block" aria-expanded="true">
              <div class="shopping-cart hightlight">
                <span class="fa fa-shopping-cart"></span>
                CART (<span class="qty">1</span>)<span class="amount">0.00</span>
                <b class="caret"></b>
              </div>
              <ul class="dropdown-menu cart pull-right">
                <li>
                  <div class="yamm-content"><ul class="media-list"></ul></div>
                  <p class="total text-right empty-hide"><?php echo $objLang["shoppingcart"]['subtotal'];?><?php echo $Currency;?> <span class="amount fcurrency"></span></p>
                  <a class="btn btn-default btn-viewcart" href="/shoppingcart">
                  <?php echo $objLang["shoppingcart"]['viewcart'];?>
                    <span class="glyphicon glyphicon-arrow-right bknone" aria-hidden="true"></span>
                  </a>
                </li>
              </ul>
            </a>
          <?php
          }
          ?>  
          </div>

        </div>

      </div>
      <!-- /hight-light-block AND Search Bar -->
    </header>

    <div class="main-menu-row desktop">
      <div class="container">
        <div class="row">
          <div class="col-me-12">

            <nav id="vel-megamenu" class="navbar navbar-default" role="navigation">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div id="megamenu" class="vel-megamenu clearfix">
                <span id="click-remove" class="icon-remove"></span>
                <ul class="nav navbar-nav  menu level1">

        <?php
        $cnt = 1;
        $arr_menuListChild = array();
        foreach($mainmenu AS $menu) {
          $isActive = ($activeTag === $menu['href'])?"active":"";
          if( $menu['type'] == "link" )
          {
            $href = "href=\"{$menu['href']}\"";
            echo "
            <li class=\"item full-width parent group\">
              <a {$href} title=\"{$menu['title']}\">{$menu['title']}</a>
            </li>";
          }
          else if( $menu['type'] == "list" || $menu['type'] == "listLink" )
          {
            $href = "href=\"{$menu['href']}\"";
            echo '<li class="item full-width parent group show">
                <a '.$href.' title="'.$menu['title'].'">'.$menu['title'].'</a>
                <div class="dropdown-menu">
                  <ul>';
            foreach( $menu['content'] AS $item )
            {
              if( $item['type'] == "title" )
              {
                echo "<li class=\"item\"><p>{$item['title']}</p></li>";
              }
              else if( $item['type'] == "link" )
              {
                $url = "href=\"{$item['href']}\"";
                echo '<li class="item"><a '.$url.' title="'.$item['title'].'">'.$item['title'].'</a></li>';
              }
            }
            echo    '</ul>
                </div>
              </li>';
            
          }
          $cnt++;
        }
        ?>

                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="container mb-header">
    <div class="row combine-row mobile mb15">

      <div class="menubar">
        <div class="menubar-content">
          <button id="show-onclick" type="button" class="navbar-toggle" onclick="showMobileMenu()">
            <span class="sr-only">Menu</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
          </button>
        </div>
      </div>

      <div class="center-block">
        <a href="/"><img class="img-responsive img-logo" src="<?php echo $logo["url"];?>" alt="<?php echo isset($logo["alt"])?$logo["alt"]:"" ;?>"></a>
      </div>

      <div class="service">
        <?php 
        if( $self === false ) 
        { 
        ?>
          <div class="btn-group btn-fMenu fMenu login"> 
            <a href="/user/login" class="btn btn-link"><i class="fa fa-users"></i></a>
          </div>
        <?php
        }
        else
        {
        ?>
         <div class="btn-group btn-fMenu fMenu login"> 
            <a href="#" class="btn btn-link btn-switcher dropdown-toggle" data-toggle="dropdown"><i class="fa fa-users"></i><span class="caret"></span></a>
            <ul class="dropdown-menu pull-right list">
              <li class="account-menu-list"><a href="/user/profile">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $functionBar['profile'];?>
              </a></li>
              <li class="account-menu-list"><a href="/user/changePassword">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> <?php echo $functionBar['changePassword'];?>
              </a></li>
              <li class="account-menu-list"><a href="/user/followlist">
                <span class="glyphicon glyphicon-link" aria-hidden="true"></span> <?php echo $functionBar['FollowList'];?>
              </a></li>
              <li class="account-menu-list"><a href="/user/orderlist">
                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> <?php echo $functionBar['orderlist'];?>
              </a></li>
              <li class="account-menu-list"><a href="/user/logout">
                <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> <?php echo $functionBar['logout'];?>
              </a></li>
            </ul>
          </div>
        <?php
        }
        ?>
        <div class="functionBar-cart btn-group btn-fMenu fMenu last">
          <a href="#" data-toggle="dropdown" class="dropdown-toggle shopping-cart-block" aria-expanded="true">
          <div class="shopping-cart hightlight">
            <span class="fa fa-shopping-cart"></span>
            <span class="qty">0</span><span class="amount">0.00</span>
            <b class="caret"></b>
          </div> </a>
          <ul class="dropdown-menu cart pull-right">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle shopping-cart-block" aria-expanded="true"> </a>
            <li>
              <a href="#" data-toggle="dropdown" class="dropdown-toggle shopping-cart-block" aria-expanded="true">
              <div class="yamm-content">
                <ul class="media-list">
                  <li class="title">
                    購物車
                  </li>
                  <p class="total empty-hide">
                    小計TWD <span class="amount fcurrency">$0</span>
                  </p>
                  <li class="empty">
                    沒有商品
                  </li>
                </ul>
              </div> </a><a class="btn btn-default btn-viewcart" href="/shoppingcart"> 查看購物車 </a>
            </li>

          </ul>

        </div>

      </div>

      <div class="clearfix"></div>
    </div>
  </div>
  <div id="megamenu" class="vel-megamenu clearfix vel-megamenu-active mobile">
    <span id="click-remove" class="icon-remove"></span>

    <div class="search">
      <div class="hight-light-block">
        <div class="form-group">
          <!--
          <a onclick="enterSearch('desktop')"><span class="append-icon right"><i class="fa fa-search"></i></span></a>
          <input type="text" class="form-control" id="product-keyword-desktop"
          placeholder="請輸入商品關鍵字">-->

          <div class="input-group">
            <input type="text" class="form-control" id="product-keyword-desktop">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button" onclick="enterSearch('desktop')" >
                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
              </button> </span>
          </div><!-- /input-group -->
        </div>

      </div>
    </div>

    <div class="regions">
      <?php if ($isShowLangSelector)
    {
      if ( count($selector_lang) == 1 ) 
      {
      ?>
        <div class="select-wrapper btn-group btn-fMenu fMenu">
          <p class="btn">
            <img src="<?php echo $selector_lang[$Lang]['src'];?>" alt="<?php echo $selector_lang[$Lang]['display'];?>">
            <span>&nbsp;&nbsp;</span><?php echo $selector_lang[$Lang]['display'];?><span>&nbsp;</span>
          </p>
        </div>
      <?php
      }
      else
      {
      ?>
        <div class="select-wrapper btn-group btn-fMenu fMenu first">
          <a class="btn" role="button"  data-toggle="collapse" href="#languageList" aria-expanded="false" aria-controls="languageList"> <img src="<?php echo $selector_lang[$Lang]['src'];?>" alt="<?php echo $selector_lang[$Lang]['display'];?>"> <span>&nbsp;&nbsp;</span><?php echo $selector_lang[$Lang]['display'];?><span>&nbsp;</span><span class="caret"></span> </a>
          <div class="collapse" id="languageList">
            <ul>
            <?php 
            foreach( $selector_lang AS $key => $obj_lang )
            {
              if( $key != $Lang && isset($obj_lang['src']) ) {
              ?>                
                <li>
                  <a href="<?php echo $obj_lang['href'];?>"> <img src="<?php echo $obj_lang['src'];?>" alt="<?php echo $obj_lang['display'];?>"> <span>&nbsp;&nbsp;</span><?php echo $obj_lang['display'];?> </a>
                </li>
              <?php
              }
            }
            ?>
            </ul>
          </div>
        </div>
    <?php 
      }
    }
    ?>
    <?php 
    if ($isShowCurrencySelector)
    {
      if ( count($selector_currencies) == 1 ) 
      {
        echo "<div class=\"select-wrapper btn-group btn-fMenu fMenu\"><p class=\"btn\">";
          echo $selector_currencies_lang['title'];
          echo $selector_currencies[$Currency]["display"];
        echo "</p></div>";
      }
      else
      {
    ?>
      <div class="select-wrapper btn-group btn-fMenu fMenu first">
        <a class="btn" role="button"  data-toggle="collapse" href="#currecnyList" aria-expanded="false" aria-controls="currecnyList">
          <?php 
            echo $selector_currencies_lang['title'];
            echo $selector_currencies[$Currency]["display"];
          ?><span class="caret"></span>
        </a>
        <div class="collapse" id="currecnyList">
        <ul>
        <?php 
          foreach( $selector_currencies AS $key => $obj_currency )
          {
            if( $key != $Currency ) {
        ?>                
          <li class="text-center"><a href="<?php echo $obj_currency['href'];?>">
            <?php echo $obj_currency['display'];?>
          </a></li>
        <?php
            }
          }
        ?>
        </ul>
        </div>
      </div>
    <?php 
      }
    }
    ?>
    </div>

    <ul class="nav navbar-nav  menu level1">

      <?php
      $cnt = 1;
      $arr_menuListChild = array();
      foreach($mainmenu AS $menu) {
        $isActive = ($activeTag === $menu['href'])?"active":"";
        if( $menu['type'] == "link" )
        {
          $href = "href=\"{$menu['href']}\"";
          echo "
          <li class=\"item full-width parent group\">
            <a {$href} title=\"{$menu['title']}\">{$menu['title']}</a>
          </li>";
        }
        else if( $menu['type'] == "list" || $menu['type'] == "listLink" )
        {
          $href = "href=\"{$menu['href']}\"";
          echo '<li class="item full-width parent group show">
            <a '.$href.' title="'.$menu['title'].'">'.$menu['title'].'
            <div class="expand collapsed" role="button" data-toggle="collapse" data-target="#item4" aria-expanded="false" aria-controls="item4">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"> </span>

            </div></a>';
          echo '<div class="dropdown-menu collapse" id="item4">
            <ul>
              <ul class="row">
                <li class="col-sm-4">
                  <ul class="items">';

          foreach( $menu['content'] AS $item )
          {
            if( $item['type'] == "title" )
            {
              echo "<li class=\"item\"><p>{$item['title']}</p></li>";
            }
            else if( $item['type'] == "link" )
            {
              $url = "href=\"{$item['href']}\"";
              echo '<li class="item"><a '.$url.' title="'.$item['title'].'">'.$item['title'].'</a></li>';
            }
          }
          
          echo '</ul>';
          echo     '</li>';
          echo   '</ul>';
          echo  '</ul>';
          echo '</div>';
          echo '</li>';
          
        }
        $cnt++;
      }
      ?>

    </ul>
  </div>

<script>
  function showMobileMenu( )
  {
    if ( $( "#megamenu.mobile" ).is( ":visible" ) === true )
    {
      $( "#megamenu.mobile" ).fadeOut( );
    }
    else
    {
      $( "#megamenu.mobile" ).fadeIn( );
    }
  }

  $( function( )
  {
    $( '.dropdown-toggle' ).dropdown( );

    $( ".vel-megamenu-active #click-remove" ).click( function( )
    {
      $( "#megamenu.mobile" ).fadeOut( );

    } );
  } );

</script>
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

<style type="text/css">
/* login頁面開始 */
.panel-title {
	color: #000;
	font-size: 18px;
	text-align: center;
}

.user-form {
	margin-top: 25px;
}

.form-group {
	margin-top: 15px;
	margin-bottom: 15px;
}

.form-group .label {
	text-align: right;
	margin-top: 7px;
}

.form-group .column {
	text-align: right;
}

.captcha-label {
	width: 100%;
	float: none;
}

.captcha-input {
	margin-left: 30px;
}

div#aaaaa {
    float: left;
    padding-top: 25px;
}
#captcha-image {
	height: auto;
    margin: 0;
    float: left;
    width: 160px;
    padding-top:10px;
}

.bs-callout {
	padding: 20px;
	margin: 20px 0;
	border: 1px solid #eee;
	border-left-width: 5px;
	border-radius: 3px;
}

.bs-callout-info {
	border-left-color: #1b809e;
}

.bs-callout-error {
	border-left-color: #1b809e;
}

.bs-callout-warring {
	border-left-color: #FF002A;
}

label {
	font-size: 18px;
	font-weight: normal;
	text-align: center;
}

input {
	font-size: 16px;
	font-weight: normal;
}

@media ( max-width : 768px) {
	.form-group .label {
		text-align: center;
		margin-top: 7px;
	}
}

#captcha-form {
	margin-left: -10px;
	display: inline-block;
}

.btn-reload {
	/* 	  margin-top: -5px; */
	/* 	  margin-left: -4px; */
	color: #0A41AF;
}

.btn-forgotten {
	background-color: #fff;
	background-image: none;
}

.btn-forgotten:hover {
	background-color: #f0f0f0;
}

@media ( max-width : 992px) {
	.captcha-label {
		float: none;
		text-align: center;
	}
	.captcha-input {
		text-align: center;
	}
	#captcha-form {
		width: 160px;
		margin-left: -20px;
	}
	.form-horizontal .form-group {
		text-align: center;
	}
	.form-control {
		margin: 0 auto;
		margin-left: 20px;
	}
	.panel-footer>.pull-right {
		float: none !important;
		text-align: center;
	}
}
.member-login.title{
	color: #9775ac;
    font-size: 20px;
    display: inline-block;
    margin-right: 10px;
    float: left;
	font-weight: bold;

}
.member-login.subtitle{
	display: inline-block;
    margin-top: 6px;
}
#col-xs-12{
	margin-left: 25px;
}
.login-footer {
    margin-left: 20px;
}
.member-register.subtitle{
	display: inline-block;
    margin-top: 6px;
	margin-left: 20px;
}
.member-register.title{
	color: #9775ac;
    font-size: 20px;
    display: inline-block;
    margin-right: 30px;
	margin-left: 20px;
	font-weight: 900;
}
#login-footer{
	margin-left: 20px;
    margin-top: 20px;
}
#panel-border{
	width: 780px;
	max-width: 100%;
	margin: 0 auto;
	margin-top: 0px;
    margin-bottom: 0px;
	border-top-color: #9775ac;
}
@media screen  and (min-width: 768px) and (max-width: 991px){
	.captcha-input {
		margin-left:0px;
		width: 85%;
	}
}
@media screen  and (max-width: 767px){
	.captcha-input {
     	margin-left: 0px; 
		width: 85%;
	}
	#col-sm-6{
		margin-top: 20px;
	}
}
@media screen  and (max-width: 320px){
	#captcha-image {
		height: auto;
		margin: 0;
		float: left;
		width: 50%;
	}
}
header.navbar.navbar-default.navbar-fixed-top.yamm.container.hidden-xs.hidden-sm .row.logo-row.desktop .pullRight .hight-light-block .form-group{
	    margin-top: 0px;
}
.login-login:after {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    height: 100%;
    border-right: 1px solid #cecece;
}

/* login頁面結尾 */

.product-remove {
	text-align: center;
}
.product-remove>span.glyphicon-remove {
	cursor: pointer;
	color: #000;
	margin: 0 auto;
	font-size: 21px;
}
.product-remove>span.glyphicon-remove:hover {
	filter: alpa(opacity = 80); /* old IE */
	filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=80,
		FinishOpacity=15, Style=3, StartX=0, FinishX=100, StartY=0, FinishY=16);
	/*supported by current IE*/
	-moz-opacity: 0.7; /* Moz + FF */
	opacity: 0.7; /* 支持新版瀏覽器 */
}
.product-name, .product-name>a {
	/*   color: #777; */
	font-size: 15px;
}
.product-thumbnail img:hover {
	filter: alpa(opacity = 80); /* old IE */
	filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=80,
		FinishOpacity=15, Style=3, StartX=0, FinishX=100, StartY=0, FinishY=16);
	/*supported by current IE*/
	-moz-opacity: 0.7; /* Moz + FF */
	opacity: 0.7; /* 支持新版瀏覽器 */
}

.product-quantity-block {
	width: 120px;
}

.page-total {
	font-size: 16px;
	text-align: right;
}

.page-tools {
	text-align: right;
}
.input-group .form-control {
    position: relative;
    z-index: 2;
    float: left;
    width: 100%;
    margin-bottom: 0;
}
.input-group-btn>.btn {
	padding: 6px 12px;
}

.btn-update-qty {
	display: none;
	position: absolute;
	margin-left: 40px;
	margin-top: 6px;
}

.product-quantity, .product-subtotal {
	position: relative;
}

.mobile-remove {
	display: none;
	position: absolute;
	top: 0;
	right: 0;
	color: red;
}

@media ( max-width : 992px) {
	.product-thumbnail, .product-price, .product-thumbnail, .product-price {
		display: none !important;
	}
}

@media ( max-width : 992px) {
	.product-remove, .product-thumbnail, .product-price {
		display: none !important;
	}
	.mobile-remove {
		display: block;
	}
}
@media screen and ( max-width : 460px) {
	#product-name{
		width: 85px;
	}
}
@media ( max-width : 360px) {
	.product-name>a {
		display: inline-block;
		max-width: 60px;
		overflow: hidden;
	}
}
#top{
	width: 1000px;
    max-width: 100%;
    margin: 0 auto;
    margin-top: 30px;
    margin-bottom: 20px;
    border-top-color: #9775ac;
}
.btn:hover {
    color: #333;
    text-decoration: none;
    background: #e0e0e0;
	border-color: #adadad;
}
.table>tbody>tr>td.product-subtotal {
  padding-right: 15px;
}
.table>thead:first-child>tr:first-child>th.product-formatType {
  min-width: 50px;
}
</style>

	<div class="quick-view-box modal fade" id="please-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="panel panel-info panel-border top user-form">
					<div class="panel-heading text-center">
						<span class="panel-title"><?php echo $objLang["profile"]['contact_us'];?></span>
					</div>
					<div class="panel-body">
						<form method="post" action='<?php echo base_url("/user/profile");?>' name="login_form">
							<div class="form-group">
								<label for="nickname" class="col-xs-3 control-label"><?php echo $objLang["profile"]['nickname_Label'];?></label>
								<div class="col-xs-7">		
									<input type="text" class="registerformValue form-control" name="nickname" id="nickname" placeholder="<?php echo $objLang["profile"]['nickname_placeholder'];?>" value="<?php echo $self["nickname"];?>"  required>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="form-group">
								<label for="mail" class="col-xs-3 control-label"><?php echo $objLang["profile"]['mail_Label'];?></label>
								<div class="col-xs-7">		
									<input type="text" class="registerformValue form-control" name="mail" id="mail" style="cursor:no-drop;" placeholder="<?php echo $objLang["profile"]['mail_placeholder'];?>" value="<?php echo $self["mail"];?>"  required>
								</div>
								<div class="clearfix"></div>
							</div>

							<div class="form-group">
								<label for="phone" class="col-xs-3 control-label"><?php echo $objLang["profile"]['phone_Label'];?></label>
								<div class="col-xs-7">		
									<input type="text" class="registerformValue form-control" name="phone" id="phone" placeholder="<?php echo $objLang["profile"]['phone_placeholder'];?>" value="<?php echo $self["phone"];?>" required>  
								</div>
								<div class="clearfix"></div>
							</div>

							<div class="form-group">
								<label for="phone" class="col-xs-3 control-label"><?php echo $objLang["profile"]['order_num'];?></label>
								<div class="col-xs-7">		
									<input type="text" class="registerformValue form-control" name="phone" id="phone" placeholder="<?php echo $objLang["profile"]['phone_placeholder'];?>" value="<?php echo $self["phone"];?>" required>  
								</div>
								<div class="clearfix"></div>
							</div>
							
							
							<div class="form-group">
								<label for="phone" class="col-xs-3 control-label"><?php echo $objLang["profile"]['phone_Label'];?></label>
								<div class="col-xs-7">		
									<textarea class="form-control" id="exampleTextarea" rows="6"></textarea>
								</div>
								<div class="clearfix"></div>
							</div>

							<HR>
							<div class="form-group">
								<div class="col-sm-12 col-xs-12 column">		
									<button type="submit" class="btn btn-default btn-submit btn-lg pull-right"><?php echo $objLang["profile"]['modify'];?></button> 
								</div>
							</div>
							<div class="clearfix"></div>
						</form>
						<div class="clearfix"></div>
					</div>		
				</div>
				<br>
				<br>

				<?php /*
				<div class="panel panel-info panel-border top user-form">				
					<div class="panel-heading text-center">
						<span class="panel-title"><?php echo $objLang["profile"]['contact_us'];?></span>
					</div>
					<div class="modal-body quick-view-content ">
						<div class="panel-body">
							<form method="post" action='<?php echo base_url("/user/profile");?>' name="login_form">
								<div class="form-group">
									<label for="nickname" class="col-xs-3 control-label"><?php echo $objLang["profile"]['nickname_Label'];?></label>
									<div class="col-xs-7">		
										<input type="text" class="registerformValue form-control" name="nickname" id="nickname" placeholder="<?php echo $objLang["profile"]['nickname_placeholder'];?>" value="<?php echo $self["nickname"];?>"  required>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="form-group">
									<label for="mail" class="col-xs-3 control-label"><?php echo $objLang["profile"]['mail_Label'];?></label>
									<div class="col-xs-7">		
										<input type="text" class="registerformValue form-control" name="mail" id="mail" style="cursor:no-drop;" placeholder="<?php echo $objLang["profile"]['mail_placeholder'];?>" value="<?php echo $self["mail"];?>"  required>
									</div>
									<div class="clearfix"></div>
								</div>

								<div class="form-group">
									<label for="phone" class="col-xs-3 control-label"><?php echo $objLang["profile"]['phone_Label'];?></label>
									<div class="col-xs-7">		
										<input type="text" class="registerformValue form-control" name="phone" id="phone" placeholder="<?php echo $objLang["profile"]['phone_placeholder'];?>" value="<?php echo $self["phone"];?>" required>  
									</div>
									<div class="clearfix"></div>
								</div>

								<div class="form-group">
									<label for="phone" class="col-xs-3 control-label"><?php echo $objLang["profile"]['order_num'];?></label>
									<div class="col-xs-7">		
										<input type="text" class="registerformValue form-control" name="phone" id="phone" placeholder="<?php echo $objLang["profile"]['phone_placeholder'];?>" value="<?php echo $self["phone"];?>" required>  
									</div>
									<div class="clearfix"></div>
								</div>
								
								
								<div class="form-group">
									<label for="phone" class="col-xs-3 control-label"><?php echo $objLang["profile"]['phone_Label'];?></label>
									<div class="col-xs-7">		
										<textarea class="form-control" id="exampleTextarea" rows="6"></textarea>
									</div>
									<div class="clearfix"></div>
								</div>

								<HR>
								<div class="form-group">
									<div class="col-sm-12 col-xs-12 column">		
										<button type="submit" class="btn btn-default btn-submit btn-lg pull-right"><?php echo $objLang["profile"]['modify'];?></button> 
									</div>
								</div>
								<div class="clearfix"></div>
							</form>

							<!--聯絡客服 結尾  -->
						</div>
					</div>
					<!-- //MAIN CONTENT -->
				</div>
				*/?>

			</div>
		</div>
	</div>
	<!-- popup member area ends-->