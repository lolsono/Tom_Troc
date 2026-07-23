<div class="BookForm">

    <p class="titlePageBook">Ajouter un livre</p>

    <div class="containerFormBook">

        <div class="previewBook" id="previewBook">

            <img
                id="previewImage"
                src="public/img/no-image.png"
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
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>

                <!-- title -->
                <div class="form-group">
                    <label for="title">Titre</label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        require
                        minlength="1"
                        maxlength="255"
                        title="Le titre doit faire plus de 1 caractère"
                    >
                </div>

                <!-- autor -->
                <div class="form-group">
                    <label for="autor">Auteur</label>
                    <input
                        type="text"
                        id="autor"
                        name="autor"
                        require
                        minlength="1"
                        maxlength="255"
                        title="L'auteur doit faire plus de 1 caractère"
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
                    ></textarea>
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
                        <option value="" disabled selected>Sélectionnez une option</option>
                        <option value="disponible">Disponible</option>
                        <option value="non_disponible">Non disponible</option>
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
                        required
                        class="file-upload-input"
                    >
                </div>

                <!-- submit button -->
                <button type="submit" class="buttonSubmitBooks">
                    Valider
                </button>

            </fieldset>

        </form>

    </div>
</div>




