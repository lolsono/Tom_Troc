<?php
declare(strict_types=1);

namespace App\src\models;

use DateTime;

class Book {

//tous les type de données

    private int $id;
    private int $userId;
    private string $title = "";
    private string $nameAutor = "";
    private string $describe = "";
    private int $availablity;
    private string $pictureLink = "";
    private string $createAt = ""; 

    /**
     * Constrcuteur de l'objet book
     * @param array $fetch
     */
    public function __construct($array)
    {
        $this->id = $array['id'];
        $this->userId = $array['user_id'];
        $this->title = $array['title'];
        $this->nameAutor = $array['name_autor'];
        $this->describe = $array['book_describ'];
        $this->availablity = $array['availability'];
        $this->pictureLink = $array['picture'];
        $this->createAt = $array['createAt'];
    }

    /**
     * Setter pour l'id de l'utilisateur. 
     * @param int $userId
     */
    public function setIdUser(int $userId) : void 
    {
        $this->userId = $userId;
    }

    /**
     * Getter pour l'id de l'utilisateur.
     * @return int
     */
    public function getIdUser() : int 
    {
        return $this->userId;
    }

     /**
     * Setter pour le titre.
     * @param string $title
     */
    public function setTitle(string $title) : void 
    {
        $this->title = $title;
    }

    /**
     * Getter pour le titre.
     * @return string
     */
    public function getTitle() : string 
    {
        return $this->title;
    }

    /**
     * Setter pour le nom de l'auteur.
     * @param string $nameAutor
     */
    public function setNameAutor(string $nameAutor) : void 
    {
        $this->nameAutor = $nameAutor;
    }

    /**
     * Getter pour le nom de l'auteur.
     * @return string $nameAutor
     */
    public function getNameAutor() : string 
    {
        return $this->nameAutor;
    }

    /**
     * Setter pour la description.
     * @param string $describe
     */
    public function setDesribe(string $describe) : void 
    {
        $this->describe = $describe;
    }

     /**
     * Setter pour la description.
     * @return string $describe
     */
    public function getDescribe() : string 
    {
        return $this->describe;
    }
    
    /**
     * Setter pour la disponibilité
     * @param int $availablity
     */
    public function setAvailablity(int $availablity) : void 
    {
        $this->availablity = $availablity;
    }

    /**
     * Getter pour la disponibilité
     * @return int $availablity
     */
    public function getAvailablity() : int 
    {
        return $this->availablity;
    }

    /**
     * Setter pour le lien de l'image ( ver fichier upload )
     * @param string $pictureLink
     */
    public function setPictureLink(string $pictureLink) : void
    {
        $this->pictureLink = $pictureLink;
    }

    /**
     * Getter pour le lien de l'image
     * @return string $pictureLink
     */
    public function getPictureLink() : string
    {
        return $this->pictureLink;
    }
    
    /** Setter pour la date de publication du book
     * @param DateTime
     */
    public function setCreateAt($DateTime) : void
    {
        $this->createAt = $DateTime;
    }

    /** Getter pour la date de publication du book
     * @return string
     */
    public function getCreateAt() : string
    {
        return $this->createAt;
    }

    
}