<?php  
require('configure/application_top.php');
$current_page_name = 'step3c.php';

include(DIR_WS_INCLUDES . 'translation.php');

$page_body_to_include = $current_page_name;
$data=tep_send_portable($_GET['number']);

if($data['customer']!=$customer_id && $data['customer']!=0)
{
	$status='USED';
}
else
{
	if ($data['status']!='SEND') 
	{
		$status='EMPTY';
	}
	else
	{
		$status='SEND';										
	}
}

require('configure/application_bottom.php');
echo $status;
?>
