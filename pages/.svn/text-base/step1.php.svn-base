<!-- debut du CONTAINER -->
	<?php   
if(empty($_POST['email_address']))
	$_POST['email_address']=$_GET['email_address'];

$_POST['email_address']=trim($_POST['email_address']);
$code_explain = tep_db_query("SELECT  banner,footer,  date_format(discount_validityto,'%d/%m/%Y') as discount_validityto from discount_code WHERE discount_code ='".$activation_code."'");
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
			$promo_footer=TEXT_FOOTER_BYPASS_OGONE ;}
			else
			{

				$promo_footer=((defined('TEXT_FOOTER_'.$activation_explain_values['footer']))?constant('TEXT_FOOTER_'.$activation_explain_values['footer']):TEXT_FOOTER_OGONE);
				$promo_footer=str_replace("µµµdateµµµ",$activation_explain_values['discount_validityto'],$promo_footer);
			}

		}	  
	}

	$title_step=tep_ab_testing_verif(intval($_GET['var1']),0);
	$promo_align=tep_ab_testing_verif(intval($_GET['var2']),1);
	//$title_step_hello=tep_ab_testing_verif(intval($_GET['var3']),3);


	?>
	<?php  
if($error_pass==1)
{
	$error_pass=TEXT_ERROR_PASSWORD;
	$class_pass='step1_input_error';
}
else
{
	$error_pass=TEXT_CHAR;
	$class_pass='step1_input_info';	
}
?>
<div class="main-holder_step1">
	<table cellspacing="0" cellpadding="0" border="0" width="950">
		<tr>
			<td valign="top">
				<table cellspacing="0" cellpadding="0" border="0" width="950">
					<tr>
						<td valign="top">
							<!-- debut  guide dvdpost -->
							<?php require ('partial/step1/questions.php'); ?>
							<!-- fin  guide dvdpost -->

							<!-- debut SUBSCRIPTION -->



							<div class="content">
								<?php $step="step1"; ?>
								<?php require ('partial/step1/step.php'); ?>
								<h1><?= SIGN_UP ?></h1>
								<div id="step_container">
									
									<div class="free_trial">
										<?php 
										if($activation_discount_code_type=="D" && 	$discount_value>0)
										{
											echo '<div class="step_text"><p class="step_hello">'.TITLE_STEP_PAYING.'</p></div><div style="clear:both"></div>';	
										}
										else
										{
										?>
										<div class="step_text" id ="step1"><p class="step_hello"><?= TITLE_STEP_HELLO ?></p><p class="step_intro"><?= TEXT_STEP_INTRO ?></p></div>
										
										<div class="step_macaron2"><img src="/images/vod_step.jpg" /></div>
										<div style="clear:both"></div>
										<div class="promo"><span class="step_intro"><b class="block"><?= TEXT_ACTIVE_PROMO ?> :</b> 
											
											<? if ($promo_type == 'pre_paid'){?>
												<?= $period ?>
											<? } else if ($promo_type != 'unlimited') { ?>
											<strong><?= TRIAL ?></strong>: <?= $period ?>
											<? 
											}else{ 
											?>
											<? printf(UNLIMITED, $duration, $abo_dvd_credit) ?>
												
											<? } ?>
											</span>
										</div>
										<?php } ?>
									<!-- debut SUBSCRIPTION -->
									<div id="step_subscription_container">
										<div id="step_subscription_top">



										</div>		
										<div id="step_subscription<?=$promo_align?>">
											<table cellpadding="0" cellspacing="0" border="0" width="100%" align="center">
												<form name="verify_form" method="post" action="<?= $_SERVER['REQUEST_URI'] ?>" id="form_step"> 
													<tr><td colspan="2" height="10">&nbsp;</td></tr>
													<tr>
														<td><span class="step_title"> <?php  echo TEXT_EMAIL ;?></span></td>
													</tr>	
													<tr>
														<td class="step1_input">

															<p><input class="step_input" id='email' type="text" name="email_address_step" autocomplete="off" value="<?php  echo $_POST['email_address'] ;?>" /></p>
														</td>
														<td>
															<?php
														if($error_email==1){ 
															$error_email=str_replace(TEXT_ERROR_MAIL,'_email_',$_POST['email_address']);
															$class_email='step1_input_error step1_input_error_big_h text_big';
														}
														else if($error_email==2){
															$error_email=TEXT_ERROR_MAIL2;
															$class_email='step1_input_error';
														}else{
															$error_email=TEXT_EMAIL_EX;
															$class_email='step1_input_info';
														}
														?>
														<div id='check_email' class="<?= $class_email ?>"><div id="text"><?= $error_email ?></div> </div></td>
													</tr>




													<tr>
														<td>
															<span class="step_title"><?php  echo TEXT_PASSWORD ;?></span>
														</td>
													</tr>
													<tr>
														<td class="step1_input">

															<p><input class="step_input" id='password' type="password" name="password_step"  autocomplete="off" value="<?php  echo $_POST['password'] ;?>" /></p>
														</td>
														<td><div id='check_pass' class='<?= $class_pass ?>'><div id="text"><?= $error_pass ?></div> </div></td>
													</tr>

													<tr>
														<td><span class="step_title bleu"><?php  echo TEXT_PROMOCODE ;?></span></td>
													</tr>
													<tr>		
														<td class="step1_input">
															<p id="promo_code"><input class="step_input " type="text" name="code" value="<?= strtoupper($activation_code) ?>"  disabled="disabled" /></p>
														</td>
														<td><div class='step1_input_check' style='display:none'><div id="text">test</div> </div></td>
													</tr>


													<tr><td colspan="2" height="20" class="step1_input"><div style="padding-right:50px;"><input type='checkbox' name="marketing" type="text" class="Input1" checked='checked' value='YES'>
														<?php  echo TEXT_MARKETING_OK ?></div>
													</td></tr>
													<tr><td colspan="2" height="10">&nbsp;</td></tr>
													<tr>
														<td height="12" align="left" style="padding-left:30px;">
															<input  TYPE="hidden" VALUE="1" NAME="sent">
															<input  TYPE="hidden" VALUE="<?php  echo $activation_code ;?>" NAME="activation_code">
															<?php  if ($update==1){ 
																echo '<input  TYPE="hidden" VALUE="1" NAME="updated">';
																echo '<input  TYPE="hidden" VALUE="1" NAME="update">';
																}?>
																<input name="sent" value="<?= SUBMIT ?>" class="step31_image" type="submit" id="step1">

															</td>
															<td height="12" align="left"> 
																<!--<img src="<?php  echo DIR_WS_IMAGES ;?>languages/<?php  echo $language ;?>/images/buttons/canvas/logo_ogone_big.gif" border="0"  align="absbmiddle"></td>-->

															</tr>

														</form>
													</table>
												</div>
												<div id="step_subscription_bottom"></div>
											</div>	
											<!-- fin SUBSCRIPTION -->
											<div id="step1_footer">
												<p>
													<?php // $promo_footer ;?>
												</p>
											</div>
										</div>
										<!-- fin du CONTAINER -->

									</td>
								</tr>
							</table>
							<div style='display:none'>
								<div id ='email_abo'><?= TEXT_ERROR_MAIL ?></div>
								<div id ='email_not_abo'><?= str_replace('_code_', $activation_code, TEXT_NOT_ABO) ?></div>
								<div id ='error_emaail2'><?= TEXT_ERROR_MAIL2 ?></div>
								<div id='info_email'><?= TEXT_EMAIL_EX?></div>
								<div id='error_pass_short'><?= TEXT_ERROR_PASSWORD?></div>
								<div id='error_pass_long'><?= TEXT_ERROR_PASSWORD_LONG ?></div>
								<div id='info_pass'><?= TEXT_CHAR ?></div>
							</div>	
						</div>
					</td>
				</tr>
			</table>

</div>
