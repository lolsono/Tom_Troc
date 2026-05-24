<?php
declare(strict_types=1);

namespace App\src\controllers;

class HomeController {

    //view Homepage
    public function showHome () {
        $view = new \App\views\View("Home");
        $view->render("Home");
    }

    public function test ($string) : void {
        echo 'voici mon super text :', $string;
    }
}