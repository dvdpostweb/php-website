<?php  
require('../configure/application_top.php');
$name= $_GET['name'];
$lang= $_GET['lang'];

$list=$_GET['list'];
if(!empty($name))
{

	$sql="insert into product_lists (name,home_page,status, created_at,updated_at,kind,language,style) values('".$name."',0,0,now(),now(),'TOP',".$lang.",'NORMAL')";
	$query = tep_db_query($sql);
	$value = tep_db_fetch_array($query);
	$insert_id = tep_db_insert_id();
	$list_array= explode(';',$list);
	$order=1;
	echo $sql.'<br />';
	foreach($list_array as $item)
	{
		$sql_in ="insert into listed_products (product_id,product_list_id,`order`,created_at,updated_at) values (".$item.",".$insert_id.",".$order.",now(),now());";
		echo $sql_in.'<br />';
		
		$query = tep_db_query($sql_in);
		$order ++;
	}
}
