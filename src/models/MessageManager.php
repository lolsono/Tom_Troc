<?php
declare(strict_types=1);

namespace App\src\models;

class MessageManager {

    /**
     * Function find all conversation by userID
     * @param int $userId
     * @return array
     */
    public function searchConversationByUserId(int $userId): ?array
    {
        $db = \App\src\config\DBConnect::getInstance();
        $pdo = $db->getPDO();

        /** conversation and user */
        $sql = "SELECT 
        conversation.id,
        conversation.user1_id,
        conversation.user2_id, 
        user.name, 
        message.content AS last_message, 
        message.create_at AS create_at FROM conversation
        INNER JOIN user ON user.id =
        CASE
            WHEN conversation.user1_id = :userId
                THEN conversation.user2_id
            ELSE conversation.user1_id
        END

        /** Last message */
        LEFT JOIN message
        ON message.id = (
            SELECT m.id FROM message m
            WHERE m.conversation_id = conversation.id
            AND m.sender_id <> :userId
            ORDER BY m.create_at DESC
            LIMIT 1
        )

        WHERE conversation.user1_id = :userId OR conversation.user2_id = :userId;";

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
     * Function find conversation details by convId
     * @param int $convId
     * @param int $myIdUserConnect
     * @return array
     */
    public function searchConversationByConvId(int $convId, int $myIdUserConnect): ?array
    {
        $db = \App\src\config\DBConnect::getInstance();
        $pdo = $db->getPDO();

        $sql = "SELECT conversation.*, user.name AS other_user_name FROM conversation
                INNER JOIN user
                    ON (
                        (conversation.user1_id = :userId AND user.id = conversation.user2_id)
                        OR
                        (conversation.user2_id = :userId AND user.id = conversation.user1_id)
                    )
                WHERE conversation.id = :convId";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            'convId' => $convId,
            'userId' => $myIdUserConnect,
        ]);

        return $stmt->fetch();
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

    /**
     * Create message
     * @param array $messageInput
     * @return void
     */
    public function createMessage(array $messageInput) : void
    {
        $db = \App\src\config\DBConnect::getInstance();
        $pdo = $db->getPDO();

        $sql = "INSERT INTO message(id, sender_id, conversation_id, content, create_at) VALUES (:id, :sender_id, :conversation_id, :content, :create_at)";
        $insertRecipe = $pdo->prepare($sql);

        $insertRecipe->execute([
            'id' => null,
            'sender_id' => $messageInput['sender_id'],
            'conversation_id' => $messageInput['conversation_id'],
            'content' => $messageInput['content'],
            'create_at' => $messageInput['create_at'],
        ]);
    }
    
}