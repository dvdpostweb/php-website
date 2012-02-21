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
    	$banner_query = tep_db_query("SELECT `banners_url`, `banners_image` FROM `banners` WHERE ".$active."=1 and `expires_date`is NULL and  banners_group='220x340' order by rand() limit 1");
		$banner_values = tep_db_fetch_array($banner_query);    	
    	echo '<a href="'.$banner_values['banners_url'].'"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/shop/'.$banner_values['banners_image'].'" border="0"  alt="Shop DVDPost"></a>';
	?>
</div>