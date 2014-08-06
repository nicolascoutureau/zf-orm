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


	public function findCategorie($id)
	{
		if(0 === (int) $id){
			throw new Exception("\$id doit etre numérique et supérieur à 1", 1);
		}

		$mapper = new Core_Model_Mapper_Categorie();
		return $mapper->find($id);


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

	public function fetchArticlesByCategorie($categorieId)
	{
		if(0 === (int) $categorieId){
			throw new Exception("\$id doit etre numérique et supérieur à 1", 1);
		}

		$mapper = new Core_Model_Mapper_Article();
		return $mapper->fetchAll("categorie_id = $categorieId");


	}

	public function saveArticle(Core_Model_Article $article)
	{
		$mapper = new Core_Model_Mapper_Article();
		$mapper->save($article);
	}



	public function fetchCategories($asArray = false)
	{
		$mapper = new Core_Model_Mapper_Categorie();
		$result =  $mapper->fetchAll();

		if(!$asArray){
			return $result;
		}else{
			$resultArray = array();
			foreach ($result as $categorie) {
				$resultArray[$categorie->getId()] = $categorie->getNom();
			}
			return $resultArray;
		}

	}


	public function fetchAuteurs($asArray = false)
	{				
		$mapper = new Core_Model_Mapper_Auteur();
		$result = $mapper->fetchAll();

		if(!$asArray){
			return $result;
		}else{
			$resultArray = array();
			foreach ($result as $auteur) {
				$resultArray[$auteur->getId()] = $auteur->getNom();
			}
			return $resultArray;
		}
	}
}