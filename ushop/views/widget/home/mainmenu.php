<div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link page-scroll" href="/#header">首頁 <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link page-scroll" href="/#about">關於我們</a>
        </li>
        <li class="nav-item">
            <a class="nav-link page-scroll" href="/news">訊息中心</a>
        </li>
        <li class="nav-item">
            <a class="nav-link page-scroll" href="/faq">問與答</a>
        </li>
        <li class="nav-item">
            <a class="nav-link page-scroll" href="/#contact">連絡我們</a>
        </li>
        <li class="nav-item">
            <a class="nav-link page-scroll" href="/user/register">求職者申請帳號</a>
        </li>

        <?php if($self) { ?>
            <li class="nav-item">
                <a class="nav-link page-scroll" href="/user/apply">我的帳號</a>
            </li>
        <?php } else { ?>
        <li class="nav-item">
            <a class="nav-link page-scroll" href="/user/login">登入</a>
        </li>
        <?php } ?>

        <?php
            if ($isShowLangSelector) {
                if (count($selector_lang) > 0) {
                    $theFirst = true;
                    ?>
                    <!-- Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle page-scroll" id="navbarDropdown" role="button"
                           aria-haspopup="true"
                           aria-expanded="false">多國語言</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            foreach ($selector_lang AS $key => $obj_lang) {
                                if ($key != $Lang && isset($obj_lang['src'])) {
                                    echo !$theFirst ? '<div class="dropdown-items-divide-hr"></div>' : '';
                                    echo '<a class="dropdown-item" href="'.$obj_lang['href'].'"><span class="item-text"><img src="'.$obj_lang['src'].'" alt="'.$obj_lang['display'].'"> '.$obj_lang['display'].' </span></a>';
                                }
                            }
                            ?>
                        </div>
                    </li>
                    <!-- end of dropdown menu -->
                    <?php
                }
            }
        ?>
    </ul>
    <span class="nav-item">
        <a class="btn-outline-sm" href="#your-link"><i class="fas fa-mobile-alt"></i>+80 718 64 64</a>
    </span>
</div>