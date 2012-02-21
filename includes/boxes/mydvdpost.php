<?php 
?>
<!-- offer //-->
          <tr>
            <td>
<?php 
  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                               'text'  => '<a href="' . tep_href_link(FILENAME_MYDVDPOSTMENU, '', 'NONSSL') . '">' . BOX_MY_DVDPOST_MENU . '</a><br>'
                              );
  new infoBoxHeading($info_box_contents, false, false);

  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                               'text'  => '- <a href="' . tep_href_link(FILENAME_ACCOUNT, '', 'NONSSL') . '">' . BOX_MY_ACCOUNT . '</a><br>' .
                                          '- <a href="' . tep_href_link(FILENAME_ADDRESS_BOOK, '', 'NONSSL') . '">' . BOX_MY_DELIVERY_ADDRESS . '</a><br>' .
                                          '- <a href="' . tep_href_link(FILENAME_MYSUBSCRIPTION, '', 'NONSSL') . '">' . BOX_MY_ABO . '</a><br>' . 								      
                                          '- <a href="' . tep_href_link(FILENAME_MYWISHLIST, '', 'NONSSL') . '">' . BOX_MY_WISHLIST . '</a><br>' . 
                                          '- <a href="' . tep_href_link(FILENAME_MYRENTALS, '', 'NONSSL') . '">' . BOX_MY_HISTORY . '</a><br>' . 
										  '- <a href="' . tep_href_link('sponsoring.php', '', 'NONSSL') . '">' . BOX_SPONSORING . '</a><br>' .
										  '- <a href="' . tep_href_link('mysponsoring.php', '', 'NONSSL') . '">' . BOX_MY_SPONSORING . '</a><br>' .
                                          '- <a href="' . tep_href_link('custsersuggestdvd.php', '', 'NONSSL') . '">' . BOX_INFORMATION_SUGGESTIONS . '</a>'
										  
                              );
  new infoBox($info_box_contents);
?>
            </td>
          </tr>
<!-- textbox_eof //-->

