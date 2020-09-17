<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- SEO Meta Tags -->
<meta name="description" content="Create job listings, gather CV applications and present HR services to online visitors with this Bootstrap 4 HTML landing page template.">
<meta name="author" content="Inovatik">

<!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
<meta property="og:site_name" content="" />
<!-- website name -->
<meta property="og:site" content="" />
<!-- website link -->
<meta property="og:title" content=""/>
<!-- title shown in the actual shared post -->
<meta property="og:description" content="" />
<!-- description shown in the actual shared post -->
<meta property="og:image" content="" />
<!-- image link, make sure it's jpg -->
<meta property="og:url" content="" />
<!-- where do you want your post to link to -->
<meta property="og:type" content="article" />

<!-- Website Title -->
<title>rgsm - Personal Information</title>

<!-- Styles -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:600,700" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/fontawesome-all.css" rel="stylesheet">
<link href="css/swiper.css" rel="stylesheet">
<link href="css/magnific-popup.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!-- Favicon  -->
<link rel="icon" href="images/favicon.png">
</head>
<body data-spy="scroll" data-target=".fixed-top">

<!-- Preloader -->
<div class="spinner-wrapper">
  <div class="spinner">
    <div class="bounce1"></div>
    <div class="bounce2"></div>
    <div class="bounce3"></div>
  </div>
</div>
<!-- end of preloader --> 

<!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top">
  <div class="container"> 
    <!-- Text Logo - Use this if you don't have a graphic logo --> 
    <!-- <a class="navbar-brand logo-text page-scroll" href="index.php">rgsm</a> --> 
    
    <!-- Image Logo --> 
    <a class="navbar-brand logo-image page-scroll" href="index.php"><img src="images/logo.svg" alt="alternative"></a> 
    
    <!-- Mobile Menu Toggle Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-awesome fas fa-bars"></span> <span class="navbar-toggler-awesome fas fa-times"></span> </button>
    <!-- end of mobile menu toggle button -->
    
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <? include_once('menu.php');?>
      <span class="nav-item"> <a class="btn-outline-sm" href="#your-link"><i class="fas fa-mobile-alt"></i>+80 718 64 64</a> </span> </div>
  </div>
  <!-- end of container --> 
</nav>
<!-- end of navbar --> 
<!-- end of navbar --> 

<!-- Header -->
<header id="header" class="ex-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1>個人履歷資料</h1>
      </div>
      <!-- end of col --> 
    </div>
    <!-- end of row --> 
  </div>
  <!-- end of container --> 
</header>
<!-- end of ex-header --> 
<!-- end of header --> 

<!-- Breadcrumbs -->
<div class="ex-basic-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumbs list-unstyled list-inline">
          <li class="list-inline-item"><a class="underline" href="index.php">Home</a></li>
          <li class="list-inline-item"><i class="fa fa-angle-double-right"></i></li>
          <li class="list-inline-item">個人履歷資料</li>
        </ul>
      </div>
      <!-- end of col --> 
    </div>
    <!-- end of row --> 
  </div>
  <!-- end of container --> 
</div>
<!-- end of ex-basic-1 --> 
<!-- end of breadcrumbs --> 

<!-- Content -->
<div class="ex-basic-2">
  <div class="container">
    <div class="row">

      <div class="col-md-3 col-sm-12">
        <div class="list-group" id="list-tab" role="tablist">
          <a class="list-group-item list-group-item-action" data-toggle="collapse" href="#faq-1" role="tab" aria-controls="dploma-1">英文畢業證書 / 履歷表</a>
          <a class="list-group-item list-group-item-action active" data-toggle="collapse" href="#faq-2" role="tab" aria-controls="dploma-2">個人履歷資料</a>
          <a class="list-group-item list-group-item-action" data-toggle="collapse" href="#faq-3" role="tab" aria-controls="dploma-3">應徵狀態查詢</a>
        </div>         
      </div> <!-- end of col -->

      <div class="col-md-9 col-sm-12"> 
        <!-- Standard Form -->
        <form id="StandardForm" data-toggle="validator" data-focus="false">
          <div class="form-group">
            <input type="text" class="form-control-input" id="cname" required>
            <label class="label-control" for="cname">姓名</label>
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control-input" id="cname" required>
            <label class="label-control" for="cname">暱稱</label>
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <label class="col-sm-12" for="csex">性別</label>
            <div class="col-sm-12">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="">
                <label class="form-check-label">
                  男
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="">
                <label class="form-check-label">
                  女
                </label>
              </div>
            </div>
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <label class="col-sm-12">生日</label>
            <div class="form-row">
              <div class="form-group col-md-8">
                <select class="form-control form-control-select">
                  <option>2000</option>
                </select>
              </div>
              <div class="form-group col-md-2">
                <select class="form-control form-control-select">
                  <option>10</option>
                </select>
              </div>
              <div class="form-group col-md-2">
                <select class="form-control form-control-select">
                  <option>10</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control-input" id="cmobile" required>
            <label class="label-control" for="cmobile">手機號碼</label>
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <textarea class="form-control-input" id="caddress" required></textarea>
            <label class="label-control" for="caddress">地址</label>
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <label class="col-sm-12" for="cnationality">國籍</label>
            <div class="col-sm-12">
              <div class="form-check form-check-inline"><input class="form-check-input" type="radio" value=""><label class="form-check-label">台灣</label></div>
              <div class="form-check form-check-inline"><input class="form-check-input" type="radio" value=""><label class="form-check-label">印尼</label></div>
              <div class="form-check form-check-inline"><input class="form-check-input" type="radio" value=""><label class="form-check-label">越南 </div></label></div>
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <label class="col-sm-12" for="csex">持有身分證</label>
            <div class="col-sm-12">
              <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" value=""><label class="form-check-label">本國身分證</label></div>
              <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" value=""><label class="form-check-label">護照</label></div>
              <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" value=""><label class="form-check-label">居留證</label></div>
              <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" value=""><label class="form-check-label">其他國家身分證件 </div></label></div>
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <label class="col-sm-12" for="cdistrict">學歷</label>
            <div class="col-sm-12">
              <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" value=""><label class="form-check-label">高中職以下</label></div>
              <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" value=""><label class="form-check-label">高中職</label></div>
              <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" value=""><label class="form-check-label">專科</label></div>
              <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" value=""><label class="form-check-label">四技</label></div>
              <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" value=""><label class="form-check-label">二技</label></div>
              <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" value=""><label class="form-check-label">高中職</label></div>
              <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" value=""><label class="form-check-label">大學</label></div>
              <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" value=""><label class="form-check-label">碩士</label></div>
              <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" value=""><label class="form-check-label">博士 </div></label></div>
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <label class="col-sm-12" for="cdistrict">就學狀態</label>
            <div class="col-sm-12">
              <div class="form-check form-check-inline"><input class="form-check-input" type="radio" value=""><label class="form-check-label">就學中</label></div>
              <div class="form-check form-check-inline"><input class="form-check-input" type="radio" value=""><label class="form-check-label">肄業 </div></label></div>
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <label class="col-sm-12" for="cdistrict">兵役狀態</label>
            <div class="col-sm-12">
              <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" value=""><label class="form-check-label">役畢</label></div>
              <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" value=""><label class="form-check-label">服役中</div></label></div>
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <label class="col-sm-12" for="cdistrict">殘疾狀態</label>
            <div class="col-sm-12">
              <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" value=""><label class="form-check-label">無</label></div>
              <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" value=""><label class="form-check-label">輕度殘障</label></div>
              <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" value=""><label class="form-check-label">中度殘障 </div></label></div>
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <label class="col-sm-12" for="cdistrict">管道</label>
            <div class="col-sm-12">
              <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" value=""><label class="form-check-label">人才庫</label></div>
              <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" value=""><label class="form-check-label">員工推薦</label></div>
              <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" value=""><label class="form-check-label">內部員工</label></div>
              <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" value=""><label class="form-check-label">Partner推薦</label></div>
              <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" value=""><label class="form-check-label">104人力銀行</label></div>
              <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" value=""><label class="form-check-label">1111人力銀行</label></div>
              <div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" value=""><label class="form-check-label">其他人力銀行</div></label></div>
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group">
            <button type="submit" class="form-control-submit-button">NEXT</button>
          </div>
          <div class="form-message">
            <div id="cmsgSubmit" class="h3 text-center hidden"></div>
          </div>
        </form>
        <!-- end of standard form --> 
      </div> <!-- end of col --> 
    </div>
    <!-- end of row --> 
  </div>
  <!-- end of container --> 
</div>
<!-- end of form-3 --> 
<!-- end of content --> 

<!-- Footer -->
<div class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="footer-col">
          <h4>About Viso</h4>
          <p>We're passionate about offering the best financial services to our loyal customers</p>
        </div>
      </div>
      <!-- end of col -->
      <div class="col-md-4">
        <div class="footer-col mx-auto">
          <h4>Latest Jobs</h4>
          <ul class="list-unstyled v-space-lg">
            <li class="media"> <i class="fas fa-chevron-right"></i>
              <div class="media-body"> Announcing of invitation principles in cold </div>
            </li>
            <li class="media"> <i class="fas fa-chevron-right"></i>
              <div class="media-body"> Announcing of invitation principles in cold </div>
            </li>
          </ul>
        </div>
      </div>
      <!-- end of col -->
      <div class="col-md-4">
        <div class="footer-col float-lg-right">
          <h4>Social Media</h4>
          <span class="fa-stack fa-lg"> <a href="#your-link"> <i class="fas fa-circle fa-stack-2x facebook"></i> <i class="fab fa-facebook-f fa-stack-1x"></i> </a> </span> <span class="fa-stack fa-lg"> <a href="#your-link"> <i class="fas fa-circle fa-stack-2x twitter"></i> <i class="fab fa-twitter fa-stack-1x"></i> </a> </span> <span class="fa-stack fa-lg"> <a href="#your-link"> <i class="fas fa-circle fa-stack-2x google-plus"></i> <i class="fab fa-google-plus-g fa-stack-1x"></i> </a> </span> <span class="fa-stack fa-lg"> <a href="#your-link"> <i class="fas fa-circle fa-stack-2x instagram"></i> <i class="fab fa-instagram fa-stack-1x"></i> </a> </span> <span class="fa-stack fa-lg"> <a href="#your-link"> <i class="fas fa-circle fa-stack-2x linkedin"></i> <i class="fab fa-linkedin-in fa-stack-1x"></i> </a> </span> <span class="fa-stack fa-lg"> <a href="#your-link"> <i class="fas fa-circle fa-stack-2x dribbble"></i> <i class="fab fa-dribbble fa-stack-1x"></i> </a> </span> </div>
      </div>
      <!-- end of col --> 
    </div>
    <!-- end of row --> 
  </div>
  <!-- end of container -->
  <div class="copyright">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p class="p-small text-center">Copyright © Viso - HR Recruiting Landing Page Template by <a class="underline" href="http://www.inovatik.com">Inovatik</a></p>
        </div>
        <!-- end of col --> 
      </div>
      <!-- enf of row --> 
    </div>
    <!-- end of container --> 
  </div>
  <!-- end of copyright --> 
</div>
<!-- end of footer --> 
<!-- end of footer --> 

<!-- Scripts --> 
<script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins --> 
<script src="js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap --> 
<script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework --> 
<script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors --> 
<script src="js/swiper.min.js"></script> <!-- Swiper for image and text sliders --> 
<script src="js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes --> 
<script src="js/isotope.pkgd.min.js"></script> <!-- Isotope for filter --> 
<script src="js/jquery.countTo.js"></script> <!-- jQuery countTo for counting animation --> 
<script src="js/morphext.min.js"></script> <!-- Morphtext rotating text in the header--> 
<script src="js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms --> 
<script src="js/scripts.js"></script> <!-- Custom scripts -->

</body>
</html>