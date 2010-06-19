<?php

class UsersController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->title = "HNA Users";
        $this->view->headTitle($this->view->title);
        
        $users = new Application_Model_DbTable_Users();
        $this->view->users = $users->fetchAll();
    }

    public function addAction()
    {
        $this->title->title = "Add new user";
        $this->view->headTitle($this->view->title);
        
        $form = new Application_Form_User();
        $form->submit->setLabel('Add');
        $this->view->form = $form;
        
        if ($this->getRequest()->isPost()) {
        	$formData = $this->getRequest()->getPost();
        	if ($form->isValid($formData)) {
        		$surname = $form->getValue('surname');
        		$firstname = $form->getValue('firstname');
        		$lastname = $form->getValue('lastname');
        		/////
        		$contract = 1;
        		/////  
        		$block = $form->getValue('block');
        		$room = $form->getValue('room');
        		$ip = $form->getValue('ip');
        		$mac1 = $form->getValue('mac1');
        		$mac2 = $form->getValue('mac2');
        		$status = $form->getValue('status');
        		$register = date('Y-m-d H:i:s');
        		
        		$note = $form->getValue('note');

        		$users = new Application_Model_DbTable_Users();
        		$users ->addUser($surname,$firstname,$lastname,$contract,$block,$room,$ip,$mac1,$mac2,$status,$register,$note);
        		
        		$this->_helper->redirector('index','users');
        	} else {
        		$form->populate($formData);
        	}
        }
    }
    
    public function editAction()
    {
        echo "UsersController::editAction";
    }

    public function deleteAction()
    {
        echo "UsersController::deleteAction";
    }

    public function viewAction()
    {
        // action body
    }


}

