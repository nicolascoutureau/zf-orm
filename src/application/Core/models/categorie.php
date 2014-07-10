<?php

/**
* 
*/
class Core_Model_Categorie
{
	/**
	 * @var number
	 */
	private $id;

	/**
	 * @var string
	 */
	private $nom;

	private $articles = array();


    /**
     * Gets the value of id.
     *
     * @return number
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param number $id the id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of nom.
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Sets the value of nom.
     *
     * @param string $nom the nom
     *
     * @return self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Gets the value of articles.
     *
     * @return mixed
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * Sets the value of articles.
     *
     * @param mixed $articles the articles
     *
     * @return self
     */
    public function setArticles(Array $articles)
    {
        $this->articles = $articles;
        return $this;
    }

    public function addArticle(Core_Model_Article $article)
    {
        $this->articles[] = $article;
        return $this;
    }

}