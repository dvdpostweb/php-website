<tr> 
    <td width="12" height="10">&nbsp;</td>
    <td width="423" height="10" background="<?php  echo DIR_WS_IMAGES ;?>step/bckg_step2.gif" bgcolor="#FFFFFF"> 
      <table align="center" cellspacing="0" cellpadding="0" border="0" width="90%">
        <form name="verify_form" method="post" action="step1.php">          
          <input  TYPE="hidden" VALUE="1" NAME="step">
          <input  TYPE="hidden" VALUE="<?php  echo $_POST['products_id'] ;?>" NAME="products_id">
          <input  TYPE="hidden" VALUE="<?php  echo $_POST['discount_code_id'] ;?>" NAME="discount_code_id">
          <input  TYPE="hidden" VALUE="<?php  echo $activation_code ;?>" NAME="activation_code">
          <tr> 
            <td width="55%" height="50" class="limitedtitle"><?php  echo TEXT_START_HERE_NOW ;?></td>
            <td width="45%" class="limitedtitle">&nbsp;</td>
          </tr>
          <?php  if($error_email==1){
	        ?>  
	          <tr> 
	            <td colspan="2" height="12" align="center" class="step_title"><b><font color="red"><?php  echo TEXT_ERROR_MAIL ;?></b></font><br><a class="step_title" href="/login.php"><u><font color="red"><?php echo TEXT_CLICK_TO_LOG ;?></font></u></a><br><br></td>
	          </tr>
	      <?php } ?>
	      <?php  if($error_email==2){
	        ?>  
	          <tr> 
	            <td colspan="2" height="12" align="center" class="step_title"><b><font color="red"><?php  echo TEXT_ERROR_MAIL2 ;?></font></b></td>
	          </tr>
	      <?php } ?>
          <tr> 
            <td height="20" align="right" class="step_title"><?php  echo TEXT_EMAIL ;?></td>
            <td height="20" align="left"><input class="step_input " type="text" name="email_address" value="<?php  echo $_POST['email_address'] ;?>"></td>
          </tr>
          <tr> 
            <td height="12" align="right" class="step_title">&nbsp;</td>
            <td height="12" align="left" class="step_explain">ex: alain.dupont@hotmail.com</td>
          </tr>
          <tr> 
            <td colspan="2" height="12" align="right" class="step_title">&nbsp;</td>
          </tr>
          <?php  if($error_pass==1){
	        ?>  
	          <tr> 
	            <td colspan="2" height="12" align="center" class="step_title"><b><font color="red"><?php  echo TEXT_ERROR_PASSWORD ;?></font></b></td>
	          </tr>
	      <?php } ?>
          <tr> 
            <td height="20" align="right" class="step_title"><?php  echo TEXT_CREATE_PASSWORD ;?></td>
            <td height="20" align="left" >
            	<input class="step_input " type="password" name="password" value="<?php  echo $_POST['password'] ;?>">
            </td>
          </tr>
          <tr> 
            <td height="12" align="right" class="step_title">&nbsp;</td>
            <td height="12" align="left" class="step_explain"><?php  echo TEXT_CHAR ;?></td>
          </tr>
          <tr> 
            <td colspan="2" height="12" align="right" class="step_explain">&nbsp;</td>
          </tr>
          <tr> 
            <td height="20" align="right" class="step_title"><?php  echo TEXT_CONFIRM_PASSWORD ;?></td>
            <td height="20" align="left" ><input class="step_input" type="password" name="password2" value="<?php  echo $_POST['password2'] ;?>"></td>
          </tr>
          <tr> 
            <td height="25" align="right" class="guarantee">&nbsp;</td>
            <td height="25" align="left" class="guarantee">&nbsp;</td>
          </tr>          
          <?php  if($error_birth==1){
	        ?>  
	          <tr> 
	            <td colspan="2" height="12" align="center" class="step_title"><b><font color="red"><?php  echo TEXT_ERROR_BIRTH ;?></font></b></td>
	          </tr>
	      <?php } ?>
          <tr> 
            <td height="20" align="right" class="step_title"><?php  echo TEXT_BIRTHDATE ;?></td>
            <td height="20" align="left" >
            	<select class="step_select_date"  name="day">
            	<?php  
	            	if ( $day==0  ){
	                echo '<option value="0" selected="1" align="center">'.TEXT_DAY.'</option>';
	            	}	            	
	            	for($i=1; $i != 32 ; $i++){
                		if ($i==$day){
		            		echo '<option value="'.$i.'" selected="1">'.$i.'</option>';
	            		}else{
		            		echo '<option value="'.$i.'" >'.$i.'</option>';
		            	}                	
                	}
                ?>               
              	</select>
              	<img src="<?php  echo DIR_WS_IMAGES ;?>blank.gif" width="2" border="0" >
              	<select class="step_select_date"  name="month">                
            	<?php  
            		if ( $month==0  ){
	                echo '<option value="0" selected="1" align="center">'.TEXT_MONTH.'</option>';
	            	}	            	
	            	for($i=1; $i != 13 ; $i++){
                		if ($i==$month){
		            		echo '<option value="'.$i.'" selected="1">'.$i.'</option>';
	            		}else{
		            		echo '<option value="'.$i.'" >'.$i.'</option>';
		            	}                	
                	}
                ?>               
              	</select>
              	<img src="<?php  echo DIR_WS_IMAGES ;?>blank.gif" width="3" border="0" >
              	<select class="step_select_date"  name="year">
              	<?php                 
            	if ( $year==0  ){	            
                echo '<option value="0" selected="1" align="center">'.TEXT_YEAR.'</option>';
            	}            	
            	for($i=date('Y')-17; $i != 1920 ; $i--){	            	
            		if ($i==$year){
	            		echo '<option value="'.$i.'" selected="1">'.$i.'</option>';
            		}else{
	            		echo '<option value="'.$i.'" >'.$i.'</option>';
	            	}                	
            	}
                ?>               
              	</select>
            </td>
          </tr>
          <tr> 
            <td colspan="2" height="12" align="right" class="step_title">&nbsp;</td>
          </tr>
          <tr> 
            <td height="20" align="right" class="step_title"><?php  echo TEXT_DVDPOST_KNOWN_BY ;?></td>
            <td height="20" align="left" > <select class="step_select"  name="dvdpost_heard">
                <option value="0" selected="1" align="center"><?php  echo TEXT_CHOSE ;?></option>
                <option value="1"><?php  echo TEXT_CAMPAIN_DVDPOST ;?></option>
                <option value="2"><?php  echo TEXT_TV_DVDPOST ;?></option>
                <option value="3"><?php  echo TEXT_RADIO_DVDPOST ;?></option>
                <option value="5"><?php  echo TEXT_MAGAZINE_DVDPOST ;?></option>
                <option value="6"><?php  echo TEXT_FRIEND_DVDPOST ;?></option>
              </select> </td>
          </tr>
          <tr> 
            <td height="25" align="right" class="guarantee">&nbsp;</td>
            <td height="25" align="left" class="guarantee">&nbsp;</td>
          </tr>
          <?php 
          	//custom captcha
          	$rand_str = substr( sha1( mt_rand() ), 0, 5);
          	echo '<input  TYPE="hidden" VALUE="'.md5($rand_str).'" NAME="image_value">';          	 
          	$char1=substr($rand_str,0,1);
			$char2=substr($rand_str,1,1);
			$char3=substr($rand_str,2,1);
			$char4=substr($rand_str,3,1);
			$char5=substr($rand_str,4,1); 	
          ?>
          <?php  if($error_captcha==1){
	        ?>  
	          <tr> 
	            <td colspan="2" height="12" align="center" class="step_title"><b><font color="red"><?php  echo TEXT_ERROR_CAPTCHA ;?></font></b></td>
	          </tr>
	      <?php } ?>
          <tr> 
            <td height="20" align="right" class="step_title">&nbsp;</td>
            <td height="20" align="center" >
            	<table>
            		<tr>
            			<td>            				
            				<img src="<?php  echo DIR_WS_IMAGES ;?>step/character/<?php  echo rand(1, 2).'/'.$char1 ;?>.jpg" border="0" >
            				<img src="<?php  echo DIR_WS_IMAGES ;?>step/character/<?php  echo rand(1, 2).'/'.$char2 ;?>.jpg" border="0" >
            				<img src="<?php  echo DIR_WS_IMAGES ;?>step/character/<?php  echo rand(1, 2).'/'.$char3 ;?>.jpg" border="0" >
            				<img src="<?php  echo DIR_WS_IMAGES ;?>step/character/<?php  echo rand(1, 2).'/'.$char4 ;?>.jpg" border="0" >
            				<img src="<?php  echo DIR_WS_IMAGES ;?>step/character/<?php  echo rand(1, 2).'/'.$char5 ;?>.jpg" border="0" >           				
            			</td>
            		</tr>
            	</table>
            </td>
          </tr>
          <tr> 
            <td height="40" align="right" class="step_title"><?php  echo TEXT_CODE_WRITING ;?></td>
            <td height="40" align="left" class="guarantee"><input class="step_input" name="nombre" type="text" id="nombre"></td>
          </tr>
          <tr> 
            <td height="40" colspan="2" class="guarantee">&nbsp;</td>
          </tr>
          <tr> 
            <td height="12" align="center" valign="bottom" class="step_title"> 
              <img src="<?php  echo DIR_WS_IMAGES ;?>step/lock.gif" border="0"  align="absbottom"><?php  echo TEXT_SECURED ;?></td>
            <td height="12" align="bottom" class="guarantee">
            	<input  TYPE="hidden" VALUE="1" NAME="sent">
            	<?php  if ($update==1){ 
	            	echo '<input  TYPE="hidden" VALUE="1" NAME="updated">';
	            	echo '<input  TYPE="hidden" VALUE="1" NAME="update">';
	            }?>
            	<input name="submit" type="image" src="<?php  echo DIR_WS_IMAGES ;?>languages/<?php  echo $language ;?>/images/buttons/button_step_continue.gif" border="0" value="submit">
            </td>
          </tr>
          <tr> 
            <td height="40" colspan="2" class="guarantee">&nbsp;</td>
          </tr>
          <tr> 
            <td height="40" colspan="2" class="step_title"><i><?php  echo TEXT_DVDPOST_PRIVACY ;?></i></td>
          </tr>
        </form>
      </table></td>
    <td width="12" height="10">&nbsp;</td>
  </tr>