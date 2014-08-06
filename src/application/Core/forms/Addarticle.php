<?php

/**
* 
*/
class Core_Form_Addarticle extends Zend_Form
{
	public function init()
	{

		// Titre
		$this->addElement('text','title',array(
			'label' => "Titre"
		));

		$this->getElement('title')
			 ->setRequired(true)
			 ->addValidator(new Zend_Validate_NotEmpty());


		// Catégorie
		$this->addElement('select','categorie',array(
			'label' => "Categorie"
		));

		$blog = new Core_Service_Blog();
		$dataCategorie = $blog->fetchCategories(true);

		$this->getElement('categorie')
			 ->addMultiOptions($dataCategorie)
			 ->setRequired(true)
			 ->addValidator(new Zend_Validate_NotEmpty());


		// Auteur
		$this->addElement('select','auteur',array(
			'label' => "auteur"
		));

		$blog = new Core_Service_Blog();
		$dataAuteur = $blog->fetchAuteurs(true);

		$this->getElement('auteur')
			 ->addMultiOptions($dataAuteur)
			 ->setRequired(true)
			 ->addValidator(new Zend_Validate_NotEmpty());


		// Content
		$this->addElement('textarea','content',array(
			'label' => "Content",
			'rows' => 6
		));

		$this->getElement('content')
			 ->setRequired(true)
			 ->addValidator(new Zend_Validate_NotEmpty());


		// Submit
		$this->addElement('submit','submit',array(
			'label' => 'Enregistrer'
		));



	}
}