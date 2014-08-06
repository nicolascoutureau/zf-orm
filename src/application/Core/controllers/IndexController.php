<?php

/**
 * 
 * @author Administrateur
 * @desc Index controller
 *
 */
class Core_IndexController extends Zend_Controller_Action
{
	public function indexAction()
	{

		$data = array(
			'title' => 'My Title',
			'content' => 'My Content',
			'published_date' => '2009-08-17T17:30:00Z',
			'author' => "me"
		);

		$entry = new Model\Entry($data);
		var_dump($entry);

/*		$table = new Zend_Db_Table('entries');
		$mapper = new Model\EntryMapper($table);*/
	}
	

	public function signinAction()
	{
		$this->_helper->layout()->setLayout('signin');
		$form = new Core_Form_Auth;


		if($this->getRequest()->isPost()){
			if($form->isValid($this->getRequest()->getPost())){
				$login = $form->getValue('login');
				$password = $form->getValue('password');


				$adapter = new Zend_Auth_Adapter_DbTable();
				$adapter->setTableName('user')
						->setIdentityColumn('user_login')
						->setCredentialColumn('user_password')
						->setIdentity($login)
						->setCredential($password);

				$auth = Zend_Auth::getInstance();
				$authResult = $auth->authenticate($adapter);

				if($authResult->getCode() == Zend_Auth_Result::SUCCESS){
					$this->_redirect('/');
				}
			}
		}

		$this->view->form = $form;
	}


	public function logoutAction()
	{
		$auth = Zend_Auth::getInstance();
		$auth->clearIdentity();
		$this->_redirect('/');
	}
}