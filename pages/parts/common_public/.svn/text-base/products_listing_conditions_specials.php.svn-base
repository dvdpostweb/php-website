<?php
switch ($dvdlist) {
  case 'STARS':
    $listing_sql = $listing_sql . ' and p.products_rating=5 AND p.products_media="DVD" ';
    break;
  case 'AWARDS':
    $listing_sql = $listing_sql . ' and pd.products_awards <> "" AND p.products_media="DVD" ';
    break;
  case 'DVDPOSTCHOICE':
    $listing_sql = $listing_sql . ' and p.products_dvdpostchoice = 1 AND p.products_media="DVD" ';
    break;
  case 'NEW':
    $listing_sql = $listing_sql . ' and p.products_date_available<=curdate() and p.products_date_available >= DATE_SUB(now(), INTERVAL 45 DAY ) and p.products_next=0  and p.products_status=1 AND p.products_media="DVD" ';
    break;
  case 'LASTADDED':
    $listing_sql = $listing_sql . ' and p.products_next = 0 and p.in_cinema_now = 0  and p.products_date_added > DATE_SUB(now(), INTERVAL 30 DAY ) and p.products_date_available < DATE_SUB(now(), INTERVAL 3 MONTH) AND p.products_media="DVD" ';
    break;
  case 'MISTHEM':
    $listing_sql = $listing_sql . ' and p.products_date_available < DATE_SUB(now(), INTERVAL 1 MONTH) and p.products_date_available > DATE_SUB(now(), INTERVAL 2 MONTH) AND p.products_media="DVD" ';
    break;
  case 'FRENCH' :
    $listing_sql = $listing_sql . ' and p.products_french = 1 AND p.products_media="DVD" ';
    break;
  case 'FRESH' :
    $listing_sql = $listing_sql . ' and DATE_FORMAT( now( ) , "%Y-%m-%d" ) < DATE_ADD(DATE_FORMAT( p.products_date_added , "%Y-%m-%d" ),INTERVAL 2 MONTH) AND DATE_FORMAT( p.products_date_available , "%Y-%m-%d" ) < DATE_SUB(DATE_FORMAT( now(), "%Y-%m-%d" ),INTERVAL 5 MONTH) ';
    break;
  case 'CLASSIC' :
    $listing_sql = $listing_sql . ' and p.products_year < "1960" AND p.products_media="DVD" ';
    break;
  case 'NEXT' :
    $listing_sql .= ' and p.products_next = 1 and p.in_cinema_now = 0 AND p.products_media="DVD" ';
    break;
  case 'CINEMA':
    $listing_sql .= ' and p.products_next = 1 and p.in_cinema_now = 1 AND p.products_media="DVD" ';
    break;
  case 'BLURAY':
    $listing_sql .= ' and p.products_media = "BlueRay" ';
    break;
}
switch ($dvdlist2) {
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
    $listing_sql = $listing_sql . ' and p.products_date_added<=curdate() and p.products_date_added > DATE_SUB(now(), INTERVAL 2 MONTH) and p.products_date_available >= DATE_SUB(now(), INTERVAL 2 MONTH) and p.products_next=0 ';
    break;
  case 'LASTADDED':
    $listing_sql = $listing_sql . ' and p.products_next = 0 and p.in_cinema_now = 0  and p.products_date_added > DATE_SUB(now(), INTERVAL 30 DAY ) and p.products_date_available > DATE_SUB(now(), INTERVAL 3 MONTH) ';
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
    $listing_sql .= ' and p.products_next = 1 and p.in_cinema_now = 0 ';
    break;
  case 'CINEMA':
    $listing_sql .= ' and p.products_next = 1 and p.in_cinema_now = 1 ';
    break;
  case 'BLURAY':
    $listing_sql .= ' and p.products_media = "BlueRay" ';
    break;
}

?>