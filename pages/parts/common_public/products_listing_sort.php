<?php
if ( (!$HTTP_GET_VARS['sort']) || (!ereg('[1-8][ad]', $HTTP_GET_VARS['sort'])) || (substr($HTTP_GET_VARS['sort'],0,1) > sizeof($column_list)) ) {

/*
  for ($col=0; $col<sizeof($column_list); $col++) {
    if ($column_list[$col] == 'PRODUCT_LIST_MODEL') {
      $HTTP_GET_VARS['sort'] = $col . 'd';
      $listing_sql .= " order by rand() desc";
      break;
    }
  }
*/
  if (strtoupper($HTTP_GET_VARS['list'])=='NEXT' || strtoupper($HTTP_GET_VARS['list'])=='7' || strtoupper($HTTP_GET_VARS['list'])=='CLASSIC' || strtoupper($HTTP_GET_VARS['list'])=='CINEMA') {
      $listing_sql .= "group by pd.products_image_big order by products_date_available asc";
  } else if (strtoupper($HTTP_GET_VARS['list'])=='NEW') {
      $listing_sql .= "group by pd.products_image_big order by products_date_available desc";
  } else { 
	   	//affichage unique de jaquettes sur la partie PUBLIQUE du site.
	  	$listing_sql .= "group by pd.products_image_big ";
	  	
	  	
		IF ($HTTP_GET_VARS['cPath']>'54' && $HTTP_GET_VARS['cPath']<'62'){
		  $listing_sql .= " order by p.products_series_id desc";  
		}else{$listing_sql .= " order by p.products_date_available desc";
		}
	}
	

} else {

	  $sort_col = substr($HTTP_GET_VARS['sort'], 0 , 1);
  $sort_order = substr($HTTP_GET_VARS['sort'], 1);
  $listing_sql .= ' order by ';
  switch ($column_list[$sort_col-1]) {
    case 'PRODUCT_LIST_MODEL':        
      $listing_sql .= "p.products_model " . ($sort_order == 'd' ? "desc" : "") . ", pd.products_name";
      break;
    case 'PRODUCT_LIST_NAME':         
      $listing_sql .= "pd.products_name " . ($sort_order == 'd' ? "desc" : "");
      break;
    case 'PRODUCT_LIST_MANUFACTURER': 
      $listing_sql .= "m.manufacturers_name " . ($sort_order == 'd' ? "desc" : "") . ", pd.products_name";
      break;
    case 'PRODUCT_LIST_QUANTITY':     
      $listing_sql .= "p.products_date_added desc ";
      break;
    case 'PRODUCT_LIST_IMAGE':        
      $listing_sql .= "pd.products_name";
      break;
    case 'PRODUCT_LIST_WEIGHT':       
      $listing_sql .= "p.products_weight " . ($sort_order == 'd' ? "desc" : "") . ", pd.products_name";
      break;
    case 'PRODUCT_AVAILABILITY':        
      $listing_sql .= "p.products_availability " . ($sort_order == 'd' ? "desc" : "") . ", pd.products_name";
      break;
    default: 
   		$listing_sql .= " p.products_date_available desc ";
		
  }
  
}
?>