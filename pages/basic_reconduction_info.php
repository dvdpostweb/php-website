<?php 
$customers = tep_db_query("select *  from " . TABLE_CUSTOMERS. " p where p.customers_id= '".$customer_id."'");  
$customers_values = tep_db_fetch_array($customers);

$products_abo_query = tep_db_query("select pa.qty_credit, pa.qty_at_home, pd.products_name from products_abo pa, products_description pd where pa.products_id = " . $customers_values['customers_next_abo_type']." AND pa.products_id=pd.products_id AND pd.language_id=".$customers_values['customers_language']);
$products_abo = tep_db_fetch_array($products_abo_query);
$DVD_credit= $products_abo['qty_credit'];
$DVD_at_home=$products_abo['qty_at_home'];
$ABO_name=$products_abo['products_name'];

$heading =HEADING_TITLE;
$heading = str_replace('µµµnameµµµ',  $ABO_name , $heading);
?>
			
<table width="<?php  echo SITE_WIDTH_PUBLIC; ?>" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE"><?php  echo $heading; ?></td>
  </tr>
  <tr>
	<td height="6" colspan="3" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.jpg" width="729" height="6"></div></td>
  </tr>
  <tr>
    <td colspan="2"  class="SLOGAN_DETAIL">
    	<div align="justify">
    		<?php  			
			if ($DVD_credit>0){
				if ($customers_values['customers_abo_dvd_credit']==0){
					$start_prolong = tep_db_query("select *, IF(DATE_ADD(date, INTERVAL 5 DAY) > curdate(),1,0) as chkdte from abo where action = 13 and customerid = '" . $customer_id . "' order by abo_id desc limit 1");
					$start_prolong_values = tep_db_fetch_array($start_prolong);
					if($start_prolong_values['chkdte']>0){
						$text_info = TEXT_WAIT_BASIC_WILL_BE_SOON_PROLONGATED;
						$text_info = str_replace('µµµnameµµµ',  $ABO_name , $text_info);
						echo $text_info;
					}else{
						$text_info = TEXT_INFORMATION;
						$text_info = str_replace('µµµnameµµµ',  $ABO_name , $text_info);
						$text_info = str_replace('µµµcreditµµµ',  $DVD_credit , $text_info);
						$text_info = str_replace('µµµdvd_at_homeµµµ',  $DVD_at_home , $text_info);
						echo $text_info;
						echo'<DIV align="center"><a href="basic_reconduction_process.php"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/button_confirm_update.gif" border="0"></a></div>';
					}
				}			
			}	        		
    		?>
			
    	</div>		
    </td>    
  </tr>
</table>