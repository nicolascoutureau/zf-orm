<?php

namespace Model;
class EntryMapper{

	protected $_tableGateway = null;

	protected $_tableName = 'entries';

	public function __construct(Zend_Db_Table_Abstract $tableGateway)
	{
		if (is_null($tableGateway))
		{
			$this->_tableGateway = new Zend_Db_Table($this->_tableName);
		} else {
			$this->_tableGateway = $tableGateway;
		}
	}

	protected function _getGateway()
	{
		return $this->_tableGateway;
	}

	public function save(Entry $entry){
		$data = array(
			'title' => $entry->title,
			'content' => $entry->content,
			'published_date' => $entry->published_date,
			'author_id' => $entry->author->id
		);

		$entry->id = $this->_getGateway()->insert($data);
	}
}