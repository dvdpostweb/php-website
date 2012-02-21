<?php
class vodx {
	var $customers_id;
	function __construct($id) {
		$this->customers_id = $id;
		
	}
	function execute()
	{
		$status=true;
		for($i=0;$i<4;$i++)
		{
			$droselia_codes=create_code_droselia();
			$status=tep_db_query("insert into droselia_codes (droselia_codes, customers_id, buy_date , catalog_id) values ( '" . $droselia_codes . "','" . $this->customers_id . "',now() , 0 )");
			if($status===false)
			{
				break;
			}
		}
		
		return array('name'=>'vodx','status'=>$status,'link'=>'/vodx.php');
	}
	function error_link()
	{
		return '/vodx.php';
	}
}
?>