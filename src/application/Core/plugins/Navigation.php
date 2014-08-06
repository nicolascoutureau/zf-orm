<?php

/**
* 
*/
class Core_Plugin_Navigation extends Zend_Controller_Plugin_Abstract
{

	// Plugin appelé après le chargement des routes pour avoir les catégories en dropdown dans le menu
	public function routeShutdown(Zend_Controller_Request_Abstract $request)
	{	
		// On récupere les catégories
		$blogSvc = new Core_Service_Blog();
		$categories = $blogSvc->fetchCategories();
		
		// Cible le conteneur Zend_Navigation principal
		$nav = Zend_Registry::get('Zend_Navigation');
		// Cible le sous conteneur Categories (page)
		$categorieNav = $nav->findById('coreArticleCategories');

		foreach ($categories as $categorie) {
			// Créée la nouvelle page correspondant à l'article en cours
			$categoriePage = Zend_Navigation_Page::factory(
				array(
					'type' => 'mvc',
					'module' => 'Core',
					'controller' => 'article',
					'action' => 'categorieview',
					'params' => array('id' => $categorie->getId()),
					'route' => 'coreArticleCategorieview',
					'visible' => true,
					'label' => $categorie->getNom(),
					'class' => "test"
	 			)
			);
			// Injecte la nouvelle page dans le sous conteneur Articles 
			$categorieNav->addPage($categoriePage);
		}



	}

}