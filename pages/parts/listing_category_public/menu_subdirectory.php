<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="14" height="2"></td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr align="center" valign="middle">
    <?php  //if ($cPath=='48'||$cPath=='49'||$cPath=='50'||$cPath=='51'||$cPath=='52'||$cPath=='53'||$cPath=='54'||$list=='1'||$list=='6'||$list=='7'||$list=='classic'||$list=='french'||$list=='stars'|| $list=='dvdpostchoice'||$list=='awards'||$list=='new'||$list=='next'||$list=='cinema'){
		?>
		<td width="95%"><img src="<?php  echo DIR_WS_IMAGES;?>blank.gif" width="2" height="2">  </td>
		<?php 
	   //}
	   
	//else if ($cPath>='1'&&$cPath<'8'){
	//     include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/listing_category_public/menu_subdirectory_action.php'));}
	//else if ($cPath>='8'&&$cPath<'16'){
	//     include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/listing_category_public/menu_subdirectory_comedy.php'));}
	//else if ($cPath>='20'&&$cPath<'26'){
	//     include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/listing_category_public/menu_subdirectory_drama.php'));}		 
	//else if ($cPath>='27'&&$cPath<'31'){
	//      include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/listing_category_public/menu_subdirectory_fantasy.php'));}
	//else if ($cPath>='31'&&$cPath<'35'){
	//      include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/listing_category_public/menu_subdirectory_thriller.php'));}
	//else if ($cPath>='35'&&$cPath<'43'){
	//      include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/listing_category_public/menu_subdirectory_horror.php'));}
	//else if ($cPath>='43'&&$cPath<'47'){
	//      include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/listing_category_public/menu_subdirectory_scifi.php'));}
	//else if ($cPath>='55'&&$cPath<'62'){
	//      include(getBestMatchToInclude(DIR_WS_COMMON . 'pages/parts/listing_category_public/menu_subdirectory_tv.php'));}

		if ($listing_numrows > 0 && (PREV_NEXT_BAR_LOCATION == '1' || PREV_NEXT_BAR_LOCATION == '3')) {
		?>
		<td  width="114" align="center" class="SLOGAN_orange"><?php  echo $listing_split->display_links($listing_numrows, MAX_DISPLAY_SEARCH_RESULTS, MAX_DISPLAY_PAGE_LINKS, $HTTP_GET_VARS['page'], tep_get_all_get_params(array('page', 'info', 'x', 'y'))); ?></td>
		<?php 
		}
		?>
  </tr>
</table>