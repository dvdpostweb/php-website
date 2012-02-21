<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="13"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="2"></td>
  </tr>
  <tr align="center" valign="middle">
		<td   class="TAB_SELECT_ACTIVE">Tous </td>
		<td width="2"  class="TAB_SELECT_PASSIVE"><img src="<?php  echo DIR_WS_IMAGES;?>separator_dvdsearch.jpg" width="2" height="32"></td>
		<td width="557"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="2" height="2">  </td>
		<?php 
		$colspan = sizeof($column_list);
		$listing_split = new splitPageResults($HTTP_GET_VARS['page'], MAX_DISPLAY_SEARCH_RESULTS, $listing_sql, $listing_numrows);
		if ($listing_numrows > 0 && (PREV_NEXT_BAR_LOCATION == '1' || PREV_NEXT_BAR_LOCATION == '3')) {
			?>
			<td  width="114" align="center" class="SLOGAN_orange"><?php  echo $listing_split->display_links($listing_numrows, MAX_DISPLAY_SEARCH_RESULTS, MAX_DISPLAY_PAGE_LINKS, $HTTP_GET_VARS['page'], tep_get_all_get_params(array('page', 'info', 'x', 'y'))); ?></td>
			<?php 
		}
		?>
  </tr>

</table>
<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr bgcolor="#999999">
		<td width="73" height="30" bgcolor="#E5E5E5" class="TYPO_STD_BLACK" ><div align="center">Trié par: </div></td>
		<td width="658" height="30" bgcolor="#E5E5E5" class="TYPO_STD_BLACK"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><span class="TYPO_STD_BLACK_bold">Titre</span> <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="30" height="3"><a href="#" class="red_basiclink">Nouveaut&eacute;s</a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="30" height="3"><a href="#" class="red_basiclink">Sous-genre</a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="30" height="3"><a href="#" class="red_basiclink">Disponibilit&eacute;</a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="30" height="3"><a href="#" class="red_basiclink">L'avis du public</a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="30" height="3"><a href="#" class="red_basiclink">L'avis DVDPost</a> </td>
	</tr>
</table>

	