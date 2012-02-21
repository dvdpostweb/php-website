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
		return '<br /><br /><form action="nps.php" method="post">
		<table width ="80%" align="center">
			<tr>
					<td>'.TEXT_Q1.'</td>
			</tr>
			<tr>
					<td>
					<table border="0" align="center">
					<tr align="center">
					<td></td>
					<th>1</th><th>2</th><th>3</th><th>4</th><th>5</th><th>6</th><th>7</th><th>8</th><th>9</th><th>10</th>
					<td></td>
					</tr>
					<tr align="center"><td>'.TEXT_R_NO.'</td>
					<td><input type="radio" name="r1" value="1" />     </td>
					<td><input type="radio" name="r1" value="2" />     </td>
					<td><input type="radio" name="r1" value="3" />     </td>
					<td><input type="radio" name="r1" value="4" />     </td>
					<td><input type="radio" name="r1" value="5" />     </td>
					<td><input type="radio" name="r1" value="6" />     </td>
					<td><input type="radio" name="r1" value="7" />     </td>
					<td><input type="radio" name="r1" value="8" />     </td>
					<td><input type="radio" name="r1" value="9" />     </td>
					<td> <input type="radio" name="r1" value="10" />  </td>
					<td>'.TEXT_R_YES.'</td>
					</tr>
					</table>
					
					</td>
			</tr>
			<tr>
					<td><br /><br />'.TEXT_Q2.'</td>
			</tr>
			<tr>
					<td><textarea name="r2" rows="5" cols="100"></textarea></td>
			</tr>
			<tr>
					<td><br /><br />'.TEXT_Q3.'</td>
			</tr>
			<tr>
					<td><input type="checkbox" name="r3" /></td>
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

