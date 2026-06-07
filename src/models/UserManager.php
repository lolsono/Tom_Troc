<?php
declare(strict_types=1);

namespace App\src\models;

use password_hash;
use password_verify;
use DateTime;

class UserManager {

    //vérification des inputs

    /**
     * Vérifie si le mot de passe respecte les critères de sécurité.
     * @param string $password Le mot de passe en clair.
     * @return bool True si valide, false sinon.
     */
    public static function isPasswordValid(string $password): bool 
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
     * Vérifie si l'email respecte les critères.
     * @param string $email
     * @return bool True si valide, false sinon.
     */
    public static function isEmailValid(string $email): bool 
    {
        if (
            !isset($_POST['email'])
            || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
            || empty($_POST['email'])
            || trim($_POST['email'])
        ) {
            return false;
        }

        return true;
    }

    /**
     * Vérifie si le pseudo respecte les critères.
     * @param string $pseudo
     * @return bool True si valide, false sinon.
     */
    public static function isPseudoValid(string $pseudo): bool 
    {
        if (
            !isset($_POST['pseudo'])
            || iconv_strlen($_POST['pseudo']) < 1
            || empty($_POST['pseudo'])
            || trim($_POST['pseudo'])
        ) {
            return false;
        }

        return true;
    }

    /**
     * Fonction d'hachage du mdp
     * @param string $password ( input user form )
     * @return string $password hacher
     */
    public function hachage (string $password) : string
    {
       return password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * Fonction de vérification du mdp utilisateur
     * @param string $password
     * @param string $hachpassword
     * @return bool $mdpValidate return true if validate
     */
    public function passwordValidate (string $password, string $hachpassword) : bool
    {
       return password_verify($password, $hachpassword);
    }

    /**
     * Fonction d'ajout de l'utilisateur en db
     * @param string @data
     */
    public function createUser ($email, $password, $pseudo) : void
    {
        //transformation du mdp
        $passwordHach = $this->hachage($password);

        //ajout en db
        $db = \App\src\config\DBConnect::getInstance();
        $pdo = $db->getPDO();

        //gestion de la date
        $dateTime = new DateTime();

        $utils = new \App\src\utils\Utils;
        $date = $utils->convertDateToFrenchFormat($dateTime);

        //préparer la requête sql

        $sql = "INSERT INTO user(name, password, email, create_at, book_number) VALUES (:name, :password, :email, :create_at, :book_number)";

        // Préparation
        $insertRecipe = $pdo->prepare($sql);

        // Exécution !
        $insertRecipe->execute([
            'name' => $pseudo,
            'password' => $passwordHach,
            'email' => $email,
            'create_at' => $date,
            'book_number' => 0,
        ]);

    }
    
}