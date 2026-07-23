<?php
declare(strict_types=1);
namespace App\src\routes;

class UserRouter {

    public function router(array $getParams) {

        $UserController = new \App\src\controllers\UserController();

        if ($getParams['action'] === 'SingUp') {

            $UserController->showSignUp();

        } elseif ($getParams['action'] === 'SingUpValidate') {

            $UserController->SignUpValidate();
            $UserController->showSignUp();    
            
        }elseif ($getParams['action'] === 'SingIn') {

            $UserController->showSignIn();

        }elseif ($getParams['action'] === 'SingInValidate') {

            $UserController->SignInValidate();
            
        }elseif ($getParams['action'] === 'UserPage') {

            $UserController->showUserPage();
            
        }elseif ($getParams['action'] === 'LogOut') {

            $UserController->logOut();
            
        }elseif ($getParams['action'] === 'ModifUserValidate') {
            
            $UserController->ModifUserValidate();

        } else {
            echo "Erreur 404 : la page que vous recherchez n'existe pas.";
        }

    }

}

