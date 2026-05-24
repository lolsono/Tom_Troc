<?php

declare(strict_types=1);
require_once 'src/config/Autoload.php';
spl_autoload_register('Autoload');
use App\views\View;

$getParams = $_GET;

try {

    if (isset($getParams['action']) && $getParams['action'] !== '') {

        //si le type et Book on envoie sur BookRouter
        if ($getParams['type'] === 'Book') {

            //action si on a le post qui sera plutard la partie 
            //création du book
            $BookRouter = new App\src\routes\BookRouter();
            $BookRouter->router($getParams);

        } else {
            echo "Erreur 404 : la page que vous recherchez n'existe pas.";
        }

    } else {
        //rediriger sur l'acceuil
        $HomeController = new App\src\controllers\HomeController();
        $HomeController->showHome();
    }

} catch (Exception $e) {
    // En cas d'erreur, on affiche la page d'erreur.
    $errorView = new App\views\View('Erreur');
    $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);
}