<table width="<?php  echo SITE_WIDTH_PUBLIC; ?> align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" align="center" valign="middle" class="TYPO_ROUGE_ITALIQUE"><?php  echo HEADING_TITLE; ?></td>
  </tr>
  <tr>
	<td height="6" colspan="3" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.jpg" width="729" height="6"></div></td>
  </tr>
  <tr>
    <td class="SLOGAN_DETAIL">
            <?php  
            $customers_query = tep_db_query("select * from " . TABLE_CUSTOMERS . " where customers_id = '" . $customer_id . "' ");
			$customers = tep_db_fetch_array($customers_query);            

            $sub_discount_use_query = tep_db_query("select * from " . TABLE_DISCOUNT_USE . " where customers_id = '" . $customer_id . "'  order by discount_use_id desc limit 1");
			$sub_discount_use = tep_db_fetch_array($sub_discount_use_query);

            $sub_commitment_query = tep_db_query("select * from " . TABLE_DISCOUNT_CODE . " where discount_code_id = '" . $sub_discount_use['discount_code_id'] . "' ");
			$sub_commitment = tep_db_fetch_array($sub_commitment_query);
			
			switch($sub_commitment['discount_commitment']){
			case 0:
			$commit = 1;
			break;
			case 1:
			//$commit = 100000000;
			$commit = 2682000;
			break;
			case 2:
			//$commit = 200000000;
			$commit = 5364000;
			break;
			case 3:
			//$commit = 300000000;
			$commit = 8046000;
			break;
			case 4:
			//$commit = 400000000;
			$commit = 10728000;
			break;
			case 5:
			//$commit = 500000000;
			$commit = 13410000;
			break;
			case 6:
			//$commit = 600000000;
			$commit = 16092000;
			break;
			default:
			$commit = 1;
			break;
			}
			//100000000 = 1 mois 00 jours 00 h 00 min 00 sec!
            //$sub_discount_query = tep_db_query("select if((now() - date)>" . $commit . ", 0, 1) as ced from abo where customerid = '" . $customer_id . "' and (action = 6) order by date desc");
            $sub_discount_query = tep_db_query("select if((UNIX_TIMESTAMP(now()) - UNIX_TIMESTAMP(date))>" . $commit . ", 0, 1) as ced from " . TABLE_ABO . " where customerid = '" . $customer_id . "' and (action = 6) order by date desc");
            $sub_discount = tep_db_fetch_array($sub_discount_query);

            //$subchanged_query = tep_db_query("select if((now() - date)>100000000, 0, 1) as ced from abo where customerid = '" . $customer_id . "' and (action = 2 or action = 5) order by date desc");
            $subchanged_query = tep_db_query("select if((UNIX_TIMESTAMP(now()) - UNIX_TIMESTAMP(date))>2682000, 0, 1) as ced from " . TABLE_ABO . " where customerid = '" . $customer_id . "' and (action = 2 or action = 5) order by date desc");
            $subchanged = tep_db_fetch_array($subchanged_query);
            			
			if ($customers['customers_abo_type'] > $HTTP_GET_VARS['products_id']){
            	if (($subchanged['ced'] + $sub_discount['ced']) > 0) {
					echo TEXT_CANNOT_DOWN_BCUP; 
            	}else{
					$cust_name= $customers['customers_firstname'].' '.$customers['customers_lastname'] ;
					$info_text = TEXT_INFORMATION;
					$info_text = str_replace('µµµnameµµµ',  $cust_name , $info_text);
					echo $info_text; 
					?>
					<p>&nbsp;</p>
<form action="<?php  echo FILENAME_SUBSCRIPTIONSTOP_COMPLETE; ?>" method ="post" name="formstop">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="50%" valign="top" class="SLOGAN_DETAIL"><?php  echo TEXT_HOWEVER; ?> <br>
                          <br>
                          <INPUT id="youliked1" type="checkbox" name="youliked1">
                          <?php  echo TEXT_YOULIKED1 ;?><br>
                          <INPUT id="youliked2" type="checkbox" name="youliked2">
                          <?php  echo TEXT_YOULIKED2 ;?><br>
                          <INPUT id="youliked3" type="checkbox" name="youliked3">
                          <?php  echo TEXT_YOULIKED3 ;?><br>
                          <INPUT id="youliked4" type="checkbox" name="youliked4">
                          <?php  echo TEXT_YOULIKED4 ;?><br>
                          <INPUT id="youliked5" type="checkbox" name="youliked5">
                          <?php  echo TEXT_YOULIKED5 ;?><br>
                          <INPUT id="youliked6" type="checkbox" name="youliked6">
                          <?php  echo TEXT_YOULIKED6 ;?><br>
                          <br></td>
                        <td valign="top" class="SLOGAN_DETAIL">
						  <INPUT id="products_id" type="hidden" name="products_id" value="<?php  echo $customers['customers_abo_type']; ?>">
                          <?php  echo TEXT_WHY; ?> <br>
                          <br>
                          <INPUT id="whystop1" type="checkbox" name="whystop1">
                          <?php  echo TEXT_WHYSTOP1 ;?><br>
                          <INPUT id="whystop2" type="checkbox" name="whystop2">
                          <?php  echo TEXT_WHYSTOP2 ;?><br>
                          <INPUT id="whystop3" type="checkbox" name="whystop3">
                          <?php  echo TEXT_WHYSTOP3 ;?><br>
                          <INPUT id="whystop4" type="checkbox" name="whystop4">
                          <?php  echo TEXT_WHYSTOP4 ;?><br>
                          <INPUT id="whystop5" type="checkbox" name="whystop5">
                          <?php  echo TEXT_WHYSTOP5 ;?><br>
                          <INPUT id="whystop6" type="checkbox" name="whystop6">
                          <?php  echo TEXT_WHYSTOP6 ;?><br>
                          <INPUT id="whystop7" type="checkbox" name="whystop7">
                          <?php  echo TEXT_WHYSTOP7 ;?><br>
                          <INPUT id="whystop8" type="checkbox" name="whystop8">
                          <?php  echo TEXT_WHYSTOP8 ;?><br>
                          <INPUT id="whystop10" type="checkbox" name="whystop10">
                          <?php  echo TEXT_WHYSTOP10 ;?><br>
                          <INPUT id="whystop11" type="checkbox" name="whystop11">
                          <?php  echo TEXT_WHYSTOP11 ;?><br>
                          <INPUT id="whystop12" type="checkbox" name="whystop12">
                          <?php  echo TEXT_WHYSTOP12 ;?><br>
                          <INPUT id="whystop13" type="checkbox" name="whystop13">
                          <?php  echo TEXT_WHYSTOP13 ;?><br>
                          <INPUT id="whystop9" type="checkbox" name="whystop9">
                          <?php  echo TEXT_WHYSTOP9 ;?><br>
                          <br>
                          <TEXTAREA id="textareawhystop" name="textareawhystop" rows="6" cols="40"></TEXTAREA></td>
                      </tr>
                    </table>
  <div align="center"><br>				
					  <br>
					  <input type="image" src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language; ?>/images/buttons/button_confirm_end.gif">
  </div>
</form>
					<?php 
            	}
            }else{
				echo TEXT_INFORMATION; 
				echo '<br><br><a class="red_slogan" href="' . FILENAME_SUBSCRIPTIONSTOP_COMPLETE . '?products_id=' . $HTTP_GET_VARS['products_id'] . '"><img src="' . DIR_WS_IMAGES_LANGUAGES . $language . '/images/buttons/button_confirm_end.gif" border=0></a>';
            }
            //echo '<br><br><a class="red_slogan" href="mywishlist.php">' . TEXT_CANCEL. '</a>'; 
			?>    </td>    
  </tr>
</table>
