<?php
declare(strict_types=1);
namespace App\src\routes;

class BookRouter {

    public function router(array $getParams) {

        if ($getParams['action'] === 'post') {

            $HomeController = new \App\src\controllers\HomeController();
            $HomeController->showHome();

        } elseif ($getParams['action'] === 'addBook') {

            $BookController = new \App\src\controllers\BookController();
            $BookController->showForm();
            
        } else {
            echo "Erreur 404 : la page que vous recherchez n'existe pas.";
        }

    }

}

