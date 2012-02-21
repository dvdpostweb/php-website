<table border="0" width="95%">
    <TR>
        <TD class="TYPO_STD_BLACK" height="20">
        <?php 
        
		$data_avg_count=avg_count_fct($product_info_values['rating_users'] ,$product_info_values['rating_count'] );
        echo TEXT_AVERAGE_RATING .'<b class="TYPO_STD_BLACK_bold"> ' . ($data_avg_count['avg']/10) . ' </b> (' . $data_avg_count['count'] . ' ' . TEXT_RATING .')<br>';
        ?>
		</TD>
	</TR>
	<TR>
		<TD class="TYPO_STD_BLACK" height="20">
		<?php 
		if (tep_session_is_registered('customer_id')) {
            //BEN001 $customers_ratings_count = tep_db_query("select * from products_rating_adult where products_id = '" . $HTTP_GET_VARS['products_id'] . "' and customers_id = '" . $customer_id . "' ");
            $customers_ratings_count = tep_db_query("select * from products_rating where products_id = '" . $HTTP_GET_VARS['products_id'] . "' and customers_id = '" . $customer_id . "' ",'db_link',true); //BEN001
            $customers_ratings_count_values = tep_db_fetch_array($customers_ratings_count);
            if ($customers_ratings_count_values['products_rating']>0){
                echo TEXT_U_HAVE_ALREADY_RATED . '<img src="' . DIR_WS_IMAGES . 'starbar/dvdxpost/stars_3_' . $customers_ratings_count_values['products_rating'] . '0.gif">';
            }else{
	                echo  '<div  style="float:left;position:absolute;margin-top:-6px;">'.TEXT_RATE_THIS_PRODUCT.'</div><div id="img_star" class="img_star" style="float:left;position:absolute;margin:-8px 0 0 80px;background-image:url(' . DIR_WS_IMAGES . 'starbar/stars_1_' . $data_avg_count['avg']. '.gif); width:92px; height:15px; ">
						<div class="star_rate" id="1" style="width:19px; height:16px; margin-left:0px; position:absolute;"></div>
						<div class="star_rate" id="2" style="width:19px; height:16px; margin-left:19px; position:absolute;"></div>
						<div class="star_rate" id="3" style="width:19px; height:16px; margin-left:38px; position:absolute;"></div>
						<div class="star_rate" id="4" style="width:19px; height:16px; margin-left:57px; position:absolute;"></div>
						<div class="star_rate" id="5" style="width:19px; height:16px; margin-left:76px; position:absolute;"></div>
						</div><div style:"clear:both"></div>';
            }
        }else{
            echo '<img src="' . DIR_WS_IMAGES . 'starbar/dvdxpost/stars_3_' . $customers_ratings_count_values['products_rating'] . '0.gif">';
            
        }
        ?>
        </TD>
    </TR>
</table>