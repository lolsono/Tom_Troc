<?php
declare(strict_types=1);

namespace controllers;

class HomeController {

    //view Homepage
    public function showHome () {
        $view = new \views\View("Home");
        $view->render("Home");
    }

    public function test ($string) : void {
        echo 'voici mon super text :', $string;
    }
}