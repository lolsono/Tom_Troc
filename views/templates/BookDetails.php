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
        <img src="<?= $book->getPictureLink() ?>" alt="<?= $book->getName() ?>" />
        <p><?= $book->getName() ?></p>
    </div>

</article>