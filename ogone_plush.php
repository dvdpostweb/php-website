<? 
if($HTTP_GET_VARS['test'] == '1' )
{
  mysql_select_db('plush_staging');  
}
else
{
  mysql_select_db('plush_production');  
}
$sql="select * from ogone_check where orderid = '" . $HTTP_GET_VARS['orderID'] . "' ";
$ogone_check_query = tep_db_query($sql,'db',true);
$ogone_check = tep_db_fetch_array($ogone_check_query);
$customers_query = tep_db_query("select * from customers where customers_id = '" . $ogone_check['customers_id'] . "' ",'db',true);
$customers = tep_db_fetch_array($customers_query);
$products_id = $customers['customers_abo_type'];
$products_abo_query = tep_db_query("select * from products_abo where products_id = " . $products_id);
$products_abo = tep_db_fetch_array($products_abo_query);
$languages_id = $customers['customers_language'];
$update = "update customers set customers_abo_payment_method = 1, ogone_owner='".$HTTP_GET_VARS['CN']."' , ogone_exp_date ='" . $HTTP_GET_VARS['ED'] . "' , ogone_card_no='" . $HTTP_GET_VARS['CARDNO'] . "' , ogone_card_type='" . $HTTP_GET_VARS['BRAND'] . "' where customers_id = '" . $ogone_check['customers_id'] . "' ";
tep_db_query($update);
switch($languages_id)
{
	case 2:
		$lang='nl';
		break;
	case 3:
		$lang='en';
		break;
	default:
		$lang='fr';
}
$sql_cond = "select * from translations where `key` = 'info.index.conditions.info' and locale ='".$lang."'";
$query_cond=tep_db_query($sql_cond,'db_link',true);
$cond=tep_db_fetch_array($query_cond);
$conditions = $cond['value'];
switch ($ogone_check['context']){
case 'credit_card':
case 'credit_card_modification':
  $sql_user='SELECT *
	FROM `products_abo` p
	JOIN customers c ON c.customers_abo_type = p.products_id
	LEFT JOIN customers_abo_payment_method ca ON c.customers_abo_payment_method = ca.customers_abo_payment_method_id
	WHERE customers_id ='.$ogone_check['customers_id'];
	$query_user=tep_db_query($sql_user,'db_link',true);
	$value_user=tep_db_fetch_array($query_user);
	if($ogone_check['context'] == 'credit_card_modification')
	{
	  $action = 18;
	}
	else
	{
	  $action = 16;
	}
  $sql_abo='insert into abo(customerid,Action,Date,product_id,payment_method,comment,site) values ('.$ogone_check['customers_id'].','.$action.',now(),'.$value_user['customers_abo_type'].',"OGONE","'.$ogone_check['context'].'",'.WEB_SITE_ID.')';
	tep_db_query($sql_abo);
	
	#$mail_id=430;
	#$sql='SELECT * FROM mail_messages m where mail_messages_id ='.$mail_id.' and language_id = '.$languages_id;
	#$mail_query = tep_db_query($sql);
	#$mail_values = tep_db_fetch_array($mail_query);
	#$email_text = $mail_values['messages_html'];
	#//	$email_text = str_replace('µµµmail_messages_sent_history_idµµµ', $mail_id, $email_text);
  #
	#$name=ucfirst($value_user['customers_firstname']).' '.ucfirst($value_user['customers_lastname']);
	#$email_text=str_replace('$$$name$$$',$name,$email_text);
	#$email_text = str_replace('$$$site_link$$$',  'http://'.$host , $email_text);

	
	#tep_mail($email, $email, $mail_values['messages_title'], $email_text, 'dvdpost@dvdpost.be', 'dvdpost@dvdpost.be');
	header("location: http://www.plush.be/".$lang."/customers/".$ogone_check['customers_id']."/payment_methods?type=".$ogone_check['context']."_finish");
	break;
case 'tvod':
  $time = 172800;
  $product_sql = 'select * from products where imdb_id = '.$ogone_check['products_id'];
  $query_product=tep_db_query($product_sql,'db_link',true);
	$product=tep_db_fetch_array($query_product);
	$stream_sql = "select * from streaming_products where imdb_id = ".$ogone_check['products_id']." and available = 1 and status = 'online_test_ok' order by id desc limit 1";
	$query_stream = tep_db_query($stream_sql,'db_link',true);
	$streaming=tep_db_fetch_array($query_stream);
	$filename = $streaming['filename'];
  $url = "http://wesecure.alphanetworks.be/Webservice?method=createToken&key=acac0d12ed9061049880bf68f20519e65aa8ecb7&filename=".$filename."&lifetime=".$time."&simultIp=1&test=true";
  $ch = curl_init();
  
  
  curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_FAILONERROR,0);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 15);
	curl_setopt($ch, CURLOPT_USERPWD, 'dvdpost:sup3rnov4$$');
    
	/*curl_setopt($process, CURLOPT_HTTPHEADER, array('Content-Type: application/xml'));*/
  $return = curl_exec($ch);
  curl_close($ch);
  if (!($return == false || $return == 'NULL' || empty($return) || is_null($return) ))
  {
    $xml = simplexml_load_string($return) or die('die');
    $token_string = $xml->xpath('//createToken/response');
    $status = $xml->xpath('//createToken/status');
    if ($status[0] == 'success')
    {
      tep_begin();
      $price = intval($ogone_check['amount'])/100;
	    $sql_token = "insert into tokens (token,created_at, updated_at, customer_id, imdb_id, is_ppv, ppv_price,country, kind) values ('".$token_string[0]."', NOW(), NOW(), ".$ogone_check['customers_id'].", ".$ogone_check['products_id'].",1, ".$price.", 'BE', 'TVOD_ONLY')";
  	  $i1 = tep_db_query($sql_token);
      $sql_action = "insert into abo (Customerid, Action , Date , product_id, payment_method) values ('" . $ogone_check['customers_id'] . "', 37 ,now(), 6 , 'OGONE')";
  	  $i2 = tep_db_query($sql_action); 
  	  $abo_id=tep_db_insert_id();
      
  	  $sql_insert_ogone="insert into payment (date_added,payment_method, abo_id,customers_id,amount,payment_status,last_modified) values(now(),1,$abo_id,".$ogone_check['customers_id'].", ".$price.",2,now());";
  	  $i3 = tep_db_query($sql_insert_ogone);
  	  if($i1 == true && $i2 == true && $i3 == true )
  	  {
  	    tep_commit();  
  	  }
  	  else
  	  {
  	    tep_mail('gs@dvdpost.be', 'gs@dvdpost.be', 'tvod only token error rollback', $url.'.'.$i1.'.'.$i2.'.'.$i3.'.'.$sql_token.'.'.$sql_action.'.'.$sql_insert_ogone.'.'.serialize($token_string).'.'.$ogone_check['customers_id'].'.'.$ogone_check['products_id'], 'dvdpost@dvdpost.be', 'dvdpost@dvdpost.be');
  	    tep_rollback();  
	    }
    }
    else
    {
      tep_mail('gs@dvdpost.be', 'gs@dvdpost.be', 'tvod only token error', $url.'.'.serialize($token_string).'.'.$ogone_check['customers_id'].'.'.$ogone_check['products_id'], 'dvdpost@dvdpost.be', 'dvdpost@dvdpost.be');
    }
  }
  else
  {
    tep_mail('gs@dvdpost.be', 'gs@dvdpost.be', 'tvod only token 404 wrong url', $url.'.'.$ogone_check['customers_id'].'.'.$ogone_check['products_id'], 'dvdpost@dvdpost.be', 'dvdpost@dvdpost.be');
  }
break;
case 'new_discount':
	if($customers['activation_discount_code_id'] > 0)
	{		
		$discount_query = tep_db_query("SELECT `discount_code`.* FROM `discount_code` WHERE `discount_code`.`discount_code_id` = ".$customers['activation_discount_code_id']." LIMIT 1",'db',true);
		$promo = tep_db_fetch_array($discount_query);

	  $action = 6;
    $sql_du = "insert into discount_use  (discount_code_id , discount_use_date , customers_id) values ('" . $customers['activation_discount_code_id']  . "', now(), '" . $ogone_check['customers_id'] . "' )";
		tep_db_query($sql_du);
		switch ($promo['discount_abo_validityto_type']){
			case 1:
					tep_db_query("update customers set customers_abo_validityto  = DATE_ADD(now(), INTERVAL " . $promo['discount_abo_validityto_value'] . " DAY)  where customers_id = '" . $ogone_check['customers_id'] . "'");		
			break;
			case 2:
					tep_db_query("update customers set customers_abo_validityto  = DATE_ADD(now(), INTERVAL " . $promo['discount_abo_validityto_value'] . " MONTH)  where customers_id = '" . $ogone_check['customers_id'] . "'");		
			break;
			case 3:
					tep_db_query("update customers set customers_abo_validityto  = DATE_ADD(now(), INTERVAL " . $promo['discount_abo_validityto_value'] . " YEAR)  where customers_id = '" . $ogone_check['customers_id'] . "'");		
			break;		
		}

  	$promo_text = discount_text($promo, $lang);
	  $auto_stop = $promo['abo_auto_stop_next_reconduction'];
	  if ($promo['discount_recurring_nbr_of_month'] > 0 ){
			tep_db_query("update customers set customers_abo_discount_recurring_to_date  = DATE_ADD(now(), INTERVAL " . $promo['discount_recurring_nbr_of_month'] . " MONTH)  where customers_id = '" . $ogone_check['customers_id'] . "'");		
			tep_db_query("update customers set customers_abo_discount_recurring_to_date  = DATE_ADD(customers_abo_discount_recurring_to_date , INTERVAL 1 DAY)  where customers_id = '" . $ogone_check['customers_id'] . "'");		
		}
	}	
	else
	{  
		$action = 1;
	  tep_db_query("update customers set customers_abo_validityto  = DATE_ADD(now(), INTERVAL 1 MONTH)  where customers_id = '" . $ogone_check['customers_id'] . "'");		
	  $auto_stop = 0;
		$promo_text = '';
	}
	$price=$products_abo['price'];
	if($action == 1)
	{
		$final_price = $price;
	}
	else
	{
		$final_price=abo_price($promo['discount_type'],$customers['activation_discount_code_id'],$promo['discount_value'],$price);	
	}
	$sql_action = "insert into abo (Customerid, Action , Date , product_id, payment_method, code_id) values ('" . $ogone_check['customers_id'] . "', ".$action." ,now(), '" . $products_id. "' , 'OGONE', ".$customers['activation_discount_code_id'].")";
	tep_db_query($sql_action); 
	$abo_id=tep_db_insert_id();
	
	if($final_price > 0)
	{
		$abo_action = 7;
		$sql_insert_ogone="insert into payment (date_added,payment_method, abo_id,customers_id,amount,payment_status,last_modified) values(now(),1,$abo_id,".$ogone_check['customers_id'].",$final_price,2,now());";
		tep_db_query($sql_insert_ogone);
		
	}
	else
  {	
		$abo_action = 17;
	}


break;
case 'new_activation':
  $activation_sql = "SELECT `activation_code`.* FROM `activation_code` WHERE `activation_code`.`activation_id` = ".$customers['activation_discount_code_id']." LIMIT 1";
  $activation_query = tep_db_query($activation_sql);
	$promo = tep_db_fetch_array($activation_query);

  $action = 8;
	tep_db_query("insert into abo (Customerid, Action , Date , product_id, payment_method, code_id) values ('" . $ogone_check['customers_id'] . "', ".$action." ,now(), '" . $products_id. "' , 'OGONE', ".$customers['activation_discount_code_id'].") "); 
	$abo_id=tep_db_insert_id();
	
	$promo_text = activation_text($promo, $lang);
  $price=$products_abo['price'];
  $final_price=abo_price($promo['activation_type'],$customers['activation_discount_code_id'],$promo['activation_value'],$price);
  if($final_price > 0)
	{
		$abo_action = 7;
		$sql_insert_ogone="insert into payment (date_added,payment_method, abo_id,customers_id,amount,payment_status,last_modified) values(now(),1,$abo_id,".$ogone_check['customers_id'].",$final_price,2,now());";
		tep_db_query($sql_insert_ogone);
		
	}
	else
  {	
		$abo_action = 17;
	}
	switch ($promo['validity_type']){
	    case 1: //day
			tep_db_query("update customers set customers_abo_validityto   = DATE_ADD(now(), INTERVAL '" . $promo['validity_value'] . "' DAY)  where customers_id = '" . $ogone_check['customers_id'] . "'");
	    break;
	    case 2: //month
			tep_db_query("update customers set customers_abo_validityto   = DATE_ADD(now(), INTERVAL '" . $promo['validity_value'] . "' MONTH)  where customers_id = '" . $ogone_check['customers_id'] . "'");
	    break;
	    case 3: //year
			tep_db_query("update customers set customers_abo_validityto   = DATE_ADD(now(), INTERVAL '" . $promo['validity_value'] . "' YEAR)  where customers_id = '" . $ogone_check['customers_id'] . "'");
	    break;
	}
	tep_db_query("update activation_code set activation_date  = now() , customers_id = '" . $ogone_check['customers_id'] . "' where activation_id  = '" . $promo['activation_id'] . "' ");
	
  $auto_stop = $promo['abo_auto_stop_next_reconduction'];
	//to do abo action
break;
}
if($ogone_check['context'] == 'new_discount' || $ogone_check['context'] == 'new_activation')
{
		tep_db_query("insert into abo (Customerid, Action , Date , product_id, payment_method) values ('" . $ogone_check['customers_id'] . "',".$abo_action." ,now(), '" . $products_id. "' , 'OGONE') "); 
    
    tep_db_query("update customers set customers_abo  = 1 , customers_registration_step=100 , customers_abo_auto_stop_next_reconduction = ".$auto_stop." where customers_id = '" . $ogone_check['customers_id'] . "'");
		$data= array();
		$data['customers_name'] = $customers['customers_firstname'] . ' ' . $customers['customers_lastname'];
		$data['email'] = $customers['email'];
		$data['promotion'] = $promo_text;
		$data['final_price'] = $final_price;
		$data['subscription'] = $products_abo['description'];
    $data['root_url'] = 'http://www.plush.be';
    $data['abo_price'] = $price;
    $data['general_conditions'] = $conditions;
		/*	
			if($final_price>0)
			{
				$formating['text'] = str_replace('<tr id="promo">', '<tr id="promo" style="display:none">',$formating['text']);
			}
		*/
		
		mail_message($ogone_check['customers_id'], 625, $data, 'plush' );	
}
?>
