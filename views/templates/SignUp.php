<div class="FormUser">
    <form
        action="index.php?type=User&action=SingUpValidate"
        method="POST"
        aria-labelledby="form-title"
        novalidate
    >
        <fieldset>
            <legend id="form-title">Inscription</legend>

            <?php if (isset($_SESSION['error']) && !empty($_SESSION['error'])): ?>
                <p class="error"><?= htmlspecialchars($_SESSION['error']) ?></p>
            <?php endif; ?>

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
                    title="Le pseudo doit contenir entre 2 et 255 caractères (lettres, chiffres, underscores)."
                >
            </div>

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

            <!-- submit button -->
            <button type="submit" class="buttonWhiteGreen">
                S'inscrire
            </button>

            <!-- redirect form log in -->
            <a class="link-page" href="index.php?type=User&action=SingIn">Déjà inscrit ? <span class="underline">Connectez-vous</span></a>
        </fieldset>
    </form>
    <img src="public/img/img_log_user_book.svg" alt="image de livre"/>
</div>


