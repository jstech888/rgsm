<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Create job listings, gather CV applications and present HR services to online visitors with this Bootstrap 4 HTML landing page template.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>rgsm - Diploma / FAQ</title>
    
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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-awesome fas fa-bars"></span>
                <span class="navbar-toggler-awesome fas fa-times"></span>
            </button>
            <!-- end of mobile menu toggle button -->

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <? include_once('menu.php');?>
                <span class="nav-item">
                    <a class="btn-outline-sm" href="#your-link"><i class="fas fa-mobile-alt"></i>+80 718 64 64</a>
                </span>
            </div>
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navbar -->



    <!-- Header -->
    <header id="header" class="ex-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>問與答</h1>
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
                        <li class="list-inline-item"><a class="underline" href="index.php">Home</a></li>
                        <li class="list-inline-item"><i class="fa fa-angle-double-right"></i></li>
                        <li class="list-inline-item">問與答</li>
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
                   <div class="card mb-3">
                     <div class="card-header">Q：請問租用日期如何計算？</div>
                     <div class="card-body">A：面交取物後到歸還日期總天數減一日，為租用天數。<br/>例如：2/3面交取物---2/5歸還，租用天數就為兩日。</div>
                   </div>
                   <div class="card mb-3">
                     <div class="card-header">Q：租金該如何支付?</div>
                     <div class="card-body"> A：租金於面交同時交付給出租人。 </div>
                   </div>
                   <div class="card mb-3">
                     <div class="card-header">Q：押金該如何支付?</div>
                     <div class="card-body"> A：請匯款到租樂牌帳戶: <br>玉山銀行(808) 0303-940-037960 <br>戶名：租樂牌有限公司<br>如果您是玉山以外的銀行，將在退回押金時扣取15元手續費。 </div>
                   </div>
                   <div class="card mb-3">
                     <div class="card-header">Q：刊登手續費該如何支付?</div>
                     <div class="card-body"> A：我們可以使用超商付款、匯款。<br>匯款請匯款到租樂牌帳戶：<br>玉山銀行(808) 0303-940-037960 <br>戶名：租樂牌有限公司<br>如果您是玉山以外的銀行，將在退回押金時扣取15元手續費。 </div>
                   </div>
                   <div class="card mb-3">
                     <div class="card-header">Q：是否能開立發票？ </div>
                     <div class="card-body"> A：租樂牌為合法登記之公司，中文名稱為租樂牌有限公司，統編為83785479，可開立統一發票。 </div>
                   </div>
                   <div class="card mb-3">
                     <div class="card-header">Q：租借與出租需要加入會員嗎？ </div>
                     <div class="card-body"> A：需要加入會員才能租借或刊登。 </div>
                   </div>
                   <div class="card mb-3">
                     <div class="card-header">Q：如何查詢我的訂單資料呢？ </div>
                     <div class="card-body"> A： </div>
                   </div>
                   <div class="card mb-3">
                     <div class="card-header">Q：如何查詢我的訂單資料呢？ </div>
                     <div class="card-body"> A： </div>
                   </div>
                   <div class="card mb-3">
                     <div class="card-header">Q：我如何知道我線上租賃品訂單已成立無誤? </div>
                     <div class="card-body"> A：客戶在系統上租賃訂單結帳完畢後，系統接收銀行端確認訂金款項無誤，此時訂單即刻成立。並<br><br>且會發送簡訊與mail告知客戶訂單成立。反之，如果線上租賃訂金款項超過一天尚未支付完成，<br><br>其訂單將會自動取消無法恢復。 </div>
                   </div>
                   <div class="card mb-3">
                     <div class="card-header">Q：請問想洽詢個人訂單資訊可以怎麼查詢? </div>
                     <div class="card-body"> A：首頁進行登入會員頁面以利查詢個人訂購資料。 </div>
                   </div>
                   <!-- end of faq -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of ex-basic-2 -->
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
                </div> <!-- end of col -->
                <div class="col-md-4">
                    <div class="footer-col mx-auto">
                        <h4>Latest Jobs</h4>
                        <ul class="list-unstyled v-space-lg">
                            <li class="media">
                                <i class="fas fa-chevron-right"></i>
                                <div class="media-body">
                                    Announcing of invitation principles in cold
                                </div>
                            </li>
                            <li class="media">
                                <i class="fas fa-chevron-right"></i>
                                <div class="media-body">
                                    Announcing of invitation principles in cold
                                </div>
                            </li>
                        </ul>
                    </div>
                </div> <!-- end of col -->
                <div class="col-md-4">
                    <div class="footer-col float-lg-right">
                        <h4>Social Media</h4>
                        <span class="fa-stack fa-lg">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x facebook"></i>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack fa-lg">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x twitter"></i>
                                <i class="fab fa-twitter fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack fa-lg">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x google-plus"></i>
                                <i class="fab fa-google-plus-g fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack fa-lg">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x instagram"></i>
                                <i class="fab fa-instagram fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack fa-lg">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x linkedin"></i>
                                <i class="fab fa-linkedin-in fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack fa-lg">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x dribbble"></i>
                                <i class="fab fa-dribbble fa-stack-1x"></i>
                            </a>
                        </span>
                    </div> 
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="p-small text-center">Copyright © Viso - HR Recruiting Landing Page Template by <a class="underline" href="http://www.inovatik.com">Inovatik</a></p>
                    </div> <!-- end of col -->
                </div> <!-- enf of row -->
            </div> <!-- end of container -->
        </div> <!-- end of copyright -->
    </div> <!-- end of footer -->  
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