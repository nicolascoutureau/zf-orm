<?php



class Core_Service_Blog
{

	/**
	 * [fetchLastArticles description]
	 * @param  integer $count
	 * @return [type]
	 */
	public function fetchLastArticles($count = 5)
	{

		$article1 = new Core_Model_Article;
		$article1->setId(1)
				->setTitle('titre 1')
				->setContent('contenu 1');

		$article2 = new Core_Model_Article;
		$article2->setId(2)
				->setTitle('titre 2')
				->setContent('contenu 2');

		return(array($article1,$article2));
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


		$dbAdapter = Zend_Controller_Front::getInstance()
			->getParam('bootstrap')
			->getResource('multidb')
			->getDb('db1');

		$sql = "SELECT * FROM article WHERE article_id = ?";
		$result = $dbAdapter->fetchAll($sql, $id);

		if(0 === count($result)){
			return false;
		}

		$article = new Core_Model_Article;
		$article->setId($id)
				->setTitle($result[0]['article_title'])
				->setContent($result[0]['article_content']);


		return $article;
	}
}