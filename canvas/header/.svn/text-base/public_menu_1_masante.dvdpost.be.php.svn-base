<?php 
	include(DIR_WS_INCLUDES . 'functions/language_switcher.php');
	?>   
<table align="right" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td class="yellowlink" height="25" align="right" valign="middle">
		<?php 
		if (!tep_session_is_registered('customer_id')) {
			echo '<a href="login.php" class="yellowlink">'.HEADER_TITLE_LOGIN.'</a>&nbsp;&nbsp;|&nbsp;&nbsp;';
		}					
		
		?><a href ="/faq.php" class="yellowlink"><?php  echo TEXT_HELP ;?>
		</td>
	</tr>
	<tr>
		<td align="right">
		<?php 
		if (!tep_session_is_registered('customer_id')) {
			
		}else{
			?>
				<a href="/logoff.php" target="_self" class="yellowlink"><?php  echo TEXT_MEMBER_LOGOFF;?></a><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3">
			<?php 
		}
		?>
	<tr>
</table>
