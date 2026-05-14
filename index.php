<?php

declare(strict_types=1);
require_once 'src/config/Autoload.php';
spl_autoload_register('Autoload');

$getParams = $_GET;

//premier routeur
if (isset($getParams['action']) && $getParams['action'] !== '') {

    //si le type et Book on envoie sur BookRouter
    if ($getParams['type'] === 'Book') {

        //action si on a le post qui sera plutard la partie 
        //création du book
        $BookRouter = new routes\BookRouter();
        $BookRouter->router($getParams);

    } else {
        echo "Erreur 404 : la page que vous recherchez n'existe pas.";
    }

} else {
    //rediriger sur l'acceuil
    echo "page d'acceuil";
}