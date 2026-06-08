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
     * User Page after connexion
     */
    public function showUserPage () : void
    {
        $this->view->render("UserPage", "UserPage");
    }

    /**
     * Manage form create user
     */
    public function SignUpValidate () : void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $UserManager = new \App\src\models\UserManager;

            $pseudo = $_POST['pseudo'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (
                $UserManager->isPasswordValid($password)
                && $UserManager->isEmailValid($email)
                && $UserManager->isPseudoValid($pseudo)
            ) {
                $UserManager->createUser($email, $password, $pseudo);
            }else {
                echo "il y a une erreure dans les identifiants";
            }

        } else {
            exit;
        }
    }

    /**
     * Manage form log in
     */
    public function SignInValidate () : void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $UserManager = new \App\src\models\UserManager;

        $email = $_POST['email'];
        $password = $_POST['password'];

        if (
            $UserManager->passwordValidate($password, $email)
            && $UserManager->isEmailValid($email)
        ) {
            //ajout d'une variable de connexion;
            echo "mot de pass ok user connecter";
            header("Location: /Tom_Troc/index.php?type=User&action=UserPage");
        }else {
            echo "il y a une erreure dans les identifiants";
        }

    } else {
        exit;
    }

    }

}