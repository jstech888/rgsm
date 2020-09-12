<?php
$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
$host = $uri_parts[0]."?";
?>
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <?php
            $paginationKeyword = isset($keyword) ? $keyword : "" ;
            $prevDisable = ( $prevPage === false )? 'class="disable"':"";
            $prevHref    = ( $prevPage === false )? ' href="#" ':' href="'.$host.http_build_query(array( "keyword"=> $paginationKeyword, "ly" => $layout, "l" => $limit, "s" => $pSort, "p" => $prevPage)).'" ';
        ?>
        <li class="page-item">
            <a class="page-link" <?php echo $prevHref;?> aria-label="Previous" <?php echo $prevDisable;?> ><span aria-hidden="true">«</span></a>
        </li>

        <?php
            for($pi=1 ; $pi<=$maxPage ; $pi++) {
                $isAct = $currentPage == $pi ? ' active ' : "";
                $aHref = $currentPage == $pi ? '' : 'href="'.$host.http_build_query(array( "keyword"=> $paginationKeyword, "ly" => $layout, "l" => $limit, "s" => $pSort, "p" => $pi)).'"';
        ?>
            <li class="page-item<?php echo $isAct;?>"><a class="page-link" <?php echo $aHref;?>><?php echo $pi;?></a></li>
        <?php
            }
        ?>
        <?php
            $nextDisable = ( $nextPage === false )? 'class="disable"':"";
            $nextHref    = ( $nextPage === false )? ' href="#" ':'href="'.$host.http_build_query(array( "keyword"=> $paginationKeyword, "ly" => $layout, "l" => $limit, "s" => $pSort, "p" => $nextPage)).'"';
        ?>
        <li class="page-item"><a class="page-link" <?php echo $nextHref;?> aria-label="Next" <?php echo $nextDisable;?>><span aria-hidden="true">»</span></a></li>
    </ul>
</nav>