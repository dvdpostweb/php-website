<div class="main-holder">

<div id="how-content">
<table width="930" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td height="363px" align="right" valign="middle">
		<?php   
		$how='<a href="how.php?faq=1" class="how_faq_link">'.TEXT2_FAQ_HOW_QUESTION.'</a>';
		$delivery='<a href="how.php?faq=2" class="how_faq_link">'.TEXT2_FAQ_DELIVERY_QUESTION.'</a>';
		$guaranted='<a href="how.php?faq=3" class="how_faq_link">'.TEXT2_FAQ_GUARANTED_QUESTION.'</a>';
		$freetrial='<a href="how.php?faq=4" class="how_faq_link">'.TEXT2_FAQ_FREETRIAL_QUESTION.'</a>';
		$catalog='<a href="how.php?faq=5" class="how_faq_link">'.TEXT2_FAQ_CATALOG_QUESTION.'</a>';
		$stop='<a href="how.php?faq=6" class="how_faq_link">'.TEXT2_FAQ_STOP_QUESTION.'</a>';
		$price='<a href="how.php?faq=7" class="how_faq_link">'.TEXT_FAQ_PRICES.'</a>';
		switch ($faq){
			case 2:
				?>
				<table cellspacing="0" cellpadding="0" border="0" align="center">
					<tr>
						<td colspan="2" class="TYPO_ROUGE_ITALIQUE"  width="930" valign="top">
							<?php    echo TEXT2_FAQ_DELIVERY_TITLE ;?>		
						</td>
					</tr>
					<tr>
						<td class="how" valign="top" height="217" width="317">
						<?php  
							switch (ENTITY_ID){
								case 38:
									echo '<img src="'. DIR_WS_IMAGES.'canvas/envelopubNL.gif" border="0">';
									break;
								default:
									echo '<img src="'. DIR_WS_IMAGES.'canvas/envelopub.gif" border="0">';
									break;
							}
						?>
						</td>
						<td class="how" valign="top">
							<br>
							<span class="how_explain2">								
								<?php    echo TEXT2_FAQ_DELIVERY_EXPLAIN ;?>
							</span>
						</td>
					</tr>
					<tr>
						<td colspan="2" class="how_button_trial"  align="right" valign="bottom" style="padding-right:22px;">
							<a href="<?php   echo $link_freetrial.((!empty($_GET['activation_code']))?'?activation_code='.$_GET['activation_code']:'') ;?>"><img src="<?php    echo DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/canvas/bouton_freetrial.gif';?>" border="0"></a>		
						</td>
					</tr>
				</table>				
			    <?php   
				$delivery='<span class="how_faq_linked">'.TEXT2_FAQ_DELIVERY_QUESTION.'</span>';
			break;
			case 3:
				?>
				<table cellspacing="0" cellpadding="0" border="0" >
					<tr>
						<td class="TYPO_ROUGE_ITALIQUE" valign="top" width="930">
							<?php    echo TEXT2_FAQ_GUARANTEED_TITLE ;?>
						</td>
					</tr>
					<tr>
						<td class="how" valign="top" height="217" width="730">
							<span class="how_explain2">
								<?php    echo TEXT2_FAQ_GUARANTEED_EXPLAIN ;?>
							</span>		
						</td>
					</tr>
					<tr>
						<td class="how_button_trial" align="right"  style="padding-right:22px;">
							<a href="<?php   echo $link_freetrial.((!empty($_GET['activation_code']))?'?activation_code='.$_GET['activation_code']:'') ;?>"><img src="<?php    echo DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/canvas/bouton_freetrial.gif';?>" border="0"></a><br><br>			
						</td>
					</tr>
				</table>				
			    <?php   
				$guaranted='<span class="how_faq_linked">'.TEXT2_FAQ_GUARANTED_QUESTION.'</span>';
			break;
			case 4:
				?>
				<table cellspacing="0" cellpadding="0" border="0"align="center">
					<tr>
						<td class="TYPO_ROUGE_ITALIQUE" valign="top" width="930">
							<?php    echo TEXT2_FAQ_FREETRIAL_TITLE ;?>	
						</td>
					</tr>
					<tr>
						<td class="how" valign="top" height="217" width="730">
							<span class="how_explain2">
								<?php    echo TEXT2_FAQ_FREETRIAL_EXPLAIN ;?>
							</span>		
						</td>
					</tr>
					<tr>
						<td class="how_button_trial" height="30" align="right" style="padding-right:22px;">
							<a href="<?php   echo $link_freetrial.((!empty($_GET['activation_code']))?'?activation_code='.$_GET['activation_code']:'') ;?>"><img src="<?php    echo DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/canvas/bouton_freetrial.gif';?>" border="0"></a><br><br>			
						</td>
					</tr>
				</table>
			    <?php   
				$freetrial='<span class="how_faq_linked">'.TEXT2_FAQ_FREETRIAL_QUESTION.'</span>';
			break;			
			case 5:
				?>
				<table cellspacing="0" cellpadding="0" border="0"  align="center">
					<tr>
						<td class="TYPO_ROUGE_ITALIQUE" valign="top" width="930">
							<?php    echo TEXT2_FAQ_CATALOG_TITLE ;?>		
						</td>
					</tr>
					<tr>
						<td class="how" valign="top" height="217" width="730">
							<?php   		
						
							$catalog_text = TEXT2_FAQ_CATALOG_EXPLAIN;
							$catalog_text = str_replace('µµµcountµµµ',  $cpt_catalog , $catalog_text);
														
							
				echo $rent_text ;
						
						?>
							<span class="how_explain2">
								<?php    echo $catalog_text ;?>
							</span>		
						</td>
					</tr>
					<tr>
						<td class="how_button_trial" height="30" align="right" style="padding-right:22px;">
							<a href="<?php   echo $link_freetrial.((!empty($_GET['activation_code']))?'?activation_code='.$_GET['activation_code']:'') ;?>"><img src="<?php    echo DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/canvas/bouton_freetrial.gif';?>" border="0"></a><br><br>			
						</td>
					</tr>
				</table>
			    <?php   
				$catalog='<span class="how_faq_linked">'.TEXT2_FAQ_CATALOG_QUESTION.'</span>';
			break;
			case 6:
				?>
				<table cellspacing="0" cellpadding="0" border="0" align="center">
					<tr>
						<td class="TYPO_ROUGE_ITALIQUE" valign="top" width="930">
							<?php    echo TEXT2_FAQ_STOP_TITLE ;?>		
						</td>
					</tr>
					<tr>
						<td class="how" valign="top" height="217" width="590">
							<span class="how_explain2">
								<?php    echo TEXT2_FAQ_STOP_EXPLAIN ;?>
							</span>		
						</td>
					</tr>
					<tr>
						<td class="how_button_trial" height="30" align="right" style="padding-right:22px;">
							<a href="<?php   echo $link_freetrial.((!empty($_GET['activation_code']))?'?activation_code='.$_GET['activation_code']:'') ;?>"><img src="<?php    echo DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/canvas/bouton_freetrial.gif';?>" border="0"></a><br><br>			
						</td>
					</tr>
				</table>
			    <?php   
				$stop='<span class="how_faq_linked">'.TEXT2_FAQ_STOP_QUESTION.'</span>';
			break;
			case 7:
				?>
				<table cellspacing="0" cellpadding="0" border="0"  align="center">
					<tr>
						<td class="TYPO_ROUGE_ITALIQUE"  valign="top" width="930">
							<?php    echo TEXT_FAQ_PRICES ;?>		
						</td>
					</tr>
				</table>
				<div align="center">
				<table cellspacing="0" cellpadding="0" border="0" width="590" align="center">
                <tr>
                <td height="10"></td>
                </tr>
                <tr>
                <td>
                <?php  
							echo '<img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/prices/price_BE.gif" >';?>
            </div>               
                
               </td>
                </tr>
                <tr>
                <td align="center"><?php    echo TEXT_FRAIS_PORT ;?>	</td>
                </tr>
					<!--<tr>
						<?php   
							$abo_passive ='SELECT pa.products_id, p.products_price, pa.qty_credit, pa.qty_at_home, pa.most_popular_group FROM products p ';
							$abo_passive .="LEFT JOIN products_abo pa ON pa.products_id = p.products_id WHERE p.products_type = 'ABO' AND pa.allowed_public_group LIKE '%".GROUP_ID."%' order by pa.qty_credit ASC" ;
							$abo_passive_query = tep_db_query($abo_passive);		
							$colspan=0;
							while ($abo_passive_values = tep_db_fetch_array($abo_passive_query)){
								echo '<td align="center">';
								include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/formula/limited_abo_public.php'));
								echo '</td>';
								$colspan=$colspan+2;
																			  
							}
						  ?>
					</tr>-->	
									
				</table>
				</div>
				<table cellspacing="0" cellpadding="0" border="0" width="950" align="center">
					<tr>
                    <td style="padding-left:25px"><img src="/images/www3/languages/french/images/prices/help.gif" /></td>
                    <td class="faqs_explain" colspan="<?php   echo $colspan ;?>" width="400" ><?php  echo TEXT_NO_LATE_FEE;?></td>
						<td class="how_button_trial" align="right" style="padding-right:22px;">
							
							<a href="<?php   echo $link_freetrial.((!empty($_GET['activation_code']))?'?activation_code='.$_GET['activation_code']:'') ;?>"><img src="<?php    echo DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/canvas/bouton_freetrial.gif';?>" border="0"></a>		
						</td>
					</tr>
				</table>
			    <?php   
				$price='<span class="how_faq_linked">'.TEXT_FAQ_PRICES.'</span>';
			break;
			default:
				echo '<table width="100%" align="center">';
				echo '<tr><td class="TYPO_ROUGE_ITALIQUE" width="930" valign="top">'.TEXT2_FAQ_HOW_QUESTION.'</td></tr>';
				echo '<tr><td height="50" valign="top" align="center">';
				//echo '<img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/canvas/how.gif" border="0" border="0"></td></tr>';
				echo '<tr><td>';
				?>
					<div class="decouvrir-area">
						<!-- box1 -->
						<div class="decouvrir box1">
							<a href="/how.php"><img alt="" src="/images/dvdpost_public/decouvrir01.jpg" /></a>
							<div class="description">
								<strong class="numbers">1</strong>
								<div>
									<p><?php echo str_replace('xxxcountxxx' ,  $cpt_catalog ,TEXT_DISCOVER1);?></p>
								</div>
							</div>
						</div>
						<!-- box2 -->
						<div class="decouvrir box2">
							<a href="/how.php"><img alt="" src="/images/dvdpost_public/decouvrir02.jpg" /></a>
							<div class="description">
								<strong class="numbers">2</strong>
								<div>
									<p><?php echo TEXT_DISCOVER2 ;?></p>
								</div>
							</div>
						</div>
						<!-- box3 -->
						<div class="decouvrir box3">
							<a href="/how.php"><img alt="" src="/images/dvdpost_public/decouvrir03.jpg" /></a>
							<div class="description">
								<strong class="numbers">3</strong>
								<div>
									<p><?php echo TEXT_DISCOVER3 ;?></p>
								</div>
							</div>
						</div>
						<!-- box4 -->
						<div class="decouvrir box4">
							<a href="/how.php"><img alt="" src="/images/dvdpost_public/decouvrir04.jpg" /></a>
							<div class="description">
								<strong class="numbers">4</strong>
								<div>
									<p><?php echo TEXT_DISCOVER4 ;?></p>
								</div>
							</div>
						</div>
				<?php
				echo '</td></tr>';
				if (!tep_session_is_registered('customer_id') || $customers_registration_step<100) {
					
					echo '<tr><td class="how_button_trial" height="30" align="right" style="padding-right:22px;"><a href="'.$link_freetrial.((!empty($_GET['activation_code']))?'?activation_code='.$_GET['activation_code']:'').'"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/canvas/bouton_freetrial.gif" border="0"></a><br><br></td></tr>';			
				}
				echo '</table>';
				$how='<span class="how_faq_linked">'.TEXT2_FAQ_HOW_QUESTION.'</span>';
		}
		?>		
	</td>
  </tr>
<tr ><td><table border="0" width="950" style="text-align:center"><tr><td><?= VIDEO ?></td></tr></table></td></tr>  

  	<tr>
  		<td class="how" height="50" valign="top">
			<span class="how_title2"><?php    echo TEXT2_FAQ ;?></span>		
		</td>
 	</tr>	
  	<tr>
  		<td class="how" valign="top">
		<table cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td align="left" height="22"><?php    echo $how ;?></td>
				<td align="left" height="22"><?php    echo $delivery ;?></td>
			</tr>
			<tr>
				<td align="left" height="22"><?php    echo  $price;?></td>
				<td align="left" height="22"><?php    echo $freetrial ;?></td>
			</tr>
			<tr>
				<td align="left" height="22"><?php    echo $catalog ;?></td>
				<td align="left" height="22"><?php    echo $stop ;?></td>
			</tr>
			<tr>
				<td align="left" height="22"><?php    echo $guaranted ;?></td>
				<td align="left" height="22">&nbsp;</td>
			</tr>
		</table>
		</td>
  	</tr>
  	<tr>
  		<td class="how" height="30">
		<?php    echo '<img src="'.DIR_WS_IMAGES.'blank.gif" border="0">'; ?>
		</td>
  	</tr>
  	
  <tr>
  	<td class="how" height="50" valign="top">
		<span class="how_title"><?php    echo TEXT2_DETAILS_TITLE ;?></span>		
	</td>
  </tr>
  <tr>
  	<td class="how" valign="top">
		<span class="how_explain">
			<b><?php    echo TEXT2_DETAILS_Q1 ;?></b><br>
			<?php    echo TEXT2_DETAILS_R1 ;?>
		</span>		
	</td>
  </tr>
  
  <tr>
  	<td class="how" valign="top">
		<span class="how_explain">
			<b><?php    echo TEXT2_DETAILS_Q2 ;?></b><br>
			<?php    echo TEXT2_DETAILS_R2 ;?>
		</span>		
	</td>
  </tr>
  
  <tr>
  	<td class="how" valign="top">
		<span class="how_explain">
			<b><?php   					
					$r3 = str_replace('µµµcountµµµ',  $cpt_catalog , TEXT2_DETAILS_Q3);
					echo $r3  ;
				?>
			</b><br>
			<?php   
				$r3_details= TEXT2_DETAILS_R3 ;
				$r3_details = str_replace('µµµcountµµµ',  $cpt_catalog , $r3_details);
				echo $r3_details ;
			?>
		</span>		
	</td>
  </tr>
  
  <tr>
  	<td class="how" valign="top">
		<span class="how_explain">
			<b><?php    echo TEXT2_DETAILS_Q4 ;?></b><br>
			<?php    
				$products_popular_query = tep_db_query("SELECT p.products_id, p.products_price, pa.qty_credit FROM products_abo pa LEFT JOIN products p ON p.products_id = pa.products_id WHERE pa.most_popular_group =".GROUP_ID);
				$products_popular = tep_db_fetch_array($products_popular_query);
				$popular_price=$products_popular['products_price'];
				$popular_price = str_replace('.',  ',' , $popular_price);
				
				$popular_credit=$products_popular['qty_credit'];
				
				$price_per_dvd=round($popular_price/$popular_credit,1);
			   
				$popular_text=TEXT2_DETAILS_R4;
				$popular_text = str_replace('µµµpriceµµµ',  $popular_price , $popular_text);
				$popular_text = str_replace('µµµprice_per_dvdµµµ',  $price_per_dvd , $popular_text);
				$popular_text = str_replace('µµµcreditµµµ',  $popular_credit , $popular_text);
				echo $popular_text ;
				
			?>
		</span>		
	</td>
  </tr>
  
  <tr>
  	<td class="how" valign="top">
		<span class="how_explain">
			<b><?php    echo TEXT2_DETAILS_Q5 ;?></b><br>
			<?php    echo TEXT2_DETAILS_R5 ;?>
		</span>		
	</td>
  </tr>
  
  <tr>
  	<td class="how" valign="top">
		<span class="how_explain">
			<b><?php    echo TEXT2_DETAILS_Q6 ;?></b><br>
			<?php    echo TEXT2_DETAILS_R6 ;?>
		</span>		
	</td>
  </tr>
  
  <tr>
  	<td class="how" valign="top">
		<span class="how_explain">
			<b><?php    echo TEXT2_DETAILS_Q7 ;?></b><br>
			<?php
				$about_text = TEXT2_DETAILS_R7;
				$year = date('Y')-2002;
				$about_text = str_replace('µµµyearsµµµ',  $year , $about_text);
			    echo $about_text ;
			?>			
		</span>
        
        		
	</td>
  </tr>
 <?php    if (!tep_session_is_registered('customer_id') || $customers_registration_step<100) {
	  	echo '<tr><td class="how_button_trial" height="30" align="right" style="padding-top:15px;padding-right:22px;">';
	  	echo '<a href="'.$link_freetrial.((!empty($_GET['activation_code']))?'?activation_code='.$_GET['activation_code']:'').'"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/canvas/bouton_freetrial.gif" border="0"></a><br><br></td></tr>';	  
	  }
   ?>  	
</table>
</div>
</div>

        	