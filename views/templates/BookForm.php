<form
    action="index.php?type=Book&action=BookValidate"
    method="POST"
    enctype="multipart/form-data"
    aria-labelledby="form-title"
>
    <fieldset>

        <!-- plutard modifier les information si on modifier les info que livre ou si on le crée -->
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
            <input
                type="text"
                id="comment"
                name="comment"
                require
                title="Le commentaire doit faire plus de 1 caractère"
            >
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
            <label for="picture">Images</label>
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
        <button type="submit" class="buttonWhiteGreen">
            Valider
        </button>

    </fieldset>

</form>



