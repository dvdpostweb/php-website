<table width="731" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan=2 height="40" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE"><?php   echo HEADING_TITLE; ?></td>
  </tr>
  <tr>
    <td  colspan=2 height="6" colspan="3" valign="top"><div align="center"><img src="<?php   echo DIR_WS_IMAGES;?>line-it.gif" width="731" height="6"></div></td>
  </tr>
<?php if(empty($_POST['other'])){ ?>
  <tr>
    <td class="SLOGAN_DETAIL">
	
        <br>
		<?php   
		

		$custservfaq_query = tep_db_query("select * from " . TABLE_CUSTSERV_FAQ . " where language_id = '" . $languages_id . "' and custserv_faq_id = 0 ");
		$custservfaq = tep_db_fetch_array($custservfaq_query);
		echo $custservfaq['messages_html'];			
		?>
		<br><br>
		<li> <a class="custserv_link " href="custserproblemdvd.php"><?php   echo TEXT_DVDPROBLEM; ?></a></li>
		<br>
		<li> <a class="custserv_link " href="custserfact.php"><?php   echo TEXT_FACTPROBLEM; ?></a></li>
		<br>
		<li> <a class="custserv_link " href="custserdvdxy.php"><?php   echo TEXT_DVDXY; ?></a></li>
		<br>
		<li> <a class="custserv_link " href="custserdom.php"><?php   echo TEXT_DOM; ?></a></li>
		<br>
		<li> <a  class="custserv_link " href="custsercodes.php"><?php   echo TEXT_CODES; ?></a></li>
		<br>
		<li> <a  class="custserv_link " href="custseroffline.php"><?php   echo TEXT_OTHER; ?></a></li>
		<br>
		<li> <a class="custserv_link " href="account.php"><?php   echo TEXT_CHANGEPROFILE; ?></a></li>
		<br>
		<li> <a  class="custserv_link " href="address_book.php"><?php   echo TEXT_CHANGEADDRESS; ?></a></li>
		<br>
		<li> <a  class="custserv_link " href="account.php"><?php   echo TEXT_CHANGEEMAILPWD; ?></a></li>
		<br>
		<li> <a class="custserv_link " href="password_forgotten.php"><?php   echo TEXT_FORGOTPWD; ?></a></li>
		<br>
		<li> <a class="custserv_link " href="custservaddtitles.php"><?php   echo TEXT_ADDTITLES; ?></a></li>
		<br>
		<li> <a class="custserv_link " href="custservtecherror.php"><?php   echo TEXTTECHERROR; ?></a></li>
		<br>
		<li> <a class="custserv_link " href="holiday_form.php"><?php   echo TEXTHOLIDAY; ?></a></li>
	 </td>
  </tr>
  <tr>
	<td class='SLOGAN_DETAIL'>
		<br /><br /><?= TEXT_OTHER_ASK ?>
	</td>
  </tr>
  <tr>
	<td class='SLOGAN_DETAIL'><br /><br />
		<form name="form" method="post">
		<div align="center">
		<TEXTAREA id="other" name="other" rows="10" cols="80"></TEXTAREA>
		<br><br>
		<input name="imageField" type="image" src="<?php   echo DIR_WS_IMAGES;?>languages/<?php  echo $language;?>/images/buttons/button_send.gif" width="113" height="21" border="0">
		</div>
		</form>
	</td>
  </tr>
<?php }else{
		$custserv_message_query = tep_db_query("select * from " . TABLE_CUSTSERV_AUTO_ANSWER . " where language_id = '" . $languages_id . "' and custserv_auto_answer_id = 18 ");  
		$custserv_message = tep_db_fetch_array($custserv_message_query);
		
	    tep_db_query("INSERT INTO custserv (customers_id , language_id , custserv_cat_id , customer_date , message ) VALUES ('" . $customer_id . "', '" . $languages_id . "', '20', now(), '" .  strtr($HTTP_POST_VARS['other'],"'","''") . "')"); 
		echo '<tr><td><br /><br />';
		echo $custserv_message['messages_html'] . '<br>';
        echo '<br><br>';
        
        echo '<a class="red_slogan" href="default.php">' . TEXT_BACK . '</a>';
		echo '<br /><br /></td></tr>';
 }?>
</table>
<br>