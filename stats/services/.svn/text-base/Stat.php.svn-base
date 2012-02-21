<?php
class Stat{
	function Stat()
	{
		$this->methodTable = array(
 
			"getStatStep1" => array(
				"description" => "Puts the value into a session variable with name key",
				"access" => "remote"
			),
			
		);
		
		
	}
	function getStatStep1($datas)
	{
			if(empty($datas)){
				$datas["date1"]='2009-04-05';
				$datas["date2"]='2009-05-20';
				
			}
			switch($datas['orderby'])
			{
				case 'day':
					$orderby="date_format(customers_info_date_account_created,'%y %m %d')";
					$select="date_format(customers_info_date_account_created,'%a %d %M %y')";
					
				break;
				
	
				
				case 'week':
				$orderby="date_format(customers_info_date_account_created,'%x %v')";
				$select="date_format(customers_info_date_account_created,'%v-%x')";
				break ;
				case 'month':
				default:
					$orderby="date_format(customers_info_date_account_created,'%y %m')";
					$select="date_format(customers_info_date_account_created,'%Y-%m-%d')";
			}
			

			$sql="SELECT ".$select." as date,count(1) as count FROM `customers` 
			where   customers_info_date_account_created>'".$datas["date1"]." 00:00:00' and customers_info_date_account_created<'".$datas["date2"]." 23:59:59' group by ".$orderby;
			$query=tep_db_query($sql);
			$data=array();
			$i=0;
			$nb=tep_db_num_rows($query);
			while($row = tep_db_fetch_array($query ))
			{
				$i++;
				switch($datas['orderby'])
				{
					case 'day':
						$key=$row['date'];
					break;
					case 'week':
					default:
						
						
						$d=explode('-',$row['date']);
						$tmp=explode('-',$datas["date1"]);
						$dt1=mktime(0,0,0,$tmp[1],$tmp[2],$tmp[0]);
						$tmp=explode('-',$datas["date2"]);
						$dt2=mktime(0,0,0,$tmp[1],$tmp[2],$tmp[0]);
						$temp=Stat::get_lundi_dimanche_from_week($d[0],$d[1],$dt1,$dt2,$i,$nb);
							
						$php_date=$temp[0];
						$php_date2=$temp[1];
						
						
						$key=$php_date.' - '.$php_date2;
					break ;
					case 'month':
					default:
						$d=explode('-',$row['date']);
						if($i==1)
						{
							$d2=explode('-',$datas["date1"]);
							if($d[1]==$d2[1])
								$day=$d2[2];
							else
								$day=1;
						}
						else
							$day=1;
						
						
						 if($i==$nb)
						{
								$d2=explode('-',$datas["date2"]);
								if($d[1]==$d2[1])
									$lastday=$d2[2];
								else
									$lastday=date("t", mktime(0, 0, 0, $d[1], $day, $d[0]));
						}
						else
							$lastday=date("t", mktime(0, 0, 0, $d[1], $day, $d[0]));

						$php_date=date("D d M y", mktime(0, 0, 0, $d[1], $day, $d[0]));
						$php_date2=date("D d M y", mktime(0, 0, 0, $d[1], $lastday, $d[0]));
						
						$key=$php_date.' - '.$php_date2;
						
				}
				$data[]=array('key'=>$key,'indice'=>'step1','value'=>$row['count']);
			}
		NetDebug::trace($sql);	
		return $data;
	}
	function getStatPhone($datas)
	{
			if(empty($datas)){
				$datas["date1"]='2009-04-05';
				$datas["date2"]='2009-05-20';
				
			}
			switch($datas['orderby'])
			{
				case 'day':
					$orderby="date_format(create_date,'%y %m %d')";
					$select="date_format(create_date,'%a %d %M %y')";
				break;
				case 'week':
				$orderby="date_format(create_date,'%x %v')";
				$select="date_format(create_date,'%v-%x')";
				break ;
				case 'month':
				default:
					$orderby="date_format(create_date,'%y %m')";
					$select="date_format(create_date,'%Y-%m-%d')";
			}
			

			$sql="SELECT ".$select." as date,count(1) as count FROM `registration_sms_status` 
			where   create_date>'".$datas["date1"]." 00:00:00' and create_date<'".$datas["date2"]." 23:59:59' and used_date is not NULL group by ".$orderby;
			$query=tep_db_query($sql);
			$data=array();
			$i=0;
			$nb=tep_db_num_rows($query);
			while($row = tep_db_fetch_array($query ))
			{
				$i++;
				switch($datas['orderby'])
				{
					case 'day':
						$key=$row['date'];
					break;
					case 'week':
					default:
						
						
						$d=explode('-',$row['date']);
						$tmp=explode('-',$datas["date1"]);
						$dt1=mktime(0,0,0,$tmp[1],$tmp[2],$tmp[0]);
						$tmp=explode('-',$datas["date2"]);
						$dt2=mktime(0,0,0,$tmp[1],$tmp[2],$tmp[0]);
						$temp=Stat::get_lundi_dimanche_from_week($d[0],$d[1],$dt1,$dt2,$i,$nb);
							
						$php_date=$temp[0];
						$php_date2=$temp[1];
						
						
						$key=$php_date.' - '.$php_date2;
					break ;
					case 'month':
					default:
						$d=explode('-',$row['date']);
						if($i==1)
						{
							$d2=explode('-',$datas["date1"]);
							if($d[1]==$d2[1])
								$day=$d2[2];
							else
								$day=1;
						}
						else
							$day=1;
						
						
						 if($i==$nb)
						{
								$d2=explode('-',$datas["date2"]);
								if($d[1]==$d2[1])
									$lastday=$d2[2];
								else
									$lastday=date("t", mktime(0, 0, 0, $d[1], $day, $d[0]));
						}
						else
							$lastday=date("t", mktime(0, 0, 0, $d[1], $day, $d[0]));

						$php_date=date("D d M y", mktime(0, 0, 0, $d[1], $day, $d[0]));
						$php_date2=date("D d M y", mktime(0, 0, 0, $d[1], $lastday, $d[0]));
						
						$key=$php_date.' - '.$php_date2;
						
				}
				$data[]=array('key'=>$key,'indice'=>'sms used','value'=>$row['count']);
			}
		NetDebug::trace($sql);	
		return $data;
	}
   	function getStatOrders($datas)
	{
			if(empty($datas)){
				$datas["date1"]='2009-04-05';
				$datas["date2"]='2009-05-20';
				
			}
			switch($datas['orderby'])
			{
				case 'day':
					$orderby="date_format(date_purchased,'%y %m %d')";
					$select="date_format(date_purchased,'%a %d %M %y')";
					
				break;
				
	
				
				case 'week':
				$orderby="date_format(date_purchased,'%x %v')";
				$select="date_format(date_purchased,'%v-%x')";
				break ;
				case 'month':
				default:
					$orderby="date_format(date_purchased,'%y %m')";
					$select="date_format(date_purchased,'%Y-%m-%d')";
			}
			

			$sql="SELECT ".$select." as date,count(1) as count FROM `orders` 
			where   date_purchased>'".$datas["date1"]." 00:00:00' and date_purchased<'".$datas["date2"]." 23:59:59' group by ".$orderby;
			$query=tep_db_query($sql);
			$data=array();
			$i=0;
			NetDebug::trace($sql);	
			$nb=tep_db_num_rows($query);
			while($row = tep_db_fetch_array($query ))
			{
				$i++;
				switch($datas['orderby'])
				{
					case 'day':
						$key=$row['date'];
					break;
					case 'week':
					default:
						
						
						$d=explode('-',$row['date']);
						$tmp=explode('-',$datas["date1"]);
						$dt1=mktime(0,0,0,$tmp[1],$tmp[2],$tmp[0]);
						$tmp=explode('-',$datas["date2"]);
						$dt2=mktime(0,0,0,$tmp[1],$tmp[2],$tmp[0]);
						$temp=Stat::get_lundi_dimanche_from_week($d[0],$d[1],$dt1,$dt2,$i,$nb);
							
						$php_date=$temp[0];
						$php_date2=$temp[1];
						
						
						$key=$php_date.' - '.$php_date2;
					break ;
					case 'month':
					default:
						$d=explode('-',$row['date']);
						if($i==1)
						{
							$d2=explode('-',$datas["date1"]);
							if($d[1]==$d2[1])
								$day=$d2[2];
							else
								$day=1;
						}
						else
							$day=1;
						
						
						 if($i==$nb)
						{
								$d2=explode('-',$datas["date2"]);
								if($d[1]==$d2[1])
									$lastday=$d2[2];
								else
									$lastday=date("t", mktime(0, 0, 0, $d[1], $day, $d[0]));
						}
						else
							$lastday=date("t", mktime(0, 0, 0, $d[1], $day, $d[0]));

						$php_date=date("D d M y", mktime(0, 0, 0, $d[1], $day, $d[0]));
						$php_date2=date("D d M y", mktime(0, 0, 0, $d[1], $lastday, $d[0]));
						
						$key=$php_date.' - '.$php_date2;
						
				}
				$data[]=array('key'=>$key,'indice'=>'step1','value'=>$row['count']);
			}
	
		return $data;
	}
	function getStatQuizz($datas)
	{
			if(empty($datas)){
				$datas["date1"]='2009-01-05';
				$datas["date2"]='2009-12-20';
				$datas["quizz"]='28';
				$datas['orderby']='week';
			}
			if(empty($datas["quizz"]))
			{
				$datas["quizz"]='28';
				//$datas['orderby']='week';
			}
			switch($datas['orderby'])
			{
				case 'day':
					$orderby="date_format(date,'%y %m %d')";
					$select="date_format(date,'%a %d %M %y')";
					
				break;
				
	
				
				case 'week':
				$orderby="date_format(date,'%x %v')";
				$select="date_format(date,'%v-%x')";
				break ;
				case 'month':
				default:
					$orderby="date_format(date,'%y %m')";
					$select="date_format(date,'%Y-%m-%d')";
			}
			

			$sql="SELECT ".$select." as date,count(1) as count FROM `quizz` 
			where   date>'".$datas["date1"]." 00:00:00' and date<'".$datas["date2"]." 23:59:59' and quizz_name_id =".$datas['quizz']." group by ".$orderby;
			$query=tep_db_query($sql);
			$data=array();
			$i=0;
			NetDebug::trace($sql);	
			$nb=tep_db_num_rows($query);
			while($row = tep_db_fetch_array($query ))
			{
				$i++;
				switch($datas['orderby'])
				{
					case 'day':
						$key=$row['date'];
					break;
					case 'week':
					default:
						
						
						$d=explode('-',$row['date']);
						$tmp=explode('-',$datas["date1"]);
						$dt1=mktime(0,0,0,$tmp[1],$tmp[2],$tmp[0]);
						$tmp=explode('-',$datas["date2"]);
						$dt2=mktime(0,0,0,$tmp[1],$tmp[2],$tmp[0]);
						$temp=Stat::get_lundi_dimanche_from_week($d[0],$d[1],$dt1,$dt2,$i,$nb);
							
						$php_date=$temp[0];
						$php_date2=$temp[1];
						
						
						$key=$php_date.' - '.$php_date2;
					break ;
					case 'month':
					default:
						$d=explode('-',$row['date']);
						if($i==1)
						{
							$d2=explode('-',$datas["date1"]);
							if($d[1]==$d2[1])
								$day=$d2[2];
							else
								$day=1;
						}
						else
							$day=1;
						
						
						 if($i==$nb)
						{
								$d2=explode('-',$datas["date2"]);
								if($d[1]==$d2[1])
									$lastday=$d2[2];
								else
									$lastday=date("t", mktime(0, 0, 0, $d[1], $day, $d[0]));
						}
						else
							$lastday=date("t", mktime(0, 0, 0, $d[1], $day, $d[0]));

						$php_date=date("D d M y", mktime(0, 0, 0, $d[1], $day, $d[0]));
						$php_date2=date("D d M y", mktime(0, 0, 0, $d[1], $lastday, $d[0]));
						
						$key=$php_date.' - '.$php_date2;
						
				}
				$data[]=array('key'=>$key,'indice'=>'quizz','value'=>$row['count']);
			}
	
		return $data;
	}
   static function get_lundi_dimanche_from_week($week,$year,$date1,$date2,$i,$nb)
   {
	
   
	if(date("W",mktime(0,0,0,01,01,$year))==1)
     $mon_mktime = mktime(0,0,0,01,(01+(($week-1)*7)),$year);
   else
     $mon_mktime = mktime(0,0,0,01,(01+(($week)*7)),$year);
    
   if(date("w",$mon_mktime)>1)
     $decalage = ((date("w",$mon_mktime)-1)*60*60*24);
    
   $lundi = $mon_mktime - $decalage;
   $dimanche = $lundi + (6*60*60*24);

   if($i==1)
   {
		if($lundi<$date1)
			$lundi=$date1;
   }
   if($i==$nb)
   {
      if($dimanche>$date2)
		$dimanche=$date2;
   }
   $lundi_dt=date("D d M y",$lundi);
   $dimanche_dt=date("D d M y",$dimanche); 
       return array($lundi_dt,$dimanche_dt);
   }
}
?>