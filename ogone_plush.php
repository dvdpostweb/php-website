<? 
mysql_select_db('plush_production');
$sql="select * from ogone_check where orderid = '" . $HTTP_GET_VARS['orderID'] . "' ";
$ogone_check_query = tep_db_query($sql,'db',true);
$ogone_check = tep_db_fetch_array($ogone_check_query);
$customers_query = tep_db_query("select * from customers where customers_id = '" . $ogone_check['customers_id'] . "' ",'db',true);
$customers = tep_db_fetch_array($customers_query);
$products_id = $customers['customers_abo_type'];
$products_abo_query = tep_db_query("select * from products_abo where products_id = " . $products_id);
$products_abo = tep_db_fetch_array($products_abo_query);


$update = "update customers set customers_abo_payment_method = 1, ogone_owner='".$HTTP_GET_VARS['CN']."' , ogone_exp_date ='" . $HTTP_GET_VARS['ED'] . "' , ogone_card_no='" . $HTTP_GET_VARS['CARDNO'] . "' , ogone_card_type='" . $HTTP_GET_VARS['BRAND'] . "' where customers_id = '" . $ogone_check['customers_id'] . "' ";
tep_db_query($update);

switch ($ogone_check['context']){
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

  	$promo_text = discount_text($promo, $lang_short);
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
	$price=$products_abo['products_price'];
	if($action == 1)
	{
		$final_price = $price;
	}
	else
	{
		$final_price=abo_price($promo['discount_type'],$customers['activation_discount_code_id'],$promo['discount_value'],$price);	
	}
	$sql_action = "insert into abo (Customerid, Action , Date , product_id, payment_method) values ('" . $ogone_check['customers_id'] . "', ".$action." ,now(), '" . $products_id. "' , '1')";
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
  $activation_query = "SELECT `activation_code`.* FROM `activation_code` WHERE `activation_code`.`activation_id` = ".$customers['activation_discount_code_id']." LIMIT 1";
	$promo = tep_db_fetch_array($activation_query);

  $action = 8;
	tep_db_query("insert into abo (Customerid, Action , Date , product_id, payment_method) values ('" . $ogone_check['customers_id'] . "', ".$action." ,now(), '" . $products_id. "' , '1') "); 
	$abo_id=tep_db_insert_id();
	$promo_text = activation_text($promo, $lang_short);

  $final_price = 0;
	switch ($code['validity_type']){
	    case 1: //day
			tep_db_query("update customers set customers_abo_validityto   = DATE_ADD(now(), INTERVAL '" . $promo['validity_value'] . "' DAY)  where customers_id = '" . $ogone_check['customers_id'] . "'");
	    break;
	    case 2: //month
			tep_db_query("update customers set customers_abo_validityto   = DATE_ADD(now(), INTERVAL '" . $promo['validity_value'] . "' MONTH)  where customers_id = '" . $ogone_check['customers_id'] . "'");
	    break;
	    case 3: //year
			tep_db_query("update customers set customers_abo_validityto   = DATE_ADD(now(), INTERVAL '" . $code['validity_value'] . "' YEAR)  where customers_id = '" . $ogone_check['customers_id'] . "'");
	    break;
	}
	tep_db_query("update activation_code set activation_date  = now() , customers_id = '" . $ogone_check['customers_id'] . "' where activation_id  = '" . $promo['activation_id'] . "' ");
	
  $auto_stop = $promo['abo_auto_stop_next_reconduction'];
	$abo_action = 17;
	//to do abo action
break;
}
		tep_db_query("insert into abo (Customerid, Action , Date , product_id, payment_method) values ('" . $ogone_check['customers_id'] . "',".$abo_action." ,now(), '" . $products_id. "' , '1') "); 
                $sam_sql = 'SELECT COUNT(*)nb FROM `samsung_codes` WHERE `samsung_codes`.`customer_id` = '.$ogone_check['customers_id'].' AND (validated_at is null)';
                $sam_query = tep_db_query($sam_sql);
		$sam = tep_db_fetch_array($sam_query);
		if($sam['nb'] >= 1)
		{
		  $cust_abo == 0;
		}
		else
		{
		  $cust_abo == 1;
		}
		tep_db_query("update customers set customers_abo  = ".$cust_abo." , customers_registration_step=100 , customers_abo_auto_stop_next_reconduction = ".$auto_stop." where customers_id = '" . $ogone_check['customers_id'] . "'");
		$data= array();
		$data['customers_name'] = $customers['customers_firstname'] . ' ' . $customers['customers_lastname'];
		$data['email'] = $customers['email'];
		$data['promotion'] = $promo_text;
		$data['final_price'] = $final_price;
		$data['subscription'] = $products_abo['description'];
     $data['root_url'] = 'http://www.plush.be';
		/*	
			if($final_price>0)
			{
				$formating['text'] = str_replace('<tr id="promo">', '<tr id="promo" style="display:none">',$formating['text']);
			}
		*/
		
		mail_message($ogone_check['customers_id'], 606, $data, 'plush' );	

?>
