<table width="122" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="24" colspan="2" align="center" valign="middle" background="<?php  echo DIR_WS_IMAGES;?>menu_background_title2.gif" class="SLOGAN_MENU2"><b class="SLOGAN_MENU">Top</b><?php  echo TXT_DIRECTORS;?> </td>
  </tr>
  <tr>
    <td width="19" rowspan="2">&nbsp;</td>
    <td width="103"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="15" height="10"></td>
  </tr>
  <tr>
    <td class="SLOGAN_MENU">
		<?php 
		$top_query = tep_db_query('select directors_id, directors_name from   ' . TABLE_DIRECTORS . ' where top_directors=1 order by rand() limit 6');
		while ($top = tep_db_fetch_array($top_query)) {
				?>
			<a href="directors.php?directors_id=<?php  echo $top['directors_id'];?>" class="link_SLOGAN_MENU2"><?php  echo $top['directors_name'];?> </a><br>
           <?php 
				}
				?>
    	</td>
  </tr>
</table>