<style type="text/css">
<!--
.Contest1 {
	font-family: Arial, Helvetica, sans-serif;
	color: #E33305;
	font-weight: bold;
	font-size: 16px;
}
.Contest2 {
	font-family: Arial, Helvetica, sans-serif;
	color: #FBF0BF;
	font-size: 13px;
	font-weight: bold;
}
.Contest2_non_bold {
	font-family: Arial, Helvetica, sans-serif;
	color: #FBF0BF;
	font-size: 13px;
} 
.Input1 {
	font-family: Arial, Helvetica, sans-serif;
	color: #FBF0BF;
	font-size: 13px;  
	height:20px ;
	width:260px;
}
-->

</style>
<table width="<?php  echo SITE_WIDTH_PUBLIC; ?>" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#000000">
  <tr>
    <td width="370"><img src="<?php  echo DIR_WS_IMAGES;?>contest_event/sunshine.jpg" width="300" height="500" align="top"></td>
    <td colspan="2" align="center" class="contest1">
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

	
  
