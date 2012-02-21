<?php
class Movies
{
	var $db;
	public function __construct()
	{
		$registry = Zend_Registry::getInstance();
		$this->db=$registry->get('db');
		
		$this->logger = new Zend_Log();
		$redacteur = new Zend_Log_Writer_Stream('php://output');
		$this->logger->addWriter($redacteur);
		
		$this->select_short='select p.products_id, p.products_media, concat(SUBSTRING(pd.products_description,1,140),"...") as products_description, pd.products_name, pd.products_image_big, broadcast, trailer as broadcast_id';
		
		$this->select_long='select p.products_type,p.products_id, p.products_media,  p.products_year,(p.rating_users/ p.rating_count) rating,  
		  p.products_date_available,  
		 p.products_series_id,  
		 directors_name,  p.products_runtime ,countries_name
		 , pd.products_description, pd.products_name, pd.products_image_big, pd.products_url, broadcast, trailer as broadcast_id';
		
		
		$this->sql_select_actors = ',(select GROUP_CONCAT(actors_name) as actors_name from actors a join products_to_actors pa on a.actors_id = pa.actors_id where pa.products_id =p.products_id ) actors_name';
		$this->from_long=' from products  p join products_description pd on pd.products_id = p.products_id
			 LEFT JOIN products_trailers t on t.products_id = p.products_id and t.language_id = ?
			 LEFT JOIN countries c ON p.products_countries_id = c.countries_id
			 left JOIN directors d ON p.products_directors_id = d.directors_id ';
		$this->from_short=' from products  p join products_description pd on pd.products_id = p.products_id LEFT JOIN products_trailers t on t.products_id = p.products_id and t.language_id = ?';
		$this->where='	where  p.products_product_type=\'Movie\' 
			 and p.products_status != -1 
			 and pd.language_id = ? ';
			 
		$this->order=' order by p.products_id desc';
		
	}
	function moviesIndex($lang=1,$type='dvd_norm',$id=0,$parameters)
	{
		
		
		if(empty($id))
		{
			
			$sql_start=$this->start($parameters['short']);
			$limit=$this->limit($parameters['page'],$parameters['nb']);	
			$sql=$sql_start.$this->where.'and p.products_type =? '.$this->order. $limit;
			$stmt = $this->db->query($sql, array( $lang,$lang,$type));
			$data=$stmt->fetchAll();
		}
		else
		{
			$sql_start=$this->start($parameters['short']);
			$limit=$this->limit($parameters['page'],$parameters['nb']);
			$sql=$sql_start.$this->where.'and p.products_id =? '.$this->order.$limit;
			//$this->logger->log($sql.'.'. $lang.','.$id, Zend_Log::DEBUG);
			$stmt = $this->db->query($sql, array( $lang,$lang,$id));
			$data=$stmt->fetch();
		}
		return  $data;
	}
	function searchIndex($lang=1,$type='dvd_norm',$search,$search_serie,$parameters)
	{
		if($search!=-2){
			$sql_start=$this->start($parameters['short']);
			$limit=$this->limit($parameters['page'],$parameters['nb']);
			$sql=$sql_start.$this->where.' and (p.products_id IN ('.$search.') or p.products_series_id IN ('.$search_serie.')) and products_type=?'.$this->order.$limit;
			$stmt = $this->db->query($sql, array( $lang,$lang,$type));
			$data=$stmt->fetchAll();
			
			
		return  $data;
		}
		else
		{
			return "too shoort";
		}
		
		
	}
	function moviesByCategory($lang=1,$cat_id,$parameters)
	{
		$sql_start=$this->start($parameters['short']);
		$limit=$this->limit($parameters['page'],$parameters['nb']);
		$sql=$sql_start.' join products_to_categories pc on pc.products_id= p.products_id and pc.categories_id= ? '.$this->where.$this->order.$limit;
		
		//$this->logger->log($sql.'.'. $lang.'.'.$cat_id, Zend_Log::DEBUG);
		$stmt = $this->db->query($sql, array( $lang,$cat_id,$lang));
		$data=$stmt->fetchAll();
		return  $data;
	}
	function start($short)
	{
		if($short==true)
			return $this->select_short.$this->from_short;
		else
			return $this->select_long.$this->sql_select_actors.$this->from_long;
	}
	function limit($page,$nb)
	{
		if($nb >0)
		{
			return ' limit '.(($page-1)*$nb).','.$nb;
		}
		else
		{
			return '';
		}
	}
}
?>