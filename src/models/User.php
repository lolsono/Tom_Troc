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
    private string $createAt = ""; 
    private int $book_number;

    /**
     * Setter id
     * @param int $id
     */
    public function setId (int $id) : self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Getter id
     * @return int $id
     */
    public function getId () : int
    {
        return $this->id;
    }

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
     * Setter the day of create user
     * @param DateTime $createAt
     */
    public function setCreateAt (string $createAt) : self
    {
        $this->createAt = $createAt;
        return $this;
    }

    /**
     * Getter the day of create user
     * @return string $creatAt
     */
    public function getCreateAt () : string
    {
        return $this->createAt;
    }

    /**
     * Setter user book number
     * @param int $book_number
     */
    public function setBookNumber (int $book_number) : self
    {
        $this->book_number = $book_number;
        return $this;
    }

    /**
     * Getter user book number
     * @return int $book_number
     */
    public function getBookNumber () : int
    {
        return $this->book_number;
    }

    /**
     * Setter path form directory upload
     * @param string $pictureLink
     */
    public function setPictureLink(string $pictureLink) : self
    {
        $this->pictureLink = $pictureLink;
        return $this;
    }

    /**
     * Getter link picture
     * @return string $pictureLink
     */
    public function getPictureLink() : string
    {
        $link = 'public/' . $this->pictureLink;
        return $link;
    }

}