<?php 
/*
  $Id: manufacturers.php,v 1.16 2002/05/27 13:25:51 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2001 osCommerce

  Released under the GNU General Public License
*/
?>
<!-- manufacturers //-->

<?php 
  $manufacturers_query = tep_db_query("select manufacturers_id, manufacturers_name from " . TABLE_MANUFACTURERS . " order by manufacturers_name");

  if (tep_db_num_rows($manufacturers_query) <= MAX_DISPLAY_MANUFACTURERS_IN_A_LIST) {
// Display a list
    $manufacturers_list = '';
    while ($manufacturers_values = tep_db_fetch_array($manufacturers_query)) {
      $manufacturers_list .= '<a href="' . tep_href_link(listing_category_adult.php, 'manufacturers_id=' . $manufacturers_values['manufacturers_id'], 'NONSSL') . '">' . substr($manufacturers_values['manufacturers_name'], 0, MAX_DISPLAY_MANUFACTURER_NAME_LEN) . '</a><br>';
    }

    $info_box_contents = array();
    $info_box_contents[] = array('align' => 'left',
                                 'text'  => $manufacturers_list								 
								 );
  } else {
// Display a drop-down
    $select_box = '<select class="TYPO_DROP_DOWN" name="manufacturers_id" onChange="this.form.submit();" size="' . MAX_MANUFACTURERS_LIST . '" style="width: 100%">';
    if (MAX_MANUFACTURERS_LIST < 2) {
      $select_box .= '<option value="">' . PULL_DOWN_DEFAULT . '</option>';
    }
    while ($manufacturers_values = tep_db_fetch_array($manufacturers_query)) {
      $select_box .= '<option value="' . $manufacturers_values['manufacturers_id'] . '"';
      if ($HTTP_GET_VARS['manufacturers_id'] == $manufacturers_values['manufacturers_id']) $select_box .= ' SELECTED';
      $select_box .= '>' . substr($manufacturers_values['manufacturers_name'], 0, MAX_DISPLAY_MANUFACTURER_NAME_LEN) . '</option>';
    }
    $select_box .= "</select>";
    $select_box .= tep_hide_session_id();

    $info_box_contents = array();
    $info_box_contents[] = array('form'  => '<form name="manufacturers" method="get" action="' . tep_href_link(FILENAME_MANUFACTURERS, '', 'NONSSL', false) . '">',
                                 'align' => 'left',
								 'text'  => $select_box
								 );
  }

  new infoBox($info_box_contents);
?>
<!-- manufacturers_eof //-->