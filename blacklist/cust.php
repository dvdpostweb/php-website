<?php  
require('../configure/application_top.php');
	$sql="select * from custserv where customers_id = 206183 order by 1 asc limit 5";
	$query = tep_db_query($sql);
	while($value = tep_db_fetch_array($query))
	{
		if($value['products_id']>0)
		{
			echo 'product';
			$sql_cat='select custserv_cat_name as name from custserv_cat cc join customers c on c.customers_language = language_id  where custserv_cat_id='.$value['custserv_cat_id'].' and customers_id ='.$value['customers_id'];
			$query_cat = tep_db_query($sql_cat);
			$value_cat = tep_db_fetch_array($query_cat);
      $sql_product ='select products_name name from products_description pd join customers c on c.customers_language = language_id where products_id ='.$value['products_id'].' and customers_id ='.$value['customers_id'];
      $query_product = tep_db_query($sql_product);
			$value_product = tep_db_fetch_array($query_product);
			
			$title = $value_cat['name'].' : '.$value_product['name'];
			$sql_insert = "INSERT INTO `tickets` (`created_at`, `title`, `updated_at`, `category_ticket_id`, `remove`, `customer_id`) VALUES('".$value['customer_date']."', '".addslashes($title)."', '".$value['customer_date']."', ".$value['custserv_cat_id'].", 0, ".$value['customers_id'].")";
			echo $sql_insert ;
			tep_db_query($sql_insert);
			$insert_id = tep_db_insert_id();
			if (strlen($value['message']) > 0)
			{
				$sql_insert2 = "INSERT INTO `message_tickets` (`created_at`, `updated_at`, `read`, `mail_id`, `ticket_id`, `user_id`, `message`)";
				$sql_insert2 .= " VALUES('".$value['customer_date']."', '".$value['customer_date']."', ".$value['is_read'].", NULL, ".$insert_id;
				$sql_insert2 .= ", NULL, '".addslashes($value['message'])."')";
			  tep_db_query($sql_insert2);
			}
			if (strlen($value['adminmessage']) > 0)
			{
				$adminby = $value['adminby'];
				if ($adminby==99)
				{
					$adminby=55;
				}
        if ($adminby==0)
				{
					$adminby=70;
				}
        
				$sql_insert2 = "INSERT INTO `message_tickets` (`created_at`, `updated_at`, `is_read`, `mail_id`, `ticket_id`, `user_id`, `data`) VALUES('".$value['admindate']."', '".$value['admindate']."', ".$value['is_read'].", 578, ".$insert_id.", ".$adminby.", '\$\$\$content\$\$\$:::".addslashes($value['adminmessage']).";;;')";
			  tep_db_query($sql_insert2);
			}
		}
		else
		{
			echo 'no product';
			$sql_insert = "INSERT INTO `tickets` (`created_at`, `title`, `updated_at`, `category_ticket_id`, `remove`, `customer_id`) VALUES('".$value['customer_date']."', NULL, '".$value['customer_date']."', ".$value['custserv_cat_id'].", 0, ".$value['customers_id'].")";
			echo $sql_insert ;
			tep_db_query($sql_insert);
			$insert_id = tep_db_insert_id();
			if (strlen($value['message']) > 0)
			{
				$sql_insert2 = "INSERT INTO `message_tickets` (`created_at`, `updated_at`, `is_read`, `mail_id`, `ticket_id`, `user_id`, `data`)";
				$sql_insert2 .= " VALUES('".$value['customer_date']."', '".$value['customer_date']."', ".$value['is_read'].", NULL, ".$insert_id;
				$sql_insert2 .= ", 578, '\$\$\$content\$\$\$:::".addslashes($value['adminmessage']).";;;')";
			  tep_db_query($sql_insert2);
			}
			if (strlen($value['adminmessage']) > 0)
			{
				$adminby = $value['adminby'];
				if ($adminby==99)
				{
					$adminby=55;
				}
				$sql_insert2 = "INSERT INTO `message_tickets` (`created_at`, `updated_at`, `is_read`, `mail_id`, `ticket_id`, `user_id`, `data`) VALUES('".$value['admindate']."', '".$value['admindate']."', ".$value['is_read'].", 578, ".$insert_id.", ".$adminby.", '\$\$\$content\$\$\$:::".addslashes($value['adminmessage']).";;;')";
			  tep_db_query($sql_insert2);
			}
			
		}
		echo '<br />';
	}
