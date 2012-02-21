<?php  
$readable_query = 'select';
$readable_query .= ' if(to_days(products_date_added)=to_days(curdate()),1,0) added_today,p.rating_users,p.rating_count, p.products_id, p.products_price, p.products_tax_class_id, p.products_year, p.products_rating, p.products_next, ';
$readable_query .= ' p.products_model, p.products_date_available, p.products_availability, p.products_other_language, ';
$readable_query .= ' p.products_dvdpostchoice, month(p.products_date_available) as dvddatemonth, year(p.products_date_available) as dvddateyear, ';
$readable_query .= ' p.products_directors_id, p.products_public, p.products_studio, p.products_runtime, p.products_picture_format, ';
$readable_query .= ' pd.products_description, pd.products_name, pd.products_image_big, pd.products_url, pd.products_awards, p.only_for_sale,products_media  ';
//BEN001 $readable_query .= ' from products_adult p, products_description_adult pd ';
$readable_query .= ' from products p, products_description pd '; //BEN001
$readable_query .= ' where p.products_id = ' . $HTTP_GET_VARS['products_id'];
$readable_query .= ' and pd.products_id = p.products_id';
$readable_query .= ' and p.products_type=\'DVD_ADULT\' ';
$readable_query .= ' and p.products_status != -1 ';
$readable_query .= ' and pd.language_id = ' . $languages_id;
$product_info = tep_db_query($readable_query,'db_link',true);
?>