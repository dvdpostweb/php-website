<?php
class WishlistController extends Zend_Rest_Controller
{
	var $server;
	public function init()
    {
        $this->_helper->viewRenderer->setNoRender(true);
		$this->server = new Zend_Rest_Server();
		$this->server->SetClass("Wishlist");
		$this->server->returnResponse(true);
		
		$this->logger = new Zend_Log();
		$redacteur = new Zend_Log_Writer_Stream('php://output');

		$this->logger->addWriter($redacteur);
    }

    public function indexAction()
    {
		//$lang=self::getLang();
		
		$access_token=$this->getRequest()->getParam("access_token");
		$type=$this->getRequest()->getParam("type");
		$lang=$this->getRequest()->getParam("lang");
		$lang=self::getLang();
		$data=array('method'=>'wishlistIndex',"access_token"=>$access_token,'type'=>$type,'lang' => $lang);
		$response=utf8_encode($this->server->handle($data));
		$jsonContent =  Zend_Json::fromXml($response, true);
		$this->getResponse()->appendBody($jsonContent);
		//$this->_helper->json($response);
    }

    public function getAction()
    {
	
    }
    
    public function postAction()
    {
		$products_id=$this->getRequest()->getParam("id");
		$access_token=$this->getRequest()->getParam("access_token");
		$priority=self::getPriority();
		
		$data=array('method'=>'wishlistPost',"access_token"=>$access_token,'products_id'=>$products_id,'priority'=>$priority);
		$response=utf8_encode($this->server->handle($data));
		$jsonContent =  Zend_Json::fromXml($response, true);
		$this->getResponse()->appendBody($jsonContent);
		//$this->_helper->json($response);
		
 	}
    
    public function putAction()
    {
	 $this->getResponse()
	            ->appendBody("From putAction() updating the requested article");
    }
    
    public function deleteAction()
    {
			$products_id=$this->getRequest()->getParam("id");
			$access_token=$this->getRequest()->getParam("access_token");
			$data=array('method'=>'wishlistDelete',"access_token"=>$access_token,'products_id'=>$products_id);
			$response=utf8_encode($this->server->handle($data));
			$jsonContent =  Zend_Json::fromXml($response, true);
			$this->getResponse()->appendBody($jsonContent);
			//$this->_helper->json($response);
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
	private function getPriority()
	{
		$priority=(int)$this->getRequest()->getParam("priority");
		if(is_numeric($priority) && $priority<4 && $priority >0)
		{}
		else
		$priority=1;
		return $priority;
	}
	
}


