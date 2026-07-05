<?php
declare(strict_types=1);

namespace App\src\controllers;

class MessageController extends CoreController {

    //view home message
    public function showHome () {

        $this->view->render("Message", "Message");
    }

}