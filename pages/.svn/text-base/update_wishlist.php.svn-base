<br>
<?php 
include(getBestMatchToInclude(DIR_WS_COMMON . 'includes/functions/add_wishlist.php'));
if ($count_dvds > 0 ){	
	$cpt=1;
	$query_in ='( ';
	while ($cpt < $count_dvds) {
		$query_in .=$HTTP_GET_VARS['pid'.$cpt].' ,';		
		$cpt++;		
	}
	$query_in .=$HTTP_GET_VARS['pid'.$cpt].' )';
?>

	<table border="0" align="center" cellpadding="0" cellspacing="0">  		
  		<tr>  			
			<?php 
			$listing_sql='select p.products_id, pd.products_image_big, products_next,  p.products_availability, p.products_language_fr,pd.products_name, p.products_undertitle_nl from products p '; 
			$listing_sql.=' LEFT JOIN  products_description pd on pd.products_id=p.products_id where pd.language_id =' . $languages_id .' and p.products_type = "DVD_NORM" '; //BEN001
			switch ($languages_id){
					case 1:
						$listing_sql.= ' and p.products_language_fr >0 ';
					break;
					case 2:
						$listing_sql.= ' and p.products_undertitle_nl >0 ';
					break;
					case 3:
					break;
					}
			$listing_sql.=' and p.products_id in '. $query_in;
			$listing_query = tep_db_query($listing_sql);
			$cpt=1;			
			while ($listing_query_values = tep_db_fetch_array($listing_query)){									
					//echo '<input type="hidden" name="pid'.$cpt.'" value="' . $$products.$cpt . '">';
					
					echo '<td align="center" valign="top" width="130"><table border="0" align="center" cellpadding="0" cellspacing="0" ><tr><td class="dvdpost_brown" height="30" align="center" valign="middle"><b>'. substr($listing_query_values['products_name'], 0, 30).'</b><td></tr>';									
					echo '<tr><td align="center"><a href="product_info.php?products_id='. $listing_query_values['products_id'].'"><img src="'.DIR_DVD_WS_IMAGES.$listing_query_values['products_image_big'].'" border="0" width="90" height="135" alt="'.$listing_query_values['products_name'].'" title="'.$listing_query_values['products_name'].'"></a></td></tr>';
					$ratings_average = tep_db_query("select AVG(products_rating) as prave from products_rating where products_id = '" . $listing_query_values['products_id'] . "'");
					$ratings_average_values = tep_db_fetch_array($ratings_average);
					$rate = round($ratings_average_values['prave'],1)*10;					
					echo '<tr><td align="center" valign="middle" height="22"><img src="'.DIR_DVD_WS_IMAGES.'starbar/stars_1_'.$rate.'.gif" height="13" align="absmiddle" border="0"></td></tr>';					
					add_wishlist($listing_query_values['products_id'] , $customers_id, $language,$PHP_SELF, $_SERVER['QUERY_STRING'],"center");
					if ($cpt % 5 ==0){
						if ($cpt % 2 ==1) {$bgcolor="#FCE9B3";}
						else{$bgcolor="#FFFFFF";}
						echo '</table><br></td></tr><table><table table border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="'.$bgcolor.'"><tr> ';
						}else{
						echo '</table><br></td><td>&nbsp;</td>';	
				}
				
				$cpt++;
			}				
			?>		
		</tr>		
	</table>					
	
	<table border="0" align="center" cellpadding="0" cellspacing="0" width="650">
		<tr>
			<td class="dvdpost_brown" height="60" align="right" valign="middle">
				<form action="add_20_titles_towishlist.php" method="post">
					<?php 
					$listing_sql='select p.products_id from products p '; 
					$listing_sql.=' where p.products_id in ( '.$pid1.','.$pid2.','.$pid3.','.$pid4.','.$pid5.','.$pid6.','.$pid7.','.$pid8.','.$pid9.','.$pid10.','.$pid11.','.$pid12.','.$pid13.','.$pid14.','.$pid15.','.$pid16.','.$pid17.','.$pid18.','.$pid19.','.$pid20.' ) ';
					$listing_query = tep_db_query($listing_sql);
					$count=1;
					while ($listing_query_values = tep_db_fetch_array($listing_query)){										
						${'pid'.$count} =$listing_query_values['products_id']; 
						echo '<input type="hidden" name="pid'.$count.'" value="'. ${'pid'.$count} .'" ';
						?>
						
					<?php 
					$count++	;				
					}
					?>
					<input type="hidden" name="count_dvd_to_add" value="<?php  echo $cpt - 1 ;?>"
					<input type="hidden" value="<?php  echo $self. '?' . $query_string ;?>" name="nexturl">
					<input type="image" src="<?php  echo DIR_WS_IMAGES_LANGUAGES . $language ;?>/images/buttons/button_add_all_recom_dvd.gif">
					</form>
				</td>
		</tr>
	</table>
<?php 
}
?>
				