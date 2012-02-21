<?php
require('../configure/application_top.php');
	
		/* Get the HTML or whatever is linked in $url. */
		$sql='select * from dvdpost_be_prod.products p
		join dvdpost_be_prod.products_description pd on p.products_id = pd.products_id
		where products_status !=-1 and products_type ="dvd_norm" limit 40000,40000';
		$customers_query = tep_db_query($sql);
		$i=1;
		echo '<table><tr><td>product_id</td><td>language id</td><td>status</td><td>image</td></tr>';
		while($p = tep_db_fetch_array($customers_query)){
			$i++;
			if ($i%10==0)
			{
				echo $i.'<br />';
			}
			$url ='http://www.dvdpost.be/images/'.str_replace(' ','%20',str_replace(chr(239),'i',str_replace(chr(233),'e',str_replace(chr(232),'e',$p['products_image_big']))));
			$handle = curl_init($url);
			curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);
			$response = curl_exec($handle);
			
			
			$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
			if($httpCode == 404 || $httpCode == 0 ) {
				echo '<tr><td>'.$p['products_id'].'</td><td> '.$p['language_id'].'</td><td>'.$url.'</td>';
				echo "<td> casse</td></tr>";
			}
			curl_close($handle);
}
?>