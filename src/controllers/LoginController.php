<?php
declare(strict_types=1);
namespace App\src\controllers;

class LoginController extends CoreController {

    public function showHome () {

        $this->view->render("SignUp", "SignUp");
    }

    /**
     * Gestion de la partie formulaire du SignUp
     */
    public function SignUpValidate () : void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $UserManager = new \App\src\models\UserManager;

            // 2. Récupérer les données de $_POST
            $pseudo = $_POST['pseudo'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if (
                !$UserManager->isPasswordValid($password)
                || !$UserManager->isEmailValid($email)
                || !$UserManager->isPseudoValid($pseudo)
            ) {
                //ajout de l'utilisateur
                //fonction d'ajout utilisateur;
                $UserManager->createUser($email, $password, $pseudo);
            }

        } else {
            exit;
        }
    }

}