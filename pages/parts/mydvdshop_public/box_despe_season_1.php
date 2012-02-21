<style type="text/css">
<!--
.lost {
	font-family: Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-size: 15px;
}
-->
</style>
<table width="460" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="66" background="<?php echo DIR_WS_IMAGES ;?>/box/lost_box_top.gif">
    <table width="350" border="0" align="right" cellpadding="0" cellspacing="0">
    <?php 
	$query_sql='SELECT  sbd.shopping_box_name, sb.sale_price from shopping_box_description sbd , shopping_box sb where sbd.shopping_box_id=1 and sbd.shopping_box_id= sb.shopping_box_id and sbd.language_id=' . $languages_id ;
	$query = tep_db_query($query_sql);
	$query_info_values = tep_db_fetch_array($query);
    ?> 
	<tr>
		<td height="30" align="center" valign="middle" class="lost"><b><?php  echo $query_info_values['shopping_box_name'];?></b> (<?php  echo $query_info_values['sale_price'];?>&euro;)</td>
	</tr>
	<form name="form1" method="post" action="addtoshoppingcart.php">
	<tr>
		<td height="36" align="center" valign="middle"><input name="shopping_box_id" type="hidden" value="1">
			<input name="imageField" type="image" src="<?php  echo  DIR_WS_IMAGES_LANGUAGES.$language;?>/images/buttons/button_buy_despe.gif" border="0">
		</td>
	</tr>	
	</form>
    </table></td>
  </tr>
  <tr>
    <td><img src="<?php echo DIR_WS_IMAGES ;?>/box/lost_box_bottom.gif" width="460" height="107"></td>
  </tr> 
</table>
