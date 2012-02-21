<?php  
require('../configure/application_top.php');
	$sql="select * from reviews r
	join products p on p.products_id = r.products_id
	where reviews_rating > 0  group by customers_id, r.products_id";
	$query = tep_db_query($sql);
	while($value = tep_db_fetch_array($query))
	{
		$sql_check = 'select * from products_rating where customers_id = '.$value['customers_id'].' and products_id = '.$value['products_id'];
		$query_check = tep_db_query($sql_check);
		$value_check = tep_db_fetch_array($query_check);
		echo 'test';
		echo $value_check['products_rating_id'];
		if (!$value_check['products_rating_id']>0)
		{
			tep_rating($value['products_id'],$value['imdb_id'],$value['reviews_rating'],$value['customers_id']);
			
		}
		echo '<br >';
	}

