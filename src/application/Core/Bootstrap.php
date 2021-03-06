<?php

/**
* 
*/
class Core_Bootstrap extends Zend_Application_Module_Bootstrap
{


/*    protected function _initAutoloading()
    {
        $loader = new Zend_Application_Module_Autoloader(
            array(
                'namespace' => 'Core',
                'basePath' => APP_PATH .'/Core'
            )
        );
        $loader->addResourceType('assert','asserts','Assert');
    }*/



	// Enregistrement d'un plugin dans le front controller

    protected function _initAcl()
    {
        $acl = new Zend_Acl();

        //Lorsque vous spécifiez plusieurs parents pour un rôle,
        //conservez à l'esprit que le dernier parent listé est le premier
        //dans lequel une règle utilisable sera recherchée.

        $acl->addRole('invite')
            ->addRole('staff', 'invite')
            ->addRole('editeur', 'staff')
            ->addRole('admin');

        $acl->addResource('article')
            ->addResource('categorie')
            ->addResource('categorie8ans', 'categorie')
            ->addResource('categorie18ans', 'categorie')
            ->addResource('author');

        $acl->allow('invite', null, 'connexion');

        $acl->allow('admin');

        $authenticateRole = array('staff', 'editeur', 'admin');

        $acl->deny($authenticateRole, null, 'connexion');
        $acl->allow($authenticateRole, null, 'deconnexion');

        $acl->allow('staff', 'article', array('modifier', 'soumettre', 'relire'));
        $acl->allow('editeur', 'article', array('publier', 'archiver', 'supprimer'));

        $acl->allow('staff', null, 'google');

        /**
         * Access Handler
         */
        $acl->addResource('Core::article::addarticle');
        $acl->addResource('Core::article::archiver');
        $acl->addResource('Core::article::categories');
        $acl->addResource('Core::article::categorieview');
        $acl->addResource('Core::article::index');
        $acl->addResource('Core::article::view');

        $acl->addResource('Core::index::index');
        $acl->addResource('Core::Index::signin');
        $acl->addResource('Core::Index::logout');
        $acl->addResource('Core::sandbox::index');

        $acl->addResource('Core::error::error');

        $acl->allow(null, null, 'access');
        $acl->allow(null, null, null);


        Zend_Registry::set('Zend_Acl', $acl);


















        /*
        $acl->addRole('parents')
            ->addRole('facteur')
            ->addRole(new Zend_Acl_Role('papa'), array('facteur', 'parents'))
            ->addRole(new Zend_Acl_Role('maman'), 'parents')
            ->addRole('nourrice', 'maman')
            ->addRole('enfants')
            ->addRole('adopter')
            ->addRole('bebe', 'enfants')
            ->addRole('mario', 'enfants')
            ->addRole('luigi', 'enfants')
            ->addRole('peach', array('bebe','enfants', 'adopter'));

        $acl->addResource(new Zend_Acl_Resource('television'))
            ->addResource('lave-linge')
            ->addResource('lave-vaiselle')
            ->addResource('seche-linge')
            ->addResource('voiture')
            ->addResource('maman')
            ->addResource('papa')
            ->addResource('peach')
            ->addResource('bebe')
            ->addResource('parents')
            ->addResource('enfants');

        //allow($roles = null, $resources = null, $privileges = null, $assert = null)
        $acl->allow(null, 'television', 'canal+');
        $acl->deny('enfants', 'television', 'xxl');
        $acl->allow(null, 'television', null);

        $acl->allow('maman', 'bebe', 'lait');
        $acl->deny('nourrice', 'bebe', 'lait');

        $acl->allow('nourrice', 'bebe', 'bouteille_lait');
        */



    }


    protected function _initPlugins()
	{
		$fc = Zend_Controller_Front::getInstance();
		$fc->registerPlugin(new Core_Plugin_Navigation)
           ->registerPlugin(new Core_Plugin_Auth)
		   ->registerPlugin(new Core_Plugin_AccessHandler(),80);
	}
}