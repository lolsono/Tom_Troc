<form
    action="index.php?type=User&action=SingUpValidate"
    method="POST"
    aria-labelledby="form-title"
    novalidate
    class="FormSignUp"
>
    <fieldset>
        <legend id="form-title">Inscription</legend>

        <!-- pseudo -->
        <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input
                type="text"
                id="pseudo"
                name="pseudo"
                require
                minlength="1"
                maxlength="255"
                title="Le pseudo doit contenir entre 1 et 255 caractères (lettres, chiffres, underscores)."
            >
            <?php if (isset($errors['pseudo'])): ?>
                <p id="pseudo-error" class="error-message" role="alert">
                    <?php echo htmlspecialchars($errors['pseudo']); ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- email -->
        <div class="form-group">
            <label for="email">Adresse email</label>
            <input
                type="email"
                id="email"
                name="email"
            >
            <?php if (isset($errors['email'])): ?>
                <p id="email-error" class="error-message" role="alert">
                    <?php echo htmlspecialchars($errors['email']); ?>
                </p>
            <?php endif; ?>
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
            <?php if (isset($errors['password'])): ?>
                <p id="password-error" class="error-message" role="alert">
                    <?php echo htmlspecialchars($errors['password']); ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- submit button -->
        <button type="submit" class="submit-button">
            S'inscrire
        </button>

        <!-- redirect form log in -->
         <a href="index.php">Déjà inscrit ? Connectez-vous</a>
    </fieldset>
</form>


