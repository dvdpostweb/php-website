<?php 
?>
<!-- search //-->
          <tr>
            <td>
<?php 
  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                               'text'  => BOX_HEADING_SEARCH
                              );
  new infoBoxHeading($info_box_contents, false, false);

  $hide = tep_hide_session_id();
  $info_box_contents = array();
  $info_box_contents[] = array('form'  => '<form name="quick_find2" method="get" action="' . tep_href_link(FILENAME_ADVANCED_SEARCH_RESULT2, '', 'NONSSL', false) . '">',
                               'align' => 'center',
                               'text'  => $hide . '<input type="text" name="keywords" size="10" maxlength="30" value="' . htmlspecialchars(StripSlashes(@$HTTP_GET_VARS["keywords"])) . '" style="width: ' . (BOX_WIDTH-30) . 'px">&nbsp;' . tep_image_submit('button_go_search.jpg', BOX_HEADING_SEARCH) . '<br>' . BOX_SEARCH_TEXT . ''
                              );
  new infoBox($info_box_contents);
?>
            </td>
          </tr>
<!-- search_eof //-->
	 <form name="quick_find2" action="advanced_search_result2.php?keywords=<?php  echo $keywords; ?>" method="post" enctype="text/plain">
      <td width="115" height="23" valign="middle" bgcolor="#C4C4C4"><div align="center">
          <input name="keywords" type="text" class="TYPO_PROMO"  value="Rechercher un film" size="18">
      </div></td>
      <td width="44" valign="bottom" bgcolor="#C4C4C4"><input name="imageField" type="image" src="<?php  echo DIR_WS_IMAGES;?>button_go_search.jpg" align="bottom" width="39" height="24" border="0"></td>
    </form>
