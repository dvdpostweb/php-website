<table width="360" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="19%" height="25" valign="middle" nowrap bgcolor="F2F2F2" class="TYPO_STD_BLACK_bold"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php  echo TEXT_RANK_DVD;?> </td>
    <td colspan="2" valign="middle" bgcolor="F2F2F2" class="TYPO_STD_BLACK_bold"><?php 
          		echo '<img src="' . DIR_WS_IMAGES . 'starbar/heart_2_' . $product_info_values['products_rating'] . '0.gif">';
          	?>
    </td>
  </tr>
  <tr>
    <td colspan="3"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="8"></td>
  </tr>
  <?php  
  if ($product_info_values['products_title']!=$product_info_values['products_name']) {
	  echo '<tr valign="top">';
	  echo '<td height="20" bgcolor="F2F2F2" class="TYPO_STD_BLACK_bold"><img src="'.DIR_WS_IMAGES.'blank.gif" width="14" height="3">'.TEXT_ORIG_TITLE.'</td>';
	  echo  '<td height="20" colspan="2" bgcolor="F2F2F2" class="TYPO_STD_BLACK">';
	  echo $product_info_values['products_title'];
	  echo '</td></tr>';
      }
 ?>
   <tr valign="top">
    <td height="20" bgcolor="F2F2F2" class="TYPO_STD_BLACK_bold"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php  echo TEXT_COUNTRY;?> </td>
    <td height="20" colspan="2" bgcolor="F2F2F2" class="TYPO_STD_BLACK">
    		
    		<?php           		
				$country_name = tep_db_query("select pc.countries_name from products_countries pc where pc.countries_id = '" . $product_info_values['products_countries_id'] . "'");
          		$country_name_values = tep_db_fetch_array($country_name);
          		echo $country_name_values['countries_name'];
        	?>
    </td>
  </tr> 
    <tr valign="top">
    <td height="20" bgcolor="F2F2F2" class="TYPO_STD_BLACK_bold"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php  echo TEXT_DURATION;?> </td>
    <td height="20" colspan="2" bgcolor="F2F2F2" class="TYPO_STD_BLACK"><?php  echo $product_info_values['products_runtime']."'"; ?></td>
  <tr>
    <td colspan="3"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="8"></td>
  </tr>	  
  <tr valign="top">
    <td height="20" bgcolor="F2F2F2" class="TYPO_STD_BLACK_bold"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php  echo TEXT_DIRECTOR;?> </td>
    <td height="20" colspan="2" bgcolor="F2F2F2" class="TYPO_STD_BLACK"><?php 
          		$directors_name = tep_db_query("select d.Directors_name from " . TABLE_DIRECTORS. " d where d.Directors_id = '" . $product_info_values['products_directors_id'] . "'");
          		$directors_name_values = tep_db_fetch_array($directors_name);
          		echo $directors_name_values['Directors_name'] ;
        	?>
    </td>
  </tr>
  <tr valign="top">
    <td height="20" bgcolor="F2F2F2" class="TYPO_STD_BLACK_bold"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php  echo TEXT_ACTOR;?> </td>
    <td height="20" colspan="2" bgcolor="F2F2F2" class="TYPO_STD_BLACK"><?php 
				$actors = tep_db_query("select a.actors_id, an.actors_name from products_to_actors a, actors an where a.products_id ='".$HTTP_GET_VARS['products_id']."' and a.actors_id = an.actors_id") ;
				while ($actors_values = tep_db_fetch_array($actors)) {
      				echo $actors_values['actors_name'];
      				echo ', &nbsp;';
      			}
			  ?>
    </td>
  </tr>
    <tr>
    <td colspan="3"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="8"></td>
  </tr>
 
  <tr valign="middle">
    <td height="20" bgcolor="F2F2F2"class="TYPO_STD_BLACK_bold"><?php  include(DIR_WS_COMMON . 'pages/parts/product_info/table_audio_info.php'); ?>
        <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php  echo TEXT_LANGUAGE;?> </td>
    <td bgcolor="#F2F2F2" colspan="2"><table width="98%" bgcolor="#F2F2F2">
        <tr>
          <td width="250" align="left" bgcolor="F2F2F2" class="TYPO_STD_BLACK_bold"><?php  //?FR
     			 if ($lnfr > 0){
        			echo'<img src="'. DIR_WS_IMAGES . 'audio_FR_enable.gif">';
      				}
	  			 else echo'<img src="'. DIR_WS_IMAGES . 'audio_FR_disable.gif">'; 
                 ?>
              <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3">
              <?php  //?nl
      			if ($lnnl > 0){
        		echo'<img src="'. DIR_WS_IMAGES . 'audio_NL_enable.gif">'; 
      			}
	  			else echo'<img src="'. DIR_WS_IMAGES . 'audio_NL_disable.gif">'; 
      			?>
              <img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3">
              <?php  //?uk
      			if ($lnuk > 0){
        		echo'<img src="'. DIR_WS_IMAGES . 'audio_EN_enable.gif">';
      			}
	  			else echo'<img src="'. DIR_WS_IMAGES . 'audio_EN_disable.gif">'; 
      			?>
          </td>
          <td width="165" height="20" bgcolor="F2F2F2"class="TYPO_STD_BLACK"><?php  if ($otherln > 0){echo  $txtlanguage ;}?>
          </td>
        </tr>
    </table></td>
  </tr>

  <tr valign="middle" bgcolor="#F2F2F2">
    <td height="20" bgcolor="F2F2F2"class="TYPO_STD_BLACK_bold"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php  echo TEXT_MOVIE_UNDERTIRLES; ?> </td>
    <td align="right" bgcolor="#F2F2F2" colspan="2"><table width="100%" align="right" bgcolor="#F2F2F2">
        <tr>
          <td width="75" align="left"  bgcolor="F2F2F2"class="TYPO_STD_BLACK_bold"><?php  //?FR
      				if ($utfr > 0){
        			echo '<img src="' . DIR_WS_IMAGES. 'dvd_circle_FR.gif">';
      				}
      				?>
              <?php  //?nl
      				if ($utnl > 0){
        			echo '<img src="' . DIR_WS_IMAGES. 'dvd_circle_NL.gif">';
      				}
      				?>
              <?php  //?uk
      				if ($utuk > 0){
        			echo '<img src="' . DIR_WS_IMAGES. 'dvd_circle_EN.gif">';
      				}
      				?>
          </td>
          <td width="218" height="20" bgcolor="#F2F2F2" class="TYPO_STD_BLACK"><?php 
    				if ($otherut  > 0){	echo $txtundertitle ;} 
					?>
          </td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="3"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="8"></td>
  </tr>
  <?php  if  (!$lnfr > 0 || !$utnl > 0)  { ?>
	  <tr align="center" >
		<td  colspan="3" align="center" class="TYPO_STD_BLACK">			<?php 
		switch($languages_id){
		case 1:
		  if (!$lnfr > 0){
		  echo '<font color="#D62C2E"><b>' . TEXT_EXISTS_IN_FRENCH . '</b></font><br>';
		  if ($product_info_values['products_other_language'] > 0)       {
			echo '<a class="red_basiclink" href="product_info_shop.php?products_id=' . $product_info_values['products_other_language'] . '">' . TEXT_EXISTS_IN_FRENCH2 . '</a>';
		  }
		  }
		  break;
		case 2:
		  if ((!$utnl > 0) and (!$lnnl > 0)){
		  echo '<font color="#D62C2E"><b>' . TEXT_EXISTS_IN_FRENCH . '</b></font><br>';
		  if ($product_info_values['products_other_language'] > 0)                           {
			echo '<a class="red_basiclink" href="product_info_shop.php?products_id=' . $product_info_values['products_other_language'] . '">' . TEXT_EXISTS_IN_FRENCH2 . '</a>';
		  }
		  }
		  break;
		}
		?></td>
	  </tr>
	  <tr>
		<td colspan="3"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
	  </tr>
  <?php  } ?>
  <tr bgcolor="#F2F2F2">
    <td colspan="3" align="left" bgcolor="#F2F2F2" class="TYPO_STD_BLACK">
    	<table width="100%"  border="0" cellspacing="0" cellpadding="0">
        	<tr>
	          <td width="14">&nbsp;</td>
	          <td width="96%" class="TYPO_STD_BLACK"><b>Synopsis :</b><br>
	              <?php  echo stripslashes($product_info_values['products_description']);?> <br>	              
	          </td>
	       </tr>	       
	       <?php 
	 	    if ($product_info_values['products_awards']!='') {
		 	  echo'<tr><td colspan="2" bgcolor="FFFFFF"><img src="'. DIR_WS_IMAGES .'blank.gif" width="14" height="8"></td></tr>';  
			  echo '<tr><td width="14">&nbsp;</td><td width="96%" class="TYPO_STD_BLACK">';
	          echo stripslashes($product_info_values['products_awards']).'<br></td></tr>';	          
	         } 
	        ?>
    </table></td>
  </tr>
  <tr>
    <td colspan="3"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="8"></td>
  </tr>
  <?php 
  if (strlen($product_info_values['products_url']) > 2 ) {
  ?>
  <tr align="left" valign="middle">
    <td height="30" colspan="3" bgcolor="F2F2F2"><table width="300">
        <tr bgcolor="#F2F2F2">
          <td align="left" class="TYPO_STD_BLACK_bold"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><a class="red_basiclink" target="_blank" href="http://<?php  echo $product_info_values['products_url'];?>"><?php  echo $product_info_values['products_url'];?></a></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="3"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="8"></td>
  </tr>
  <?php  } ?>
    <tr valign="top">
    <td height="20" bgcolor="F2F2F2" class="TYPO_STD_BLACK_bold"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php  echo TEXT_IMAGE_TYPE;?> </td>
    <td height="20" colspan="2" bgcolor="F2F2F2" class="TYPO_STD_BLACK"><?php 
         		$picture_format = tep_db_query("select pf.picture_format_name from " . TABLE_PICTURE_FORMAT. " pf where pf.picture_format_id = '" . $product_info_values['products_picture_format'] . "' and  pf.language_id= '".$languages_id."'");
         		$picture_format_values = tep_db_fetch_array($picture_format);
         		echo $picture_format_values['picture_format_name'];
       		?>
    </td>
  </tr>
    </tr>
   <tr valign="middle">
    <td height="20" bgcolor="F2F2F2"class="TYPO_STD_BLACK_bold"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php  echo TEXT_SOUND;?> </td>
    <td height="20" colspan="2" bgcolor="F2F2F2"class="TYPO_STD_BLACK"><?php  
			$mono=0;
			$stereo=0;
			$dspl=0;
			$dd=0;
			$dts=0;
			$dde=0;
			echo ' - ' ;
        	while ($soundtracks = tep_db_fetch_array($soundtracks_query)) { 
				 switch ($soundtracks['products_soundtracks_id']){

					case 1:
            			if ($mono<1)
						 {echo 'Mono';
						  $mono++;
						  }
          				break;
          			case 2:
            			if ($stereo<1){
						echo 'Stereo';
						$stereo++;}
          				break;
          			case 3:
            			if ($dspl<1)
						{ echo 'Dolby Surround Pro Logic';
						$dspl++;}
          				break;
          			case 4:
					    if ($dd<1)
            			{echo 'Dolby Digital';
          				$dd++;}
						break;
          			case 5:
            			if ($dts<1)
						{echo 'DTS';
         				 $dts++;}
						 break;
          			case 6:
            			if ($dde<1)
						{echo 'Dolby Digital EX';
         				 $dde++;}
						 break;
					case 7:
            			if ($mono<1)
						 {echo 'Mono';
						  $mono++;
						  }
          				break;
          			case 8:
            			if ($stereo<1){
						echo 'Stereo';
						$stereo++;}
          				break;
          			case 9:
            			if ($dspl<1)
						{ echo 'Dolby Surround Pro Logic';
						$dspl++;}
          				break;
          			case 10:
					    if ($dd<1)
            			{echo 'Dolby Digital';
          				$dd++;}
						break;
          			case 11:
            			if ($dts<1)
						{echo 'DTS';
         				 $dts++;}
						 break;
          			case 12:
            			if ($dde<1)
						{echo 'Dolby Digital EX';
         				 $dde++;}
						 break;
					case 13:
            			if ($mono<1)
						 {echo 'Mono';
						  $mono++;
						  }
          				break;
          			case 14:
            			if ($stereo<1){
						echo 'Stereo';
						$stereo++;}
          				break;
          			case 15:
            			if ($dspl<1)
						{ echo 'Dolby Surround Pro Logic';
						$dspl++;}
          				break;
          			case 16:
					    if ($dd<1)
            			{echo 'Dolby Digital';
          				$dd++;}
						break;
          			case 17:
            			if ($dts<1)
						{echo 'DTS';
         				 $dts++;}
						 break;
          			case 18:
            			if ($dde<1)
						{echo 'Dolby Digital EX';
         				 $dde++;}
						 break;					
          				}
					  echo ' - ' ;
        			}
      ?>
    </td>
  </tr>
    <tr valign="top">
    <td height="20" bgcolor="F2F2F2"class="TYPO_STD_BLACK_bold"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php  echo TEXT_PUBLIC;?> </td>
    <td height="20" colspan="2" bgcolor="F2F2F2"><?php 
       			switch ($product_info_values['products_public']){
         		case 1:
         			echo '<img src="' . DIR_WS_IMAGES. 'public/all.gif">';

         			break;
         		case 2:
         			echo '<img src="' . DIR_WS_IMAGES. 'public/-12.gif">';
         			break;
         		case 3:
         			echo '<img src="' . DIR_WS_IMAGES. 'public/-16.gif">';
         			break;
       			}
       		?>
    </td>
  </tr>
  <tr>
    <td colspan="3"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
  </tr>
</table>
