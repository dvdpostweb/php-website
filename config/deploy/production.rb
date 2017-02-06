#############################################################
#	Application
#############################################################

set :application, "phpapp"
set :deploy_to, "/data/sites/benelux/php_app"

#############################################################
#	Settings
#############################################################

default_run_options[:pty] = true
ssh_options[:forward_agent] = true
set :use_sudo, false
set :scm_verbose, true

#############################################################
#	Servers
#############################################################

set :user, "phpapp"
set :domain, "217.112.190.50"
#set :domain2, "pekin"
set :port, 54051
role :web,  domain#,  domain2
role :app,  domain#,  domain2
role :db, domain, :primary => true

#############################################################
#	Git
#############################################################

set :scm, :git
set :branch, "master"
set :scm_user, 'dvdpost'
set :repository, "git@github.com:dvdpost/php-website.git"
set :deploy_via, :remote_cache

namespace :deploy do
  desc "Create the database yaml file"
  after "deploy:update_code" do
    #run "cp /data/sites/benelux/php_app/shared/cached-copy/includes/functions/database.php  #{release_path}/includes/functions/database.php"
    #run "cp /data/sites/benelux/php_app/shared/cached-copy/configure/*  #{release_path}/configure/"
    #run "cp /data/sites/benelux/releases/zend/*  #{release_path}/rest/application/"
    #run "chmod 777 -R #{release_path}/webservice/"

    db_config = <<-EOF
    <?php
	$links = array();
	function tep_db_connect($server = DB_SERVER, $username = DB_SERVER_USERNAME, $password = DB_SERVER_PASSWORD, $database = DB_DATABASE, $link = 'db_link')
	{
	    global $links, $$link;
	    $servers = array(DB_SERVER);
	    foreach ($servers as $server) {
	        $db_link = @mysql_connect($server, $username, $password);
	        if ($db_link) {
	            mysql_select_db($database);
	            if ($server == DB_SERVER)
	                set_master_status(true);
	            array_push($links, $db_link);
	        } else {
	            if ($server == DB_SERVER) {
	                set_master_status(false);
	            }
	        }
	    }
	    return $db_link;
	}

	function get_master_status()
	{
	    global $master_status;
	    return $master_status;
	}

	function set_master_status($status)
	{
	    global $master_status;
	    $master_status = $status;
	}


	function tep_db_close($link = 'db_link')
	{
	    global $links;
	    foreach ($links as $connect) {
	        mysql_close($connect);
	    }
	}

	function tep_db_error($query, $errno, $error)
	{


	    $data = '<br /><br />session<br />';

	    $data .= 'host -> ' . $_SERVER['HTTP_HOST'] . '<br />';
	    $data .= 'user agent -> ' . $_SERVER['HTTP_USER_AGENT'] . '<br />';
	    $data .= 'current page -> ' . $_SERVER['SCRIPT_FILENAME'] . '<br />';
	    $data .= 'referer -> ' . $_SERVER['HTTP_REFERER'] . '<br />';
	    $data .= 'query string -> ' . $_SERVER['QUERY_STRING'] . '<br />';
	    if (count($_POST) > 0) {
	        foreach ($_POST as $db_data => $value) {
	            if (is_string($value)) {
	                $data .= 'post -> ' . $db_data . ' -> ' . $value . '<br />';
	            }
	        }
	    }
	    if (count($_SESSION) > 0) {
	        foreach ($_SESSION as $db_data => $value) {
	            if (is_string($value)) {
	                $data .= 'session -> ' . $db_data . ' -> ' . $value . '<br />';
	            }
	        }
	    }
	    if (!empty($_COOKIE['customers_id']))
	        $data .= $_COOKIE['customers_id'] . '<br />';
	    if (!empty($_COOKIE['email_address']))
	        $data .= $_COOKIE['email_address'] . '<br />';
	    if (tep_session_is_registered('customer_id')) {
	        $data .= 'cust_id' . $customer_id . '<br />';
	    }


	    tep_mail('bugreport@dvdpost.be', 'bugreport@dvdpost.be', 'sql error prod', '<font color="#000000"><b>' . $errno . ' - ' . $error . '<br><br>' . $query . '<br><br><small><font color="#ff0000">[TEP STOP]</font></small><br><br></b><br />' . $data . '</font>', 'bugreport@dvdpost.be', 'bugreport@dvdpost.be');
	    //die('<font color="#000000"><b>' . $errno . ' - ' . $error . '<br><br>' . $query . '<br><br><small><font color="#ff0000">[TEP STOP]</font></small><br><br></b></font>');
	}

	function tep_db_error2($query, $master = '')
	{


	    $data = '<br /><br />session<br />';

	    $data .= 'host -> ' . $_SERVER['HTTP_HOST'] . '<br />';
	    $data .= 'user agent -> ' . $_SERVER['HTTP_USER_AGENT'] . '<br />';
	    $data .= 'current page -> ' . $_SERVER['SCRIPT_FILENAME'] . '<br />';
	    $data .= 'referer -> ' . $_SERVER['HTTP_REFERER'] . '<br />';
	    $data .= 'query string -> ' . $_SERVER['QUERY_STRING'] . '<br />';
	    if (count($_POST) > 0) {
	        foreach ($_POST as $db_data => $value) {
	            if (is_string($value)) {
	                $data .= 'post -> ' . $db_data . ' -> ' . $value . '<br />';
	            }
	        }
	    }
	    if (count($_SESSION) > 0) {
	        foreach ($_SESSION as $db_data => $value) {
	            if (is_string($value)) {
	                $data .= 'session -> ' . $db_data . ' -> ' . $value . '<br />';
	            }
	        }
	    }
	    if (!empty($_COOKIE['customers_id']))
	        $data .= $_COOKIE['customers_id'] . '<br />';
	    if (!empty($_COOKIE['email_address']))
	        $data .= $_COOKIE['email_address'] . '<br />';
	    if (tep_session_is_registered('customer_id')) {
	        $data .= 'cust_id' . $customer_id . '<br />';
	    }


	    tep_mail('bugreport@dvdpost.be', 'bugreport@dvdpost.be', 'sql verif ' . $master, '<font color="#000000"><b><br><br>' . $query . '<br><br><small><font color="#ff0000">[TEP STOP]</font></small><br><br></b><br />' . $data . '</font>', 'bugreport@dvdpost.be', 'bugreport@dvdpost.be');
	    //die('<font color="#000000"><b>' . $errno . ' - ' . $error . '<br><br>' . $query . '<br><br><small><font color="#ff0000">[TEP STOP]</font></small><br><br></b></font>');
	}

	function tep_db_query($query, $link = 'db_link', $force_master = false)
	{
	    global $links, $memcache;
	    $nb_connecr = count($links);
	    if (0 === strpos(trim(strtolower($query)), 'select')) {//read random or not
	        if (1 == 1 || $force_master === true) {
	            $connect = $links[0];
	        }//force master === false
	        else if (DB_REDIRECT_ALL_RO === false || $nb_connect == 1) {
	            $rand = rand(0, ($nb_connect - 1));
	            $connect = $links[$rand];
	        } else {
	            $connect = $links[1];
	        }
	    } else {//write
	        if (get_master_status() === true)
	            $connect = $links[0];
	        else
	            $connect = false;//die('connection lost'.trim(strtolower($query)).'@');
	    }


	    if (STORE_DB_TRANSACTIONS == 'true') {
	        error_log("QUERY " . $query . "\n", 3, STORE_PAGE_PARSE_TIME_LOG);
	    }
	    #echo $query." force ".$force_master."read only ".DB_REDIRECT_ALL_RO;
	    #var_dump($connect);
	    if ($connect !== false)
	        $result = mysql_query($query, $connect) or tep_db_error($query, mysql_errno(), mysql_error());
	    else {
	        tep_db_error2($query, 'master connection lost');
	        //echo "error";
	    }

	    if (STORE_DB_TRANSACTIONS == 'true') {
	        $result_error = mysql_error();
	        error_log("RESULT " . $result . " " . $result_error . "\n", 3, STORE_PAGE_PARSE_TIME_LOG);
	    }
	    return $result;
	}


	function tep_db_perform($table, $data, $action = 'insert', $parameters = '', $link = 'db_link')
	{
	    reset($data);
	    if ($action == 'insert') {
	        $query = 'insert into ' . $table . ' (';
	        while (list($columns,) = each($data)) {
	            $query .= $columns . ', ';
	        }
	        $query = substr($query, 0, -2) . ') values (';
	        reset($data);
	        while (list(, $value) = each($data)) {
	            switch ((string)$value) {
	                case 'now()':
	                    $query .= 'now(), ';
	                    break;
	                case 'null':
	                    $query .= 'null, ';
	                    break;
	                default:
	                    $query .= '\'' . tep_db_input($value) . '\', ';
	                    break;
	            }
	        }
	        $query = substr($query, 0, -2) . ')';
	    } elseif ($action == 'update') {
	        $query = 'update ' . $table . ' set ';
	        while (list($columns, $value) = each($data)) {
	            switch ((string)$value) {
	                case 'now()':
	                    $query .= $columns . ' = now(), ';
	                    break;
	                case 'null':
	                    $query .= $columns .= ' = null, ';
	                    break;
	                default:
	                    $query .= $columns . ' = \'' . tep_db_input($value) . '\', ';
	                    break;
	            }
	        }
	        $query = substr($query, 0, -2) . ' where ' . $parameters;
	    }

	    return tep_db_query($query);
	}

	function tep_db_cache($sqlQuery, $expired_time = 0, $random = 0)
	{
	    global $memcache;
	    $memcache_key = md5($sqlQuery);
	    if (isset($memcache))
	        $rows = $memcache->get($memcache_key);
	    //$rows=false;
	    else {
	        $rows = false;
	        $data = 'sql -> ' . $sqlQuery;
	        $data .= 'host -> ' . $_SERVER['HTTP_HOST'] . '<br />';
	        $data .= 'user agent -> ' . $_SERVER['HTTP_USER_AGENT'] . '<br />';
	        $data .= 'current page -> ' . $_SERVER['SCRIPT_FILENAME'] . '<br />';
	        $data .= 'referer -> ' . $_SERVER['HTTP_REFERER'] . '<br />';
	        $data .= 'query string -> ' . $_SERVER['QUERY_STRING'] . '<br />';
	        //tep_mail('bugreport@dvdpost.be','bugreport@dvdpost.be','memcache error',$data,'bugreport@dvdpost.be','bugreport@dvdpost.be');
	    }

	    if ($rows !== false && $rows != "")

	        if ($random == 0)
	            return $rows;
	        else {
	            $new_rows = array();
	            $nb_rows = count($rows);
	            if ($random > $nb_rows)
	                return $rows;

	            $ids = array_rand($rows, $random);
	            if (!is_array($ids)) {
	                $ids = array($ids);
	            }
	            for ($i = 0; $i < $random; ++$i)
	                $new_rows[] = $rows[$ids[$i]];

	            return $new_rows;
	        }
	    else {
	        $rows = array();
	        $db_query = tep_db_query($sqlQuery);
	        while ($row = tep_db_fetch_array($db_query)) {
	            $rows[] = $row;
	        }
	        if (isset($memcache))
	            $memcache->set($memcache_key, $rows, MEMCACHE_COMPRESSED, $expired_time);
	        if ($random == 0)
	            return $rows;
	        else {
	            $new_rows = array();
	            $nb_rows = count($rows);
	            if ($random > $nb_rows)
	                return $rows;

	            $ids = array_rand($rows, $random);
	            if (!is_array($ids)) {
	                $ids = array($ids);
	            }
	            for ($i = 0; $i < $random; ++$i)
	                $new_rows[] = $rows[$ids[$i]];

	            return $new_rows;
	        }
	    }
	}

	function tep_db_cache_asso($sqlQuery, $asso = 'id', $expired_time = 0, $random = 0)
	{
	    global $memcache;
	    $memcache_key = md5($sqlQuery);
	    if (isset($memcache))
	        $rows = $memcache->get($memcache_key);
	    else {
	        $rows = false;
	        $data = 'sql -> ' . $sqlQuery . '<br />';
	        $data .= 'host -> ' . $_SERVER['HTTP_HOST'] . '<br />';
	        $data .= 'user agent -> ' . $_SERVER['HTTP_USER_AGENT'] . '<br />';
	        $data .= 'current page -> ' . $_SERVER['SCRIPT_FILENAME'] . '<br />';
	        $data .= 'referer -> ' . $_SERVER['HTTP_REFERER'] . '<br />';
	        $data .= 'query string -> ' . $_SERVER['QUERY_STRING'] . '<br />';
	        tep_mail('bugreport@dvdpost.be', 'bugreport@dvdpost.be', 'memcache error', $data, 'bugreport@dvdpost.be', 'bugreport@dvdpost.be');
	    }
	    if ($rows !== false && $rows != "")

	        if ($random == 0)
	            return $rows;
	        else {
	            $new_rows = array();
	            $nb_rows = count($rows);
	            if ($random > $nb_rows)
	                return $rows;

	            $ids = array_rand($rows, $random);
	            for ($i = 0; $i < $random; ++$i)
	                $new_rows[$ids[$i]] = $rows[$ids[$i]];

	            return $new_rows;
	        }
	    else {
	        $rows = array();
	        $db_query = tep_db_query($sqlQuery);
	        while ($row = tep_db_fetch_array($db_query)) {
	            $rows['id' . $row[$asso]] = $row;
	        }
	        if (isset($memcache))
	            $memcache->set($memcache_key, $rows, MEMCACHE_COMPRESSED, $expired_time);
	        if ($random == 0)
	            return $rows;
	        else {
	            $new_rows = array();
	            $nb_rows = count($rows);
	            if ($random > $nb_rows)
	                return $rows;

	            $ids = array_rand($rows, $random);
	            for ($i = 0; $i < $random; ++$i)
	                $new_rows[$ids[$i]] = $rows[$ids[$i]];

	            return $new_rows;
	        }
	    }
	}

	function tep_db_rand($rows, $random = 0)
	{
	    if ($random == 0)
	        return $rows;
	    else {
	        $new_rows = array();
	        $nb_rows = count($rows);

	        if ($random > $nb_rows)
	            return $rows;

	        $ids = array_rand($rows, $random);
	        for ($i = 0; $i < $random; ++$i)
	            $new_rows[$ids[$i]] = $rows[$ids[$i]];

	        return $new_rows;
	    }
	}

	function tep_db_fetch_array($db_query)
	{
	    return mysql_fetch_array($db_query, MYSQL_ASSOC);
	}

	function tep_db_num_rows($db_query)
	{
	    return mysql_num_rows($db_query);
	}

	function tep_db_data_seek($db_query, $row_number)
	{
	    return mysql_data_seek($db_query, $row_number);
	}

	function tep_db_insert_id()
	{
	    global $links;
	    return mysql_insert_id($links[0]);
	}

	function tep_db_free_result($db_query)
	{
	    return mysql_free_result($db_query);
	}

	function tep_db_fetch_fields($db_query)
	{
	    return mysql_fetch_field($db_query);
	}

	function tep_db_output($string)
	{
	    return stripslashes($string);
	}

	function tep_db_input($string)
	{
	    return addslashes($string);
	}

	function tep_db_prepare_input($string)
	{
	    if (is_string($string)) {
	        return trim(stripslashes($string));
	    } elseif (is_array($string)) {
	        reset($string);
	        while (list($key, $value) = each($string)) {
	            $string[$key] = tep_db_prepare_input($value);
	        }
	        return $string;
	    } else {
	        return $string;
	    }
	}

	function tep_begin()
	{
	    global $links;
	    $connect = $links[0];

	    mysql_query("START TRANSACTION", $connect);
	}

	function tep_commit()
	{
	    global $links;
	    $connect = $links[0];
	    mysql_query("COMMIT", $connect);
	}

	function tep_rollback()
	{
	    global $links;
	    $connect = $links[0];
	    mysql_query("ROLLBACK", $connect);
	}

	?>
    EOF
    put db_config, "#{release_path}/includes/functions/database.php"

    ms_config = <<-EOF
    <?php 
	  $constants['MAX_DISPLAY_SEARCH_RESULTS'] = '10';
	  $constants['MAX_DISPLAY_SEARCH_RESULTS_PRIVATE'] = '30';
	  $constants['MAX_DISPLAY_ORDER_HISTORY'] = '20';
	  $constants['ENVIRONMENT'] = '';
	  $constants['DIR_WS_COMMON'] = '/Users/gs/site_local/trunk/';
	  $constants['DIR_FS_DOCUMENT_ROOT']= '/Users/gs/site_local/trunk/';
	  $constants['ADMINIP']= '192.168.100.254';
	  $constants['DB_SERVER']= '192.168.100.204';
	  $constants['DB_SERVER_RO']= '192.168.100.205';
	  $constants['DB_REDIRECT_ALL_RO'] = 'true';
	  $constants['DB_SERVER_USERNAME']= 'webuser';
	  $constants['DB_SERVER_PASSWORD']= '3gallfir-';
	  $constants['DB_DATABASE']= 'dvdpost_be_prod';
	  $constants['USE_PCONNECT']= 'false';  
	  $constants['STORE_SESSIONS']= '';
	?>
    EOF
    put ms_config, "#{release_path}/configure/configure_machine_specific.php"

    configure_file_config = <<-EOF
    <?php  
      define('SITE_ID',$_SERVER["HTTP_HOST"]);
      include('configure_machine_specific.php');
	  $constants['ENTITY_ID']= '1';
	  $constants['GROUP_ID']= '1';
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
	  $constants['OGONE_FORM_ACTION']= 'https://secure.ogone.com/ncol/prod/orderstandard.asp';
	  $constants['OGONE_PSPID']= 'dvdpost';
	  $constants['MODULE_PAYMENT_OGONE_SHA_STRING']= 'KILLBILL';
	  $constants['WHOSONLINE']= 0;
	  $ab['step1']= array(2,2);
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
	  $constants['DIR_FS_CATALOG']= $constants['DIR_FS_DOCUMENT_ROOT'] . $constants['DIR_WS_CATALOG'];
	  $constants['DIR_FS_DOWNLOAD']= $constants['DIR_FS_CATALOG'] . 'download/';
	  $constants['DIR_FS_DOWNLOAD_PUBLIC']= $constants['DIR_FS_CATALOG']. 'pub/';
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
	  $constants['IMAGES_BOXES_CORNER_RIGHT_LEFT'] = $constants['DIR_WS_IMAGES'] . 'infobox/corner_right_left.gif';
	  $constants['IMAGES_BOXES_CORNER_RIGHT'] = $constants['DIR_WS_IMAGES'] . 'infobox/corner_right.gif';
	  $constants['IMAGES_BOXES_CORNER_LEFT'] = $constants['DIR_WS_IMAGES'] . 'infobox/corner_left.gif';
	  $constants['SPHINX_HOST']= 'pekin';
	  $constants['SERVER_MEMCACHE_HOST']= '192.168.100.204';
	  $constants['SERVER_MEMCACHE_PORT']= '11211';
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
      if (file_exists($constants['DIR_FS_DOCUMENT_ROOT'] . '/configure/configure' . '_' . SITE_ID . '.php')) include('configure' . '_' . SITE_ID . '.php');
    ?>
    EOF
    put configure_file_config, "#{release_path}/configure/configure.php"

  end
end
