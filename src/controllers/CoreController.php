<?php
declare(strict_types=1);
namespace App\src\controllers;

class CoreController {

    protected $view;

    public function __construct()
    {
        $this->view = new \App\views\View();
    }

}