<?php
declare(strict_types=1);
namespace App\src\controllers;

class LoginController extends CoreController {

    public function showSignUp () {

        $this->view->render("SignUp", "SignUp");
    }

    public function showSignIn () {

        $this->view->render("SignIn", "SignIn");
    }

    /**
     * Manage form create user
     */
    public function SignUpValidate () : void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $UserManager = new \App\src\models\UserManager;

            // 2. Récupérer les données de $_POST
            $pseudo = $_POST['pseudo'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (
                $UserManager->isPasswordValid($password)
                && $UserManager->isEmailValid($email)
                && $UserManager->isPseudoValid($pseudo)
            ) {
                //$UserManager->createUser($email, $password, $pseudo);
                echo "tout a bien marché";
            }else {
                echo "il y a une erreure dans les identifiant";
            }

        } else {
            exit;
        }
    }

}