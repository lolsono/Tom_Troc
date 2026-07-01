<?php
declare(strict_types=1);

namespace App\src\models;

use DateTime;
use utils;

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
     * Setter id Book. 
     * @param int $id
     */
    public function setId(int $id) : self 
    {
        $this->id = $id; 
        return $this;
    }

    /**
     * Getter id Book
     * @return int
     */
    public function getId() : int 
    {
        return $this->id;
    }

    /**
     * Setter pour l'id de l'utilisateur. 
     * @param int $userId
     */
    public function setIdUser(int $userId) : self 
    {
        $this->userId = $userId; 
        return $this;
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
    public function setTitle(string $title) : self 
    {
        $this->title = $title;
        return $this;
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
    public function setNameAutor(string $nameAutor) : self 
    {
        $this->nameAutor = $nameAutor;
        return $this;
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
    public function setDesribe(string $describe) : self 
    {
        $this->describe = $describe;
        return $this;
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
    public function setAvailablity(int $availablity) : self 
    {
        $this->availablity = $availablity;
        return $this;
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
    public function setPictureLink(string $pictureLink) : self
    {
        $this->pictureLink = $pictureLink;
        return $this;
    }

    /**
     * Getter pour le lien de l'image
     * @return string $pictureLink
     */
    public function getPictureLink() : string
    {
        //$rootPath = dirname(__DIR__, 2);
        $link = 'public/' . $this->pictureLink;
        return $link;
    }
    
    /**
     * Setter de la date de création du compte
     * @param DateTime $createAt
     */
    public function setCreateAt (DateTime $createAt) : self
    {
        $date = utils::convertDateToFrenchFormat($createAt);
        $this->createAt = $date;
        return $this;
    }

    /**
     * Getter de la date de création du compt
     * @return string $creatAt
     */
    public function getCreateAt () : string
    {
        return $this->createAt;
    }

    
}