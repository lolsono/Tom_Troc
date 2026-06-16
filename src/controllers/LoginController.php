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

            if ($UserManager->isPseudoValid($pseudo)) {

                if ($UserManager->isEmailValid($email)) {

                    if ($UserManager->isPasswordValid($password)) {

                        $_SESSION['error'] = "";
                        $UserManager->createUser($email, $password, $pseudo);

                    }else {
                        $_SESSION['error'] = "Mot de passe incorrect";
                        header("Location: /Tom_Troc/index.php?type=User&action=SingUp");                       
                    }

                } else {
                    $_SESSION['error'] = "Adresse email invalide";
                    header("Location: /Tom_Troc/index.php?type=User&action=SingUp");
                }

            } else {
                $_SESSION['error'] = "Pseudo invalide";
                header("Location: /Tom_Troc/index.php?type=User&action=SingUp");
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

            if ($UserManager->isEmailValid($email)) {

                if ($UserManager->passwordValidate($password, $email)) {
                    header("Location: /Tom_Troc/index.php?type=User&action=UserPage");
                    $_SESSION['error'] = "";
                } else {
                    $_SESSION['error'] = "Mot de passe incorrect";
                    header("Location: /Tom_Troc/index.php?type=User&action=SingIn");
                }
            } else {
                $_SESSION['error'] = "Adresse email invalide";
                header("Location: /Tom_Troc/index.php?type=User&action=SingIn");
            }

        } else {
            exit;
        }

    }

}