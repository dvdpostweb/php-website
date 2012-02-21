<?php 

  //$newsletter_array = array(array('id' => '1',
  //                                'text' => ENTRY_NEWSLETTER_YES),
  //                          array('id' => '0',
  //                                'text' => ENTRY_NEWSLETTER_NO));

  $newsletter_array = array(array('id' => '0',
                                  'text' => ENTRY_NEWSLETTER_NO),
                            array('id' => '1',
                                  'text' => ENTRY_NEWSLETTER_YES));
  
  //$newsletterpartner_array = array(array('id' => '1',
  //                                'text' => ENTRY_NEWSLETTERPARTNER_YES),
  //                          array('id' => '0',
  //                                'text' => ENTRY_NEWSLETTERPARTNER_NO));

  $newsletterpartner_array = array(array('id' => '0',
                                  'text' => ENTRY_NEWSLETTERPARTNER_NO),
                            array('id' => '1',
                                  'text' => ENTRY_NEWSLETTERPARTNER_YES));
?>


<div id="center-holder">
<table cellspacing="0" cellpadding="0" border="0" >

<tr>
<td>
<div id="account_container" >

<br />
 <fieldset>
	<legend><?php  echo TEXT_TITLE_ACCOUNT ;?></legend>
    <table cellpadding="0" cellspacing="0" border="0"  width="100%" bgcolor="#ffd6d5"> 
<tr>
				<td align="left" height="30">
                <span class="step_title"> <?php  echo ENTRY_EMAIL_ADDRESS ;?></span><span class="asterisk_step">*</span></td>
                </tr>
                <tr>
						<td class="step1_input" align="left">
                            
				
				<input class="step_input" id='email_address' type="text" name="email_address_step" autocomplete="off" value="<?php  echo $_POST['email_address_step'] ;?>" tabindex="1" />
                </td>
				<td align="left">
					<?php
						if($error_email==1){ 
							$error_email='';
							$class_email='step1_input_error step1_input_error_big_h';
						}
						else if($error_email==2){
							$error_email='';
							$class_email='create_input_error';
						}else if($error_email==-1){
								$error_email='';
								$class_email='create_input_ok';
						}else{
							$error_email=TEXT_EMAIL_EX;
							$class_email='create_input_info';
						}
					?>
					<div id='check_email' class="<?= $class_email ?>"><div id="text"><?= $error_email ?></div> </div></td>
			</tr>
            
            <?php  
				if($error_pass==1)
				{
					$error_pass='';
					$class_pass='create_input_error';
				}
				else if($error_pass==-1)
				{
					$error_pass='';
					$class_pass='create_input_ok';	
				}	
				else
				{
					$error_pass=TEXT_CHAR;
					$class_pass='create_input_info';	
				}
	         ?>
            
			<tr>
				<td align="left" height="30">
               		<span class="step_title"><?php  echo CATEGORY_PASSWORD ;?></span><span class="asterisk_step">*</span>
				</td>
                </tr>
                <tr>

				<td class="step1_input" align="left">
					 
 				<input class="step_input" id='password' type="password" name="password_step"  autocomplete="off" value="<?php  echo $_POST['password_step'] ;?>" tabindex="2"/>
                </td>
				<td><div id='check_pass' class='<?= $class_pass ?>'><div id="text"><?= $error_pass ?></div> </div></td>
			</tr>  
            <tr> <td height="10"></td></tr>
            
                		</table>
        </fieldset>
<br />
 <fieldset>
	<legend><?php  echo CATEGORY_PERSONAL ;?></legend>   
      <table cellpadding="0" cellspacing="0" border="0"  width="100%">
                          
								
        <tr>
         
         <td align="left" class="account_text_gender">
										
         <p><span>
									<?php  	
									if ( $gender=='f'){$checked='checked';}else{$checked='';}						
                                    echo '<input name="gender" type="radio" value="f" '.$checked.'>';
                                    	
                                    echo TEXT_FEMALE;																		
                                    ?>
                                    </span>
                                    
                                    <span>
                                    <?php  	
									if (empty($gender) || $gender=='m'){$checked='checked';}else{$checked='';}							
                                    echo '<input name="gender" type="radio" value="m" '.$checked.'>';
                                    
                                    echo TEXT_MALE;					
                                    ?>
                                    </span>
                                    
                                    
                                    </p>						
      </td>
                        
      <td align="left" class="explain_text" width='120'></td>
	</tr>
    
    <?php   if($error_firstname==1){
	        				$error_first='';
							$class_first='step_input_error';
						}else{
							if($_POST['sent'] && $error_firstname==0){
								$error_first=' ';
								$class_first='step_input_ok';
							}else{
								$error_first='';
								$class_first='';
							}
						}
	      		?>
                
                
						<tr>
						<td align="left" height="30">
							<span class="step_title"><?php   echo ENTRY_FIRST_NAME  ;?> <span class="asterisk_step">*</span></span>							
						</td>
                        </tr>
                        <tr>
                        <td class="step1_input" align="left">
                           <input class="step_input" id="firstname" autocomplete="off" type="text" name="firstname" value="<?php   echo stripslashes($firstname);?>" tabindex="3">
                         </td>
                         <td align="left" class="explain_text">
							<div id='check_firsname' class="<?= $class_first ?>"><div id="text"><?= $error_first ?></div> </div>
						</td>
					</tr>
                    
                    
                    <?php   
					if($error_lastname==1){
						$error_last='';
						$class_last='step_input_error';
					}else{
						if($_POST['sent'] && $error_lastname==0){
							$error_last=' ';
							$class_last='step_input_ok';
						}else{
							$error_last='';
							$class_last='';
						}
					}
	      		 
	      		?>
                 
				<tr>
					<td align="left" height="30">
						<span class="step_title"><?php   echo ENTRY_LAST_NAME  ;?> <span class="asterisk_step">*</span></span>
					</td>
               </tr>
                    
               <tr>
                     <td class="step1_input" align="left">
                     <input class="step_input" id="lastname" autocomplete="off" type="text" name="lastname" value="<?php   echo stripslashes($lastname);?>" tabindex="4">
                    </td>
					<td align="left" class="explain_text" >
						<div id='check_lastname' class="<?= $class_last ?>"><div id="text"><?= $error_last ?></div> </div>
					</td>
				</tr>
                
                <?php   
					if($error_birth==1){
						$error_birthday='';
						$class_birthday='step_input_error';
					}else{
						if($_POST['sent'] && $error_birth==0){
							$error_birthday=' ';
							$class_birthday='step_input_ok';
						}else{
							$error_birthday='';
							$class_birthday='';
						}	
					}
	      		 
	      		?>
				<tr>
					<td align="left" height="30" width="400">
						<span class="step_title"><?php   echo ENTRY_DATE_OF_BIRTH  ;?> <span class="asterisk_step">*</span></span>
					</td>
                 </tr>
                 <tr>
                     <td class="step1_input" height="30" >
        				<select class="new_step_date"  id="day"  name="day" tabindex="5">
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
                        <img src="<?php  echo DIR_WS_IMAGES ;?>blank.gif" width="3" border="0" >
                        <select class="new_step_date"  name="month"  id="month" tabindex="6">                
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
                        <img src="<?php  echo DIR_WS_IMAGES ;?>blank.gif" width="4" border="0" >
                        <select class="new_step_date"  name="year" id="year" tabindex="7">
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
				<td align="left" class="explain_text">
					<div id='check_birthday' class="<?= $class_birthday ?>"><div id="text"><?= $error_birthday ?></div> </div>
				</td>
				
                	
			</tr>	
            
            
            
            
            <?php   
				if($error_phone==1){
					$error_tel='';
					$class_tel='step_input_error';
				}else{
					if($_POST['sent'] && $error_phone==0){
						$error_tel=' ';
						$class_tel='step_input_ok';
					}else{
						$error_tel='';
						$class_tel='';
					}
				}					
	      		?>
 					<tr>
					<td align="left" height="30">
						<span class="step_title"><?php   echo ENTRY_TELEPHONE_NUMBER  ;?> <span class="asterisk_step">*</span></span>
					</td>
                    </tr>
                    <tr>
                    <td class="step1_input" align="left">
                    <input class="step_input" type="text" autocomplete="off" name="telephone" id="telephone" value="<?php echo $telephone;?>" tabindex="8">
                    </td>
					<td align="left" class="explain_text">
						<div id='check_phone' class="<?= $class_tel ?>"><div id="text"><?= $error_tel ?></div> </div>
					</td>
				</tr>  
                
                
                
    
    
    
				</table>
        </fieldset>
        <br />
        
        <fieldset>
	<legend><?php  echo CATEGORY_ADDRESS ;?></legend>
     <table cellpadding="0" cellspacing="0" border="0"  width="100%">
    
    </tr>	
            	<?php   
				if($error_street==1){
					$error_str='';
					$class_str='step_input_error';
				}else{
					if($_POST['sent'] && $error_street==0){
						$error_str=' ';
						$class_str='step_input_ok';
					}else{
						$error_str='';
						$class_str='';
					}
				}
	        
	      		?>
				<tr>
				<td align="left" height="30">
					<span class="step_title"><?php   echo ENTRY_STREET_ADDRESS  ;?> <span class="asterisk_step">*</span></span>
				</td>
                <td align="left" height="30">
				</td>
				<td align="left" height="30">
				</td>
                </tr>
                <tr>
                <td class="step1_input" align="left" colspan='3'>
					<input class="step_input" type="text" style='width:445px' autocomplete="off" name="street_address" id="street_address" value="<?php   echo stripslashes($street_address);?>" tabindex="9">
				</td>	
                
				<td align="left" class="explain_text" width='35'>
					<div id='check_street' class="<?= $class_str ?>" style='width:35px'> </div>
				</td>
			</tr> 
            
            <?php
			if(isset($_POST['sent']) && empty($_POST['postcode']))
			{
				$error_zip='';
				$class_zip='step_input_error';
			}else if($error_postcode!=0){
				$class_zip='step_input_error';
				switch ($error_postcode){
					case 1:
						$error_zip = '';								
						break;
					case 2:
						$error_zip = '';								
						break;
					case 3:
						$error_zip = '';
						break;
					case 0:
						$error_zip = '' ;								
						break;								
				}
	      	} else if(isset($_POST['sent']) && $error_postcode==0){
					$error_zip=' ';
					$class_zip='step_input_ok';
			}else {
				$error_zip='';
				$class_zip='';
			}
	      	?>
			<?php   
			if($error_city==1){
				
				$class_city='step_input_error';
			}else{
				if($_POST['sent'] && $error_street==0){
					$class_city='step_input_ok';
				}else{
					$class_city='';
				}
			}
        
      		?>
           	<tr>
	     		<td align="left" height="30">
					<span class="step_title"><?php   echo ENTRY_CITY  ;?> <span class="asterisk_step">*</span></span>
	     		</td>	
				<td></td>
                <td align="left" height="30">
					<span class="step_title"><?php   echo ENTRY_POST_CODE  ;?> <span class="asterisk_step">*</span></span>
	     		</td>
                </tr>
                <tr>
                 <td class="step1_input" align="left">
					<input class="step_input" type="text" autocomplete="off" name="city" id="city" value="<?php   echo $city ;?>" tabindex="11">
				</td>
				<td align="left" class="explain_text" width='35'>
						<div id='check_city' class="<?= $class_city ?>" style='width:35px'> </div>
				</td>
                <td class="step1_input" align="left">
					<input class="step_input_code" style='font-size:16px' type="text" autocomplete="off" name="postcode" id="postcode" value="<?php   echo $postcode ;?>" tabindex="12">
				</td>
				
				<td align="left" class="explain_text" width='35'>
					<div id='check_zip' class="<?= $class_zip ?>" style='width:35px'></div>
				</td>
			</tr>
			
			
            
           
                
           
            </table>      
    
     </fieldset> 

      </table>
    
     
     <tr>
					<td  class="asterisk_explain_account" colspan="4"><div style='width:550px'><?php  echo TEXT_ASTERISK ;?></div></td>
				</tr>
                         <tr> 
                            <td align="left" class="newsletter_text">
                                <INPUT type="checkbox" <?= (($_POST['newsletter']==1)?'checked="checked"':'')  ?> name="newsletter" value='1' tabindex="13">
	
                               <?php  echo  ENTRY_NEWSLETTER. '<br />';?></p>
                            </td>
						</tr>
                        
                         <tr> 
                            <td align="left" class="newsletter_text" >
                                <INPUT type="checkbox" <?= (($_POST['newsletterpartner']==1 )?'checked="checked"':'')  ?> name="newsletterpartner" value='1' tabindex="14">
	
                                <?php  echo ENTRY_NEWSLETTERPARTNER . '<br />';?></p>
                            </td>
						</tr>
                        
                <tr align="right" class="button_account">
					            <td valign="bottom" class="step_title_button" align="right">					            	
					            	<input  TYPE="hidden" VALUE="1" NAME="sent">
					            	<input TYPE="hidden" value="<?php  echo $price ;?>" NAME="confirm_price">
					            	<input  TYPE="hidden" VALUE="<?php  echo $discount;?>" NAME="discount_code_id">
					            	<input  TYPE="hidden" VALUE="<?php  echo $products_id ;?>" NAME="products_id">
					            	<input name="submit" type="image" src="<?php  echo DIR_WS_IMAGES ;?>languages/<?php  echo $language ;?>/images/buttons/canvas/button_step_confirm.gif" border="0" value="submit">
					            </td>
                                <td><img width="10" height="3" src="/images/blank.gif"/>
                                <img width="2" height="18" align="top" src="images/dvdpost_public/bg-top-nav-sep.gif"/>
                                <img width="10" height="3" src="/images/blank.gif"/>
                                <a class="sub_black_link" href="logoff.php"><?php  echo TEXT_CANCEL ;?></a></td>
                                
			</tr>
                     	
        </div>
        
        
      
        
        </td>
        </tr>
        </table>
        </div>
     




<?php /*?><!-- 
  <tr>
    <td>
    	<table border="0" width="100%" cellspacing="0" cellpadding="2">
        
        
        
        
        
        
        
      	
        <tr>
        	<td>
        		<table border="0" cellspacing="0" cellpadding="2">
				<?php 
				  if (ACCOUNT_GENDER == 'true') {
				    $male = ($account['customers_gender'] == 'm') ? true : false;
				    $female = ($account['customers_gender'] == 'f') ? true : false;
				?>
		          <tr>
		            <td class="SLOGAN_DETAIL"><?php  echo ENTRY_GENDER; ?></td>
		            <td class="SLOGAN_DETAIL" align="left">
					<?php 
					    if ($is_read_only) {
					      echo ($account['customers_gender'] == 'm') ? MALE : FEMALE;
					    } elseif ($error) {
					      if ($entry_gender_error) {
					        echo tep_draw_radio_field('gender', 'm', $male) . '&nbsp;&nbsp;' . MALE . '&nbsp;&nbsp;' . tep_draw_radio_field('gender', 'f', $female) . '&nbsp;&nbsp' . FEMALE . '&nbsp;' . ENTRY_GENDER_ERROR;
					      } else {
					        echo ($gender == 'm') ? MALE : FEMALE;
					        echo tep_draw_hidden_field('gender');
					      }
					    } else {
					      echo tep_draw_radio_field('gender', 'm', $male) . '&nbsp;&nbsp;' . MALE . '&nbsp;&nbsp;' . tep_draw_radio_field('gender', 'f', $female) . '&nbsp;&nbsp;' . FEMALE . '&nbsp;' . ENTRY_GENDER_TEXT;
					    }
					?></td>
          		   </tr>
				<?php 
				  }
				?>
		          <tr>
		            <td class="SLOGAN_DETAIL"><?php  echo ENTRY_FIRST_NAME; ?><?php  echo $account['customers_firstname'];?></td>
		            <td class="SLOGAN_DETAIL">		             
					<?php 
						
					  if ($is_read_only) {
					    echo $account['customers_firstname'];
					  } elseif ($error) {
					    if ($entry_firstname_error) {
					      echo tep_draw_input_field('firstname') . '&nbsp;' . ENTRY_FIRST_NAME_ERROR;
					    } else {
					      echo $firstname . tep_draw_hidden_field('firstname');
					    }
					  } else {
					    echo tep_draw_input_field('firstname', $account['customers_firstname']) . '&nbsp;' . ENTRY_FIRST_NAME_TEXT;
					  }
					?></td>
		          </tr>
		          <tr>
		            <td class="SLOGAN_DETAIL"><?php  echo ENTRY_LAST_NAME; ?></td>
		            <td class="SLOGAN_DETAIL">
					<?php 
					  if ($is_read_only) {
					    echo $account['customers_lastname'];
					  } elseif ($error) {
					    if ($entry_lastname_error) {
					      echo tep_draw_input_field('lastname') . '&nbsp;' . ENTRY_LAST_NAME_ERROR;
					    } else {
					      echo $lastname . tep_draw_hidden_field('lastname');
					    }
					  } else {
					    echo tep_draw_input_field('lastname', $account['customers_lastname']) . '&nbsp;' . ENTRY_LAST_NAME_TEXT;
					  }
					?></td>
		          </tr>
					<?php 
					  if (ACCOUNT_DOB == 'true') {
					?>
					          <tr>
					            <td class="SLOGAN_DETAIL"><?php  echo ENTRY_DATE_OF_BIRTH; ?></td>
					            <td class="SLOGAN_DETAIL">
					<?php 
					    if ($is_read_only) {
					      echo tep_date_short($account['customers_dob']);					      
					    } elseif ($error) {
					      if ($entry_date_of_birth_error) {
					        echo tep_draw_input_field('dob') . '&nbsp;' . ENTRY_DATE_OF_BIRTH_ERROR;
					      } else {
					        echo $dob . tep_draw_hidden_field('dob');
					      }
					    } else {
					      echo tep_draw_input_field('dob', tep_date_short($account['customers_dob'])) . '&nbsp;' . ENTRY_DATE_OF_BIRTH_TEXT;
					    }
					?></td>
		          </tr>
					<?php 
					  }
					?>
		          <tr>
		            <td class="SLOGAN_DETAIL"><?php  echo ENTRY_EMAIL_ADDRESS; ?></td>
		            <td class="SLOGAN_DETAIL">
					<?php 
					  if ($is_read_only) {
					    echo $account['customers_email_address'];
					  } elseif ($error) {
					    if ($entry_email_address_error) {
					      echo tep_draw_input_field('email_address', 'size=50') . '&nbsp;' . ENTRY_EMAIL_ADDRESS_ERROR;
					    } elseif ($entry_email_address_check_error) {
					      echo tep_draw_input_field('email_address', 'size=50') . '&nbsp;' . ENTRY_EMAIL_ADDRESS_CHECK_ERROR;
					    } elseif ($entry_email_address_exists) {
					      echo tep_draw_input_field('email_address', 'size=50') . '&nbsp;' . ENTRY_EMAIL_ADDRESS_ERROR_EXISTS;
					    } else {
					      echo $email_address . tep_draw_hidden_field('email_address');
					    }
					  } else {
					    echo tep_draw_input_field('email_address', $account['customers_email_address'], 'size=50') . '&nbsp;' . ENTRY_EMAIL_ADDRESS_TEXT;
					  }
					?></td>
		          </tr>		          
        	</table>
        </td>
      </tr>
    </table></td>
  </tr>
<?php 
  if (ACCOUNT_COMPANY == 'true') {
?>  
  <tr>
    <td class="SLOGAN_DETAIL_ROUGE"><br><?php  echo CATEGORY_COMPANY; ?></td>
  </tr>
  <tr>
    <td><table border="0" width="100%" cellspacing="0" cellpadding="2" class="formArea">
      <tr>
        <td><table border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td class="SLOGAN_DETAIL"><?php  echo ENTRY_COMPANY; ?></td>
            <td class="SLOGAN_DETAIL">
<?php 
    if ($is_read_only) {
      echo $account['entry_company'];
    } elseif ($error) {
      if ($entry_company_error) {
        echo tep_draw_input_field('company') . '&nbsp;' . ENTRY_COMPANY_ERROR;
      } else {
        echo $company . tep_draw_hidden_field('company');
      }
    } else {
      echo tep_draw_input_field('company', $account['entry_company']) . '&nbsp;' . ENTRY_COMPANY_TEXT;
    }
?></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
<?php 
  }
?>
  <tr>
    <td class="SLOGAN_DETAIL_ROUGE"><br><?php  echo CATEGORY_ADDRESS; ?></td>
  </tr>
  <tr>
    <td><table border="0" width="100%" cellspacing="0" cellpadding="2" class="formArea">
      <tr>
        <td><table border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td class="SLOGAN_DETAIL"><?php  echo ENTRY_STREET_ADDRESS; ?></td>
            <td class="SLOGAN_DETAIL">
<?php 
  if ($is_read_only) {
    echo $account['entry_street_address'];
  } elseif ($error) {
    if ($entry_street_address_error) {
      echo tep_draw_input_field('street_address', 'size=50') . '&nbsp;' . ENTRY_STREET_ADDRESS_ERROR;
    } else {
      echo $street_address . tep_draw_hidden_field('street_address');
    }
  } else {
    echo tep_draw_input_field('street_address', $account['entry_street_address'], 'size=50') . ENTRY_STREET_ADDRESS_TEXT;
  }
?></td>
          </tr>
<?php 
  if (ACCOUNT_SUBURB == 'true') {
?>
<?php 
  }
?>
          <tr>
            <td class="SLOGAN_DETAIL"><?php  echo ENTRY_POST_CODE; ?></td>
            <td class="SLOGAN_DETAIL">
<?php 
  if ($is_read_only) {
    echo $account['entry_postcode'];
  } elseif ($error) {
    if ($entry_post_code_error) {
      echo tep_draw_input_field('postcode') . '&nbsp;' . ENTRY_POST_CODE_ERROR;
    } else {
      echo $postcode . tep_draw_hidden_field('postcode');
    }
  } else {
    echo tep_draw_input_field('postcode', $account['entry_postcode']) . '&nbsp;' . ENTRY_POST_CODE_TEXT;
  }
?></td>
          </tr>
          <tr>
            <td class="SLOGAN_DETAIL"><?php  echo ENTRY_CITY; ?></td>
            <td class="SLOGAN_DETAIL">
<?php 
  if ($is_read_only) {
    echo $account['entry_city'];
  } elseif ($error) {
    if ($entry_city_error) {
      echo tep_draw_input_field('city') . '&nbsp;' . ENTRY_CITY_ERROR;
    } else {
      echo $city . tep_draw_hidden_field('city');
    }
  } else {
    echo tep_draw_input_field('city', $account['entry_city']) . '&nbsp;' . ENTRY_CITY_TEXT;
  }
?></td>
          </tr>
          <tr>
            <td class="SLOGAN_DETAIL"><?php  echo ENTRY_COUNTRY; ?></td>
            <td class="SLOGAN_DETAIL">
<?php 
  if ($is_read_only) {
    echo tep_get_country_name($account['entry_country_id']);
  } elseif ($error) {
    if ($entry_country_error) {
      echo tep_get_country_list('country') . '&nbsp;' . ENTRY_COUNTRY_ERROR;
    } else {
      echo tep_get_country_name($country) . tep_draw_hidden_field('country');
    }
  } else {
    echo tep_get_country_list('country', $account['entry_country_id']) . '&nbsp;' . ENTRY_COUNTRY_TEXT;
  }
?></td>
          </tr>
<?php 
  if (ACCOUNT_STATE == 'true') {
?>
          <tr>
            <td class="SLOGAN_DETAIL"><?php  echo ENTRY_STATE; ?></td>
            <td class="SLOGAN_DETAIL">
<?php 
    $state = tep_get_zone_name($country, $zone_id, $state);
    if ($is_read_only) {
      echo tep_get_zone_name($account['entry_country_id'], $account['entry_zone_id'], $account['entry_state']);
    } elseif ($error) {
      if ($entry_state_error) {
        if ($entry_state_has_zones) {
          $zones_array = array();
          $zones_query = tep_db_query("select zone_name from " . TABLE_ZONES . " where zone_country_id = '" . tep_db_input($country) . "' order by zone_name");
          while ($zones_values = tep_db_fetch_array($zones_query)) {
            $zones_array[] = array('id' => $zones_values['zone_name'], 'text' => $zones_values['zone_name']);
          }
          echo tep_draw_pull_down_menu('state', $zones_array) . '&nbsp;' . ENTRY_STATE_ERROR;
        } else {
          echo tep_draw_input_field('state') . '&nbsp;' . ENTRY_STATE_ERROR;
        }
      } else {
        echo $state . tep_draw_hidden_field('zone_id') . tep_draw_hidden_field('state');
      }
    } else {
      echo tep_draw_input_field('state', tep_get_zone_name($account['entry_country_id'], $account['entry_zone_id'], $account['entry_state'])) . '&nbsp;' . ENTRY_STATE_TEXT;
    }
?></td>
          </tr>
<?php 
  }
?>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td class="SLOGAN_DETAIL_ROUGE"><br><?php  echo CATEGORY_CONTACT; ?></td>
  </tr>
  <tr>
    <td><table border="0" width="100%" cellspacing="0" cellpadding="2" class="formArea">
      <tr>
        <td><table border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td class="SLOGAN_DETAIL"><?php  echo ENTRY_TELEPHONE_NUMBER; ?></td>
            <td class="SLOGAN_DETAIL">
<?php 
  if ($is_read_only) {
    echo $account['customers_telephone'];
  } elseif ($error) {
    if ($entry_telephone_error) {
      echo tep_draw_input_field('telephone') . '&nbsp;' . ENTRY_TELEPHONE_NUMBER_ERROR;
    } else {
      echo $telephone . tep_draw_hidden_field('telephone');
    }
  } else {
    echo tep_draw_input_field('telephone', $account['customers_telephone']) . '&nbsp;' . ENTRY_TELEPHONE_NUMBER_TEXT;
  }
?></td>
          </tr>
          <tr>
            <td class="SLOGAN_DETAIL"><?php  echo ENTRY_TELEPHONE_EVENING_NUMBER; ?></td>
            <td class="SLOGAN_DETAIL">
<?php 
  if ($is_read_only) {
    echo $account['customers_telephone_evening'];
  } elseif ($processed) {
    echo $telephone_evening . tep_draw_hidden_field('telephone_evening');
  } else {
    echo tep_draw_input_field('telephone_evening', $account['customers_telephone_evening']);
  }
?></td>
          </tr>
          <tr>
            <td class="SLOGAN_DETAIL"><?php  echo ENTRY_FAX_NUMBER; ?></td>
            <td class="SLOGAN_DETAIL">
<?php 
  if ($is_read_only) {
    echo $account['customers_fax'];
  } elseif ($processed) {
    echo $fax . tep_draw_hidden_field('fax');
  } else {
    echo tep_draw_input_field('fax', $account['customers_fax']) . '&nbsp;' . ENTRY_FAX_NUMBER_TEXT;
  }
?></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td class="SLOGAN_DETAIL_ROUGE"><br><?php  echo CATEGORY_OPTIONS; ?></td>
  </tr>
  <tr>
    <td><table border="0" width="100%" cellspacing="0" cellpadding="2" class="formArea">
      <tr>
        <td><table border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td class="SLOGAN_DETAIL"><?php  echo ENTRY_NEWSLETTER; ?></td>
            <td class="SLOGAN_DETAIL">
<?php 
  if ($is_read_only) {
    if ($account['customers_newsletter'] == '1') {
      echo ENTRY_NEWSLETTER_YES;
    } else {
      echo ENTRY_NEWSLETTER_NO;
    }
  } elseif ($processed) {
    if ($newsletter == '1') {
      echo ENTRY_NEWSLETTER_YES;
    } else {
      echo ENTRY_NEWSLETTER_NO;
    }
    echo tep_draw_hidden_field('newsletter');  
  } else {
    echo tep_draw_pull_down_menu('newsletter', $newsletter_array, $account['customers_newsletter']) . '&nbsp;' . ENTRY_NEWSLETTER_TEXT;
  }
?></td>
          </tr>

          <tr>
            <td class="SLOGAN_DETAIL"><?php  echo ENTRY_NEWSLETTERPARTNER; ?></td>
            <td class="SLOGAN_DETAIL">
<?php 
  if ($is_read_only) {
    if ($account['customers_newsletterpartner'] == '1') {
      echo ENTRY_NEWSLETTERPARTNER_YES;
    } else {
      echo ENTRY_NEWSLETTERPARTNER_NO;
    }
  } elseif ($processed) {
    if ($newsletterpartner == '1') {
      echo ENTRY_NEWSLETTERPARTNER_YES;
    } else {
      echo ENTRY_NEWSLETTERPARTNER_NO;
    }
    echo tep_draw_hidden_field('newsletterpartner');  
  } else {
    echo tep_draw_pull_down_menu('newsletterpartner', $newsletterpartner_array, $account['customers_newsletterpartner']) . '&nbsp;' . ENTRY_NEWSLETTER_TEXT;
  }
?></td>
          </tr>          
        </table>
       </td>
      </tr>
    </table></td>
  </tr>
<?php 
  if (!$is_read_only) {
?>
  <tr>
    <td class="SLOGAN_DETAIL_ROUGE"><br><?php  echo CATEGORY_PASSWORD; ?></td>
  </tr>
  <tr>
    <td><table border="0" width="100%" cellspacing="0" cellpadding="2" class="formArea">
      <tr>
        <td><table border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td class="SLOGAN_DETAIL"><?php  echo ENTRY_PASSWORD; ?></td>
            <td class="SLOGAN_DETAIL">
<?php 
    if ($error) {
      if ($entry_password_error) {
        echo tep_draw_password_field('password','','autocomplete="off"') . '&nbsp;' ;
      } else {
        echo PASSWORD_HIDDEN . tep_draw_hidden_field('password','autocomplete="off"') . tep_draw_hidden_field('confirmation');
      }
    } else {
      echo tep_draw_password_field('password','','autocomplete="off"') . '&nbsp;' ;
    }
?></td>
         </tr>
<?php 
    if ( (!$error) || ($entry_password_error) ) {
?>
          <tr>
            <td class="SLOGAN_DETAIL"><?php  echo ENTRY_PASSWORD_CONFIRMATION; ?></td>
            <td class="SLOGAN_DETAIL">
<?php 
      echo tep_draw_password_field('confirmation','','autocomplete="off"') . '&nbsp;' ;
?></td>
          </tr>
<?php 
    }
?>
        </table></td>
      </tr>
    </table></td>
  </tr>
<?php 
  }else{
  ?>
   <tr>
    <td class="SLOGAN_DETAIL_ROUGE"><br><?php  echo CATEGORY_PASSWORD; ?></td>
  </tr>
  <tr>
    <td><table border="0" width="100%" cellspacing="0" cellpadding="2" class="formArea">
      <tr>
        <td><table border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td class="SLOGAN_DETAIL"><?php  echo ENTRY_PASSWORD; ?></td>
            <td class="SLOGAN_DETAIL">**********</td>
		  </tr></table>
		</td>
	  </tr>
	 </table>
	</td>
   </tr> 
  <?php   
  }
?>



<?php 
//CAPTCHA VALIDATOR
  $is_read_only=true;
  if (!$is_read_only) {
  	//custom captcha
  	$rand_str = substr( sha1( mt_rand() ), 0, 5);
  	echo '<input  TYPE="hidden" VALUE="'.md5($rand_str).'" NAME="image_value">';          	 
  	$char1=substr($rand_str,0,1);
	$char2=substr($rand_str,1,1);
	$char3=substr($rand_str,2,1);
	$char4=substr($rand_str,3,1);
	$char5=substr($rand_str,4,1); 	
         
?>
  <tr>
    <td class="SLOGAN_DETAIL_ROUGE"><br><?php  echo CATEGORY_CAPTCHA_VALIDATOR; ?></td>
  </tr>
  <tr>
    <td>
    <table border="0" width="100%" cellspacing="0" cellpadding="2" class="formArea">
      <tr>
        <td width="25%">
        <table align="left" bgcolor="#FFFFFF"" >
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
        <td class="SLOGAN_DETAIL" align="left">
			<?php 
			    if ($error) {
				  if($error_captcha){
				        echo tep_draw_input_field('nombre') . '&nbsp;' . TEXT_ERROR_CAPTCHA;  
				  }
			    } else {
			      echo tep_draw_input_field('nombre') . '&nbsp;' . ENTRY_PASSWORD_TEXT;
			    }
			?>
		</td>
    </table>
    </td>
  </tr>
<?php 
  }
?>--><?php */?>


</table>