<?php
declare(strict_types=1);
session_start();
require_once __DIR__ . '/src/config/_config.php';
require_once 'src/config/Autoload.php';
spl_autoload_register('Autoload');

$getParams = $_GET;

try {

    //Managing redirection to the app's various routers

    if (isset($getParams['action']) && $getParams['action'] !== '') {

        //si le type et Book on envoie sur BookRouter
        if ($getParams['type'] === 'Book') {

            $BookRouter = new App\src\routes\BookRouter();
            $BookRouter->router($getParams);

        } elseif ($getParams['type'] === 'User') {

            $UserRouter = new App\src\routes\UserRouter();
            $UserRouter->router($getParams);
            
        }else {
            echo "Erreur 404 : la page que vous recherchez n'existe pas.";
        }

    } else {
        //redirect home page
        $HomeController = new App\src\controllers\HomeController();
        $HomeController->showHome();
    }

} catch (Exception $e) {
    // I capture the error and display it 
    $errorView = new App\views\View('Erreur');
    $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);
}