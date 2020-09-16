
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
                    <li class="list-inline-item"><i class="fa fa-angle-double-right"></i></li>
                    <li class="list-inline-item"><?php echo $article["blog-title"];?></li>
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
                <?php echo $article['blog-content'];?>

                <div class="text-container mb-0">
                    <a class="btn-solid-reg back" href="javascript:void(0);" onclick="history.back();">BACK</a>
                </div> <!-- end of text-container -->
            </div>
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of ex-basic-2 -->
<!-- end of content -->