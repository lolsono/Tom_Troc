<?php
declare(strict_types=1);

namespace controllers;

class HomeController {

    //fonction pour afficher la string ( test avec helloworld )
    public function test ($string) : void {
        echo 'voici mon super text :', $string;
    }
}