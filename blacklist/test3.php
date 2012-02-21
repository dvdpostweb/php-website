<?php  
require('configure/application_top.php');

/*$parse = array(
	'@tiscali.be',
	'@tele2allin.be',
	'@tele2.be',
	'@versateladsl.be',
	'@tiscali.fr',
	'@versatel.be',
	'@tele2.fr',
	'@pi.be',
	'@mrw.wallonie.be',
	'@cybernet.be',
	'@planetinternet.be'
	'@belgique.com',
	'@chello.fr',
	'@biz.tiscali.be',
	'@win.be',
	'@msn.be',
	'@pro.tiscali.be',
	'@spw.wallonie.be',
	'@blabla.com'
	'@msm.com',
	'@ive.be',
	'@blabla.be',
	'@met.wallonie.be',
	'@iepscf-alleur.be',
	'@test.com',
	'@dexia.be',
	'@europarl.eu.int',
	'@docs.be',
	'@consilium.eu.int',
	'@mandat.dexia.be',
	'@versadsl.be',
	'@fortisbank.com',
	'@sn.com',
	'@gov.wallonie.be',
	'@coditel.be',
	'@surfadsl.net',
	'@jubii.fr',
	'@test.be',
	'@bordet.be',
	'@zz.be',
	'@caramail.fr',
	'@seraing.be',
	'@zz.be',
	'@imail.be',
	'@tele.be',
	'@tele2.lu',
	'@msn.fr',
	'@orbem.be',
	'@jetable.com',
	'@jetable.com',
	'@everyday.com',*/
$parse = array(
	'@boursorama.com',
	'@army.mil.be',
	'@mns.com',
);

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
}