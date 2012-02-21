<table width="269" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="14" height="14"  valign="top" nowrap background="<?php   echo DIR_WS_IMAGES;?>img_recom/top_left_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="14"></td>
    <td height="14"  background="<?php   echo DIR_WS_IMAGES;?>img_recom/top_line_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="14"></td>
	<td width="14" background="<?php   echo DIR_WS_IMAGES;?>img_recom/top_right_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="14"></td>
  </tr>
  <tr>
    <td width="14" rowspan="2" background="<?php   echo DIR_WS_IMAGES;?>img_recom/left_line_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="14"></td>
    <td height="25" align="center" valign="top" class="SLOGAN_BLACK"><b><?php   echo TEXT_NEXT ;?></b></td>
    <td width="14"rowspan="2" background="<?php   echo DIR_WS_IMAGES;?>img_recom/right_line_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="14"></td>
  </tr>
  <tr>
    <td width="241" align="left" valign="top" class="TYPO_STD_BLACK">
     <?php  
		$listing_sql = 'select p.products_id, p.products_date_available, p.products_directors_id, pd.products_name , pd.products_image_big , di.directors_name from ' . TABLE_PRODUCTS . ' p left join ' . TABLE_DIRECTORS . ' di on p.products_directors_id = di.Directors_id ';
		$listing_sql .= ' left join ' . TABLE_PRODUCTS_DESCRIPTION . ' pd on p.products_id = pd.products_id and pd.language_id=' . $languages_id ;
		$listing_sql.= ' where p.products_next=1 and in_cinema_now = 0 ';
		$listing_sql.= ' and products_type = "DVD_NORM" and p.products_media="DVD" '; //BEN001
		//$listing_sql:= ' and in_the_bags_next = 1 ';
		switch ($languages_id){
				case 1:
					$listing_sql.= ' and p.products_language_fr >0 ';
				break;
				case 2:
					$listing_sql.= ' and p.products_undertitle_nl >0 ';
				break;
				case 3:
				break;
				}
		$listing_top_sql = $listing_sql;
		$top_query = tep_db_query($listing_top_sql . ' order by rand() limit 4');
		$cpt=1;
		while ($top = tep_db_fetch_array($top_query)) {
		  if ($cpt==1){
				$cpt++;
				?>
				<table width="100%"  border="0" cellpadding="0" cellspacing="1" bgcolor="#EEEEEE" >
                  <tr>
                    <td width="100" height="150" rowspan="4" valign="top"><a href="product_info.php?products_id=<?php   echo $top['products_id'] ;?>"><img src="'.$constants['DIR_DVD_WS_IMAGES'].'/<?php   echo $top['products_image_big'] ;?>" border="0" width="100" height="150" alt="<?php   echo $top['products_name'] ;?>"></a></td>
                    <td width="140" height="30" align="center" valign="middle" bordercolor="#FFFFFF" bgcolor="#999999" ><a class="button" href="product_info.php?products_id=<?php   echo $top['products_id'] ;?>"><b><?php   echo $top['products_name'] ;?></b></a></td>
                  </tr>
                  <tr>
                    <td height="30" bordercolor="#FFFFFF" bgcolor="#EAEAEA"><span class="TYPO_STD_BLACK_bold"><img src="<?php   echo DIR_WS_IMAGES;?>director.jpg" align="absmiddle"><?php   echo $top['directors_name'] ;?></span></td>
                  </tr>
                  <tr>
                    <td bordercolor="#FFFFFF" bgcolor="#EAEAEA"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="47" bordercolor="#FFFFFF" bgcolor="#EAEAEA" class="TYPO_STD_BLACK_bold"><img src="<?php   echo DIR_WS_IMAGES;?>actor.jpg" align="absmiddle">
                              <?php  
						$actors = tep_db_query("select a.actors_id from " . TABLE_PRODUCTS_TO_ACTORS. " a where a.products_id = '" .  $top['products_id'] . "'");
						$cpt=1;
						while ($actors_values = tep_db_fetch_array($actors)) {
						$actors_name = tep_db_query("select an.Actors_Name from " . TABLE_ACTORS. " an where an.Actors_id = '" . $actors_values['actors_id'] . "'");  
						$actors_name_values = tep_db_fetch_array($actors_name);
					 	if ($cpt < 4)
							{
							echo '<b class="TYPO_STD_BLACK_bold"><A href="actors.php?actors_id=' .$actors_values['actors_id'] . '" class="basiclink"><u>' . $actors_name_values['Actors_Name'] . '</u></A><img src="'. DIR_WS_IMAGES . 'blank.gif" width="3" height="3"></b>';						 
							$cpt++;
							} 
						}?>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td><table width="100%" background="<?php   echo DIR_WS_IMAGES;?>background_dvdinfo_search_.jpg">
                        <tr>
                          <td height="30" bordercolor="#FFFFFF" class="SLOGAN_DETAIL_ROUGE"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
                          <td align="right"  height="30" valign="middle"><?php   
								$product_info_values['products_id']=$top['products_id'];
								include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info/button_addtowishlist2.php'));
							?>
                          </td>
                        </tr>
                    </table></td>
                  </tr>
                </table>
				<br>				<?php  
			}else{
		 ?>
		 <li><a class="basiclink" href="product_info.php?products_id=<?php   echo $top['products_id'] ;?>"><?php   echo $top['products_name'];?></a> <span class="TYPO_STD_GREY">   (<font color="#934431"><?php   echo substr($top['products_date_available'],0,10)?></font>)</span></li>
		 <br>
		<?php  }
		}
	?>	
	</td>
  </tr>
  <tr>
    <td width="14" background="<?php   echo DIR_WS_IMAGES;?>img_recom/back_left_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="14"></td>
    <td background="<?php   echo DIR_WS_IMAGES;?>img_recom/back_line_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="14"></td>
	<td width="14" background="<?php   echo DIR_WS_IMAGES;?>img_recom/back_right_recom.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="14"></td>
  </tr>
</table>
