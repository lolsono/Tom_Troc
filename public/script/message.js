const sidebar = document.getElementById("sidebar");
const chatWindow = document.getElementById("chatWindow");
const backButton = document.getElementById("backButton");
const chatName = document.getElementById("chatName");

const conversations = document.querySelectorAll(".conversation");

// Au chargement
if(window.innerWidth <= 768){
    chatWindow.style.display = "none";
}

// Clique sur une conversation
conversations.forEach(conversation => {

    conversation.addEventListener("click", () => {

        // Nom de la personne
        chatName.textContent = conversation.dataset.name;

        // Mobile uniquement
        if(window.innerWidth <= 768){

            sidebar.style.display = "none";
            chatWindow.style.display = "flex";

        }

    });

});

// Bouton retour
backButton.addEventListener("click", () => {

    if(window.innerWidth <= 768){

        chatWindow.style.display = "none";
        sidebar.style.display = "flex";

    }

});

// Si on change la taille de l'écran
window.addEventListener("resize", () => {

    if(window.innerWidth > 768){

        sidebar.style.display = "flex";
        chatWindow.style.display = "flex";

    }else{

        chatWindow.style.display = "none";
        sidebar.style.display = "flex";

    }

});