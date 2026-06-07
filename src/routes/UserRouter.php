<?php
declare(strict_types=1);
namespace App\src\routes;

class UserRouter {

    public function router(array $getParams) {

        if ($getParams['action'] === 'SingUp') {

            $LoginController = new \App\src\controllers\LoginController();
            $LoginController->showHome();

        } elseif ($getParams['action'] === 'SingUpValidate') {

            $LoginController = new \App\src\controllers\LoginController();
            $LoginController->SignUpValidate();
            $LoginController->showHome();    
            
        }else {
            echo "Erreur 404 : la page que vous recherchez n'existe pas.";
        }

    }

}

