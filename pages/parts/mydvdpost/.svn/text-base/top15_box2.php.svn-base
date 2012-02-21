<br>
<table width="243" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td colspan="2" height="30" valign="top" align="left"><b><?php   echo TEXT_QTOP ;?></b></td>
  	</tr>  
	<?php  				
		$top10 ='SELECT p.products_id, pd.products_name, pd.products_image_big ';
		$top10 .='FROM products p, products_description pd ';
		$top10 .='WHERE p.products_availability >= 3 AND p.products_id = pd.products_id ';
		switch($languages_id){
			case 1:
			$top10 .='AND pd.language_id = 1 AND p.products_language_fr =1 ';
		break;
			case 2:
			$top10 .='AND pd.language_id = 2 AND p.products_undertitle_nl =1 ';
		break;
			case 3:
			$top10 .='AND pd.language_id = 2 ';		
		break;
		}	
		$top10 .=' and p.products_type = "DVD_NORM" '; //BEN001
		$top10 .='GROUP BY p.products_id ORDER BY p.products_desire_weighted DESC LIMIT 0 , '.$limit;
		$top10_query = tep_db_query($top10);
		$i=1;
		while ($top10_values = tep_db_fetch_array($top10_query)){
			echo '<tr class="DVDp_catalog2">';
			echo '<td height="20" width="25" align="right" valign="bottom"><b class="SLOGAN_MENU2">'.$i.'.</b><img src="'.DIR_WS_IMAGES.'blank.gif" width="8" height="8"></td>';
			echo '<td height="20" valign="bottom"><a class="link_SLOGAN_MENU2" href="product_info.php?products_id='.$top10_values['products_id'].'">'.substr($top10_values['products_name'], 0, 35).'</a></td></tr>';
		  $i++;
		}
	?>
</table>