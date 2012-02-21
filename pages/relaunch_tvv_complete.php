<?php 
$abo_next ='SELECT pa.products_id, p.products_price, pa.qty_credit, pa.qty_at_home FROM products p ';
$abo_next .='LEFT JOIN products_abo pa ON pa.products_id = p.products_id LEFT JOIN customers c ON c.customers_next_abo_type = p.products_id WHERE c.customers_id ='.$customer_id ;
$abo_next_query = tep_db_query($abo_next);
$abo_next_values = tep_db_fetch_array($abo_next_query);
//SELECT products_id FROM products WHERE products_id >16 AND products_type = 'ABO' AND products_id NOT LIKE 20 
?>
	
<table width="677" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr align="left"> 
    <td colspan="3" height="50" valign="bottom" class="limitedexplain">&nbsp;</td>
  </tr>
  <tr> 
    <td width="169" rowspan="6" align="left" valign="middle" class="limitedexplain"> 
      <table width="140" border="0" cellpadding="0" cellspacing="0" >
        <tr> 
          <td width="140" height="20" align="center" valign="bottom">&nbsp;</td>
        </tr>
        <tr> 
          <td width="140" align="center" valign="bottom"><img src="<?php  echo DIR_WS_IMAGES ;?>limited/subscription/<?php  echo $abo_next_values['qty_credit'];?>.gif" width="116" ></td>
        </tr>
        <tr> 
          <td height="142" align="center" valign="middle" background="<?php  echo DIR_WS_IMAGES ;?>limited/bckg_limited.jpg"> 
            <table height="103" width="90%" align="center" valign="middle">
              <tr> 
                <td height="30" align="center" valign="bottom" class="limiteddvdnumber"><?php  echo $abo_next_values['qty_credit'];?> 
                  <?php  echo TEXT_DVDS ;?> </td>
              </tr>
              <tr> 
                <td height="18" align="center" valign="top" class="guarantee"><?php  echo TEXT_WARANTY2 ;?></td>
              </tr>
              <tr> 
                <td height="30" align="center" valign="middle" class="limitedprice"> 
                  <?php  
									$price=str_replace('.',  '<sup><span class="limitedpricemini ">.' , $abo_next_values['products_price']);
									echo '&euro;'.$price.'</span></sup>';
									?>
                </td>
              </tr>
              <tr> 
                <td height="25" align="center" valign="middle"  class="guarantee"> 
                  <?php  
									$send_at_home= TEXT_DVD_SENT_AT_HOME ;
									$send_at_home=str_replace('µµµcountµµµ',  $abo_next_values['qty_at_home'] , $send_at_home);
									echo $send_at_home;
									?>
                </td>
              </tr>
            </table></td>
        </tr>
      </table></td>
    <td width="24" rowspan="3" align="left" valign="middle">&nbsp;</td>
    <td width="484" height="20" class="limitedathome">&nbsp;</td>
  </tr>
  <tr>
    <td class="limitedexplain" valign="middle"><strong><?php  echo TEXT_YOUR_NEXT_FORMULA ;?></strong></td>
  </tr>
  <tr> 
    <td height="142" class="limitedathome" valign="middle"> 
      	<?php  
		$customers = tep_db_query("select DATE_FORMAT( customers_abo_validityto,  '%e/%m/%Y '  ) as date_x from " . TABLE_CUSTOMERS. " p where p.customers_id= '".$customer_id."'");
		$customers_values = tep_db_fetch_array($customers);		
		$change2= TEXT_CHANGE_EXPLAIN ;
		$change2=str_replace('µµµdateµµµ',  $customers_values['date_x'] , $change2);
		$change2=str_replace('µµµdvd_creditµµµ',  $abo_next_values['qty_credit'] , $change2);
		echo $change2;			
		?>
      	<br><br>
      	<a href="mydvdpost.php" class="infolink"><?php  echo TEXT_CONTINUE ;?></a> </td>
  </tr>
</table>
<br><br>
<table width="677" height="100" border="0" cellpadding="0" align="center" cellspacing="0" bgcolor="#D7E4F4">
	        <tr align="center" valign="middle"> 
	          <td width="26" height="110"></td>
	          <td width="52"><img src="<?php  echo DIR_WS_IMAGES ;?>info_question.gif" width="52" height="52"></td>
	          <td width="247" height="100" align="center"> <table width="80%" border="0" cellspacing="0" cellpadding="0">
	              <tr> 
	                <td height="22" valign="middle" class="infotitle"><?php  echo TEXT_INFO_TITLE1 ;?></td>
	              </tr>
	              <tr> 
	                <td height="20"><a href="mydvdpost.php" class="infolink"><?php  echo TEXT_INFO_LINK1 ;?></a></td>
	              </tr>
	              <tr> 
	                <td height="20"><a href="how.php" class="infolink"><?php  echo TEXT_INFO_LINK2 ;?></a></td>
	              </tr>
	              <tr> 
	                <td height="20"><a href="faq.php" class="infolink"><?php  echo TEXT_INFO_LINK3 ;?></a></td>
	              </tr>
	            </table></td>
	          <td width="53"><img src="<?php  echo DIR_WS_IMAGES ;?>info_line.gif" width="2" height="85"></td>
	          <td width="52"><img src="<?php  echo DIR_WS_IMAGES ;?>info_phone.gif" width="52" height="52"></td>
	          <td width="247" align="center"><table width="80%" border="0" cellspacing="0" cellpadding="0">
	              <tr> 
	                <td height="22" valign="top" class="infotitle"><?php  echo TEXT_INFO_TITLE2 ;?></td>
	              </tr>
	              <tr> 
	                <td class="infotext"><?php  echo TEXT_INFO_PHONE ;?> 
	                <td> </tr>
	              <tr> 
	                <td height="20" class="infotext"><?php  echo TEXT_INFO_MAIL ;?></td>
	              </tr>
	            </table></td>
	        </tr>
	      </table>
