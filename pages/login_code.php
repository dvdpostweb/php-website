<?php
if (isset($_GET['email_address'])){
	
	$email_address=$_GET['email_address'];
	
}else{
	$email_address=$_POST['email_address'];
}
if(empty($email_address))
	$email_address=$_COOKIE['email_address'];
if(empty($email_address) && tep_session_is_registered('customer_id'))
{
	$sql='select * from customers where customers_id ='.$customer_id;
	$query=tep_db_query($sql);
	$data=tep_db_fetch_array($query);
	$email_address=$data['customers_email_address'];
}
if (isset($_GET['code']))
	$code=$_GET['code'];
else
	$code=$_POST['code'];
if (isset($_GET['force']))
	$force=$_GET['force'];
else
	$force=$_POST['force'];

$color = '#ff0000';
if($code == 'chef')
{
  $color = '#000000';
  ?>
  <link rel="stylesheet" type="text/css" href="<?php echo getBestMatchToIncludeAny('/stylesheet/chef.css','.css'); ?>">
  <?
}
if($code == 'shadow')
{
  $color = '#fff';
  ?>
  <link rel="stylesheet" type="text/css" href="<?php echo getBestMatchToIncludeAny('/stylesheet/shadow.css','.css'); ?>">
  <?
}

?>


<style>

.hello {
background-repeat:no-repeat;
background-color:#ffffff;
}

.inputs_codes {
	background:#fff !important;
}

#promo_code {
padding-top:370px;
font-size:14px;
line-height:19px;
font-family:Arial, Helvetica, sans-serif;
text-align:center;
<?php
if($_GET['code']=='code31')
{
	echo 'background:url('.DIR_WS_IMAGES_LANGUAGES.$language.'/images/login_code/step31.jpg) center 0 no-repeat; ' ;
}
else
{
switch(WEB_SITE_ID){
	case 44:
		echo 'background-image:url('.DIR_WS_IMAGES_LANGUAGES.$language.'/images/hello/home.jpg);' ;
		break;
	case 45:
 		echo 'background-image:url('.DIR_WS_IMAGES_LANGUAGES.$language.'/images/welcome/home.jpg);' ;
 		break;

	default :
		$query_banner = tep_db_query("SELECT banner from discount_code where discount_code ='".$code."'");
		$query_banner2 = tep_db_query("SELECT banner from activation_code where activation_code ='".$code."'");
		
		if ($query_banner_values = tep_db_fetch_array($query_banner)){
			$img = explode(".", $query_banner_values['banner']);
			echo 'background-image:url('.DIR_WS_IMAGES_LANGUAGES.$language.'/images/login_code/'.$img[0].'.jpg) ; ' ;
		}else if ($query_banner_values = tep_db_fetch_array($query_banner2)){
			$img = explode(".", $query_banner_values['banner']);
			echo 'background-image:url('.DIR_WS_IMAGES_LANGUAGES.$language.'/images/login_code/'.$img[0].'.jpg); ' ;
		}else{
			echo 'background-image:url('.DIR_WS_IMAGES_LANGUAGES.$language.'/images/code/home.jpg); ' ;
		}
		
}}
?>
background-repeat:no-repeat;
background-position: center 0
}
#promo_code.univers, #promo_code.svod, #promo_code.moisfocb, #promo_code.moisnocb, #promo_code.moisfstb, #promo_code.moisnstb
{
background-color:black;
width: 950px;
margin: 10px;
padding-top:410px;
}
.intro_formule {
	text-align:left;
	width:630px;
	margin: 0 auto;
}
.univers .mdp,.svod .mdp, .moisfocb .mdp, .moisnocb .mdp, .moisfstb .mdp, .moisnstb .mdp
{
	color:white;
	text-align:right;
}
.univers .bl,.svod .bl, .moisfocb .bl, .moisnocb .bl, .moisfstb .bl, .moisnstb .bl
{
background: black !important;
border: none;
color: white;
}
.univers,.svod, .moisfocb, .moisnocb, .moisfstb, .moisnstb
{
	color:white;
}
.univers .contact,.svod .contact, .moisfocb .contact, .moisnocb .contact, .moisfstb .contact, .moisnstb .contact
{
	display:none;
}
.text_formule_hello {
font-size:20px;


}

.text_formule {
text-align:left;
width:630px;
margin: 0 auto;

}
.other-logos{
	display:none;
}
.button_relance
{
	background: url("http://www.dvdpost.be/images/relance012012/button.png") no-repeat scroll 0 0 transparent;
  border: medium none;
  color: white;
  cursor: pointer;
  font-size: 21px;
  font-weight: bold;
  height: 49px;
  margin-bottom: 30px;
  width: 299px;
}
.confirm
{
	background: url("http://www.dvdpost.be/images/blanck_button.jpg") no-repeat scroll 0 0 transparent;
	border: none;
	color: white;
	cursor: pointer;
	font-size: 19px;
	font-weight: bold;
	height: 43px;
	margin-bottom: 30px;
	width: 202px;
	line-height: 35px;
	padding-top: 7px;
	margin-top:35px;
}
.univers .explain, .svod .explain, .moisfocb .explain {
	font-size:0px;
}
.univers .up, .svod .up, .moisfocb .up {
	text-transform: uppercase;
}

</style>
<div class="main-holder">

<table width="970" border="0" cellpadding="0" cellspacing="0" bgcolor="ffffff" align="center">

<form name="form1" method="post" action="login_code.php?action=<?= ((tep_session_is_registered('customer_id'))?'process':'login').'&email='.$email.'&force='.$force ?>">
	<tr class="hello">
		<td width="773"  valign="top"  >
   
     
 			  	<div id="promo_code" class="<?= strtolower(preg_replace("/^[0-9]*/", "", $code)) ?>" >
<?php
if(strtolower($code)=="gfc50"){
?>
                    <div class="intro_formule">            
                    <p class="text_formule_hello"><?php echo TEXT_HELLO ;?></p>
                 	<p class="text_formule"><?php echo TEXT_INTRO ;?></p>
                 	<p class="text_formule"><?php echo TEXT_VALIDITY ;?></p>
                    <p class="text_formule"><?php echo TEXT_FACTURATION ;?></p>
                    </div>
<?php
}
?>
                    <p class="explain"><br /><br /><br /><br /><?php echo TEXT_STUDENT_EXPLAIN ;?></p>
                    <table cellspacing="0" cellpadding="0" border="0" align="center" width="450" style="margin:0 auto" id ="form_data">
											<?php if (($step=='90' || $force==1) && !empty($code))
											{
												echo '<tr><td align="left"  width="140"  height="35" valign="middle" class="slogan_detail">'.TEXT_CODE.'</td><td align="right" height="35" valign="middle"><input name="code" id="code" type="text" class="inputs_codes bl up" size="30" value="'.(($invisible!=1)?	$code : '' ).'" size="18" ></td></tr>';
											}
											?>
	                
					<?php 
          if (!tep_session_is_registered('customer_id')){
          echo '<tr><td align="left" width="150" height="35" valign="middle" class="slogan_detail">'.TEXT_EMAIL.'</td><td width="250" align="right" height="35" valign="middle"><input name="email_address" id="code" type="text" class="inputs_codes bl" size="30" value="'.$email.'" size="18" ></td></tr>';
          echo '<tr><td align="left" width="150" height="35" valign="middle" class="slogan_detail">'.TEXT_PASSWORD .'</td><td align="right" height="35" valign="middle"><input name="password" maxlength="40" value="'.$_POST['password'].'" type="password" id="code"  class="inputs_codes" size="30" value="" size="18" ></td></tr>';
          }else{
          echo '<tr><td align="left" width="150" height="35" valign="middle" class="slogan_detail ">'.TEXT_EMAIL.'</td><td align="right" height="35" valign="middle"><input name="email_address_disable" id="code" type="text" class="inputs_codes"  value="'.$email.'" disabled size="30" ><input name="email_address" id="code" type="hidden" value="'.$email.'" /></td></tr>';
          }
          ?>
					<tr><td colspan="2" class="slogan_detail" align='right'>
     <?php
    if ($login == 'fail') 
		{
			echo str_replace('#ff0000', $color,  TEXT_ERROR_LOGIN);
			echo str_replace('#ff0000', $color, TEXT_LOGIN_ERROR_EMAIL);
			echo '<a href="password_forgotten2.php?action=process&email='.$email.'&code='.$code.'&force='.$force.'&invisible='.$invisible.'"><font color="'.$color.'" class="mdp">'.TEXT_CLIC.'</font></a><br />';

		} 
		else if(!isset($_GET[info]))
		{
			if (!tep_session_is_registered('customer_id')){	
				echo str_replace('#ff0000', $color, TEXT_LOGIN_ERROR_EMAIL);
				echo '<a href="password_forgotten2.php?action=process&email='.$email.'&code='.$code.'&force='.$force.'&invisible='.$invisible.'"><font color="'.$color.'" class="mdp">'.TEXT_CLIC.'</font></a><br />';
			}
			
		}
		if (isset($_GET[info])) {
			echo TEXT_PASSWORD_SENT;
		}
		if ($allisok == 1) {
			echo CODE_ERROR;
		}
		else
		{
			echo $strreason;
		}
			?>
          </td></tr>
					<? if (strpos($code,'BGC') === 0) { ?> 
             <tr><td colspan="2" align="center"><p><input type="submit" class="button_relance" value="<?= CONFIRM_CHOICE ?>" name="sent">
					<? } else if (strpos($code,'univers') === 0 || strpos($code,'2moisfstb') === 0 || strpos($code,'2moisfocb') === 0 || strpos($code,'2moisnstb') === 0 || strpos($code,'2moisnocb') === 0) { ?>      
		         <tr><td colspan="2" align="center"><p><input type="submit" class="confirm" value="<?= CONFIRM_CHOICE2 ?>" name="sent">
					<? } else if (strpos($code,'svod') === 0) { ?> 
		         <tr><td colspan="2" align="center"><p><input type="submit" class="confirm" value="<?= CONFIRM_CHOICE2 ?>" name="sent">
 					<? } else if (strpos($code,'chef') === 0 || strpos($code,'jason') === 0 || strpos($code,'neol2012') === 0) { ?> 
 		         <tr><td colspan="2" align="right"><p><input class="no_border_button" name="imageField" type="image" src="<?php 
 						echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/login_code/chef/button_cmc.png'; ?>" align="absmiddle" border="0">
 					<? } else if (strpos($code,'shadow') === 0 || strpos($code,'taken2') >= 0 || strpos($code,'ted') >= 0 || strpos($code,'lorax') >= 0 || strpos($code,'law') >= 0) { ?> 
 		         <tr><td colspan="2" align="right"><p><input class="no_border_button" name="imageField" type="image" src="<?php 
 						echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/login_code/chef/button_cmc.png'; ?>" align="absmiddle" border="0">
					<? } else {?>
						 <tr><td colspan="2" align="right"><p><input class="no_border_button" name="imageField" type="image" src="<?php 
						echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/buttons/canvas/button_logocode.gif'; ?>" align="absmiddle" border="0">
            
					<? } ?>
						
					</p></td></tr></table><br /><br/>
                  	<?php
					if(strtolower($code)=="gfc50"){
					?>
                     <p class="text_formule"><?php echo TEXT_GFC50_CONTACT ;?></p>
                    
                     <p class="text_formule"><img src="/images/newsletters/conseils/signature_gaetan.gif"  alt="" width="166" height="81" border="0" align="top"></p>
					<p class="text_formule">Ga�tan Vanlaeke<br>Customer Service Manager</p>
                  	
                 <p class="text_formule"><?php echo TEXT_GFC50_FOOTER ;?></p>
                 <?php
				}
				?>
                 <p class='contact'><a href="contact.php"><img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/hello/phone.gif' ;?>" border="0" /></a></p>
                </div>
		</td>
	</tr>
	<input name="force" type="hidden"  value="<?= $force ?>">
	
	<input name="condition1" type="hidden" id="condition1" value="gift">
	</form>
	<?php
	$promo_footer=TEXT_FOOTER_EXPLAIN;
	$sql="SELECT  banner,footer,  date_format(discount_validityto,'%d/%m/%Y') as discount_validityto from discount_code WHERE discount_code ='".$_GET['code']."'";
	$code_explain = tep_db_query($sql);
	if ($code_explain_values = tep_db_fetch_array($code_explain)){
			if($code_explain_values['footer']=='FREETRIAL')
			{
				$promo_footer=TEXT_FOOTER_EXPLAIN;	
			}
			else
			{
				if(defined('TEXT_FOOTER_'.$code_explain_values['footer']))
					$promo_footer=constant('TEXT_FOOTER_'.$code_explain_values['footer']);
			}

			$promo_footer=str_replace("���date���",$code_explain_values['discount_validityto'],$promo_footer);
	  }else{
		$sql="SELECT  ac.banner,  activation_waranty,footer from activation_code ac WHERE  ac.activation_code ='".$_GET['code']."'";
		$activation_explain = tep_db_query($sql);
	  	if ($activation_explain_values = tep_db_fetch_array($activation_explain)){
			 	if ($activation_explain_values['activation_waranty']==0)
				{
					$promo_footer=TEXT_FOOTER_BYPASS_OGONE ;}
			 	else
				{

					$promo_footer=((defined('TEXT_FOOTER_'.$activation_explain_values['footer']))?constant('TEXT_FOOTER_'.$activation_explain_values['footer']):TEXT_FOOTER_OGONE);
					$promo_footer=str_replace("���date���",$activation_explain_values['discount_validityto'],$promo_footer);
				}

		}else
		{
			if ($step!='90') 
				$promo_footer=TEXT_FOOTER_CODE31;
		}	  
	  }
	?>
<tr><td>	<div id="step1_footer">
	<p>
	<?php  //echo $promo_footer ;?>
	</p>
	</div></td></tr>	
</table>   
     		
</div>
