<?php 
declare(strict_types=1);

namespace App\src\models;

use DateTime;
use utils;

Class User {

    private int $id;
    private string $name;
    private string $password = "";
    private string $email = "";
    private string $describe = "";
    private string $createAt = ""; 
    private int $book_number;

    //ajout système encryptage pour mdp.
    //on hash a la reception du formulaire de connexion
    //on hash à l'envoi à la db et ensuite on compare les deux

    /**
     * Setter name
     * @param string $name
     */
    public function setName (string $name) : self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Getter name
     * @return string $name
     */
    public function getName () : string 
    {
        return $this->name;
    }

    /**
     * Setter password
     * @param string $password
     */
    public function setPassword (string $password) : self
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Getter password
     * @return string $password
     */
    public function getPassword () : string
    {
        return $this->password;
    }

    /**
     * Setter email
     * @param string $email
     */
    public function setEmail (string $email) : self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Getter email
     * @return string $email
     */
    public function getEmail () : string
    {
        return $this->email;
    }

    /**
     * Setter describe
     * @param string $describe
     */
    public function setDescribe (string $describe) : self
    {
        $this->describe = $describe;
        return $this;
    }

    /**
     * Getter describe
     * @return string $desribe
     */
    public function getDescribe () : string
    {
        return $this->describe;
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

    /**
     * Setter nombre de livre de l'utilisateur
     * @param int $book_number
     */
    public function setBookNumber (int $book_number) : self
    {
        $this->book_number = $book_number;
        return $this;
    }

    /**
     * Getter nombre de livre de l'utilisateur
     * @return int $book_number
     */
    public function getBookNumber () : int
    {
        return $this->book_number;
    }

}