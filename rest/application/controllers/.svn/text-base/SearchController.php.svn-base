<?php
		define('SPHINX_HOST','pekin');
include('../sphinx/search.php');
class SearchController extends Zend_Rest_Controller
{
	var $server;
	public function init()
    {
        $this->_helper->viewRenderer->setNoRender(true);
		$this->server = new Zend_Rest_Server();
		$this->server->SetClass("Movies");
		$this->server->returnResponse(true);
		$this->parameters['short']=$this->getRequest()->getParam("short");
		$this->parameters['page']=$this->getRequest()->getParam("page");
		$this->parameters['nb']=$this->getRequest()->getParam("nb");
    }
 	public function indexAction()
    {
		$lang=self::getLang();
		$type=$this->getRequest()->getParam("type");
		$search=$this->getRequest()->getParam("search");
		if(strlen($search)>3)
		{
		$arg = array('-s',' @weight DESC rate DESC');
		$search=trim($search);
		$search=str_replace( array('à','á','â','ã','ä', 'ç', 'è','é','ê','ë', 'ì','í','î','ï', 'ñ', 'ò','ó','ô','õ','ö', 'ù','ú','û','ü', 'ý','ÿ', 'À','Á','Â','Ã','Ä', 'Ç', 'È','É','Ê','Ë', 'Ì','Í','Î','Ï', 'Ñ', 'Ò','Ó','Ô','Õ','Ö', 'Ù','Ú','Û','Ü', 'Ý'), array('a','a','a','a','a', 'c', 'e','e','e','e', 'i','i','i','i', 'n', 'o','o','o','o','o', 'u','u','u','u', 'y','y', 'A','A','A','A','A', 'C', 'E','E','E','E', 'I','I','I','I', 'N', 'O','O','O','O','O', 'U','U','U','U', 'Y'), $search);
		$filter='';
		if(strpos($search,'dvd')!==false)
		{
			$filter=" and products_media='dvd'";	
			$search=str_replace('dvd','',$search);
		}
		else if(strpos($search,'bluray')!==false || strpos($search,'blueray')!==false || strpos($search,'blue-ray')!==false || strpos($search,'blu-ray')!==false)
		{
			$search=str_replace('bluray','',$search);
			$search=str_replace('blueray','',$search);
			$search=str_replace('blue-ray','',$search);
			$search=str_replace('blu-ray','',$search);
			$filter=" and products_media='blueray'";
		}
		$index_products='products_norm';
		$index_actors='actors_norm';
		$index_serie='products_norm_serie';
		$index_directors='directors_norm';
		$list=search($search,'@(products_name)',$index_products,$arg,false);
		$list_serie=search($search,'@(products_name)',$index_serie,$arg,false);
		}
		else
		{
			$list=-2;
			$list_serie=-2;
		}
		$data=array('method'=>'searchIndex',"lang"=>$lang,'type'=>$type,'search'=>$list,'search_serie'=>$list_serie,'parameters'=>$this->parameters);
		$response=utf8_encode($this->server->handle($data));
		$jsonContent =  Zend_Json::fromXml($response, true);
		$this->getResponse()->appendBody($jsonContent);
	
	}
    public function getAction()
    {
	 }
	public function postAction()
    {
		$this->getResponse()
		            ->appendBody("From postAction() creating the requested article");
    }
    
    public function putAction()
    {
	 $this->getResponse()
	            ->appendBody("From putAction() updating the requested article");
    }
    
    public function deleteAction()
    {
		$this->getResponse()
		            ->appendBody("From deleteAction() deleting the requested article");
    }
    
	private function getLang()
	{
		$lang=$this->getRequest()->getParam("lang");
		switch($lang)
		{
			case 'fr':	
				$lang_id=1;
			break;
			case 'nl':	
				$lang_id=2;
			break;
			case 'en':	
				$lang_id=3;
			break;
			default:
				$lang_id=1;
		}
		
		return $lang_id;
		
		
	}
	
}


