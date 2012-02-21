<?php 
?>
<!-- offer //-->
          <tr>
            <td>
<?php 
  $info_box_contents = array();
  
  $info_box_contents[] = array('align' => 'left',
                               'text'  => '<a href="' . tep_href_link('custserv_list.php', '', 'NONSSL') . '"><img src=" ' . DIR_WS_IMAGES_LANGUAGES . $language . '/images/buttons/custserv.gif" bordercolor="white" border=0 width="150"></a>' 										  
                              );

  new infoBox($info_box_contents);
?>
            </td>
          </tr>
<!-- textbox_eof //-->