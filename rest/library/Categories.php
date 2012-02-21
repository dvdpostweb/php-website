<?php
class Categories
{
	var $db;
	public function __construct()
	{
		$registry = Zend_Registry::getInstance();
		$this->db=$registry->get('db');
	}
	function categoriesIndex($lang=1,$id=0,$type='')
	{
		$sql = 'SELECT c.categories_id,parent_id, (select categories_name from categories_description where categories_id=parent_id and language_id = ? limit 1) as parent_name,categories_type,product_type,language_id,categories_name FROM categories c join categories_description cd on c.categories_id = cd.categories_id where language_id = ? and active="YES" and product_type="Movie"  and categories_type=?';
		if(empty($id))
		{
			$stmt = $this->db->query($sql, array( $lang,$lang,$type));
			$data=$stmt->fetchAll();
		}
		else
		{
			$sql.=' and c.categories_id= ? ';
			$stmt = $this->db->query($sql, array( $lang,$lang,$type, $id));
			$data=$stmt->fetch();
			if(empty($data['categories_id']))
			{
				return  array('status'=>1,'comment'=>'categorie not found');
			}
		}
		return  $data;
	}
}
?>