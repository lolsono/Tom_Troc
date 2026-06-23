<article class="lastBook">
    <h2>Nos livres à l’échange</h2>
    <p>Recherche</p>
    <?php foreach($books as $book) { ?>
        <article class="book">
            <h2><?= $book->getTitle() ?></h2>
            <h3><?= $book->getNameAutor() ?></h3>
            <span class="aviability">«</span>
            <p><?= $book->getDescribe(400) ?></p>
            
            <div class="footer">
                <span class="info">date creation</span>
                <a class="info" href="index.php?action=showArticle&id=123">Lire +</a>
            </div>
        </article>
    <?php } ?>
</article>