<?php

/**
* 	
*/
class Core_Model_Mapper_Categorie
{	

	private $dbtable;


	public function __construct()
	{
		$this->dbtable = new Core_Model_DbTable_Categorie();
	}

	public function rowToObject(Zend_Db_Table_Row $row)
	{
		$categorie = new Core_Model_Categorie;
		$categorie->setId($row['categorie_id'])
				  ->setNom($row['categorie_nom']);

		return $categorie;
	}

}