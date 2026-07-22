
<div class="user">
    <h2>Mon compte</h2>
    
    <div class="containerDetailsEdit">

        <div class="userDetails">
            <img src="public/img/user_no_picutre.png" class="pictureUser" alt="photo de profil utilisateur" />
            <a href="" class="modifButton">modifier</a>

            <span></span>

            <p class="nameUser"><?= htmlspecialchars($user->getName()) ?></p>
            <p class="dateUser">Membre depuis <?= $date ?><p>

            <h3>BIBLIOTHEQUE</h3>
            <div class="numberBook">
                <img src="public/img/logo_book.svg" alt="logo de livre"/>
                <p><?=  $numberBook ?> Livres</p>
            </div>
        </div>

        <div class="userFormModif">

            <form
                action="index.php?type=User&action=SingInValidate"
                method="POST"
                aria-labelledby="form-title"
                novalidate
            >
                <fieldset>
                    <legend id="form-title-user">Vos informations personnelles</legend>

                    <?php if (isset($_SESSION['error']) && !empty($_SESSION['error'])): ?>
                        <p class="error"><?= htmlspecialchars($_SESSION['error']) ?></p>
                    <?php endif; ?>

                    <!-- email -->
                    <div class="form-group">
                        <label for="email">Adresse email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                        >
                    </div>

                    <!-- password -->
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            required
                            minlength="8"
                            title="Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial."
                        >
                    </div>

                    <!-- pseudo -->
                    <div class="form-group">
                        <label for="email">Pseudo</label>
                        <input
                            type="pseudo"
                            id="pseudo"
                            name="pseudo"
                        >
                    </div>

                    <!-- submit button -->
                    <button type="submit" class="buttonWhiteGreen">
                        Enregistrer
                    </button>

                </fieldset>
            </form>

        </div>

    </div>

    <div class="CreateBook">

        <div class="articles-container">
            <!-- En-tête -->
            <div class="article article-header">
                <div>Photo</div>
                <div>Titre</div>
                <div>Auteur</div>
                <div>Description</div>
                <div>Disponibilité</div>
                <div>Actions</div>
            </div>

            <?php foreach($books as $book) { ?>

                <article class="book">
                    <div class="book-photo">
                        <img src="public/<?= htmlspecialchars($book->getPicture()) ?>" alt="Couverture du livre <?= htmlspecialchars($book->getTitle()) ?>" />
                    </div>
                    <div class="book-title"><?= htmlspecialchars($book->getTitle()) ?></div>
                    <div class="book-author"><?= htmlspecialchars($book->getNameAutor()) ?></div>
                    <div class="book-description">
                        <?= htmlspecialchars(mb_substr($book->getDescribe(), 0, 100)) . (mb_strlen($book->getDescribe()) > 100 ? '...' : '') ?>
                    </div>
                    <div class="book-availability">
                        <?php
                        $availability = $book->getAvailablity();
                        if ($availability == 1) {
                            echo '<span class="available">disponible</span>';
                        } else {
                            echo '<span class="unavailable">non dispo.</span>';
                        }
                        ?>
                    </div>
                    <div class="book-actions">
                        <a href="index.php?type=Book&action=updateBook&id=<?= $book->getId() ?>" class="edit-btn">Éditer</a>
                        <a href="index.php?type=Book&action=Delete&id=<?= $book->getId() ?>" class="delete-btn">Supprimer</a>
                    </div>

                </article>

            <?php } ?>

        </div>

    </div>

</div>
