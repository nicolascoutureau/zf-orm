<?php

abstract class Core_Model_Mapper_MapperAbstract
{
    protected $dbTable;
    protected $dbTableClassname;
    

    Const COL_ID = null;

	public function __construct()
	{
            if (null === $this->dbTableClassname) {
                $this->dbTableClassname = str_replace('Mapper', 'DbTable', get_called_class());
            }            
            
            $this->dbTable = new $this->dbTableClassname;
            $this->init();
	}        
        
    /**
     * Pseudo constructeur
     */
    public function init(){}
        
    public function find($id)
    {
    
        $row = $this->dbTable->find($id)->current();
        $object = $this->rowToObject($row);

        return $object;
    }

    public function save(Core_Model_Interface $object)
    {

        if(null === static::COL_ID){
            throw new BadMethodCallException("Besoin d'un COL_ID", 1);
            
        }
        $origin = $this->dbTable->find($object->getId())->current();
        $row = $this->objectToRow($object);
        if($origin instanceof Zend_Db_Table_Row_Abstract){
            //UPDATE
            $where  = array(static::COL_ID.' = ?' => $object->getId());
            $this->dbtable->update($row,$where);
        }else{
            //INSERT
            unset($row[static::COL_ID]);
            $this->dbTable->insert($row);
        }
    }


	public function fetchAll($where=null, $order=null, $count=null, $offset=null) 
	{
		$rowset = $this->dbTable->fetchAll($where,$order, $count, $offset);
		$objects = array(); 
		foreach ($rowset as $row) {
			$objects[] = $this->rowToObject($row);
		}
		return $objects;
	}     
        
        abstract public function rowToObject(Zend_Db_Table_Row $row);
        
        abstract public function objectToRow(Core_Model_Interface $object);
                
}