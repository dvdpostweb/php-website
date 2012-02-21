<table width="122" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>
	<?php  
	$customers = tep_db_query("select *  from " . TABLE_CUSTOMERS. " p where p.customers_id= '".$customer_id."'");  
	$customers_values = tep_db_fetch_array($customers);
	if ($customers_values['customers_abo']>0){
		$survey_query = tep_db_query("select * from survey_custserv where customers_id  = '" . $customer_id . "' ");
		$survey = tep_db_fetch_array($survey_query);
		
		if ($survey['customers_id']>0){
		}else{
			include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/right_menu/box_survey.php'));
			//echo '<br>';
		}
	}	
	?>
	<?php   include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/right_menu/box_buy_dvd.php'));?><br>
	<?php   include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/right_menu/mgm.php'));?><br>
	<?php  //include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/right_menu/box_kiala.php'));?>
	<?php   include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/right_menu/box_actor.php'));?><br>
	<?php   include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/right_menu/box_director.php'));?><br>
	<?php  // include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/right_menu/box_top_rental.php'));?><br>
	<?php   include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/right_menu/box_reviews.php'));?><br>
	<?php   include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/right_menu/box_rate_more.php'));?><br>	
	<?php   include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/right_menu/suggest.php'));?><br>
	<?php   //include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/right_menu/box_promo.php'));?><br>
	</td>
  </tr>
</table>
