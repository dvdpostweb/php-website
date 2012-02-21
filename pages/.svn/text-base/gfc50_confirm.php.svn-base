<style type="text/css">
<!--
.minitext {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #777777;
}

-->
</style>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<br>

<table id="Table_01" width="727" height="700" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr> 
    <td height="183" colspan="4"> <img src="<?php  echo DIR_WS_IMAGES.'languages/'.$language ;?>/images/gfc50/GFC_01.jpg" width="727" height="237" alt=""></td>
  </tr>
  
  <tr> 
    <td width="15" rowspan="2"> </td>
    <td width="493" rowspan="2" bgcolor="#ffffff"><table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td class="minitext">
          	<?php 
			$check_GFC ='SELECT count(discount_code_id) as cpt FROM discount_use WHERE customers_id ='.$customers_id.' and discount_code_id in (580,581,582,583,584,585)' ;
			$check_GFC_query = tep_db_query($check_GFC);
			$check_GFC_values = tep_db_fetch_array($check_GFC_query);
			
			$check2_GFC ='SELECT customers_abo FROM customers WHERE customers_id ='.$customers_id ;
			$check2_GFC_query = tep_db_query($check2_GFC);
			$check2_GFC_values = tep_db_fetch_array($check2_GFC_query);
		
			if ($check_GFC_values['cpt']>0 && $check2_GFC_values['customers_abo']>0 ){
				
				$custabo_query = tep_db_query("select *, UNIX_TIMESTAMP(customers_abo_validityto) - UNIX_TIMESTAMP(now()) as ced from customers where customers_id = '" . $customer_id . "' ");
				$custabo = tep_db_fetch_array($custabo_query);
		
				$products_abo_query = tep_db_query("select * from products_abo where products_id = " . $custabo['customers_abo_type']);
				$products_abo = tep_db_fetch_array($products_abo_query);
				$DVD_credit= $products_abo['qty_credit'];
		
				if ($custabo['customers_abo'] > 0 and $DVD_credit>0){
				switch($custabo['customers_abo_payment_method']){
					case 1:
						$strcustomers_abo_payment_method ='ogone';			
					break;
					case 2:
					$strcustomers_abo_payment_method ='dom';			
					break;
				}
			
				tep_db_query("update customers set customers_abo_validityto = now() ,customers_next_abo_type = '" . $HTTP_POST_VARS['products_id'] . "', customers_next_discount_code='" . $HTTP_POST_VARS['discount_code'] . "' , customers_abo_auto_stop_next_reconduction = 0 where customers_id = '" . $customer_id . "' ");		
				tep_db_query("insert into abo (customerid, Action, Date ,product_id ,  payment_method, comment) values ('" . $customer_id . "', 13 , now(), ".$custabo['customers_abo_type'].", '" . $strcustomers_abo_payment_method . "', '" . floor($custabo['ced']/86400) . "' ) ");
				}
				else{
				tep_db_query("update customers set customers_next_abo_type = '" . $HTTP_POST_VARS['products_id'] . "', customers_next_discount_code='" . $HTTP_POST_VARS['discount_code'] . "' , customers_abo_auto_stop_next_reconduction=0 where customers_id = '" . $customer_id . "'");	
				}			

            	echo TEXT_CONGRATULATION ;
            	$abo_next_active ='SELECT pa.products_id, p.products_model, p.products_price, pa.qty_credit, pa.qty_at_home FROM products p ';
				$abo_next_active .='LEFT JOIN products_abo pa ON pa.products_id = p.products_id WHERE p.products_id ='.$products_id ;
				$abo_next_active_query = tep_db_query($abo_next_active);
				$abo_next_active_values = tep_db_fetch_array($abo_next_active_query);
				
				$abo50 = round($abo_next_active_values['products_price']-($abo_next_active_values['products_price']/100)*50, 2);
				$abo30 = round($abo_next_active_values['products_price']-($abo_next_active_values['products_price']/100)*30, 2);
				$abo20 = round($abo_next_active_values['products_price']-($abo_next_active_values['products_price']/100)*20, 2);
				            
				$date_reconduction ="SELECT customers_abo_dvd_credit,customers_abo_type,DATE_FORMAT(customers_abo_validityto,'%d/%m/%Y') as validity_date from customers where customers_id= ".$customers_id;
				$date_reconduction_query = tep_db_query($date_reconduction);			  
				$date_reconduction_values =tep_db_fetch_array($date_reconduction_query);
				$date=$date_reconduction_values['validity_date'];
				if ($date_reconduction_values['customers_abo_dvd_credit']==0 && $date_reconduction_values['customers_abo_type']>9){
					$date=date("j/m/Y");
				}
				echo $date; 
			?>            
            <br>
            <br>
            <?php  
            	echo TEXT_CHOSEN_FORMULA ;
            	echo $abo_next_active_values['products_model'] ;
            	echo '<br><br>';
            	$price_reconduct=TEXT_PRICE_RECONDUCT;
            	$price_reconduct=str_replace('µµµabo50µµµ',  $abo50 , $price_reconduct);
            	$price_reconduct=str_replace('µµµabo30µµµ',  $abo30 , $price_reconduct);
            	$price_reconduct=str_replace('µµµabo20µµµ',  $abo20 , $price_reconduct);
            	echo $price_reconduct;
            	echo '<br><br>';
            	echo TEXT_SPECIAL_THX ;
            	echo '<br><br><br><br>';
            	echo '<u>'.TEXT_TIP.'</u><br><br>';
            	echo TEXT_WISLIST;
            	echo '<br><br>';
            	echo TEXT_MORE_TIP;
				
				
				//preparation du mail
				$check_logo_query = tep_db_query("select logo , site_link  from site where site_id = '" . WEB_SITE_ID . "'");
				$check_log_values = tep_db_fetch_array($check_logo_query);
				$logo = $check_log_values['logo'];
				
				$email_text = TEXT_MAIL;
				
				$email_text = str_replace('µµµlogo_dvdpostµµµ', $logo , $email_text);	
				$email_text = str_replace('µµµformulaµµµ', $abo_next_active_values['products_model'] , $email_text);
				$email_text = str_replace('µµµdateµµµ', $date , $email_text);
				$email_text =str_replace('µµµabo50µµµ',  $abo50 , $email_text);
            	$email_text =str_replace('µµµabo30µµµ',  $abo30 , $email_text);
            	$email_text =str_replace('µµµabo20µµµ',  $abo20 , $email_text);
				
				//envoi du mail
				tep_mail($email_address, $email_address, EMAIL_SUBJECT, $email_text, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, '');
				
            	            
            }else{echo TEXT_NO_PROMO ;}
            ?>
            </td>
        </tr>
      </table> </td>
    <td height="258" colspan="2"></td>
  </tr>
  <tr> 
    <td height="182"  colspan="2" bgcolor="#ffffff" align="right"></td>
  </tr>
  <tr> 
    <td height="38" colspan="4"></td>
  </tr>
</table>
<br>
