<?php  
include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/functions/add_wishlist.php'));

if ($fstlog==1){
	//$check_ptg_client_query = tep_db_query("SELECT activation_discount_code_id, activation_discount_code_type FROM customers WHERE customers_id = " . $customers_id );
	//$check_ptg_client_values = tep_db_fetch_array($check_ptg_client_query);
	//mouchard PTG - code PROMOPTG
	if ($customers_val['activation_discount_code_id']==308 && $customers_val['activation_discount_code_type']=='D' ){
		echo '<img src="http://www.ptg.be/aimg/dvdpost.php" width="1" height="1" border="0"> ';		
	}
	
	//mouchard PTG - code PTG
	if ($customers_val['activation_discount_code_id']==323 && $customers_val['activation_discount_code_type']=='D' ){
		echo '<img src="http://www.ptg.be/aimg/dvdpost.php" width="1" height="1" border="0"> ';		
	}
	
	
}

//mouchard MSN
	 if ($mouchard_msn=='ok') 
		{
			echo '<!-- MSN - DrivePM -->';
			echo '<img height="1" width="1" src="http://view.atdmt.com/action/ppbhes_BEHomeEntertainmentConfirmationPage0603_7"/>';
			echo '<!-- MSN - DrivePM -->';
		}

#$check_suspended_query = tep_db_query("SELECT customers_abo_payment_method  FROM customers WHERE customers_id = '". $customers_id."' and customers_abo=1 and customers_abo_suspended=2 " );

	if ($customers_val['customers_abo']==1 && $customers_val['customers_abo_suspended']==2){	

		echo '<br /><div id="warning"><div id="warning_top">&nbsp;</div>';
		echo '<div id="warning_explain">';

		if ($customers_val['customers_abo_payment_method']==1){
 			echo TEXT_PAYMENT_CC_ALERT ;
 		}else if ($customers_val['customers_abo_payment_method']==2){
			echo TEXT_PAYMENT_DOM_ALERT ; 
		}else{
			echo TEXT_PAYMENT_OTHER_ALERT ; 
		} 

 		echo '</div><div id="warning_bottom"></div>';	

 	}
	$count_products = tep_db_cache("SELECT count(1) as count FROM survey_customers_2008 where customers_id=".$customers_id,14400 );
	$survey_cpt=$count_products[0]['count'];
?>
<br>
<table width="729" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
  	<td colspan="3" align="left" valign="top" class="TYPO_ROUGE_ITALIQUE">
  		<table cellpadding="0" cellspacing="0" border="0">
  			<tr>
  				<td width="269" class="TYPO_ROUGE_ITALIQUE" valign="top">
  					<?php include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdpost/user_box.php'));?>
					
  				</td>
  				<td align="center" valign="top">
  					<table>
					<tr><td width="250" align="center">
					<?php  //check if CUSTOMER have done the contest
						include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdpost/rand_box.php'));
					?>		
					
					
					</td>
					<td width="250" align="center">
						<?php
							switch($languages_id){
								case 1:
									$active='active_fr';		
									break;

								case 2:
									$active='active_nl';
									break;

								case 3:
									$active='active_en';
									break;
							}
						$contest_values = tep_db_cache("select contest_name_id from contest_name where ".$active."=1 order by contest_name_id desc limit 1",14400);  
						if (count($contest_values>0)){
							$contest_id=$contest_values[0]['contest_name_id'];
						}else {
							$contest_id=0;
						}
						
						$count = tep_db_query("select count(customers_id) as cpt  from  contest where contest_name_id =".$contest_id." AND customers_id= '". $customer_id ."' ");  
						$count_values = tep_db_fetch_array($count);

						if($count_values['cpt'] == 0)
							$rd=rand(0,2);
						else
							$rd=rand(0,1);
						switch($rd)
						{
							case 2:
								include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdpost/contest_box.php'));
								break;
							case 0:
						 		include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdpost/quizz_box.php'));
								break;
							case 1:
								include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdpost/shoping_box2.php'));
								break;
						}
						?>
					</td>
					</tr>
					<tr>
					<td colspan="3">	
					<table width="100%" align="center" cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td align="center" height="25"><a class="dvdpost_brown_underline" href="gift_form2.php"><?php  echo TEXT_BUY_GIFT ?></a> <a href="dvdpost_brown_underline"></a></td><td>|</td> 
							<?php 
							
							

							if($survey_cpt==0)
								echo '<td align="center" height="25"><a href="custsurvmar08.php" class="dvdpost_brown_underline">'.TEXT_SURVEY.'</a></td><td>|</td>';
							else
								echo '<td align="center" height="25"><a href="AF2005.php" class="dvdpost_brown_underline">Discovery card</a></td><td>|</td>';
							
							
							if($survey_cpt==0)						
								echo '<td align="center" height="25"><a href="AF2005.php" class="dvdpost_brown_underline">Discovery card</a></td><td>|</td>';		
							else
								echo '<td align="center" height="25"><a class="dvdpost_brown_underline" href="member_get_member.php"><b>'.TEXT_MGM_FRIEND.'</b></a></td><td>|</td>';
							?>
							<td align="center" height="25"><a class="dvdpost_brown_underline" href="http://insidedvdpost.blogspot.com/" class="link_SLOGAN_MENU2"><?php  echo TEXT_BLOG ;?></a></td>							
						</tr>						
					</table>
					</td>
					</tr>
					</table>					
  				</td>
  			</tr>
  		</table>
    </td>
  </tr>  
  <tr>
  	<td colspan="3" class="TYPO_ROUGE_ITALIQUE" align='center' style='padding-top:8px'>
  		<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdpost/recommendations_box.php'));?><br>
  	</td>
  </tr>
  <tr>
  	<td width="243" class="TYPO_ROUGE_ITALIQUE">
  		<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdpost/new_box.php'));?>
  	</td>
  	<td width="243" class="TYPO_ROUGE_ITALIQUE">
  		<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdpost/next_box.php'));?>
  	</td>
  	<td width="243" class="TYPO_ROUGE_ITALIQUE">
  		<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdpost/cinema_box.php'));?>
  	</td>
  </tr>
  <tr>
  	<td colspan="3"><br><?php  echo '<img src="'.DIR_WS_IMAGES.'greyline3.jpg" width="'.SITE_WIDTH_PUBLIC.'" height="11"> ';?><br></td>
  </tr>
  <tr>
  	<td colspan="3" class="TYPO_ROUGE_ITALIQUE">
  		<?php   include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdpost/best_category_box.php'));
  		?>
  		<br>
  	</td>
  </tr>  
  <tr>
  	<td colspan="3"><br><?php  echo '<img src="'.DIR_WS_IMAGES.'greyline3.jpg" width="'.SITE_WIDTH_PUBLIC.'" height="11"> ';?></td>
  </tr>
  <tr>
  	<td height="40" align="left" valign="top" class="TYPO_ROUGE_ITALIQUE">
  		<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdpost/rating_box.php'));?>  		
  		<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdpost/top15_box.php'));?><br>  		
    </td>
    <td colspan="2" height="40" align="center" valign="top" class="TYPO_ROUGE_ITALIQUE">
  		<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdpost/reviews_box.php'));?><br>
    </td>    
  </tr>
</table>
