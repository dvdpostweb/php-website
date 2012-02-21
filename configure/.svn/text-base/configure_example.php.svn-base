<?php  
define('SITE_ID',$_SERVER["HTTP_HOST"]);

include('configure_machine_specific.php');

//ENTITY  --- HOME ENTERTAINMENT SERVICES = 1  --- CAMEO ENTERTAINMENT = 38
	$constants['ENTITY_ID']= '1';

//GROUPIP - FULLPRICE -> 1 / PROMOPRICE & NL ->2
	$constants['GROUP_ID']= '1';
	
//URL
	$constants['WEB_SITE']= 'www';
	$constants['WEB_SITE_ID']= '1';
	$constants['SITE_HOST_ID']= '1';
	$constants['SITE_IS_ADULT']= false;
	$constants['HTTP_SERVER']= 'http://' . SITE_ID;
	$constants['HTTPS_SERVER']= 'http://' . SITE_ID;
	$constants['DIR_WS_IMAGES']= '/images/www3/';		
	$constants['DIR_WS_IMAGESX']= '/imagesx/';
	$constants['DIR_DVD_WS_IMAGES']= '/images/';
	$constants['DIR_WS_IMAGES_HOW']= '/images/www3/how/';
	$constants['DIR_WS_IMAGES_LANGUAGES']= '/images/www3/languages/';

//site specific
	$constants['MOVIX_URL']= 'www3.dvdxpost.be'; //or nor sit for movix link
	$constants['MOVIX_LINK']= true;
	$constants['SERIES_NOT_EXIST']= false;
	$constants['DEFAULT_LANGUAGE'] = '';
	$constants['PRODUCTS_LISTING_DISPLAY_SUMMARY'] = true;
	$constants['PRODUCTS_LISTING_SHOW_LANGUAGE'] = false;
	$constants['RECOMMANDATIONS_SHOW_SUBCATEGORIES'] = true;
	$constants['WL_DISCOUNT'] = 0;
	$constants['DISCOUNT_ACTIVE'] = 0; //only for partner sites (set automatically discount code in input hidden
	$constants['PAYMENT_METHOD'] = 'ogone.php;ogoneamex.php;domiciliation.php';
	$constants['SITE_WIDTH_PUBLIC']= '731';
	

//ogone
	$constants['OGONE_FORM_ACTION']= 'https://secure.ogone.com/ncol/prod/orderstandard.asp';
	$constants['OGONE_PSPID']= 'dvdpost';
	$constants['MODULE_PAYMENT_OGONE_SHA_STRING']= 'KILLBILL';
	
	

//admin
	$constants['WHOSONLINE']= 0;

//dir
	$constants['ENABLE_SSL']= false; 
	$constants['DIR_WS_CATALOG']= '/'; 
	$constants['DIR_WS_ICONS']= $constants['DIR_WS_IMAGES'] . 'icons/';
	$constants['DIR_WS_INCLUDES']= $_SERVER['DOCUMENT_ROOT'].'/includes/';
	$constants['DIR_WS_BOXES']= $constants['DIR_WS_INCLUDES'] . 'boxes/';
	$constants['DIR_WS_FUNCTIONS']= $constants['DIR_WS_INCLUDES'] . 'functions/';
	$constants['DIR_WS_CLASSES']= $constants['DIR_WS_INCLUDES'] . 'classes/';
	$constants['DIR_WS_MODULES']= $constants['DIR_WS_INCLUDES'] . 'modules/';
	$constants['DIR_WS_LANGUAGES']= $constants['DIR_WS_INCLUDES'] . 'languages/';
	$constants['DIR_WS_DOWNLOAD_PUBLIC']= $constants['DIR_WS_CATALOG'] . 'pub/';
	//$constants['DIR_FS_IMAGES_LOCAL']= $constants['DIR_FS_DOCUMENT_ROOT'] . '/../images.dvdpost.be/';
	$constants['DIR_FS_CATALOG']= $constants['DIR_FS_DOCUMENT_ROOT'] . $constants['DIR_WS_CATALOG'];
	$constants['DIR_FS_DOWNLOAD']= $constants['DIR_FS_CATALOG'] . 'download/';
	$constants['DIR_FS_DOWNLOAD_PUBLIC']= $constants['DIR_FS_CATALOG']. 'pub/';

//variables used in same_themes_products.php
	$constants['MAX_DISPLAY_SAME_THEME_PRODUCTS']= 15;
	$constants['MAX_TITLES_PER_ROW']= 5;
	$constants['BOX_SAME_THEME_WIDTH']= 600;
	$constants['TABLE_MAIN_WIDTH'] = 980;
	$constants['TABLE_MAIN_COLOR'] = 'white';
	$constants['TABLE_MAIN_ALIGN'] = 'center'; 
	$constants['TABLE_MAIN_STYLE'] = "" ;
	$constants['TABLE_MAIN_BACKGROUND'] = "";
	$constants['DEFAULT_SHOW_IMG_ROTATOR']= true;
	$constants['DEFAULT_MAX_TITLES_PER_ROW']= 4;

//images_box
	$constants['IMAGES_BOXES_CORNER_RIGHT_LEFT'] = $constants['DIR_WS_IMAGES'] . 'infobox/corner_right_left.gif';
	$constants['IMAGES_BOXES_CORNER_RIGHT'] = $constants['DIR_WS_IMAGES'] . 'infobox/corner_right.gif';
	$constants['IMAGES_BOXES_CORNER_LEFT'] = $constants['DIR_WS_IMAGES'] . 'infobox/corner_left.gif';
//Sphinx
	$constants['SPHINX_HOST']= 'pekin';
//Memcache 
$constants['SERVER_MEMCACHE_HOST']= 'matadi';
$constants['SERVER_MEMCACHE_PORT']= '11211';
	
//table name
	$constants['TABLE_ACTORS'] = 'actors';
	$constants['TABLE_ADDRESS_BOOK'] = 'address_book';
	$constants['TABLE_ADDRESS_FORMAT'] = 'address_format';
	$constants['TABLE_BANNERS'] = 'banners';
	$constants['TABLE_BANNERS_HISTORY'] = 'banners_history';
	$constants['TABLE_CATEGORIES'] = 'categories';
	$constants['TABLE_THEMES'] = 'themes';
	$constants['TABLE_CATEGORIES_DESCRIPTION'] = 'categories_description';
	$constants['TABLE_THEMES_DESCRIPTION'] = 'themes_description';
	$constants['TABLE_CONFIGURATION'] = 'configuration';
	$constants['TABLE_CONFIGURATION_GROUP'] = 'configuration_group';
	$constants['TABLE_COUNTER'] = 'counter';
	$constants['TABLE_COUNTER_HISTORY'] = 'counter_history';
	$constants['TABLE_COUNTRIES'] = 'countries';
	$constants['TABLE_CURRENCIES'] = 'currencies';
	$constants['TABLE_CUSTOMERS'] = 'customers';
	$constants['TABLE_CUSTOMERS_BASKET'] = 'customers_basket';
	$constants['TABLE_CUSTOMERS_BASKET_ATTRIBUTES'] = 'customers_basket_attributes';
	$constants['TABLE_CUSTOMERS_INFO'] = 'customers_info';
	$constants['TABLE_DIRECTORS'] = 'directors';
	$constants['TABLE_LANGUAGES'] = 'languages';
	$constants['TABLE_MANUFACTURERS'] = 'manufacturers';
	$constants['TABLE_MANUFACTURERS_INFO'] = 'manufacturers_info';
	$constants['TABLE_ORDERS'] = 'orders';
	$constants['TABLE_ORDERS_PRODUCTS'] = 'orders_products';
	$constants['TABLE_ORDERS_PRODUCTS_ATTRIBUTES'] = 'orders_products_attributes';
	$constants['TABLE_ORDERS_PRODUCTS_DOWNLOAD'] = 'orders_products_download';
	$constants['TABLE_ORDERS_STATUS'] = 'orders_status';
	$constants['TABLE_ORDERS_STATUS_HISTORY'] = 'orders_status_history';
	$constants['TABLE_ORDERS_TOTAL'] = 'orders_total';
	$constants['TABLE_PICTURE_FORMAT'] = 'picture_format';
	$constants['TABLE_PRODUCTS'] = 'products';
	$constants['TABLE_PRODUCTS_ATTRIBUTES'] = 'products_attributes';
	$constants['TABLE_PRODUCTS_ATTRIBUTES_DOWNLOAD'] = 'products_attributes_download';
	$constants['TABLE_PRODUCTS_DESCRIPTION'] = 'products_description';
	$constants['TABLE_PRODUCTS_LANGUAGES'] = 'products_languages';
	$constants['TABLE_PRODUCTS_NOTIFICATIONS'] = 'products_notifications';
	$constants['TABLE_PRODUCTS_OPTIONS'] = 'products_options';
	$constants['TABLE_PRODUCTS_OPTIONS_VALUES'] = 'products_options_values';
	$constants['TABLE_PRODUCTS_OPTIONS_VALUES_TO_PRODUCTS_OPTIONS'] = 'products_options_values_to_products_options';
	$constants['TABLE_PRODUCTS_SOUNDTRACKS'] = 'products_soundtracks';
	$constants['TABLE_PRODUCTS_TO_CATEGORIES'] = 'products_to_categories';
	$constants['TABLE_PRODUCTS_TO_THEMES'] = 'products_to_themes';
	$constants['TABLE_PRODUCTS_TO_ACTORS'] = 'products_to_actors';
	$constants['TABLE_PRODUCTS_TO_DIRECTORS'] = 'products_to_directors';
	$constants['TABLE_PRODUCTS_TO_LANGUAGES'] = 'products_to_languages';
	$constants['TABLE_PRODUCTS_TO_SOUNDTRACKS'] = 'products_to_soundtracks';
	$constants['TABLE_PRODUCTS_TO_UNDERTITLES'] = 'products_to_undertitles';
	$constants['TABLE_PUBLIC'] = 'public';
	$constants['TABLE_PRODUCTS_UNDERTITLES'] = 'products_undertitles';
	$constants['TABLE_REVIEWS'] = 'reviews';
	$constants['TABLE_REVIEWS_DESCRIPTION'] = 'reviews_description';
	$constants['TABLE_SESSIONS'] = 'sessions';
	$constants['TABLE_SPECIALS'] = 'specials';
	$constants['TABLE_STUDIO'] = 'studio';
	$constants['TABLE_TAX_CLASS'] = 'tax_class';
	$constants['TABLE_TAX_RATES'] = 'tax_rates';
	$constants['TABLE_GEO_ZONES'] = 'geo_zones';
	$constants['TABLE_ZONES_TO_GEO_ZONES'] = 'zones_to_geo_zones';
	$constants['TABLE_WHOS_ONLINE'] = 'whos_online';
	$constants['TABLE_ZONES'] = 'zones';
	$constants['TABLE_WISHLIST'] = 'wishlist';
	$constants['TABLE_WISHLIST_ASSIGNED'] = 'wishlist_assigned';
	$constants['TABLE_ACTIVATION_CODE'] = 'activation_code';
	$constants['TABLE_ACTIVATION_GROUP'] = 'activation_group';
	$constants['TABLE_OGONE_CHECK'] = 'ogone_check';
	$constants['TABLE_DISCOUNT_CODE'] = 'discount_code';
	$constants['TABLE_DISCOUNT_USE'] = 'discount_use';
	$constants['TABLE_CUSTSERV_FAQ'] = 'custserv_faq';
	$constants['TABLE_CUSTSERV'] = 'custserv';
	$constants['CUSTSERV_AUTO_ANSWER'] = 'custserv_auto_answer';
	$constants['TABLE_CUSTSERV_AUTO_ANSWER'] = 'custserv_auto_answer';
	$constants['TABLE_COMPENSATION'] = 'compensation';
	$constants['TABLE_PRODUCTS_ALERT'] = 'products_alert';
	$constants['TABLE_CUSTSERV_DELAYED_DETAILLED'] = 'custserv_delayed_detailled';
	$constants['TABLE_CUSTSERV_DELAYED_FINNALYARRIVED'] = 'custserv_delayed_finallyarrived';
	$constants['TABLE_SUGGESTIONS'] = 'suggestions';
	$constants['TABLE_CUSTSERV_CAT'] = 'custserv_cat';
	$constants['TABLE_ACTIVATION_GIFT'] = 'activation_gift';
	$constants['TABLE_ABO'] = 'abo';
	$constants['TABLE_ACTIVATION_MIKADO'] = 'activation_mikado';
	$constants['TABLE_DOMICILIATION2'] = 'domiciliation2';
	$constants['TABLE_SPONSORING_USED'] = 'sponsoring_used';
	$constants['TABLE_IMGROTATOR'] = 'imgrotator';
    
  
//inherit from general configuration properties
if (file_exists($constants['DIR_FS_DOCUMENT_ROOT'] . '/configure/configure' . '_' . SITE_ID . '.php')) include('configure' . '_' . SITE_ID . '.php');
?>
