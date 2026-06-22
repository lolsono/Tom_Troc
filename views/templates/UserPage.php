<div class="user">
    <h2>Mon compte</h2>
    <p>votre nom utilisateur</p>
    <a href="index.php">Retour à la page d'accueil</a>

    <p><?=$_SESSION['id'] ?></p>

    <div>
        <div class="userDetails">
            <img src="" alt="photo de profile utilisateur" />
            <a href="" >modifier</a>

            <p>Nom utilisateur</p>
            <p>depuis quand utilisateur<p>
            <p>Nombre de livre en ligne</p>
        </div>

        <div class="userFormModif">

        </div>
    </div>

    <!-- si aucun livre on affiche l'ajout sinon on ajoute les livre -->
    <a href="index.php?type=Book&action=addBook">ajouter un livre</a>

</div>
