<?php
switch ($dvdlist) {
  case 'STARS':
    $listing_sql = $listing_sql . ' and p.products_rating=5 ';
    break;
  case 'AWARDS':
    $listing_sql = $listing_sql . ' and pd.products_awards <> "" ';
    break;
  case 'DVDPOSTCHOICE':
    $listing_sql = $listing_sql . ' and p.products_dvdpostchoice = 1 ';
    break;
  case 'NEW':
    $listing_sql = $listing_sql . ' and p.products_date_added<=curdate() and p.products_date_added > DATE_SUB(now(), INTERVAL 1 MONTH) and p.products_date_available >= DATE_SUB(now(), INTERVAL 2 MONTH) and p.products_next=0 and p.products_status>0';
    break;
  case 'LASTADDED':
    $listing_sql = $listing_sql . ' and p.products_date_added<=curdate() and p.products_date_added > DATE_SUB(now(), INTERVAL 3 MONTH) and p.products_next=0 ';
	//$listing_sql = $listing_sql . ' and p.products_date_added > DATE_SUB(now(), INTERVAL 1 MONTH) and p.products_date_available < DATE_SUB(now(), INTERVAL 1 MONTH) ';
    break;
  case 'MISTHEM':
    $listing_sql = $listing_sql . ' and p.products_date_available < DATE_SUB(now(), INTERVAL 1 MONTH) and p.products_date_available > DATE_SUB(now(), INTERVAL 2 MONTH) ';
    break;
  case 'FRENCH' :
    $listing_sql = $listing_sql . ' and p.products_french = 1 ';
    break;
  case 'CLASSIC' :
    $listing_sql = $listing_sql . ' and p.products_year < "1960" ';
    break;
  case 'NEXT' :
    $listing_sql .= ' and products_next = 1 ';
    break;
}

?>