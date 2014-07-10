<?php

namespace Model;

/**
* 
*/
class Entity
{
	
	public function __construct(array $data = null)
	{
		if (!is_null($data)) {
			foreach ($data as $name => $value) {
				$this->{$name} = $value;
			}
		}
	}

	public function toArray()
	{
		return $this->_data;
	}

	public function __set($name, $value)
	{
		$this->_data[$name] = $value;
	}

	public function __get($name)
	{
		if (array_key_exists($name, $this->_data)){
			return $this->_data[$name];
		}
	}

	public function __isset($name)
	{
		return isset($this->_data[$name]);
	}

	public function __unset($name)
	{
		if (isset($this->_data[$name])){
			unset($this->_data[$name]);
		}
	}


}