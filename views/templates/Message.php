<div class="chat">

    <!-- Liste des conversations -->
    <aside class="sidebar" id="sidebar">

        <!-- boucle pour l'affichage de tout les conversation -->

        <!-- modifier les lien pour permettre -->
        <div class="conversation active" data-name="Thomas">
            <img src="https://via.placeholder.com/50" alt="">
            <div>
                <h3>Thomas</h3>
                <p>Salut ! Ça va ?</p>
            </div>
            <span>14:30</span>
        </div>

        <div class="conversation" data-name="Emma">
            <img src="https://via.placeholder.com/50" alt="">
            <div>
                <h3>Emma</h3>
                <p>À demain 😊</p>
            </div>
            <span>12:10</span>
        </div>

        <div class="conversation"data-name="Lucas">
            <img src="https://via.placeholder.com/50" alt="">
            <div>
                <h3>Lucas</h3>
                <p>Merci !</p>
            </div>
            <span>09:45</span>
        </div>

    </aside>

    <!-- Système pour afficher la suite des message -->

    <!-- Conversation -->
    <main class="chat-window" id="chatWindow">

        <div class="chat-header">

            <button id="backButton">←</button>

            <img src="https://via.placeholder.com/45" alt="">
            <h2 id="chatName">Thomas</h2>

        </div>

        <!-- boucle pour afficher les messages -->

        <div class="messages">

            <div class="message received">
                Salut !
            </div>

            <div class="message sent">
                Salut 😄
            </div>

            <div class="message received">
                Tu fais quoi ?
            </div>

            <div class="message sent">
                Je termine mon site PHP.
            </div>

        </div>

        <!-- modif du form pour le rentre utilisable. -->
        <form class="chat-input">
            <input type="text" placeholder="Écrire un message...">
            <button>Envoyer</button>
        </form>

    </main>

</div>