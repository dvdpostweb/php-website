<div align="center">
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
    	$count_action_shop_query = tep_db_query("SELECT count(banners_image) as cpt FROM banners WHERE ".$active."=1 and DATE_FORMAT(expires_date, '%Y%m%d') > DATE_FORMAT(NOW(), '%Y%m%d') and  banners_group='436x164' and ".$active."=1 " );
		$count_action_shop_values = tep_db_fetch_array($count_action_shop_query);
		
 		if ($count_action_shop_values['cpt'] >0){
	 		$banner_query = tep_db_query("SELECT `banners_url`, `banners_image` FROM `banners` WHERE ".$active."=1 and DATE_FORMAT(expires_date, '%Y%m%d')> DATE_FORMAT(NOW(), '%Y%m%d') and banners_group='436x164' order by rand() limit 1");
			while ($banner_values = tep_db_fetch_array($banner_query)){    	
	    	echo '<p><a href="'.$banner_values['banners_url'].'"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/shop/'.$banner_values['banners_image'].'" border="0"  alt="Shop DVDPost"></a></p><br />';
    		}
	    	$banner_query = tep_db_query("SELECT `banners_url`, `banners_image` FROM `banners` WHERE ".$active."=1 and expires_date is NULL and  banners_group='436x164' order by rand() limit 1");
			while ($banner_values = tep_db_fetch_array($banner_query)){    	
	    	echo '<p><a href="'.$banner_values['banners_url'].'"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/shop/'.$banner_values['banners_image'].'" border="0"  alt="Shop DVDPost"></a></p>';
 			}
 		}else{
	 		$banner_query = tep_db_query("SELECT `banners_url`, `banners_image` FROM `banners` WHERE ".$active."=1 and  banners_group='436x164' and expires_date is NULL order by rand() limit 2");
			while ($banner_values = tep_db_fetch_array($banner_query)){    	
	    	echo '<p><a href="'.$banner_values['banners_url'].'"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/shop/'.$banner_values['banners_image'].'" border="0"  alt="Shop DVDPost"></a></p><br />';
			}
	    }	
   ?>
</div>