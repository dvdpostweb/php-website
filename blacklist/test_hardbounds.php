<?php  
require('configure/application_top.php');

$fichier = "../../csv/hard1.csv";
$fic = fopen($fichier, 'rb');

$email='';
$i=1;
for ($ligne = fgetcsv($fic, 1024,","); !feof($fic); $ligne = fgetcsv($fic, 1024,",")) {
	$email = $ligne[0];
	$type = $ligne[2];
	if($type == "Hardbounced")
	{

		if(!empty($email))
		{
			$sql="select * from customers where trim(customers_email_address) = '".$email."'";
			$query = tep_db_query($sql);
			while($value = tep_db_fetch_array($query))
			{

				if($value['customers_abo']==1)
				{
					if ($value['customers_newsletter']==0 || $value['customers_newsletter']==1)
					{
						echo $value['customers_email_address'];
						echo "<font color='green'> customer</font><br />";
						tep_db_query("update customers set  is_email_valid = 0 where  customers_id = '" . $value['customers_id'] . "' ");
					}
				}
				else
				{
					if ($value['customers_newsletter']!=0)
					{
						echo $value['customers_email_address'];
						echo "<font color='red'>not customer</font><br />";
						tep_db_query("update customers set  customers_newsletter = 0, customers_newsletterpartner = 0,marketing_ok='NO',is_email_valid = 0 where  customers_id = '" . $value['customers_id'] . "' ");
						tep_db_query("insert into newsletters_unsubscribe_history (customers_id, date) values('" . $value['customers_id'] . "', now() ) ");
					}
				}
			}
		
		}
	}
}
/*
foreach ($parse as $wrong )
{

	$sql="select * from customers where customers_email_address like '%".$wrong."'";
	$query = tep_db_query($sql);
	while($value = tep_db_fetch_array($query))
	{
		
		if($value['customers_abo']==1)
		{
			if ($value['customers_newsletter']==0 || $value['customers_newsletter']==1)
			{
				echo $value['customers_email_address'];
				echo "<font color='green'> customer</font><br />";
				tep_db_query("update customers set  is_email_valid = 0 where  customers_id = '" . $value['customers_id'] . "' ");
			}
		}
		else
		{
			if ($value['customers_newsletter']!=0)
			{
				echo $value['customers_email_address'];
				echo "<font color='red'>not customer</font><br />";
				tep_db_query("update customers set  customers_newsletter = 0, customers_newsletterpartner = 0,marketing_ok='NO',is_email_valid = 0 where  customers_id = '" . $value['customers_id'] . "' ");
				tep_db_query("insert into newsletters_unsubscribe_history (customers_id, date) values('" . $value['customers_id'] . "', now() ) ");
			}
		}
	}
}*/