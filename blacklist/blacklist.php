<?php  
require('../configure/application_top.php');

$name = $_GET['name'];
if(!empty($name))
{
$fichier = "../../../csv/".$name;
$fic = fopen($fichier, 'rb');
$email='';
$i=1;
for ($ligne = fgetcsv($fic, 1024); !feof($fic); $ligne = fgetcsv($fic, 1024)) {
	$email = $ligne[0];
	if(!empty($email)){
	tep_db_query("update sponsoring set unsubscribe= 1 where  email = '" . $email . "' ");

	tep_db_query("update contest set unsubscribe= 1 where  email = '" . $email . "' ");

	tep_db_query("update quizz  set unsubscribe= 1 where  email = '" . $email . "' ");

	tep_db_query("update mem_get_mem  set unsubscribe= 1 where  email = '" . $email . "' ");

	tep_db_query("update lesoir_adress  set unsubscribe= 1 where  email_address = '" . $email . "' ");
	
	tep_db_query("update prospects  set unsubscribe= 1 where  customers_email_address = '" . $email . "' ");
	
	//tep_db_query("update emakina_rent_a_wife  set unsubscribe= 1 where   email = '" . $email . "' ");


	$customers_query = tep_db_query("select * from customers where  customers_email_address  = '" . $email . "' ");
	$customers = tep_db_fetch_array($customers_query);
	if ($customers['customers_id']>0) {
		tep_db_query("update customers set  customers_newsletter = 0, customers_newsletterpartner = 0,marketing_ok='NO' where  customers_id = '" . $customers['customers_id'] . "' ");
		tep_db_query("insert into newsletters_unsubscribe_history (customers_id, date) values('" . $customers['customers_id'] . "', now() ) ");

	}
	
	echo $email .' backlisted<br />';
	$i++;
	}
 }
}