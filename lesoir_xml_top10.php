<?php
require('configure/application_top.php');

switch($HTTP_GET_VARS['context']){
	case 'newtitles':
		$strquery = "select * from products p left join products_description pd on p.products_id = pd.products_id left join products_lesoir pls on p.products_id = pls.products_id where pls.products_id > 0 and pls.context = 1 and pd.language_id = 1 order by rand() limit 5";
	break;
	case 'tv':
		$strquery = "select * from products p left join products_description pd on p.products_id = pd.products_id left join products_lesoir pls on p.products_id = pls.products_id where pls.products_id > 0 and pls.context = 2 and pd.language_id = 1 order by rand() limit 5";
	break;
	case 'top5rentals':
		$strquery = "select * from products p left join products_description pd on p.products_id = pd.products_id left join products_lesoir pls on p.products_id = pls.products_id where pls.products_id > 0 and pls.context = 3 and pd.language_id = 1 order by rand() limit 5";
	break;	
}

echo '<DVDLIST>';
$tisc = tep_db_query($strquery);  
while ($tisc_values = tep_db_fetch_array($tisc)) {
echo '<DVD>';
echo '<TITLE>' . strtr($tisc_values['products_name'],"'"," ") . '</TITLE> ';
echo '<JAQUETTE>'.$constants['DIR_DVD_WS_IMAGES'].'/' . $tisc_values['products_image'] . '</JAQUETTE>';
$cat_query = tep_db_query("select * from products_to_categories p2c left join categories_description c on p2c.categories_id  = c.categories_id  where p2c.products_id = '" . $tisc_values['products_id'] . "' and c.language_id  = 1 limit 1");
$cat = tep_db_fetch_array($cat_query);
echo '<CATEGORY>' . $cat['categories_name'] . '</CATEGORY>';
$cat_query = tep_db_query("select * from products_to_themes p2c left join themes_description c on p2c.themes_id = c.themes_id  where p2c.products_id = '" . $tisc_values['products_id'] . "' and c.language_id  = 1 limit 1");
$cat = tep_db_fetch_array($cat_query);
echo '<GENRE>' . $cat['themes_name'] . '</GENRE>';
echo '<URL>http://lesoir.dvdpost.be/product_info_public.php?products_id=' . $tisc_values['products_id'] . '</URL> ';
echo '<TEASING>' . strtr($tisc_values['products_description'],"'"," ") . '</TEASING> ';
echo '</DVD>';
}
echo '</DVDLIST>';
?>