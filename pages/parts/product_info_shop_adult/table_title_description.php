 <?php   
	include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/product_info_adult/query_productsid_info.php')); 
	if (!tep_db_num_rows($product_info)) { 
  	// product not found in database

	} else {
    //there is a product
//BEN001    tep_db_query("update products_description_adult set products_viewed = products_viewed+1 where products_id = '" . $HTTP_GET_VARS['products_id'] . "' and language_id = '" . $languages_id . "'");
    tep_db_query("update products_description set products_viewed = products_viewed+1 where products_id = '" . $HTTP_GET_VARS['products_id'] . "' and language_id = '" . $languages_id . "'"); //BEN001
    $product_info_values = tep_db_fetch_array($product_info);
    //RALPH-002 $actors = tep_db_query("select a.actors_id from products_to_actors_adult a where a.products_id = '" . $product_info_values['products_id'] . "'");
    $actors = tep_db_query("select a.actors_id from products_to_actors a where a.products_id = '" . $product_info_values['products_id'] . "'"); //RALPH-002
?>
<table width="380" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
    	<td width="20%" height="25" valign="middle" nowrap bgcolor="F7EAF4" class="TYPO_STD_BLACK_bold">
			<img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php   echo TEXT_RANK_DVD;?>
		</td>
    	<td width="80%" valign="middle" bgcolor="F7EAF4" class="TYPO_STD_BLACK_bold">
			<?php  
          		echo '<img src="' . DIR_WS_IMAGES . 'starbar/heart_2_' . $product_info_values['products_rating'] . '0.gif">';
          	?>
		</td>
  	</tr>
  	<tr>
    	<td colspan="2"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
  	</tr>
  	<tr valign="top">
    	<td height="20" bgcolor="F7EAF4" class="TYPO_STD_BLACK_bold">
			<img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php   echo TEXT_STUDIO;?>
		</td>
    	<td height="20" bgcolor="F7EAF4" class="TYPO_STD_BLACK">
      		<?php  
         		$studio = tep_db_query("select studio_name  from studio where studio_id = '" . $studio_id . "' ");
         		$studio_values = tep_db_fetch_array($studio);
				echo '<A class="basiclink" href="shop_listing_adult.php?studio_id='. $studio_id .' "><u>' . $studio_values['studio_name'] . '</u></A> ';
       		?>
    	</td>
  	</tr>
	<tr valign="top">
    	<td height="20" bgcolor="F7EAF4" class="TYPO_STD_BLACK_bold">
			<img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php   echo TEXT_ACTOR;?>
		</td>
    	<td height="20" bgcolor="F7EAF4" class="TYPO_STD_BLACK">
      		<?php  
      			while ($actors_values = tep_db_fetch_array($actors)) {
      			//RALPH-002 $actors_name = tep_db_query("select an.Actors_Name from actors_adult an where an.Actors_id = '" . $actors_values['actors_id'] . "'");
      			$actors_name = tep_db_query("select an.Actors_Name from actors an where an.actors_type = 'DVD_ADULT' and an.Actors_id = '" . $actors_values['actors_id'] . "'"); //RALPH-002
        		$actors_name_values = tep_db_fetch_array($actors_name);
      			echo $actors_name_values['Actors_Name'] ;
      			echo ', &nbsp;';
      			}
			  ?>
    	</td>
	</tr>
	<tr>
    	<td colspan="2"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
  	</tr>
<tr valign="top" bgcolor="#F7EAF4">
    	<td height="20" class="TYPO_STD_BLACK_bold">
			<img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php   echo TEXT_DURATION;?>
		</td>
    	<td height="20" colspan="2" class="TYPO_STD_BLACK"><?php   echo $product_info_values['products_runtime']; ?>'</td>
  	</tr>
	<tr>
    	<td colspan="2"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
  	</tr>
<tr valign="middle" bgcolor="#F7EAF4">
      <td height="20"class="TYPO_STD_BLACK_bold"><?php   include(DIR_WS_COMMON . 'pages/parts/product_info_adult/table_audio_info.php'); ?><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php   echo TEXT_LANGUAGE;?> </td>
      <td>
	  	<table width="305">
			<tr>
			  <td width="127" align="center" bgcolor="#F7EAF4" class="TYPO_STD_BLACK_bold"><?php   //?FR
     			 if ($lnfr > 0){
        			echo'<img src=" '. DIR_WS_IMAGES . 'audio_FR_enable_adult.gif">';
      				}
	  			 else echo'<img src=" '. DIR_WS_IMAGES . 'audio_FR_disable_adult.gif">'; 
                 ?>
          			<img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3">
          		<?php   //?nl
      			if ($lnnl > 0){
        		echo'<img src=" '. DIR_WS_IMAGES . 'audio_NL_enable_adult.gif">'; 
      			}
	  			else echo'<img src=" '. DIR_WS_IMAGES . 'audio_NL_disable_adult.gif">'; 
      			?>
          		<img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3">
          		<?php   //?uk
      			if ($lnuk > 0){
        		echo'<img src=" '. DIR_WS_IMAGES . 'audio_EN_enable_adult.gif">';
      			}
	  			else echo'<img src=" '. DIR_WS_IMAGES . 'audio_EN_disable_adult.gif">'; 
      			?>
      		</td>
      		<td width="165" bgcolor="#F7EAF4"class="TYPO_STD_BLACK">
	  		<?php   if ($otherln > 0){echo  $txtlanguage ;}?>
	  		</td>
		  </tr>
		</table>
    </td>
  </tr>
  	<tr bgcolor="#F7EAF4">
    	<td colspan="3"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
  	</tr>
  	<tr valign="middle" bgcolor="#F7EAF4">
      <td height="20"class="TYPO_STD_BLACK_bold"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><span class="TYPO_STD_BLACK_bold"><?php   echo TEXT_MOVIE_UNDERTIRLES; ?></span> </td>
      <td>
	  	<table width="305">
			<tr>
				  <td width="75" align="center"  bgcolor="#F7EAF4"class="TYPO_STD_BLACK_bold">
        		  <?php   //?FR
      				if ($utfr > 0){
        			echo '<img src="' . DIR_WS_IMAGES. 'dvd_circle_FR_x.jpg">';
      				}
      				?>      			
        			<?php   //?nl
      				if ($utnl > 0){
        			echo '<img src="' . DIR_WS_IMAGES. 'dvd_circle_NL_x.jpg">';
      				}
      				?>
        			<?php   //?uk
      				if ($utuk > 0){
        			echo '<img src="' . DIR_WS_IMAGES. 'dvd_circle_EN_x.jpg">';
      				}
      				?>
			  </td>
					<td width="218" bgcolor="#F7EAF4" class="TYPO_STD_BLACK">
					<?php  
    				if ($otherut  > 0){	echo $txtundertitle ;} 
					?>
					</td>
			</tr>
		</table>
	  </td>

  </tr>
	<tr>
    	<td colspan="2"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
  	</tr>  
	<tr valign="top">
    	<td colspan="2" height="20" bgcolor="F7EAF4" class="TYPO_STD_BLACK">
			<br>
      		<table width="95%"  border="0" align="center" cellpadding="0" cellspacing="0">
          		<tr>
            		<td class="TYPO_STD_BLACK">
						<?php   echo stripslashes($product_info_values['products_description']);?>
					</td>
          		</tr>
			</table>
			<br><br>
    	</td>
	</tr>	
</table>
<?php  
}
?>