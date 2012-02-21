<?php
require('../configure/application_top.php');
if (isset($_GET['products_id']))
{
	$sql2='update products_description set products_url = null where products_id='.$_GET['products_id'];
	tep_db_query($sql2);
}
else
{
	$page =(isset($_GET['page']))? $_GET['page'] : 0;
	$off =$page*1000;
	$sql ='select * from products_description where products_url is not null and products_url !="" and language_id = 1 limit '.$off.',1000';
	$customers_query = tep_db_query($sql);
	$i=1;
	echo '<table>';
	while($customers = tep_db_fetch_array($customers_query)){
		$url= $customers['products_url'];
		$handle = curl_init($url);
		curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);

		/* Get the HTML or whatever is linked in $url. */
		$response = curl_exec($handle);

		/* Check for 404 (file not found). */
		$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
		echo '<tr><td>'.$customers['products_id'].'</td><td> '.$url.'</td><td> '.$httpCode.'</td>';
		if($httpCode == 404 || $httpCode == 0 ) {
		    /* Handle 404 here. */
		echo "<td> casse</td></tr>";
		$sql2='update products_description set products_url = null where products_id='.$customers['products_id'];
		tep_db_query($sql2);
		}else 
		{
			echo '<td><a href="http://'.$customers['products_url'].'">'.$customers['products_id'].'</a> <a href="http://localhost/404.php?products_id='.$customers['products_id'].'">broke</a></td></tr>';
		}

		curl_close($handle);
	}
}

?>