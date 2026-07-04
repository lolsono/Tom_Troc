<?php
declare(strict_types=1);

namespace App\src\models;

use DateTime;

class BookManager {

    /**
     * methode search all book on db
     */
    public function getAllBook() : array 
    {
        $db = \App\src\config\DBConnect::getInstance();
        $pdo = $db->getPDO();

        $sql = "SELECT * FROM book";
        $result = $pdo->query($sql);
        $book = [];

        while ($row = $result->fetch()) {
            $book[] = new \App\src\models\Book($row);
        }
        return $book;
    }

    /**
     * methode search book by ID
     * @param int $bookId
     * @return object $Book
     */
    public function getBookId(int $bookId) : ?Book 
    {
        $db = \App\src\config\DBConnect::getInstance();
        $pdo = $db->getPDO();

        $sql = "SELECT * FROM book WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $bookId);
        $stmt->execute();
        $row = $stmt->fetch();

        if (isset($row)) {
            return new \App\src\models\Book($row);
        }

        return null;
    }

    /**
     * methode search book by user ID
     * @param int $bookId
     * @return object $Book
     */
    public function getUserBook(int $userId) : array
    {
        $db = \App\src\config\DBConnect::getInstance();
        $pdo = $db->getPDO();

        $sql = "SELECT * FROM book WHERE user_id = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        $row = $stmt->fetch();
        $book = [];

        while ($row = $stmt->fetch()) {
            $book[] = new \App\src\models\Book($row);
        }
        return $book;
    }

    /**
     * add book on db
     * @param array $bookInput all input form book
     * @return void
     */
    public function createBook(array $bookInput) : void
    {
        $db = \App\src\config\DBConnect::getInstance();
        $pdo = $db->getPDO();

        $dateTime = new DateTime();
        $utils = new \App\src\utils\Utils;
        $date = $utils->convertDateToFrenchFormat($dateTime);

        $sql = "INSERT INTO book(id, user_id, title, name_autor, book_describ, availability, picture, createAt) VALUES (:id, :user_id, :title, :name_autor, :book_describ, :availability, :picture, :createAt)";
        $insertRecipe = $pdo->prepare($sql);

        $insertRecipe->execute([
            'id' => null,
            'user_id' => $bookInput['user_id'],
            'title' => $bookInput['title'],
            'name_autor' => $bookInput['autor'],
            'book_describ' =>  $bookInput['comment'],
            'availability' => $bookInput['availability'],
            'picture' => $bookInput['fileName'],
            'createAt' => $date,
        ]);
    }

    /**
     * Tcheck name of picture no existe on db
     * @param string $namePicture
     * @return bool name picture no existe on db
    */
    public function searchNamePicture(string $namePicture) : bool 
    {
        $db = \App\src\config\DBConnect::getInstance();
        $pdo = $db->getPDO();

        $sql = "SELECT COUNT(*) FROM book WHERE pictures = :searchTerm";
        $result = $pdo->query($sql);

        $searchTerm = "upload/" . $namePicture;
        $result->bindParam(':searchTerm', $searchTerm);

        $result->execute();
        $count = $result->fetchColumn();

        return $count === 0;
    }
}