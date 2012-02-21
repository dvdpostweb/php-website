<?php 
  if (!tep_session_is_registered('customer_id')){
	  $step_text=TEXT_FREETRIAL2;
	  $link="step1.php";
  }else{
	$link="index.php";
	if ($customers_registration_step<90){
		$step_text=TEXT_CONTINUE_SUBSCRIPTION;		
		}else{
			$step_text=TEXT_MEMBER_ACCOUNT;		
		}  
  }
 if ($page_body_to_include=='default.php') 
 {?>
 <table bgcolor="#93A9C0" name="homepage_menu_ACTIVE-PASSIVE"width="754"  border="0" align="center" cellspacing="1" cellpadding="0" >   
  	<tr align="left">
   	  <td width="65"  class="TAB_MENU_ACTIVE"><?php echo TEXT_HOME;?><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
      <td width="131" class="TAB_MENU_PASSIVE"><a href="/how.php" class="typo_menu"><?php echo TEXT_HOW_DOES_IT_WORK;?></a><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></div></td>
      <td width="166" class="TAB_MENU_PASSIVE"><a href="/subscription.php" class="typo_menu"><?php  echo TEXT_FORMULA;?></a><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></div></td>
      <td width="104" class="TAB_MENU_PASSIVE"><a href="/catalog.php" class="typo_menu"><?php echo TEXT_CATALOG;?></a><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></div></td>
      <td width="121" class="TAB_button_try"><a href="/<?php  echo $link ;?>" class="typo_menu"><?php echo $step_text;?></a><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></div></td>
      <td width="144" nowrap background="<?php  echo DIR_WS_IMAGES;?>exell/nuancier.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
    </tr>
</table>
<?php  
  }
 else if ($page_body_to_include=='how.php')
 {?>
 <table bgcolor="#93A9C0" name="homepage_menu_ACTIVE-PASSIVE"width="754"  border="0" align="center" cellspacing="1" cellpadding="0" >    
  	<tr align="left">
   	  <td width="65"  class="TAB_MENU_PASSIVE"><a href="/default.php" class="typo_menu"><?php echo TEXT_HOME;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
      <td width="131" class="TAB_MENU_ACTIVE"><?php echo TEXT_HOW_DOES_IT_WORK;?><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
      <td width="166" class="TAB_MENU_PASSIVE"><a href="/subscription.php" class="typo_menu"><?php echo TEXT_FORMULA;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
      <td width="104" class="TAB_MENU_PASSIVE"><a href="/catalog.php" class="typo_menu"><?php echo TEXT_CATALOG;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
      <td width="121" class="TAB_button_try"><a href="/<?php  echo $link ;?>" class="typo_menu"><?php echo $step_text;?></a><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></div></td>
      <td width="144" nowrap background="<?php  echo DIR_WS_IMAGES;?>exell/nuancier.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
    </tr>
 </table>
<?php 
  }
 else if ($page_body_to_include=='subscription.php')
 {?>
  <table bgcolor="#93A9C0"name="homepage_menu_ACTIVE-PASSIVE"width="754"  border="0" align="center" cellspacing="1" cellpadding="0" >    
  	<tr align="left">
   	  <td width="65"  class="TAB_MENU_PASSIVE"><a href="/default.php" class="typo_menu"><?php echo TEXT_HOME;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
      <td width="131" class="TAB_MENU_PASSIVE"><a href="/how.php" class="typo_menu"><?php echo TEXT_HOW_DOES_IT_WORK;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
      <td width="166" class="TAB_MENU_ACTIVE"><?php echo TEXT_FORMULA;?><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
      <td width="104" class="TAB_MENU_PASSIVE"><a href="/catalog.php" class="typo_menu"><?php echo TEXT_CATALOG;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
      <td width="121" class="TAB_button_try"><a href="/<?php  echo $link ;?>" class="typo_menu"><?php echo $step_text;?></a><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></div></td>
      <td width="144" nowrap background="<?php  echo DIR_WS_IMAGES;?>exell/nuancier.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
    </tr>
  </table>
  <?php 
  }
 else if ($page_body_to_include=='catalog.php'||$page_body_to_include=='product_info_public.php'||$page_body_to_include=='actors_public.php'||$page_body_to_include=='directors_public.php'||$page_body_to_include=='advanced_search_result2_public.php'||$page_body_to_include=='search_actors_public.php'||$page_body_to_include=='search_directors_public.php' ) 
 {?>
  <table bgcolor="#93A9C0" name="homepage_menu_ACTIVE-PASSIVE"width="754"  border="0" align="center" cellspacing="1" cellpadding="0" >    
  	<tr align="left">
   	  <td width="65"  class="TAB_MENU_PASSIVE"><a href="/default.php" class="typo_menu"><?php echo TEXT_HOME;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
      <td width="131" class="TAB_MENU_PASSIVE"><a href="/how.php" class="typo_menu"><?php echo TEXT_HOW_DOES_IT_WORK;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
      <td width="166" class="TAB_MENU_PASSIVE"><a href="/subscription.php" class="typo_menu"><?php echo TEXT_FORMULA;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
      <td width="104" class="TAB_MENU_ACTIVE"><?php echo TEXT_CATALOG;?><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
      <td width="121" class="TAB_button_try"><a href="/<?php  echo $link ;?>" class="typo_menu"><?php echo $step_text;?></a><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></div></td>
      <td width="144" nowrap background="<?php  echo DIR_WS_IMAGES;?>exell/nuancier.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
    </tr>
  </table>
  <?php 
  }
 else
 {?>
  <table bgcolor="#93A9C0" name="homepage_menu_ACTIVE-PASSIVE"width="754"  border="0" align="center" cellspacing="1" cellpadding="0" >    
  	<tr align="left">
   	  <td width="65"  class="TAB_MENU_PASSIVE"><a href="/default.php" class="typo_menu"><?php echo TEXT_HOME;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
      <td width="131" class="TAB_MENU_PASSIVE"><a href="/how.php" class="typo_menu"><?php echo TEXT_HOW_DOES_IT_WORK;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
      <td width="166" class="TAB_MENU_PASSIVE"><a href="/subscription.php" class="typo_menu"><?php echo TEXT_FORMULA;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
      <td width="104" class="TAB_MENU_PASSIVE"><a href="/catalog.php" class="typo_menu"><?php echo TEXT_CATALOG;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
      <td width="121" class="TAB_button_try"><a href="/<?php  echo $link ;?>" class="typo_menu"><?php echo $step_text;?></a><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></div></td>
      <td width="144" nowrap background="<?php  echo DIR_WS_IMAGES;?>exell/nuancier.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
    </tr>
  </table>
<?php 
  }
?>
