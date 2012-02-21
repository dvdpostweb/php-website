<table border="0" width="95%">
    <TR>
        <TD class="TYPO_STD_BLACK" height="20">
        <?php
		$data_avg_count=avg_count_fct($product_info_values['rating_users'] ,$product_info_values['rating_count'] );
        echo TEXT_AVERAGE_RATING .'<b class="TYPO_STD_BLACK_bold"> ' . $data_avg_count['avg']/10 . ' </b> (' .  $data_avg_count['count']. ' ' . TEXT_RATING .')<br>';
        ?>
		</TD>
	</TR>
</table>
<?php 

	include(DIR_WS_COMMON . 'pages/parts/product_info/rating_graph.php'); 
?>

<Table>
	<TR>
		<TD class="TYPO_STD_BLACK" width="240">
			
		<?php  
		if (tep_session_is_registered('customer_id')) {
			if($product_info_values['imdb_id']>0)
            	$customers_ratings_count = tep_db_query("select * from products_rating pr where imdb_id = '" . $product_info_values['imdb_id'] . "' and customers_id = '" . $customer_id . "' ",'db_link',true);
			else
				$customers_ratings_count = tep_db_query("select * from products_rating where products_id = '" . $HTTP_GET_VARS['products_id'] . "' and customers_id = '" . $customer_id . "' ",'db_link',true);
            $customers_ratings_count_values = tep_db_fetch_array($customers_ratings_count);
			if (intval($customers_ratings_count_values['products_rating'])>0){
                echo TEXT_U_HAVE_ALREADY_RATED . '<img src="' . DIR_WS_IMAGES . 'starbar/stars_3_' . $customers_ratings_count_values['products_rating'] . '0.gif">';
            }else{
                //echo '<div style="float:left;margin-top:3px">'.TEXT_RATE_THIS_PRODUCT.'</div>';
                echo  '<div  style="float:left;position:absolute;margin-top:-6px;">'.TEXT_RATE_THIS_PRODUCT.'</div><div id="img_star" class="img_star" style="float:left;position:absolute;margin:-8px 0 0 80px;background-image:url(' . DIR_WS_IMAGES . 'starbar/stars_1_' . $data_avg_count['avg']. '.gif); width:92px; height:15px; ">
					<div class="star_rate" id="1" style="width:19px; height:16px; margin-left:0px; position:absolute;"></div>
					<div class="star_rate" id="2" style="width:19px; height:16px; margin-left:19px; position:absolute;"></div>
					<div class="star_rate" id="3" style="width:19px; height:16px; margin-left:38px; position:absolute;"></div>
					<div class="star_rate" id="4" style="width:19px; height:16px; margin-left:57px; position:absolute;"></div>
					<div class="star_rate" id="5" style="width:19px; height:16px; margin-left:76px; position:absolute;"></div>
					</div><div style:"clear:both"></div>';
                 
            }
			
        }else{
            echo '<img src="' . DIR_WS_IMAGES . 'starbar/stars_3_' . $customers_ratings_count_values['products_rating'] . '0.gif">';
        }
        ?>
        </TD>
<?php  
            $customers_notinterested = tep_db_query("select * from products_uninterested where products_id = '" . $HTTP_GET_VARS['products_id'] . "' and customers_id = '" . $customer_id . "' ",'db_link',true);
            $customers_notinterested_values = tep_db_fetch_array($customers_notinterested);
            if ($customers_notinterested_values['products_uninterested_id']>0){
                echo '<td valign="middle" class="TYPO_STD_BLACK"><img src="' . DIR_WS_IMAGES . '/button_not_interrested3.gif" align="absmiddle">' . TEXT_NOTINTERSED . '</td>';
            }else{
	            echo '<form name="uninterested" action="setuninterested.php" method=post><td class="TYPO_STD_BLACK"><input type="hidden" name="movieid" value="' . $HTTP_GET_VARS['products_id'] . '"><input type="hidden" name="url" value="' . $PHP_SELF. '?' . $_SERVER['QUERY_STRING'] . '"><input type="image" src="' . DIR_WS_IMAGES_LANGUAGES . $language . '/images/buttons/button_not_interrested.gif" alt="'.TEXT_ALTINTERESTED.'"></td></form>';
            }
?>
    </TR>
	
</table>