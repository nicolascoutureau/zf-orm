<?php

/**
* 	
*/
class Core_Model_Mapper_Auteur
{	

	private $dbtable;


	public function __construct()
	{
		$this->dbtable = new Core_Model_DbTable_Auteur();
	}

	public function rowToObject(Zend_Db_Table_Row $row)
	{
		$auteur = new Core_Model_Auteur;
		$auteur->setId($row['auteur_id'])
				  ->setNom($row['auteur_nom']);

		return $auteur;
	}

}