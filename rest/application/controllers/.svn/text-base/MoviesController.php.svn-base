<?php
class MoviesController extends Zend_Rest_Controller
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
		$data=array('method'=>'moviesIndex',"lang"=>$lang,'type'=>$type,'id'=>0,'parameters'=>$this->parameters);
		$response=utf8_encode($this->server->handle($data));
		$jsonContent =  Zend_Json::fromXml($response, true);
		$this->getResponse()->appendBody($jsonContent);
		//$this->_helper->json($response);
    }

    public function getAction()
    {
		$lang=self::getLang();
		$id=$this->getRequest()->getParam("id");
		$type=$this->getRequest()->getParam("type");
		$data=array('method'=>'moviesIndex',"lang"=>$lang,'type'=>$type,'id'=>$id,'parameters'=>$this->parameters);
		$response=utf8_encode($this->server->handle($data));
		$jsonContent =  Zend_Json::fromXml($response, true);
		$this->getResponse()->appendBody($jsonContent);
		//$this->_helper->json($response);
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


