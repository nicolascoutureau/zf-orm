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

		$this->view->articles = $this->blogSvc->fetchLastArticles(2);
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


}