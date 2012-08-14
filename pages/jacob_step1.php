<link href="stylesheet/jb_styles.css" rel="stylesheet" type="text/css" />
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
	$error_pass='';
	$class_pass='step1_input_info';	
}
?>
<div class="jbwrapper">
  <div class="jbcontainer">
		<div id="container">
		<? if (strpos(strtoupper($activation_code),'BGC') === 0) { ?> 
			<div class="banner_step_relance" id="<?= $lang_short ?>" align="center">
				<p style="width: 400px;margin: 26px auto;"><?= $promotion ?></p>
			</div>
			<? }else {?>
	
      <div class="banner_title"><?= HUGE_CATALOG ?></div>

      <div class="banner_step" align="center">
        <p>
					<?= $promotion ?>
				</p>
        <span><a href="catalog.php" class="browse_button"><?= EXPLORER ?></a></span> 
			
			</div>
			<? } ?>
      <div class="content_step">
		<? require('partial/default/jacob_questions.php') ?>
		</div>
        <div class="content_jb"> <div class="step_1 step <?= $lang_short ?>"></div>
          <div class="page">
            <div class="top"></div>
            <div class="middle_content">
              <div class="title">STEP 1 <span class="red_font"><?= mb_strtoupper(TEXT_TITLE_JACOB1) ?></span></div>
              <table width="530" border="0" cellspacing="0" cellpadding="0" class="form_step">
								<form name="verify_form" method="post" action="<?= $_SERVER['REQUEST_URI'] ?>" id="form_step"> 
                <tr >
                  <td width="117" align="right" style="padding-right:8px;"><?= TEXT_EMAIL ?></td>
                  <td width="210" >
										<input class="step_input" id='email' type="text" name="email_address_step" autocomplete="off" value="<?php  echo $_POST['email_address'] ;?>" size="26" /></td>
                  <td width="173" ><div id='check_email' class="<?= $class_email ?>"><div id="text"><?= $error_email ?></div> </div></td>
                </tr>
                <tr>
                  <td colspan="3" scope="row" height="4px"></td>
                </tr>
                <tr>
                  <td align="right" style="padding-right:8px;"><?= TEXT_PASSWORD ?></td>
                  <td>
										<input class="step_input" id='password' type="password" name="password_step"  autocomplete="off" value="<?php  echo $_POST['password'] ;?>"  size="26" />
									</td>
                  <td><div id='check_pass' class='<?= $class_pass ?>'><div id="text"><?= $error_pass ?></div> </div><input  TYPE="hidden" VALUE="1" NAME="sent">
									<input  TYPE="hidden" VALUE="<?php  echo $activation_code ;?>" NAME="activation_code"></td>
                </tr>
                <tr>
                  <td></td>
                  <td colspan="2" class="step_text"><p><?php  echo TEXT_MARKETING_OK ?>
											<input type='checkbox' name="marketing" type="text" class="Input1" checked='checked' value='YES' align="top">
                    </p></td>
                </tr>
                <tr>
                  <td >&nbsp;</td>
                  <td colspan="2"><p>
                      <input type="submit" id="step1" class="button_step" value="<?= SUBMIT ?>" name="sent" />
                    </p></td>
                </tr>
								</form>
              </table>
            </div>
            <div class="end"></div>
          </div>
        </div>
				<div style="clear:both"></di>
				
        </div>
      </div>
    </div>
		<div style='display:none'>
			<div id ='email_abo'><?= TEXT_ERROR_MAIL ?></div>
			<div id ='email_not_abo'><?= str_replace('_code_', $activation_code, TEXT_NOT_ABO) ?></div>
			<div id ='error_emaail2'><? TEXT_ERROR_MAIL2 ?></div>
			<div id='info_email'></div>
			<div id='error_pass_short'><? TEXT_ERROR_PASSWORD?></div>
			<div id='error_pass_long'><? TEXT_ERROR_PASSWORD_LONG ?></div>
			<div id='info_pass'></div>
		</div>