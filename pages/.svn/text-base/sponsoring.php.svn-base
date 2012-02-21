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
   				$query_customers = tep_db_query("select *  from " . TABLE_CUSTOMERS . " where customers_id= '".$customer_id."' ");  
				$query_customers_values = tep_db_fetch_array($query_customers);
	            echo TEXT_INFORMATION . '<br><br>';
	        
            if ($query_customers_values['customers_abo_type']>2){
	            echo TEXT_INFORMATION1;
		        ?>
	            <br><br>
	            <form action="sponsoring_process.php" method="post" >
	            <table align=center>                        
	            <tr><td class="slogan_detail">Email 1: </td><td ><input class="slogan_detail" type="text" name="email1" size=50></td></tr>
	            <tr><td class="slogan_detail">Email 2: </td><td ><input class="slogan_detail" type="text" name="email2" size=50></td></tr>
	            <tr><td class="slogan_detail">Email 3: </td><td ><input class="slogan_detail" type="text" name="email3" size=50></td></tr>
	            <tr><td class="slogan_detail">Email 4: </td><td ><input class="slogan_detail" type="text" name="email4" size=50></td></tr>
	            <tr><td class="slogan_detail">Email 5: </td><td ><input class="slogan_detail" type="text" name="email5" size=50></td></tr>
	            <tr><td class="slogan_detail" colspan=2 align="center">
					<input name="imageField" type="image" src="<?php echo DIR_WS_IMAGES_LANGUAGES . $language;?>/images/buttons/button_confirm_update.gif" width="113" height="21" border="0">
		    	</td>
	            </tr>
				
	            </table>
	            </form>
				<br>
	            <?php  echo TEXT_INFORMATION2; ?>            
	            <br><br>
	            <?php  
					echo ereg_replace("sssstr_namesss" , $query_customers_values['customers_firstname'] . " " . $query_customers_values['customers_lastname'], TEXT_EMAIL ); 
           }else{
	       		switch($query_customers_values['customers_abo_type']){
		       	case 2:
		       	echo TEXT_NOT_FOR_START;
		       	break;
		       	default:
		       	echo TEXT_NOT_FOR_NOABO;
		       	break;
		  		}
	       }
	       ?>
	   </td>    
  </tr>
</table>