<table width="<?php  echo SITE_WIDTH_PUBLIC; ?> align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE"><?php  echo HEADING_TITLE; ?></td>
  </tr>
  <tr>
	<td height="6" colspan="3" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.jpg" width="729" height="6"></div></td>
  </tr>
  <tr>
    <td class="SLOGAN_DETAIL">
            <br>
			<?php  
            $customers_query = tep_db_query("select * from " . TABLE_CUSTOMERS . " where customers_id = '" . $customer_id . "' ");
			$customers = tep_db_fetch_array($customers_query);
			if ($customers[customers_abo_type] > 0){
				$abo_query = tep_db_query("select * from products_description where products_id = '" . $customers[customers_abo_type] . "'  and language_id = '" . $languages_id . "'");
				$abo = tep_db_fetch_array($abo_query);
				
				echo TEXT_CURRENTSUB;
				echo '<font color=#D32F30>' . $abo[products_name] . '</font>';			
				echo '<br>';
				echo '<br>';
				$date_validity= substr($customers['customers_abo_validityto'],0,10) ;
				$info_text = TEXT_INFORMATION;
				$info_text = str_replace('µµµdateµµµ',  $date_validity , $info_text);
				$info_text = str_replace('µµµnameµµµ', $customers['customers_firstname'] . ' ' . $customers['customers_lastname'] , $info_text);
				$info_text = str_replace('µµµcustomers_idµµµ', $customer_id , $info_text);
			    echo $info_text; 			
			}else{
				echo TEXT_NOABO;
			}		
			?>
    </td>    
  </tr>
</table>