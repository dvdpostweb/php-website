<tr> 
    <td width="12" height="10">&nbsp;</td>
    <td width="423" height="10" background="<?php   echo DIR_WS_IMAGES ;?>step/bckg_step2.gif" bgcolor="#FFFFFF" valign="top"> 
      <table align="center" cellspacing="0" cellpadding="0" border="0" width="90%">
        <form name="verify_form" method="post" action="<?php   $_SERVER['PHP_SELF'] ?>">
          <input  TYPE="hidden" VALUE="2" NAME="step">
          <tr> 
            <td height="30" colspan="4" align valign="middle" class="limitedtitle""left"><?php   echo TEXT_TITLE_STEP2 ;?></td>
          </tr>
          <?php   if($error_gender==1){
	        ?>  
	          <tr> 
	            <td colspan="4" height="12" align="center" class="step_title"><b><font color="red"><?php   echo TEXT_ERROR_GENDER ;?></font></b></td>
	          </tr>
	      <?php  } ?>		
          <tr>          	
            <td height="20" width="180" align="right" class="step_title"><?php   echo TEXT_MALE  ;?></td>
            <?php   if ($_POST['gender']=='m'){$checked='checked';}else{$checked='';} ?>
            <td align="left"><input name="gender" type="radio" value="m" <?php  echo $checked;?>></td>
            <td height="20" align="center" class="step_title"><?php   echo TEXT_FEMALE  ;?></td>
            <?php   if ($_POST['gender']=='f'){$checked='checked';}else{$checked='';} ?>
            <td align="left"><input name="gender" type="radio" value="f" <?php  echo $checked;?>></td>
          </tr>
          <tr> 
            <td height="12" colspan="4" align="right" class="step_title">&nbsp;</td>
          </tr>
          <?php   if($error_firstname==1){
	        ?>  
	          <tr> 
	            <td colspan="4" height="12" align="center" class="step_title"><b><font color="red"><?php   echo TEXT_ERROR_FIRSTNAME ;?></font></b></td>
	          </tr>
	      <?php  } ?>		
          <tr> 
            <td height="20" width="180" align="right" class="step_title"><?php   echo TEXT_CLIENT_FIRST_NAME  ;?></td>
            <td height="20" colspan="3" align="left" class="step_title"> <input class="step2_input" type="text" name="firstname" value="<?php   echo $firstname;?>"></td>
          </tr>
          <tr> 
            <td height="12" colspan="4" align="right" class="step_title">&nbsp;</td>
          </tr>
          <?php   if($error_lastname==1){
	        ?>  
	          <tr> 
	            <td colspan="4" height="12" align="center" class="step_title"><b><font color="red"><?php   echo TEXT_ERROR_LASTNAME ;?></font></b></td>
	          </tr>
	      <?php  } ?>
          <tr> 
            <td width="180" height="20" align="right" class="step_title"><?php   echo TEXT_CLIENT_LAST_NAME ;?></td>
            <td height="20" colspan="3" align="left" class="step_title"> <input class="step2_input" type="text" name="lastname" value="<?php   echo $lastname;?>"> 
            </td>
          </tr>
          <tr> 
            <td height="12" colspan="4" align="right" class="step_explain">&nbsp;</td>
          </tr>
          <tr> 
            <td height="30" colspan="4" align valign="middle" class="limitedtitle""left"><?php   echo TEXT_TITLE_ADDRESS ;?></td>
          </tr>
          <?php   if($error_street==1){
	        ?>  
	          <tr> 
	            <td colspan="4" height="12" align="center" class="step_title"><b><font color="red"><?php   echo TEXT_ERROR_STREET ;?></font></b></td>
	          </tr>
	      <?php  } ?>
          <tr> 
            <td width="180" height="20" align="right" class="step_title"><?php   echo TEXT_CLIENT_STREET ;?></td>
            <td height="20" colspan="3" align="left" class="step_title"> <input class="step2_input" type="text" name="street_address" value="<?php   echo $street_address;?>"></td>
          </tr>
          <tr> 
            <td height="12" colspan="4" align="right" class="step_explain">&nbsp;</td>
          </tr>
          <?php   if($error_postcode>0 ||$error_city==1){
	        ?>  
	          <tr> 
	            <td colspan="4" height="12" align="center" class="step_title">
	            	<b><font color="red">
	            	<?php   
	            		switch ($error_postcode){
							case 1:
								echo TEXT_ERROR_POSTCODE;								
								break;
							case 2:
								echo TEXT_ERROR_POSTCODE_LUX;								
								break;
							case 3:
								echo TEXT_ERROR_POSTCODE_NL;
								break;
						}
	            	?>
	            	</font></b>
	            </td>
	          </tr>
	      <?php  } ?>		
          <tr> 
            <td width="180" height="20" align="right" class="step_title"><?php   echo TEXT_POST_CODE ;?></td>
            <td height="20" align="left" > <input class="step_input_number" type="text" name="postcode" value="<?php   echo $postcode;?>"></td>
            <td height="20" align="right" class="step_title"><?php   echo TEXT_CLIENT_CITY ;?></td>
            <td height="20" align="left" ><input class="step_input_city" type="text" name="city" value="<?php   echo $city;?>"></td>
          </tr>
          <tr> 
            <td height="12" colspan="4" align="right" class="step_explain">&nbsp;</td>
          </tr>
          <?php   if($error_country==1 ){
	        ?>  
	          <tr> 
	            <td colspan="4" height="12" align="center" class="step_title"><b><font color="red"><?php   echo TEXT_ERROR_COUTRY ;?></font></b></td>
	          </tr>
	      <?php  } ?>
          <tr> 
            <td width="180" height="20" align="right" class="step_title"><?php   echo TEXT_CLIENT_COUNTRY ;?></td>
            <td height="20" colspan="3" align="left" class="step_title"> 
            	<select class="step2_select"  name="country">            		
            		<?php   if ($_POST['country']==$country_values['countries_id']){ $selected='selected="1"';} ?>
            		<option value="0" selected="1" align="center"><?php   echo TEXT_CHOSE ;?></option> 
	            	<?php  
	            	$country ="SELECT countries_id, countries_name from countries where EntityID= ".ENTITY_ID;
					$country_query = tep_db_query($country);			  
					while ($country_values =tep_db_fetch_array($country_query)){
						if ($_POST['country']==$country_values['countries_id']){ $selected='selected="1"';}
						else{ $selected='';	} 
						echo '<option value="'.$country_values['countries_id'].'" '.$selected.'>'.$country_values['countries_name'].'</option>';           	            	
	                }
					?>        
              </select>              
            </td>
          </tr>
          <tr> 
            <td height="20" colspan="4" align="left" valign="top" class="step_title">&nbsp;</td>
          </tr>
          <tr> 
            <td height="30" colspan="4" align valign="middle" class="limitedtitle""left"><?php   echo TEXT_TITLE_PHONE ;?></td>
          </tr>
          <?php   if($error_phone==1){
	        ?>  
	          <tr> 
	            <td colspan="4" height="12" align="center" class="step_title"><b><font color="red"><?php   echo TEXT_ERROR_PHONE ;?></font></b></td>
	          </tr>
	      <?php  } ?>
          <tr> 
            <td width="180" height="20" align="right" class="step_title"><?php   echo TEXT_CLIENT_PHONE ;?></td>
            <td height="20" colspan="3" align="left" class="step_title"> <input class="step2_input" type="text" name="phone" value="<?php   echo $phone;?>"></td>
          </tr>
          <tr> 
            <td height="12" colspan="4" align="right" class="step_explain">&nbsp;</td>
          </tr>
          <tr align="right"> 
            <td height="12" colspan="4" valign="bottom" class="step_title"> 
            	<input  TYPE="hidden" VALUE="1" NAME="sent">
            	<input name="submit" type="image" src="<?php   echo DIR_WS_IMAGES ;?>/languages/<?php   echo $language ;?>/images/buttons/button_step_continue.gif" border="0" value="submit"> 
            </td>
          </tr>
        </form>
      </table>
    </td>
    <td width="12" height="10">&nbsp;</td>
  </tr>