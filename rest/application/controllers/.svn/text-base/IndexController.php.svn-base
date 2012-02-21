<?php

class IndexController extends Zend_Controller_Action 
{
    function indexAction()
    {
        $this->view->title = "Mes albums";
		$album = new Albums();
		$this->view->albums = $album->fetchAll();
		

		
    }
	function restserverAction()
	{
		$server = new Zend_Rest_Server();
		$server->addFunction('sayHello');
		$server->handle();
	}
    function SayHello($qui)
	{
		return "hello ".$qui;
	}
	
	
    function ajouterAction()
	{
		$this->view->title = "Ajouter un nouvel album";
		$form = new FormulaireAlbum();
		$form->submit->setLabel('Ajouter');
		$this->view->form = $form;
		if ($this->_request->isPost()) {
      		$formData = $this->_request->getPost();
      		if ($form->isValid($formData)) {
          		$albums = new Albums();
          		$row = $albums->createRow();
          		$row->class = $form->getValue('class');
          		$row->comment = $form->getValue('comment');
          		$row->save();
				$this->_redirect('/');
      		} else {
          		$form->populate($formData);
      		}
		}
  	}
    
	function modifierAction()
	    {
	        $this->view->title = "Modifier un album";
	        $form = new FormulaireAlbum();
	        $form->submit->setLabel('Enregistrer');
	        $this->view->form = $form;

	        if ($this->_request->isPost()) {
	            $formData = $this->_request->getPost();
	            if ($form->isValid($formData)) {
	                $albums = new Albums();
	                $id = (int)$form->getValue('id');
	                $row = $albums->fetchRow('id='.$id);
	                $row->class = $form->getValue('class');
	                $row->comment = $form->getValue('comment');
	                $row->save();

	                $this->_redirect('/');
	            } else {
	                $form->populate($formData);
	            }
	        } else {
	            // L'id de l'album est attendu dans $params['id']
	            $id = (int)$this->_request->getParam('id', 0);
	            if ($id > 0) {
	                $albums = new Albums();
	                $album = $albums->fetchRow('id='.$id);
	                $form->populate($album->toArray());
	            }
	        }
	    }


    	function supprimerAction()
	    {
	        $this->view->title = "Supprimer un album";

	        if ($this->_request->isPost()) {
	            $id = (int)$this->_request->getPost('id');
	            $del = $this->_request->getPost('del');
	            if ($del == 'Oui' && $id > 0) {
	                $albums = new Albums();
	                $where = 'id = ' . $id;
	                $albums->delete($where);
	            }
	            $this->_redirect('/');
	        } else {
	            $id = (int)$this->_request->getParam('id');
	            if ($id > 0) {
	                $albums = new Albums();
	                $this->view->album = $albums->fetchRow('id='.$id);
	            }
	        }
	    }
}
