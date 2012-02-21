<style>

	#top_menu_vodx {
	
		padding-top:8px;
		padding-bottom:25px;
		}
	
</style> 

<div id="top_menu_vodx"></div>

<center>
<div class="vodx-round">
    <div class="top"><span></span></div>
    <div class="center-content">

		<?php
		
		$id=$_POST['id'];
		$code=strtoupper($_POST['code']);
		
		$droselia_code_checker = tep_db_query("SELECT count(*) as cpt FROM droselia_codes where droselia_codes ='".$code."' AND customers_id ='".$customer_id."' AND used_date IS NULL ") ;
		$droselia_code_checker_values = tep_db_fetch_array($droselia_code_checker);
		
		if ($droselia_code_checker_values['cpt']==1 ){
			echo TEXT_EXPLAIN_DOWNLOAD;
			$droselia_video = tep_db_query("SELECT file_avi,file_mpg,file_m4v,file_flv FROM droselia_catalog_stream where catalog_id ='".$id."'") ;
			$droselia_video_values = tep_db_fetch_array($droselia_video);
			
			$affiliateid = 3;
			//$sharedkey ="jf%klpo5*65@\$jhbjnds(pp54fg";
			
			$api_key='d75fb5e4c53c50550eb7a961e6409132f25bda35';
			$private_key='jf%klpo5*65@$jhbjnds(pp54fg';
			//echo $api_key.', '.$private_key.' ,  '.$droselia_video_values['file_avi'];
			$url = '/vod_download.php?code='.$code.'&id='.$id.'&type=avi';
			echo '<div id ="vod_btn"><a href="'.$url.'"><img src="'.DIR_WS_IMAGES.'vodx/bouton_xvid.gif" border="0"</a>';
			$url = '/vod_download.php?code='.$code.'&id='.$id.'&type=mpg';
			echo '<a href="'.$url.'"><img src="'.DIR_WS_IMAGES.'vodx/bouton_mpeg.gif" border="0"</a>';
			$url = '/vod_download.php?code='.$code.'&id='.$id.'&type=m4v';
			echo '<a href="'.$url.'"><img src="'.DIR_WS_IMAGES.'vodx/bouton_ipod.gif" border="0"</a>';
			$url = '/vod_stream.php?code='.$code.'&id='.$id.'&type=avi';
			echo '<a href="'.$url.'"><img src="'.DIR_WS_IMAGES.'vodx/bouton_flash.gif" border="0"</a></div>';
			echo FOOTHER_EXPLAIN_DOWNLOAD.'<br/>';
			//tep_db_query("update droselia_codes set used_date = now() ,catalog_id = ".$id.",url_link = '".$url."'  where customers_id = '" . $customer_id . "' AND droselia_codes = '".$code."'");
		  	
		  	//EMAIL PREPARATION
		    

		  		  	
			
		}else { echo TEXT_NO_CODE;}
		
		?>
  
    </div>
    <div class="bottom"><span></span></div>
</div>

</center>
