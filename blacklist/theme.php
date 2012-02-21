<?php  
require('../configure/application_top.php');

$sql = "select * from themes t where themes_type='dvd_adult'";
$query = tep_db_query($sql);
while($value = tep_db_fetch_array($query))
{

	$sql="insert into categories select null,null,0,1,now(),now(),'DVD_ADULT','Movie','NO','NO',null from themes where themes_id =".$value['themes_id'].";";
	echo $sql;
	$query2 = tep_db_query($sql);
	$insert_id = tep_db_insert_id();
	$sql="insert into categories_description select $insert_id,language_id,themes_name from themes_description where themes_id = ".$value['themes_id'].";";
	$query3 = tep_db_query($sql);
	$sql="insert into products_to_categories select products_id,$insert_id from products_to_themes where themes_id = ".$value['themes_id'].";";
	$query4 = tep_db_query($sql);
}