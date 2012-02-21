<?php  
if (!tep_session_is_registered('customer_id'))  
 $button_rental='<a href="/default.php"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/canvas/button_rental.png" border="0"></a>' ;
else
 $button_rental='<a href="/step_member_choice.php"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/canvas/button_rental.png" border="0"></a>' ;

 $button_shop='<a href="/mydvdshop_public.php"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/canvas/button_shop.png" border="0"></a>' ;

?>
 <table width="773" border="0" cellspacing="0" cellpadding="0">
	<tr> 
	  <td width="565"><img src="<?php    echo DIR_WS_IMAGES;?>canvas/blank.gif" width="5" height="40"></td>
	  <td width="114" valign="bottom"><?php   echo $button_rental ;?></td>
	  <td width="6"><img src="<?php    echo DIR_WS_IMAGES;?>canvas/blank.gif" width="6" height="40"></td>
	  <td width="88" valign="bottom"><?php   echo $button_shop ;?></td>
	</tr>
	<tr>
		<td colspan="4" width="773"><img src="<?php    echo DIR_WS_IMAGES;?>canvas/top_shop.png" width="773" height="17"></td>
	</tr>
  </table>
