<?php
class TestController extends Zend_Rest_Controller
{
	var $server;
	
	public function init()
    {
        $this->_helper->viewRenderer->setNoRender(true);
		
		$config = new Zend_Config_Ini('./application/config.ini', 'general');
		$registry = Zend_Registry::getInstance();
		$registry->set('config', $config);
		// Mise en place de la BDD
		$db = Zend_Db::factory($config->db);
	    Zend_Db_Table::setDefaultAdapter($db);      
		$this->no_results = array('status' => 'NO_RESULTS');
		$this->album = new Albums();
		$this->server = new Zend_Rest_Server();
		$this->server->addFunction('Categories');
		$this->server->returnResponse(true);
		
    }

    public function indexAction()
    {
		$response=$this->server->handle(array('method'=>'Categories'));
		echo $jsonContent =  Zend_Json::fromXml($response, true);
    }

    public function getAction()
    {
		$id=$this->getRequest()->getParam("id");
		//var_dump($this->getRequest());
			//var_dump($this->getRequest()->getParam());
		$row = $this->album->fetchRow('id='.$id);
		$res=array('class'=>$row->class,'comment'=>$row->comment);
		var_dump($res);
		//$this->_helper->json($res);
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
}

function Categories()
{
	$albums = new Albums();
	$data=$albums->fetchAll();
	$res=$data->toArray();
	return  $res;//$row;
}