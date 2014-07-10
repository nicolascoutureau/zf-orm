<?php

/**
 * 
 * @author Administrateur
 * @desc Index controller
 *
 */
class Core_IndexController extends Zend_Controller_Action
{
	public function indexAction()
	{

		$data = array(
			'title' => 'My Title',
			'content' => 'My Content',
			'published_date' => '2009-08-17T17:30:00Z',
			'author' => "me"
		);

		$entry = new Model\Entry($data);
		var_dump($entry);

/*		$table = new Zend_Db_Table('entries');
		$mapper = new Model\EntryMapper($table);*/
	}
	
	public function testAction()
	{
		
	}
}