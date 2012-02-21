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
      	
    	$count_action_shop_query = tep_db_query("SELECT count(banners_image) as cpt FROM banners WHERE ".$active."=1 and DATE_FORMAT(expires_date, '%Y%m%d')> DATE_FORMAT(NOW(), '%Y%m%d') and  banners_group='134x289' and ".$active."=1 " );
		$count_action_shop_values = tep_db_fetch_array($count_action_shop_query);
		
 		if ($count_action_shop_values['cpt'] >0){
 			$banner_query = tep_db_query("SELECT banners_url, banners_image FROM banners WHERE ".$active."=1 and DATE_FORMAT(expires_date, '%Y%m%d')> DATE_FORMAT(NOW(), '%Y%m%d') and  banners_group='134x289' order by rand() limit 1");
 			$banner_values = tep_db_fetch_array($banner_query);	
     		echo '<table width="131" height="289" border="0"  cellpadding="0" cellspacing="0"><tr>';
 			echo '<td><a href="'.$banner_values['banners_url'].'"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/shop/'.$banner_values['banners_image'].'" border="0" alt="Shop DVDPost"></a></td>';
 			echo '</tr></table>';
		}
	?>