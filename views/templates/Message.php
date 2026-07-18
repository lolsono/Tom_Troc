<div class="chat <?= isset($conversationId) ? 'open' : '' ?>">

    <!-- Liste des conversations -->
    <aside class="sidebar" id="sidebar">

        <h2>Messagerie</h2>

        <?php foreach ($conversations as $conversation) { ?>

            <a class="conversation"
               href="index.php?type=Message&action=Message&id=<?= $conversation->getId() ?>"
               data-name="<?= htmlspecialchars($conversation->getNameUser2Id()) ?>">

                <img src="public/img/user_no_picutre.png" alt="image de l'utilisateur">

                <div>
                    <h3><?= htmlspecialchars($conversation->getNameUser2Id()) ?></h3>
                    <p><?= htmlspecialchars($conversation->getLastMessage()) ?></p>
                </div>

                <span><?= htmlspecialchars($conversation->getCreateAtFormatted()) ?></span>

            </a>

        <?php } ?>

    </aside>

    <!-- Conversation -->
    <main class="chat-window">

        <?php if (isset($messages)) { ?>

            <div class="buttonBack">
                <a id="backButton" href="index.php?type=Message&action=MessageHome">
                    ← Retour
                </a>
            </div>

            <div class="chat-header">
                <img src="public/img/user_no_picutre.png" alt="image de l'utilisateur">
                <h2><?= htmlspecialchars($nameUser) ?></h2>
            </div>

            <div class="messages">

                <?php foreach ($messages as $message) { ?>

                    <div class="message <?= $message->getSenderId() == $_SESSION['id'] ? 'sent' : 'received' ?>">

                        <div class="received-user">
                            <img src="public/img/user_no_picutre.png" alt="image de l'utilisateur">
                            <p><?= htmlspecialchars($message->getCreateAtFormatMessage()) ?></p>
                        </div>

                        <div class="box-message">
                            <?= htmlspecialchars($message->getMessage()) ?>
                        </div>

                    </div>

                <?php } ?>

            </div>

            <form action="index.php?type=Message&action=MessageSend&id=<?= $conversationId ?>" method="POST" class="chat-input">

                <input
                    type="text"
                    id="message"
                    name="message"
                    placeholder="Tapez votre message..."
                    required
                >

                <button type="submit">Envoyer</button>

            </form>

        <?php } ?>

    </main>

</div>