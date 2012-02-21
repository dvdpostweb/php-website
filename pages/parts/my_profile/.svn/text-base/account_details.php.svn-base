<?php  
$customers = tep_db_query("select *  from " . TABLE_CUSTOMERS. " p where p.customers_id= '".$customer_id."'");  
$customers_values = tep_db_fetch_array($customers);

$address_book = tep_db_query("select *  from address_book where customers_id= '".$customer_id."' and address_book_id = '" . $customers_values['customers_default_address_id'] . "'");  
$address_book_values = tep_db_fetch_array($address_book);

$abo = tep_db_query("select *  from abo where customerid= '".$customer_id."' and (action = 1 or action = 6 or action = 8 or action =9 or action =10) order by abo_id desc limit 1");  
$abo_values = tep_db_fetch_array($abo);

if ($PHP_SELF == "/my_profile_adult.php"){	
	$img_top_left="top_left_recom2_x.gif";
	$img_top_line="top_line_recom2_x.gif";
	$img_top_right="top_right_recom2_x.gif";
}else{
	$img_top_left="top_left_recom2.gif";
	$img_top_line="top_line_recom2.gif";
	$img_top_right="top_right_recom2.gif";
}

?>
<table width="571" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="14"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/<?php  echo $img_top_left ;?>" width="14" height="25"></td>
    <td width="740" background="<?php  echo DIR_WS_IMAGES;?>img_recom/<?php  echo $img_top_line ;?>"class="SLOGAN_GRIS_13px"><?php  echo TEXT_ACCOUNT_DETAIL ?></td>
    <td width="10"><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/<?php  echo $img_top_right ;?>" width="14" height="25"></td>
  </tr>
  
  
  <tr>
    <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="330" height="25"class="SLOGAN_DETAIL">
		<b><?php  echo TEXT_EMAIL;?></b> : <?php  echo $customers_values['customers_email_address'] ; ?><br>
		(<a href="account.php" class="dvdpost_brown_underline"><?php  echo TEXT_MODIFY_ACCOUNT ;?></a>)<br>
        </td>
        <td rowspan="5">
			<table width="241"  border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="<?php  echo DIR_WS_IMAGES;?>shipping_top.gif"></td>
              </tr>
              <tr>
                <td align="left" valign="top" background="<?php  echo DIR_WS_IMAGES;?>shipping_mid.gif"><table width="216" border="0" align="right" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><span class="SLOGAN_GRIS_FONCE"> <b class="SLOGAN_DETAIL"><?php  echo TEXT_SHIPPING_ADDRESS;?> :</b> </span></td>
                  </tr>
                  <tr>
                    <td><span class="SLOGAN_GRIS_FONCE">
                      <?php 
				echo $address_book_values['entry_firstname'] ;
				echo ' ' ;
				echo $address_book_values['entry_lastname'] ;
				echo '<br>' ;
				echo $address_book_values['entry_street_address'] ;
				echo '<br>' ;
				echo $address_book_values['entry_postcode'] ;
				echo ' ' ;
				echo $address_book_values['entry_city'] ;
				if ($address_book_values['entry_country_id']=='124'){
					echo '<br>' ;
					echo 'Luxembourg' ;			
				}
				?>
                    </span></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="28" valign="bottom" background="<?php  echo DIR_WS_IMAGES;?>shipping_mid.gif"><span class="SLOGAN_GRIS_FONCE"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="85" height="3"><a href='address_book.php'><img src="<?php echo DIR_WS_IMAGES_LANGUAGES . $language;?>/images/buttons/button_change.gif" border=0></a></span></td>
              </tr>
              <tr>
                <td><img src="<?php  echo DIR_WS_IMAGES;?>shipping_bottom.gif"></td>
              </tr>
            </table></td>
      </tr>
        <?php  
        if($customers_values['customers_abo'] > 0){
	    ?>
      <tr>
        <td height="25"class="SLOGAN_DETAIL">
	      	<?php  	      	
	        echo '<b>' . TEXT_ABO_TYPE2 . '</b>: ';	 
			$products_abo_name_query = tep_db_query("select  products_name  from products_description where products_id = " . $customers_values['customers_abo_type']." AND  language_id=".$languages_id);
			$products_abo_name = tep_db_fetch_array($products_abo_name_query);
			echo $products_abo_name['products_name'];
	        echo '<img src="'.DIR_WS_IMAGES.'blank.gif" width="6" height="3">';
			//switch to another abo.
			//if ($customers_values['customers_abo_type']>16){
				$href="subscription_change_limited.php";			
			//}else{
			//	$href="subscription_change.php";
			//}
			echo '<a href="'.$href.'" class="dvdpost_brown_underline">' .  TEXT_CHANGE . '</a>';
			echo ' - <a href="holiday_form.php" class="dvdpost_brown_underline">' .  TEXT_SUSPEND . '</a>';
	        echo ' - <a href="subscription_stop.php" class="dvdpost_brown_underline">' .  TEXT_STOP . '</a>';
        ?>
        </td>
        </tr>
	  <tr>
        <td height="25"class="SLOGAN_DETAIL">
        	<b><?php  echo TEXT_ABO_DATE;?></b> : 
  	      	<?php  echo substr($abo_values['Date'],0,10); ?>
        </td>
      </tr>
	  <tr>
        <td height="25"class="SLOGAN_DETAIL">
        	<b>
        	<?php 
        	if ($customers_values['customers_abo_payment_method']<3 || $customers_values['customers_abo_payment_method']==20){
    	    	echo TEXT_NEXT_BILL;
	        }else{
	        	echo TEXT_VALIDTO;
        	} 
        	?>
        	 : 
        	</b>
        	<?php  echo  substr($customers_values['customers_abo_validityto'],0,10) ; ?>
        </td>
      </tr>
      <tr>
        <td height="25"span class="SLOGAN_DETAIL">
        	<b><?php  echo TEXT_PAYMENT_TYPE;?></b> : 
        	<?php  
        	switch($customers_values['customers_abo_payment_method']){
	        	case 1:
					echo TEXT_CC.' <br /><a href="/payment_method_change.php?payment=ogone_change" class="dvdpost_brown_underline">'.OGONE_CHANGE_ALIAS.'</a>';
					if ($customers_values['ogone_cc_expiration_status'] == 1) {
	    	    		$cc_expiration='Showit';
					}
				break;
	        	case 2:
	        		echo TEXT_DOM;
	        	break;
	        	case 3:
	        		echo TEXT_MANUAL;
	        	break;
	        	case 4:
	        		echo TEXT_ACTIVATION_CODE;
	        	break;
	        	case 5:
	        		echo TEXT_FRUCTIS_JUSFORYOU;
	        	break;
	        	case 6:
	        		echo TEXT_DOM_JUSFORYOU;
	        	break;
	        	case 9:
	        		echo TEXT_SPECTOR;
	        	break;
	        	case 18:
	        		echo TEXT_CARREFOUR;
				case 20:
		        		echo PAYMENT_METHOD_PHONE;
	        	break;
				case 21:
		        		echo PAYMENT_METHOD_PHONE;
	        	break;
				case 30:
		        		echo PAYMENT_METHOD_PHONE;
	        	break;
	        }
	        ?><br />
			<?php echo ' <a href="/payment_method_change.php" class="dvdpost_brown_underline">'.OGONE_CREATE_ALIAS.'</a>'; ?>
        </td>
      </tr>
        <?php 
	    }else{
		    if($customers_values['customers_abo_payment_method'] == 2 and $customers_values['domiciliation_status']<3){
			    ?>
			      <tr>
		        	<td height="25"class="SLOGAN_DETAIL">
		        		<?php  echo TEXT_DOM_PENDING;?>
			        </td>
		     	  </tr>	    
		    <?php 
			}else if($customers_values['customers_abo_payment_method'] == 20){
			?>	<tr>
		        	<td height="25"class="SLOGAN_DETAIL">
		        		<?php  echo TEXT_PHONE_PENDING;?>
			        </td>
		     	  </tr>
			<?php
			}else{
		    ?>
		      <tr>
	        	<td height="25"class="SLOGAN_DETAIL">
	        		<?php  
	        			echo TEXT_NO_ABO;
	        		?>	        		
		        </td>
	     	  </tr>	    
		    <?php 
			}
		}
		?>        
    </table></td>
    <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
  </tr>
  <tr>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif" width="14" height="14"></td>
    <td background="<?php  echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif" width="14" height="14"></td>
  </tr>
</table>
