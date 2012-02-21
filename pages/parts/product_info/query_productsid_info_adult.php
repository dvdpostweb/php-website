<?php 
$readable_query = 'select';
$readable_query .= ' if(to_days(products_date_added)=to_days(curdate()),1,0) added_today, p.products_id, p.products_price, p.products_tax_class_id, p.products_year, p.products_rating, p.products_next, ';
$readable_query .= ' p.products_date_available, p.products_availability, p.products_other_language, ';
$readable_query .= ' p.products_series_id, p.products_dvdpostchoice, month(p.products_date_available) as dvddatemonth, year(p.products_date_available) as dvddateyear, ';
$readable_query .= ' p.products_directors_id, p.products_public, p.products_studio, p.products_runtime, p.products_picture_format, ';
$readable_query .= ' p.cinebel_trailer, p.cinebel_id, pd.products_description, pd.products_name, pd.products_image_big, pd.products_url, pd.products_awards,rating_users,rating_count  ';
//BEN001 $readable_query .= ' from products_adult p, products_description_adult pd ';
$readable_query .= ' from products p, products_description pd '; //BEN001
$readable_query .= ' where p.products_id = ' . $HTTP_GET_VARS['products_id'];
$readable_query .= ' and pd.products_id = p.products_id';
$readable_query .= ' and pd.language_id = ' . $languages_id;
$product_info = tep_db_query($readable_query);
?>