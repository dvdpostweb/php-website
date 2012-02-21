<?php 
//queries language
//BEN001 Comment $languages_query = tep_db_query("select l.products_languages_id from products_to_languages_adult l where l.products_id = '" . $product_info_values['products_id'] . "'");
$languages_query = tep_db_query("select l.products_languages_id from products_to_languages l where l.products_id = '" . $product_info_values['products_id'] . "'"); //BEN001 ADD
while ($languages = tep_db_fetch_array($languages_query)) {
   switch ($languages['products_languages_id']) {
     case 1:
       $lnfr = 1;
     break;
     case 2:
       $lnnl = 1;
     break;
     case 3:
       $lnuk = 1;
     break;
     default:
       $otherln = 1;
       $languages_descriptions = tep_db_query("select l.languages_description from " . TABLE_PRODUCTS_LANGUAGES. " l where l.Languages_id = '" . $languages['products_languages_id'] . "' and l.languagenav_id = '" . $languages_id . "'");
       $languages_descriptions_values = tep_db_fetch_array($languages_descriptions);
       $txtlanguage = $txtlanguage . $languages_descriptions_values['languages_description'];
       $txtlanguage = $txtlanguage . ', ';
     break;
   }
}
while ($undertitles = tep_db_fetch_array($undertitles_query)) {
  switch   ($undertitles['products_undertitles_id']) {
    case 1:
      $utfr = 1;
    break;
    case 2:
      $utnl = 1;
    break;
    case 3:
      $utuk = 1;
    break;
    default:
      $otherut = 1;
      $undertitles_descriptions = tep_db_query("select u.undertitles_description from " . TABLE_PRODUCTS_UNDERTITLES. " u where u.undertitles_id = '" . $undertitles['products_undertitles_id'] . "' and u.language_id = '" . $languages_id . "'");
      $undertitles_descriptions_values = tep_db_fetch_array($undertitles_descriptions);
      $txtundertitle = $txtundertitle . $undertitles_descriptions_values['undertitles_description'];
      $txtundertitle = $txtundertitle . ', ';
    break;
  }
}
?>