<!-- languages //-->
<?php 

  $msg_query = 'select count(*) total';
  $msg_query .= ' from payment_offline_request por';
  $msg_query .= ' where por.customers_id=' . $customer_id . ' and payment_offline_status not in (1,19,20,21)';
  $msg_query .= ' and date_add(date_added,INTERVAL 10 DAY)<curdate())';
  $msg_result = tep_db_query($msg_query);
  $msg = tep_db_fetch_array($msg_result);
  
if ($msg['total'] > 0) {

?>
          <tr>
            <td>



<?php 

    $link = 'messages_urgent.php';
    $resulting_text .= '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="166" id="message" align="middle"><param name="allowScriptAccess" value="sameDomain" />';
    $resulting_text .= '<param name="movie" value="/swf/' . KEY_LANGUAGE . '/message.swf" />';
    $resulting_text .= '<param name="quality" value="high" />';
    $resulting_text .= '<param name="bgcolor" value="#FCE3C6" />';
    $resulting_text .= '<embed src="/swf/message.swf" quality="high" bgcolor="#000000" width="166" name="message" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />';
    $resulting_text .= '</object>';

    $info_box_contents = array();
    $info_box_contents[] = array('align' => 'center',
                               'text'  => $resulting_text
                              );


  new infoBox($info_box_contents);

?>
            </td>
          </tr>
<?php 
}
?>
<!-- languages_eof //-->