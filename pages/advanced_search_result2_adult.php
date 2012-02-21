<?php    
$HTTP_GET_VARS['keywords']=trim($HTTP_GET_VARS['keywords']);
if (strlen($HTTP_GET_VARS['keywords'])>1){
	switch($type)
	{
		case 'actors':
			$good_list=$list_actors;
			$class_actor='TAB_SELECT_ACTIVE';
			$class_movie='TAB_SELECT_PASSIVE';
			$class_director='TAB_SELECT_PASSIVE';
			
		break;
		case 'studio':
		$good_list=$list_directors;
		$class_actor='TAB_SELECT_PASSIVE';
		$class_movie='TAB_SELECT_PASSIVE';
		$class_director='TAB_SELECT_ACTIVE';
		break;
		default:
		$good_list=$list;
		$class_actor='TAB_SELECT_PASSIVE';
		$class_movie='TAB_SELECT_ACTIVE';
		$class_director='TAB_SELECT_PASSIVE';
		
	}	
	?>
<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" height="15"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="14" height="2"></td>
  </tr>
  <tr>
	<?php   
//BEN001	$count_query = tep_db_query("SELECT COUNT( DISTINCT products_name ) as count  from products_description_adult pd LEFT JOIN products_adult p on p.products_id=pd.products_id WHERE pd.products_id > 9 and p.only_for_sale=0 AND pd.products_name LIKE '%" . $HTTP_GET_VARS['keywords'] . "%' ");	

	?>

	<td height="35" bgcolor="#F8E6F4" class="TYPO_STD_BLACK">
		<img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="14" height="8"> 
		<span class="TYPO_STD_BLACK_bold">
		<font color="#C60499"><?php   echo $count_movie[count];?></font> DVD,<img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="10" height="8">
		<font color="#C60499"><?php   echo $count_actors[count].'</font> '.TEXT_ACTORZ;?>,<img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="10" height="8">
		<font color="#C60499"><?php   echo $count_directors[count].'</font> '.TEXT_DIRECTORS;?><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="10" height="8">
		</span> 
		<?php   echo TEXT_CORRESPONDING ;?> " <span class="TYPO_STD_BLACK_bold"><?php    echo $keywords ?>
		</span>"
	</td>
  </tr>
</table>



<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
	<td colspan="13"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="14" height="2"></td>
  </tr>
  <tr align="center" valign="middle">
    <td width="91"  class="<?= class_movie ?>"> <font color="#C60499"><a href="advanced_search_result2_adult.php?type=movie&keywords=<?php   echo htmlspecialchars($keywords);?>" class="basiclink"><u><?php   echo $count_movie[count];?></font> <?php    echo TEXT_BY_TITLE;?></u></a></td>
    <td width="2"  class="TAB_SELECT_PASSIVE"><img src="<?php    echo DIR_WS_IMAGES;?>separator_dvdsearch.jpg" width="2" height="32"></td>
    <td width="87"  class="<?= class_actors ?>"> <font color="#C60499"><?php   echo $count_actors[count];?></font> <a href="advanced_search_result2_adult.php?type=actors&keywords=<?php   echo htmlspecialchars($keywords);?>" class="basiclink"><u><?php    echo TEXT_ACTORZ;?></u></a></td>
    <td width="2"  class="TAB_SELECT_PASSIVE"><img src="<?php    echo DIR_WS_IMAGES;?>separator_dvdsearch.jpg" width="2" height="32"></td>
    <td width="110"  class="<?= class_diretors ?>"> <font color="#C60499"><?php   echo $count_directors[count];?></font> <a href="advanced_search_result2_adult.php?type=studio&keywords=<?php   echo htmlspecialchars($keywords);?>" class="basiclink"><u><?php    echo TEXT_DIRECTORS;?></u></a></td>
    <td width="3"  class="TAB_SELECT_PASSIVE"><img src="<?php    echo DIR_WS_IMAGES;?>separator_dvdsearch.jpg" width="2" height="32"></td>
    <?php   
//BEN001	$select_str_products = "select if(to_days(p.products_date_added)=to_days(curdate()),1,0) added_today, p.products_id, pd.products_name, p.products_availability, p.products_language_fr, p.products_undertitle_nl, p.products_next, p.products_date_available,p.products_rating ,p.manufacturers_id,pd.products_description,pd.products_image_big, p.only_for_sale from products_adult p left join products_description_adult pd on p.products_id = pd.products_id where p.products_id > 9 and p.only_for_sale=0 and pd.products_name like '%" . $HTTP_GET_VARS['keywords'] . "%' group by p.products_id, pd.products_name order by pd.products_name";
switch ($languages_id){
	case 1: 
		$lang=" and p.products_language_fr = 1 ";
		break;
		
	case 2:
		$lang=" and p.products_undertitle_nl = 1 ";
		break;
		
	case 3:
		$lang=" ";
		break;
}
	$select_str_products = "select if(to_days(p.products_date_added)=to_days(curdate()),1,0) added_today, p.products_id, pd.products_name, p.products_availability, p.products_language_fr,products_media, p.products_undertitle_nl, p.products_next, p.products_date_available,p.products_rating ,rating_users,rating_count,p.products_studio,pd.products_description,pd.products_image_big, p.only_for_sale from products p left join products_description pd on p.products_id = pd.products_id and pd.language_id = ". $languages_id." where p.products_type = 'DVD_ADULT' and p.products_status!=-1 ".$filter." and p.only_for_sale=0 and  p.products_id in (".$good_list.") group by p.products_id, pd.products_name order by FIELD(p.products_id,".$good_list." )"; //BEN001
	
//echo '<br /><br />'.	$select_str_products;
	$colspan = sizeof($column_list);
	$listing_split = new splitPageResults($HTTP_GET_VARS['page'], MAX_DISPLAY_SEARCH_RESULTS,$select_str_products, $listing_numrows);
	if ($listing_numrows > 0 && (PREV_NEXT_BAR_LOCATION == '1' || PREV_NEXT_BAR_LOCATION == '3')) {
	?>
		<td align="center" class="TAB_SELECT_PASSIVE"><span class="SLOGAN_orange"><?php    echo $listing_split->display_links($listing_numrows, MAX_DISPLAY_SEARCH_RESULTS, MAX_DISPLAY_PAGE_LINKS, $HTTP_GET_VARS['page'], tep_get_all_get_params(array('page', 'info', 'x', 'y'))); ?></span></td>
	<?php   
		}
	?>

  </tr>
</table>
<?php   	
	
	$i=1;
	
	$query_search_products = tep_db_query($select_str_products);
	
	while ($product_info_values = tep_db_fetch_array($query_search_products)) {
		if ($i % 2 ==0){echo '<table width="764" height="150"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">'; }
		else {echo '<table width="764" height="150"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#F7EAF4">'; }
		$i++; 
		?>
		<tr>
			<td width="2" background="<?php    echo DIR_WS_IMAGES;?>separator_two.jpg"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="2" height="1"></td>
			<td><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="1" height="10">
				<?php 	
					$url_count++;
					echo '<span id="link'.$url_count.'" >&nbsp;</span>';
				?>
			</td>
		</tr>
		<tr>
			<td width="2" background="<?php    echo DIR_WS_IMAGES;?>separator_two.jpg"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="2" height="1"></td>
			<td width="762">
				<table width="<?php    echo SITE_WIDTH_PUBLIC; ?> border="0" align="center" cellpadding="0" cellspacing="0">
      <tr> 
        <td width="294" height="140" valign="top"> <table width="100%"  border="0" cellpadding="0" cellspacing="1" >
            <tr> 
              <td width="100" height="150" rowspan="5"> 	<?php 
              	switch ($product_info_values['products_media']){
					case 'BlueRay' :
						echo '<table cellspacing="0" cellpadding="0"><tr><td><img src="'.DIR_WS_IMAGES.'/canvas/blu-ray2.png" border="0" valign="bottom"></td></tr><tr><td>';
						echo '<a href="product_info_adult.php?cPath=21&products_id='.$product_info_values['products_id'].'"> ';
						echo '<img class="bluborder" src="'.DIR_WS_IMAGESX.$product_info_values['products_image_big'].'" border="0" width="108" height="144" alt="'.$tag_dvd.'" valign="top"></a></td></tr></table>';
						break;
					
					default :
						echo '<a href="product_info_adult.php?products_id='.$product_info_values['products_id'].'">';
						echo '<img src="'.DIR_WS_IMAGESX.$product_info_values['products_image_big'].'" border="0" width="111" height="167" alt="'.$tag_dvd.'">';
						echo '</a></td>';
						break;
				}
				?>
              <td height="30" align="center" valign="middle" bordercolor="#FFFFFF" bgcolor="#E7A8D8" > 
                <a class="button" href="product_info_adult.php?cPath=21&products_id= <?php    echo $product_info_values['products_id'] ?>"> 
                <b><?php    echo $product_info_values['products_name'];?></b> </a> </td>
            </tr>
            <tr> 
              <td height="30" bordercolor="#FFFFFF" bgcolor="#EAEAEA"> <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr > 
                    <td width="17%" height="30" bordercolor="#FFFFFF" bgcolor="#F8E6F4"><img src="<?php    echo DIR_WS_IMAGES;?>director_adult.jpg"> 
                    </td>
                    <td height="40" bordercolor="#FFFFFF" bgcolor="#F8E6F4" class="SLOGAN_DETAIL">
                      <?php   
													$studio = tep_db_query("select studio_name from studio  where studio_id = '" . $product_info_values['products_studio'] . "'");
													$studio_values = tep_db_fetch_array($studio);														
													echo '<b class="TYPO_STD_BLACK_bold"><a href="studio_adult.php?studio_id='. $product_info_values['products_studio']. '" class="basiclink"><u>'. $studio_values['studio_name']. '</u></a><img src="'. DIR_WS_IMAGES . 'blank.gif" width="3" height="3"></b>';						 
													?>
                    </td>
                  </tr>
                </table></td>
            </tr>
            <tr> 
              <td height="30" bordercolor="#FFFFFF" bgcolor="#EAEAEA"> <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr> 
                    <td width="17%" height="47" bordercolor="#FFFFFF" bgcolor="#F8E6F4"><img src="<?php    echo DIR_WS_IMAGES;?>actor_adult.jpg"></td>
                    <td width="83%" height="54" bordercolor="#FFFFFF" bgcolor="#F8E6F4" class="SLOGAN_BLACK">
                      <?php   
													$cpt=1;
													//RALPH-002 $actors = tep_db_query("select a.actors_id from products_to_actors_adult a where a.products_id = '" . $product_info_values['products_id'] . "'");
													$actors = tep_db_query("select a.actors_id from products_to_actors a where a.products_id = '" . $product_info_values['products_id'] . "'"); //RALPH-002
													while ($actors_adult_values = tep_db_fetch_array($actors)) {
														//RALPH-002 $actors_adult_name = tep_db_query("select an.Actors_Name from actors_adult an where an.Actors_id = '" . $actors_adult_values['actors_id'] . "'");  
														$actors_adult_name = tep_db_query("select an.Actors_Name from actors an where an.actors_type = 'DVD_ADULT' and an.Actors_id = '" . $actors_adult_values['actors_id'] . "'");  //RALPH-002
														$actors_adult_name_values = tep_db_fetch_array($actors_adult_name);
														if ($cpt < 4)
														{
														echo '<b class="TYPO_STD_BLACK_bold"><A href="actors_adult.php?actors_id=' .$actors_adult_values['actors_id'] . '" class="basiclink"><u>' . $actors_adult_name_values['Actors_Name'] . '</u></A><img src="'. DIR_WS_IMAGES . 'blank.gif" width="3" height="3"></b>';						 
														$cpt++;
														}							 
													} 
													?>
                    </td>
                  </tr>
                </table></td>
            </tr>
            <tr> 
              <td height="30"> <table width="100%" background="<?php    echo DIR_WS_IMAGES;?>background_dvdinfo_search_a.jpg">
                  <tr> 
                    <td height="30" bordercolor="#FFFFFF" class="SLOGAN_DETAIL_ROUGE"> 
                      <?php   
			    									$alreadyordered_query = tep_db_query("select orders_products_id from orders o left join orders_products op on o.orders_id = op.orders_id where o.customers_id = '" . $customer_id . "' and op.products_id = '" . $product_info_values['products_id'] . "' ");
                									$alreadyordered = tep_db_fetch_array($alreadyordered_query);
                									if ($alreadyordered['orders_products_id']>0){
                  										echo '<img src="' . DIR_WS_IMAGES . 'eye.gif">';
                									}
			   										?>
                    </td>
                    <td align="right"  height="30" valign="middle">
                      <?php   include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info_adult/button_addtowishlist2.php'));?>
                    </td>
                  </tr>
                </table></td>
            </tr>
          </table></td>
        <td width="438" valign="top"> 
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
              <td height="7" valign="top"><div align="center"><img src="<?php    echo DIR_WS_IMAGES;?>/greyline2.jpg" width="431" height="4"></div></td>
            </tr>
            <tr> 
              <td height="8" valign="top"> <table width="100%"  border="0" cellpadding="0" cellspacing="0">
                  <tr> 
                    <td width="4%" valign="top" class="SLOGAN_GRIS_FONCE"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
                    <td width="92%" valign="top" class="SLOGAN_GRIS_FONCE"><?php    echo substr($product_info_values['products_description'],0,250)?> 
                      ...</td>
                    <td width="4%" valign="top" class="SLOGAN_GRIS_FONCE"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="10" height="3"></td>
                  </tr>
                </table></td>
            </tr>
          </table>
		  <table width="100%">
				   <tr>
					<td height="10" colspan="2" valign="bottom" align="center"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
				  </tr>			  
				  <tr>
					<td height="20" valign="bottom" class="TYPO_PROMO" width="50%" align="center"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php    echo TEXT_ADVICE ;?></td>
					<td height="20" valign="bottom" class="TYPO_PROMO" width="50%" align="center"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3" class="TYPO_PROMO"><?php    echo DVDPOST_ADVICE ;?></td>
				  </tr>
				  <tr>			
					<td height="20" valign="top"  width="50%" align="center"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php   
						$data_avg_count=avg_count_fct($product_info_values['rating_users'] ,$product_info_values['rating_count'] );
						$stars=$jsrate=$data_avg_count['avg'];
						if ($jsrate==0){ 
							echo '<a href="' . FILENAME_PRODUCT_REVIEWS_WRITE_ADULT . '?cPath=21&products_id='. $product_info_values['products_id'] .'">' . tep_image_button('button_write_review.gif', IMAGE_BUTTON_WRITE_REVIEW) . '</a>';						
						}
						else {
							echo  '<img src="'. DIR_WS_IMAGES . 'starbar/stars_1_'. $jsrate .'.gif">';
							}
						?>			
					</td>
					<td height="20" valign="top"  width="50%" align="center">
						<img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php   
						 echo '<img src="' . DIR_WS_IMAGES . 'starbar/heart_2_' . $product_info_values['products_rating'] . '0.gif">';
						?>
					</td>				
				</tr>			
			</table>
        </td>
      </tr>
    </table>
			</TD>
		</TR>
		<tr>
			<td width="2" background="<?php    echo DIR_WS_IMAGES;?>separator_two.jpg"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="2" height="1"></td>
			<td><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="1" height="10"></td>
		</tr>
	</table>
  <?php    }
  ?>  
  <table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td width="2" background="<?php    echo DIR_WS_IMAGES;?>separator_two.jpg"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="2" height="1"></td>
		<td ><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="2" height="1"></td>
		<td  width="274" align="center" class="SLOGAN_orange"><?php    echo $listing_split->display_links($listing_numrows, MAX_DISPLAY_SEARCH_RESULTS, MAX_DISPLAY_PAGE_LINKS, $HTTP_GET_VARS['page'], tep_get_all_get_params(array('page', 'info', 'x', 'y'))); ?></td>
	</tr>
  </table>
<?php    
}else{ ?>
	<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
	  <tr>
	    <td height="15"><img src="<?php    echo DIR_WS_IMAGES;?>blank.gif" width="14" height="2"></td>
	  </tr>
	  <tr>
		<td width="526" height="34" bgcolor="#F8E6F4" align="center" class="TYPO_STD_BLACK_BOLD"><?php    echo TEXT_NO_MATCHING_SEARCH ;?></td>
	  </tr>
    </table>
<?php    } ?>

