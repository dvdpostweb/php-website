<link href="http://www.dvdpost.be/images/relance012012/new.css" rel="stylesheet" type="text/css" />
<div class="main-holder">
<span class="title">

<h1><?php  echo TEXT_LOGIN_NEW_TITLE ;?> </h1></span>
<span class="SLOGAN_DETAIL ">
<?php
#echo $action;
#var_dump($check_customer);
switch($action)
{
	case 'start':
		form($check_customer['customers_email_address'],$language);
	break;
	case 'error1':
		form($check_customer['customers_email_address'],$language,$_POST['new_pass'],$_POST['new_pass2'],1,$url_back);
	break;
	case 'error2':
		form($check_customer['customers_email_address'],$language,$_POST['new_pass'],$_POST['new_pass2'],2,$url_back);
		break;
	case 'error3':
			form($check_customer['customers_email_address'],$language,$_POST['new_pass'],$_POST['new_pass2'],3,$url_back);
	break;
	case 'finish':
		if(!empty($url_back))
		{
			$url = '/rememberme.php?url='.rawurlencode($url_back);
			echo '<br /><br /><table border="0" width="700" align="center"><tr><td><div class="St_black_new"">'.str_replace('{{link}}', $url, TEXT_SUCESS2).'</div></td></tr></table><br /><br /><br />';
		}
		else
		{
			$url = '/rememberme.php?url='.rawurlencode('http://private.dvdpost.com/'.$lang_short);
			echo '<br /><br /><table border="0" width="700" align="center"><tr><td><div class="St_black_new"">'.str_replace('{{link}}', $url, TEXT_SUCESS2).'</div></td></tr></table><br /><br /><br />';
		}
	break;
}
?>
</span>
</div>
<?php
function form($email,$language='fr',$pass='',$pass2='',$error=0,$url_back=''){
	?>
	
	<form method="POST" id="form_login_new">
		<table border="0" width="700" align="center">
			<tr>
				<td>
					<div class="St_black_new"><?= ENTRY_EMAIL_ADDRESS ?></div>
				</td>
				<td>
					<div class="St_black_new"><?= $email ?></div>
				</td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td>
					<div class="St_black_new"><?= ENTRY_PASSWORD ?></div>
				</td>
				<td>
					<input name="new_pass" type="password" class="inputs_codes" size="35" value='<?= $pass; ?>'> <span class="St_black_new"><?= TEXT_CHAR ?></span>
				</td>
			</tr>
			
		<?php
		if ($error==1)
		{
			echo "<tr><td></td><td><div class='step1_input_error'><div id='text'>".TEXT_ERROR_PASSWORD.'</div></div></td></tr>';
		}
		if ($error==2)
		{
			echo "<tr><td></td><td><div class='step1_input_error' style='width:400px'><div id='text'>".TEXT_ERROR_DIFFERENT.'</div></div></td></tr>';
		}
		else if($error==3)
		{
			echo "<tr><td></td><td><div class='step1_input_error'><div id='text'>".TEXT_ERROR_PASSWORD_LONG.'</div></div></td></tr>';
		}
		?>
		<tr><td>&nbsp;</td></tr>
		<tr>
			<td>
				<div class="St_black_new"><?= ENTRY_PASSWORD_CONFIRMATION ?></div>  
			</td>
			<td>
				<input name="new_pass2"  type="password" class="inputs_codes" value="<?= $pass2; ?>" size="35">
				<input type="hidden" name="process" value="1">
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
		<?php 
			if (!empty($url_back)) 
				echo "<input type='hidden' name='url_back' value='".$url_back."' />";
			 
		?>
				<br /><input type="image" src="/images/www3/languages/<?= $language ?>/images/buttons/button_continue_new.gif" />
			</td>
		</tr>
		</table>
		
	</form>
	<?
}
?>