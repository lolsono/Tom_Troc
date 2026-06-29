<?php
declare(strict_types=1);
namespace App\src\controllers;

class CoreController {

    protected $view;

    public function __construct()
    {
        $this->view = new \App\views\View();
    }

    /**
     * Generated url path
     */
    public function pathModels (string $path) : void
    {
        header("Location: /Tom_Troc/index.php?$path");
        exit;
    }

}