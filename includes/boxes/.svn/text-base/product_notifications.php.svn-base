<!-- notifications //-->
          <tr>
            <td>
<?php 
  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                               'text'  => BOX_HEADING_NOTIFICATIONS);
  new infoBoxHeading($info_box_contents, false, false, tep_href_link(FILENAME_PRODUCT_NOTIFICATIONS, '', 'NONSSL'));

  $check_query = tep_db_query("select count(*) as count from " . TABLE_PRODUCTS_NOTIFICATIONS . " where products_id = '" . $HTTP_GET_VARS['products_id'] . "' and customers_id = '" . $customer_id . "'");
  $check = tep_db_fetch_array($check_query);

  $info_box_contents = array();
  if ($check['count'] > 0) {
    $info_box_contents[] = array('align' => 'left',
                                 'text'  => '<table border="0" cellspacing="0" cellpadding="2"><tr><td class="infoBoxContents"><a href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=notify_remove', 'NONSSL') . '">' . tep_image(DIR_WS_IMAGES . 'box_products_notifications_remove.gif', IMAGE_BUTTON_REMOVE_NOTIFICATIONS) . '</a></td><td class="infoBoxContents">' . sprintf(BOX_NOTIFICATIONS_NOTIFY_ON,tep_get_products_name($HTTP_GET_VARS['products_id'])) . '<br><a href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=notify_remove', 'NONSSL') . '">' . sprintf(BOX_NOTIFICATIONS_NOTIFY_REMOVE, tep_get_products_name($HTTP_GET_VARS['products_id'])) .'</a></td></tr></table>');
  } else {
    $info_box_contents[] = array('align' => 'left',
                                 'text'  => '<table border="0" cellspacing="0" cellpadding="2"><tr><td class="infoBoxContents"><a href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=notify', 'NONSSL') . '">' . tep_image(DIR_WS_IMAGES . 'box_products_notifications.gif', IMAGE_BUTTON_NOTIFICATIONS) . '</a></td><td class="infoBoxContents"><a href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=notify', 'NONSSL') . '">' . sprintf(BOX_NOTIFICATIONS_NOTIFY, tep_get_products_name($HTTP_GET_VARS['products_id'])) .'</a></td></tr></table>');
  }
  new infoBox($info_box_contents);
?>
            </td>
          </tr>
<!-- notifications_eof //-->