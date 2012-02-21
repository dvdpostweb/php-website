<?php 
	include(DIR_WS_INCLUDES . 'functions/language_switcher.php');
	?>   
<table align="right" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td class="yellowlink" height="25" align="right" valign="middle">
		<?php 
		if (!tep_session_is_registered('customer_id')) {
			echo '<a href="/login.php" class="yellowlink"><font color="white">'.HEADER_TITLE_LOGIN.'</font></a>&nbsp;&nbsp;';
		}
		?>	
		</td>
	</tr>
	<tr>
		<td align="right">
		<?php 
		if (!tep_session_is_registered('customer_id')) {
			
		}else{
			?>
				<a href="logoff.php" target="_self" class="yellowlink"><font color="white"><?php  echo TEXT_MEMBER_LOGOFF;?></font></a>&nbsp;&nbsp;
			<?php 
		}
		?>
	<tr>
</table>