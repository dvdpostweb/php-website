<?php 
require('configure/application_top.php');

$current_page_name = 'step4.php';
$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

include(DIR_WS_INCLUDES . 'translation.php');

$breadcrumb->add(NAVBAR_TITLE, tep_href_link($current_page_name, '', 'NONSSL'));

if (!tep_session_is_registered('customer_id')) {
	tep_mail('bugreport@dvdpost.be','bugreport@dvdpost.be','customers not register step4','customers not register step4 '.$_SERVER['HTTP_USER_AGENT'],'bugreport@dvdpost.be','bugreport@dvdpost.be');
	tep_redirect(tep_href_link('step1.php'));
}else{
	
	
	$sql='SELECT * FROM `customers` WHERE customers_id = '.$customer_id;
	$query=tep_db_query($sql);
	$value=tep_db_fetch_array($query);
		$promotion = promotion($value['customers_abo_type'],$value['customers_next_abo_type'],$value['activation_discount_code_type'],$value['activation_discount_code_id'],$jacob);
	if( $value['customers_registration_step']<31 || $value['customers_registration_step']==90 || $value['customers_registration_step']==80){
		tep_redirect(tep_href_link('step1.php'));
    }else{
		$page_body_to_include = $current_page_name;
		$sql='select * from customers where customers_id='.$customer_id;
		$sql_query=tep_db_query($sql,'db_link',true);
		$customers_value=tep_db_fetch_array($sql_query);

		$address_sql="select *  from address_book where customers_id= '".$customer_id."' and address_book_id = '" . $customers_value['customers_default_address_id'] . "'";
		$address_book = tep_db_query($address_sql);  
		$address_book_values = tep_db_fetch_array($address_book);
	
		$current_products_id=$customers_value['customers_abo_type'];
		$current_products_query = tep_db_query("SELECT p.products_price, pa.qty_credit,qty_at_home from products p LEFT JOIN products_abo pa on pa.products_id=p.products_id  WHERE p.products_id='".$current_products_id. "'");
		$current_products_values = tep_db_fetch_array($current_products_query);
		$current_credits=$current_products_values['qty_credit'];
		$promo_type = (($current_credits == 0) ? 'unlimited':'freetrial');
		
		$products_id=$customers_value['customers_next_abo_type'];
		$sql = "SELECT p.products_price, pa.qty_credit,qty_at_home from products p LEFT JOIN products_abo pa on pa.products_id=p.products_id  WHERE p.products_id='".$products_id. "'";
		$products_query = tep_db_query($sql);
		$products_values = tep_db_fetch_array($products_query);
		$credits_next=$products_values['qty_credit'];
		$price_abo_next=$products_values['products_price'];
		$rotation_next = $products_values['qty_at_home'];
		$promo_id=$customers_value['activation_discount_code_id'];
		$discount_type=$customers_value['activation_discount_code_type'];
		if ($discount_type=='A'){
			//ACTIVATION VIA OGONE
			$activation_query = tep_db_query("SELECT * FROM activation_code WHERE activation_id ='".$promo_id. "'");
			$activation_values = tep_db_fetch_array($activation_query);
			$abo_dvd_credit= $activation_values['abo_dvd_credit'];
			$reconduction=$activation_values['abo_auto_stop_next_reconduction'];
      $next_discount=$activation_values['next_discount'];
      
			if ($activation_values['activation_waranty'] == 2)
			{
				$promo_type = 'pre_paid';
			}
			if($abo_dvd_credit > 0)
			{
				$credits=$abo_dvd_credit;
			}
			$nb=1;
			switch ($activation_values['validity_type']){
				case 1:	
					$duration = $activation_values['validity_value'].' '.TEXT_DAYS;
					$period =  $credits.' '.TEXT_FILMS.' '.TEXT_FOR.' '.$duration;
					$nb_days = $activation_values['validity_value']. ' day';
					
				break;
				case 2:	
					$duration = $activation_values['validity_value'].' '.TEXT_MONTHS;
					$period = $credits.' '.TEXT_FILMS.' '.TEXT_FOR.' '.$duration;
					
					$nb = $activation_values['validity_value'];
					if ($customers_value['customers_next_discount_code']>0 || $next_discount > 0)
      		{
      		  $nb = $nb + 1;
      		}
      		$nb_days = $nb. ' month';
				break;
				case 3:	
					$duration = $activation_values['validity_value'].' '.TEXT_YEAR;
					$period = $credits.' '.TEXT_FILMS.' '.TEXT_FOR.' '.$duration;
					$nb_days = $activation_values['validity_value'].' year';
					
				break;
			}
			if($rotation_next==0)
			{
			  $period_next = '2 VOD '.TEXT_PER.' '.TEXT_MONTH.' '.TEXT_FOR_EURO.' &euro; '.$price_abo_next;
			}
			elseif ($credits_next == 0) {
				$period_next = $rotation_next.' '.TEXT_FILMS.' '.AT_TIME.' &euro; '.$price_abo_next;
			}
			else
			{
			  $period_next = $credits_next.' '.TEXT_FILMS.' '.TEXT_PER.' '.TEXT_MONTH.', '. $rotation_next.' '.TEXT_FILMS.' '.AT_TIME.' &euro; '.$price_abo_next;  
			}
			
		}else{
			$discount_query = tep_db_query("SELECT * FROM discount_code WHERE discount_code_id ='".$promo_id. "'");
			$discount_values = tep_db_fetch_array($discount_query);
			$reconduction=$discount_values['abo_auto_stop_next_reconduction'];
			
			$abo_dvd_credit= $discount_values['abo_dvd_credit'];
      $next_discount= $discount_values['next_discount'];
			$nb_recurring = $discount_values['discount_recurring_nbr_of_month'];
			if($abo_dvd_credit==0)
				$abo_dvd_credit=$credits;
					$nb = $discount_values['discount_recurring_nbr_of_month']> 0 ? ($discount_values['discount_recurring_nbr_of_month'] +1)  : $discount_values['discount_abo_validityto_value'];
			switch ($discount_values['discount_abo_validityto_type']){
				case 1:	
					$duration = $nb.' '.TEXT_DAYS;
					$period = $abo_dvd_credit.' '.TEXT_FILMS.' '.TEXT_FOR.' '.$duration;
					$nb_days = $nb. ' day';
					
				break;
				case 2:
					$duration = $nb.' '.TEXT_MONTHS;
					$period = $abo_dvd_credit.' '.TEXT_FILMS.' '.TEXT_FOR.' '.$duration;
					if ($customers_value['customers_next_discount_code']>0 || $next_discount > 0)
      		{
      		  $nb = $nb + 1;
      		}
					
					$nb_days = $nb. ' month';
				break;
				case 3:	
					$duration = $nb.' '.TEXT_YEAR;
					$period = $abo_dvd_credit.' '.TEXT_FILMS.' '.TEXT_FOR.' '.$duration;
					$nb_days = $nb.' year';
					
				break;
				
			}
			$discount_value = Intval($discount_values['discount_value']);
			
			if ($discount_values['discount_value'] > 0)
				$price_abo = abo_price($discount_values['discount_type'],$promo_id,$discount_values['discount_value'],$price_abo);
			if($rotation_next==0)
			{
			  $period_next = '2 VOD '.TEXT_PER.' '.TEXT_MONTH.' '.TEXT_FOR_EURO.' &euro; '.$price_abo_next;
			}
			elseif ($credits_next == 0) {
				$period_next = $rotation_next.' '.TEXT_FILMS.' '.AT_TIME.' &euro; '.$price_abo_next;
			}
			else
			{
				
			$period_next = $credits_next.' '.TEXT_FILMS.' '.TEXT_PER.' '.TEXT_MONTH.', '. $rotation_next.' '.TEXT_FILMS.' '.AT_TIME.' &euro; '.$price_abo_next;
		  }
		}
		$date_now = date("Y-m-d");// current date
		$date_sub = strtotime ( '+'.$nb_days , strtotime ( $date_now ) ) ;
		$date_sub = date ( 'd/m/Y' , $date_sub );
		if($_GET['type']=='ogone')
		{
			$date=tep_date_short($customers_value['customers_abo_validityto']);
		}
		else
		{
			
			$date=$date_sub.' '.CALL_NOW;
		}
		$price_abo_next
		?>
		<script>
    dataLayer = [{
      'revenue': '<?= $price_abo_next %>'
    }];
</script>
	<!-- Google Tag Manager -->
	<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-PMD4QF"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-PMD4QF');</script>
	<!-- End Google Tag Manager -->
		<?
		tep_db_query("update customers set customers_registration_step=100 where customers_id =".$customer_id);
		setcookie('customers_registration_step', 100 , time()+2592000, substr(DIR_WS_CATALOG, 0, -1));
		include(getBestMatchToInclude(DIR_WS_COMMON . 'canvas/canvas_step_2010.php',0,$jacob));
		require('configure/application_bottom.php');
	}
}
?>