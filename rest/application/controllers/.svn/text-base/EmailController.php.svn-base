<?php
class EmailController extends Zend_Rest_Controller
{
	var $server;
	public function init()
    {
				$this->_helper->viewRenderer->setNoRender(true);
				$this->server = new Zend_Rest_Server();
				$this->server->SetClass("Emailer");
				$this->server->returnResponse(true);
    }

    public function indexAction()
    {
    }

    public function getAction()
    {
			$email=trim($this->getRequest()->getParam("email"));
			$data=array('method'=>'emailGet',"email"=>$email);
			$response=utf8_encode($this->server->handle($data));
			$jsonContent =  Zend_Json::fromXml($response, true);
			$this->getResponse()->appendBody($jsonContent);
			//$this->_helper->json($response);
	
    }
    
    public function postAction()
    {
			$email=trim($this->getRequest()->getParam("email"));
			$lastname=trim($this->getRequest()->getParam("lastname"));
			$firstname=trim($this->getRequest()->getParam("firstname"));
			$language=trim($this->getRequest()->getParam("language"));
			
			$birthday=trim($this->getRequest()->getParam("birthday"));
			$gender=trim($this->getRequest()->getParam("gender"));
			$zip=trim($this->getRequest()->getParam("zip"));
			
			$data=array('method'=>'emailPost',"email"=>$email,"lastname"=>$lastname,"firstname"=>$firstname,"language"=>$language,"zip"=>$zip,"gender"=>$gender,"birthday"=>$birthday );
			

			$response=utf8_encode($this->server->handle($data));
			$jsonContent =  Zend_Json::fromXml($response, true);
			$this->getResponse()->appendBody($jsonContent);
			//$this->_helper->json($response);
 		}
    
    public function putAction()
    {
    
		}
    
    public function deleteAction()
    {
	
    }
	
}


