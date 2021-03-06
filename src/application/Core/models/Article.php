<?php

/**
* 
*/
class Core_Model_Article implements Core_Model_Interface
{
	/**
	 * @var number
	 */
	private $id;

	/**
	 * @var string
	 */
	private $title;

	/**
	 * @var string
	 */
	private $content;
	
	/**
	 * [$categorie description]
	 * @var Core_Model_Categorie
	 */
	private $categorie;



	public function getId() {
		return $this->id;
	}

	/**
	 * @return the $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @return the $content
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * @param number $id
	 */
	public function setId($id) {
		$this->id = $id;
		return $this;
	}

	/**
	 * @param string $title
	 */
	public function setTitle($title) {
		$this->title = $title;
		return $this;
	}

	/**
	 * @param string $content
	 */
	public function setContent($content) {
		$this->content = $content;
		return $this;
	}

    /**
     * Gets the value of categorie.
     *
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Sets the value of categorie.
     *
     * @param mixed $categorie the categorie
     *
     * @return self
     */
    public function setCategorie(Core_Model_Categorie $categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
      * Sets the value of auteur.
      *
      * @param mixed $auteur the auteur
      *
      * @return self
      */
     public function setAuteur(Core_Model_Auteur $auteur)
     {
         $this->auteur = $auteur;

         return $this;
     }

     /**
      * Gets the value of auteur.
      *
      * @return mixed
      */
     public function getAuteur()
     {
         return $this->auteur;
     }


}