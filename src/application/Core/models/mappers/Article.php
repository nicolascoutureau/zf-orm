<?php

/**
* 	
*/
class Core_Model_Mapper_Article
{	

	private $dbtable;


	public function __construct()
	{
		$this->dbtable = new Core_Model_DbTable_Article();
	}
	
	public function find($id)
	{
	
		$row = $this->dbtable->find($id)->current();
		$article = $this->rowToObject($row);

		return $article;
	}

	public function fetchAll($where=null,$order=null,$count=null,$offset=null)
	{

		$rowset = $this->dbtable->fetchAll($where,$order, $count, $offset);
		$articles = array();
		foreach ($rowset as $row) {
			$articles[] = $this->rowToObject($row);

		}
		
		return $articles;
	}


	public function rowToObject(Zend_Db_Table_Row $row)
	{
		$article = new Core_Model_Article;
		$article->setId($row['article_id'])
				->setTitle($row['article_title'])
				->setContent($row['article_content']);

		$rowCategorie = $row->findParentRow('Core_Model_DbTable_Categorie');
		$mapperCategorie = new Core_Model_Mapper_Categorie;
		$categorie = $mapperCategorie->rowToObject($rowCategorie);
		
		$categorie->addArticle($article);
		$article->setCategorie($categorie);


		return $article;
	}

}