<?php


require('configure/application_top.php');

$current_page_name = 'default.php';

switch(WEB_SITE_ID){
 //case 3: 	
 //	tep_redirect(tep_href_link('catalog.php', '', 'SSL'));
 //	break;
 
 //case 4:
 //	tep_redirect(tep_href_link('catalog.php', '', 'SSL'));
 //	break;
 case 14:
 	tep_redirect(tep_href_link('dvdpostmap.php', '', 'SSL'));
 	break;
 
 case 29:
 	tep_redirect(tep_href_link('login.php', '', 'SSL'));
 	break;
 
 default :
 	
}






include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

$page_body_to_include = $current_page_name;
if($_SERVER['SERVER_NAME'] == 'ptg.dvdpost.be' || $_SERVER['SERVER_NAME'] == 'ptgil.dvdpost.be' || $_SERVER['SERVER_NAME'] == 'groupon.dvdpost.be' || $_SERVER['SERVER_NAME'] == 'cinefriends.dvdpost.be' || $_SERVER['SERVER_NAME'] == 'tryus.dvdpost.be' || $_SERVER['SERVER_NAME'] == 'tryusagain.dvdpost.be'|| $_SERVER['SERVER_NAME'] == 'clubdusoir.dvdpost.be' || $_SERVER['SERVER_NAME'] == 'ipad.dvdpost.be' || $_SERVER['SERVER_NAME'] == 'cami.dvdpost.be' || $_SERVER['SERVER_NAME'] == 'nina.dvdpost.be' || $_SERVER['SERVER_NAME'] == 'shedeals.dvdpost.be' || $_SERVER['SERVER_NAME'] == 'fda.dvdpost.be' || $_SERVER['SERVER_NAME'] == 'flair.dvdpost.be' )
{
	
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/jacob_canvas_light.php',0,$jacob));	
}
else if($_SERVER['SERVER_NAME'] == 'paypal.dvdpost.be' || $_SERVER['SERVER_NAME'] == 'jason.dvdpost.be' || $_SERVER['SERVER_NAME'] == 'noel2012.dvdpost.be')
{
  $nav = true;
  include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/jacob_canvas_step_2010.php',0,$jacob));
}
else
{
	include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_2009.php',0,$jacob));
	
}


require('configure/application_bottom.php');

?>
