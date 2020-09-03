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
              <div class="btn-group btn-fMenu fMenu">
                <a href="/user/login" class="btn btn-link"><?php echo $functionBar["subscript"];?></a>
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
                  <li class="account-menu-list">
                    <a href="/user/profile"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $functionBar['profile'];?></a>
                  </li>
                  <li class="account-menu-list"><a href="/user/changePassword">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> <?php echo $functionBar['changePassword'];?>
                  </a></li>
                  <li class="account-menu-list"><a href="/user/followlist">
                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> <?php echo $functionBar['FollowList'];?>
                  </a></li>
                  <li class="account-menu-list"><a href="/user/orderlist">
                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> <?php echo $functionBar['orderlist'];?>
                  </a></li>
                  <li class="account-menu-list"><a href="/Page/ContactUs" data-toggle="modal">
                  	<span class="glyphicon glyphicon-headphones" aria-hidden="true"></span> <?php echo $functionBar['contact_service'];//"聯絡客服";?>
                  </a></li>
                  <li class="account-menu-list">
                    <a href="/user/logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> <?php echo $functionBar['logout'];?></a>
                  </li>
                </ul>
              </div>
              <div class="btn-group btn-fMenu fMenu">
                <a href="/user/profile" class="btn btn-link"><?php echo $functionBar["subscript"];?></a>
              </div>
            <?php 
            }
            ?>
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