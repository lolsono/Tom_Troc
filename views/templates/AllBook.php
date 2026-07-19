<article class="lastBook">

    <div class="containerResearch">
        <h2>Nos livres à l’échange</h2>

        <div class="searchBox">
            <img src="public/img/icon_loop.svg" alt="Icône de recherche">
            <input type="text" id="searchInput" placeholder="Rechercher un livre">
        </div>
    </div>
    
    <div class="containerBooks">
        <?php foreach($books as $book) { ?>
            <a href="index.php?type=Book&action=Details&id=<?= $book->getId() ?>" id="linkCardsBooks">
                <article class="bookCards">
                    <img src="<?= $book->getPictureLink() ?>" alt="<?= htmlspecialchars($book->getTitle()) ?>" />
                    <h2><?= htmlspecialchars($book->getTitle()) ?></h2>
                    <h3><?= htmlspecialchars($book->getNameAutor()) ?></h3>
                    <p>Vendu par : <?= htmlspecialchars($book->getNameUser()) ?></p>
                </article>
            </a>
        <?php } ?>
    </div>

</article>