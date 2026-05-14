<?php
declare(strict_types=1);

namespace controllers;

class HomeController {

    //première chose à afficher la page principal
    public function showHome () {
        $view = new \views\View("Home");
        $view->render("Home");
    }

    //fonction pour afficher la string ( test avec helloworld )
    public function test ($string) : void {
        echo 'voici mon super text :', $string;
    }
}