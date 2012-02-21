<table width="<?php  echo SITE_WIDTH_PUBLIC; ?>" align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2"height="40" align="left" valign="middle" class="TYPO_ROUGE_ITALIQUE"><img src="<?php  echo DIR_WS_IMAGES;?>recom/starflash.gif" align="texttop"><?php  echo HEADING_TITLE; ?></td>
  </tr>
  <tr>
	<td height="6" colspan="2" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.jpg" width="<?php  echo SITE_WIDTH_PUBLIC; ?>" height="6"></div></td>
  </tr>
  <tr>    
    <td  colspan="2" height="35" valign="middle" class="SLOGAN_DETAIL_ROUGE"><b>
		<?php
	
		$limit=14;
		$count_not_rated = tep_db_query("select count(o.orders_id) as cc from ". TABLE_ORDERS ." o left join  orders_products op on op.orders_id = o.orders_id  left join  products_rating pr on pr.customers_id = o.customers_id and pr.products_id = op.products_id  where o.customers_id ='" .$customer_id ."' and o.orders_status=3  and orders_products_type ='DVD_NORM' and pr.products_id is NULL ",'db_link',true);
		 	
$count_not_rated_values = tep_db_fetch_array($count_not_rated) ;
		if(!empty($x) && $count_not_rated_values['cc']>$x){
			$page=(ceil($count_not_rated_values['cc']/$limit))-1;
			$x=$limit*$page;
		}
		
      	echo TEXT_YOU_HAVE . ' '. $count_not_rated_values['cc']  . ' ' . TEXT_DVDRETD_NOTRATED ;
      	
      	$history_query_raw =  "select o.orders_id, o.date_purchased ";
		$history_query_raw .= "from ". TABLE_ORDERS ." o ";
		$history_query_raw .= "left join  orders_products op on op.orders_id = o.orders_id  ";
		$history_query_raw .= "left join  products_rating pr on pr.customers_id = o.customers_id and pr.products_id = op.products_id ";
		$history_query_raw .= "where o.customers_id ='" .$customer_id ."' and o.orders_status=3  and orders_products_type ='DVD_NORM' and pr.products_id is NULL ";
		if ($x!=0){
		$history_query_raw.=' order by orders_id DESC limit '.$x.','.$limit ;}
		else{
		$x=0;
		$history_query_raw.=' order by orders_id DESC limit '.$x.','.$limit ;}		
		//echo $history_query_raw; 	
		//$history_query_raw .= "limit 8";

  	 	$history_query = tep_db_query($history_query_raw,'db_link',true);
		?>
		</b>
	</td>
   </tr>
   <tr>
	<?php  
	$cpt=0;
	while ($history = tep_db_fetch_array($history_query)) {
		$products_name_query = tep_db_query("select op.products_id,pd.products_name ,pd.products_image_big  from " . TABLE_ORDERS_PRODUCTS . " op, " . TABLE_PRODUCTS_DESCRIPTION ." pd  where op.products_id=pd.products_id and pd.language_id = '" . $languages_id . "' and op.orders_id = '" . $history['orders_id'] . "'");
      	$product_info_values = tep_db_fetch_array($products_name_query) ;
		
		if ($cpt %2 ==0 )  {echo '</tr><tr>';}
		$cpt++;
		echo'<td width="365" class="SLOGAN_DETAIL"><p id ="'.$product_info_values['products_id'].'">';
		include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/common/show_rate.php'));
		echo '</p></td>';
		}
		
	
	
	//if ($HTTP_GET_VARS['page'] > 0) {
	//	echo '<a href="my_recommandation.php?page=' . ($HTTP_GET_VARS['page'] - 1). '">' . TEXT_PREV . '</a>';				
	//	echo '&nbsp;&nbsp;';
	//	echo '<a href="my_recommandation.php?page=' . ($HTTP_GET_VARS['page'] + 1). '">' . TEXT_NEXT . '</a>';				
	//}else{
	//	echo '<a href="my_recommandation.php?page=1">Next</a>';		
	//}
	?>
  </tr>
  	<tr>
		<td  colspan="2"align="right" class="SLOGAN_orange">
		<?php 
		include(DIR_WS_INCLUDES . 'functions/split.php');
		split_pages($x,$limit,$count_not_rated_values['cc']);
		?>
		</td>
	</tr>
</table>
<?php
	 switch($languages_id){
		case 1:
			$lang='fr';
		break;
		case 2:
			$lang='nl';
		break;
		case 3:
			$lang='en';
		break;
		
	}
?>
<div id='filter' language='<?= $lang ?>'>