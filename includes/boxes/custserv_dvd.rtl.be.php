<?php 
?>
<!-- offer //-->
          <tr>
            <td>
<?php 
  $info_box_contents = array();
  
  $info_box_contents[] = array('align' => 'left',
                               'text'  => '<a href="' . tep_href_link('custserv_list.php', '', 'NONSSL') . '"><img src=" ' . DIR_WS_IMAGES_LANGUAGES . $language . '/images/custserv_rtl.dvdpost.be.gif" bordercolor="white" border=0></a>' 										  
                              );

  new infoBox($info_box_contents);
?>
            </td>
          </tr>
<!-- textbox_eof //-->