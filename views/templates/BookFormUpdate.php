<div class="BookForm">

    <a href="index.php?type=User&action=UserPage" class="BookUpdateBack"><- retour</a>
    <p class="titlePageBook">Modifier les informations</p>

    <div class="containerFormBook">

        <div class="previewBook" id="previewBook">

            <img
                id="previewImage"
                src="public/<?= htmlspecialchars($book->getPicture()) ?>"
                alt="Prévisualisation du livre"
            >

            <label for="filesPictures" id="labelImage" class="modifyImage">
                Modifier l'image
            </label>

        </div>

        <form
            action="index.php?type=Book&action=BookValidate"
            method="POST"
            enctype="multipart/form-data"
            aria-labelledby="form-title"
        >
            <fieldset>

                <legend id="form-title">Modifier les informations</legend>

                <?php if (isset($_SESSION['error']) && !empty($_SESSION['error'])): ?>
                    <p class="error"><?= htmlspecialchars($_SESSION['error']) ?></p>
                <?php endif; ?>

                <!-- title -->
                <div class="form-group">
                    <label for="title">Titre</label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        required
                        minlength="1"
                        maxlength="255"
                        title="Le titre doit faire plus de 1 caractère"
                        value="<?= htmlspecialchars($book->getTitle()) ?>"
                    >
                </div>

                <!-- autor -->
                <div class="form-group">
                    <label for="autor">Auteur</label>
                    <input
                        type="text"
                        id="autor"
                        name="autor"
                        required
                        minlength="1"
                        maxlength="255"
                        title="L'auteur doit faire plus de 1 caractère"
                        value="<?= htmlspecialchars($book->getNameAutor()) ?>"
                    >
                </div>

                <!-- comment -->
                <div class="form-group">
                    <label for="comment">Commentaire</label>
                    <textarea
                        id="comment"
                        name="comment"
                        required
                        title="Le commentaire doit faire plus de 1 caractère"
                        rows="5"
                    ><?= htmlspecialchars($book->getDescribe()) ?></textarea>
                </div>

                <!-- availability -->
                <div class="form-group">
                    <label for="availability">Disponibilité</label>
                    <select
                        id="availability"
                        name="availability"
                        class="form-control"
                        required
                    >
                        <option value="disponible" <?= $book->getAvailablity() == 1 ? 'selected' : '' ?>>
                            Disponible
                        </option>

                        <option value="non_disponible" <?= $book->getAvailablity() == 0 ? 'selected' : '' ?>>
                            Non disponible
                        </option>
                    </select>
                </div>


                <!-- picture -->
                <div class="form-group">
                    <label for="picture"></label>
                    <input
                        type="file"
                        id="filesPictures"
                        name="filesPictures"
                        accept="image/jpeg, image/png, image/webp, image/svg"
                        class="file-upload-input"
                    >
                </div>

                <!-- input for input valide forms -->
                <input type="hidden" name="idBook" value="<?= $book->getId() ?>">

                <input type="hidden" name="oldPicture" value="<?= htmlspecialchars($book->getPicture()) ?>">

                <!-- submit button -->
                <button type="submit" class="buttonSubmitBooks">
                    Valider
                </button>

            </fieldset>

        </form>

    </div>
</div>




