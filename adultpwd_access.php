<?php
$logpwd=1;

require('configure/application_top.php');
  
	setcookie('adult_pwd_public', 1, 0, substr(DIR_WS_CATALOG, 0, -1));
	$link=$_POST['next'];
	
	
	if(!empty($link))
		tep_redirect($link);	
	else
	{
    	tep_redirect(tep_href_link('catalog_adult.php'));		
	}


?>
