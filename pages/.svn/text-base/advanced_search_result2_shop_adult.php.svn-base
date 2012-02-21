<?php 
$HTTP_GET_VARS['keywords']=trim($HTTP_GET_VARS['keywords']);
  if (strlen($HTTP_GET_VARS['keywords'])>1){

//BEN001 $count_sql="SELECT COUNT(DISTINCT pd.products_name ) as count FROM  products_description_adult pd , products_adult p WHERE `quantity_new_to_sale`  > 0 and p.products_id=pd.products_id and pd.products_name LIKE '%" . $HTTP_GET_VARS['keywords'] . "%' ";
$count_sql="SELECT COUNT(DISTINCT pd.products_name ) as count FROM  products_description pd , products p WHERE products_type = 'DVD_ADULT' and `quantity_new_to_sale`  > 0 and p.products_id=pd.products_id and pd.products_name LIKE '%" . $HTTP_GET_VARS['keywords'] . "%' "; //BEN001
$count_query = tep_db_query($count_sql);
$count_values = tep_db_fetch_array($count_query);
 

$limit=12;
//echo $listing_sql;
  //if ($listing_numrows = 0) {	
	$number_of_products = '0';
	$listing_sql='SELECT DISTINCT pd.products_name ,p.products_id , p.products_language_fr , p.products_undertitle_nl,pd.products_image_big ,p.products_new_sale_price ';
//BEN001	$listing_sql.=' FROM  products_adult p ,  products_description_adult pd ';
	$listing_sql.=' FROM  products p ,  products_description pd '; //BEN001
	$listing_sql.="WHERE `quantity_new_to_sale`  > 0 and p.products_id=pd.products_id and pd.products_name LIKE '%" . $HTTP_GET_VARS['keywords'] . "%' ";
	$listing_sql.=" and products_type = 'DVD_ADULT' ";
	if ($lim!=0){
		$listing_sql.='group by p.products_id, pd.products_name ORDER  BY pd.products_name ASC limit '.$lim.','.$limit ;}
	else{
		$lim=0;
		$listing_sql.='group by p.products_id, pd.products_name ORDER BY pd.products_name ASC limit '.$lim.','.$limit ;}
	$listing = tep_db_query($listing_sql);
	$i=1;
?>
<br>
<table width="764" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="11"><img src="<?php   echo DIR_WS_IMAGES;?>shop/titlebar/box/title_left_x.gif" width="11" height="20"></td>
    <td width="400" background="<?php   echo DIR_WS_IMAGES;?>shop/titlebar/box/title_mid_x.gif" class="dvdpost_left_menu_title" align="left">
		<b><?php  echo $count_values[count];?> DVD </b> <?php  echo TEXT_CORRESPONDING ;?> "<?php   echo $keywords ?>"
	</td>
	<td width="11"><img src="<?php   echo DIR_WS_IMAGES;?>shop/titlebar/box/title_right_x.gif" width="11" height="20"></td>
    <td width="331">&nbsp;</td>
    <td width="11">&nbsp;</td>
  </tr>
  <tr>
    <td background="<?php   echo DIR_WS_IMAGES;?>shop/titlebar/box/left_mid2_x.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    <td colspan="2" background="<?php   echo DIR_WS_IMAGES;?>shop/titlebar/box/top_mid2_x.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    <td background="<?php   echo DIR_WS_IMAGES;?>shop/titlebar/box/top_mid_x.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    <td><img src="<?php   echo DIR_WS_IMAGES;?>shop/titlebar/box/top_right_x.gif" width="11" height="10"></td>
  </tr>
  <tr>
    <td background="<?php   echo DIR_WS_IMAGES;?>shop/titlebar/box/left_mid_x.gif">&nbsp;</td>
    <td colspan="3">

		<table width="100%" align="center" cellpadding="0" cellspacing="0">
		  <tr>
			<td>
				<br>
		<?php  
							
					echo '<table width="666" height="150"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF"><tr>';
					while ($product_info_values = tep_db_fetch_array($listing)) {
						?>
						<td align="center">
						<form name="form1" method="post" action="addtoshoppingcart_new_adult.php">							
							<table width="213" border="0" align="center" cellpadding="0" cellspacing="0">
								<tr>
									<td  height="30" valign="middle" class="SLOGAN_BLACK" align="center" colspan="2" width="213"><b><?php   echo $product_info_values['products_name'] ;?></b></td>
								</tr>
								<tr>
									<td>
										<TABLE width="102" border="0" cellpadding="0" cellspacing="0"  align="center">										
											<TR>
												<TD width="87" height="7"><IMG src="<?php   echo DIR_WS_IMAGES ;?>shop/jaquette/haut.gif" width="87" height="7"></TD>
												<TD rowspan="3"><IMG src="<?php   echo DIR_WS_IMAGES ;?>shop/jaquette/droite.gif" width="15" height="142"></TD>
											</TR>
											<TR>
												<TD width="87" height="130" valign="top"><a href="product_info_shop_adult.php?products_id=<?php   echo $product_info_values['products_id'];?>"><img src="<?php   echo DIR_WS_IMAGESX ;?><?php   echo $product_info_values['products_image_big'] ;?>" border="0" width="87" height="130" ALT="<?php   echo $product_info_values['products_name'] ;?>"></a></TD>
											</TR>
											<TR>
												<TD width="87" height="5"><IMG src="<?php   echo DIR_WS_IMAGES ;?>shop/jaquette/bas.gif" width="87" height="5" ></TD>
					  						</TR>
					  					</table>
					  				</td>
					  			</tr>
								<tr>
									<td align="center"><a href="product_info_shop_adult.php?products_id=<?php   echo $product_info_values['products_id'];?>" class="basiclink"><u><?php   echo TEXT_MORE_INFO ;?></u></a></td>
								</tr>
								<tr>
									<td height="22" valign="middle" class="SLOGAN_BLACK" align="center"><b><font color="#CC0000"><?php   echo $product_info_values['products_new_sale_price'] ;?>&euro;</font></b></td>
								</tr>
								<tr>
									<td align="center">
									  <input name="products_id" type="hidden" value="<?php   echo $product_info_values['products_id'] ;?>">
									  <input name="imageField" align="center" type="image" src="<?php   echo  DIR_WS_IMAGES_LANGUAGES.$language;?>/images/buttons/button_buy.gif" border="0">
									</td>
								</tr>
							</table>
						</form><br>
						</td>
						<?php   if ($i % 3 ==0){echo '</tr><tr>'; }
						$i++; ?>
				  <?php   }
					//SI PAS ASSEZ DE TITRES SUR LA PAGE<br>ESPACE PROMO SUR 2 COLONNES
					if ($i % 3 ==2){echo '<td width="426"colspan="2" align="center">&nbsp;</td>';}
					
					//SI PAS ASSEZ DE TITRES SUR LA PAGE<br>ESPACE PROMO SUR 1 COLONNE
					if ($i % 3 ==0){echo '<td width="213" align="center">&nbsp;</td>';}
				  ?>
					 
					</tr>			
					</table>
				</td>
		  </tr>
		  <tr>
			<td  align="right" class="SLOGAN_orange">
			<?php  
			include(DIR_WS_INCLUDES . 'functions/split_keywords.php');
			split_pages($lim,$limit,$count_values[count],$keywords);
			?>
			</td>
		  </tr>
		</table>



    </td>
    <td background="<?php   echo DIR_WS_IMAGES;?>shop/titlebar/box/right_mid_x.gif"><img src="<?php   echo DIR_WS_IMAGES;?>shop/titlebar/box/right_mid.gif" width="11" height="20"></td>
  </tr>
  <tr>
    <td><img src="<?php   echo DIR_WS_IMAGES;?>shop/titlebar/box/bottom_left_x.gif" width="11" height="10"></td>
    <td colspan="3" background="<?php   echo DIR_WS_IMAGES;?>shop/titlebar/box/bottom_mid_x.gif"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="1" height="1"></td>
    <td><img src="<?php   echo DIR_WS_IMAGES;?>shop/titlebar/box/bottom_right_x.gif" width="11" height="10"></td>
  </tr>
</table>
<?php   }else{ ?>
	<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
	  <tr>
	    <td height="15"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="2"></td>
	  </tr>
	  <tr>
		<td height="34" align="center" class="TYPO_STD_BLACK_BOLD"><?php   echo TEXT_NO_MATCHING_SEARCH ;?></td>
	  </tr>
    </table>
<?php   } ?>