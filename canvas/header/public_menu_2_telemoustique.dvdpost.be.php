<?php     
 $button_home='<a href="/default.php"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/unselected/welcome.png" border="0" alt="'.TEXT_HOME.'"></a>' ;
 $button_how='<a href="/how.php"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/unselected/how.png" border="0" alt="'.TEXT_HOW_DOES_IT_WORK.'"></a>' ;
 $button_catalog='<a href="/catalog.php"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/unselected/catalog.png" border="0" alt="'.TEXT_CATALOG.'"></a>' ;
 $button_formulas='<a href="/subscription.php"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/unselected/price.png" border="0" alt="'.TEXT_FORMULA.'"></a>' ;
 $button_try='<a href="/step1.php?activation_code=FREETEST2"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/unselected/trial.png" border="0" alt="'.TEXT_FREETRIAL2.'"></a>' ;
 $button_shop='<a href="/mydvdshop_public.php"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/unselected/shop.png" border="0"></a>' ;
 if (tep_session_is_registered('customer_id')){
	$button_try='<a href="/step_member_choice.php"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/unselected/account.png" border="0" alt="'.TEXT_MEMBER_ACCOUNT.'"></a>' ;
	if ($customers_registration_step<80){
		$button_try='<a href="/step2.php"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/unselected/account.png" border="0" alt="'.TEXT_CONTINUE_SUBSCRIPTION.'"></a>' ;		
		}  
  }
 
 if ($page_body_to_include=='default.php') 
 {
	$button_home='<img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/selected/welcome.png" border="0" alt="'.TEXT_HOME.'">' ;
  }
 else if ($page_body_to_include=='how.php')
  {
	$button_how='<img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/selected/how.png" border="0" alt="'.TEXT_HOW_DOES_IT_WORK.'">' ;
  }
 else if ($page_body_to_include=='subscription.php'||$page_body_to_include=='subscription2.php')
  {
	$button_formulas='<img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/selected/price.png" border="0" alt="'.TEXT_FORMULA.'">' ;
  }
 else if(stristr($page_body_to_include, 'step'))
  {
	$button_try='<img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/selected/account.png" border="0" alt="'.TEXT_MEMBER_ACCOUNT.'">' ;
	if ($customers_registration_step<80){
		$button_try='<a href="/step2.php"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/selected/account.png" border="0" alt="'.TEXT_CONTINUE_SUBSCRIPTION.'"></a>' ;		
		}
	if ($page_body_to_include=='step1.php'){
	$button_try='<img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/selected/trial.png" border="0" alt="'.TEXT_FREETRIAL2.'">' ;
  	}
  }  
 else if ($page_body_to_include=='step_member_choice.php')
  {
	$button_try='<img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/selected/account.png" border="0" alt="'.TEXT_MEMBER_ACCOUNT.'">' ;
  }
 else if ($page_body_to_include=='catalog.php'||$page_body_to_include=='product_info_public.php'||$page_body_to_include=='actors_public.php'||$page_body_to_include=='directors_public.php'||$page_body_to_include=='advanced_search_result2_public.php'||$page_body_to_include=='search_actors_public.php'||$page_body_to_include=='search_directors_public.php' ) 
  {
	$button_catalog='<a href="/catalog.php"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/selected/catalog.png" border="0" alt="'.TEXT_CATALOG.'"></a>' ;
  } 
 else
 {  }
?>
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr> 
	  <td width="96" valign="bottom"><?php   echo $button_home ;?></td>
	  <td width="6"><img src="<?php    echo DIR_WS_IMAGES;?>canvas/bl_line.gif" width="6" height="30"></td>
	  <td width="149" valign="bottom"><?php   echo $button_how ;?></td>
	  <td width="5"><img src="<?php    echo DIR_WS_IMAGES;?>canvas/bl_line.gif" width="5" height="30"></td>
	  <td width="114" valign="bottom"><?php   echo $button_catalog ;?></td>
	  <td width="5"><img src="<?php    echo DIR_WS_IMAGES;?>canvas/bl_line.gif" width="5" height="30"></td>
	  <td width="133" valign="bottom"><?php   echo $button_formulas ;?></td>
	  <td width="5"><img src="<?php    echo DIR_WS_IMAGES;?>canvas/bl_line.gif" width="5" height="30"></td>
	  <td width="151" valign="bottom" align="center" background="<?php    echo DIR_WS_IMAGES;?>canvas/bl_line.gif"><?php   echo $button_try ;?></td>
	  <td width="6" background="<?php    echo DIR_WS_IMAGES;?>canvas/bl_line.gif"><img src="<?php    echo DIR_WS_IMAGES;?>canvas/bl_line.gif" width="6" height="30"></td>
	  <td width="88" valign="bottom"><?php   echo $button_shop ;?></td>
	</tr>
  </table>
