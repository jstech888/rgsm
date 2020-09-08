<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home";
$route['404_override'] = "my404/index";

$route['productCatelog/(:any)'] = 'product/catelog/$1';
$route['productDetail/(:any)']  = 'product/detail/$1';

$route['appdownload']  = 'normal/appdownload';
$route['service']      = 'normal/service';
$route['query']        = 'normal/query';
$route['about']        = 'normal/index/about';

$route['Page']		   = 'page';
$route['Page/(:any)']  = 'page/index/$1';

$route['videos']		 = 'story';
$route['videos/(:any)']  = 'story/$1';

$route['News']		   = 'news/index';
$route['News/(:any)']  = 'news/detail/$1';
/*
$route['normal/(:any)']  	= 'normal/index/$1';
$route['article/(:any)']  	= 'article/index/$1';
$route['公司介紹']  		= 'normal/index/公司介紹';
$route['品牌介紹']  		= 'normal/index/品牌介紹';
$route['會員權益']  		= 'normal/index/會員權益';
$route['退貨須知']  		= 'normal/index/退貨須知';
$route['運送資訊']  		= 'normal/index/運送資訊';
$route['隱私權政策'] 		= 'normal/index/隱私權政策';
$route['經銷代理合作']  	= 'normal/index/經銷代理合作';
$route['聯絡我們']  		= 'normal/contract';
*/

$route['admin/seo/']  	 			= 'adminC/seo/';
$route['admin/seo/(:any)']  	 	= 'adminC/seo/$1';

$route['admin/coupon/']  	 		= 'adminC/coupon/';
$route['admin/coupon/(:any)']  	 	= 'adminC/coupon/$1';

$route['admin/blog/']  	 			= 'adminC/blog/';
$route['admin/blog/(:any)']  	 	= 'adminC/blog/$1';

$route['admin/brand/']  	 		= 'adminC/brand/';
$route['admin/brand/(:any)']  	 	= 'adminC/brand/$1';

$route['admin/news/']  	 			= 'adminC/news/';
$route['admin/news/(:any)']  	 	= 'adminC/news/$1';

$route['admin/faq/']  	 			= 'adminC/faq/';
$route['admin/faq/(:any)']  	 	= 'adminC/faq/$1';

$route['admin/mainmenu']  	 		= 'adminC/mainmenu';
$route['admin/mainmenu/(:any)']  	= 'adminC/mainmenu/$1';

$route['admin/currencies']  	 	= 'adminC/currencies';
$route['admin/currencies/(:any)']  	= 'adminC/currencies/$1';

$route['admin/page/']  	 			= 'adminC/page/';
$route['admin/page/(:any)']  	 	= 'adminC/page/$1';

$route['admin/widget/(:any)']  		= 'widget/find/$1';
$route['admin/article/(:any)']  	= 'articleadmin/$1';

$route['admin/file']  	 			= 'adminC/file';

$route['admin/dashboard'] 			= 'adminC/dashboard';
$route['admin/product/(:any)']  	= 'adminC/product/$1';
$route['admin/catalogue/(:any)']  	= 'adminC/catalogue/$1';

$route['admin/order/(:any)']  		= 'adminC/order/$1';
$route['admin/option/(:any)']  		= 'adminC/option/$1';
$route['admin/pageTraslate/(:any)'] = 'adminC/pageTraslate/$1';


$route['admin/user/(:any)']  	 		= 'adminC/user/$1';

$route['admin/widget/footer/(:any)'] 	= 'adminC/widget/footer/$1';

// 活動館別設定
$route['admin/hall']  	 			= 'adminC/hall';
$route['admin/hall/(:any)']  	    = 'adminC/hall/$1';

$route['admin/campaign/']  	 		= 'adminC/campaign/';
$route['admin/campaign/(:any)']  	= 'adminC/campaign/$1';


/* End of file routes.php */
/* Location: ./application/config/routes.php */