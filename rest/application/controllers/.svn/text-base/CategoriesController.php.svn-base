<?php
class CategoriesController extends Zend_Rest_Controller
{
	var $server;
	public function init()
    {
        $this->_helper->viewRenderer->setNoRender(true);
		$this->server = new Zend_Rest_Server();
		$this->movies=$this->getRequest()->getParam("movies");
		if(empty($this->movies))
		{
		$this->server->SetClass("Categories");
		}
		else
		{
			$this->server->SetClass("Movies");	
		}
		$this->server->returnResponse(true);
		$short=$this->getRequest()->getParam("short");
		$this->parameters['short']=$this->getRequest()->getParam("short");
		$this->parameters['page']=$this->getRequest()->getParam("page");
		$this->parameters['nb']=$this->getRequest()->getParam("nb");;
    }

    public function indexAction()
    {
		$lang=self::getLang();
		$id=$this->getRequest()->getParam("id");
		$type=$this->getRequest()->getParam("type");
		
		if(empty($this->movies))
		{
			$data=array('method'=>'categoriesIndex',"lang"=>$lang,'id'=>$id,'type'=>$type);
		}
		else
		{
			$data=array('method'=>'moviesByCategory',"lang"=>$lang,'cat_id'=>$id,'parameters'=>$this->parameters);
		}
		//$response=$this->server->handle($data);
		$response=utf8_encode($this->server->handle($data));
		$jsonContent =  Zend_Json::fromXml($response, true);
		$this->getResponse()->appendBody($jsonContent);
    }

    public function getAction()
    {
		$lang=self::getLang();
		$id=$this->getRequest()->getParam("id");
		$type=$this->getRequest()->getParam("type");
		
		$data=array('method'=>'categoriesIndex',"lang"=>$lang,'id'=>$id,'type'=>$type);
		
		$response=utf8_encode($this->server->handle($data));
		$jsonContent =  Zend_Json::fromXml($response, true);
		$this->getResponse()->appendBody($jsonContent);
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


