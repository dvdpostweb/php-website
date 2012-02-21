<?php 
?>
<!-- offer //-->
          <tr>
            <td>
<?php 
  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                               'text'  => BOX_HEADING_THEMATIC
                              );
  new infoBoxHeading($info_box_contents, false, false);

  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                               'text'  => '- <a href="' . tep_href_link(FILENAME_SCORSESE, '', 'NONSSL') . '">' . BOX_THEME_SCORSESE . '</a><br>- <a href="' . tep_href_link(FILENAME_OSCAR, '', 'NONSSL') . '">Oscars</a><br><table width=100%><tr><td align=center><a href="' . tep_href_link(FILENAME_OSCAR, '', 'NONSSL') . '"><img src="' . DIR_WS_IMAGES . '/oscars.gif" width="56" height="80" border=1 bordercolor="white"></a></td></tr></table></a><br>'
										  
                              );
  new infoBox($info_box_contents);
?>
            </td>
          </tr>
<!-- textbox_eof //-->

