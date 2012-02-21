<table width="122" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="24" colspan="2" align="center" valign="middle" background="<?php  echo DIR_WS_IMAGES;?>menu_background_title2.gif" class="SLOGAN_MENU2"><b class="SLOGAN_MENU">Top</b><?php  echo TXT_ACTORS;?> </td>
  </tr>
  <tr>
    <td width="19" rowspan="2">&nbsp;</td>
    <td width="103"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="15" height="10"></td>
  </tr>
  <tr>
    <td class="SLOGAN_MENU">
		<?php 
		//BEN001 $top_query = tep_db_query('select actors_id, actors_name from   ' . TABLE_ACTORS . ' where top_actors = 1 order by rand() limit 6');
		$top_query = tep_db_query('select actors_id, actors_name from   ' . TABLE_ACTORS . ' where top_actors = 1 and actors_type = "DVD_NORM" order by rand() limit 6'); //BEN001
		while ($top = tep_db_fetch_array($top_query)) {
				?>
			<a href="actors.php?actors_id=<?php  echo $top['actors_id'];?>" class="link_SLOGAN_MENU2"><?php  echo $top['actors_name'];?> </a><br>
           <?php 
				}
				?>
    	</td>
  </tr>
</table>