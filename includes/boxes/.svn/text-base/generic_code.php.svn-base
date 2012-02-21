<?php 
?>
<!-- offer //-->
          <tr>
            <td>
<?php 
  $info_box_contents = array();
  
$subscription = tep_db_query("select *  from " . TABLE_CUSTOMERS. " p where p.customers_id= '".$customer_id."'");  
$subscription_values = tep_db_fetch_array($subscription);
if ($subscription_values['customers_abo'] == 0) {
      $textinside = "<div align='center' style='font-weight:bold;font-size:10px;margin-bottom:5px'>" . BOX_ENTRY_DISCOUNT_CODE . ":<br><form action='activation_code_confirm.php' method='post'><input type='text' name='code' id='code'><input type='submit' value='go'></form></div>";
      $info_box_contents[] = array('align' => 'left', 'text'  => $textinside);
      new infoBox($info_box_contents);
}
  
?>
            </td>
          </tr>
<!-- textbox_eof //-->