<style type="text/css">
<!--
.Style3 {font-size: 20px;font-family: Arial, Helvetica, sans-serif;color: #FF0000;}
.Style3mini {font-size: 15px;font-family: Arial, Helvetica, sans-serif;color: #FF0000;}
.Style4 {font-family: Arial, Helvetica, sans-serif; color: #FF0000; font-size: 36px;}
.Style5 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
}
.Style6 {font-family: Arial, Helvetica, sans-serif;	font-size: 12px;}
.contract {font-family: Arial, Helvetica, sans-serif;	font-size: 9px;}

a.big_link {	font-size: 25px;color: #2100AD;}
a:link.big_link {text-decoration: none;}
a:visited.big_link {text-decoration: none;	color: #2100AD;}
a:hover.big_link {text-decoration: underline;color: #2100AD;}
a:active.big_link {text-decoration: none;color: #2100AD;}

-->
</style>
<table width="764" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="FFFFFF">
  <tr>
    <td  valign="middle" align="left" height="40"width="50%" class="slogan_detail"><?php   echo TEXT_WIN_POINTS; ?></td>
  </tr>
    <tr>
    <td  height="6" colspan="3" valign="top"><div align="center"><img src="<?php   echo DIR_WS_IMAGES;?>line-it.jpg" width="764" height="6"></div></td>
  </tr>
    <tr>
    <td  valign="middle" align="left" height="45"width="50%" class="TYPO_ROUGE_ITALIQUE"><?php   echo TEXT_WIN_POINTS2; ?></td>
  </tr>
</table>
<table width="764" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="FFFFFF">
  <tr> 
    <td colspan="5"><img src="<?php   echo DIR_WS_IMAGES_LANGUAGES . $language ;?>/images/gift/coffret_desperate_housewive.jpg" width="764" height="180"></td>
  </tr>
  <tr> 
    <td height="20" colspan="5">&nbsp;</td>
  </tr>
  <tr> 
    <td width="201" rowspan="3"><img src="<?php   echo DIR_WS_IMAGES_LANGUAGES . $language ;?>/images/gift/abofree.gif"></td>
    <td width="20" rowspan="3">&nbsp;</td>
    <td colspan="3"><img src="<?php   echo DIR_WS_IMAGES_LANGUAGES . $language ;?>/images/gift/projecteur.jpg"></td>
  </tr>
  <tr> 
    <td colspan="3" align="center"><img src="<?php   echo DIR_WS_IMAGES_LANGUAGES . $language ;?>/images/gift/home_cinema.jpg"></td>
  </tr>
  <tr> 
    <td width="205">&nbsp;</td>
    <td width="20">&nbsp;</td>
    <td width="301">&nbsp;</td>
  </tr>
</table>
<table width="764" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="FFFFFF">
  <tr>
    <td height="20" colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td width="425"><img src="<?php   echo DIR_WS_IMAGES_LANGUAGES . $language ;?>/images/gift/dvd_portable.jpg"></td>
    <td width="20" rowspan="2">&nbsp;</td>
    <td width="319"><img src="<?php   echo DIR_WS_IMAGES_LANGUAGES . $language ;?>/images/gift/psp.jpg"></td>
  </tr>
  <tr>
    <td width="425">&nbsp;</td>
    <td align="right" class="Style6">&nbsp;</td>
  </tr>
</table>
<br>
<table width="764" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="FFFFFF">
  <tr>
    <td class="Style4"> <img src="'.$constants['DIR_WS_IMAGES'].'/blank.gif" width="10" height="8" align="absmiddle"><?php   echo TEXT_ALSO ;?></td>
  </tr>
  <tr>
    <td><img src="<?php   echo DIR_WS_IMAGES ;?>bckg_points_top_rounded.gif"></td>
  </tr>
  <tr>
    <td background="<?php   echo DIR_WS_IMAGES ;?>bckg_points_fill_rounded.gif"><table width="705"  border="0" align="center" cellpadding="0" cellspacing="0">
      <tr valign="top">
        <td width="331" height="40"><span class="Style3"><b><?php   echo TEXT_DVD_220 ;?></b> </span><span class="Style3mini"><?php   echo TEXT_PER_PIECE ?></span> </td>
        <td width="47">&nbsp;</td>
        <td width="327" height="40" class="Style3"><b><?php   echo TEXT_DVD_300 ;?></b> <span class="Style3mini"><?php   echo TEXT_PER_PIECE ?></span></td>
      </tr>
      <tr>
        <td height="250">
				<?php  
    			$listing_sql='SELECT mg.products_id , pd. products_name , p.products_language_fr , p.products_undertitle_nl, pd.products_image_big ';
				$listing_sql.=' FROM mem_get_mem_gift mg,  products p ,  products_description pd ';
				$listing_sql.=' WHERE mg.products_id > 0 AND mg.products_id=p.products_id and p.products_id=pd.products_id  AND mg. quantity>0 and mg.points=200 and pd.language_id=' . $languages_id ;
				switch ($languages_id){
					case 1:
						$listing_sql.= ' and p.products_language_fr >0 ';
						break;
					case 2:
						$listing_sql.= ' and p.products_undertitle_nl >0 ';
					break;
						case 3:
						$listing_sql.= ' and p.products_undertitle_nl >0 ';
					break;
				}
				$listing_sql.= ' and p.products_type = "DVD_NORM" '; //BEN001
				$listing_sql.=' ORDER BY mg.points ASC LIMIT 3';
				$listing = tep_db_query($listing_sql);
				while ($product_info_values = tep_db_fetch_array($listing)) {
					?>
					<table width="304"  border="0" cellspacing="0" cellpadding="0">
          				<tr>
							<td width="69" rowspan="2"><a href="http://www.dvdpost.be/product_info.php?products_id=<?php   echo $product_info_values['products_id'] ;?>"><img src="<?php   echo DIR_DVD_WS_IMAGES.$product_info_values['products_image_big'] ;?>" border="0" width="60" height="90"></td>
							<td width="235" valign="top"><span class="Style5"><?php   echo $product_info_values['products_name'] ;?></span></td>
          				</tr>
          				<tr>
            				<td class="Style6">
            				<?php  
            				$actors_sql="SELECT a.actors_name, pa.actors_id FROM products_to_actors pa , actors a where pa.products_id ='". $product_info_values['products_id']. "' and pa.actors_id=a.actors_id";
            				$actors_listing = tep_db_query($actors_sql);
            				while ($actors_values = tep_db_fetch_array($actors_listing)) {
            					echo $actors_values['actors_name'].'<br>';
	            			}	
            				?></td>
          				</tr>
          				<tr>
            				<td colspan="2">&nbsp;</td>
          				</tr>
        			</table>
					<?php   } ?>

          </td>
        <td>&nbsp;</td>
        <td height="250">
				<?php  
    			$listing_sql='SELECT mg.products_id , pd. products_name , p.products_language_fr , p.products_undertitle_nl, pd.products_image_big ';
				$listing_sql.=' FROM mem_get_mem_gift mg,  products p ,  products_description pd ';
				$listing_sql.=' WHERE mg.products_id > 0 AND mg.products_id=p.products_id and p.products_id=pd.products_id  AND mg. quantity>0 and mg.points=300 and pd.language_id=' . $languages_id ;
				switch ($languages_id){
					case 1:
						$listing_sql.= ' and p.products_language_fr >0 ';
						break;
					case 2:
						$listing_sql.= ' and p.products_undertitle_nl >0 ';
					break;
						case 3:
						$listing_sql.= ' and p.products_undertitle_nl >0 ';
					break;
				}
				$listing_sql.= ' and p.products_type = "DVD_NORM" ' ; //BEN001
				$listing_sql.=' ORDER BY mg.points ASC LIMIT 3';
				$listing = tep_db_query($listing_sql);
				while ($product_info_values = tep_db_fetch_array($listing)) {
					?>
					<table width="304"  border="0" cellspacing="0" cellpadding="0">
          				<tr>
							<td width="69" rowspan="2"><a href="http://www.dvdpost.be/product_info.php?products_id=<?php   echo $product_info_values['products_id'] ;?>"><img src="<?php   echo DIR_DVD_WS_IMAGES.$product_info_values['products_image_big'] ;?>" border="0" width="60" height="90"></td>
							<td width="235" valign="top"><span class="Style5"><?php   echo $product_info_values['products_name'] ;?></span></td>
          				</tr>
          				<tr>
            				<td class="Style6">
            				<?php  
            				$actors_sql="SELECT a.actors_name, pa.actors_id FROM products_to_actors pa , actors a where pa.products_id ='". $product_info_values['products_id']. "' and pa.actors_id=a.actors_id";
            				$actors_listing = tep_db_query($actors_sql);
            				while ($actors_values = tep_db_fetch_array($actors_listing)) {
            					echo $actors_values['actors_name'].'<br>';
	            			}	
            				?></td>
          				</tr>
          				<tr>
            				<td colspan="2">&nbsp;</td>
          				</tr>
        			</table>
					<?php   } ?>

          </td>
      </tr>
    </table>
	</td>
  </tr>
  <tr>
	<td background="<?php   echo DIR_WS_IMAGES ;?>bckg_points_fill_rounded2.gif">
		<table width="705"  border="0" align="center" cellpadding="0" cellspacing="0">
			<tr valign="top">
				<td height="40" class="contract" valign="bottom">
					<?php   echo TEXT_EXDVD_RENTAL ;?> - <?php   echo TEXT_CONTRACT ;?>					
				</td>
			</tr>
		</table>
	</td>
  </tr>
  <tr>
    <td><img src="<?php   echo DIR_WS_IMAGES ;?>bckg_points_bottom_rounded.gif"></td>
  </tr>
  <tr align="center" valign="middle">
    <td height="50" colspan="3" align="right">
    	<a href="member_get_member.php" class="red_slogan"><?php   echo TEXT_BACK ;?></a>
    	<img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="15" height="3"> 
		<a class="red_slogan" href="member_get_member_points.php"><u><?php   echo TEXT_USE_POINTS ;?></u></a> 
    </td>
  </tr>  
</table>