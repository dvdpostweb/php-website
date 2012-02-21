<?php  
include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/functions/add_wishlist.php'));
/*<!-- MSN - DrivePM -->
<img height="1" width="1" src="http://view.atdmt.com/action/ppbhes_BEHomeEntertainmentConfirmationPage0603_7"/>

<!-- MSN - DrivePM -->
<!-- oridian -->
<img src="http://ad.adserverplus.com/pixel?id=287497&t=2" width="1" height="1" />
<!-- oridian -->*/
?>
<br>




<h1>ABO_OGONE</h1>

<table width="729" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
  	<td height="40" colspan="3" align="left" valign="top" class="TYPO_ROUGE_ITALIQUE">
  		<table>
  			<tr>
  				<td width="269" class="TYPO_ROUGE_ITALIQUE" valign="top">
  					<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdpost/user_box.php'));?><br>
  				</td>
  				<td align="center" valign="top" width="460">
  					<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdpost/quizz_box.php'));?>
					<?php  //check if CUSTOMER have done the contest
					$count = tep_db_query("select count(customers_id) as cpt  from  contest where contest_name_id =41 AND customers_id= '". $customer_id ."' ");  
					$count_values = tep_db_fetch_array($count);
					if (tep_session_is_registered('customer_id')&& $count_values['cpt'] == 0){
						include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdpost/contest_box.php'));			
					}
					?>
					<br />
					<table width="295" align="center" cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td align="left" height="25"><a class="dvdpost_brown_underline" href="gift_form2.php"><?php  echo TEXT_BUY_GIFT ?></a></td>
							<td rowspan="3">
							<?php 
							$count_products_query = tep_db_query("SELECT count(customers_id) as count FROM survey_customers_2008 where customers_id='".$customers_id."'" );
							$count_products = tep_db_fetch_array($count_products_query);
							$cpt=$count_products['count']; 
							if ($cpt==0){
							echo '<table cellspacing="0" cellpadding="0" border="0"><tr><td align="center">';
							echo '<a href="custsurvmar08.php"><img src="'.DIR_WS_IMAGES.'quest_survey.jpg" align="center" border="0" /></a>';
							echo '<br /><a href="custsurvmar08.php" class="dvdpost_brown_underline"><font color="#275189">'.TEXT_SURVEY.'</font></a> </td>';
							echo '</tr></table>';
							}else{echo '&nbsp;';}
							?>
							
							</td>
							</tr>
						<tr>
							<td align="left" height="25"><a class="dvdpost_brown_underline" href="member_get_member.php"><?php  echo TEXT_MGM_FRIEND ?></a></td>							
						</tr>
						<tr>
							<td align="left" height="25"><a class="dvdpost_brown_underline" href="custsersuggestdvd.php" class="link_SLOGAN_MENU2"><?php  echo TEXT_SUGGEST ;?></a></td>							
						</tr>						
					</table>
					
  				</td>
  				<td width="131" align="center" valign="top" width="460">
  					<?php   include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdpost/shoping_box2.php'));?>					
  				</td>
  			</tr>
  		</table>
    </td>
  </tr>  
  <tr>
  	<td colspan="3" class="TYPO_ROUGE_ITALIQUE">
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
  		<?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/mydvdpost/best_category_box.php'));?><br>
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

<!-- MSN START -->
<img height="1" width="1" src="http://view.atdmt.com/action/ppbhes_BEHomeEntertainmentConfirmationPage0603_7"/>
<!-- MSN END -->
<!-- Oridian START -->
<img src="http://ad.adserverplus.com/pixel?id=287497&t=2" width="1" height="1" />
<!-- Oridian END -->
<!-- Dailymotion START -->
  <img src="http://mc.dailymotion.com/2/dailymotion/pixels/dvdpost@Middle" alt="">
  <img src="http://www.dailymotion.com/masscast/RealMedia/ads/cap.cgi?c=dvdpost">
<!-- Dailymotion END -->
<!-- PTG-->
<img src="http://dvdpost.ptg.be/protocols/pixel.php" border="0" width="0" height="0" />