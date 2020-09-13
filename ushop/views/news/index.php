
<?php include(VIEWPATH . "widget" . DIRECTORY_SEPARATOR . "home" . DIRECTORY_SEPARATOR . "preloader.php"); ?>
<?php include(VIEWPATH . "widget" . DIRECTORY_SEPARATOR . "home" . DIRECTORY_SEPARATOR . "navbar.php"); ?>

<!-- Header -->
<header id="header" class="ex-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>訊息中心</h1>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</header> <!-- end of ex-header -->
<!-- end of header -->


<!-- Breadcrumbs -->
<div class="ex-basic-1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumbs list-unstyled list-inline">
                    <li class="list-inline-item"><a class="underline" href="index.html">首頁</a></li>
                    <li class="list-inline-item"><i class="fa fa-angle-double-right"></i></li>
                    <li class="list-inline-item">訊息中心</li>
                </ul>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of ex-basic-1 -->
<!-- end of breadcrumbs -->


<!-- Content -->
<div class="ex-basic-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-light mb-5">
                    <thead>
                    <tr class="table-purple">
                        <th width="10%" class="hidden-xs">編號</th>
                        <th width="50%">標題</th>
                        <th width="40%" class="hidden-xs">日期</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach( $listStory AS $key => $story ) { ?>
                        <tr>
                            <td class="hidden-xs"><?php echo ($page-1)*$limit+$key+1;?></td>
                            <td>
                                <a href="/news/detail/<?php echo $story["id"];?>"> <?php echo $story["blog-title"];?> </a>
                            </td>
                            <td class="hidden-xs"> <?php echo $story["markDate"];?> </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>

                <?php include_once( VIEWPATH . "widget" . DIRECTORY_SEPARATOR ."news" . DIRECTORY_SEPARATOR ."pagination.php"); ?>

            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of ex-basic-2 -->
<!-- end of content -->