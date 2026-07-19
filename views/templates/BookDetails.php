<article class="lastBook">

    <img src="<?= $book->getPictureLink() ?>" alt="<?= $book->getTitle() ?>" />

    <div>
        <h2><?= htmlspecialchars($book->getTitle()) ?></h2>
        <h3><?= htmlspecialchars( $book->getNameAutor()) ?></h3>
        <span class="aviability">«</span>
        <p><?= htmlspecialchars($book->getDescribe(400)) ?></p>
    </div>

    <div class="userCreate">
        <p>PROPRIÉTAIRE</p>
        <img src="public/img/user_no_picutre.png" alt="image de l'utilisateur">
        <p><?= htmlspecialchars($book->getNameUser()) ?></p>
    </div>

    <a href="">Envoyer un message</a>

</article>
