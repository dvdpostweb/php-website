<br>
<table width="243" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="2" height="30" valign="top" align="left"><b><?php   echo TEXT_QTOP ;?></b></td>
  	</tr>  
	<?php  		
		$limit =(empty($limit)?10:$limit);
		$top10 ='SELECT count(wa.products_id) AS cpt, wa.products_id,pd.products_name, pd.products_image_big FROM wishlist_assigned wa ';
		$top10 .='LEFT JOIN products_description pd on wa.products_id=pd.products_id ';
		$top10 .='LEFT JOIN products p on wa.products_id=p.products_id ';
		$top10 .='WHERE wa.date_assigned > DATE_SUB( now() , INTERVAL 7 DAY ) AND wa.wishlist_type="DVD_NORM" ';		
		
		switch($languages_id){
			case 1:
			$top10 .='AND pd.language_id = 1 AND p.products_language_fr =1 ';
		break;
			case 2:
			$top10 .='AND pd.language_id = 2 AND p.products_undertitle_nl =1 ';
		break;
			case 3:
			$top10 .='AND pd.language_id = 3 ';		
		break;
		}	
		$top10 .=' GROUP BY wa.products_id ORDER BY `cpt` DESC LIMIT '.$limit;
		$i=1;
		
		$top10_values_tab = tep_db_cache($top10,14400);
		foreach ($top10_values_tab as $top10_values){
			echo '<tr class="DVDp_catalog2">';
			
			echo '<td height="20" width="25" align="right" valign="bottom"><b class="SLOGAN_MENU2">'.$i.'.</b><img src="'.DIR_WS_IMAGES.'blank.gif" width="8" height="8"></td>';
			echo '<td height="20" valign="bottom"><a class="link_SLOGAN_MENU2" href="product_info.php?products_id='.$top10_values['products_id'].'">'.substr($top10_values['products_name'], 0, 35).'</a></td></tr>';
		  $i++;
		}
	?>
</table>