<div class="main-holder">

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
	
	
    <td class="how_explain_actor" valign="top">
	<table width ="100%">
		<tr>
				<td class="TYPO_ROUGE_ITALIQUE" width="930" valign="top"><?= TEXT_SURVEY ?></td>
		</tr>
	</table>
<?php
	switch($action)
	{
		case 2:
			echo end_action();
		break;
		
		case 1:
		default:
			echo form($language);
	}
	function form($language)
	{
		return '<br /><br /><form action="survey.php" method="post">
		<table width ="80%" align="center">
			<tr>
					<td>'.TEXT_Q1.'</td>
			</tr>
			<tr>
					<td><textarea name="q1" rows="5" cols="100"></textarea></td>
			</tr>
			<tr>
					<td><br /><br />'.TEXT_Q2.'</td>
			</tr>
			<tr>
					<td><textarea name="q2" rows="5" cols="100"></textarea></td>
			</tr>
			<tr>
					<td align="right"><input type="image" src="/images/www3/languages/'.$language.'/images/buttons/button_send_style2.gif" name="ok" value="submit" /></td>
			</tr>
		</table>	
		</form>';
	}
	function end_action()
	{
		return '<br /><br /><br /><div style="font-size:16px">'.TEXT_TX.'</div><br /><br /><br />';
	}
?>
	
	</td>
	</tr>

</table>

</div>

