<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="13"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="2"></td>
  </tr>
  <tr align="center" valign="middle">
    <?php   if ($cPath=='48'||$cPath=='49'||$cPath=='50'||$cPath=='53'||$cPath=='54'||$list=='1'||$list=='7'||$list=='classic'||$list=='french' ||$list=='fresh' ||$list=='stars'|| $list=='dvdpostchoice'||$list=='awards'||$list=='new'||$list=='next'||$list=='cinema'){
		?>
		<td width="91"  class="TAB_SELECT_ACTIVE"><?php   echo TEXT_ALL;?></td>
		<td width="2"  class="TAB_SELECT_PASSIVE"><img src="<?php   echo DIR_WS_IMAGES;?>separator_dvdsearch.jpg" width="2" height="32"></td>
		<td width="557"><img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="2" height="2">  </td>
		<?php  
	   }
	   
	else if ($cPath>='1'&&$cPath<'8'){
	     include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/listing_category/menu_subdirectory_action.php'));}
	else if ($cPath>='8'&&$cPath<'16'){
	     include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/listing_category/menu_subdirectory_comedy.php'));}
	else if ($cPath>='20'&&$cPath<'26'){
	     include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/listing_category/menu_subdirectory_drama.php'));}		 
	else if ($cPath>='27'&&$cPath<'31'){
	      include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/listing_category/menu_subdirectory_fantasy.php'));}
	else if ($cPath>='31'&&$cPath<'35'){
	      include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/listing_category/menu_subdirectory_thriller.php'));}
	else if ($cPath>='35'&&$cPath<'43'){
	      include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/listing_category/menu_subdirectory_horror.php'));}
	else if ($cPath>='43'&&$cPath<'47'){
	      include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/listing_category/menu_subdirectory_scifi.php'));}
	else if ($cPath>='55'&&$cPath<'62'){
	      include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/listing_category/menu_subdirectory_tv.php'));}
	else if ($list=='6' || $cPath =='16' || $cPath=='18'|| $cPath=='19'){
		  include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/listing_category/menu_subdirectory_family.php'));}
	

		if ($listing_numrows > 0 && (PREV_NEXT_BAR_LOCATION == '1' || PREV_NEXT_BAR_LOCATION == '3')) {
		?>
		<td  width="114" align="center" class="SLOGAN_orange"><?php   echo $listing_split->display_links($listing_numrows, MAX_DISPLAY_SEARCH_RESULTS_PRIVATE, MAX_DISPLAY_PAGE_LINKS, $HTTP_GET_VARS['page'], tep_get_all_get_params(array('page', 'info', 'x', 'y'))); ?></td>
		<?php  
		}
		?>
  </tr>
</table>
<table width="764" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr bgcolor="#999999">
		<td width="73" height="30" bgcolor="#E5E5E5" class="TYPO_STD_BLACK" ><div align="center"><?php   echo TEXT_SORT_BY; ?></div></td>
		<td width="658" height="30" bgcolor="#E5E5E5" class="TYPO_STD_BLACK">
	        <?php  
            $navigation->set_snapshot();
            $origin_href = tep_href_link($navigation->snapshot['page'], tep_array_to_string($navigation->snapshot['get'], array(tep_session_name())), $navigation->snapshot['mode']);
	        $tab=$navigation->snapshot['get'];
			unset($tab['ftr']);
			$origin_href2 =tep_href_link($navigation->snapshot['page'], tep_array_to_string($tab, array(tep_session_name())), $navigation->snapshot['mode']);
			?>	
	
     		<img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="14" height="3">
			<a href="
			 <?php   
				if($cPath>0){
					echo 'listing_category.php?cPath=' . $HTTP_GET_VARS['cPath'].'&ftr=TITRES';
				}else {
					echo 'listing_category.php?list=' . $HTTP_GET_VARS['list'].'&ftr=TITRES';
				}
			 ?>			 
			  " class="red_basiclink"><?php   echo TEXT_TITLE;?></a>
			<?php 
				switch ($list){
					case 'new':
						break;
					case 'fresh':
						break;
					case 'next':
						break;
					case 'cinema':
						break;
					default :
						echo '<img src="'.DIR_WS_IMAGES.'blank.gif" width="30" height="3">';
						echo '<a href="'.$origin_href2 . '&ftr=NEW" class="red_basiclink">'.TEXT_LIST_NEW.'</a>';
						echo '<img src="'.DIR_WS_IMAGES.'blank.gif" width="30" height="3">';
						echo '<a href="'.$origin_href2 . '&ftr=FRESH" class="red_basiclink">Fresh</a>';
						break;
				}
			?>
			
			
			<img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="30" height="3">
			<a href="<?php   echo $origin_href2 . '&ftr=DVDPOSTCHOICE'; ?>" class="red_basiclink"><?php   echo TEXT_LIST_DVDPOSTCHOICE;?></a>
			<img src="<?php   echo DIR_WS_IMAGES;?>blank.gif" width="30" height="3">
			<a href="<?php   echo $origin_href2 . '&ftr=STARS'; ?>" class="red_basiclink"><?php   echo TEXT_LIST_5STRAS;?></a>
		</td>
	</tr>
</table>