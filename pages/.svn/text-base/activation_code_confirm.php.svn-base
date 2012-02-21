<!-- debut du CONTAINER -->
<?php   
  $code = tep_db_query("SELECT activation_discount_code_id,customers_next_abo_type from customers WHERE customers_id ='".$customers_id."'");
	$code_values = tep_db_fetch_array($code);
	if ($code_values['activation_discount_code_id']=='298'){
	 $show_discount_form=1;
  	}
  $disc_explain='';
  $code_explain = tep_db_query("SELECT  discount_text_fr,discount_text_nl, discount_text_en from discount_code WHERE discount_code ='".$activation_code."'");
  if ($code_explain_values = tep_db_fetch_array($code_explain)){
	  	switch ($languages_id){
			case 1:
				$disc_explain= '<span class="limitedathome"><br><b>('.$code_explain_values['discount_text_fr'].')</b></span>';
				break;
			case 2:
				$disc_explain= '<span class="limitedathome"><br><b>('.$code_explain_values['discount_text_nl'].')</b></span>';
				break;
			case 3:
				$disc_explain= '<span class="limitedathome"><br><b>('.$code_explain_values['discount_text_en'].')</b></span>';
		  		break;		  
		}
	  
	  }

?>
<table cellspacing="0" cellpadding="0" border="0" bgcolor='#FFFFFF' width='970'>
<tr>
<td>
<div id="step_container">
	<!-- debut PROMO -->
	<div style='padding: 30px 0pt 90px 20px; height: 250px;'>
	<div id="step_promo_container">
		<div id="step_promo_explain">
			<?php  
			echo '<img src="'.DIR_WS_IMAGES.'canvas/step/wrong.gif">';
			echo '<div id="pass_promo">';	
			echo '<div id="common_need_help">';
			echo '<b>'.TEXT_NEED_HELP.'</b><br>'; 
    		echo TEXT_CALL_NOW .'</div></div>' ;    						
        ?> 
		</div>
  </div>
  <!-- fin PROMO -->
	
	<!-- debut SUBSCRIPTION -->
	<div id="step_subscription_container">
		<div id="step_subscription_top">&nbsp;</div>		
  			<div id="step_subscription">
	    		<table cellpadding="0" cellspacing="0" border="0" width="98%" align="center">		    	  	 
					<?php 
						include(DIR_WS_COMMON . 'includes/step/step_activation_code_confirm.php');
					?>
				</table>
			</div>
		<div id="step_subscription_bottom"></div>
  	</div> 	
	<br />	
	<!-- fin SUBSCRIPTION -->
	</div>	
</div>
<!-- fin du CONTAINER -->

</td>
</tr>
</table>
