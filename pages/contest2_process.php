<style type="text/css">
<!--
.Contest1 {
	font-family: Arial, Helvetica, sans-serif;
	color: #752010;
	font-weight: bold;
	font-size: 17px;
}
.Contest2 {
	font-family: Arial, Helvetica, sans-serif;
	color: #272727;
	font-size: 13px;
	font-weight: bold;
}
.Contest2_non_bold {
	font-family: Arial, Helvetica, sans-serif;
	color: #272727;
	font-size: 13px;
} 
.Input1 {
	font-family: Arial, Helvetica, sans-serif;
	color: #272727;
	font-size: 13px;  
	height:20px ;
	width:260px;
}
-->

</style>
<?php  
switch($languages_id){
case 1:
	$dvdimage="azuretasmar.jpg";
break;
case 2:
	$dvdimage="azuretasmar.jpg";
break;
case 3:
	$dvdimage="azuretasmar.jpg";
break;
}
?>
<table width="<?php  echo SITE_WIDTH_PUBLIC; ?>" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
	<td height="35" colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td width="344" rowspan="3">
    	<table width="253" height="247" border="0" cellpadding="0" cellspacing="0">
      		<tr>
		        <td width="6" rowspan="2"><img src="<?php  echo DIR_WS_IMAGES;?>contest/shadow_left.gif" width="6" height="247"></td>
		        <td width="163" height="240"><img src="<?php  echo DIR_WS_IMAGES;?>contest/<?php  echo $dvdimage ;?>" width="163" height="241"></td>
		        <td width="84" rowspan="2" valign="top"><img src="<?php  echo DIR_WS_IMAGES;?>contest/cd.gif" width="67" height="184"></td>
      		</tr>
      		<tr>
        		<td height="7"><img src="<?php  echo DIR_WS_IMAGES;?>contest/shadow_bottom.gif" width="163" height="6"></td>
    	  	</tr>	
    	</table>
    </td>
    <td height="25" colspan="2" align="left" valign="top"><span class="Contest1">&nbsp;</span></td>
  </tr>
  <tr>
    <td width="859" colspan="2" align="center">
		<?php  echo TEXT_INFORMATION . '<br>' ;
		if (!tep_session_is_registered('customer_id')) {
			echo '<a href="/default.php">'  . tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE) . '</a>';
		}else{
			echo '<a href="/mydvdpost.php">'  . tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE) . '</a>';
		}
		 ?>
	</td>
  </tr>
</table>
