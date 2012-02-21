<table width="380" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="19%" height="25" valign="middle" nowrap bgcolor="F2F2F2" class="TYPO_STD_BLACK_bold"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php   echo TEXT_RANK_DVD;?> </td>
    <td colspan="2" valign="middle" bgcolor="F2F2F2" class="TYPO_STD_BLACK_bold"><?php  
          		echo '<img src="' . DIR_WS_IMAGES . 'starbar/heart_2_' . $product_info_values['products_rating'] . '0.gif">';
          	?>
    </td>
  </tr>
  <tr>
    <td colspan="3"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="8"></td>
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
    <td height="20" bgcolor="F2F2F2" class="TYPO_STD_BLACK_bold"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php   echo TEXT_COUNTRY;?> </td>
    <td height="20" colspan="2" bgcolor="F2F2F2" class="TYPO_STD_BLACK">
    		
    		<?php            		
				$country_name = tep_db_query("select pc.countries_name from products_countries pc where pc.countries_id = '" . $product_info_values['products_countries_id'] . "'");
          		$country_name_values = tep_db_fetch_array($country_name);
          		echo $country_name_values['countries_name'];
        	?>
    </td>
  </tr> 
    <tr valign="top">
    <td height="20" bgcolor="F2F2F2" class="TYPO_STD_BLACK_bold"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php   echo TEXT_DURATION;?> </td>
    <td height="20" colspan="2" bgcolor="F2F2F2" class="TYPO_STD_BLACK"><?php   echo $product_info_values['products_runtime']."'"; ?></td>
  <tr>
    <td colspan="3"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="8"></td>
  </tr>	  
  <tr valign="top">
    <td height="20" bgcolor="F2F2F2" class="TYPO_STD_BLACK_bold"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php   echo TEXT_DIRECTOR;?> </td>
    <td height="20" colspan="2" bgcolor="F2F2F2" class="TYPO_STD_BLACK"><?php  
          		$directors_name = tep_db_query("select d.Directors_name from " . TABLE_DIRECTORS. " d where d.Directors_id = '" . $product_info_values['products_directors_id'] . "'");
          		$directors_name_values = tep_db_fetch_array($directors_name);
          		echo '<A class="basiclink" href="directors.php?directors_id='.$product_info_values['products_directors_id'].'"><u>' . $directors_name_values['Directors_name'] . '</u></A> ';
        	?>
    </td>
  </tr>
  <tr valign="top">
    <td height="20" bgcolor="F2F2F2" class="TYPO_STD_BLACK_bold"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php   echo TEXT_ACTOR;?> </td>
    <td height="20" colspan="2" bgcolor="F2F2F2" class="TYPO_STD_BLACK"><?php  
				$actors = tep_db_query("select a.actors_id, an.actors_name from products_to_actors a, actors an where a.products_id ='".$HTTP_GET_VARS['products_id']."' and a.actors_id = an.actors_id") ;
				$nb=tep_db_num_rows($actors);
				$i=0;
				while ($actors_values = tep_db_fetch_array($actors)) {
      				echo '<A class="basiclink" href="actors.php?actors_id='.$actors_values['actors_id'].'"><u>' . $actors_values['actors_name'] . '</u></A> ';
      				$i++;
					if($i!=$nb)
						echo ', &nbsp;';
	      			
      			}
			  ?>
    </td>
  </tr>
    <tr>
    <td colspan="3"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="8"></td>
  </tr>
 
  <tr valign="middle">
    <td height="20" bgcolor="F2F2F2"class="TYPO_STD_BLACK_bold"><?php   include(DIR_WS_COMMON . 'pages/parts/product_info/table_audio_info.php'); ?>
        <img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php   echo TEXT_LANGUAGE;?> </td>
    <td bgcolor="#F2F2F2" colspan="2"><table width="305" bgcolor="#F2F2F2">
        <tr>
          <td width="127" align="left" bgcolor="F2F2F2" class="TYPO_STD_BLACK_bold"><?php   //?FR
     			 if ($lnfr > 0){
        			echo'<img src="'. DIR_WS_IMAGES . 'audio_FR_enable.gif">';
      				}
	  			 else echo'<img src="'. DIR_WS_IMAGES . 'audio_FR_disable.gif">'; 
                 ?>
              <img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3">
              <?php   //?nl
      			if ($lnnl > 0){
        		echo'<img src="'. DIR_WS_IMAGES . 'audio_NL_enable.gif">'; 
      			}
	  			else echo'<img src="'. DIR_WS_IMAGES . 'audio_NL_disable.gif">'; 
      			?>
              <img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="6" height="3">
              <?php   //?uk
      			if ($lnuk > 0){
        		echo'<img src="'. DIR_WS_IMAGES . 'audio_EN_enable.gif">';
      			}
	  			else echo'<img src="'. DIR_WS_IMAGES . 'audio_EN_disable.gif">'; 
      			?>
          </td>
          <td width="165" height="20" bgcolor="F2F2F2"class="TYPO_STD_BLACK"><?php   if ($otherln > 0){echo  $txtlanguage ;}?>
          </td>
        </tr>
    </table></td>
  </tr>

  <tr valign="middle" bgcolor="#F2F2F2">
    <td height="20" bgcolor="F2F2F2"class="TYPO_STD_BLACK_bold"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php   echo TEXT_MOVIE_UNDERTIRLES; ?> </td>
    <td align="right" bgcolor="#F2F2F2" colspan="2"><table width="100%" align="right" bgcolor="#F2F2F2">
        <tr>
          <td width="75" align="left"  bgcolor="F2F2F2"class="TYPO_STD_BLACK_bold"><?php   //?FR
      				if ($utfr > 0){
        			echo '<img src="' . DIR_WS_IMAGES. 'dvd_circle_FR.gif">';
      				}
      				?>
              <?php   //?nl
      				if ($utnl > 0){
        			echo '<img src="' . DIR_WS_IMAGES. 'dvd_circle_NL.gif">';
      				}
      				?>
              <?php   //?uk
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
    <td colspan="3"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="8"></td>
  </tr>
  <?php 
		$trailer_count_query  = tep_db_query("select count(*) as cpt from products_trailers where products_id='" . $HTTP_GET_VARS['products_id'] . "' and language_id=".$languages_id);
		$trailer_count_values = tep_db_fetch_array($trailer_count_query);
		if ($trailer_count_values['cpt']>0){
			echo '<tr valign="top"><td height="20" valign="middle" bgcolor="F2F2F2"class="TYPO_STD_BLACK_bold"><img src="'.DIR_WS_IMAGES.'blank.gif" width="14" height="3">Trailer :</td>';
			echo '<td height="20" colspan="2" bgcolor="F2F2F2">';		
			
			$trailer_query = tep_db_query("select trailers_id from products_trailers where products_id='" . $product_info_values['products_id'] . "' and language_id=".$languages_id);
			while($trailer = tep_db_fetch_array($trailer_query)){
				echo '<a href="trailer.php?trailers_id='.$trailer['trailers_id'].'" rel="ibox&width=470&height=350" title="'.$product_info_values['products_name'].'" ><img src="'.DIR_WS_IMAGES.'trailer2.gif" border="0"></a>';
			}
			echo '</td></tr>';
			echo '<tr><td colspan="3"><img src="'.DIR_WS_IMAGES.'blank.gif" width="14" height="8"></td></tr>';
		}	

		if  (!$lnfr > 0 || !$utnl > 0)  { ?>
	  <tr align="center" >
		<td  colspan="3" align="center" class="TYPO_STD_BLACK">			<?php  
		switch($languages_id){
		case 1:
		  if (!$lnfr > 0){
		  echo '<font color="#D62C2E"><b>' . TEXT_EXISTS_IN_FRENCH . '</b></font><br>';
		  if ($product_info_values['products_other_language'] > 0)       {
			echo '<a class="red_basiclink" href="product_info.php?products_id=' . $product_info_values['products_other_language'] . '">' . TEXT_EXISTS_IN_FRENCH2 . '</a>';
		  }
		  }
		  break;
		case 2:
		  if ((!$utnl > 0) and (!$lnnl > 0)){
		  echo '<font color="#D62C2E"><b>' . TEXT_EXISTS_IN_FRENCH . '</b></font><br>';
		  if ($product_info_values['products_other_language'] > 0)                           {
			echo '<a class="red_basiclink" href="product_info.php?products_id=' . $product_info_values['products_other_language'] . '">' . TEXT_EXISTS_IN_FRENCH2 . '</a>';
		  }
		  }
		  break;
		}
		?></td>
	  </tr>
	  <tr>
		<td colspan="3"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
	  </tr>
	  
  <?php   } ?>
  <tr bgcolor="#F2F2F2">
    <td colspan="3" align="left" bgcolor="#F2F2F2" class="TYPO_STD_BLACK">
    	<table width="100%"  border="0" cellspacing="0" cellpadding="0">
        	<tr>
	          <td width="14">&nbsp;</td>
	          <td width="96%" class="TYPO_STD_BLACK"><b>Synopsis :</b><br>
	              <?php   echo stripslashes($product_info_values['products_description']);?> <br>	              
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
    <td colspan="3"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="8"></td>
  </tr>
  <?php  
  if (strlen($product_info_values['products_url']) > 2 ) {
  ?>
  <tr align="left" valign="middle">
    <td height="30" colspan="3" bgcolor="F2F2F2"><table width="300">
        <tr bgcolor="#F2F2F2">
          <td align="left" class="TYPO_STD_BLACK_bold"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><a class="red_basiclink" target="_blank" href="http://<?php   echo $product_info_values['products_url'];?>"><?php   echo $product_info_values['products_url'];?></a></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="3"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="8"></td>
  </tr>
  <?php   } ?>
    <tr valign="top">
    <td height="20" bgcolor="F2F2F2" class="TYPO_STD_BLACK_bold"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php   echo TEXT_IMAGE_TYPE;?> </td>
    <td height="20" colspan="2" bgcolor="F2F2F2" class="TYPO_STD_BLACK"><?php  
         		$picture_format = tep_db_query("select pf.picture_format_name from " . TABLE_PICTURE_FORMAT. " pf where pf.picture_format_id = '" . $product_info_values['products_picture_format'] . "' and  pf.language_id= '".$languages_id."'");
         		$picture_format_values = tep_db_fetch_array($picture_format);
         		echo $picture_format_values['picture_format_name'];
       		?>
    </td>
  </tr>
    </tr>
   <tr valign="middle">
    <td height="20" bgcolor="F2F2F2"class="TYPO_STD_BLACK_bold"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php   echo TEXT_SOUND;?> </td>
    <td height="20" colspan="2" bgcolor="F2F2F2"class="TYPO_STD_BLACK"><?php   
		echo ' - ' ;
       	while ($soundtracks = tep_db_fetch_array($soundtracks_query)) { 
			 echo $soundtracks['soundtracks_description'].' - ';
       	}
      ?>
    </td>
  </tr>
    <tr valign="top">
    <td height="20" bgcolor="F2F2F2"class="TYPO_STD_BLACK_bold"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php   echo TEXT_PUBLIC;?> </td>
    <td height="20" colspan="2" bgcolor="F2F2F2"><?php  
       			switch ($product_info_values['products_public']){
         		case 1:
         			echo '<img src="' . DIR_WS_IMAGES. 'public/all.gif">';

         			break;
         		case 5:
	         			echo '<img src="' . DIR_WS_IMAGES. 'public/-6.gif">';
	         			break;
	         	case 6:
	         			echo '<img src="' . DIR_WS_IMAGES. 'public/-10.gif">';
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
    <td colspan="3"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="8"></td>
  </tr>	

  <tr>
    <td colspan="3"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="8"></td>
  </tr>
  <?php  
  if ($product_info_values['cinebel_id'] > 0 and SITE_HOST_ID <> 16) {
  ?>
  <tr>
    <td height="30" colspan="3" valign="top" bgcolor="F2F2F2"><table>
        <tr bgcolor="#F2F2F2">
          <td align="left" class="TYPO_STD_BLACK_bold"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php   echo TEXT_MORE_INFO;?> </td>
          <td align="left"><a href='http://www.cinebel.be/fr/film.asp?Code_film=<?php   echo $product_info_values['cinebel_id'] ;?>' target = new><img src="<?php   echo  DIR_WS_IMAGES ; ?>/cinebel.gif" border=0></a>
              <?php   if ($product_info_values['cinebel_trailer'] > 0 and SITE_HOST_ID <> 16) { ?>
              <img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="20" height="3"> <a href='http://www.cinebel.be/fr/trailer.asp?rub=7&r=hig&Code_film=<?php   echo $product_info_values['cinebel_id'] ; ?>' target=new><img src="<?php   echo  DIR_WS_IMAGES ; ?>/trailer.gif" border=0 onMouseOver="document.all(1).style.cursor='hand';" ></a>
              <?php   } ?>
          </td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="3"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="8"></td>
  </tr>
  <?php   } ?>
  <tr bgcolor="#F2F2F2">
    <td colspan="3"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="14">&nbsp;</td>
          <td width="96%">
			<span id='rating_all'>
			<?php   
				include(DIR_WS_COMMON . 'pages/parts/product_info/table_average_ranking.php'); 
			?>
			</span>
		</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
  </tr>
</table>
