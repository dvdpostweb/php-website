<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="13"><img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="14" height="2"></td>
  </tr>
  <tr align="center" valign="middle">  
		<td width="91"  class="TAB_SELECT_ACTIVE"><? echo TEXT_ALL;?></td>
		<td width="2"  class="TAB_SELECT_PASSIVE"><img src="<?php echo DIR_WS_IMAGES;?>separator_dvdsearch.jpg" width="2" height="32"></td>
		<td width="557"><img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="2" height="2">  </td>
		<?php
			if ($listing_numrows > 0 && (PREV_NEXT_BAR_LOCATION == '1' || PREV_NEXT_BAR_LOCATION == '3')) {
			?>
			<td  width="114" align="center" class="SLOGAN_orange"><?php echo $listing_split->display_links($listing_numrows, MAX_DISPLAY_SEARCH_RESULTS_PRIVATE, MAX_DISPLAY_PAGE_LINKS, $HTTP_GET_VARS['page'], tep_get_all_get_params(array('page', 'info', 'x', 'y'))); ?></td>
			<?php
			}
		?>
  </tr>
</table>
	   
  


