<?
?><div class="main-holder">
<?php
		include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info/query_productsid_info.php')); 
		if (!tep_db_num_rows($product_info)) { 
		  // product not found in database
		  ?>
			<table width="100%" valign="top"  align="center" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td>
			      	<table width="582" border="0" align="center" cellpadding="0" cellspacing="0">
				  		<tr>
			        		<td align="center"  colspan="3" class="TYPO_STD2_BLACK"><br><br><?php   echo TEXT_PRODUCT_NOT_FOUND; ?></td>
			      		</tr>
			      		<tr align="center" valign="middle">
			        		<td  colspan="3"><br>   
			          			<a href="<?php   echo tep_href_link('/'.FILENAME_DEFAULT, '', 'NONSSL'); ?>"><?php   echo tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE); ?></a></td>
			      		</tr>
					</table>
				</td>
			  </tr>
			</table>
		  <?php  
		} else {
			 
			

		    //there is a product
		    tep_db_query("update " . TABLE_PRODUCTS_DESCRIPTION . " set products_viewed = products_viewed+1 where products_id = '" . $HTTP_GET_VARS['products_id'] . "' and language_id = '" . $languages_id . "'");
		    $product_info_values = tep_db_fetch_array($product_info);
		    $actors = tep_db_query("select a.actors_id from " . TABLE_PRODUCTS_TO_ACTORS. " a where a.products_id = '" . $product_info_values['products_id'] . "'");
		    $undertitles_query = tep_db_query("select ut.products_undertitles_id from " . TABLE_PRODUCTS_TO_UNDERTITLES. " ut where ut.products_id = '" . $product_info_values['products_id'] . "'");
		    $soundtracks_query = tep_db_query("select stn.soundtracks_description ,st.products_soundtracks_id from " . TABLE_PRODUCTS_TO_SOUNDTRACKS. " st LEFT JOIN products_soundtracks stn on  stn.soundtracks_id=st.products_soundtracks_id where st.products_id = '" . $product_info_values['products_id'] . "'");
		    ?>
		<div id="product_info_title">
			<?php  
				echo $product_info_values['products_name'] .' ('.$product_info_values['products_year'].')';
				if ($product_info_values['products_media']=='BlueRay'){
					echo '&nbsp;&nbsp;<font color="#0397D7"><i>Blu-Ray</i></font>';	
				}
			?>
		</div>
		<?php
		if(SITE_TYPE=='DVD_ADULT') 
		{
			if ($_COOKIE['adult_pwd_public']!=1) 
			{
				echo '<div class="disclaimer_x3">';
				require(getBestMatchToInclude(DIR_WS_COMMON  . 'pages/login_adultpwd_public.php'));  
				echo '</div>';
			}
		}
		?>
			  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="FFFFFF">
				<tr>
				<td width="199" align="center" valign="top"><table width=""  border="0" cellspacing="0" cellpadding="0"><tr><td><table width=""  border="0" cellspacing="0" cellpadding="0">
					<?php  
				if  ($product_info_values['products_dvdpostchoice'] > 0)  {
					echo '<tr><td height="25" colspan="2" align="center"class="SLOGAN_DETAIL_ROUGE">'.TEXT_HEART .'</td></tr>';
				}
				?>
					<?php  
				$today = getdate();
				if  ($product_info_values['dvddatemonth'] + 2 > $today['month'] AND $product_info_values['dvddateyear'] == $today['year'])  {
				echo '<tr><td height="25" colspan="2" align="center"class="SLOGAN_DETAIL_ROUGE">FRESH - FRESH - FRESH </td></tr>';
				}
				?>
					<tr>
					<?php 
						$path=(($product_info_values['products_type']=="DVD_NORM")? $constants['DIR_DVD_WS_IMAGES']:$constants['DIR_WS_IMAGESX']);
						$tag_dvd=TXT_TAG_DVD;
						$tag_dvd=str_replace('µµµdvdµµµ', $product_info_values['products_name'], $tag_dvd);
						switch ($product_info_values['products_media']){
							case 'BlueRay' :
								echo '<td colspan="2" align="center" valign="top"><table cellspacing="0" cellpadding="0"><tr>';
								echo '<td height="27" valign="bottom">';
								echo '<img src="'.$constants['DIR_WS_IMAGES'].'/canvas/blu-ray.png"></td><tr><tr>';
								echo '<td><img class="bluborder" src="'.$path.$product_info_values['products_image_big'].'" border="0" width="160" alt="'.$tag_dvd.'"></td>';
								echo '</tr></table></td>';								
								break;
							default :
								echo '<td height="240" colspan="2" align="center" valign="top"><img src="'.$path.$product_info_values['products_image_big'].'" width="160" height="240" alt="'.$tag_dvd.'"></td>';
								break;
						}
					?>	
					</tr>
					<tr><td align="center" width="200" class="TYPO_STD_BLACK_bold" ><!-- AddThis Button BEGIN -->
					<div class="addthis_toolbox addthis_default_style" style="margin: 10px 0 0 25px">
					<a class="addthis_button_facebook"></a>
					<a class="addthis_button_email"></a>
					<a class="addthis_button_favorites"></a>
					<a class="addthis_button_print"></a>
					<span class="addthis_separator">|</span>
					<a href="http://www.addthis.com/bookmark.php?v=250" class="addthis_button_expanded">More</a>
					</div>
					<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js?pub=dvdpost"></script>
					
					
					<!-- AddThis Button END --></td></tr>
					<tr>
					  <td width="200" height="35" align="center" valign="middle" nowrap class="TYPO_STD_BLACK_bold">		 
						<?php   
						if ($product_info_values['in_cinema_now'] >'0'){
							 echo '<img border="0" src="' . DIR_WS_IMAGES .  '/in_cinema_now.gif"><br><br>'; 
						 }				
						if ($product_info_values['products_next']==1){
							echo '<br><a href="/step1.php"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/canvas/comingsoon2.gif" border="0"></a><br><br>';
							echo TEXT_DISPONIBILITY; 
							echo formatAvailability($product_info_values['added_today'], $product_info_values['products_next'], $product_info_values['products_date_available'], $product_info_values['products_availability']); 
						}else{
							echo'<br>';
							echo '<a href="'.$link_freetrial.'"><img src="'.DIR_WS_IMAGES.'languages/'.$language.'/images/buttons/canvas/rent2.gif" border="0"></a>';
						}?>	
					   <br>
					   <br>
					   <?php  // include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info/button_buy_public.php'));?>
						
					  </td>
					</tr>
				</table></td>
				<td colspan="2" align="center" valign="top"  class="synopsis"><?php   include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info_public/table_title_description.php'));?>
				</td>
			  </tr>
			</table></td>
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
					  echo '<div class="cinopcis_title">'.TEXT_CINOPSIS_CRITIC.'</div>';				  
					  echo $cinopsis ;
					  echo '</div>';
			 	  }
		  		}else{
			 
			}
			}
		  	?>
			</td>
		  </tr>
		  <tr>
		    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
		      <tr>
		        <td>&nbsp;</td>
		      </tr>
		      <tr>
		        <td>
		          <?php  
				  switch(WEB_SITE_ID)
				  {				  		
				  case 26:
					$href='/step1.php?activation_code=BL4DVD';
					$img_button="buttonBL.gif";
					$img_promo="promoBL2.gif";
					include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info_public/table_promotion.php')); 
					break;
				  case 3:
					$href='/step1.php?activation_code=MSN4DVD';
					$img_button="button.gif";
					$img_promo="promo2.gif";
					include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info_public/table_promotion.php')); 
					break; 
				  case 4:
					$href='/step1.php?activation_code=MSN4DVD';
					$img_button="button.gif";
					$img_promo="promo2.gif";
					include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info_public/table_promotion.php')); 
					break;
				  default:
					$href=$link_freetrial;
					$img_button="button".((SITE_TYPE=='DVD_ADULT')?'x':'').".gif";
						 switch(ENTITY_ID)
							{
							case 38 : 
								$img_promo="promo2".((SITE_TYPE=='DVD_ADULT')?'x':'')."NL.gif";
								break;
								
							default :
								$img_promo="promo2".((SITE_TYPE=='DVD_ADULT')?'x':'').".gif";
								break;						
							}
					if(SITE_TYPE=='DVD_ADULT'){
						echo '<table width="950">';
						include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info_adult/table_screenshots.php'));
						echo '</table>';
					}		
					include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info_public/table_promotion.php')); 
					break;
					}        
		        ?>  
		        
		        </td>
		      </tr>
		    </table></td>
		  </tr>
		  <tr>
		    <td>
		    <br>
			</td>
		  </tr>
		</table>
	  <?php   } ?>
      
      </div>
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
	?>
	<div id='filter' language='<?= $lang ?>'>
    
    </div>
		
