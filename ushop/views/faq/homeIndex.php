<!-- Header -->
<header id="header" class="ex-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>FAQ</h1>
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
                    <li class="list-inline-item"><a class="underline" href="index.html">Home</a></li>
                    <li class="list-inline-item"><i class="fa fa-angle-double-right"></i></li>
                    <li class="list-inline-item">FAQ</li>
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
            <div class="col-md-3 col-sm-12">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" data-toggle="collapse" href="#faq-1" role="tab" aria-controls="faq-1">介紹</a>
                    <div id="faq-1" class="collapse">
                        <div class="list-group" role="tablist">
                            <a class="list-group-item list-group-item-action">子選單</a>
                            <a class="list-group-item list-group-item-action">子選單</a>
                            <a class="list-group-item list-group-item-action">子選單</a>
                        </div>
                    </div>
                    <a class="list-group-item list-group-item-action" data-toggle="collapse" href="#faq-2" role="tab" aria-controls="faq-2">常見問題</a>
                    <div id="faq-2" class="collapse">
                        <div class="list-group" role="tablist">
                            <a class="list-group-item list-group-item-action">子選單</a>
                            <a class="list-group-item list-group-item-action">子選單</a>
                            <a class="list-group-item list-group-item-action">子選單</a>
                        </div>
                    </div>
                    <a class="list-group-item list-group-item-action" data-toggle="collapse" href="#faq-3" role="tab" aria-controls="faq-3">其他問題</a>
                    <div id="faq-3" class="collapse">
                        <div class="list-group" role="tablist">
                            <a class="list-group-item list-group-item-action">子選單</a>
                            <a class="list-group-item list-group-item-action">子選單</a>
                            <a class="list-group-item list-group-item-action">子選單</a>
                        </div>
                    </div>
                </div>
            </div> <!-- end of col -->

            <div class="col-md-9 col-sm-12">
                <!-- Faq -->
                <?php foreach ($faq_list as $faq) { ?>
                <div class="card mb-3">
                    <div class="card-header">Q：<?php echo $faq['blog-title'];?> </div>
                    <div class="card-body">A：<div style="display: inline-table;"><?php echo $faq['blog-content'];?> </div></div>
                </div>
                <?php } ?>
                <!-- end of faq -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of ex-basic-2 -->
<!-- end of content -->