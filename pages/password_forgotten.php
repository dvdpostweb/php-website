<style>
	.vtop{
		vertical-align:top;
	}
	.right{
		text-align:right;
	}
	.center{
		text-align:center;
	}
	
	.text_mail {
		font-size:15px;
		}
	.text_mail_foot{ 
	font-size:14px;
	text-align:center;
	}
	
	.text_mail_foot a{ 
	color:#128CCF;
	}
</style>
<div class="main-holder">
<table width="950" height="358" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE"><?php   echo HEADING_TITLE; ?></td>
  </tr>
  <tr class="vtop">
    <td class="main-removed">
	<br /><br />
<?php 
if ($HTTP_GET_VARS['action'] == 'process' && $error_password_form == 0) { 
	echo '<div class="text_mail_foot">'.TEXT_PASSWORD_SENT.'</div>';
}
else
{
?>
<form name="password_forgotten" method="post" action="<?php   echo '/'.FILENAME_PASSWORD_FORGOTTEN.'?action=process'; ?>">
		<table border="0" width="450" cellspacing="0" cellpadding="3" align="center">
          <tr>
            <td align="right" class="text_mail"><?php   echo ENTRY_EMAIL_ADDRESS; ?></td>
            <td class="SLOGAN_DETAIL"><input type="text" name="email_address" size="30" maxlength="96" value="<?php   echo $HTTP_COOKIE_VARS['email_address']; ?>"></td>
          </tr>
		<?php 
		  if ($error_password_form==1) {
		    echo '          <tr>' . "\n";
		    echo '            <td colspan="2" class="SLOGAN_DETAIL center"><b>' .  TEXT_NO_EMAIL_ADDRESS_FOUND . '</b></td>' . "\n";
		    echo '          </tr>' . "\n";
		  }
		?>
          <tr>
            <td colspan="2"><br><table border="0" cellpadding="0" cellspacing="0" width="450">
              <tr>
                
                <td align="right" width="258"><?php   echo tep_image_submit('button_continue_new.gif', IMAGE_BUTTON_CONTINUE); ?></td>
                <td align="left" class="sub_black_link" width="150"><img src="/images/blank.gif" height="3" width="10">
                                <img src="images/dvdpost_public/bg-top-nav-sep.gif" align="top" height="18" width="2">
                                <img src="/images/blank.gif" height="3" width="10">
<a href="<?php   echo '/'.FILENAME_LOGIN. '" class="sub_black_link">' .TEXT_CANCEL. '</a>'; ?></td>
              </tr>
              <tr>
              
              </tr>
            </table></td>
          </tr>


        </table></form>
<?php } ?>
		<div class="text_mail_foot"><?php   echo '<br><br>' . TEXT_LINK_TEL ; ?></div></td>    
  </tr>
</table>

</div>