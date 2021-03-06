<?php

class Core_SandboxController extends Zend_Controller_Action{


    protected $_userAuth;


    public function init(){
        $this->_helper->viewRenderer->setNoRender(true);
        $this->_helper->layout->disableLayout();

        $auth = Zend_Auth::getInstance();
        $this->_userAuth = $auth->getIdentity();
    }

    public function indexAction(){
        echo '<h1>Sandbox de test ACL</h1> <br/>';

        $acl = Zend_Registry::get('Zend_Acl');

        var_dump($this->_userAuth);

       if($acl->isAllowed($this->_userAuth,'article','publier')){
           echo "autorisé";
       }else{
           echo "refusé";
       }



    }



}