<article class="containerBookDetails">

    <img src="public/<?= $book->getPicture() ?>" alt="<?= $book->getTitle() ?>" />

    <div class="containerBookText">
        <div>
            <h2><?= htmlspecialchars($book->getTitle()) ?></h2>
            <h3>par <?= htmlspecialchars( $book->getNameAutor()) ?></h3>
            <span class="spacer"></span>
            <p id="descriptionText">DESCRIPTION</p>
            <p><?= htmlspecialchars($book->getDescribe(400)) ?></p>
        </div>

        <p  id="detailsUserBook">PROPRIÉTAIRE</p>
        <div class="userCreate">
            <img src="public/img/user_no_picutre.png" alt="image de l'utilisateur">
            <p><?= htmlspecialchars($book->getNameUser()) ?></p>
        </div>

        <a href="" class="buttonGreen">Envoyer un message</a>
    </div>

</article>
