<?php

/**
* 
*/
class Core_Form_Auth extends Zend_Form
{
	public function init()
	{

		// Titre
		$this->addElement('text','login',array(
			'label' => "Login"
		));

		$this->getElement('login')
			 ->setRequired(true)
			 ->addValidator(new Zend_Validate_NotEmpty());


		// Password
		$this->addElement('password','password',array(
			'label' => "Password"
		));

		$this->getElement('password')
			 ->setRequired(true)
			 ->addValidator(new Zend_Validate_NotEmpty());


		// Submit
		$this->addElement('submit','submit',array(
			'label' => 'Connexion'
		));



	}
}