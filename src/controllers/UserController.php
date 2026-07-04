<?php
declare(strict_types=1);
namespace App\src\controllers;

class UserController extends CoreController {

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

        if (!isset($_SESSION['id'])) {
            $this->pathModels("type=User&action=SingIn");
            exit;
        }

        $userManager = new \App\src\models\UserManager();
        $bookmanager = new \App\src\models\BookManager();
        $user = $userManager->getUserById($_SESSION['id']);

        //logique of date user
        $utils = new \App\src\utils\Utils;
        $dateUser = $utils->getTimeAgo($user->getCreateAt());

        //book user post
        $books = $bookmanager->getUserBook($_SESSION['id']);
        $numberBook = count($books);

        $this->view->render("UserPage", "UserPage", ['user' => $user, '$numberBook' =>  $numberBook, 'books' => $books, 'date' => $dateUser]);
    }

    /**
     * Log out
     */
    public function logOut () : void
    {
        session_destroy();
        $this->pathModels("type=User&action=SingIn");
    }

    /**
     * Manage form create user
     */
    public function SignUpValidate () : void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $ValidateInput = new \App\src\utils\ValidateInput;
            $UserManager = new \App\src\models\UserManager;

            $pseudo = $_POST['pseudo'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($ValidateInput->isPseudoValid($pseudo)) {

                if ($ValidateInput->isEmailValid($email)) {

                    if ($ValidateInput->isPasswordValid($password)) {

                        $_SESSION['error'] = "";
                        $UserManager->createUser($email, $password, $pseudo);
                        $this->pathModels("type=User&action=SingIn");

                    }else {
                        $_SESSION['error'] = "Mot de passe incorrect";
                        $this->pathModels("type=User&action=SingUp");                       
                    }

                } else {
                    $_SESSION['error'] = "Adresse email invalide";
                    $this->pathModels("type=User&action=SingUp");
                }

            } else {
                $_SESSION['error'] = "Pseudo invalide";
                $this->pathModels("type=User&action=SingUp");
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

            $ValidateInput = new \App\src\utils\ValidateInput;
            $UserManager = new \App\src\models\UserManager;
            $Password = new \App\src\utils\Password;

            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($ValidateInput->isEmailValid($email)) {

                $userData = $UserManager->SearchEmailUser($email);
                $hachpassword = $userData['password'];

                if ($Password->passwordValidate($password, $hachpassword)) {

                    $UserManager->createUserFromArray($userData);

                    $_SESSION['error'] = "";
                    $_SESSION['id'] = $userData['id'];
                    $this->pathModels("type=User&action=UserPage");   
                } else {
                    $_SESSION['error'] = "Mot de passe incorrect";
                    $_SESSION['isLoged'] = false;
                    $this->pathModels("type=User&action=SingIn");
                }
            } else {
                $_SESSION['isLoged'] = false;
                $_SESSION['error'] = "Adresse email invalide";
                $this->pathModels("type=User&action=SingIn");
            }

        } else {
            exit;
        }

    }

}