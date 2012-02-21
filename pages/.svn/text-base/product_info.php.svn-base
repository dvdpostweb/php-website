<style type="text/css">
<!--
.ORIG_title {
	font-size: 14px;
	font-family: Arial, Helvetica, sans-serif;
	color: #999999;
	font-weight: bold;
}
-->
</style>
<?php 
		include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info/query_productsid_info.php')); 

if (!tep_db_num_rows($product_info)) { 
  // product not found in database
  ?>
	<table width="764"  align="center" border="0" cellspacing="0" cellpadding="0">
	  <tr>
	    <td rowspan="5" width="2" background="<?php echo DIR_WS_IMAGES;?>separator_two.jpg"><img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="2" height="1"></td>
		<td rowspan="5" width="10" ></td>
	    <td>
	      	<table width="582" border="0" align="center" cellpadding="0" cellspacing="0">
		  		<tr>
	        		<td  colspan="3" class="TYPO_STD2_BLACK" align="center" valign="middle"><br>  <?php echo TEXT_PRODUCT_NOT_FOUND; ?></td>
	      		</tr>
	      		<tr>
	        		<td  colspan="3" align="center" valign="middle"><br>   
	          			<a href="<?php echo tep_href_link(FILENAME_DEFAULT, '', 'NONSSL'); ?>"><?php echo tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE); ?></a></td>
	      		</tr>
			</table>
		</td>
	  </tr>
	</table>
  <?php
} else {
    //there is a product
    $product_info_values = tep_db_fetch_array($product_info);
    $undertitles_query = tep_db_query("select ut.products_undertitles_id from " . TABLE_PRODUCTS_TO_UNDERTITLES. " ut where ut.products_id = '" . $product_info_values['products_id'] . "'");
    $soundtracks_query = tep_db_query("select stn.soundtracks_description ,st.products_soundtracks_id from " . TABLE_PRODUCTS_TO_SOUNDTRACKS. " st LEFT JOIN products_soundtracks stn on  stn.soundtracks_id=st.products_soundtracks_id where st.products_id = '" . $product_info_values['products_id'] . "'");
    ?>
	<table width="764"  align="center" border="0" cellspacing="0" cellpadding="0">
	  <tr>
	    <td rowspan="5" width="2" background="<?php echo DIR_WS_IMAGES;?>separator_two.jpg"><img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="2" height="1"></td>
		<td rowspan="5" width="10" ></td>
	    <td>
	      <table width="582" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
				<td height="15" colspan="3"><img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="2" height="15"></td>
			</tr>
			<tr align="left">
				<td height="20" colspan="3" class="TYPO_STD2_BLACK">			  
					<img src="<?php echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3">
					<?php
						echo $product_info_values['products_name'].' ( '.$product_info_values['products_year'].' )';	
						if ($product_info_values['products_media']=='BlueRay'){
						echo '&nbsp;&nbsp;<font color="#0397D7"><i>Blu-Ray</i></font>';	
						}					
					?>
				</td>
			</tr>
			<tr align="right" valign="top">
				<td height="20" colspan="3" class="TYPO_STD2_BLACK">
					<font class="dvdpost_brown">
					<?php include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info/categories_themes.php')); ?>
					</font>
				</td>
			</tr>
			<tr>
				<td width="199" align="center" valign="top">
					<table width="200"  border="0" cellspacing="0" cellpadding="0">
						<?php
							if  ($product_info_values['products_dvdpostchoice'] > 0)  {
								echo '<tr><td height="25" colspan="2" align="center"class="SLOGAN_DETAIL_ROUGE">'.TEXT_HEART .'</td></tr>';
						}
						$today = getdate();
						if  ($product_info_values['new_dvd_datemonth'] + 2 > $today['month'] AND $product_info_values['new_dvd_dateyear'] == $today['year'] AND $product_info_values['in_cinema_now'] == 0)  {
							echo '<tr><td height="25" colspan="2" align="center"class="SLOGAN_DETAIL_ROUGE">- NEW -</td></tr>';
						}
						else if  ($product_info_values['last_added_dvd_datemonth'] + 2 > $today['month'] AND $product_info_values['last_added_dvd_dateyear'] == $today['year'] AND $product_info_values['in_cinema_now'] == 0)  {
							echo '<tr><td height="25" colspan="2" align="center"class="SLOGAN_DETAIL_ROUGE">- FRESH -</td></tr>';
						}
						?>		
						<tr>
							<?php
							switch ($product_info_values['products_media']){
							case 'BlueRay' :
								echo '<td colspan="2" align="center" valign="top"><table cellspacing="0" cellpadding="0"><tr>';
								echo '<td height="27" valign="bottom">';
								echo '<img src="'.DIR_WS_IMAGES.'/canvas/blu-ray.png"></td><tr><tr>';
								echo '<td><img class="bluborder" src="'.DIR_DVD_WS_IMAGES.$product_info_values['products_image_big'].'" border="0" width="160" alt="'.$tag_dvd.'"></td>';
								echo '</tr></table></td>';								
								break;
							
							default :
								echo '<td height="240" colspan="2" align="center" valign="top"><img src="'.DIR_DVD_WS_IMAGES.$product_info_values['products_image_big'].'" width="160" height="240" alt="'.$tag_dvd.'"></td>';
								break;
							}
							?>						
						</tr>
						<tr><td align="center" width="200" class="TYPO_STD_BLACK_bold" ><!-- AddThis Button BEGIN -->
						<div class="addthis_toolbox addthis_default_style" style="margin: 10px 0 0 25px">
						<?php 
							$url='http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
							$new=str_replace("info","info_public",$url);
						?>
						<a class="addthis_button_facebook" addthis:url="<?= $new?>"></a>
						<a class="addthis_button_email"></a>
						<a class="addthis_button_favorites"></a>
						<a class="addthis_button_print"></a>
						<span class="addthis_separator">|</span>
						<a href="http://www.addthis.com/bookmark.php?v=250" class="addthis_button_expanded">More</a>
						</div>
						<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js?pub=dvdpost"></script>
						<!-- AddThis Button END --></td></tr>
						<tr>
						<tr>
							<td width="200" align="center" valign="top" nowrap>
							   <?php
							    $alreadyordered_query = tep_db_query("select orders_products_id from orders o left join orders_products op on o.orders_id = op.orders_id where o.customers_id = '" . $customer_id . "' and op.products_id = '" . $product_info_values['products_id'] . "' ");
				                $alreadyordered = tep_db_fetch_array($alreadyordered_query);
				                if ($alreadyordered['orders_products_id']>0){
				                  echo '<br><img src="' . DIR_WS_IMAGES . 'eye.gif"><br>';
				                }
							   ?>
							   <?php include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info/button_addtowishlist.php'));?>
							   <br>
							   <?php include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info/button_buy.php'));?>
							 </td>
						</tr>
					</table>
				</td>
				<td colspan="2" align="center" valign="top" bgcolor="#FFFFFF" class="TYPO_STD_BLACK_bold">
					<?php include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info/table_title_description.php'));?>
				</td>
			</tr>
		  </table>
		</td>
	</tr>
	<tr>
		<td>
			<table width="582" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<?php include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info/Show_all series.php')); ?>
						<br>
						<?php include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info/table_addallserie.php')); ?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
		<?php 
		  	
			$timeout = 2;
			$old = ini_set('default_socket_timeout', $timeout);
			  	if ($product_info_values['imdb_id']>0 && $languages_id==1){
				  if($file_import = @fopen('http://www.cinopsis.be/dvdpost_test.cfm?imdb_id='.$product_info_values['imdb_id'], 'rb')){
					ini_set('default_socket_timeout', $old);
					stream_set_timeout($file_import, $timeout);
					stream_set_blocking($file_import, 0);  
				$cinopsis = '';
					while (!feof($file_import)) {
					  $cinopsis .= fread($file_import, 8192);
					}
				  fclose($file_import);
				  $position = strpos($cinopsis, 'NO_MATCHING_INFOS');
				  if (!$position){			  
					  echo '<div class="cinopcis">';
					  echo '<b>'.TEXT_CINOPSIS_CRITIC.'</b><br /><br />';				  
					  echo $cinopsis ;
					  echo '</div>';
			 	  }
		  		}else{
			 
			}
			}
		  	?>
		</td>
	</tr>
	<?php 
	 //box reviews
	 echo '<tr><td><br>';
	 include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info/table_reviews.php'));
	 tep_db_query("update " . TABLE_PRODUCTS_DESCRIPTION . " set products_viewed = products_viewed+1 where products_id = '" . $HTTP_GET_VARS['products_id'] . "' and language_id = '" . $languages_id . "'");
  
	 echo '</td></tr>';
   ?>
</table>
<?php } ?>
<?php
	 switch($languages_id){
		case 1:
			$lang='fr';
		break;
		case 2:
			$lang='nl';
		break;
		case 3:
			$lang='en';
		break;
		
	}
	if($_GET['recommend']==1)
	{
		$request =  'http://partners.thefilter.com/DVDPostService';
		$format = 'CaptureService.ashx';   // this can be xml, json, html, or php
		$args .= 'cmd=AddEvidence';
		$args .= '&catalogId='.$HTTP_GET_VARS['products_id'];
		$args .= '&eventType=UserRecClick';
		$args .= '&userId='.$customer_id;
		$args .= '&userLanguage='.$lang;
		$args .= '&clientIp='.$_SERVER['REMOTE_ADDR'];
		
	    // Get and config the curl session object
	    $session = curl_init($request.'/'.$format.'?'.$args);
	    curl_setopt($session, CURLOPT_HEADER, false);
	    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
		    //execute the request and close
	    $response = curl_exec($session);
	    curl_close($session);
	}
?>
<div id='filter' language='<?= $lang ?>'>

