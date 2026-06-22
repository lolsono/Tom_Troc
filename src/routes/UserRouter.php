<?php
declare(strict_types=1);
namespace App\src\routes;

class UserRouter {

    public function router(array $getParams) {

        $LoginController = new \App\src\controllers\LoginController();

        if ($getParams['action'] === 'SingUp') {

            $LoginController->showSignUp();

        } elseif ($getParams['action'] === 'SingUpValidate') {

            $LoginController->SignUpValidate();
            $LoginController->showSignUp();    
            
        }elseif ($getParams['action'] === 'SingIn') {

            $LoginController->showSignIn();

        }elseif ($getParams['action'] === 'SingInValidate') {

            $LoginController->SignInValidate();
            
        }elseif ($getParams['action'] === 'UserPage') {

            $LoginController->showUserPage();
            
        }elseif ($getParams['action'] === 'LogOut') {

            $LoginController->logOut();
            
        }else {
            echo "Erreur 404 : la page que vous recherchez n'existe pas.";
        }

    }

}

