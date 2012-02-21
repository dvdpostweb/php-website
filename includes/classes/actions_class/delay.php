<?php
class delay {
	var $customers_id;
	var $ref_id;
	function __construct($id,$ref_id) {
		$this->customers_id = $id;
		$this->ref_id = $ref_id;
		
	}
	function execute()
	{
		dvd_finally_arrived($this->ref_id,$this->customers_id);
		$status=true;
		return array('name'=>'delay','status'=>$status,'link'=>'/custserv_list.php');
	}
	function error_link()
	{
		return '';
	}
}
?>