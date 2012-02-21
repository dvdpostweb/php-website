<?php
class Actions {
	
	var $uniq_id;
	var $script;
	CONST UNIQ_ID_EMPTY=1;
	CONST UNIQ_ID_NOT_EXIST=2;
	CONST UNIQ_ID_EXPIRED=3;
	CONST SCRIPT_NOT_EXIST=4;
	CONST ERROR_SCRIPT=5;
	CONST ERROR_FINISH=6;
	CONST CLASS_NOT_EXIST=7;
	function __construct() {
	}
	public function getUniqId()
	{
		return $this->uniq_id;
	}
	public function setUniqId($id)
	{
		$this->uniq_id=$id;
	}
	private function error($code,$link='')
	{
		tep_rollback();
		if(empty($link))
			return array('error'=>$code);
		else
			return array('error'=>$code,'error_link'=>$link);
	}
	public function createKey($customers_id,$action_id,$ref_id=0)
	{
		if(!empty($ref_id))
			$sql_insert='insert into actions_key (customers_id ,actions_id , `key`,ref_id) values ('.$customers_id.','.$action_id.',uuid(),'.$ref_id.')';
		else
			$sql_insert='insert into actions_key (customers_id ,actions_id , `key`) values ('.$customers_id.','.$action_id.',uuid())';
		$query=tep_db_query($sql_insert);
		$id=tep_db_insert_id();
		$sql='select * from actions_key where id = '.$id;
		$query=tep_db_query($sql,'db_link',true);
		$row=tep_db_fetch_array($query);
		return $row['key'];
			
	}
	public function execute($id)
	{
		tep_begin();
		if(!empty($id))
			$this->setUniqId($uniq_id);
		else
			return $this->error(self::UNIQ_ID_EMPTY);
		$sql="SELECT * FROM actions_key a join actions_value av on a.actions_id =av.id where `key`='".$id."'";
		$query=tep_db_query($sql,'db',true);
		if($row=tep_db_fetch_array($query)){
			
				//var_dump($_SERVER);
			$root=((!empty($_SERVER['DOCUMENT_ROOT']))?$_SERVER['DOCUMENT_ROOT']:$_SERVER['PWD']);
			$url=$root.'/includes/classes/actions_class/'.$row['class'];
			if(is_file($url))
			{
				require($url);
				$class=explode('.',$row['class']);
				$class_name=$class[0];
				if(class_exists($class_name)){
					if(!empty($row['ref_id']))
						$this->script = new $class_name($row['customers_id'],$row['ref_id']);
					else
						$this->script = new $class_name($row['customers_id']);
					if($row['expired']!=NULL && $row['multi_use']==='NO')
					{
						$link=$this->script->error_link();
						// /var_dump($this);
						return $this->error(self::UNIQ_ID_EXPIRED,$link);
					}
					else
					{
						$return= $this->script->execute();
						if($return['status']===true)
						{
							$sql='update actions_key set expired = now() where `key`="'.$id.'"';
							$status=tep_db_query($sql);
							if($status===true)
							{
								tep_commit();
								$data_return=array('error'=>-1,'name'=>$return['name'],'link'=>$return['link'],'customers_id'=>$row['customers_id']);
								if(!empty($return['ref_id']))
								{
									$data_return['ref_id']=$return['ref_id'];
								}
								return $data_return;
							}
							else
							{
								return $this->error(self::ERROR_FINISH);
							}
						}
						else
						{
							return $this->error(self::ERROR_SCRIPT);
						}
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
		return 	$this->error(self::UNIQ_ID_NOT_EXIST);
		}
	}
}
?>