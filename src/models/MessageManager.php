<?php
declare(strict_types=1);

namespace App\src\models;

use DateTime;

class MessageManager {

    //bien re enovyer un obket

    /**
     * Function find conversation by UserID
     * @param int $userId
     * @return array
     */
    public function searchConversationByUserId(int $userId): ?array
    {
        $db = \App\src\config\DBConnect::getInstance();
        $pdo = $db->getPDO();

        $sql = "SELECT conversation.*, user.name FROM conversation 
        INNER JOIN user ON conversation.user2_id = user.id 
        WHERE conversation.user1_id = :userId";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        $rows = $stmt->fetchAll();

        $conversations = [];

        foreach ($rows as $row) {
            $conversations[] = new \App\src\models\Conversation($row);
        }

        return $conversations;

    }

    /**
     * Function find message by conversation id
     * @param int $conversationId
     * @return array
     */
    public function searchConversationById(int $conversationId): array
    {
        $db = \App\src\config\DBConnect::getInstance();
        $pdo = $db->getPDO();

        $sql = "SELECT * FROM message
        WHERE conversation_id = :conversationId
        ORDER BY create_at ASC
        ";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':conversationId', $conversationId);
        $stmt->execute();

        $rows = $stmt->fetchAll();

        $messages = [];

        foreach ($rows as $row) {
            $messages[] = new \App\src\models\Message($row);
        }

        return $messages;
    }
    
}