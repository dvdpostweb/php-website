<?php 
?>
<!-- search //-->
          <tr>
            <td>
<?php 
  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                               'text'  => BOX_HEADING_DIRECTACCESS
                              );
  new infoBoxHeading($info_box_contents, false, false);

  $hide = tep_hide_session_id();
  $info_box_contents = array();
  $info_box_contents[] = array('form'  => '<form name="login" method="post" action="'.tep_href_link(FILENAME_LOGIN, 'action=process', 'SSL').'">',
                               'align' => 'center',
                               'text'  => $hide . '<table style="margin-top:5px;padding:1px;" border="0"><tr><td align="left" class=main>Email:</td><td><input type="text" name="email_address" size="10" maxlength="30" value="" style="width: 105 px"></td></tr><tr><td align="left" class=main>'. 
                               'Pass:</td><td><input type="password" name="password" size="10" maxlength="30" value="" style="width: 105 px"></td></tr></table>' . 
                               tep_image_submit('go.gif', BOX_HEADING_DIRECTACCESS) . '<br><hr><a href="create_account.php"><b>' . BOX_HEADING_CREATE_ACCOUNT . '</b></a>');
  new infoBox($info_box_contents);
?>
            </td>
          </tr>
<!-- search_eof //-->
