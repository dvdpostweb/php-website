<style type="text/css">
<!--
.despe {
	font-family: Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-size: 15px;
}
-->
</style>
<table width="460" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="<?php echo DIR_WS_IMAGES ;?>/box/despe_box_top.gif" width="460" height="101"></td>
  </tr>
  <?php 
	$query_sql='SELECT  sbd.shopping_box_name, sb.sale_price from shopping_box_description sbd , shopping_box sb where sbd.shopping_box_id=2 and sbd.shopping_box_id= sb.shopping_box_id and sbd.language_id=' . $languages_id ;
	$query = tep_db_query($query_sql);
	$query_info_values = tep_db_fetch_array($query);
  ?>
  <tr>
    <td align="center" valign="middle" background="<?php echo DIR_WS_IMAGES ;?>/box/despe_box_mid.gif" class="despe"><b><?php  echo $query_info_values['shopping_box_name'];?></b> (<?php  echo $query_info_values['sale_price'];?>€)</td>
  </tr>
  <form name="form1" method="post" action="addtoshoppingcart.php">
  <tr>	
    <td height="46" align="center" valign="middle" background="<?php echo DIR_WS_IMAGES ;?>/box/despe_box_bottom.gif">
		<input name="shopping_box_id" type="hidden" value="2">
		<input name="imageField" type="image" src="<?php  echo  DIR_WS_IMAGES_LANGUAGES.$language;?>/images/buttons/button_buy_despe.gif" border="0">
	</td>	
  </tr>
  </form>
</table>
