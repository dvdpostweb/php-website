<?php
class Activation_code_actions {
	
	var $code_id;
	var $customers_id;
	
	var $script;
	CONST SCRIPT_NOT_EXIST=1;
	CONST ERROR_SCRIPT=2;
	CONST ERROR_FINISH=3;
	CONST CLASS_NOT_EXIST=4;
	CONST CODE_ID_EMPTY=5;
	CONST ACTION_EXPIRED=6;
	CONST CODE_NOT_MATCH=7;
	CONST CODE_NOT_LINK=8;
	function __construct() {
	}
	
	private function error($code,$send_mail=true)
	{
		tep_rollback();
		if($send_mail)
			tep_mail('bugreport@dvdpost.be','bugreport@dvdpost.be','erreur activation code class','code : '.$code,'bugreport@dvdpost.be','bugreport@dvdpost.be');
		return array('status' => "false" , 'error'=>$code);
	}
	
	public function execute($customers_id ,$id)
	{
		tep_begin();
		
		$id = intval($id);
		if(empty($customers_id))
			return $this->error(self::CODE_ID_EMPTY);
		if(!isset($id))
			return $this->error(self::CODE_ID_EMPTY);
		if(!is_int($id))
		{
			return $this->error(self::CODE_ID_EMPTY);
		}
		$sql='SELECT a.id,activation_code_id,class_id,name,customer_id FROM activation_actions a join activation_classes ac on a.class_id = ac.id where activation_code_id = '. $id;
		$query=tep_db_query($sql,'db',true);
		if($row=tep_db_fetch_array($query)){
			if(1==0 && $row['expired']!=NULL)
				return $this->error(self::ACTION_EXPIRED);
			$url=DIR_WS_INCLUDES.'classes/activation_code_actions_class/'.$row['name'].'.php';
			if(is_file($url))
			{
				require_once($url);
				$class_name=$row['name'];
				if(class_exists($class_name)){
					$data['customers_id'] = $row['customer_id'];
					$this->script = new $class_name($data);
					$return= $this->script->execute($customers_id);
					if($return['status']===true)
					{
						tep_commit();
						return array('status' => "true" , 'error'=>"false");
					}
					else
					{
						return $this->error(self::ERROR_SCRIPT);
					}

				}
				else
				{
					return $this->error(self::CLASS_NOT_EXIST);	
				}
			}
			else
			{
				return $this->error(self::SCRIPT_NOT_EXIST);
			}
		}
		else
		{
			$sql = 'select * from activation_code where activation_id = '.$id;
			$query=tep_db_query($sql,'db',true);
			if($row=tep_db_fetch_array($query))
			{
				if (strpos($row['activation_code'],'GFC') !==false)
				{
					$sql = 'insert into activation_code_errors (customer_id, activation_code_id, created_at, updated_at) values ('.$customers_id.','.$id.',now(),now())';
					tep_db_query($sql,'db',true);
					return $this->error(self::CODE_NOT_LINK,false);
				}
				else
					return $this->error(self::CODE_NOT_MATCH,false);	
				
			}
			else
			{
				return $this->error(self::CODE_NOT_MATCH,false);	
			}
		}
	}
	
}
?>