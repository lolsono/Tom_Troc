<?php
declare(strict_types=1);

namespace App\src\controllers;

class MessageController extends CoreController {

    //view home message
    public function showHome () {

        //envoyer le tableau d'objet

        $MessageManager = new \App\src\models\MessageManager();
        $conv = $MessageManager->searchConversationByUserId($_SESSION['id']);

        $this->view->render("Message", "Message", ['conversations' => $conv]);
    }

    //aucun message selectionner

    // envoie de message
    public function showMessageId (int $conversationId) {

        $MessageManager = new \App\src\models\MessageManager();
        $conv = $MessageManager->searchConversationByUserId($_SESSION['id']);
        $messages = $MessageManager->searchConversationById($conversationId);

        $this->view->render("Message", "Message", ['conversations' => $conv, 'messages' => $messages]);
    }



}