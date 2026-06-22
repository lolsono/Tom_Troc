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
     * Log out
     */
    public function logOut () : void
    {
        session_destroy();
        header("Location: /Tom_Troc/index.php?type=User&action=SingIn");

        //suppresion de l'utilisateur
    }

    /**
     * Manage form create user
     */
    public function SignUpValidate () : void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $FormManager = new \App\src\models\FormManager;
            $UserManager = new \App\src\models\UserManager;

            $pseudo = $_POST['pseudo'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($FormManager->isPseudoValid($pseudo)) {

                if ($FormManager->isEmailValid($email)) {

                    if ($FormManager->isPasswordValid($password)) {

                        $_SESSION['error'] = "";
                        $UserManager->createUser($email, $password, $pseudo);
                        header("Location: /Tom_Troc/index.php?type=User&action=SignIn"); 

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

            $FormManager = new \App\src\models\FormManager;
            $UserManager = new \App\src\models\UserManager;
            $Password = new \App\src\utils\Password;

            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($FormManager->isEmailValid($email)) {

                //si mon mail et ok alors on fait la recherche utilisateur
                $userData = $UserManager->SearchEmailUser($email);
                $hachpassword = $userData['password'];

                if ($Password->passwordValidate($password, $hachpassword)) {

                    //va déclencher la création de l'utilisateur

                    $_SESSION['error'] = "";
                    $_SESSION['id'] = $userData['id'];
                    header("Location: /Tom_Troc/index.php?type=User&action=UserPage");  
                } else {
                    $_SESSION['error'] = "Mot de passe incorrect";
                    $_SESSION['isLoged'] = false;
                    header("Location: /Tom_Troc/index.php?type=User&action=SingIn");
                }
            } else {
                $_SESSION['isLoged'] = false;
                $_SESSION['error'] = "Adresse email invalide";
                header("Location: /Tom_Troc/index.php?type=User&action=SingIn");
            }

        } else {
            exit;
        }

    }

}