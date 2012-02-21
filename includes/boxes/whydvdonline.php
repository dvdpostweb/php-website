<?php 
?>
<!-- offer //-->
          <tr>
            <td>
<?php 
  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                               'text'  => BOX_HEADING_WHYDVDONLINE
                              );
  new infoBoxHeading($info_box_contents, false, false);

  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                               'text'  => '' . BOX_OFFER_WHYDVDONLINE . '<br>'
                              );
  new infoBox($info_box_contents);
?>
            </td>
          </tr>
<!-- textbox_eof //-->

