<?php
//error_reporting(E_ALL|E_STRICT);
//ini_set('display_errors', 1);
date_default_timezone_set('Europe/Paris');

// mise en place des répertoires et chargement des classes
set_include_path('.'
    . PATH_SEPARATOR . './library'
    . PATH_SEPARATOR . '../../library_zend'
    . PATH_SEPARATOR . '../../../../library_zend'
    . PATH_SEPARATOR . '/data/sites/benelux/zend_library/'
	. PATH_SEPARATOR . './application/models/'
    . PATH_SEPARATOR . get_include_path());
require_once 'Zend/Loader/Autoloader.php';
$autoloader = Zend_Loader_Autoloader::getInstance();
$autoloader->setFallbackAutoloader(true);

$config = new Zend_Config_Ini('./application/config.ini', 'general');
$registry = Zend_Registry::getInstance();
$registry->set('config', $config);
// Mise en place de la BDD
$db = Zend_Db::factory($config->db);
Zend_Db_Table::setDefaultAdapter($db);
Zend_Registry::set('db', $db);


$front     = Zend_Controller_Front::getInstance();
$restRoute = new Zend_Rest_Route($front);


/*$frontendOptions = array(
   'lifetime' => 7200, // temps de vie du cache de 2 heures
   'automatic_serialization' => true
);

$backendOptions = array(
    // Répertoire où stocker les fichiers de cache
    'cache_dir' => 'tmp'
);

// créer un objet Zend_Cache_Core
/$cache = Zend_Cache::factory('Core',
                             'File',
                             $frontendOptions,
                             $backendOptions);


Zend_Registry::set('cache', $cache);*/
//echo '<pre>';
//var_dump($restRoute);
$front->getRouter()->addRoute('default', $restRoute);
//categories
$route_categories_get = new Zend_Controller_Router_Route(':lang/:controller/:type/:id',array('controller'=>'categories','action'=>'get'),array('lang'=>'(fr|nl|en)','type'=>'(dvd_norm|dvd_adult)','id'=>'\d+'));
$front->getRouter()->addRoute('categoriesGet',$route_categories_get);

$route_categories_index = new Zend_Controller_Router_Route(':lang/:controller/:type',array('controller'=>'categories','action'=>'index'),array('lang'=>'(fr|nl|en)','type'=>'(dvd_norm|dvd_adult)'));
$front->getRouter()->addRoute('categoriesIndex',$route_categories_index);

$route_categories_movies_index = new Zend_Controller_Router_Route(':lang/:controller/:id/:movies',array('controller'=>'categories','action'=>'index'),array('lang'=>'(fr|nl|en)','id'=>'\d+','movies'=>'movies'));
$front->getRouter()->addRoute('categoriesMoviesIndex',$route_categories_movies_index);

//movies
$route_movies_index = new Zend_Controller_Router_Route(':lang/:controller/:type',array('controller'=>'movies','action'=>'index'),array('lang'=>'(fr|nl|en)','type'=>'(dvd_norm|dvd_adult)'));
$front->getRouter()->addRoute('MoviesIndex',$route_movies_index);


$route_movies_get = new Zend_Controller_Router_Route(':lang/:controller/:type/:id',array('controller'=>'movies','action'=>'get'),array('lang'=>'(fr|nl|en)','type'=>'(dvd_norm|dvd_adult)','id'=>'\d+'));
$front->getRouter()->addRoute('MoviesGet',$route_movies_get);
//wishlist
$route_wishlist_index = new Zend_Controller_Router_Route(':lang/:type/:controller',array('controller'=>'wishlist','action'=>'index'),array('lang'=>'(fr|nl|en)','access_token'=>'.*','type'=>'(dvd_norm|dvd_adult)'));
$front->getRouter()->addRoute('WishlistIndex',$route_wishlist_index);

$route_wishlist_delete = new Zend_Controller_Router_Route(':lang/:controller/:id',array('controller'=>'wishlist','action'=>'delete'),array('lang'=>'(fr|nl|en)','access_token'=>'.*','type'=>'(dvd_norm|dvd_adult)','id'=>'\d+'));
$front->getRouter()->addRoute('Wishlistdelete',$route_wishlist_delete);


$route_wishlist_post = new Zend_Controller_Router_Route(':lang/:type/:controller/:id',array('controller'=>'wishlist','action'=>'post'),array('lang'=>'(fr|nl|en)','access_token'=>'.*','type'=>'(dvd_norm|dvd_adult)','id'=>'\d+'));
$front->getRouter()->addRoute('WishlistPost',$route_wishlist_post);


//search
$route_search_index = new Zend_Controller_Router_Route(':lang/:controller/:type/:search',array('controller'=>'search','action'=>'index'),array('lang'=>'(fr|nl|en)','type'=>'(dvd_norm|dvd_adult)','type'=>'(dvd_norm|dvd_adult)'));
$front->getRouter()->addRoute('categoriesIndex',$route_search_index);

$route_email_index = new Zend_Controller_Router_Route(':controller',array('controller'=>'email','action'=>'post'));
$front->getRouter()->addRoute('emailIndex',$route_email_index);

$route_email_index = new Zend_Controller_Router_Route(':controller/:email',array('controller'=>'email','action'=>'get'));
$front->getRouter()->addRoute('emailIndex',$route_email_index);



// setup controller
$frontController = Zend_Controller_Front::getInstance();
$frontController->throwExceptions(true);
$frontController->setControllerDirectory('./application/controllers');
//Zend_Layout::startMvc(array('layoutPath'=>'./application/layouts'));
// run!
$frontController->dispatch();
?>