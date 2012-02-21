<!-- languages //-->
          <tr>
            <td>
<?php 
  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                               'text'  => BOX_HEADING_MYWISHLIST
                              );
  new infoBoxHeading($info_box_contents, false, false);

//BEN001 $wl_query = tep_db_query("select count(wl_id) as cwlid from " . TABLE_WISHLIST . " where customers_id = '" . $customer_id . "' ");
$wl_query = tep_db_query("select count(wl_id) as cwlid from " . TABLE_WISHLIST . " where customers_id = '" . $customer_id . "' and wishlist_type = 'DVD_NORM' "); //BEN001
$wl = tep_db_fetch_array($wl_query);


  $wl_string = '<a href="mywishlist.php">' . BOX_WISHLIST_CONTENT . $wl['cwlid'] . ' DVD</a>';

  if ($wl['cwlid']<50){
  	$wl_string = $wl_string . '<br><img src="' . DIR_WS_IMAGES . 'attention.gif"><a href="how.php"><font color=red>' . BOX_WISHLIST_NOTSUFF .'</font></a>';	  
  }  
  
  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'center',
                               'text'  => $wl_string
                              );
  new infoBox($info_box_contents);
?>
            </td>
          </tr>
<!-- languages_eof //-->