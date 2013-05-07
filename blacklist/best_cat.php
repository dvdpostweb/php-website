<?php

$server='192.168.100.204';
$username='webuser';
$password='3gallfir-';
$database='dvdpost_be_prod';
$db_link = mysql_connect($server, $username, $password);
mysql_select_db($database);


$sql="select * from customers c
join `customer_attributes` ca
on c.customers_id = ca.customer_id
where customers_abo=1 or last_login_at>'2011-11-01'";
$query =  mysql_query($sql,$db_link);

while($row = mysql_fetch_array($query, MYSQL_ASSOC)){
		//actor
		$sql_actor='select IFNULL(group_concat(categories_id),0) cat from (select categories_id from (select product_id from wishlist where customers_id = '.$row['customers_id'].'
      union
      select products_id product_id from wishlist_assigned where customers_id ='.$row['customers_id'].'
      union
      select p.products_id from tokens t 
      join products p on t.imdb_id = p.imdb_id where customer_id = '.$row['customers_id'].'
      group by p.imdb_id ) p
      join products_to_categories c on p.product_id = c.products_id
      group by categories_id
      order by count(*) desc limit 5)t;';
      #echo $sql_actor;
		$query_actor = mysql_query($sql_actor);
		$cat_res = mysql_fetch_array($query_actor, MYSQL_ASSOC);
		$sql_insert = 'insert into best_categories (id, categories, customers_id) values (NULL, "'.$cat_res['cat'].'", '.$row['customers_id'].')';
		 mysql_query($sql_insert);

	}



mysql_close($db_link);
?>
