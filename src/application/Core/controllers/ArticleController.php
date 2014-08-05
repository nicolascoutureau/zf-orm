<?php

/**
* 
*/
class Core_ArticleController extends Zend_Controller_Action
{
	
	private $blogSvc;

	public function init()
	{
		$this->blogSvc = new Core_Service_Blog();
	}

	function indexAction()
	{

		$this->view->articles = $this->blogSvc->fetchLastArticles(10);

		$newArticle = new Core_Model_Article();
		
		$categorie = new Core_Model_Categorie();
		$categorie->setId(1);

		$auteur = new Core_Model_Auteur();
		$auteur->setId(1);

		$newArticle->setTitle('test article')
				   ->setContent('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.')
				   ->setCategorie($categorie)
				   ->setAuteur($auteur);

		$this->blogSvc->saveArticle($newArticle);

	}


	function viewAction()
	{
		$articleId = (int) $this->getRequest()->getParam('id');
		if(0 === $articleId){
			throw new Zend_Controller_Action_Exception("Article introuvable", 404);
		}

		$article = $this->blogSvc->fetchArticleById($articleId);
		if(!$article){
			throw new Zend_Controller_Action_Exception("Article introuvable", 404);
		}

		$this->view->article = $article;
	}

	public function categoriesAction()
	{

		$this->view->categories = $this->blogSvc->fetchCategories();
		

	}



}