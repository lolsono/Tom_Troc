<?php
declare(strict_types=1);

namespace App\src\controllers;

use DateTime;

class MessageController extends CoreController
{
    /**
     * view all conversation
     */
    public function showHome()
    {
        $MessageManager = new \App\src\models\MessageManager();

        $conv = $MessageManager->searchConversationByUserId($_SESSION['id']);

        $this->view->render("Message", "Message", [
            'conversations' => $conv
        ]);
    }

    /**
     * view conversation
     */
    public function showMessageId(int $conversationId)
    {
        $MessageManager = new \App\src\models\MessageManager();

        $conv = $MessageManager->searchConversationByUserId($_SESSION['id']);
        $messages = $MessageManager->searchConversationById($conversationId);
        $myIdUserConnect = $_SESSION['id'];
        $nameUser = $MessageManager->searchConversationByConvId($conversationId, $myIdUserConnect);

        $this->view->render("Message", "Message", [
            'conversations' => $conv,
            'messages' => $messages,
            'conversationId' => $conversationId,
            'nameUser' => $nameUser['other_user_name']
        ]);
    }

    /**
     * send message
     */
    public function createMessage(int $conversationId)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?type=Message&action=Message&id=" . $conversationId);
            exit;
        }

        $ValidateInput = new \App\src\utils\ValidateInput();
        $MessageManager = new \App\src\models\MessageManager();

        $message = $_POST['message'];

        if ($ValidateInput->isStringValid($message)) {

            $dateTime = new DateTime();
            $utils = new \App\src\utils\Utils();

            $messageInput = [
                'id' => null,
                'sender_id' => $_SESSION['id'],
                'conversation_id' => $conversationId,
                'content' => $message,
                'create_at' => $utils->convertDateToFrenchFormat($dateTime),
            ];

            $MessageManager->createMessage($messageInput);

            header("Location: index.php?type=Message&action=Message&id=" . $conversationId);
            exit;
        }

        header("Location: index.php?type=Message&action=Message&id=" . $conversationId);
        exit;
    }
}