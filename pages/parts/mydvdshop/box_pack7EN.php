<?php  
$box_number_query = tep_db_query("SELECT quantity_to_sale FROM shopping_box WHERE shopping_box_id =23");
$box_number = tep_db_fetch_array($box_number_query);
if ($box_number['quantity_to_sale']>0)
	{
	?>
	<table width="466" border="0" cellpadding="0" cellspacing="0">
	  <tr> 
	    <td class="DA2" align="left"><img src="<?php echo DIR_WS_IMAGES ;?>/box/pack7bEN.jpg" border="0" usemap="#Map"></td>
	  </tr>
	</table>
	<map name="Map">
	  <area shape="rect" coords="133,275,307,297" href="addtoshoppingcart.php?shopping_box_id=23">
	</map>
	<?php 
	}
?>