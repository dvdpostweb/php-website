<?php
    $strhttp_user_agent = ${"HTTP_USER_AGENT"};
    $stat_remote_addr = ${"REMOTE_ADDR"};
    $stat_http_referer= ${"HTTP_REFERER"};
    $stat_sessionid= tep_session_id($sessid = '');	
    $stat_customerid = $customer_id;
    $stat_language = $language;	  
    $stat_page = $GLOBALS['PHP_SELF'] . "?" . $GLOBALS['QUERY_STRING'];

    
    if (strlen($HTTP_GET_VARS['partner'])>0){
	    //tep_db_query("insert into stat (stat_http_user_agent ,stat_remote_addr , stat_page , stat_date , stat_http_referer , stat_sessionid, stat_customerid, stat_language, site, partner) values ('" . $strhttp_user_agent . "', '" . $stat_remote_addr . "', '" . $stat_page . "', now(), '" . $stat_http_referer . "', '" . $stat_sessionid . "', '" . $stat_customerid . "', '" . $stat_language . "', '" . WEB_SITE_ID . "', '" . $HTTP_GET_VARS['partner'] . "')");
	}else{
	    //tep_db_query("insert into stat (stat_http_user_agent ,stat_remote_addr , stat_page , stat_date , stat_http_referer , stat_sessionid, stat_customerid, stat_language, site) values ('" . $strhttp_user_agent . "', '" . $stat_remote_addr . "', '" . $stat_page . "', now(), '" . $stat_http_referer . "', '" . $stat_sessionid . "', '" . $stat_customerid . "', '" . $stat_language . "', '" . WEB_SITE_ID . "')");
	}
    ?>
