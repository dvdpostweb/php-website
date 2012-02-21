<?php
//require('../configure/application_top.php');
require('../configure/configure.php');

foreach ($constants as $key => $value) {
  define ($key,$value);
}
require(DIR_WS_FUNCTIONS . 'sessions.php');
require(DIR_WS_FUNCTIONS . 'general.php');
require(DIR_WS_FUNCTIONS . 'database.php');
require(DIR_WS_CLASSES . 'class.phpmailer.php');
tep_db_connect() or die('Unable to connect to database server!');


$sql2='select count(*) nb ,customers_id from dvdpost_be_prod.products_rating group by customers_id';
$data_query = tep_db_query($sql2);
while($customers = tep_db_fetch_array($data_query))
{
	$up = 'update customer_attributes set points = '.$customers['nb'].' where customer_id = '.$customers['customers_id'];
	tep_db_query($up);
	
}
$sql='select r.customers_id owner, rr.customers_id rater, reviews_interesting rate from dvdpost_be_prod.reviews r
join dvdpost_be_prod.reviews_rating rr on r.reviews_id = rr.reviews_id ';
$data_query = tep_db_query($sql);
while($customers = tep_db_fetch_array($data_query))
{
	$up = 'update customer_attributes set points = points + 1 where customer_id = '.$customers['rater'];
	tep_db_query($up);
	if($customers['rate'] == 1)
	{
	$up = 'update customer_attributes set points = points + 1 where customer_id = '.$customers['owner'];
	tep_db_query($up);
	}
}
$sql3 = 'select  customers_id, dvdpost_rating from dvdpost_be_prod.reviews';
$data_query = tep_db_query($sql3);
while($customers = tep_db_fetch_array($data_query))
{
	if( $customers['dvdpost_rating'] > 0)
	{
		$dvdpost_rating = $customers['dvdpost_rating'];
	}
	else
	{
		$dvdpost_rating = 3;
	}
	$points = 2;
	switch($dvdpost_rating)
	{
		case 1:
		break;
		case 2:
			$points += 5;
		break;
		case 3:
			$points += 12;
		break;
		case 4:
			$points += 25;
		break;
		case 5:
			$points += 40;
		
	}
	$up = 'update customer_attributes set points = points + '.$points.' where customer_id = '.$customers['customers_id'];
	tep_db_query($up);
}
?>