<?php
declare(strict_types=1);
namespace App\src\routes;

class UserRouter {

    public function router(array $getParams) {

        if ($getParams['action'] === 'SingUp') {

            $LoginController = new \App\src\controllers\LoginController();
            $LoginController->showSignUp();

        } elseif ($getParams['action'] === 'SingUpValidate') {

            $LoginController = new \App\src\controllers\LoginController();
            $LoginController->SignUpValidate();
            $LoginController->showSignUp();    
            
        }elseif ($getParams['action'] === 'SingIn') {

            $LoginController = new \App\src\controllers\LoginController();
            $LoginController->showSignIn();

        }elseif ($getParams['action'] === 'SingInValidate') {

            $LoginController = new \App\src\controllers\LoginController();
            $LoginController->SignInValidate();
            
        }elseif ($getParams['action'] === 'UserPage') {

            $LoginController = new \App\src\controllers\LoginController();
            $LoginController->showUserPage();
            
        }else {
            echo "Erreur 404 : la page que vous recherchez n'existe pas.";
        }

    }

}

