<div class="chat">

    <!-- Liste des conversations -->
    <aside class="sidebar" id="sidebar">

        <h2>Messagerie</h2>

        <?php foreach($conversations as $conversation) { ?>
            <div class="conversation" data-name=<?= $conversation->getNameUser2Id() ?>>
                <a class="info" href="index.php?type=Message&action=Message&id=<?= $conversation->getId() ?>">test</a>
                <img src="https://via.placeholder.com/50" alt="">
                <div>
                    <h3><?= $conversation->getNameUser2Id() ?></h3>
                    <p>Salut ! Ça va ?</p>
                </div>
                <span><?= $conversation->getCreateAt() ?></span>
            </div>
        <?php } ?>

    </aside>

    <!-- Conversation -->
    <main class="chat-window" id="chatWindow">

        <div class="buttonBack">
            <button id="backButton">← retour</button>
        </div>

        <!-- Système pour ferme la conv -->
        <div class="chat-header">
            <img src="https://via.placeholder.com/45" alt="">
            <h2 id="chatName"><?= $conversation->getNameUser2Id() ?></h2>

        </div>

        <div class="messages">

            <?php foreach ($messages as $message) { ?>

                <div class="message <?= $message->getSenderId() == $_SESSION['id'] ? 'sent' : 'received' ?>">
                    <?= htmlspecialchars($message->getMessage()) ?>
                </div>

            <?php } ?>

        </div>

        <!-- modif du form pour le rentre utilisable. -->
        <form class="chat-input">
            <input type="text" placeholder="Tapez votre message ici">
            <button>Envoyer</button>
        </form>

    </main>

</div>