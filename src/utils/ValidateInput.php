<?php
declare(strict_types=1);

namespace App\src\utils;

class ValidateInput {

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
            strlen($string) < 2
            || trim($string) === ""
        ) {
            return false;
        }

        return true;   
    }

    /**
     * tcheck input availability
     * @param string $availability select value
     * @return bool True is validate.
     */
    public function isAvailabilityValid(string $availability): bool
    {
    
        if (
            !isset($availability)
            || trim($availability) === ""
            || !in_array($availability, ["disponible", "non_disponible"])
        ) {
            return false;
        }

        return true;
    }
}