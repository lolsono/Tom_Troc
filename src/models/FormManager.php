<?php
declare(strict_types=1);

namespace App\src\models;

class FormManager {

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
     *  tcheck input is not empty and > 1 caracter
     * @param string $string
     */
    public function isStringValid(string $string) : bool
    {
        if (
            strlen($string) < 1
            || trim($string) === ""
        ) {
            return false;
        } else {
            return true;
        }
           
    }

    //add a verified input file ( picture on format jpeg, png);
}