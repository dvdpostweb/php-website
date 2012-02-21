<?php 
 if ($page_body_to_include=='default.php') 
 {?>
 <table width="757" border="0" align="center" cellpadding="0" cellspacing="0">
   <tr>
     <td height="46" align="center" valign="middle" background="<?php  echo DIR_WS_IMAGES;?>rtlbe//rtl_background_menu.jpg"><table name="homepage_menu_ACTIVE-PASSIVE"width="731"  border="0" align="center" cellpadding="1" cellspacing="1" >
       <tr align="left" valign="bottom">
         <td width="80"  class="TAB_MENU_ACTIVE"><?php echo TEXT_HOME;?></td>
         <td width="156" class="TAB_MENU_PASSIVE"><a href="/how.php" class="typo_menu"><?php echo TEXT_HOW_DOES_IT_WORK;?></a></td>
         <td width="191" class="TAB_MENU_PASSIVE"><a href="/subscription.php" class="typo_menu"><?php  echo TEXT_FORMULA;?></a></td>
         <td width="125" class="TAB_MENU_PASSIVE"><a href="/catalog.php" class="typo_menu"><?php echo TEXT_CATALOG;?></a></td>
         <td width="100" class="TAB_MENU_PASSIVE"><a href="/catalogx.php" class="typo_menu"><?php echo TEXT_CATALOG_X;?></a></td>
		 <td width="69" nowrap background="<?php  echo DIR_WS_IMAGES;?>/nuancier.jpg"></td>
       </tr>
     </table></td>
   </tr>
 </table>
<?php 
  }
 else if ($page_body_to_include=='how.php')
 {?>
 <table width="757" border="0" align="center" cellpadding="0" cellspacing="0">
   <tr>
     <td height="46" align="center" valign="middle" background="<?php  echo DIR_WS_IMAGES;?>rtlbe//rtl_background_menu.jpg"><table name="homepage_menu_ACTIVE-PASSIVE"width="731"  border="0" align="center" cellpadding="1" cellspacing="1" >
       <tr align="left" valign="bottom">
         <td width="80"  class="TAB_MENU_PASSIVE"><a href="/default.php" class="typo_menu"><?php echo TEXT_HOME;?></a></td>
         <td width="156" class="TAB_MENU_ACTIVE"><?php echo TEXT_HOW_DOES_IT_WORK;?></td>
         <td width="191" class="TAB_MENU_PASSIVE"><a href="/subscription.php" class="typo_menu"><?php echo TEXT_FORMULA;?></a></td>
         <td width="125" class="TAB_MENU_PASSIVE"><a href="/catalog.php" class="typo_menu"><?php echo TEXT_CATALOG;?></a></td>
         <td width="100" class="TAB_MENU_PASSIVE"><a href="/catalogx.php" class="typo_menu"><?php echo TEXT_CATALOG_X;?></a></td>
		 <td width="69" nowrap background="<?php  echo DIR_WS_IMAGES;?>/nuancier.jpg"></td>
       </tr>
     </table></td>
   </tr>
 </table>
<?php 
  }
 else if ($page_body_to_include=='subscription.php')
 {?>
  <table width="757" height="46" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center" valign="middle" background="<?php  echo DIR_WS_IMAGES;?>rtlbe//rtl_background_menu.jpg"><table name="homepage_menu_ACTIVE-PASSIVE"width="731"  border="0" align="center" cellpadding="1" cellspacing="1" >
        <tr align="left" valign="bottom">
          <td width="80"  class="TAB_MENU_PASSIVE"><a href="/default.php" class="typo_menu"><?php echo TEXT_HOME;?></a></td>
          <td width="156" class="TAB_MENU_PASSIVE"><a href="/how.php" class="typo_menu"><?php echo TEXT_HOW_DOES_IT_WORK;?></a></td>
          <td width="191" class="TAB_MENU_ACTIVE"><?php echo TEXT_FORMULA;?></td>
          <td width="125" class="TAB_MENU_PASSIVE"><a href="/catalog.php" class="typo_menu"><?php echo TEXT_CATALOG;?></a></td>
          <td width="100" class="TAB_MENU_PASSIVE"><a href="/catalogx.php" class="typo_menu"><?php echo TEXT_CATALOG_X;?></a></td>
          <td width="69" nowrap background="<?php  echo DIR_WS_IMAGES;?>/nuancier.jpg"></td>
        </tr>
      </table></td>
    </tr>
  </table>
  <?php 
  }
 else if ($page_body_to_include=='catalog.php'||$page_body_to_include=='product_info_public.php'||$page_body_to_include=='actors_public.php'||$page_body_to_include=='directors_public.php'||$page_body_to_include=='advanced_search_result2_public.php'||$page_body_to_include=='search_actors_public.php'||$page_body_to_include=='search_directors_public.php' ) 
 {?>
  <table width="757" height="46" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center" valign="middle" background="<?php  echo DIR_WS_IMAGES;?>rtlbe//rtl_background_menu.jpg"><table name="homepage_menu_ACTIVE-PASSIVE"width="731"  border="0" align="center" cellpadding="1" cellspacing="1" >
        <tr align="left" valign="bottom">
          <td width="80"  class="TAB_MENU_PASSIVE"><a href="/default.php" class="typo_menu"><?php echo TEXT_HOME;?></a></td>
          <td width="156" class="TAB_MENU_PASSIVE"><a href="/how.php" class="typo_menu"><?php echo TEXT_HOW_DOES_IT_WORK;?></a></td>
          <td width="191" class="TAB_MENU_PASSIVE"><a href="/subscription.php" class="typo_menu"><?php echo TEXT_FORMULA;?></a></td>
          <td width="125" class="TAB_MENU_ACTIVE"><a href="/catalog.php" class="typo_menu_white"><?php echo TEXT_CATALOG;?></a></td>
          <td width="100" class="TAB_MENU_PASSIVE"><a href="/catalogx.php" class="typo_menu"><?php echo TEXT_CATALOG_X;?></a></td>
		  <td width="69" nowrap background="<?php  echo DIR_WS_IMAGES;?>/nuancier.jpg"></td>
        </tr>
      </table></td>
    </tr>
  </table>
  <?php 
  }
 else if ($page_body_to_include=='catalogx.php')
 {?>
  <table width="757" height="46" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center" valign="middle" background="<?php  echo DIR_WS_IMAGES;?>rtlbe//rtl_background_menu.jpg"><table name="homepage_menu_ACTIVE-PASSIVE"width="731"  border="0" align="center" cellpadding="1" cellspacing="1" >
        <tr align="left" valign="bottom">
          <td width="80"  class="TAB_MENU_PASSIVE"><a href="/default.php" class="typo_menu"><?php echo TEXT_HOME;?></a></td>
          <td width="156" class="TAB_MENU_PASSIVE"><a href="/how.php" class="typo_menu"><?php echo TEXT_HOW_DOES_IT_WORK;?></a></td>
          <td width="191" class="TAB_MENU_PASSIVE"><a href="/subscription.php" class="typo_menu"><?php echo TEXT_FORMULA;?></a></td>
          <td width="125" class="TAB_MENU_PASSIVE"><a href="/catalog.php" class="typo_menu"><?php echo TEXT_CATALOG;?></a></td>
          <td width="100" class="TAB_MENU_ACTIVE"><?php echo TEXT_CATALOG_X;?></td>
		  <td width="69" nowrap background="<?php  echo DIR_WS_IMAGES;?>/nuancier.jpg"></td>
        </tr>
      </table></td>
    </tr>
  </table>
<?php 
  }
 else if ($page_body_to_include=='mydvdshop_public.php' || $page_body_to_include=='shop_listing_public.php')
 {?>
  <table width="757" height="46" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center" valign="middle" background="<?php  echo DIR_WS_IMAGES;?>rtlbe//rtl_background_menu.jpg"><table name="homepage_menu_ACTIVE-PASSIVE"width="731"  border="0" align="center" cellpadding="1" cellspacing="1" >
        <tr align="left" valign="bottom">
	   	  <td width="80"  class="TAB_MENU_PASSIVE"><a href="/default.php" class="typo_menu"><?php echo TEXT_HOME;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
	      <td width="156" class="TAB_MENU_PASSIVE"><a href="/how.php" class="typo_menu"><?php echo TEXT_HOW_DOES_IT_WORK;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
	      <td width="191" class="TAB_MENU_PASSIVE"><a href="/subscription.php" class="typo_menu"><?php echo TEXT_FORMULA;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
	      <td width="125" class="TAB_MENU_PASSIVE"><a href="/catalog.php" class="typo_menu"><?php echo TEXT_CATALOG;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
	      <td width="100" class="TAB_MENU_PASSIVE"><a href="/catalogx.php" class="typo_menu"><?php echo TEXT_CATALOG_X;?></a><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></div></td>
		  <td width="69" nowrap background="<?php  echo DIR_WS_IMAGES;?>/nuancier.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3"></td>
		</tr>
      </table></td>
    </tr>
  </table>
<?php 
  }
 else
 {?>
  <table width="757" height="46" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center" valign="middle" background="<?php  echo DIR_WS_IMAGES;?>rtlbe//rtl_background_menu.jpg"><table name="homepage_menu_ACTIVE-PASSIVE"width="731"  border="0" align="center" cellpadding="1" cellspacing="1" >
        <tr align="left" valign="bottom">
          <td width="80"  class="TAB_MENU_PASSIVE"><a href="/default.php" class="typo_menu"><?php echo TEXT_HOME;?></a></td>
          <td width="156" class="TAB_MENU_PASSIVE"><a href="/how.php" class="typo_menu"><?php echo TEXT_HOW_DOES_IT_WORK;?></a></td>
          <td width="191" class="TAB_MENU_PASSIVE"><a href="/subscription.php" class="typo_menu"><?php echo TEXT_FORMULA;?></a></td>
          <td width="125" class="TAB_MENU_PASSIVE"><a href="/catalog.php" class="typo_menu"><?php echo TEXT_CATALOG;?></a></td>
          <td width="100" class="TAB_MENU_PASSIVE"><a href="/catalogx.php" class="typo_menu"><?php echo TEXT_CATALOG_X;?></a></td>
		  <td width="69" nowrap background="<?php  echo DIR_WS_IMAGES;?>/nuancier.jpg"></td>
        </tr>
      </table></td>
    </tr>
  </table>
<?php 
  }
?>
