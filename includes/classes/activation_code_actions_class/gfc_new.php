<?php
class gfc {
	var $data;
	function __construct($data) {
		$this->data=$data;
	}
	function execute($son_id)
	{
		$status=true;
		if(!empty($son_id))
		{
			if(1==1 || $this->data['points']>=200)
			{
					
					//tep_db_query("update customers set mgm_points= mgm_points + 200 where customers_id = '" . $son_id . "' ");
					//tep_db_query("insert into customers_points_history (customers_id, date, action, sub_action, points ) values ('" . $son_id . "', now(), 1, 2, 200) ");				
					$sql_son_verif = 'select count(1) as count from mem_get_mem_used where son_id = '. $son_id;
					$son_query_verif = tep_db_query($sql_son_verif);
					$son_verif_value = tep_db_fetch_array($son_query_verif);
					if($son_verif_value['count']==0)
					{
						$sql = "select * from customers where customers_id = '" . $this->data['customers_id'] . "' ";
						$father = tep_db_query($sql);
					
						$father_value = tep_db_fetch_array($father);
					
						$son = tep_db_query("select * from customers where customers_id = '" . $son_id . "' ");
						$son_value = tep_db_fetch_array($son);
						$father_language = $father_value['customers_language'];
						if( $father_language < 1 || $father_language > 3 )
							$father_language =1;
							$type_gender = (strtoupper($father_value['customers_gender']) == 'f' ? 'female_gender' : 'male_gender');
							$gender_sql = "select * from  dvdpost_common.translation2 where translation_key = '".$type_gender."' and language_id = ".$father_language;
							$gender_query = tep_db_query($gender_sql);
							$gender_value = tep_db_fetch_array($gender_query);

						$sql="insert into mem_get_mem_used (date, father_id, father_abo_type, son_id , son_abo_type , points,expected_points ) values (now(), " . $this->data['customers_id']  . ", ".$father_value['customers_abo_type'].", " . $son_id . ", ".$father_value['customers_abo_type'].", '0',400 )";
						tep_db_query($sql);
						/*echo $sql.'<br />';*/
						$data = array();
						$data['gender_simple'] = $gender_value['translation_value'];
						$data['godfather_name'] = ucwords($father_value['customers_firstname']) . ' ' . ucwords($father_value['customers_lastname']);
						$data['son_name'] = ucwords($son_value['customers_firstname']) . ' ' . ucwords($son_value['customers_lastname']);
						$data['godfather_point'] = $father_value['mgm_points'];
						mail_message($father_value['customers_id'], 447, $data);
						$status=true;
					}
					else
					{
						$status = false;
					}
				
			}
			else
				$status=false;
		}
		else
		{
			$status=false;
		}
		return array('name'=>'gfc','status'=>$status);
	}
}
?>