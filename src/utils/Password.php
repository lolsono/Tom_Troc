<?php

namespace App\src\utils;

use password_hash;
use password_verify;

class Password {

    /**
     * function validate password
     * @param string $password
     * @param string $hachpassword
     * @return bool $mdpValidate return true if validate
     */
    public function passwordValidate (string $password, string $hachpassword) : bool
    {
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

}