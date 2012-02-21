<?php  
require('configure/application_top.php');

$parse = array(
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
	'@planetinternet.be',
	'@belgique.com',
	'@chello.fr',
	'@biz.tiscali.be',
	'@win.be',
	'@msn.be',
	'@pro.tiscali.be',
	'@spw.wallonie.be',
	'@blabla.com',
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
	'@everyday.com',
	'@boursorama.com',
	'@army.mil.be',
	'@mns.com',
);

foreach ($parse as $wrong )
{

	$sql="select * from prospects where customers_email_address like '%".$wrong."'";
	$query = tep_db_query($sql);
	while($value = tep_db_fetch_array($query))
	{
		tep_db_query("update prospects  set unsubscribe = 1 where  customers_email_address = '" . $value['customers_email_address'] . "' ");
	}
}