<?php  
require('configure/application_top.php');
$parse = array(
'@skynet.com'				=> '@skynet.be',
'@kynet.be'					=> "@skynet.be",
'@gmail.be'					=> '@gmail.com',
'@yahoo.be'					=> '@yahoo.fr',
'@otmail.com'				=> '@hotmail.com',
'@homail.com'				=> '@hotmail.com',
'@hotmailcom'				=> '@hotmail.com',
'@hotmai.com'				=> '@hotmail.com',
'@htmail.com'				=> '@hotmail.com',
'@hotamil.com'			=> "@hotmail.com",
'@hotmal.com'				=> "@hotmail.com",
'@hotmail'					=> "@hotmail.com",
'@hotmail.co'				=> "@hotmail.com",
'@hotmail.om'				=> "@hotmail.com",
'@hotamail.com'			=> "@hotmail.com",
'@hotmail.cm'				=> "@hotmail.com",
'@hotmil.com'				=> "@hotmail.com",
'@htomail.com'			=> '@hotmail.com',
'@homtail.com'			=> '@hotmail.com',
'@hoymail.com'			=> '@hotmail.com',
'@laposte.fr'       => '@laposte.be',
'@ahoo.fr'          => '@yahoo.fr',
'@skyne.be'         => '@skynet.be',
'@hotmaim.com'      => '@hotmail.com',
'@skynetbe'         => '@skynet.be',
'@skynet.net'       => '@skynet.be',
'@hotmaill.com'     => '@hotmail.com',
'@gamil.com'        => '@gmail.com',
'@hotmail.cpm'      => '@hotmail.com',
'@skyney.be'        => '@skynet.be',
'@yaho.fr'          => '@yahoo.fr',
'@hotmail.coml'     => '@hotmail.com',
'@skynet'           => '@skynet.be',
'@slynet.be'        => '@skynet.be',
'@hptmail.com'      => '@hotmail.com',
'@yhaoo.fr'         => '@yahoo.fr',
'@sknet.be'         => '@skynet.be',
'@hormail.com'      => '@hotmail.com',
'@hotrmail.com'     => '@hotmail.com',
'@hotmai.fr'        => '@hotmail.fr',
'@hotail.com'       => '@hotmail.com',
'@hotmail.con'      => '@hotmail.com',
'@mns.com'          => '@msn.com',
'@sktnet.be'        => '@skynet.be',
'@yahou.fr'         => '@yahoo.fr',
'@hotmaiil.com'     => '@hotmail.com',
'@gmai.com'         => '@gmail.com',
'@skybet.be'        => '@skynet.be',
'@brutele.be'			=> '@voo.be',
'@wanadoo.be'			=> '@wanadoo.fr',
	'@ive.fr'			=> '@live.fr',
);
foreach ($parse as $wrong => $good)
{

	$sql="select * from prospects where customers_email_address like '%".$wrong."'";
	$query = tep_db_query($sql);
	while($value = tep_db_fetch_array($query))
	{
		echo $value['customers_email_address'];
		$new=str_replace($wrong,$good,$value['customers_email_address']);
		echo ' '.$new.'<br />';
		$sql3="select * from prospects where customers_email_address like '".$new."'";
		$query3 = tep_db_query($sql3);
		if($value3 = tep_db_fetch_array($query3))
		{
			echo "already exist<br />";
			tep_db_query("update prospects  set unsubscribe = 1 where  customers_email_address = '" . $value['customers_email_address'] . "' ");
		}
		else
		{
			echo "update <br />";
			$sql2 ="update prospects set customers_email_address= '".$new."' where customers_email_address='".$value['customers_email_address']."'";
			tep_db_query($sql2);
		}
	}
}