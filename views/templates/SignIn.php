<form
    action="index.php?type=User&action=SingInValidate"
    method="POST"
    aria-labelledby="form-title"
    novalidate
    class="FormSignIn"
>
    <fieldset>
        <legend id="form-title">Connexion</legend>

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

        <!-- redirect form Sign Up -->
         <a href="index.php?type=User&action=SingUp">Pas de compte ? Inscrivez-vous</a>
    </fieldset>
</form>


