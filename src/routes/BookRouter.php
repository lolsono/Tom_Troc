<?php
declare(strict_types=1);
namespace App\src\routes;

class BookRouter {

    public function router(array $getParams) {

        if ($getParams['action'] === 'post') {

            //action si on a le post qui sera plutard la partie 
            //création du book
            $HomeController = new App\src\controllers\HomeController();
            $HomeController->showHome();

        } else {
            echo "Erreur 404 : la page que vous recherchez n'existe pas.";
        }

    }

}

