<article class="joinHamza">
    <div class="text">
        <h2>Rejoignez nos lecteurs passionnés</h2>
        <p>Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture. Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres.</p>
        <a href="" class="buttonGreen">Découvrir</a>
    </div>
    <figure class="picture">
        <img src="public/img/hamza-nouasria.png" alt="Photo de Hamza Nouasria entourée de livres" />
        <figcaption>Hamza</figcaption>
    </figure>
</article>
<article class="lastBook">
    <h2 id="titleH2Homme">Les derniers livres ajoutés</h2>

    <div class="containerBooks">
        <?php foreach($books as $book) { ?>
            <a href="index.php?type=Book&action=Details&id=<?= $book->getId() ?>" id="linkCardsBooks" class="buttonGreen">
                <article class="bookCards">
                    <img src="public/<?= $book->getPicture() ?>" alt="<?= htmlspecialchars($book->getTitle()) ?>" />
                    <h2><?= htmlspecialchars($book->getTitle()) ?></h2>
                    <h3><?= htmlspecialchars($book->getNameAutor()) ?></h3>
                    <p>Vendu par : <?= htmlspecialchars($book->getNameUser()) ?></p>
                </article>
            </a>
        <?php } ?>
    </div>

    <a href="index.php?type=Book&action=allBook" id="buttonHomeBooks" class="buttonGreen">Voir tous les livres</a>
</article>
<article class="howWork">
    <h2>Comment ça marche ?</h2>
    <p>Échanger des livres avec TomTroc c’est simple et amusant ! Suivez ces étapes pour commencer :</p>
    <ul>
        <li>Inscrivez-vous gratuitement sur notre plateforme.</li>
        <li>Ajoutez les livres que vous souhaitez échanger à votre profil.</li>
        <li>Parcourez les livres disponibles chez d'autres membres.</li>
        <li>Proposez un échange et discutez avec d'autres passionnés de lecture.</li>
    </ul>
    <a class="buttonWhiteGreen" href="">Voir tous les livres</a>
</article>
<img src="public/img/headband_homepage.png" alt="Photo de Hamza Nouasria entourée de livres" class="headbandHomepage" />
<article class="valueTomTroc">
    <h2>Nos valeurs</h2>
    <p>Chez Tom Troc, nous mettons l'accent sur le partage, la découverte et la communauté. Nos valeurs sont ancrées dans notre passion pour les livres et notre désir de créer des liens entre les lecteurs. Nous croyons en la puissance des histoires pour rassembler les gens et inspirer des conversations enrichissantes.</p>
    <br/>
    <p>Notre association a été fondée avec une conviction profonde : chaque livre mérite d'être lu et partagé. </p>
    <br />
    <p>Nous sommes passionnés par la création d'une plateforme conviviale qui permet aux lecteurs de se connecter, de partager leurs découvertes littéraires et d'échanger des livres qui attendent patiemment sur les étagères.</p>
    <div>
        <p class="teamTomTroc">L’équipe Tom Troc</p>
        <img src="public/img/heart_green.svg" alt="coeur vert" class="heart" />
    </div>
</article>
