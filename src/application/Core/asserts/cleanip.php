<?php

class Core_Assert_Cleanip implements  Zend_Acl_Assert_Interface{

    public function assert(Zend_Acl $acl,
                Zend_Acl_Role_Interface $role = null,
                Zend_Acl_Resource_Interface $resource = null,
                $privilege = null)
    {
        return $this->_isCleanIp($_SERVER['REMOTE_ADDR']);

    }

    public function _isCleanIp($ip){
        return true;
    }
}