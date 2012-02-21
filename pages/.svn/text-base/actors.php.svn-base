
<?php 
$actor_info = tep_db_query("select Actors_Name, Actors_image , Actors_dateofbirth , Actors_awards, Actors_description from " . TABLE_ACTORS . " where Actors_id = '" . $HTTP_GET_VARS['actors_id'] . "' ");
if (!tep_db_num_rows($actor_info)) { // product not found in database 
?>
<table width="764" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr>
	<td align="center" class="TYPO_STD2_BLACK"><br><?php  echo TEXT_PRODUCT_NOT_FOUND; ?></td>
</tr>
<tr>
	<td align="center"><br><a href="<?php  echo tep_href_link(FILENAME_DEFAULT, '', 'NONSSL'); ?>"><?php  echo tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE); ?></a></td>
</tr>
</table>
<?php 
} else { 
//there is an actor
$actor_info_values = tep_db_fetch_array($actor_info);
?>
<table border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
  	<td  height="30" valign="bottom" align="center" class="TYPO_STD2_BLACK">
	<?php  echo TEXT_FILMOGRAPHY . ' : ' . $actor_info_values['Actors_Name'] ; ?>
	</td>
  </tr>
  <tr>
	<td height="10" align="right">
		<a href="picto.php" class="dvdpost_brown_underline"> (<?php  echo TEXT_PICTO ; ?>)</a>
	</td>
  </tr>
  <tr>
	<td   height="6"valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>line-it.jpg" width="764" height="6"></div></td>
  </tr>
</table>
<?php 
	$i=1;
	switch ($languages_id){
		case 1:
			$lang_q=' and products_language_fr=1';
			break;
		case 2:
			$lang_q=' and products_undertitle_nl=1';
			break;
		case 3:
			$lang_q=' ';
			break;	
	}
	
	$query="select if(to_days(p.products_date_added)=to_days(curdate()),1,0) added_today,p.rating_users,p.rating_count, p.products_id, p.products_media, pd.products_name, pd.products_description, p.in_cinema_now, p.products_model, p.products_quantity, p.products_image, pd.products_url, p.products_price, p.products_tax_class_id, p.products_date_added, p.products_date_available, p.manufacturers_id, p.products_public, p.products_runtime, p.products_year, p.products_picture_format , p.products_rating ,p.products_directors_id, p.products_regional_code, p.products_studio,p.products_availability,p.products_language_fr, p.products_undertitle_nl,pd.products_image_big, p.products_next,";
	$query .=" month(p.products_date_available) as new_dvd_datemonth, year(p.products_date_available) as new_dvd_dateyear, ";
	$query .=" month(p.products_date_added) as last_added_dvd_datemonth, year(p.products_date_added) as last_added_dvd_dateyear, p.imdb_id  from products p ";
	$query .=" LEFT JOIN products_to_actors pta on p.products_id=pta.products_id ";
	$query .=" LEFT JOIN products_description pd on pd.products_id = p.products_id and pd.language_id = '" . $languages_id . "'";
	//$query .=" LEFT JOIN products_to_categories  pc on pc.products_id = p.products_id 
	$query .=" where pta.actors_id = '" . $HTTP_GET_VARS['actors_id'] . "'  AND p.products_status>-1 ";
	$query.=" ".$lang_q;
	$a = tep_db_query($query);
	//$a = tep_db_query("select pta.products_id  from products p LEFT JOIN products_to_actors pta on p.products_id=pta.products_id where pta.actors_id = '" . $HTTP_GET_VARS['actors_id'] . "' AND p.products_status>-1");
	while ($product_info_values = tep_db_fetch_array($a)) {
		$directors_name = tep_db_query("select d.Directors_name from " . TABLE_DIRECTORS. " d where d.Directors_id = '" . $product_info_values['products_directors_id'] . "'");  
		$directors_name_values = tep_db_fetch_array($directors_name);

									
		if ($i % 2 ==0){echo '<table width="764" height="150"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#F2F2F2">'; }
		else {echo '<table width="764" height="150"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">'; }
		$i++; 
?>
  <tr>
   <td width="2" background="<?php  echo DIR_WS_IMAGES;?>separator_two.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="2" height="1"></td>
   <td><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="10">
	<?php 	
		$url_count++;
		echo '<span id="link'.$url_count.'" >&nbsp;</span>';
	?>
	</td>
  </tr>
  <tr>
  <td width="2" background="<?php  echo DIR_WS_IMAGES;?>separator_two.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="2" height="1"></td>
  <td width="762"> <table width="<?php  echo SITE_WIDTH_PUBLIC; ?> border="0" align="center" cellpadding="0" cellspacing="0">
      <tr> 
        <td width="294" valign="top"> <table width="100%"  border="0" cellpadding="0" cellspacing="1" >
            <tr> 
              <td width="100" height="150" rowspan="5">
	                <?php 
						
	              	switch ($product_info_values['products_media']){
						case 'BlueRay' :
							echo '<table cellspacing="0" cellpadding="0"><tr><td><img src="'.DIR_WS_IMAGES.'/canvas/blu-ray2.png" border="0" valign="bottom"></td></tr><tr><td>';
							echo '<a  href="product_info.php?products_id='.$product_info_values['products_id'].'">';
							echo '<img class="bluborder" src="'.DIR_DVD_WS_IMAGES.$product_info_values['products_image_big'].'" border="0" width="108" height="144" alt="'.$product_info_values['products_name'].'" valign="top"></a></td></tr></table>';
							echo '<td height="20" align="center" valign="middle" bordercolor="#FFFFFF" class="DVD_TITLE_BLU ">';
							break;
						
						default :
							echo '<a href="product_info.php?products_id='.$product_info_values['products_id'].'">';
							echo '<img src="'.DIR_DVD_WS_IMAGES.$product_info_values['products_image_big'].'" border="0" width="108" height="162" alt="'.$product_info_values['products_name'].'">';
							echo '</a></td>';
							echo '<td height="33" align="center" valign="middle" bordercolor="#FFFFFF" class="DVD_TITLE_BLANK ">';
							break;
					}
					?>
                  <b><?php  echo $product_info_values['products_name'];?></b> </a> 
                </td>
              </tr>
            <tr> 
              <td height="30" bordercolor="#FFFFFF" bgcolor="#EAEAEA"><span class="TYPO_STD_BLACK_bold"> 
                <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="5" height="3"> 
                <?php  
			if ($product_info_values['products_language_fr']>0){
				echo '<img src="' . DIR_WS_IMAGES. 'dvd_circle_FR.gif">';
			}
			if ($product_info_values['products_undertitle_nl']>0){
				echo '<img src="' . DIR_WS_IMAGES. 'dvd_circle_NL.gif">';
			}
			?>
                </span></td>
            </tr>
            <tr> 
              <td height="30" bordercolor="#FFFFFF" bgcolor="#EAEAEA"> <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr > 
                    <td width="17%" height="30" bordercolor="#FFFFFF" bgcolor="#EAEAEA"><img src="<?php  echo DIR_WS_IMAGES;?>director.jpg"> 
                    </td>
                    <td bordercolor="#FFFFFF" bgcolor="#EAEAEA" class="SLOGAN_DETAIL"><span class="TYPO_STD_BLACK_bold"><a href="directors.php?directors_id=<?php  echo $product_info_values['products_directors_id'];?>" class="basiclink"><u><?php  echo $directors_name_values['Directors_name'];?></u></a></span></td>
                  </tr>
                </table></td>
            </tr>
            <tr> 
              <td height="30" bordercolor="#FFFFFF" bgcolor="#EAEAEA"> <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr> 
                    <td width="17%" height="30" bordercolor="#FFFFFF" bgcolor="#EAEAEA"><img src="<?php  echo DIR_WS_IMAGES;?>actor.jpg"></td>
                    <td height="40" bordercolor="#FFFFFF" bgcolor="#EAEAEA" class="SLOGAN_BLACK"> 
                      <?php 
						$cpt=1;
						$str="select Actors_Name,a.actors_id from " . TABLE_ACTORS. " a join ".TABLE_PRODUCTS_TO_ACTORS." ap on a.actors_id = ap.actors_id where ap.products_id = '" . $product_info_values['products_id']. "'";
						$actors_name = tep_db_query($str);
						  
						while($actors_name_values = tep_db_fetch_array($actors_name)){
					 	if ($cpt < 4)
							{
							echo '<b class="TYPO_STD_BLACK_bold"><A href="actors.php?actors_id=' .$actors_name_values['actors_id'] . '" class="basiclink"><u>' . $actors_name_values['Actors_Name'] . '</u></A><img src="'. DIR_WS_IMAGES . 'blank.gif" width="3" height="3"></b>';						 
							$cpt++;
							}							 
						} ?>
                    </td>
                  </tr>
                </table></td>
            </tr>
            <tr> 
              <td> <table width="100%" background="<?php  echo DIR_WS_IMAGES;?>background_dvdinfo_search_.jpg">
                  <tr> 
                    <td height="30" bordercolor="#FFFFFF" class="SLOGAN_DETAIL_ROUGE"> 
                      <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"> 
                      <?php 
			    		$alreadyordered_query = tep_db_query("select orders_products_id from orders o left join orders_products op on o.orders_id = op.orders_id where o.customers_id = '" . $customer_id . "' and op.products_id = '" . $product_info_values['products_id'] . "' ");
                		$alreadyordered = tep_db_fetch_array($alreadyordered_query);
       					if ($alreadyordered['orders_products_id']>0){
    						echo '<img src="' . DIR_WS_IMAGES . 'eye.gif">';
        				}
						?>
                      <?php 
					$today = getdate();
					if  ($product_info_values['new_dvd_datemonth'] + 2 > $today['month'] AND $product_info_values['new_dvd_dateyear'] == $today['year'] AND $product_info_values['in_cinema_now'] == 0)  {
					echo '- NEW -';
					}
					else if  ($product_info_values['last_added_dvd_datemonth'] + 2 > $today['month'] AND $product_info_values['last_added_dvd_dateyear'] == $today['year'] AND $product_info_values['in_cinema_now'] == 0)  {
					echo '- FRESH -';
					}
				  ?>
                    </td>
                    <td align="right"  height="30" valign="middle"> 
                      <?php  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info/button_addtowishlist2.php'));?>
                    </td>
                  </tr>
                </table></td>
            </tr>
          </table></td>
        <td width="437" valign="top"> 
          <table width="100%"  border="0" cellpadding="0" cellspacing="0">
            <tr valign="middle"> 
              <td width="100%" height="30" align="center" class="SLOGAN_BLACK"> 
                <?php  
		  	$categories = tep_db_query("select cd.categories_name from " . TABLE_PRODUCTS_TO_CATEGORIES. " c, " . TABLE_CATEGORIES_DESCRIPTION. " cd where cd.categories_id=c.categories_id and cd.language_id = '" . $languages_id . "' and c.products_id='" . $product_info_values['products_id'] . "'");
		    $categories_values = tep_db_fetch_array($categories);
			echo '<strong>' . $categories_values['categories_name'] .'</strong>';
			?>
              </td>
            </tr>
            <tr> 
              <td height="7" valign="top"><div align="center"><img src="<?php  echo DIR_WS_IMAGES;?>/greyline2.jpg" width="430" height="4"></div></td>
            </tr>
            <tr> 
              <td height="8" valign="top"> <table width="100%"  border="0" cellpadding="0" cellspacing="0">
                  <tr> 
                    <td valign="top" class="SLOGAN_GRIS_FONCE"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
                    <td valign="top" class="SLOGAN_GRIS_FONCE"> <?php  echo substr($product_info_values['products_description'],0,200)?> 
                      ... <br> <br> <div align="center"> <a class="basiclink" href="product_info.php?cPath=21&products_id=<?php  echo $product_info_values['products_id'];?>"> 
                        (<u><?php  echo TEXT_MORE_INFO ?></u>) </a> </div></td>
                    <td valign="top" class="SLOGAN_GRIS_FONCE"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
                  </tr>
                </table>
                <table width="100%">
				   <tr>
					<td height="10" colspan="2" valign="bottom" align="center"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
				  </tr>			  
				  <tr>
					<td height="20" valign="bottom" class="TYPO_PROMO" width="50%" align="center"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php  echo TEXT_ADVICE ;?></td>
					<td height="20" valign="bottom" class="TYPO_PROMO" width="50%" align="center"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3" class="TYPO_PROMO"><?php  echo DVDPOST_ADVICE ;?></td>
				  </tr>
				  <tr>			
					<td height="20" valign="top"  width="50%" align="center"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php 

						$data_avg_count=avg_count_fct($product_info_values['rating_users'],$product_info_values['rating_count']);
						$jsrate=$data_avg_count['avg'];
						if ($jsrate==0){ 
							echo '<a href="' . FILENAME_PRODUCT_REVIEWS_WRITE . '?cPath=21&products_id='. $product_info_values['products_id'] .'">' . tep_image_button('button_write_review.gif', IMAGE_BUTTON_WRITE_REVIEW) . '</a>';						
						}
						else {
							
							echo  '<img src="'. DIR_WS_IMAGES . 'starbar/stars_1_'. $jsrate .'.gif">';
							}
						?>			
					</td>
					<td height="20" valign="top"  width="50%" align="center">
						<img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php 
						 echo '<img src="' . DIR_WS_IMAGES . 'starbar/heart_2_' . $product_info_values['products_rating'] . '0.gif">';
						?>
					</td>				
				</tr>			
			</table>
				
				
				
				</td>
            </tr>
          </table></td>
      </tr>
    </table></TD>
</TR>
  <tr>
   <td width="2" background="<?php  echo DIR_WS_IMAGES;?>separator_two.jpg"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="2" height="1"></td>
   <td><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="1" height="10"></td>
  </tr>
</table>
  <?php  } 
}?>

