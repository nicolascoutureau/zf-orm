<?php


/**
* 	
*/
class Core_Model_DbTable_Article extends Zend_Db_Table_Abstract
{

	protected $_name = "article";
	protected $_primary = "article_id";


	protected $_referenceMap = array(
		'FK_Categorie' => array(
			'columns' => array('categorie_id'),
			'refTableClass' => 'Core_Model_DbTable_Categorie',
			'refColumns' => array('categorie_id'),
			'onUpdate' => self::CASCADE,
			'onDelete' => self::RESTRICT
		),
		'FK_Auteur' => array(
			'columns' => array('auteur_id'),
			'refTableClass' => 'Core_Model_DbTable_Auteur',
			'refColumns' => array('auteur_id'),
			'onUpdate' => self::CASCADE,
			'onDelete' => self::RESTRICT
		)
	);

}