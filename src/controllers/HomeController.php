<?php
declare(strict_types=1);

namespace App\src\controllers;

class HomeController {

    //view Homepage
    public function showHome () {

        $bookmanager = new \App\src\models\BookManager();
        $books = $bookmanager->getAllBook();

        $view = new \App\views\View("Home");
        $view->render("Home", ['books' => $books] );
    }

}