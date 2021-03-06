<?php

/**
* 	
*/
class Core_Model_Mapper_Article extends Core_Model_Mapper_MapperAbstract
{	


	/*protected $dbTableClassname = 'Core_Model_DbTable_Article';*/

	Const COL_ID = 'article_id';
	Const COL_NOM = 'article_nom';

	public function delete($id)
	{
		$row = $this->dbtable->find($id)->current();
		if(!$row instanceof Zend_Db_Table_Row_Abstract){
			throw new Zend_Db_Table_Row_Exception("impossible de supprimer l'element", 1);
			
		}

		return (bool)$row->delete();
	}

/*	public function save(Core_Model_Article $article)
	{
		$origin = $this->dbtable->find($article->getId())->current();
		$row = $this->objectToRow($article);
		if($origin instanceof Zend_Db_Table_Row_Abstract){
			//UPDATE
			$where  = array('article_id = ?' => $article->getId());
			$this->dbtable->update($row,$where);
		}else{
			//INSERT
			unset($row['article_id']);
			$this->dbtable->insert($row);

		}
	}*/

	public function rowToObject(Zend_Db_Table_Row $row)
	{
		$article = new Core_Model_Article;
		$article->setId($row['article_id'])
				->setTitle($row['article_title'])
				->setContent($row['article_content']);


		//CATEGORIE
		$rowCategorie = $row->findParentRow('Core_Model_DbTable_Categorie');
		$mapperCategorie = new Core_Model_Mapper_Categorie;
		$categorie = $mapperCategorie->rowToObject($rowCategorie);

		//AUTEUR
		$rowAuteur = $row->findParentRow('Core_Model_DbTable_Auteur');
		$mapperAuteur = new Core_Model_Mapper_Auteur;
		$auteur = $mapperAuteur->rowToObject($rowAuteur);

		$article->setAuteur($auteur);


		$categorie->addArticle($article);
		$article->setCategorie($categorie);


		return $article;
	}

	public function objectToRow(Core_Model_Interface $article)
	{
		return array(
			'article_id' => $article->getId(),
			'article_title' => $article->getTitle(),
			'article_content' => $article->getContent(),
			'categorie_id' => $article->getCategorie()->getId(),
			'auteur_id' => $article->getAuteur()->getId(),
		);
	}

}