<?php
declare(strict_types=1);
namespace App\src\routes;

class BookRouter {

    public function router(array $getParams) {

        $BookController = new \App\src\controllers\BookController();

        if ($getParams['action'] === 'addBook') {

            $BookController->showForm();
            
        } elseif ($getParams['action'] === 'allBook') {

            $BookController->showAllBook();
            
        } elseif ($getParams['action'] === 'BookValidate') {

            $BookController->formValidate();
           
        } else {
             echo "Erreur 404 : la page que vous recherchez n'existe pas.";
        }

    }

}

