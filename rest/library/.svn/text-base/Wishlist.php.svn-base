<?php
require_once '../auth/src/authentification.php';

class Wishlist
{
	var $db;
	var $authentification;
	
	public function __construct()
	{
			$registry = Zend_Registry::getInstance();
			$this->db=$registry->get('db');
			$this->authentification = new Authentification(array(
			  'client_id'  => 'dvdpost_iphone_client',
			  'secret' => 'dvdpost_iphone_client_secret',
			  'domain' => "https://sso.dvdpost.be",
			  'site' => 'http://www.dvdpost.com',

			));
		
		
	}
	function wishlistIndex($access_token = '',$type = 'dvd_norm',$lang = 1)
	{
		//$this->logger->log($customers_id.' <--> '.$type, Zend_Log::DEBUG);
		$me=$this->authentification->api('/me','GET',array('access_token' => $access_token));
  	$data=json_decode($me,true);
  	if(isset($data['id']) && !isset($data['error'])){
			$customers_id = $data['id'];
			$sql = 'select wl_id,w.product_id,priority,date_added,already_rented,products_name,products_description,products_image_big from wishlist w join products_description pd on w.product_id = pd.products_id where language_id = ? and customers_id = ? and wishlist_type=? order by priority, products_name ';
			$stmt = $this->db->query($sql, array( $lang,  $customers_id, $type));
			$data=$stmt->fetchAll();
			return  $data;
		}
		else
		{
			return array('status'=> 2, 'comment'=> 'not log');
		}
	}
	function wishlistPost($access_token=0,$products_id=0,$priority=2)
	{
		//$customers_id = 206183;
		$me=$this->authentification->api('/me','GET',array('access_token' => $access_token));
  	$data=json_decode($me,true);
  	if(isset($data['id']) && !isset($data['error']))
		{
			$customers_id = $data['id'];
			if($products_id >50)
			{
				
				
				$sql_data='select * from products where products_id=? ';

				$data_query=$this->db->query($sql_data, array( $products_id));
				$data_select=$data_query->fetch();
				if(!empty($data_select['products_id']))
				{
					$type=$data_select['products_type'];
				
					$sql_wish='select * from wishlist where product_id=? and customers_id =?';

					$wish=$this->db->query($sql_wish, array( $products_id,$customers_id));
					$data_wish=$wish->fetch();
				
					if($data_wish['wl_id']>0)
					{
						return array('status'=>1,'comment'=>'already in wishlist');
					}
					$sql_assigned='select * from wishlist_assigned where products_id=? and customers_id =?';

					$assigned=$this->db->query($sql_assigned, array( $products_id,$customers_id));
					$data=$assigned->fetch();
				
					if($data['wl_id']>0)
					{
						$assigned="YES";
					}
					else
					{
						$assigned="NO";
					}
					$sql='insert into wishlist (customers_id, product_id,priority,date_added,wishlist_type,already_rented) values (?,?,?,now(),?,?);';
					$this->db->query($sql, array( $customers_id,$products_id,$priority,$type,$assigned));
					return true;
				}
				else
				{
					return array('status'=>3,'comment'=>'product not found');
				}
			}
			else
			{
				return array('status'=>4,'comment'=>'product empty');
			}
		}
		else
		{
			return array('status'=>2,'comment'=>'not log');
		}
	}
	function wishlistDelete($access_token=0,$products_id=0)
	{
		$me=$this->authentification->api('/me','GET',array('access_token' => $access_token));
  	$data=json_decode($me,true);
		$customers_id = $data['id'];
  	if(isset($data['id']) && !isset($data['error']))
		{
			if(!empty($products_id))
			{
				$sql_wish='select * from wishlist where customers_id =? and product_id = ?';
				$wish=$this->db->query($sql_wish, array($customers_id,$products_id));
				$data_wish=$wish->fetch();
				if($data_wish['wl_id']>0)
				{
				$sql='delete from wishlist where customers_id = ? and product_id = ?';
				$this->db->query($sql, array( $customers_id , $products_id ));
					return true;
				}
				else
				{
					return array('status'=>3,'comment'=>'product not found into wishlist');
				}
			}
			else
			{
				return array('status'=>4,'comment'=>'product empty');
			}
		}
		else
		{
			return array('status'=>2,'comment'=>'not log');
		}
	}
}
?>