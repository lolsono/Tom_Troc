<article class="lastBook">

    <img src="<?= $book->getPictureLink() ?>" alt="<?= $book->getTitle() ?>" />

    <div>
        <h2><?= $book->getTitle() ?></h2>
        <h3><?= $book->getNameAutor() ?></h3>
        <span class="aviability">«</span>
        <p><?= $book->getDescribe(400) ?></p>
    </div>

    <div class="userCreate">
        <p>PROPRIÉTAIRE</p>
        <img src="<?= $user->getPictureLink() ?>" alt="<?= $user->getName() ?>" />
        <p><?= $user->getName() ?></p>
    </div>

</article>
