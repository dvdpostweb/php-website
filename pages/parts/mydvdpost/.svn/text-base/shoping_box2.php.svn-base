<table width="180" height="150" border="0"  cellpadding="0" cellspacing="0">
<tr>
    <?php  
 		switch($languages_id){
			case 1:
				$active='status';		
				break;
				
			case 2:
				$active='active_nl';
				break;
				
			case 3:
				$active='active_en';
				break;
		} 
      	
    	$banner_values_all= tep_db_cache("SELECT banners_id, banners_url, banners_image FROM banners WHERE ".$active."=1 and DATE_FORMAT(expires_date, '%Y%M%d')> DATE_FORMAT(NOW(), '%Y%M%d')  and  banners_group='180x150' ",14400,2);
	
		$banner_values=$banner_values_all[0];
 		if (count($banner_values_all) >0){
     		echo '<td><a href="'.$banner_values['banners_url'].'"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/shop/'.$banner_values['banners_image'].'" border="0" alt="Shop DVDPost"></a></td>';
 		}else{ 
    		$banner_values_all = tep_db_cache("SELECT banners_id, banners_url, banners_image FROM banners WHERE ".$active."=1 and expires_date is NULL and  banners_group='180x150' ",14400,2);
			$banner_values=$banner_values_all[0];	
    		echo '<td><a href="'.$banner_values['banners_url'].'"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/shop/'.$banner_values['banners_image'].'" border="0" alt="Shop DVDPost"></a></td>';
 		}
	?>
</tr>
</table>