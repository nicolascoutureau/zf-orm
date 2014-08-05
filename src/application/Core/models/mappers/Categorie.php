<?php

/**
* 	
*/
class Core_Model_Mapper_Categorie extends Core_Model_Mapper_MapperAbstract
{	

	Const COL_ID = 'categorie_id';
	Const COL_NOM = 'categorie_nom';


	public function rowToObject(Zend_Db_Table_Row $row)
	{
		$categorie = new Core_Model_Categorie;
		$categorie->setId($row['categorie_id'])
				  ->setNom($row['categorie_nom']);

		//Articles
/*		$rowArticle = $row->findDependentRowset('Core_Model_DbTable_Article');
		$mapperArticle = new Core_Model_Mapper_Article;
		$article = $mapperArticle->rowToObject($rowArticle);*/




		return $categorie;
	}


	public function objectToRow(Core_Model_Interface $categorie)
	{
		return array(
			'categorie_id' => $article->getId(),
			'categorie_nom' => $categorie->getNom(),
		);
	}


}