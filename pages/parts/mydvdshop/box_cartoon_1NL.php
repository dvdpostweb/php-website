<style type="text/css">
<!--
.DA {
	font-family: Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-size: 10px;
}

.DA2 {
	font-family: "Arial Black";
	color: #FFFFFF;
	font-size: 17px;
}
.DA3 {
	font-family: "Arial Black";
	color: #FFFFFF;
	font-size: 15px;
}
-->
</style>
 <?php 
	$query_sql='SELECT  sbd.shopping_box_name, sbd.shopping_box_description, sb.sale_price from shopping_box_description sbd , shopping_box sb where sbd.shopping_box_id=4 and sbd.shopping_box_id= sb.shopping_box_id and sbd.language_id=' . $languages_id ;
	$query = tep_db_query($query_sql);
	$query_info_values = tep_db_fetch_array($query);
?> 
<table width="466" height="201" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="37" background="<?php echo DIR_WS_IMAGES ;?>/box/top_da_pack_price2.gif" class="DA2" align="left">
    	<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="15" height="1">
    	<b><?php  echo $query_info_values['shopping_box_name'];?></b>    	
    </td>
  </tr>
  <tr>
    <td height="103"><img src="<?php echo DIR_WS_IMAGES ;?>/box/da_price2.jpg" width="466" height="103"></td>
  </tr>
  <tr>
    <td height="22" background="<?php echo DIR_WS_IMAGES ;?>/box/bottom1_da_pack.gif" class="DA" align="center"><b><?php  echo $query_info_values['shopping_box_description'];?></b></td>
  </tr>
  <form name="form1" method="post" action="addtoshoppingcart.php">
  <tr>
    <td height="39" align="center" background="<?php echo DIR_WS_IMAGES ;?>/box/bottom2_da_pack.gif">
		<input name="shopping_box_id" type="hidden" value="4">
		<input name="imageField" type="image" src="<?php  echo  DIR_WS_IMAGES_LANGUAGES.$language;?>/images/buttons/button_buy_DA.gif" border="0">
	</td>
  </tr>
  </form>
</table>
