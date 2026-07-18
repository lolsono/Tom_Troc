<?php
declare(strict_types=1);

namespace App\src\models;

use DateTime;

class Conversation {

    private int $id;
    private int $idUser1;
    private int $idUser2;
    private string $NameUser2Id = "";
    private string $createAt = ""; 


    /**
     * Constrcuteur de l'objet book
     * @param array $fetch
     */
    public function __construct($array)
    {
        $this->id = $array['id'];
        $this->idUser1 = $array['user1_id'];
        $this->idUser2 = $array['user2_id'];
        $this->NameUser2Id = $array['name'];
        $this->createAt = $array['create_at'];

    }

    /**
     * Setter id Message. 
     * @param int $id
     */
    public function setId(int $id) : self 
    {
        $this->id = $id; 
        return $this;
    }

    /**
     * Getter id Message
     * @return int
     */
    public function getId() : int 
    {
        return $this->id;
    }

    /**
     * Setter sender id Message. 
     * @param int $id
     */
    public function setUser1Id(int $id) : self 
    {
        $this->idUser1 = $id; 
        return $this;
    }

    /**
     * Getter sender id Message
     * @return int
     */
    public function getUser1Id() : int 
    {
        return $this->idUser1;
    }

    /**
     * Setter tchat id Message. 
     * @param string $name
     */
    public function setNameUser2Id(string $name) : self 
    {
        $this->NameUser2Id = $name; 
        return $this;
    }

    /**
     * Getter tchat id Message
     * @return string
     */
    public function getNameUser2Id() : string 
    {
        return $this->NameUser2Id;
    }

    /**
     * Setter tchat name id user 2 Message. 
     * @param int $id
     */
    public function setUser2Id(int $id) : self 
    {
        $this->idUser2 = $id; 
        return $this;
    }

    /**
     * Getter tchat name id user 2 Message.
     * @return int
     */
    public function getUser2Id() : int 
    {
        return $this->idUser2;
    }


    /**
     * Setter de la date de création du compte
     * @param DateTime $createAt
     */
    public function setCreateAt (string $date) : self
    {
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