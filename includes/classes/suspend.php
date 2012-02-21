<?php
class Suspend {
	
	CONST DATA_ERROR=1;
	CONST QUERY_ERROR=2;
	CONST ALREADY_SUSPENDED=3;
	
	CONST ACTION_SUSPENSION_HOLIDAYS = 19;
	CONST ACTION_SUSPENSION_PAYMENT = 20;
	
	function __construct() {
	}
	private function error($code)
	{
		tep_rollback();
		return array('error'=>$code, 'status' => 'false');
			
	}
	public function execute($customer_id,$user_id,$duration,$type)
	{
		tep_begin();
		if(empty($customer_id) || !isset($user_id) || !isset($duration) || ($type != "HOLIDAYS" && $type != "PAYMENT") || ($type == "HOLIDAYS" && $duration == 0))
		{
			return $this->error(self::DATA_ERROR);
		}
		else
		{
			
			$sql_user='SELECT customers_abo_suspended ,customers_abo_payment_method_name,customers_abo_type
			FROM `products_abo` p
			JOIN customers c ON c.customers_abo_type = p.products_id
			LEFT JOIN customers_abo_payment_method ca ON c.customers_abo_payment_method = ca.customers_abo_payment_method_id
			WHERE customers_id ='.$customer_id;

			$query_user=tep_db_query($sql_user,'db_link',true);
			$value_user=tep_db_fetch_array($query_user);
			$products_id = $value_user['customers_abo_type'];
			$suspended = $value_user['customers_abo_suspended'];
			
			if( $suspended > 0)
			{
				return $this->error(self::ALREADY_SUSPENDED);
			}
			
			if(!empty($value_user['customers_abo_payment_method_name']))
			{
				$payment=strtoupper($value_user['customers_abo_payment_method_name']);
			}
			else
			{
				$payment='UNDEFINED';
			}
			
			if ($user_id == 55)
			{
				$site = 1;
			}
			else
			{
				$site = 0;
			}
			
			if($type == "HOLIDAYS")
			{
				$sql_up = 'update customers set customers_abo_suspended = 1, customers_abo_validityto = date_add(customers_abo_validityto, INTERVAL '.$duration.' DAY) where customers_id ='. $customer_id;
				$status_up=tep_db_query($sql_up);
				$sql_insert ='insert into suspensions (customer_id, status,  date_added, date_end, last_modified, user_modified) values ('.$customer_id.',"'.$type.'",now(),date_add(now(), interval '.$duration.' DAY),now(),'.$user_id.')';
				$status_in=tep_db_query($sql_insert);
				$action = self::ACTION_SUSPENSION_HOLIDAYS;
			}
			else
			{
				$sql_up = 'update customers set customers_abo_suspended = 2 where customers_id ='. $customer_id;
				$status_up=tep_db_query($sql_up);
				$sql_insert ='insert into suspensions (customer_id, status,  date_added, date_end, last_modified, user_modified) values ('.$customer_id.',"'.$type.'",now(),now(),now(),'.$user_id.')';
				$status_in=tep_db_query($sql_insert);
				$action = self::ACTION_SUSPENSION_PAYMENT;
			}
			
			$sql_history = "insert into abo (Customerid, Action ,  Date , product_id, payment_method, site) values ('" . $customer_id . "', ".$action." ,now(), '" . $products_id . "' , '".$payment."', '" . $site. "') ";
			$status_history = tep_db_query($sql_history);
			if($status_history == false || $status_in == false || $status_up == false)
			{
				return $this->error(self::QUERY_ERROR);
			}
			else
			{		
				tep_commit();
				return array('error'=>'false', 'status' => 'true');
			}
		}
		
	}
}
?>