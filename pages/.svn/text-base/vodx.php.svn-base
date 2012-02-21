<?php  
?>

<style>
	
	
		
	.vod_title{
		height:40px;
		font-family:Arial, Helvetica, sans-serif;
		font-size:14px;
		font-weight:bold;
		color:#E2007A;;
		text-align:center;
		margin-bottom:10px;
		text-transform: uppercase;
	}
	
	.vod_bottom{
		font-family:Arial, Helvetica, sans-serif;
		font-size:12px;
		color:#827C80;
		text-align:center;
		margin-top:10px;
	}
	
	.vod_link{
		float:left;
		margin:3px;
		width:10px;
		height:10px;
		background-color:#ECEDED;
		font-size:12px;
		color:#E2007A;
		text-align:center;
		padding:5px 5px 5px 5px;		
	}
	
	.linked {
		text-decoration:none;
		color:#2B2221;
	}
	
	.linked:hover{
		text-decoration:underline;
		color:#2B2221;
	}
	
	#new_sticker{
		width:74px;
		height:71px;
		background-image:url(/images/www3/vodx/new.png);
		background-repeat:no-repeat;
		z-index:3;
		position:absolute;
	}
	
	#new{
		font-family: Arial, Helvetica, sans-serif;
		font-size:16px;
		font-weight:bold;
		padding:10px;
		text-transform: uppercase;
		font-size:18px;
		color:#E2007A;
		text-transform: uppercase;

		
	}
	
	.simple{
		width:300px;
		text-align:center;
	}
	
		
	#top_menu_vodx img{
	
		
		padding-right:5px;
		border:0;
	
	
	}
	
	#top_menu_vodx {
	
		padding-top:8px;
		padding-bottom:25px;
	
	
	}
	
</style> 

<div id="top_menu_vodx" align="right"><a href="/vodx.php"><img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/vodx/nouveaute_bouton.gif' ;?>" /></a><a href="/vodx_faq.php"><img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/vodx/aide_bouton.gif' ;?>" /></a>                     </div>


<?php
	if (isset($_GET['cat']))
		{$cat_id=$_GET['cat'];}
	else{$cat_id=0;}
	
	if (isset($_GET['page']))
		{$page=$_GET['page'];}
	else{$page=1;}
	
	$limit=($page-1)*10;
	
	
	
	if ($cat_id==0){
		// affiche seulement les nouveautés.
		echo '<div id="new">'.TEXT_VODX_NEW.'</div>';
		$droselia_video = tep_db_query("SELECT *,date_format(date, '%d/%m/%Y') as date2 FROM `droselia_catalog_stream` d where trash='NO' ORDER BY d.`date` DESC  limit ".$limit." , 10 ;") ;		
	}else{
		$droselia_count_video = tep_db_query("SELECT count(1) as cpt FROM droselia_catalog_stream where catalog_id in ( select catalog_id from droselia_category_to_catalog_stream where category_id= ".$cat_id." ) ") ;
		$droselia_count_video_values = tep_db_fetch_array($droselia_count_video);
		
		switch ($languages_id){
	    	case 1 :
	        	$trad='category_fr';
	         	break;
	         case 2 :
	         	$trad='category_nl'; 
	         	break;
	         case 3 :
	         	$trad='category_en';
	         	break; 			
	    }

		
		$droselia_cat_video = tep_db_query("SELECT ".$trad." FROM `droselia_category_stream` where category_id='".$cat_id."'") ;	
		$droselia_cat_video_values = tep_db_fetch_array($droselia_cat_video);
		
		echo '<div id="new">'.$droselia_cat_video_values[$trad].' ('.$droselia_count_video_values['cpt'].' séquences disponible)</div>';
		echo '<table><tr><td>';
		for ($dro_cpt=0; $dro_cpt< $droselia_count_video_values['cpt']/10 ; $dro_cpt++ ){
			$chk_page=$dro_cpt+1;
			if ($chk_page == $page){echo '<div class="vod_link"><b>'.$chk_page.'</b></div>';}
			else {echo '<div class="vod_link"><a class="linked" href="vodx.php?cat='.$cat.'&page='.$chk_page.'">'.$chk_page.'</a></div>';	}
		}
		echo '</td></tr></table>';
		$droselia_video = tep_db_query("SELECT *,date_format(date, '%d/%m/%Y') as date2 FROM droselia_catalog_stream where catalog_id in ( select catalog_id from droselia_category_to_catalog_stream where category_id= ".$cat_id.") order by  `date` DESC    limit ".		$limit." , 10 ;") ;
	}
	
			while ($droselia_video_values = tep_db_fetch_array($droselia_video)){
	
	
		
	$cpt++;
	?>
	
	<div class="vodx2-round">
    <div class="top"><span></span></div>
    <div class="center-content">
			<div class="vod_title">
				<?php echo $droselia_video_values['name'] ;?>
			</div>
			<div style="width:300px; text-align:center;">
				<?php
				 if ($cat_id==0){echo '<div id="new_sticker"></div>';}
				?>		
				<div class="simple">
					<a href="vodx_detail.php?id=<?php echo $droselia_video_values['catalog_id'];?>">
					 	<img src="<?php echo $droselia_video_values['directory_thumbs'].'290/2.jpg';?>" width="300"  border="0" alt="<?php echo $droselia_video_values['name'] ;?>">
					 </a>
				</div>
				<div class="simple">
					<table align="center" cellspacing="0" cellpadding="0" border="0">
						<tr>
							<?php
							for ($i=3 ; $i<6; $i++ ){
								echo '<td><a href="vodx_detail.php?id='.$droselia_video_values['catalog_id'].'"><img src="'.$droselia_video_values['directory_thumbs'].'100/'.$i.'.jpg" alt="'.$droselia_video_values['name'].'" border="0"></a></td>';
							}
							?>
							
						</tr>
					</table>
					 
				</div>
				<div class="vod_bottom">
					<?php 
						echo $droselia_video_values['weight'] .' Megas | '.ceil($droselia_video_values['duration']/60).' '.TEXT_MIN.' | '.TEXT_DATE.' '. $droselia_video_values['date2'].' <br>' ;
					?>
			        <a href="vodx_detail.php?id=<?php echo $droselia_video_values['catalog_id'] ;?>"><img src="<?php echo DIR_WS_IMAGES ; ?>vodx/download.jpg" alt="download" border="0"></a>
			    </div>
		   </div>
		</div>
    <div class="bottom"><span></span></div>
	</div>

	<?php
	
	}
?> 

		