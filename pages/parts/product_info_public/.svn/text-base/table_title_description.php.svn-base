<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="19%" height="25" valign="middle" nowrap  class="TYPO_STD_BLACK_bold"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php  echo TEXT_RANK_DVD;?> </td>
    <td colspan="2" valign="middle"  class="TYPO_STD_BLACK_bold"><?php 
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
	  echo '<td height="20"  class="TYPO_STD_BLACK_bold"><img src="'.DIR_WS_IMAGES.'blank.gif" width="14" height="3">'.TEXT_ORIG_TITLE.'</td>';
	  echo  '<td height="20" colspan="2"  class="TYPO_STD_BLACK">';
	  echo $product_info_values['products_title'];
	  echo '</td></tr>';
      }
if(SITE_TYPE=="DVD_ADULT" ){ 
	if(!empty($product_info_values['products_studio'])){
		$studio_query = tep_db_query("select studio_id,  studio_name from studio where studio_id=".$product_info_values['products_studio']);
  		$studio_query_values = tep_db_fetch_array($studio_query);
	if(!empty($studio_query_values['studio_name'])){
?>	
  <tr valign="top">
    <td height="20"  class="TYPO_STD_BLACK_bold"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3">Studio :</td>
    <td height="20" colspan="2"  class="TYPO_STD_BLACK"><?php 
          		
          		echo '<A class="basiclink" href="'.studios_link($lang_short,$studio_query_values['studio_name'],$studio_query_values['studio_id']).'"><u>' . $studio_query_values['studio_name'] . '</u></A> ';
        	?>
    </td>
  </tr>  
<? }}} else {
	
	$directors_name = tep_db_query("select d.Directors_name from " . TABLE_DIRECTORS. " d where d.Directors_id = '" . $product_info_values['products_directors_id'] . "'");
	$directors_name_values = tep_db_fetch_array($directors_name);
	$name=trim($directors_name_values['Directors_name']);
	
	if(!empty($name))
	{
?>
  <tr valign="top">
    <td height="20"  class="TYPO_STD_BLACK_bold"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php  echo TEXT_DIRECTOR;?> </td>
    <td height="20" colspan="2"  class="TYPO_STD_BLACK"><?php 
          		
          		echo '<A class="basiclink" href="'.directors_link($lang_short,$directors_name_values['Directors_name'],$product_info_values['products_directors_id']).'"><u>' . $directors_name_values['Directors_name'] . '</u></A> ';
				
        	?>
    </td>
  </tr>
<?php }} ?>
  <tr valign="top">
    <td height="20"  class="TYPO_STD_BLACK_bold"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php  echo TEXT_ACTOR;?> </td>
    <td height="20" colspan="2"  class="TYPO_STD_BLACK"><?php 
				$actors = tep_db_query("select a.actors_id, an.actors_name from products_to_actors a, actors an where a.products_id ='".$HTTP_GET_VARS['products_id']."' and a.actors_id = an.actors_id") ;
				$nb=tep_db_num_rows($actors);
				$i=0;
				while ($actors_values = tep_db_fetch_array($actors)) {
      				echo '<A class="basiclink" href="'. actors_link($lang_short,$actors_values['actors_name'],$actors_values['actors_id']) .'"><u>' . $actors_values['actors_name'] . '</u></A> ';
      				$i++;
					if($i!=$nb)
						echo ', &nbsp;';
      			}
			  ?>
    </td>
  </tr>
    <tr>
    <td colspan="3"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="8"></td>
  </tr>
  <?php  if  (!$lnfr > 0 || !$utnl > 0)  { ?>
	  <tr>
		<td colspan="3"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
	  </tr>
  <?php  } ?>
  <tr >
    <td colspan="3" align="left" class="TYPO_STD_BLACK">
    	<table width="90%"  border="0" cellspacing="0" cellpadding="0">
        	<tr>
	          
	          <td width="90%" class="synopsis_text"><b>Synopsis :</b><br>
	              <?php  echo stripslashes($product_info_values['products_description']);?> <br>	              
	          </td>
	       </tr>       
    </table></td>
  </tr>
  <tr>
    <td colspan="3"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="8"></td>
  </tr>
  <?php 
		$trailer_count_query  = tep_db_query("select count(*) as cpt from products_trailers where products_id='" . $HTTP_GET_VARS['products_id'] . "' and language_id=".$languages_id);
		$trailer_count_values = tep_db_fetch_array($trailer_count_query);
		if ($trailer_count_values['cpt']>0){
			echo '<tr valign="top"><td height="20" valign="middle" class="TYPO_STD_BLACK_bold"><img src="'.DIR_WS_IMAGES.'blank.gif" width="14" height="3">Trailer :</td>';
			echo '<td height="20" colspan="2" >';		
			
			$trailer_query = tep_db_query("select trailers_id from products_trailers where products_id='" . $product_info_values['products_id'] . "' and language_id=".$languages_id);
			while($trailer = tep_db_fetch_array($trailer_query)){
				echo '<a href="/trailer.php?trailers_id='.$trailer['trailers_id'].'" rel="ibox&width=470&height=350" title="'.$product_info_values['products_name'].'" ><img src="'.DIR_WS_IMAGES.'trailer.png" border="0" style="padding-right:10px;"></a>';
			}
			echo '</td></tr>';
			echo '<tr><td colspan="3"><img src="'.DIR_WS_IMAGES.'blank.gif" width="14" height="8"></td></tr>';
		}	
  if (strlen($product_info_values['products_url']) > 2 ) {
  ?>
  <?php  } ?>
  <?php 
  if ($product_info_values['cinebel_id'] > 0 and SITE_HOST_ID <> 16) {
  ?>
  <?php  } ?>
  <tr>
    <td colspan="2"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
  </tr>
  <tr valign="middle">
    <td height="20" class="TYPO_STD_BLACK_bold"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"><?php   echo TEXT_SOUND;?> </td>
    <td height="20" colspan="2" class="TYPO_STD_BLACK"><?php   
		echo ' - ' ;
       	while ($soundtracks = tep_db_fetch_array($soundtracks_query)) { 
			 echo $soundtracks['soundtracks_description'].' - ';
       	}
      ?>
    </td>
  </tr>
  <tr>
    <td colspan="2"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
  </tr>
  <tr >
    <td colspan="3"><table width="90%"  border="0" cellspacing="0" cellpadding="0">
        <tr>
          
          <td width="90%"><?php  //include(DIR_WS_COMMON . 'pages/parts/product_info_public/table_average_ranking.php'); ?></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3"></td>
  </tr>
	<tr>
		
		<td colspan="2"><fb:like href="http://<?= $_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'].'?products_id='.$_GET['products_id'] ?>" action="recommend" font="arial"></fb:like> </td>
	</tr>
</table>
