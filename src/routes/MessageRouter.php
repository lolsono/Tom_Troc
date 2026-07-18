<?php
declare(strict_types=1);
namespace App\src\routes;

class MessageRouter {

    public function router(array $getParams) {

        $MessageController = new \App\src\controllers\MessageController();

        if ($getParams['action'] === 'MessageHome') {

            $MessageController->showHome();

        } elseif ($getParams['action'] === 'Message') {

            if ($getParams['id'] >= 1) {

                $idInt = (int)$getParams['id'];
                $MessageController->showMessageId($idInt);
                
            } else {
                echo "Erreur 404 : la page que vous recherchez n'existe pas.";
            }
            
        } else {
            echo "Erreur 404 : la page que vous recherchez n'existe pas.";
        }

    }

}