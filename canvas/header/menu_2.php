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
 <table name="homepage_menu_ACTIVE-PASSIVE"width="<?php  echo SITE_WIDTH_PUBLIC; ?>  border="0" align="center" cellpadding="1" cellspacing="1" >   
  	<tr align="left" valign="bottom">
   	  <td width="80"  class="TAB_MENU_ACTIVE"><?php echo TEXT_HOME;?><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></td>
      <td width="136" class="TAB_MENU_PASSIVE"><a href="/how.php" class="typo_menu"><?php echo TEXT_HOW_DOES_IT_WORK;?></a><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></div></td>
      <td width="191" class="TAB_MENU_PASSIVE"><a href="/subscription.php" class="typo_menu"><?php  echo TEXT_FORMULA;?></a><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></div></td>
      <td width="125" class="TAB_MENU_PASSIVE"><a href="/catalog.php" class="typo_menu"><?php echo TEXT_CATALOG;?></a><img src="<?php  echo DIR_WS_IMAGES;?>/blank.gif" width="6" height="3"></div></td>
      <td width="120" class="TAB_button_try"><a href="<?php  echo '/'.$link ;?>" class="typo_menu"><?php echo $step_text;?></a></div></td>
      <td width="69" nowrap background="<?php  echo DIR_WS_IMAGES;?>/nuancier.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
    </tr>
</table>
<?php 
  }
 else if ($page_body_to_include=='how.php')
 {?>
 <table name="homepage_menu_ACTIVE-PASSIVE"width="<?php  echo SITE_WIDTH_PUBLIC; ?>  border="0" align="center" cellpadding="1" cellspacing="1" >    
  	<tr align="left" valign="bottom">
   	  <td width="80"  class="TAB_MENU_PASSIVE"><a href="/default.php" class="typo_menu"><?php echo TEXT_HOME;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
      <td width="136" class="TAB_MENU_ACTIVE"><?php echo TEXT_HOW_DOES_IT_WORK;?><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
      <td width="191" class="TAB_MENU_PASSIVE"><a href="/subscription.php" class="typo_menu"><?php echo TEXT_FORMULA;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
      <td width="125" class="TAB_MENU_PASSIVE"><a href="/catalog.php" class="typo_menu"><?php echo TEXT_CATALOG;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
      <td width="120" class="TAB_button_try"><a href="<?php  echo '/'.$link ;?>" class="typo_menu"><?php echo $step_text;?></a></div></td>
	  <td width="69" nowrap background="<?php  echo DIR_WS_IMAGES;?>/nuancier.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
    </tr>
 </table>
<?php 
  }
 else if ($page_body_to_include=='subscription.php')
 {?>
  <table name="homepage_menu_ACTIVE-PASSIVE"width="<?php  echo SITE_WIDTH_PUBLIC; ?>  border="0" align="center" cellpadding="1" cellspacing="1" >    
  	<tr align="left" valign="bottom">
   	  <td width="80"  class="TAB_MENU_PASSIVE"><a href="/default.php" class="typo_menu"><?php echo TEXT_HOME;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
      <td width="136" class="TAB_MENU_PASSIVE"><a href="/how.php" class="typo_menu"><?php echo TEXT_HOW_DOES_IT_WORK;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
      <td width="191" class="TAB_MENU_ACTIVE"><?php echo TEXT_FORMULA;?><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
      <td width="125" class="TAB_MENU_PASSIVE"><a href="/catalog.php" class="typo_menu"><?php echo TEXT_CATALOG;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
      <td width="120" class="TAB_button_try"><a href="<?php  echo '/'.$link ;?>" class="typo_menu"><?php echo $step_text;?></a></div></td>
      <td width="69" nowrap background="<?php  echo DIR_WS_IMAGES;?>/nuancier.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
    </tr>
  </table>
  <?php 
  }
 else if ($page_body_to_include=='catalog.php'||$page_body_to_include=='product_info_public.php'||$page_body_to_include=='actors_public.php'||$page_body_to_include=='directors_public.php'||$page_body_to_include=='advanced_search_result2_public.php'||$page_body_to_include=='search_actors_public.php'||$page_body_to_include=='search_directors_public.php' ) 
 {?>
  <table name="homepage_menu_ACTIVE-PASSIVE"width="<?php  echo SITE_WIDTH_PUBLIC; ?>  border="0" align="center" cellpadding="1" cellspacing="1" >    
  	<tr align="left" valign="bottom">
   	  <td width="80"  class="TAB_MENU_PASSIVE"><a href="/default.php" class="typo_menu"><?php echo TEXT_HOME;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
      <td width="136" class="TAB_MENU_PASSIVE"><a href="/how.php" class="typo_menu"><?php echo TEXT_HOW_DOES_IT_WORK;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
      <td width="191" class="TAB_MENU_PASSIVE"><a href="/subscription.php" class="typo_menu"><?php echo TEXT_FORMULA;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
      <td width="125" class="TAB_MENU_ACTIVE"><a href="/catalog.php" class="typo_menu"><?php echo TEXT_CATALOG;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
      <td width="120" class="TAB_button_try"><a href="<?php  echo '/'.$link ;?>" class="typo_menu"><?php echo $step_text;?></a></div></td>
	  <td width="69" nowrap background="<?php  echo DIR_WS_IMAGES;?>/nuancier.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
    </tr>
  </table>
  <?php 
  }
 else if ($page_body_to_include=='catalogx.php')
 {?>
  <table name="homepage_menu_ACTIVE-PASSIVE"width="<?php  echo SITE_WIDTH_PUBLIC; ?>  border="0" align="center" cellpadding="1" cellspacing="1" >    
  	<tr align="left" valign="bottom">
   	  <td width="80"  class="TAB_MENU_PASSIVE"><a href="/default.php" class="typo_menu"><?php echo TEXT_HOME;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
      <td width="136" class="TAB_MENU_PASSIVE"><a href="/how.php" class="typo_menu"><?php echo TEXT_HOW_DOES_IT_WORK;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
      <td width="191" class="TAB_MENU_PASSIVE"><a href="/subscription.php" class="typo_menu"><?php echo TEXT_FORMULA;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
      <td width="125" class="TAB_MENU_PASSIVE"><a href="/catalog.php" class="typo_menu"><?php echo TEXT_CATALOG;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
      <td width="120" class="TAB_button_try"><a href="<?php  echo '/'.$link ;?>" class="typo_menu"><?php echo $step_text;?></a></div></td>
	  <td width="69" nowrap background="<?php  echo DIR_WS_IMAGES;?>/nuancier.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
    </tr>
  </table>
<?php 
  }
 else if ($page_body_to_include=='mydvdshop_public.php')
 {?>
  <table name="homepage_menu_ACTIVE-PASSIVE"width="<?php  echo SITE_WIDTH_PUBLIC; ?>  border="0" align="center" cellpadding="1" cellspacing="1" >    
  	<tr align="left" valign="bottom">
   	  <td width="80"  class="TAB_MENU_PASSIVE"><a href="/default.php" class="typo_menu"><?php echo TEXT_HOME;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
      <td width="136" class="TAB_MENU_PASSIVE"><a href="/how.php" class="typo_menu"><?php echo TEXT_HOW_DOES_IT_WORK;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
      <td width="191" class="TAB_MENU_PASSIVE"><a href="/subscription.php" class="typo_menu"><?php echo TEXT_FORMULA;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
      <td width="125" class="TAB_MENU_PASSIVE"><a href="/catalog.php" class="typo_menu"><?php echo TEXT_CATALOG;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
      <td width="120" class="TAB_button_try"><a href="<?php  echo '/'.$link ;?>" class="typo_menu"><?php echo $step_text;?></a></div></td>
	  <td width="69" nowrap background="<?php  echo DIR_WS_IMAGES;?>/nuancier.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
    </tr>
  </table>
<?php 
  }
 else
 {?>
  <table name="homepage_menu_ACTIVE-PASSIVE"width="<?php  echo SITE_WIDTH_PUBLIC; ?>  border="0" align="center" cellpadding="1" cellspacing="1" >    
  	<tr align="left" valign="bottom">
   	  <td width="80"  class="TAB_MENU_PASSIVE"><a href="/default.php" class="typo_menu"><?php echo TEXT_HOME;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
      <td width="136" class="TAB_MENU_PASSIVE"><a href="/how.php" class="typo_menu"><?php echo TEXT_HOW_DOES_IT_WORK;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
      <td width="191" class="TAB_MENU_PASSIVE"><a href="/subscription.php" class="typo_menu"><?php echo TEXT_FORMULA;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
      <td width="125" class="TAB_MENU_PASSIVE"><a href="/catalog.php" class="typo_menu"><?php echo TEXT_CATALOG;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
      <td width="120" class="TAB_button_try"><a href="<?php  echo '/'.$link ;?>" class="typo_menu"><?php echo $step_text;?></a></div></td>
	  <td width="69" nowrap background="<?php  echo DIR_WS_IMAGES;?>/nuancier.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
    </tr>
  </table>
<?php 
  }
?>
