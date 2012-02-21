<?
if(SITE_ACCESS=="PUBLIC")
{
	$size='705';
	$input_size='35';
	
}
else
{
	$size='734';
	$input_size='40';
}
?>

<style>
.titre_movix {
font-family:Arial, Helvetica, sans-serif;
background:#1C1818 none repeat scroll 0 0;
color:#FFFFFF;
font-size:24px;
font-weight:normal;
line-height:35px;
margin:0 0 18px;
padding:0 0 0 10px;
text-align:left;}

.titre_code_movix {
font-family:Arial, Helvetica, sans-serif;
color:#FFFFFF;
font-size:18px;
font-weight:normal;
padding-top:10px;}

.TYPO_PROMO_MOVIX {
color:#FFFFFF;
font-size:13px;
padding-left:30px;;

}

.TITLE_PROMO_MOVIX{
padding-top:10px;
	padding-left:30px;
	color:#FFFFFF;
	font-size:14px;
	font-weight: bold;
	text-transform: uppercase;
	
}

</style>



<table width="<?= $size; ?>" border="0" align="center" cellpadding="0" cellspacing="0">

<tr>
		<td  height="40" align="center" ></td>
	</tr>
	<tr>
		<td class="titre_movix"><?php  echo TEXT_MENBER_ACCES;?></td>
	</tr>
	
	<tr>
		<td>
			<br>
			<table width="<?=  $size; ?>" align="center" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td class="slogan_detail">
						<?php  if ($mailsend==1) {
						 echo '<br>'.TEXT_MAIL_SEND.'<br><br>';
						}
						?>
						<table width="<?=  $size; ?>"  border="0" align="center" cellpadding="0" cellspacing="0"  bgcolor="#020001">
						<form name="form1" method="post" action="login_adultpwd_process.php">
							<tr>
								<td width="62%" align="center"  bgcolor="#020001" class="titre_code_movix"><?php  echo TEXT_MOVIX_PWD;?></td>
                                <?php 
								$nb=rand(1,6);
								//$nb=5;
								?>
								<td width="38%" colspan="3" rowspan="10"><img src="/images/www3/movix/girls/girl<?= $nb ?>.jpg"> </td>
							</tr>
							<tr>
								<td align="center" bgcolor="#020001">
									<table>
                                    <tr>
                                    <td>
										<input name="pwd" type="password" class="SLOGAN_DETAIL" id="pwd" size="<?= $input_size ?>" value="" autocomplete="off"></td>
                                        <td><input name="imageField" type="image" src="/images/www3/movix/bouton_go.gif" border="0"  valign="bottom"></td>
                                        </tr>
                                        </table>
                                        </td>
							</tr>
							
						</form>	
							<tr>
								<td width="62%" height="30" bgcolor="#020001" class="TYPO_PROMO_MOVIX"><br><?php  echo TEXT_IF_U_FORGOT ;?><br>
									<a href="login_adultpwd_forgot.php"><font color="#E90A8A"><?php  echo TEXT_CLICK_HERE;?></font></a>
								</td>
							</tr>
							
							<tr>
								<td height="25" valign="top" bgcolor="#020001" class="TITLE_PROMO_MOVIX"><?php  echo TEXT_ADVERTISMENT;?></td>
							</tr>
							<tr>
								<td height="25" valign="top" bgcolor="#020001" class="TYPO_PROMO_MOVIX"><?php  echo TEXT_ADV_PART_1;?><br></td>
							</tr>
							<tr>
								<td height="25" valign="top" bgcolor="#020001" class="TYPO_PROMO_MOVIX"><?php  echo TEXT_ADV_PART_2;?></td>
							</tr>
							
							<tr>
								<td width="62%" bgcolor="#020001" class="TYPO_PROMO_MOVIX" ><a href="http://www.cyberpatrol.com" target="_blank"><font color="#E90A8A">http://www.cyberpatrol.com</font></a><br>
									<a href="http://www.cybersitter.com" target="_blank" ><font color="#E90A8A">http://www.cybersitter.com</font></a><br>
									<a href="http://www.netnanny.com" target="_blank" ><font color="#E90A8A">http://www.netnanny.com</font></a><br>
									<a href="http://www.symantec.fr" target="_blank" ><font color="#E90A8A">http://www.symantec.fr</font></a><br>
									<a href="http://www.internetwatcher.com" target="_blank" ><font color="#E90A8A">http://www.internetwatcher.com</font></a>
								</td>
							</tr>
						</table>
					</td>	
				</tr>
				
			</table>
		</td>
	</tr>
</table>