<?php

$id=$_GET['id'];

$droselia_video = tep_db_query("SELECT *,date_format(date, '%d/%m/%Y') as date2 FROM droselia_catalog_stream where catalog_id ='".$id."'") ;
$droselia_video_values = tep_db_fetch_array($droselia_video);

$droselia_code_count = tep_db_query("SELECT count(droselia_codes) as cpt  FROM droselia_codes where customers_id ='".$customer_id."' AND used_date IS NULL ") ;
$droselia_code_count_values = tep_db_fetch_array($droselia_code_count);


?>


<style>
	
	
	#top_menu_vodx img{
	
		
		padding-right:5px;
		border:0;
	
	
	}
	
	#top_menu_vodx {
	
		padding-top:8px;
		padding-bottom:25px;
	
	
	}
	
	.foother_buy_codes {
		
		font-size: 12px;
		padding-top:20px;
		text-align: right;
		
		}
	
	
</style>

<div id="top_menu_vodx" align="right"><a href="/vodx.php"><img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/vodx/nouveaute_bouton.gif' ;?>" /></a><a href="/vodx_faq.php"><img src="<?php echo DIR_WS_IMAGES_LANGUAGES.$language.'/images/vodx/aide_bouton.gif' ;?>" /></a></div>

<center>
<div class="vodx-round">
    <div class="top"><span></span></div>
    <div class="center-content">
		<div class="titre_head2">
			<?php echo $droselia_video_values['name'];?>
			<br>
			<div class="txt_infos">
			<?php echo TEXT_WEIGHT . ' : '.$droselia_video_values['weight'].' Megas | '.TEXT_DURATION.' : '.ceil($droselia_video_values['duration']/60).' '.TEXT_MIN.' | '.TEXT_DATE.' '.$droselia_video_values['date2'] ;?>
			</div>
		
		</div>
		<br />
		<div class="txt_normal">
			<?php echo $droselia_video_values['description'];?>
		</div>
		<br />		
			<table border="0" cellspacing="3" cellpadding="0" align="center">
			<tr>
				<td><a href="#bas"><img border="0" src="<?php echo $droselia_video_values['directory_thumbs'] ;?>/200/1.jpg" width="194" height="150" /></a></td>
				<td><a href="#bas"><img border="0" src="<?php echo $droselia_video_values['directory_thumbs'] ;?>/200/2.jpg" width="194" height="150" /></a></td>
				<td><a href="#bas"><img border="0" src="<?php echo $droselia_video_values['directory_thumbs'] ;?>/200/3.jpg" width="194" height="150" /></a></td>
			</tr> 
			<tr>
				<td><a href="#bas"><img border="0" src="<?php echo $droselia_video_values['directory_thumbs'] ;?>/200/5.jpg" width="194" height="150" /></a></td>
				<td><a href="#bas"><img border="0" src="<?php echo $droselia_video_values['directory_thumbs'] ;?>/200/6.jpg" width="194" height="150" /></a></td>
				<td><a href="#bas"><img border="0" src="<?php echo $droselia_video_values['directory_thumbs'] ;?>/200/7.jpg" width="194" height="150" /></a></td>
			</tr> 
			<tr>
				<td><a href="#bas"><img border="0" src="<?php echo $droselia_video_values['directory_thumbs'] ;?>/200/9.jpg" width="194" height="150" /></a></td>
				<td><a href="#bas"><img border="0" src="<?php echo $droselia_video_values['directory_thumbs'] ;?>/200/10.jpg" width="194" height="150" /></a></td>
				<td><a href="#bas"><img border="0" src="<?php echo $droselia_video_values['directory_thumbs'] ;?>/200/11.jpg" width="194" height="150" /></a></td>
			</tr>  
			
			</table>
			
			<br />
			<?php 
				if ($droselia_code_count_values['cpt']>0){
			?>
						<form action="vod_check_code.php" method="POST" name="form" target="_self">
							<div class="titre_vid"><?php echo TEXT_DOWNLOAD ;?>
								<select name="code">
								<?php  
								  	$droselia_code = tep_db_query("SELECT droselia_codes  FROM droselia_codes where customers_id ='".$customer_id."' AND used_date IS NULL ") ;
								  	while ($droselia_code_values = tep_db_fetch_array($droselia_code)){
								  		echo '<option value="'.$droselia_code_values['droselia_codes'].'">'.$droselia_code_values['droselia_codes'].'</option>';
								    }
								?>
								</select>
								
								<input type="hidden" name="id" value="<? echo $id ;?>" />	    	
					    		<input type="submit" value="<?php echo TEXT_DOWNLOAD_CODES ;?>" style="height:25px; font-weight:bold;" />
							</div>
						<br />
						</form>
			<?php
				}
			?>
	</div>
    <div class="bottom"><span></span></div>
</div>

<br />
<?php 
	if ($droselia_code_count_values['cpt']==0 && 1 == 0){
?>
<div class="vodx-round">
    <div class="top"><span></span></div>
    <div class="center-content">
		<table width="764" border="0" cellpadding="0" cellspacing="3">
				<tr>
					<td align="left" valign="top" style="padding-left:5px;">
						<form name="form_buy" id="form_buy" action="vod_code_process.php" method="get" target="_self">
							<input type="hidden" name="id" value="<? echo $_GET['id'] ;?>" />
							<input type="hidden" name="go" value="achatcodecb" />
							<span class="titre_vente"><?php echo TEXT_BUY_CODES ;?></span><br />
							<table border="0" cellspacing="3" cellpadding="0">								
								<tr>
									<td style="padding-top:10px;">
										<?php
										$droselia_price = tep_db_query("select products_id, products_title, products_price from products where products_type='ABO' and products_media='VOD' order by products_price ASC ");
										while ($droselia_price_values = tep_db_fetch_array($droselia_price)){
											echo '<input name="offer_id" type="radio" value="'.$droselia_price_values['products_id'].'"  />';
											echo '<span class="txt_form">'.$droselia_price_values['products_title'].' ('.$droselia_price_values['products_price'].'&euro;)</span>&nbsp;&nbsp;&nbsp;';
										}
										?>							
										<input type="submit" value="<?php echo TEXT_BUY ;?> " style="height:25px; font-weight:bold;" />	<br /><br />
										<span class="foother_buy_codes"><?php echo FOOTHER_BUY_CODES ;?></span>
																																		</td>
								</tr>
							</table>
						</form>
					</td>
				</tr>
			</table>
    </div>
    <div class="bottom"><span></span></div>
</div>
<?php
}
tep_db_query("delete from shopping_cart where customers_id =  '" . $customer_id . "' and products_type='VOD' ");

?>

</center>

