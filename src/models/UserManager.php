<?php
declare(strict_types=1);

namespace App\src\models;

use DateTime;

class UserManager extends User {

    /**
     * Search with email user
     * @param string $email
     */
    public function SearchEmailUser ($email) : array
    {
        $db = \App\src\config\DBConnect::getInstance();
        $pdo = $db->getPDO();

        $sql = "SELECT * FROM user WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $recipes = $stmt->fetch();
        
        return $recipes;  
    }

    /**
     * function get user by id
     * @param int $id
     */
    public function getUserById (int $id) : ?User
    {
        $db = \App\src\config\DBConnect::getInstance();
        $pdo = $db->getPDO();

        $sql = "SELECT * FROM user WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $recipes = $stmt->fetch();
        
        if (isset($recipes)) {
            return $this->createUserFromArray($recipes);
        } else {
            return null;
        }

    }

    /**
     * create objet user with array
     * @param array $user
     */
    public function createUserFromArray(array $userData) : User
    {

        $User = new \App\src\models\User;

        if (isset($userData['id'])) {
            $User->setId($userData['id']);
        }
        if (isset($userData['name'])) {
            $User->setName($userData['name']);
        }
        if (isset($userData['email'])) {
            $User->setEmail($userData['email']);
        }
        if (isset($userData['create_at'])) {
            $User->setCreateAt($userData['create_at']);
        }
        if (isset($userData['book_number'])) {
            $User->setBookNumber($userData['book_number']);
        }

        return $User;
    }

    /**
     * function add user in db
     * @param string @data
     */
    public function createUser ($email, $password, $pseudo) : void
    {
        $Password = new \App\src\utils\Password;
        $passwordHach = $Password->hachage($password);

        $db = \App\src\config\DBConnect::getInstance();
        $pdo = $db->getPDO();

        $dateTime = new DateTime();
        $utils = new \App\src\utils\Utils;
        $date = $utils->convertDateToFrenchFormat($dateTime);

        $sql = "INSERT INTO user(name, password, email, create_at, book_number) VALUES (:name, :password, :email, :create_at, :book_number)";
        $insertRecipe = $pdo->prepare($sql);

        $insertRecipe->execute([
            'name' => $pseudo,
            'password' => $passwordHach,
            'email' => $email,
            'create_at' => $date,
            'book_number' => 0,
        ]);

    }
    
}