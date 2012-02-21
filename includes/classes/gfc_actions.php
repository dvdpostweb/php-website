<?php
class gfc_actions {
	
	var $code;
	var $customers_id;
	
	var $script;
	CONST CODE_ID_EMPTY=1;
	CONST CODE_NO_EXIST=2;
	CONST ALREADY_EXIST=3;
	CONST ERROR_DB=4;
	CONST CUSTOMER_ID_EMPTY=5;
	
	function __construct() {
	}
	
	private function error($code,$send_mail=true)
	{
		tep_rollback();
		if($send_mail)
			tep_mail('bugreport@dvdpost.be','bugreport@dvdpost.be','erreur activation code class','code : '.$code,'bugreport@dvdpost.be','bugreport@dvdpost.be');
		return array('error' => $code,'status' => 'false');
	}
	
	public function execute($customers_id ,$codes)
	{
		
		if(empty($customers_id))
			return $this->error(self::CUSTOMER_ID_EMPTY);
		if(empty($codes))
			return $this->error(self::CODE_ID_EMPTY);
		$codes=explode(';',$codes);
		
		tep_begin();
		
		foreach($codes as $code)
		{	
			$sql='select * from activation_code where activation_code = "'.$code.'"';
			$query=tep_db_query($sql);

			$row=tep_db_fetch_array($query);
			if(!empty($row['activation_id']))
			{
				$sql='select * from activation_code_actions where activation_code_id='.$row['activation_id'];
				$query=tep_db_query($sql);
				if(!tep_db_fetch_array($query))
				{

					$sql='insert into activation_code_actions (activation_code_id ,class_id) values('.$row['activation_id'].',1)';
					$status = $query=tep_db_query($sql);
					if($status == false)
					{
						return $this->error(self::ERROR_DB);
					}
					$action_id=tep_db_insert_id();
					$sql='insert into activation_code_properties (activation_code_actions_id,`key`,value) values('.$action_id.',"customers_id",'.$customers_id.')';
					$status = $query=tep_db_query($sql);
					if($status == false)
					{
						return $this->error(self::ERROR_DB);
					}
					$sql='insert into activation_code_properties (activation_code_actions_id,`key`,value) values('.$action_id.',"points",200)';
					$status = $query=tep_db_query($sql);
					if($status == false)
					{
						return $this->error(self::ERROR_DB);
					}
					
					tep_commit();
					return array('error'=>'false','status'=> 'true');
				}
				else
				{
					return $this->error(self::ALREADY_EXIST);
				}
			}
			else {
				return $this->error(self::CODE_NO_EXIST);
			}
		}
	}
	
}
?>