<?php
//require('../configure/application_top.php');
require('../configure/configure.php');

foreach ($constants as $key => $value) {
  define ($key,$value);
}
require(DIR_WS_FUNCTIONS . 'sessions.php');
require(DIR_WS_FUNCTIONS . 'general.php');
require(DIR_WS_FUNCTIONS . 'database.php');
require(DIR_WS_CLASSES . 'class.phpmailer.php');

tep_db_connect() or die('Unable to connect to database server!');

$customer_id = $_GET['customer_id'];
$sql= 'select c.*,customers_lastname as customers_name from customers c where customers_id = '.$customer_id;
$query = tep_db_query($sql);			
$customer_value = tep_db_fetch_array($query);
$languages_id = $customer_value['customers_language'];
define('SITE_HOST_ID',1);
define('WEBSITE',1);
require(DIR_WS_INCLUDES . 'translation_root.php');


$sql2='select pd.products_image_big as products_image, pd.*,p.imdb_id 
from products p 
join products_description pd on pd.products_id = p.products_id and language_id = 1
where  p.products_id =104426';
$data_query = tep_db_query($sql2);
$data = tep_db_fetch_array($data_query);

	$sql ='select * from dvdpost_test.mail_messages where mail_messages_id=582 AND language_id='.$languages_id;
	$customers_query = tep_db_query($sql);
	$i=1;
	$customers = tep_db_fetch_array($customers_query);
	
	


	$variable=array();
	$variable['vod_title_1'] = 'test 1';
	$variable['vod_title_2'] = 'test 2';
	$variable['vod_title_3'] = 'test 1';
	$variable['vod_title_4'] = 'test 1';
	$variable['vod_title_5'] = 'test 1';
	$variable['vod_title_6'] = 'test 6';
	$variable['vod_title_7'] = 'test 1';

	$variable['vod_id_1'] = '51';
	$variable['vod_id_2'] = '52';
	$variable['vod_id_3'] = '53';
	$variable['vod_id_4'] = '54';
	$variable['vod_id_5'] = '55';
	$variable['vod_id_6'] = '56';
	$variable['vod_id_7'] = '57';
	$variable['vod_imdb_id_1'] = '51';
	$variable['vod_imdb_id_2'] = '52';
	$variable['vod_imdb_id_3'] = '53';
	$variable['vod_imdb_id_4'] = '54';
	$variable['vod_imdb_id_5'] = '55';
	$variable['vod_imdb_id_6'] = '56';
	$variable['vod_imdb_id_7'] = '57';
	$variable['vod_image_1'] = 'dvd/roadtoperditionbfr.jpg';
	$variable['vod_image_2'] = 'dvd/roadtoperditionbfr.jpg';
	$variable['vod_image_3'] = 'dvd/roadtoperditionbfr.jpg';
	$variable['vod_image_4'] = 'dvd/roadtoperditionbfr.jpg';
	$variable['vod_image_5'] = 'dvd/roadtoperditionbfr.jpg';
	$variable['vod_image_6'] = 'dvd/roadtoperditionbfr.jpg';
	$variable['vod_image_7'] = 'dvd/roadtoperditionbfr.jpg';
	
	$variable['vod_rating_star_1_1'] = 'on';
	$variable['vod_rating_star_1_2'] = 'on';
	$variable['vod_rating_star_1_3'] = 'on';
	$variable['vod_rating_star_1_4'] = 'off';
	$variable['vod_rating_star_1_5'] = 'off';
                           
	$variable['vod_rating_star_2_1'] = 'on';
	$variable['vod_rating_star_2_2'] = 'on';
	$variable['vod_rating_star_2_3'] = 'on';
	$variable['vod_rating_star_2_4'] = 'off';
	$variable['vod_rating_star_2_5'] = 'off';
                           
	$variable['vod_rating_star_3_1'] = 'on';
	$variable['vod_rating_star_3_2'] = 'on';
	$variable['vod_rating_star_3_3'] = 'on';
	$variable['vod_rating_star_3_4'] = 'off';
	$variable['vod_rating_star_3_5'] = 'off';
                           
	$variable['vod_rating_star_4_1'] = 'on';
	$variable['vod_rating_star_4_2'] = 'on';
	$variable['vod_rating_star_4_3'] = 'on';
	$variable['vod_rating_star_4_4'] = 'off';
	$variable['vod_rating_star_4_5'] = 'off';
                           
	$variable['vod_rating_star_5_1'] = 'on';
	$variable['vod_rating_star_5_2'] = 'on';
	$variable['vod_rating_star_5_3'] = 'on';
	$variable['vod_rating_star_5_4'] = 'off';
	$variable['vod_rating_star_5_5'] = 'off';
                           
	$variable['vod_rating_star_6_1'] = 'on';
	$variable['vod_rating_star_6_2'] = 'on';
	$variable['vod_rating_star_6_3'] = 'on';
	$variable['vod_rating_star_6_4'] = 'off';
	$variable['vod_rating_star_6_5'] = 'off';
                           
	$variable['vod_rating_star_7_1'] = 'on';
	$variable['vod_rating_star_7_2'] = 'on';
	$variable['vod_rating_star_7_3'] = 'on';
	$variable['vod_rating_star_7_4'] = 'off';
	$variable['vod_rating_star_7_5'] = 'off';

	$variable['recom_title_1'] = 'test 1';
	$variable['recom_title_2'] = 'test 2';
	$variable['recom_title_3'] = 'test 1';
	$variable['recom_title_4'] = 'test 1';
	$variable['recom_title_5'] = 'test 1';
	$variable['recom_title_6'] = 'test 6';
	$variable['recom_title_7'] = 'test 1';

	$variable['recom_id_1'] = '51';
	$variable['recom_id_2'] = '52';
	$variable['recom_id_3'] = '53';
	$variable['recom_id_4'] = '54';
	$variable['recom_id_5'] = '55';
	$variable['recom_id_6'] = '56';
	$variable['recom_id_7'] = '57';
	$variable['recom_imdb_id_1'] = '51';
	$variable['recom_imdb_id_2'] = '52';
	$variable['recom_imdb_id_3'] = '53';
	$variable['recom_imdb_id_4'] = '54';
	$variable['recom_imdb_id_5'] = '55';
	$variable['recom_imdb_id_6'] = '56';
	$variable['recom_imdb_id_7'] = '57';
	$variable['recom_image_1'] = 'dvd/roadtoperditionbfr.jpg';
	$variable['recom_image_2'] = 'dvd/roadtoperditionbfr.jpg';
	$variable['recom_image_3'] = 'dvd/roadtoperditionbfr.jpg';
	$variable['recom_image_4'] = 'dvd/roadtoperditionbfr.jpg';
	$variable['recom_image_5'] = 'dvd/roadtoperditionbfr.jpg';
	$variable['recom_image_6'] = 'dvd/roadtoperditionbfr.jpg';
	$variable['recom_image_7'] = 'dvd/roadtoperditionbfr.jpg';
	
	$variable['recom_rating_star_1_1'] = 'on';
	$variable['recom_rating_star_1_2'] = 'on';
	$variable['recom_rating_star_1_3'] = 'on';
	$variable['recom_rating_star_1_4'] = 'off';
	$variable['recom_rating_star_1_5'] = 'off';
                        
	$variable['recom_rating_star_2_1'] = 'on';
	$variable['recom_rating_star_2_2'] = 'on';
	$variable['recom_rating_star_2_3'] = 'on';
	$variable['recom_rating_star_2_4'] = 'off';
	$variable['recom_rating_star_2_5'] = 'off';
                        
	$variable['recom_rating_star_3_1'] = 'on';
	$variable['recom_rating_star_3_2'] = 'on';
	$variable['recom_rating_star_3_3'] = 'on';
	$variable['recom_rating_star_3_4'] = 'off';
	$variable['recom_rating_star_3_5'] = 'off';
                        
	$variable['recom_rating_star_4_1'] = 'on';
	$variable['recom_rating_star_4_2'] = 'on';
	$variable['recom_rating_star_4_3'] = 'on';
	$variable['recom_rating_star_4_4'] = 'off';
	$variable['recom_rating_star_4_5'] = 'off';
                        
	$variable['recom_rating_star_5_1'] = 'on';
	$variable['recom_rating_star_5_2'] = 'on';
	$variable['recom_rating_star_5_3'] = 'on';
	$variable['recom_rating_star_5_4'] = 'off';
	$variable['recom_rating_star_5_5'] = 'off';
                        
	$variable['recom_rating_star_6_1'] = 'on';
	$variable['recom_rating_star_6_2'] = 'on';
	$variable['recom_rating_star_6_3'] = 'on';
	$variable['recom_rating_star_6_4'] = 'off';
	$variable['recom_rating_star_6_5'] = 'off';
                        
	$variable['recom_rating_star_7_1'] = 'on';
	$variable['recom_rating_star_7_2'] = 'on';
	$variable['recom_rating_star_7_3'] = 'on';
	$variable['recom_rating_star_7_4'] = 'off';
	$variable['recom_rating_star_7_5'] = 'off';
		
	$variable['product_id']= "51";
	$variable['director_id']= "51";
	$variable['director_name']= "west craven";
	$variable['list_actors']= "tous";
	$variable['product_image']= "dvd/roadtoperditionbfr.jpg";
	$variable['product_description']= "cool";
	$variable['product_year']= "cool";
	$variable['product_title']= "cool";
	$variable['rating_star_1'] = 'on';
	$variable['rating_star_2'] = 'on';
	$variable['rating_star_3'] = 'on';
	$variable['rating_star_4'] = 'off';
	$variable['rating_star_5'] = 'off';
	$variable['url_kind']='';
	$variable['images_path']='images';
	$variable['director_type']='';
	$variable['recom_visible_1']='';
	$variable['recom_visible_2']='';
	$variable['recom_visible_3']='';
	$variable['recom_visible_4']='';
	$variable['recom_visible_5']='';
	$variable['recom_visible_6']='';
	$variable['recom_visible_7']='';
	$variable['recom_kind_1']='';
	$variable['recom_kind_2']='';
	$variable['recom_kind_3']='';
	$variable['recom_kind_4']='';
	$variable['recom_kind_5']='';
	$variable['recom_kind_6']='';
	$variable['recom_kind_7']='';

	$variable['recom_visible']='block';
	$variable['vod_url_kind']='';
	$variable['vod_list']=110;
	$variable['vod_images_path']='images';
	
	

	$variable['customers_name'] = $customer_value['customers_name'];
	$variable['date'] = '2011';
	$variable['gender_simple'] = 'cher';
	$variable['mail_messages_sent_history_id'] = 0;
	
	
	$formating = format($customers['messages_html'],$variable);
	echo $formating['text'];
	#var_dump(tep_mail('gs@dvdpost.be','gs@dvdpost.be','mail nl last chance',$mail,'gs@dvdpost.be','gs@dvdpost.be'));
	#$sql_ti = 'insert into message_tickets values (null, 55,566,1,"'.addslashes($formating['dico']).'",0,now(),now())';
	#echo $sql_ti;
	tep_db_query($sql_ti);
?>
<script type="text/javascript" src="https://getfirebug.com/firebug-lite.js"></script>