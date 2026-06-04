<?php
declare(strict_types=1);

namespace App\src\models;

class BookManager {

//gestion de la com ver la base de donnée

    //ajout du système de recherche de toute les book
    public function getAllBook() : array 
    {
        $db = \App\src\config\DBConnect::getInstance();
        $pdo = $db->getPDO();

        $sql = "SELECT * FROM book";
        $result = $pdo->query($sql);
        $book = [];

        //voir pour supprimer car c'est pour 
        //un tableau d'objet book
        while ($row = $result->fetch()) {
            $book[] = new \App\src\models\Book($row);
        }
        return $book;
    }

    //recherche de book par id utilisateur
    
}