<?php

/**
* 	
*/
class Core_Model_Mapper_Auteur extends Core_Model_Mapper_MapperAbstract
{	



	public function rowToObject(Zend_Db_Table_Row $row)
	{
		$auteur = new Core_Model_Auteur;
		$auteur->setId($row['auteur_id'])
			   ->setNom($row['auteur_nom']);

		return $auteur;
	}

	public function objectToRow(Core_Model_Interface $auteur)
	{
		return array(
			'auteur_id' => $auteur->getId(),
			'auteur_nom' => $auteur->getNom(),
		);
	}

}