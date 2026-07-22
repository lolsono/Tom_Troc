<?php
declare(strict_types=1);
namespace App\src\routes;

class BookRouter {

    public function router(array $getParams) {

        $BookController = new \App\src\controllers\BookController();

        if ($getParams['action'] === 'addBook') {

            $BookController->showForm();
            
        } elseif($getParams['action'] === 'updateBook') {

            if ($getParams['id'] >= 1) {

                $idInt = (int)$getParams['id'];
                $BookController->showFormUpdate($idInt);
                
            } else {
                echo "Erreur 404 : la page que vous recherchez n'existe pas.";
            }

        } elseif ($getParams['action'] === 'allBook') {

            $BookController->showAllBook();
            
        } elseif ($getParams['action'] === 'BookValidate') {

            $BookController->formValidate();
           
        } elseif ($getParams['action'] === 'Details') {

            if ($getParams['id'] >= 1) {

                $idInt = (int)$getParams['id'];
                $BookController->showDetailsBook($idInt);
                
            } else {
                echo "Erreur 404 : la page que vous recherchez n'existe pas.";
            }

        } elseif ($getParams['action'] === 'Delete') {

            if ($getParams['id'] >= 1) {

                $idInt = (int)$getParams['id'];
                $BookController->deleteBook($idInt);
                
            } else {
                echo "Erreur 404 : la page que vous recherchez n'existe pas.";
            }
            
        } else {
            echo "Erreur 404 : la page que vous recherchez n'existe pas.";
        }

    }

}

