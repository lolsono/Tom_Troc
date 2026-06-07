<?php
declare(strict_types=1);

namespace App\src\controllers;

class HomeController extends CoreController {

    //view Homepage
    public function showHome () {

        $bookmanager = new \App\src\models\BookManager();
        $books = $bookmanager->getAllBook();

        $this->view->render("Home", "Home", ['books' => $books] );
    }

}