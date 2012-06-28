<link href="stylesheet/jb_styles.css" rel="stylesheet" type="text/css" />


<!-- debut du CONTAINER -->
	<?php   
$code = tep_db_query("SELECT activation_discount_code_id from customers WHERE customers_id ='".$customers_id."'");
$code_values = tep_db_fetch_array($code);
if ($code_values['activation_discount_code_id']=='298' || $code_values['activation_discount_code_id']=='0'){
	$show_discount_form=1;
}

$disc_explain='';
$promo_footer=TEXT_FOOTER_EXPLAIN;

$code_explain = tep_db_query("SELECT  banner,footer,  date_format(discount_validityto,'%d/%m/%Y') as discount_validityto,discount_code from discount_code WHERE discount_code ='".$activation_code."'");
if ($code_explain_values = tep_db_fetch_array($code_explain)){
	$disc_explain='<img src="'. DIR_WS_IMAGES.'languages/'.$language.'/images/step/banners/'.$code_explain_values['banner'].'"><br />';
	if($code_explain_values['footer']=='FREETRIAL')
	{
		$promo_footer=TEXT_FOOTER_EXPLAIN;	
	}
	else
	{
		if(defined('TEXT_FOOTER_'.$code_explain_values['footer']))
			$promo_footer=constant('TEXT_FOOTER_'.$code_explain_values['footer']);
	}

	$promo_footer=str_replace("µµµdateµµµ",$code_explain_values['discount_validityto'],$promo_footer);
}else{
	$sql="SELECT  ac.banner,  activation_waranty,footer from activation_code ac WHERE  ac.activation_code ='".$activation_code."'";
	$activation_explain = tep_db_query($sql);
	if ($activation_explain_values = tep_db_fetch_array($activation_explain)){
		$disc_explain='<img src="'. DIR_WS_IMAGES.'languages/'.$language.'/images/step/banners/'.$activation_explain_values['banner'].'" border="0"><br />';
		if ($activation_explain_values['activation_waranty']==0)
		{
			$promo_footer=TEXT_FOOTER_BYPASS_OGONE ;
		}
		else
		{
			$promo_footer=((defined('TEXT_FOOTER_'.$activation_explain_values['footer']))?constant('TEXT_FOOTER_'.$activation_explain_values['footer']):TEXT_FOOTER_OGONE);
			$promo_footer=str_replace("µµµdateµµµ",$activation_explain_values['discount_validityto'],$promo_footer);
		}

	}	  
}
if (strpos(strtoupper($code_explain_values['discount_code']),'BGC') === 0) { ?> 
	<link href="http://www.dvdpost.be/images/relance012012/new.css" rel="stylesheet" type="text/css" />
<? }
if(WEBSITE==101)
{
	$promo_footer=str_replace("0800 95 990",'02/503.68.11',$promo_footer);
}	  

?>
<div class="jbwrapper">
  <div class="jbcontainer">
		<? if (strpos(strtoupper($activation_code),'BGC') === 0) { ?>
		<div id="header_relance">
	  <h1> <a href="http://www.dvdpost.be" class="f-btn" style="">DVDPost - Online DVD rental</a> </h1>
	    <div class="relancetopnav">
	      <ul class="top-nav">
	        <li class="retractation"><a href="/conditions.php#article3"><?= TEXT_RETRA ?> </a></li>
	        <li class="langues <?= ($languages_id == 1 ? "selected" : "") ?> "><a href="?language=fr">FR</a></li>
	        <li class="langues <?= ($languages_id == 2 ? "selected" : "" ) ?>"><a href="?language=nl">NL</a></li>
	        <li class="langues <?= ($languages_id == 3 ? "selected" : "" ) ?>"><a href="?language=en">EN</a>		      </ul>
	      <div style="clear:both;"></div>
	    </div>
	  </div>
	<? } else {?>
    <div class="jblogo"><a href="/default.php">DVDPost.be</a></div>
    <div class="jbtopnav">
      <ul class="top-nav"><li class="retractation"><a href="/conditions.php#article3"><?= TEXT_RETRA ?> </a></li><li class="langues"><a href="/step3b.php?language=fr">FR</a></li>
        <li class="langues"><a href="/step3b.php?language=nl">NL</a></li>
        <li class="langues"> <a href="/step3b.php?language=en">EN</a> </li>
        <li><a class="login" href="/login.php">Login membres</a></li>
      </ul>
      <div style="clear:both;"></div>
    </div>
		<? } ?>
    <div style="clear:both;"></div>
    <div class="breadcrumb"><a href="" class="link_selected">Home &gt;</a> <a href="" class="link_selected">Step 1 <?= TEXT_TITLE_JACOB1 ?> &gt;</a> <a href="" class="link_selected">Step 2 <?= TEXT_TITLE_JACOB2 ?> &gt;</a> <a href="">Step 3 <?= TEXT_TITLE_JACOB3 ?></a></div>
    <div id="container">
			<? if (strpos(strtoupper($activation_code),'BGC') === 0) { ?> 
				<div class="banner_step_relance"  id="<?= $lang_short ?>" align="center">
					<p style="width: 400px;margin: 26px auto;"><?= $promotion ?></p>
				</div>
				<? } else {?>
      <div class="banner_title"><?= HUGE_CATALOG ?></div>
      <div class="banner_step" align="center">
        <p><?= $promotion ?></p>
        <span><a href="catalog.php" class="browse_button"><?= EXPLORER ?></a></span> </div>
				<? }?>
		      <div class="content_step">
				<? require('partial/default/jacob_questions.php') ?>
				</div>
        <div class="content_jb"> <div class="step_3 step <?= $lang_short ?>"></div>
          <div class="page">
            <div class="top"></div>
            <div class="middle_content">
              <div class="title">STEP 3 <span class="red_font"><?= mb_strtoupper(TEXT_TITLE_JACOB3) ?></span></div>
              							<form name="step3b" method="post" action="step3b.php"> 
															<input type="hidden" id="language" value="<?= ($language_id == 2 ? 'NL' : 'FR') ?>"/>
															<input type="hidden" maxlength="6" class="form9" id="housenum"/>
															<input type="hidden" id="country2" value="BE"/>
	
															<fieldset>
																<table class='step2form' cellpadding="2" cellspacing="0" border="0" align="center" width="100%">
																	<tr>
																		<td align="right" width="145"><span class="explain_text"><?= TEXT_TITLE ?> <span class="asterisk_step">*</span></span></td>
																		<td align="left" class="explain_text_gender" width='220'>

																			<span>
																				<?php  	
																			if ( $gender=='f'){$checked='checked';}else{$checked='';}						
																			echo '<input name="gender" type="radio" value="f" '.$checked.'>';

																			echo TEXT_FEMALE;																		
																			?>
																		</span>

																		<span>
																			<?php  	
																		if (empty($gender) || $gender=='m'){$checked='checked';}else{$checked='';}							
																		echo '<input name="gender" type="radio" value="m" '.$checked.'>';

																		echo TEXT_MALE;					
																		?>
																	</span>


																</td>

																<td align="left" class="explain_text" width='140'></td>
															</tr>



														<?php   if($error_firstname==1){
															$error_first=TEXT_ERROR_FIRSTNAME;
															$class_first='step_input_error';
														}else{
															if($_POST['sent'] && $error_firstname==0){
																$error_first=' ';
																$class_first='step_input_ok';
															}else{
																$error_first='';
																$class_first='';
															}
														}
														?>

														<?php
														if($error_phone==1){
															$error_tel=TEXT_ERROR_PHONE;
															$class_tel='step_input_error';
														}else{
															if($_POST['sent'] && $error_phone==0){
																$error_tel=' ';
																$class_tel='step_input_ok';
															}else{
																$error_tel='';
																$class_tel='';
															}
														}					
														?>
														<tr>
															<td align="right">
																<span class="explain_text"><?php   echo TEXT_CLIENT_PHONE  ;?> <span class="asterisk_step">*</span></span>
															</td>
															<td>
																<input class="new_step_input" type="text" autocomplete="off" name="phone" id="phone" value="<?php echo $phone;?>">
															</td>
															<td align="left" class="explain_text">
																<div id='check_phone' class="<?= $class_tel ?>"><div id="text"><?= $error_tel ?></div> </div>
															</td>
														</tr>
														<tr>
															<td align="right">
																<span class="explain_text"><?php   echo TEXT_CLIENT_FIRST_NAME  ;?> <span class="asterisk_step">*</span></span>							
															</td>
															<td>
																<input class="new_step_input" id="firstname" autocomplete="off" type="text" name="firstname" value="<?php   echo stripslashes($firstname);?>">
															</td>
															<td align="left" class="explain_text">
																<div id='check_firsname' class="<?= $class_first ?>"><div id="text"><?= $error_first ?></div> </div>
															</td>
														</tr>

														<?php   
													if($error_lastname==1){
														$error_last=TEXT_ERROR_LASTNAME;
														$class_last='step_input_error';
													}else{
														if($_POST['sent'] && $error_lastname==0){
															$error_last=' ';
															$class_last='step_input_ok';
														}else{
															$error_last='';
															$class_last='';
														}
													}

													?>

													<tr>
														<td align="right">
															<span class="explain_text"><?php   echo TEXT_CLIENT_LAST_NAME  ;?> <span class="asterisk_step">*</span></span>
														</td>
														<td>
															<input class="new_step_input" id="lastname" autocomplete="off" type="text" name="lastname" value="<?php   echo stripslashes($lastname);?>">
														</td>
														<td align="left" class="explain_text">
															<div id='check_lastname' class="<?= $class_last ?>"><div id="text"><?= $error_last ?></div> </div>
														</td>
													</tr>


													<?php   
												if($error_birth==1){
													$error_birthday=TEXT_ERROR_BIRTH;
													$class_birthday='step_input_error';
												}else{
													if($_POST['sent'] && $error_birth==0){
														$error_birthday=' ';
														$class_birthday='step_input_ok';
													}else{
														$error_birthday='';
														$class_birthday='';
													}	
												}

												?>
												<tr height='45'>
													<td align="right">
														<span class="explain_text"><?php   echo TEXT_BIRTHDATE  ;?> <span class="asterisk_step">*</span></span>
													</td>

													<td>
														<select class="new_step_date"  id="day"  name="day">
															<?php  
														if ( $day==0  ){
															echo '<option value="0" selected="1" align="center">'.TEXT_DAY.'</option>';
														}	            	
														for($i=1; $i != 32 ; $i++){
															if ($i==$day){
																echo '<option value="'.$i.'" selected="1">'.$i.'</option>';
															}else{
																echo '<option value="'.$i.'" >'.$i.'</option>';
															}                	
														}
														?>               
													</select>
													<img src="<?php  echo DIR_WS_IMAGES ;?>blank.gif" width="3" border="0" >
													<select class="new_step_date"  name="month"  id="month">                
														<?php  
													if ( $month==0  ){
														echo '<option value="0" selected="1" align="center">'.TEXT_MONTH.'</option>';
													}	            	
													for($i=1; $i != 13 ; $i++){
														if ($i==$month){
															echo '<option value="'.$i.'" selected="1">'.$i.'</option>';
														}else{
															echo '<option value="'.$i.'" >'.$i.'</option>';
														}                	
													}
													?>               
												</select>
												<img src="<?php  echo DIR_WS_IMAGES ;?>blank.gif" width="4" border="0" >
												<select class="new_step_date"  name="year" id="year">
													<?php                 
												if ( $year==0  ){	            
													echo '<option value="0" selected="1" align="center">'.TEXT_YEAR.'</option>';
												}            	
												for($i=date('Y')-17; $i != 1920 ; $i--){	            	
													if ($i==$year){
														echo '<option value="'.$i.'" selected="1">'.$i.'</option>';
													}else{
														echo '<option value="'.$i.'" >'.$i.'</option>';
													}                	
												}
												?>               
											</select>
										</td>
										<td align="right" class="explain_text">
											<div id='check_birthday' class="<?= $class_birthday ?>"><div id="text"><?= $error_birthday ?></div> </div>
										</td>


									</tr>	
									<?php   
								if($error_street==1){
									$error_str=TEXT_ERROR_STREET;
									$class_str='step_input_error';
								}else{
									if($_POST['sent'] && $error_street==0){
										$error_str=' ';
										$class_str='step_input_ok';
									}else{
										$error_str='';
										$class_str='';
									}
								}

								?>
								<?php
							if(isset($_POST['sent']) && empty($_POST['postcode']))
							{
								$error_zip=TEXT_ERROR_POSTCODE;
								$class_zip='step_input_error';
							}else if($error_postcode!=0){
								$class_zip='step_input_error';
								switch ($error_postcode){
									case 1:
									$error_zip = TEXT_ERROR_POSTCODE;								
									break;
									case 2:
									$error_zip = TEXT_ERROR_POSTCODE;								
									break;
									case 3:
									$error_zip = TEXT_ERROR_POSTCODE;
									break;
									case 0:
									$error_zip = TEXT_ERROR_POSTCODE ;								
									break;								
								}
								} else if(isset($_POST['sent']) && $error_postcode==0){
									$error_zip=' ';
									$class_zip='step_input_ok';
								}else {
									$error_zip='';
									$class_zip='';
								}
								?>
								<tr>
									<td align="right">
										<span class="explain_text"><?php   echo TEXT_POST_CODE  ;?> <span class="asterisk_step">*</span></span>
									</td>
									<td>
										<input class="new_step_input" type="text" autocomplete="off" name="postcode" id="postcode" value="<?php echo $postcode ;?>">
									</td>
									<td align="left" class="explain_text">
										<div id='check_zip' class="<?= $class_zip ?>"><div id="text"><?= $error_zip ?></div> </div>
									</td>
								</tr>

								<?php   
							if($error_city==1){
								$error_cit=TEXT_ERROR_POSTCODE;
								$class_cit='step_input_error';
							}else{
								if($_POST['sent'] && $error_city==0){
									$error_cit=' ';
									$class_cit='step_input_ok';
								}else{
									$error_cit='';
									$class_cit='';
								}
							}

							?>

							<td align="right"><span class="explain_text"><?php   echo TEXT_CLIENT_CITY  ;?> <span class="asterisk_step">*</span></span></td>
							<td>

								<input class="new_step_input" type="text" name="city" id="city" value="<?php   echo stripslashes($city) ;?>">
							</td>
							<td align="right" class="explain_text">
								<div id='check_city' class="<?= $class_cit ?>"><div id="text"><?= $error_cit ?></div> </div>
							</td>
							</tr>
								<tr>
									<td align="right">
										<span class="explain_text"><?php   echo TEXT_CLIENT_STREET  ;?> <span class="asterisk_step">*</span></span>
									</td>
									<td>
										<input class="new_step_input" type="text" autocomplete="off" name="street_address" id="street_address" value="<?php   echo stripslashes($street_address);?>">
									</td>
									<td align="left" class="explain_text">
										<div id='check_street' class="<?= $class_str ?>"><div id="text"><?= $error_str ?></div> </div>
									</td>
								</tr>                


								



							<tr height="45">
								<td align="right">
									<span class="explain_text"><?php   echo TEXT_CLIENT_COUNTRY  ;?> <span class="asterisk_step">*</span></span>
								</td>
								<td>

									<select class="new_step_select"  name="country" id="country" >
									<?php  

								if($_POST['sent'] && $error_country==0){
									$error_count=' ';
									$class_count='step_input_ok';
								}else{
									$error_count='';
									$class_count='';
								}
								$country_sql ="SELECT countries_id, countries_name from countries where EntityID= ".ENTITY_ID;
								$country_query = tep_db_query($country_sql);

								while ($country_values =tep_db_fetch_array($country_query)){
									if ($country==$country_values['countries_id'] ){ $selected='selected="selected"';}
									else if(empty($country) && $country_values['countries_id']==21){ $selected='selected="selected"'; }
									else{ $selected='';	} 
									echo '<option value="'.$country_values['countries_id'].'" '.$selected.'>'.$country_values['countries_name'].'</option>';           	            	
								}
								?>        
							</select>
							</td>
							<td align="right" class="explain_text">
								<div id='check_country' class="<?= $class_count ?>"><div id="text"><?= $error_count ?></div> </div>
							</td>
							</tr>                 
							<tr>
								<td>&nbsp;</td>
								<td  class="asterisk_explain_step" colspan="2"><?php  echo TEXT_ASTERISK ;?></td>
							</tr>
							<tr>
								<td></td>
								<td colspan="2" align="left"><p>
									<INPUT type="checkbox" <?= (($_POST['sent'] && $error_conditions==0)?'checked="checked"':'')  ?> name="conditions" value='1'>

										<a class="blue_link" href="conditions.php" target="new"><?php  echo TEXT_HAVE_READ_CONDITIONS . '<br />';?></a></p>
									</td>
								</tr>
								<?php 
							if($error_conditions==1){ 
								$error_pay=TEXT_ERR0R_CONDITIONS;
								$class_pay='step_input_error_big2';
							}else{
								if($_POST['sent'] && $error_conditions==0){
									$error_pay='';
									$class_pay='';
								}else{
									$error_pay='';
									$class_pay='';
								}
							}		
							?>
							<tr> 
								<td></td>
								<td colspan="2" class="subscription_payement_footer"><div id='check_payment' class="<?= $class_pay ?>"><div id="text"><?= $error_pay ?><br /></div></div></td>
							</tr>
							<tr>
								<td></td>
								<td colspan='2'>

									<table cellpadding="2" class="padding_button">
										<tr>
											<td>
												<a class="sub_black_link2" href="/logoff.php"><?php  echo TEXT_CANCEL ;?></a>
											</td>
											<td>
												&nbsp;<img  src="/images/dvdpost_public/bg-top-nav-sep.gif"/>&nbsp;
											</td>
											<td>
												<input type="submit" name ="sent" value= "<?= SUBMIT ?>" class="button_step" />
											</td>
										</tr>
									</table>
								</td>
							</tr>
							</table>
							</fieldset>
							</form>
              </p>
            </div>
            <div class="end"></div>
          </div>
        </div>
				<div style="clear:both"></div>
      </div>
    </div>
  </div>

<div style='display:none'>
	<div id='error_first_text'><?= TEXT_ERROR_FIRSTNAME ?></div>
	<div id='error_last_text'><?= TEXT_ERROR_LASTNAME ?></div>
	<div id='error_birth_text'><?= TEXT_ERROR_BIRTH ?></div>
	<div id='error_address_text'><?= TEXT_ERROR_STREET ?></div>
	<div id='error_zip_text'><?= 	TEXT_ERROR_POSTCODE ?></div>
	<div id='error_country_text'><?= TEXT_ERROR_COUTRY ?></div>
	<div id='error_phone_text'><?= TEXT_ERROR_PHONE ?></div>
	<div id='error_street_number'><?= TEXT_ERROR_STREET_NUMBER ?></div>

</div>
