<?php
declare(strict_types=1);
namespace App\src\routes;

class MessageRouter {

    public function router(array $getParams) {

        $MessageController = new \App\src\controllers\MessageController();

        if ($getParams['action'] === 'MessageHome') {

            $MessageController->showHome();

        } else {
            echo "Erreur 404 : la page que vous recherchez n'existe pas.";
        }

    }

}

