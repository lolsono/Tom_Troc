<?php
declare(strict_types=1);

namespace App\src\models;

use DateTime;

class Message {

    private int $id;
    private int $idSender;
    private int $idTchat;
    private string $content;
    private string $createAt = ""; 


    /**
     * Constrcuteur de l'objet book
     * @param array $fetch
     */
    public function __construct($array)
    {
        $this->id = $array['id'];
        $this->idSender = $array['sender_id'];
        $this->idTchat = $array['conversation_id'];
        $this->content = $array['content'];
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
        return $this->idSender;
    }

    /**
     * Setter sender id Message. 
     * @param int $id
     */
    public function setSenderId(int $id) : self 
    {
        $this->idSender = $id; 
        return $this;
    }

    /**
     * Getter sender id Message
     * @return int
     */
    public function getSenderId() : int 
    {
        return $this->idSender;
    }

    /**
     * Setter tchat id Message. 
     * @param int $id
     */
    public function setTchatId(int $id) : self 
    {
        $this->idTchat = $id; 
        return $this;
    }

    /**
     * Getter tchat id Message
     * @return int
     */
    public function getTchatId() : int 
    {
        return $this->idTchat;
    }

    /**
     * Setter content Message. 
     * @param string $Messgae
     */
    public function setMessage(string $content) : self 
    {
        $this->content = $content; 
        return $this;
    }

    /**
     * Getter content Message
     * @return string $Message
     */
    public function getMessage() : string 
    {
        return $this->content;
    }

    /**
     * Setter create date
     * @param DateTime $createAt
     */
    public function setCreateAt (string $date) : self
    {
        $this->createAt = $date;
        return $this;
    }

    /**
     * Getter create date
     * @return string
     */
    public function getCreateAt(): string
    {
        return $this->createAt;
    }

    /**
     * Getter date format message for user
     * @return string $createAt
     */
    public function getCreateAtFormatMessage(): string
    {
        $utils = new \App\src\utils\Utils;
        $this->createAt = $utils->getFormatMessageDate($this->createAt);
        return $this->createAt;
    }

}