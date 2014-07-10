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
		$this->view->article = $this->blogSvc->fetchArticleById(2);
	}


}