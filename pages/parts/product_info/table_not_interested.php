<table border="0" width="95%">
    <TR>
        <TD class="TYPO_STD_BLACK" height="20"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
	</tr>
	<tr>
<?php 
            $customers_notinterested = tep_db_query("select * from products_uninterested where products_id = '" . $HTTP_GET_VARS['products_id'] . "' and customers_id = '" . $customer_id . "' ");
            $customers_notinterested_values = tep_db_fetch_array($customers_notinterested);
            if ($customers_notinterested_values['products_uninterested_id']>0){
                echo '<td class="TYPO_STD_BLACK"><img src="' . DIR_WS_IMAGES . '/button_not_interrested3.gif">' . TEXT_NOTINTERSED . '</td>';
            }else{
	            echo '<td class="TYPO_STD_BLACK"><br><form name="uninterested" action="setuninterested.php" method=post><input type="hidden" name="movieid" value="' . $HTTP_GET_VARS['products_id'] . '"><input type="hidden" name="url" value="' . $PHP_SELF. '?' . $_SERVER['QUERY_STRING'] . '"><input type="image" src="' . DIR_WS_IMAGES_LANGUAGES . $language . '/images/buttons/button_not_interrested.gif" alt="TEXT_ALTINTERESTED"></form></td><td>&nbsp;</td>';
            }
?>
	</tr>
</table>