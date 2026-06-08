<?php
declare(strict_types=1);

namespace App\src\models;

use password_hash;
use password_verify;
use DateTime;

class UserManager extends User {

    /**
     * tcheck input password
     * @param string $password input
     * @return bool True si valide, false sinon.
     */
    public function isPasswordValid(string $password): bool 
    {
        if (
            strlen($password) < 8
            || !preg_match('/[A-Z]/', $password)
            || !preg_match('/[a-z]/', $password)
            || !preg_match('/[^a-zA-Z0-9]/', $password)
        ) {
            return false;
        }

        return true;
    }

    /**
     * tcheck input email
     * @param string $email
     * @return bool True if validate
     */
    public function isEmailValid(string $email): bool 
    {
        if (
            !filter_var($email, FILTER_VALIDATE_EMAIL)
            || empty($email)
            || trim($email) === ""
        ) {
            return false;
        }

        return true;
    }

    /**
     * tcheck input pseudo
     * @param string $pseudo
     * @return bool True if validate.
     */
    public function isPseudoValid(string $pseudo): bool 
    {
        if (
            strlen($pseudo) < 2
            || trim($pseudo) === ""
        ) {
            return false;
        }

        return true;
    }

    /**
     * Search with email user
     * @param string $email
     */
    public function SearchEmailUser ($email) : array
    {
        //valider le pass en db
        $db = \App\src\config\DBConnect::getInstance();
        $pdo = $db->getPDO();

        $sql = "SELECT * FROM user WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $recipes = $stmt->fetchAll();
        
        return $recipes;  
    }

    /**
     * function validate password
     * @param string $password
     * @param string $hachpassword
     * @return bool $mdpValidate return true if validate
     */
    public function passwordValidate (string $password, string $email) : bool
    {
        $user = $this->SearchEmailUser($email);
        $user = $user[0];
        $hachpassword = $user["password"];
        var_dump($user);

        return password_verify($password, $hachpassword);
    }

    /**
     * Function hach password
     * @param string $password ( input user form )
     * @return string $password hach
     */
    public function hachage (string $password) : string
    {
       return password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * function add user in db
     * @param string @data
     */
    public function createUser ($email, $password, $pseudo) : void
    {
        $passwordHach = $this->hachage($password);

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