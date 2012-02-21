<table border="0" width="95%">
    <TR>
        <TD class="TYPO_STD_BLACK" height="20">
        <?php
		if ($product_info_values['imdb_id']>0){
			$ratings_count = tep_db_query("select count(products_rating_id) as count from products_rating where imdb_id = '" . $product_info_values['imdb_id'] . "'");
			$ratings_count_values = tep_db_fetch_array($ratings_count);
		}else{
			$ratings_count = tep_db_query("select count(products_rating_id) as count from products_rating where products_id = '" . $HTTP_GET_VARS['products_id'] . "'");
			$ratings_count_values = tep_db_fetch_array($ratings_count);
        }
		$ratings_average = tep_db_query("select AVG(products_rating) as prave from products_rating where products_id = '" . $HTTP_GET_VARS['products_id'] . "'");
        $ratings_average_values = tep_db_fetch_array($ratings_average);

        $reviews_count = tep_db_query("select count(*) as count from " . TABLE_REVIEWS . " where products_id = '" . $HTTP_GET_VARS['products_id'] . "' and reviews_check=1");
        $reviews_count_values = tep_db_fetch_array($reviews_count);
        $reviews_average = tep_db_query("select AVG(reviews_rating) as rrave from " . TABLE_REVIEWS . " where products_id = '" . $HTTP_GET_VARS['products_id'] . "'");
        $reviews_average_values = tep_db_fetch_array($reviews_average);

        if ($ratings_average_values['prave']>0){
            if ($reviews_average_values['rrave']>0){
                $jsrate = round(($ratings_average_values['prave'] + $reviews_average_values['rrave'])/2,1);
            }else{
                $jsrate = round($ratings_average_values['prave'],1);
            }
        }else{
            if ($reviews_average_values['rrave']>0){
                $jsrate = round($reviews_average_values['rrave'],1);
            }else{
                $jsrate = 0;
            }
        }

        Echo TEXT_AVERAGE_RATING .'<b class="TYPO_STD_BLACK_bold"> ' . $jsrate . ' </b> (' . ($ratings_count_values['count'] + $reviews_count_values['count']) . ' ' . TEXT_RATING .')<br>';
        ?>
		</TD>
	</TR>
</table>
<?php 
	include(DIR_WS_COMMON . 'pages/parts/product_info/rating_graph.php'); 
?>
<Table>
	<TR>
		<TD class="TYPO_STD_BLACK">
		<?php  
		if (tep_session_is_registered('customer_id')) {
            $customers_ratings_count = tep_db_query("select * from products_rating where products_id = '" . $HTTP_GET_VARS['products_id'] . "' and customers_id = '" . $customer_id . "' ");
            $customers_ratings_count_values = tep_db_fetch_array($customers_ratings_count);
            if ($customers_ratings_count_values['products_rating']>0){
                echo TEXT_U_HAVE_ALREADY_RATED . '<img src="' . DIR_WS_IMAGES . 'starbar/stars_3_' . $customers_ratings_count_values['products_rating'] . '0.gif">';
            }else{
                echo TEXT_RATE_THIS_PRODUCT;
                ?>
                <script language="javascript">
                <!--
                var STARBAR_IMG_ROOT = '<?php   echo DIR_WS_IMAGES; ?>/starbar/';
                var STARBAR_SET_PAGE = '<?php   echo HTTP_SERVER; ?>/SetRating.php?foo=bar&foo=bar';
                // -->
                </script>
                <script src='<?php   echo DIR_WS_INCLUDES; ?>javascript/starbar_nn.js'></script>
                <script src='<?php   echo DIR_WS_INCLUDES; ?>javascript/shared.js'></script>
                <script>
                <!--
                StarbarInsert(<?php   echo $product_info_values['products_id'];?> ,1, <?php   echo $jsrate; ?>, <?php   echo $jsrate; ?> ,0,0,0,0,0,0,0);
                // -->
                </script>
                <?php  
            }
        }else{
            echo TEXT_RATE_THIS_PRODUCT;
            ?>
            <script language="javascript">
            <!--
            var STARBAR_IMG_ROOT = '<?php   echo DIR_WS_IMAGES; ?>/starbar/';
            var STARBAR_SET_PAGE = '<?php   echo HTTP_SERVER; ?>/SetRating.php?foo=bar&foo=bar';
            // -->
            </script>
            <script src='<?php   echo DIR_WS_INCLUDES; ?>javascript/starbar_nn.js'></script>
            <script src='<?php   echo DIR_WS_INCLUDES; ?>javascript/shared.js'></script>
            <script>
            <!--
            StarbarInsert(<?php   echo $product_info_values['products_id'];?> ,1, <?php   echo $jsrate; ?>, <?php   echo $jsrate; ?> ,0,0,0,0,0,0,0);
            // -->
            </script>
            <?php  
        }
        ?>
        </TD>
<?php  
            $customers_notinterested = tep_db_query("select * from products_uninterested where products_id = '" . $HTTP_GET_VARS['products_id'] . "' and customers_id = '" . $customer_id . "' ");
            $customers_notinterested_values = tep_db_fetch_array($customers_notinterested);
            if ($customers_notinterested_values['products_uninterested_id']>0){
                echo '<td valign="middle" class="TYPO_STD_BLACK"><img src="' . DIR_WS_IMAGES . '/button_not_interrested3.gif" align="absmiddle">' . TEXT_NOTINTERSED . '</td>';
            }else{
	            echo '<form name="uninterested" action="setuninterested.php" method=post><td class="TYPO_STD_BLACK"><input type="hidden" name="movieid" value="' . $HTTP_GET_VARS['products_id'] . '"><input type="hidden" name="url" value="' . $PHP_SELF. '?' . $_SERVER['QUERY_STRING'] . '"><input type="image" src="' . DIR_WS_IMAGES_LANGUAGES . $language . '/images/buttons/button_not_interrested.gif" alt="'.TEXT_ALTINTERESTED.'"></td></form>';
            }
?>
    </TR>
	
</table>