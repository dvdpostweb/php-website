<table border="0" width="95%">
    <TR>
        <TD class="TYPO_STD_BLACK" height="20">
        <?php 
echo 'ici';
        $ratings_count = tep_db_query("select count(products_rating_id) as count from products_rating where products_id = '" . $HTTP_GET_VARS['products_id'] . "'");
        $ratings_count_values = tep_db_fetch_array($ratings_count);
        $ratings_average = tep_db_query("select AVG(products_rating) as prave from products_rating where products_id = '" . $HTTP_GET_VARS['products_id'] . "'");
        $ratings_average_values = tep_db_fetch_array($ratings_average);

        $reviews_count = tep_db_query("select count(*) as count from " . TABLE_REVIEWS . " where products_id = '" . $HTTP_GET_VARS['products_id'] . "'");
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
		$stars=$jsrate*10;
		Echo TEXT_AVERAGE_RATING .'<img src="'.DIR_WS_IMAGES.'/starbar/stars_1_'.$stars.'.gif" border=0 align="absmiddle" title="'.$jsrate.'/5">&nbsp;&nbsp; (<b>' . $jsrate.'</b>/5)<br>';
        
		?>
		</TD>
	</TR>	
</table>
<?php 
	include(DIR_WS_COMMON . 'pages/parts/product_info_public/rating_graph.php'); 
?>