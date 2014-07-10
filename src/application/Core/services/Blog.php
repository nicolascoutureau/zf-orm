<?php



class Core_Service_Blog
{

	private $dbAdapter;

	/**
	 * [__construct description]
	 */
	public function __construct()
	{
		$this->dbAdapter = Zend_Controller_Front::getInstance()
			->getParam('bootstrap')
			->getResource('multidb')
			->getDb('db1');
	}


	/**
	 * [fetchLastArticles description]
	 * @param  integer $count
	 * @return [type]
	 */
	public function fetchLastArticles($count = 5)
	{

		$count = (int) $count;
		if(0 === $count){
			throw new Exception("\$count doit etre numérique et supérieur à 1", 1);
		}

		$mapper = new Core_Model_Mapper_Article();
		$articles = $mapper->fetchAll(null,'article_id DESC', $count);
		
		return $articles;
	}


	/**
	 * @param unknown $id
	 * @throws Exception
	 * @return Core_Model_Article
	 */
	public function fetchArticleByID($id)
	{

		if(0 === (int) $id){
			throw new Exception("\$id doit etre numérique et supérieur à 1", 1);
		}


		$mapper = new Core_Model_Mapper_Article();
		$article = $mapper->find($id);


		return $article;



	}
}