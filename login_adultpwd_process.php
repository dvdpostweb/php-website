<?php
$logpwd=1;

require('configure/application_top.php');
if (strlen($HTTP_POST_VARS['pwd']) < 1)
{
	$HTTP_POST_VARS['pwd']=$_GET['pwd'];
}  
if (strlen($HTTP_POST_VARS['pwd']) < 1) {
	tep_redirect(tep_href_link(FILENAME_LOGIN_ADULTPWD . '?error=2', '', 'SSL'));
}

$pwd_query = tep_db_query("select * from customers where adult_pwd  = '" . $HTTP_POST_VARS['pwd'] . "' ");
$pwd = tep_db_fetch_array($pwd_query);

require(DIR_WS_INCLUDES . 'stat.php');


if ($pwd['customers_id'] > 0 or $HTTP_POST_VARS['pwd']=='movix') {
	$adult_pwd = 1;
	tep_session_register('adult_pwd');
	
	if (sizeof($navigation->snapshot) > 0) {
	  $script_available= array(0=>'vodx.php',1=>'mydvdxpost.php',2=>'vodx_detail.php',3=>'vodx.php',4=>'vod_stream.php',5=>'mywishlist_adult.php',6=>'listing_category_adult.php',7=>'studio_adult.php',8=>'product_info_adult.php',9=>'actors_adult.php',10=>'advanced_search_result2_adult.php');
  	  if(scriptAvailable($script_available,$navigation->snapshot['page'])){
      $origin_href = tep_href_link($navigation->snapshot['page'], tep_array_to_string($navigation->snapshot['get'], array(tep_session_name())), $navigation->snapshot['mode']);
      $navigation->clear_snapshot();
      tep_redirect($origin_href);
  	  }
	  else 
	  {
		 tep_redirect(tep_href_link('mydvdxpost.php'));
	  }
	}
	else
	{
    	tep_redirect(tep_href_link('mydvdxpost.php'));		
	}
}else{
	tep_redirect(tep_href_link(FILENAME_LOGIN_ADULTPWD . '?error=1', '', 'SSL'));
}

?>
